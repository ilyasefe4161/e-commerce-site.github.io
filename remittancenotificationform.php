<table width="1120" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="540" valign="top">
            <form action="index.php?PN=10" method="post">
                <table width="560" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr height="40">
                        <td style="color:#f90">
                            <h3>Remittance Notification Form</h3>
                        </td>
                    </tr>
                    <tr valign="top" height="30">
                        <td style="border-bottom: 1px dashed #ccc;">Submit your completed payment transaction using the
                            form
                            below.</td>
                    </tr>
                    <tr height="30">
                        <td valign="bottom" align="left">Name Surname (*)</td>
                    </tr>
                    <tr height="30">
                        <td valign="top"><input type="text" name=name_surname class="inputArea"></td>
                    </tr>
                    <tr height="30">
                        <td valign="bottom" align="left">E-mail Adress (*)</td>
                    </tr>
                    <tr height="30">
                        <td valign="top"><input type="email" name=email_adress class="inputArea"></td>
                    </tr>
                    <tr height="30">
                        <td valign="bottom" align="left">Telephone Number (*)</td>
                    </tr>
                    <tr height="30">
                        <td valign="top"><input type="text" name=telephone_number maxlength="11" class="inputArea"></td>
                    </tr>
                    <tr height="30">
                        <td valign="bottom" align="left">Payment Bank (*)</td>
                    </tr>
                    <tr height="30">
                        <td valign="top"><select name="SelectBank" class="selectArea" id="">
                                <?php
                                // $SettingsQuery = $DatabaseConnection->prepare("SELECT * FROM settings LIMIT 1");
                                $BanksQuery = $DatabaseConnection->prepare("SELECT * FROM bankaccounts ORDER BY bankName ASC");
                                $BanksQuery->execute();
                                $BanksNumber = $BanksQuery->rowCount();
                                $Banks = $BanksQuery->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($Banks as $bank) {
                                    ?>
                                    <option value="<?php echo DonusumleriGeriDondur($bank["id"]); ?>"><?php echo DonusumleriGeriDondur($bank["bankName"]); ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr height="30">
                        <td valign="bottom">Description</td>
                    </tr>
                    <tr height="30">
                        <td valign="top"><textArea name="descriptions" class="textArea"></textArea></td>
                    </tr>
                    <tr height="40">
                        <td align="center"><input type="submit" value="Submit" class="greenButtonArea"></td>
                    </tr>
                </table>
            </form>
        </td>
        <td width="560" valign="top">
            <table width="540" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="40">
                    <td colspan="2" style="color:#f90">
                        <h3>Operation</h3>
                    </td>
                </tr>
                <tr height="30">
                    <td colspan="2" valign="top" style="border-bottom: 1px dashed #ccc;">Remittance / EFT Operations
                        Control</td>
                </tr>
                <td width="40">&nbsp;</td>
                <tr height="30">
                    <td align="left" width="40"><img src="Pictures/bank.png" border="0" style="margin-top:2px;"></td>
                    <td align="left"><b>Remittance / EFT Operations</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left">The customer first makes a payment to any account on our bank accounts
                        page.</td>
                </tr>
                <td colspan="2">&nbsp;</td>
                <tr height="30">
                    <td align="left" width="40"><img src="Pictures/notebook.png" border="0" style="margin-top:2px;">
                    </td>
                    <td align="left"><b>Notification Operation</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left">After completing the payment, the customer fills out the notification
                        form for the payment he has made and sends it online from the transfer notification form page.
                    </td>
                </tr>
                <td colspan="2">&nbsp;</td>
                <tr height="30">
                    <td align="left" width="40"><img src="Pictures/controls.png" border="0" style="margin-top:2px;">
                    </td>
                    <td align="left"><b>Controls</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left">As soon as your remittance notification form reaches us, the remittance
                        / EFT transaction you have made by the relevant department is checked through the relevant bank.
                    </td>
                </tr>
                <td width="40">&nbsp;</td>
                <tr height="30">
                    <td align="left" width="40"></td>
                    <td align="left"><b>Accepting / Cancellation</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left">If the transfer notification is valid, if the account has been paid,
                        the manager gives the relevant payment confirmation and your order is forwarded to the delivery
                        unit.</td>
                </tr>
                <td width="40">&nbsp;</td>
                <tr height="30">
                    <td align="left" width="40"></td>
                    <td align="left"><b>Order / Delivery</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left">After the manager's payment confirmation, the order you have placed on
                        our page is prepared as soon as possible, delivered to the cargo and delivered to you.</td>
                </tr>
            </table>
        </td>
    </tr>
</table>