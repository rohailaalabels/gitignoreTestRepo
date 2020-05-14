<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End Trustbox script -->

<div class="testimonialsBg text-center">
    <div class="container">
        <h1>what our customers say about us</h1>
        <p>We thank all our customers who take the time to tell us about the service received. It is only by hearing
            from you that we can maintain and improve our customer care.</p>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-8 col-md-8 col-lg-9 ">
                <div class="thumbnail p-l-r-10"><br/><br/>

                    <!-- TrustBox widget - Mini  -->
                    <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8807dec7e10d38f59f32"
                         data-businessunit-id="4c17a0bd00006400050d443a" data-style-height="150px"
                         data-style-width="100%" data-theme="light"><a
                                href="https://uk.trustpilot.com/review/aalabels.com" target="_blank">Trustpilot</a>
                    </div>
                    <!-- End TrustBox widget -->


                    <hr/>
                    <? $i = 1;
                    foreach ($testimonials as $rec) {

                        if ($rec->source == 'google') {
                            $source = Assets . 'images/testimonials/gcs.png';
                            $link = 'https://www.google.com/search?q=AA+Labels&stick=H4sIAAAAAAAAAONgecTYxsgt8PLHPWGp2klrTl5jLOfiCs7IL3fNK8ksqRTy4WKDshS4-KW49dP1DcvKikwLKww1GKR4uZAFpBSUuHibFILlRadkX_-vJcTZvimZL_FDuYfguw41PVU372glaSP-XZemnWPjFHw0YaPYNC4_h6Z9Kw6xsXAwCjDwLGLldHRU8ElMSs0pBgC5bdJ-mAAAAA&sa=X&ved=2ahUKEwjBsM3psvrgAhVf4XMBHV43C7sQ6RMwEnoECAMQBA&biw=1280&bih=888#lrd=0x4877f0610e63b287:0x5b4b46252e2688ee,1,,,';
                        } else {
                            $source = Assets . 'images/testimonials/tp_img.png';
                            $link = 'https://www.trustpilot.com/review/aalabels.com';
                        }


                        $oldval = $i;
                        $i = rand(1, 20);
                        if ($oldval == $i) {
                            $i = rand(1, 20);
                        }
                        $quality = 'p0' . $i . '.jpg';
                        $icon_sat = 'icons0' . $i . '.jpg';
                        if ($i == 20) {
                            $i = 1;
                        }

                        $rec->testimonial = str_replace('', '<br>', $rec->testimonial);
                        if (empty($rec->heading)) {
                            $rec->heading = 'BRILLIANT';
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2"><img onerror='imgError(this);' class="width-100-p"
                                                                         src="<?= Assets ?>images/testimonials/<?= $icon_sat ?>"
                                                                         alt="Testimonials"></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 collapse-group">
                                <div class="col-lg-6 col-xs-6 m-t-10"><a target="_blank" href="<?= $link ?>"><img
                                                onerror='imgError(this);' src="<?= $source ?>" class=""></a></div>
                                <div class="col-lg-6 col-xs-6 m-t-10 text-right"><i class="fa fa-star TextOrange"
                                                                                    aria-hidden="true"></i> <i
                                            class="fa fa-star TextOrange" aria-hidden="true"></i> <i
                                            class="fa fa-star TextOrange" aria-hidden="true"></i> <i
                                            class="fa fa-star TextOrange" aria-hidden="true"></i> <i
                                            class="fa fa-star TextOrange" aria-hidden="true"></i></div>
                                <hr class="clear">
                                <div class="col-lg-12">
                                    <h4 class="cBlue"><a target="_blank" href="<?= $link ?>">
                                            <?= $rec->heading ?>
                                        </a></h4>
                                    <div class="clear"></div>
                                    <p class="text-justify">
                                        <? /*if(strlen($rec->testimonial) > 50){  $i++; }*/
                                        $i++; ?>
                                        <?= $rec->testimonial ?>
                                    <div class="clear"></div>
                                    <h4 class="">
                                        <?= $rec->name ?>
                                    </h4>
                                    <small style="color:#666; float:right;">
                                        <?= date("d F Y", strtotime($rec->date)); ?>
                                    </small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="img-thumbnail   width-100-p"><img onerror='imgError(this);'
                                                                              class="img-responsive col-xs-12 width-100-p"
                                                                              src="<?= Assets ?>images/testimonials/<?= $quality ?>"
                                                                              alt="Testimonials"></div>
                            </div>
                        </div>
                        <hr/>
                    <? } ?>
                    <div></div>
                </div>
                <div class="  col-md-12 text-center">
                    <nav>
                        <ul class="pagination ">
                            <?= $links ?>
                        </ul>
                    </nav>
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
