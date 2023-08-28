<?php
$IPAdress = $_SERVER["REMOTE_ADDR"];
$timeStamp = time();
$DateHour = date("d.m.Y H:i:s", $timeStamp);
function RakamlarHaricTumKarakterleriSil($Value)
{
	$Islem = preg_replace("/[^0-9]/", "", $Value);
	$Result = $Islem;
	return $Result;
}
function DeleteWholeSpace($Value)
{
	$Islem = preg_replace("/\s|&nbsp;/", "", $Value);
	$Result = $Islem;
	return $Result;
}
function DonusumleriGeriDondur($Value)
{
	$ReturnBack = htmlspecialchars_decode($Value, ENT_QUOTES);
	$Result = $ReturnBack;
	return $Result;

}
function Security($Value)
{
	$DeleteSpace = trim($Value);
	$DeleteTags = strip_tags($DeleteSpace);
	$Disable = htmlspecialchars($DeleteTags, ENT_QUOTES);
	$Result = $Disable;
	return $Result;
}
function SayiliIcerikleriFiltrele($Value)
{
	$DeleteSpace = trim($Value);
	$DeleteTags = strip_tags($DeleteSpace);
	$Disable = htmlspecialchars($DeleteTags, ENT_QUOTES);
	$Clear = RakamlarHaricTumKarakterleriSil($Disable);
	$Result = $Clear;
	return $Result;
}
function IBANBicimlendir($Value){
	$DeleteSpace = trim($Value);
	$DeleteWholeSpaces = DeleteWholeSpace($DeleteSpace);
	$FirstBlock 	= substr($DeleteWholeSpaces, 0, 4);
	$SecondBlock 	= substr($DeleteWholeSpaces, 4, 4);
	$ThirdBlock 	= substr($DeleteWholeSpaces, 8, 4);
	$FourthBlock 	= substr($DeleteWholeSpaces, 12, 4);
	$FifthBlock 	= substr($DeleteWholeSpaces, 16, 4);
	$SixthBlock 	= substr($DeleteWholeSpaces, 20, 4);
	$SeventhBlock 	= substr($DeleteWholeSpaces, 24, 2);
	$Duzenle = $FirstBlock." ".$SecondBlock." ".$ThirdBlock." ".$FourthBlock." ".$FifthBlock." ".$SixthBlock." ".$SeventhBlock;
	$Result = $Duzenle;
	return $Result;
}
function ActivationCode(){
	$firstfive=rand(1000,9999);
	$secondfive=rand(1000,9999);
	$thirdfive=rand(1000,9999);
	$fourthfive=rand(1000,9999);
	$Code=$firstfive."-".$secondfive."-".$thirdfive."-".$fourthfive;
	$result=$Code;
	return $result;
}
?>