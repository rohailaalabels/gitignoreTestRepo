<style>
    .popup-heading {
        background-color: #17b1e3 !important;
        color: #FFF;
    }

    .popup-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
    }

    .popup-heading {
        color: #fff;
        background-color: #17b1e3 !important;
        font-weight: 700;
        border: 0px !important;
        margin-bottom: 10px;
        padding: 0px 15px !important;
    }

    .popup-heading .modal-header {
        border-bottom: 0 !important;
        font-weight: 700;
        padding: 10px 0 !important;
    }

    .popup-heading .close {
        color: #ffffff;
        padding-top: 8px;
    }

    @media (min-width: 768px) {
        .modal-dialog {
            width: 570px;
        }

        .big-dialog {
            width: 900px;
        }
    }

    @media (max-width: 769px) {
        .big-dialog {
            width: 900px !important;
        }

    }

    @media (max-width: 768px) {
        .big-dialog {
            width: 600px !important;
        }

    }

    @media (max-width: 568px) {
        .big-dialog {
            width: 400px !important;
        }

    }

    @media (max-width: 400px) {
        .big-dialog {
            width: 340px !important;
        }

    }

    @media (max-width: 350px) {
        .big-dialog {
            width: 280px !important;
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
    <div class="loading-gif text-center" style="top:52%;"><img onerror='imgError(this);'
                                                               src="<?= Assets ?>images/loader.gif" class="image"
                                                               style="width:160px; height:43px; "
                                                               alt="AA Labels Loader"></div>
</div>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Search</li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 ">
                <div class="pull-right"><a role="button" class="btn orangeBg"
                                           href="<?= base_url() . "virtual-catalogue/" ?>"><i class="fa fa-desktop"></i>
                        Virtual Catalogue</a></div>
            </div>
        </div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="panel row">
            <div class="col-md-12">
                <div class="col-md-3 p0 col-xs-6">
                    <h1>Search Results </h1>
                </div>
                <div class="col-xs-6 col-md-3 m-t-15 p0 ">
                    <div class="pull-right">
                        <div>
                            <div class=" cBlue">
                                <div><i class="fa-2x  m-t-10 fa fa-cubes pull-left"></i><span class="pull-left"
                                                                                              id="product_counter">
                  <?= count($records['list']) ?>
                  </span>
                                    <div class="text-uppercase hidden-xs  hidden-sm pull-left cGray50">
                                        <?= ($type == 'printer') ? 'Printer' : 'Products'; ?>
                                        <br>
                                        Available
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 m-t-15 p0 pull-right">
                    <p>Search results for:
                        <?= $this->input->get('q'); ?>
                    </p>
                </div>
            </div>
        </div>
        <div id="ajax_material_sorting">
            <?

            $search_page = 'enabled';

            if (count($records['list']) > 0 and $type == 'category') {
                include('category_list.php');
            } else if (count($records['list']) > 0 and $type == 'product') {
                // echo "<pre>";print_r($records['list']);echo "</pre>";
                $results = $records['list'];
                include(APPPATH . 'views/labelfinder/product_list.php');
            } else if (count($records['list']) > 0 and $type == 'printer') {
                foreach ($records['list'] as $row) {

                    $url = base_url() . 'thermal-printer-roll-labels?make=' . urlencode($row->ManufacturerCode) . '&model=' . urlencode($row->model);
                    $row->method = str_replace("/", ",", $row->method);
                    error_reporting(0);

                    if (getimagesize(Assets . 'images/printer/model/' . $row->image) !== false) {
                        $src = Assets . 'images/printer/model/' . $row->image;
                    } else {
                        $src = Assets . 'images/no-image.png';

                    }
                    if ($row->specfication != "") {
                        $spec = substr($row->specfication, 0, 100);
                    } else {
                        $spec = "";
                    }

                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4 ">
                        <div class="thumbnail">
                            <div class=" text-center"><img onerror='imgError(this);' width="185" height="155"
                                                           title="<?= $row->image ?>" src="<?= $src ?>"
                                                           alt="<?= $row->image ?>"></div>
                            <div class="caption3">
                                <h2>
                                    <?= $row->Name ?>
                                </h2>
                                <p><small>
                                        <?= $spec ?>
                                    </small></p>
                                <div class="row">
                                    <p class="col-md-12"><strong>Compatibility: </strong>
                                        <?= $row->method ?>
                                    </p>
                                    <p class="col-md-12"><strong>Maximum Print Size: </strong>
                                        <?= $row->PrintWidth ?>
                                        mm</p>
                                </div>
                                <a href="<?= $url ?>/" role="button" class="btn-block btn orange printer_model"> <i
                                            class="fa fa-arrow-circle-right"></i> Select </a></div>
                        </div>
                    </div>
                <? }
            } else {
                echo '<h3 style="text-align:center;">Your search "' . $this->input->get('q') . '" did not match any products.</h3>';
            }

            ?>
        </div>

        <!-- Layout modal -->
        <div class="modal fade layout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg big-dialog">
                <div class="modal-content  no-padding">
                    <div class="popup-heading">
                        <div class="modal-header">
                            <button aria-label="Close" data-dismiss="modal" class="close" type="button"><i
                                        class="fa fa-times-circle"></i></button>
                            <h3 id="myModalLabel" class="modal-title">Label Layout<a href="#myModalLabel"
                                                                                     class="anchorjs-link"><span
                                            class="anchorjs-icon"></span></a></h3>
                        </div>
                    </div>
                    <div id="ajax_layout_spec"></div>
                    <div class="modal-footer">
                        <!--<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Layout modal -->
        <!-- REGISTRATION MARK MODAL -->
        <div class="modal fade registration_mark reg-modal" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <img onerror='imgError(this);'
                                     src="<?= Assets ?>images/registration_mark_popup_image.jpg"
                                     class="img-responsive center-block" style="height:200px;"/>
                            </div>
                            <p class="text-justify">If your printer is not fitted with optic-free sensing technology
                                using capacitive or ultrasonic sensors triggered by changes in thickness, not opacity or
                                contrast. Then you may require a black-block registration mark on the reverse of the
                                roll in order to print. If this is the case then please select this option below. If you
                                are unsure please refer to your printer manual, or to the information available on our
                                website <a href="<?= base_url(); ?>thermal-printer-roll-labels/" target="_blank">Search
                                    by thermal printer model. <i class="fa fa-external-link"></i></a></p>
                            <p>If you know that your printer does not need a black-block registration mark then please
                                proceed to select your label material. </p>
                            <div class="check_section">
                                <label class="check">Select to confirm you require black registration mark.
                                    <input type="checkbox" name="registration_mark_option"
                                           id="registration_mark_option">
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
                                       class="btn-block btn orangeBg proceed_reg_btn disabled"
                                       href="javascript:void(0);" data-regmark="yes"> Proceed to Material Selection <i
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
            <? if($type == 'category'){ ?>
            $(document).ready(function () {
                apply_hover_effect();

            });
            <? } ?>

            function apply_hover_effect() {
                $('.thumbnail').hover(
                    function () {
                        $(this).find('.zoom').slideDown(250); //.fadeIn(250)
                    },
                    function () {
                        $(this).find('.zoom').slideUp(250); //.fadeOut(205)
                    }
                );
            }


            $(document).on("click", ".layout_specs", function (e) {
                var id = $(this).attr('id');
                //console.log(id);
                $('#ajax_layout_spec').html('');
                $('#specs_loader').show();
                $.ajax({
                    url: base + 'ajax/layout_popup/' + id,
                    type: "POST",
                    async: "false",
                    dataType: "html",
                    success: function (data) {
                        if (!data == '') {
                            data = $.parseJSON(data);
                            // setTimeout(function(){
                            $('#specs_loader').hide();
                            $('#ajax_layout_spec').html(data.html);
                            // },1000);
                        }
                    }
                });

            });

            $(document).on("click", ".dm-selector li a", function (e) {
                var selText = $(this).text();
                var coreid = $(this).attr('data-id');
                var core = $(this).attr('data-core');
                var mate_code = $(this).attr('data-mat-code');
                var search_view = $(this).parents('.dm-box').find("input[name='search_view']").val();
                if (typeof core !== "undefined") {
                    $(this).parents('.btn-group').find('.dropdown-toggle').attr('data-value', core);
                    $(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <i class="fa fa-unsorted"></i>');
                    var die = $.trim($(this).parents('.dm-box').find("span.diecode").text());
                    if (search_view == "category") {
                        mate_code = "WTP";
                    }
                    coreid = core.replace(/\D/g, '');
                    die += mate_code + coreid;
                    var img_src = base + "theme/site/images/categoryimages/RollLabels/outside/" + die + ".jpg";
                    $(this).parents('.dm-box').find(".imgBg img").attr('src', img_src);
                }
            });
            $(document).on("click", ".roll-core", function (e) {
                var url = $(this).attr('href');
                var catid = $(this).attr('id');
                var id = $(this).attr('data-attr');
                var productid = $('#coresize_' + id).attr('data-value');
                if (productid.length > 0) {
                    var newurl = url.split('?productid=');
                    url = newurl[0] + '?productid=' + id;
                    $(this).attr('href', url)
                } else {
                    swal("Core size", "Please select core size", "warning");
                    return !1
                }
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
    </div>
</div>
<div class="whiteBg">
    <div class="container text-center">
        <h2>About Your Search Results </h2>
        <p><small>Your search results will show labels from all our label categories and will display those shapes and
                sizes which most closely match the phrase or code your have entered into our generic search box.
                If you don't see what you need in this section try our easy to use <a
                        href="<?= base_url() ?>advancesearch/">search facility</a> where you can search by shape or size
                or colour. You can then refine your search and select the <a href="<?= base_url() ?>advancesearch/">finish</a>,
                <a href="<?= base_url() ?>advancesearch/">adhesive</a>, <a href="<?= base_url() ?>advancesearch/">material</a>
                and check print possibilities. You can even download a <a href="<?= base_url() ?>free-templates/">template</a>
                to check the suitability. Then, if you are unable to find what you need from the 10,277 possibilities,
                don't despair, go to our <a href="<?= SAURL ?>customlabels.php?cat_id=1">Custom</a> section for more
                information or simply call our highly trained and experienced team on
                <?= EMAIL ?>
                . The possibilities are almost limitless and we are always adding more from which to choose. Don't
                forget we can print your labels for you too, why not ask for a <a href="<?= SAURL ?>printed-labels/">quote</a>.
            </small></p>
    </div>
</div>
