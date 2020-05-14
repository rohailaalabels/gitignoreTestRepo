
<link href="<?= Assets ?>css/mat-sep-2017.css" rel="stylesheet">
<link href="<?= Assets ?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<script src="<?= Assets ?>labelfinder/js/newlabelfinder.js?ver=<?= time() ?>"></script>
<style>
    select option:disabled {
        background: #dedede;
    }

    .dm-box .dm-selector .btn {
        font-size: 13px;
        border: 1px solid #e5e5e5;
        color: #666;
        text-align: left;
    }

    .dm-box .dm-selector .fa {
        position: absolute;
        right: 10px;
        top: 11px;
    }

    .dm-box .dm-selector .dropdown-menu a {
        color: #666;
        cursor: pointer;
    }

    .dm-selector .tooltip {
        font-size: 13px !important;
        width: 290px !important;
    }

    .dm-selector .tooltip.left .tooltip-arrow {
        border-left-color: #FEF7D8 !important;
    }

    .dm-selector .tooltip.right .tooltip-arrow {
        border-right-color: #FEF7D8 !important;
    }

    .dm-selector .tooltip.top .tooltip-arrow {
        border-top-color: #FEF7D8 !important;
    }

    .dm-selector .tooltip.bottom .tooltip-arrow {
        border-bottom-color: #FEF7D8 !important;
    }

    .dropdown-menu li .tooltip .tooltip-inner {
        background-color: #FEF7D8;
        border-radius: 4px;
        color: #454545;
        max-width: 381px;
        padding: 8px 15px;
        text-align: justify;
        text-decoration: none;
    }

    .dm-selector.tooltip.in {
        opacity: 1;
    }

    .tooltip.right .tooltip-arrow {
        border-right-color: #fff8dc !important;
    }

    .productdetails .input-group .form-control {
        height: 38px !important;
    }

    .sweet-alert {
        box-shadow: 0 0 20px;
    }

    .img-Sheet-material-img {
        height: 151px !important;
        width: auto !important;
        border: none !important;
    }

    <?php if($type == "A4"):?>
    .selected_material_box .mat-sep-2017 .selected-product .selected-mat {
        display: flex;
    }

    .selected_material_box .mat-sep-2017 .selected-product .edit_material_option {
        bottom: 7px;
        right: 10px;
    }

    <?php endif;?>
</style>
<style>
    .img-Sheet-material-img{
        margin-left: 0;
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
    <div class="loading-gif text-center" style="top:45%; z-index:150;"><img onerror='imgError(this);'
                                                                            src="<?= Assets ?>images/loader.gif"
                                                                            class="image"
                                                                            style="width:139px; height:29px;"
                                                                            alt="AA Labels Loader">
    </div>
</div>
<div class="container m-t-b-8 ">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
            <ol class="breadcrumb m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Materials</li>
                <li class="active"><?= $info['short_name'] ?></li>
            </ol>
        </div>
    </div>
</div>
<div class="bgGray">
    <div class="container">

        <input type="hidden" id="material_code" value="<?= $material_code ?>"/>
        <?php $category = $type;
        $shape = '';
        include_once('label_filters.php'); ?>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc"></div>
    </div>
    <div id="ajax_labelfilter" style="min-height:400px;" class="container"></div>
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
                    <div id="ajax_layout_spec" class="">
                        <? include_once('layout_popup.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade material aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">AA Labels Technical Specification - <span
                            id="mat_code"></span> <a href="#myModalLabel" class="anchorjs-link"><span
                                class="anchorjs-icon"></span></a></h4>
            </div>
            <div class="">
                <div>
                    <div class="col-md-3 text-center"><img onerror='imgError(this);' id="material_popup_img" src=""
                                                           alt="" title="" width="46" height="46"
                                                           class="m-t-b-10 img-Sheet-material"></div>
                    <div class="col-md-9">
                        <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image"
                                        style="width:139px; height:29px; "></div>
                        </div>
                        <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>
                        <div class="bgGray p-l-r-10"><small> This summary materials specification for this adhesive
                                label is based on information obtained from the original material manufacturer and is
                                offered in good faith in accordance with AA Labels terms and conditions to determine
                                fitness for use as sheet labels (A4, A5, A3 &amp; SRA3) produced by AA Labels. No guarantee
                                is offered or implied. It is the user's responsibility to fully asses and/or test the
                                label's material and determine its suitability for the label application intended.
                                Measurements and test results on this label's material are nominal. In accordance with a
                                policy of continuous improvement for label products the manufacturer and AA Labels
                                reserves the right to amend the specification without notice. A <a
                                        href="<?= base_url() ?>labels-materials/">full material specification</a> can be
                                found in the Label Materials section accessed via the Home Page <br>
                                Copyright&copy; AA labels 2015</small></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"></button>
            </div>
        </div>
    </div>
</div>


<!-- REGISTRATION MARK MODAL -->
<div class="modal fade registration_mark reg-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
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
                        <img onerror='imgError(this);' src="<?= Assets ?>images/registration_mark_popup_image.jpg"
                             class="img-responsive center-block" style="height:200px;"/>
                    </div>
                    <p class="text-justify">If your printer is not fitted with optic-free sensing technology using
                        capacitive or ultrasonic sensors triggered by changes in thickness, not opacity or contrast.
                        Then you may require a black-block registration mark on the reverse of the roll in order to
                        print. If this is the case then please select this option below. If you are unsure please refer
                        to your printer manual, or to the information available on our website <a
                                href="<?= base_url(); ?>thermal-printer-roll-labels/" target="_blank">Search by thermal
                            printer model. <i class="fa fa-external-link"></i></a></p>
                    <p>If you know that your printer does not need a black-block registration mark then please proceed
                        to select your label material. </p>
                    <div class="check_section">
                        <label class="check">Select to confirm you require black registration mark.
                            <input type="checkbox" name="registration_mark_option" id="registration_mark_option">
                            <span class="checkmark"></span> </label>
                    </div>
                    <div class="row m-t-15">
                        <div class="col-md-6">
                            <a data-cat-id="" data-prd-id="" id="btn_without_reg" role="button"
                               class="btn-block btn orangeBg  proceed_reg_btn" href="javascript:void(0);"
                               data-regmark="no"> Proceed without Registration Mark <i
                                        class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <div class="col-md-6">
                            <a data-cat-id="" data-prd-id="" id="btn_with_reg" role="button"
                               class="btn-block btn orangeBg proceed_reg_btn disabled" href="javascript:void(0);"
                               data-regmark="yes"> Proceed to Material Selection <i
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


    var contentbox = $('#ajax_labelfilter');
    var loadproducts = true;
    $(document).ready(function () {
        $('[data-toggle="tooltip-digital"]').tooltip();
        $("[data-toggle=tooltip-product]").tooltip();
        //$('.fnTop').show().slideDown( "fast" );
        //$( ".labels-filters-form" ).slideUp( "fast" );
        <? if(isset($category) and $category != ''){?>
        //filter_data('category', '');
        filter_data('autoload', '');
        <? }?>
    });

    $(document).on("click", ".edit_material_option", function (e) {
        //$('.selected_material_box').hide();
        //$('.material_filter_box').show();
        var url = $(this).data("url");
        window.location = url;
    });
    $(document).on("click", ".technical_specs_header", function (e) {
        var id = $(this).attr('id');
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


    $(document).on("click", ".technical_specs_header", function (e) {
        var id = $(this).attr('id');
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
        if ($(this).is(':checked')) {
            $("#btn_without_reg").addClass("disabled");
            $("#btn_with_reg").removeClass("disabled");
        } else {
            $("#btn_without_reg").removeClass("disabled");
            $("#btn_with_reg").addClass("disabled");
        }
    });

    $(document).on("click", ".proceed_reg_btn", function (e) {
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


    function fireRemarketingTag(page) {
        <? if(SITE_MODE == 'live'){?>
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
        <? } ?>
    }


</script> 
