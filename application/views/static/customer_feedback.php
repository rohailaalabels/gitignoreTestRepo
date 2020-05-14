<style>
    .floating_li {
        float: left;
        clear: left;
        border: 1px solid black;
    }
</style>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Customer Questionnaire</li>
            </ol>
        </div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="panel">
            <div class="col-sm-6 col-md-6 pull-left">
                <h1>Customer Questionnaire</h1>
            </div>
            <div class="col-sm-6 col-md-6 p-l-r-15 pull-right"><a role="button" class="btn orange pull-right"
                                                                  href="<?= base_url() ?>"> <i
                            class="fa fa-arrow-circle-left faa-horizontal animated"></i>&nbsp; Continue Shopping </a>
                <div class="clear10"></div>
            </div>
            <div class="clear"></div>
        </div>

        <!-- Checkout -->

        <div class=" thumbnail">
            <? if (isset($msg) and $msg != '') { ?>
                <div role="alert" class="alert alert-<?= $class ?> alert-dismissible fade in">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span
                                aria-hidden="true">×</span></button>
                    <?= $msg ?>
                </div>
            <? } ?>
            <form name="questinare_form" id="questinare_form" method="post" class="labels-form " action="">
                <div class="">
                    <ul class="nav feedbackStep setup-panel ">
                        <li class="active"><a href="#step-1"> <i class="fa fa-2x fa-briefcase p-t-b"></i> </a></li>
                        <li class="disabled"><a href="#step-2"> <i class="fa fa-2x fa-coffee p-t-b"></i> </a></li>
                        <li class="disabled"><a href="#step-3"> <i class="fa fa-2x fa-cubes p-t-b"></i> </a></li>
                        <li class="disabled"><a href="#step-4"> <i class="fa fa-2x fa-envelope p-t-b"></i> </a></li>
                    </ul>
                    <div class="setup-content" id="step-1">
                        <div class="">
                            <div class="col-sm-12 p0">
                                <h2 class="m-t-b-8 m-l-20 BlueHeading">Business Type</h2>
                                <p class="m-t-b-8 m-l-20">Please select the option that most closely describes your
                                    industry sector and business activity</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-md-12 ">
                                    <label class="select">
                                        <select name="busness_type" id="busness_type" class="required">
                                            <option value="">Select</option>
                                            <?php foreach ($bussnes_type as $option) { ?>
                                                <option value="<?= $option->SubType ?>">
                                                    <?= $option->Type ?>
                                                </option>
                                            <? } ?>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class="col-md-12" id="other_busness_type">
                                    <label class="select">
                                        <select id="sub_busness_type" name="sub_busness_type" class="required">
                                            <option value="" selected="selected">Select</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-md-12">
                                    <label class="input">
                    <textarea id="busness_other" name="busness_other" placeholder="Enter Other Instructions ....."
                              rows="3" class="form-control hide required">
</textarea>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center "><i class="fa f-150  fa-users"></i></div>
                            </div>
                        </div>
                        <div class="col-sm-12 m-b-10">
                            <hr>
                            <div class="col-xs-6  col-sm-6 col-md-6"></div>
                            <div class="col-xs-6 col-sm-6 col-md-6 ">
                                <div class="pull-right ">
                                    <button type="button" id="activate-step-2" class="btn m-t-15 orange pull-right">
                                        Next <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="setup-content" id="step-2">
                        <div class="">
                            <div class="col-sm-12 p0">
                                <h2 class="m-t-b-8 m-l-20 BlueHeading">Application</h2>
                                <p class="m-t-b-8 m-l-20">Please indicate how you are using labels by ticking the
                                    relevant check boxes below</p>
                            </div>
                            <hr class="col-lg-12 m-t-b-10">
                            <div class="clear"></div>
                            <!--border-line-->

                            <!--first column-->
                            <!-- first section-->
                            <div class="col-md-12 p0" style="list-style:none;">
                                <?php $i = 1;
                                foreach ($application_type as $option) { ?>
                                    <div class="col-md-3  m-l-20 m-b-10">
                                        <label class="checkbox">
                                            <input id="application_array" name="application_array[]" type="checkbox"
                                                   class="textOrange app_checked" value="<?= $option->ID ?>">
                                            <i></i>
                                            <?= $option->Type ?>
                                        </label>
                                    </div>
                                    <?
                                    $i++;
                                }
                                ?>
                            </div>
                            <!--first column Ends-->

                            <hr class="col-lg-12 m-t-b-10">
                            <div class="col-sm-4 p0">
                                <div>
                                    <h4 class=" m-l-20 m-b-10  cBlue">Do you print on the labels?</h4>
                                </div>
                                <div class="col-sm-12  m-l-10 m-b-10  ">
                                    <label class="radio state-success col-sm-4">
                                        <input type="radio" name="print_labels_btn" id="print_labels_btn1" value="1">
                                        <i class="rounded-x"></i> Yes </label>
                                    <label class="radio col-sm-8 ">
                                        <input type="radio" name="print_labels_btn" id="print_labels_btn1" value="0">
                                        <i class="rounded-x"></i> No</label>
                                </div>
                            </div>
                            <div class="col-sm-8 p0">
                                <div>
                                    <h4 class=" m-l-20 m-b-10  cBlue">If no, do you use third-party print service?</h4>
                                </div>
                                <div class="col-sm-12  m-l-10 m-b-10  ">
                                    <label class="radio state-success col-sm-2">
                                        <input type="radio" name="third_party_btn1" id="third_party_btn1" value="1"
                                               class="radio_checker">
                                        <i class="rounded-x"></i> Yes </label>
                                    <label class="radio col-sm-10 ">
                                        <input type="radio" name="third_party_btn1" id="third_party_btn1" value="0"
                                               class="radio_checker">
                                        <i class="rounded-x"></i> No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 m-b-10">
                            <hr>
                            <div class="col-xs-6  col-sm-6 col-md-6">
                                <div class="col-xs-6  col-sm-6 col-md-6  ">
                                    <div class="pull-left ">
                                        <button id="previous_1" type="button" class="btn m-t-15 blue2 pull-left"><i
                                                    class="fa fa-arrow-circle-left"></i> Previous
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 ">
                                <div class="pull-right ">
                                    <button type="button" id="activate-step-3" class="btn orange m-t-15 pull-right">
                                        Next <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="setup-content" id="step-3">
                        <div class="">
                            <div class="col-sm-12 p0">
                                <h2 class="m-t-b-8 m-l-20 BlueHeading">Product Range </h2>
                                <p class="m-t-b-8 m-l-20">What products from the following list have you used and/or
                                    might consider using in the future?</p>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-md-3 ">
                                    <label class="select">
                                        <select name="product_type" id="product_type" class="required">
                                            <option value="">Select product type</option>
                                            <option value="A5">A4 Sheets</option>
                                            <option value="A4">A4 Sheets</option>
                                            <option value="A3">A3 Sheets</option>
                                            <option value="SRA3">SRA3 Sheets</option>
                                            <option value="Roll">Roll Labels</option>
                                            <option value="THERMAL ROLL">THERMAL ROLL LABELS</option>
                                            <option value="Integrated">INTEGRATED LABELS</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class="col-md-3 ">
                                    <label class="select">
                                        <select name="matr_type" id="matr_type" class="required">
                                            <option value="">Select Material Type</option>
                                            <? foreach ($matt_type as $mat) {
                                                echo "<option value=" . $mat->ID . ">" . $mat->title . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class="col-md-3 ">
                                    <label class="select">
                                        <select id="sub_mat_type" name="sub_mat_type" class="required">
                                            <option value="" selected="selected">Select Adhesive</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class="col-md-3 ">
                                    <label class="select">
                                        <select id="sub_fin_col" name="sub_fin_col" class="required">
                                            <option value="" selected="selected">Select Finish & Colour</option>
                                            <? foreach ($fin_col as $fin_cols) {
                                                echo "<option value=" . $fin_cols->ID . ">" . $fin_cols->title . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <i></i> </label>
                                </div>
                            </div>
                            <hr class="col-lg-12 m-t-b-10">
                            <div class="col-sm-12 p0">
                                <h2 class="m-t-b-8 m-l-20 BlueHeading">Reasons for choosing AA Labels</h2>
                                <p class="m-t-b-8 m-l-20">Please tell us about the three most important aspects of our
                                    products and service for you, by ticking three of the headings on this page. </p>
                            </div>
                            <div class="col-sm-12">
                                <?

                                foreach ($chosing_type as $chosing) { ?>
                                    <div class="col-md-3 m-b-10">
                                        <label class="checkbox">
                                            <input id="rating_val" name="rating_val[]" type="checkbox"
                                                   class="textOrange app_checked" value="<?= $chosing->ID ?>">
                                            <i></i>
                                            <?= $chosing->Title ?>
                                        </label>
                                    </div>
                                <? } ?>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-md-12">
                                    <label class="input">
                                        <textarea name="reason_other" id="reason_other"
                                                  placeholder="Any other comments:" rows="6"
                                                  class="form-control"></textarea>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 m-b-10">
                            <hr>
                            <div class="col-xs-6  col-sm-6 col-md-6">
                                <div class="col-xs-6  col-sm-6 col-md-6  ">
                                    <div class="pull-left ">
                                        <button id="previous_2" type="button" class="btn blue2 m-t-15 pull-left"><i
                                                    class="fa fa-arrow-circle-left"></i> Previous
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 ">
                                <div class="pull-right ">
                                    <button type="button" id="activate-step-4" class="btn orange m-t-15 pull-right">Next
                                        <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="setup-content" id="step-4">
                        <div class="cfq">
                            <div class="col-lg-6 col-md-6 col-sm-12 detail-text">
                                <p>We thank you for taking the time to complete this brief questionnaire and your
                                    answers will help us to understand how we might improve still further the products
                                    and service available for customers.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 pp-link"><a href="#" data-target=".delivery_info"
                                                                                data-toggle="modal" class="pull-right">aaLabels
                                    Privacy Policy <i aria-hidden="true" class="fa fa-arrow-circle-right"></i></a></div>
                        </div>
                        <div class="clear"></div>
                        <div class="col-sm-12 m-b-10">
                            <hr>
                            <div class="col-xs-6  col-sm-6 col-md-6">
                                <div class="col-xs-6  col-sm-6 col-md-6  "></div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 ">
                                <div class="pull-right ">
                                    <button type="submit" id="activate-step-5" class="btn orange m-t-15 pull-right">
                                        Submit Now <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade delivery_info" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">Green Technologies Ltd t/a AA Labels - www.aalabels.com <a
                            href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
            </div>
            <div class="">
                <? /*include('deliveryinfo.php'); */
                include(APPPATH . 'views/shopping/deliveryinfo.php'); ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<script>


    $(document).on("change", "#busness_type", function (e) {

        var busness_type = $('#busness_type').val();
        if (busness_type != 0 || busness_type != '') {
            $.ajax({
                url: "<?=base_url()?>ajax/get_bussines_subtype",
                dataType: "html",
                type: 'POST',
                data: {ids: busness_type},
                success: function (data) {
                    if (data) {
                        if (busness_type == 1000) {
                            $('#other_busness_type').html('<label class="input"><input id="other_app" name="other_app" class="required"><i></i></label>');
                            $('#busness_other').removeClass('form-control').addClass('form-control hide');
                        } else {
                            $('#other_busness_type').html('<label class="select"><select id="sub_busness_type" name="sub_busness_type" class="required"><option value="" selected="selected">Select</option></select><i></i> </label>');
                            $('#sub_busness_type').html(data);
                        }
                    }
                }
            });  ///\\\   Ajax End
        } else {
            $('#sub_busness_type').empty();

        }


    });

    $(document).on("change", "#sub_busness_type", function (e) {
        var business_type = $('#sub_busness_type').val();
        if (business_type == "other") {
            $('#busness_other').removeClass('form-control hide').addClass('form-control');
        } else {
            $('#busness_other').removeClass('form-control').addClass('form-control hide');
        }
    });


    $(document).on("change", "#matr_type", function (e) {
        var matr_type = $('#matr_type').val();
        var product_type = $('#product_type').val();
        if (product_type == 0 || product_type == '') {
            swal("Alert", "Select product type first", "warning");

            return false;
        }
        if (matr_type != 0 || matr_type != '') {
            $.ajax({
                url: "<?=base_url()?>ajax/get_material_subtype",
                dataType: "html",
                type: 'POST',
                data: {ids: matr_type},
                success: function (data) {
                    if (data) {
                        $('#sub_mat_type').html(data);

                    }
                }
            });  // Ajax End

        } else {
            $('#sub_mat_type').empty();


        }
    });

    $(document).ready(function () {
        var err_val = 0;
        var form = $("#questinare_form");
        form.validate({
            errorPlacement: function (error, element) {
                //alert(error.text());
                var id = element.attr('class');

                err_val = 0;
                element.after(error);

                return false;

            },
            onclick: false,
            onfocusout: false,
            submitHandler: function (form) {
                if (form.valid() == true) {
                    console.log('form is about to submit');
                    form.submit();
                    return true;
                } else {
                    console.log('validation error');
                    return false;
                }
            }
        });


        var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                form.validate().settings.ignore = ":disabled,:hidden";

                if (form.valid() == true) {
                    navListItems.closest('li').removeClass('active');
                    $item.addClass('active');
                    allWells.hide();
                    $target.show();
                    //err_val = 0;
                }
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        /***** Billing page btn ***/
        $('#activate-step-2').on('click', function (e) {
            form.validate().settings.ignore = ":disabled,:hidden";
            if (form.valid() == true) {
                //  err_val = 0;
                $('ul.setup-panel li:eq(1)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-2"]').trigger('click');

            }
        })

        /***** Delivery page btn ***/
        $('#activate-step-3').on('click', function (e) {
            form.validate().settings.ignore = ":disabled,:hidden";
            if (form.valid() == true) {
                //err_val = 0;
                var total = $('[name="application_array[]"]:checked').length;


                var option2 = $("input[name='print_labels_btn1']:checked").val();
                var option3 = $("input[name='third_party_btn1']:checked").val();

                if (total == 0) {
                    swal("Alert", "Select Atleast one option", "warning");
                    return false;
                }
                if (option2 == "undefined" && option3 == "undefined") {
                    swal("Alert", "Select printing service", "warning");
                    return false;
                }
                if (option2 == 0 && option3 == "undefined") {
                    swal("Alert", "Select printing service", "warning");
                    return false;
                }

                $('ul.setup-panel li:eq(2)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            }

        })

        /***** Shipping page btn ***/
        $('#activate-step-4').on('click', function (e) {
            form.validate().settings.ignore = ":disabled,:hidden";
            if (form.valid() == true) {

                var service_total = $('[name="rating_val[]"]:checked').length;
                if (service_total < 3) {
                    swal("Alert", "Select atleast three options", "warning");
                    return false;
                }

                $('ul.setup-panel li:eq(3)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-4"]').trigger('click');
            }
        })

        $('#previous_1').on('click', function (e) {
            $('ul.setup-panel li a[href="#step-1"]').trigger('click');
        })
        $('#previous_2').on('click', function (e) {
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        })

    });
</script>