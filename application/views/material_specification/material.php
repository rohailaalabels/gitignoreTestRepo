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
                <li class="active">
                    <?= $info['group_name'] ?>
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="printed-lba-a4" style="display:none">
    <div class="container ">
        <div class="col-md-8 col-sm-12">
             <h2>LABEL MATERIALS</h2>
            <p class="text-justify">The technical specifications for the materials available can be accessed from the
                menu below. Information on face-stock substrates, adhesives, release liners and approvals is available
                for reference from this page.. Enabling you to check the compliance and suitability of the material/s
                being considered for the label application.</p>
        </div>
        <div class="col-md-4 col-sm-12"><img onerror='imgError(this);' class="img-responsive"
                                             src="<?= Assets ?>images/header/material_banner.png" alt="Label Materials">
        </div>
    </div>
</div>
<div class="bgGray">
    <!--<div class="container">
  	    <?php //$category = $type;$shape='';include_once('label_filters.php'); ?>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc"></div>
</div>-->
    <?php
    //echo"<pre>";print_r($info);echo"</pre>";exit;

    $bg_img = $info['material_code'] . ".png";
    $path = Assets . "images/material_specs/" . $group_type . "/" . $bg_img;
    ?>
    <div id="ajax_labelfilter" class="container">
        <div class="row">
            <div class="mat-sep-2017">
                <div class="selected-product">
                    <div class="row selected-mat">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row flexcontainer">
                                    <!-- AA51 STARTS -->
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <h1 class="pr-title">
                                        <?php
                                        $url = uri_string();
                                        $url = explode("/", $url);
                                        $first_url = $url[1];

                                        $seoFlag = false;

                                            $main_heading = ucwords(strtolower($info['short_name']));

                                            if( isset($info) && count($info) > 0 && $info['short_name'] == 'Matt Gold Paper' && $type == "A4" ) {
                                                $main_heading = "Metallic Labels in Gold and Silver";
                                                $content_main = '
                                                    <p>Our metallic labels promise to add a premium finish to your product or project. We offer a range of flood coated, metallic coloured standard paper labels, completed with a permanent acrylic-based pressure sensitive adhesive.</p>
                                                    <p>Metallic labels are ideal for creating a luxury image and quality appearance for your product. They are very popular with customers with labelling applications requiring branding of high value items where overprinting of branding or logos on a gold or silver background provides a pleasing aesthetic and enhances the company and product image. Examples of applications that we see are for electrical items, white goods, bags and cases. Metallic labels are also used as asset and information labels, where over-printing is required by laser or thermal transfer.</p>
                                                    <p>We use coloured label paper face-stock that is finished with a lacquer that is compatible with laser printers for home or business printing. Download our templates to make designing and printing easy.</p>
                                                    <p>Our metallic labels all benefit from an innovative dry edge finish, which removes all adhesive from the edge of the sheet. This helps to reduce issues caused by adhesive deposits on printer rollers for quicker, problem-free printing.</p>
                                                    <p>We offer other metallic coloured Polymer face-stocks, which can be viewed in the “Other Materials” section, or by searching using the three filters shown below.</p>
                                                    <h2 style="font-size:16px;font-weight:bold;margin:0 0 2px 0;color:#006da4;">Metallic Labels in Gold, Rich Gold or Silver</h2>
                                                    <p>Order your metallic labels in gold, rich gold or silver to add a premium finish to your label application. Each can be ordered in a variety of shapes, styles and sizes, including standard and <a href="https://www.aalabels.com/a4-sheets/irregular/" style="color: #006da4; text-decoration: underline;">irregular shapes</a>, as <a href="https://www.aalabels.com/a4-sheets/anti-tamper/" style="color: #006da4; text-decoration: underline;">anti-tamper labels</a> or perforated.</p>
                                                    <p>Search our range of metallic labels today.</p>';
                                                $seoFlag = true;

                                            } else if( isset($info) && count($info) > 0 && $info['short_name'] == 'Fluorescent Green Paper' && $type == "A4"  ) {
                                                $main_heading = "Fluorescent Labels to Make Your Products Stand Out";
                                                $content_main = '
                                                    <p>Fluorescent labels are perfect for all your high visibility labelling needs. Our comprehensive range includes fluorescent labels in a variety of colours. Available on standard paper with flood coated fluorescent colouring, these sheets are finished with an acrylic-based pressure sensitive adhesive that is suitable for use on a variety of surfaces.</p>
                                                    <p>Choose fluorescent labels to make your products stand out to customers or for health and safety purposes. Our customers use the vivid colours of fluorescent labels to distinguish between products and product groups and to highlight important information or instructions. Common applications for these eye-catching labels include file labels, inventory labels, pallet labels and racking labels, as well as packaging and hazard warning labels.</p>
                                                    <p>These sheets are suitable for use with laser printers and our fluorescent labels are supplied to you on dry edge sheets, which are designed to reduce adhesive transfer to printers and reduce problem printing thanks to a 1mm dry border. Alternatively, we can print your labels with your chosen design prior to shipping.</p>
                                                    
                                                    <h2 style="font-size:16px;font-weight:bold;margin:0 0 2px 0;color:#006da4;">Fluorescent Labels in Various Colours</h2>
                                                    <p>Order your fluorescent labels in green, orange, yellow, pink or red to add a highly visible finish to your label application. Each can be ordered in a variety of shapes, styles and sizes, including standard and <a href="https://www.aalabels.com/a4-sheets/irregular/" style="color: #006da4; text-decoration: underline;">irregular shapes</a>, as <a href="https://www.aalabels.com/a4-sheets/anti-tamper/" style="color: #006da4; text-decoration: underline;">anti-tamper labels</a> or perforated.</p>
                                                    <p>We also provide templates for all label sizes to make the design and printing process easy or you can utilise our <a href="https://www.aalabels.com/custom-label-tool/" style="color: #006da4; text-decoration: underline;">label designer tool</a> to add that all-important professional finish to your labels.</p>
                                                    <p>View our range of fluorescent labels today.</p>';
                                                $seoFlag = true;
                                            } 

                                        if (preg_match("/rolls/i", $first_url)) {
                                            if(!$seoFlag) { $main_heading .= ' Labels on Rolls'; }
                                        } else {
                                            if(!$seoFlag) { $main_heading .= ' Labels on Sheets'; }
                                        }
                                        echo $main_heading; ?>

                                        <span class="short_name hide"> <?= $info['group_name'] ?> </span>
                                    </h1>

                                    <?php
                                    if($seoFlag)
                                    {?>
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
                                            .read_more_less_style
                                            {
                                                font-size: 13px;
                                                font-weight: bold; 
                                                cursor: pointer;
                                                display: inline-block;
                                                color: #006da4;
                                            }
                                            .showCompleteText
                                            {
                                                height: auto !important;
                                                overflow: none !important;
                                            }
                                            .showLessText
                                            {
                                                height: 140px !important;
                                                overflow: hidden !important;
                                            }
                                            #actionContainer p
                                            {
                                                line-height: 15px;
                                            }
                                        </style>
                                    <?php
                                    }
                                    ?>

                                    <div class="spec_bg" style="background-image:url('<?= $path ?>')">
                                            <div class="showLessText"  id="actionContainer">
                                                <?php
                                                if ($group_type == "sheets") {
                                                    $spec_col = "tooltip_info_spec_sheets";
                                                } else {
                                                    $spec_col = "tooltip_info_spec_rolls";
                                                }
                                                if ($info[$spec_col] != '') {
                                                    if(!$seoFlag) {
                                                        echo $info[$spec_col];
                                                    } else {
                                                        echo $content_main;
                                                    }
                                                } else {

                                                    echo $info['tooltip_info'];
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            if($seoFlag)
                                            {?>
                                                <p class="read_more_less_style read_more_less">Read More <i class="fa fa-angle-down"></i></p>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                    
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
                                </div>
                            <!-- AA51 ENDS -->
                                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs text-center why-seal"><img
                                            onerror='imgError(this);' class="img-responsive"
                                            src="<?= Assets ?>images/30-icon.png" alt="30 Days Moneyback Guarantee">
                                    <div class="title m-t-10"><a href="#" data-role="button" data-toggle="popover"
                                                                 data-trigger="hover" data-placement="top"
                                                                 data-html="true"
                                                                 data-content="<div class='col-lg-12 col-md-12 frc-banner'><div class='title'> FAST, RELIABLE &amp; COST EFFECTIVE </div><ul><li>Over 80% of orders despatched same day</li><li>Daily despatch and delivery</li><li>Add the “Next Day” option to your order</li><li>If you need labels quicker, add a PRE 10:30 or 12:00 option for even faster delivery.</li><li>1,000’s of satisfied customers.</li><li>  <img onerror='imgError(this);' src='<?= Assets ?>images/iso_14001.png'> ISO9001 Certified</li><li><img onerror='imgError(this);' src='<?= Assets ?>images/iso_9001.png'> ISO14001 Certified</li> </ul></div>">Why
                                            Buy from AA Labels? <i class="fa fa-question-circle"></i></a></div>

                                    <!--<div class="title"> FAST, RELIABLE &amp; COST EFFECTIVE </div>
                  <ul>
                    <li>Over 80% of orders despatched same day</li>
                    <li>Daily despatch and delivery</li>
                    <li>Add the “Next Day” option to your order</li>
                    <li>If you need labels quicker, add a PRE 10:30
                      or 12:00 option for even faster delivery.</li>
                    <li>1,000’s of satisfied customers.</li>
                  </ul>
                  <div class="col-xs-12 hidden-md text-center"> <img onerror='imgError(this);' src="<?= Assets ?>images/frc-sgs.png"> </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <? if ($this->agent->is_mobile()) { ?>
                                <div class="row sort-filters hidden-lg hidden-md hidden-sm">
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                                        <div class="row">
                                            <div class=" labels-form col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="select">
                                                    <select name="material_mat" id="material_mat"
                                                            onchange="fetch_category_mateials();">
                                                        <option value="" selected="selected">Sort by Materials</option>
                                                        <? foreach ($paper as $paper_list) { ?>
                                                            <option value="<?= $paper_list->Material ?>">
                                                                <?= $paper_list->Material ?>
                                                            </option>
                                                        <? } ?>
                                                    </select>
                                                    <i></i> </label>
                                            </div>
                                            <div class=" labels-form  col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="select">
                                                    <select name="color_mat" id="color_mat"
                                                            onchange="fetch_category_mateials();">
                                                        <option value="" selected="selected">Sort by Colour</option>
                                                        <? foreach ($color as $color_list) { ?>
                                                            <option value="<?= $color_list->Color ?>">
                                                                <?= $color_list->Color ?>
                                                            </option>
                                                        <? } ?>
                                                    </select>
                                                    <i></i> </label>
                                            </div>
                                            <div class="labels-form col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="select">
                                                    <select name="adhesive_mat" id="adhesive_mat"
                                                            onchange="fetch_category_mateials();">
                                                        <option value="" selected="selected">Sort by Adhesive</option>
                                                        <? foreach ($adhesive as $adhesive_list) { ?>
                                                            <option value="<?= $adhesive_list->Adhesive ?>">
                                                                <?= $adhesive_list->Adhesive ?>
                                                            </option>
                                                        <? } ?>
                                                    </select>
                                                    <i></i> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                        <div>
                                            <button onclick="window.location.reload();" class="btn btn-block orangeBg"
                                                    role="button"><i class="fa fa-refresh"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="panel panel-default no-border mat-may-2017 mat-sep-2017 mat-list-sep-2017 ">
                <div class="panel-body no-padding">
                    <div class="colors_data mat-ch"
                         id="<?= (isset($othermaterials) and $othermaterials != '') ? '' : 'ajax_material_sorting' ?>">
                        <? if (isset($othermaterials) and $othermaterials != '') {
                            $single_product = 'active';
                        }
                        include('material_list_view_a4.php'); ?>
                    </div>
                </div>
            </div>
            <? if (isset($othermaterials) and $othermaterials != ''){
            $single_product = '';
            $materials = $othermaterials; ?>

            <?php
            if ($type == "A4") {
                $button_class = "";
                $filter_class = "col-lg-11 col-md-11 col-sm-11 col-xs-12";
            } else {
                $button_class = "hide";
                $filter_class = "col-lg-11 col-md-11 col-sm-11 col-xs-11";
            }
            ?>
            <? // if(!$this->agent->is_mobile()){?>
            <div class="other_materials">
                <div class="sort-filters filterBg p-l-r-10">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="hide_title">Other Materials </h4>
                        </div>
                        <div class="col-md-9">
                            <div class="clear">
                                <? if ($this->agent->is_mobile()) { ?>
                                    <div class="row sort-filters">
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
                                            <div class="row new_filter">
                                                <div class="new_filter_dropdown">
                                                    <div class="labels-form col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <input name="material_mat" type="hidden" id="material_mat"
                                                               class="fetch_category_mateials" value=""/>
                                                        <input name="color_mat" type="hidden" id="color_mat"
                                                               class="fetch_category_mateials" value=""/>
                                                        <input name="adhesive_mat" type="hidden" id="adhesive_mat"
                                                               class="fetch_category_mateials" value=""/>
                                                        <div class="btn-group btn-block dm-selector material-d-down"><a
                                                                    class="btn btn-default btn-block dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="true">Sort By
                                                                Material <i class="fa fa-unsorted"></i></a>
                                                            <ul class="dropdown-menu btn-block" style="top: 100%;">
                                                                <li class=""><a data-value="reset" data-id="material">Sort
                                                                        By Material</a></li>
                                                                <? foreach ($paper as $paper_list) { ?>
                                                                    <li class=""><a data-id="material"
                                                                                    data-value="<?= $paper_list->Material ?>">
                                                                            <?= $paper_list->Material ?><small>
                                                                                (<?= $paper_list->count ?>)</small>
                                                                            <br/>
                                                                            <small>
                                                                                <?php if ($brand == "Rolls") {
                                                                                    echo $paper_list->SpecText7_rolls;
                                                                                } else {
                                                                                    echo $paper_list->SpecText7;
                                                                                }
                                                                                ?>
                                                                            </small> </a></li>
                                                                <? } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="labels-form col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="btn-group btn-block dm-selector color-d-down"><a
                                                                    class="btn btn-default btn-block dropdown-toggle disabled"
                                                                    data-toggle="dropdown" aria-expanded="true">Sort By
                                                                Colour <i class="fa fa-unsorted"></i></a>
                                                            <ul class="dropdown-menu btn-block" style="top: 100%;">
                                                                <li class=""><a data-value="reset" data-id="color">Sort
                                                                        By Colour</a></li>
                                                                <? foreach ($color as $color_list) { ?>
                                                                    <li class=""><a data-id="color"
                                                                                    data-value="<?= $color_list->Color ?>">
                                                                            <?= $color_list->Color ?>
                                                                            - <small>
                                                                                <?php if ($brand == "Rolls") {
                                                                                    echo $color_list->SpecText7_rolls;
                                                                                } else {
                                                                                    echo $color_list->SpecText7;
                                                                                }
                                                                                ?>
                                                                            </small> <br/>
                                                                            <small>
                                                                                <?= $color_list->adhesive ?>
                                                                            </small></a></li>
                                                                <? } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                            <div>
                                                <button onclick="window.location.reload();"
                                                        class="btn btn-block orangeBg" role="button"><i
                                                            class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                            <div class="row sort-filters hidden-xs hidden-sm">
                                <div class="<?= $filter_class ?>">
                                    <div class="row new_filter">
                                        <div class="new_filter_dropdown">
                                            <div class="labels-form col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <input name="material_mat" type="hidden" id="material_mat"
                                                       class="fetch_category_mateials" value=""/>
                                                <input name="color_mat" type="hidden" id="color_mat"
                                                       class="fetch_category_mateials" value=""/>
                                                <input name="adhesive_mat" type="hidden" id="adhesive_mat"
                                                       class="fetch_category_mateials" value=""/>
                                                <div class="btn-group btn-block dm-selector material-d-down"><a
                                                            class="btn btn-default btn-block dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="true">Sort By Material
                                                        <i class="fa fa-unsorted"></i></a>
                                                    <ul class="dropdown-menu btn-block" style="top: 100%;">
                                                        <li class=""><a data-value="reset" data-id="material">Sort By
                                                                Material</a></li>
                                                        <? foreach ($paper as $paper_list) { ?>
                                                            <li class=""><a data-id="material"
                                                                            data-value="<?= $paper_list->Material ?>">
                                                                    <?= $paper_list->Material ?><small>
                                                                        (<?= $paper_list->count ?>)</small> <br/>
                                                                    <small>
                                                                        <?php if ($brand == "Rolls") {
                                                                            echo $paper_list->SpecText7_rolls;
                                                                        } else {
                                                                            echo $paper_list->SpecText7;
                                                                        }
                                                                        ?>
                                                                    </small> </a></li>
                                                        <? } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="labels-form col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="btn-group btn-block dm-selector color-d-down"><a
                                                            class="btn btn-default btn-block dropdown-toggle disabled"
                                                            data-toggle="dropdown" aria-expanded="true">Sort By Colour
                                                        <i class="fa fa-unsorted"></i></a>
                                                    <ul class="dropdown-menu btn-block" style="top: 100%;">
                                                        <li class=""><a data-value="reset" data-id="color">Sort By
                                                                Colour</a></li>
                                                        <? foreach ($color as $color_list) { ?>
                                                            <li class=""><a data-id="color"
                                                                            data-value="<?= $color_list->Color ?>">
                                                                    <?= $color_list->Color ?>
                                                                    - <small>
                                                                        <?php if ($brand == "Rolls") {
                                                                            echo $color_list->SpecText7_rolls;
                                                                        } else {
                                                                            echo $color_list->SpecText7;
                                                                        }
                                                                        ?>
                                                                    </small> <br/>
                                                                    <small>
                                                                        <?= $color_list->adhesive ?>
                                                                    </small></a></li>
                                                        <? } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                    <div>
                                        <button onclick="window.location.reload();" class="btn btn-block orangeBg"
                                                role="button"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <? //}?>
                <div class="clear"></div>
                <div class="panel panel-default no-border mat-may-2017 mat-sep-2017 mat-list-sep-2017 fetch_category_mateials">
                    <div class="panel-body no-padding">
                        <div class="mat-ch">
                            <div class="colors_data mat-ch append_search"
                                 id="<?= (isset($othermaterials) and $othermaterials != '') ? 'ajax_material_sorting' : '' ?>">
                                <?
                                $productid = '';
                                include('material_list_view_a4.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <? } ?>
                <div class="clear"></div>
                <div class="panel panel-default no-border mat-may-2017 mat-list-sep-2017 other_mats"
                     style="display:none">
                    <div class="panel-body no-padding">
                        <div class="mat-ch">
                            <h3 class="mat-ch-title">Other Materials</h3>
                            <div class="colors_data mat-ch append_search"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <div id="ajax_layout_spec" class="">
                        <? include_once('layout_popup.php') ?>
                    </div>
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
                                                                                        style="width:139px; height:29px; "
                                                                                        alt="AA Labels Loader"></div>
                </div>
                <? include('applications.php'); ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Material Detail modal -->
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
        var mat_code = $(_this).find("img").attr("src");
        if (typeof mat_code == "undefined") {
            mat_code = '';
        }
        if (mat_code.match(/CSC/)) {
            colour = "Luxury White";
            finish = "Matt White";
            material = "Paper";
        }

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

    /*
    $(document).on("click", ".technical_specs_header", function(e) {
        var id =  $(this).attr('id');
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
                              },500);
                         }
                      }
                });

    }); */

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
            data: {'groupname': groupname, type: '<?=$group_type?>'},
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
        var type = '<?=$brand?>';
        var top = $('#material_mat').offset().top;
        top = top + 100;
        $('.loading-gif').css('top', top);
        $('#aa_loader').show();
        $.ajax({
            url: base + 'ajax/get_category_materials_newfilter/',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {material: material, adhesive: adhesive, color: color, catid: catid},
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    /*$('#material_mat').html(data.material);
                    $('#adhesive_mat').html(data.adhesive);
                    $('#color_mat').html(data.color);*/

                    //$('.new_filter .material-d-down').find('.dropdown-menu').html(data.material);
                    $('.new_filter .color-d-down').find('.dropdown-menu').html(data.color);

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
                            var _this = sort - filters
                            this;
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

    $(document).on("click", ".new_filter .dm-selector .dropdown-menu a", function (e) {
        var value = $(this).data('value');
        var type = $(this).data('id');
        var unsorted = "<i class='fa fa-unsorted'></i>"
        var input_value = "";
        if (value == "reset" || value == "resetall") {
            $(this).parents(".new_filter").find(".color-d-down").find(".dropdown-toggle").addClass("disabled");
            if (type == "material") {
                value = "Sort By Material";
            } else {
                value = "Sort By Colour";
            }

            $(this).parents(".new_filter").find(".material-d-down").find(".dropdown-toggle").html("Sort By Material" + unsorted);
            $(this).parents(".new_filter").find(".color-d-down").find(".dropdown-toggle").html("Sort By Colour" + unsorted);

            $(this).parents(".new_filter").find("#material_mat").val(input_value);
            $(this).parents(".new_filter").find("#color_mat").val(input_value);

        } else {
            $(this).parents(".new_filter").find("." + type + "-d-down").find(".dropdown-toggle").html(value + unsorted);
            $(this).parents(".new_filter").find("#" + type + "_mat").val(value);
            $(this).parents(".new_filter").find(".color-d-down").find(".dropdown-toggle").removeClass("disabled");
        }
        if (type == "material") {
            $(this).parents(".new_filter").find(".color-d-down").find(".dropdown-toggle").html("Sort By Colour" + unsorted);
            $(this).parents(".new_filter").find("#color_mat").val('');
        }
        fetch_category_mateials();
    });

</script> 
