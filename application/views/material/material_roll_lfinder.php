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

<div id="aa_loader" class="white-screen hidden-xs" style=" display:none;">
    <div class="loading-gif text-center" style="top:92%;"><img src="<?= Assets ?>images/loader.gif" class="image"
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
    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col-xs-7  col-sm-8 col-md-7">
                    <div class="col-xs-12  col-sm-12 col-md-12 ">
                        <h1><?= $details['CategoryName'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <!-- Projects Row -->
            <div class="row">
                <div class="col-xs-12  col-sm-12 col-md-7 ">
                    <div class="thumbnail p-l-r-10" style="">
                        <div class="col-sm-6 col-md-5  m-t-10">
                            <div id="prod_img" class="text-center m-t-b-10"><img id="wound_image" style=" "
                                                                                 src="<?= $img_src ?>"/></div>
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
                    <input type="hidden" id="max_diameter" value="<?= $printer_model['RollDiamter'] ?>"/>

                    <div class="col-xs-12  col-sm-12 col-md-5">
                        <div class="thumbnail height p-l-r-10">
                            <div class="col-xs-12 col-sm-12 col-md-4 m-t-10">
                                <div class="">
                                    <div class=""><img class="img-responsive" width="185" height="155"
                                                       alt="labels Image " src="<?= $src ?>"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 ">
                                <h2 class="BlueHeading"><?= $printer_model['Name'] ?></h2>
                                <p class="text-justify">
                                    <strong>Compatibility: <?= $printer_model['method'] ?></strong><br></p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="caption2">
                                    <p class="text-justify"><small> <?= $printer_model['specfication'] ?></small></p>
                                    <div class="row">
                                        <p class="col-md-5"><strong>Maximum Print
                                                Size</strong><br><?= $printer_model['PrintWidth'] ?> mm </p>
                                        <p class="col-md-7"><strong>Maximum Roll
                                                Diameter</strong><br><?= $printer_model['RollDiamter'] ?> mm </p>
                                        <p class="col-md-5"><strong>Core
                                                Size </strong><br><?= $printer_model['coresize'] ?> mm </p>
                                        <p class="col-md-7">
                                            <strong>Compatibility</strong><br><?= $printer_model['method'] ?></p>
                                        <p class="col-md-12  no-margin">
                                            <a rel="nofollow"
                                               href="<?= base_url() ?>download/printer/<?= $printer_model['pdf'] ?>"
                                               class="col-xs-6 btn orangeBg pull-right" role="button">
                                                <i class="fa fa-file-pdf-o"></i> Product Datasheet
                                            </a>
                                            <a rel="nofollow"
                                               href="<?= base_url() ?>download/usermanuals/<?= $printer_model['pdf'] ?>"
                                               class="col-xs-5 btn orangeBg pull-left" role="button">
                                                <i class="fa fa-file-pdf-o"></i> User Manuals
                                            </a>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <? $printer_compatiblity = $printer_model['method'];
                } else { ?>
                    <input type="hidden" id="max_diameter" value="0"/>
                    <div class="col-xs-12  col-sm-12 col-md-5  ">
                        <div class="thumbnail ">
                            <!-- Advertising Banners for free delivery start-->
                            <? $this->load->view('advertising/printer2'); ?>
                            <!-- Advertising Banners for free delivery end-->

                        </div>
                    </div>

                <? } ?>


            </div>
        </div>
        <input type="hidden" name="coreid" id="coreid" value="<?= $coreid ?>"/>
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
                            <div class="col-xs-4 col-md-2 ">
                                <div class="pull-right">
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
                            <div class=" col-xs-12  col-md-1 ">
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


<!-- Material Detail modal -->
<div class="modal fade material" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">AA Labels Technical Specification - <span
                            id="mat_code"></span>
                    <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a>
                </h4>
            </div>
            <div class="">
                <div>
                    <div class="col-md-3 text-center">
                        <img id="material_popup_img" src="" alt="<?= $catname ?>" title="<?= $catname ?>" width="46"
                             height="46" class="m-t-b-10 img-Sheet-material">
                    </div>
                    <div class="col-md-9">
                        <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        src="<?= Assets ?>images/loader.gif" width="181" height="181" class="image"
                                        style="width:181px; height:181px; "></div>
                        </div>
                        <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>
                        <div class="bgGray p-l-r-10">
                            <small> This summary materials specification for this adhesive label is based on information
                                obtained from the original material manufacturer and is offered in good faith in
                                accordance with AA Labels terms and conditions to determine fitness for use as labels on
                                rolls produced by AA Labels. No guarantee is offered or implied. It is the user's
                                responsibility to fully asses and/or test the label's material and determine its
                                suitability for the label application intended. Measurements and test results on this
                                label's material are nominal. In accordance with a policy of continuous improvement for
                                label products the manufacturer and AA Labels reserves the right to amend the
                                specification without notice. A <a href="<?= base_url() ?>labels-materials">full
                                    material specification</a> can be found in the Label Materials section accessed via
                                the Home Page <br>
                                Copyright AA labels 2015</small>


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
                            <div class="loading-gif text-center" style="top:26%;left:29%;">
                                <img src="<?= Assets ?>images/loader.gif" width="181" height="181" class="image"
                                     style="width:181px; height:181px; "></div>
                        </div>
                        <div id="ajax_price_breaks">


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sample Order implementation -->


<script>

    $(document).on("click", ".price_breaks", function (e) {
        var id = $(this).attr('id');
        var labels = $(this).attr('data-labels');
        $('#ajax_price_breaks').html('');
        $('#price_loader').show();
        $.ajax({
            url: base + 'ajax/labels_price_breaks',
            type: "POST",
            async: "false",
            data: {mid: id, labels: labels, type: 'roll'},
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


    $(document).on("change", "#woundoption", function (e) {

        val = $(this).val();
        if (val != '') {
            $('#prod_img').html('<img src="<?=Assets?>images/loader.gif" width="181" height="181" class="image" style="width:181px; height:181px; ">');
            request = $.ajax({
                url: '<?=base_url()?>ajax/setwoundoption',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {option: val, cate: '<?=$subcat?>',},
                success: function (data) {

                    if (val == 'Inside') {
                        setTimeout(function () {
                            $('#prod_img').html('<img id="wound_image" src ="<?=Assets?>images/categoryimages/inner_roll/<?=$imagename?>">');
                            $('#material_popup_img').attr("src", "<?=Assets?>images/categoryimages/inner_roll/<?=$imagename?>");

                        }, 1000);

                    } else {

                        setTimeout(function () {
                            $('#prod_img').html('<img id="wound_image" src ="<?=Assets?>images/categoryimages/roll_desc/<?=$imagename?>">');
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


    function show_calculate_btn(id) {

        $('#cal_btn' + id).show();
        $('#add_btn' + id).hide();
        $('#price_box_' + id).hide();
        $('#diameter_' + id).hide();

    }


    function fetch_category_mateials() {
        var catid = '<?=$details['CategoryID']?>';
        var coreid = $('#coreid').val();
        catid = catid + '' + coreid;
        var material = $('#material').val();
        var adhesive = $('#adhesive').val();
        var color = $('#color').val();
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
                material: material, adhesive: adhesive, color: color, catid: catid, compatiblity: printer_compatiblity,
                labelsgap: '<?=$details['LabelGapAcross']?>', max_diameter: max_diameter, height:<?=$details['Height']?>
            },
            success: function (data) {
                if (!data == '') {
                    $('#wound_image').attr('src', url + imge + coreid + ".jpg");
                    data = $.parseJSON(data);
                    $('#material').html(data.material);
                    $('#adhesive').html(data.adhesive);
                    $('#color').html(data.color);
                    $('#ajax_material_sorting').html(data.html);
                    //$('#ajax_material_sorting').html('<h1>This is material code</h1>');

                    $('#aa_loader').hide();


                }
            }
        });
    }

    function calculate_roll_price(id, menuid) {

        var roll = $('#roll_' + id).val();
        var labels = $('#labels_' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());
        var max_labels = parseInt($('#max_labels' + id).val());
        //var max_diameter = $('#max_diameter').val();


        if (labels < 100 || labels > max_labels) {
            alert_box('Please enter labels from 100 to ' + max_labels + ' Labels');
        } else if (roll < min_qty || roll > max_qty) {
            alert_box('Please enter quantity from ' + min_qty + ' to ' + max_qty + ' Rolls');
        } else if (roll % min_qty != 0) {
            if (roll % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(roll / min_qty) + 1);
                console.log(multipyer + ' max ' + max_qty);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#roll_' + id).val(multipyer);
            }
            alert_box("Sorry! these labels are only available in sets of " + min_qty + " rolls. ");
            $('#sheet_qty_' + id).focus();
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
                    gap: '<?=$Labelsgap?>'
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {

                            //if(parseInt(data.diameter) > parseInt(max_diameter) && max_diameter!=0 ){
                            //	alert_box("Sorry! Maximum diameter availabel against this printer is "+max_diameter+" mm");
                            //	$('#delivery_txt'+id).html(' Diameter against  '+labels+' Labels  is '+data.diameter+' mm');
                            //}else{

                            $('#cal_btn' + id).hide();
                            $('#add_btn' + id).show();

                            $('#delivery_txt' + id).html(' <i class="cBlue  f-20 fa fa-truck"></i> ' + data.delivery_txt);

                            $('#price_' + id).html(data.price);
                            $('#priceText_' + id).html(data.labelprice);
                            $('#diameter_' + id).html('Roll Diameter <span>' + data.diameter + ' mm</span>');
                            $('#diameter_' + id).show();
                            $('#price_box_' + id).show();

                            //	}

                        }

                    }
                }
            });
        }
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
        } else if (roll % min_qty != 0) {
            if (roll % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(roll / min_qty) + 1);
                console.log(multipyer + ' max ' + max_qty);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#roll_' + id).val(multipyer);

            }

            alert_box("Sorry! these labels are only available in sets of " + min_qty + " rolls. ");
            $('#sheet_qty_' + id).focus();
            return false;

        } else {

            $.ajax({
                url: base + 'ajax/add_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: roll, menuid: menuid, prd_id: id, labels: labels, type: type},
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

    }

    function fireRemarketingTag(page) {
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': page});
    }

</script> 
