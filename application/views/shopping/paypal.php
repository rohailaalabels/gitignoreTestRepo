<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col-xs-7  col-sm-8 col-md-7">
                    <div class="col-xs-12  col-sm-6 col-md-6  ">
                        <h1>Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout -->
        <div id="aja_cart" class="thumbnail ">
            <div class="col-sm-8 m-t-10">
                <div class="table-responsive ">
                    <table class="table table-bordered table-hover">
                        <thead class="bgBlueHeading">
                        <tr>
                            <th class="" colspan="2" style="width:46%; ">Code / Description</th>
                            <th style="width:12%;">Ex. Vat</th>
                            <th style="width:12%;">Inc. Vat</th>
                            <th style="width:12%;">Qty</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? $ex_vat = '';
                        $inc_vat = '';
                        foreach ($order_detail as $pro) {

                            $A4Printing = '';
                            if ($pro['Printing'] == 'Y') {
                                if ($pro['Print_Type'] == 'Fullcolour') {
                                    $A4Printing = ' Printing Service ( Full Color) ';
                                } else {
                                    $A4Printing = ' Printing Service ( Black Color Only )';
                                }
                            }


                            $image = $this->shopping_model->customize_image_name($pro['ProductID']);
                            $image = str_replace(".gif", ".png", $image[0]['Image1']);
                            ?>
                            <tr>
                                <th <?= ($pro['Printing'] == 'Y') ? 'rowspan="2"' : '' ?> class=""><img
                                            onerror='imgError(this);' class="img-circle"
                                            src="<?= Assets ?>images/material_images/<?= $image ?>" alt="" width="46"
                                            height="46"></th>
                                <td><h4>
                                        <?= $pro['ManufactureID'] ?>
                                    </h4>
                                    <p>
                                        <?= $pro['ProductName'] ?>
                                    </p></td>
                                <td style="text-align:center;"><strong>£
                                        <?= $pro['Price'] ?>
                                    </strong></td>
                                <td><strong>£
                                        <?= $pro['ProductTotal'] ?>
                                    </strong></td>
                                <td><strong>
                                        <?= $pro['Quantity'] ?>
                                    </strong></td>
                            </tr>
                            <? if ($pro['Printing'] == 'Y') {
                                $pro['Price'] = $pro['Price'] + $pro['Print_Total'];
                                $pro['ProductTotal'] = $pro['ProductTotal'] + ($pro['Print_Total'] * 1.2); ?>
                                <tr>
                                    <td><h4>
                                            <?= $A4Printing ?>
                                        </h4></td>
                                    <td style="text-align:center;">
                                        <strong>&pound;<?php echo number_format(($pro['Print_Total']), 2, '.', ''); ?></strong>
                                    </td>
                                    <td>
                                        <strong>&pound;<?php echo number_format(($pro['Print_Total'] * 1.2), 2, '.', ''); ?></strong>
                                    </td>
                                </tr>
                            <? } ?>
                            <? $ex_vat += $pro['Price'];
                            $inc_vat += $pro['ProductTotal'];

                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-4 m-t-10">
                <div class="bgOrangeHeading">
                    <div><i class="fa f-20 fa-calculator "></i> Cart Summary</div>
                </div>
                <div class="borderPanel">
                    <div class="Lblue ">
                        <div class="row">
                            <div class="">
                                <div class="pull-left">
                                    <div>Sub Total</div>
                                </div>
                                <div class="pull-right"><i class="fa f-20 fa-cart-plus"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-b-12">
                        <div class="">
                            <div class="pull-left">
                                <p>Ex. Vat</p>
                                <h2>£
                                    <?= $ex_vat ?>
                                </h2>
                            </div>
                            <div class="pull-right">
                                <p>Inc. Vat</p>
                                <h2>£
                                    <?= $inc_vat ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <? $discount = '';
                    if ($order['voucherOfferd'] == "yes") {
                        ?>
                        <!--  ------------------------------------------->
                        <div class="Lblue ">
                            <div class="row">
                                <div class="">
                                    <div class="pull-left">
                                        <div>Discount</div>
                                    </div>
                                    <div class="pull-right"><i class="fa f-20 fa-tag"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-b-12">
                            <div class="">
                                <div class="pull-left">
                                    <p></p>
                                    <h2>&pound <? echo $discount = number_format($order['voucherDiscount'], 2) ?></h2>
                                </div>
                                <div class="pull-right">
                                    <p></p>
                                    <h2></h2>
                                </div>
                            </div>
                        </div>
                        <? $discount = $order['voucherDiscount'];
                    }
                    $total = $inc_vat - $discount; ?>
                    <!--------------------------------------------->
                    <div class="Lblue ">
                        <div class="row">
                            <div class="">
                                <div class="pull-left">
                                    <div>Grand Total</div>
                                </div>
                                <div class="pull-right"><i class="fa f-20 fa-calculator"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-b-12">
                        <div class="">
                            <div class="pull-left">
                                <p class="hide">Ex. Vat</p>
                                <h3 class="text-danger">&pound;<? echo number_format($total, 2) ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" thumbnail">
            <form method="post" id="checkout_form" class="labels-form ">
                <ul class="nav orderStep setup-panel">
                    <li class="active"><a> <i class="fa fa-check-circle p-t-b"></i>
                            <p class="list-group-item-text">Billing</p>
                        </a></li>
                    <li class="active"><a> <i class="fa fa-check-circle p-t-b"></i>
                            <p class="list-group-item-text">Delivery</p>
                        </a></li>
                    <li class="active"><a> <i class="fa fa-check-circle p-t-b"></i>
                            <p class="list-group-item-text">Shipping</p>
                        </a></li>
                    <li class="active"><a> <i class="fa fa-check-circle p-t-b"></i>
                            <p class="list-group-item-text">Review &amp; Pay</p>
                        </a></li>
                    <li class="disabled"><a> <i class="fa fa-check-circle p-t-b"></i>
                            <p class="list-group-item-text">confirm</p>
                        </a></li>
                </ul>
                <div class="setup-content" id="step-1">
                    <div class="">
                        <h4 class="m-t-b-8 m-l-20 cBlue">Review Order </h4>
                    </div>
                    <div class="col-sm-12 m-t-30">
                        <div class="col-sm-6">
                            <div><strong class="textBlue">Billing Detail </strong>
                                <p id="billing_name_review">
                                    <?= $order['BillingTitle'] . " " . $order['BillingFirstName'] . " " . $order['BillingLastName'] ?>
                                </p>
                                <span id="billing_address_review">
                <?= $order['BillingAddress1'] . ", " . $order['BillingTownCity'] . ", " . $order['BillingCountyState'] ?>
                </span> <br/>
                                <span id="billing_address_review">
                <?= $order['BillingCompanyName'] . ", " . $order['Billingtelephone'] . ", " . $order['Billingemail'] ?>
                </span></div>
                        </div>
                        <div class="col-sm-6">
                            <div><strong class="textBlue">Delivery Detail </strong>
                                <p id="billing_name_review">
                                    <?= $order['DeliveryTitle'] . " " . $order['DeliveryFirstName'] . " " . $order['DeliveryLastName'] ?>
                                </p>
                                <span id="billing_address_review">
                <?= $order['DeliveryAddress1'] . ", " . $order['DeliveryTownCity'] . ", " . $order['DeliveryCountyState'] ?>
                </span> <br/>
                                <span id="billing_address_review">
                <?= $order['DeliveryCompanyName'] . ", " . $order['Deliverytelephone'] . ", " . $order['Deliveryemail'] ?>
                </span></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 m-t-30">
                    <div class="col-sm-6">
                        <div><strong class="textBlue">Payment</strong><br>
                            <img onerror='imgError(this);' class="img-responsive"
                                 src="<?= Assets ?>images/visa-icon3.png" width="auto" height="auto">
                            <!--<div class="box box-width">-->
                            <div class="">
                                <div id="loader_div" align="center" class="white-screen" style=" display:block;"><img
                                            onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" width="181"
                                            height="181" class="image" style="width:181px; height:181px; "></div>
                                <div align="center" id="paypal_div" style=" display:none;">
                                    <?php echo $_paypal['code']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="textBlue m-b-6"><strong class="">Order Summary (
                                <?= $order['OrderNumber'] ?>
                                )</strong>
                            <p>Pay by PayPal or Credit / Debit Card</p>
                        </div>
                        <div class="panel-default fa-border ">
                            <!-- Default panel contents -->

                            <? $shipping = $order['OrderShippingAmount'];
                            $result = $this->shopping_model->get_shipping($order['ShippingServiceID']);
                            ?>

                            <!-- Table -->
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="borderR0">Subtotal<br></td>
                                    <td class="borderR0" style="text-align:right;"><h4 class="">
                                            &pound; <?php echo number_format($inc_vat - $discount, 2, '.', ''); ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=""><?= $result['ServiceName'] ?></td>
                                    <td style="text-align:right;"><h4 class="">
                                            &pound;<? echo number_format($shipping, 2); ?></h4></td>
                                </tr>
                                <tr>
                                    <td class="textOrange">Total (GBP)</td>
                                    <td style="text-align:right;"><h3 class="textOrange">
                                            &pound;<?php echo number_format($inc_vat + $shipping - $discount, 2, '.', ''); ?></h3>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <img onerror='imgError(this);' class="m-t-15 img-responsive"
                             src="<?= Assets ?>images/icons2.jpg" width="423" height="84"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(window).load(function () {
        $("#loader_div").hide();
        $("#paypal_div").show();
    });

</script> 
