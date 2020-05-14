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
                        <!--              usman-->
                        <?php
                        if (isset($piggyback_labels) && $piggyback_labels == true) {
                            echo '<p class="Textblack" >Thank you for your enquiry - We aim to respond to all our enquiries within 1 working day and our customer care team will contact you with a quote as soon as possible. Thank you for contacting AA Labels.</p>';
                        } else {
                            echo '<p class="Textblack" >Thank you for your enquiry - a confirmation of your request has been sent to your email address. We aim to respond to all our enquiries within 1 working day and our customer care team will contact you with a quote as soon as possible. Thank you for contacting AA Labels.</p>';

                        }
                        ?>
                        <!--              usman-->
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
