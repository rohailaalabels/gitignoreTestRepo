<?php
error_reporting(1);
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2); ?>
<style>
    body {
        font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
    }

    tr {
        font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
    }

    td {
        font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
        font-size: 11px;
    }

    tr.table_blue_bar {
        border-bottom: 1px solid #cccccc;
        width: 100%;
    }

    tr.table_white_bar {
        background-color: #F0F0F0;
        border-bottom: 1px solid #cccccc;
        width: 100%;
    }

    .invoicetable_PCode_loop {
        border-bottom: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: left;
        width: 10% px;
    }

    .invoicetable_description_loop {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: left;
        width: 80%;
    }

    .invoicetable_sml_headings_loop {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: center;
        width: 15%;
    }

    .invoicetable_Qty_loop {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: center;
        width: 10%;
    }

    .line_total_loop {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px 0 5px 5px;
        text-align: center;
        width: 70px;
    }

    .invoicetable_PCode {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: left;
        width: 15%;
        color: #fff;
    }

    .invoicetable_description {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: left;
        width: 50%;
        color: #fff;
    }

    .invoicetable_sml_headings {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: center;
        width: 15%;
        color: #fff;
    }

    .invoicetable_Qty {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: center;
        width: 10%;
        color: #fff;
    }

    .invoicetable_Qty22 {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        width: 4%;
    }

    .invoicetable_sml_headings2 {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        font-weight: bold;
        padding: 5px;
        text-align: center;
        width: 15%;
    }

    .invoicetable_Qty2 {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        font-weight: bold;
        padding: 5px;
        text-align: center;
        width: 10%;
    }

    .invuice_subtotal {
        border-bottom: 1px solid #cccccc;
        border: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px 10px 5px 5px;
        text-align: left;
    }

    .invuice_subtotal_price {
        border-bottom: 1px solid #cccccc;
        border: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px 0 5px 5px;
        text-align: left;
    }

    .invoicetable_bgBlue {
        background-color: #17b1e3;
        border-right: 1px solid #cccccc;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: center;
        color: #fff;
    }

    .invoicetable_tabel_border {
        border-bottom: 1px solid #cccccc;
        border-right: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
    }
</style>

<table width="100%" align="center" border="0" cellspacing="0">
    <tr>
        <td><? if ($OrderInfo['Domain'] == "PLO") { ?>
                <img onerror='imgError(this);' src="<?= PLOGO ?>" border="0" width="160" height="66"/>.
            <? } else { ?>
                <img onerror='imgError(this);' src="<?php echo Assets; ?>images/logo.png" border="0" width="160"
                     height="66"/>
            <? } ?></td>
        <td width="30%" align="left" valign="middle"><?php
            if ($OrderInfo['OrderStatus'] == 6) {
                echo '<strong style="font-size:14px;" >Pro-forma Invoice : <font color="#000000"> ' . $quoteID = $OrderInfo['OrderNumber'] . '</font></strong>';
            } else {
                echo 'Order Number : <font color="#000000"> ' . $quoteID = $OrderInfo['OrderNumber'] . '</font>';
            }
            ?></td>
    </tr>
</table>
<br>
</br>
<table width="100%" align="center" border="0" cellspacing="0">
    <tr>
        <td align="left" valign="top" class="print_address" width="50%"><!-- ------------------------------------->

            <table width="100%" border="0">
                <tr>
                    <? if ($OrderInfo['Domain'] == "PLO") { ?>
                        <td align="left" class="print_address">Printed Labels Online,</td>
                    <? } else { ?>
                        <td align="left" class="print_address">AA Labels,</td>
                    <? } ?>
                </tr>
                <tr>
                    <td align="left" valign="top" class="print_address">23 Wainman Road,</td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="print_address">Peterborough,</td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="print_address">PE2 7BU</td>
                </tr>
            </table>

            <!-- -------------------------------------></td>
        <td align="left" valign="top" width="50%">
            <table width="100%" border="0">
                <tr>
                    <td align="left" class="print_address"><strong style="margin-left:80px;">Phone: </strong></td>
                    <td align="left" class="print_address"><span class="phone_right">
            <? if ($OrderInfo['Domain'] == "PLO") {
                echo PLOPHONE; ?>
            <? } else { ?>
                01733 588 390
            <? } ?>
            </span></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="print_address"><strong
                                style="margin-left:80px;">Email: </strong></td>
                    <td align="left" valign="top" class="print_address"><span class="phone_right">
            <? if ($OrderInfo['Domain'] == "PLO"){ ?>
            <a href="mailto:customercare@printedlabelsonline.com" style="text-decoration:none; color:#257cac;">customercare@printedlabelsonline.com</a></span>
                        <? } else { ?>
                            <a href="mailto:customercare@aalabels.com" style="text-decoration:none; color:#257cac;">customercare@aalabels.com</a></span>
                        <? } ?>
                </tr>
                <tr>
                    <td align="left" valign="top" class="print_address"><strong style="margin-left:80px;">VAT
                            No: </strong></td>
                    <td align="left" valign="top" class="print_address"><span class="phone_right">GB 945 028 620</span>
                    </td>
                </tr>
            </table>
        </td>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#CCCCCC 1px solid; padding-bottom:10px;">
    <tr>
        <td align="left" style="background-color:#17b1e3; border-bottom:#CCCCCC 1px solid; line-height:0px;height:30px;"
            width="100%"><h3 style="padding-top:-10px; white-space:nowrap;color:#fff;padding-left:5px;">Order
                Detail</h3></td>
    </tr>
    <tr>
        <td align="left" valign="top" style="padding-top:10px;" width="100%">
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td class="print_address"><b>Order Number:</b></td>
                    <td class="print_address"><b>Date:</b></td>
                    <td class="print_address"><b>Time:</b></td>
                    <td class="print_address"><b>Status:</b></td>
                </tr>
                <tr>
                    <td class="print_address" width="50%"><?php echo $OrderInfo['OrderNumber']; ?></td>
                    <td class="print_address" width="50%"><?php echo date('jS F Y', $OrderInfo['OrderDate']); ?></td>
                    <td class="print_address" width="50%"><?php echo date('h:i:s A', $OrderInfo['OrderTime']); ?></td>
                    <td class="print_address" width="50%"><?php
                        $status = $this->accountModel->getstatus($OrderInfo['OrderStatus']);
                        echo $status[0]->StatusTitle;
                        ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#CCCCCC 1px solid; padding-bottom:10px;">
    <tr>
        <td width="50%" border="0" cellspacing="0" cellpadding="0" align="left" valign="middel">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"
                        style="background-color:#17b1e3; border-bottom:#CCCCCC 1px solid; line-height:0px;height:30px"
                        valign="middel" width="50%"><h3
                                style="padding-top:7px;white-space:nowrap; text-align:left;color:#fff;">&nbsp;&nbsp;Billing
                            address</h3></td>
                </tr>
                <tr>
                    <td align="left" valign="top" style="padding-top:10px;padding-left:5px">
                        <table width="100%" border="0" cellspacing="4" cellpadding="0">
                            <tr>
                                <td align="left" style="width: 30%"><b>Company : </b></td>
                                <td style="width: 70%"><?= $OrderInfo['BillingCompanyName'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Name : </b></td>
                                <td><?= $OrderInfo['BillingFirstName'] . ' ' . $OrderInfo['BillingLastName'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Email : </b></td>
                                <td><?= $OrderInfo['Billingemail'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Address :</b></td>
                                <td><?= $OrderInfo['BillingAddress1'] ?>
                                    &nbsp;
                                    <?= $OrderInfo['BillingAddress2'] ?></td>
                            </tr>
                            <tr>
                                <td><b>City :</b></td>
                                <td><?= $OrderInfo['BillingTownCity'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Country :</b></td>
                                <td><?= $OrderInfo['BillingCountry'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Postcode</b></td>
                                <td><?= $OrderInfo['BillingPostcode'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Telephone</b></td>
                                <td><?= $OrderInfo['Billingtelephone'] ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>

        <!-- -------------------------------------------->

        <td width="50%" border="0" cellspacing="0" cellpadding="0" align="left" valign="top"
            style="border:#CCCCCC 1px solid; padding-bottom:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"
                        style="background-color:#17b1e3; border-bottom:#CCCCCC 1px solid; line-height:0px;height:30px"
                        valign="middel" width="50%"><h3
                                style="padding-top:7px; white-space:nowrap; text-align:left;color:#fff;"><span
                                    style="white-space:nowrap;">&nbsp;&nbsp;Delivery address</span></h3></td>
                </tr>
                <tr>
                    <td align="left" valign="top" style="padding-top:10px; padding-left:5px;">
                        <table width="100%" border="0" cellspacing="4" cellpadding="0">
                            <tr style="padding-top:10px; padding-left:5px;">
                                <td align="left" style="width:30%;"><b>Company : </b></td>
                                <td style="width: 70%"><?= $OrderInfo['DeliveryCompanyName'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Name : </b></td>
                                <td><?= $OrderInfo['DeliveryFirstName'] . ' ' . $OrderInfo['DeliveryLastName'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Email : </b></td>
                                <td><?= $OrderInfo['Billingemail'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Address :</b></td>
                                <td><?= $OrderInfo['DeliveryAddress1'] ?>
                                    &nbsp;
                                    <?= $OrderInfo['DeliveryAddress2'] ?></td>
                            </tr>
                            <tr>
                                <td><b>City :</b></td>
                                <td><?= $OrderInfo['DeliveryTownCity'] ?></td>
                            </tr>
                            <tr>
                                <td><b> Country :</b></td>
                                <td><?= $OrderInfo['DeliveryCountry'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Postcode</b></td>
                                <td><?= $OrderInfo['DeliveryPostcode'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Telephone</b></td>
                                <td><?= $OrderInfo['Deliverytelephone'] ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- -------------------------------------------->
<?
$OrderInfo['currency'] = (isset($OrderInfo['currency']) && $OrderInfo['currency'] != '') ? $OrderInfo['currency'] : 'GBP';
$exchange_rate = (isset($OrderInfo['exchange_rate']) && $OrderInfo['exchange_rate'] != 0) ? $OrderInfo['exchange_rate'] : 1;
$symbol = $this->accountModel->get_currecy_symbol($OrderInfo['currency']);
if ($exchange_rate == 0) {
    $exchange_rate = 1;
}
?>
<table width="527" bordercolor="#CCCCCC" cellspacing="0" cellpadding="0"
       style="border:#CCCCCC 1px solid; padding-bottom:0px;table-layout:fixed;">
    <tr>
        <td class="invoicetable_bgBlue" width="20%">Product Code</td>
        <td class="invoicetable_bgBlue" width="65%">Description</td>
        <td class="invoicetable_bgBlue" width="8%">Labels</td>
        <td class="invoicetable_bgBlue" width="10%">Quantity</td>
        <td class="invoicetable_bgBlue" width="10%">Ex.vat</td>
    </tr>
    <?php
    $total_exvat = 0;
    $total_invat = 0;
    $i = 0;
    foreach ($OrderDetails as $AccountDetail) {
        $print_exvat = 0;
        $print_incvat = 0;

        if ($i % 2 == 0) {
            $css = "class='table_blue_bar'";
        } else {
            $css = "class='table_white_bar'";
        }

        $LabelsPerSheet = 1;
        $colorcode = (isset($AccountDetail->colorcode) and $AccountDetail->colorcode != '') ? '-' . $AccountDetail->colorcode : '';
        $img = $this->accountModel->getproductimg($AccountDetail->ProductID, $colorcode);


        if ($AccountDetail->ProductID == 0) {
            $ManufactureID = $AccountDetail->ManufactureID;
        } else {
            $ManufactureID = $this->accountModel->manufactureid("", $AccountDetail->ProductID);
            $LabelsPerSheet = $this->accountModel->LabelsPerSheet($AccountDetail->ProductID);
            if (isset($AccountDetail->is_custom) and $AccountDetail->is_custom == 'Yes') {
                $LabelsPerSheet = $AccountDetail->LabelsPerRoll;
            }
        }

        $total_labels = $LabelsPerSheet * $AccountDetail->Quantity;
        if ($AccountDetail->Printing == 'Y') {
            $labels = $this->accountModel->calculate_total_printed_labels($AccountDetail->SerialNumber);
            if ($labels > 0) {
                $total_labels = $labels;
            }
        }
        if ($OrderInfo['PaymentMethods'] == 'SampleOrder' || $AccountDetail->ProductID == 0) {
            $total_labels = '-';
        }
        ?>
        <tr>
            <td class="invoicetable_tabel_border"><?= $ManufactureID ?></td>
            <td class="invoicetable_tabel_border"
                style="width:360px !important;"><?php $prod_name = $this->accountModel->ReplaceHtmlToString_($AccountDetail->ProductName);
                echo $prod_name;
                if ($ManufactureID == "SCO1") {
                    $custominfo = $this->accountModel->fetch_custom_die_order($AccountDetail->SerialNumber);
                    include('assc_die.php');
                }
                ?></td>
            <td align="center" class="invoicetable_tabel_border"><?php
                $is_order_is_sample = $this->accountModel->is_Sample_Order($AccountDetail->OrderNumber);
                if ($is_order_is_sample == false) {
                    echo $total_labels;
                } else {

                    echo $is_order_is_sample;
                } ?></td>
            <td align="center" class="invoicetable_tabel_border"><?php echo $AccountDetail->Quantity; ?></td>
            <td align="center"
                class="invoicetable_tabel_border"><?php $exvat = number_format($AccountDetail->Price, 2, '.', '');
                echo $symbol . "" . (number_format($exvat * $exchange_rate, '2', '.', ''));
                ?></td>
        </tr>
        <? if ($AccountDetail->Printing == "Y") { ?>
            <tr>
                <td class="invoicetable_tabel_border">Printing</td>
                <?php $print_style = 'font-size: 8px;';
                include('print_line_txt.php'); ?>
                <td class="invoicetable_tabel_border" align="center">&nbsp;</td>
                <td class="invoicetable_tabel_border" align="center"><?php echo $AccountDetail->Print_Qty; ?></td>
                <td class="invoicetable_tabel_border" align="center"><? $print_exvat = $AccountDetail->Print_Total;
                    echo $symbol . "" . (number_format($print_exvat * $exchange_rate, 2));
                    ?></td>
            </tr>
        <? } ?>
        <? if ($ManufactureID == "PRL1") {
            $result = $this->accountModel->get_details_roll_quotation($AccountDetail->Prl_id); ?>
            <tr>
                <td class="invoicetable_tabel_border"></td>
                <td class="invoicetable_tabel_border"></td>
                <td class="invoicetable_tabel_border"><b>Shape:</b>
                    <?= $result['shape'] ?>
                    &nbsp;&nbsp; <b>Size:</b>
                    <?= $result['size'] ?>
                    &nbsp;&nbsp; <b>Material:</b>
                    <?= $result['material'] ?>
                    &nbsp;&nbsp; <b>Printing:</b>
                    <?= $result['printing'] ?>
                    &nbsp;&nbsp; <b>Finishing:</b>
                    <?= $result['finishing'] ?>
                    &nbsp;&nbsp; <b>No. Designs:</b>
                    <?= $result['no_designs'] ?>
                    &nbsp;&nbsp; <b>No. Rolls:</b>
                    <?= $result['no_rolls'] ?>
                    &nbsp;&nbsp; <b>No. labels:</b>
                    <?= $result['no_labels'] ?>
                    &nbsp;&nbsp; <b>Core Size:</b>
                    <?= $result['coresize'] ?>
                    &nbsp;&nbsp; <b>Wound:</b>
                    <?= $result['wound'] ?>
                    &nbsp;&nbsp;<b>Notes:</b>
                    <?= $result['notes'] ?>
                    &nbsp;&nbsp;
                </td>
                <td class="invoicetable_tabel_border" align="center"></td>
                <td class="invoicetable_tabel_border" align="center"></td>
                <td class="invoicetable_tabel_border" align="center"></td>
                <td class="invoicetable_tabel_border" align="center"></td>
            </tr>
        <? } ?>
        <? if ($ManufactureID == "SCO1" && $AccountDetail->Linescompleted == 0) {
            $print_exvat = $print_incvat = 0;
            include('assc_material.php');
        }
        ?>
        <tr>
            <td colspan="2" class="invoicetable_tabel_border"></td>
            <td colspan="2" class="invoicetable_tabel_border" align="center"><b>Line Total</b></td>
            <td class="invoicetable_tabel_border"
                align="center"><? $linetotalexvat = ($print_exvat + $exvat) * $exchange_rate;
                echo $symbol . "" . (number_format($linetotalexvat, 2));
                ?></td>
        </tr>
        <?php
        $total_exvat += $linetotalexvat;
        $i++;

    } // end foreach


    if ($OrderInfo['voucherOfferd'] == 'Yes') {
        $discount = $OrderInfo['voucherDiscount'];
    } else if ($OrderInfo['DiscountInPounds'] != 0.00) {
        $discount = $OrderInfo['DiscountInPounds'];
    } else {
        $discount = 0.00;
    }

    $vatRate = vat_rate;
    $ship_invat = number_format($OrderInfo['OrderShippingAmount'] * $exchange_rate, 2, '.', '');
    $ordertotal = number_format($OrderInfo['OrderTotal'] + $OrderInfo['OrderShippingAmount'], 2, '.', '');

    ?>
</table>
<br/>
<br/>
<table width="280px;" align="right" style="table-layout:fixed;">
    <tr>
        <td colspan="4" class="invuice_subtotal" width="65%"><b>Delivery Total</b></td>
        <td class="invuice_subtotal_price"
            width="20%"><? echo $symbol . "" . (number_format(($ship_invat / 1.2), 2, '.', '')); ?></td>
    </tr>
    <tr>
        <td colspan="4" class="invuice_subtotal" width="65%"><b>Sub Total (Ex. Vat)</b></td>
        <td class="invuice_subtotal_price"
            width="20%"><? echo $symbol . "" . (number_format(($total_exvat) + ($ship_invat / 1.2), 2, '.', '')); ?></td>
    </tr>
    <? if ($discount > 0) {
        //$ordertotal = number_format($ordertotal-$discount,2,'.','');
        ?>
        <tr>
            <td colspan="4" class="invuice_subtotal" width="65%"><b>Discount</b></td>
            <td class="invuice_subtotal_price"
                width="20%"><? echo $symbol . "" . (number_format($discount * $exchange_rate, 2, '.', '')); ?></td>
        </tr>
    <? } ?>
    <? if ($OrderInfo['vat_exempt'] == 'yes') {
        $oldordertotal = $ordertotal;
        $ordertotal = number_format($ordertotal / 1.2, 2, '.', '');
        $exemption = $oldordertotal - $ordertotal;
        ?>
        <tr>
            <td colspan="4" class="invuice_subtotal" width="65%"><b>VAT Exempt:</b></td>
            <td class="invuice_subtotal_price" width="20%">
                - <? echo $symbol . "" . (number_format($exemption * $exchange_rate, 2, '.', '')); ?></td>
        </tr>
    <? } ?>
    <tr>
        <td colspan="4" class="invuice_subtotal" width="65%"><b>Sub Total (In. Vat)</b></td>
        <td class="invuice_subtotal_price"
            width="20%"><? echo $symbol . "" . (number_format($ordertotal * $exchange_rate, 2, '.', '')); ?></td>
    </tr>
    <tr>
        <td colspan="4" class="invuice_subtotal" width="65%"><b>Grand Total:</b></td>
        <td class="invuice_subtotal_price" width="20%">
            <b><? echo $symbol . "" . (number_format($ordertotal * $exchange_rate, 2, '.', '')); ?></b></td>
    </tr>
</table>

<?php if ($OrderInfo['PaymentMethods'] == "chequePostel") { ?>
    <style>
        .flyleaf {
            page-break-after: always;
        }

        .footer p {
            font-size: 13px !important;
            line-height: 15px;
            margin-top: 5px !important;
        }

        .footer b {
            font-size: 13px !important;
        }
    </style>

    <div class="flyleaf"></div>
    <p><strong>Please note:</strong></p>
    <p>Your order is currently unpaid and will not proceed for production until payment has been received. Your payment
        reference is the order number shown above and the payment options are as follows:</p>
    <ol>
        <li>DEBIT/CREDIT CARD (Call our customer care team on 01733 588390)</li>
        <li>BACS TRANSFER
            <ul>
                <li><strong>Account Name:</strong> Green Technologies Limited T/A AA Labels</li>
                <li><strong>Sort Code: </strong>40-36-15</li>
                <li><strong>A/c No. </strong>52385724</li>
                <li><strong>IBAN: </strong>GB87MIDL40361552385724</li>
                <li><strong>SWIFT/BIC: </strong> HBUKGB4108R</li>
            </ul>
        </li>
        <li>PAYPAL ebay@aalabels.com</li>
    </ol>
    <p>VAT No. 945 0286 20</p>
    <p>AA Labels 23 Wainman Road, Peterborough PE2 7BU</p>
<?php } ?>
