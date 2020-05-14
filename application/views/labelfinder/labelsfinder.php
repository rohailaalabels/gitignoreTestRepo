<!--<script src="<?= Assets ?>js/labelfinder.js?ver=<?= time() ?>"></script>-->
<link href="<?= Assets ?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<script src="<?= Assets ?>labelfinder/js/newlabelfinder.js?ver=<?= time() ?>"></script>
<style type="text/css">

    .red-border {
        border: 1px solid red !important;
    }

    .plain-tooltip {
        opacity: 1 !important;
        right: 1px !important;
        left: auto !important;
        margin-top: 5px !important;
    }

    .printed-lba-a4 h1 {
        color: #fff;
        font-size: 26px;
        font-weight: bold;
    }
</style>
<style>
    @media (min-width: 768px) {
        .modal-dialog {

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
    <div class="loading-gif text-center" style="top:50%; z-index:150;">
        <img onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image"
             style="width:160px; height:43px; " alt="AA Labels Loader">
    </div>
</div>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Label Filter</li>
            </ol>
        </div>
    </div>
</div>

<!--<div class="printed-lba-a4 ">
  <div class="container ">
    <div class="col-md-8 col-sm-12  ">
      <h1>Create your own Professional Labels </h1>
      <p>Round labels are very popular for packaging, production, retail and numerous other applications. Our customers use circular labels on A4 sheets as educational resources, product branding, promotions, informational labels and hazard signage. Some of our labels have a removable centre for media use e.g. CD’s, DVD’s. Use our on-page label graphics to help select the size and type of circular labels required. </p>
    </div>
    <div class="col-md-4 col-sm-12 ">
     <img onerror='imgError(this);' class="img-responsive" src="<?= Assets ?>images/header/lba-a4-img.png">
    </div>
  </div>
</div>-->


<div class="bgGray">
    <div class="container">
        <? include_once('label_filters.php') ?>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc" class=""></div>
        <div id="ajax_finder_content"></div>
    </div>
</div>
<div class="whiteBg3">
    <div class="container text-center  ">
        <p style="padding-top:20px; ">If you can't find one of our standard labels to your exact specification then we
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

    var home_request = 'disable';
    var contentbox = $('#ajax_finder_content');
    $(window).load(function () {
        <? if(isset($category) and $category != ''){
        if (isset($diameter) and $diameter != '') {
            $width = $diameter;
        }?>
        <? if($width > 0){ ?>
        $('#width_min').val(<?=floor($width)?>);
        $('#width_max').val(<?=ceil($width)?>);
        home_request = 'enable';
        <? } ?>
        <? if($height > 0){ ?>
        $('#height_max').val(<?=ceil($height)?>);
        $('#height_min').val(<?=floor($height)?>);
        home_request = 'enable';
        <? }?>

        <? if($color != ''){ ?>
        home_request = 'enable';
        <? }?>

        filter_data('autoload', '<?=$color?>');
        $(".show-h").trigger("click");
        setTimeout(function () {
            $(".show-h").trigger("click");
        }, 600)
        <? }else{?>
        $element = $('.nlabelfilter');
        $element.prop('disabled', true);
        $element.attr('disabled', true);
        $('#home_finder').prop('disabled', true);
        disable_slider_option('disabled');
        $('#shapes_box').find('.btn_shape').prop('disabled', true);
        swal("", 'Please select label category first ', "warning");
        //$('#newcategory').val('A4');
        //filter_data('autoload', '');
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
                        <div class="col-md-6">
                            <a data-cat-id="" data-prd-id="" id="btn_without_reg" role="button"
                               class="btn-block btn orangeBg  proceed_reg_btn" href="javascript:void(0);"
                               data-regmark="no"> Proceed without Registration Mark <i
                                        class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <div class="col-md-6">
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

