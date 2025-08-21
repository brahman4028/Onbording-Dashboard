<?php 

// Load AWS SDK (adjust the path to aws-sdk-php)
require __DIR__ . '/aws/aws-autoloader.php';

$ds = __DIR__ . '/aws/aws-autoloader.php';

echo $ds;


use Aws\S3\S3Client;
use Aws\Exception\AwsException;


// AWS Config
$bucket    = "onboarding-plus";   // only bucket name
$region    = "ap-south-1";        // your bucket region
$awsKey    = "AKIA5FTY6UPGU5LZHY5T";
$awsSecret = "LwRHCaRKs9WjGR+nP7vnb75t87Y9zURKaZg2sQdP";


// DB Connection (db.php must create $mysqli)
include 'db.php';


// Create S3 Client
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $region,
    'credentials' => [
        'key'    => $awsKey,
        'secret' => $awsSecret,
    ],
]);


// File upload handling
if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
    // Create unique file name
    $bucket = 'onboarding-plus'; // आपका bucket name
    $folder = 'IT_STARPAY/';     // folder name (end में slash जरूरी है)

    $fileName     = time() . "_" . basename($_FILES['fileToUpload']['name']);
    $fileTempPath = $_FILES['fileToUpload']['tmp_name'];


    try {
        // Upload file to S3 inside IT_STARPAY/uploads/
        $result = $s3->putObject([
            'Bucket'     => $bucket,
            'Key'    => $folder . $fileName,
            'SourceFile' => $fileTempPath,
            'ACL'        => 'public-read' // optional, makes file public
        ]);

        // Get file URL
        $fileUrl = $result['ObjectURL'];

        // Save file info in MySQL
        $stmt = $mysqli->prepare("INSERT INTO media_files (file_name, file_url) VALUES (?, ?)");
        $stmt->bind_param("ss", $fileName, $fileUrl);
        $stmt->execute();
        $stmt->close();

        echo "✅ File uploaded to S3 and URL saved in DB.<br>";
        echo "🌐 File URL: <a href='$fileUrl' target='_blank'>$fileUrl</a>";

    } catch (AwsException $e) {
        echo "❌ Upload failed: " . $e->getMessage();
    }

} 

else {
    echo "❌ No file uploaded or error in file.";
}

?>