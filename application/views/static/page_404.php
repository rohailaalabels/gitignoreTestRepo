<style>
    .caption2 p {
        height: 95px !important;
        line-height: inherit !important;
    }

    .NotFoundBg {
        background: url("<?=base_url()?>theme/site/images/404-img.png") no-repeat center;
        -webkit-background-size: cover;
        width: 100%;
        height: 458px;
        padding-top: 75px;
    }

    .NotFoundBg > div h1 {
        font-size: 165px;
        color: #fff;
        font-weight: bold;
        margin: 0;
        line-height: 1;
    }

    .NotFoundBg > div p {
        font-size: 25px;
        color: #fff;
        margin: 0;
    }

    .HomeBtnForError {
        margin-top: 55px;
        padding: 10px 20px !important;
    }

    .secondHeading h2 {
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }

    .secondHeading p {
        font-size: 15px;
        color: #333;
    }

    .Thumbs {
        padding: 15px;
    }

    .Thumbs i {
        font-size: 105px;
        color: #d9d9d9;
    }

    .Thumbs p {
        height: 95px;
        text-align: justify;
    }

    .Thumbs a {
        margin-bottom: 10px;
    }
</style>

<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">404 Error!</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="NotFoundBg text-center">
    <div class="container">
        <h1>404</h1>
        <p>We apologise that this page has not been found.</p>
        <a role="button" class="btn HomeBtnForError orangeBg" href="<?= base_url() ?>">GO TO HOMEPAGE</a></div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-12 col-md-12 ">
                <div class="thumbnail p-l-r-10">
                    <div class="container content">
                        <!-- Error Block -->
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="text-center secondHeading">
                                    <h2>We do not appear able to find this page.</h2>
                                    <p>Please check that you have entered the URL correctly, or to assist you to find
                                        what you are looking for you could also select from the options below.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Error Block -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="thumbnail text-center Thumbs">
                            <div><i class="fa fa-lightbulb-o f-101"></i></div>
                            <div class="caption2">
                                <h4>LABEL FINDER</h4>
                                <p>Use the summary label filter on the homepage to begin your search and continue using
                                    the enhanced filters found on the following pages to find and compare the label
                                    options available.</p>
                                <a role="button" class="btn  orangeBg m-t-m-10-p m-t-s-20-p"
                                   href="<?= base_url() ?>advancesearch/">LABEL FILTER</a></div>
                        </div>
                    </div>
                    <div class=" col-sm-4">
                        <div class="thumbnail text-center Thumbs">
                            <div><i class="fa fa-home f-101"></i></div>
                            <div class="caption2">
                                <h4>HOMEPAGE</h4>
                                <p>The page you requested may be temporarily unavailable and might become available to
                                    view upon a retry and/or in future. Please use the button below to return to the
                                    home page and use the main navigation bar to try again.</p>
                                <a role="button" class="btn  orangeBg m-t-m-10-p m-t-s-20-p" href="<?= base_url() ?>">GO
                                    TO HOMEPAGE</a></div>
                        </div>
                    </div>
                    <div class=" col-sm-4">
                        <div class="thumbnail text-center Thumbs">
                            <div><i class="fa fa-envelope f-101"></i></div>
                            <div class="caption2">
                                <h4>CONTACT US</h4>
                                <p>If this problem persists and you cannot find what you are looking for, please contact
                                    us and our customer care team will be happy to provide assistance.</p>
                                <a role="button" class="btn  orangeBg m-t-m-10-p m-t-s-20-p"
                                   href="<?= base_url() ?>/contact-us/">CONTACT US</a></div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>
