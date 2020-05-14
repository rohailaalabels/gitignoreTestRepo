<?php
$lineclass = 'product';
if (count($cart_detail) == 0) {
    echo "<script>window.location.reload();</script>";
};
?>

<div class="col-sm-12 col-md-9 m-t-10">
    <div class="table-responsive ">
        <table class="table table-bordered table-hover">
            <thead class="bgBlueHeading">
            <tr>
                <!--<th class="hidden-xs" style="width:50%; " colspan="2" >Code / Description</th>
                <th class=""  style="width:20%;">Qty</th>
                <th style="width:12%;">Ex. Vat </th>
                <th class="hidden-xs" style="width:12%;">Inc. Vat</th>
                <th style="width:4%;">Action</th>-->

                <th class="hidden-xs text-center" style="width:5%;">Image</th>
                <th class="hidden-xs text-center" style="width:45%;">Description</th>
                <th class="text-center" style="width:20%;">Qty</th>
                <th class="text-center" style="width:12%;">Ex. Vat</th>
                <th class="hidden-xs text-center" style="width:12%;">Inc. Vat</th>
                <th style="width:4%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $texvat = 0.00;
            $delivery_text = '';
            $sample_detect = 0;
            $ecom_productinfo = '';
            foreach ($cart_detail as $row) {
                $disable = false;
                $A4Printing = '';
                $colorcode = '';
                $prod = array();
                if ($row->ProductID == 0 and $row->source == "LBA") {
                    $productnameline = explode("-", $row->p_name);
                    $prodd_name = trim($productnameline[0]);
                    $prodd_shape = trim($productnameline[1]);
                    $prodd_size = trim($productnameline[2]);
                    $prodd_category = trim($productnameline[3]);
                    $prodd_brand = trim($productnameline[4]);
                    $prodd_designID = $row->p_code;
                    $prod[0]['ProductName'] = $prodd_name;
                    $prod[0]['CategoryID'] = $prodd_category;
                    $prod[0]['Shape'] = $prodd_shape;
                    $prod[0]['Shape_upd'] = $prodd_shape;
                    $prod[0]['ProductCategoryName'] = $prodd_name;
                    $prod[0]['ProductBrand'] = $prodd_brand;
                } else {
                    $prod = $this->shopping_model->show_product($row->ProductID);
                }

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
                $img_class = 'img-circle';
                $img_width = '25';

                $img_class = '';
                $img_width = '50';

                /******************Sample Order implementation***********************/
                if ($row->OrderData == 'Sample') {
                    $min_qty = '1';
                    $max_qty = '1';
                    $product_type = 'Sample';
                    $disable = true;
                    $sample_detect = 1;
                } /******************Sample Order implementation***********************/
                else if (preg_match("/Application Labels/i", $prod[0]['ProductBrand'])) {
                    $min_qty = '1';
                    $max_qty = '50000';
                    $designcode = substr($prod[0]['ManufactureID'], -4);
                    $colorcode = ($row->colorcode) ? '-' . $row->colorcode : '';
                    $path = Assets . "images/application/design/" . $designcode . $colorcode . '.png';
                    $img_class = '';
                    $img_width = '60';
                } else if (preg_match("/SRA3/i", $prod[0]['ProductBrand'])) {
                    $min_qty = '100';
                    $max_qty = '100000';

                    $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                    $path = Assets . "images/categoryimages/SRA3Sheets/" . $image;
//                    $path = Assets . "images/categoryimages/SRA3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";

                } else if (preg_match("/A5/i", $prod[0]['ProductBrand'])) {
                    $min_qty = '25';
                    $max_qty = '100000';
                    if (preg_match("/PETC/", $prod[0]['ManufactureID']) || preg_match("/PETH/", $prod[0]['ManufactureID']) || preg_match("/PVUD/", $prod[0]['ManufactureID'])) {
                		$min_qty = '5';
                		$max_qty = '100000';
                	} 

                    $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                    $path = Assets . "images/categoryimages/A5Sheets/" . $image;
//                    $path = Assets . "images/categoryimages/A5Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";

                } else if (preg_match("/A3/i", $prod[0]['ProductBrand'])) {
                    $min_qty = '100';
                    $max_qty = '100000';

                    $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                    $path = Assets . "images/categoryimages/A3Sheets/" . $image;
//                    $path = Assets . "images/categoryimages/A3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";

                } else if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {

                    $min_qty = $this->home_model->min_qty_roll($prod[0]['ManufactureID']);
                    $max_qty = $this->home_model->max_qty_roll($prod[0]['ManufactureID']);
                    if ($row->is_custom == 'Yes') {
                        $labels = $row->LabelsPerRoll;
                    }
                    $product_type = 'Rolls';

                    $new_code_exp = explode("R", $prod[0]['CategoryID']);
                    $catid = $new_code_exp[0];
                    $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $catid);
                    $path = Assets . "images/categoryimages/rollimages/" . $image;
                    $image = str_replace(".png", ".jpg", $image);
                    $path = Assets . "images/categoryimages/RollLabels/" . $image;

                } else if (preg_match('/Integrated Labels/is', $prod[0]['ProductBrand'])) {
                    $min_qty = $this->home_model->min_qty_integrated($prod[0]['ManufactureID']);
                    $max_qty = $this->home_model->max_qty_integrated($prod[0]['ManufactureID']);
                    $product_type = 'Integrated';

                    $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                    $path = Assets . "images/categoryimages/Integrated/" . $image;
                    $lineclass = "integratedLine";
                } else {

                    $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                    $path = Assets . "images/categoryimages/A4Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                    if (substr($prod[0]['ManufactureID'], -2, 2) == 'XS') {
                        $min_qty = '5';
                        $max_qty = '100';
                        $product_type = 'xmass';
                        $disable = true;
                        $delivery_text = 'off';
                    } else {
                        if (preg_match("/PETC/", $prod[0]['ManufactureID']) || preg_match("/PETH/", $prod[0]['ManufactureID']) || preg_match("/PVUD/", $prod[0]['ManufactureID'])) {
                            $min_qty = '5';
                            $max_qty = '100000';

                        } else {
                            $min_qty = '25';
                            $max_qty = '100000';
                        }
                    }
                }
                //new code
                if ($row->Printing == 'Y') {
                    if ($row->source == 'flash') {
                        $min_qty = '1';
                        $max_qty = '50000';
                    }
                    $A4Printing = $this->home_model->get_printing_service_name($row->Print_Type, $row->regmark);
                }


                $designedlabels = '';
                if ($row->source == 'printing' && preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {
                    $designedlabels = $this->home_model->get_total_printed_labels($row->ID, $row->ProductID);
                }


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
                    'label_application' => $row->label_application,
                    'Printing' => $row->Printing,
                    'Orintation' => $row->orientation,
                    'Print_Type' => $row->Print_Type,
                    'FinishType' => $row->FinishType,
                    'designedlabels' => $designedlabels,
                    'orignalQty' => $row->orignalQty,
                    'ProductID' => $row->ProductID,
                    'design_size' => $prodd_size);

                $completeName = $this->home_model->customize_product_name($product_collection);
                
                //$prod[0]['Image1'] = str_replace(".gif",".png",$prod[0]['Image1']);

                //new code
                if ($row->source == 'flash') {
                    $flash = $this->home_model->get_printed_attch($row->ID);
                    $path = AJAXURL . '/designer/media/thumb/' . $flash['Thumb'];
                    $img_class = '';
                    $img_width = '60';
                }
                if ($row->ProductID == 0 and $row->source == "LBA") {
                    $diecode = $this->home_model->get_db_column('category', 'CategoryImage', 'CategoryID', $prodd_category);
                    $path = Assets . 'images/categoryimages/thumbnail_label/' . $diecode;
                }
                if (preg_match('/Integrated Labels/is', $prod[0]['ProductBrand'])) {
                    $lineclass = "integratedLine";
                    if (preg_match('/250/', $completeName)) {
                        $min_qty = 250;
                    } else {
                        $min_qty = 1000;
                    }
                    $max_qty = 500000;
                }
                ?>
                <tr>
                    <th <?= ($row->Printing == 'Y' || ($row->ProductID == 0 and $row->source == "LBA")) ? 'rowspan="2"' : '' ?>
                            class="text-center hidden-xs"> <? //new code ?>
                        <img onerror='imgError(this);' class="<?= $img_class ?>" src="<?= $path ?>"
                             width="<?= $img_width ?>" height="" alt="<?= $prod[0]['ManufactureID'] ?>"></th>
                    <td class="hidden-xs"><h2 class="BlueHeading"> <?= $prod[0]['ManufactureID'] ?></h2>
                        <?php if ($row->ProductID == 0 and $row->source == "LBA"): ?>
                            <h4><?= $completeName ?></h4>
                        <?php else: ?>
                            <p><?= $completeName ?></p>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center; vertical-align:middle" ;>
                        <div class="visible-xs ">
                            <h4>
                                <?= $prod[0]['ManufactureID'] ?>
                            </h4>
                            <div class="breakText">
                                <p>
                                    <?= $completeName ?>
                                </p>
                            </div>
                        </div>
                        <input type="hidden" id="labels<?= $row->ID ?>" value="<?= $labels ?>"/>
                        <input type="hidden" id="min_qty<?= $row->ID ?>" value="<?= $min_qty ?>"/>
                        <input type="hidden" id="max_qty<?= $row->ID ?>" value="<?= $max_qty ?>"/>
                        <input type="hidden" id="product_type<?= $row->ID ?>" value="<?= $product_type ?>"/>
                        <input type="hidden" id="prd_id<?= $row->ID ?>" value="<?= $row->ProductID ?>"/>
                        <input type="hidden" id="old_qty<?= $row->ID ?>" value="<?= $row->Quantity ?>"/>
                        <input type="hidden" id="menuid<?= $row->ID ?>" value="<?= $prod[0]['ManufactureID'] ?>"/>
                        <div class="col-xs-12 col-sm-12 col-md-12 p0">
                            <?
                            if ($row->source != 'printing' && $row->source != 'LBA' && $row->Printing != "Y") {
                                ?>
                                <div class="input-group"> <span class="input-group-btn">
                <button <?= ($disable == true) ? 'disabled="disabled"' : '' ?> id="minus_<?= $row->ID ?>"
                                                                               class="checkout-button btn btn-default btn-number minu-qty"
                                                                               type="button"> <span
                            class="glyphicon glyphicon-minus"></span> </button>
                </span>
                                    <input type="text" <?= ($disable == true) ? 'disabled="disabled"' : '' ?>
                                           id="qty_<?= $row->ID ?>" value="<?= $row->Quantity ?>"
                                           class="input-group-btn form-control input-number text-center allownumeric"
                                           name="quant1">
                                    <span class="input-group-btn">
                <button <?= ($disable == true) ? 'disabled="disabled"' : '' ?> id="plus_<?= $row->ID ?>"
                                                                               class="checkout-button btn btn-default btn-number plus-qty"
                                                                               type="button"> <span
                            class="glyphicon glyphicon-plus"></span> </button>
                </span></div>
                                <div class="row" style="text-align:center;"><a id="updatebtn_<?= $row->ID ?>" href="javascript:void(0);" style="display:none;" class="clear_b" onclick="update_item('<?= $row->ID ?>','<?= $prod[0]['ManufactureID'] ?>');">
                                        <i class="fa fa-refresh"></i> Update </a></div>
                            <? } else {
                                if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {

                                    if ($designedlabels != '' and $designedlabels > 0) {
                                        $qty_text = $designedlabels . ' Labels   ( ' . $row->Quantity . ' Rolls) ';
                                    } else {
                                        $qty_text = $row->orignalQty . ' Labels   ( ' . $row->Quantity . ' Rolls) ';
                                    }
                                } else {

                                    $sheets = ($row->Quantity > 1) ? ' Sheets' : ' Sheet';
                                    $qty_text = $row->Quantity . $sheets;
                                }

                                $designs = ($row->Print_Qty > 1) ? ' Designs' : ' Design'
                                ?>
                                <p style='text-align:center; font-weight:bold;'>
                                    <?
                                    if ($row->ProductID == 0 and $row->source == "LBA") {
                                        echo $row->Print_Qty . ' ' . $designs;
                                    } else {
                                        echo $qty_text . '<br/>' . $row->Print_Qty . ' ' . $designs;
                                    }
                                    ?>
                                </p>
                            <? } ?>
                        </div>
                    </td>
                    <td style="text-align:center; vertical-align:middle">
                        <strong><?php echo symbol . number_format($sub_inclvat, 2, '.', ''); ?> </strong></td>
                    <td style="text-align:center; vertical-align:middle" class="hidden-xs">
                        <strong><?php echo symbol . number_format(($sub_inclvat * 1.2), 2, '.', ''); ?></strong></td>
                    <td style="text-align:center; vertical-align:middle">
                        <div class="col-xs-12 col-sm-12 col-md-3 "><a id="<?= $row->ID ?>"
                                                                      class="btn blueBg delete_item" role="button"><i
                                        class="fa f-20 fa-trash "></i> </a></div>
                    </td>
                </tr>
                <? if ($row->Printing == 'Y' || ($row->ProductID == 0 and $row->source == "LBA")) {
                    $artowrks = $this->home_model->get_printed_files($row->ID, $row->ProductID);
                    $row->Print_Total = $this->home_model->currecy_converter($row->Print_Total, 'no');
                    ?>
                    <tr>
                        <td colspan="5">
                            <strong><?= $A4Printing ?></strong>
                            <? if ($row->ProductID == 0 and $row->source == "LBA"): ?>
                                <h4>Design: <?= $prodd_name ?></h4>
                                <p>You have selected an alternative shape and size of label to the standard selection
                                    for this design and following payment our studio design team will prepare the design
                                    artwork for this format. When ready and uploaded to FLDT you will receive an emailed
                                    direct link enabling you to see the new template and customise the design. </p>
                            <? endif; ?>

                            <div class="col-xs-12 col-sm-12 col-md-12 ">
                                <?
                                if ($row->ProductID == 0 and $row->source == "LBA"):
                                    $label_image = $this->home_model->get_db_column("lba_sets", "image", "Designid", $prodd_designID);
                                    $imgsrc = LABELER . "thumb/" . $label_image;
                                    ?>
                                    <div class="col-xs-2 col-sm-2 col-md-2 "><img class="" alt="<?= $imgsrc ?>"
                                                                                  src="<?= $imgsrc ?>" height="50"
                                                                                  width="">
                                    </div>
                                <? endif;
                                if (count($artowrks) > 0 and $row->source != 'flash') {
                                    foreach ($artowrks as $upload) {


                                        if (preg_match("/.pdf/is", $upload->file)) {
                                            $artworkpath = AJAXURL . 'theme/site/images/pdf.png';
                                            $width_img = '';
                                        } else if (preg_match("/.doc/is", $upload->file) || preg_match("/.docx/is", $upload->file)) {
                                            $artworkpath = AJAXURL . 'theme/site/images/doc.png';
                                            $width_img = '';
                                        } else {
                                            $artworkpath = AJAXURL . 'theme/integrated_attach/' . $upload->file;
                                            $width_img = '';
                                        }


                                        ?>
                                        <div class="col-xs-2 col-sm-2 col-md-2 "><img onerror='imgError(this);' class=""
                                                                                      alt="<?= $upload->name ?>"
                                                                                      src="<?= $artworkpath ?>"
                                                                                      height="50" width="">
                                            <p class="ellipsis"><small>Labels:</small> <small>
                                                    <?= $upload->labels ?>
                                                </small></p>
                                        </div>
                                    <? }
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                <? } ?>
                <? $texvat += $sub_inclvat;


                if ($row->ProductID != 0) {
                    $ProductBrand = $prod[0]['ProductBrand'];
                } else {
                    $ProductBrand = 'Custom Labels';
                }


                $completeName = str_replace("<span style='color:#fd4913;'>( 20% discount) </span>", "20% discount", $completeName);
                $completeName = str_replace("<span style='color:#fd4913;'>( 40% discount) </span>", "40% discount", $completeName);
                $completeName = str_replace("'", "", $completeName);


                if (preg_match("/Sample/is", $completeName) and $sub_inclvat == 0) {
                    $ProductBrand = 'Material Sample';
                }


                $ecom_productinfo .= "{  'id': '" . $row->ProductID . "',
												   'name': '" . $completeName . "',
												   'brand': 'AALabels',
												   'category': '" . $ProductBrand . "',
												   'price': " . $sub_inclvat . ",
												   'quantity': '" . $row->Quantity . "', 
												  },";


            } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12 col-md-12 m-t-10 p-0">
        <?
        $integrated = $this->shopping_model->is_order_integrated();
        if ($sample_detect == 1) { ?>
            <div role="alert" class="alert alert-warning" style="padding-left:10px !important;"> Material samples are
                provided FOC to assist with the selection of the most suitable adhesive and material for your label
                application. However they are not label size samples but material samples only.
            </div>
        <? } else if ($texvat < 25 and $delivery_text == '' and $integrated == 0) { ?>
            <div role="alert" class="alert alert-warning" style="padding-left:10px !important;"><strong>Delivery
                    Note:</strong> : If your order value exceeds
                <?= symbol . $this->home_model->currecy_converter(25, 'no'); ?>
                (inc. VAT) you have the option to select free delivery. Further delivery options are also available and
                can be selected prior to order placement.
            </div>
        <? } ?>
        <span style="color:#fd4913;">Your delivery options and charge will be calculated after the delivery address is entered and then be shown in the “Shipping” tab below.</span>
    </div>
</div>
<div class="col-sm-12 col-md-3 m-t-10">
    <div class="bgOrangeHeading">
        <div><i class="fa f-20 fa-calculator "></i> Cart Summary</div>
    </div>
    <div class="borderPanel">
        <div class="Lblue">
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
                    <h2><?php echo symbol . number_format($texvat, 2, '.', ''); ?></h2>
                </div>
                <div class="pull-right">
                    <p>Inc. Vat</p>
                    <h2><?php echo symbol . number_format($texvat * 1.2, 2, '.', ''); ?></h2>
                </div>
            </div>
        </div>
        <? $valid_voucher = $this->session->userdata('valid_voucher');
        $disount_applied = '';
        $black_friday = $this->shopping_model->check_black_friday_offer($texvat * 1.2);
        if ($black_friday['status'] == false) {
            // AA30 STARTS
                $FLTD_Check = $this->shopping_model->check_fldt_offer_voucher();
                $wtp_offer = $this->shopping_model->check_wtp_offer_voucher();
            // AA30 ENDS
            //$printed_roll  =  $this->shopping_model->check_printedroll_offer_voucher();
        }
        if ($black_friday['status'] == true) {
            $apply_voucher_class = '';
            $disount_applied['discount_offer'] = $black_friday['discount_offer'];
            $disount_applied['discount_offer'] = $this->home_model->currecy_converter($disount_applied['discount_offer'], 'no');
            $disuntoffer = symbol . $disount_applied['discount_offer'];

            $removebtn = 'remove_firstoffer_voucher';
            $applybtn = 'apply_firstoffer_voucher';
            include_once('vc_blackfriday.php');
        } else if ($valid_voucher == 'yes') {
            $newGrandTotal = $texvat * 1.2;
            $disount_applied = $this->shopping_model->check_discount_applied($newGrandTotal);


            $no_voucher_class = 'hide';
            $apply_voucher_class = 'hide';

            if ($disount_applied) {
                $apply_voucher_class = '';
                $disount_applied['discount_offer'] = $this->home_model->currecy_converter($disount_applied['discount_offer'], 'no');
                $disuntoffer = symbol . $disount_applied['discount_offer'];
            } else {
                $no_voucher_class = '';
                $disuntoffer = '';
            }

            $removebtn = 'remove_firstoffer_voucher';
            $applybtn = 'apply_firstoffer_voucher';
            $vouchertext = 'AAVCS05';
            include_once('vouchercode.php');


        } 
        // AA30 STARTS
        else if ($wtp_offer == true || $FLTD_Check) // AA30 ENDS
        {
            $no_voucher_class = 'hide';
            $apply_voucher_class = 'hide';
            $newGrandTotal = $texvat * 1.2;
            
            // AA30 STARTS
                $row = $this->db->query("select vc_type,status FROM voucherofferd_temp WHERE SessionID = '" . $this->session->userdata('session_id') . "' ORDER BY ID DESC LIMIT 1 ");
                $result = $row->row_array();
                if($result['vc_type'] == 'fldt' && $result['status'] == 0){
                    $result['vc_type'] = '';
                }
                $disount_applied = $this->shopping_model->check_wtp_voucher_applied($newGrandTotal, $result['vc_type']);
            // AA30 ENDS


            if ($disount_applied) {
                $apply_voucher_class = '';
                $disount_applied['discount_offer'] = $this->home_model->currecy_converter($disount_applied['discount_offer'], 'no');
                $disuntoffer = symbol . $disount_applied['discount_offer'];
            } else {
                $no_voucher_class = '';
                $disuntoffer = '';

            }

            $removebtn = 'remove_wtp_voucher';
            $applybtn = 'apply_wtp_voucher';
            $vouchertext = 'WTP10';


            include_once('vouchercode.php');
        }

        /*
        else if($printed_roll==true){

           $no_voucher_class = 'hide';
           $apply_voucher_class = 'hide';

           $newGrandTotal = $texvat*1.2;
           $disount_applied = $this->shopping_model->check_printedroll_voucher_applied($newGrandTotal);

           if($disount_applied){
                   $apply_voucher_class = '';
                   $disount_applied['discount_offer'] = $this->home_model->currecy_converter($disount_applied['discount_offer'], 'no');
                   $disuntoffer = symbol.$disount_applied['discount_offer'];
           }else{
                           $no_voucher_class = '';
                           $disuntoffer ='';

            }

                $removebtn = 'remove_printedroll_voucher';
                $applybtn = 'apply_printedroll_voucher';
                $vouchertext = 'PRINT10';
                include_once('vouchercode.php');
         }

      */

        /*-------Vocher discount-------------*/
        $texvat = $texvat * 1.2;
        if ($disount_applied) {

            $texvat = $texvat - $disount_applied['discount_offer'];
        }
        /*-------Vocher discount-------------*/
        ?>
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
                    <p>Ex. Vat</p>
                    <h2 class="text-danger"><?php echo symbol . number_format(($texvat / 1.2), 2, '.', ''); ?></h2>
                    <input type="hidden" id="grand_total_voucher" name="grand_total_voucher" value="<?= $texvat ?>"/>
                </div>
                <div class="pull-right">
                    <p>Inc. Vat</p>
                    <h3 class="text-danger"><?php echo symbol . number_format($texvat, 2, '.', ''); ?></h3>
                </div>
            </div>
        </div>
        <? $customer_country = $this->home_model->customer_country_info();
        if (isset($customer_country) and $customer_country != 'United Kingdom') {
            ?>
            <div class="row p-t-b-12 no-margin">
                <hr/>
                <div class="">
                    <div class="pull-left">
                        <p>VAT Exemption can be applied prior to confirmation of purchase</p>
                    </div>
                    <div class="pull-right hide">
                        <h2></h2>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>
<script type="text/javascript">
    if (typeof reset_paypal_payments === "function") {
        reset_paypal_payments();
    }
    var ecom_productinfo = [<?=$ecom_productinfo?>];
</script>
