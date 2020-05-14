<head>
    <meta charset="utf-8"/>
</head>
<style>
    body {
        width: 100%;
        background-color: #ffffff;
        margin: 0;
        padding: 20px 0;
        -webkit-font-smoothing: antialiased;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        color: #687074;
    }

    table {
        border-collapse: collapse;
        background-color: #fff;
    }

    a {
        color: #00a9e0;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    @media only screen and (max-width: 640px) {
        body[yahoo] .deviceWidth {
            width: 440px !important;
            padding: 0;
        }

        body[yahoo] .center {
            text-align: center !important;
        }
    }

    @media only screen and (max-width: 479px) {
        body[yahoo] .deviceWidth {
            width: 280px !important;
            padding: 0;
        }

        body[yahoo] .center {
            text-align: center !important;
        }
    }

    .cart_table tr td {
        border: solid 1px #ebebeb;
        padding: 10px;
    }

    .cart_table th {
        border: 0;
        border-collapse: collapse;
        background: #17b1e3;
        color: #fff !important;
    }

    .cart_table th h4 {
        color: #fff !important;
    }

    .cart_table td {
        padding: 10px !important;
        border: 1px solid #ececec;
    }

    .cart_table tr:nth-child(even) {
        background: #fbfbfb;
    }
</style>
<table width="632px" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Arial;">
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><a href="https://www.aalabels.com/"
                           style="padding:0 10px; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; text-decoration:none;">HOME</a>
                        <a href="https://www.aalabels.com/aboutus/"
                           style="padding:0 10px;; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; margin-left:5px; text-decoration:none;">ABOUT</a>
                        <a href="https://www.aalabels.com/contact-us/"
                           style="padding:0 10px; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; margin-left:5px; text-decoration:none;">CONTACT</a>
                    </td>
                    <td align="right"><a href="http://www.aalabels.com/" style="text-decoration:none;"><img
                                    onerror='imgError(this);' src="http://www.aalabels.com/theme/site/images/logo.png"
                                    border="0" style="outline:0;" height="60px"/></a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
        <td bgcolor="#17b1e3" align="center" style="padding: 40px 5px;"><h1
                    style="font-size: 32px;color: #fff;font-family: Arial, sans-serif;font-weight: normal;">You have
                left something<br/>
                in your basket!</h1>
            <p style="font-size: 17px;color: #fff;font-family: Arial, sans-serif;font-weight: normal;"> There's still
                time to complete your order,<br/>
                just click the return to basket button below. </p></td>
    </tr>
    <tr>
        <td bgcolor="#e9e8e8"
            style="text-align: center;font-size: 15px;font-weight: bold;color: #006da4;padding: 8px;font-family: Arial, sans-serif;">
            Products in Basket
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" style="border: solid 1px #ebebeb;border-collapse:collapse" class="cart_table">
                <tr>
                    <th class="" style="width:70%;text-align:left;"><h4
                                style="margin: 0 !important;padding: 10px;color: #00629b;">Description</h4></th>
                    <th class="" style="width:15%;text-align:center;"><h4
                                style="margin: 0 !important;padding: 10px;color: #00629b;">Qty</h4></th>
                    <th class="" style="width:15%;text-align:center;"><h4
                                style="margin: 0 !important;padding: 10px;color: #00629b;">Price</h4></th>
                </tr>
                <?php
                $texvat = 0.00;
                $delivery_text = '';
                $sample_detect = 0;
                foreach ($cart_detail as $row) {
                    $disable = false;
                    $A4Printing = '';
                    $colorcode = '';
                    $prod = $this->shopping_model->show_product($row->ProductID);

                    $sub_inclvat = round($row->TotalPrice, 2);
                    if ($row->Printing == 'Y') {
                        $sub_inclvat = $sub_inclvat + $row->Print_Total;
                    }
                    $sub_inclvat = $this->home_model->currecy_converter($sub_inclvat, 'no');

                    $labels = $prod[0]['LabelsPerSheet'];
                    $product_type = 'Sheets';

                    //new code
                    $prod[0]['Image1'] = str_replace(".gif", ".png", $prod[0]['Image1']);
                    $path = Assets . 'images/material_images/' . $prod[0]['Image1'];
                    //$img_class = 'img-circle';

                    $img_class = '';
                    $img_width = '40';

                    /******************Sample Order implementation***********************/
                    $product_collection = array('is_custom' => $row->is_custom,
                        'ProductCategoryName' => $prod[0]['ProductCategoryName'],
                        'LabelsPerRoll' => $row->LabelsPerRoll,
                        'LabelsPerSheet' => $prod[0]['LabelsPerSheet'],
                        'ReOrderCode' => $prod[0]['ReOrderCode'],
                        'ManufactureID' => $prod[0]['ManufactureID'],
                        'ProductBrand' => $prod[0]['ProductBrand'],
                        'wound' => $row->wound,
                        'OrderData' => $row->OrderData,
                        'Source' => $row->source,
                        'Printing' => $row->Printing,
                        'Orintation' => $row->orientation,
                        'Print_Type' => $row->Print_Type,
                        'FinishType' => $row->FinishType
                    );
                    $completeName = $this->home_model->customize_product_name($product_collection);
                    if (preg_match("/Application Labels/i", $prod[0]['ProductBrand'])) {
                        $designcode = substr($prod[0]['ManufactureID'], -4);
                        $colorcode = ($row->colorcode) ? '-' . $row->colorcode : '';
                        $path = Assets . "images/application/design/" . $designcode . $colorcode . '.png';
                        $img_class = '';
                        $img_width = '60';
                    } else if (preg_match("/SRA3/i", $prod[0]['ProductBrand'])) {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/SRA3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                    } else if (preg_match("/A5/i", $prod[0]['ProductBrand'])) {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/A5Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                    } else if (preg_match("/A3/i", $prod[0]['ProductBrand'])) {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/A3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                    } else if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {

                        $new_code_exp = explode("R", $prod[0]['CategoryID']);
                        $catid = $new_code_exp[0];
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $catid);
                        $image = str_replace(".png", ".jpg", $image);
                        $path = Assets . "images/categoryimages/RollLabels/" . $image;
                    } else if (preg_match('/Integrated Labels/is', $prod[0]['ProductBrand'])) {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/Integrated/" . $image;
                    } else {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/A4Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                    }
                    ?>
                    <tr>
                        <td style="vertical-align:middle" ;>
                            <div class="image" style="width:15%;float:left;">
                                <img onerror='imgError(this);' src="<?= $path ?>" alt="<?= $prod[0]['ManufactureID'] ?>"
                                     style="width:80%;">
                            </div>
                            <div class="description" style="width:85%;float:left;">
                                <h4 style="margin:0;"><?= $prod[0]['ManufactureID'] ?></h4>
                                <?= $completeName ?>
                                <?php if ($row->Printing == 'Y') { ?>
                                    <p style="margin:2px 0;color:17b1e3;"><strong>
                                            <?= $this->home_model->get_printing_service_name($row->Print_Type, $row->regmark); ?>
                                        </strong></p>
                                    <?php
                                }
                                ?>
                            </div>
                        </td>
                        <td style="text-align:center; vertical-align:middle" ;>
                            <div class="col-xs-12 col-sm-12 col-md-12 p0">
                                <? if ($row->source != 'printing') { ?>
                                    <div class="input-group"><strong><span style="margin:0;">
                <?
                $sheets = ($row->Quantity > 1) ? ' Sheets' : ' Sheet';
                $qty_text = $row->Quantity . $sheets;

                echo $qty_text; ?>
                </span></strong></div>
                                <? } else {
                                    if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {
                                        $qty_text = $row->orignalQty . ' Labels   (' . $row->Quantity . ' Rolls)';
                                    } else {
                                        $sheets = ($row->Quantity > 1) ? 'Sheets' : ' Sheet';
                                        $qty_text = $row->Quantity . $sheets;
                                    }
                                    $designs = ($row->Print_Qty > 1) ? 'Designs' : ' Design'
                                    ?>
                                    <strong><span style="margin:0;">
              <?= $qty_text . '<br/>' . $row->Print_Qty . ' ' . $designs ?>
              </span></strong>
                                <? } ?>
                            </div>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><strong><span
                                        style="margin:0;"><?php echo symbol . number_format($sub_inclvat, 2, '.', ''); ?> </span></strong>
                        </td>
                    </tr>
                    <? $texvat += $sub_inclvat;
                } ?>
            </table>
        </td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
        <td style="text-align:center"><a class="button" href="<?= $complete_link ?>"
                                         style=" background-color: #17b1e3;border: none;color: white;padding: 11px 26px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;font-weight:bold;margin: 4px 2px;cursor: pointer;border-radius:8px;"
                                         target="_blank">RETURN TO BASKET</a></td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
        <td style="font-size:12px; padding-bottom:5px;text-align:center"><p
                    style="font-size: 13px;text-align: center;color: #222222;">We noticed that you have added to your
                shopping basket but didn't continue to checkout. <br/>
                When you are ready to purchase simply <a href="<?= $complete_link ?>" target="_blank"
                                                         style="color: #006ca2 !important;text-decoration: underline;">visit
                    your shopping basket</a> to complete your order. </p>
            <p style="font-size: 13px;text-align: center;color: #222222;">If you require assistance then please do not
                hesitate to contact our customer care team.</p>
            <p style="font-size: 13px;text-align: center;color: #222222;">Tel. 01733 588390<br/>
                Email: <a style="color: #006ca2 !important;text-decoration: underline;">customercare@aalabels.com</a>
            </p></td>
    </tr>
    <tr>
        <td height="20px"></td>
    </tr>
    <tr>
        <td><img onerror='imgError(this);' src="http://www.aalabels.com/theme/site/images/email_banner2.jpg"
                 width="100%"/></td>
    </tr>
    <tr>
        <td height="5px"></td>
    </tr>
    <tr>
        <td style="font-size:10px;">Disclaimer: This e-mail and attachments are intended for the above name(d) only and
            may contain information that is legally privileged. If you are not the intended recipient or have received
            this e-mail in error, please inform the sender by pressing the reply button, and delete the e-mail
            immediately afterwards. Any opinions expressed via e-mail are solely those of the individual and do not
            necessarily reflect those of AA Labels.
        </td>
    </tr>
    <tr>
        <td height="5px"></td>
    </tr>
    <tr>
        <td style="font-size:10px;">All e-mails are scanned for Viruses when sent, but AA Labels. do not take any legal
            responsibility for data lost as a result of opening or forwarding this e-mail, we recommend that the
            recipient takes any precautions they consider appropriate before opening e-mails.
        </td>
    </tr>
    <tr>
        <td height="5px"></td>
    </tr>
    <tr>
        <td style="font-size:10px;text-align:center">If you don't want to recieve abandoned cart notifications, you can
            <a href="<?= $unsubscribe_link ?>" target="_blank">unsubscribe</a>.
        </td>
    </tr>
    <tr>
        <td height="5px"></td>
    </tr>
</table>
