<?php
if (isset($_POST["cargotrackingNO"])) {
    $ComingcargotrackingNO =   SayiliIcerikleriFiltrele(Security($_POST["cargotrackingNO"]));
} else {
    $ComingcargotrackingNO =   "";
}
if ($ComingcargotrackingNO!="") {
    header("Location:https://www.yurticikargo.com/tr/online-servisler/gonderi-sorgula?code=" . $ComingcargotrackingNO);
    exit();

}else{
    header("Location:index.php?PN=14");
    exit();
}
?>