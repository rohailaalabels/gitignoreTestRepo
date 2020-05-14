<link rel="stylesheet" href="<?= Assets ?>dist/css/bootstrap-select.css">
<script src="<?= Assets ?>dist/js/bootstrap-select.js"></script>

<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Contact Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<style>
    .map {
        border-bottom: 1px solid #eee;
        border-top: 1px solid #eee;
        height: 350px;
        width: 100%;
    }
</style>
<div id="map" class="map" style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"></div>
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
                            <h1 class="BlueHeading">Getting in Touch</h1>
                            <p>We welcome comments and feedback about our website, along with customer service, delivery
                                and product questions. Which during working hours on weekdays, can also be asked, via
                                the &quot;live chat&quot; facility on the site. However if you would prefer to use the
                                enquiry form below, we will also be in touch. </p>

                            <p>Material samples can also be ordered online from the materials pages in the &quot;Labels
                                on Sheets&quot; tab on the home page. If the material is only available as a roll label
                                then please use this form to request a material sample.</p>

                            <p>Similarly if you require a wholesale quote for a standard size label, this can be
                                submitted online via this website. For a customised shape and/or non-standard size
                                please use the enquiry form. </p><br/>
                        </div>
                        <form class="labels-form" id="contactus-form" method="post">
                            <div class="col-sm-12 col-md-6 p0">
                                <div class="col-sm-12 ">
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <input type="text" name="name" placeholder="Full Name" id="name"
                                               class="required">
                                    </label>
                                </div>
                                <div class="col-sm-12 ">
                                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                                        <input type="text" name="phone" placeholder="Phone Number" id="phone"
                                               class="required">
                                    </label>
                                </div>

                                <div class="col-xs-6 col-sm-12">
                                    <label class="input">
                                        <input type="text" placeholder="Postcode" name="b_pcode" id="b_pcode"
                                               class="required">
                                        <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b>
                                    </label>
                                    <!-- <div class="col-xs-6 col-sm-5  ">
                                             <button id="BillingsearchButton"  class="btn btn-block  btn-primary" type="button">Find Address</button>
                                     </div>-->
                                </div>
                                <!--<div class="col-xs-6 col-sm-12">
                                     <div  id="selectBillingDiv" style="display:none;">


                                                        <label class="select">
                                                             <select onchange="$('#selectBillingDiv').hide();" id="billingaddressListSelect"></select>
                                                             <i></i>
                                                         </label>
                                      </div>
                                 </div>-->

                                <div class="col-xs-6 col-sm-12">
                                    <label class="input"> <i class="icon-append fa fa-briefcase"></i>
                                        <input type="text" placeholder="Company" name="company" id="b_organization">

                                    </label>
                                </div>
                                <div class="col-xs-6 col-sm-12">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_add1" name="add1" value="" placeholder="Address1"
                                               class="required">

                                    </label>
                                </div>


                                <div class="col-sm-12  ">
                                    <label class="input">
                                        <textarea class="form-control" rows="4"
                                                  placeholder="Enter Other Instructions ....." name="subject"
                                                  id="subject"></textarea>
                                    </label>
                                </div>
                                <div class="col-sm-12 ">
                                    <label class="checkbox" style="font-size:12px; text-align:justify !important;">
                                        <input type="checkbox" name="check_box" id="check_box">
                                        <i></i><span>I would like to receive newsletters and information on offers and discount vouchers to the email address provided. In agreeing to receive communication from time-to-time, AA Labels assures you that your contact details will remain confidential and will not be shared with any third-party. </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 p0">

                                <div class="col-sm-12 ">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_add2" name="add2" value="" placeholder="Address2">
                                    </label>
                                </div>

                                <div class="col-sm-12 ">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_city" name="city" value="" placeholder="City"
                                               class="required">
                                    </label>
                                </div>

                                <div class="col-sm-12 ">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_county" name="county" value="" placeholder="County"
                                               class="required">
                                    </label>
                                </div>

                                <div class="col-sm-12 ">
                                    <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                        <input type="text" name="email" placeholder="Email Address" id="email"
                                               class="required">
                                    </label>
                                </div>


                                <div class="col-sm-12 ">
                                    <!-- <label class="input"> <i class="icon-append fa fa-info-circle"></i>
                                       <input type="text" name="inquiry" placeholder="Nature of Enquiry" id="inquiry" class="required">
                                     </label>-->
                                    <label class="select">
                                        <select name="inquiry" id="inquiry" class="required">
                                            <option value="" selected="selected">Nature of Enquiry</option>
                                            <option value="Artwork">Artwork</option>
                                            <option value="Colour matching">Colour matching</option>
                                            <option value="Integrated Labels">Integrated Labels</option>
                                            <option value="Labels for Thermal Printers">Labels for Thermal Printers
                                            </option>
                                            <option value="Materials Specifications">Materials Specifications</option>
                                            <option value="Plain labels (Sheets – A4, A3 &amp; SRA3)(Rolls)">Plain
                                                labels (Sheets – A4, A3 &amp; SRA3) (Rolls)
                                            </option>
                                            <option value="Printed labels">Printed labels</option>
                                            <option value="Samples (Enter Material code)">Samples (Enter Material
                                                code)
                                            </option>
                                            <option value="Wholesale">Wholesale</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <i></i> </label>

                                </div>

                                <div class="col-md-12" id="material_selection" style="display:none;">
                                    <select name="material_selection[]" style=" width:293px;" maxOptions="3" ;
                                            id="first-disabled2" class="selectpicker" multiple data-hide-disabled="true"
                                            data-show-subtext="false" data-size="8">

                                        <? foreach ($material_list as $row) { ?>
                                            <!--	<option value="<?= $row->code ?>"><?= $row->code ?> - <?= $row->description ?></option>-->
                                            <option value="<?= $row->description ?>"><?= $row->code ?>
                                                - <?= $row->description ?></option>
                                        <? } ?>
                                    </select>
                                    <p>select up to 3 different materials</p>
                                </div>
                                <br/>


                                <div class="col-sm-12 ">
                                    <p><strong>Captcha</strong><br>
                                    </p>
                                    <div id="catcha_img"><img onerror='imgError(this);' style=""
                                                              src="<?= SAURL ?>captcha/simplecaptcha.php"
                                                              id="captcha_img" height="60"/></div>
                                </div>
                                <div class="col-xs-6 col-sm-7  ">
                                    <label class="input">
                                        <input type="text" name="captcha" placeholder="Write the following word."
                                               id="captcha" class="required">
                                    </label>
                                </div>
                                <div class="col-xs-5 col-sm-5  ">
                                    <button class="btn btn-primary" type="button"
                                            onclick="$('#captcha').val('');document.getElementById('captcha_img').src='<?= SAURL ?>captcha/simplecaptcha.php?'+Math.random(); document.getElementById('captcha').focus();"
                                            id="change-image">Change Word
                                    </button>
                                </div>
                                <div class="col-xs-12 col-sm-12  ">
                                    <button style="" type="submit"
                                            class="btn-u btn-block btn-u-sm orange text-uppercase">
                                        Submit Now &nbsp; &nbsp;
                                        <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <div class="thumbnail p-l-r-10">
                <div>
                    <h4 class="cBlue">Customer Services</h4>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone"></i> <span class="rTapNumber327505"><?= PHONE ?></span></li>
                        <li>
                            <i class="fa fa-envelope"></i> <?= EMAIL ?></li>
                    </ul>
                    <h4 class="cBlue">Green Technologies Ltd T/A AA Labels
                    </h4>
                    <div itemscope itemtype="http://schema.org/LocalBusiness">
                        <a itemprop="url" href="<?= base_url() ?>">
                            <div itemprop="name"><strong>AA Labels</strong></div>
                        </a>
                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <span itemprop="streetAddress">AA Labels, 23 Wainman Road, </span><br/>
                            <span itemprop="addressLocality">Peterborough</span><br/>
                            <span itemprop="postalCode">PE2 7BU</span><br/>
                            <span itemprop="addressCountry">United Kingdom</span><br/>
                        </div>
                    </div>

                    <h4 class="cBlue">Business Hours</h4>
                    Monday – Friday 08:30 – 17:30
                </div>
            </div>


        </div>
    </div>
</div>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?= Assets ?>js/gmaps.js"></script>
<script>

    $(document).ready(function () {
        var mySelect = $('#first-disabled2');

        $('#special').on('click', function () {
            mySelect.find('option:selected').prop('disabled', true);
            mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function () {
            mySelect.find('option:disabled').prop('disabled', false);
            mySelect.selectpicker('refresh');
        });

    });


    $(document).on("change", "#inquiry", function (e) {
        var val = $(this).val();

        if (val == 'Samples (Enter Material code)') {
            $('#material_selection').show();
            console.log(val);
        } else {
            $('#material_selection').hide();
            console.log('no');
        }
    });


    $(document).on("click", "#change-image", function (e) {
        $('#captcha').val('');
        $('#captcha_img').attr('src', '<?=SAURL?>captcha/simplecaptcha.php?' + Math.random());
        $('#captcha').focus();

    });
    var form = $("#contactus-form");
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
            }
        },
        messages: {
            captcha: {
                remote: " please enter a valid word! "
            }
        },

        submitHandler: function (form) {
            form.submit();
            return false;
        }

    });

    $(document).ready(function () {

        map = new GMaps({
            div: '#map',
            lat: 52.553834,
            lng: -0.265892
        });
        map.addMarker({
            lat: 52.553834,
            lng: -0.265892
        });
    });
</script> 
