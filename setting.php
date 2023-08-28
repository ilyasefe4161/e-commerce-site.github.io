<?php
try {
    $DatabaseConnection = new PDO("mysql:host=localhost; dbname=iescomputersoftware; charset=UTF8", "root", "");
} catch (PDOException $Exception) {
    //echo "Connection Error />" . $Exception->getMessage();
    die();
}
$SettingsQuery = $DatabaseConnection->prepare("SELECT * FROM settings LIMIT 1");
$SettingsQuery->execute();
$SettingsNumber = $SettingsQuery->rowCount();
$Settings = $SettingsQuery->fetch(PDO::FETCH_ASSOC);
if ($SettingsNumber > 0) {
    $siteName = $Settings["siteName"];
    $siteTitle = $Settings["siteTitle"];
    $siteDescription = $Settings["siteDescription"];
    $siteKeywords = $Settings["siteKeywords"];
    $siteCopyrightText = $Settings["siteCopyrightText"];
    $siteLogo = $Settings["siteLogo"];
    $siteLink = $Settings["siteLink"];
    $siteEmailAdress = $Settings["siteEmailAdress"];
    $siteEmailPassword = $Settings["siteEmailPassword"];
    $siteEmailHostAdress = $Settings["siteEmailHostAdress"];
    $socialMediaFacebook = $Settings["socialMediaFacebook"];
    $socialMediaInstagram = $Settings["socialMediaInstagram"];
    $socialMediaTwitter = $Settings["socialMediaTwitter"];
    $socialMediaLinkedin = $Settings["socialMediaLinkedin"];
} else {
    //echo "Site Setting Query Error" . $Exception->getMessage();
    die();
}
$TextsQuery = $DatabaseConnection->prepare("SELECT * FROM agreementsandtexts LIMIT 1");
$TextsQuery->execute();
$TextsNumber = $TextsQuery->rowCount();
$Texts = $TextsQuery->fetch(PDO::FETCH_ASSOC);
if ($TextsNumber > 0) {
    $aboutUsText = $Texts["aboutUsText"];
    $membershipAgreementsText = $Texts["membershipAgreementsText"];
    $termsOfUseText = $Texts["termsOfUseText"];
    $confidentialityAgreementText = $Texts["confidentialityAgreementText"];
    $distanceSellingContractText = $Texts["distanceSellingContractText"];
    $deliveryText = $Texts["deliveryText"];
    $cancellationReturnExchangeText = $Texts["cancellationReturnExchangeText"];
} else {
    //echo "Site Text Query Error" . $Exception->getMessage();
    die();
}
if (isset($_SESSION["user"])) {
    $UserQuery = $DatabaseConnection->prepare("SELECT * FROM members WHERE 	email=".$_SESSION["user"]."LIMIT 1");
    $UserQuery->execute();
    $UserNumber = $UserQuery->rowCount();
    $Users = $UserQuery->fetch(PDO::FETCH_ASSOC);
    if ($UserNumber > 0) {
        $id                  = $Users["id"];
        $email               = $Users["	email"];
        $password            = $Users["password"];
        $NameSurname         = $Users["NameSurname"];
        $telephone_number    = $Users["telephone_number"];
        $gender              = $Users["gender"];
        $Situation           = $Users["Situation"];
        $signupdate          = $Users["signupdate"];
        $IPAdress            = $Users["IPAdress"];
        $ActivationCode            = $Users["ActivationCode"];
    } else {
        //echo "Site User Error" . $Exception->getMessage();
        die();
    }
}
?>