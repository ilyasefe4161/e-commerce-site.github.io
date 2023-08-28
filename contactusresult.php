<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';

if (isset($_POST["name_surname"])) {
    $ComingnameSurname = Security($_POST["name_surname"]);
} else {
    $ComingnameSurname = "";
}
if (isset($_POST["email_adress"])) {
    $ComingemailAdress = Security($_POST["email_adress"]);
} else {
    $ComingemailAdress = "";
}
if (isset($_POST["telephone_number"])) {
    $ComingtelephoneNumber = Security($_POST["telephone_number"]);
} else {
    $ComingtelephoneNumber = "";
}
if (isset($_POST["messages"])) {
    $ComingMessage = Security($_POST["messages"]);
} else {
    $ComingMessage = "";
}
if (($ComingnameSurname != "") and ($ComingemailAdress != "") and ($ComingtelephoneNumber != "") and ($ComingMessage != "")) {
    $SaveContactUs = $DatabaseConnection->prepare("INSERT INTO contact_us (name_surname, email_adress, telephone_number, messages) values (?, ?, ?, ?)");
    $SaveContactUs->execute([$ComingnameSurname, $ComingemailAdress, $ComingtelephoneNumber, $ComingMessage]);
    $SaveContactUsControl = $SaveContactUs->rowCount();
    if ($SaveContactUsControl>0) {
        echo 'Message has been sent';
        header("Location:index.php?PN=18");
        exit();
    }
    // $mails  =   "Name Surname : ".$ComingnameSurname."<br/>E-mail Adress : ".$ComingemailAdress."<br/>Telephone Number : ".$ComingtelephoneNumber."<br/>Message : ".$ComingMessage;
    // $mail = new PHPMailer(true);
    // try {
    //     $mail->SMTPDebug = 0;
    //     $mail->isSMTP();
    //     $mail->Host = DonusumleriGeriDondur($siteEmailHostAdress);
    //     $mail->SMTPAuth = true;
    //     $mail->CharSet = "UTF-8";
    //     $mail->Username = DonusumleriGeriDondur($siteEmailAdress);
    //     $mail->Password = DonusumleriGeriDondur($siteEmailPassword);
    //     $mail->SMTPSecure = 'tls';
    //     $mail->Port = 587;
    //     $mail->SMTPOptions = array(
    //         'ssl' => array(
    //             'verify_peer' => false,
    //             'verify_peer_name' => false,
    //             'allow_self_signed' => false
    //         )
    //     );
    //     $mail->setFrom(DonusumleriGeriDondur($siteEmailAdress), DonusumleriGeriDondur($siteName));
    //     $mail->addAddress(DonusumleriGeriDondur($siteEmailAdress), DonusumleriGeriDondur($siteName));
    //     $mail->addReplyTo($ComingemailAdress, $ComingnameSurname);
    //     $mail->isHTML(true);
    //     $mail->Subject = DonusumleriGeriDondur($siteName) . ' contact form message';
    //     $mail->MsgHTML($mails);
    //     $mail->send();
    // echo 'Message has been sent';
    // header("Location:index.php?PN=18");
    // exit();
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     header("Location:index.php?PN=19");
    //     exit();
    // }
    else {
        echo "Message could not be sent.";
        header("Location:index.php?PN=19");
        exit();
    }
} else {
    header("Location:index.php?PN=20");
    exit();
}
?>