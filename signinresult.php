<?php
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
$MD5Password = md5($ComingPassword);
if (
    ($Comingemail != "") and ($ComingPassword != "")
) {
    $ControlQuery = $DatabaseConnection->prepare("SELECT * FROM members WHERE email=? AND sifre=?");
    $ControlQuery->execute([$Comingemail, $MD5Password]);
    $UserNumber = $ControlQuery->rowCount();
    $UserSaving =   $ControlQuery->fetch(PDO::FETCH_ASSOC);
    if ($UserNumber > 0) {
        if ($UserSaving["Situation"]==1) {
            $_SESSION["Kullanici"] = $Comingemail;
            if ($_SESSION["Kullanici"] == $Comingemail) {
                header("Location:index.php?PN=49");
                exit();
                    } else {
                        header("Location:index.php?PN=33");
                        exit();
                            }
            } else {




                $UserAddQuery = $DatabaseConnection->prepare("INSERT INTO members (email, Passwords, NameSurname, telephone_number, gender, Situation, signupdate, IPAdress, ActivationCode) VALUES (?,?,?,?,?,?,?,?,?)");
                $UserAddQuery->execute([$Comingemail, $MD5Password, $ComingNameSurname, $ComingTelephoneNumber, $ComingGender, 0, $timeStamp, $IPAdress, $ActivationCode]);
                $UserControl = $UserAddQuery->rowCount();
                if ($UserControl > 0) {
                    header("Location:index.php?PN=36");
                    exit();
                } else {
                    header("Location:index.php?PN=33");
                    exit();
                }
            }
        }
    }else {
    header("Location:index.php?PN=34");
    exit();
} else {
    header("Location:index.php?PN=35");
    exit();
}
?>