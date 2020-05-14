<!-- EACH PRODUCT CONTAINER STARTS FROM HERE -->
    <div class="eachproductContainer mainContainer goToScroll" data-reset="reset">
        <?php
        $max_labels = $this->home_model->max_total_labels_on_rolls($product->LabelsPerSheet);
        $material_code = $this->home_model->getmaterialcode(substr($product->ManufactureID, 0, -1));

        $type = 'Rolls';
        $materialinfo = $this->db->query("Select tooltip_info,short_name,material_name,adhesive,group_name,filter_group,filter_color from material_tooltip_info WHERE material_code LIKE '" . $material_code . "' and type LIKE '%$type%'")->row_array();

        $group_name = (isset($materialinfo['group_name']) and $materialinfo['group_name'] != '') ? $materialinfo['group_name'] : '';
        $material_name = (isset($materialinfo['material_name']) and $materialinfo['material_name'] != '') ? $materialinfo['material_name'] : '';
        $adhesive = (isset($materialinfo['adhesive']) and $materialinfo['adhesive'] != '') ? $materialinfo['adhesive'] : '';
        $materialDescription = (isset($materialinfo['tooltip_info']) and $materialinfo['tooltip_info'] != '') ? $materialinfo['tooltip_info'] : '';

        $mat_image = Assets . "images/categoryimages/RollLabels/outside/" . $product->ManufactureID . ".jpg";
        // if (isset($wound_option) and $wound_option == 'Inside' and strcasecmp(substr($subcat, 0, -2), substr($wound_cate, 0, -2)) == 0) {
        //     $mat_image = Assets . "images/categoryimages/RollLabels/inside/" . $product->ManufactureID . ".jpg";
        // }

        $comp = $this->filter_model->grouping_compatiblity($product->SpecText7, $print_compatible_array);

        $labelApplication = "";
        if( (isset($filterUses) && ($filterUses == 'byUse')) && (isset($filterCategoryName) && $filterCategoryName != '') )
        {
            $labelApplication = $filterCategoryName;
        }
        ?>

        <div class="MaterialWhiteBg productHover ProductWidth  "
             id="MaterialCenterContentActiveSelector<?php echo $materialCounter; ?>">

            <input type="hidden" value="" class="cart_id"/>
            <input type="hidden" value="<?= $product->ProductID ?>" class="product_id"/>
            <input type="hidden" value="<?= $product->ManufactureID ?>" class="manfactureid"/>
            <input type="hidden" value="<?= $product->LabelsPerSheet ?>" class="LabelsPerSheet"/>
            <input type="hidden" value="<?= $labelApplication;?>" class="label_application"/>
            <input type="hidden" value="" class="digitalprintoption"/>
            <input type="hidden" value="<?php echo $material_code;?>" class="material_code" >
            <input type="hidden" value="<?= $min_labels_per_roll ?>" class="minimum_printed_labels"/>
            <input type="hidden" value="<?= $max_labels ?>" class="maximum_printed_labels"/>
            <input type="hidden" value="<?= $min_qty ?>" class="minimum_quantities"/>
            <input type="hidden" value="<?= $max_qty ?>" class="maximum_quantities"/>
            <input type="hidden" value="0" data-qty="0" data-presproof="0" data-rolls="0"
                   id="uploadedartworks_<?= $product->ProductID ?>"/>
            <input type="hidden" value="<?= $product->Printable ?>" class="PrintableProduct"/>
            <input type="hidden" value="1" class="orientation"/>
            <input type="hidden" value="<?= $product->ProductCategoryName ?>" class="category_description"/>
            <? if ($regmark == "yes"): ?>
                <input type="hidden" class="regmark" value="yes"/>
            <? else: ?>
                <input type="hidden" id="regmark" value="no"/>
            <? endif; ?>

            <div class="showArrow"></div>
            <div class="MaterialCenterContentOuter">
                <div class="MaterialCenterContentOuterArrow"></div>
                <div class="MaterialCenterContentInner">

                    <div class="row RowDefault">
                        <div class="MaterialCenterContentImage">
                            <img src="<?php echo $mat_image; ?>" alt="" title="" class="product_material_image"
                                 dataImageName="<?php echo ltrim($details['DieCode'], "1-") . $material_code; ?>">
                        </div>
                        <div class="MaterialCenterContentDetail">
                                <span class="TitleH3">
                                    <?= $material_name ?> - <?= $adhesive ?>
                               </span>

                               <p class="showProductCode" style="position:absolute;top:-4px;right:8px;display:none;color:#000">Code: <?php echo ltrim($details['DieCode'], "1-") . $material_code; ?></p>


                            <p>
                                <span class="product-title"><?php echo $group_name; ?></span> <?php echo $materialDescription; ?>
                                <br><br>
                                
                                <?php echo $product->LabelsPerSheet . " " . $product->Shape . " Labels per"; ?> Roll.
                                Label size (mm): <?php echo $product->pwidth; ?> x <?php echo $product->pheight; ?>
                                
                                <br><br>
                                    <?php
                                    if($labelApplication != '')
                                    {
                                        echo "Label Application: ". $labelApplication;
                                        echo "<br><br>";
                                    }
                                    ?>
                                
                                <a href="javascript:;" class="technical_specs" id="<?= $product->ProductID ?>"
                                   data-toggle="modal" data-target="#MaterialModalPopup"
                                   data-original-title="Technial Specification"> Material Specification&nbsp;<i
                                            class="fa fa-info-circle" aria-hidden="true"></i> </a>
                                &nbsp;

                                <?php
                                $favourite_icon = "fa fa-heart-o";
                                if ($this->session->userdata('logged_in') == 1) {

                                    $check = $this->home_model->checkProductFavouriteStatus($this->session->userdata("filterUses"), $material_code, $this->session->userdata("userid"), "Rolls");
                                    if ($check->numRows == 1) {
                                        $favourite_icon = "fa fa-heart";
                                    }
                                    ?>

                                    <a href="javascript:void(0);"
                                       onclick="favourite_unfavourite(this,'<?php echo $catIdSimple; ?>', '<?php echo $categoryId; ?>', '<?php echo ltrim($details['DieCode'], "1-"); ?>', '<?php echo $sheetRollType; ?>', '<?php echo $product->ProductID; ?>', '<?php echo $material_code; ?>');"
                                       class="MaterialSaveSearchIcon pull-right half-circle">
                                        <i class="<?php echo $favourite_icon; ?>"></i>
                                    </a>
                                    <?php
                                }
                                ?>

                            </p>
                        </div>
                    </div>
                    <div class="row RowDefault MaterialContentBottom">
                        <div class="MaterialSampleAdded">
                            <!-- <button class="btn rsample" data- data-toggle="modal" data-target="#SampleModal">ADD SAMPLE TO BASKET </button> -->
                            <button class="btn" onclick="rsample(this);" data- data-toggle="modal" data-target="#SampleModal"> ADD SAMPLE TO BASKET </button>
                        </div>

                        <div class="MaterialContentInlineListing">
                            <ul>
                                <li>
                                    <img onerror='imgError(this);' src="<?= Assets ?>images/check-circle.png"
                                         class="TickSVG"/>
                                    <div class="MaterialContentProductDescription">
                                        <span class="MaterialContentBottomBold">QUALITY ASSURANCE</span><br>
                                        <span class="MaterialContentBottomNormal">GUARANTEE</span>
                                    </div>
                                </li>
                                <?php
                                if(preg_match("/\bcheck.png\b/i", $comp['laser_img'])) {?>
                                    <li>
                                        <img onerror='imgError(this);' src="<?= Assets ?>images/check-circle.png" class="TickSVG"/>
                                        <div class="MaterialContentProductDescription">
                                            <span class="MaterialContentBottomBold">LASER PRINTER</span><br>
                                            <span class="MaterialContentBottomNormal">COMPATIBLE&nbsp;<a data-toggle="tooltip-product" data-placement="top" class="laser_printer_div" title="" data-original-title="<?=$comp['laser_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> </span>
                                        </div>
                                    </li>    
                                <?php
                                }
                                ?>

                                <?php
                                if(preg_match("/\bcheck.png\b/i", $comp['inkjet_img'])) {?>
                                    <li>
                                        <img onerror='imgError(this);' src="<?= Assets ?>images/check-circle.png" class="TickSVG"/>
                                        <div class="MaterialContentProductDescription">
                                            <span class="MaterialContentBottomBold">INKJET PRINTER</span><br>
                                            <span class="MaterialContentBottomNormal">COMPATIBLE&nbsp;<a data-toggle="tooltip-product" data-placement="top" title="" class="inkjet_printer_div" data-original-title="<?=$comp['inkjet_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> </span>
                                        </div>
                                    </li>    
                                <?php
                                }
                                ?>

                                <?php
                                if(preg_match("/\bcheck.png\b/i", $comp['thermal_img'])) {?>
                                    <li>
                                        <img onerror='imgError(this);' src="<?= Assets ?>images/check-circle.png" class="TickSVG"/>
                                        <div class="MaterialContentProductDescription">
                                            <span class="MaterialContentBottomBold">Thermal Transfer</span><br>
                                            <span class="MaterialContentBottomNormal">COMPATIBLE&nbsp;<a data-toggle="tooltip-product" data-placement="top" title="" class="thermal_printer_div" data-original-title="<?=$comp['thermal_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> </span>
                                        </div>
                                    </li>    
                                <?php
                                }
                                ?>

                                <?php
                                if(preg_match("/\bcheck.png\b/i", $comp['d_thermal_img'])) {?>
                                    <li>
                                        <img onerror='imgError(this);' src="<?= Assets ?>images/check-circle.png" class="TickSVG"/>
                                        <div class="MaterialContentProductDescription">
                                            <span class="MaterialContentBottomBold">Direct Thermal</span><br>
                                            <span class="MaterialContentBottomNormal">COMPATIBLE&nbsp;<a data-toggle="tooltip-product" data-placement="top" title="" class="direct_printer_div" data-original-title="<?=$comp['d_thermal_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> </span>
                                        </div>
                                    </li>    
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <div class="row RowDefault">
                        <div class="MaterialViewPrices" style="position: relative;">
                            <button class="btn calculatePricingBtn" dataPriceBox='add_to_cart_<?php echo $materialCounter; ?>' dataMaterialCounter='<?php echo $materialCounter; ?>' datatotalMaterials='<?php echo $allProductsSum; ?>'>View Prices <i class="fa fa-calculator"></i></button>
                        </div>
                        <div class="disableViewPricing"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- EACH PRICE BOX STARTS FROM HERE -->
        <div class="MaterialProductPriceMain" style="display: block;">

            <div class="aa_loader" class="white-screen"
                 style="position: absolute;top: 0;right: 0;width: 100%;z-index: 999;height: 100%; display: none;background: #FFF; opacity: 0.8">
                <div class="text-center"
                     style="margin: 80px auto!important;background: rgba(255,255,255,.9) none repeat scroll 0 0;padding: 10px;border-radius: 5px;border: solid 1px #CCC;">
                    <img onerror="imgError(this);" src="<?= Assets ?>images/loader.gif" class="image"
                         style="width:139px; height:29px; " alt="AA Labels Loader">
                </div>
            </div>

            <?php include "selected_roll_material_prices.php"; ?>
        </div>
        <!-- EACH PRICE BOX STARTS FROM HERE -->
    </div>

<!-- EACH PRODUCT CONTAINER ENDS FROM HERE -->
