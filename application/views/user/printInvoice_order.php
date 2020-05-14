<?php
@define('vat_rate', '1.2');
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);

?>
<style>
    body {
        font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
    }

    tr {
        font-size: 11px;
        font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
    }

    td {
        font-size: 11px;
        font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
    }

    tr.table_blue_bar {
        background-color: #edf5ff;
        border-bottom: 1px solid #cccccc;
        width: 100%;
    }

    tr.table_white_bar {
        background-color: #ffffff;
        border-bottom: 1px solid #cccccc;
        width: 100%;
    }

    .invoicetable_PCode_loop {
        border-bottom: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: left;
        width: 100px;
    }

    .invoicetable_description_loop {
        border-bottom: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: left;
        width: 60%;
    }

    .invoicetable_sml_headings_loop {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: center;
        width: 70px;
    }

    .invoicetable_Qty_loop {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px;
        text-align: center;
        width: 35px;
    }

    .line_total_loop {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 11px;
        padding: 5px 0 5px 10px;
        text-align: left;
        width: 70px;
    }

    .invoicetable_PCode {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        color: #000000;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: left;
        width: 100px;
        color: #fff;
    }

    .invoicetable_description {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        color: #000000;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: left;
        width: 60%;
        color: #fff;
    }

    .invoicetable_sml_headings {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: center;
        width: 70px;
        color: #fff;
    }

    .invoicetable_Qty {
        background-color: #17b1e3;
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        text-align: center;
        width: 35px;
        color: #fff;
    }

    .invuice_subtotal {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 12px;
        padding: 5px 10px 5px 0;
        text-align: right;
    }

    .invuice_subtotal_price {
        border-bottom: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
        color: #000000;
        font-size: 12px;
        padding: 5px 0 5px 10px;
        text-align: left;
    }
</style>

<table width="750px" border="0" cellspacing="10" style="margin-left:-5px;">
    <tr>
        <?php if ($OrderInfo[0]->Domain == '123') { ?>
            <td width="30%"><img onerror='imgError(this);' src="http://www.123-labels.co.uk/images/email_logo.png"></td>
        <?php } else { ?>
            <td width="30%"><img onerror='imgError(this);' src="<?php echo base_url(); ?>theme/site/images/logo.png"
                                 border="0" width="200" height="70"/></td>
        <?php } ?>
        <td width="30%">&nbsp;</td>
        <td width="30%" align="left" valign="middle"><h3 style="color:#999999;">
                <?php


                if ($OrderInfo[0]->OrderStatus == 6) {
                    echo 'Pro-forma Invoice : <font color="#000000"> ' . $quoteID = $OrderInfo[0]->OrderNumber . '</font>';
                } else {
                    echo 'Order Number : <font color="#000000"> ' . $quoteID = $OrderInfo[0]->OrderNumber . '</font>';

                }


                ?>
            </h3></td>
    </tr>
    <tr>
        <td align="left" valign="top" class="print_address">
             <table width="100%" border="0">
                <tr>
                    <td align="left" class="print_address">AA Labels, </td>
                </tr>
                <tr>
                    <td align="left" class="print_address">Trading name of Green Technologies Ltd.</td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="print_address">23 Wainman Road, Peterborough, PE2 7BU</td>
                </tr>
            </table>    
        </td>
        
        <td align="right" valign="top">
            <table width="100%" border="0">
                <tr>
                    <td align="right" class="print_address">Phone:</td>
                </tr>
                <!-- <tr>
                   <td align="right" valign="top" class="print_address">Fax: </td>
                 </tr>-->
                <tr>
                    <td align="right" valign="top" class="print_address">Email:</td>
                </tr>
                <tr>
                    <td align="right" valign="top" class="print_address">VAT No:</td>
                </tr>
            </table>
        </td>
        <td align="left" valign="top">
            <table width="100%" border="0">
                <tr>
                    <td align="left" class="print_address"><span class="phone_right">01733 588 390</span></td>
                </tr>
                <!-- <tr>
                   <td align="left" valign="top" class="print_address">01733 425 106 </td>
                 </tr>-->
                <tr>

                    <td align="left" valign="top" class="print_address"><span class="phone_right">
            <?php if ($OrderInfo[0]->Domain == '123') { ?>
                <a href="helpdesk@123-labels.co.uk" style="text-decoration:none; color:#000000;">helpdesk@123-labels.co.uk</a>
            <?php } else { ?>
                <a href="mailto:customercare@aalabels.com" style="text-decoration:none; color:#000000;">customercare@aalabels.com</a>
            <?php } ?>
            </span></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="print_address"><span class="phone_right">GB 945 028 620</span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="left" valign="top" style="border:#CCCCCC 1px solid; padding-bottom:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"
                        style="background-color:#17b1e3; border-bottom:#CCCCCC 1px solid; line-height:5px;"><h3
                                style="padding-top:15px; white-space:nowrap; text-align:center;color:#fff;">Order
                            Information</h3></td>
                </tr>
                <tr>
                    <td align="left" valign="top" style="padding-top:10px;">
                        <table width="100%" border="0" cellspacing="3" cellpadding="0">
                            <tr>
                                <td class="print_address"><b>Order Number:</b></td>
                                <td class="print_address"><?php echo $OrderInfo[0]->OrderNumber; ?></td>
                            </tr>

                            <!-- <tr>
           <td class="print_address"><b>Order:</b></td>
           <td class="print_address"><?
                            if ($OrderInfo[0]->PaymentMethods == "specialOrders") {
                                echo "Special orders";
                            } elseif ($OrderInfo[0]->Source == "website") {
                                echo "Website";
                            } elseif ($OrderInfo[0]->PaymentMethods == "SampleOrder") {
                                echo "Request Samples";
                            }
                            ?></td>
         </tr> -->

                            <? if ($OrderInfo[0]->PurchaseOrderNumber != "" && $OrderInfo[0]->PurchaseOrderNumber != 0) { ?>
                                <tr>
                                    <td class="print_address"><b>PO.Number:</b></td>
                                    <td class="print_address"><?php echo $OrderInfo[0]->PurchaseOrderNumber; ?></td>
                                </tr>

                            <? } ?>

                            <tr>
                                <td class="print_address"><b>Date:</b></td>
                                <td class="print_address"><?php echo date('jS F Y', $OrderInfo[0]->OrderDate); ?></td>
                            </tr>
                            <tr>
                                <td class="print_address"><b>Time:</b></td>
                                <td class="print_address"><?php echo date('h:i:s A', $OrderInfo[0]->OrderTime); ?></td>
                            </tr>
                            <tr>
                                <td class="print_address"><b>Status:</b></td>
                                <td class="print_address"><?php
                                    $status = $this->accountModel->getstatus($OrderInfo[0]->OrderStatus);
                                    echo $status[0]->StatusTitle;

                                    ?>
                                    <? //$objOrders->getStatusTitle($OrderInfo[0]['OrderStatus']) ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td align="left" valign="top" style="border:#CCCCCC 1px solid; padding-bottom:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"
                        style="background-color:#17b1e3; border-bottom:#CCCCCC 1px solid; line-height:5px;"><h3
                                style="padding-top:15px; white-space:nowrap; text-align:center;color:#fff;">Billing
                            address</h3></td>
                </tr>
                <tr>
                    <td align="left" valign="top" style="padding-top:10px; padding-left:5px;">
                        <div class="print_address">
                            <?= $OrderInfo[0]->BillingCompanyName ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->BillingFirstName . ' ' . $OrderInfo[0]->BillingLastName ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->BillingAddress1 ?>
                        </div>
                        <?
                        if ($OrderInfo[0]->BillingAddress2) {
                            ?>
                            <div class="print_address">
                                <?= $OrderInfo[0]->BillingAddress2 ?>
                            </div>
                        <? } ?>
                        <div class="print_address">
                            <?= $OrderInfo[0]->BillingTownCity ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->BillingCountyState ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->BillingPostcode ?>
                        </div>

                        <!--<div class="print_address">BillingCountry<? //$OrderInfo[0]['BillingCountry']?></div>-->

                        <div class="print_address">
                            <?= $OrderInfo[0]->Billingtelephone ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->Billingfax ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->Billingemail ?>
                        </div>
                        <div class="print_address">
                            <?
                            if ($OrderInfo[0]->BillingResCom == 1) {
                                echo "Residential";
                            } else {
                                echo "Commercial";
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td align="left" valign="top" style="border:#CCCCCC 1px solid; padding-bottom:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"
                        style="background-color:#17b1e3; border-bottom:#CCCCCC 1px solid; line-height:5px;"><h3
                                style="padding-top:15px; white-space:nowrap; text-align:center;color:#fff;"><span
                                    style="white-space:nowrap;">Delivery address</span></h3></td>
                </tr>
                <tr>
                    <td align="left" valign="top" style="padding-top:10px; padding-left:5px;">
                        <div class="print_address">
                            <?= $OrderInfo[0]->DeliveryCompanyName ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->DeliveryFirstName . ' ' . $OrderInfo[0]->DeliveryLastName ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->DeliveryAddress1 ?>
                        </div>
                        <? if ($OrderInfo[0]->DeliveryAddress2) { ?>
                            <div class="print_address">
                                <?= $OrderInfo[0]->DeliveryAddress2 ?>
                            </div>
                        <? } ?>
                        <div class="print_address">
                            <?= $OrderInfo[0]->DeliveryTownCity ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->DeliveryCountyState ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->DeliveryPostcode ?>
                        </div>

                        <!--<div class="print_address">BillingCountry<?= $OrderInfo[0]->BillingCountry ?></div>-->

                        <div class="print_address">
                            <?= $OrderInfo[0]->DeliveryTownCity ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->Deliverytelephone ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->Deliveryfax ?>
                        </div>
                        <div class="print_address">
                            <?= $OrderInfo[0]->Billingemail ?>
                        </div>
                        <div class="print_address">
                            <?
                            if ($OrderInfo[0]->DeliveryResCom == 1) {
                                echo "Residential";
                            } else {
                                echo "Commercial";
                            }
                            ?>

                            <?
                            $OrderInfo[0]->currency = (isset($OrderInfo[0]->currency) && $OrderInfo[0]->currency != '') ? $OrderInfo[0]->currency : 'GBP';
                            $exchange_rate = (isset($OrderInfo[0]->exchange_rate) && $OrderInfo[0]->exchange_rate != 0) ? $OrderInfo[0]->exchange_rate : 1;
                            $symbol = $this->accountModel->get_currecy_symbol($OrderInfo[0]->currency);
                            ?>


                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="3" align="left" valign="top" style="border:#CCCCCC 1px solid; padding-bottom:10px;">
            <table width="1095px;" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="invoicetable_PCode">Product Code</td>
                    <td class="invoicetable_description">Description</td>
                    <td class="invoicetable_Qty">Labels</td>
                    <td class="invoicetable_Qty">Qty</td>
                    <td class="invoicetable_sml_headings">Unit Price</td>
                    <td class="invoicetable_sml_headings" style="padding:5px 0 5px 10px; text-align:left;">Line total
                    </td>
                </tr>
                <?php

                $exvat = 0;
                $incvat = 0;
                $exVatPrice = 0;
                $incVatPrice = 0;
                $currencySymbol = $symbol;
                for ($i = 0; $i < count($OrderDetails); $i++) {

                    $LabelsPerSheet = 1;
                    if ($i % 2 == 0) {
                        $css = "class='table_blue_bar'";
                    } else {
                        $css = "class='table_white_bar'";
                    }

                    if ($OrderDetails[$i]->ProductID == 0) {

                        $ManufactureID = $OrderDetails[$i]->ManufactureID;
                        $productName = $OrderDetails[$i]->ProductName;
                        $Price = $OrderDetails[$i]->Price;
                        $Quantity = $OrderDetails[$i]->Quantity;
                        $Btndisplays = 'display:inline;';

                    } else {

                        $ManufactureID = $this->accountModel->manufactureid("", $OrderDetails[$i]->ProductID);
                        $productName = $OrderDetails[$i]->ProductName;
                        $Price = $OrderDetails[$i]->Price;
                        $Quantity = $OrderDetails[$i]->Quantity;
                        $Btndisplays = 'display:none;';

                        $LabelsPerSheet = $this->accountModel->LabelsPerSheet($OrderDetails[$i]->ProductID);
                        if (isset($OrderDetails[$i]->is_custom) and $OrderDetails[$i]->is_custom == 'Yes') {
                            $LabelsPerSheet = $OrderDetails[$i]->LabelsPerRoll;
                        }

                    }

                    if ($OrderDetails[$i]->Quantity != 0) {
                        ?>


                        <tr>
                            <td class="invoicetable_PCode_loop"><?= $ManufactureID ?></td>
                            <td class="invoicetable_description_loop">
                                <?php

                                $productname = $this->accountModel->ReplaceHtmlToString_($OrderDetails[$i]->ProductName);
                                echo $productname; ?>
                            </td>

                            <?php
                            $total_labels = $Quantity * $LabelsPerSheet;

                            if ($OrderDetails[$i]->Printing == 'Y') {
                                $labels = $this->accountModel->calculate_total_printed_labels($OrderDetails[$i]->SerialNumber);
                                if ($labels > 0) {
                                    $total_labels = $labels;
                                }
                            }


                            ?>


                            <td class="invoicetable_Qty_loop"><?= $total_labels ?></td>

                            <td class="invoicetable_Qty_loop"><?= $Quantity ?></td>

                            <td class="invoicetable_sml_headings_loop">
                                <? $price_view = $Price / $Quantity;
                                echo $symbol . (number_format($price_view * $exchange_rate, '5', '.', ''));
                                ?>
                            </td>

                            <td class="line_total_loop"><?= $currencySymbol ?>
                                <?php
                                if ($OrderInfo[0]->PaymentMethods == 'SampleOrder') {
                                    echo $exvat = '0.00';
                                } else {
                                    $exvat = $OrderDetails[$i]->Price;
                                    echo number_format($exvat * $exchange_rate, 2);
                                }
                                ?></td>
                        </tr>
                        <?php
                        $incvat = number_format($exvat * vat_rate, '2', '.', '');

                        $stylo = "";
                        if ($OrderDetails[$i]->Printing == "Y") {
                        } else {
                            $stylo = "style='display:none;'";
                        }
                        ?>
                        <tr <?= $stylo ?>>
                            <td class="invoicetable_PCode_loop"></td>

                            <?php $print_style = 'font-size: 8px;';
                            $AccountDetail = $OrderDetails[$i];
                            include('print_line_txt.php'); ?>

                            <td class="invoicetable_Qty_loop">&nbsp;</td>

                            <td class="invoicetable_Qty_loop"><?= $OrderDetails[$i]->Print_Qty; ?></td>


                            <td class="invoicetable_sml_headings_loop">
                                <? $price = $OrderDetails[$i]->Print_UnitPrice;
                                echo $symbol . "" . number_format($price * $exchange_rate, '5', '.', '');
                                ?>
                            </td>


                            <td class="line_total_loop">
                                <?
                                $print_exvat = $OrderDetails[$i]->Print_Total;
                                $print_incvat = $OrderDetails[$i]->Print_Total * 1.2;
                                echo $symbol . "" . number_format($print_exvat * $exchange_rate, 2);
                                ?>
                            </td>


                        </tr>


                        <? $stylo_prl = "";
                        if ($ManufactureID == "PRL1") {
                            $result = $this->accountModel->get_details_roll_quotation($OrderDetails[$i]->Prl_id);
                        } else {
                            $stylo_prl = "style='display:none;'";
                        }
                        ?>
                        <tr <?= $stylo_prl ?>>
                            <td class="invoicetable_PCode_loop"></td>
                            <td class="invoicetable_description_loop"><b>Shape:</b>
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
                                <?= $result['coresize'] . " mm" ?>
                                &nbsp;&nbsp; <b>Wound:</b>
                                <?= $result['wound'] ?>
                                &nbsp;&nbsp;<b>Notes:</b>
                                <?= $result['notes'] ?>
                                &nbsp;&nbsp;
                            </td>
                            <td class="invoicetable_sml_headings_loop"></td>
                            <td class="invoicetable_Qty_loop"></td>
                            <td class="invoicetable_Qty_loop"></td>
                            <td class="line_total_loop"></td>
                        </tr>
                        <tr style="border:1px solid;">
                            <td class="invoicetable_PCode_loop"></td>
                            <td class="invoicetable_description_loop"></td>
                            <td class="invoicetable_sml_headings" colspan="2" style="padding:0px !important;">
                                <div><b>Line Total :</b></div>
                            </td>
                            <td class="invoicetable_Qty">
                                <div>
                            </td>
                            <td class="invoicetable_sml_headings" style="padding:5px 0 5px 10px; text-align:left;">
                                <div>
                                    <? $linetotalexvat = $print_exvat + $exvat;
                                    echo $symbol . "" . number_format($linetotalexvat * $exchange_rate, 2);
                                    ?>
                                </div>
                            </td>
                            <?

                            $linetotalinvat = $print_incvat + $incvat;
                            ?>
                        </tr>
                        <?

                        $exVatPrice += $linetotalexvat;
                        $incVatPrice += $linetotalinvat;

                    }
                    //$incvat = number_format($OrderDetails[$i]->Price*$OrderDetails[$i]->Quantity,2,'.','');


                }


                if ($OrderInfo[0]->voucherOfferd == 'Yes') {

                    $discount = $OrderInfo[0]->voucherDiscount;
                } else
                    if ($OrderInfo[0]->DiscountInPounds != 0.00) {
                        $discount = $OrderInfo[0]->DiscountInPounds;
                    } else {

                        $discount = 0.00;
                    }


                $vatRate = vat_rate;

                $exdelivery = number_format($OrderInfo[0]->OrderShippingAmount / $vatRate, 2, '.', '');

                $deliveryExVatAmount = $OrderInfo[0]->OrderShippingAmount - $exdelivery;

                $ship_invat = number_format($OrderInfo[0]->OrderShippingAmount, 2, '.', '');
                $gt_invat = number_format($ship_invat + $incVatPrice, 2, '.', '');

                ?>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="3" class="invuice_subtotal">Delivery:</td>

                    <td class="invuice_subtotal_price">

                        <?
                        $exdelivery = number_format($OrderInfo[0]->OrderShippingAmount / $vatRate, 2, '.', '');
                        echo $symbol . "" . number_format($exdelivery * $exchange_rate, 2);
                        ?>

                    </td>

                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="3" class="invuice_subtotal">Grand Total(ExVAT):</td>
                    <td class="invuice_subtotal_price"><?= $currencySymbol ?>
                        <?php

                        if ($OrderInfo[0]->PaymentMethods == 'SampleOrder') {
                            $SubTotal = '0.00';
                            echo $SubTotal;
                        } else {
                            $SubTotal = number_format($exVatPrice + $exdelivery, 2, '.', '');
                            echo number_format($SubTotal * $exchange_rate, 2);
                        }


                        ?></td>
                </tr>


                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="3" class="invuice_subtotal">VAT @ (20.00)%</td>
                    <td class="invuice_subtotal_price"><?= $currencySymbol ?>
                        <?
                        if ($OrderInfo[0]->vat_exempt == 'yes') {
                            $vat = 0.00;
                        } else {
                            $vat = number_format(($gt_invat - $SubTotal), 2, '.', '');

                        }
                        echo number_format($vat * $exchange_rate, 2);
                        ?></td>
                </tr>


                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="3" class="invuice_subtotal">Discount:</td>
                    <td class="invuice_subtotal_price">
                        <?
                        echo $symbol . "" . number_format($discount * $exchange_rate, 2);
                        ?>
                    </td>
                </tr>


                <?php

                if ($OrderInfo[0]->DiscountInPounds == '0.00') {
                    $incVat = number_format($incVatPrice, 2, '.', '');
                    $show_price_incvat = number_format(($gt_invat - $discount), 2, '.', '');
                } else {
                    $incVat = "&pound;" . number_format($OrderInfo[0]->DiscountedPrice, 2, '.', '');
                    $show_price_incvat = $currencySymbol . $OrderInfo[0]->DiscountedPrice;
                }
                ?>

                <?

                if ($OrderInfo[0]->vat_exempt == 'yes') {
                    $show_price_incvat = $SubTotal;
                }
                ?>

                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="3" class="invuice_subtotal"><b>Grand Total(IncVAT):</b></td>
                    <td class="invuice_subtotal_price"><b>
                            <? echo $symbol . "" . number_format($show_price_incvat * $exchange_rate, 2); ?>
                        </b></td>
                </tr>


            </table>
        </td>
    </tr>
</table>

<div class="adminsp_space"></div>
