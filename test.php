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



<script>
if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) { try { // Upload to AWS S3 $s3Result = $s3->putObject([ 'Bucket' => $bucket, 'Key' => "IT_STARPAY/" . $fileName, 'SourceFile' => $targetPath, //'ACL' => 'public-read', ]); // Save S3 URL $safePath = $mysqli->real_escape_string($s3Result['ObjectURL']); $updateFileParts[] = "$field = '$safePath'"; $uploadedFiles[$field] = $s3Result['ObjectURL']; } catch (AwsException $e) { echo "<p style='color:red;'>❌ S3 upload failed for {$field}: " . $e->getMessage() . "</p>"; // Fallback: keep local path $safePath = $mysqli->real_escape_string($targetPath); $updateFileParts[] = "$field = '$safePath'"; $uploadedFiles[$field] = $targetPath; } }



try {
                $s3Result = $s3->putObject([
                    'Bucket'     => $bucket,
                    'Key'        => "IT_STARPAY/" . $fileName,
                    'SourceFile' => $_FILES[$field]['tmp_name'], // directly from temp
                    //'ACL'      => 'public-read',
                ]);
                $uploadedFiles[$field] = $s3Result['ObjectURL'];
            } catch (AwsException $e) {
                echo "<p style='color:red;'>❌ S3 upload failed for {$field}: " . $e->getMessage() . "</p>";
                $uploadedFiles[$field] = ''; // fallback
            }


</script>





<?php 

  try {

                $mail->isHTML(true);
                $mail->AddEmbeddedImage('assets/images/logo-img.png', 'logo_cid');

                $mail->addAddress($merchantemail, $merchantname);
                $mail->addAddress($supportemail, $businessname);
                $mail->Subject = 'Thank You for Registering – Your Application is in Progress';
                $mail->Body    = '
<div style="font-family:Arial,Helvetica,sans-serif; color:#222; line-height:1.6; max-width:620px; margin:0 auto; padding:24px; border:1px solid #eee; border-radius:10px; background:#fff;">
  <!-- Logo -->
  <div style="text-align:center; margin-bottom:16px;">
    <img src="cid:logo_cid" alt="Staar Payout Private Limited" style="max-height:56px; display:inline-block;">
  </div>

  <!-- Title -->
  <h2 style="margin:0 0 8px; font-size:20px; color:#111; text-align:center;">Thanks for registering, ' . $merchantemail . '!</h2>
  <p style="margin:0 0 16px; text-align:center; color:#555;">
    Great news — we’ve received your onboarding form and your application is under review.
  </p>

  <!-- Details card -->
  <div style="background:#f8fafc; border:1px solid #e6e6e6; border-radius:8px; padding:14px 16px; margin:16px 0;">
    <div style="font-size:14px; color:#111; margin-bottom:8px;"><strong>Your submitted details</strong></div>
    <div style="font-size:14px; color:#333; margin:4px 0;"><strong>Business Name:</strong> ' . $businessname . '</div>
    <div style="font-size:14px; color:#333; margin:4px 0;"><strong>GST Number:</strong> ' . $gstin . '</div>
    <div style="font-size:14px; color:#333; margin:4px 0;"><strong>PAN Number:</strong> ' . $pan . '</div>
  </div>

  <!-- CTA -->
  <div style="text-align:center; margin:18px 0 6px;">
    <a href="' . $trackingLink . '" style="background:#0d6efd; color:#fff; text-decoration:none; padding:10px 18px; border-radius:6px; display:inline-block; font-size:14px;">
      Track Your Application
    </a>
  </div>

  <p style="font-size:14px; color:#555; margin:16px 0;">
    Need help? Reach us at <a href="mailto:' . $itstaremail . '" style="color:#0d6efd; text-decoration:none;">' . $itstaremail . '</a> — we’re here to help.
  </p>

  <hr style="border:none; border-top:1px solid #eee; margin:18px 0;">

  <!-- Signature -->
  <div style="font-size:13px; color:#666;">
    <div style="margin:0 0 2px;"><strong>Best Regards,</strong></div>
    <div style="margin:0 0 6px;"><strong>Staar Payout Private Limited</strong></div>
    <div style="margin:0 0 2px;">Email: <a href="mailto:info@itstarpay.com" style="color:#0d6efd; text-decoration:none;">info@itstarpay.com</a></div>
    <div style="margin:0;">Address: A-1/2, First Floor, Shakti Nagar Extension, Ashok Vihar, North West Delhi, Delhi, India, 110052</div>
  </div>
</div>';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Email sent';
                header("Location: thankyou.php?id={$uniqueID}&gstin={$gstin}&pan={$pan}");
                echo "<script>window.location.href='thankyou.php?id={$uniqueID}&gstin={$gstin}&pan={$pan}';</script>";
                exit;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

?>