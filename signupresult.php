<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';
if (isset($_POST["email"])) {
    $Comingemail = Security($_POST["email"]);
} else {
    $Comingemail = "";
}
if (isset($_POST["Passwords"])) {
    $ComingPassword = Security($_POST["Passwords"]);
} else {
    $ComingPassword = "";
}
if (isset($_POST["passwordagain"])) {
    $ComingPasswordagain = Security($_POST["passwordagain"]);
} else {
    $ComingPasswordagain = "";
}
if (isset($_POST["NameSurname"])) {
    $ComingNameSurname = Security($_POST["NameSurname"]);
} else {
    $ComingNameSurname = "";
}
if (isset($_POST["telephone_number"])) {
    $ComingTelephoneNumber = Security($_POST["telephone_number"]);
} else {
    $ComingTelephoneNumber = "";
}
if (isset($_POST["gender"])) {
    $ComingGender = Security($_POST["gender"]);
} else {
    $ComingGender = "";
}
if (isset($_POST["membershipagreement"])) {
    $ComingMembershipAgreement = Security($_POST["membershipagreement"]);
} else {
    $ComingMembershipAgreement = "";
}
$ActivationCode = ActivationCode();
$MD5Password = md5($ComingPassword);
if (
    ($Comingemail != "") and ($ComingPassword != "") and ($ComingPasswordagain != "") and ($ComingNameSurname != "") and ($ComingTelephoneNumber != "") and
    ($ComingGender != "")
) {
    if ($ComingMembershipAgreement == 0) {
        header("Location:index.php?PN=29");
        exit();
    } else {
        if ($ComingPassword != $ComingPasswordagain) {
            header("Location:index.php?PN=28");
            exit();
        } else {
            $ControlQuery = $DatabaseConnection->prepare("SELECT * FROM members WHERE email=?");
            $ControlQuery->execute([$Comingemail]);
            $UserNumber = $ControlQuery->rowCount();
            if ($UserNumber > 0) {
                header("Location:index.php?PN=27");
                exit();
            } else {
                $UserAddQuery = $DatabaseConnection->prepare("INSERT INTO members (email, Passwords, NameSurname, telephone_number, gender, Situation, signupdate, IPAdress, ActivationCode) VALUES (?,?,?,?,?,?,?,?,?)");
                $UserAddQuery->execute([$Comingemail, $MD5Password, $ComingNameSurname, $ComingTelephoneNumber, $ComingGender, 0, $timeStamp, $IPAdress, $ActivationCode]);
                $UserControl = $UserAddQuery->rowCount();
                if ($UserControl > 0) {
                    //                     $mails = "Hello, Ms/Mrs/Mr " . $ComingNameSurname . "<br/><br/>" . "<a href= '" . $siteLink . "/activation.php?ActivationCode=" . $ActivationCode . " &Email=" . $Comingemail . "' Click </a> to complete your registration on our site.<br/><br/>" . "Best Regards.<br/><br/>" . $siteName;
//                     $mail = new PHPMailer(true);
//                     try {
//                         $mail->SMTPDebug = 0;
//                         $mail->isSMTP();
//                         $mail->Host = DonusumleriGeriDondur($siteEmailHostAdress);
//                         $mail->SMTPAuth = true;
//                         $mail->CharSet = "UTF-8";
//                         $mail->Username = DonusumleriGeriDondur($siteEmailAdress);
//                         $mail->Password = DonusumleriGeriDondur($siteEmailPassword);
//                         $mail->SMTPSecure = 'tls';
//                         $mail->Port = 587;
//                         $mail->SMTPOptions = array(
//                             'ssl' => array(
//                                 'verify_peer' => false,
//                                 'verify_peer_name' => false,
//                                 'allow_self_signed' => false
//                             )
//                         );
//                         $mail->setFrom(DonusumleriGeriDondur($siteEmailAdress), DonusumleriGeriDondur($siteName));
//                         $mail->addAddress(DonusumleriGeriDondur($Comingemail), DonusumleriGeriDondur($ComingNameSurname));


                    //                         $mail->addReplyTo(DonusumleriGeriDondur($siteEmailAdress), DonusumleriGeriDondur($siteName));
//                         $mail->isHTML(true);
//                         $mail->Subject = DonusumleriGeriDondur($siteName) . ' new account activation.';
//                         $mail->MsgHTML($mails);
//                         $mail->send();
                    header("Location:index.php?PN=24");
                    exit();
                    //                     } catch (Exception $e) {
//                         header("Location:index.php?PN=25");
//                         exit();
//                     }
                } else {
                    header("Location:index.php?PN=25");
                    exit();
                }
            }
        }
    }
} else {
    header("Location:index.php?PN=26");
    exit();
}
?>