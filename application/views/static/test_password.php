<script type="text/javascript" src="<?= Assets ?>js/password_strengthen_plugin.js"></script>

<style>

    @CHARSET "UTF-8";
    /*
    over-ride "Weak" message, show font in dark grey
    */

    .progress-bar {
        color: #333;
    }


    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        outline: none;
    }

    .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
    @include box-sizing(border-box);

    &
    :focus {
        z-index: 2;
    }

    }

    .login-form {
        margin-top: 60px;
    }

    form[role=login] {
        color: #5d5d5d;
        background: #f2f2f2;
        padding: 26px;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
    }

    form[role=login] img {
        display: block;
        margin: 0 auto;
        margin-bottom: 35px;
    }

    form[role=login] input,
    form[role=login] button {
        font-size: 18px;
        margin: 16px 0;
    }

    form[role=login] > div {
        text-align: center;
    }

    .form-links {
        text-align: center;
        margin-top: 1em;
        margin-bottom: 50px;
    }

    .form-links a {
        color: #fff;
    }

</style>


<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">About us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="aboutBg  text-center">
    <div class="container">
        <h1>about us</h1>
        <p>customercare@aalabels.com</p>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-8 col-md-8 col-lg-9 ">
                <div class="thumbnail p-l-r-10 text-justify">


                    <div class="row" id="pwd-container">
                        <div class="col-md-4"></div>

                        <div class="col-md-4">
                            <section class="login-form">
                                <form method="post" action="#" role="login">

                                    <input type="text" name="" id="username">
                                    <input type="password" class="form-control input-lg" id="password"
                                           placeholder="Password" required=""/>


                                    <div class="pwstrength_viewport_progress"></div>

                                    <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in
                                    </button>

                                </form>


                            </section>
                        </div>

                    </div>

                </div>
                <!-- /.row -->

            </div>


        </div>
    </div>
</div>

