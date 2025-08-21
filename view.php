<?php
require __DIR__ . '/aws/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();


// AWS Config
$bucket    = "onboarding-plus";   // only bucket name
$region    = "ap-south-1";        // your bucket region
$awsKey    = "AKIA5FTY6UPGU5LZHY5T";
$awsSecret = "LwRHCaRKs9WjGR+nP7vnb75t87Y9zURKaZg2sQdP";


// ===== File to fetch =====
$key = "IT_STARPAY/ayush-mandloi-S4LRj9sR_VM-unsplash.jpg";

// ===== Create S3 Client =====
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $region,
    'credentials' => [
        'key'    => $awsKey,
        'secret' => $awsSecret,
    ],
]);

try {
    // Generate a pre-signed URL valid for 15 minutes
    $cmd = $s3->getCommand('GetObject', [
        'Bucket' => $bucket,
        'Key'    => $key
    ]);

    $request = $s3->createPresignedRequest($cmd, '+15 minutes');
    $presignedUrl = (string) $request->getUri();

    // Display image preview
    echo "<h3>Private Media Preview</h3>";
    echo "<img src='{$presignedUrl}' style='max-width:600px; max-height:600px;' alt='Private Image'>";

} catch (AwsException $e) {
    echo "<p style='color:red;'>❌ Error fetching private file: " . $e->getMessage() . "</p>";
}
