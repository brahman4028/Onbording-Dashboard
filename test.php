<?php 
// Load AWS SDK
require __DIR__ . '/aws/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();


// AWS Config
$bucket    = "onboarding-plus";   // only bucket name
$region    = "ap-south-1";        // your bucket region
$awsKey    = "AKIA5FTY6UPGU5LZHY5T";
$awsSecret = "LwRHCaRKs9WjGR+nP7vnb75t87Y9zURKaZg2sQdP";


// Create S3 Client
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $region,
    'credentials' => [
        'key'    => $awsKey,
        'secret' => $awsSecret,
    ],
]);

// Supported MIME types for preview
$supportedTypes = [
    'png'  => 'image/png',
    'jpg'  => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'pdf'  => 'application/pdf',
];

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {
    $file     = $_FILES['fileToUpload']['tmp_name'];
    $filename = basename($_FILES['fileToUpload']['name']); 
    $ext      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    try {
        // Determine ContentType
        $contentType = $supportedTypes[$ext] ?? 'application/octet-stream';

        // Upload to S3
        $result = $s3->putObject([
            'Bucket'      => $bucket,
            'Key'         => "IT_STARPAY/" . $filename,
            'SourceFile'  => $file,
            'ContentType' => $contentType,
        ]);

        $fileUrl = $result['ObjectURL'];

        echo "<p style='color:green;'>✅ File uploaded successfully!</p>";
        echo "File URL: <a href='{$fileUrl}' target='_blank'>{$fileUrl}</a>";

        // Preview
        if (in_array($ext, ['png','jpg','jpeg'])) {
            echo "<div style='margin-top:10px;'><img src='{$fileUrl}' style='max-width:300px; max-height:300px;' alt='Uploaded Image'></div>";
        } elseif ($ext === 'pdf') {
            echo "<div style='margin-top:10px;'><a href='{$fileUrl}' target='_blank'>View PDF</a></div>";
        }

    } catch (AwsException $e) {
        echo "<p style='color:red;'>❌ Upload error: " . $e->getMessage() . "</p>";
    }
}
?>

<!-- HTML Form -->
<form method="post" enctype="multipart/form-data" style="margin-top:20px;">
    <label>Select file:</label>
    <input type="file" name="fileToUpload" required>
    <button type="submit">Upload</button>
</form>
