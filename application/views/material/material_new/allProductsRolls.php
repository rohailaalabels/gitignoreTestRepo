<?php
    
    $compatibility = $this->filter_model->get_compatibility_text('roll');
    $print_compatible_array = array();

    foreach($compatibility as $com){
        $com->print_method = str_replace(" ","",trim($com->print_method));
        $com->type = str_replace(" ","",trim($com->type));
        $print_compatible_array[$com->print_method][$com->type] = $com->description;
    }

    $max_diameter = 0;
    $printer_compatiblity = '';
    $product_manufacture_id = "";
    
    
      if( (isset($products[0]->ManufactureID)) && ($products[0]->ManufactureID != "") )
        {
            $product_manufacture_id = $products[0]->ManufactureID;
        }
        else if( (isset($productById[0]->ManufactureID)) && ($productById[0]->ManufactureID != "") )
        {
            $product_manufacture_id = $productById[0]->ManufactureID;
        }
        else if( (isset($favouriteProducts[0]->ManufactureID)) && ($favouriteProducts[0]->ManufactureID != "") )
        {
            $product_manufacture_id = $favouriteProducts[0]->ManufactureID;
        }
        else if( (isset($OtherProducts[0]->ManufactureID)) && ($OtherProducts[0]->ManufactureID != "") )
        {
            $product_manufacture_id = $OtherProducts[0]->ManufactureID;
        }

        if( isset($products[0]->ManufactureID) && $products[0]->ManufactureID != '' )
        {
            $product_manufacture_id = $products[0]->ManufactureID;
        }
        else
        {
            $product_manufacture_id = $product_manufacture_id;
        }
        

    $min_qty = $this->home_model->min_qty_roll($product_manufacture_id);
    $max_qty = $this->home_model->max_qty_roll($product_manufacture_id);
    
    //$min_qty = $this->home_model->min_qty_roll($products[0]->ManufactureID);
    //$max_qty = $this->home_model->max_qty_roll($products[0]->ManufactureID);
    
    $min_labels_per_roll = $this->home_model->min_labels_per_roll($min_qty);
    
    
      
    
    $materialCounter = 0;
    $totalProductById = 0;
    $totalFavouriteProducts = 0;
    $totalProducts = 0;
    $allProductsSum = 0;
    if(isset($productById) && $productById != '' && count($productById) > 0){
        $allProductsSum += count($productById);
    }

    if(isset($favouriteProducts) && $favouriteProducts != '' && count($favouriteProducts) > 0){
        $allProductsSum += count($favouriteProducts);
    }

    if(isset($products) && $products != '' && count($products) > 0){
        $allProductsSum += count($products);
    }

    if(isset($OtherProducts) && $OtherProducts != '' && count($OtherProducts) > 0){
        $allProductsSum += count($OtherProducts);
    }

// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY STARTS 
// ==================================================================================
    if(isset($productById) && $productById != '' && count($productById) > 0)
    {
        foreach($productById as $key => $product)
        {
            include "product_Rolls.php";
            $materialCounter++;
        }
    }
// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY STARTS 
// ==================================================================================



// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY STARTS 
// ==================================================================================
    
    if(isset($favouriteProducts) && $favouriteProducts != '' && count($favouriteProducts) > 0) 
    {
        foreach($favouriteProducts as $key => $product)
        {
            include "product_Rolls.php";
            $materialCounter++;
        }
    }
// IF WANT TO SHOW FAVOURITE PRODUCTS STARTS ONLY ENDS
// ==================================================================================


// IF WANT TO SHOW STANDARD PRODUCTS STARTS ONLY STARTS 
// ==================================================================================
    
    if(isset($products) && $products != '' && count($products) > 0) 
    {
        foreach($products as $key => $product)
        {
            include "product_Rolls.php";
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
            include "product_Rolls.php";
            $materialCounter++;
        }
    }
// OTHER PRODUCTS ENDS HERE
// ==================================================================================

    if($allProductsSum == 0)
    {
        echo "<h2 class='notFoundProducts'>Could not found any Product, <a href='javascript:void(0);' onclick='resetByPU();' class='resetPU'> Reset Filters </a></h2>";
    }

    $Labelsgap = $details['LabelGapAcross'];
    $height = $details['Height'];

?>

<!-- ROLL JS STARTSS FROM HERE
================================================ -->
<script>

    function coresize(_this)
    {
    // $(document).on("change", "#coresize", function(e) {

        var coreSize = $("#coresize").val();
        if(coreSize == ""){
            coreSize = "R4";
        }

        var coreSizeSelected = $("#coresize").val();
        if(coreSizeSelected == "")
        {
            coreSizeSelected = "R4";
        }

        var manufactureIds = [];
        $(".mainContainer").find('.product_material_image').each(function(index, element)
        {
            manufactureIds.push("'"+$(this).attr("dataImageName")+coreSize.replace(/[^0-9]/,"")+"'");
        });

        var ManufactureID = "";
        var ProductID = "";

        if(manufactureIds != '' && manufactureIds.length > 0)
        {
            $.ajax({
                url: '<?=base_url()?>ajax/getProductData',
                type:"POST",
                async:"false",
                dataType: "html",
                data: {"manufactureIds": manufactureIds,"coreSize":coreSizeSelected},
                success: function(data)
                {
                    data = $.parseJSON(data);

                    if(data.status == 200)
                    {
                        $("[data-reset='reset']").each(function(index, element)
                        {
                            ManufactureID = data.productData[index]['ManufactureID'];
                            ProductID = data.productData[index]['ProductID'];
                            $(this).find(".technical_specs").attr("id", ProductID);
                            $(this).find(".product_id").val(ProductID);
                            $(this).find(".manfactureid").val(ManufactureID);
                        });
                    }
                } 
            });
         }

         $('#woundoption').trigger('change');
    }
    // });

    $(document).on("change", "#woundoption", function(e) {
        val = $("#woundoption").val();
        if(val == ""){
            val = "Outside";
        }
        var coreSize = $("#coresize").val();
        var coreSizeSelected = $("#coresize").val();
        if(coreSize == ""){
            coreSize = "R4";
        }
        if(coreSizeSelected == "")
        {
            coreSizeSelected = "R4";
        }

        if(val!=''){
             if(val == 'Inside'){
                    
                    $('.insideorientation').show();
                    $('.outsideorientation').hide();
                    $('.mainContainer').find('.orientationselector').html(' Orientation 05 <i class="fa fa-unsorted"></i>');
                    $('.orientation').val(5);

             }else{
                    
                    $('.insideorientation').hide();
                    $('.outsideorientation').show();
                    $('.mainContainer').find('.orientationselector').html(' Orientation 01 <i class="fa fa-unsorted"></i>');
                    $('.orientation').val(1);

             }
             
             
            var material_code = $("#material_code_new").val()+coreSize.replace(/[^0-9]/,"");
            var subcat_dynamic = $(".categoryId").val();
            $('#prod_img').html('<img onerror="imgError(this);" src="<?=Assets?>images/loader.gif" width="119" height="29"  style="width:119px; height:29px; ">');
            
            
                $.ajax({
                    url: '<?=base_url()?>ajax/setwoundoption',
                    type:"POST",
                    async:"false",
                    dataType: "html",
                    data: { option: val,cate:subcat_dynamic},
                    success: function(data){
                          if(val == 'Inside'){
                                 setTimeout(function(){
                                        $('#prod_img').html('<img onerror="imgError(this);" id="wound_image" src="<?=Assets?>images/categoryimages/RollLabels/inside/<?=ltrim($details['DieCode'],"1-")?>'+material_code+'.jpg">');
                                        $('#material_popup_img').attr("src","<?=Assets?>images/categoryimages/RollLabels/inside/<?=ltrim($details['DieCode'],"1-")?>"+material_code+".jpg");
                                  },500);
                          }else{
                              setTimeout(function(){
                                        $('#prod_img').html('<img onerror="imgError(this);" id="wound_image" src ="<?=Assets?>images/categoryimages/RollLabels/outside/<?=ltrim($details['DieCode'],"1-")?>'+material_code+'.jpg">');
                                        $('#material_popup_img').attr("src","<?=Assets?>images/categoryimages/RollLabels/outside/<?=ltrim($details['DieCode'],"1-")?>"+material_code+".jpg");
                                  },500);
                         }
                      }  
                });
            update_wound_images(val);
        }
    });

    function update_wound_images(wound_option)
    {
        var dieCode = "<?=ltrim($details['DieCode'],"1-")?>";
        var coreSize = $("#coresize").val();
        
        if(coreSize == ""){coreSize = "R4";}

        $("[data-reset='reset']").each(function(index, element)
        {
            var img = $(this).find(".product_material_image").attr("src");
            if(img.match('/RollLabels/'))
            {
                var imagename =  $(this).find(".product_material_image").attr("dataImageName")+coreSize.replace(/[^0-9]/,"");
                var mySubString = img.substring(img.lastIndexOf("/") + 1, img.lastIndexOf("."));
                img = img.replace(mySubString, imagename);
                if(wound_option == "Outside")
                {
                    img = img.replace('inside','outside');
                }
                else if(wound_option == "Inside")
                {
                    img = img.replace('outside','inside');
                }
                $(this).find(".product_material_image").attr("src",img);
            }
        });
    }

    function coreAndWoundChecker()
    {
        <?php 
        if(strpos($catIdSimple, 'R') !== false || strpos($catIdSimple, 'r') !== false){
            $catIdSimple = substr($catIdSimple, 0, -2);
        }
        ?>
        
        var coreSize = $("#coresize :selected").val();
        var woundoption = $("#woundoption :selected").val();

        if(coreSize == ""){
            $(".coretext").addClass("fieldTextError");
            $("#coresize").addClass("fieldError");
        }else{
            $(".coretext").removeClass("fieldTextError");
            $("#coresize").removeClass("fieldError");
            $(".categoryId").val("<?php echo $catIdSimple;?>"+coreSize);
        }

        if(woundoption == "")
        {
            $(".woundtext").addClass("fieldTextError");
            $("#woundoption").addClass("fieldError");
        }else{
            $(".woundtext").removeClass("fieldTextError");
            $("#woundoption").removeClass("fieldError");
        }

        if(coreSize == "" || woundoption == ""){
            $('.disablePopup').addClass("RollMaterialWhiteBgDisabled");
            $('.selectWoundCoreerror').show();
            if(coreSize == "" && woundoption != "")
            {
                $('.disablePopup p').html("Select Core Size from the top of this page");
            }
            else if(coreSize != "" && woundoption == "")
            {
                $('.disablePopup p').html("Select Wound Options First from the top of this page");
            }
            else if(coreSize == "" && woundoption == "")
            {
                $('.disablePopup p').html("Select Core Size & Wound Options First from top of this page");
            }

        }else{
            $('.disablePopup').removeClass("RollMaterialWhiteBgDisabled");
            $('.selectWoundCoreerror').hide();
        }


        updateCoreVal = 4;
        if(coreSize != '')
        {
            updateCoreVal = coreSize.replace(/[^0-9]/,"");
        }

        $(".FBP").each(function(index, element)
        {
            var separatedValues = "";
            var eachValue = "";
            separatedValues = $(this).val().split(",");
            if(separatedValues.length > 1)
            {
                for(start = 0; start<separatedValues.length; start++)
                {
                    if(start != 0)
                    {
                        eachValue += ",";
                    }
                    eachValue += separatedValues[start].slice(0,-2)+updateCoreVal+"'";
                }
            }
            else
            {
                eachValue = $(this).val().slice(0,-2)+updateCoreVal+"'";
                
            }
            $(this).val(eachValue);
            
            getselectedValues($(this), $(this).val());

        });

        $(".FBU").each(function(index, element)
        {
            var separatedValues = "";
            var eachValue = "";
            separatedValues = $(this).val().split(",");
            if(separatedValues.length > 1)
            {
                for(start = 0; start<separatedValues.length; start++)
                {
                    if(start != 0)
                    {
                        eachValue += ",";
                    }
                    eachValue += separatedValues[start].slice(0,-2)+updateCoreVal+"'";
                }
            }
            else
            {
                eachValue = $(this).val().slice(0,-2)+updateCoreVal+"'";
                
            }
            $(this).val(eachValue);
        });
        // AA33 STARTS
            $(".MaterialContentBottom").hide();
            if($(".MaterialProductPrice").css("display") == "none" )
            {
                $(".MaterialProductPrice").hide();    
            }
            $(".MaterialViewPrices").show();
            $(".MaterialWhiteBg").removeClass("activeProduct");
            $(".showArrow").removeClass("arrowRight");
        // AA33 ENDS

        if(coreSize != "" && woundoption != "")
        {
            setTimeout(function(){ onreadyState(); }, 1000);
        }

    }
    //coreAndWoundChecker();






    // MAKE FIRST PRODUCT ACTIVE BY DEFAULT STARTS
        $(document).ready(function(){

            onreadyState();

        }); 

    function onreadyState()
    {
        var OBJ = $(".MaterialCenterContentMain .eachproductContainer:first-child .MaterialWhiteBg .MaterialCenterContentOuter .MaterialCenterContentInner .RowDefault .MaterialViewPrices");    
        $(".MaterialProductPrice").hide();
        $(".mainContainer").children(".MaterialWhiteBg").removeClass("activeProduct");
        $(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").removeClass("arrowRight");

        var _this = OBJ;
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").addClass("activeProduct");
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").addClass("arrowRight");
        
        $(".MaterialViewPrices").show();
        $(_this).hide();
        if ($(_this).parent(".RowDefault").parent(".MaterialCenterContentInner").children(".MaterialContentBottom").css("display") == "none" )
        {
            $(".MaterialContentBottom").hide();
            $(_this).parent(".RowDefault").parent(".MaterialCenterContentInner").children(".MaterialContentBottom").toggle("slide", { direction: "right" }, 700);
            $(".MaterialFilterDropRight").hide();
        }
        
        $(".showProductCode").hide();
        $(_this).parents(".mainContainer").find(".showProductCode").show("1000");

        calculatePrices(_this);
    }

    // MAKE FIRST PRODUCT ACTIVE BY DEFAULT ENDS

    // FILTER SWAPPING CODE START FROM HERE
    function FilterSwapping(currentState)
    {
        var SwitchState = $("#switch").val();
        $("#FilterContainer").toggleClass("filterContainer");
        $(".disablePopupByUse").toggleClass("RollMaterialWhiteBgDisabled");
        $(".disablePopupByProduct").toggleClass("RollMaterialWhiteBgDisabled");
        
        $(".MaterialByProducts, .MaterialFilterbyUse").hide();
        $(".MaterialByProducts").show("slide", { direction: "up" }, 800);
        $(".MaterialFilterbyUse").show("slide", { direction: "up" }, 800);

        if($(".filterUses").val() == "byProduct"){
            $(".filterUses").val("byUse");
        }else{
            $(".filterUses").val("byProduct");
        }


        if($(".filterUses").val() == "byUse")
        {
            filterbyUse();
        }

        if($(".filterUses").val() == "byProduct")
        {
            filterbyProducts();
        }
    }       
    // FILTER SWAPPING CODE ENDS FROM HERE

    // WHEN CLICK ON APPLY AND CLOSE BUTTON LEFT FILTER STARTS
    $(".MaterialDropRightClose, .ApplyBtn, .clearBtnByProduct , .clearBtnByUse").click(function()
    {
        $(".MaterialFilterDropRight").hide("slide", { direction: "left" }, 300);
    });
    // WHEN CLICK ON APPLY AND CLOSE BUTTON LEFT FILTER ENDS


    // OPEN CLOSE LEFT FILTERS COLORS STARTS
    $(".MaterialFilterListSingle").click(function() {
        if ( $(this).parent("li").children(".MaterialFilterDropRight").css("display") == "none" )
        {
            $(".MaterialFilterDropRight").hide();
            $(this).parent("li").children(".MaterialFilterDropRight").show("slide", { direction: "left" }, 0);
        }
        
    });
    // OPEN CLOSE LEFT FILTERS COLORS ENDS

    
    // WHEN CLICK ON VIEW PRICES BUTTON STARTS
    $(".MaterialViewPrices").click(function() {
        
        $(".MaterialProductPrice").hide();
        $(".mainContainer").children(".MaterialWhiteBg").removeClass("activeProduct");
        $(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").removeClass("arrowRight");

        var _this = this;
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").addClass("activeProduct");
        $(_this).parents(".mainContainer").children(".MaterialWhiteBg").children(".showArrow").addClass("arrowRight");
        
        $('html, body').animate({ scrollTop: ($(_this).parents(".goToScroll").offset().top)-13 },  "slow");

        $(".MaterialViewPrices").show();
        $(_this).hide();
        if ($(_this).parent(".RowDefault").parent(".MaterialCenterContentInner").children(".MaterialContentBottom").css("display") == "none" )
        {
            $(".MaterialContentBottom").hide();
            $(_this).parent(".RowDefault").parent(".MaterialCenterContentInner").children(".MaterialContentBottom").toggle("slide", { direction: "right" }, 700);
            $(".MaterialFilterDropRight").hide();
        }

        var datatotalMaterials = $(_this).children("button").attr("datatotalMaterials");
        var dataMaterialCounter = $(_this).children("button").attr("dataMaterialCounter");

        $(".showProductCode").hide();
        $(_this).parents(".mainContainer").find(".showProductCode").show("1000");
        
        calculatePrices(_this);

    });
    // WHEN CLICK ON VIEW PRICES BUTTON ENDS

    /*
    $(".plainsheet_input").blur(function()
    // $(".plainsheet_input").on('keyup', function (e)
    {       

            var _this = this;

            $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
            $(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
            $(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");

            // coreAndWoundChecker();
            $(".popover").hide();
            var plainsheet_input =  $(_this).parents('.mainContainer').find('.plainsheet_input');
            var Printable =  $(_this).parents('.mainContainer').find('.PrintableProduct').val();
            var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
            var minimum_printed_labels    =  $(_this).parents('.mainContainer').find('.minimum_printed_labels').val();
            var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
            var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
            var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
            var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
            var labels    = parseInt(input_labels.val());
            var roll      =  parseInt(input_roll.val());
            var no_of_labels_entered    = parseInt(plainsheet_input.val());
            var labels_per_roll    = parseInt(input_labels.val());
            var rolls      =  parseInt(input_roll.val());
            var  _this = _this;
            var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
            var no_of_labels_entered_min = minimum_printed_labels * min_qty;
            plainlabelsIncreement = 10;
            plainRollsIncreement = min_qty;

            // console.log("Entered Labels= "+no_of_labels_entered+" & Entered Label Per Roll= "+labels_per_roll+" & Entered Rolls= "+rolls);
            // console.log("Min Label per Rolls= "+ minimum_printed_labels+" & Max Label per Rolls= "+max_labels);
            // console.log("Min Roll And Across= "+ min_qty+" & Maximum Rolls = allowed "+max_qty);


            plainsheet_input.val(plainsheet_input.val().replace(/[^0-9]/gi,''));
            input_labels.val(input_labels.val().replace(/[^0-9]/gi,''));
            input_roll.val(input_roll.val().replace(/[^0-9]/gi,''));

            if(no_of_labels_entered < no_of_labels_entered_min){
                plainsheet_input.val(no_of_labels_entered_min);
                input_labels.val(minimum_printed_labels);
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(plainsheet_input, 'Quantity has been amended for production as '+no_of_labels_entered_min+' labels.');
            }
            if(labels_per_roll < minimum_printed_labels){
                //console.log('2');
                input_labels.val(minimum_printed_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+minimum_printed_labels+' labels.');
                // return false;
            }
            if((rolls < min_qty)){
                //console.log('3');
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(input_roll, 'Quantity has been amended for production as '+min_qty+' labels.');
                // return false;
            }

            if((rolls%min_qty) != 0){
                //console.log('3.5');
                if( (Math.ceil(rolls/min_qty) * min_qty) >= min_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else if( (Math.ceil(rolls/min_qty) * min_qty) <= max_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else
                {
                    input_roll.val(min_qty);
                }
                // showFieldMessagePopup(input_roll, 'Multiples of '+min_qty+' only allowed');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE LOWER ENDS

            
            

            // IF STANDARDS OF LABELS ARE Greater THAN STARTS
            
            if(no_of_labels_entered > max_labels){
                //console.log('4');
                input_labels.val(max_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }

            if(labels_per_roll > max_labels){
                //console.log('4');
                input_labels.val(max_labels);
                showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE Greater THAN ENDS


            if(input_labels.val() % plainlabelsIncreement != 0){
               input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
            }

            if(input_roll.val() % plainRollsIncreement != 0){
               input_roll.val( Math.ceil(input_roll.val()/plainRollsIncreement) *  plainRollsIncreement ) ;
            }

            if(no_of_labels_entered >= no_of_labels_entered_min){
                console.log('6');

                if( (Math.ceil(no_of_labels_entered/roll) <= max_labels) && (Math.ceil(no_of_labels_entered/roll) >= minimum_printed_labels) )
                {
                        console.log('6.1.2');
                        input_labels.val(Math.ceil(no_of_labels_entered/roll));
                        if(input_labels.val() % plainlabelsIncreement != 0){
                           input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                        }
                        plainsheet_input.val( input_labels.val() * input_roll.val() );
                    
                }
                else
                {
                    console.log('6.2');
                    roll_counter = min_qty;
                    for (number=0; number<=(max_qty); number++) {
                        if(roll_counter <= max_qty)
                        {
                            console.log('6.3');
                            if( (Math.ceil(no_of_labels_entered/roll_counter) <= max_labels) && (Math.ceil(no_of_labels_entered/roll_counter) >= minimum_printed_labels) )
                            {
                                console.log('6.4');
                                input_labels.val(Math.ceil(no_of_labels_entered/roll_counter));
                                if(input_labels.val() % plainlabelsIncreement != 0){
                                   input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                                }
                                input_roll.val(roll_counter);
                                break;
                            }
                            else
                            {   
                                roll_counter += min_qty;
                            }
                        }
                        else
                        {
                            console.log('6.5');
                            input_labels.val(max_labels);
                            input_roll.val(max_qty);
                            plainsheet_input.val(max_labels * max_qty);
                            break;
                        }
                    } 
                }
            }
            plainsheet_input.val(input_labels.val() * input_roll.val() );
    });

    $(".plainlabels").blur(function()
    // $(".plainlabels").on('keyup', function (e)
    {   

            var _this = this;
            
            $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
            $(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
            $(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");

            // coreAndWoundChecker();
            $(".popover").hide();
            var plainsheet_input =  $(_this).parents('.mainContainer').find('.plainsheet_input');
            var Printable =  $(_this).parents('.mainContainer').find('.PrintableProduct').val();
            var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
            var minimum_printed_labels    =  $(_this).parents('.mainContainer').find('.minimum_printed_labels').val();
            var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
            var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
            var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
            var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
            var labels    = parseInt(input_labels.val());
            var roll      =  parseInt(input_roll.val());
            var no_of_labels_entered    = parseInt(plainsheet_input.val());
            var labels_per_roll    = parseInt(input_labels.val());
            var rolls      =  parseInt(input_roll.val());
            var  _this = _this;
            var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
            var no_of_labels_entered_min = minimum_printed_labels * min_qty;
            plainlabelsIncreement = 10;
            plainRollsIncreement = min_qty;

            // console.log("Entered Labels= "+no_of_labels_entered+" & Entered Label Per Roll= "+labels_per_roll+" & Entered Rolls= "+rolls);
            // console.log("Min Label per Rolls= "+ minimum_printed_labels+" & Max Label per Rolls= "+max_labels);
            // console.log("Min Roll And Across= "+ min_qty+" & Maximum Rolls = allowed "+max_qty);


            plainsheet_input.val(plainsheet_input.val().replace(/[^0-9]/gi,''));
            input_labels.val(input_labels.val().replace(/[^0-9]/gi,''));
            input_roll.val(input_roll.val().replace(/[^0-9]/gi,''));

            if(no_of_labels_entered < no_of_labels_entered_min){
                plainsheet_input.val(no_of_labels_entered_min);
                input_labels.val(minimum_printed_labels);
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(plainsheet_input, 'Quantity has been amended for production as '+no_of_labels_entered_min+' labels.');
            }
            if(labels_per_roll < minimum_printed_labels){
                console.log('2');
                input_labels.val(minimum_printed_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+minimum_printed_labels+' labels.');
                // return false;
            }
            if((rolls < min_qty)){
                console.log('3');
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(input_roll, 'Quantity has been amended for production as '+min_qty+' labels.');
                // return false;
            }

            if((rolls%min_qty) != 0){
                console.log('3.5');
                if( (Math.ceil(rolls/min_qty) * min_qty) >= min_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else if( (Math.ceil(rolls/min_qty) * min_qty) <= max_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else
                {
                    input_roll.val(min_qty);
                }
                // showFieldMessagePopup(input_roll, 'Multiples of '+min_qty+' only allowed');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE LOWER ENDS

            
            

            // IF STANDARDS OF LABELS ARE Greater THAN STARTS
            
            if(labels > max_labels){
                console.log('4');
                input_labels.val(max_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }

            if(labels_per_roll > max_labels){
                console.log('4.5');
                input_labels.val(max_labels);
                showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE Greater THAN ENDS


            if(input_labels.val() % plainlabelsIncreement != 0){
                console.log('4.6');
               input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
            }

            if(input_roll.val() % plainRollsIncreement != 0){
                console.log('4.7');
               input_roll.val( Math.ceil(input_roll.val()/plainRollsIncreement) *  plainRollsIncreement ) ;
            }

            plainsheet_input.val(input_labels.val() * input_roll.val() );
    });

    $(".plainrolls").blur(function()
    // $(".plainrolls").on('keyup', function (e)
    {   

            
            var _this = this;
            $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
            $(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
            $(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");
            // coreAndWoundChecker();
            $(".popover").hide();
            var plainsheet_input =  $(_this).parents('.mainContainer').find('.plainsheet_input');
            var Printable =  $(_this).parents('.mainContainer').find('.PrintableProduct').val();
            var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
            var minimum_printed_labels    =  $(_this).parents('.mainContainer').find('.minimum_printed_labels').val();
            var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
            var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
            var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
            var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
            var labels    = parseInt(input_labels.val());
            var roll      =  parseInt(input_roll.val());
            var no_of_labels_entered    = parseInt(plainsheet_input.val());
            var labels_per_roll    = parseInt(input_labels.val());
            var rolls      =  parseInt(input_roll.val());
            var  _this = _this;
            var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
            var no_of_labels_entered_min = minimum_printed_labels * min_qty;
            plainlabelsIncreement = 10;
            plainRollsIncreement = min_qty;

            // console.log("Entered Labels= "+no_of_labels_entered+" & Entered Label Per Roll= "+labels_per_roll+" & Entered Rolls= "+rolls);
            // console.log("Min Label per Rolls= "+ minimum_printed_labels+" & Max Label per Rolls= "+max_labels);
            // console.log("Min Roll And Across= "+ min_qty+" & Maximum Rolls = allowed "+max_qty);


            plainsheet_input.val(plainsheet_input.val().replace(/[^0-9]/gi,''));
            input_labels.val(input_labels.val().replace(/[^0-9]/gi,''));
            input_roll.val(input_roll.val().replace(/[^0-9]/gi,''));

            if(no_of_labels_entered < no_of_labels_entered_min){
                plainsheet_input.val(no_of_labels_entered_min);
                input_labels.val(minimum_printed_labels);
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(plainsheet_input, 'Quantity has been amended for production as '+no_of_labels_entered_min+' labels.');
            }
            if(labels_per_roll < minimum_printed_labels){
                //console.log('2');
                input_labels.val(minimum_printed_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+minimum_printed_labels+' labels.');
                // return false;
            }
            if((rolls < min_qty)){
                //console.log('3');
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(input_roll, 'Quantity has been amended for production as '+min_qty+' labels.');
                // return false;
            }
            
            if(roll > max_qty){
              input_roll.val(max_qty);
            }

            if((rolls%min_qty) != 0){
                //console.log('3.5');
                if( (Math.ceil(rolls/min_qty) * min_qty) >= min_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else if( (Math.ceil(rolls/min_qty) * min_qty) <= max_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else
                {
                    input_roll.val(min_qty);
                }
                // showFieldMessagePopup(input_roll, 'Multiples of '+min_qty+' only allowed');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE LOWER ENDS

            
            

            // IF STANDARDS OF LABELS ARE Greater THAN STARTS
            
            if(no_of_labels_entered > max_labels){
                //console.log('4');
                input_labels.val(max_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }

            if(labels_per_roll > max_labels){
                //console.log('4');
                input_labels.val(max_labels);
                showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE Greater THAN ENDS


            if(input_labels.val() % plainlabelsIncreement != 0){
               input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
            }

            if(input_roll.val() % plainRollsIncreement != 0){
               input_roll.val( Math.ceil(input_roll.val()/plainRollsIncreement) *  plainRollsIncreement ) ;
            }

            if(no_of_labels_entered >= no_of_labels_entered_min){

                if( (Math.ceil(no_of_labels_entered/input_roll.val()) <= max_labels) && (Math.ceil(no_of_labels_entered/input_roll.val()) >= minimum_printed_labels) )
                {
                    if(Math.ceil(no_of_labels_entered/input_roll.val()) != input_labels.val())
                    {
                        input_labels.val(Math.ceil(no_of_labels_entered/input_roll.val()));
                        if(input_labels.val() % plainlabelsIncreement != 0){
                           input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                        }
                    }
                }
                else
                {
                    // console.log('6.2');
                    roll_counter = min_qty;
                    for (number=0; number<=(max_qty); number++) {
                        if(roll_counter <= max_qty)
                        {
                            // console.log('6.3');
                            if( (Math.ceil(no_of_labels_entered/roll_counter) <= max_labels) && (Math.ceil(no_of_labels_entered/roll_counter) >= minimum_printed_labels) )
                            {
                                // console.log('6.4');
                                input_labels.val(Math.ceil(no_of_labels_entered/roll_counter));
                                if(input_labels.val() % plainlabelsIncreement != 0){
                                   input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                                }
                                input_roll.val(roll_counter);
                                break;
                            }
                            else
                            {   
                                roll_counter += min_qty;
                            }
                        }
                        else
                        {
                            // console.log('6.5');
                            input_labels.val(max_labels);
                            input_roll.val(max_qty);
                            plainsheet_input.val(max_labels * max_qty);
                            break;
                        }
                    } 
                }
            }
            plainsheet_input.val(input_labels.val() * input_roll.val() );
    });
    */


     $(".plainsheet_input").blur(function()
    // $(".plainsheet_input").on('keyup', function (e)
    {       

            var _this = this;

            $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
            //$(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
            //$(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");

 $(_this).parents('.mainContainer').find('.regmark_price b.pr-sm').css('color', "gray");
                $(_this).parents('.mainContainer').find('.raw_plain b.pr-sm').css('color', "gray");
            // coreAndWoundChecker();
            $(".popover").hide();
            var plainsheet_input =  $(_this).parents('.mainContainer').find('.plainsheet_input');
            var Printable =  $(_this).parents('.mainContainer').find('.PrintableProduct').val();
            var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
            var minimum_printed_labels    =  $(_this).parents('.mainContainer').find('.minimum_printed_labels').val();
            var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
            var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
            var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
            var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
            var labels    = parseInt(input_labels.val());
            var roll      =  parseInt(input_roll.val());
            var no_of_labels_entered    = parseInt(plainsheet_input.val());
            var labels_per_roll    = parseInt(input_labels.val());
            var rolls      =  parseInt(input_roll.val());
            var  _this = _this;
            var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
            var no_of_labels_entered_min = minimum_printed_labels * min_qty;
            plainlabelsIncreement = 10;
            plainRollsIncreement = min_qty;

            // console.log("Entered Labels= "+no_of_labels_entered+" & Entered Label Per Roll= "+labels_per_roll+" & Entered Rolls= "+rolls);
            // console.log("Min Label per Rolls= "+ minimum_printed_labels+" & Max Label per Rolls= "+max_labels);
            // console.log("Min Roll And Across= "+ min_qty+" & Maximum Rolls = allowed "+max_qty);


            plainsheet_input.val(plainsheet_input.val().replace(/[^0-9]/gi,''));
            input_labels.val(input_labels.val().replace(/[^0-9]/gi,''));
            input_roll.val(input_roll.val().replace(/[^0-9]/gi,''));

            if(no_of_labels_entered < no_of_labels_entered_min){
                plainsheet_input.val(no_of_labels_entered_min);
                input_labels.val(minimum_printed_labels);
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(plainsheet_input, 'Quantity has been amended for production as '+no_of_labels_entered_min+' labels.');
            }
            if(labels_per_roll < minimum_printed_labels){
                //console.log('2');
                input_labels.val(minimum_printed_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+minimum_printed_labels+' labels.');
                // return false;
            }
            if((rolls < min_qty)){
                //console.log('3');
                input_roll.val(Math.ceil(min_qty));
                // showFieldMessagePopup(input_roll, 'Quantity has been amended for production as '+min_qty+' labels.');
                // return false;
            }

            if((rolls%min_qty) != 0){
                //console.log('3.5');
                if( (Math.ceil(rolls/min_qty) * min_qty) >= min_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else if( (Math.ceil(rolls/min_qty) * min_qty) <= max_qty)
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
                else
                {
                    input_roll.val(min_qty);
                }
                // showFieldMessagePopup(input_roll, 'Multiples of '+min_qty+' only allowed');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE LOWER ENDS

            
            

            // IF STANDARDS OF LABELS ARE Greater THAN STARTS
            
            if(no_of_labels_entered > max_labels){
                //console.log('4');
                input_labels.val(max_labels);
                // showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }

            if(labels_per_roll > max_labels){
                //console.log('4');
                input_labels.val(max_labels);
                showFieldMessagePopup(input_labels, 'Quantity has been amended for production as '+max_labels+' labels.');
                // return false;
            }
            // IF STANDARDS OF LABELS ARE Greater THAN ENDS


            if(input_labels.val() % plainlabelsIncreement != 0){
                
                // AA33 STARTS
                   // input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                   input_labels.val( (input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                // AA33 ENDS

            }

            if(input_roll.val() % plainRollsIncreement != 0){
               input_roll.val( Math.ceil(input_roll.val()/plainRollsIncreement) *  plainRollsIncreement ) ;
            }

            if(no_of_labels_entered >= no_of_labels_entered_min){
                console.log('6');

                if( (Math.ceil(no_of_labels_entered/roll) <= max_labels) && (Math.ceil(no_of_labels_entered/roll) >= minimum_printed_labels) )
                {
                        console.log('6.1.2');
                        
                        // AA33 STARTS
                            // input_labels.val(Math.ceil(no_of_labels_entered/roll));
                            input_labels.val(Math.ceil(no_of_labels_entered/roll));
                        // AA33 ENDS

                        if(input_labels.val() % plainlabelsIncreement != 0){
                            // AA33 STARTS
                                // input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                                input_labels.val( (input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                            // AA33 ENDS


                        }
                        plainsheet_input.val( input_labels.val() * input_roll.val() );
                    
                }
                else
                {
                    console.log('6.2');
                    roll_counter = min_qty;
                    for (number=0; number<=(max_qty); number++) {
                        if(roll_counter <= max_qty)
                        {
                            console.log('6.3');
                            if( (Math.ceil(no_of_labels_entered/roll_counter) <= max_labels) && (Math.ceil(no_of_labels_entered/roll_counter) >= minimum_printed_labels) )
                            {
                                console.log('6.4');
                                
                                // AA33 STARTS
                                    // input_labels.val(Math.ceil(no_of_labels_entered/roll_counter));
                                    input_labels.val( (no_of_labels_entered/roll_counter));
                                // AA33 ENDS

                                if(input_labels.val() % plainlabelsIncreement != 0){
                                    // AA33 STARTS
                                        // input_labels.val( Math.ceil(input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                                        input_labels.val( (input_labels.val()/plainlabelsIncreement) *  plainlabelsIncreement );
                                    // AA33 ENDS

                                }
                                input_roll.val(roll_counter);
                                break;
                            }
                            else
                            {   
                                roll_counter += min_qty;
                            }
                        }
                        else
                        {
                            console.log('6.5');
                            input_labels.val(max_labels);
                            input_roll.val(max_qty);
                            plainsheet_input.val(max_labels * max_qty);
                            break;
                        }
                    } 
                }
            }


            input_labels.val( Math.ceil(input_labels.val()) )
            input_roll.val( Math.ceil(input_roll.val()) )

            plainsheet_input.val(input_labels.val() * input_roll.val() );
    });

    $(".plainlabels").blur(function()
    // $(".plainlabels").on('keyup', function (e)
    {   

            var _this = this;
            
            $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
            //$(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
            //$(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");
            
            $(_this).parents('.mainContainer').find('.regmark_price b.pr-sm').css('color', "gray");
                $(_this).parents('.mainContainer').find('.raw_plain b.pr-sm').css('color', "gray");
                
                

            // coreAndWoundChecker();
            $(".popover").hide();
            var plainsheet_input =  $(_this).parents('.mainContainer').find('.plainsheet_input');
            var Printable =  $(_this).parents('.mainContainer').find('.PrintableProduct').val();
            var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
            var minimum_printed_labels    =  $(_this).parents('.mainContainer').find('.minimum_printed_labels').val();
            var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
            var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
            var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
            var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
            var labels    = parseInt(input_labels.val());
            var roll      =  parseInt(input_roll.val());
            var no_of_labels_entered    = parseInt(plainsheet_input.val());
            var labels_per_roll    = parseInt(input_labels.val());
            var rolls      =  parseInt(input_roll.val());
            var  _this = _this;
            var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
            var no_of_labels_entered_min = minimum_printed_labels * min_qty;
            plainlabelsIncreement = 10;
            plainRollsIncreement = min_qty;

            // console.log("Entered Labels= "+no_of_labels_entered+" & Entered Label Per Roll= "+labels_per_roll+" & Entered Rolls= "+rolls);
            // console.log("Min Label per Rolls= "+ minimum_printed_labels+" & Max Label per Rolls= "+max_labels);
            // console.log("Min Roll And Across= "+ min_qty+" & Maximum Rolls = allowed "+max_qty);


            plainsheet_input.val(plainsheet_input.val().replace(/[^0-9]/gi,''));
            input_labels.val(input_labels.val().replace(/[^0-9]/gi,''));
            input_roll.val(input_roll.val().replace(/[^0-9]/gi,''));

            if(no_of_labels_entered < no_of_labels_entered_min){
                plainsheet_input.val(no_of_labels_entered_min);
                input_labels.val(minimum_printed_labels);
                input_roll.val(Math.ceil(min_qty));
            }
            if(labels_per_roll < minimum_printed_labels){
                input_labels.val(minimum_printed_labels);
            }
            if((rolls < min_qty)){
                input_roll.val(Math.ceil(min_qty));
            }

            if(labels_per_roll > max_labels){
                input_labels.val(max_labels);
            }

            plainsheet_input.val(  input_roll.val() * input_labels.val()  );
            
    });

    $(".plainrolls").blur(function()
    // $(".plainrolls").on('keyup', function (e)
    {
            var _this = this;
            $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
            //$(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
           // $(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");
           $(_this).parents('.mainContainer').find('.regmark_price b.pr-sm').css('color', "gray");
                $(_this).parents('.mainContainer').find('.raw_plain b.pr-sm').css('color', "gray");
           
            $(".popover").hide();
            var plainsheet_input =  $(_this).parents('.mainContainer').find('.plainsheet_input');
            var Printable =  $(_this).parents('.mainContainer').find('.PrintableProduct').val();
            var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
            var minimum_printed_labels    =  $(_this).parents('.mainContainer').find('.minimum_printed_labels').val();
            var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
            var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
            var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
            var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
            var labels    = parseInt(input_labels.val());
            var roll      =  parseInt(input_roll.val());
            var no_of_labels_entered    = parseInt(plainsheet_input.val());
            var labels_per_roll    = parseInt(input_labels.val());
            var rolls      =  parseInt(input_roll.val());
            var  _this = _this;
            var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
            var no_of_labels_entered_min = minimum_printed_labels * min_qty;
            plainlabelsIncreement = 10;
            plainRollsIncreement = min_qty;

            plainsheet_input.val(plainsheet_input.val().replace(/[^0-9]/gi,''));
            input_labels.val(input_labels.val().replace(/[^0-9]/gi,''));
            input_roll.val(input_roll.val().replace(/[^0-9]/gi,''));

            if(no_of_labels_entered < no_of_labels_entered_min){
                plainsheet_input.val(no_of_labels_entered_min);
                input_labels.val(minimum_printed_labels);
                input_roll.val(Math.ceil(min_qty));
            }
            if(labels_per_roll < minimum_printed_labels){
                input_labels.val(minimum_printed_labels);
            }
            if((rolls < min_qty)){
                input_roll.val(Math.ceil(min_qty));
            }

            if(roll > max_qty){
                input_roll.val(max_qty);
            }

            if((rolls%min_qty) != 0)
            {
                if( ( (Math.ceil(rolls/min_qty) * min_qty) >= min_qty) && ((Math.ceil(rolls/min_qty) * min_qty) <= max_qty) )
                {
                    input_roll.val(Math.ceil(rolls/min_qty) * min_qty);
                }
            }
            plainsheet_input.val(  input_roll.val() * input_labels.val()  );
    });


   
    function increement_decreement(_this, parentClass, className, minValue, maxValue, action, inc_dec_val)
    {

            $(_this).parents('.mainContainer').find('.color-orange').css("color", "gray");
            $(_this).parents('.mainContainer').find('.plainperlabels_text').css("color", "gray");
            $(_this).parents('.mainContainer').find('.priceplain').css("color", "gray");
            

        var decreent_increement_val = inc_dec_val;
        var inputOBJ = $(_this).parents('.'+parentClass).find("."+className);
        var input_Value = $(_this).parents('.'+parentClass).find("."+className).val();
        
        if(action == 'increement')
        {
            if(parseInt(inputOBJ.val()) < parseInt(maxValue)){
                
                inputOBJ.val( parseInt(inputOBJ.val()) + parseInt(decreent_increement_val) );
                $(_this).parents('.'+parentClass).find('.qty-plus').removeClass("notallowed");
            }else{
                $(_this).parents('.'+parentClass).find('.qty-plus').addClass("notallowed");
            }
        }
        else if(action == 'decreement')
        {
            if(parseInt(inputOBJ.val()) > minValue){
                inputOBJ.val( parseInt(inputOBJ.val()) - parseInt(decreent_increement_val) );    
                $(_this).parents('.'+parentClass).find('.qty-minus').removeClass("notallowed");
            }else{
                $(_this).parents('.'+parentClass).find('.qty-minus').addClass("notallowed");
            }
        }

        $("."+className).blur();
        
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.reCalculatePrices').show("slide", { direction: "up" }, 400);
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.add_plain').hide();
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.get_a_quote_plain').hide();
    }


    function showFieldMessagePopup(field, Message)
    {
        // $(document).ready(function() {
            // show_faded_popover(field, Message);
        // });
    }

    function calculatePrices(_this)
    {   
        
         var coreSize = $("#coresize :selected").val();
                var woundoption = $("#woundoption :selected").val();

                if(coreSize == "" || woundoption == ""){
                    $('.disablePopup').addClass("RollMaterialWhiteBgDisabled");
                    $('.selectWoundCoreerror').show();
                    if(coreSize == "" && woundoption != "")
                    {
                        $('.disablePopup p').html("Select Core Size from the top of this page");
                    }
                    else if(coreSize != "" && woundoption == "")
                    {
                        $('.disablePopup p').html("Select Wound Options First from the top of this page");
                    }
                    else if(coreSize == "" && woundoption == "")
                    {
                        $('.disablePopup p').html("Select Core Size & Wound Options First from top of this page");
                    }

                }else{
                    $('.disablePopup').removeClass("RollMaterialWhiteBgDisabled");
                    $('.selectWoundCoreerror').hide();
                }
                
                
            $(".disableViewPricing").show();
            $(_this).parents('.mainContainer').find('.aa_loader').show();
            var plainsheet_input =  $(_this).parents('.mainContainer').find('.plainsheet_input');
            $(".popover").hide();
            // coreAndWoundChecker();
            var Printable =  $(_this).parents('.mainContainer').find('.PrintableProduct').val();
            var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
            // nafees111
            var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
            var minimum_printed_labels    =  $(_this).parents('.mainContainer').find('.minimum_printed_labels').val();
  
            var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
            var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
            var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
            var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');

            var labels    = parseInt(input_labels.val());
            var roll      =  parseInt(input_roll.val());

            var no_of_labels_entered    = parseInt(plainsheet_input.val());
            var labels_per_roll    = parseInt(input_labels.val());
            var rolls      =  parseInt(input_roll.val());

            var  _this = _this;
            var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
            var no_of_labels_entered_min = minimum_printed_labels * min_qty;

            plainsheet_input.val(input_labels.val() * input_roll.val() );

             change_btn_state($(_this).children("button"),'disable','plain');
            
             $.ajax({
                    url: base+'ajax/calculate_roll_price',
                    type:"POST",
                    async:"false",
                    dataType: "html",
                    data: {
                           roll: roll,
                           menuid: menuid,
                           prd_id: id,
                           labels:labels,
                           max_labels:max_labels,
                           size:'<?=$height?>',
                           gap:'<?=$Labelsgap?>',
                           printprice:'enabled',
                           regmark:regmark
                    },
                    success: function(data){
                    if(!data==''){  
                        data = $.parseJSON(data); 
                        if(data.response=='yes'){
                            change_btn_state($(_this).children("button"),'enable','plain');
                             $(_this).parents('.mainContainer').find('.diamterinfo').html('Roll Diameter <span>'+data.diameter+' mm</span>').show();
                             
                             $(_this).parents('.mainContainer').find('.plainprice_text').html(data.price);
                             $(_this).parents('.mainContainer').find('.plainperlabels_text').html(data.labelprice);

                             $(_this).parents('.mainContainer').find('.raw_plain b').html(data.raw_plain);
                             $(_this).parents('.mainContainer').find('.regmark_price b').html(data.regmark_price);
                             
                             $(_this).parents('.mainContainer').find('.plainsheet_input_printing').val(data.total_labels); //waqar
                             
                             
                             
                             if(Printable=='Y'){

                                var onlyprintprice = data.onlyprintprice;
                                var onlyprintprice = onlyprintprice.replace(',','');
                                if(data.vatoption == 'Inc')
                                {
                                    onlyprintprice = onlyprintprice * 1.2;
                                }
                                onlyprintprice = parseFloat(onlyprintprice);

                                $(_this).parents('.mainContainer').find('.printing_offer_text_full').html(data.symbol+''+ (onlyprintprice*2).toFixed(2) );
                                $(_this).parents('.mainContainer').find('.printing_offer_text').html(data.symbol+''+onlyprintprice.toFixed(2) );
                                $(_this).parents('.mainContainer').find('.AddPrintPrice').html(data.symbol+''+onlyprintprice.toFixed(2) );
                                $(_this).parents('.mainContainer').find('.vat_option_printed').html(data.vatoption+' VAT');
                                $(_this).parents('.mainContainer').find('.MaterialPrintPriceMain').removeClass('hideSection');

                             }

                                // var PricesContainer = $(_this).children("button").attr("dataPriceBox");
                                var PricesContainer = $(_this).parents('.mainContainer').find('.calculatePricingBtn').attr("dataPriceBox");
                                $("#"+PricesContainer).show("fade", { direction: "up" }, 700);

                                freeDeliveryOptionPrice = 0;
                                 if(data.vatoption == 'Inc'){
                                    freeDeliveryOptionPrice = data.raw_plain.replace(/[^\d.-]/g,'');

                                 }else{
                                    freeDeliveryOptionPrice = (data.raw_plain.replace(/[^\d.-]/g,'')) * 1.2;
                                 }
                                 
                                  $(_this).parents('.mainContainer').find('.regmark_price b.pr-sm').css('color', "#fd4913");
                                    $(_this).parents('.mainContainer').find('.raw_plain b.pr-sm').css('color', "#fd4913");
                                
                                 if(freeDeliveryOptionPrice < 25){

                                    $(_this).parents('.mainContainer').find('.freeDeliveryMessageAppear').html("<p>Free Delivery on Orders over £25.00 Inc. VAT</p>");
                                 }
                                 else
                                 {
                                    $(_this).parents('.mainContainer').find('.freeDeliveryMessageAppear').html("");
                                 }

                                $(_this).parents('.mainContainer').find('.aa_loader').hide();
                          }
                          $(".disableViewPricing").hide();
                        }
                     }  
                });    
                
    }

    

    
    $( ".plainsheet_input, .plainlabels, .plainrolls" ).focus(function()
    {
        $(this).parents('.mainContainer').find('.MaterialAddToBasketButton a.reCalculatePrices').show("slide", { direction: "up" }, 400);
        $(this).parents('.mainContainer').find('.MaterialAddToBasketButton a.add_plain').hide();
        $(this).parents('.mainContainer').find('.MaterialAddToBasketButton a.get_a_quote_plain').hide();

    });

    function reCaculate(_this)
    {
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton  a.reCalculatePrices').hide();
        calculatePrices(_this);
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.add_plain').show("slide", { direction: "up" }, 400);
        $(_this).parents('.mainContainer').find('.MaterialAddToBasketButton a.get_a_quote_plain').show("slide", { direction: "up" }, 400);
    }
    // $(document).on("click", ".reCalculatePrices", function(e)
    // {
        // $(this).hide();
        // calculatePrices(this);
        // $(this).parents('.mainContainer').find('.MaterialAddToBasketButton a.add_plain').show("slide", { direction: "up" }, 400);
    // });


    function addPlain(_this)
    {

        $(_this).parents('.mainContainer').find('.aa_loader').show();
        $(_this).attr("disabled", true);
        var prd_name =  $(_this).parents('.mainContainer').find('.product_name').text();
        var id        =  $(_this).parents('.mainContainer').find('.product_id').val();
        var menuid    =  $(_this).parents('.mainContainer').find('.manfactureid').val();
        var category_description    =  $(_this).parents('.mainContainer').find('.category_description').val();

        var label_application = $(_this).parents('.mainContainer').find('.label_application').val();

        var coreSize = $("#coresize").val();
        CoreMM = "(76 mm)";
        if(coreSize == 'R1'){CoreMM = "(25 mm)";
        }
        else if(coreSize == 'R2'){CoreMM = "(38 mm)";
        }
        else if(coreSize == 'R3'){CoreMM = "(44.5 mm)";
        }
        
         var exploded = category_description.split("(");
         category_description = exploded[0]+CoreMM;

        var max_labels    =  $(_this).parents('.mainContainer').find('.LabelsPerSheet').val();
        var min_qty   = parseInt($(_this).parents('.mainContainer').find('.minimum_quantities').val());
        var max_qty   = parseInt($(_this).parents('.mainContainer').find('.maximum_quantities').val());
        
        var input_labels = $(_this).parents('.mainContainer').find('.plainlabels');
        var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
        var regmark = $(_this).parents('.mainContainer').find('.regmark').val();
        var labels    = parseInt(input_labels.val());
        var roll      =  parseInt(input_roll.val());
        
        var rollWounds = $("#woundoption").val();
        var categoryDynamic = $(".categoryId").val();
        change_btn_state($(_this).children("button"),'disable','plain');
        
        
        $.ajax({
            url: base+'ajax/add_to_cart',
            type:"POST",
            async:"false",
            dataType: "html",
            data: {  qty: roll,menuid: menuid,prd_id: id,labels:labels,type:'Rolls',regmark:regmark, label_application: label_application, rollWounds:rollWounds,categoryDynamic:categoryDynamic },
            success: function(data){
            
                if(!data==''){   
                    data = $.parseJSON(data); 
                    if(data.response=='yes'){ 
                        change_btn_state($(_this).children("button"),'enable','plain');
                        fireRemarketingTag('Add to cart');
                        ecommerce_add_to_cart(_this, 'plain');

                        popup_messages(category_description);
                        $('#cart').html(data.top_cart);
                    }
                    else if(data.deactive=='yes'){
                        $('#alter_link').attr('href',data.url);
                        $('.deactive_product').modal('show');
                    }
                }
                
                $(_this).attr("disabled", false);
                $(_this).parents('.mainContainer').find('.aa_loader').hide();
             }
        });
    }

    // $(document).on("click", ".add_plain", function(e) {
        
    //     // console.log(e);

    //     $(this).attr("disabled", true);
    //     var prd_name =  $(this).parents('.mainContainer').find('.product_name').text();
    //     var id        =  $(this).parents('.mainContainer').find('.product_id').val();
    //     var menuid    =  $(this).parents('.mainContainer').find('.manfactureid').val();
    //     var category_description    =  $(this).parents('.mainContainer').find('.category_description').val();
    //     var max_labels    =  $(this).parents('.mainContainer').find('.LabelsPerSheet').val();
    //     var min_qty   = parseInt($(this).parents('.mainContainer').find('.minimum_quantities').val());
    //     var max_qty   = parseInt($(this).parents('.mainContainer').find('.maximum_quantities').val());
        
    //     var input_labels = $(this).parents('.mainContainer').find('.plainlabels');
    //     var input_roll = $(this).parents('.mainContainer').find('.plainrolls');
    //     var regmark = $(this).parents('.mainContainer').find('.regmark').val();
    //     var labels    = parseInt(input_labels.val());
    //     var roll      =  parseInt(input_roll.val());
    //     var  _this = this;
        

    //         change_btn_state($(_this).children("button"),'disable','plain');
    //         $.ajax({
    //             url: base+'ajax/add_to_cart',
    //             type:"POST",
    //             async:"false",
    //             dataType: "html",
    //             data: {  qty: roll,menuid: menuid,prd_id: id,labels:labels,type:'Rolls',regmark:regmark},
    //             success: function(data){
    //             $(this).attr("disabled", false);
    //             if(!data==''){   
    //                     data = $.parseJSON(data); 
    //                     if(data.response=='yes'){ 
    //                         change_btn_state($(_this).children("button"),'enable','plain');
    //                         fireRemarketingTag('Add to cart');
    //                         ecommerce_add_to_cart(_this, 'plain');
    //                         popup_messages(category_description);
    //                         $('#cart').html(data.top_cart);
    //                     }
    //                     else if(data.deactive=='yes'){
    //                         $('#alter_link').attr('href',data.url);
    //                         $('.deactive_product').modal('show');
    //                     }
    //                 }
    //              }  
    //         });
    // });

    function fireRemarketingTag(page){
        <? if(SITE_MODE=='live'){?>
                dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype' : page});
        <? } ?>
    }


    function ecommerce_add_to_cart(_this, type){
        <? if(SITE_MODE=='live'){ ?> 
                
                var prdid =  $(_this).parents('.mainContainer').find('.product_id').val();
                //var product_name =  $(_this).parents('.productdetails').find('.product_name').text();
                var product_name =  $(_this).parents('.mainContainer').find('.category_description').val();
                var category = 'Roll Labels';   
                
                if(type == 'printed'){
                        var input_id = $(_this).parents('.mainContainer').find('.printlabels');
                        var quantity = parseInt(input_id.val());
                        var price =  $(_this).parents('.mainContainer').find('.printedprice_text').find('.color-orange').text();
                        var category = " Printed - "+category; 
                        var price = price.replace ( /[^\d.]/g, '' );
                
                }
                else if(type == 'sample'){
                        var price = 0.00;
                        var category = 'Sample Roll Labels'
                        var quantity = 1
                }
                else{
                        var input_roll = $(_this).parents('.mainContainer').find('.plainrolls');
                        var quantity      =  parseInt(input_roll.val());
                        var price =  $(_this).parents('.mainContainer').find('.plainprice_text').find('.color-orange').text();
                        var price = price.replace ( /[^\d.]/g, '' );
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
    

    // $(document).on("click", ".rsample", function(e) {
        function rsample(_this)
        {
    
            var _this = $(_this);
            var p_code =  $(_this).parents('.mainContainer').find('.product_id').val();
            var menuid =  $(_this).parents('.mainContainer').find('.manfactureid').val();
            var prd_name = $(_this).parents('.mainContainer').find('.product_name').text();
            var material_code = $(_this).parents('.mainContainer').find('.material_code').val();
            var label_application = $(_this).parents('.mainContainer').find('.label_application').val();
            if(menuid){
                change_btn_state(_this,'disable','sample');
                $.ajax({
                            url: base+'ajax/add_sample_to_cart',
                            type:"POST",
                            async:"false",
                            dataType: "html",
                            data: {  qty: 1,menuid: menuid,prd_id: p_code, material_code:material_code, label_application:label_application},
                            success: function(data){
                            if(!data==''){  
                                change_btn_state(_this,'enable','sample');
                                    $(".requestsample").modal('hide');
                                    data = $.parseJSON(data); 
                                    if(data.response=='yes'){
                                        var sample_txt = "Thank you for requesting a sample which has been added to your basket and upon checkout a free-of-charge roll length of the material chosen will be sent to you. \n\n Please note: This is a material and adhesive sample only and will no not therefore match the label shape and size on this page.";
                                        //swal("Material Sample Added to Basket",sample_txt,"success");
                                        popup_messages(sample_txt);
                                        //popup_messages(menuid+' - '+prd_name+' - Sample ');
                                        $('#cart').html(data.top_cart);
                                        ecommerce_add_to_cart(_this, 'sample');
                                    }
                                    else if(data.response=='failed'){
                                        if(data.msg == 'you have reached the maximum sample order limit!'){
                                                swal("Maximum limit exceeded",data.msg,"error");
                                        }else{
                                                swal("Duplicate Sample Roll",data.msg,"error");
                                        }
                                    }
                                }
                         }  
                });
            }
        }
        // });
        
        
        
        function check_regmark_option(_this)
        {
            var regmark = '';
            var _this = $(_this);
            
            if(_this.is(':checked')){
                regmark = "yes";
            } else {
                regmark = "no"; 
            }
            _this.parents('.mainContainer').find('.regmark').val(regmark);
            reCaculate(_this);
        }


    /*$(document).on("change",".registration_mark_option",function(e){
        var regmark = '';
        if($(this).is(':checked'))
        {
            regmark = "yes";
        }
        else
        {
            regmark = "no"; 
        }
        $(this).parents('.mainContainer').find('.regmark').val(regmark);
        $(this).parents('.mainContainer').find('.calculate_plain').trigger('click');
        calculatePrices(this);
        
    });*/

    function is_numeric(mixed_var) {
        var whitespace =
        " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
        return (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -
            1)) && mixed_var !== '' && !isNaN(mixed_var);
    }

    var timer = '';
    function show_faded_popover(_this, text){
            $(_this).attr('data-content','');
            $(_this).popover('hide');
            $(_this).popover('destroy');
            
            $(_this).popover({'placement':'top'});
            $(_this).attr('data-content',text);
            $(_this).popover('show');
            clearTimeout(timer);
            timer = setTimeout(function(){ 
                    $(_this).attr('data-content','');
                    $(_this).popover('hide');
                    $(_this).popover('destroy');
            }, 5000);
    }
    

    // VOLUME PRICE BREAKS STARTS
    $(document).on("click", ".price_breaks", function(e) {
        var product_id =  $(this).parents('.mainContainer').find('.product_id').val();
        var manfactureid =  $(this).parents('.mainContainer').find('.manfactureid').val();
        var labels =  $(this).parents('.mainContainer').find('.LabelsPerSheet').val();
        $('#ajax_price_breaks').html('');
        $('#price_loader').show();
            $.ajax({
                url: base+'ajax/labels_price_breaks',
                type:"POST",
                async:"false",
                data:{mid:manfactureid,labels:labels,type:'roll'},
                dataType: "html",
                success: function(data){
                    if(!data==''){  
                        data = $.parseJSON(data); 
                        setTimeout(function(){
                          $('#price_loader').hide();
                          $('#ajax_price_breaks').html(data.html);
                        },500);
                    }
                }  
            });
    });
    // VOLUME PRICE BREAKS ENDS

    $(document).on("click", ".technical_specs", function(e) {
    var id =  $(this).parents('.mainContainer').find('.product_id').val();
    $('#ajax_tecnial_specifiacation').html('');
    $('#mat_code').html('');
    $('#specs_loader').show();
            $.ajax({
                        url: base+'ajax/material_popup/'+id,
                        type:"POST",
                        async:"false",
                        dataType: "html",
                        success: function(data){
                                if(!data==''){  
                                        data = $.parseJSON(data); 
                                        $('#material_popup_img').attr('src',data.src);
                                        setTimeout(function(){
                                              $('#specs_loader').hide();
                                              $('#ajax_tecnial_specifiacation').html(data.html);
                                              $('#mat_code').html(data.mat_code);
                                              
                                        },1000);
                                }
                          }  
            });
      });


    function favourite_unfavourite(elem, categoryId, CategoryRollId, DieCode, type, productId, MaterialCode)
    {
        var _this = elem;
        var dataResponse = "";
        var filterClass = "";
        var filterUses = $(".filterUses").val();

        $.ajax({
            url: base+'ajax/add_to_favourite',
            type:"POST",

            data: {"categoryId":"<?php echo $catIdSimple;?>", "type":type, "productId":productId, "filterUses":filterUses, "MaterialCode":MaterialCode, "CategoryRollId":CategoryRollId, "DieCode":DieCode},
            success: function(data){
                if(!data==''){  
                    dataResponse = data.response;
                    if(dataResponse.status==200)
                    {
                        if(dataResponse.response == "added"){
                            $(_this).html('<i class="fa fa-heart"></i>');
                            swal("Success",dataResponse.message,"success");
                        }else{
                            $(_this).html('<i class="fa fa-heart-o"></i>');
                            swal("Success",dataResponse.message,"success");
                        }   

                        var FavMaterials = "";
                        for (var i = 0; i < dataResponse.favouriteMaterials.length; i++) {
                            if(i != 0)
                            {
                                FavMaterials += ",";
                            }
                            FavMaterials += dataResponse.favouriteMaterials[i];
                        }

                        if(dataResponse.filterUses == "byUse"){

                            if(dataResponse.totalFavourites > 0){
                                $(".MaterialSaveSearchByUse a").html('<input type="checkbox" id="favourite_heart_use" class="opacity-0 favouriteProducts favouriteByUse" value="'+FavMaterials+'"  onclick="filterbyUse();"><span class="totalFavouriteCounts">'+dataResponse.totalFavourites+'</span><span data-filter="use"  id="favourite_heart_span_use" class="fa fa-heart-o favouriteProducts favouriteByUse favouriteHeart" value="'+FavMaterials+'"></span>');
                            }else{
                                $(".MaterialSaveSearchByUse a").html('<input type="checkbox" id="favourite_heart_use"  class="opacity-0 favouriteProducts favouriteByUse" value="'+FavMaterials+'"  onclick="filterbyUse();"><span class="totalFavouriteCounts">'+dataResponse.totalFavourites+'</span><span data-filter="use"  id="favourite_heart_span_use" class="fa fa-heart-o favouriteProducts favouriteByUse favouriteHeart" value="'+FavMaterials+'"></span>');
                            }

                        }else if(dataResponse.filterUses == "byProduct"){
                            
                            filterClass = "MaterialSaveSearchByProduct a";
                            if(dataResponse.totalFavourites > 0){
                                $(".MaterialSaveSearchByProduct a").html('<input type="checkbox" id="favourite_heart" class="opacity-0 favouriteProducts favouritebyProducts" value="'+FavMaterials+'" onclick="filterbyProducts();"><span class="totalFavouriteCounts">'+dataResponse.totalFavourites+'</span> <span  id="favourite_heart_span" data-filter="product" class="fa fa-heart-o favouriteProducts favouritebyProducts favouriteHeart" value="'+FavMaterials+'"></span>');
                            }else{
                                $(".MaterialSaveSearchByProduct a").html('<input type="checkbox" id="favourite_heart" class="opacity-0 favouriteProducts favouritebyProducts" value="'+FavMaterials+'"  onclick="filterbyProducts();"><span class="totalFavouriteCounts">'+dataResponse.totalFavourites+'</span> <span  id="favourite_heart_span" data-filter="product" class="fa fa-heart-o favouriteProducts favouritebyProducts favouriteHeart" value="'+FavMaterials+'"></span>');
                            }
                        }

                        
                    }
                }
            }
        });  
    }

    $(document).ready(function() {
        $(".product_material_image").hover(function(e) {
            var value = $(this).aaZoom();
        });
        $('.product_material_image').aaZoom(); 
    });


    $(document).ready(function() {
        $(".FBUResultFound").html("<?php echo $allProductsSum;?> results found");
    });


    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip-digital"]').tooltip();
        $("[data-toggle=tooltip-product]").tooltip();
        $(':not([data-toggle="popover"])').popover('hide');
    });
    
    
         /*** Waqar *****/
    $(".plainsheet_input_printing").blur(function(){
        var plainsheet_input_val = parseInt($(this).val()); 
       
        var _this = $(this);
        if (plainsheet_input_val == '' || plainsheet_input_val < 100) {
            show_faded_popover(_this, 'Quantity has been ammend for production as 100');
            $(this).val(100)
            return false;
        }
        else if (plainsheet_input_val > 1000000) {
            show_faded_popover(_this, 'Quantity has been ammend for production as 1000000');
            $(this).val(1000000)
            return false;
        }
    });
    
      /*** Waqar *****/


</script>