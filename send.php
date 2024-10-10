text/x-generic send.php ( PHP script, UTF-8 Unicode text, with CRLF line terminators )
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'php mailer/Exception.php';
require 'php mailer/PHPMailer.php';
require 'php mailer/SMTP.php';
//Create an instance; passing true enables exceptions
$mailPrimary = new PHPMailer(true);
$name = !empty($_POST['name']) ? $_POST['name'] : 'Data Not Available';
$number = !empty($_POST['phone']) ? $_POST['phone'] : 'Data Not Available';
$email = !empty($_POST['email']) ? $_POST['email'] : 'Data Not Available';
$Message = !empty($_POST['query']) ? $_POST['query'] : 'Data Not Available';

try {
    $mailPrimary->isSMTP();
    $mailPrimary->Host       = 'mail.dapssoftware.com';
    $mailPrimary->SMTPAuth   = true;
    $mailPrimary->Username   = 'contactus@dapssoftware.com';
    $mailPrimary->Password   =  'c@ntact#us0995D';
    $mailPrimary->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mailPrimary->Port       = 465;

    $mailPrimary->setFrom('contactus@dapssoftware.com', '........ - SUPPORT TEAM');
    $mailPrimary->addAddress($email, 'website');

    $mailPrimary->isHTML(true);
    $mailPrimary->Subject = '  Inquiry for  santoshs.rajpoot@gmail.com '; 
    $mailPrimary->Body = "
        <p>Dear Sir/Madam,</p>
        
        <p>Thank you for reaching out to us. We have received your inquiry and are pleased to provide you with the proper response.</p>
        
        <p>If you require further assistance or have additional questions, please do not hesitate to contact us.</p>
        
        <p>You can reach our customer support team at 9953213254.</p>        
        <p>We value your feedback and look forward to assisting you further.</p>
        
        <p>Best regards,</p>
        <p>Mob : +91-9953213254 </p>
        <p>Mob : +91-8826301810 </p>
    ";

    // Send the email to the primary recipient
    //$mailPrimary->send();

    // Create a message for sachinu967@gmail.com

    $copyEmail = 'Kumarsanchit292@gmail.com';
    $subjectCopy = 'New Lead -  ' . $name;
    $messageCopy = "
    <table style='border-collapse: collapse; width: 60%; border: 1px solid #000;'>
        <tr>
            <td style='border: 1px solid #000; padding: 5px;'><b>Name :</b></td>
            <td style='border: 1px solid #000; padding: 5px;'>$name</td>
        </tr>
        <tr>
            <td style='border: 1px solid #000; padding: 5px;'><b>Number :</b></td>
            <td style='border: 1px solid #000; padding: 5px;'>$number</td>
        </tr>
        <tr>
            <td style='border: 1px solid #000; padding: 5px;'><b>Email :</b></td>
            <td style='border: 1px solid #000; padding: 5px;'>$email</td>
        </tr>
        <tr>
            <td style='border: 1px solid #000; padding: 5px;'><b>Message:</b></td>
            <td style='border: 1px solid #000; padding: 5px;'>$Message</td>
        </tr>
    </table>
    <br>
    Thanks & Regards<br>
     ";

    $mailCopy = new PHPMailer(true);
    $mailCopy->isSMTP();
    $mailCopy->Host       = 'mail.dapssoftware.com';
    $mailCopy->SMTPAuth   = true;
    $mailCopy->Username   = 'contactus@dapssoftware.com';
    $mailCopy->Password   = 'c@ntact#us0995D';
    $mailCopy->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mailCopy->Port       = 465;
    $mailCopy->setFrom('contactus@dapssoftware.com', 'New Lead SKA ');
    $mailCopy->addAddress($copyEmail, 'User Copy');
    $mailCopy->isHTML(true);
    $mailCopy->Subject = $subjectCopy;
    $mailCopy->Body    = $messageCopy;

    // Send the copy email to sachinu967@gmail.com
    $mailCopy->send();

    header("Location: index.php");
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mailPrimary->ErrorInfo}";
    echo $e;
}
?>