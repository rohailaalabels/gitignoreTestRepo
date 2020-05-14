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
</style>
<?
$popup_margin = '';
$x = explode("-", $details['CategoryName']);
$catname = $x[0];
$code = explode('.', $details['CategoryImage']);

$newcatname = explode(" ", $details['CategoryName']);
$heading = $newcatname[0] . " " . $newcatname[2] . " " . $newcatname[3] . " " . $newcatname[4] . " " . $newcatname[5];
if ($details['Shape_upd'] == "Circular") {
    $LabelSize = str_replace("Label Size:", "", $details['specification3']);
} else {
    $LabelSize = " Width " . $details['LabelWidth'] . "&nbsp;&nbsp; x &nbsp;Height&nbsp; " . $details['LabelHeight'];
}
if (preg_match("/SRA3/", $details['CategoryName'])) {
    $Paper_size = "SRA3 Sheets";
    $img_src = Assets . "images/categoryimages/SRA3Sheets/" . $details['CategoryImage'];
    $width = '220';
    $height = 'auto';
    $pop_width = '200';

    $box_height = 'min-height:325px;';
    $popup_margin = 'margin:6px auto !important;';
    $type = "SRA3";
} else if (preg_match("/A5/", $details['CategoryName'])) {
    $Paper_size = "A5 Sheets";
    $img_src = Assets . "images/categoryimages/A5Sheets/" . $details['CategoryImage'];
    $width = '210';
    $height = 'auto';
    $box_height = 'min-height:325px;';
    $pop_width = '210';
    $popup_margin = 'margin:6px auto !important;';
    $type = "A5";
} else if (preg_match("/A3/", $details['CategoryName'])) {
    $Paper_size = "A3 Sheets";
    $img_src = Assets . "images/categoryimages/A3Sheets/" . $details['CategoryImage'];
    $width = '220';
    $height = 'auto';
    $box_height = 'min-height:325px;';
    $pop_width = '200';
    $popup_margin = 'margin:6px auto !important;';
    $type = "A3";
} else {
    $Paper_size = "A4 Sheets";
    $img_src = Assets . "images/categoryimages/A4Sheets/" . $details['CategoryImage'];
    $width = '189';
    $height = '267';
    $box_height = '';
    $pop_width = '189';
    $type = "A4";
} ?>
<div class="bgGray">
    <div class="panel row">
        <div class="row">
            <div class="col-xs-12  col-sm-12 col-md-7">
                <div class="col-xs-12  col-sm-12 col-md-12  ">
                    <h1>
                        <?= $details['CategoryName'] ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-xs-12  col-sm-12 col-md-7 ">
                <div class="thumbnail p-l-r-10" style=" <?= $box_height ?>">
                    <div class="col-sm-6 col-md-5 productBg m-t-10">
                        <div class="text-center m-t-b-10"><img onerror='imgError(this);' src="<?= $img_src ?>"
                                                               alt="<?= $catname ?>" title="<?= $catname ?>"
                                                               width="<?= $width ?>" height="<?= $height ?>"></div>
                    </div>
                    <div class="col-sm-6  col-md-7 ">
                        <div class="m-l-5">
                            <h2 class="BlueHeading">
                                <?= $heading ?>
                            </h2>
                            <p><strong>Label Size</strong></p>
                            <p>
                                <?= $LabelSize ?>
                            </p>
                            <p><strong>Item code</strong></p>
                            <p>
                                <?= ltrim($details['DieCode'], "1-") ?>
                            </p>
                            <? if ($compitable) { ?>
                                <p><strong>Compatible with Avery&reg; templates:</strong></p>
                                <p>
                                    <?= str_replace(",", ", ", $compitable) ?>
                                </p>
                            <? } else { ?>
                                <p><strong>&nbsp;</strong></p>
                                <p>&nbsp;</p>
                            <? } ?>
                            <hr/>
                            <div class="col-xs-4  col-sm-6 col-md-4  p0"><a id="T221" data-target=".layout"
                                                                            data-toggle="modal"
                                                                            class="btn blueBg layout_specs"
                                                                            role="button"> <i
                                            class="fa f-28 fa-search-plus"></i> Layout </a></div>
                            <div class="col-xs-8  col-sm-6 col-md-8  text-right "><a rel="nofollow"
                                                                                     data-toggle="tooltip"
                                                                                     title="Download PDF Template"
                                                                                     href="<?= base_url() . "download/pdf/" . $details['pdfFile']; ?>"
                                                                                     class="btn orangeBg" role="button">
                                    <i class="fa fa-file-pdf-o f-28"></i> PDF </a> <a data-toggle="tooltip"
                                                                                      title="Download Word Template"
                                                                                      rel="nofollw"
                                                                                      href="<?= Assets . "images/office/word/" . $details['WordDoc']; ?>"
                                                                                      class="btn blueBg" role="button">
                                    <i class="fa f-28 fa-file-word-o "></i> Word </a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12  col-sm-12 col-md-5  ">
                <div class="thumbnail height">
                    <!-- Advertising Banners for free delivery start-->
                    <? $this->load->view('advertising/printer2'); ?>
                    <!-- Advertising Banners for free delivery end-->

                </div>
            </div>
        </div>
    </div>
    <div class=" filterBg p-l-r-10 row">
        <div class=" row">
            <div class="col-md-4">
                <div class="col-xs-12">
                    <h3><i class="fa fa-arrow-circle-down"></i> Select Material for your labels </h3>
                </div>
            </div>
            <? if ($filter != 'disabled') { ?>
                <div class="col-md-8 m-t-15">
                    <div class="">
                        <div class="col-xs-4 col-md-2  ">
                            <div>
                                <div>
                                    <div class=" cBlue text-white hidden-xs  hidden-sm">
                                        <div><i class="fa-2x  m-t-10 fa fa-filter pull-left  "></i>
                                            <div class="text-uppercase  pull-left cWhite  "> Materials <br>
                                                Filter
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" labels-form col-xs-12 col-md-3">
                            <label class="select">
                                <select name="material_mat" id="material_mat" onchange="fetch_category_mateials();">
                                    <option value="" selected="selected">Sort by Materials</option>
                                    <? foreach ($paper as $paper_list) { ?>
                                        <option value="<?= $paper_list->Material ?>">
                                            <?= $paper_list->Material ?>
                                        </option>
                                    <? } ?>
                                </select>
                                <i></i> </label>
                        </div>
                        <div class=" labels-form col-xs-12  col-md-3 ">
                            <label class="select">
                                <select name="color_mat" id="color_mat" onchange="fetch_category_mateials();">
                                    <option value="" selected="selected">Sort by Colour</option>
                                    <? foreach ($color as $color_list) { ?>
                                        <option value="<?= $color_list->Color ?>">
                                            <?= $color_list->Color ?>
                                        </option>
                                    <? } ?>
                                </select>
                                <i></i> </label>
                        </div>
                        <div class=" labels-form col-xs-12 col-md-3">
                            <label class="select">
                                <select name="adhesive_mat" id="adhesive_mat" onchange="fetch_category_mateials();">
                                    <option value="" selected="selected">Sort by Adhesive</option>
                                    <? foreach ($adhesive as $adhesive_list) { ?>
                                        <option value="<?= $adhesive_list->Adhesive ?>">
                                            <?= $adhesive_list->Adhesive ?>
                                        </option>
                                    <? } ?>
                                </select>
                                <i></i> </label>
                        </div>
                        <div class="labels-form col-xs-12 col-md-1">
                            <button onclick="reset_materials();" class="btn orangeBg btn-block " role="button"><i
                                        class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
    <div class="container">
        <div class="">
            <div class="panel panel-default row">
                <div class="panel-body">
                    <div class="mat-ch">
                        <h3 class="mat-ch-title">Material Details</h3>
                        <div class="colors_data" id="ajax_material_sorting">
                            <? include_once(APPPATH . '/views/wholesale/material_list.php'); ?>
                        </div>
                    </div>
                </div>
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
                                                           alt="<?= $catname ?>" title="<?= $catname ?>" width="46"
                                                           height="46" class="m-t-b-10 img-Sheet-material"></div>
                    <div class="col-md-9">
                        <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;<?= $popup_margin ?>"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif"
                                        alt="AA Labels Loader" width="181" height="181" class="image"
                                        style="width:181px; height:181px; "></div>
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
                                        href="<?= base_url() ?>labels-materials">full material specification</a> can be
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

<script>


    function fetch_category_mateials() {
        var catid = '<?=$details['CategoryID']?>';
        var material = $('#material_mat').val();
        var adhesive = $('#adhesive_mat').val();
        var color = $('#color_mat').val();
        $('#aa_loader').show();

        $.ajax({
            url: base + 'ajax/get_category_materials',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {material: material, adhesive: adhesive, color: color, catid: catid, wholesale: 'enable'},
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    $('#material_mat').html(data.material);
                    $('#adhesive_mat').html(data.adhesive);
                    $('#color_mat').html(data.color);
                    $('#ajax_material_sorting').html(data.html);
                    $('#aa_loader').hide();
                }
            }
        });
    }


    function add_item(id, menuid) {

        var qty = $('#sheet_qty_' + id).val();
        var labels = $('#labels_p_sheet' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());
        var prd_name = $('#prd_name' + id).text();

        if (qty < min_qty) {
            alert_box('Please enter the quantity required from ' + min_qty + ' sheets');
        } else {
            $.ajax({
                url: base + 'wholesale/add_to_quotation',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        $('#quote_cart').html(data.top_cart);
                        $('#cart').html(data.top_basket);
                        if (data.top_cart.length > 0) {
                            $(".slide-toggle").click(function () {
                                $(".ws-vyq-box").animate({
                                    width: "toggle"
                                });
                            });
                        }

                        if (data.response == 'yes') {
                            swal({
                                    title: "Added to your Quotation",
                                    text: menuid + ' - ' + prd_name,
                                    type: "success",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn orangeBg",
                                    confirmButtonText: "Review Quotation",
                                    cancelButtonClass: "btn blueBg",
                                    cancelButtonText: "Continue",
                                    closeOnConfirm: true,
                                    closeOnCancel: true,
                                    html: true
                                },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        window.location.href = base + 'wholesale/view-quotation';
                                    } else {
                                        console.log('view cart');
                                    }
                                });
                            //$('#cart').html(data.top_cart);
                        }
                    }
                }
            });
        }

    }


</script> 
