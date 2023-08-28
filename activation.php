<?php
require_once("Settings/setting.php");
require_once("Settings/functions.php");
if (isset($_GET["email"])) {
    $Comingemail = Security($_GET["email"]);
} else {
    $Comingemail = "";
}
if (isset($_GET["ActivationCode"])) {
    $ActivationCode = Security($_GET["ActivationCode"]);
} else {
    $ActivationCode = "";
}
if (($Comingemail != "") and ($ActivationCode != "")) {
    $ControlQuery = $DatabaseConnection->prepare("SELECT * FROM members WHERE email=? AND ActivationCode=? AND Situation=?");
    $ControlQuery->execute([$Comingemail, $ActivationCode, 0]);
    $UserNumber = $ControlQuery->rowCount();
    if ($UserNumber > 0) {
        $UserUpdateQuery = $DatabaseConnection->prepare("UPDATE members WHERE SET 	Situation=1");
        $UserUpdateQuery->execute();
        $Control = $UserUpdateQuery->rowCount();
        if ($Control > 0) {
            header("Location:index.php?PN=30");
            exit();

        } else {
            header("Location:" . $siteLink);
            exit();
            }
    } else {
        header("Location:" . $siteLink);
        exit();
    }
} else {
    header("Location:" . $siteLink);
    exit();
}
?>