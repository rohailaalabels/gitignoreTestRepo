<script src="<?= Assets ?>dropzone/dropzone.js"></script>
<link rel="stylesheet" href="<?= Assets ?>dropzone/dropzone.css">

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
        color: black;
        text-decoration: line-through;
        font-size: 16px;
    }
</style>
<div id="aa_loader" class="white-screen" style=" display:none;">
    <div class="loading-gif text-center" style="top:92%;"><img onerror='imgError(this);'
                                                               src="<?= Assets ?>images/loader.gif" class="image"
                                                               style="width:160px; height:43px; "></div>
</div>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <?= $this->home_model->genrate_breadcrumb('material'); ?>
                    <li class="active"><?= $details['CategoryName'] ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 ">
                <div class="pull-right">
                    <a role="button" target="_blank" class="btn orangeBg" href="<?= base_url() ?>virtual-catalogue"><i
                                class="fa fa-desktop"></i> Virtual Catalogue</a>
                </div>
            </div>
        </div>
    </div>
</div>
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
} else if (preg_match("/A5/", $details['CategoryName'])) {
    $Paper_size = "A5 Sheets";
    $img_src = Assets . "images/categoryimages/A5Sheets/" . $details['CategoryImage'];
    $width = '210';
    $height = 'auto';
    $box_height = 'min-height:325px;';
    $pop_width = '210';
    $popup_margin = 'margin:6px auto !important;';
} else if (preg_match("/A3/", $details['CategoryName'])) {
    $Paper_size = "A3 Sheets";
    $img_src = Assets . "images/categoryimages/A3Sheets/" . $details['CategoryImage'];
    $width = '220';
    $height = 'auto';
    $box_height = 'min-height:325px;';
    $pop_width = '200';
    $popup_margin = 'margin:6px auto !important;';
} else {
    $Paper_size = "A4 Sheets";
    $img_src = Assets . "images/categoryimages/A4Sheets/" . $details['CategoryImage'];
    $width = '189';
    $height = '267';
    $box_height = '';
    $pop_width = '189';
} ?>
<div class="bgGray">
    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col-xs-12  col-sm-12 col-md-7">
                    <div class="col-xs-12  col-sm-12 col-md-12  ">
                        <h1>
                            <?= $details['CategoryName'] ?>
                        </h1>
                    </div>
                </div>
                <!--<div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
      <div class="pull-right"><a target="_blank" role="button" class="btn orangeBg" href="<?= Assets . "images/office/pdf/" . $details['pdfFile']; ?>"> <i class="fa fa-file-pdf-o f-20"></i> </a> <a role="button" class="btn blueBg" href="<?= Assets . "images/office/word/" . $details['WordDoc']; ?>"> <i class="fa f-20 fa-file-word-o "></i> </a> </div>
    </div>-->
            </div>
        </div>
        <div class="">
            <!-- Projects Row -->
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
                                <div class="col-xs-4  col-sm-6 col-md-4  p0">
                                    <a data-target=".layout" data-toggle="modal" class="btn blueBg " role="button"> <i
                                                class="fa f-28 fa-search-plus"></i> Layout </a>
                                </div>
                                <div class="col-xs-8  col-sm-6 col-md-8  text-right ">
                                    <a rel="nofollow" data-toggle="tooltip" title="Download PDF Template"
                                       href="<?= base_url() . "download/pdf/" . $details['pdfFile']; ?>"
                                       class="btn orangeBg" role="button">
                                        <i class="fa fa-file-pdf-o f-28"></i> PDF
                                    </a>
                                    <a data-toggle="tooltip" title="Download Word Template" rel="nofollw"
                                       href="<?= Assets . "images/office/word/" . $details['WordDoc']; ?>"
                                       class="btn blueBg" role="button">
                                        <i class="fa f-28 fa-file-word-o "></i> Word
                                    </a>
                                </div>
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
        <div class=" filterBg p-l-r-10">
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
                                    <select name="material" id="material" onchange="fetch_category_mateials();">
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
                                    <select name="color" id="color" onchange="fetch_category_mateials();">
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
                                    <select name="adhesive" id="adhesive" onchange="fetch_category_mateials();">
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
                                <button onclick="window.location.reload();" class="btn orangeBg btn-block"
                                        role="button"><i class="fa fa-refresh"></i></button>
                            </div>
                        </div>


                    </div>
                <? } ?>
            </div>
        </div>


        <div class="container">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="mat-ch">
                            <h3 class="mat-ch-title">Material Details</h3>
                            <div id="ajax_material_sorting">
                                <? include('material_list.php'); ?>
                            </div>
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
                    <div class="">
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
                            id="mat_code"></span>
                    <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
            </div>
            <div class="">
                <div>
                    <div class="col-md-3 text-center">
                        <img onerror='imgError(this);' id="material_popup_img" src="" alt="<?= $catname ?>"
                             title="<?= $catname ?>" width="46" height="46" class="m-t-b-10 img-Sheet-material">
                    </div>
                    <div class="col-md-9">
                        <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;<?= $popup_margin ?>"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" width="181"
                                        height="181" class="image" style="width:181px; height:181px; "></div>
                        </div>
                        <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>
                        <div class="bgGray p-l-r-10">
                            <small> This summary materials specification for this adhesive label is based on information
                                obtained from the original material manufacturer and is offered in good faith in
                                accordance with AA Labels terms and conditions to determine fitness for use as sheet
                                labels (A4, A5, A3 &amp; SRA3) produced by AA Labels. No guarantee is offered or implied. It
                                is the user's responsibility to fully asses and/or test the label's material and
                                determine its suitability for the label application intended. Measurements and test
                                results on this label's material are nominal. In accordance with a policy of continuous
                                improvement for label products the manufacturer and AA Labels reserves the right to
                                amend the specification without notice. A <a href="<?= base_url() ?>labels-materials">full
                                    material specification</a> can be found in the Label Materials section accessed via
                                the Home Page <br> Copyright&copy; AA labels 2015</small>


                        </div>
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
                    <h3 class="pull-left no-margin"><b>VOLUME PRICE BREAKS <?= strtoupper($Paper_size) ?></b> <a
                                href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h3>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <div id="price_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;">
                                <img onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" width="181"
                                     height="181" class="image" style="width:181px; height:181px; "></div>
                        </div>
                        <div class="table-res" id="ajax_price_breaks">


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sample Order implementation -->

<script>

    $(document).ready(function () {
        intialize_dropzone();
    });


    function intialize_dropzone() {
        $(".dropzone").dropzone({
            url: "<?=base_url()?>ajax/upload_printing_files",
            maxFiles: 4,
            init: function () {
                this.on('sending', function (file, xhr, formData) {
                    var product_id = this.previewsContainer[0].value;
                    formData.append('product_id', product_id);
                });
                this.on("maxfilesexceeded", function (file) {
                    swal("", "You can upload maximum 4 artworks!", "warning");
                    this.removeFile(file);
                });
                this.on("addedfile", function (file) {
                    var removeButton = Dropzone.createElement("<button class='btn btn-danger btn-xs'>Remove</button>");
                    //var removeButton = Dropzone.createElement('<div class="dz-error-mark delete_icon" ><span>✘</span></div>');
                    var _this = this;
                    removeButton.addEventListener("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        delete_from_folder(_this, file);
                        _this.removeFile(file);
                    });
                    file.previewElement.appendChild(removeButton);

                });
                this.on("success", function (file, responseText) {
                    if (responseText == 'error') {
                        swal("Not Allowed", "You can upload only png, jpg, jpeg, gif files", "warning");
                        this.removeFile(file);
                    } else {
                        var counter = this.previewsContainer[1].value;
                        counter = parseInt(counter) + 1;
                        this.previewsContainer[1].value = counter;
                        var aa = file.previewElement.querySelector("[data-dz-name]");
                        aa.innerHTML = responseText;

                    }
                });
            },
        });

    }


    function delete_from_folder(container, file) {
        var product_id = container.previewsContainer[0].value;
        var aa = file.previewElement.querySelector("[data-dz-name]");
        var image = aa.innerHTML;
        $.ajax({
            url: base + 'ajax/delete_from_printing_files',
            type: "post",
            async: "false",
            dataType: "html",
            data: {file: image, productid: product_id},
            success: function (data) {
                if (data) {
                    var counter = container.previewsContainer[1].value;
                    counter = parseInt(counter) - 1;
                    container.previewsContainer[1].value = counter;
                }
            }
        });
    }


    $(document).on("change", ".print_option > label > input", function (e) {

        var self = $(this);
        var id = $(this).parents('.print_option').attr('data-value');
        var quantity = $('#sheet_qty_' + id).val();

        if (self.val() == 'sample') {
            $('#cal_btn' + id).hide();
            $('#add_btn' + id).hide();
            $('#price_box_' + id).hide();
            $('#uploader' + id).hide();
            $('#calculations_box' + id).hide();
            $('#sampletext_' + id).show();
            $('#add_sample_btn' + id).show();
            $(this).parents('.detail').find('.price_breaks').hide();
        } else if (self.val() == 'Mono' || self.val() == 'Fullcolour') {


            //$('#cal_btn'+id).hide();
            //$('#add_btn'+id).hide();
            //$('#price_box_'+id).hide();
            $('#sampletext_' + id).hide();
            $('#add_sample_btn' + id).hide();
            $('#calculations_box' + id).show();
            //$('#cal_btn'+id).show();

            $('#uploader' + id).show();
            $(this).parents('.detail').find('.price_breaks').show();
            if (quantity > 24) {
                $('#cal_btn' + id).click();
            } else {
                $('#cal_btn' + id).show();
            }
        } else {
            //$('#price_box_'+id).hide();
            $('#sampletext_' + id).hide();
            $('#add_sample_btn' + id).hide();
            $('#add_btn' + id).hide();
            $('#calculations_box' + id).show();
            $('#uploader' + id).hide();
            $('#cal_btn' + id).show();
            $(this).parents('.detail').find('.price_breaks').show();

            if (quantity > 24) {
                $('#cal_btn' + id).click();
            }


        }


    });
    /******************Sample Order implementation***********************/
    $(document).on("click", ".rsample", function (e) {
        var mat_code = $(this).attr('data-mid');
        var p_code = $(this).attr('data-pid');
        $('#prdref').text(mat_code);
        $('#confirmsample').attr('data-mid', mat_code);
        $('#confirmsample').attr('data-pid', p_code);

    });
    $(document).on("click", ".rsample", function (e) {
        var menuid = $(this).attr('data-mid');
        var p_code = $(this).attr('data-pid');
        var prd_name = $('#prd_name' + p_code).text();
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
                            var sample_txt = "Thank you for requesting a sample, an A4 sheet of the material chosen will be sent via the post. \n\n Please note: The label size on the sample will not match the label/s on this page.";
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

    $(document).on("click", ".price_breaks", function (e) {
        var id = $(this).attr('id');
        var labels = $(this).attr('data-labels');
        $('#ajax_price_breaks').html('');
        $('#price_loader').show();
        $.ajax({
            url: base + 'ajax/labels_price_breaks',
            type: "POST",
            async: "false",
            data: {mid: id, labels: labels, type: '<?=$Paper_size?>'},
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

    /******************Sample Order implementation***********************/



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

    function show_calculate_btn(id) {

        $('#cal_btn' + id).show();
        $('#add_btn' + id).hide();
        $('#price_box_' + id).hide();

    }

    function fetch_category_mateials() {
        var catid = '<?=$details['CategoryID']?>';
        var material = $('#material').val();
        var adhesive = $('#adhesive').val();
        var color = $('#color').val();
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
                    $('#material').html(data.material);
                    $('#adhesive').html(data.adhesive);
                    $('#color').html(data.color);
                    $('#ajax_material_sorting').html(data.html);
                    $('#aa_loader').hide();
                    intialize_dropzone();
                }
            }
        });
    }

    function calculate_sheet_price(id, menuid) {

        var printing = $('input[name=popt_' + id + ']:checked').val();

        var qty = $('#sheet_qty_' + id).val();
        var labels = $('#labels_p_sheet' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());

        if (qty < min_qty || qty > max_qty) {
            alert_box('Please enter quantity from ' + min_qty + ' to ' + max_qty);
        } else {

            $.ajax({
                url: base + 'ajax/calculate_sheet_price',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id, labels: labels, labeltype: printing},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {

                            $('#cal_btn' + id).hide();
                            $('#add_btn' + id).show();

                            $('#save_txt' + id).html(data.save_txt);
                            $('#delivery_txt' + id).html(' <i class="cBlue  f-20 fa fa-truck"></i> ' + data.delivery_txt);

                            $('#price_' + id).html(data.price);
                            $('#priceText_' + id).html(data.labelprice);

                            if (data.type == 'printed') {
                                if (printing == 'Fullcolour') {
                                    $('#printprice' + id).find('.phead').text('Printed Full Color');
                                } else if (printing == 'Mono') {
                                    $('#printprice' + id).find('.phead').text('Printed Black ');
                                }

                                $('#plainprice' + id).find('.plaintext').html('<b class="pr-sm">&pound;' + data.plain + '</b>');
                                $('#printprice' + id).find('.printprice').html('<b class="pr-sm">&pound;' + data.printprice + '</b>');

                                $('#plainprice' + id).show();
                                $('#printprice' + id).show();
                            } else {
                                $('#plainprice' + id).hide();
                                $('#printprice' + id).hide();
                            }


                            $('#price_box_' + id).show();

                        }

                    }
                }
            });
        }
    }

    function add_item(id, menuid) {

        var qty = $('#sheet_qty_' + id).val();
        var labels = $('#labels_p_sheet' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());
        var printing = $('input[name=popt_' + id + ']:checked').val();
        var prd_name = $('#prd_name' + id).text();

        var counter = $('#uploader' + id + ' > .dropzone').find('.filecounter').val();


        if (qty < min_qty || qty > max_qty) {
            alert_box('Please enter quantity from ' + min_qty + ' to ' + max_qty);
        } else if ((printing == 'Mono' || printing == 'Fullcolour') && counter == 0) {

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
                            url: base + 'ajax/add_to_cart',
                            type: "POST",
                            async: "false",
                            dataType: "html",
                            data: {qty: qty, menuid: menuid, prd_id: id, labeltype: printing},
                            success: function (data) {
                                if (!data == '') {
                                    fireRemarketingTag('Add to cart');
                                    data = $.parseJSON(data);
                                    if (data.response == 'yes') {
                                        Dropzone.forElement('#uploader' + id + ' > .dropzone').removeAllFiles(true);
                                        $('#uploader' + id + ' > .dropzone').find('.filecounter').val(0);
                                        popup_messages(menuid + ' - ' + prd_name);
                                        $('#cart').html(data.top_cart);
                                    }
                                }
                            }
                        });


                    } else {
                        return false;
                    }
                })


        } else {

            $.ajax({
                url: base + 'ajax/add_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id, labeltype: printing},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            fireRemarketingTag('Add to cart');
                            if (printing == 'Mono' || printing == 'Fullcolour') {
                                Dropzone.forElement('#uploader' + id + ' > .dropzone').removeAllFiles(true);
                                $('#uploader' + id + ' > .dropzone').find('.filecounter').val(0);
                            }
                            popup_messages(menuid + ' - ' + prd_name);
                            $('#cart').html(data.top_cart);
                        }
                    }
                }
            });


        }

    }

    function fireRemarketingTag(page) {
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
    }


</script> 
