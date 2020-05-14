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
                                    src="http://www.aalabels.com/theme/site/images/logo.png" border="0"
                                    style="outline:0;" height="60px"/></a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
        <td bgcolor="#17b1e3" align="center" style="padding: 40px 5px;"><h1
                    style="font-size: 32px;color: #fff;font-family: Arial, sans-serif;font-weight: normal;margin-bottom: 20px;">
                Hello
                <?= $UserName ?>
                ,</h1>
            <p style="font-size: 17px;color: #fff;font-family: Arial, sans-serif;font-weight: normal;padding: 0px 80px;">
                Here are personalized recommendations for you based
                on items you purchased or reviewed. Click here to see
                why these items were recommended. </p></td>
    </tr>
    <tr>
        <td bgcolor="#e9e8e8"
            style="text-align: center;font-size: 15px;font-weight: bold;color: #006da4;padding: 8px;font-family: Arial, sans-serif;">
            Products in Basket
        </td>
    </tr>
    <tr>
        <td>
            <div>
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
                        $type = 'sra3-sheets';
                    } else if (preg_match("/A5/i", $prod[0]['ProductBrand'])) {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/A5Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                        $type = 'a5-sheets';
                    } else if (preg_match("/A3/i", $prod[0]['ProductBrand'])) {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/A3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                        $type = 'a3-sheets';
                    } else if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {
                        $new_code_exp = explode("R", $prod[0]['CategoryID']);
                        $catid = $new_code_exp[0];
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $catid);
                        $image = str_replace(".png", ".jpg", $image);
                        $path = Assets . "images/categoryimages/RollLabels/" . $image;
                        $type = 'roll-labels';
                    } else if (preg_match('/Integrated Labels/is', $prod[0]['ProductBrand'])) {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/Integrated/" . $image;
                        $type = "integrated-labels";
                    } else {
                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                        $path = Assets . "images/categoryimages/A4Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                        $type = "a4-sheets";
                    }

                    if (substr($prod[0]['CategoryID'], -2, 1) == 'R') {
                        if (preg_match('/r1|r2|r3|r4|r5/is', $categoryID)) {
                            $new_code_exp = explode("R", $categoryID);
                            $categoryID = $new_code_exp[0];
                        }
                        $Roll = $this->home_model->min_qty_roll($prod[0]['ManufactureID']);
                        $price = $this->home_model->calclateprice($prod[0]['ManufactureID'], $Roll, 100);
                        $price = $price['final_price'];
                        $data['min_labels'] = $Roll * 100;
                    } else {
                        if (preg_match('/A4/', $prod[0]['ProductBrand'])) {
                            $qty_count = 25;
                        } else {
                            $qty_count = 100;
                        }
                        $price = $this->product_model->ajax_price($qty_count, $prod[0]['ManufactureID']);
                        $price = $price['custom_price'];
                    }

                    $url = base_url() . $type . '/' . strtolower($prod[0]['Shape']) . '/' . strtolower($prod[0]['CategoryID']) . "?productid=" . $prod[0]['ProductID'];

                    if (preg_match("/Integrated/", $prod[0]['ProductBrand'])) {
                        $url = base_url() . $type . '/' . strtolower($prod[0]['CategoryID']);
                    }
                    ?>
                    <div style="width: 49%;float:left;margin-top: 20px;">
                        <div style="display: inline-flex;">
                            <div><img src="<?= $path ?>"/ style="width: 50px;padding: 5px;"></div>
                            <div> <span style="color: #333;font-size: 12px;font-weight: bold;">
              <?= $prod[0]['ManufactureID'] ?>
              </span>
                                <hr style="border: 1px solid #e0e0e0;">
                                <span style="display: block;font-size: 12px;color: #333;min-height: 80px;">
              <?= $completeName ?>
              </span>
                                <hr style="border: .5px solid #e0e0e0;">
                                <span style="font-size: 12px;color: #333;">Starting from
              <?= symbol . $price ?>
              </span></br>
                                <span> <a href="<?= $url ?>" style="background-color: #fd4913;border: none;color: white;padding: 7px 57px;text-align: center;text-decoration: none;display: inline-block;
                        font-size: 12px;font-weight: bold;cursor: pointer;border-radius: 4px;"> Add To Cart </a> </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
        <td style="font-size:12px; padding-bottom:5px;text-align:center"><p
                    style="font-size: 13px;text-align: center;color: #222222;">We noticed that you have added to your
                shopping basket but didn’t continue to checkout. <br/>
                When you are ready to purchase simply <a style="color: #006ca2 !important;text-decoration: underline;">visit
                    your shopping basket</a> to complete your order. </p>
            <p style="font-size: 13px;text-align: center;color: #222222;">If you require assistance then please do not
                hesitate to contact our customer care team.</p>
            <p style="font-size: 13px;text-align: center;color: #222222;">Tel. 01733 588390<br/>
                Email: <a style="color: #006ca2 !important;text-decoration: underline;">customercare @aalabels.com</a>
            </p></td>
    </tr>
    <tr>
        <td height="20px"></td>
    </tr>
    <tr>
        <td><img src="http://www.aalabels.com/theme/site/images/email_banner2.jpg" width="100%"/></td>
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
</table>
