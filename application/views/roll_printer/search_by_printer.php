<link href="<?= Assets ?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<script src="<?= Assets ?>labelfinder/js/newlabelfinder.js?ver=<?= time() ?>"></script>
<style type="text/css">
    .printed-lba-a4 h1 {
        color: #000;
        font-size: 26px;
        font-weight: bold;
    }
</style>
<style>
    @media (min-width: 768px) {
        .modal-dialog {
            width: 570px;
        }
    }

    .registration_modal_link {
        text-decoration: underline;
    }

    .close_reg {
        color: #fd4913;
    }

    .registration_mark .panel-heading {
        background: #fff !important;
    }

    .registration_mark h4 {
        line-height: 35px;
    }

    .registration_mark h4 b {
        margin-left: 10px;
    }

    .image_container {
        border: 1px solid #e9e9e9;
        padding: 10px 0;
        margin-bottom: 15px;
    }

    .image_container p {
        font-size: 13px !important;
    }
</style>

<div id="aa_loader" class="white-screen" style=" display:none;">
    <div class="loading-gif text-center" style="top:50%; z-index:150;"><img onerror='imgError(this);'
                                                                            src="<?= Assets ?>images/loader.gif"
                                                                            class="image"
                                                                            style="width:160px; height:43px;"
                                                                            alt="AA Labels Loader"></div>
</div>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Thermal Printer Roll Labels</li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 "></div>
        </div>
    </div>
</div>
<div class="printed-lba-a4 integrated_header_bg">
    <div class="container ">
        <div class="col-md-8 col-sm-8  ">
            <h1>Labels for Thermal Printers</h1>
            <p class="text-justify">We have a large selection of label materials shapes and sizes suitable for use with
                most thermal printers. Use the label filters and product specifications available below to check the
                compatibility of the label material selected with your printer. Click on a brand icon to view the range
                of printers.</p>
        </div>
        <div class="col-md-4 col-sm-4 "><img onerror='imgError(this);' class="img-responsive"
                                             src="<?= Assets ?>images/header/thermal-printer-header-2.png"
                                             alt="Printer Image"></div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <?
        $make = $this->input->get('make');
        $model = $this->input->get('model');
        $category = 'thermal';

        include_once(APPPATH . '/views/labelfinder/label_filters.php') ?>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc" class=""></div>
        <div id="ajax_sorting_contetnt" class="">
            <div class="row">
                <div class="printer m-t-10 row">
                    <?

                    if (isset($printer_model) and $printer_model != '') {
                        include('model_desc.php');
                        include(APPPATH . 'views/category/category_list.php');
                    } else if (isset($make_list) and $make_list != '') {
                        include('model_list.php');
                    } else {

                        foreach ($printer as $row) {
                            ?>
                            <div class="col-xs-6 col-md-2 text-center"><a
                                        href="<?= base_url() ?>thermal-printer-roll-labels?make=<?= $row->ManufacturerCode ?>"
                                        id="<?= $row->ManufacturerCode ?>" class="thumbnail"> <img
                                            onerror='imgError(this);'
                                            src="<?= Assets ?>images/printer/make/<?= $row->printer_image ?>"
                                            alt="<?= $row->Name ?>">
                                    <?= $row->Name ?>
                                </a></div>
                        <? }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="printed-lba-call">
    <div class="container">
        <div class="col-md-8 col-sm-8 col-lg-9">
            <h2>INFORMATION & ADVICE <br/>
                <small>We’re here to help you chose the label that’s right for you.</small></h2>
            <p class="text-justify">If you need assistance or help deciding which label material, colour, finish, or
                adhesive is suitable for your thermal printer e.g. direct thermal, or thermal transfer. Please contact
                our customer care team, via the live-chat facility on the page, our website contact form, telephone, or
                email and they will be happy to discuss your requirements for thermal printer roll labels.</p>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-3"><img onerror='imgError(this);' class="img-responsive"
                                                     src="<?= Assets ?>images/header/call_opr_1.png"
                                                     alt="AA Labels Customer Support"></div>
    </div>
</div>


<!-- REGISTRATION MARK MODAL -->
<div class="modal fade registration_mark reg-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content no-padding">
            <div class="panel no-margin">
                <div class="panel-heading">
                    <h4 class="pull-left no-margin">
                        <div class="roll-icon pull-left"><img onerror='imgError(this);' class=""
                                                              src="<?= Assets ?>images/categoryimages/labelShapes/printed_roll.png"
                                                              alt="Roll Icon"></div>
                        <b>Select Registration Mark Option</b></h4>
                    <button type="button" class="close close_reg" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div class="image_container">
                        <p class="text-center">Reverse and Face Image of the Roll<br/>
                            (Illustrating the black-bar registration mark)</p>
                        <img onerror='imgError(this);' src="<?= Assets ?>images/registration_mark_popup_image.jpg"
                             class="img-responsive center-block" style="height:200px;"/>
                    </div>
                    <p class="text-justify">If your printer is not fitted with optic-free sensing technology using
                        capacitive or ultrasonic sensors triggered by changes in thickness, not opacity or contrast.
                        Then you may require a black-block registration mark on the reverse of the roll in order to
                        print. If this is the case then please select this option below. If you are unsure please refer
                        to your printer manual, or to the information available on our website <a
                                href="<?= base_url(); ?>thermal-printer-roll-labels/" target="_blank">Search by thermal
                            printer model. <i class="fa fa-external-link"></i></a></p>
                    <p>If you know that your printer does not need a black-block registration mark then please proceed
                        to select your label material. </p>
                    <div class="check_section">
                        <label class="check">Select to confirm you require black registration mark.
                            <input type="checkbox" name="registration_mark_option" id="registration_mark_option">
                            <span class="checkmark"></span> </label>
                    </div>
                    <div class="row m-t-15">
                        <div class="col-sm-6">
                            <a data-cat-id="" data-prd-id="" id="btn_without_reg" role="button"
                               class="btn-block btn orangeBg  proceed_reg_btn" href="javascript:void(0);"
                               data-regmark="no"> Proceed without Registration Mark <i
                                        class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <div class="col-sm-6">
                            <a data-cat-id="" data-prd-id="" id="btn_with_reg" role="button"
                               class="btn-block btn orangeBg proceed_reg_btn disabled" href="javascript:void(0);"
                               data-regmark="yes"> Proceed to Material Selection <i
                                        class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <input type="hidden" id="reg_diecode" value=""/>
                        <input type="hidden" id="reg_shape" value=""/>
                        <input type="hidden" id="reg_productID" value=""/>
                        <input type="hidden" id="reg_source" value=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- REGISTRATION MARK MODAL -->


<script>
    /************* Label Finder **********/
    var contentbox = $('#ajax_sorting_contetnt');
    $(document).ready(function () {

        enable_thermaloptions();
        <? if(isset($printer_width) and $printer_width != ''){?>
        change_text('HIDE FILTERS');
        filter_data('model');

        <? }
        else if(isset($make) and $make != ''){?>
        change_text('HIDE FILTERS');
        printer_model_data('<?=$make?>');

        <? }
        else{?>

        $('.fnTop').show().slideDown("fast");
        $(".labels-filters-form").slideUp("fast");
        printer_model_data('printers');
        <? }?>
    });


    $(document).on("click", ".registration_modal_link", function (e) {
        $("#registration_mark_option").prop("checked", false);
        $("#registration_mark_option").trigger("change");
        var diecode = $(this).attr('id');
        var shape = $(this).data('shape');
        var productID = $(this).data('productid');
        var source = $(this).data('source');
        if (source == "modal_modal") {
            $("#compare_modal").modal('hide');
        }
        $("#reg_diecode").val(diecode);
        $("#reg_shape").val(shape);
        $("#reg_productID").val(productID);
        $("#reg_source").val(source);

    });
    $(document).on("change", "#registration_mark_option", function (e) {
        if ($(this).is(':checked')) {
            $("#btn_without_reg").addClass("disabled");
            $("#btn_with_reg").removeClass("disabled");
        } else {
            $("#btn_without_reg").removeClass("disabled");
            $("#btn_with_reg").addClass("disabled");
        }
    });

    $(document).on("click", ".proceed_reg_btn", function (e) {
        var diecode = $("#reg_diecode").val();
        var shape = $("#reg_shape").val();
        var regmark = $(this).data('regmark');
        var productID = $("#reg_productID").val();
        var source = $("#reg_source").val();
        var newlink = '<?=base_url()?>';
        if (diecode != '' && shape != '') {
            newlink += 'roll-labels/' + shape + '/' + diecode;
        }
        if (productID != 'undefined' && productID != '') {
            newlink += '?productid=' + productID;
        }
        if (regmark == "yes" && (productID != "undefined" && productID != "")) {
            newlink += '&regmark=yes';
        } else if (regmark == "yes" && (productID == "undefined" || productID == "")) {
            newlink += '?regmark=yes';
        }
        window.location.href = newlink;
    });

    $('.registration_mark').on('hide.bs.modal', function (e) {
        var reg_source = $(this).find("#reg_source").val();
        if (reg_source == "modal_modal") {
            $("#compare_modal").modal('show');
        }
    });

</script>