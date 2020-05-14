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
<div class="customBg text-center">
    <div class="container">
        <h1>Custom labels</h1>
        <p>customercare@aalabels.com</p>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-12 col-md-8 ">
                <div class="thumbnail p-l-r-10">
                    <div style="padding-bottom:12px;" class="hero-unit text-center">
                        <h2 class="text-uppercase textBlue"><i class="fa  fa-thumbs-up TextBlue f-100"></i> <br>
                            Thank You</h2>
                        <p class="Textblack">Thank you for your enquiry - a confirmation of your request has been sent
                            to your email address. We aim to respond to all our enquiries within 1 working day and our
                            customer care team will contact you with a quote as soon as possible. Thank you for
                            contacting AA Labels.</p>
                        <div><a href="<?= base_url() ?>" class=" btn orangeBg" role="button"> <i
                                        class="fa fa-arrow-circle-right"></i> Continue Shopping </a></div>
                    </div>

                </div>
                <!-- /.row -->
            </div>

            <!-- Advertising Banners for free delivery start-->

            <? $this->load->view('advertising/free_shipping'); ?>
            <!-- Advertising Banners for free delivery end-->


        </div>
    </div>
</div>


<? if (SITE_MODE == 'live') { ?>

    <!-- Google Code for Custom Labels Enquiry Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1067753763;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "R9ygCJ_pzloQo8KS_QM";
        var google_remarketing_only = false;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img onerror='imgError(this);' height="1" width="1" style="border-style:none;" alt=""
                 src="//www.googleadservices.com/pagead/conversion/1067753763/?label=R9ygCJ_pzloQo8KS_QM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

<? } ?>
