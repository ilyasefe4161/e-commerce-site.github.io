<?php
if (isset($_GET["menuID"])) {
    $ComingMenuID = $_GET["menuID"];
} else {
    $ComingMenuID = "";
}
?>
<table width="1120" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="250" align="left" valign="top">
            <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                            <td height="30" bgcolor="#f1f1f1"><b>&nbsp;Menu</b></td>
                            <?php
                            $MenusQuery = $DatabaseConnection->prepare("SELECT * FROM menus WHERE menus_type = 'Laptop' order by menus_name ASC");
                            $MenusQuery->execute();
                            $MenusNumber = $MenusQuery->rowCount();
                            $MenusSaving = $MenusQuery->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($MenusSaving as $menu) {
                                ?>
                                <tr height="30">
                                    <td> <a href="index.php?PN=84&menuID=<?php echo $menu["menus_id"]; ?>"
                                            style="text-decoration: none; <?php if ($ComingMenuID == $menu["menus_id"]) { ?> color:#f90; <? } else { ?> color:#646464; <?php } ?> font-weight: bold;">&nbsp;<?php echo $menu["menus_name"]; ?> (<?php echo $menu["menus_productsNumber"]; ?>)</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                            <td height="30" bgcolor="#f1f1f1"><b>&nbsp;ADVERTISEMENT</b></td>
                            <?php
                            $BannerQuery = $DatabaseConnection->prepare("SELECT * FROM banner WHERE banner_area = 'Menu Alti' order by banner_gösterimSayisi ASC LIMIT 1");
                            $BannerQuery->execute();
                            $BannerNumber = $BannerQuery->rowCount();
                            $BannerSaving = $BannerQuery->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <tr height="250">
                                <td><img src="Pictures/<?php echo $BannerSaving["banner_picture"]; ?>" border="0"></td>
                            </tr>
                            <?php
                            $BannerUpdate = $DatabaseConnection->prepare("UPDATE banner set banner_gösterimSayisi=banner_gösterimSayisi+1 WHERE banner_id = ? LIMIT 1");
                            $BannerUpdate->execute([$BannerSaving["banner_id"]]);
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>

        <td width="20" align="left">&nbsp;</td>


        <td width="850" align="left" valign="top">
            <table width="850" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <div class="searchingArea">
                            <form action="index.php?PN=85" method="post">
                                <div class="searchingAreaButtonArea">
                                    <input type="submit" value="" class="searchingAreaButton">
                                </div>
                                <div class="searchingAreaInputArea">
                                    <input type="text" name="searching" class="searchingAreaInput">
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="850" align="center" border="0" cellpadding="0" cellspacing="0">

                            <?php
                            $ProductQuery = $DatabaseConnection->prepare("SELECT * FROM products where products_type = 'Laptop' and products_situation = '1' order by products_id desc ");
                            $ProductQuery->execute();
                            $ProductNumber = $ProductQuery->rowCount();
                            $Products = $ProductQuery->fetchAll(PDO::FETCH_ASSOC);
                            $cyclesNumber = 1;
                            $columnNumber = 4;
                            foreach ($Products as $key) {
                                ?>
                                <td width="205">
                                    <table align="center" border="1" cellpadding="0" cellspacing="0"
                                        style="border: 1px solid #ccc; margin-bottom: 10px ; margin-bottom:20px;">
                                        <tr height="40">
                                            <td align="center"><img
                                                    src="Pictures/ProductsPictures/laptop/<?php echo $key["products_picture1"]; ?>"
                                                    border="0" width="200" height="200">
                                            </td>
                                        </tr>
                                        <tr height="25">
                                            <td width="25">
                                                <?php echo $key["products_name"]; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <?php
                                if ($cyclesNumber < $columnNumber) {
                                    ?>
                                    <td width="1">&nbsp;</td>
                                    <?php
                                }
                                ?>
                                <?php
                                $cyclesNumber++;
                                if ($cyclesNumber > $columnNumber) {
                                    echo "</tr><tr>";
                                    $cyclesNumber = 1;

                                }
                            }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>