<link href="<?= Assets ?>css/mat-sep-2017.css" rel="stylesheet">
<link href="<?= Assets ?>labelfinder/css/filters.css" rel="stylesheet">
<link href="<?= Assets ?>labelfinder/css/blue.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/icheck.js"></script>
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<script src="<?= Assets ?>labelfinder/js/labelfinder.js?ver=<?= time() ?>"></script>
<style>
    .giveMeEllipsis {
        /* overflow: hidden !important;
   text-overflow: ellipsis !important;
   height: 40px;*/
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 3.6em;
        line-height: 1.8em;
    }

    .discount_price {
        color: black;
        font-size: 16px;
        text-decoration: line-through;
    }

    .ovFl thead {
        background: #17b1e3 none repeat scroll 0 0;
        color: white;
    }

    .productdetails .phead {
        font-size: 12px;
        line-height: normal;
    }

    .dm-box .dm-selector .dropdown-menu a img {
        background: #fff none repeat scroll 0 0;
        border: 1px solid #e5e5e5;
        border-radius: 4px;
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.176);
        padding: 5px;
        display: none;
        position: absolute;
        left: -120px;
        top: -6px;
        width: 119px !important;
    }

    .dm-box .dm-selector .dropdown-menu a:hover img {
        display: block;
    }

    .dm-box .dm-selector .dropdown-menu .insideorientation {
        display: none;
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

    dm-selector .tooltip.right .tooltip-arrow {
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
        font-style: italic;
    }

    .dm-selector.tooltip.in {
        opacity: 1;
    }

    .productdetails .input-group .form-control {
        height: 38px !important;
    }

    .sweet-alert {
        box-shadow: 0 0 20px;
    }

    select option:disabled {
        background: #dedede;
    }

    .mat-may-2017 section article.mat-detail .specs a.technical_specs {
        top: 0px;
    }

    .mat-may-2017 section article.mat-tabs .note.sample {
        color: #fd4913 !important;
    }

    .mat-may-2017 section .roll-products article.mat-detail .specs img.product_material_image {
        margin-top: 8px;
    }

    .mat-may-2017 section .roll-products article.mat-tabs small.sample {
        color: #333;
        font-size: 11px;
    }

    .mat-may-2017 section .roll-products article.mat-tabs .ofq {
        margin-top: 150px;
    }

    .table {
        font-family: "Open Sans", Helvetica, Arial, sans-serif;
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
</style>
<div id="aa_loader" class="white-screen hidden-xs" style="display:none;">
    <div class="loading-gif text-center" style="top:92%;"><img onerror='imgError(this);'
                                                               src="<?= Assets ?>images/loader.gif" class="image"
                                                               style="width:160px; height:43px; "
                                                               alt="AA Labels Loader"></div>
</div>
<div class="">
    <div class="container m-t-b-8">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8">
                <ol class="breadcrumb  m0">
                    <?= $this->home_model->genrate_breadcrumb('material'); ?>
                    <li class="active">
                        <?= $details['CategoryName'] ?>
                    </li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="pull-right"><a role="button" target="_blank" class="btn orangeBg"
                                           href="<?= base_url() ?>virtual-catalogue/"><i class="fa fa-desktop"></i>
                        Virtual Catalogue</a></div>
            </div>
        </div>
    </div>
</div>
<?
$newname = explode("(", $details['CategoryName']);
$showname = explode("-", $newname[0]);
$name = substr($showname[0], 2);

$catname = $name;
$image = explode('.', $details['CategoryImage']);
$img_chgr = $image[0];
$imagename = $image[0] . $coreid . ".jpg";
$material_code = "WTP";
$diecode = $image[0] . $material_code . preg_replace("/[^0-9]/", "", $coreid) . ".jpg";
$wound_option = $this->session->userdata('wound');
$wound_cate = $this->session->userdata('wound-cat');

$inside = '';

if (isset($wound_option) and $wound_option == 'Inside' and strcasecmp($subcat, $wound_cate) == 0) {
    $inside = 'selected="selected"';
}

if (isset($wound_option) and $wound_option == 'Inside' and strcasecmp($subcat, $wound_cate) == 0) {
    $img_src = Assets . "images/categoryimages/RollLabels/inside/" . $diecode;
    if (!getimagesize($img_src)) {
        $img_src = Assets . "images/categoryimages/inner_roll/" . $imagename;
    }
} else {
    $img_src = Assets . "images/categoryimages/RollLabels/outside/" . $diecode;
    if (!getimagesize($img_src)) {
        $img_src = Assets . "images/categoryimages/roll_desc/" . $imagename;
    }
}

if ($details['Shape_upd'] == "Circular") {
    $Label_size = str_replace("Label Size:", "", $details['specification3']);
} else {
    $Label_size = " Width " . $details['LabelWidth'] . "&nbsp;&nbsp; x &nbsp;Height&nbsp; " . $details['LabelHeight'];
}
//$Label_size = preg_replace("/Label Size:/","",$details['specification3']);
$height = 'auto';
$pop_width = 'auto';

if ($details['Shape_upd'] == "Oval" || $details['Shape_upd'] == "oval") {
    $LabelCorner = "N/A";
} else {
    $LabelCorner = $details['LabelCorner'];
}

//$img_src = Assets."images/outside_25.jpg";
$productid = $this->home_model->get_db_column('products', 'ProductID', 'CategoryID', $details['CategoryID'] . "R1");
?>
<div class="bgGray">
    <div class="container">
        <?php $category = "Roll";
        $shape = "";
        include_once(APPPATH . '/views/labelfinder/label_filters.php') ?>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc"></div>
    </div>
    <div id="ajax_labelfilter" class="container">
        <div class="container mat-sep-2017">
            <div class="selected-product">
                <div class="row">
                    <div id="prod_img" class="col-lg-2 col-md-2 col-sm-3 col-xs-3 pr-thumb"><img
                                onerror='imgError(this);' id="wound_image" src="<?= $img_src ?>"/></div>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                        <div class="row flexcontainer">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <h2 class="pr-title">
                                    <?= $details['CategoryName'] ?>
                                </h2>
                                <div class="pr-detail">
                                    <p><b>Product Code: <span class="pr-code">
                    <input type="hidden" id="material_code" value="<?= $material_code ?>"/>
                    <?= ltrim($details['DieCode'], "1-") ?>
                    </span></b></p>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <p><b>Label Shape:</b>
                                                <?= $details['Shape_upd'] ?>
                                            </p>
                                            <p><b>Leading Edge:</b>
                                                <?= $details['LeadingEdge'] ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                                            <p><b>Label Size:</b>
                                                <?= $Label_size ?>
                                            </p>
                                            <p><b>Corner Radius:</b>
                                                <?= $LabelCorner ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row cw-filters">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 labels-form">
                                        <p><strong>Core Size </strong></p>
                                        <label class="select">
                                            <select id="coresize" name="coresize">
                                                <?= $rollcores ?>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 labels-form">
                                        <p><strong>Wound options </strong></p>
                                        <label class="select">
                                            <select id="woundoption" name="wound">
                                                <option value="Outside"> Outside Wound</option>
                                                <option <?= $inside ?> value="Inside"> Inside Wound</option>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 labels-form"></div>
                                </div>
                                <? if ($filter != 'disabled' and !$this->agent->is_mobile()) { ?>
                                    <div class="row sort-filters hidden-xs">
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                            <div class="row">
                                                <div class=" labels-form col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="select">
                                                        <select name="material" id="material_mat"
                                                                onchange="fetch_category_mateials();">
                                                            <option value="" selected="selected">Sort by Materials
                                                            </option>
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
                                                        <select name="color" id="color_mat"
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
                                                <div class=" labels-form col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="select">
                                                        <select name="adhesive" id="adhesive_mat"
                                                                onchange="fetch_category_mateials();">
                                                            <option value="" selected="selected">Sort by Adhesive
                                                            </option>
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
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <div>
                                                <button onclick="window.location.reload();"
                                                        class="btn btn-block orangeBg" role="button"><i
                                                            class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                            <?php
                            $max_diameter = 0;
                            $printer_compatiblity = '';
                            $Labelsgap = $details['LabelGapAcross'];
                            $height = $details['Height'];

                            $model = $this->input->get('printer');
                            if (isset($model) and $model != '') {
                                $query = $this->db->query("SELECT * FROM `printers_model` WHERE model LIKE '" . urldecode($model) . "' LIMIT 1 ");
                                $printer_model = $query->row_array();
                                $max_length = 250;
                                if (strlen($printer_model['specfication']) > $max_length) {
                                    $offset = ($max_length - 3) - strlen($printer_model['specfication']);
                                    $printer_model['specfication'] = substr($printer_model['specfication'], 0, strrpos($printer_model['specfication'], ' ', $offset)) . '...';
                                }
                                if (getimagesize(Assets . 'images/printer/model/' . $printer_model['image']) !== false) {
                                    $src = Assets . 'images/printer/model/' . $printer_model['image'];
                                } else {
                                    $src = Assets . 'images/no-image.png';
                                }

                                $max_diameter = $printer_model['RollDiamter'];
                                $printer_model['method'] = str_replace("/", "<br>", $printer_model['method']);
                                ?>
                                <div class="col-lg-4 col-md-4 hidden-sm hidden-xs printer-comp-detail">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4"><img onerror='imgError(this);'
                                                                                     class="img-responsive"
                                                                                     alt="labels Image "
                                                                                     src="<?= $src ?>" height="155"
                                                                                     width="185"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-8">
                                            <h2 class="BlueHeading no-margin">
                                                <?= $printer_model['Name'] ?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="clear5"></div>
                                    <p><b>Maximum Print Size:</b>
                                        <?= $printer_model['PrintWidth'] ?>
                                        mm </p>
                                    <p><b>Maximum Roll Diameter:</b>
                                        <?= $printer_model['RollDiamter'] ?>
                                        mm </p>
                                    <p><b>Core Size: </b>
                                        <?= $printer_model['coresize'] ?>
                                        mm </p>
                                    <p><b>Compatibility:</b>
                                        <?= $printer_model['method'] ?>
                                    </p>
                                    <div class="btns"><a rel="nofollow" target="_blank"
                                                         href="<?= base_url() ?>download/usermanuals/<?= $printer_model['pdf'] ?>"
                                                         class="btn btn-sm orangeBg pull-left" role="button"><i
                                                    class="fa fa-file-pdf-o"></i> User Manuals </a> <a rel="nofollow"
                                                                                                       target="_blank"
                                                                                                       href="<?= base_url() ?>download/printer/<?= $printer_model['pdf'] ?>"
                                                                                                       class="btn btn-sm orangeBg pull-right"
                                                                                                       role="button"> <i
                                                    class="fa fa-file-pdf-o"></i> Product Datasheet </a></div>
                                </div>
                                <? $printer_compatiblity = $printer_model['method'];
                            } else { ?>
                                <input type="hidden" id="max_diameter" value="0"/>
                                <div class="col-lg-4 col-md-4 hidden-sm hidden-xs text-center why-seal"><img
                                            onerror='imgError(this);' class="img-responsive"
                                            src="<?= Assets ?>images/30-icon.png" alt="30 Days Moneyback Guarantee">
                                    <div class="title m-t-10"><a href="javascript:void(0);" data-toggle="popover"
                                                                 data-trigger="hover" data-placement="top"
                                                                 data-html="true"
                                                                 data-content="<div class='col-lg-12 col-md-12 frc-banner'><div class='title'> FAST, RELIABLE &amp; COST EFFECTIVE </div><ul><li>Over 80% of orders despatched same day</li><li>Daily despatch and delivery</li><li>Add the “Next Day” option to your order</li><li>If you need labels quicker, add a PRE 10:30 or 12:00 option for even faster delivery.</li><li>1,000’s of satisfied customers.</li><li>  <img onerror='imgError(this);' src='<?= Assets ?>images/iso_14001.png'> ISO9001 Certified</li><li><img onerror='imgError(this);' src='<?= Assets ?>images/iso_9001.png'> ISO14001 Certified</li> </ul></div>">Why
                                            Buy from AA Labels? <i class="fa fa-info-circle"></i></a></div>
                                </div>
                            <? } ?>
                            <input type="hidden" name="coreid" id="coreid" value="<?= $coreid ?>"/>
                        </div>
                    </div>
                    <? if ($filter != 'disabled' and $this->agent->is_mobile()) { ?>
                        <div class="col-xs-12">
                            <div class="row sort-filters hidden-lg hidden-md hidden-sm">
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                                    <div class="row">
                                        <div class=" labels-form col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <label class="select">
                                                <select name="material" id="material_mat"
                                                        onchange="fetch_category_mateials();">
                                                    <option value="" selected="selected">Sort by Materials</option>
                                                </select>
                                                <i></i> </label>
                                        </div>
                                        <div class=" labels-form  col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <label class="select">
                                                <select name="color" id="color_mat"
                                                        onchange="fetch_category_mateials();">
                                                    <option value="" selected="selected">Sort by Colour</option>
                                                </select>
                                                <i></i> </label>
                                        </div>
                                        <div class=" labels-form col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <label class="select">
                                                <select name="adhesive" id="adhesive_mat"
                                                        onchange="fetch_category_mateials();">
                                                    <option value="" selected="selected">Sort by Adhesive</option>
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
                        </div>
                    <? } ?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="panel panel-default no-border mat-may-2017">
                <div class="panel-body no-padding">
                    <div class="colors_data mat-ch"
                         id="<?= (isset($othermaterials) and $othermaterials != '') ? '' : 'ajax_material_sorting' ?>">
                        <? if (isset($othermaterials) and $othermaterials != '') {
                            $single_product = 'active';
                        }
                        include('material_list_view_roll.php'); ?>
                    </div>
                </div>
            </div>
            <? if (isset($othermaterials) and $othermaterials != '') {
                $single_product = '';
                $productid = '';
                $materials = $othermaterials; ?>
                <div class="clear"></div>
                <div class="panel panel-default no-border mat-may-2017">
                    <div class="panel-body no-padding">
                        <div class="mat-ch">
                            <h3 class="mat-ch-title">Other Materials</h3>
                            <div class="colors_data mat-ch"
                                 id="<?= (isset($othermaterials) and $othermaterials != '') ? 'ajax_material_sorting' : '' ?>">
                                <? include('material_list_view_roll.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
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
                    <div id="ajax_layout_spec"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Layout modal -->

<!-- Material Detail modal -->
<div class="modal fade material" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                                           alt="<?= $catname ?>" title="<?= $catname ?>" width="46"
                                                           height="46" class="m-t-b-10 img-Sheet-material"></div>
                    <div class="col-md-9">
                        <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" width="181"
                                        height="181" class="image" style="width:181px; height:181px; "></div>
                        </div>
                        <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>
                        <div class="bgGray p-l-r-10"><small> This summary materials specification for this adhesive
                                label is based on information obtained from the original material manufacturer and is
                                offered in good faith in accordance with AA Labels terms and conditions to determine
                                fitness for use as labels on rolls produced by AA Labels. No guarantee is offered or
                                implied. It is the user's responsibility to fully asses and/or test the label's material
                                and determine its suitability for the label application intended. Measurements and test
                                results on this label's material are nominal. In accordance with a policy of continuous
                                improvement for label products the manufacturer and AA Labels reserves the right to
                                amend the specification without notice. A <a href="<?= base_url() ?>labels-materials/">full
                                    material specification</a> can be found in the Label Materials section accessed via
                                the Home Page <br>
                                Copyright AA labels 2015</small></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Material Detail modal -->

<div class="modal fade deactive_product" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">Sorry this product is discontinued. <a href="#myModalLabel"
                                                                                                 class="anchorjs-link"><span
                                class="anchorjs-icon"></span></a></h4>
            </div>
            <div class="col-md-12">
                <p></p>
                <p>We have discontinued this product due to supply issues. We are sure we will have an alternative
                    product that could be suitable for your application. </p>
                <p>Please call our customer care team on 01733 588390 or choose from over 40 different materials. <a
                            id="alter_link" href="#">Click Here</a></p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Sample Order implementation -->
<div class="modal fade pbreaks aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content no-padding">
            <div class="panel no-margin">
                <div class="panel-heading">
                    <h3 class="pull-left no-margin"><b>VOLUME PRICE BREAKS ROLL LABELS</b> <a href="#myModalLabel"
                                                                                              class="anchorjs-link"><span
                                    class="anchorjs-icon"></span></a></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <div id="price_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" width="181"
                                        height="181" class="image" style="width:181px; height:181px; "></div>
                        </div>
                        <div id="ajax_price_breaks"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade artworkModal1 aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content no-padding">
            <div class="panel no-margin">
                <div class="panel-heading">
                    <h3 class="pull-left no-margin"><b>Upload Artwork</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div id="artworks_uploads_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image"
                                        style="width:139px; height:29px; "></div>
                        </div>
                        <div id="ajax_artwork_uploads" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                                                                        style="width:139px; height:29px; ">
                    </div>
                </div>
                <? include('applications.php'); ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Sample Order implementation -->

<script>

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


    $(document).on("click", ".browse_btn", function (e) {
        $(this).parents('.upload_row').find('.artwork_file').click();
    });
    $(document).on("change", ".artwork_file", function (e) {
        readURL(this);
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (ext == 'docx' || ext == 'doc') {
                $('#preview_po_img').attr('src', '<?=Assets?>images/doc.png');
                $('#preview_po_img').show();
                $('.browse_btn').hide();
            } else if (ext == 'pdf') {
                $('#preview_po_img').attr('src', '<?=Assets?>images/pdf.png');
                $('#preview_po_img').show();
                $('.browse_btn').hide();
            } else if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_po_img').attr('src', e.target.result);
                    $('#preview_po_img').show();
                    $('.browse_btn').hide();
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#preview_po_img').attr('src', '<?=Assets?>images/no-image.png');
                $('#preview_po_img').show();
                $('.browse_btn').hide();
            }
        }
    }

    $(document).on("click", "#preview_po_img", function (e) {

        swal({
                title: 'Are you sure you want to delete this file?',
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn orangeBg",
                confirmButtonText: "No",
                cancelButtonClass: "btn blueBg m-r-10",
                cancelButtonText: "Yes",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    console.log('cancel');
                } else {
                    $('.browse_btn').show();
                    $('#preview_po_img').hide();
                }
            });

    });


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
    $(document).on("focus", ".roll_labels_input", function (e) {
        old_roll_labels_input = $(this).val();
    });
    $(document).on("focus", ".input_rolls", function (e) {
        old_roll_input = $(this).val();
    });

    $(document).on("keypress keyup blur", ".roll_labels_input", function (e) {
        var rolls = $(this).parents('.upload_row').find('.input_rolls').val();
        if ($(this).val() != old_roll_labels_input && rolls.length > 0) {
            $(this).parents('.upload_row').find('.roll_updater').show();
            $(this).parents('.upload_row').find('.quantity_updater').show();
        }
    });
    $(document).on("keypress keyup blur", ".input_rolls", function (e) {


        var labels = $(this).parents('.upload_row').find('.roll_labels_input').val();
        if ($(this).val() != old_roll_input && labels.length > 0) {
            $(this).parents('.upload_row').find('.roll_updater').show();
            $(this).parents('.upload_row').find('.quantity_updater').show();
        }
    });


    $(document).on("click", ".add_another_art", function (e) {
        $('.upload_row').show();
        $(this).hide();
        $('#add_another_line').hide();

    });
    $(document).on("click", ".delete_artwork_file", function (event) {
        var id = $(this).attr('id');
        var cartid = $('#cartid').val();
        var productid = $('#cartproductid').val();
        var persheet = $('#labels_p_sheet').val();
        var type = 'rolls';
        var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
        var presproof = $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-presproof');

        swal({
                title: "Are you sure you want to delete this line",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn orangeBg",
                confirmButtonText: "Yes",
                cancelButtonClass: "btn blueBg m-r-10",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: base + 'ajax/delete_material_artworks',
                        type: "POST",
                        async: "false",
                        dataType: "html",
                        data: {
                            fileid: id,
                            cartid: cartid,
                            productid: productid,
                            persheet: persheet,
                            type: type,
                            gap: '<?=$Labelsgap?>',
                            size: '<?=$height?>',
                            presproof: presproof,
                        },
                        success: function (data) {
                            data = $.parseJSON(data);
                            if (!data == '') {
                                update_printed_quantity_box(data.qty, data.designs, data.rolls);
                                $('#ajax_upload_content').html(data.content);
                                intialize_progressbar();
                            }
                        }
                    });
                }
            })
    });


    var parent_selector = null;

    $(document).on("click", ".artwork_uploader", function (e) {
        var cart_id = $(this).parents('.productdetails').find('.cart_id').val();
        var product_id = $(this).parents('.productdetails').find('.product_id').val();
        var manfactureid = $(this).parents('.productdetails').find('.manfactureid').val();
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var _this = this;
        parent_selector = this;
        var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
        var presproof = $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-presproof');

        $('#ajax_artwork_uploads').html('');
        $('#artworks_uploads_loader').show();
        $.ajax({
            url: base + 'ajax/view_artworks_content',
            type: "POST",
            async: "false",
            data: {
                manfactureid: manfactureid,
                product_id: product_id,
                type: 'rolls',
                labelspersheet: labels,
                cart_id: cart_id,
                gap: '<?=$Labelsgap?>',
                size: '<?=$height?>',
                presproof: presproof,
            },
            dataType: "html",
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    update_printed_quantity_box(data.qty, data.designs, data.rolls);
                    $('#artworks_uploads_loader').hide();
                    $('#ajax_artwork_uploads').html(data.html);
                    intialize_progressbar();
                    if (cart_id.length == 0 || cart_id == '') {
                        $(_this).parents('.productdetails').find('.cart_id').val(data.cartid);
                    }

                }
            }
        });
    });

    $(document).on("click", ".save_artwork_file", function (e) {
        var _this = this;
        var cartid = $('#cartid').val();
        var prdid = $('#cartproductid').val();
        var labelpersheets = $('#labels_p_sheet').val();
        var type = 'rolls';

        var artworkname = $(_this).parents('.upload_row').find('.artwork_name').val();
        var file = $(_this).parents('.upload_row').find('.artwork_file').val();
        var uploadfile = $(_this).parents('.upload_row').find('.artwork_file')[0].files[0];
        var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
        var presproof = $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-presproof');

        var response = '';

        response = verify_labels_or_rolls_qty(_this);
        if (response == false) {
            return false;
        }
        var labels = $(_this).parents('.upload_row').find('.roll_labels_input').val();
        var sheets = $(_this).parents('.upload_row').find('.input_rolls').val();
        var lb_txt = 'labels';

        if (file.length == 0) {
            alert_box("Please upload a file before saving. ");
        } else if (labels == 0 || labels == '') {
            alert_box("Please complete line ");
        } else if (artworkname.length == 0) {
            alert_box("please enter artwork name! ");
        } else {

            var uploadfile = $(this).parents('.upload_row').find('.artwork_file')[0].files[0];

            var form_data = new FormData();
            form_data.append("file", uploadfile)
            form_data.append("cartid", cartid);
            form_data.append("productid", prdid);
            form_data.append("labels", labels);
            form_data.append("sheets", sheets);
            form_data.append("artworkname", artworkname);
            form_data.append("persheet", labelpersheets);
            form_data.append("type", type);
            form_data.append("size", '<?=$height?>');
            form_data.append("gap", '<?=$Labelsgap?>');
            form_data.append("presproof", presproof);


            type = uploadfile.type;

            if (type != 'image/png' && type != 'image/jpg' && type != 'image/gif' && type != 'image/jpeg' && type != 'application/pdf' && type != 'application/postscript') {
                swal("Not Allowed", "We apologise, because this file type cannot be uploaded. \n\n Please retry using one of the following file formats: EPS; GIF; JPEG; JPG; PDF & PNG", "warning");
                return false;
            } else {
                upload_printing_artworks(form_data);
            }
        }
    });


    $(document).on("click", ".roll_updater", function (event) {

        var id = $(this).attr('data-id');
        var _this = this;
        var cartid = $('#cartid').val();
        var prdid = $('#cartproductid').val();
        var labelpersheets = $('#labels_p_sheet').val();
        var type = 'rolls';


        var response = verify_labels_or_rolls_qty(_this);
        if (response == false) {
            return false;
        }
        var labels = $(_this).parents('.upload_row').find('.roll_labels_input').val();
        var sheets = $(_this).parents('.upload_row').find('.input_rolls').val();
        var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
        var presproof = $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-presproof');

        $.ajax({
            url: base + 'ajax/update_material_artworks',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                id: id,
                cartid: cartid,
                productid: prdid,
                labels: labels,
                sheets: sheets,
                persheet: labelpersheets,
                type: type,
                size: '<?=$height?>',
                gap: '<?=$Labelsgap?>',
                presproof: presproof,
            },
            success: function (data) {
                data = $.parseJSON(data);
                if (!data == '') {
                    update_printed_quantity_box(data.qty, data.designs, data.rolls);
                    $('#ajax_upload_content').html(data.content);
                    intialize_progressbar();
                }
            }
        });

    });

    function upload_printing_artworks(form_data) {

        $.ajax({
            url: base + 'ajax/upload_material_artworks',
            type: "POST",
            async: "false",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            beforeSend: function () {
                $("#upload_pecentage").html(' &nbsp;0%');
                $("#upload_progress").show();
                $('.save_artwork_file').prop('disabled', true);
            },
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', progress, false);
                }
                return myXhr;
            },
            error: function (data) {
                swal('Some error occured please try again');
                intialize_progressbar();
                $("#upload_progress").hide();
                $('.save_artwork_file').prop('disabled', false);
            },
            success: function (data) {
                $('.save_artwork_file').prop('disabled', false);
                data = $.parseJSON(data);
                if (data.response == 'yes') {
                    $('#ajax_upload_content').html(data.content);

                    update_printed_quantity_box(data.qty, data.designs, data.rolls);

                    intialize_progressbar();
                    $("#upload_progress").hide();
                } else {
                    swal('upload failed', data.message, 'error');
                    intialize_progressbar();
                    $("#upload_progress").hide();
                    $('.save_artwork_file').prop('disabled', false);
                }
            }
        });
    }

    function update_printed_quantity_box(qty, designs, rolls) {
        var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
        $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).val(designs);
        $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-qty', qty);
        $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-rolls', rolls);
        var old_quantity = parseInt($(parent_selector).parents('.productdetails').find('.printlabels').val());
        if (qty > 0) {
            $(parent_selector).parents('.productdetails').find('.printlabels').val(qty);
            reset_print_input_buttons(parent_selector);
        }
        update_artwork_upload_btn(parent_selector, designs);

    }

    function update_artwork_upload_btn(_this, designs) {
        if (designs > 0) {
            var Artwork = 'Artwork';
            if (designs > 1) {
                var Artwork = 'Artworks';
            }
            $(_this).parents('.productdetails').find('.artwork_uploader').switchClass('art-btn', 'art-btn-l');
            var btnhtml = '<div class="row"><div class="col-xs-4"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>';
            btnhtml += '<div class="col-xs-8"><b>' + designs + ' ' + Artwork + ' Uploaded </b>';
            btnhtml += '<small>Click here to upload further<br>artworks, view or edit.</small></div></div>';
            $(_this).parents('.productdetails').find('.artwork_uploader').html(btnhtml);
        } else {
            $(_this).parents('.productdetails').find('.artwork_uploader').switchClass('art-btn-l', 'art-btn');
            var btnhtml = '<i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwrok';
            $(_this).parents('.productdetails').find('.artwork_uploader').html(btnhtml);
        }
    }

    $(document).on("click", "#pressproof", function (e) {
        var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
        if ($(this).is(':checked')) {
            $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-presproof', 1);
        } else {
            $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-presproof', 0);
        }
        reset_print_input_buttons(parent_selector);
    });

    function progress(e) {
        if (e.lengthComputable) {
            var max = e.total;
            var current = e.loaded;
            var Percentage = Math.ceil((current * 100) / max);
            $("#progressbar").progressbar("option", "value", Percentage);
            $("#upload_pecentage").html(' &nbsp;' + Percentage + '%');

            if (Percentage >= 100) {
                $("#progressbar").progressbar("option", "value", 100);
                $("#upload_pecentage").html(' &nbsp;100%');
            }
        }
    }

    function intialize_progressbar() {
        $("#progressbar").progressbar({
            value: 0,
            create: function (event, ui) {
                $(this).removeClass("ui-corner-all").addClass('progress').find(">:first-child").removeClass("ui-corner-left").addClass('progress-bar progress-bar-success');
            }
        });
    }


    function get_product_details(_this) {

        var productid = $(_this).parents('.productdetails').attr('data-value');
        var finish = $(_this).parents('.productdetails').attr('data-finish');
        var material = $(_this).parents('.productdetails').attr('data-material');
        //var colour = $(_this).parents('.productdetails').attr('data-colour');
        var colour = $(_this).parents('.productdetails').find('.colourpicker .active a').attr('data-value');
        var adhesive = $(_this).parents('.productdetails').find('.product_adhesive').val();

        if (adhesive == '' || adhesive == null) {
            return true;
        }

        reset_plain_input_buttons(_this);
        reset_print_input_buttons(_this);


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
                catid: '<?=$details['CategoryID'] . $coreid?>',
                type: 'Rolls',
                maxdiamter: '<?=$max_diameter?>',
                Labelsgap: '<?=$Labelsgap?>',
                height: '<?=$details['Width']?>',
                width: '<?=$details['Height']?>',
            },
            success: function (data) {
                $('#aa_loader').hide();
                if (data.response == 'notfound') {
                    alert_box('Sorry this product is out of stock this time.');
                } else {
                    $(_this).parents('.productdetails').find('.product_adhesive').html(data.adhesive_option);
                    $(_this).parents('.productdetails').find('.product_material_image').attr('src', data.image_path);
                    $(_this).parents('.productdetails').find('.product_name').html(data.product_name);
                    $(_this).parents('.productdetails').find('.product_description').html(data.product_description);

                    $(_this).parents('.productdetails').find('.product_id').val(data.product_id);
                    $(_this).parents('.productdetails').find('.manfactureid').val(data.manfactureid);

                    $(_this).parents('.productdetails').find('#minimum_quantities').val(data.minimum);
                    $(_this).parents('.productdetails').find('#maximum_quantities').val(data.maximum);
                    $(_this).parents('.productdetails').find('.PrintableProduct').val(data.Printable);
                    $(_this).parents('.productdetails').find('.minimum_printed_labels').val(data.minprintedlabels);
                    $(_this).parents('.productdetails').find('.maximum_printed_labels').val(data.max_labels);

                    $(_this).parents('.productdetails').find('.laser_printer_img').attr('src', data.laser_img);
                    $(_this).parents('.productdetails').find('.inkjet_printer_img').attr('src', data.inkjet_img);
                    $(_this).parents('.productdetails').find('.direct_printer_img').attr('src', data.d_thermal_img);
                    $(_this).parents('.productdetails').find('.thermal_printer_img').attr('src', data.thermal_img);

                    $(_this).parents('.productdetails').find('.laser_printer_div').attr('data-original-title', data.laser_text);
                    $(_this).parents('.productdetails').find('.inkjet_printer_div').attr('data-original-title', data.inkjet_text);
                    $(_this).parents('.productdetails').find('.thermal_printer_div').attr('data-original-title', data.thermal_text);
                    $(_this).parents('.productdetails').find('.direct_printer_div').attr('data-original-title', data.d_thermal_text);
                    //$(_this).parents('.productdetails').find("[data-toggle=tooltip-product]").tooltip('destroy');
                    //$(_this).parents('.productdetails').find("[data-toggle=tooltip-product]").tooltip();

                    var str_manfactureid = data.manfactureid;
                    var hidevalue = "6 Colour Digital Process + White";
                    $(_this).parents('.productdetails').find(".digital_proccess-d-down").find("li").show();
                    if (str_manfactureid.match(/PGCP/g) || str_manfactureid.match(/PGCR/g)) {
                        $(_this).parents('.productdetails').find(".digital_proccess-d-down").find("[data-value='" + hidevalue + "']").parent("li").siblings("li").hide();
                    }

                    /*$('#material_code').val(data.material_code);
					if(data.roll_image != '')
					{
						$('.selected-product').find('#wound_image').attr('src',data.roll_image);
					}
					*/


                    if (data.Printable == 'N') {
                        $(_this).parents('.productdetails').find('.printedoption').addClass('hide');
                        $(_this).parents('.productdetails').find('.tabprinted').removeClass('active');

                        $(_this).parents('.productdetails').find('.tabplain').removeClass('active');
                        $(_this).parents('.productdetails').find('.plainoption').removeClass('active');

                        $(_this).parents('.productdetails').find('.tabplain').addClass('active');
                        $(_this).parents('.productdetails').find('.plainoption').addClass('active');

                        $(_this).parents('.productdetails').find('.addprintingoption').addClass('hide');

                    } else {
                        $(_this).parents('.productdetails').find('.printedoption').removeClass('hide');
                        //$(_this).parents('.productdetails').find('.addprintingoption').removeClass('hide');
                    }


                    var exist = $(_this).parents('.productdetails').find('#uploadedartworks_' + data.product_id).length;
                    if (exist == 0) {
                        var _el = document.createElement('input');
                        _el.value = 0;
                        _el.type = 'hidden';
                        _el.id = 'uploadedartworks_' + data.product_id;
                        $(_this).parents('.productdetails').find('.hiddenfields').append(_el);
                        $(_this).parents('.productdetails').find('#uploadedartworks_' + data.product_id).attr('data-rolls', 0);
                        $(_this).parents('.productdetails').find('#uploadedartworks_' + data.product_id).attr('data-presproof', 0);
                    }
                    var designs = $(_this).parents('.productdetails').find('#uploadedartworks_' + data.product_id).val();
                    update_artwork_upload_btn(_this, parseInt(designs));
                }
            }
        });
    }


    $(document).on("focus", ".plainlabels,.plainrolls", function (e) {
        reset_plain_input_buttons(this);
    });
    $(document).on("focus", ".printlabels", function (e) {
        reset_print_input_buttons(this);
    });


    function reset_plain_input_buttons(_this) {
        $(_this).parents('.productdetails').find('.plainprice_box').hide();
        $(_this).parents('.productdetails').find('.add_plain').hide();
        $(_this).parents('.productdetails').find('.plain_save_txt').hide();
        $(_this).parents('.productdetails').find('.diamterinfo').hide();
        $(_this).parents('.productdetails').find('.calculate_plain').show();
    }

    function reset_print_input_buttons(_this) {
        $(_this).parents('.productdetails').find('.printedprice_box').hide();
        $(_this).parents('.productdetails').find('.add_printed').hide();
        $(_this).parents('.productdetails').find('.calculate_printed').show();
    }

    function is_numeric(mixed_var) {
        var whitespace =
            " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
        return (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -
            1)) && mixed_var !== '' && !isNaN(mixed_var);
    }

    $(document).on("click", ".printpriceoffer", function (e) {
        $(this).parents('.productdetails').find('.plainoption').removeClass('active');
        $(this).parents('.productdetails').find('.printedoption').addClass('active');
    });
    $(document).on("click", ".calculate_plain", function (e) {
        var Printable = $(this).parents('.productdetails').find('.PrintableProduct').val();
        var id = $(this).parents('.productdetails').find('.product_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var max_labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());

        var input_labels = $(this).parents('.productdetails').find('.plainlabels');
        var input_roll = $(this).parents('.productdetails').find('.plainrolls');

        var labels = parseInt(input_labels.val());
        var roll = parseInt(input_roll.val());
        var _this = this;
        if (!is_numeric(labels) || labels < 100) {
            input_labels.val(100);
            show_faded_popover(input_labels, 'Quantity has been amended for production as 100 labels.');
            return false;
        } else if (!is_numeric(labels) || labels > max_labels) {
            input_labels.val(max_labels);
            show_faded_popover(input_labels, 'Quantity has been amended for production as ' + max_labels + ' labels.');
            return false;
        } else if (!is_numeric(roll) || roll < min_qty) {
            input_roll.val(min_qty);
            show_faded_popover(input_roll, 'Quantity has been amended for production as ' + min_qty + ' rolls.');
            return false;
        } else if (!is_numeric(roll) || roll > max_qty) {
            input_roll.val(max_qty);
            show_faded_popover(input_roll, 'Quantity has been amended for production as ' + max_qty + ' rolls.');
            return false;
        } else if (roll % min_qty != 0) {
            if (roll % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(roll / min_qty) + 1);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                input_roll.val(multipyer);
            }
            show_faded_popover(input_roll, "Sorry! these labels are only available in sets of " + min_qty + " rolls. ");
            return false;
        } else {
            $.ajax({
                url: base + 'ajax/calculate_roll_price',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {
                    roll: roll,
                    menuid: menuid,
                    prd_id: id,
                    labels: labels,
                    max_labels: max_labels,
                    size: '<?=$height?>',
                    gap: '<?=$Labelsgap?>',
                    printprice: 'enabled'
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {

                            $(_this).parents('.productdetails').find('.diamterinfo').html('Roll Diameter <span>' + data.diameter + ' mm</span>').show();
                            $(_this).parents('.productdetails').find('.calculate_plain').hide();
                            $(_this).parents('.productdetails').find('.add_plain').show();
                            $(_this).parents('.productdetails').find('.plainprice_text').html(data.price);
                            $(_this).parents('.productdetails').find('.plainperlabels_text').html(data.labelprice);
                            $(_this).parents('.productdetails').find('.plainprice_box').show();
                            if (Printable == 'Y') {
                                $(_this).parents('.productdetails').find('.printing_offer_text').html(data.symbol + '' + data.printprice);
                                $(_this).parents('.productdetails').find('.addprintingoption').removeClass('hide');
                            }
                        }
                    }
                }
            });
        }
    });


    $(document).on("click", ".add_plain", function (e) {
        var prd_name = $(this).parents('.productdetails').find('.product_name').text();
        var id = $(this).parents('.productdetails').find('.product_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var max_labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());

        var input_labels = $(this).parents('.productdetails').find('.plainlabels');
        var input_roll = $(this).parents('.productdetails').find('.plainrolls');

        var labels = parseInt(input_labels.val());
        var roll = parseInt(input_roll.val());
        var _this = this;
        if (!is_numeric(labels) || labels < 100) {
            input_labels.val(100);
            show_faded_popover(input_labels, 'Quantity has been amended for production as 100 labels.');
            return false;
        } else if (!is_numeric(labels) || labels > max_labels) {
            input_labels.val(max_labels);
            show_faded_popover(input_labels, 'Quantity has been amended for production as ' + max_labels + ' labels.');
            return false;
        } else if (!is_numeric(roll) || roll < min_qty) {
            input_roll.val(min_qty);
            show_faded_popover(input_roll, 'Quantity has been amended for production as ' + min_qty + ' rolls.');
            return false;
        } else if (!is_numeric(roll) || roll > max_qty) {
            input_roll.val(max_qty);
            show_faded_popover(input_roll, 'Quantity has been amended for production as ' + max_qty + ' rolls.');
            return false;
        } else if (roll % min_qty != 0) {
            if (roll % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(roll / min_qty) + 1);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                input_roll.val(multipyer);
            }
            show_faded_popover(input_roll, "Sorry! these labels are only available in sets of " + min_qty + " rolls. ");
            return false;
        } else {
            $.ajax({
                url: base + 'ajax/add_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: roll, menuid: menuid, prd_id: id, labels: labels, type: 'Rolls'},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            fireRemarketingTag('Add to cart');
                            popup_messages(menuid + ' - ' + prd_name);
                            $('#cart').html(data.top_cart);

                        } else if (data.deactive == 'yes') {
                            $('#alter_link').attr('href', data.url);
                            $('.deactive_product').modal('show');
                        }
                    }
                }
            });
        }
    });


    $(document).on("click", ".calculate_printed", function (e) {

        var cart_id = $(this).parents('.productdetails').find('.cart_id').val();
        var id = $(this).parents('.productdetails').find('.product_id').val();
        var cart_id = $(this).parents('.productdetails').find('.cart_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var labelfinish = $(this).parents('.productdetails').find('.labelfinish').val();
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var printing = $(this).parents('.productdetails').find('.digitalprintoption').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var presproof = $(this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-presproof');

        var upload_qty = parseInt($(this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-qty'));
        var artworks = parseInt($(this).parents('.productdetails').find('#uploadedartworks_' + id).val());
        var minlabels = parseInt($(this).parents('.productdetails').find('.minimum_printed_labels').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_printed_labels').val());
        var min_qty = parseInt(min_qty * minlabels);

        var input_id = $(this).parents('.productdetails').find('.printlabels');
        var qty = input_id.val();
        var _this = this;

        if (!is_numeric(qty) || qty == '' || qty < min_qty) {
            input_id.val(min_qty);
            show_faded_popover(input_id, 'Quantity has been amended for production as ' + min_qty + ' labels.');
        } else if (qty > max_qty) {
            input_id.val(max_qty);
            show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' labels.');
        } else if (printing == '' || printing.length == 0) {
            swal({
                title: "Please Select",
                text: "Digital Print Process ",
                confirmButtonText: "Continue",
                type: "",
            });
        } else if (labelfinish == '' || labelfinish.length == 0) {
            swal({
                title: "Please Select",
                text: "Product Finish  ",
                confirmButtonText: "Continue",
                type: "",
            });
        } else {

            if (artworks > 0 && upload_qty != qty && upload_qty != 0) {
                $(this).parents('.productdetails').find('.artwork_uploader').click();
                alert_box("You have changed the quantity of labels please amend quantities against each uploaded artwork.");
                return false;
            }

            $.ajax({
                url: base + 'ajax/calculate_roll_price',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {
                    labels: qty,
                    menuid: menuid,
                    prd_id: id,
                    max_labels: labels,
                    labelfinish: labelfinish,
                    printing: printing,
                    size: '<?=$height?>',
                    gap: '<?=$Labelsgap?>',
                    presproof: presproof,
                    cart_id: cart_id,
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            //$(_this).parents('.productdetails').find('.diamterinfo').html('Roll Diameter <span>'+data.diameter+' mm</span>').show();


                            if (printing == 'Monochrome – Black Only') {
                                printing = 'Printed Black';
                            }
                            /*else if(printing == '6 Colour Digital Process + White'){
					printing = 'Printed FullColour + White';
				}*/
                            else {
                                printing = 'Printed FullColour';
                            }
                            $(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.phead').text(printing);
                            $(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.printtext').html('<b class="pr-sm">' + data.symbol + data.printprice + '</b>');

                            if (presproof == 1) {
                                $(_this).parents('.productdetails').find('.printedprice_box .price .pressproofprice').find('.pressprooftext').html('<b class="pr-sm">' + data.symbol + data.presproof_charges + '</b>');
                                $(_this).parents('.productdetails').find('.printedprice_box .price .pressproofprice').show();
                            } else {
                                $(_this).parents('.productdetails').find('.printedprice_box .price .pressproofprice').hide();
                            }
                            if (data.additional_rolls > 0) {
                                $(_this).parents('.productdetails').find('.printedprice_box .price .additionalrolls').find('.phead').html('(' + data.additional_rolls + ' additional rolls)');
                                $(_this).parents('.productdetails').find('.printedprice_box .price .additionalcharge').find('.desginprice').html('<b class="pr-sm">' + data.symbol + data.additional_cost + '</b>');
                                $(_this).parents('.productdetails').find('.printedprice_box .price .additionalrolls').show();
                                $(_this).parents('.productdetails').find('.printedprice_box .price .additionalcharge').show();
                            } else {
                                $(_this).parents('.productdetails').find('.printedprice_box .price .additionalrolls').hide();
                                $(_this).parents('.productdetails').find('.printedprice_box .price .additionalcharge').hide();
                            }


                            $(_this).parents('.productdetails').find('.printedprice_text').html(data.price);
                            $(_this).parents('.productdetails').find('.printedperlabels_text').html(data.labelprice);

                            $(_this).parents('.productdetails').find('.calculate_printed').hide();
                            $(_this).parents('.productdetails').find('.add_printed').show();
                            $(_this).parents('.productdetails').find('.printedprice_box').show();

                        }
                    }
                }
            });
        }
    });


    $(document).on("click", ".add_printed", function (e) {
        var cart_id = $(this).parents('.productdetails').find('.cart_id').val();
        var prd_name = $(this).parents('.productdetails').find('.product_name').text();
        var id = $(this).parents('.productdetails').find('.product_id').val();
        var cart_id = $(this).parents('.productdetails').find('.cart_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var labelfinish = $(this).parents('.productdetails').find('.labelfinish').val();
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var printing = $(this).parents('.productdetails').find('.digitalprintoption').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var presproof = $(this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-presproof');
        var woundoption = $('#woundoption').val();
        var orientation = $(this).parents('.productdetails').find('.orientation').val();

        var upload_qty = parseInt($(this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-qty'));
        var artworks = parseInt($(this).parents('.productdetails').find('#uploadedartworks_' + id).val());
        var minlabels = parseInt($(this).parents('.productdetails').find('.minimum_printed_labels').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_printed_labels').val());
        var min_qty = parseInt(min_qty * minlabels);

        var input_id = $(this).parents('.productdetails').find('.printlabels');
        var qty = input_id.val();
        var _this = this;

        if (!is_numeric(qty) || qty == '' || qty < min_qty) {
            input_id.val(min_qty);
            show_faded_popover(input_id, 'Quantity has been amended for production as ' + min_qty + ' labels.');
        } else if (qty > max_qty) {
            input_id.val(max_qty);
            show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' labels.');
        } else if (printing == '' || printing.length == 0) {
            swal({
                title: "Please Select",
                text: "Digital Print Process ",
                confirmButtonText: "Continue",
                type: "",
            });
        } else if (labelfinish == '' || labelfinish.length == 0) {
            swal({
                title: "Please Select",
                text: "Product Finish  ",
                confirmButtonText: "Continue",
                type: "",
            });
        } else {

            var designs = $(this).parents('.productdetails').find('#uploadedartworks_' + id).val();
            if (designs == 0) {
                swal({
                        title: "Did you forget something?",
                        text: "There is no artwork uploaded for your printed labels. \n\n Please upload your artwork by clicking on the blue “OK” button and proceed with your purchase. \n\n Alternatively you can proceed to place your order and pay by clicking on the orange “Continue” button and a member of our Customer Care team will contact you to discuss your artwork requirements.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn orangeBg",
                        confirmButtonText: "Continue",
                        cancelButtonClass: "btn blueBg",
                        cancelButtonText: "OK",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            //console.log('continue');
                            $.ajax({
                                url: base + 'ajax/add_products_incart',
                                type: "POST",
                                async: "false",
                                dataType: "html",
                                data: {
                                    labels: qty,
                                    menuid: menuid,
                                    prd_id: id,
                                    max_labels: labels,
                                    labelfinish: labelfinish,
                                    printing: printing,
                                    presproof: presproof,
                                    cartid: cart_id,
                                    woundoption: woundoption,
                                    orientation: orientation,
                                    type: 'Rolls',
                                },
                                success: function (data) {
                                    if (!data == '') {
                                        data = $.parseJSON(data);
                                        if (data.response == 'yes') {
                                            fireRemarketingTag('Add to cart');
                                            $(_this).parents('.productdetails').find('#uploadedartworks_' + id).val(0);
                                            $(_this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-qty', 0);
                                            $(_this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-rolls', 0);
                                            $(_this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-presproof', 0);
                                            update_artwork_upload_btn(_this, 0);
                                            popup_messages(menuid + ' - Printed Labels on Rolls - ' + prd_name);
                                            $('#cart').html(data.top_cart);
                                        }
                                    }
                                }
                            });
                        }
                    });
            } else {

                $.ajax({
                    url: base + 'ajax/add_products_incart',
                    type: "POST",
                    async: "false",
                    dataType: "html",
                    data: {
                        labels: qty,
                        menuid: menuid,
                        prd_id: id,
                        max_labels: labels,
                        labelfinish: labelfinish,
                        printing: printing,
                        presproof: presproof,
                        cartid: cart_id,
                        woundoption: woundoption,
                        orientation: orientation,
                        type: 'Rolls',
                    },
                    success: function (data) {
                        if (!data == '') {
                            data = $.parseJSON(data);
                            if (data.response == 'yes') {
                                fireRemarketingTag('Add to cart');
                                $(_this).parents('.productdetails').find('#uploadedartworks_' + id).val(0);
                                $(_this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-qty', 0);
                                $(_this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-rolls', 0);
                                $(_this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-presproof', 0);
                                update_artwork_upload_btn(_this, 0);
                                popup_messages(menuid + ' - Printed Labels on Rolls - ' + prd_name);
                                $('#cart').html(data.top_cart);
                            }
                        }
                    }
                });

            }


        }

    });


    $(document).on("click", ".productdetails .dm-selector li a", function (e) {
        var selText = $(this).text();
        var value = $(this).attr('data-value');
        var type = $(this).attr('data-id');
        if (value.length > 0) {
            $(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <i class="fa fa-unsorted"></i>');
            if (type == 'digital') {
                $(this).parents('.productdetails').find('.digitalprintoption').val(value);
            } else {
                $(this).parents('.productdetails').find('.orientation').val(value);
            }

        } else {
            if (type == 'digital') {
                $(this).parents('.btn-group').find('.dropdown-toggle').html('Select Digital Print Process <i class="fa fa-unsorted"></i>');
                $(this).parents('.productdetails').find('.digitalprintoption').val('');
            } else {
                $(this).parents('.btn-group').find('.dropdown-toggle').html('Orientation 01 <i class="fa fa-unsorted"></i>');
                $(this).parents('.productdetails').find('.orientation').val(1);
            }
        }
        reset_print_input_buttons(this);
    });
    $(document).on("change", ".labelfinish", function (e) {
        reset_print_input_buttons(this);
    });


    $(document).on("mouseover", ".dropdown-menu li a", function (e) {
        var selText = $(this).text();
        var orientation = $(this).attr('data-id');
        var woundoption = $('#woundoption').val();
        if (typeof orientation != 'undefined') {
            var imagepath = '<?=Assets?>images/categoryimages/winding/' + woundoption + '/' + orientation + '.png';
            $(this).find('img').attr('src', imagepath);
        }

    });


    function verify_labels_or_rolls_qty(id) {

        var prdid = $(parent_selector).parents('.productdetails').find('.product_id').val();
        var labelspersheets = $(parent_selector).parents('.productdetails').find('.LabelsPerSheet').val();
        var minlabels = parseInt($(parent_selector).parents('.productdetails').find('.minimum_printed_labels').val());
        var dieacross = min_rolls = parseInt($(parent_selector).parents('.productdetails').find('.minimum_quantities').val());
        var min_qty = parseInt(min_rolls * minlabels);
        var min_qty = parseInt($(parent_selector).parents('.productdetails').find('.maximum_printed_labels').val());

        var rolls = parseInt($(id).parents('.upload_row').find('.input_rolls').val());
        var total_labels = parseInt($(id).parents('.upload_row').find('.roll_labels_input').val());

        var perroll = parseFloat(total_labels / rolls);
        if (isFloat(perroll)) {
            perroll = Math.ceil(perroll);
        }

        var roll_text = 'roll';
        if (rolls > 1) {
            var roll_text = 'rolls';
        }

        if (!is_numeric(total_labels)) {
            var _this = $(id).parents('.upload_row').find('.roll_labels_input');
            show_faded_popover(_this, "Please enter number of labels.");
            $(id).parents('.upload_row').find('.roll_labels_input').val('');
            return false;
        } else if (total_labels == 0) {
            var _this = $(id).parents('.upload_row').find('.roll_labels_input');
            show_faded_popover(_this, "Minimum Label quantity is " + minlabels + " Labels per roll.");
            $(id).parents('.upload_row').find('.roll_labels_input').val('');
            return false;
        } else if (!is_numeric(rolls) || rolls == 0) {
            var _this = $(id).parents('.upload_row').find('.input_rolls');
            show_faded_popover(_this, "Minimum roll quantity is 1 roll.");
            $(id).parents('.upload_row').find('.input_rolls').val('');
            return false;
        } else if (perroll < minlabels) {

            var roll_input_display = $(id).parents('.upload_row').find('.input_rolls').css('display');
            if (roll_input_display == 'block') {
                var requiredlabels = minlabels * rolls
                var _this = $(id).parents('.upload_row').find('.roll_labels_input');
                show_faded_popover(_this, "Quantity has been amended for production as " + requiredlabels + " Labels.");

                $(id).parents('.upload_row').find('.show_labels_per_roll').text(minlabels);
                $(id).parents('.upload_row').find('.roll_labels_input').val(requiredlabels);
                return false;
            } else {
                if (total_labels > labelspersheets) {
                    var expectedrolls = parseFloat(total_labels / labelspersheets);
                    if (isFloat(expectedrolls)) {
                        expectedrolls = Math.ceil(expectedrolls);
                    }
                    labelspersheets = parseInt(total_labels / expectedrolls);

                    var _this = $(id).parents('.upload_row').find('.input_rolls');
                    show_faded_popover(_this, "Quantity has been amended for production as " + expectedrolls + " Rolls.");
                    $(id).parents('.upload_row').find('.show_labels_per_roll').text(labelspersheets);
                    $(id).parents('.upload_row').find('.input_rolls').val(expectedrolls);
                    $(id).parents('.upload_row').find('.quantity_labels').text(expectedrolls);
                    return false;
                } else {
                    if (total_labels < minlabels) {
                        total_labels = minlabels;
                        var _this = $(id).parents('.upload_row').find('.roll_labels_input');
                        show_faded_popover(_this, "Quantity has been amended for production as " + total_labels + " Labels.");
                    } else {
                        var _this = $(id).parents('.upload_row').find('.roll_labels_input');
                        show_faded_popover(_this, "Quantity has been amended for production as 1 Roll.");
                    }
                    $(id).parents('.upload_row').find('.show_labels_per_roll').text(total_labels);
                    $(id).parents('.upload_row').find('.quantity_labels').text(1);
                    $(id).parents('.upload_row').find('.input_rolls').val(1);
                    $(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
                    return false;
                }
            }


        } else if (perroll > labelspersheets) {

            var response = rolls_calculation(min_rolls, labelspersheets, total_labels, 0);
            var total_labels = response['total_labels'];
            var expectedrolls = response['rolls'];
            var labelspersheets = parseInt(total_labels / expectedrolls);

            var infotxt = 'Quantity has been amended for production as ' + expectedrolls + ' rolls and ' + total_labels + ' labels';
            show_faded_popover($(id).parents('.upload_row').find('.roll_labels_input'), infotxt);
            $(id).parents('.upload_row').find('.show_labels_per_roll').text(labelspersheets);
            $(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
            $(id).parents('.upload_row').find('.input_rolls').val(expectedrolls);
            $(id).parents('.upload_row').find('.quantity_labels').text(expectedrolls);
            return false;
        } else {
            var total_labels = parseInt(perroll) * parseInt(rolls);
            $(id).parents('.upload_row').find('.show_labels_per_roll').text(perroll);
            $(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
        }
        $(id).parents('.upload_row').find('.quantity_updater').hide();


    }

    function rolls_calculation(die_across, max_labels, total_labels, rolls) {
        if (rolls == 0) {
            rolls = parseInt(die_across);
        } else {
            rolls = parseInt(rolls) + parseInt(die_across);
        }
        var per_roll = parseFloat(parseInt(total_labels) / rolls);
        if (per_roll > parseInt(max_labels)) {
            response = rolls_calculation(die_across, max_labels, total_labels, rolls);
            per_roll = response['per_roll'];
            rolls = response['rolls'];
        }

        var data = {per_roll: Math.ceil(per_roll), total_labels: Math.ceil(per_roll) * rolls, rolls: rolls};
        return data;
    }

    $(document).on("click", ".quantity_updater", function (e) {
        verify_labels_or_rolls_qty(this);
        $(this).parents('.upload_row').find('.quantity_updater').hide();
    });

    $(document).on("click", ".quantity_editor", function (e) {
        $(this).hide();
        $(this).parents('.upload_row').find('.quantity_labels').hide();
        $(this).parents('.upload_row').find('.input_rolls').show();
    });

    function isFloat(n) {
        return Number(n) === n && n % 1 !== 0;
    }


    $(document).on("click", ".price_breaks", function (e) {
        var product_id = $(this).parents('.productdetails').find('.product_id').val();
        var manfactureid = $(this).parents('.productdetails').find('.manfactureid').val();
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        $('#ajax_price_breaks').html('');
        $('#price_loader').show();
        $.ajax({
            url: base + 'ajax/labels_price_breaks',
            type: "POST",
            async: "false",
            data: {mid: manfactureid, labels: labels, type: 'roll'},
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


    $(document).on("click", ".rsample", function (e) {

        var p_code = $(this).parents('.productdetails').find('.product_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var prd_name = $(this).parents('.productdetails').find('.product_name').text();
        if (menuid) {
            $.ajax({
                url: base + 'ajax/add_sample_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: 1, menuid: menuid, prd_id: p_code},
                success: function (data) {
                    if (!data == '') {
                        $(".requestsample").modal('hide');
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            var sample_txt = "Thank you for requesting a sample which has been added to your basket and upon checkout a free-of-charge roll length of the material chosen will be sent to you. \n\n Please note: This is a material and adhesive sample only and will no not therefore match the label shape and size on this page.";
                            swal("Material Sample Added to Basket", sample_txt, "success");
                            //popup_messages(menuid+' - '+prd_name+' - Sample ');
                            $('#cart').html(data.top_cart);
                        } else if (data.response == 'failed') {
                            swal("Maximum limit exceeded", data.msg, "error");
                        }
                    }
                }
            });
        }
    });

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

                    }, 1000);
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
            data: {'groupname': groupname, type: 'rolls'},
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
    $(document).on("change", "#woundoption", function (e) {
        val = $(this).val();
        if (val != '') {

            if (val == 'Inside') {
                $('.insideorientation').show();
                $('.outsideorientation').hide();
                $('.productdetails').find('.orientationselector').html(' Orientation 05 <i class="fa fa-unsorted"></i>');
                $('.orientation').val(5);
            } else {
                $('.insideorientation').hide();
                $('.outsideorientation').show();
                $('.productdetails').find('.orientationselector').html(' Orientation 01 <i class="fa fa-unsorted"></i>');
                $('.orientation').val(1);
            }
            var material_code = $("#material_code").val() + $("#coresize").val().replace(/[^0-9]/, "");

            $('#prod_img').html('<img onerror='
            imgError(this);
            ' src="<?=Assets?>images/loader.gif" width="181" height="181" class="image" style="width:181px; height:181px; ">'
        )
            ;
            request = $.ajax({
                url: '<?=base_url()?>ajax/setwoundoption',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {option: val, cate: '<?=$subcat?>',},
                success: function (data) {
                    if (val == 'Inside') {
                        setTimeout(function () {
                            $('#prod_img').html('<img onerror='
                            imgError(this);
                            ' id="wound_image" src ="<?=Assets?>images/categoryimages/inner_roll/<?=$imagename?>">'
                        )
                            ;
                            $('#material_popup_img').attr("src", "<?=Assets?>images/categoryimages/inner_roll/<?=$imagename?>");

                            /*$('#prod_img').html('<img onerror='imgError(this);' id="wound_image" src="<?=Assets?>images/categoryimages/RollLabels/inside/<?=ltrim($details['DieCode'], "1-")?>'+material_code+'.jpg">');

								$('#material_popup_img').attr("src","<?=Assets?>images/categoryimages/RollLabels/inside/<?=ltrim($details['DieCode'], "1-")?>"+material_code+".jpg");
							*/
                        }, 1000);


                    } else {
                        setTimeout(function () {
                            $('#prod_img').html('<img onerror='
                            imgError(this);
                            ' id="wound_image" src ="<?=Assets?>images/categoryimages/roll_desc/<?=$imagename?>">'
                        )
                            ;
                            $('#material_popup_img').attr("src", "<?=Assets?>images/categoryimages/roll_desc/<?=$imagename?>");
                            /*$('#prod_img').html('<img onerror='imgError(this);' id="wound_image" src ="<?=Assets?>images/categoryimages/RollLabels/outside/<?=ltrim($details['DieCode'], "1-")?>'+material_code+'.jpg">');

								$('#material_popup_img').attr("src","<?=Assets?>images/categoryimages/RollLabels/outside/<?=ltrim($details['DieCode'], "1-")?>"+material_code+".jpg");
								*/
                        }, 1000);

                    }
                }
            });
        }
    });


    /************* Label Finder **********/
    var contentbox = $('#ajax_labelfilter');


    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip-digital"]').tooltip();
        $("[data-toggle=tooltip-orintation]").tooltip();
        $("[data-toggle=tooltip-product]").tooltip();
        $('.fnTop').show().slideDown("fast");
        $(".labels-filters-form").slideUp("fast");
        change_text('View Filters');
        <? if(isset($category) and $category != ''){?>
        filter_data('autoload', '');
        <? }?>
    });

    $(document).on("change", "#coresize", function (e) {
        var coreid = $(this).val();
        var coreid = coreid.toLowerCase();
        var url = '<?=$this->uri->segment(1)?>';
        var shape = '<?=$this->uri->segment(2)?>';
        var diecode = '<?=$details['CategoryID']?>';
        var url = '<?=base_url()?>' + url + "/" + shape + "/" + diecode + '' + coreid;
        window.location.href = url;
    });

    function fetch_category_mateials() {
        var catid = '<?=$details['CategoryID'] . $coreid?>';
        var material = $('#material_mat').val();
        var adhesive = $('#adhesive_mat').val();
        var color = $('#color_mat').val();
        var max_diameter = $('#max_diameter').val();
        var printer_compatiblity = '<?=$printer_compatiblity?>';

        var imge = '<?=$img_chgr . 'WTP'?>';
        var wound = $('#woundoption').val();
        if (wound == 'Inside') {
            //var url= '<?=Assets?>images/categoryimages/inner_roll/'
            var url = '<?=Assets?>images/categoryimages/RollLabels/inside/'
        } else {
            //var url= '<?=Assets?>images/categoryimages/roll_desc/'
            var url = '<?=Assets?>images/categoryimages/RollLabels/outside/'
        }

        var top = $('#material_mat').offset().top;
        top = top + 100;
        $('.loading-gif').css('top', top);

        $('#aa_loader').show();
        $.ajax({
            url: base + 'ajax/get_category_materials/',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                material: material, adhesive: adhesive, color: color, catid: catid, compatiblity: printer_compatiblity,
                disablecontent: 'disable',
                labelsgap: '<?=$details['LabelGapAcross']?>', max_diameter: max_diameter, height:<?=$details['Height']?>
            },
            success: function (data) {
                if (!data == '') {
                    $('#wound_image').attr('src', url + imge + "<?=preg_replace("/[^0-9]/", "", $coreid)?>.jpg");
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
                        $('[data-reset="reset"]').hide();
                        $('[data-mat-filters="' + material + '"]').show();
                    }
                    if (color != '') {
                        $('[data-reset="reset"]').hide();
                        $('[data-reset="reset"]').each(function (index) {
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
                                    $(this).find('a').click();
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
                        $('[data-reset="reset"]').each(function (index) {
                            //var adhesive = $(this).find('.product_adhesive').val();
                            var _this = this;
                            var option = $(this).find('.product_adhesive').children('option[value="' + adhesive + '"]').attr('disabled');
                            console.log(option);
                            if (option == 'disabled') {
                                $(_this).hide();
                            } else {
                                //var option=$(this).find('.product_adhesive').children('option[value="' + adhesive + '"]').attr('selected', 'selected');
                            }
                        });
                    }

                    $('#aa_loader').hide();


                }
            }
        });
    }

    function fireRemarketingTag(page) {
        <? if(SITE_MODE == 'live123'){?>
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
        <? } ?>
    }

</script> 
