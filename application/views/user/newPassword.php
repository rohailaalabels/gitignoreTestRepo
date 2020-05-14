<style>
    .password-validation-span-text {
        font-size: 11px;
    }

    .password-validation-span-text-alert {
        font-size: 11px;
        color: #8a1f11;
    }

    .m-b-10-input {
        margin-bottom: 10px;
    }
</style>
<!--usman-->
<script type="text/javascript" src="<?= Assets ?>js/password_strengthen_plugin.js"></script>
<!--usman-->

<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="#"><i class="fa fa-home"></i></a></li>

                <li class="active">Forgot Password</li>
            </ol>
        </div>

    </div>
</div>
<div class="signinBg text-center">
    <div class="container">
        <h1>Forgot Password</h1>
        <p>customercare@aalabels.com</p>
    </div>
</div>
<div class="bgGray">
    <div class="container">


        <div class=" thumbnail">
            <div>
                <!--    usman new-->
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-  alert-danger fade in">
                        <button class="close cross-button" type="button" data-dismiss="alert"> ×</button>
                        <p class="m-l-10"><?= $this->session->flashdata('message'); ?></p>
                    </div>
                <?php } ?>
                <!--    usman new-->
                <? if (isset($msg) and $msg != '') { ?>

                    <div class="alert alert-block alert-<?= $class ?> fade in">
                        <button class="close cross-button" type="button" data-dismiss="alert"> ×</button>
                        <p class="m-l-10"><?= $msg ?></p>
                    </div>

                <? } ?>


                <!--                    usman-->
                <div id="pwd-container">
                    <!--               usman-->
                    <form class="labels-form" id="login_form" method="post" action="">
                        <input type="hidden" name="page" value="login"/>
                        <input type="hidden" name="uid" value="<?= $uid ?>"/>

                        <div class="col-sm-6 m-t-10">
                            <div class="bgBlueHeading  ">
                                <div class=" f-16 ">Please enter your new password</div>
                            </div>
                            <div class="borderPanel" style="min-height: 220px;">

                                <div class="m-t-15  ">
                                    <div class="p-l-r-10">
                                        <label id="server_error" style=" display:none;" class="error"></label>

                                        <div class="col-sm-12 m-b-10-input">
                                            <label class="input"><i class="showPassword icon-append fa fa-eye"></i>
                                                <input type="password" placeholder="Password" name="password"
                                                       id="password">
                                            </label>
                                            <!--                                                    usman-->
                                            <input type="hidden" value="bottom" class="pop_position_class">

                                            <div class="pwstrength_viewport_progress"></div>
                                            <!--usman-->
<!--                                            <span class="password-validation-span-text">Password must have between 8 and 20 characters, a lowercase letter, an uppercase letter, a number, one symbol i.e. ! &amp; * @ # ?</span>-->

                                        </div>
                                        <div class="col-sm-12 m-b-10-input">
                                            <label class="input">
                                                <i class="showConfirmPassword icon-append fa fa-eye"></i>
                                                <input type="password" placeholder="Confirm Password " name="cpassword"
                                                       id="cpassword">
                                            </label>

<!--                                            <span class="password-validation-span-text-alert">Your password did not match</span>-->
                                        </div>
                                        <div style="    padding-left: 7.5px;padding-right: 7.5px;">
                                            <button type="submit"
                                                    class="btn-u btn-u-sm orange text-uppercase pull-right">Confirm
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="col-sm-6 m-t-10">
                        <div class="bgBlueHeading  ">
                            <div class="  f-16"> Create An Account</div>
                        </div>
                        <div class="borderPanel" style="min-height: 220px;">
                            <div class="m-t-15">
                                <div class="p-l-r-10">
                                    <div class="text-center">
                                        <img src="<?= Assets ?>images/logo.png" alt="" style="width: 45%;"></div>
                                    <div style="margin-top: 20px;">
                                        <label class="pull-left">
                                            <i class="fa fa-5x fa-user-plus cBlue"></i> </label>
                                    </div>
                                    <div>
                                        <a href="<?= SAURL ?>users/signup/"
                                           class="btn orange text-uppercase m-t-30 pull-right"
                                           style="margin-top: 20px;">
                                            Sign up now <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>

    //for changing cursor
    $('.showPassword, .showConfirmPassword').mouseenter(function(){
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

    $(document).ready(function () {
        var form = $("#login_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                password: "required",
                cpassword: {
                    equalTo: "#password"
                },
            }, messages: {
                password: {
                    remote: $.validator.format("Password cant be same as your old password or account name.")
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>