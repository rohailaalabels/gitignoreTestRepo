<?php $method = $this->router->fetch_method();
$class = $this->router->fetch_class();
if (($method == 'printing' || $method == 'customlabels')) {
    $phonetapclass = '';
} else {
    $phonetapclass = 'rTapNumber327505';
}
?>
<style>
    .cycle-bg-image {
        height: 394px;
        margin-top: 15%;
    }

    .footer ul {
        padding-inline-start: 24px;
    }
</style>
<div class="whiteBg2">
    <div class=" text-center container">
        <!--<h2 >If you cannot find the answer to your question on these pages then please call our Customer Care team on the number displayed below.</h2>-->
        <h3 class="f-bold"><i class="fa fa-phone bg_phone"></i> <span class="<?= $phonetapclass ?>">
      <?= PHONE ?>
      </span></h3>
    </div>
</div>

<!-- Footer Area -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3  ">
                <h3><i class="fa fa-qrcode "></i> Products</h3>
                <ul>
                    <li><a href="<?= base_url() ?>a5-sheets/"><i class="fa fa-arrow-circle-right"></i> Labels on A5
                            Sheets</a></li>
                    <li><a href="<?= base_url() ?>a4-sheets/"><i class="fa fa-arrow-circle-right"></i> Labels on A4
                            Sheets</a></li>
                    <li><a href="<?= base_url() ?>a3-sheets/"><i class="fa fa-arrow-circle-right"></i> Labels on A3
                            Sheets</a></li>
                    <li><a href="<?= base_url() ?>sra3-sheets/"><i class="fa fa-arrow-circle-right"></i> Labels on SRA3
                            Sheets</a></li>
                    <li><a href="<?= base_url() ?>roll-labels/"><i class="fa fa-arrow-circle-right"></i> Labels on rolls</a>
                    </li>
                    <li><a href="<?= base_url() ?>integrated-labels/"><i class="fa fa-arrow-circle-right"></i>
                            Integrated labels</a></li>
                    <li><a href="<?= base_url() ?>printed-labels/"><i class="fa fa-arrow-circle-right"></i> Printed
                            labels</a></li>
                    <li><a href="<?php echo base_url(); ?>avery-sized-labels/"><i class="fa fa-arrow-circle-right"></i>
                            Avery&reg; sized labels</a></li>
                    <li><a href="<?php echo base_url(); ?>thermal-printer-roll-labels/"><i
                                    class="fa fa-arrow-circle-right"></i> Thermal printer roll labels</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-md-3 ">
                <h3><i class="fa fa-coffee "></i> services</h3>
                <ul>
                    <li><a href="<?= SAURL ?>contact-us/"><i class="fa fa-arrow-circle-right"></i> Contact us / Sample
                            request</a></li>
                    <li><a href="<?= SAURL ?>customlabels.php?cat_id=1/"><i class="fa fa-arrow-circle-right"></i> Custom
                            Labels</a></li>
                    <li><a href="<?php echo base_url(); ?>faq/"><i class="fa fa-arrow-circle-right"></i> FAQs</a></li>
                    <li><a href="<?php echo base_url(); ?>advancesearch/"><i class="fa fa-arrow-circle-right"></i> Label
                            Filter</a></li>
                    <li><a href="<?php echo base_url(); ?>barcode-and-qrcode-generator/"><i
                                    class="fa fa-arrow-circle-right"></i> Barcode and QR Generator</a></li>
                    <? if (!$this->agent->is_mobile()) { ?>
                        <li><a href="<?= base_url() ?>custom-label-tool/"><i class="fa fa-arrow-circle-right"></i> Label
                                Designer</a></li>
                    <? } ?>
                    <li><a href="<?php echo base_url(); ?>terms-and-conditions/"><i
                                    class="fa fa-arrow-circle-right"></i> Terms & Conditions</a></li>
                    <li><a href="<?php echo base_url(); ?>privacy-policy/"><i class="fa fa-arrow-circle-right"></i>
                            Privacy Policy</a></li>
                    <li><a href="<?= base_url() ?>promotions/"><i class="fa fa-arrow-circle-right"></i> Promotions</a>
                    </li>
                    <li><a href="<?= base_url() ?>hs-codes/"><i class="fa fa-arrow-circle-right"></i> Commodity/HS Codes</a>
                    </li>
                    <li><a href="<?= base_url() ?>trade/"><i class="fa fa-arrow-circle-right"></i> Trade Login</a></li>
                    <li><a href="<?= base_url() ?>labels-and-environment/"><i class="fa fa-arrow-circle-right"></i>
                            Labels & The Environment</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-md-3 ">
                <h3><i class="fa fa-link "></i> Site links</h3>
                <ul>
                    <li><a href="<?php echo base_url(); ?>aboutus/"><i class="fa fa-arrow-circle-right"></i> About AA
                            Labels</a></li>
                    <li><a href="<?php echo base_url(); ?>artwork-guidelines/"><i class="fa fa-arrow-circle-right"></i>
                            Artwork Guidelines</a></li>
                    <li><a href="<?php echo base_url(); ?>blog/"><i class="fa fa-arrow-circle-right"></i> Blog</a></li>
                    <li><a href="<?php echo base_url(); ?>core-values/"><i class="fa fa-arrow-circle-right"></i> Core
                            values</a></li>
                    <li><a href="<?php echo base_url(); ?>customer-care/"><i class="fa fa-arrow-circle-right"></i>
                            Customer care</a></li>
                    <li><a href="<?php echo base_url(); ?>testmonialdetail.php/"><i
                                    class="fa fa-arrow-circle-right"></i> Customer testimonials</a></li>
                    <li><a href="<?php echo base_url(); ?>delivery/"><i class="fa fa-arrow-circle-right"></i> Delivery
                            and shipping</a></li>
                    <li><a href="<?php echo base_url(); ?>sitemap/"><i class="fa fa-arrow-circle-right"></i> Sitemap
                        </a></li>
                    <li><a href="<?php echo base_url(); ?>newsletter-archive/"><i class="fa fa-arrow-circle-right"></i>
                            Newsletter Archive </a></li>
                    <li><a href="<?php echo base_url(); ?>newsletter.php/"><i class="fa fa-arrow-circle-right"></i>
                            Unsubscribe from newsletter</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-3 m-t-30  ">
                <div class="col-sm-3 col-lg-12 col-md-12"><img src="<?= Assets ?>images/logo_footer.png" alt="AA Labels"
                                                               style="margin-left:20px;" width="229" height="69"
                                                               class="img-responsive"></div>
                <p class="p-t-10 text-justify col-sm-6 col-lg-12 col-md-12">We specialise in the production of labels,
                    both plain and printed, in roll and sheet formats and currently produce over 100,000 label
                    combinations.</p>
                <div class="col-sm-3 col-lg-12 col-md-12"><img src="<?= Assets ?>images/visa-icon1.png" alt="visa"
                                                               height="37" class="img-responsive"></div>
                <div class="col-sm-3 col-lg-12 col-md-12"><img alt="visa" class="img-responsive"
                                                               src="https://www.aalabels.com/theme/site/images/godaddy-secure-ssl-seal.png"
                                                               alt="Secure Website Seal" style="margin-top: 22px;"
                                                               height="37"></div>
            </div>
        </div>
    </div>
    <div class="child ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5 m-t-10">
                    <p>Copyright &copy;
                        <?= date("Y") ?>
                        . AA Labels.com</p>


                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a target="_blank" href="https://www.facebook.com/aalabels/" class="btn_social_blue  "><i
                                class="fa fa-facebook"></i></a>
                    <a target="_blank" href="https://twitter.com/aalabels/media/"
                       class="btn_social_blue btn-social-icon"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="https://www.pinterest.com/aalabels/"
                       class="btn_social_blue btn-social-icon"><i class="fa fa-pinterest"></i></a>
                    <a target="_blank" href="https://www.instagram.com/aalabels/"
                       class="btn_social_blue btn-social-icon"><i class="fa fa-instagram "></i></a>
                    <a target="_blank"
                       href="https://www.google.com/maps/place/AA+Labels/@52.5541506,-0.2681323,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x5b4b46252e2688ee!8m2!3d52.5541506!4d-0.2659436?authuser=1"
                       class="btn_social_blue btn-social-icon"><i class="fa fa-map-marker"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="languagemodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title text-uppercase" id="myModalLabel"><strong>AA LABELS DELIVERS TO EUROPE AND
                        BEYOND</strong></h4>
            </div>
            <div class="modal-body no-padding">
                <? include('flag_list.php'); ?>
            </div>
        </div>
    </div>
</div>
<div class="to-top-container"><a id="toTop" href="#" style="display: block; padding-top:8px; "><i
                class="fa fa-angle-up"></i> <span id="toTopHover" style="opacity: 0;"></span></a></div>


<script src="<?= Assets ?>js/footer_section.js"></script>


<!--<script src="<?= Assets ?>js/bootstrap.min.js"></script>
<script src="<?= Assets ?>js/scroll.js"></script>
<script src="<?= Assets ?>js/easing.js" type="text/javascript"></script>
<script src="<?= Assets ?>js/uppercase.js" type="text/javascript"></script>
<script src="<?= Assets ?>js/layzr.min.js"></script>-->


<script type="text/javascript">


    const instance = Layzr({
        normal: 'data-normal',
        retina: 'data-retina',
        srcset: 'data-srcset',
        threshold: 0
    });
    document.addEventListener('DOMContentLoaded', function (event) {
        instance
            .update()           // track initial elements
            .check()            // check initial elements
            .handlers(true)     // bind scroll and resize handlers
    });


    $(document).ready(function () {

        //alert();

        $('.ajax_search').on("paste", function (e) {
            var keyCode = e.originalEvent.clipboardData.getData('Text');

            if (/^[a-zA-Z0-9- ]*$/.test(keyCode) == false) {
                e.preventDefault();
                $(".tt-input").val('');
            } else {

            }
        });


    });


    $(document).ready(function () {


        $(".globe-map").aaZoom();
        $().UItoTop({easingType: 'easeOutQuart'});


        //   $('input[type="text"]').keyup(function(evt){
        // 	//upperFirstAll()
        // 	//upperFirst()
        // 	//upperCase()
        // 	//lowerCase()
        // 	var element = $(this).attr('id'); console.log(element );
        // 	if(element=='email_valid' || element=='email' || element=='d_email' || element=='password' || element=='cpassword' || element=='captcha' || element=='vatnumber' || element=='PurchaseOrderNumber' ){}
        // 	else if(element=='b_pcode' || element=='d_pcode'){ 	$(this).upperCase();}
        // 	else if(typeof element !='undefined' ){ $(this).upperFirstAll(); }
        // });


    });

    $(document).on("click", ".sweet-alert > p > .confirm", function (e) {
        <? if(SITE_MODE == 'live'){?>
        dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype': 'Click on checkout'});
        <? } ?>
    });

    // usman validations
    $(".specialvalidation").keypress(function (e) {
        var keyCode = e.which;
        if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122)) && keyCode != 8 && keyCode != 32) {
            return false;
        }

    });
    $(".addressspecialvalidation").keypress(function (e) {
        var keyCode = e.which;

        if (keyCode == 46 || keyCode == 35) {
            return true;
        } else if (!((keyCode >= 48 && keyCode <= 57)
            || (keyCode >= 65 && keyCode <= 90)
            || (keyCode >= 97 && keyCode <= 122))
            && keyCode != 8 && keyCode != 32) {
            return false;
        }
    });

    $(document).on("keypress", ".emailspecialvalidation", function (e) {
        var keyCode = e.which;

        if (keyCode == 46 || keyCode == 64 || keyCode == 95 || keyCode == 45) {
            return true;
        } else if (!((keyCode >= 48 && keyCode <= 57)
            || (keyCode >= 65 && keyCode <= 90)
            || (keyCode >= 97 && keyCode <= 122))
            && keyCode != 8 && keyCode != 32) {
            return false;
        }

    });

    $(document).on("keypress", ".specialvalidationdot", function (e) {
        var keyCode = e.which;
        if (((keyCode < 48 || keyCode > 57)) && keyCode != 46) {
            event.preventDefault();
        }
    });

    $(document).on("keypress keyup blur", ".numeric", function (e) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $(document).on("keypress keyup blur", ".letters", function (e) {
        return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123);
    });

    $(document).ready(function () {
        $(".emailspecialvalidation, .sizespecialvalidation, .specialvalidationdot, .specialvalidation, .addressspecialvalidation, .letters, .numeric, .headeremailspecialvalidation, .artwork_name, .specialcharacter, .allownumeric, .textareavalidation").bind("paste", function (e) {
            e.preventDefault();
        });

    });
    // usman validations

</script>
<? if (SITE_MODE == 'live123') { ?>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/56dd467a8619eaf4200b857c/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
<? }


if (SITE_MODE != 'live') {
    ?>

    <!--<link rel="manifest" href="/manifest.json" />
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
      var OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "5ec9f9f8-d988-4b36-b466-7cdf3eb3ea6d",
          autoRegister: false,
          notifyButton: {
            enable: false,
          },
        });
      });
    </script>-->


<? }


$ip = $this->session->userdata('ip_address');
$visitor_ip = $this->session->userdata('visitor_ip');
$visitor_ip = (isset($visitor_ip) and $visitor_ip != '') ? $visitor_ip : '';
//$visitor_country = $this->session->userdata('visitor_country');	
if ($visitor_ip != $ip) { ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $.post("<?=base_url()?>ajax/visitorinfolog", function (data) {
                if (data.loggedin == 'no' && data.welcome != null) {
                    $('.loginRegister').find('.login_btn').html('Welcome ' + data.welcome);
                    $('.loginRegister').find('.register_btn').hide();
                }

            }, 'json');
        });
    </script>
<? } ?>

<?php //$this->output->enable_profiler(TRUE);  ?>

<script src="//rum-static.pingdom.net/pa-5c0fa6bcdb2aac001600022a.js" async></script>

</body>
</html>