<script src="<?= Assets ?>js/labelfinder.js?ver=<?= time() ?>"></script>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Custom Labels</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="printed-lba-a4 ">
    <div class="container ">
        <div class="col-md-8 col-sm-12  m-t-30  ">
            <h2>CUSTOM LABELS – SHAPE & SIZE</h2>
            <p class="text-justify">At AA Labels, we know that choosing the right labels can make a big difference to
                product aesthetics, brand image and business outcomes. Therefore, if you can´t find the labels you need
                from our selection of labels on sheets, we will work with you to design a label shape and size to meet
                your exact requirements. Use the form below to let us know your precise requirements, including shape,
                size, material, and the number of labels you need.</p>

        </div>
        <div class="col-md-4 col-sm-12 ">
            <img onerror='imgError(this);' class="img-responsive"
                 src="<?= Assets ?>images/header/customlabels-banner.png">
        </div>
    </div>
</div>


<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-8 col-md-8 ">

                <div class="thumbnail p-l-r-10">
                    <div class="m-t-15 col-md-12 ">
                        <? if (isset($msg) and $msg != '') { ?>
                            <div role="alert" class="alert alert-<?= $class ?> alert-dismissible fade in">
                                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span
                                            aria-hidden="true">×</span></button>
                                <?= $msg ?>
                            </div>
                        <? } ?>

                        <div>
                            <h2 class="BlueHeading">Design your own labels </h2>
                            <p>If none of the labels from our standard range are suitable for your purpose, then we will
                                provide you with a quotation that meets your exact requirements. We can accept and use
                                your artwork in a number of file formats and can provide design assistance if required.
                            </p>
                        </div>

                        <form class="labels-form" id="printing-form" method="post" action=""
                              enctype="multipart/form-data">
                            <input type="hidden" value="printing" id="page_type"/>
                            <h4 class="m-b-10">Please Fill In Your Requirements</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" col-md-4">
                                        <label class="select">
                                            <select id="category" name="category" autocomplete="off"
                                                    class="disabled required">
                                                <option selected="selected" value="">Label Category</option>
                                                <option value="A5">Labels on A5 Sheet</option>
                                                <option value="A4">Labels on A4 Sheet</option>
                                                <option value="A3">Labels on A3 Sheet</option>
                                                <option value="SRA3">Labels on SRA3 Sheet</option>
                                                <option value="Roll">Labels on Roll</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="select">
                                            <select id="shape" name="shape" class="required">
                                                <option value="">Label Shape</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="input">
                                            <input type="text" name="width" id="width" placeholder="Width mm"
                                                   class="required">
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="input">
                                            <input type="text" name="height" id="height" placeholder="Height mm"
                                                   class="required">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <label class="input">
                                            <input type="text" name="quantity" id="quantity"
                                                   placeholder="Number of labels" class="required">
                                        </label>
                                    </div>
                                    <div class=" col-md-4">
                                        <label class="select">
                                            <select name="material" id="custom_material_list" class="required">
                                                <option value="" selected="selected" disabled="">Select Material
                                                </option>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="select">
                                            <select id="printing_required" name="printing_required">
                                                <option value="" selected="selected" disabled="">Printing Required ?
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>

                                            </select>
                                            <i></i> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="input">
                                            <textarea placeholder="Enter Other Instructions ....." rows="3"
                                                      class="form-control" name="subject" id="subject"></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="upload_box" style="display:none;">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="input ">
                                            <p><strong>Upload Artwork
                                                </strong><br><small> Please note uploaded files must be no larger than
                                                    2Mb and to achieve the best results for your finished labels you
                                                    will need a professional standard of artwork. We require scaled,
                                                    print-ready studio artwork, supplied in editable PDF or EPS format,
                                                    with a minimum resolution of 300dpi. No original artwork or image
                                                    files can be uploaded.</small></p>
                                        </div>
                                        <div class="col-xs-6 col-sm-8">
                                            <input id="file_up" class="m-t-15" style="display:none;" type="file"
                                                   name="file_up">
                                        </div>

                                        <div class="clear10"></div>
                                        <div class="col-sm-4  ">
                                            <button class="btn btn-primary" type="button"
                                                    onclick="$('#file_up').trigger('click');">
                                                <i class="fa fa-cloud-upload"></i> Upload
                                            </button>
                                        </div>

                                        <div class="clear10"></div>
                                        <hr class="col-sm-12 m-t-b-10">
                                    </div>
                                </div>
                            </div>
                            <h4 class="m-b-10">Contact Information</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="">
                                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                                <input type="text" placeholder="Full Name" name="name" id="name"
                                                       class="required">
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                                <input type="text" placeholder="Email" name="email" id="email"
                                                       class="required">
                                            </label>
                                        </div>
                                        <div>
                                            <label class="input"> <i class="icon-append fa fa-phone"></i>
                                                <input type="text" placeholder="Phone" name="phoneNumber"
                                                       class="required" id="phoneNumber">
                                            </label>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 p0  ">
                                            <label class="input">
                                                <input type="text" placeholder="Postcode" name="b_pcode" id="b_pcode"
                                                       class="required">
                                                <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b>
                                            </label>
                                            <!--<div class="col-xs-6 col-sm-5  ">
                                                    <button id="BillingsearchButton"  class="btn btn-block  btn-primary" type="button">Find Address</button>
                                            </div>-->
                                        </div>
                                        <!--<div class="col-xs-6 col-sm-12 p0  ">
                                        <div  id="selectBillingDiv" style="display:none;">


                                                           <label class="select">
                                                                <select onchange="$('#selectBillingDiv').hide();" id="billingaddressListSelect"></select>
                                                                <i></i>
                                                            </label>
                                         </div>
                                         </div><div class="clear"></div>
                                         -->


                                        <div class="col-xs-6 col-sm-12 p0  ">
                                            <label class="input"> <i class="icon-append fa fa-briefcase"></i>
                                                <input type="text" placeholder="Company" name="company"
                                                       id="b_organization" class="required">

                                            </label>
                                        </div>


                                        <div class="col-xs-6 col-sm-12 p0  ">
                                            <label class="input"> <i class="icon-append fa fa-map"></i>
                                                <input type="text" id="b_add1" name="add1" value=""
                                                       placeholder="Address1" class="required">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 ">


                                        <div>
                                            <label class="input"> <i class="icon-append fa fa-map"></i>
                                                <input type="text" id="b_add2" name="add2" value=""
                                                       placeholder="Address2">

                                            </label>
                                        </div>
                                        <div>
                                            <label class="input"> <i class="icon-append fa fa-map"></i>
                                                <input type="text" id="b_city" name="city" value="" placeholder="City"
                                                       class="required">

                                            </label>
                                        </div>
                                        <div>
                                            <label class="input"> <i class="icon-append fa fa-map"></i>
                                                <input type="text" id="b_county" name="county" value=""
                                                       placeholder="County" class="required">

                                            </label>
                                        </div>


                                        <div class=" ">

                                            <div>
                                                <p class="clear_b"><strong>Captcha</strong>
                                                </p>
                                                <img onerror='imgError(this);' style=""
                                                     src="<?= SAURL ?>captcha/simplecaptcha.php" id="captcha_img"
                                                     width="225" height"70"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-8  col-md-7  ">
                                            <label class="input">
                                                <input type="text" name="captcha" id="captcha" class="required">
                                                <b class="tooltip tooltip-bottom-right">Write the following word.</b>
                                            </label>

                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-5  ">
                                            <button class="btn btn-block  btn-primary" type="button"
                                                    onclick="$('#captcha').val('');document.getElementById('captcha_img').src='<?= SAURL ?>captcha/simplecaptcha.php?'+Math.random(); document.getElementById('captcha').focus();"
                                                    id="change-image">Change Word
                                            </button>
                                        </div>
                                        <div class="col-xs-12 col-sm-12  ">
                                            <button style="" type="submit" class="btn  orange text-uppercase">Submit Now
                                                &nbsp; &nbsp; <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- Advertising Banners for free delivery start-->
            <? $this->load->view('advertising/free_delivery'); ?>
            <? $this->load->view('advertising/free_shipping'); ?>
            <!-- Advertising Banners for free delivery end-->

        </div>
    </div>
</div>


<div class="printed-lba-call ">
    <div class="container ">
        <div class="col-lg-9 col-md-8  col-sm-8">
            <h2>INFORMATION & ADVICE <br/><small>We’re here to help you chose the label that’s right for you.</small>
            </h2>
            <p class="text-justify">If you need assistance or help deciding which label material, colour, finish, or
                adhesive is suitable for the label application and the Custom Labels. Please contact our customer care
                team, via the live-chat facility on the page, our website contact form, telephone, or email and they
                will be happy to discuss your requirements.</p>
        </div>
        <div class="col-lg-3 col-md-4  col-sm-4 ">
            <img onerror='imgError(this);' class="img-responsive" src="<?= Assets ?>images/header/call_opr_1.png">
        </div>
    </div>
</div>

<script>

    $(document).on("click", "#change-image", function (e) {
        $('#captcha').val('');
        $('#captcha_img').attr('src', '<?=SAURL?>captcha/simplecaptcha.php?' + Math.random());
        $('#captcha').focus();

    });

    $(document).on("change", "#category", function (e) {
        $('#custom_material_list').html('<option value="" selectd="selected">Select Material</option>');
    });


    $(document).on("change", "#printing_required", function (e) {
        var val = $(this).val();
        if (val == 'Yes') {
            $('#upload_box').show();
        } else {
            $('#upload_box').hide();
        }
    });

    $(document).on("change", "#shape", function (e) {
        var val = $(this).val();
        var cat = $('#category').val();


        if (val == 'Circular' || val == 'Square') {
            $('#height').hide();
            $('#width').val('');
            $('#height').val('');

        } else {
            $('#width').val('');
            $('#height').val('');
            $('#height').show();
        }

        if (val == 'Circular') {
            $('#width').attr('placeholder', 'Diameter');

        } else {
            $('#width').attr('placeholder', 'Width mm');
        }

        if (val != '' && cat != '') {
            $.ajax({
                url: base + 'ajax/materail_for_custom/',
                type: "POST",
                async: "false",
                datatype: "html",
                data: {category: cat, shape: val},
                success: function (data) {
                    $('#custom_material_list').html(data);

                }
            });


        } else {

            swal("", "please select category first !", "warning");
        }

    });
    var form = $("#printing-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
        },
        rules: {
            email: {
                required: true,
                email: true,
            },
            captcha: {
                required: true,
                onkeyup: false,
                remote: base + "ajax/is_valid_captcha"
            },
            file_up: {
                extension: "jpg|gif|png|pdf|tiffs|jpeg",
            }
        },

        submitHandler: function (form) {
            form.submit();
        }

    });

</script>
