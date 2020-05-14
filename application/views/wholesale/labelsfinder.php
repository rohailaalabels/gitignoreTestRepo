<link href="<?= Assets ?>labelfinder/css/filters.css" rel="stylesheet">
<link href="<?= Assets ?>labelfinder/css/blue.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/icheck.js"></script>
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<script src="<?= Assets ?>labelfinder/js/labelfinder.js?ver=<?= time() ?>"></script>
<style>
    .wholesale_class {
        padding: 8px 6px !important;
    }
</style>

<div id="quote_cart">
    <? if (count($cart_detail) > 0) include('quote_cart.php'); ?>
</div>
<div id="aa_loader" class="white-screen" style=" display:none;">
    <div class="loading-gif text-center" style="top:50%; z-index:150;"><img onerror='imgError(this);'
                                                                            src="<?= Assets ?>images/loader.gif"
                                                                            class="image"
                                                                            style="width:160px; height:43px; "></div>
</div>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb m0">
                <li><a href="<?= base_url() ?>wholesale/"><i class="fa fa-home"></i></a></li>
                <li class="active">Wholesale Products</li>
            </ol>
        </div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="lf-pos">
                <div class="thumbnail orange-bottom no-margin no-padding-bottom" style="min-height: 73px;">
                    <div class="finderNote row fnTop" style="display: block;">
                        <div class="col-md-12 text-center">
                            <p class="no-margin">The label filter enables you to select and view products that closely
                                match your search criteria through the use of search tools. Click on the "VIEW FILTERS"
                                button below to begin using.</p>
                        </div>
                    </div>
                    <form class="labels-form labels-filters-form  m-t-10" style="display:none;">
                        <input type="hidden" value="finder" id="page_type"/>
                        <input type="hidden" value="category" id="view"/>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div id="categorybox" class="col-lg-12 col-md-12 col-sm-12">
                                <!--<div class="labelF"> Label Category </div>-->
                                <label class="select">
                                    <select id="newcategory" name="category" autocomplete="off">
                                        <option value="">Label Category</option>
                                        <option <? if ($category == 'A4') {
                                            echo 'selected="selected"';
                                        } ?> value="A4">Labels on A4 Sheet
                                        </option>
                                        <option <? if ($category == 'Avery') {
                                            echo 'selected="selected"';
                                        } ?> value="Avery">Labels on A4 Sheets - Avery Sizes
                                        </option>
                                        <option <? if ($category == 'A5') {
                                            echo 'selected="selected"';
                                        } ?> value="A5">Labels on A5 Sheet
                                        </option>
                                        <option <? if ($category == 'A3') {
                                            echo 'selected="selected"';
                                        } ?> value="A3">Labels on A3 Sheet
                                        </option>
                                        <option <? if ($category == 'SRA3') {
                                            echo 'selected="selected"';
                                        } ?> value="SRA3">Labels on SRA3 Sheet
                                        </option>
                                        <option <? if ($category == 'Roll') {
                                            echo 'selected="selected"';
                                        } ?> value="Roll">Labels on Roll
                                        </option>
                                    </select>
                                    <i></i> </label>
                            </div>
                            <div class="clear"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div id="shape_text" class="labelF"> Label Shapes</div>
                                <input type="hidden" id="shape" value="<?= ($shape) ? $shape : '' ?>"/>
                                <div id="shapes_box">
                                    <button type="button" disabled="disabled" class="btn_shape circular"
                                            data-toggle="tooltip" title="Circular"></button>
                                    <button type="button" disabled="disabled" class="btn_shape rectangle"
                                            data-toggle="tooltip" title="Rectangle"></button>
                                    <button type="button" disabled="disabled" class="btn_shape square"
                                            data-toggle="tooltip" title="Square"></button>
                                    <button type="button" disabled="disabled" class="btn_shape oval"
                                            data-toggle="tooltip" title="Oval"></button>
                                    <button type="button" disabled="disabled" class="btn_shape star"
                                            data-toggle="tooltip" title="Star"></button>
                                    <button type="button" disabled="disabled" class="btn_shape heart"
                                            data-toggle="tooltip" title="Heart"></button>
                                    <button type="button" disabled="disabled" class="btn_shape triangle"
                                            data-toggle="tooltip" title="Triangle"></button>
                                </div>
                            </div>
                            <div class="clear15"></div>
                            <div id="width_box" class="col-lg-6 col-md-6 col-sm-12">
                                <div id="width_box_text" class="labelF"> Label Width <small>(mm)</small></div>
                                <div class="">
                                    <label class="input pull-left" style="width:40%">
                                        <input type="text" class="control_input allowdecimal" placeholder="Min width"
                                               id="width_min" name="width_min">
                                    </label>
                                    <label class="input pull-right" style="width:40%">
                                        <input type="text" class="control_input allowdecimal" placeholder="Max width"
                                               id="width_max" name="width_max">
                                    </label>
                                </div>
                                <div class="lablefilterslider" style="clear:left;">
                                    <div id="width_slider" class="slider sliderRange sliderBlue"></div>
                                </div>
                            </div>
                            <div id="height_box" class="col-lg-6 col-md-6 col-sm-12">
                                <div class="labelF"> Label Height <small>(mm)</small></div>
                                <div class="">
                                    <label class="input pull-left" style="width:40%">
                                        <input type="text" class="control_input allowdecimal" placeholder="Min height"
                                               id="height_min" name="height_min">
                                    </label>
                                    <label class="input pull-right" style="width:40%">
                                        <input type="text" class="control_input allowdecimal" placeholder="Max height"
                                               id="height_max" name="height_max">
                                    </label>
                                </div>
                                <div class="lablefilterslider" style="clear:left;">
                                    <div id="height_slider" class="slider sliderRange sliderBlue"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 m-t-15">
                                <label class="checkbox  p-b-10">
                                    <input type="checkbox" checked="checked" id="opposite_dimension"
                                           name="opposite_dimension" value="0" class="textOrange">
                                    <i></i> Include opposite dimensions in the search criteria e.g. Height for Width
                                </label>
                            </div>
                            <div id="cornerradius_box" class="col-lg-12 col-md-12 col-sm-12 m-t-15 no-padding"
                                 style="display:none;">
                                <div class="col-lg-3 col-md-3 col-sm-12 no-margin-left m-t-15 labelF"> Corner Radius
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <label class="select">
                                        <select name="cornerradius" id="cornerradius" class="nlabelfilter">
                                            <option value="">Select Label Corner</option>
                                            <option value="sharp">Sharp corner</option>
                                            <option value="rounded">Rounded corner</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!--<div class="labelF"> Label Material </div>-->
                                <label class="select">
                                    <select name="material" id="material" class="nlabelfilter">
                                        <option value="">Select Labels Material</option>
                                    </select>
                                    <i></i> </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!--<div class="labelF"> Printer / Copier Type </div>-->
                                <label class="select">
                                    <select name="printer" id="printer" class="nlabelfilter">
                                        <option value="">Select Printer / Copier Type</option>
                                    </select>
                                    <i></i> </label>
                            </div>
                            <div class="clear"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="labelF"> Label Adhesive</div>
                                <input type="hidden" id="adhesive" value=""/>
                                <div id="adhesive_box">
                                    <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
                                    <label>Permanent</label>
                                    <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
                                    <label>Freezer</label>
                                    <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
                                    <label>High Tack</label>
                                    <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
                                    <label>Peelable</label>
                                    <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
                                    <label>Re-Sealable</label>
                                </div>
                            </div>
                            <div class="clear25"></div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!--<div class="labelF"> Label Finish </div>-->
                                <label class="select">
                                    <select name="finish" id="finish" class="nlabelfilter">
                                        <option value="">Select Labels Finish</option>
                                    </select>
                                    <i></i> </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!-- <div class="labelF"> Label Colour </div>-->
                                <label class="select">
                                    <select name="color" id="color" class="nlabelfilter">
                                        <option value="">Select Labels Colour</option>
                                    </select>
                                    <i></i> </label>
                            </div>
                            <div class="clear"></div>
                            <div class="col-lg-8 col-md-8 col-sm-12 m-t-15">
                                <div class="cBlueF no-margin no-padding sizefound">
                                    <p class="no-padding"><span id="label_counter1">0</span>
                                        <label style=" font-weight:normal;" class="viewtype">Products</label>
                                        found</p>
                                </div>
                                <div class="clear5"></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 m-t-15"><a href="javascript:void(0);"
                                                                               class="btn btn-block blue2 reset_button"
                                                                               role="button"> <i
                                            class="fa fa-refresh"></i> Reset</a>
                                <div class="clear10"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12" style="display:none">
                            <div class="col-lg-4 col-md-3 col-sm-12"></div>
                            <div class="col-xs-5">
                                <div class=" cBlueF">
                                    <p class=""><span id="label_counter1">0</span>
                                        <label style=" font-weight:normal;" class="viewtype">Products</label>
                                        found</p>
                                </div>
                            </div>
                            <div class="col-xs-2 res-btn m-t-20 m-b-20 pull-right"><a href="javascript:void(0);"
                                                                                      class="btn btn-block blue2 reset_button"
                                                                                      role="button"> <i
                                            class="fa fa-refresh"></i> Reset</a></div>
                        </div>
                        <div class="clear"></div>
                        <input type="hidden" value="0" id="product_count"/>
                        <input type="hidden" value="0" id="start_limit"/>
                        <input type="hidden" value="enable" id="wholesale"/>
                    </form>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <button class="show-h"><span><i aria-hidden="true" class="fa fa-bars"></i>
          <div class="clea"></div>
          VIEW FILTERS</span></button>
                </div>
            </div>
        </div>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc" class=""></div>
        <div id="ajax_finder_content"></div>
    </div>
</div>
<div class="whiteBg3">
    <div class="container text-center  ">
        <p style="padding-top:20px; ">If you can't find one of our standard labels to your exact specificationthen we
            can produce custom labels in any
            shape and size of label in any colour <br>
            and material. We can use your own artwork in a variety of file formats. If you need some help
            designing your own personalised labels then <br>
            please give us a call and our label designers can show you some options. <br>
            Sales / Customer Services: <br>
            <span class="cBlue f-20">
      <?= EMAIL ?>
      </span></p>
    </div>
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

<script>
    var contentbox = $('#ajax_finder_content');
    $(window).load(function () {
        $('#newcategory').val('<?=$category?>');
        filter_data('category', '');

        $(".slide-toggle").click(function () {
            $(".ws-vyq-box").animate({
                width: "toggle"
            });
        });
    });


    function reset_materials() {
        var material = $('#material_mat').val('');
        var adhesive = $('#adhesive_mat').val('');
        var color = $('#color_mat').val('');
        fetch_category_mateials();
    }

    function reset_roll_materials() {
        var material = $('#material_mat').val('');
        var adhesive = $('#adhesive_mat').val('');
        var color = $('#color_mat').val('');
        fetch_category_mateials();
    }


    $(document).on("click", ".technical_specs", function (e) {
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

    $(document).on("click", ".wholesale_class", function (e) {
        var cateogry = $(this).attr('data-cat-id');
        var product = $(this).attr('data-prd-id');

        if (product == 'roll') {
            var coresize = $('#coresize_' + cateogry).attr('data-value');
            cateogry = cateogry + '' + coresize;
            product = '';
        }

        $('#aa_loader').show();
        $('#view').val('category');
        $('#start_limit').val(0);
        $('#product_count').val(0);

        $.ajax({
            url: base + 'wholesale/material/' + cateogry + '/' + product,
            type: "POST",
            async: "false",
            dataType: "html",
            data: {material: '', adhesive: '', color: '', catid: cateogry},
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    //$(".show-h").trigger( "click" );
                    $('#ajax_finder_content').html(data.html);
                    $('#aa_loader').hide();

                    $('.fnTop').show().slideDown("slow");
                    $(".labels-filters-form").slideUp("slow");
                    change_text('VIEW FILTERS');
                    $('html, body').animate({scrollTop: 250}, 1500);

                }
            }
        });


    });

</script> 
