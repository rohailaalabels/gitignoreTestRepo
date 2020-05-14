<link href="<?= Assets ?>css/mat-sep-2017.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<style>
    .giveMeEllipsis {
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 3.6em;
        line-height: 1.8em;
    }

    .dropzone .dz-preview {
        margin: 0px;
    }

    .dropzone .dz-preview .dz-image {
        display: block;
        border-radius: none;
        height: 50px;
        overflow: hidden;
        position: relative;
        width: 50px;
        z-index: 10;
    }

    .dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
        display: block;
        height: 25px;
        width: 25px;
    }

    .dropzone .dz-preview.dz-image-preview .dz-details {
        display: none;
    }

    .dropzone .btn {
        margin-top: 10px;
        cursor: pointer;
    }

    .mat-ch .detail .form-control {
        padding: 6px 6px !important;
    }

    .discount_price {
        color: black !important;
        font-size: 16px !important;
        text-decoration: line-through !important;
        display: inline !important;
    }

    .mat_class {
        margin: 5px;
    }

    select option:disabled {
        background: #dedede;
    }

    .ovFl thead {
        background: #17b1e3 none repeat scroll 0 0;
        color: white;
    }

    .productdetails .phead {
        font-size: 12px;
        line-height: normal;
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
        text-decoration: none; /*  font-style: italic;*/
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

    .mat-may-2017 section article.mat-detail .specs a.technical_specs {
        top: 0px;
    }

    .mat-may-2017 section article.mat-tabs .ofq {
        margin-top: 140px;
    }

    .flexcontainer {
        display: flex;
    }

    .flexcontainer .why-seal {
        /*position: absolute;
	right: 0px;
	bottom: 0px;*/
    }

    .flexcontainer .why-seal img {
        margin: 0 auto;
    }

    .table.printer {
        font-family: "Open Sans", Helvetica, Arial, sans-serif;
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

    .pr-table {
        width: 100%;
    }

    .pr-table td {
        padding: 0 15px;
        border-right: 1px solid;
        text-align: center;
    }

    .pr-table td:first-child {
        padding-left: 0;
    }

    .pr-table td:last-child {
        border: 0;
    }

    .printer_top_div table tr td {
        padding: 0 !important;
        vertical-align: top;
    }

    .printer_top_div {
        border-left: 1px solid #333;
    }

    .price_promise h1 {
        font-size: 20px;
        font-weight: bold;
        margin: 0 0 10px 0 !important;
    }

    .euro_text_top {
        height: 70px;
        margin-top: 30px;
    }

    .euro_thumbnail {
        margin-top: -25px !important;
    }

    @media (min-width: 1024px) {
        .plainprice_box {
            margin-top: -20px;
        }

        .mat-may-2017 section article.mat-tabs .service {
            margin-top: -20px;
            margin-left: -140px !important;
        }
    }

    .plainprice_box .halfprintprice .phead {
        font-weight: bold;
    }

    .filterBg.desktop-view {
        margin: -15px;
        margin-top: 0px;
        border-top: 5px solid #e0e0e0;
        background: #fff;
    }

    .filterBg.desktop-view.non_euro {
        margin-top: 5px;
    }
</style>
<style>
    @media screen and (min-width: 768px) {
        .price_promise_div {
            margin-top: -20px;
            margin-bottom: 10px;
        }
    }

    @media screen and (min-width: 1024px) {
        .price_promise_div {
            margin-top: -55px;
            margin-bottom: 10px;
        }
    }
</style>
<div id="aa_loader" class="white-screen" style=" display:none;">
    <div class="loading-gif text-center" style="top:95%; z-index:150;"><img onerror='imgError(this);'
                                                                            src="<?= Assets ?>images/loader.gif"
                                                                            class="image"
                                                                            style="width:139px; height:29px; "
                                                                            alt="AA Labels Loader"></div>
</div>
<div class="">
    <div class="container m-t-b-8">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ol class="breadcrumb  m0">
                    <?= $this->home_model->genrate_breadcrumb('material'); ?>
                    <li class="active">
                        <?= $details['CategoryName'] ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?
//$details['is_euro'] = 'Y';
$popup_margin = '';
$x = explode("-", $details['CategoryName']);
$catname = $x[0];
$code = explode('.', $details['CategoryImage']);
$newcatname = explode("-", $details['CategoryName']);
$heading = $newcatname[0];
if ($details['Shape_upd'] == "Circular") {
    $LabelSize = str_replace("Label Size:", "", $details['specification3']);
} else {
    /*if($details['is_euro'] == 'Y')
		{
			$LabelSize = $details['LabelWidth']." x ".$details['LabelHeight'];
		}
		else
		{
			$LabelSize =  " Width ".$details['LabelWidth']."&nbsp;&nbsp; x &nbsp;Height&nbsp; ".$details['LabelHeight'];
		}*/
    $label_size = explode('Label Size:', $details['specification3']);
    if ($details['is_euro'] == 'Y') {
        $LabelSize = $label_size[1];
    } else {

        $LabelSize = $label_size[1];
    }
}
if (preg_match("/SRA3/", $details['CategoryName'])) {
    $Paper_size = "SRA3 Sheets";
    $img_src = Assets . "images/categoryimages/SRA3Sheets/colours/" . $materials[0]->ManufactureID . ".png";
    if (!getimagesize($img_src)) {
        $img_src = Assets . "images/categoryimages/SRA3Sheets/" . $details['CategoryImage'];
    }
    $width = '220';
    $height = 'auto';
    $pop_width = '200';
    $box_height = 'min-height:325px;';
    $popup_margin = 'margin:6px auto !important;';
    $type = "SRA3";
} else if (preg_match("/A5/", $details['CategoryName'])) {
    $Paper_size = "A5 Sheets";
    $img_src = Assets . "images/categoryimages/A5Sheets/colours/" . $materials[0]->ManufactureID . ".png";
    if (!getimagesize($img_src)) {
        $img_src = Assets . "images/categoryimages/A5Sheets/" . $details['CategoryImage'];
    }
    $width = '210';
    $height = 'auto';
    $box_height = 'min-height:325px;';
    $pop_width = '200';
    $popup_margin = 'margin:6px auto !important;';
    $type = "A5";
} else if (preg_match("/A3/", $details['CategoryName'])) {
    $Paper_size = "A3 Sheets";
    $img_src = Assets . "images/categoryimages/A3Sheets/colours/" . $materials[0]->ManufactureID . ".png";
    if (!getimagesize($img_src)) {
        $img_src = Assets . "images/categoryimages/A3Sheets/" . $details['CategoryImage'];
    }
    $width = '220';
    $height = 'auto';
    $box_height = 'min-height:325px;';
    $pop_width = '200';
    $popup_margin = 'margin:6px auto !important;';
    $type = "A3";
} else {
    $Paper_size = "A4 Sheets";
    $img_src = Assets . "images/categoryimages/A4Sheets/colours/" . $materials[0]->ManufactureID . ".png";
    if (!getimagesize($img_src)) {
        $img_src = Assets . "images/categoryimages/A4Sheets/" . $details['CategoryImage'];
    }

    $width = '189';
    $height = '267';
    $box_height = '';
    $pop_width = '189';
    $type = "A4";
}
$productid = $this->home_model->get_db_column('products', 'ProductID', 'CategoryID', $details['CategoryID']);
?>
<div class="bgGray">
    <div id="ajax_labelfilter" class="container">
        <div class="row">
            <div class="mat-sep-2017">
                <?php
                if ($details['is_euro'] == 'Y'):?>
                    <div class="selected-product">
                        <?php
                        $class1 = "col-lg-2 col-md-2 col-sm-3 col-xs-3";
                        $class2 = "col-lg-10 col-md-10 col-sm-9";
                        if ($type == "A3" || $type == "SRA3") {
                            $class1 = "col-lg-3 col-md-3 col-sm-3 col-xs-3";
                            $class2 = "col-lg-9 col-md-9 col-sm-9 col-xs-9";
                        }
                        ?>
                        <div class="row">
                            <div class="<?= $class1 ?> pr-thumb"><img onerror='imgError(this);' src="<?= $img_src ?>"
                                                                      alt="<?= $catname ?>" title="<?= $catname ?>">
                            </div>
                            <div class="<?= $class2 ?>">
                                <div class="row flexcontainer">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <h2 class="pr-title">
                                            <?= $heading ?>
                                        </h2>
                                        <div class="pr-detail">
                                            <table class="pr-table">
                                                <tr>
                                                    <td><b>Product Code:
                                                            <?= ltrim($details['DieCode'], "1-") ?>
                                                        </b></td>
                                                    <td><b>Label Size: </b>
                                                        <?= $LabelSize ?>
                                                        <? $tooltip_title = "";
                                                        if (($details['InnerHole']) || ($details['InnerLabel'])):
                                                            if ($details['Shape'] == "Circular") {
                                                                $tooltip_title .= $LabelSize;
                                                            } else {
                                                                $tooltip_title .= $LabelSize . " mm";
                                                            }
                                                            if ($details['InnerHole']):
                                                                $tooltip_title .= "<br>" . $details['InnerHole'] . " Diameter (Inner Hole)";
                                                            endif;
                                                            if ($details['InnerLabel']):
                                                                $tooltip_title .= "<br>" . $details['InnerLabel'] . " Diameter (Inner Label)";
                                                                ?>
                                                            <? endif; ?>
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                               data-html="true"
                                                               data-original-title="<?= $tooltip_title ?>"
                                                               href="javascript:void(0);"><i
                                                                        class="fa fa-info-circle"></i></a>
                                                        <? endif; ?></td>
                                                    <td><a role="button" data-target=".layout" data-toggle="modal"> View
                                                            Full Specification</a></td>
                                                </tr>
                                            </table>
                                            <?php
                                            if ($type != "A3" and $type != "SRA3"):?>
                                                <p class="<?= ($compitable) ? '' : 'av-comp' ?> "><b>Compatible with
                                                        Avery&reg; templates:</b>
                                                    <?= str_replace(",", ", ", $compitable) ?>
                                                </p>
                                            <?php endif;
                                            $matcode = $this->home_model->getmaterialcode($materials[0]->ManufactureID);
                                            $thumbnail = Assets . "images/categoryimages/A4Sheets/euro_edges/" . $matcode . ".png";
                                            ?>
                                            <div class="desktop_euro_div hidden-xs"><img onerror='imgError(this);'
                                                                                         src="<?= $thumbnail ?>"
                                                                                         alt="Dry Edge"
                                                                                         style="margin-top: -5px;"
                                                                                         class="euro_thumbnail pull-left"/>
                                                <p class="euro_text_top">Our innovative dry-edge label sheets, have a
                                                    small 1mm strip of label material and adhesive removed from around
                                                    the edge of the sheet, <a href="javascript:void(0)"
                                                                              data-toggle="tooltip"
                                                                              title="Our innovative dry-edge label sheets, have a small 1mm strip of label material and adhesive removed from around the edge of the sheet, exposing the release liner and backing paper, creating a dry area that prevents problems associated with adhesive deposits on printer rollers. Enabling faster, problem free printing of sheet labels.">Read
                                                        more</a></p>
                                                <div class="req-links">
                                                    <div class="row">

                                                        <div class="col-xs-4 col-sm-3 text-left download-icons"><a
                                                                    target="_blank" rel="nofollow" data-toggle="tooltip"
                                                                    title="Download PDF Template"
                                                                    href="<?= base_url() . "download/pdf/" . $details['pdfFile']; ?>?v=<?= time() ?>"
                                                                    role="button"> <img onerror='imgError(this);'
                                                                                        src="<?= Assets ?>images/pdf-icon.png"
                                                                                        alt="PDF Icon"/> </a> <a
                                                                    target="_blank" data-toggle="tooltip"
                                                                    title="Download Word Template" rel="nofollw"
                                                                    href="<?= Assets . "images/office/word/" . $details['WordDoc']; ?>?v=<?= time() ?>"
                                                                    role="button"> <img onerror='imgError(this);'
                                                                                        src="<?= Assets ?>images/word-icon.png"
                                                                                        alt="MS Word Icon"/> </a>

                                                            <? if ($type == "A4") { ?>

                                                                <a target="_blank" data-toggle="tooltip"
                                                                   class="hidden-sm hidden-xs"
                                                                   title="Click here to view or design your template. (Open in new window)"
                                                                   rel="nofollw"
                                                                   href="<?= base_url() . 'custom-label-tool/designer/' . $productid . '/' ?>"
                                                                   role="button"> <img onerror='imgError(this);'
                                                                                       src="<?= Assets ?>images/ld-icon.png"
                                                                                       alt="Label Designer"/> </a>

                                                            <? } ?>


                                                        </div>
                                                        <div class="col-xs-8 col-sm-9 printer_top_div">
                                                            <?php
                                                            $spec = $this->home_model->get_db_column('products', 'SpecText7', 'ProductID', $productid);
                                                            $compatibility = $this->filter_model->get_compatibility_text('sheet');
                                                            $print_compatible_array = array();
                                                            foreach ($compatibility as $com) {
                                                                $com->print_method = str_replace(" ", "", trim($com->print_method));
                                                                $com->type = str_replace(" ", "", trim($com->type));
                                                                $print_compatible_array[$com->print_method][$com->type] = $com->description;
                                                            }
                                                            $comp = $this->filter_model->grouping_compatiblity($spec, $print_compatible_array);
                                                            ?>
                                                            <div class="comp">
                                                                <table class="table printer" border="0"
                                                                       style="border:none; display:none;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td align="left" valign="center"
                                                                            style="font-size:12px; border:none;vertical-align: bottom;width:25%;">
                                                                            <small style="margin-top:10px;font-size:12px;">Printer<br/>
                                                                                Compatibility</small></td>
                                                                        <td align="left"
                                                                            style="font-size:12px; border:none; width:25%;">
                                                                            Laser <img onerror='imgError(this);'
                                                                                       class="laser_printer_img"
                                                                                       width="50"
                                                                                       src="<?= Assets ?>images/<?= $comp['laser_img'] ?>"/><a
                                                                                    data-toggle="tooltip-product"
                                                                                    data-placement="top"
                                                                                    class="laser_printer_div" title=""
                                                                                    data-original-title="<?= $comp['laser_text'] ?>"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                        <td align="left"
                                                                            style=" font-size:12px;border:none;width:25%;">
                                                                            Inkjet <img onerror='imgError(this);'
                                                                                        class="inkjet_printer_img"
                                                                                        width="50"
                                                                                        src="<?= Assets ?>images/<?= $comp['inkjet_img'] ?>"/><a
                                                                                    data-toggle="tooltip-product"
                                                                                    data-placement="top" title=""
                                                                                    class="inkjet_printer_div"
                                                                                    data-original-title="<?= $comp['inkjet_text'] ?>"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="fa fa-info-circle"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 hidden-sm hidden-xs text-center why-seal"><img
                                                onerror='imgError(this);' class="img-responsive"
                                                src="<?= Assets ?>images/30-icon.png" alt="30 Days Moneyback Guarantee">
                                        <div class="title m-t-10"><a href="javascript:void(0);" data-toggle="popover"
                                                                     data-trigger="hover" data-placement="top"
                                                                     data-html="true"
                                                                     data-content="<div class='col-lg-12 col-md-12 frc-banner'><div class='title'> FAST, RELIABLE &amp; COST EFFECTIVE </div><ul><li>Over 80% of orders despatched same day</li><li>Daily despatch and delivery</li><li>Add the “Next Day” option to your order</li><li>If you need labels quicker, add a PRE 10:30 or 12:00 option for even faster delivery.</li><li>1,000’s of satisfied customers.</li><li>  <img onerror='imgError(this);' src='<?= Assets ?>images/iso_14001.png'> ISO9001 Certified</li><li><img onerror='imgError(this);' src='<?= Assets ?>images/iso_9001.png'> ISO14001 Certified</li> </ul></div>">Why
                                                Buy from AA Labels? <i class="fa fa-info-circle"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->agent->is_mobile()) { ?>
                                <div class="col-xs-12 mobile_euro_div hide visible-xs"><img onerror='imgError(this);'
                                                                                            src="<?= $thumbnail ?>"
                                                                                            alt="Dry Edge Sheets"
                                                                                            style="margin-top: -5px;"
                                                                                            class="euro_thumbnail pull-left"/>
                                    <p class="euro_text_top">Our innovative dry-edge label sheets, have a small 1mm
                                        strip of label material and adhesive removed from around the edge of the sheet,
                                        <a href="javascript:void(0)" data-toggle="tooltip"
                                           title="Our innovative dry-edge label sheets, have a small 1mm strip of label material and adhesive removed from around the edge of the sheet, exposing the release liner and backing paper, creating a dry area that prevents problems associated with adhesive deposits on printer rollers. Enabling faster, problem free printing of sheet labels.">Read
                                            more</a></p>
                                    <div class="req-links clear">
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 text-left download-icons"><a rel="nofollow"
                                                                                                       target="_blank"
                                                                                                       data-toggle="tooltip"
                                                                                                       title="Download PDF Template"
                                                                                                       href="<?= base_url() . "download/pdf/" . $details['pdfFile']; ?>"
                                                                                                       role="button">
                                                    <img onerror='imgError(this);'
                                                         src="<?= Assets ?>images/pdf-icon.png"
                                                         alt="Download PDF Template"/> </a> <a data-toggle="tooltip"
                                                                                               target="_blank"
                                                                                               title="Download Word Template"
                                                                                               rel="nofollw"
                                                                                               href="<?= Assets . "images/office/word/" . $details['WordDoc']; ?>"
                                                                                               role="button"> <img
                                                            onerror='imgError(this);'
                                                            src="<?= Assets ?>images/word-icon.png"
                                                            alt="Download Word Template"/> </a>

                                                <? if ($type == "A4") { ?>

                                                    <a target="_blank" data-toggle="tooltip" class="hidden-sm hidden-xs"
                                                       title="Click here to view or design your template. (Open in new window)"
                                                       rel="nofollw"
                                                       href="<?= base_url() . 'custom-label-tool/designer/' . $productid . '/' ?>"
                                                       role="button"> <img onerror='imgError(this);'
                                                                           src="<?= Assets ?>images/ld-icon.png"
                                                                           alt="Label Desiger"/> </a>

                                                <? } ?>

                                            </div>
                                            <div class="col-xs-9 col-sm-9 printer_top_div">
                                                <?php
                                                $spec = $this->home_model->get_db_column('products', 'SpecText7', 'ProductID', $productid);
                                                $compatibility = $this->filter_model->get_compatibility_text('sheet');
                                                $print_compatible_array = array();
                                                foreach ($compatibility as $com) {
                                                    $com->print_method = str_replace(" ", "", trim($com->print_method));
                                                    $com->type = str_replace(" ", "", trim($com->type));
                                                    $print_compatible_array[$com->print_method][$com->type] = $com->description;
                                                }
                                                $comp = $this->filter_model->grouping_compatiblity($spec, $print_compatible_array);
                                                ?>
                                                <div class="comp">
                                                    <table class="table printer" border="0"
                                                           style="border:none;display:none;">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" valign="center"
                                                                style="font-size:12px; border:none;vertical-align: bottom;width:25%;">
                                                                <small style="margin-top:10px;font-size:12px;">Printer<br/>
                                                                    Compatibility</small></td>
                                                            <td align="left"
                                                                style="font-size:12px; border:none; width:25%;"> Laser
                                                                <img onerror='imgError(this);' class="laser_printer_img"
                                                                     width="50"
                                                                     src="<?= Assets ?>images/<?= $comp['laser_img'] ?>"/><a
                                                                        data-toggle="tooltip-product"
                                                                        data-placement="top" class="laser_printer_div"
                                                                        title=""
                                                                        data-original-title="<?= $comp['laser_text'] ?>"
                                                                        href="javascript:void(0);"><i
                                                                            class="fa fa-info-circle"></i></a></td>
                                                            <td align="left"
                                                                style=" font-size:12px;border:none;width:25%;"> Inkjet
                                                                <img onerror='imgError(this);'
                                                                     class="inkjet_printer_img" width="50"
                                                                     src="<?= Assets ?>images/<?= $comp['inkjet_img'] ?>"/><a
                                                                        data-toggle="tooltip-product"
                                                                        data-placement="top" title=""
                                                                        class="inkjet_printer_div"
                                                                        data-original-title="<?= $comp['inkjet_text'] ?>"
                                                                        href="javascript:void(0);"><i
                                                                            class="fa fa-info-circle"></i></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ($compitable): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="m-t-b-8"><small><strong>Disclaimer: </strong>AALabels products are not
                                            made or endorsed by Avery®. Avery® is a trademark of CCL Industries Inc.,
                                            registered in the UK and other countries. References to Avery® are solely
                                            used to indicate compatibility for label sizes and templates.</small></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <? if ($filter != 'disabled' and $this->agent->is_mobile() and !isset($othermaterials)) { ?>
                            <div class="row yoyo">
                                <?php
                                if ($type == "A4") {
                                    $button_class = "invisible";
                                    $filter_class = "col-lg-11 col-md-11 col-sm-11 col-xs-12";
                                } else {
                                    $button_class = "hide";
                                    $filter_class = "col-lg-12 col-md-12 col-sm-12 col-xs-12";
                                }
                                ?>
                                <!-- mobile filter -->
                                <div class="labels-form hidden-lg hidden-md hidden-sm <?= $button_class ?>"><a
                                            href="javascript:void(0);" class="btn orangeBg btn-block promotion-styles"
                                            onclick="fetch_special_offers();">View Special Offer <i
                                                class="fa fa-gift"></i></a></div>
                                <div class="row sort-filters hidden-lg hidden-md hidden-sm">
                                    <div class="<?= $filter_class ?>">
                                        <div class="row new_filter">
                                            <div class="new_filter_dropdown">
                                                <div class="labels-form col-lg-7 col-md-7 col-sm-6 col-xs-6">
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
                                                                        <?= $paper_list->Material ?>
                                                                        <small>(<?= $paper_list->count ?>)</small> <br/>
                                                                        <small>
                                                                            <?= $paper_list->SpecText7 ?>
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
                                                            <li class=""><a data-value="reset" data-id="color">Sort By
                                                                    Colour</a></li>
                                                            <? foreach ($color as $color_list) { ?>
                                                                <li class=""><a data-id="color"
                                                                                data-value="<?= $color_list->Color ?>">
                                                                        <?= $color_list->Color ?>
                                                                        - <small>
                                                                            <?= $color_list->SpecText7 ?>
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
                        <? } ?>
                        <? if ($filter != 'disabled' and !$this->agent->is_mobile() and !isset($othermaterials)) { ?>
                            <div class="row sort-filters filterBg desktop-view euro_die hidden-xs">
                                <?php
                                if ($type == "A4") {
                                    $button_class = "hide";
                                    $filter_class = "col-lg-9 col-md-9 col-sm-9 col-xs-12";
                                } else {
                                    $button_class = "hide";
                                    $filter_class = "col-lg-12 col-md-12 col-sm-12 col-xs-12";
                                }
                                ?>
                                <div class="labels-form col-lg-3 col-md-3 col-sm-3 col-xs-12 <?= $button_class ?>"><a
                                            href="javascript:void(0);" class="btn orangeBg btn-block promotion-styles"
                                            onclick="fetch_special_offers();">View Special Offer <i
                                                class="fa fa-gift"></i></a></div>
                                <div class="col-sm-3" style="padding-left:0;">
                                    <p style="line-height: 36px;margin: 0;font-size: 16px;color: #006da4;"><strong>MATERIAL
                                            & COLOUR FILTER</strong></p>
                                </div>
                                <div class="<?= $filter_class ?>">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-sm-offset-1 col-xs-12">
                                        <div class="row new_filter">
                                            <!--desktop no material -->
                                            <div class="new_filter_dropdown">
                                                <div class="labels-form col-lg-7 col-md-7 col-sm-6 col-xs-4">
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
                                                                        <?= $paper_list->Material ?>
                                                                        <small>(<?= $paper_list->count ?>)</small> <br/>
                                                                        <small>
                                                                            <?= $paper_list->SpecText7 ?>
                                                                        </small> </a></li>
                                                            <? } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="labels-form col-lg-5 col-md-5 col-sm-6 col-xs-4">
                                                    <div class="btn-group btn-block dm-selector color-d-down"><a
                                                                class="btn btn-default btn-block dropdown-toggle disabled"
                                                                data-toggle="dropdown" aria-expanded="true">Sort By
                                                            Colour <i class="fa fa-unsorted"></i></a>
                                                        <ul class="dropdown-menu btn-block" style="top: 100%;">
                                                            <li class=""><a data-value="reset" data-id="color">Sort By
                                                                    Colour</a></li>
                                                            <? foreach ($color as $color_list) { ?>
                                                                <li class=""><a data-id="color"
                                                                                data-value="<?= $color_list->Color ?>">
                                                                        <?= $color_list->Color ?>
                                                                        - <small>
                                                                            <?= $color_list->SpecText7 ?>
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
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                        <div>
                                            <button onclick="window.location.reload();" class="btn orangeBg btn-block"
                                                    role="button"><i class="fa fa-refresh"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                <?php else: ?>
                    <div class="selected-product">
                        <?php
                        $class1 = "col-lg-2 col-md-2 col-sm-3 col-xs-3";
                        $class2 = "col-lg-10 col-md-10 col-sm-9";
                        if ($type == "A3" || $type == "SRA3") {
                            $class1 = "col-lg-3 col-md-3 col-sm-3 col-xs-3";
                            $class2 = "col-lg-9 col-md-9 col-sm-9";
                        }
                        ?>
                        <div class="row">
                            <div class="<?= $class1 ?> pr-thumb"><img onerror='imgError(this);' src="<?= $img_src ?>"
                                                                      alt="<?= $catname ?>" title="<?= $catname ?>">
                            </div>
                            <div class="<?= $class2 ?>">
                                <div class="row flexcontainer">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <h2 class="pr-title">
                                            <?= $heading ?>
                                        </h2>
                                        <div class="pr-detail">
                                            <p><b>Product Code: <span class="pr-code">
                      <?= ltrim($details['DieCode'], "1-") ?>
                      </span></b></p>
                                            <p><b>Label Size:</b>
                                                <?= $LabelSize ?>
                                                <?php if ($details['InnerHole']): ?>
                                                    <br/>
                                                    <b>Inner Hole:</b>
                                                    <?= $details['InnerHole'] ?>
                                                    Diameter
                                                <?php endif; ?>
                                                <?php if ($details['InnerLabel']): ?>
                                                    <br/>
                                                    <b>Inner Label:</b>
                                                    <?= $details['InnerLabel'] ?>
                                                    Diameter
                                                <?php endif; ?>
                                            </p>
                                            <p><a role="button" data-target=".layout" data-toggle="modal"> View Label
                                                    Layout</a></p>
                                            <?php
                                            if ($type != "A3" and $type != "SRA3" and $compitable != ''):?>
                                                <p class="<?= ($compitable) ? '' : 'av-comp' ?> "><b>Compatible with
                                                        Avery&reg; templates:</b>
                                                    <?= str_replace(",", ", ", $compitable) ?>
                                                </p>
                                            <?php endif; ?>
                                            <div class="req-links">
                                                <div class="row">
                                                    <div class="col-xs-12 text-left download-icons"><a rel="nofollow"
                                                                                                       target="_blank"
                                                                                                       data-toggle="tooltip"
                                                                                                       title="Download PDF Template"
                                                                                                       href="<?= base_url() . "download/pdf/" . $details['pdfFile']; ?>"
                                                                                                       role="button">
                                                            <img onerror='imgError(this);' style=" height:35px;"
                                                                 src="<?= Assets ?>images/pdf-icon.png"/> </a> <a
                                                                data-toggle="tooltip" target="_blank"
                                                                title="Download Word Template" rel="nofollw"
                                                                href="<?= Assets . "images/office/word/" . $details['WordDoc']; ?>"
                                                                role="button"> <img onerror='imgError(this);'
                                                                                    style=" height:35px;"
                                                                                    src="<?= Assets ?>images/word-icon.png"/>
                                                        </a>

                                                        <? if ($type == "A4") { ?>
                                                            <a target="_blank" data-toggle="tooltip"
                                                               class="hidden-sm hidden-xs"
                                                               title="Click here to view or design your template. (Open in new window)"
                                                               rel="nofollw"
                                                               href="<?= base_url() . 'custom-label-tool/designer/' . $productid . '/' ?>"
                                                               role="button"> <img onerror='imgError(this);'
                                                                                   style=" height:35px;"
                                                                                   src="<?= Assets ?>images/ld-icon.png"/>
                                                            </a>

                                                        <? } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 hidden-sm hidden-xs text-center why-seal"><img
                                                onerror='imgError(this);' class="img-responsive"
                                                src="<?= Assets ?>images/30-icon.png">
                                        <div class="title m-t-10"><a href="javascript:void(0);" data-toggle="popover"
                                                                     data-trigger="hover" data-placement="top"
                                                                     data-html="true"
                                                                     data-content="<div class='col-lg-12 col-md-12 frc-banner'><div class='title'> FAST, RELIABLE &amp; COST EFFECTIVE </div><ul><li>Over 80% of orders despatched same day</li><li>Daily despatch and delivery</li><li>Add the “Next Day” option to your order</li><li>If you need labels quicker, add a PRE 10:30 or 12:00 option for even faster delivery.</li><li>1,000’s of satisfied customers.</li><li>  <img onerror='imgError(this);' src='<?= Assets ?>images/iso_14001.png'> ISO9001 Certified</li><li><img onerror='imgError(this);' src='<?= Assets ?>images/iso_9001.png'> ISO14001 Certified</li> </ul></div>">Why
                                                Buy from AA Labels? <i class="fa fa-info-circle"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <? if ($filter != 'disabled' and !$this->agent->is_mobile() and !isset($othermaterials)) { ?>
                            <div class="row sort-filters filterBg desktop-view non_euro hidden-xs m-t-10">
                                <?php
                                if ($type == "A4") {
                                    $button_class = "hide";
                                    $filter_class = "col-lg-9 col-md-9 col-sm-9 col-xs-12";
                                } else {
                                    $button_class = "hide";
                                    $filter_class = "col-lg-9 col-md-9 col-sm-9 col-xs-12";
                                }
                                ?>
                                <div class="labels-form col-lg-3 col-md-3 col-sm-3 col-xs-12 <?= $button_class ?>"><a
                                            href="javascript:void(0);" class="btn orangeBg btn-block promotion-styles"
                                            onclick="fetch_special_offers();">View Special Offer <i
                                                class="fa fa-gift"></i></a></div>

                                <div class="col-sm-3" style="padding-left:0;">
                                    <p style="line-height: 36px;margin: 0;font-size: 16px;color: #006da4;"><strong>MATERIAL
                                            & COLOUR FILTER</strong></p>
                                </div>

                                <div class="labels-form <?= $filter_class ?>">
                                    <div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-11 col-xs-12">
                                        <div class="row new_filter">
                                            <div class="new_filter_dropdown">
                                                <div class="labels-form col-lg-7 col-md-7 col-sm-6 col-xs-4">
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
                                                                        <?= $paper_list->Material ?>
                                                                        <small>(<?= $paper_list->count ?>)</small> <br/>
                                                                        <small>
                                                                            <?= $paper_list->SpecText7 ?>
                                                                        </small> </a></li>
                                                            <? } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="labels-form col-lg-5 col-md-5 col-sm-6 col-xs-4">
                                                    <div class="btn-group btn-block dm-selector color-d-down"><a
                                                                class="btn btn-default btn-block dropdown-toggle disabled"
                                                                data-toggle="dropdown" aria-expanded="true">Sort By
                                                            Colour <i class="fa fa-unsorted"></i></a>
                                                        <ul class="dropdown-menu btn-block" style="top: 100%;">
                                                            <li class=""><a data-value="reset" data-id="color">Sort By
                                                                    Colour</a></li>
                                                            <? foreach ($color as $color_list) { ?>
                                                                <li class=""><a data-id="color"
                                                                                data-value="<?= $color_list->Color ?>">
                                                                        <?= $color_list->Color ?>
                                                                        - <small>
                                                                            <?= $color_list->SpecText7 ?>
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
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                        <div>
                                            <button onclick="window.location.reload();" class="btn orangeBg btn-block"
                                                    role="button"><i class="fa fa-refresh"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        <? if ($filter != 'disabled' and $this->agent->is_mobile()) { ?>
                            <div class="row">
                                <?php
                                if ($type == "A4") {
                                    $button_class = "invisible";
                                    $filter_class = "col-lg-11 col-md-11 col-sm-11 col-xs-12";
                                } else {
                                    $button_class = "hide";
                                    $filter_class = "col-lg-12 col-md-12 col-sm-12 col-xs-12";
                                }
                                ?>
                                <div class="row sort-filters hidden-lg hidden-md hidden-sm">
                                    <div class=" col-xs-12 labels-form hidden-lg hidden-md hidden-sm <?= $button_class ?>"
                                         style="margin-bottom:10px;"><a href="javascript:void(0);"
                                                                        class="btn orangeBg btn-block promotion-styles"
                                                                        onclick="fetch_special_offers();">View Special
                                            Offer <i class="fa fa-gift"></i></a></div>
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
                                                                data-toggle="dropdown" aria-expanded="true">Sort By
                                                            Material <i class="fa fa-unsorted"></i></a>
                                                        <ul class="dropdown-menu btn-block" style="top: 100%;">
                                                            <li class=""><a data-value="reset" data-id="material">Sort
                                                                    By Material</a></li>
                                                            <? foreach ($paper as $paper_list) { ?>
                                                                <li class=""><a data-id="material"
                                                                                data-value="<?= $paper_list->Material ?>">
                                                                        <?= $paper_list->Material ?>
                                                                        <small>(<?= $paper_list->count ?>)</small> <br/>
                                                                        <small>
                                                                            <?= $paper_list->SpecText7 ?>
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
                                                            <li class=""><a data-value="reset" data-id="color">Sort By
                                                                    Colour</a></li>
                                                            <? foreach ($color as $color_list) { ?>
                                                                <li class=""><a data-id="color"
                                                                                data-value="<?= $color_list->Color ?>">
                                                                        <?= $color_list->Color ?>
                                                                        - <small>
                                                                            <?= $color_list->SpecText7 ?>
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
                        <? } ?>
                        <?php if ($compitable): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="m-t-b-8"><small><strong>Disclaimer: </strong>AALabels products are not
                                            made or endorsed by Avery®. Avery® is a trademark of CCL Industries Inc.,
                                            registered in the UK and other countries. References to Avery® are solely
                                            used to indicate compatibility for label sizes and templates.</small></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
            <?php

            $class = $class2 = "";
            if (!isset($othermaterials)) {
                $class = "fetch_category_mateials";
                $class2 = "other_materials";
            }
            ?>
            <div class="<?= $class2 ?>">
                <div class="panel panel-default no-border mat-may-2017 <?= $class ?>">
                    <div class="panel-body no-padding">
                        <div class="colors_data mat-ch append_search"
                             id="<?= (isset($othermaterials) and $othermaterials != '') ? '' : 'ajax_material_sorting' ?>">
                            <? if (isset($othermaterials) and $othermaterials != '') {
                                $single_product = 'active';
                            }
                            include('material_list_view_a4.php'); ?>
                        </div>
                    </div>
                </div>
                <?
                if (isset($othermaterials) and $othermaterials != ''){
                $single_product = '';
                $materials = $othermaterials;
                ?>
                <div class="other_materials">
                    <div class="sort-filters filterBg p-l-r-10">
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="hide_title">Other Materials </h4>
                            </div>
                            <div class="col-md-10 hidden-xs">
                                <? if ($filter != 'disabled' and !$this->agent->is_mobile()) { ?>
                                    <div class="row">
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                            <div class="row">
                                                <?php
                                                if ($type == "A4") {
                                                    $button_class = "invisible";
                                                    $filter_class = "col-lg-9 col-md-9 col-sm-9 col-xs-12";
                                                } else {
                                                    $button_class = "invisible";
                                                    $filter_class = "col-lg-9 col-md-9 col-sm-9 col-xs-12";
                                                }
                                                ?>
                                                <div class="labels-form col-lg-3 col-md-3 col-sm-3 col-xs-3 <?= $button_class ?>">
                                                    <a href="javascript:void(0);"
                                                       class="btn orangeBg btn-block promotion-styles"
                                                       onclick="fetch_special_offers();">View Special Offer <i
                                                                class="fa fa-gift"></i></a></div>
                                                <div class="<?= $filter_class ?>">
                                                    <div class="row new_filter">
                                                        <div class="new_filter_dropdown">
                                                            <div class="labels-form col-lg-6 col-md-6 col-sm-6 col-xs-4">
                                                                <input name="material_mat" type="hidden"
                                                                       id="material_mat" class="fetch_category_mateials"
                                                                       value=""/>
                                                                <input name="color_mat" type="hidden" id="color_mat"
                                                                       class="fetch_category_mateials" value=""/>
                                                                <input name="adhesive_mat" type="hidden"
                                                                       id="adhesive_mat" class="fetch_category_mateials"
                                                                       value=""/>
                                                                <div class="btn-group btn-block dm-selector material-d-down">
                                                                    <a class="btn btn-default btn-block dropdown-toggle"
                                                                       data-toggle="dropdown" aria-expanded="true">Sort
                                                                        By Material <i class="fa fa-unsorted"></i></a>
                                                                    <ul class="dropdown-menu btn-block"
                                                                        style="top: 100%;">
                                                                        <li class=""><a data-value="reset"
                                                                                        data-id="material">Sort By
                                                                                Material</a></li>
                                                                        <? foreach ($paper as $paper_list) { ?>
                                                                            <li class=""><a data-id="material"
                                                                                            data-value="<?= $paper_list->Material ?>">
                                                                                    <?= $paper_list->Material ?>
                                                                                    <small>(<?= $paper_list->count ?>
                                                                                        )</small> <br/>
                                                                                    <small>
                                                                                        <?= $paper_list->SpecText7 ?>
                                                                                    </small> </a></li>
                                                                        <? } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="labels-form col-lg-6 col-md-6 col-sm-6 col-xs-4">
                                                                <div class="btn-group btn-block dm-selector color-d-down">
                                                                    <a class="btn btn-default btn-block dropdown-toggle disabled"
                                                                       data-toggle="dropdown" aria-expanded="true">Sort
                                                                        By Colour <i class="fa fa-unsorted"></i></a>
                                                                    <ul class="dropdown-menu btn-block"
                                                                        style="top: 100%;">
                                                                        <li class=""><a data-value="reset"
                                                                                        data-id="color">Sort By
                                                                                Colour</a></li>
                                                                        <? foreach ($color as $color_list) { ?>
                                                                            <li class=""><a data-id="color"
                                                                                            data-value="<?= $color_list->Color ?>">
                                                                                    <?= $color_list->Color ?>
                                                                                    - <small>
                                                                                        <?= $color_list->SpecText7 ?>
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
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <div>
                                                <button onclick="window.location.reload();"
                                                        class="btn orangeBg btn-block" role="button"><i
                                                            class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="panel panel-default no-border mat-may-2017 mat-sep-2017 fetch_category_mateials">
                        <div class="panel-body no-padding">
                            <div class="mat-ch">
                                <div class="colors_data mat-ch append_search"
                                     id="<?= (isset($othermaterials) and $othermaterials != '') ? 'ajax_material_sorting' : '' ?>">
                                    <?
                                    $productid = "";

                                    include('material_list_view_a4.php');
                                    //echo $productid;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? } ?>
                    <div class="clear"></div>
                    <div class="panel panel-default no-border mat-may-2017 other_mats" style="display:none">
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
</div>
<!-- Upload Artwork -->
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
<!-- Upload Artwork -->
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
                                                           alt="<?= $catname ?>" title="<?= $catname ?>" width="46"
                                                           height="46" class="m-t-b-10 img-Sheet-material"></div>
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
                                fitness for use as sheet labels (A4, A3 &amp; SRA3) produced by AA Labels. No guarantee
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
<!-- Material Detail modal -->
<!-- Sample Order implementation -->
<div class="modal fade pbreaks aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content no-padding">
            <div class="panel no-margin">
                <div class="panel-heading">
                    <h3 class="pull-left no-margin"><b class="pull-left">VOLUME PRICE BREAKS
                            <?= strtoupper($Paper_size) ?>
                        </b>
                        <? if (strtolower($Paper_size) == 'a4 sheets') { ?>
                            <span class="label label-danger pull-left hppp-title-text">(Half Price Print Promotion off prices shown below)</span>
                        <? } ?>
                        <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <div id="price_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image"
                                        style="width:139px; height:29px; "></div>
                        </div>
                        <div class="table-res table-responsive" id="ajax_price_breaks"></div>
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
        $(this).parents('.upload_row').find('.remove_image_link').show();
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

    $(document).on("click", ".remove_image_link", function (e) {
        $("#preview_po_img").trigger("click");
    });
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
                    $('.remove_image_link').hide();
                }
            });
    });
    $(document).on("click", ".productdetails .plain_calculation_unit li a", function (e) {

        var minqty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var maxqty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());

        var qty = parseInt($(this).parents('.productdetails').find('.plainsheet_input').val());
        var labelspersheet = parseInt($(this).parents('.productdetails').find('.LabelsPerSheet').val());
        var selText = $(this).text();
        var old_val = $(this).parents('.input-group-btn').find('.dropdown-toggle').text();
        if ($.trim(old_val) == $.trim(selText)) {
            return true;
        }

        if (selText == 'Labels') {
            var milabels = parseInt(labelspersheet * minqty);
            $(this).parents('.productdetails').find('.plainsheet_input').attr('placeholder', 'Minimum ' + milabels);
            $(this).parents('.productdetails').find('.small_plain_minqty_txt').text('Minimum order ' + milabels + ' labels');
            qty = parseInt(labelspersheet * qty);
            if (qty >= milabels) {
                $(this).parents('.productdetails').find('.plainsheet_input').val(qty)
            } else {
                $(this).parents('.productdetails').find('.plainsheet_input').val('');
                $(this).parents('.productdetails').find('.plainsheet_input').focus();
            }
        } else {
            $(this).parents('.productdetails').find('.plainsheet_input').attr('placeholder', 'Minimum ' + minqty);
            $(this).parents('.productdetails').find('.small_plain_minqty_txt').text('Minimum order ' + minqty + ' sheets');
            qty = parseInt(qty / labelspersheet);
            if (qty >= minqty) {
                $(this).parents('.productdetails').find('.plainsheet_input').val(qty)
            } else {
                $(this).parents('.productdetails').find('.plainsheet_input').val('');
                $(this).parents('.productdetails').find('.plainsheet_input').focus();
            }

            //$(this).parents('.productdetails').find('.calculation_unit').val('sheets');
        }
        $(this).parents('.input-group-btn').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');

    });
    $(document).on("click", ".productdetails .print_calculation_unit li a", function (e) {

        var minqty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var maxqty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());

        var qty = parseInt($(this).parents('.productdetails').find('.printedsheet_input').val());
        var labelspersheet = parseInt($(this).parents('.productdetails').find('.LabelsPerSheet').val());
        var selText = $(this).text();
        var old_val = $(this).parents('.input-group-btn').find('.dropdown-toggle').text();
        if ($.trim(old_val) == $.trim(selText)) {
            return true;
        }
        if (selText == 'Labels') {
            var milabels = parseInt(labelspersheet * minqty);
            $(this).parents('.productdetails').find('.printedsheet_input').attr('placeholder', 'Minimum ' + milabels);
            $(this).parents('.productdetails').find('.small_print_minqty_txt').text('Minimum order ' + milabels + ' labels');
            qty = parseInt(labelspersheet * qty);
            if (qty >= milabels) {
                $(this).parents('.productdetails').find('.printedsheet_input').val(qty)
            } else {
                $(this).parents('.productdetails').find('.printedsheet_input').val('');
                $(this).parents('.productdetails').find('.printedsheet_input').focus();
            }
        } else {
            $(this).parents('.productdetails').find('.printedsheet_input').attr('placeholder', 'Minimum ' + minqty);
            $(this).parents('.productdetails').find('.small_print_minqty_txt').text('Minimum order ' + minqty + ' sheets');
            qty = parseInt(qty / labelspersheet);
            if (qty >= minqty) {
                $(this).parents('.productdetails').find('.printedsheet_input').val(qty)
            } else {
                $(this).parents('.productdetails').find('.printedsheet_input').val('');
                $(this).parents('.productdetails').find('.printedsheet_input').focus();
            }

            //$(this).parents('.productdetails').find('.calculation_unit').val('sheets');
        }
        $(this).parents('.input-group-btn').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');

    });
    $(document).on("click", ".productdetails .dm-selector li a", function (e) {
        var selText = $(this).text();
        var value = $(this).attr('data-value');
        if (value.length > 0) {
            $(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <i class="fa fa-unsorted"></i>');
            $(this).parents('.productdetails').find('.digitalprintoption').val(value);
        } else {
            $(this).parents('.btn-group').find('.dropdown-toggle').html('Select Digital Print Process <i class="fa fa-unsorted"></i>');
            $(this).parents('.productdetails').find('.digitalprintoption').val('');
        }
        reset_print_input_buttons(this);
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
        var type = 'a4';
        var unitqty = $('#cartunitqty').val();


        unitqty = $.trim(unitqty);
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
                            unitqty: unitqty
                        },
                        success: function (data) {
                            data = $.parseJSON(data);
                            if (!data == '') {
                                update_printed_quantity_box(data.qty, data.designs);
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
        var unitqty = $(this).parents('.productdetails').find('.printedsheet_unit').text(); //Sheets Labels
        unitqty = $.trim(unitqty);
        var _this = this;
        parent_selector = this;

        $('#ajax_artwork_uploads').html('');
        $('#artworks_uploads_loader').show();
        $.ajax({
            url: base + 'ajax/view_artworks_content',
            type: "POST",
            async: "false",
            data: {
                manfactureid: manfactureid,
                product_id: product_id,
                type: '<?=$Paper_size?>',
                labelspersheet: labels,
                cart_id: cart_id,
                unitqty: unitqty,
            },
            dataType: "html",
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    update_printed_quantity_box(data.qty, data.designs);
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

    $(document).on("blur", ".labels_input", function (e) {

        var min_qty = parseInt($('#labels_p_sheet').val());
        var unitqty = $('#cartunitqty').val();
        unitqty = $.trim(unitqty);
        var labels = parseInt($(this).val());

        if (!is_numeric(labels)) {
            show_faded_popover(this, "please enter only numbers ");
            $(this).val('');
            return false;
        } else if (labels == 0 && unitqty == 'Sheets') {
            show_faded_popover(this, "Minimum 1 sheet required ");
            $(this).val('');
            return false;
        } else if ((labels == 0 || labels < min_qty) && unitqty == 'Labels') {
            show_faded_popover(this, "Minimum " + min_qty + " labels are required ");
            $(this).val('');
            return false;
        } else if (labels % min_qty != 0 && unitqty == 'Labels') {
            var multipyer = min_qty * parseInt(parseInt(labels / min_qty) + 1);
            $(this).val(multipyer);
            total_upload_labels();
            show_faded_popover(this, "Quantity has been amended for production as " + multipyer + " Labels.");
            $(this).focus();
            return false;
        } else {
            total_upload_labels();
        }

    });

    function total_upload_labels() {
        var total_labels = 0;
        var total_sheets = 0;

        var min_qty = $('#labels_p_sheet').val();
        var unitqty = $('#cartunitqty').val();

        $(".labels_input").each(function (index) {
            if ($(this).val() !== '') {
                if (unitqty == 'Labels') {
                    var labels = parseInt($(this).val());
                    var sheets = parseInt(labels / min_qty);
                    $(this).parents('.upload_row').find('.displaysheets').text(sheets);

                } else {
                    var sheets = parseInt($(this).val());
                    var labels = parseInt(sheets * min_qty);
                    $(this).parents('.upload_row').find('.displaysheets').text(labels);
                }

                total_labels += labels;
                total_sheets += sheets;
            }
        });

        if (total_sheets != 'NaN') {
            if (unitqty == 'Labels') {
                $('.total_user_labels').html(total_sheets);
                $('.total_user_sheet').html(total_labels);
            } else {
                $('.total_user_labels').html(total_labels);
                $('.total_user_sheet').html(total_sheets);
            }

            var labels = parseInt($('#acutal_labels').val());
            var acutal_qty = parseInt($('#acutal_qty').val());
            var labelspersheets = parseInt($('#labels_p_sheet').val());
            var reaming = parseInt(acutal_qty) - parseInt(total_sheets);
            if (reaming < 0) {
                $('.remaing_user_sheets').html('0');
                $('.remaing_user_labels').html('0');
            } else {
                if (unitqty == 'Labels') {
                    $('.remaing_user_sheets').html(reaming * labelspersheets);
                    $('.remaing_user_labels').html(reaming);
                } else {
                    $('.remaing_user_sheets').html(reaming);
                    $('.remaing_user_labels').html(reaming * labelspersheets);
                }
            }
            $('#upload_remaining_labels').val(reaming);
        }
    }

    $(document).on("click", ".save_artwork_file", function (e) {
        var _this = this;
        var cartid = $('#cartid').val();
        var prdid = $('#cartproductid').val();
        var labelpersheets = $('#labels_p_sheet').val();
        var type = 'a4';
        var cartunitqty = $('#cartunitqty').val();

        var artworkname = $(_this).parents('.upload_row').find('.artwork_name').val();
        var file = $(_this).parents('.upload_row').find('.artwork_file').val();
        var uploadfile = $(_this).parents('.upload_row').find('.artwork_file')[0].files[0];

        var response = '';

        if (cartunitqty == 'Labels') {
            var labels = $(_this).parents('.upload_row').find('.labels_input').val();
            if (labels.length == 0) {
                var id = $(_this).parents('.upload_row').find('.labels_input');
                var popover = $(_this).parents('.upload_row').find('.popover').length;
                if (popover == 0) {
                    show_faded_popover(id, "Minimum " + labelpersheets + " labels are required ");
                }
                return false;
            }
            var sheets = parseInt(labels / labelpersheets);
            var lb_txt = 'labels';
        } else {
            var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
            if (sheets.length == 0) {
                var id = $(_this).parents('.upload_row').find('.labels_input');
                var popover = $(_this).parents('.upload_row').find('.popover').length;
                if (popover == 0) {
                    show_faded_popover(id, "Minimum 1 sheet required ");
                }
                return false;
            }
            var labels = parseInt(sheets * labelpersheets);
            var lb_txt = 'sheets';
        }

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
            form_data.append("unitqty", cartunitqty);
            type = uploadfile.type;

            if (type != 'image/tiff' && type != 'image/png' && type != 'image/jpg' && type != 'image/gif' && type != 'image/jpeg' && type != 'application/pdf' && type != 'application/postscript') {
                swal("Not Allowed", "We apologise, because this file type cannot be uploaded. \n\n Please retry using one of the following file formats: EPS; GIF; JPEG; JPG; PDF & PNG", "warning");
                return false;
            } else {
                upload_printing_artworks(form_data);
            }
        }
    });
    $(document).on("click", ".sheet_updater", function (event) {

        var id = $(this).attr('data-id');
        var _this = this;
        var cartid = $('#cartid').val();
        var prdid = $('#cartproductid').val();
        var labelpersheets = $('#labels_p_sheet').val();
        var type = 'a4';
        var cartunitqty = $('#cartunitqty').val();
        var artwork_name = $(this).parents(".upload_row").find(".artwork_name").val();
        var artwork_field = $(this).parents(".upload_row").find(".artwork_name");

        if (artwork_name == "") {
            show_faded_popover(artwork_field, "Please enter artwork name");
            return false;
        }
        if (cartunitqty == 'Labels') {
            var labels = $(_this).parents('.upload_row').find('.labels_input').val();
            if (labels.length == 0 || labels == 0 || labels == '') {
                var id = $(_this).parents('.upload_row').find('.labels_input');
                var popover = $(_this).parents('.upload_row').find('.popover').length;
                if (popover == 0) {
                    show_faded_popover(id, "Minimum " + labelpersheets + " labels are required ");
                }
                return false;
            }
            var sheets = parseInt(labels / labelpersheets);
        } else {
            var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
            if (sheets.length == 0 || sheets == 0 || sheets == '') {
                var id = $(_this).parents('.upload_row').find('.labels_input');
                var popover = $(_this).parents('.upload_row').find('.popover').length;
                if (popover == 0) {
                    show_faded_popover(id, "Minimum 1 sheet required ");
                }
                return false;
            }
            var labels = parseInt(sheets * labelpersheets);
        }
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
                unitqty: cartunitqty,
                artwork_name: artwork_name,
            },
            success: function (data) {
                data = $.parseJSON(data);
                if (!data == '') {
                    update_printed_quantity_box(data.qty, data.designs);
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

                    update_printed_quantity_box(data.qty, data.designs);

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

    function update_printed_quantity_box(qty, designs) {
        var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
        $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).val(designs);
        var unitqty = $(parent_selector).parents('.productdetails').find('.printedsheet_unit').text();
        var labels = $(parent_selector).parents('.productdetails').find('.LabelsPerSheet').val();
        unitqty = $.trim(unitqty);
        if (unitqty == 'Labels') {
            var sheets = parseInt(qty / labels);
        } else {
            var sheets = qty;
        }
        $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-qty', sheets);
        var old_quantity = parseInt($(parent_selector).parents('.productdetails').find('.printedsheet_input').val());
        if (qty > 0) {
            $(parent_selector).parents('.productdetails').find('.printedsheet_input').val(qty);
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
            var btnhtml = '<i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwork';
            $(_this).parents('.productdetails').find('.artwork_uploader').html(btnhtml);
        }
    }

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
        //console.log('Adhesive option: '+adhesive);
        //var mat_code = $(_this).find("img").attr("src");

        //console.log("Finish: "+finish+" Material:"+material+" Colour:"+colour);


        var mat_code = $(_this).parents('.productdetails').find("img").attr("src");

        // console.log(mat_code);
        //if(mat_code.match(/CSC/) && material == 'Luxury Paper')
        if (finish == 'Matt' && material == 'Luxury Paper' && colour == 'Luxury White') {
            colour = "Luxury White";
            finish = "Matt White";
            material = "Paper";

            //console.log(' CSC Material Change');
        }
        reset_plain_input_buttons(_this);
        reset_print_input_buttons(_this);


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
                catid: '<?=$details['CategoryID']?>',
                type: 'Sheets',
            },
            success: function (data) {

                $('#aa_loader').hide();
                if (data.response == 'notfound') {
                    alert_box('Sorry this product is out of stock this time.');
                } else {
                    var img_path = '<?=Assets?>images/categoryimages/A4Sheets/euro_edges/' + data.material_code + '.png';
                    $('.euro_thumbnail').attr('src', img_path);
                    $(_this).parents('.productdetails').find('.product_adhesive').html(data.adhesive_option);


                    $(_this).parents('.productdetails').find('.product_material_image').attr('src', data.sheet_image);
                    $(_this).parents('.productdetails').find('.product_name').html(data.product_name);
                    $(_this).parents('.productdetails').find('.product_description').html(data.product_description);

                    $(_this).parents('.productdetails').find('.category_description').val(data.category_description);


                    $(_this).parents('.productdetails').find('.product_id').val(data.product_id);
                    $(_this).parents('.productdetails').find('.manfactureid').val(data.manfactureid);

                    $(_this).parents('.productdetails').find('#minimum_quantities').val(data.minimum);
                    $(_this).parents('.productdetails').find('#maximum_quantities').val(data.maximum);
                    $(_this).parents('.productdetails').find('.PrintableProduct').val(data.Printable);

                    $(_this).parents('.productdetails').find('.laser_printer_img').attr('src', data.laser_img);
                    $(_this).parents('.productdetails').find('.inkjet_printer_img').attr('src', data.inkjet_img);
                    $(_this).parents('.productdetails').find('.direct_printer_img').attr('src', data.thermal_img);
                    $(_this).parents('.productdetails').find('.thermal_printer_img').attr('src', data.d_thermal_img);


                    $(_this).parents('.productdetails').find('.laser_printer_div').attr('data-original-title', data.laser_text);
                    $(_this).parents('.productdetails').find('.inkjet_printer_div').attr('data-original-title', data.inkjet_text);
                    $(_this).parents('.productdetails').find('.thermal_printer_div').attr('data-original-title', data.thermal_text);
                    $(_this).parents('.productdetails').find('.direct_printer_div').attr('data-original-title', data.d_thermal_text);

                    $(_this).parents('.productdetails').find("[data-toggle=tooltip-product]").tooltip();

                    $('.selected-product').find('.pr-thumb').find('img').attr('src', data.sheet_image);
                    $('#ajax_layout_spec').find('img.design-image').attr('src', data.sheet_image);


                    if (data.EuroID) {
                        $(_this).parents('.productdetails').find('.printer_edge').removeClass('hide').addClass('show');
                    } else {
                        $(_this).parents('.productdetails').find('.printer_edge').removeClass('show').addClass('hide');
                    }


                    if (data.Printable == 'N') {
                        $(_this).parents('.productdetails').find('.printedoption').removeClass('active').addClass('hide');
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
                    }

                    var designs = $(_this).parents('.productdetails').find('#uploadedartworks_' + data.product_id).val();
                    update_artwork_upload_btn(_this, parseInt(designs));

                }
            }
        });
    }

    $(document).on("focus", ".plainsheet_input", function (e) {
        reset_plain_input_buttons(this);
    });
    $(document).on("focus", ".printedsheet_input", function (e) {
        reset_print_input_buttons(this);
    });

    function reset_plain_input_buttons(_this) {
        $(_this).parents('.productdetails').find('.plainprice_box').hide();
        $(_this).parents('.productdetails').find('.add_plain').hide();
        $(_this).parents('.productdetails').find('.plain_save_txt').hide();
        $(_this).parents('.productdetails').find('.addprintingoption').hide();
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
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());
        var input_id = $(this).parents('.productdetails').find('.plainsheet_input');
        var qty = parseInt(input_id.val());
        var unitqty = $(this).parents('.productdetails').find('.plainsheet_unit').text(); //Sheets Labels
        unitqty = $.trim(unitqty);
        var _this = this;
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
            return false;
        } else if (qty > max_qty) {
            input_id.val(max_qty);
            if (unitqty == 'Labels') {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' labels.');
            } else {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' sheets.');
            }
            return false;
        } else {
            if (qty % labels != 0 && unitqty == 'Labels') {
                var multipyer = parseInt(labels) * parseInt(parseInt(qty / labels) + 1);
                input_id.val(multipyer);
                var qty = multipyer;
            }
            if (unitqty == 'Labels') {
                qty = parseInt(qty / labels);
            }
            change_btn_state(_this, 'disable', 'plain');
            $.ajax({
                url: base + 'ajax/calculate_sheet_price',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id, labels: labels, labeltype: 'plain', printprice: 'enabled'},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            change_btn_state(_this, 'enable', 'plain');
                            $(_this).parents('.productdetails').find('.calculate_plain').hide();
                            $(_this).parents('.productdetails').find('.add_plain').show();
                            $(_this).parents('.productdetails').find('.addprintingoption').show();
                            $(_this).parents('.productdetails').find('.plain_save_txt').html(data.save_txt).show();
                            //$('#delivery_txt'+id).html(' <i class="cBlue  f-20 fa fa-truck"></i> '+data.delivery_txt);
                            $(_this).parents('.productdetails').find('.plainprice_text').html(data.price);
                            $(_this).parents('.productdetails').find('.original_price').html('<b class="pr-sm">' + data.symbol + data.original_price + '</b>');
                            $(_this).parents('.productdetails').find('.promotion_price').html('-<b class="pr-sm">' + data.symbol + data.promotion_price_txt + '</b>');
                            if (data.promotion_price_txt == null || data.promotion_price_txt == 0 || data.promotion_price_txt == 0.00) {
                                $(_this).parents('.productdetails').find('.plainprice_box').find('tr.plainprice').hide();
                                $(_this).parents('.productdetails').find('.plainprice_box').find('tr.halfprintprice').hide();
                            } else {
                                $(_this).parents('.productdetails').find('.plainprice_box').find('tr.plainprice').show();
                                $(_this).parents('.productdetails').find('.plainprice_box').find('tr.halfprintprice').show();
                                $(_this).parents('.productdetails').find('.plainprice_box').find('.percentage_discount').text(data.percentage_discount);

                            }
                            $(_this).parents('.productdetails').find('.plainperlabels_text').html(data.labelprice);
                            $(_this).parents('.productdetails').find('.plainprice_box').show();
                            if (Printable == 'Y') {
                                $(_this).parents('.productdetails').find('.printing_offer_text').html(data.symbol + '' + data.onlyprintprice);
                                $(_this).parents('.productdetails').find('.addprintingoption').removeClass('hide');
                            }
                        }
                    }
                }
            });
        }
    });
    $(document).on("click", ".calculate_printed", function (e) {
        var id = $(this).parents('.productdetails').find('.product_id').val();
        var cart_id = $(this).parents('.productdetails').find('.cart_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var printing = $(this).parents('.productdetails').find('.digitalprintoption').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());
        var unitqty = $(this).parents('.productdetails').find('.printedsheet_unit').text(); //Sheets Labels
        var upload_qty = parseInt($(this).parents('.productdetails').find('#uploadedartworks_' + id).attr('data-qty'));
        var artworks = parseInt($(this).parents('.productdetails').find('#uploadedartworks_' + id).val());

        unitqty = $.trim(unitqty);

        var input_id = $(this).parents('.productdetails').find('.printedsheet_input');
        var qty = input_id.val();
        var _this = this;
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
        } else if (qty > max_qty) {
            input_id.val(max_qty);
            if (unitqty == 'Labels') {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' labels.');
            } else {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' sheets.');
            }
        } else if (printing == '' || printing.length == 0) {
            swal({
                title: "Please Select",
                text: "Digital Print Process ",
                confirmButtonText: "Continue",
                type: "",
            });
        } else {
            if (printing == '4 Colour Digital Process') {
                var printing = 'Fullcolour';
            } else {
                var printing = 'Mono';
            }


            if (qty % labels != 0 && unitqty == 'Labels') {
                var multipyer = parseInt(labels) * parseInt(parseInt(qty / labels) + 1);
                input_id.val(multipyer);
                var qty = multipyer;
            }

            if (unitqty == 'Labels') {
                qty = parseInt(qty / labels);
                //upload_qty = parseInt(upload_qty/labels);
            }
            if (artworks > 1 && upload_qty != qty && upload_qty != 0) {
                $(this).parents('.productdetails').find('.artwork_uploader').click();
                alert_box("You have changed the quantity of " + unitqty + " please amend quantities against each uploaded artwork.");
                return false;
            }

            change_btn_state(_this, 'disable', 'printed');
            $.ajax({
                url: base + 'ajax/calculate_sheet_price',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id, labels: labels, labeltype: printing, cart_id: cart_id},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            change_btn_state(_this, 'enable', 'printed');
                            $(_this).parents('.productdetails').find('.calculate_printed').hide();
                            $(_this).parents('.productdetails').find('.add_printed').show();
                            if (printing == 'Fullcolour') {
                                $(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.phead').text('Printed Full Color');
                            } else if (printing == 'Mono') {
                                $(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.phead').text('Printed Black');
                            }

                            $(_this).parents('.productdetails').find('.printedprice_box .price .plainprice').find('.plaintext').html('<b class="pr-sm">' + data.symbol + data.plain + '</b>');
                            $(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.printtext').html('<b class="pr-sm">' + data.symbol + data.halfprintprice + '</b>');
                            $(_this).parents('.productdetails').find('.printedprice_box .price .halfprintprice').find('.halfprinttext').html('-<b class="pr-sm">' + data.symbol + data.printprice + '</b>');

                            $(_this).parents('.productdetails').find('.printedprice_box .price .no_design').find('.phead').html(data.artworks + ' Design Free');
                            $(_this).parents('.productdetails').find('.printedprice_box .price .desgincharge').find('.desginprice').html('<b class="pr-sm">' + data.symbol + data.designprice + '</b>');

                            $(_this).parents('.productdetails').find('.printedprice_text').html(data.price);
                            $(_this).parents('.productdetails').find('.printedperlabels_text').html(data.labelprice);
                            $(_this).parents('.productdetails').find('.printedprice_box').show();

                        }
                    }
                }
            });
        }
    });
    $(document).on("click", ".add_plain", function (e) {
        var id = $(this).parents('.productdetails').find('.product_id').val();
        var prd_name = $(this).parents('.productdetails').find('.product_name').text();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var category_description = $(this).parents('.productdetails').find('.category_description').val();
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());
        var input_id = $(this).parents('.productdetails').find('.plainsheet_input');
        var qty = parseInt(input_id.val());
        var unitqty = $(this).parents('.productdetails').find('.plainsheet_unit').text(); //Sheets Labels
        unitqty = $.trim(unitqty);
        var _this = this;
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
            return false;
        } else if (qty > max_qty) {
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
            change_btn_state(_this, 'disable', 'plain');
            $.ajax({
                url: base + 'ajax/add_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id, labeltype: 'plain'},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            change_btn_state(_this, 'enable', 'plain');
                            fireRemarketingTag('Add to cart');

                            ecommerce_add_to_cart(_this, 'plain');


                            //popup_messages(menuid+' - '+prd_name);
                            popup_messages(category_description);
                            $('#cart').html(data.top_cart);
                        }
                    }
                }
            });
        }
    });
    $(document).on("click", ".add_printed", function (e) {
        var product_id = $(this).parents('.productdetails').find('.product_id').val();
        var prd_name = $(this).parents('.productdetails').find('.product_name').text();
        var cart_id = $(this).parents('.productdetails').find('.cart_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var category_description = $(this).parents('.productdetails').find('.category_description').val();
        var labels = $(this).parents('.productdetails').find('.LabelsPerSheet').val();
        var printing = $(this).parents('.productdetails').find('.digitalprintoption').val();
        var min_qty = parseInt($(this).parents('.productdetails').find('.minimum_quantities').val());
        var max_qty = parseInt($(this).parents('.productdetails').find('.maximum_quantities').val());
        var unitqty = $(this).parents('.productdetails').find('.printedsheet_unit').text(); //Sheets Labels
        unitqty = $.trim(unitqty);
        var input_id = $(this).parents('.productdetails').find('.printedsheet_input');
        var qty = input_id.val();
        var _this = this;
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
            return false;
        } else if (qty > max_qty) {
            input_id.val(max_qty);
            if (unitqty == 'Labels') {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' labels.');
            } else {
                show_faded_popover(input_id, 'Quantity has been amended for production as ' + max_qty + ' sheets.');
            }
            return false;
        } else if (printing == '' || printing.length == 0) {
            swal({
                title: "Please Select",
                text: "Digital Print Process ",
                confirmButtonText: "Continue",
                type: "",
            });
            return false;
        } else {
            if (printing == '4 Colour Digital Process') {
                var printing = 'Fullcolour';
            } else {
                var printing = 'Mono';
            }
            if (unitqty == 'Labels') {
                qty = parseInt(qty / labels);
            }
            var designs = $(this).parents('.productdetails').find('#uploadedartworks_' + product_id).val();
            if (designs == 0) {
                swal({
                        title: "Did you forget something?",
                        text: "You can upload your artwork by clicking on the blue “BACK & ADD ARTWORK” button and continue to place your order.\n\nAlternatively you can proceed to place your order by clicking on the orange “CONTINUE & ADD TO BASKET” button and supply your artwork via email later.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn orangeBg",
                        confirmButtonText: "CONTINUE & ADD TO BASKET",
                        cancelButtonClass: "btn blueBg",
                        cancelButtonText: "BACK & ADD ARTWORK",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            //console.log('continue');
                            change_btn_state(_this, 'disable', 'printed');
                            $.ajax({
                                url: base + 'ajax/add_products_incart',
                                type: "POST",
                                async: "false",
                                dataType: "html",
                                data: {
                                    qty: qty,
                                    menuid: menuid,
                                    prd_id: product_id,
                                    labeltype: printing,
                                    cartid: cart_id,
                                    labels: labels
                                },
                                success: function (data) {
                                    if (!data == '') {
                                        data = $.parseJSON(data);
                                        if (data.response == 'yes') {
                                            change_btn_state(_this, 'enable', 'printed');
                                            fireRemarketingTag('Add to cart');
                                            ecommerce_add_to_cart(_this, 'printed');


                                            $(_this).parents('.productdetails').find('#uploadedartworks_' + product_id).val(0);
                                            $(_this).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-qty', 0);
                                            update_artwork_upload_btn(_this, 0);

                                            //popup_messages(menuid+' - '+prd_name);
                                            popup_messages(category_description);
                                            $('#cart').html(data.top_cart);
                                        }
                                    }
                                }
                            });
                        }
                    });
            } else {
                change_btn_state(_this, 'disable', 'printed');
                $.ajax({
                    url: base + 'ajax/add_products_incart',
                    type: "POST",
                    async: "false",
                    dataType: "html",
                    data: {
                        qty: qty,
                        menuid: menuid,
                        prd_id: product_id,
                        labeltype: printing,
                        cartid: cart_id,
                        labels: labels
                    },
                    success: function (data) {
                        if (!data == '') {
                            data = $.parseJSON(data);
                            if (data.response == 'yes') {
                                change_btn_state(_this, 'enable', 'printed');
                                fireRemarketingTag('Add to cart');
                                ecommerce_add_to_cart(_this, 'printed');

                                $(_this).parents('.productdetails').find('#uploadedartworks_' + product_id).val(0);
                                $(_this).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-qty', 0);
                                update_artwork_upload_btn(_this, 0);
                                //popup_messages(menuid+' - '+prd_name);
                                popup_messages(category_description);

                                $('#cart').html(data.top_cart);
                            }
                        }
                    }
                });

            }


        }

    });
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
    $(document).on("click", ".rsample", function (e) {

        var p_code = $(this).parents('.productdetails').find('.product_id').val();
        var menuid = $(this).parents('.productdetails').find('.manfactureid').val();
        var prd_name = $(this).parents('.productdetails').find('.product_name').text();
        var _this = $(this);
        if (menuid) {
            change_btn_state(_this, 'disable', 'sample');
            $.ajax({
                url: base + 'ajax/add_sample_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: 1, menuid: menuid, prd_id: p_code},
                success: function (data) {
                    if (!data == '') {
                        change_btn_state(_this, 'enable', 'sample');
                        $(".requestsample").modal('hide');
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            var sample_txt = "Thank you for requesting a sample which has been added to your basket and upon checkout a free-of-charge A4 sheet of the material chosen will be sent to you. \n\n Please note: This is a material and adhesive sample only and will no not therefore match the label shape and size on this page.";
                            //swal("Material Sample Added to Basket",sample_txt,"success");
                            popup_messages(sample_txt);
                            //popup_messages(menuid+' - '+prd_name+' - Sample ');
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
    });
    var contentbox = $('#ajax_labelfilter');
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip-digital"]').tooltip();
        $("[data-toggle=tooltip-product]").tooltip();
        $(':not([data-toggle="popover"])').popover('hide');
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
    //$('[data-filters="Polyethylene"]').hide();
    //
    function fetch_special_offers() {
        $('#aa_loader').show();
        var visible = $(".other_materials [data-promotion='yes']");
        $('.fetch_category_mateials').find('.append_search').append(visible);
        var others = $(".other_materials [data-promotion='no']");
        $(others).show();
        $('.other_mats').find('.append_search').append(others);
        $('.other_mats').show();
        $('.hide_title').text("Filtered Results");
        $('#aa_loader').hide();
    }

    function fetch_category_mateials() {
        var catid = '<?=$details['CategoryID']?>';
        var material = $('#material_mat').val();
        var adhesive = $('#adhesive_mat').val();
        var color = $('#color_mat').val();
        var top = $('#material_mat').offset().top;
        top = top + 100;
        $('.loading-gif').css('top', top);
        $('#aa_loader').show();
        <?php if(isset($_GET['productid']) and $_GET['productid'] != ''):?>
        var productid = '<?=$_GET['productid']?>';
        <?php else:?>
        var productid = '';
        <?php endif;?>
        $.ajax({
            url: base + 'ajax/get_category_materials_newfilter/',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                material: material,
                adhesive: adhesive,
                color: color,
                catid: catid,
                productid: productid,
                type: "<?=$type?>"
            },
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
                                        if (isdisabled != 'disabled') {
                                            $(_this).find('.product_adhesive option[value="' + adhesive + '"]').attr('selected', 'selected');
                                        }
                                    }
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

                    if (material == "" && color == "") {
                        $(".other_mats").hide();
                    } else {
                        $(".other_mats").show();
                    }

                }
            }
        });
    }

    function fireRemarketingTag(page) {
        <? if(SITE_MODE == 'live'){?>
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
        <? } ?>
    }

    function ecommerce_add_to_cart(_this, type) {
        <? if(SITE_MODE == 'live'){ ?>

        var prdid = $(_this).parents('.productdetails').find('.product_id').val();
        //var product_name =  $(_this).parents('.productdetails').find('.product_name').text();
        var product_name = $(_this).parents('.productdetails').find('.category_description').val();
        var category = '<?=$Paper_size?>';


        if (type == 'printed') {
            var input_id = $(_this).parents('.productdetails').find('.printedsheet_input');
            var quantity = parseInt(input_id.val());
            var price = $(_this).parents('.productdetails').find('.printedprice_text').find('.color-orange').text();
            var category = " Printed - " + category;
            var price = price.replace(/[^\d.]/g, '');

        } else if (type == 'sample') {
            var price = 0.00;
            var category = " Sample - " + category;
            var quantity = 1
        } else {
            var input_id = $(_this).parents('.productdetails').find('.plainsheet_input');
            var quantity = parseInt(input_id.val());
            var price = $(_this).parents('.productdetails').find('.plainprice_text').find('.color-orange').text();
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

    $(document).ready(function () {
        //$(".product_material_image").aaZoom();

        $(".product_material_image").hover(function (e) {
            var value = $(this).aaZoom();
        });
        $('.product_material_image').aaZoom();
    });
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
