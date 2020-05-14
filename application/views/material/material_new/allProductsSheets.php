<?php
$materialCounter = 1;
$totalProductById = 0;
$totalFavouriteProducts = 0;
$totalProducts = 0;
$allProductsSum = 0;

$compatibility = $this->filter_model->get_compatibility_text('sheet');
$print_compatible_array = array();

foreach($compatibility as $com){
    $com->print_method = str_replace(" ","",trim($com->print_method));
    $com->type = str_replace(" ","",trim($com->type));
    $print_compatible_array[$com->print_method][$com->type] = $com->description;
}


if (isset($productById) && $productById != '' && count($productById) > 0) {
    $allProductsSum += count($productById);
}

if (isset($favouriteProducts) && $favouriteProducts != '' && count($favouriteProducts) > 0) {
    $allProductsSum += count($favouriteProducts);
}

if (isset($products) && $products != '' && count($products) > 0) {
    $allProductsSum += count($products);
}

if(isset($OtherProducts) && $OtherProducts != '' && count($OtherProducts) > 0){
    $allProductsSum += count($OtherProducts);
}

// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY STARTS
// ==================================================================================
if (isset($productById) && $productById != '' && count($productById) > 0) {
    foreach ($productById as $key => $product) {
        include "products.php";

        $materialCounter++;
    }
}
// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY STARTS
// ==================================================================================


// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY STARTS
// ==================================================================================
if (isset($favouriteProducts) && $favouriteProducts != '' && count($favouriteProducts) > 0) {
    foreach ($favouriteProducts as $key => $product) {
        include "products.php";

        $materialCounter++;
    }
}

// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY ENDS
// ==================================================================================

// IF WANT TO SHOW STANDARD PRODUCTS STARTS ONLY STARTS
// ==================================================================================
if (isset($products) && $products != '' && count($products) > 0) {
    foreach ($products as $key => $product) {
        $type = "";
        if (isset($type) && $type != '') {
            $type = $type;
        }

        include "products.php";

        $materialCounter++;
    }
}
// IF WANT TO SHOW STANDARD PRODUCTS STARTS ONLY ENDS
// ==================================================================================

// OTHER PRODUCTS STARTS HERE
// ==================================================================================
    if(isset($OtherProducts) && $OtherProducts != '' && count($OtherProducts) > 0) 
    {
        $userfilterUsed =  $this->session->userdata("filterUses");?>
        <h2 style="border-radius:5px;font-size:17px;color:#FFF;background:#52b7f1;padding:13px 15px;width:69%;margin-top:11px;margin-bottom:0; position: relative;">
            Other Materials

            <?php
            if(isset($userfilterUsed) && ($userfilterUsed != '') && ($userfilterUsed == 'byProduct') )
            {?>
                <a href='javascript:void(0);' onclick='resetByProducts();' class='resetPU' style="position: absolute; right: 11px;color: #FFF;border: 1px solid #FFF;padding: 5px;top: 9px;border-radius: 5px;font-size: 13px;text-decoration:none;">  Reset Filters </a>
            <?php
            }
            else
            {?>
                <a href='javascript:void(0);' onclick='resetByUse();' class='resetPU' style="position: absolute; right: 11px;color: #FFF;border: 1px solid #FFF;padding: 5px;top: 9px;border-radius: 5px;font-size: 13px;text-decoration:none;">  Reset Filters </a>
            <?php
            }
            ?>

        </h2>
        <?php
        foreach($OtherProducts as $key => $product)
        {
            include "products.php";
            $materialCounter++;
        }
    }
// OTHER PRODUCTS ENDS HERE
// ==================================================================================

if ($allProductsSum == 0) {
    echo "<h2 class='notFoundProducts'>Could not found any Product, <a href='javascript:void(0);' onclick='resetByPU();' class='resetPU'> Reset Filters </a></h2>";

}


?>


<script>
    // MAKE FIRST PRODUCT ACTIVE BY DEFAULT STARTS
    $(document).ready(function () {
        var OBJ = $(".MaterialCenterContentMain .eachproductContainer:first-child .MaterialWhiteBg .MaterialCenterContentOuter .MaterialCenterContentInner .RowDefault .MaterialViewPrices");
        
        $(".MaterialProductPrice").hide();
        $(".mainContainer").children(".MaterialWhiteBg").removeClass("activeProduct");
        $(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").removeClass("arrowRight");

        var _this = OBJ;
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").addClass("activeProduct");
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").addClass("arrowRight");

        $(".MaterialViewPrices").show();
        $(_this).hide();

        if ($(_this).parents(".mainContainer").find(".MaterialContentBottom").css("display") == "none") {
            $(".MaterialContentBottom").hide();
            $(_this).parents(".mainContainer").find(".MaterialContentBottom").toggle("slide", {direction: "right"}, 700);
            $(".MaterialFilterDropRight").hide();
        }

        $(".showProductCode").hide();
        $(_this).parents(".mainContainer").find(".showProductCode").show("1000");

        // CALCULATE PLAIN PRICE STARTS
        calculatePrices(_this);
        // CALCULATE PLAIN PRICE ENDS
    });
    // MAKE FIRST PRODUCT ACTIVE BY DEFAULT ENDS

    // FILTER SWAPPING CODE START FROM HERE
    function FilterSwapping(currentState) {
        var SwitchState = $("#switch").val();
        $("#FilterContainer").toggleClass("filterContainer");
        $(".disablePopupByUse").toggleClass("RollMaterialWhiteBgDisabled");
        $(".disablePopupByProduct").toggleClass("RollMaterialWhiteBgDisabled");

        $(".MaterialByProducts, .MaterialFilterbyUse").hide();
        $(".MaterialByProducts").show("slide", {direction: "up"}, 800);
        $(".MaterialFilterbyUse").show("slide", {direction: "up"}, 800);

        if ($(".filterUses").val() == "byProduct") {
            $(".filterUses").val("byUse");
        } else {
            $(".filterUses").val("byProduct");
        }


        if ($(".filterUses").val() == "byUse") {
            filterbyUse();
        }

        if ($(".filterUses").val() == "byProduct") {
            filterbyProducts();
        }
    }

    // FILTER SWAPPING CODE ENDS FROM HERE

    // WHEN CLICK ON APPLY AND CLOSE BUTTON LEFT FILTER STARTS
    $(".MaterialDropRightClose, .ApplyBtn, .clearBtnByUse, .clearBtnByProduct").click(function () {
        $(".MaterialFilterDropRight").hide("slide", {direction: "left"}, 100);
    });
    // WHEN CLICK ON APPLY AND CLOSE BUTTON LEFT FILTER ENDS


    // OPEN CLOSE LEFT FILTERS COLORS STARTS
    $(".MaterialFilterListSingle").click(function () {
        if ($(this).parent("li").children(".MaterialFilterDropRight").css("display") == "none") {
            $(".MaterialFilterDropRight").hide();
            $(this).parent("li").children(".MaterialFilterDropRight").show("slide", {direction: "left"}, 0);
        }

    });
    // OPEN CLOSE LEFT FILTERS COLORS ENDS

    // WHEN CLICK ON VIEW PRICES BUTTON STARTS
    $(".MaterialViewPrices").click(function () {
        
        $(".MaterialProductPrice").hide();
        $(".mainContainer").children(".MaterialWhiteBg").removeClass("activeProduct");
        $(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").removeClass("arrowRight");

        var _this = this;
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").addClass("activeProduct");
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").addClass("arrowRight");

        $('html, body').animate({ scrollTop: ($(_this).parents(".goToScroll").offset().top)-13 }, "slow");

        $(".MaterialViewPrices").show();
        $(_this).hide();
        if ($(_this).parents(".mainContainer").find(".MaterialContentBottom").css("display") == "none") {
            $(".MaterialContentBottom").hide();
            $(_this).parents(".mainContainer").find(".MaterialContentBottom").toggle("slide", {direction: "right"}, 700);
            $(".MaterialFilterDropRight").hide();
        }

        // var datatotalMaterials = $(_this).children("button").attr("datatotalMaterials");
        // var dataMaterialCounter = $(_this).children("button").attr("dataMaterialCounter");

        $(".showProductCode").hide();
        $(_this).parents(".mainContainer").find(".showProductCode").show("1000");

        // CALCULATE PLAIN PRICE STARTS
        calculatePrices(_this);
        // CALCULATE PLAIN PRICE ENDS
    });

    // WHEN CLICK ON VIEW PRICES BUTTON ENDS


    function calculatePrices(_this) {
        $(".disableViewPricing").show();
        $(_this).parents('.mainContainer').find('.aa_loader').show();
        var Printable = $(_this).parents('.mainContainer').find('.PrintableProduct').val();
        var id = $(_this).parents('.mainContainer').find('.product_id').val();
        var menuid = $(_this).parents('.mainContainer').find('.manfactureid').val();
        var labels = $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
        var min_qty = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
        var max_qty = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
        var input_id = $(_this).parents('.mainContainer').find('.plainsheet_input');
        var qty = parseInt(input_id.val());
        var unitqty = $(_this).parents('.mainContainer').find('.plainsheet_unit').text(); //Sheets Labels

        unitqty = $.trim(unitqty);
        if (unitqty == 'Labels') {
            var min_qty = parseInt(labels) * min_qty;
            var max_qty = parseInt(labels) * max_qty;
        }
        if (!is_numeric(qty) || qty == '' || qty < min_qty) {
            input_id.val(min_qty);
            if (unitqty == "Labels") {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + min_qty + ' labels.');
            } else {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + min_qty + ' sheets.');
            }
            qty = parseInt(input_id.val());
        }

        if (qty > max_qty) {
            input_id.val(max_qty);
            if (unitqty == 'Labels') {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' labels.');
            } else {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' sheets.');
            }
            qty = parseInt(input_id.val());
        }


        if (qty % labels != 0 && unitqty == 'Labels') {
            var multipyer = parseInt(labels) * parseInt(parseInt(qty / labels) + 1);
            input_id.val(multipyer);
            var qty = multipyer;
        }
        if (unitqty == 'Labels') {
            qty = parseInt(qty / labels);
        }
        change_btn_state($(_this).children("button"), 'disable', 'plain');
        $.ajax({
            url: base + 'ajax/calculate_sheet_price',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {qty: qty, menuid: menuid, prd_id: id, labels: labels, labeltype: 'plain', printprice: 'enabled'},
            success: function (data) {
                change_btn_state($(_this).children("button"), 'enable', 'plain');
                if (!data == '') {
                    data = $.parseJSON(data);
                    if (data.response == 'yes') {

                        $(_this).parents('.mainContainer').find('.calculate_plain').hide();
                        $(_this).parents('.mainContainer').find('.add_plain').show();
                        $(_this).parents('.mainContainer').find('.addprintingoption').show();
                        $(_this).parents('.mainContainer').find('.plain_save_txt').html(data.save_txt).show();
                        $(_this).parents('.mainContainer').find('.plainprice_text').html(data.price);
                        $(_this).parents('.mainContainer').find('.original_price').html('<b class="pr-sm">' + data.symbol + data.original_price + '</b>');
                        $(_this).parents('.mainContainer').find('.promotion_price').html('-<b class="pr-sm">' + data.symbol + data.promotion_price_txt + '</b>');
                        if (data.promotion_price_txt == null || data.promotion_price_txt == 0 || data.promotion_price_txt == 0.00)
                        {
                            $(_this).parents('.mainContainer').find('.plainprice_box').find('tr.plainprice').hide();
                            $(_this).parents('.mainContainer').find('.plainprice_box').find('tr.halfprintprice').hide();
                        }else{
                            $(_this).parents('.mainContainer').find('.plainprice_box').find('tr.plainprice').show();
                            $(_this).parents('.mainContainer').find('.plainprice_box').find('tr.halfprintprice').show();
                            $(_this).parents('.mainContainer').find('.plainprice_box').find('.percentage_discount').text(data.percentage_discount);
                        }
                        $(_this).parents('.mainContainer').find('.plainperlabels_text').html(data.labelprice);
                        $(_this).parents('.mainContainer').find('.plainprice_box').show();
                        

                        if (Printable == 'Y') {

                            var onlyprintprice = data.onlyprintprice;
                            var onlyprintprice = onlyprintprice.replace(',','');
                            if(data.vatoption == 'Inc')
                            {
                                onlyprintprice = onlyprintprice * 1.2;
                            }
                            
                            onlyprintprice = parseFloat(onlyprintprice);
                            onlyprintprice = onlyprintprice.toFixed(2);

                            $(_this).parents('.mainContainer').find('.printing_offer_text_full').html(data.symbol+''+ ((onlyprintprice*2)).toFixed(2) );
                            
                            $(_this).parents('.mainContainer').find('.printing_offer_text').html(data.symbol+''+ onlyprintprice );

                            $(_this).parents('.mainContainer').find('.AddPrintPrice').html(data.symbol+''+ onlyprintprice );

                            $(_this).parents('.mainContainer').find('.vat_option_printed').html(data.vatoption+' VAT');
                            $(_this).parents('.mainContainer').find('.MaterialPrintPriceMain').removeClass('hideSection');
                            
                        }
                    }

                    var PricesContainer = $(_this).parents('.mainContainer').find('.calculatePricingBtn').attr("dataPriceBox");
                    $("#" + PricesContainer).show("fade", {direction: "up"}, 700);


                    freeDeliveryOptionPrice = 0;
                    if (data.vatoption == 'Inc') {
                        freeDeliveryOptionPrice = data.plain.replace(/[^\d.-]/g, '');
                    } else {
                        freeDeliveryOptionPrice = (data.plain.replace(/[^\d.-]/g, '')) * 1.2;
                    }
                    if (freeDeliveryOptionPrice < 25) {
                        $(_this).parents('.mainContainer').find('.freeDeliveryMessageAppear').html("<p>Free Delivery on Orders over £25.00 Inc. VAT</p>");
                    } else {
                        $(_this).parents('.mainContainer').find('.freeDeliveryMessageAppear').html("");
                    }
                    // console.log(freeDeliveryOptionPrice);
                    $(_this).parents('.mainContainer').find('.aa_loader').hide();
                    $(".disableViewPricing").hide();
                }
            }
        });
    }

    function reCalculatePrice(_this, enteredlabels) {
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.add_plain').hide();
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.reCalculatePrices').show("slide", {direction: "up"}, 400);

        $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
        $(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
        $(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");
        
    }

    function reCaculate(_this)
    {
        $(_this).hide();
        calculatePrices(_this);
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.add_plain').show("slide", {direction: "up"}, 400);
    }
    // $(document).on("click", ".reCalculatePrices", function (e) {
        // $(this).hide();
        // calculatePrices(this);
        // $(this).parents('.mainContainer').find('.MaterialAddToBasketButton a.add_plain').show("slide", {direction: "up"}, 400);
    // });


    // CONVERT LABELS INTO SHEETS AND VISE VERSA
    $(document).on("click", ".mainContainer .plain_calculation_unit li a", function (e) {

        var minqty = parseInt($(this).parents('.mainContainer').find('.minimum_quantities').val());
        var maxqty = parseInt($(this).parents('.mainContainer').find('.maximum_quantities').val());

        var qty = parseInt($(this).parents('.mainContainer').find('.plainsheet_input').val());
        var labelspersheet = parseInt($(this).parents('.mainContainer').find('.LabelsPerSheet').val());
        var selText = $(this).text();
        var old_val = $(this).parents('.input-group-btn').find('.dropdown-toggle').text();
        if ($.trim(old_val) == $.trim(selText)) {
            return true;
        }

        if (selText == 'Labels') {
            var milabels = parseInt(labelspersheet * minqty);
            $(this).parents('.mainContainer').find('.plainsheet_input').attr('placeholder', 'Minimum ' + milabels);
            $(this).parents('.mainContainer').find('.small_plain_minqty_txt').text('Minimum order ' + milabels + ' labels');
            qty = parseInt(labelspersheet * qty);
            if (qty >= milabels) {
                $(this).parents('.mainContainer').find('.plainsheet_input').val(qty)
            } else {
                $(this).parents('.mainContainer').find('.plainsheet_input').val('');
                $(this).parents('.mainContainer').find('.plainsheet_input').focus();
            }
        } else {
            $(this).parents('.mainContainer').find('.plainsheet_input').attr('placeholder', 'Minimum ' + minqty);
            $(this).parents('.mainContainer').find('.small_plain_minqty_txt').text('Minimum order ' + minqty + ' sheets');
            qty = parseInt(qty / labelspersheet);
            if (qty >= minqty) {
                $(this).parents('.mainContainer').find('.plainsheet_input').val(qty)
            } else {
                $(this).parents('.mainContainer').find('.plainsheet_input').val('');
                $(this).parents('.mainContainer').find('.plainsheet_input').focus();
            }
        }
        $(this).parents('.input-group-btn').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
    });
    // CONVERT LABELS INTO SHEETS AND VISE VERSA


    // ADD TO CART PLAIN SHEETS STARTS 
    // $(document).on("click", ".add_plain", function (e) {
    function addPlain(_this)
    {
        var id = $(_this).parents('.mainContainer').find('.product_id').val();
        var prd_name = $(_this).parents('.mainContainer').find('.product_name').text();
        var menuid = $(_this).parents('.mainContainer').find('.manfactureid').val();

        var label_application = $(_this).parents('.mainContainer').find('.label_application').val();

        var category_description = $(_this).parents('.mainContainer').find('.category_description').val();
        var labels = $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
        var min_qty = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
        var max_qty = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
        var input_id = $(_this).parents('.mainContainer').find('.plainsheet_input');
        var qty = parseInt(input_id.val());
        var unitqty = $(_this).parents('.mainContainer').find('.plainsheet_unit').text(); //Sheets Labels
        unitqty = $.trim(unitqty);
        var _this = _this;
        
        $(_this).parents('.mainContainer').find('.aa_loader').show();

        if (unitqty == 'Labels') {
            var min_qty = parseInt(labels) * min_qty;
            var max_qty = parseInt(labels) * max_qty;
        }
        if (!is_numeric(qty) || qty == '' || qty < min_qty) {
            input_id.val(min_qty);
            if (unitqty == "Labels") {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + min_qty + ' labels.');
            } else {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + min_qty + ' sheets.');
            }
            // return false;
        }

        if (qty > max_qty) {
            input_id.val(max_qty);
            if (unitqty == 'Labels') {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' labels.');
            } else {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' sheets.');
            }
            return false;
        } else {
            if (unitqty == 'Labels') {
                qty = parseInt(qty / labels);
            }
            //change_btn_state(_this,'disable','plain');
            $(_this).attr("disabled", true);
            $.ajax({
                url: base + 'ajax/add_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id, labeltype: 'plain', label_application: label_application},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            //change_btn_state(_this,'enable','plain');
                            fireRemarketingTag('Add to cart');
                            ecommerce_add_to_cart(_this, 'plain');
                            popup_messages(category_description);
                            $('#cart').html(data.top_cart);
                            // $(_this).parents(".productdetails").hide("slide", { direction: "up" }, 500);
                        }
                    }
                    $(_this).attr("disabled", false);
                    $(_this).parents('.mainContainer').find('.aa_loader').hide();
                }
            });
        }
    }

    function fireRemarketingTag(page) {
        <? if(SITE_MODE == 'live'){?>
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
        <? } ?>
    }

    function ecommerce_add_to_cart(_this, type) {
        <? if(SITE_MODE == 'live'){ ?>

        var prdid = $(_this).parents('.mainContainer').find('.product_id').val();
        //var product_name =  $(_this).parents('.productdetails').find('.product_name').text();
        var product_name = $(_this).parents('.mainContainer').find('.category_description').val();
        var category = '<?=$Paper_size?>';


        if (type == 'printed') {
            var input_id = $(_this).parents('.mainContainer').find('.printedsheet_input');
            var quantity = parseInt(input_id.val());
            var price = $(_this).parents('.mainContainer').find('.printedprice_text').find('.color-orange').text();
            var category = " Printed - " + category;
            var price = price.replace(/[^\d.]/g, '');

        } else if (type == 'sample') {
            var price = 0.00;
            var category = " Sample - " + category;
            var quantity = 1
        } else {
            var input_id = $(_this).parents('.mainContainer').find('.plainsheet_input');
            var quantity = parseInt(input_id.val());
            var price = $(_this).parents('.mainContainer').find('.plainprice_text').find('.color-orange').text();
            var price = price.replace(/[^\d.]/g, '');
        }


        price = parseFloat(price);


        dataLayer.push({
            'event': 'addToCart',
            'ecommerce': {
                'add': {
                    'products': [{
                        'name': product_name,
                        'id': prdid,
                        'price': price,
                        'brand': 'AALABELS',
                        'category': category,
                        'quantity': quantity,
                    }]
                }
            }
        });
        <? } ?>
    }

    // ADD TO CART PLAIN SHEETS ENDS

    // SHOW PRODUCT TECHNICAL SPECIFICATION STARTS
    $(document).on("click", ".technical_specs", function (e) {
        var id = $(this).attr("id");
        $('#ajax_tecnial_specifiacation').html('');
        $('#mat_code').html('');
        $('#specs_loader').show();
        $.ajax({
            url: base + 'ajax/material_popup/' + id,
            type: "POST",
            async: "false",
            dataType: "html",
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    $('#material_popup_img').attr('src', data.src);
                    setTimeout(function () {
                        $('#specs_loader').hide();
                        $('#ajax_tecnial_specifiacation').html(data.html);
                        $('#mat_code').html(data.mat_code);
                    }, 500);
                }
            }
        });
    });
    // SHOW PRODUCT TECHNICAL SPECIFICATION STARTS


    // SAMPLE MATERIAL ADD TO CART STARTS
    // $(document).on("click", ".rsample", function (e) {
        function rsample(_this)
        {
            var _this = $(_this);
            var p_code = $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid = $(_this).parents('.mainContainer').find('.manfactureid').val();
            var prd_name = $(_this).parents('.mainContainer').find('.product_name').text();
            var material_code = $(_this).parents('.mainContainer').find('.material_code').val();
            var label_application = $(_this).parents('.mainContainer').find('.label_application').val();

            if (menuid) {
                change_btn_state(_this,'disable','sample');
                $.ajax({
                    url: base + 'ajax/add_sample_to_cart',
                    type: "POST",
                    async: "false",
                    dataType: "html",
                    data: {qty: 1, menuid: menuid, prd_id: p_code, material_code:material_code, label_application:label_application},
                    success: function (data) {
                        if (!data == '') {
                            change_btn_state(_this,'enable','sample');
                            // $(".requestsample").modal('hide');
                            data = $.parseJSON(data);
                            if (data.response == 'yes') {
                                var sample_txt = "Thank you for requesting a sample which has been added to your basket and upon checkout a free-of-charge A4 sheet of the material chosen will be sent to you. \n\n Please note: This is a material and adhesive sample only and will no not therefore match the label shape and size on this page.";
                                popup_messages(sample_txt);
                                $('#cart').html(data.top_cart);
                                ecommerce_add_to_cart(_this, 'sample');
                            } else if (data.response == 'failed') {
                                if (data.msg == 'you have reached the maximum sample order limit!') {
                                    swal("Maximum limit exceeded", data.msg, "error");
                                } else {
                                    swal("Duplicate Sample Sheet", data.msg, "error");
                                }
                            }
                        }
                    }
                });
            }
        }
    // });
    // SAMPLE MATERIAL ADD TO CART ENDS


    // CALCULATE PLAIN PRICE ENDS
    var timer = '';

    function show_faded_popover(_this, text) {
        $(_this).attr('data-content', '');
        $(_this).popover('hide');
        $(_this).popover('destroy');

        $(_this).popover({'placement': 'top'});
        $(_this).attr('data-content', text);
        $(_this).popover('show');
        clearTimeout(timer);
        timer = setTimeout(function () {
            $(_this).attr('data-content', '');
            $(_this).popover('hide');
            $(_this).popover('destroy');
        }, 5000);
    }

    function is_numeric(mixed_var) {
        var whitespace =
            " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
        return (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -
            1)) && mixed_var !== '' && !isNaN(mixed_var);
    }

    // VOLUME PRICE BREAKS STARTS
    $(document).on("click", ".price_breaks", function (e) {
        var product_id = $(this).parents('.mainContainer').find('.product_id').val();
        var manfactureid = $(this).parents('.mainContainer').find('.manfactureid').val();
        var labels = $(this).parents('.mainContainer').find('.LabelsPerSheet').val();

        $('#ajax_price_breaks').html('');
        $('#price_loader').show();
        $.ajax({
            url: base + 'ajax/labels_price_breaks',
            type: "POST",
            async: "false",
            data: {mid: manfactureid, labels: labels, type: '<?=$Paper_size?>'},
            dataType: "html",
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    setTimeout(function () {
                        $('#price_loader').hide();
                        $('#ajax_price_breaks').html(data.html);
                    }, 500);
                }
            }
        });
    });

    // VOLUME PRICE BREAKS ENDS
    function favourite_unfavourite(elem, categoryId, CategoryRollId, DieCode, type, productId, MaterialCode) {
        var _this = elem;
        var dataResponse = "";
        var filterClass = "";
        var filterUses = $(".filterUses").val();

        $.ajax({
            url: base + 'ajax/add_to_favourite',
            type: "POST",
            data: {
                "categoryId": "<?php echo $catIdSimple;?>",
                "type": type,
                "productId": productId,
                "filterUses": filterUses,
                "MaterialCode": MaterialCode,
                "CategoryRollId": CategoryRollId,
                "DieCode": DieCode
            },
            success: function (data) {
                if (!data == '') {
                    dataResponse = data.response;
                    if (dataResponse.status == 200) {
                        if (dataResponse.response == "added") {
                            $(_this).html('<i class="fa fa-heart"></i>');
                            swal("Success", dataResponse.message, "success");
                        } else {
                            $(_this).html('<i class="fa fa-heart-o"></i>');
                            swal("Success", dataResponse.message, "success");
                        }

                        var FavMaterials = "";
                        for (var i = 0; i < dataResponse.favouriteMaterials.length; i++) {
                            if (i != 0) {
                                FavMaterials += ",";
                            }
                            FavMaterials += dataResponse.favouriteMaterials[i];
                        }


                        if (dataResponse.filterUses == "byUse") {

                            if (dataResponse.totalFavourites > 0) {
                                $(".MaterialSaveSearchByUse a").html('<input type="checkbox" id="favourite_heart_use" class="opacity-0 favouriteProducts favouriteByUse" value="' + FavMaterials + '"  onclick="filterbyUse();"><span class="totalFavouriteCounts">' + dataResponse.totalFavourites + '</span> <span data-filter="use"  id="favourite_heart_span_use" class="fa fa-heart-o favouriteProducts favouriteByUse favouriteHeart" value="' + FavMaterials + '" ></span>');
                            } else {
                                $(".MaterialSaveSearchByUse a").html('<input type="checkbox" id="favourite_heart_use"  class="opacity-0 favouriteProducts favouriteByUse" value="' + FavMaterials + '"  onclick="filterbyUse();"><span class="totalFavouriteCounts">' + dataResponse.totalFavourites + '</span> <span data-filter="use"  id="favourite_heart_span_use" class="fa fa-heart-o favouriteProducts favouriteByUse favouriteHeart" value="' + FavMaterials + '" ></span>');
                            }

                        } else if (dataResponse.filterUses == "byProduct") {

                            filterClass = "MaterialSaveSearchByProduct a";
                            if (dataResponse.totalFavourites > 0) {
                                $(".MaterialSaveSearchByProduct a").html('<input type="checkbox" id="favourite_heart" class=" opacity-0  favouriteProducts favouritebyProducts" value="' + FavMaterials + '" onclick="filterbyProducts();"><span class="totalFavouriteCounts">' + dataResponse.totalFavourites + '</span><span  id="favourite_heart_span" data-filter="product" class="fa fa-heart-o favouriteProducts favouritebyProducts favouriteHeart" value="'+FavMaterials+'"></span>');
                            } else {
                                $(".MaterialSaveSearchByProduct a").html('<input type="checkbox" id="favourite_heart"  class=" opacity-0 favouriteProducts favouritebyProducts" value="' + FavMaterials + '"  onclick="filterbyProducts();"><span class="totalFavouriteCounts">' + dataResponse.totalFavourites + '</span><span  id="favourite_heart_span" data-filter="product" class="fa fa-heart-o favouriteProducts favouritebyProducts favouriteHeart" value="'+FavMaterials+'"></span>');
                            }
                        }

                    }
                }
            }
        });
    }

    $(document).ready(function () {
        $(".product_material_image").hover(function (e) {
            var value = $(this).aaZoom();
        });
        $('.product_material_image').aaZoom();
    });

    $(document).ready(function () {
        $(".FBUResultFound").html("<?php echo $allProductsSum;?> results found");
    });

    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip-digital"]').tooltip();
        $("[data-toggle=tooltip-product]").tooltip();
        $(':not([data-toggle="popover"])').popover('hide');
    });
    
</script>
