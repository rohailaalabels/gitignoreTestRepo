<?php
$browsing_history = $this->home_model->get_browsing_history();
//echo"<pre>";print_r($browsing_history);echo"</pre>";
//$name = $this->home_model->get_user_against_ip($this->session->userdata('ip_address'));
if ($browsing_history) {
    ?>

    <div id="ab_loader" class="white-screen" style="display:none;position:relative;">
        <div class="loading-gif text-center" style="top: 106px;left: 43%;"><img onerror='imgError(this);'
                                                                                alt="AA Labels Loader"
                                                                                src="<?= Assets ?>images/loader.gif"
                                                                                class="image"
                                                                                style="width:160px; height:43px; "/>
        </div>
    </div>
    <div class="ourTeam">
        <div class="container">
            <div class="">
                <div class="thumbnail m0 p0"
                     style="margin-top:20px !important;margin-bottom:0px !important;padding-bottom:0px !important; border:none;">
                    <div class="clearfix">
                        <div class="browing_history_home" style="background:none !important;">
                            <div class="p-l-r-10">
                                <p class="browing_history_title_home"><i class="fa fa-user"></i>Your recent browsing
                                    history</p>
                                <div class="carousel-wrap browsing_history_carousel_wrap">
                                    <div class="owl-carousel" id="browsing_carousel">
                                        <? foreach ($browsing_history as $history) {
                                            $prod = $this->shopping_model->show_product($history->ProductID);
                                            //echo"<pre>";print_r($prod);echo"</pre>";
                                            $orientation = $wound = $isCustom = '';
                                            $FinishType = "No Finish";
                                            $orignalQty = $history->Quantity;
                                            $shape = strtolower($prod[0]['Shape']) . "/";
                                            $categoryID = $prod[0]['CategoryID'];
                                            $parameter = "?productid=" . $history->ProductID;
                                            $datamerge = "";
                                            if (preg_match("/SRA3/i", $prod[0]['ProductBrand'])) {
                                                $product_type = "SRA3";
                                                $url_type = "sra3-sheets";
                                                $path = Assets . "images/categoryimages/SRA3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                                //$datamerge = "data-merge='2'";
                                            } else if (preg_match("/A5/i", $prod[0]['ProductBrand'])) {
                                                $product_type = "A5";
                                                $url_type = "a5-sheets";
                                                $path = Assets . "images/categoryimages/A5Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                                //$datamerge = "data-merge='2'";
                                            } else if (preg_match("/A3/i", $prod[0]['ProductBrand'])) {
                                                $product_type = "A3";
                                                $url_type = "a3-sheets";
                                                $path = Assets . "images/categoryimages/A3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                                //$datamerge = "data-merge='2'";
                                            } else if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {
                                                $product_type = 'Rolls';
                                                $path = Assets . "images/categoryimages/RollLabels/outside/" . $prod[0]['ManufactureID'] . ".jpg";
                                                $url_type = "roll-labels";
                                                $orientation = 01;
                                                $wound = "Y";
                                                $isCustom = 'Yes';
                                            } else if (preg_match('/Integrated Labels/is', $prod[0]['ProductBrand'])) {
                                                $product_type = 'Integrated';
                                                $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                                                $url_type = "integrated-labels";
                                                $path = Assets . "images/categoryimages/Integrated/" . $image;
                                                $orignalQty = 1000;
                                                $shape = '';
                                                $parameter = '';
                                            } else {
                                                $url_type = "a4-sheets";
                                                $product_type = 'A4';
                                                $path = Assets . "images/categoryimages/A4Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                            }
                                            if ($history->labeltype == "plain") {
                                                $printing_option = "N";
                                                $source_option = "N";
                                                $printing_type = "N";
                                            } else {
                                                $printing_option = "Y";
                                                $source_option = "printing";
                                                $printing_type = "Monochrome - Black Only";
                                            }

                                            $product_collection = array('is_custom' => $isCustom,
                                                'ProductCategoryName' => $prod[0]['ProductCategoryName'],
                                                'LabelsPerRoll' => $row->LabelsPerRoll,
                                                'LabelsPerSheet' => $prod[0]['LabelsPerSheet'],
                                                'ReOrderCode' => $prod[0]['ReOrderCode'],
                                                'ManufactureID' => $prod[0]['ManufactureID'],
                                                'ProductBrand' => $prod[0]['ProductBrand'],
                                                'wound' => $wound,
                                                'Source' => $source_option,
                                                'Printing' => $printing_option,
                                                'Orintation' => $orientation,
                                                'Print_Type' => $printing_type,
                                                'FinishType' => $FinishType,
                                                'orignalQty' => $orignalQty,
                                                'ProductID' => $history->ProductID);
                                            //echo"<pre>";print_r($product_collection);echo"</pre>";

                                            $completeName = $this->home_model->customize_product_name($product_collection);
                                            if (substr($categoryID, -2, 1) == 'R') {
                                                if (preg_match('/r1|r2|r3|r4|r5/is', $categoryID)) {
                                                    $new_code_exp = explode("R", $categoryID);
                                                    $categoryID = $new_code_exp[0];
                                                }
                                                $Roll = $this->home_model->min_qty_roll($prod[0]['ManufactureID']);
                                                $price = $this->home_model->calclateprice($prod[0]['ManufactureID'], $Roll, 100);
                                                $price = $price['final_price'];
                                                $price = $this->home_model->currecy_converter($price, 'yes');
                                                $data['min_labels'] = $Roll * 100;
                                            } else if (preg_match('/Integrated/', $prod[0]['ProductBrand'])) {
                                                $price = $this->home_model->single_box_price($prod[0]['ManufactureID'], '1000', '1000');
                                                $price = $this->home_model->currecy_converter($price['PlainPrice'], 'yes');
                                            } else {
                                                if (preg_match('/A4/', $prod[0]['ProductBrand']) || preg_match('/A5/', $prod[0]['ProductBrand'])) {
                                                    $qty_count = 25;
                                                } else {
                                                    $qty_count = 100;
                                                }
                                                $price = $this->product_model->ajax_price($qty_count, $prod[0]['ManufactureID']);
                                                $price = $price['custom_price'];
                                                
                                                if (preg_match('/A5/', $prod[0]['ProductBrand'])) {
                                                    $price = $price / 2;
                                                }
                                                
                                                $price = $this->home_model->currecy_converter($price, 'yes');
                                            }

                                            $img_class = "col-md-4 col-sm-4";
                                            $desc_class = "col-md-8 col-sm-8";

                                            if (preg_match("/A3/i", $prod[0]['ProductBrand']) || preg_match("/SRA3/i", $prod[0]['ProductBrand'])) {
                                                $img_class = "col-md-6 col-sm-6";
                                                $desc_class = "col-md-6 col-sm-6";
                                            }

                                            ?>
                                            <div class="item item-<?= $product_type ?>" <?= $datamerge ?>>
                                                <div class="image_thumbnail <?= $img_class ?>"><img src="<?= $path ?>"
                                                                                                    class="img-responsive hover_image_zoom"/>
                                                </div>
                                                <div class="line_description <?= $desc_class ?>">
                                                    <div class="browsing_manufacture_top"><strong>
                                                            <?= $history->ManufactureID ?>
                                                        </strong> <a href="javascript:void(0);"
                                                                     class="delete_browsing_history pull-right"
                                                                     data-id="<?= $history->ProductID ?>"><i
                                                                    class="fa fa-trash-o"></i></a></div>
                                                    <div class="browsing_middle text-justify">
                                                        <p>
                                                            <?php
                                                            $max_length = 80;
                                                            if (strlen($completeName) > $max_length and (!preg_match("/A3/i", $prod[0]['ProductBrand']) || !preg_match("/SRA3/i", $prod[0]['ProductBrand']))) {
                                                                $offset = ($max_length - 3) - strlen($completeName);
                                                                $short_desc = substr($completeName, 0, strrpos($completeName, ' ', $offset)) . '...';
                                                                //$short_desc .= ' <a style="cursor:pointer;" data-toggle="tooltip" data-placement="top" data-original-title="'.$completeName.'"><i>Read More</i></a>';
                                                            } else {
                                                                $short_desc = $completeName;
                                                            }
                                                            echo $short_desc ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="browsing_bottom col-md-12 col-sm-12 text-center">
                                                    <p>Starting From <strong>
                                                            <?= symbol . number_format($price, 2, '.', ''); ?>
                                                        </strong></p>
                                                    <a href="<?= base_url() . $url_type . "/" . $shape . $categoryID . $parameter; ?>"
                                                       class="btn orangeBg btn-sm btn-block continue_place_order">Continue
                                                        & Place Order</a></div>
                                            </div>
                                            <?
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="col-xs-1 no-padding"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>