<?php
if (isset($_POST["name_surname"])) {
    $ComingnameSurname =   Security($_POST["name_surname"]);
} else {
    $ComingnameSurname =   "";
}
if (isset($_POST["email_adress"])) {
    $ComingemailAdress =   Security($_POST["email_adress"]);
} else {
    $ComingemailAdress =   "";
}
if (isset($_POST["telephone_number"])) {
    $ComingtelephoneNumber =   Security($_POST["telephone_number"]);
} else {
    $ComingtelephoneNumber =   "";
}
if (isset($_POST["SelectBank"])) {
    $ComingSelectBank =   Security($_POST["SelectBank"]);
} else {
    $ComingSelectBank =   "";
}
if (isset($_POST["descriptions"])) {
    $Comingdescription =   Security($_POST["descriptions"]);
} else {
    $Comingdescription =   "";
}
if (($ComingnameSurname!="") and ($ComingemailAdress!="") and ($ComingtelephoneNumber!="") and ($ComingSelectBank!="")) {
$SaveRemitanceNotification = $DatabaseConnection->prepare("INSERT INTO remittance_notification (bank_id, name_surname, email_adress, telephone_number, descriptions, dates, situation) values (?, ?, ?, ?, ?, ?, ?)");
$SaveRemitanceNotification->execute([$ComingSelectBank, $ComingnameSurname, $ComingemailAdress, $ComingtelephoneNumber, $Comingdescription, $timeStamp, 0]);
$SaveRemitanceNotificationControl   =   $SaveRemitanceNotification->rowCount();
    if ($SaveRemitanceNotificationControl > 0) {
       header("Location:index.php?PN=11");
       exit();
    }else{
       header("Location:index.php?PN=12");
      exit();
    }
}else{
    header("Location:index.php?PN=13");
    exit();
}
?>