<div class="MaterialWhiteBg MaterialProductPrice productdetails" id="add_to_cart_<?php echo $materialCounter; ?>">


    <div class="MaterialProductLowestPrice">
        <div class="">
            <a href="javascript:void(0);" class="price_breaks" data-target=".pbreaks" data-toggle="modal"
               data-original-title="Volume Price Breaks">
                <img src="<?= Assets ?>images/price-breaks-icon.png" class="float-left"
                     alt="30 Days Moneyback Guarantee" style=" width: 25px;"></a>
        </div>
        <div class="MaterialProductLowestPriceInner">
            <svg id="f7781957-f958-4943-8fa1-6aa48e9850c7" class="LowestPrice" data-name="Layer 1"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26"><title> tick-01</title>
                <polygon points="22.47 1.72 25 4.09 10.84 17.67 4.91 12.11 7.44 9.74 10.84 12.93 22.47 1.72"
                         style="fill:#17b0e2"/>
                <path d="M21.38,9.3a9.79,9.79,0,1,1-3.4-5l1.65-1.59A12,12,0,1,0,24,12a12.13,12.13,0,0,0-.84-4.44Z"
                      style="fill:#17b0e2"/>
            </svg>
            <div class="MaterialProductPriceDescription">
                <span class="MaterialProductPriceTitle">LOWEST PRICE</span><br>
                <span class="MaterialProductPriceNormal">GUARANTEED ONLINE &nbsp;
                    <a href="javascript:void(0);" data-toggle="tooltip-product" data-html="true" data-placement="top"
                       class="" title=""
                       data-original-title="If within 7 days of buying this Dry Edge product sheet from us, you find the same product cheaper to purchase online at any other UK label website, we will refund 100% of the difference."><i
                                class="fa fa-info-circle"></i></a> </span>
            </div>
        </div>
    </div>
    <div class="MaterialPriceQtyDropdown">
        <label>
            <span>Enter Quantity</span>
            <input type="text" name="Enter_Qty" class="plainsheet_input allownumeric"
                   onkeyup="reCalculatePrice(this, this.value)" value="<?php echo $min_qty; ?>"
                   placeholder="Enter Sheets Quantity" data-toggle="popover" data-content="" type="text"
                   data-original-title="" title="">
        </label>

        <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle plainsheet_unit" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="margin-top: 0px;border: none;border-left: 1px solid #CCC;height: 43px;padding-right: 0px !important;width:100%; margin-top: 0px !important;right:-2px; ">
                Sheets <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-right plain_calculation_unit">
                <li><a href="javascript:void(0);">Sheets</a></li>
                <li><a href="javascript:void(0);">Labels</a></li>
            </ul>
        </div>

        <!-- <select class="MaterialPriceQtyDropdownSelect plainsheet_unit">
            <option value="Sheets">Sheets</option>
            <option value="Labels">Labels</option>
        </select> -->

    </div>
    <div class="MaterialPriceMiniumBreaks">
        <span class="pull-left small_plain_minqty_txt">Minimum order <?=$min_qty?> sheets</span>
        <!-- <span class="pull-right price_breaks" data-target=".pbreaks" data-toggle="modal" data-original-title="Volume Price Breaks">View volume price breaks</span> -->
    </div>
    <div style="clear: both;"></div>

    <div class="plainprice_box" style="display:none; margin-top: 19px;">
        <table class="price" width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr class="plainprice">
                <td style=" width:80%;" class="text-left"></td>
                <td style=" width:20%;" class="original_price text-right color-orange"></td>
            </tr>
            <tr class="halfprintprice" style="">
                <td style=" width:80%;" class="text-right phead color-orange"><span
                            class="percentage_discount">25</span>% Off Promotion
                </td>
                <td style=" width:20%;" class="promotion_price color-orange text-right"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-right total" style="border:none;">
                    <div class="text-right plainprice_text priceplain">&nbsp;</div>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-right">
                    <div class="plainperlabels_text"></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- <div class="MaterialPriceExVat text-right plainprice_box">
        <div class="pull-left MaterialProductPricePlane">Plain Labels</div>
        <div class="pull-right MaterialPriceVat">
            <span>£8.80</span>
            <small>Ex VAT</small>
        </div>
    </div> -->


    <!-- <div class="MaterialPricePerLabel text-right">150 Labels, £0.118 per label</div> -->
    <div class="MaterialPriceData">
        <p style="font-size: 10px;">Order before 16:00 for next working day delivery.</p>
        <div class="freeDeliveryMessageAppear"></div>
        <p class="MaterialCollectionAvail"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Collection service
            available</p>
    </div>
    <div class="MaterialAddToBasketButton">
        <a href="javascript:;" class="btn btn-block add_plain" onclick="addPlain(this)"> Add to Basket </a>
        <a href="javascript:;" class="btn btn-block reCalculatePrices" onclick="reCaculate(this)"
           style="display: none;"> Calculate Price <i class='fa fa-calculator'></i> </a>
    </div>

    <?php
    if( ($type == "A4" || $type == "A3" || $type == "SRA3" || $type == "A5") && ($product->Printable == "Y") ){
        ?>

        <div class="MaterialPrintPriceMain">
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
                    <td>&nbsp;
                    </th>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th>Add Print</th>
                    <td align="right" class="AddPrintPrice"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="right"><small class="vat_option_printed">Ex VAT</small></td>
                </tr>
            </table>
        </div>

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
            $dieCode = explode(".", $details['PDF']);
            $dieCode = $dieCode[0];
            $productcode = $product->ManufactureID;
            // echo $this->shopping_model->sessionid();
            ?>

            <input type="hidden" name="shape" class="shape" value="<?php echo $shape; ?>">
            <input type="hidden" name="min_width" class="min_width" value="<?php echo $min_width; ?>">
            <input type="hidden" name="max_width" class="max_width" value="<?php echo $max_width; ?>">
            <input type="hidden" name="min_height" class="min_height" value="<?php echo $min_height; ?>">
            <input type="hidden" name="max_height" class="max_height" value="<?php echo $max_height; ?>">
            <input type="hidden" name="selected_size" class="selected_size" value="<?php echo $selected_size; ?>">
            <input type="hidden" name="available_in" class="available_in" value="<?php echo $type; ?>">
            <input type="hidden" name="type" class="type" value="<?php echo $type; ?>">
            <input type="hidden" name="email" class="email" value="<?php echo $email; ?>">
            <input type="hidden" name="material" class="material" value="<?php echo $material; ?>">
            <input type="hidden" name="color" class="color" value="<?php echo $color; ?>">
            <input type="hidden" name="adhesive" class="adhesive" value="<?php echo $adhesive; ?>">
            <input type="hidden" name="source" class="source" value="material_page">
            <input type="hidden" name="dieCode" class="dieCode" value="<?php echo $dieCode; ?>">
            <input type="hidden" name="productcode" class="productcode" value="<?php echo $productcode; ?>">
            <a href="javascript:;" class="btn btn-block" onclick="printed_labels(this);"> Add Print </a>
        </div>

        <?php
    }
    ?>

</div>