<style>
    .giveMeEllipsis {
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 3.6em;
        line-height: 1.8em;
    }
</style>
<?

$newname = explode("(", $details['CategoryName']);
$showname = explode("-", $newname[0]);
$name = substr($showname[0], 2);

$catname = $name;
$image = explode('.', $details['CategoryImage']);
$img_chgr = $image[0];
$imagename = $image[0] . $coreid . ".jpg";
$wound_option = $this->session->userdata('wound');
$wound_cate = $this->session->userdata('wound-cat');

$inside = '';


if (isset($wound_option) and $wound_option == 'Inside' and strcasecmp($subcat, $wound_cate) == 0) {
    $inside = 'selected="selected"';
}

if (isset($wound_option) and $wound_option == 'Inside' and strcasecmp($subcat, $wound_cate) == 0) {

    $img_src = Assets . "images/categoryimages/inner_roll/" . $imagename;
} else {

    $img_src = Assets . "images/categoryimages/roll_desc/" . $imagename;

}

if ($details['Shape_upd'] == "Circular") {
    $Label_size = str_replace("Label Size:", "", $details['specification3']);
} else {
    $Label_size = " Width " . $details['LabelWidth'] . "&nbsp;&nbsp; x &nbsp;Height&nbsp; " . $details['LabelHeight'];
}
//$Label_size = preg_replace("/Label Size:/","",$details['specification3']);

$height = 'auto';
$pop_width = 'auto';


?>
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
        <!-- Projects Row -->
        <div class="row">
            <div class="col-xs-12  col-sm-12 col-md-7 ">
                <div class="thumbnail p-l-r-10" style="">
                    <div class="col-sm-6 col-md-5  m-t-10">
                        <div id="prod_img" class="text-center m-t-b-10"><img onerror='imgError(this);'
                                                                             alt="Product Image" id="wound_image"
                                                                             style=" " src="<?= $img_src ?>"/></div>
                    </div>
                    <div class="col-sm-6  col-md-7">
                        <div class="m-l-5">
                            <h2 class="BlueHeading">Labels On Roll </h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Label Size</strong></p>
                                    <p>
                                        <?= $Label_size ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Label Corner</strong></p>
                                    <p>
                                        <? if ($details['Shape_upd'] == "Oval" || $details['Shape_upd'] == "oval") {
                                            echo "N/A";
                                        } else {
                                            echo $details['LabelCorner'];
                                        } ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Leading Edge</strong></p>
                                    <p>
                                        <?= $details['LeadingEdge'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Core Size </strong></p>
                                    <div class=" labels-form">
                                        <label class="select">
                                            <select id="coresize" name="coresize">
                                                <?= $rollcores ?>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Wound options </strong></p>
                                    <div class=" labels-form">
                                        <label class="select">
                                            <select id="woundoption" name="wound">
                                                <option value="Outside"> Outside Wound</option>
                                                <option <?= $inside ?> value="Inside"> Inside Wound</option>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Code</strong></p>
                                    <p>
                                        <?= ltrim($details['DieCode'], "1-") ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear10"></div>
                </div>
            </div>
            <?php
            $max_diameter = 0;
            $printer_compatiblity = '';
            $Labelsgap = $details['LabelGapAcross'];
            $height = $details['Height'];
            ?>
            <div class="col-xs-12  col-sm-12 col-md-5  ">
                <div class="thumbnail ">
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
                            <button onclick="reset_roll_materials();" class="btn orangeBg btn-block " role="button"><i
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
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" width="181"
                                        height="181" class="image" style="width:181px; height:181px; "></div>
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

    $(document).on("change", "#woundoption", function (e) {

        val = $(this).val();
        if (val != '') {
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

                        }, 1000);

                    } else {

                        setTimeout(function () {
                            $('#prod_img').html('<img onerror='
                            imgError(this);
                            ' id="wound_image" src ="<?=Assets?>images/categoryimages/roll_desc/<?=$imagename?>">'
                        )
                            ;
                            $('#material_popup_img').attr("src", "<?=Assets?>images/categoryimages/roll_desc/<?=$imagename?>");
                        }, 1000);


                    }

                }
            });
        }
    });

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

                    }, 1000);
                }
            }
        });
    });


    $(document).on("change", "#coresize", function (e) {
        $('#coreid').val($(this).val());
        fetch_category_mateials();
    });


    function fetch_category_mateials() {
        var catid = '<?=$details['CategoryID']?>';
        var coreid = $('#coresize').val();
        catid = catid + '' + coreid;
        var material = $('#material_mat').val();
        var adhesive = $('#adhesive_mat').val();
        var color = $('#color_mat').val();
        var max_diameter = $('#max_diameter').val();
        var printer_compatiblity = '<?=$printer_compatiblity?>';


        var imge = '<?=$img_chgr?>';
        var wound = $('#woundoption').val();
        if (wound == 'Inside') {
            var url = '<?=Assets?>images/categoryimages/inner_roll/'
        } else {
            var url = '<?=Assets?>images/categoryimages/roll_desc/'
        }


        $('#aa_loader').show();
        $.ajax({
            url: base + 'ajax/get_category_materials/',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                material: material,
                adhesive: adhesive,
                color: color,
                catid: catid,
                compatiblity: printer_compatiblity,
                wholesale: 'enable'
            },
            success: function (data) {
                if (!data == '') {
                    $('#wound_image').attr('src', url + imge + coreid + ".jpg");
                    data = $.parseJSON(data);
                    $('#material_mat').html(data.material);
                    $('#adhesive_mat').html(data.adhesive);
                    $('#color_mat').html(data.color);
                    $('#ajax_material_sorting').html(data.html);
                    //$('#ajax_material_sorting').html('<h1>This is material code</h1>');

                    $('#aa_loader').hide();


                }
            }
        });
    }


    function add_roll_item(id, menuid) {

        var roll = $('#roll_' + id).val();
        var labels = $('#labels_' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());
        var max_labels = parseInt($('#max_labels' + id).val());
        var type = 'Rolls';
        var prd_name = $('#prd_name' + id).text();


        if (labels < 100 || labels > max_labels) {
            alert_box('Please enter labels from 100 to ' + max_labels + ' Labels');
        } else if (roll < min_qty || roll > max_qty) {
            alert_box('Please enter quantity from ' + min_qty + ' to ' + max_qty + ' Rolls');
        } else {

            $.ajax({
                url: base + 'wholesale/add_to_quotation',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: roll, menuid: menuid, prd_id: id, labels: labels, type: type},
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
                        }
                    }
                }
            });

        }

    }


    function fireRemarketingTag(page) {
        <? if(SITE_MODE == 'live'){?>
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
        <? } ?>
    }

</script> 
