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
                <? if (isset($msg) and $msg != '') { ?>
                    <div class="alert alert-block alert-<?= $class ?> fade in">
                        <button class="close cross-button" type="button" data-dismiss="alert"> ×</button>
                        <p class="m-l-10">
                            <?= $msg ?>
                        </p>
                    </div>
                <? } ?>
                <div class="  ">
                    <form class="labels-form" id="login_form" method="post" action="">
                        <input type="hidden" name="page" value="login"/>
                        <div class="col-sm-6 m-t-10">
                            <div class="bgBlueHeading  ">
                                <div class=" f-16 "> Submit your email address for a new password</div>
                            </div>
                            <div class="borderPanel">
                                <div class="m-t-15" style="min-height: 115px;">
                                    <div class="p-l-r-10">
                                        <label id="server_error" style=" display:none;" class="error"></label>
                                        <div class=" ">
                                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                                <input type="email" placeholder="Enter Email address" name="email"
                                                       id="email" class="required">
                                            </label>
                                        </div>
                                        <div>
                                            <button style="margin:13px 0; " type="submit"
                                                    class="btn-u btn-u-sm orange text-uppercase pull-right">Submit <i
                                                        class="fa fa-arrow-circle-right"></i></button>
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
                        <div class="borderPanel" style="min-height: 210px;">
                            <div class="m-t-15">
                                <div class="p-l-r-10">
                                    <div class="text-center">
                                        <img style="width: 45%;" src="<?= Assets ?>images/logo.png" alt=""></div>
                                    <div class="m-t-20" style="margin-top: 15px;">
                                        <label class="pull-left"> <i class="fa fa-5x fa-user-plus cBlue"></i> </label>
                                    </div>
                                    <div><a href="<?= SAURL ?>users/signup/" style="margin-top: 25px;"
                                            class="btn orange text-uppercase m-t-30 pull-right"> Sign up now <i
                                                    class="fa fa-arrow-circle-right"></i> </a></div>
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

    $(document).ready(function () {
        var form = $("#login_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>