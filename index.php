<?php
session_start(); ob_start();
require_once("db.php");
require_once("Settings/setting.php");
require_once("Settings/functions.php");
require_once("Settings/sitePages.php");
if (isset($_REQUEST["PN"])) {
    $PagesValue = SayiliIcerikleriFiltrele($_REQUEST["PN"]);
} else {
    $PagesValue = 0;
}
?>
<!doctype html>
<html lang="tr-TR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="tr">
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 Days">
    <title>
        <?php echo DonusumleriGeriDondur($siteTitle); ?>
    </title>
    <link type="image/png" rel="icon" href="Pictures/favicon.png">
    <meta name="description" content="<?php echo DonusumleriGeriDondur($siteDescription); ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($siteKeywords); ?>">
    <script type="text/javascript" src="Framework/JQuery/jquery-3.6.4.min.js" language="javasript"></script>
    <link type="text/css" rel="stylesheet" href="Settings/style.css">
    <script type="text/javascript" src="Settings/functions.js" language="javasript"></script>
</head>
<body>
    <table width="1120" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr height="100" bgcolor="#fff">
            <td align="center"><img src="Pictures/header.png" border="0"></td>
        </tr>
        <tr height="110">
            <td>
                <table width="1120" height="30" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr bgcolor="#08c">
                        <td>&nbsp;</td>
                        <td width="35"><a href="index.php?PN=31"><img src="Pictures/signin.png" alt="0"
                                    style="margin-top: 1px;"></a></td>
                        <td width="60" class="blueAreaMenu"><a href="index.php?PN=31">Sign in</a></td>
                        <td width="35"><a href="index.php?PN=22"><img src="Pictures/signup.png" alt="0"
                                    style="margin-top: 1px;"></a></td>
                        <td width="60" class="blueAreaMenu"><a href="index.php?PN=22">Sign up</a></td>
                        <td width="35"><a href="index.php?PN=200"><img src="Pictures/basketicon.png" alt="0"
                                    style="margin-top: 8px;"></a></td>
                        <td width="120" class="blueAreaMenu"><a href="index.php?PN=200">Shopping basket</a></td>
                    </tr>
                </table>
                <table width="1120" height="80" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="100"><a href="index.php"><img
                                    src="Pictures/<?php echo DonusumleriGeriDondur($siteLogo); ?>" alt="0"></a></td>
                        <td>
                            <table width="873" height="30" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="448">&nbsp;</td>
                                    <td width="90" class="mainMenu"><b><a href="index.php">Home</a></b></td>
                                    <td width="200" class="mainMenu"><b><a href="index.php?PN=84">Desktop
                                                Computer</a></b></td>
                                    <td width="100" class="mainMenu"><b><a href="index.php?PN=85">Laptop</a></b></td>
                                    <td width="180" class="mainMenu"><b><a href="index.php?PN=86 ">Computer
                                                Equipment</a></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        <tr>
            <td valign="top">
                <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <?php
                            if ((!$PagesValue) or ($PagesValue == "") or ($PagesValue == 0)) {
                                include($pages[0]);
                            } else {
                                include($pages[$PagesValue]);
                            }
                            ?><br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="210">
            <td>
                <table width="1120" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#f9f9f9">
                    <tr height="30">
                        <td width="250" style="border-bottom: 1px dashed #ccc;">&nbsp;<b>Institutional</b></td>
                        <td width="22">&nbsp;</td>
                        <td width="250" style="border-bottom: 1px dashed #ccc;"><b>Registration & Services</b></td>
                        <td width="22">&nbsp;</td>
                        <td width="250" style="border-bottom: 1px dashed #ccc;"><b>Contracts</b></td>
                        <td width="21">&nbsp;</td>
                        <td width="250" style="border-bottom: 1px dashed #ccc;"><b>Follow us</b></td>
                    </tr>
                    <tr class="footer" height="30">
                        <td>&nbsp;<a href="index.php?PN=1">About us</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=31">Sign In</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=2">Membership Agreements</a></td>
                        <td>&nbsp;</td>
                        <td>
                            <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="20"><a href="<?php echo DonusumleriGeriDondur($socialMediaFacebook) ?>"
                                            target=_blank><img src="Pictures/facebook.png" alt="0"
                                                style="margin-top: 5px;"></a></td>
                                    <td width="230"><a href="<?php echo DonusumleriGeriDondur($socialMediaFacebook) ?>"
                                            target=_blank>Facebook</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="footer" height="30">
                        <td>&nbsp;<a href="index.php?PN=8">Bank Accounts</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=22">Sign Up</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=3">Terms of Use</a></td>
                        <td>&nbsp;</td>
                        <td>
                            <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="20"><a href="<?php echo DonusumleriGeriDondur($socialMediaInstagram) ?>"
                                            target=_blank><img src="Pictures/instagram.png" alt="0"
                                                style="margin-top: 5px;"></a></td>
                                    <td width="230"><a href="<?php echo DonusumleriGeriDondur($socialMediaInstagram) ?>"
                                            target=_blank>Instagram</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="footer" height="30">
                        <td>&nbsp;<a href="index.php?PN=9">Remittance Notification Form</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=21">FAQ</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=4">Confidentiality Agreement</a></td>
                        <td>&nbsp;</td>
                        <td>
                            <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="20"><a href="<?php echo DonusumleriGeriDondur($socialMediaTwitter) ?>"
                                            target=_blank><img src="Pictures/twitter.png" alt="0"
                                                style="margin-top: 5px;"></a></td>
                                    <td width="230"><a href="<?php echo DonusumleriGeriDondur($socialMediaTwitter) ?>"
                                            target=_blank>Twitter</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="footer" height="30">
                        <td>&nbsp;<a href="index.php?PN=14">Where is the cargo?</a></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=5">Distance Selling Contract</a></td>
                        <td>&nbsp;</td>
                        <td>
                            <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="20"><a href="<?php echo DonusumleriGeriDondur($socialMediaLinkedin) ?>"
                                            target=_blank><img src="Pictures/linkedin.png" alt="0"
                                                style="margin-top: 5px;"></a></td>
                                    <td width="230"><a href="<?php echo DonusumleriGeriDondur($socialMediaLinkedin) ?>"
                                            target=_blank>Linkedin</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="footer" height="30">
                        <td>&nbsp;<a href="index.php?PN=16">Contact us</a></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=6">Delivery</a></td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr class="footer" height="30">
                        <td></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?PN=7">Cancellation & Return & Exchange</a></td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="30">
            <td>
                <table width="1065" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <?php echo DonusumleriGeriDondur($siteCopyrightText); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="30">
            <td>
                <table width="1065" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <img src="Pictures/rapidssl-logo.png" border="0" style="margin-right: 5px;">
                            <img src="Pictures/security.png" border="0" style="margin-right: 5px;">
                            <img src="Pictures/3dSecure.png" border="0" style="margin-right: 5px;">
                            <img src="Pictures/visa_master.png" border="0" style="margin-right: 5px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
<?php
$DatabaseConnection = null;
ob_end_flush();
die;
?>