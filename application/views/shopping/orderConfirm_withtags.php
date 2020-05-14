<div class="bgGray">
    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col-xs-7  col-sm-8 col-md-7">
                    <div class="col-xs-12  col-sm-6 col-md-6 m-l-5   ">
                        <h3>Order Confirmation</h3>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
                    <div class="pull-right">
                        <a role="button" class="btn orange pull-right" href="<?= base_url() ?>">
                            <i class="fa fa-arrow-circle-left faa-horizontal animated"></i>&nbsp; Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout -->

        <div class=" thumbnail">
            <ul class="nav orderStep setup-panel">
                <li class="active"><a>
                        <i class="fa fa-check-circle p-t-b"></i>
                        <p class="list-group-item-text">Billing</p>
                    </a></li>
                <li class="active"><a>
                        <i class="fa fa-check-circle p-t-b"></i>
                        <p class="list-group-item-text">Delivery</p>
                    </a></li>
                <li class="active"><a>
                        <i class="fa fa-check-circle p-t-b"></i>
                        <p class="list-group-item-text">Shipping</p>
                    </a></li>
                <li class="active"><a>
                        <i class="fa fa-check-circle p-t-b"></i>
                        <p class="list-group-item-text">Review &amp; Pay</p>
                    </a></li>
                <li class="active"><a>
                        <i class="fa fa-check-circle p-t-b"></i>
                        <p class="list-group-item-text">Confirm</p>
                    </a></li>
            </ul>


            <div class="">
                <div class="setup-content" id="step-5">
                    <form novalidate action="852" method="post" enctype="text/plain" id="8524" class="">
                        <div class="">
                            <h4 class="m-t-b-8 m-l-20 cBlue">Order Number:
                                <?= $order['OrderNumber'] ?>
                            </h4>
                            <div class="col-sm-12">
                                <div class="alert alert-success  ">
                                    <button class="close" type="button"><i class="fa fa-check-circle-o"></i></button>
                                    Your order has been received, thank you and an acknowledgement has been sent to the
                                    email address provided.
                                </div>
                            </div>
                            <div class="">
                                <div class="col-sm-8 m-t-10">
                                    <div class="table-responsive ">
                                        <table class="table table-bordered table-hover">
                                            <thead class="bgBlueHeading">
                                            <tr>
                                                <th style="width:10%;text-align:center;">Image</th>
                                                <th style="width:36%;text-align:center; ">Code / Description</th>
                                                <th style="width:12%;text-align:center;">Ex. Vat</th>
                                                <th style="width:12%;text-align:center;">Inc. Vat</th>
                                                <th style="width:12%;text-align:center;">Qty</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?
                                            $ex_vat = '';
                                            $inc_vat = '';
                                            $store_prd = '';
                                            foreach ($order_detail as $pro) {

                                                $gts_i_price = $pro['ProductTotal'] + ($pro['Print_Total'] * 1.2);
                                                $A4Printing = '';
                                                $colorcode = '';
                                                if ($pro['Printing'] == 'Y') {
                                                    $A4Printing = $this->home_model->get_printing_service_name($pro['Print_Type'], $pro['regmark']);
                                                }

                                                $image = $this->shopping_model->customize_image_name($pro['ProductID']);
                                                $image = str_replace(".gif", ".png", $image[0]['Image1']);
                                                //new code
                                                $img_class = 'img-circle';
                                                $img_width = '25';
                                                $path = Assets . "images/material_images/" . $image;

                                                $path = Assets . "images/material_images/" . $image;
                                                if (ctype_digit(substr($pro['ManufactureID'], -4)) and $pro['ProductID'] != 0) {
                                                    $colorcode = (isset($pro['colorcode']) and $pro['colorcode'] != '') ? '-' . $pro['colorcode'] : '';
                                                    $desingcode = substr($pro['ManufactureID'], -4);
                                                    $path = Assets . "images/application/design/" . $desingcode . $colorcode . '.png';
                                                    $img_class = 'img-Sheet';
                                                    $img_width = '60';
                                                }


                                                $pro['Price'] = $this->home_model->currecy_converter($pro['Price'], 'no');
                                                $pro['ProductTotal'] = $this->home_model->currecy_converter($pro['ProductTotal'], 'no');

                                                //newcode
                                                $files = $this->home_model->get_integrated_attachments($pro['SerialNumber']);
                                                if ($files['Thumb'] != "") {
                                                    $path = AJAXURL . 'designer/media/thumb/' . $files['Thumb'];
                                                    $img_width = '46';
                                                    $img_class = '';
                                                }
                                                ?>

                                                <tr>
                                                    <th <?= ($pro['Printing'] == 'Y') ? 'rowspan="2"' : '' ?> class="">
                                                        <img onerror='imgError(this);' class="<?= $img_class ?>"
                                                             src="<?= $path ?>" width="<?= $img_width ?>" height="">
                                                    </th>
                                                    <td>
                                                        <h4><?= $pro['ManufactureID'] ?></h4>
                                                        <p><?= $pro['ProductName'] ?>
                                                            <? //new code
                                                            if ($files['file'] != "") {
                                                                $pdf = AJAXURL . 'theme/integrated_attach/' . $files['file']; ?>
                                                                <a href="#" data-target=".designer" data-toggle="modal"
                                                                   class="btn blue2 btn-sm ld_download"
                                                                   data-value="<?= $pdf ?>">
                                                                    <i class="fa fa-download"></i> Download Artwork</a>
                                                            <? } ?>
                                                        </p>
                                                    </td>


                                                    <td style="text-align:center; vertical-align:middle" ;>
                                                        <strong><?= symbol . number_format($pro['Price'], 2, '.', ''); ?></strong>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle" ;>
                                                        <strong><?= symbol . number_format($pro['ProductTotal'], 2, '.', ''); ?></strong>
                                                    </td>


                                                    <td style="text-align:center; vertical-align:middle" ;>
                                                        <strong><?= $pro['Quantity'] ?></strong></td>
                                                </tr>

                                                <? if ($pro['Printing'] == 'Y') {
                                                    $pro['Print_Total'] = $this->home_model->currecy_converter($pro['Print_Total'], 'no');

                                                    $pro['Price'] = $pro['Price'] + $pro['Print_Total'];
                                                    $pro['ProductTotal'] = $pro['ProductTotal'] + ($pro['Print_Total'] * 1.2); ?>
                                                    <tr>
                                                        <td>
                                                            <h4><?= $A4Printing ?></h4>
                                                        </td>

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
                                                <? } ?>


                                                <? $ex_vat += $pro['Price'];
                                                $inc_vat += $pro['ProductTotal'];

                                                $store_prd .= '<span class="gts-i-name">' . $pro['ProductName'] . '</span>';
                                                $store_prd .= '<span class="gts-i-price">' . $gts_i_price . '</span>';
                                                $store_prd .= '<span class="gts-i-quantity">' . $pro['Quantity'] . '</span>';
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
                                                    <h2><?= symbol . number_format($ex_vat, 2, '.', ''); ?></h2>
                                                </div>
                                                <div class="pull-right">
                                                    <p>Inc. Vat</p>
                                                    <h2><?= symbol . number_format($inc_vat, 2, '.', ''); ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <? $shipping = $this->home_model->currecy_converter($order['OrderShippingAmount'], 'no'); ?>
                                        <div class="Lblue ">
                                            <div class="row">
                                                <div class="">
                                                    <div class="pull-left">
                                                        <div>Delivery Charges</div>
                                                    </div>
                                                    <div class="pull-right"><i class="fa f-20 fa-truck"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <? $result = $this->shopping_model->get_shipping($order['ShippingServiceID']); ?>
                                        <div class="row p-t-b-12">
                                            <div class="">
                                                <div class="pull-left">
                                                    <p>Ex. Vat</p>
                                                    <h2><? echo symbol . number_format($shipping / 1.2, 2); ?></h2>
                                                </div>
                                                <div class="pull-right">
                                                    <p>Inc. Vat</p>
                                                    <h2><? echo symbol . number_format($shipping, 2); ?></h2>
                                                </div>
                                                <p class="text-center col-sm-12 textOrange">
                                                    <?= $result['ServiceName'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <? $discount = 0;
                                        if ($order['voucherOfferd'] == "Yes") {
                                            $discount = $this->home_model->currecy_converter($order['voucherDiscount'], 'no');
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
                                                        <h2><?= symbol . number_format($discount, 2, '.', '') ?></h2>
                                                    </div>
                                                    <div class="pull-right">
                                                        <p></p>
                                                        <h2></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        <? }
                                        $total = $inc_vat + $shipping - $discount;
                                        if (isset($order['vat_exempt']) and $order['vat_exempt'] == "yes") {
                                            $vat_exempt_charges = $total - ($total / 1.2);
                                            $total = $total - $vat_exempt_charges;
                                            ?>

                                            <div class="Lblue ">
                                                <div class="row">
                                                    <div class="">
                                                        <div class="pull-left">
                                                            <div>Exempt VAT Charges</div>
                                                        </div>
                                                        <div class="pull-right"><i class="fa f-20 fa-tag"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-t-b-12">
                                                <div class="">
                                                    <div class="pull-left">
                                                        <p></p>
                                                        <h2>
                                                            -<?= symbol . number_format($vat_exempt_charges, 2, '.', ''); ?></h2>
                                                    </div>
                                                    <div class="pull-right">
                                                        <p></p>
                                                        <h2></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } ?>
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
                                                    <h3 class="text-danger"><? echo symbol . number_format($total, 2) ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 m-t-30">
                                    <div class="col-sm-6">
                                        <div><strong class="textBlue">Billing Detail </strong>
                                            <p><strong>
                                                    <?= $order['BillingTitle'] . " " . $order['BillingFirstName'] . " " . $order['BillingLastName'] ?>
                                                </strong><br>
                                                <?= $order['BillingAddress1'] . " " . $order['BillingAddress2'] . " " . $order['BillingTownCity'] . " " . $order['BillingCountyState'] ?>
                                                <br>
                                                <?= $order['BillingCompanyName'] ?>
                                                <br>
                                                <?= $order['BillingPostcode'] ?>
                                                <br>
                                                <?= $order['Billingtelephone'] ?>
                                                <br>
                                                <?= $order['Billingemail'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div><strong class="textBlue">Delivery Detail </strong>
                                            <p><strong>
                                                    <?= $order['DeliveryTitle'] . " " . $order['DeliveryFirstName'] . " " . $order['DeliveryLastName'] ?>
                                                </strong><br>
                                                <?= $order['DeliveryAddress1'] . " " . $order['DeliveryAddress2'] . " " . $order['DeliveryTownCity'] . " " . $order['DeliveryCountyState'] ?>
                                                <br>
                                                <?= $order['DeliveryCompanyName'] ?>
                                                <br>
                                                <?= $order['DeliveryPostcode'] ?>
                                                <br>
                                                <?= $order['Deliverytelephone'] ?>
                                                <br>
                                                <?= $order['Deliveryemail'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 m-t-30">
                                    <div class="col-sm-6">
                                        <div class="m-t-101">
                                            <p>
                                                <?php
                                                if ($order['PaymentMethods'] == 'paypal') {
                                                    echo "Pay by PayPal";
                                                } else if ($order['PaymentMethods'] == 'purchaseOrder') {
                                                    echo "Pay by Purchase Order (Government Offices & Educational Organisations Only)";
                                                } else if ($order['PaymentMethods'] == 'Sample Order') {
                                                    echo "Sample Order";
                                                } else {
                                                    echo "Pay by " . $order['PaymentMethods'];
                                                } ?>
                                            </p>

                                            <div class="m-t-10"><a
                                                        onclick="window.open('<?php echo base_url() ?>shopping/print_order/<?php echo "SWSAPM" . ($order['OrderNumber']) . "SWSAPM"; ?>','mywindow','width=1200,height=900')"
                                                        class="btn orange" role="button">Print Order Confirmation &nbsp;
                                                    <i class="fa fa-print "></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="fdb_area"><strong class="textBlue">Customer Feedback</strong>
                                            <div class="pull-right m-l-5"><i
                                                        class="  fa fa-smile-o textOrange fa-10x faa-horizontal animated"></i>
                                            </div>
                                            <p>We continuously evaluate our product range and customer care and rely on
                                                your feedback to help with this process. Please let us know what is
                                                important to you, by completing a short survey that will only take a few
                                                minutes and will help us to improve our understanding about what our
                                                customers value.</p>
                                        </div>
                                        <div class="m-t-10">

                                            <a style="display:none; " id="cont_shop" class="btn orange pull-right"
                                               href="<?= base_url() ?>" role="button">
                                                <i class="fa fa-arrow-circle-left faa-horizontal animated"></i> Continue
                                                Shopping </a>


                                            <a role="button" id="notnow" class="btn btn-danger fdbtn">Not Now &nbsp;
                                                <i class="fa fa-times "></i></a>
                                            <a role="button" class="btn btn-success fdbtn"
                                               href="<?= base_url() ?>customer-feedback">Continue &nbsp; <i
                                                        class="fa fa-check  "></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade designer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button id="video_pause" type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Download Message</h3>
            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <div class="col-lg-12">
                    <div align="">
                        <p class="text-justify">Permitted Use: You may freely download this artwork containing elements
                            from AA Labels image assets subject to agreeing to the following: <br> <br>

                            1. The artwork created (Licensed Work) is used to create templates for labels and stationery
                            for the promotion of image and/or the sale of products and services provided by the
                            originator only and is not for resale, or use by a third-party without the express
                            permission of AA Labels.<br> <br>
                            2. To be used to print on labels and stationery; provided, however that such use does not
                            allow (or make capable) the (i) re-distribution or re-use of the content (on a standalone
                            basis or in any reproduced or derived form other than the Licensed Work) described in
                            paragraph 1 above, other than for the purpose of allowing access to the content under
                            corporate+ and for reproduction of Licensed Works described herein or (ii) disassociation or
                            separation of the content from the Licensed Works by the end-user or third party.<br> <br>
                            3. For the distribution and resale of the reproduced Licensed Work described in paragraph 1
                            and to be used as part of marketing, advertising or promotional materials for the purposes
                            of the Licensed Works referred to in paragraph 1 above. <br> <br>

                        </p>

                        <div style="font-size: 14px; line-height: 1.5em;">
                            <label class="radio"><input type="radio" name="ld_allow" id="agree_term" class="textOrange"
                                                        value="yes" checked="checked"><i></i></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>I agree to the terms and conditions of use. </b>
                        </div>
                        <div style="font-size: 14px; line-height: 1.5em;">
                            <label class="radio"><input type="radio" name="ld_allow" id="agree_term" class="textOrange"
                                                        value="no"><i></i></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>I do not agree to the terms and conditions of
                                use. </b>
                        </div>
                        <div><a class="btn  btn-primary pull-right" id="ld_continue" data-value="">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-foote ">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<? if (SITE_MODE == 'live') {
    $tax = $order['OrderTotal'] - ($order['OrderTotal'] / 1.2);
    ?>


    <!-- START Google Trusted Stores Order -->
    <div id="gts-order" style="display:none;" translate="no">
        <!-- start order and merchant information -->
        <span id="gts-o-id"><?= $order['OrderNumber'] ?></span>
        <span id="gts-o-domain">www.aalabels.com</span>
        <span id="gts-o-email"><?= $order['Billingemail'] ?></span>
        <span id="gts-o-country">GB</span>
        <span id="gts-o-currency">GBP</span>
        <span id="gts-o-total"><?= number_format($order['OrderTotal'] - $tax, 2, '.', '') ?></span>
        <span id="gts-o-discounts"><?= $discount ?></span>
        <span id="gts-o-shipping-total"><?= $order['OrderShippingAmount'] ?></span>
        <span id="gts-o-tax-total"><?= number_format($tax, 2, '.', '') ?></span>
        <span id="gts-o-est-ship-date"><?= date("Y-m-d", ($order['OrderTime'] + (86400 * 3))) ?></span>
        <span id="gts-o-est-delivery-date"><?= date("Y-m-d", ($order['OrderTime'] + (86400 * 6))) ?></span>
        <span id="gts-o-has-preorder">N</span>
        <span id="gts-o-has-digital">N</span>
        <!-- end order and merchant information -->
        <!-- start repeated item specific information -->
        <!-- item example: this area repeated for each item in the order -->
        <span class="gts-item"><?= $store_prd ?></span>
        <!-- end item 1 example -->
        <!-- end repeated item specific information -->
    </div>
    <!-- END Google Trusted Stores Order --><!-- START Trusted Stores Order -->


    <!-- START Bing UET Tag -->
    <!--<script>
 Window.uetq = window.uetq || [];
    window.uetq.push({  'gv': <?= number_format($order['OrderTotal'], 2, '.', '') ?>});
</script>-->

    <!-- End with bing Code -->


    <!-- Start:Google Code for Sale Confirmation Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1067753763;
        var google_conversion_language = "en_GB";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "BhPaCLnqRBCjwpL9Aw";
        var google_conversion_value = "<?php echo number_format($total, 2, '.', ''); ?>";
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img onerror='imgError(this);' height="1" width="1" style="border-style:none;" alt=""
                 src="//www.googleadservices.com/pagead/conversion/1067753763/?value=<?php echo number_format($total, 2); ?>&amp;label=BhPaCLnqRBCjwpL9Aw&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>
    <!-- End:Google Code for Sale Confirmation Conversion Page -->


    <? /*********top cashback script**********/
    $total = $this->shopping_model->calculate_topcashback($order['OrderNumber']);
    if ($total > 0 and $order['OrderStatus'] == 2) {
        //if($total > 0 and 1==2){
        $ect = number_format($order['OrderTotal'], 2, '.', '');
        $revenue = number_format($total, 2, '.', '');
        /*<iframe src="http://topclicking.co.uk/p.ashx?o=99&e=140&t=<?=$order['OrderNumber']?>&ect=<?=$ect?>&p=<?=$revenue?>" height="1" width="1" frameborder="0"></iframe>99BeI9hChpzYM%3d--> */

        ?>


        <iframe src="http://topclicking.co.uk/p.ashx?o=99&e=140&t=<?= $order['OrderNumber'] ?>&ect=<?= $ect ?>&p=<?= $revenue ?>"
                height="1" width="1" frameborder="0"></iframe>


        <? /*********top cashback script**********/
    }
} ?>

<script>
    $(document).on("click", "#notnow", function (event) {
        $('.fdb_area').css('visibility', 'hidden');
        $('.fdbtn').hide();
        $('#cont_shop').show();

    });
    $(".ld_download").click(function () {
        var value = $(this).attr('data-value');
        $('#ld_continue').attr('data-value', value);
    });

    $("#ld_continue").click(function () {
        var url = $(this).attr('data-value');
        var check = $("input[name=ld_allow]:checked").val();
        if (check == 'yes') {
            $('#video_pause').trigger('click');
            window.open(url);
        } else {
            $('#video_pause').trigger('click');
        }
    });
</script>
