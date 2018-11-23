<?php
require 'PHPMailer/PHPMailerAutoload.php';
try {
if(isset($_POST['email_send'])) {
$mail = new PHPMailer;
$mail->FromName = $_POST['u_name'];
$to_email = $_POST['u_email'];
$mail->AddAddress($to_email);
$mail->From = "mohdnorshahrimbisni@gmail.com";
$mail->Subject = "Test Email Send using PHP";
$body = "<table>
<tr>
<th colspan='2'>This is a test email</th>
</tr>
<tr>
<td>Name :</td>
<td>".$_POST['u_name']."</td>
</tr>
<tr>
<td>E-mail : </td>
<td>".$_POST['u_email']."</td>
</tr>
<tr>
<td>Message : </td>
<td>".$_POST['message']."</td>
</tr>
<table>";
$body = preg_replace('/\\\\/','', $body);
$mail->MsgHTML($body);
$mail->IsSendmail();
$mail->AddReplyTo("shahrimbisni@gmail.com");
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
$mail->WordWrap = 80;
$mail->AddAttachment($_FILES['attach']['tmp_name'], $_FILES['attach']['name']);
$mail->IsHTML(true);
$mail->Send();
echo 'The message has been sent.';
}
} catch (phpmailerException $e) {
echo $e->errorMessage();
}
?>


<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}