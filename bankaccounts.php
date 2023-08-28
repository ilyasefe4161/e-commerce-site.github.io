<table width="1120" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr height="50" bgcolor="orange">
        <td align="left">
            <h2>&nbsp;Bank Accounts</h2>
        </td>
    </tr>
    <tr height="50">
        <td align="left" style="border-bottom: 1px dashed #ccc;">&nbsp;Ödemeleriniz için çalişmakta olduğumuz tüm banka
            hesaplari asagidadir</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <table width="1120" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <?php
                    $BankQuery = $DatabaseConnection->prepare("SELECT * FROM bankaccounts");
                    $BankQuery->execute();
                    $BankNumber = $BankQuery->rowCount();
                    $Banks = $BankQuery->fetchAll(PDO::FETCH_ASSOC);

                    $cyclesNumber = 1;
                    $columnNumber = 3;
                    foreach ($Banks as $key) {
                        ?>
                        <td width="348">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #ccc; margin-bottom: 10px;"
                                ; margin-bottom:20px>
                                <tr height="40">
                                    <td colspan="4" align="center"><img src="Pictures/<?php echo DonusumleriGeriDondur($key["bankLogo"]); ?>" border="0"></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td width="140"><b>Bank Name</b></td>
                                    <td width="10">:</td>
                                    <td width="253"><?php echo DonusumleriGeriDondur($key["bankName"]); ?></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td><b>City / Country</b></td>
                                    <td>:</td>
                                    <td><?php echo DonusumleriGeriDondur($key["City"]) ?> / <?php echo DonusumleriGeriDondur($key["Country"]); ?></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td><b>Branch Name</b></td>
                                    <td>:</td>
                                    <td><?php echo DonusumleriGeriDondur($key["branchName"]); ?></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td><b>Branch Code</b></td>
                                    <td>:</td>
                                    <td><?php echo DonusumleriGeriDondur($key["branchCode"]); ?></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td><b>Currency</b></td>
                                    <td>:</td>
                                    <td><?php echo DonusumleriGeriDondur($key["currency"]); ?></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td><b>Account Holder</b></td>
                                    <td>:</td>
                                    <td><?php echo DonusumleriGeriDondur($key["accountHolder"]); ?></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td><b>Account Number</b></td>
                                    <td>:</td>
                                    <td><?php echo DonusumleriGeriDondur($key["accountNumber"]); ?></td>
                                </tr>
                                <tr height="25">
                                    <td width="5">&nbsp;</td>
                                    <td><b>IBAN</b></td>
                                    <td>:</td>
                                    <td><?php echo IBANBicimlendir(DonusumleriGeriDondur($key["Iban"])); ?></td>
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



                </tr>
            </table>
        </td>
    </tr>
</table>