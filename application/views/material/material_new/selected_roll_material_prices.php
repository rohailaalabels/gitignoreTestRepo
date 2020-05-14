    <div class="MaterialWhiteBg MaterialProductPrice productdetails"  id="add_to_cart_<?php echo $materialCounter;?>">
        
        <div class="RollMaterialWhiteBgDisabled disablePopup">
            <p class="selectWoundCoreerror">
                Select Core Size & Wound Options First from top of this page
            </p>
        </div>

        <div class="MaterialProductLowestPrice">
            <div class="">
                <a href="javascript:void(0);" class="price_breaks" data-target=".pbreaks" data-toggle="modal" data-original-title="Volume Price Breaks">
                    <img src="<?= Assets ?>images/price-breaks-icon.png" class="float-left" alt="30 Days Moneyback Guarantee" style=" width: 25px;"></a>
            </div>
            
            <div class="MaterialProductLowestPriceInner">
                <svg id="f7781957-f958-4943-8fa1-6aa48e9850c7" class="LowestPrice" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26"><title>tick-01</title>
                    <polygon points="22.47 1.72 25 4.09 10.84 17.67 4.91 12.11 7.44 9.74 10.84 12.93 22.47 1.72" style="fill:#17b0e2"/>
                    <path d="M21.38,9.3a9.79,9.79,0,1,1-3.4-5l1.65-1.59A12,12,0,1,0,24,12a12.13,12.13,0,0,0-.84-4.44Z" style="fill:#17b0e2"/>
                </svg>
                <div class="MaterialProductPriceDescription">
                    <span class="MaterialProductPriceTitle">LOWEST PRICE</span><br>
                    <span class="MaterialProductPriceNormal">GUARANTEED ONLINE &nbsp;<a href="javascript:void(0);" data-toggle="tooltip-product" data-html="true" data-placement="top" class="" title="" data-original-title="If within 7 days of buying this Dry Edge product sheet from us, you find the same product cheaper to purchase online at any other UK label website, we will refund 100% of the difference."><i class="fa fa-info-circle"></i></a> </span>
                </div>
            </div>
        </div>
        <div class="MaterialPriceQtyDropdownRoll enterNoOfLabels">
            <label>

                <span>Enter Number of Labels</span>
                <!-- <input type="button" value="-" class="qty-minus" onclick="increement_decreement(this, 'enterNoOfLabels', 'plainsheet_input', '<?php echo $min_qty * $min_labels_per_roll;?>', '<?php echo $product->LabelsPerSheet * $max_qty;?>', 'decreement', 10);"> -->
                <input type="text" value="<?php echo $min_qty * $min_labels_per_roll;?>" class="qty allownumeric plainsheet_input">
                <!-- <input type="button" value="+" class="qty-plus" onclick="increement_decreement(this, 'enterNoOfLabels', 'plainsheet_input', '<?php echo $min_qty * $min_labels_per_roll;?>', '<?php echo $product->LabelsPerSheet * $max_qty;?>', 'increement', 10);"> -->
            </label>
        </div>
        <div class="MaterialPriceQtyRollDividTwo pull-left  labelsPerRolls">
            <label>
                <span>Labels Per Roll</span>
                <input type="button" value="-" class="qty-minus" onclick="increement_decreement(this, 'labelsPerRolls', 'plainlabels', '<?php echo $min_labels_per_roll;?>', '<?php echo $product->LabelsPerSheet;?>', 'decreement', 10);">
                <input type="text" value="<?=$product->LabelsPerSheet?>" class="qty allownumeric plainlabels" >
                <input type="button" value="+" class="qty-plus" onclick="increement_decreement(this, 'labelsPerRolls', 'plainlabels', '<?php echo $min_labels_per_roll;?>', '<?php echo $product->LabelsPerSheet;?>', 'increement', 10);">
            </label>
        </div>
        <div class="MaterialPriceQtyRollDividTwo pull-right mainRolls">
            <label>
                <span>Number of Rolls</span>
                <input type="button" value="-" class="qty-minus" onclick="increement_decreement(this, 'mainRolls', 'plainrolls', '<?php echo $min_qty;?>', '<?php echo $max_qty;?>', 'decreement', '<?php echo $min_qty;?>');">
                <input type="text" value="<?=$min_qty?>" class="qty allownumeric plainrolls">
                <input type="button" value="+" class="qty-plus" onclick="increement_decreement(this, 'mainRolls', 'plainrolls', '<?php echo $min_qty;?>', '<?php echo $max_qty;?>', 'increement', '<?php echo $min_qty;?>');">

            </label>
        </div>
        <div class="MaterialPriceMiniumBreaks">
            <span class="pull-left" style="width: 47%;">Type <?=$min_labels_per_roll?> - <?=$product->LabelsPerSheet?> Label per roll</span>
            <span class="pull-left" style="width: 47%; margin-left: 15px;">Multiples of <?=$min_qty?> only</span>
        </div>

        <div style="clear:both;"></div>

        <div class="calculations">

            <div class="row">
                <div class="MaterialPriceExVat text-right">
                    <div class="col-md-12" style="margin-top: 20px;">
                        <?php
                        if($regmark == "yes")
                        {?>
                                <div class="plainprice_box">
                                <table class="price" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr class="printprice" style="">
                                      <td style=" width:80%;" class="text-left phead"> Plain Labels Price </td>
                                      <td style=" width:20%;" class="raw_plain text-right color-orange"><b class="pr-sm">-</b></td>
                                    </tr>
                                    <tr class="inkprice" style="">
                                      <td style=" width:80%;" class="text-left phead">
                                      <div class="registration_mark">
                                          <div class="check_section">
                                            <label class="check" style="text-align: left; padding-left:22px;padding-top:5px;">Reverse Registration
                                              <input type="checkbox" style="left: 0;" checked="checked" name="registration_mark_option" class="registration_mark_option" onclick="check_regmark_option(this);">
                                              <style>.registration_mark .check .checkmark:after {left: 5px;top: 2px;}</style>
                                              <span class="checkmark" onclick="showHideAddPrint(this)" style="left: 0 !important; right:auto !important;width:19px;height:19px;top: 4px;"></span> 
                                            </label>
                                         </div>
                                     </div>
                                    </td>
                                    <td style=" width:20%;" class="regmark_price text-right color-orange"><b class="pr-sm">-</b></td>
                                    </tr>
                                </table>
                                <div class="text-right plainprice_text priceplain">&nbsp;</div>
                                <div class="clear="></div>
                                <div class="clear"></div>
                                <span class="pull-right plainperlabels_text text-right">&nbsp;</span>
                                <div class="clear"></div>
                              </div>
                        <?php
                        }
                        else
                        {?>
                            <div class="plainprice_box">
                                <div class="text-right plainprice_text priceplain">&nbsp;</div>
                                <div class="clear"></div>
                                <div class="clear"></div>
                                <span class="pull-right plainperlabels_text text-right">&nbsp;</span>
                                <div class="clear"></div>
                              </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-md-12" style="margin-top: 8px;">
                        <div style="display: none;" class="rollLable_icon no-margin diamterinfo">Roll Diameter <span style="display: block;"></span></div>
                    </div>
                </div>
                
            </div>
            

            

            <div class="MaterialPriceData" style="margin-top: 8px;">
                <p style="font-size: 10px;">Order before 16:00 for next working day delivery.</p>
                <div class="freeDeliveryMessageAppear"></div>
                <p class="MaterialCollectionAvail"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Collection service available</p>
            </div>

        </div>


        <div class="MaterialAddToBasketButton">
            <?php if(preg_match('/WTDP/',$product->ManufactureID)):?>
            
            <a class="btn btn-block get_a_quote_plain" data-toggle="modal" data-target="#get_a_quote" data-printing="N"> Get a Quote</a>

            <a href="javascript:;" class="btn btn-block reCalculatePrices"  onclick="reCaculate(this)"  style="display: none;"> Calculate Price <i class='fa fa-calculator'></i> </a>
            
            <?php else:?>
            <a href="javascript:;" class="btn btn-block add_plain" onclick="addPlain(this)"> Add to Basket </a>
            <a href="javascript:;" class="btn btn-block reCalculatePrices" onclick="reCaculate(this)" style="display: none;"> Calculate Price <i class='fa fa-calculator'></i> </a>
            <?php endif;?>
            
        </div>
        <div class="MaterialPrintPriceMain hideSection">
            
        <?php
        if( ($type == "Rolls") && ($product->Printable == "Y"))
        {?>
        
         <!-- waqar -->
            <div class="MaterialPriceQtyDropdownRoll enterNoOfLabels" style="margin-bottom: 10px;">
                <label>
                    <span>Enter Number of Labels</span>
                    <input type="text" value="100" class="qty allownumeric plainsheet_input_printing">
                </label>
            </div>
            <!-- waqar -->

            <table>
                <tr>
                    <td>Print Price</td>
                    <td align="right" class="printing_offer_text_full"></td>
                </tr>
                <tr class="HalfPricePromotion">
                    <td>Half Price Promotion</td>
                    <td align="right" class="printing_offer_text"></td>
                </tr>
                <tr>
                    <td>&nbsp;</th>
                    <td>&nbsp;</td>
                </tr>


                <?php if(!preg_match('/WTDP/',$product->ManufactureID)){?>
                <tr class="addprintHead">
                    <th>Add Print</th>
                    <td align="right" class="AddPrintPrice">£9.90</td>
                </tr>

                <tr class="addprintHead">
                    <td>&nbsp;</td>
                    <td align="right"><small  class="vat_option_printed">Ex VAT</small></td>
                </tr>
                <?php
                }?>
            </table>

            <div class="MaterialAddPrintButton">
                <?php
                $categorycodea4 = array($details['CategoryImage']); 
                $categorycoderoll = '';
                $rollcode = '';
                $A4code = '';
                $code = explode('.', $details['CategoryImage']);
                $userData = $this->user_model->get_data();
                $selected_size = $details['CategoryID'];
                $type = $type;
                $email = $userData['UserEmail'];
                $material = $product->ColourMaterial_upd;
                $color = $product->Material1;
                $adhesive = $adhesive;
                $shape = $details['Shape_upd'];
                $min_width = floor($details['Width']);
                $max_width = ceil($details['Width']);
                $min_height = floor($details['Height']);
                $max_height = ceil($details['Height']);
                $dieCode = explode(".",$details['PDF']);
                $dieCode = $dieCode[0];?>
                
                <input type="hidden" name="shape" class="shape" value="<?php echo $shape;?>">
                <input type="hidden" name="min_width" class="min_width" value="<?php echo $min_width;?>">
                <input type="hidden" name="max_width" class="max_width" value="<?php echo $max_width;?>">
                <input type="hidden" name="min_height" class="min_height" value="<?php echo $min_height;?>">
                <input type="hidden" name="max_height" class="max_height" value="<?php echo $max_height;?>">
                <input type="hidden" name="available_in" class="available_in" value="Roll">
                <input type="hidden" name="type" class="type" value="<?php echo $type;?>">
                
                <input type="hidden" name="email" class="email" value="<?php echo $email;?>">

                <input type="hidden" name="source" class="source" value="material_page">

                <input type="hidden" name="material" class="material" value="<?php echo $material;?>">
                <input type="hidden" name="color" class="color" value="<?php echo $color;?>">
                <input type="hidden" name="adhesive" class="adhesive" value="<?php echo $adhesive;?>">
                
                <input type="hidden" name="dieCode" class="dieCode" value="<?php echo $dieCode;?>">
                <input type="hidden" name="selected_size" class="selected_size" value="<?php echo $selected_size;?>">


                <?php if(!preg_match('/WTDP/',$product->ManufactureID)){?>
                <a href="javascript:;" class="btn btn-block addprintBtn" onclick="printed_labels(this);"> Add Print </a>
                <?php
                }
                ?>
                
                

            </div>
        <?php
        }
        ?>

        </div>
        
    </div>