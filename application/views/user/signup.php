<style>
    .password-validation-span-text {
        font-size: 12px;
    }

    .password-validation-span-text-alert {
        font-size: 12px;
        color: #8a1f11;
    }

    .m-b-10-input {
        margin-bottom: 10px;
    }
</style>
<!--<script type="text/javascript" src="--><? //=Assets?><!--js/password_strength.js"></script>-->
<!--usman-->
<script type="text/javascript" src="<?= Assets ?>js/password_strengthen_plugin.js"></script>
<!--usman-->
<!--<link rel="stylesheet" type="text/css" href="--><? //=Assets?><!--css/password_strength.css">-->

<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Sign up</li>
            </ol>
        </div>
    </div>
</div>
<div class="userBg text-center">
    <div class="container">
        <h1>New User?</h1>
        <p>customercare@aalabels.com</p>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <? if (isset($msg) and $msg != '') { ?>
            <div class="alert alert-block alert-<?= $class ?> fade in">
                <button class="close" type="button" data-dismiss="alert"> ×</button>
                <p>
                    <?= $msg ?>
                </p>
            </div>
        <? } ?>
        <div class="row">
            <div class="col-xs-12  col-sm-8 col-md-8 col-lg-9 ">
                <div class=" thumbnail  p-l-r-10">
                    <h2 class="BlueHeading m-l-20">Please Register Now</h2>
                    <form class="labels-form " id="signup_form" method="post" action="">
                        <div class=" m-t-b-10 ">
                            <div>
                                <div class="col-sm-12">
                                    <div class="col-md-12  ">
                                        <label class="input"><i class="icon-append fa fa-user"></i>
                                            <input type="text" name="firstname" id="firstname" placeholder="First Name"
                                                   class="required">
                                        </label>
                                    </div>
                                    <div class="col-md-12  ">
                                        <label class="input"><i class="icon-append fa fa-user"></i>
                                            <input type="text" id="lastname" name="lastname" placeholder="Last  Name"
                                                   class="required">
                                            <input type="hidden" id="username" value="">
                                        </label>
                                    </div>
                                    <div class="col-sm-12 m-b-10-input">
                                        <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                            <input type="email"
                                                   placeholder="Email Address  (Your email address will be your log in ID)"
                                                   name="email" id="email">
                                        </label>
                                    </div>
                                    <!--                    usman-->
                                    <div class="col-sm-12" id="pwd-container">
                                        <!--                    <div id="password_area"></div>-->
                                        <label class="input"> <i class="showPassword icon-append fa fa-eye"></i>
                                            <input type="password" placeholder="Password" name="password" id="password"
                                                   style="margin-bottom: 5px;">


                                            <!--                                            <span class="password-validation-span-text">Password must have between 8 and 20 characters, a lowercase letter, an uppercase letter, a number, one symbol i.e. ! &amp; * @ # ?</span>-->
                                        </label>
                                        <input type="hidden" value="bottom" class="pop_position_class">

                                        <div class="pwstrength_viewport_progress"></div>

                                    </div>
                                    <!--                    usman-->
                                    <div class="col-sm-12 m-b-10-input">
                                        <label class="input"> <i class="showConfirmPassword icon-append fa fa-eye"></i>
                                            <input type="password" placeholder="Confirm Password " name="cpassword"
                                                   id="cpassword" style="margin-bottom: 5px;">
                                        </label>
                                        <!--                                        <span class="password-validation-span-text-alert">Your password did not match</span>-->
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-12 "> Captcha:</div>
                                    <div class="whiteBg col-md-12   "><img onerror='imgError(this);' id="captcha_img"
                                                                           class="img-responsive"
                                                                           src="<?= SAURL ?>captcha/simplecaptcha.php"
                                                                           alt="" width="225" height="70"></div>
                                    <div class="">
                                        <label class="input col-xs-7 col-sm-10 p0    ">
                                            <input type="text" name="captcha" id="captcha"
                                                   placeholder="Write the following word">
                                        </label>
                                        <label class="input col-xs-5 col-sm-2  "> <a href="javascript:void(0);"
                                                                                     id="change_btn" class="btn blueBg"
                                                                                     role="button"> <i
                                                        class="fa fa-refresh "></i> Change</a> </label>
                                    </div>
                                    <div class="col-sm-12 clear">
                                        <label class="checkbox" style="font-size:12px; text-align:justify !important;">
                                            <input type="checkbox" checked="checked" name="newsletter_val"
                                                   id="newsletter_val" class="textOrange">
                                            <i></i> <span>I would like to receive newsletters and information on offers and discount vouchers to the email address provided. In agreeing to receive communication from time-to-time, AA Labels assures you that your contact details will remain confidential and will not be shared with any third-party. </span>
                                        </label>
                                    </div>
                                    <div class=" col-sm-12   ">
                                        <button type="submit" id="activate-step-2"
                                                class="btn orangeBg m-t-20 col-xs-12 col-sm-4 "> Submit Now <i
                                                    class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12  col-sm-4 col-md-4 col-lg-3">
                <div class="thumbnail p-l-r-10" style="padding-bottom: 12px !important;"><img onerror='imgError(this);'
                                                                                              width="339" height="428"
                                                                                              alt=""
                                                                                              src="<?= Assets ?>images/dpd.jpg"
                                                                                              class="m-t-10"></div>
            </div>
        </div>
    </div>
</div>
<script>
    //for changing cursor
    $('.showPassword, .showConfirmPassword').mouseenter(function () {
        $('.showPassword, .showConfirmPassword').css('cursor', 'pointer');
    });

    //for password hide/show
    $('.showPassword').click(function () {
        if ($('#password').attr('type') === 'password') {
            $('#password').attr('type', 'text');
            $('.showPassword').addClass('fa-eye-slash');
        } else {
            $('#password').attr('type', 'password');
            $('.showPassword').addClass('fa-eye');
            $('.showPassword').removeClass('fa-eye-slash');


        }
    });

    //for confirm password hide/show
    $('.showConfirmPassword').click(function () {
        if ($('#cpassword').attr('type') === 'password') {
            $('#cpassword').attr('type', 'text');
            $('.showConfirmPassword').addClass('fa-eye-slash');

        } else {
            $('#cpassword').attr('type', 'password');
            $('.showConfirmPassword').addClass('fa-eye');
            $('.showConfirmPassword').removeClass('fa-eye-slash');
        }
    });

    $(document).on("click", "#change_btn", function (e) {
        $('#captcha').val('');
        $('#captcha_img').attr('src', '<?=SAURL?>captcha/simplecaptcha.php?' + Math.random());
        $('#captcha').focus();

    });

    $(document).ready(function () {
        // usman
        //   $("#password_area").strength_meter({
        //    strengthMeterClass: 't_strength_meter'
        // });
        // usman

        var form = $("#signup_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                password: "required",
                cpassword: {
                    equalTo: "#password"
                },
                customer_password: {
                    required: true,
                    onkeyup: false,
                    remote: base + "ajax/is_password_exist"
                },
                email: {
                    required: true,
                    email: true,
                    onkeyup: false,
                    remote: base + "ajax/is_email_exist"
                },
                captcha: {
                    required: true,
                    onkeyup: false,
                    remote: base + "ajax/is_valid_captcha"
                }
            },
            messages: {
                email: {
                    remote: $.validator.format("This email address is already taken.")
                },
                captcha: {
                    remote: "please enter valid captcha!"
                }

            },
            submitHandler: function (form) {
                //var confirm_check = $('input[name=newsletter_val]:checked').val();
                //if(typeof  confirm_check =="undefined" ){
                //alert_box("Please check the latest news, offers and discount checkbox!");
                //return false;
                //}else{
                form.submit();
                return true;
                //}

            }

        });


        <? if(SITE_MODE == 'live' and isset($class) and $class != ''){
        if($class == 'success') {  ?>
        dataLayer.push({'event': 'new-user-registration-success'});
        <? }
        else if($class == 'danger'){ ?>
        dataLayer.push({'event': 'new-user-registration-fail', 'validation-error': '<?=$failed_reason?>'});
        <? } } ?>
    });
</script>