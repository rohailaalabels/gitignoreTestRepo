<link href="<?= Assets ?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<script src="<?= Assets ?>labelfinder/js/newlabelfinder.js?ver=<?= time() ?>"></script>
<style type="text/css">
    .red-border {
        border: 1px solid red !important;
    }

    .plain-tooltip {
        opacity: 1 !important;
        right: 1px !important;
        left: auto !important;
        margin-top: 5px !important;
    }

    .printed-lba-a4 h1 {
        color: #fff;
        font-size: 26px;
        font-weight: bold;
    }
</style>
<style>
    @media (min-width: 768px) and (max-width: 768px) {
        .right_column {
            margin-top: 45px;
        }

        #ajax_material_sorting {
            margin-top: 0 !important;
        }
    }
</style>
<style>
    @media (min-width: 768px) {
        .modal-dialog {
            /*width: 670px !important;*/
        }
    }

    .registration_modal_link {
        text-decoration: underline;
    }

    .close_reg {
        color: #fd4913;
    }

    .registration_mark .panel-heading {
        background: #fff !important;
    }

    .registration_mark h4 {
        line-height: 35px;
    }

    .registration_mark h4 b {
        margin-left: 10px;
    }

    .image_container {
        border: 1px solid #e9e9e9;
        padding: 10px 0;
        margin-bottom: 15px;
    }

    .image_container p {
        font-size: 13px !important;
    }
</style>

<div id="aa_loader" class="white-screen" style=" display:none;">
    <div class="loading-gif text-center" style="top:50%; z-index:150;"><img onerror='imgError(this);'
                                                                            src="<?= Assets ?>images/loader.gif"
                                                                            class="image"
                                                                            style="width:160px; height:43px; "></div>
</div>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <?= $this->home_model->genrate_breadcrumb('category'); ?>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 ">
                <div class="pull-right"><a role="button" rel="nofollow" class="btn orangeBg"
                                           href="<?= base_url() . "virtual-catalogue/"; ?>"><i
                                class="fa fa-desktop"></i> Virtual Catalogue</a></div>
            </div>
        </div>
    </div>
</div>
<?
$url = uri_string();
$url = explode("/", $url);

// AA41 STARTS
    $first_url = $url[1];
    $second_url = $url[2];
// AA41 ENDS



$main_heading = ucwords(strtolower($heading));


// AA41 STARTS
    if( ( preg_match("/a4/i", $first_url) ) && ( $second_url == "circular") ){
        $image_path = 'A4_category_circle.png';
    } else if( ( preg_match("/a4/i", $first_url) ) && ( $second_url == "oval") ){
        $image_path = 'A4_category_oval.png';
    } else if( ( preg_match("/a4/i", $first_url) ) && ( $second_url == "rectangle") ){
        $image_path = 'A4_category_Rectangle.png';
    } else if( ( preg_match("/a4/i", $first_url) ) && ( $second_url == "square") ){
        $image_path = 'A4_category_square.png';
    } else if( ( preg_match("/a4/i", $first_url) ) && ( $second_url == "triangle") ){
        $image_path = 'A4_category_triangle.png';
    } else if( ( preg_match("/a4/i", $first_url) ) && ( $second_url == "star") ){
        $image_path = 'A4_category_star.png';
    } else if( ( preg_match("/a4/i", $first_url) ) && ( $second_url == "anti-tamper") ){
        $image_path = 'temper-A4_category_evident.png';
    } else {
        $image_path = 'lba-a4-img1.png';
    }
// AA41 ENDS

if (preg_match("/sra3/i", $first_url)) {
    
    // AA41 STARTS
        $html = ' labels on SRA3 sheets.';
        if( ( preg_match("/sra3/i", $first_url) ) && ( $second_url == "circular") ){
            $image_path = 'SRA3_category_circle.png';
        } else if( ( preg_match("/sra3/i", $first_url) ) && ( $second_url == "oval") ){
            $image_path = 'SRA3_category_oval.png';
        } else if( ( preg_match("/sra3/i", $first_url) ) && ( $second_url == "rectangle") ){
            $image_path = 'SRA3_category_Rectenagle.png';
        } else if( ( preg_match("/sra3/i", $first_url) ) && ( $second_url == "square") ){
            $image_path = 'SRA3_category_Square.png';
        } else {
            // AA42 STARTS
                $image_path = 'SRA3_category_oval.png';
            // AA42 STARTS
        }
        
        
        
    // AA41 ENDS


} else if (preg_match("/a5/i", $first_url)) {
    // AA41 STARTS
        $html = ' labels on A5 sheets.';
        // AA42 STARTS
            $image_path = 'A5-category-banner_main.png';
        // AA42 ENDS
    // AA41 ENDS

} else if (preg_match("/a3/i", $first_url)) {
    
    // AA41 STARTS
        $html = ' labels on A3 sheets.';
        if( ( preg_match("/a3/i", $first_url) ) && ( $second_url == "circular") ){
            $image_path = 'A3_category_circle.png';
        } else if( ( preg_match("/a3/i", $first_url) ) && ( $second_url == "oval") ){
            $image_path = 'A3_category_oval.png';
        } else if( ( preg_match("/a3/i", $first_url) ) && ( $second_url == "rectangle") ){
            $image_path = 'A3_category_Rectenagle.png';
        } else if( ( preg_match("/a3/i", $first_url) ) && ( $second_url == "square") ){
            $image_path = 'A3_category_Square.png';
        } else {
            $image_path = 'A3-category-banner.png';
        }
    // AA41 ENDS

} else if (preg_match("/roll/i", $first_url)) {
    
    // AA41 STARTS
        $html = ' labels on  rolls.';
        $image_path = 'roll-banner.png';
        //$main_heading .= ' on Rolls';
    // AA41 EMDS
    
    
} else {
     // AA41 STARTS
        $html = ' labels on A4 sheets.';
    // AA41 ENDS
}


// AA41 STARTS
    if (isset($url[2]) and $url[2] != '' && $url[2] != "circular" ) {
        $heading_txt = str_replace("labels", "label", strtolower($heading)) . ', ';
    } else {
        $heading_txt = ' label ';
    }
// AA41 ENDS


?>

    <!-- AA33 STARTS -->
        <style>
            .label-text-collapse {
                color: #16b1e6 !important;
                text-shadow: none !important;
                font-size: 14px !important;
            }

            [data-toggle="collapse"].collapsed .if-not-collapsed {
                display: none;
            }

            [data-toggle="collapse"]:not(.collapsed) .if-collapsed {
                display: none;
            }
            .printed-lba-a4 .collapse.in
            {
                display: inline;
            }
            
            
            /*AA48 STARTS*/
                .read_more_less_style
                {
                    font-size: 16px;
                    font-weight: bold; 
                    cursor: pointer;
                }
                .showCompleteText
                {
                    height: auto !important;
                    overflow: none !important;
                }
                .showLessText
                {
                    height: 139px !important;
                    overflow: hidden !important;
                }
            /*AA48 ENDS*/
        </style>
    <!-- AA33 ENDS -->

<div class="printed-lba-a4">
    <div class="container ">
        <!-- AA33 sTARTS -->
            <div class="col-md-8 col-sm-8" style="color: #FFF;text-align: justify;">
        <!-- AA33 ENDS -->
            <h1>
                <?= ucwords(strtolower($main_heading)); ?>
            </h1>

                <!-- AA48 STARTS -->
            <?php
            if( strlen($description) > 800 )
            {?>
                <div style="height: 139px; overflow: hidden;" id="actionContainer">
                    <?php echo $description;?>
                </div>
                <p class="read_more_less_style read_more_less">Read More <i class="fa fa-angle-down"></i></p>
            <?php
            } else {
                echo $description;
            }
            ?>
            
            <script>
                var counterFlag = 0;
                $( ".read_more_less" ).click(function() {
                    if(counterFlag == 0)
                    {
                        $("#actionContainer").removeClass("showLessText");
                        $("#actionContainer").addClass("showCompleteText");
                        $(this).html('Read Less <i class="fa fa-angle-up"></i>');
                        counterFlag++;
                    }
                    else
                    {   
                        $("#actionContainer").removeClass("showCompleteText");
                        $("#actionContainer").addClass("showLessText");
                        $(this).html('Read More <i class="fa fa-angle-down"></i>');
                        counterFlag = 0;
                    }
                });

            </script>
            <!-- AA48 ENDS -->

 
            


        </div>
        <div class="col-md-4 col-sm-4  right_column"><img onerror='imgError(this);' class="img-responsive" src="<?= Assets ?>images/header/<?= $image_path ?>" alt="<?= ucwords(strtolower($main_heading)); ?>"></div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <?php $category = $type;
        include_once(APPPATH . '/views/labelfinder/label_filters.php') ?>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc"></div>
        <div id="ajax_material_sorting">
            <? include_once('category_list.php') ?>
        </div>

        <!-- Layout modal -->
        <div class="modal fade layout aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content no-padding">
                    <div class="panel no-margin">
                        <div class="panel-heading">
                            <h3 class="pull-left no-margin"><b>Label Layout</b></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                        class="fa fa-times-circle"></i></button>
                            <div class="clear"></div>
                        </div>
                        <div class="panel-body">
                            <div id="ajax_layout_spec"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Layout modal -->
        <!-- REGISTRATION MARK MODAL -->
        <div class="modal fade registration_mark reg-modal" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content no-padding">
                    <div class="panel no-margin">
                        <div class="panel-heading">
                            <h4 class="pull-left no-margin">
                                <div class="roll-icon pull-left"><img onerror='imgError(this);' class=""
                                                                      src="<?= Assets ?>images/categoryimages/labelShapes/printed_roll.png"
                                                                      alt="Roll Icon"></div>
                                <b>Select Registration Mark Option</b></h4>
                            <button type="button" class="close close_reg" data-dismiss="modal" aria-label="Close"><i
                                        class="fa fa-times-circle"></i></button>
                            <div class="clear"></div>
                        </div>
                        <div class="panel-body">
                            <div class="image_container">
                                <p class="text-center">Reverse and Face Image of the Roll<br/>
                                    (Illustrating the black-bar registration mark)</p>
                                <img onerror='imgError(this);'
                                     src="<?= Assets ?>images/registration_mark_popup_image.jpg"
                                     class="img-responsive center-block" style="height:200px;"/>
                            </div>
                            <p class="text-justify">If your printer is not fitted with optic-free sensing technology
                                using capacitive or ultrasonic sensors triggered by changes in thickness, not opacity or
                                contrast. Then you may require a black-block registration mark on the reverse of the
                                roll in order to print. If this is the case then please select this option below. If you
                                are unsure please refer to your printer manual, or to the information available on our
                                website <a href="<?= base_url(); ?>thermal-printer-roll-labels/" target="_blank">Search
                                    by thermal printer model. <i class="fa fa-external-link"></i></a></p>
                            <p>If you know that your printer does not need a black-block registration mark then please
                                proceed to select your label material. </p>
                            <div class="check_section">
                                <label class="check">Select to confirm you require black registration mark.
                                    <input type="checkbox" name="registration_mark_option"
                                           id="registration_mark_option">
                                    <span class="checkmark"></span> </label>
                            </div>
                            <div class="row m-t-15">
                                <div class="col-sm-6">
                                    <a data-cat-id="" data-prd-id="" id="btn_without_reg" role="button"
                                       class="btn-block btn orangeBg  proceed_reg_btn" href="javascript:void(0);"
                                       data-regmark="no"> Proceed without Registration Mark <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-sm-6">
                                    <a data-cat-id="" data-prd-id="" id="btn_with_reg" role="button"
                                       class="btn-block btn orangeBg proceed_reg_btn disabled"
                                       href="javascript:void(0);" data-regmark="yes"> Proceed to Material Selection <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                <input type="hidden" id="reg_diecode" value=""/>
                                <input type="hidden" id="reg_shape" value=""/>
                                <input type="hidden" id="reg_productID" value=""/>
                                <input type="hidden" id="reg_source" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- REGISTRATION MARK MODAL -->
        <script>

            var contentbox = $('#ajax_material_sorting');


            $(document).ready(function () {

                <? if(isset($category) and $category != 'A4')
                {
                ?>
                $('.fnTop').show().slideDown("fast");
                $(".labels-filters-form").slideUp("fast");
                change_text('VIEW FILTERS');
                filter_data('autoload', '');
                <?
                }
                else if($category == "A4")
                {
                //		if(isset($shape) and $shape != '')
                //		{
                ?>
                $('.fnTop').show().slideDown("fast");
                $(".labels-filters-form").slideUp("fast");
                change_text('VIEW FILTERS');
                filter_data('autoload', '');
                <?
                //		}
                //		else
                //		{
                ?>
                //$("#newcategory").val('');
                //$("#label_counter1").html('<?//=count($records['list'])?>//');
                //disable_slider_option('disabled');
                //$("#newcategory").addClass("red-border");
                //$("#newcategory").after("<b class='tooltip tooltip-bottom-right plain-tooltip' style='left:0px;background:#000 !important;'>Begin by selecting the label format required</b>");
                //
                <?
                //		}
                }
                ?>
                $("#newcategory").on("change", "", function () {
                    if ($(this).val() != '') {
                        $(this).removeClass("red-border");
                        $(".plain-tooltip").remove();
                    }
                });

                <? if(isset($DL_EnhancedEcomerce) and $DL_EnhancedEcomerce != ''){ ?>
                dataLayer.push({
                    "ecommerce": {
                        "currencyCode": "GBP",
                        "impressions": [<?=$DL_EnhancedEcomerce?>]
                    }
                });
                <? } ?>
            });

            $(document).on("click", ".registration_modal_link", function (e) {
                $("#registration_mark_option").prop("checked", false);
                $("#registration_mark_option").trigger("change");
                var diecode = $(this).attr('id');
                var shape = $(this).data('shape');
                var productID = $(this).data('productid');
                var source = $(this).data('source');
                if (source == "modal_modal") {
                    $("#compare_modal").modal('hide');
                }
                $("#reg_diecode").val(diecode);
                $("#reg_shape").val(shape);
                $("#reg_productID").val(productID);
                $("#reg_source").val(source);

            });
            $(document).on("change", "#registration_mark_option", function (e) {
                
                 // AA38 STARTS
                    $("#btn_without_reg").html($("#btn_without_reg").text()+' <i class="fa fa-arrow-circle-right"></i>');
                    $("#btn_with_reg").html($("#btn_with_reg").text()+' <i class="fa fa-arrow-circle-right"></i>');
                // AA38 ENDS
                
                
                if ($(this).is(':checked')) {
                    $("#btn_without_reg").addClass("disabled");
                    $("#btn_with_reg").removeClass("disabled");
                } else {
                    $("#btn_without_reg").removeClass("disabled");
                    $("#btn_with_reg").addClass("disabled");
                }
            });

            $(document).on("click", ".proceed_reg_btn", function (e) {
                
                 // AA38 STARTS
                    $("#btn_without_reg").html($("#btn_without_reg").text()+' <i class="fa fa-arrow-circle-right"></i>');
                    $("#btn_with_reg").html($("#btn_with_reg").text()+' <i class="fa fa-arrow-circle-right"></i>');
                    $(this).html($(this).text()+' <i class="fa fa-spin fa-refresh"></i>');
                    $(this).attr("disabled", false);
                // AA38 ENDS
                
                
                var diecode = $("#reg_diecode").val();
                var shape = $("#reg_shape").val();
                var regmark = $(this).data('regmark');
                var productID = $("#reg_productID").val();
                var source = $("#reg_source").val();
                var newlink = '<?=base_url()?>';
                if (diecode != '' && shape != '') {
                    newlink += 'roll-labels/' + shape + '/' + diecode;
                }
                if (productID != 'undefined' && productID != '') {
                    newlink += '?productid=' + productID;
                }
                if (regmark == "yes" && (productID != "undefined" && productID != "")) {
                    newlink += '&regmark=yes';
                } else if (regmark == "yes" && (productID == "undefined" || productID == "")) {
                    newlink += '?regmark=yes';
                }
                window.location.href = newlink;
            });

            $('.registration_mark').on('hide.bs.modal', function (e) {
                var reg_source = $(this).find("#reg_source").val();
                if (reg_source == "modal_modal") {
                    $("#compare_modal").modal('show');
                }
            });


        </script>
    </div>
</div>
<div class="printed-lba-call ">
    <div class="container ">
        <div class="col-md-8 col-sm-8 col-lg-9">
            <h2>INFORMATION & ADVICE <br/>
                <small>We’re here to help you chose the label that’s right for you.</small></h2>
            <!-- AA41 STARTS -->
                    <p class="text-justify">If you need assistance or help deciding which
                        <?= $heading_txt ?>
                        material, colour, finish or adhesive is suitable for your <?= $shape?> label application. Please contact our customer
                        care team, via the live-chat facility on the page, our website contact form, telephone or email and
                        a member of the team will be happy to discuss your requirements for 
                        <?= $html ?>
                    </p>
                <!-- AA41 ENDS -->
        </div>
        <div class="col-md-4 col-sm-4 col-lg-3"><img onerror='imgError(this);' class="img-responsive"
                                                     src="<?= Assets ?>images/header/call_opr_1.png"
                                                     alt="Customer Support"></div>
    </div>
</div>
