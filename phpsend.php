<?php 

include 'phpmailer.php';

$tt = "testing text";
$sub = "testing subject";
try {
   
    $mail->Subject = $sub;
    $mail->Body    = $tt;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>