<link href="<?= Assets ?>labelfinder/css/newstyles.css?v=<?= time() ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= Assets ?>css/jquery.mCustomScrollbar.css">
<script src="<?= Assets ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
<div class="row">
    <div class="lf-pos">
        <div class="thumbnail orange-bottom no-margin no-padding-bottom" style="min-height: 73px;">
            <div class="finderNote row fnTop">
                <div class="col-md-12 text-center">
                    <p class="no-margin">The label filter enables you to select and view products that closely match
                        your search criteria through the use of search tools. Click on the “VIEW FILTERS” button below
                        to begin using.</p>
                </div>
            </div>
            <form class="labels-form labels-filters-form" id="filter-form">
                <? if (isset($designer) and $designer == "yes"): ?>
                    <input type="hidden" value="designer" id="page_type"/>
                <? else: ?>
                    <input type="hidden" value="finder" id="page_type"/>
                <? endif; ?>
                <input type="hidden" value="category" id="view"/>
                <input type="hidden"
                       value="<?= (isset($printer_width) and $printer_width != '') ? $printer_width : '' ?>"
                       id="printer_width"/>
                <div class="FilterMain">
                    <? if (isset($designer) and $designer == "yes"): ?>
                        <input type="hidden" id="newcategory" name="newcategory" value="A4" class="nlabelfilter"/>
                    <? else: ?>
                        <input type="hidden" id="newcategory" name="newcategory" value="<?= $category ?>"
                               class="nlabelfilter"/>
                    <? endif; ?>
                    <input type="hidden" id="LabelPerDie" name="LabelPerDie" value="" class="nlabelfilter"/>
                    <? if (!isset($designer) and $designer != "yes"): ?>
                        <div class="ProductThumbnailsMain row" id="categorybox" style="display: table;">
                            <label for="A5" class="ProductThumbnail Thumb1">
                                <div class="ThumbnailsRadio">
                                    <input type="radio" id="A5" data-value="A5"
                                           name="category" <? if ($category == 'A5') {
                                        echo 'checked="checked"';
                                    } ?>>
                                    <span class="checkround"></span></div>
                                <div class="ProductThumbnailImg"><img onerror='imgError(this);' src="<?= Assets ?>/labelfinder/img/a5-thumb.jpg" class="img-responsive" alt="A5 Sheets"/></div>
                                <div class="ProductName text-center"> A5 Sheets <br>
                                    Plain & Printed
                                </div>
                            </label>
                            <label for="A4" class="ProductThumbnail Thumb1">
                                <div class="ThumbnailsRadio">
                                    <input type="radio" id="A4" data-value="A4"
                                           name="category" <? if ($category == 'A4') {
                                        echo 'checked="checked"';
                                    } ?>>
                                    <span class="checkround"></span></div>
                                <div class="ProductThumbnailImg"><img onerror='imgError(this);'
                                                                      src="<?= Assets ?>/labelfinder/img/a4-thumb.jpg"
                                                                      class="img-responsive" alt="A4 Sheets"/></div>
                                <div class="ProductName text-center"> A4 Sheets <br>
                                    Plain & Printed
                                </div>
                            </label>
                            <label for="A3" class="ProductThumbnail">
                                <div class="ThumbnailsRadio">
                                    <input type="radio" id="A3" data-value="A3"
                                           name="category" <? if ($category == 'A3') {
                                        echo 'checked="checked"';
                                    } ?>>
                                    <span class="checkround"></span></div>
                                <div class="ProductThumbnailImg"><img onerror='imgError(this);'
                                                                      src="<?= Assets ?>labelfinder/img/a3-thumb.jpg"
                                                                      class="img-responsive" alt="A3 Sheets"/></div>
                                <div class="ProductName text-center"> A3 Sheets <br>
                                    Plain & Printed
                                </div>
                            </label>
                            <label for="SRA3" class="ProductThumbnail">
                                <div class="ThumbnailsRadio">
                                    <input type="radio" id="SRA3" data-value="SRA3"
                                           name="category" <? if ($category == 'SRA3') {
                                        echo 'checked="checked"';
                                    } ?>>
                                    <span class="checkround"></span></div>
                                <div class="ProductThumbnailImg"><img onerror='imgError(this);'
                                                                      src="<?= Assets ?>labelfinder/img/a3-thumb.jpg"
                                                                      class="img-responsive" alt="SRA3 Sheets"/></div>
                                <div class="ProductName text-center"> SRA3 Sheets <br>
                                    Plain & Printed
                                </div>
                            </label>
                            <label for="Integrated" class="ProductThumbnail">
                                <div class="ThumbnailsRadio">
                                    <input type="radio" id="Integrated" data-value="Integrated"
                                           name="category" <? if ($category == 'Integrated') {
                                        echo 'checked="checked"';
                                    } ?>>
                                    <span class="checkround"></span></div>
                                <div class="ProductThumbnailImg"><img onerror='imgError(this);'
                                                                      src="<?= Assets ?>labelfinder/img/Integrated-thumb.jpg"
                                                                      class="img-responsive" alt="Integrated Labels"/>
                                </div>
                                <div class="ProductName text-center"> Integrated <br>
                                    Labels
                                </div>
                            </label>
                            <div class="IntergratedMain integratedbrands hide" style="display:none;float:left;">
                                <div class="ThermalPrinter">
                                    <label class="ThermalManufactureMain select">
                                        <select id="brands" name="brands" autocomplete="off" class="nlabelfilter">
                                            <option value="">Select Brand</option>
                                            <?php if (isset($compatible) and $compatible == 'yes' and isset($catdata['CategoryName'])) { ?>
                                                <option selected="selected" value="<?= $catdata['CategoryName'] ?>">
                                                    <?= $catdata['CategoryName'] ?>
                                                </option>
                                            <? } ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <label for="Roll" class="ProductThumbnail">
                                <div class="ThumbnailsRadio">
                                    <input type="radio" id="Roll" data-value="Roll"
                                           name="category" <? if ($category == 'Roll') {
                                        echo 'checked="checked"';
                                    } ?>>
                                    <span class="checkround"></span></div>
                                <div class="ProductThumbnailImg"><img onerror='imgError(this);'
                                                                      src="<?= Assets ?>labelfinder/img/roll-thumb.jpg"
                                                                      class="img-responsive" alt="Roll Labels"/></div>
                                <div class="ProductName text-center"> Roll Labels <br>
                                    Plain & Printed
                                </div>
                            </label>
                            <label for="thermal" class="ProductThumbnail" data-trigger="manual"
                                   data-toggle="category-tooltip" data-placement="right"
                                   title="Please select category first"
                                   data-original-title="Please select category first">
                                <div class="ThumbnailsRadio">
                                    <input type="radio" id="thermal" data-value="thermal"
                                           name="category" <? if ($category == 'thermal') {
                                        echo 'checked="checked"';
                                    } ?>>
                                    <span class="checkround"></span></div>
                                <div class="ProductThumbnailImg"><img onerror='imgError(this);'
                                                                      src="<?= Assets ?>labelfinder/img/thermal-printer.jpg"
                                                                      class="img-responsive"
                                                                      style="border:1px solid #d9d9d9"
                                                                      alt="Thermal Printer"/></div>
                                <div class="ProductName text-center">Search Label by<br>
                                    Thermal Printer
                                </div>
                            </label>
                            <div class="ThermalPrinterMain thermaloptions">
                                <div class="ThermalPrinter">
                                    <div class="ThermalManufactureMain">
                                        <label class="select">
                                            <select name="manufaturer" id="manufaturer"
                                                    class="ThermalManufacture Manufacture1" tabindex="10">
                                                <option value=""> Select Manufacturer</option>
                                                <? if (isset($make_option) and $make_option != '') echo $make_option; ?>
                                            </select>
                                            <i></i> </label>
                                        <label class="select">
                                            <select name="model" id="model" class="nlabelfilter ThermalManufacture"
                                                    tabindex="10">
                                                <option value=""> Select Model</option>
                                                <? if (isset($model_option) and $model_option != '') echo $model_option; ?>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                </div>
                                <div class="ProductName searchtext text-center" style="position: relative;top: 10px;">
                                    Search Label by Thermal Printer Model.
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="clear"></div>
                     <div class="col-lg-10 col-lg-offset-2 col-md-11 col-sm-12 col-md-offset-1 ">
                        <div class="col-lg-9 col-md-10 col-sm-10">
                                                       

                            <div class="ChooseShapesMain">
                                <div class="ChooseShapes">
                                    <div class="col-md-3 col-sm-3">
                                        <h4>Choose a Shape :</h4>
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="hidden" id="shape" value="<?= ($shape) ? $shape : '' ?>"/>
                                        <div id="shapes_box">
                                            <button type="button" disabled="disabled" class="btn_shape rectangle"
                                                    data-toggle="tooltip" title="Rectangle"
                                                    data-val="Rectangle"></button>
                                            <button type="button" disabled="disabled" class="btn_shape square"
                                                    data-toggle="tooltip" title="Square" data-val="Square"></button>
                                            <button type="button" disabled="disabled" class="btn_shape circular"
                                                    data-toggle="tooltip" title="Circular" data-val="Circular"></button>
                                            <button type="button" disabled="disabled" class="btn_shape oval"
                                                    data-toggle="tooltip" title="Oval" data-val="Oval"></button>
                                            <button type="button" disabled="disabled" class="btn_shape star"
                                                    data-toggle="tooltip" title="Star" data-val="Star"></button>
                                            <button type="button" disabled="disabled" class="btn_shape heart"
                                                    data-toggle="tooltip" title="Heart" data-val="Heart"></button>
                                            <button type="button" disabled="disabled" class="btn_shape triangle"
                                                    data-toggle="tooltip" title="Triangle" data-val="Triangle"></button>
                                            <button type="button" disabled="disabled" class="btn_shape perforated"
                                                    data-toggle="tooltip" title="Perforated"
                                                    data-val="Perforated"></button>
                                            <button type="button" disabled="disabled" class="btn_shape irregular"
                                                    data-toggle="tooltip" title="Irregular"
                                                    data-val="Irregular"></button>
                                            <button type="button" disabled="disabled" class="btn_shape anti-tamper"
                                                    data-toggle="tooltip" title="Anti-Tamper"
                                                    data-val="Anti-Tamper"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end shapes-->
                            <div class="row_sliders">
                                <div class="clearfix">
                                    <div class="col-md-3 col-sm-3 button_column">
                                        <div class="hide">
                                            <button type="button" class="btn btn_trigger labels_by_size active"
                                                    data-val="labels_by_size" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Label By Size"></button>
                                            <button type="button" class="btn btn_trigger labels_per_sheet"
                                                    data-val="labels_per_sheet" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Label Per Sheet"></button>
                                        </div>
                                        <div class="button_triggers">
                                            <a href="javascript:void(0);" data-val="labels_by_size"
                                               class="labels_by_size btn_trigger" data-role="button"
                                               style="display:none;">
                                                <img src="<?= Assets ?>images/finder/label-by-size-new.png"
                                                     class="img-responsive"/>
                                                <span class="trigger_label">Filter by Label Size</span>
                                            </a>
                                            <a href="javascript:void(0);" data-val="labels_per_sheet"
                                               class="labels_per_sheet btn_trigger" data-role="button">
                                                <img src="<?= Assets ?>images/finder/label-per-sheet-new.png"
                                                     class="img-responsive"/>
                                                <span class="trigger_label">Filter by<br/>Labels per Sheet</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 slider_column">
                                        <div id="width_height_triggers">
                                            <div class="LabelWidthMain" id="width_box">
                                                <div class="LabelWidthHeader text-center" id="width_box_text"> LABEL
                                                    WIDTH (mm)
                                                </div>
                                                <div class="LabelMain">
                                                    <div data-role="page" class="Range">
                                                        <div class="">
                                                            <label class="input pull-left" style="width:40%">
                                                                <input type="text" class="control_input allowdecimal"
                                                                       placeholder="Min width" id="width_min"
                                                                       name="width_min">
                                                            </label>
                                                            <label class="input pull-right" style="width:40%">
                                                                <input type="text" class="control_input allowdecimal"
                                                                       placeholder="Max width" id="width_max"
                                                                       name="width_max">
                                                            </label>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="clearfix" style="margin-bottom:10px"></div>
                                                        <div class="lablefilterslider" style="clear:left;">
                                                            <div id="width_slider"
                                                                 class="slider sliderRange sliderBlue"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix rangelimit">
                                                        <div class="col-xs-6 text-left"><small class="width_lowerlimit">0</small>
                                                        </div>
                                                        <div class="col-xs-6 text-right"><small
                                                                    class="width_upperlimit">0</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LabelHeightMain" id="height_box">
                                                <div class="LabelWidthHeader text-center"> Label Height (mm)</div>
                                                <div class="LabelMain">
                                                    <div data-role="page" class="Range">
                                                        <div class="">
                                                            <label class="input pull-left" style="width:40%">
                                                                <input type="text" class="control_input allowdecimal"
                                                                       placeholder="Min height" id="height_min"
                                                                       name="height_min">
                                                            </label>
                                                            <label class="input pull-right" style="width:40%">
                                                                <input type="text" class="control_input allowdecimal"
                                                                       placeholder="Max height" id="height_max"
                                                                       name="height_max">
                                                            </label>
                                                        </div>
                                                        <div class="clearfix" style="margin-bottom:10px"></div>
                                                        <div class="lablefilterslider" style="clear:left;">
                                                            <div id="height_slider"
                                                                 class="slider sliderRange sliderBlue"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix rangelimit">
                                                        <div class="col-xs-6 text-left"><small
                                                                    class="height_lowerlimit">0</small></div>
                                                        <div class="col-xs-6 text-right"><small
                                                                    class="height_upperlimit">0</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="WidthHightCheckbox">
                                                <label class="check">Include opposite dimensions in the search criteria
                                                    e.g. Height for Width
                                                    <input type="checkbox" checked="checked" name="opposite_dimension"
                                                           id="opposite_dimension">
                                                    <span class="checkmark"></span> </label>
                                            </div>
                                        </div>
                                        <div id="label_per_sheet_triggers" style="display:none">
                                            <div class="container_of_labels mCustomScrollbar" id="container_of_labels">
                                                <div class="datadata"></div>
                                            </div>
                                        </div>
                                        <!-- label_per_sheet_triggers -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2" style="margin-top: 119px;">
                            <div class="Dropdowns">
                                <? /*if(isset($designer) and $designer == "yes"):?>
                <div class="template_search col-xs-12">
                  <div class="input-group">
                    <input class="form-control" placeholder="Have a Product Code ?" type="text" id="filter_search_box" autocomplete="off">
                    <span class="input-group-addon">
                    <button type="button" style="background: transparent; border: 0px" id="filter_search_handler"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </span> </div>
                </div>
                <?php endif;*/ ?>
                                
                                
                                
                                <!--<label class="SelectColorMain select col-xs-6">
                                  <select name="adhesive" id="adhesive" class="nlabelfilter" tabindex="10">
                                    <option value="">Select Adhesive Type</option>
                                  </select>
                                  <i></i> </label>
                                <label class="SelectMaterialMain select col-xs-6">
                                  <select name="finish" id="finish" class="nlabelfilter" tabindex="10">
                                    <option value="">Select Finish</option>
                                  </select>
                                  <i></i> </label>-->
                                <div class="clear"></div>
                                <div class="P-FoundBtn col-md-12">
                                    <div class="ProductsFound sizefound m-l-l-31">
                                        <span id="label_counter1"> 0 </span>
                                        <h4>Products found</h4>
                                    </div>
                                    <div class="ResetBtn"><a href="javascript:void(0);"
                                                             class="btn ResetButton reset_button" role="button"> <i
                                                    class="fa fa-refresh"></i>&nbsp;&nbsp;Reset Filter</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end new 12 -->
                    <div class="clear"></div>
                    <!-- Shapes End -->
                </div>
                <div class="clear"></div>
                <input type="hidden" value="0" id="product_count"/>
                <input type="hidden" value="0" id="start_limit"/>
            </form>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <button class="show-h hide_filter"><span><i aria-hidden="true" class="fa fa-bars"></i>
      <div class="clea"></div>
      HIDE FILTERS</span></button>
        </div>
    </div>
</div>
<div id="compare_modal" class="modal fade aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content no-padding">
            <div class="panel no-margin">
                <div class="panel-heading">
                    <h3 class="pull-left no-margin"><b>Compare Products</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div id="compare_modal_content"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var shape_list = [];
    <?php $shapes = $this->filter_model->generate_category_shapes();?>
    shape_list = <?=$shapes?>;
</script>
<script type="text/javascript">
    $(document).on("click", ".btn_trigger", function (e) {
        /*$(".btn_trigger").removeClass("active");
        $(this).addClass("active");*/

        $(".btn_trigger").show();
        $(this).hide();

        var trigger_type = $(this).data('val');
        if (trigger_type == "labels_by_size") {
            $("#width_height_triggers").show();
            $("#label_per_sheet_triggers").hide();
            $(".slider_column").removeClass("labels_per_sheet_row");
        } else if (trigger_type == "labels_per_sheet") {
            $("#label_per_sheet_triggers").show();
            $("#width_height_triggers").hide();
            $(".slider_column").addClass("labels_per_sheet_row");
        }
    });
    (function ($) {
        $(".container_of_labels").mCustomScrollbar({
            axis: 'y',
            theme: 'rounded-dark'
        });
    })(jQuery);
</script>