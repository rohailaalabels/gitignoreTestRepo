<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AA Labels</title>
    <!-- Bootstrap -->
    <link href="<?= Assets ?>css/custom.css" rel="stylesheet">
    <link href="<?= Assets ?>css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container content">
    <!--Invoice Header-->
    <div class="row invoice-header">
        <div class="col-xs-6">

            <?php
            $redirect_from = $this->session->userdata('redirect_from');
            if (isset($redirect_from) and $redirect_from == "plo"):?>
                <img onerror='imgError(this);' alt="" src="<?= base_url() ?>trade/theme/images/logo.png">
            <?php else: ?>
                <img onerror='imgError(this);' alt="" src="<?= base_url() ?>theme/site/images/logo.png">
            <?php endif; ?>


        </div>
        <div class="col-xs-6 invoice-numb">
            <h4>Order Number:
                <?= $order['OrderNumber'] ?>
            </h4>
            <span>Order Date : <? echo date('d-m-Y h:i:s A', $order['OrderDate']); ?></span></div>
    </div>
    <div class="row invoice-info">
        <div class="col-xs-6">
            <div>
                <h3>Billing Detail:</h3>
                <ul class="list-unstyled">
                    <li><strong>
                            <?= $order['BillingTitle'] . " " . $order['BillingFirstName'] . " " . $order['BillingLastName'] ?>
                        </strong></li>
                    <li>
                        <?= $order['BillingAddress1'] . " " . $order['BillingAddress2'] . " " . $order['BillingTownCity'] . " " . $order['BillingCountyState'] ?>
                    </li>
                    <li>
                        <?= $order['BillingCompanyName'] ?>
                    </li>
                    <li>
                        <?= $order['BillingPostcode'] ?>
                    </li>
                    <li>
                        <?= $order['Billingtelephone'] ?>
                    </li>
                    <li>
                        <?= $order['Billingemail'] ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xs-6">
            <div>
                <h3>Delivery Detail:</h3>
                <ul class="list-unstyled">
                    <li><strong>
                            <?= $order['DeliveryTitle'] . " " . $order['DeliveryFirstName'] . " " . $order['DeliveryLastName'] ?>
                        </strong></li>
                    <li>
                        <?= $order['DeliveryAddress1'] . " " . $order['DeliveryAddress2'] . " " . $order['DeliveryTownCity'] . " " . $order['DeliveryCountyState'] ?>
                    </li>
                    <li>
                        <?= $order['DeliveryCompanyName'] ?>
                    </li>
                    <li>
                        <?= $order['DeliveryPostcode'] ?>
                    </li>
                    <li>
                        <?= $order['Deliverytelephone'] ?>
                    </li>
                    <li>
                        <?= $order['Deliveryemail'] ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Invoice Detials-->

    <!--Invoice Table-->
    <div>
        <div>
            <h4><strong>Order Confirmation</strong></h4>
        </div>
        <div>
            <p>Your order has successfully received. Order acknowledgement has been sent to your email address. </p>
        </div>
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Code / Description</th>
                <th style="text-align:center;">Qty</th>
                <th style="text-align:center;" width="12%">Ex. Vat</th>
                <th style="text-align:center;" width="12%">Inc. Vat</th>
            </tr>
            </thead>
            <tbody>
            <? $i = 1;
            $ex_vat = '';
            $inc_vat = '';
            foreach ($order_detail as $pro) {

                $A4Printing = '';
                if ($pro['Printing'] == 'Y') {
                    $A4Printing = $this->home_model->get_printing_service_name($pro['Print_Type'], $pro['regmark']);
                }

                $image = $this->shopping_model->customize_image_name($pro['ProductID']);
                $image = str_replace(".gif", ".png", $image[0]['Image1']);
                $img_class = 'img-circle';
                $img_width = '25';

                $path = Assets . "images/material_images/" . $image;
                if (ctype_digit(substr($pro['ManufactureID'], -4)) and $pro['ProductID'] != 0) {
                    $desingcode = substr($pro['ManufactureID'], -4);
                    $colorcode = (isset($pro['colorcode']) and $pro['colorcode'] != '') ? '-' . $pro['colorcode'] : '';
                    $path = Assets . "images/application/design/" . $desingcode . $colorcode . '.png';
                    $img_class = 'img-Sheet';
                    $img_width = '60';
                }

                $pro['Price'] = $this->home_model->currecy_converter($pro['Price'], 'no');
                $pro['ProductTotal'] = $this->home_model->currecy_converter($pro['ProductTotal'], 'no');


                ?>
                <tr>
                    <td <?= ($pro['Printing'] == 'Y') ? 'rowspan="2"' : '' ?>><?= $i ?></td>
                    <td><img onerror='imgError(this);' class="" src="<?= $path ?>" width="<?= $img_width ?>" height="">
                    </td>
                    <td><strong>
                            <?= $pro['ManufactureID'] ?>
                        </strong> <br>
                        <?= $pro['ProductName'] ?></td>
                    <td style="text-align:center;"><?= $pro['Quantity'] ?></td>
                    <td style="text-align:center;"><?= symbol . number_format($pro['Price'], 2, '.', ''); ?></td>
                    <td style="text-align:center;"><?= symbol . number_format($pro['ProductTotal'], 2, '.', ''); ?></td>
                </tr>
                <? if ($pro['Printing'] == 'Y') {

                    $pro['Print_Total'] = $this->home_model->currecy_converter($pro['Print_Total'], 'no');

                    $pro['Price'] = $pro['Price'] + $pro['Print_Total'];
                    $pro['ProductTotal'] = $pro['ProductTotal'] + ($pro['Print_Total'] * 1.2);
                    ?>
                    <tr>
                        <td colspan="3"><h4>
                                <?= $A4Printing ?>
                            </h4></td>
                        <? if (preg_match('/Printed Labels on Rolls/is', $pro['ProductName'])) {
                            echo '<td colspan="2" style="text-align:center;"></td>';
                        } else { ?>
                            <td style="text-align:center;">
                                <strong><?php echo symbol . number_format(($pro['Print_Total']), 2, '.', ''); ?></strong>
                            </td>
                            <td>
                                <strong><?php echo symbol . number_format(($pro['Print_Total'] * 1.2), 2, '.', ''); ?></strong>
                            </td>
                        <? } ?>
                    </tr>
                <? }

                $i++;

                $ex_vat += $pro['Price'];
                $inc_vat += $pro['ProductTotal'];
            }

            $shipping = $this->home_model->currecy_converter($order['OrderShippingAmount'], 'no');

            if ($order['voucherOfferd'] == "Yes") {
                $rowspan = 4;
            } else {
                $rowspan = 3;
            }
            if ($order['vat_exempt'] == "yes") {
                $rowspan++;
            }
            ?>
            <tr>
                <td rowspan="<?= $rowspan ?>" colspan="3">&nbsp;</td>
                <td align="right"><strong>Sub - Total Amount:</strong></td>
                <td style="text-align:center;"><?= symbol . number_format($ex_vat, 2, '.', ''); ?></td>
                <td style="text-align:center;"><?= symbol . number_format($inc_vat, 2, '.', ''); ?></td>
            </tr>
            <tr>
                <td align="right"><strong>Delivery Charges:</strong></td>
                <td style="text-align:center;"><?= symbol . number_format(($shipping / 1.2), 2, '.', ''); ?></td>
                <td style="text-align:center;"><?= symbol . number_format($shipping, 2, '.', ''); ?></td>
            </tr>
            <? $discount = 0;
            if ($order['voucherOfferd'] == "Yes") {

                $discount = $this->home_model->currecy_converter($order['voucherDiscount'], 'no');

                ?>
                <tr>
                    <td align="right"><strong>Voucher Discount</strong></td>
                    <td style="text-align:center;">&nbsp;</td>
                    <td style="text-align:center;"><?= symbol . number_format($discount, 2, '.', '') ?></td>
                </tr>
            <? }

            $total = $inc_vat + $shipping - $discount;
            if ($order['vat_exempt'] == "yes") {
                $vat_exempt_charges = $total - ($total / 1.2);
                $total = $total - $vat_exempt_charges; ?>
                <tr>
                    <td align="right"><strong>Exempt VAT Charges</strong></td>
                    <td style="text-align:center;">&nbsp;</td>
                    <td style="text-align:center;">-
                        <?= symbol . number_format($vat_exempt_charges, 2, '.', ''); ?></td>
                </tr>
            <? } ?>
            <tr>
                <td align="right"><strong>Grand Total:</strong></td>
                <td style="text-align:center;">&nbsp;</td>
                <td style="text-align:center;"><?= symbol . number_format($total, 2, '.', ''); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--End Invoice Table-->

    <!--Invoice Footer-->
    <div class="col-md-12 text-right"><strong> Payment Method</strong><br>
        <?php
        if ($order['PaymentMethods'] == 'creditCard') {
            echo "via Pay by Credit / Debit Card";
        } else if ($order['PaymentMethods'] == 'paypal') {
            echo "Pay by PayPal";
        } else if ($order['PaymentMethods'] == 'purchaseOrder') {
            echo "Pay by Purchase Order (Government Offices & Educational Organisations Only)";
        } else {
            echo "Pay by " . $order['PaymentMethods'];
        } ?>
    </div>
    <div class="row">

        <?php
        $redirect_from = $this->session->userdata('redirect_from');
        if (isset($redirect_from) and $redirect_from == "plo"):
            $email = 'tradeteam@aalabels.com';
        else:
            $email = EMAIL;
        endif; ?>


         <div class="col-md-6"> 
            <strong>AA Labels</strong><br>
            
            <span>Trading name of Green Technologies Ltd.</span><br>
            <span>23 Wainman Road, Peterborough, PE2 7BU</span><br>
            Phone: <?= PHONE ?>, Email: <?= EMAIL ?><br>
            
            <?php
            if (isset($order['BillingCountry']) && $order['BillingCountry'] == 'France') {
                echo "VAT No:  FR 21 851063453";
            } else {
                echo "VAT No:  GB 945 028 620";
            }
            ?>
         </div>
    </div>
    <!--End Invoice Footer-->
</div>
<script> window.print();</script>
</body>
</html>
