<link href="<?= Assets ?>css/mat-sep-2017.css" rel="stylesheet">
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

    .mat-may-2017 section article.mat-tabs .ofq {
        margin-top: 0px;
        position: relative;
    }

    .mat-may-2017 section article.mat-detail .specs .labels-form select, .mat-may-2017 section article.mat-detail .specs .labels-form .select {
        padding: 5px 5px;
        height: 39px;
        margin-left: 0;
        margin-bottom: 1px;
    }

    a.product-url {
        margin-top: 10px;
    }

    .mat-may-2017 section article.mat-detail .specs .labels-form .select {
        padding: 0;
        height: 39px;
        margin-left: 0;
        margin-bottom: 1px;
    }

    .mat-sep-2017 .selected-product .selected-mat .pr-detail {
        min-height: 190px;
    }

    .mat-may-2017 section .roll-products article.mat-tabs .ofq {
        margin-top: 15px;
    }

    .mat-tabs table td {
        vertical-align: bottom !important;
    }

    .mat-tabs table td:first-child {
        vertical-align: middle !important;
    }

    .mat-may-2017 section article.mat-detail .specs a.technical_specs {
        top: 0px;
    }

    .your-selection {
        color: #006da4;
        display: block;
    }

    .spec_bg {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        padding: 10px;
    }

    .mat-may-2017 section .roll-products article.mat-detail .specs img.product_material_image {
        margin-top: 10px;
    }

    .table.printer {
        font-family: "Open Sans", Helvetica, Arial, sans-serif !important;
    }

    .flexcontainer {
        display: flex;
    }

    .flexcontainer .why-seal {
        position: absolute;
        right: 0px;
        bottom: 0px;
    }

    .flexcontainer .why-seal img {
        margin: 0 auto;
    }

    .table.printer td {
        vertical-align: middle;
    }

    .sort-filters:before, .sort-filters:after {
        content: " ";
        display: table;
        clear: both;
    }

    .filterBg .labels-form label {
        margin-bottom: 0px;
    }

    .filterBg {
        padding: 15px 10px !important;
        margin-bottom: 0px;
        background: #17b1e3;
        border-radius: 0;
    }

    .filterBg h4 {
        color: #fff;
    }

    .mat-ch {
        border: 0;
    }

    section[data-promotion='no'] {
        display: none;
    }

    .aboutBg {
        background-image: url("<?=Assets?>images/header/lba-a4.png");
    }
</style>
<div id="aa_loader" class="white-screen" style=" display:none;">
    <div class="loading-gif text-center" style="top:95%; z-index:150;"><img onerror='imgError(this);'
                                                                            src="<?= Assets ?>images/loader.gif"
                                                                            class="image"
                                                                            style="width:139px; height:29px; "
                                                                            alt="AA Labels Loader"></div>
</div>
<div class="container m-t-b-8 ">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
            <ol class="breadcrumb m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Materials</li>
                <li class="active"> Special Offer Materials</li>
            </ol>
        </div>
    </div>
</div>
<div class="bgGray">
    <?php
    $bg_img = $info['material_code'] . ".png";
    $path = Assets . "images/material_specs/sheets/WTP.png";
    ?>
    <div class="container">
        <div class="thumbnail row" style="">
            <div class="row no-pad-row">
                <div class="col-md-12">
                    <h1 style="text-align: center;color: #fd4913;margin: 10px 0 2px 0;">Save up to 30% on our Special
                        Offers</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="ajax_labelfilter" class="container">
        <div class="row">
            <div class="panel panel-default no-border mat-may-2017 mat-sep-2017 mat-list-sep-2017 ">
                <div class="panel-body no-padding">
                    <div class="colors_data mat-ch"
                         id="<?= (isset($othermaterials) and $othermaterials != '') ? '' : 'ajax_material_sorting' ?>">
                        <? if (isset($othermaterials) and $othermaterials != '') {
                            $single_product = 'active';
                        }
                        include('material_list_view_a4_offer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Material Detail modal -->
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
                    <div id="ajax_layout_spec" class=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Layout modal -->

<div class="modal fade lb_applications aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel1"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel1" class="modal-title"><span id="app_group_name"></span> - Label Applications <a
                            href="#myModalLabel1" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
            </div>
            <div>
                <div id="lb_applications_loader" class="white-screen hidden-xs" style="display:none;">
                    <div class="loading-gif text-center" style="top:26%;left:29%;"><img onerror='imgError(this);'
                                                                                        src="<?= Assets ?>images/loader.gif"
                                                                                        class="image"
                                                                                        style="width:139px; height:29px;"
                                                                                        alt="AA Labels Loader"></div>
                </div>
                <div class="scrollable-table ajax_application_chart"></div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
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
                                                           width="46" height="46" class="m-t-b-10 img-Sheet-material">
                    </div>
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
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $("[data-toggle=tooltip-product]").tooltip();
        //$(".other_materials .roll-products").find(".colourpicker").find("li:first a").trigger("click");
    });

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


    $(document).on("click", ".productdetails .colourpicker li a", function (e) {
        var colour = $(this).attr('data-value');
        $(this).parents('.productdetails').attr('data-colour', colour);
        $(this).parents('.productdetails').find('.colourpicker li').removeClass('active');
        $(this).parent().addClass("active");
        $(this).blur();
        get_product_details(this);
    });
    $(document).on("change", ".product_adhesive", function (e) {
        get_product_details(this);
    });


    var old_labels_input;
    var old_roll_labels_input;
    var old_roll_input;
    $(document).on("focus", ".labels_input", function (e) {
        old_labels_input = $(this).val();
    });
    $(document).on("focus", ".roll_labels_input", function (e) {
        old_roll_labels_input = $(this).val();
    });
    $(document).on("focus", ".input_rolls", function (e) {
        old_roll_input = $(this).val();
    });

    $(document).on("keypress keyup blur", ".labels_input", function (e) {
        if ($(this).val() != old_labels_input) {
            $(this).parents('.upload_row').find('.sheet_updater').show();
        }
    });


    function get_product_details(_this) {

        var productid = $(_this).parents('.productdetails').attr('data-value');
        var finish = $(_this).parents('.productdetails').attr('data-finish');
        var material = $(_this).parents('.productdetails').attr('data-material');
        //var colour = $(_this).parents('.productdetails').attr('data-colour');
        var colour = $(_this).parents('.productdetails').find('.colourpicker .active a').attr('data-value');
        var adhesive = $(_this).parents('.productdetails').find('.product_adhesive').val();

        if (adhesive == '' || adhesive == null) {
            adhesive = $(_this).parents('.productdetails').find("#hidden_adhesive").val();
        }
        //console.log('Adhesive option: '+adhesive);
        //aa_loader

        var top = $(_this).offset().top;
        top = top - 200;

        $('.loading-gif').css('top', top);
        $('#aa_loader').show();

        /*********** Empty the Cart here ***********/

        /******************************************/


        $.ajax({
            url: base + 'ajax/grouped_product_info',
            type: "post",
            async: "false",
            dataType: "json",
            data: {
                productid: productid,
                colour: colour,
                finish: finish,
                material: material,
                adhesive: adhesive,
                catid: '<?=$catid?>',
                type: 'Sheets',
            },
            success: function (data) {

                $('#aa_loader').hide();
                if (data.response == 'notfound') {
                    alert_box('Sorry this product is out of stock this time.');
                } else {

                    $(_this).parents('.productdetails').find('.product-url').attr('href', data.url);


                    $(_this).parents('.productdetails').find('.product_adhesive').html(data.adhesive_option);
                    $(_this).parents('.productdetails').find('.product_material_image').attr('src', data.thumbnail_path);
                    $(_this).parents('.productdetails').find('.product_name').html(data.product_name);
                    $(_this).parents('.productdetails').find('.product_description').html(data.product_description + "<br>");

                    $(_this).parents('.productdetails').find('.product_id').val(data.product_id);
                    $(_this).parents('.productdetails').find('.manfactureid').val(data.manfactureid);

                    $(_this).parents('.productdetails').find('#minimum_quantities').val(data.minimum);
                    $(_this).parents('.productdetails').find('#maximum_quantities').val(data.maximum);
                    $(_this).parents('.productdetails').find('.PrintableProduct').val(data.Printable);

                    $(_this).parents('.productdetails').find('.laser_printer_img').attr('src', data.laser_img);
                    $(_this).parents('.productdetails').find('.inkjet_printer_img').attr('src', data.inkjet_img);
                    $(_this).parents('.productdetails').find('.direct_printer_img').attr('src', data.d_thermal_img);
                    $(_this).parents('.productdetails').find('.thermal_printer_img').attr('src', data.thermal_img);

                    $(_this).parents('.productdetails').find('.laser_printer_div').attr('data-original-title', data.laser_text);
                    $(_this).parents('.productdetails').find('.inkjet_printer_div').attr('data-original-title', data.inkjet_text);
                    $(_this).parents('.productdetails').find('.direct_printer_div').attr('data-original-title', data.d_thermal_text);
                    $(_this).parents('.productdetails').find('.thermal_printer_div').attr('data-original-title', data.thermal_text);
                    var colour = $(_this).parents('.productdetails').find('.select_shape_size').attr('data-filter-colour', data.filter_color);
                    var finish = $(_this).parents('.productdetails').find('.select_shape_size').attr('data-filter-finish', data.filter_finish);
                    var material = $(_this).parents('.productdetails').find('.select_shape_size').attr('data-filter-material', data.filter_material);


                    $(_this).parents('.productdetails').find('.material_code').val(data.material_code_new);

                    //$(_this).parents('.productdetails').find("[data-toggle=tooltip-product]").tooltip('destroy');
                    $(_this).parents('.productdetails').find("[data-toggle=tooltip-product]").tooltip();
                    //tooltip-product


                }
            }
        });
    }


    $(document).on("click", ".technical_specs", function (e) {
        var id = $(this).parents('.productdetails').find('.product_id').val();
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
    $(document).on("click", ".applications", function (e) {
        var groupname = $(this).attr('id');
        $('.ajax_application_chart').html('');
        $('#app_group_name').html('');
        $('#lb_applications_loader').show();

        $.ajax({
            url: base + 'ajax/application_popup/',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {'groupname': groupname, type: 'sheets'},
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    setTimeout(function () {
                        $('#lb_applications_loader').hide();
                        $('.ajax_application_chart').html(data.html);
                        $('#app_group_name').html(data.group_name);
                        $("b.popup-title").html(data.group_name);
                    }, 500);
                }
            }
        });

    });


    function fetch_category_mateials() {
        var catid = '<?=$catid?>';
        var material = $('#material_mat').val();
        var adhesive = $('#adhesive_mat').val();
        var color = $('#color_mat').val();

        var top = $('#material_mat').offset().top;
        top = top + 100;
        $('.loading-gif').css('top', top);
        $('#aa_loader').show();
        $.ajax({
            url: base + 'ajax/get_category_materials/',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {material: material, adhesive: adhesive, color: color, catid: catid},
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    $('#material_mat').html(data.material);
                    $('#adhesive_mat').html(data.adhesive);
                    $('#color_mat').html(data.color);

                    var material = $('#material_mat').val();
                    var adhesive = $('#adhesive_mat').val();
                    var color = $('#color_mat').val();

                    $('[data-reset="reset"]').show();
                    $('.data-reset-colour').show();
                    if (material != '') {
                        $('.other_materials [data-reset="reset"]').hide();
                        $('.other_materials [data-mat-filters="' + material + '"]').show();
                    }
                    if (color != '') {
                        $('.other_materials [data-reset="reset"]').hide();
                        $('.other_materials [data-reset="reset"]').each(function (index) {
                            var colourexist = '';
                            var _this = this;
                            $(this).find('.data-reset-colour').each(function (index) {
                                var colour = $(this).attr('data-colour-filters');
                                if (colour == color) {
                                    if (adhesive != '') {
                                        var isdisabled = $(_this).find('.product_adhesive option[value="' + adhesive + '"]').attr('disabled');
                                        // var select_txt = $(_this).find('.product_adhesive option[value="'+adhesive+'"]').text();
                                        //console.log(isdisabled+' -- '+'Selected -- '+select_txt+' --- '+colour+' --- '+adhesive);

                                        if (isdisabled != 'disabled') {
                                            //$(_this).find('.product_adhesive').children('option').removeAttr("selected");
                                            $(_this).find('.product_adhesive option[value="' + adhesive + '"]').attr('selected', 'selected');
                                            //console.log('Inner Selection: '+isdisabled+' -- '+adhesive);
                                        }
                                    }
                                    //	$(this).find('a').click();
                                    colourexist = 'match';
                                    var material_select = $(_this).attr('data-mat-filters');
                                    if (material != '' && material_select != material) {
                                        $(_this).hide();

                                    } else {

                                        $(_this).show();

                                    }

                                    if ($(_this).css('display') == 'block') {
                                        $(this).find('a').click();
                                    }


                                }
                            });
                            //$('.data-reset-colour').hide();
                            //$('[data-colour-filters="'+color+'"]').show();
                            //if(colourexist==''){$(this).hide();}
                        });
                    }
                    if (adhesive != '') {
                        $('.other_materials [data-reset="reset"]').each(function (index) {
                            //var adhesive = $(this).find('.product_adhesive').val();
                            var _this = this;
                            var option = $(this).find('.product_adhesive').children('option[value="' + adhesive + '"]').attr('disabled');
                            //	console.log(option);
                            if (option == 'disabled') {
                                $(_this).hide();
                            } else {
                                //var option=$(this).find('.product_adhesive').children('option[value="' + adhesive + '"]').attr('selected', 'selected');
                            }
                        });
                    }
                    var visible = $(".other_materials [data-reset='reset']:visible");
                    $('.fetch_category_mateials').find('.append_search').append(visible);
                    var others = $(".other_materials [data-reset='reset']:hidden");
                    $(others).show();
                    $('.other_mats').find('.append_search').append(others);
                    $('.other_mats').show();
                    $('.hide_title').text("Filtered Results");
                    $('#aa_loader').hide();
                }
            }
        });
    }


    $(document).on("click", "a.product-url", function (e) {

        var product_adhesive = $(this).parents('.productdetails').find('.product_adhesive').val();
        if (typeof product_adhesive == 'undefined' || product_adhesive == '') {
            swal("Adhesive Missing", "Please select product adhesive first! ", "error");
            return false;
        }


        var url = $(this).attr('href');
        var productID = $(this).parents('.productdetails').find('.product_id').val();
        var material_code = $(this).parents('.productdetails').find('.material_code').val();
        var final_url = url + '?productid=' + productID + '&code=' + material_code;
        window.location = final_url;
        return false;
    });


    function fireRemarketingTag(page) {
        <? if(SITE_MODE == 'live'){?>
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
        <? } ?>
    }


</script> 
