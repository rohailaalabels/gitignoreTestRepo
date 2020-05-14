<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= Assets ?>images/favicon.png"/>
    <? if (SITE_MODE == 'live') { ?>
        <meta name="msvalidate.01" content="C7FF99D63AFA81664869DEF1427D76E7"/>
        <meta name="google-site-verification" content="GBLB_-Q6YQF-aKfAVG6lxXqXFrdHY-abkG8VIq-GGDY"/>
    <? } ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <? if(SITE_MODE == 'live' || 1==1){?>
    <?=$this->seo_model->meta_tags();}?>
    
    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script> var base = '<?=AJAXURL?>';</script>
    <script> var sbase = '<?=SAURL?>';</script>
    <?php $is_mobile = $this->agent->is_mobile(); ?>
    <? if ($is_mobile) { ?>
        <script type="text/javascript">
            var stylesheet = document.createElement('link');
            stylesheet.href = '<?=Assets?>css/main-unminify.css?v=1.24';
            stylesheet.rel = 'stylesheet';
            stylesheet.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(stylesheet);
        </script>
        <!--<link defer href="<?= Assets ?>css/main.css?v=1.14" rel="stylesheet">-->
    <? }else{ ?>
    <link href="<?= Assets ?>css/main-unminify.css?v=<?= time() ?>" rel="stylesheet">
    <? } ?>
    <script src="<?= Assets ?>js/complete.js?v=1.0"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'>

<!--    <link href="--><?//= Assets ?><!--css/custom.css?v=1.13" rel="stylesheet">-->
<!--    <link href="--><?//= Assets ?><!--css/bootstrap.css" rel="stylesheet">-->
<!--    <link href="--><?//= Assets ?><!--css/newnav.css" rel="stylesheet">-->
<!--    <link href="--><?//= Assets ?><!--css/responsive.css?v=1.1" rel="stylesheet">-->
<!--    <link href="--><?//= Assets ?><!--css/ipad.css?v=1.1" rel="stylesheet">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!--    <script src="--><?//= Assets ?><!--js/typeahead.bundle.min.js"></script>-->
<!--    <script src="--><?//= Assets ?><!--js/sweet-alert.js"></script>-->
<!--    <script src="--><?//= Assets ?><!--js/jquery.countdown.js"></script>-->
<!--    <script src="--><?//= Assets ?><!--js/custom.js?v=1.8"></script>-->
<!--    <script src="--><?//= Assets ?><!--js/jquery.validate.js"></script>-->
<!--    <script src="--><?//= Assets ?><!--js/additional-methods.min.js"></script>-->
<!--    <script src="--><?//= Assets ?><!--js/blowup.min.js"></script>-->

    <style>
        .labels-form input.error {
            background: rgb(251, 227, 228);
            border: 1px solid #fbc2c4;
            color: #8a1f11;
        }

        .labels-form label.error {
            color: #8a1f11;
            display: inline-block;
            font-weight: normal;
        }

        .top-head .lng-btn {
            display: inline-block;
            float: right;
            height: 30px;
            margin-left: 0px;
        }

        .top-head .lng-btn a {
            background: none 0 0;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            margin: 0;
            outline: 0 none;
            padding: 1px;
            text-align: center;
        }

        .top-head .lng-btn img {
            margin: 0px 0px 0px 26px;
        }

        @media screen and (max-width: 1024px) and (min-width: 800px) {
            .display_none {
                display: none;
            }
        }

        @media only screen and (min-width: 768px) {
            .display_none_sm {
                display: none;
            }

            .searchboxadjustment {
                display: none;
            }

            .input-group-btn:last-child > .btn {
                /*margin-top: 2px !important;*/
            }

            .header-first-right-icon {
                margin-right: 2% !important;
                margin-left: 3% !important;
            }

            .header-second-right-icon {
                margin-right: 2% !important;
                margin-left: 3% !important;
            }
        }

        @media only screen and (min-width: 1024px) {
            .padding-r-t-0 {
                padding-right: 0;
            }

            .padding-l-t-0 {
                padding-left: 0;
            }

            .searchboxadjustment {
                display: block;
            }

            .searchboxadjustmentsm {
                display: none;
            }

            .input-group-btn:last-child > .btn {
                /*margin-top: 2px !important;*/
            }

            .header-first-right-icon {
                /*margin-right: 5% !important;*/
                /*margin-left: 5% !important;*/
                margin-right: 0 !important;
                margin-left: 0 !important;
            }

            .header-second-right-icon {
                /*margin-right: 3% !important;*/
                margin-right: 0 !important;
                margin-left: 0 !important;

            }
        }

        @media only screen and (min-width: 1200px) {
            .logoadjustements {
                width: 23% !important;
            }

            .header-second-right-icon {
                margin-right: 5% !important;
            }

            .header-first-right-icon {
                margin-right: 7% !important;
                margin-left: 7% !important;
            }

            .searchboxadjustment {
                width: 27%;
                display: block;
            }

            .input-group-btn:last-child > .btn {
                /*margin-top: 2px !important;*/
                /*padding: 9px 13px !important;*/
            }

            .searchboxadjustmentsm {
                display: none;
            }

            .searchboxadjustment div {
                width: 100%;
            }
        }

        .email-address-password-incorrect-alert {
            background: #fbe3e4;
            text-align: center;
            border-radius: 4px;
            margin-top: 0px;
            margin-bottom: 10px;
            padding: 9px;
            font-size: 13px;
            color: #ff000b;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <? if (SITE_MODE == 'live') {

        $method = $this->router->fetch_method();
        $class = $this->router->fetch_class();
    if (($method == 'index' && $class == 'home')){
    }else{
        ?>
        <script>(function (n, t, i, r) {
                var u, f;
                n[i] = n[i] || {}, n[i].initial = {
                    accountCode: "AALAB11111",
                    host: "AALAB11111.pcapredict.com"
                }, n[i].on = n[i].on || function () {
                    (n[i].onq = n[i].onq || []).push(arguments)
                }, u = t.createElement("script"), u.async = !0, u.src = r, f = t.getElementsByTagName("script")[0], f.parentNode.insertBefore(u, f)
            })(window, document, "pca", "//AALAB11111.pcapredict.com/js/sensor.js")</script>
    <? } ?>
        <script type='application/ld+json'>
                {
                  "@context": "https://www.schema.org",
                  "@type": "Organization",
                  "name": "AA Labels",
                  "url": "https://www.aalabels.com/",
                  "logo": "https://www.aalabels.com/theme/site/images/logo.png",
                  "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Green Technologies Ltd T/A AA Labels, 23 Wainman Road, ",
                    "addressLocality": "Peterborough",
                    "addressRegion": "Cambridgeshire",
                    "postalCode": "PE2 7BU",
                    "addressCountry": "United Kingdom"
                  },
                  "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "01733 588 390",
                    "contactType": "Customer service"
                  },
                  "aggregateRating": {
                    "@type": "AggregateRating",
                    "bestRating": "<?= BestRating ?>",
                    "ratingCount": "<?= RatingCount ?>",
                    "ratingValue": "<?= RatingValue ?>"
                  }
                }












        </script>
    <? } ?>
    <? if (SITE_MODE == 'live') {

        $data_layer = $this->shopping_model->data_layer();
        $ecomdata = $this->home_model->adWords_remarketing_tag();
        if ($ecomdata['ecomm_prodid'] == '') {
            $ecomdata['ecomm_prodid'] = '""';
        }
        if ($ecomdata['ecomm_totalvalue'] == '') {
            $ecomdata['ecomm_totalvalue'] = '""';
        }
        if ($ecomdata['ecomm_pagetype'] == '') {
            $ecomdata['ecomm_pagetype'] = "other";
        }

        $userid = $this->session->userdata('userid');
        $userloginstatus = 'false';
        $userloginid = "";
        if (isset($userid) and $userid != '') {
            $userloginstatus = 'true';
            $userloginid = $userid;
        }
        ?>
        <script>
            var dataLayer = window.dataLayer || [];
            <?=$data_layer?>
            dataLayer.push({'ecomm_prodid': <?=$ecomdata['ecomm_prodid']?>});
            dataLayer.push({'ecomm_totalvalue': <?=$ecomdata['ecomm_totalvalue']?>});
            dataLayer.push({'ecomm_pagetype': '<?=$ecomdata['ecomm_pagetype']?>'});

            $(document).on("click", ".LogOut > a ", function (e) {
                dataLayer.push({'event': 'user-logout-success', 'user-id': '<?=$userloginid?>'});
            });
            dataLayer.push({'userloginstatus': '<?=$userloginstatus?>', 'user-id': '<?=$userloginid?>'});

        </script>
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-P2RV4R');</script>
        <!-- End Google Tag Manager -->

    <? } ?>
</head>
<body>
<? if (SITE_MODE == 'live') {


    ?>
    <!-- Google Tag Manager -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-P2RV4R"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager -->

<? } ?>
<div class="whiteBg top-wbg">
    <div class="blueBg top-head">
        <div class="container">
            <div class="trustP pull-left col-sm-4 hidden-sm hidden-xs"> Right first time, on time, every time</div>
            <div class="pull-right loginRegister ">
                <?php
                $redirect_from = $this->session->userdata('redirect_from');
                if (isset($redirect_from) and $redirect_from == "plo"):
                    ?>
                <?php else: ?>
                    <div class="pull-left lre" style="margin:0;">
                        <div class="btn-group">
                            <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="padding-top: 0 !important;"> <img alt="Language Selector" src="<?= Assets ?>images/flags/uk.jpg" />Select Language</button>-->
                            <div class="btn-group pr-dd languageselector">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><img alt="Language Selector"
                                                                                        src="<?= Assets ?>images/flags/uk.jpg"/>Select
                                    Language <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li class="col-xs-12">
                                        <h5 class="reg-h"><b>European Union</b></h5>
                                    </li>

                                    <li class="col-xs-6"><a href="<?= base_url() ?>"> <img class="pull-left"
                                                                                           src="<?= Assets ?>images/flags-list/Austria.jpg"
                                                                                           alt="Austria Flag"/> <span>Austria <small> - English</small></span>
                                        </a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>be/"> <img class="pull-left"
                                                                                              src="<?= Assets ?>images/flags-list/Belgium.jpg"
                                                                                              alt="Belgium Flag"/>
                                            <span>Belgium <small> - French</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"> <img class="pull-left"
                                                                                           src="<?= Assets ?>images/flags-list/Bulgaria.jpg"
                                                                                           alt="Bulgaria Flag"/> <span>Bulgaria <small> - English</small></span>
                                        </a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Croatia.jpg"
                                                                                          alt="Croatia Flag"/> <span>Croatia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Cyprus.jpg"
                                                                                          alt="Cyprus Flag"/> <span>Cyprus <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Czech-Republic.jpg"
                                                                                          alt="Czech Republic Flag"/>
                                            <span>Czech Republic <small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Denmark.jpg"
                                                                                          alt="Denmark Flag"/> <span>Denmark <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Estonia.jpg"
                                                                                          alt="Estonia Flag"/> <span>Estonia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Finland.jpg"
                                                                                          alt="Finland Flag"/> <span>Finland <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>fr/"><img class="pull-left"
                                                                                             src="<?= Assets ?>images/flags-list/France.jpg"
                                                                                             alt="France Flag"/> <span>France <small> - French</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Germany.jpg"
                                                                                          alt="Germany Flag"/> <span>Germany <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Greece.jpg"
                                                                                          alt="Greece Flag"/> <span>Greece <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Hungary.jpg"
                                                                                          alt="Hungary Flag"/> <span>Hungary <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Ireland.jpg"
                                                                                          alt="Ireland Flag"/> <span>Ireland <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Italy.jpg"
                                                                                          alt="Italy Flag"/> <span>Italy <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Latvia.jpg"
                                                                                          alt="Latvia Flag"/> <span>Latvia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"> <img class="pull-left"
                                                                                           src="<?= Assets ?>images/flags-list/Lithuania.jpg"
                                                                                           alt="Lithuania Flag"/> <span>Lithuania <small> - English</small></span>
                                        </a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>lu/"> <img class="pull-left"
                                                                                              src="<?= Assets ?>images/flags-list/Luxembourg.jpg"
                                                                                              alt="Luxembourg Flag"/>
                                            <span>Luxembourg <small> - French</small></span> </a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Malta.jpg"
                                                                                          alt="Malta Flag"/> <span>Malta <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"> <img class="pull-left"
                                                                                           src="<?= Assets ?>images/flags-list/Netherlands.jpg"
                                                                                           alt="Netherlands Flag"/>
                                            <span>Netherlands <small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"> <img class="pull-left"
                                                                                           src="<?= Assets ?>images/flags-list/Poland.jpg"
                                                                                           alt="Poland Flag"/> <span>Poland <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"> <img class="pull-left"
                                                                                           src="<?= Assets ?>images/flags-list/Portugal.jpg"
                                                                                           alt="Portugal Flag"/> <span>Portugal <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Romania.jpg"
                                                                                          alt="Romania Flag"/> <span>Romania <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Slovakia.jpg"
                                                                                          alt="Slovakia Flag"/> <span>Slovakia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Slovenia.jpg"
                                                                                          alt="Slovenia Flag"/> <span>Slovenia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Spain.jpg"
                                                                                          alt="Spain Flag"/> <span>Spain <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Netherlands.jpg"
                                                                                          alt="Netherlands Flag"/>
                                            <span>Netherlands<small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Netherlands.jpg"
                                                                                          alt="Holland Flag"/> <span>Holland<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Sweden.jpg"
                                                                                          alt="Sweden Flag"/> <span>Sweden <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/UK.jpg"
                                                                                          alt="United Kingdom Flag"/>
                                            <span>United Kingdom <small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Spain.jpg"
                                                                                          alt="Spain Flag"/> <span>Spain - Canary Islands <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-12">
                                        <h5 class="reg-h"><b>Europe</b></h5>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Iceland.jpg"
                                                                                          alt="Iceland Flag"/> <span>Iceland <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Norway.jpg"
                                                                                          alt="Norway Flag"/> <span>Norway <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Bosnia.jpg"
                                                                                          alt="Bosnia Flag"/> <span>Bosnia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Serbia.jpg"
                                                                                          alt="Serbia Flag"/> <span>Serbia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>ch/"><img class="pull-left"
                                                                                             src="<?= Assets ?>images/flags-list/Switzerland.jpg"
                                                                                             alt="Switzerland Flag"/>
                                            <span>Switzerland <small> - French</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Albania.jpg"
                                                                                          alt="Albania Flag"/> <span>Albania <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Russia.jpg"
                                                                                          alt="Russian Federation Flag"/>
                                            <span>Russian Federation <small> - English</small></span></a></li>
                                    <li class="col-xs-12">
                                        <h5 class="reg-h"><b>ROW</b></h5>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Australia.jpg"
                                                                                          alt="Australia Flag"/> <span>Australia <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Canada.jpg"
                                                                                          alt="Canada Flag"/> <span>Canada <small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/USA.jpg"
                                                                                          alt="United States Flag"/>
                                            <span>USA <small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Bahrain.jpg"
                                                                                          alt="Bahrain Flag"/> <span>Bahrain<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Israel.jpg"
                                                                                          alt="Israel Flag"/> <span>Israel<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Lebanon.jpg"
                                                                                          alt="Lebanon Flag"/> <span>Lebanon<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Libya.jpg"
                                                                                          alt="Libya Flag"/> <span>Libya<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Oman.jpg"
                                                                                          alt="Oman Flag"/>
                                            <span>Oman<small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Saudi-Arabia.jpg"
                                                                                          alt="Saudi Arabia Flag"/>
                                            <span>Saudi Arabia<small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Tunisia.jpg"
                                                                                          alt="Tunisia Flag"/> <span>Tunisia<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/New-Zealand.jpg"
                                                                                          alt="New Zealand Flag"/>
                                            <span>New Zealand <small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/South-Africa.jpg"
                                                                                          alt="South Africa Flag"/>
                                            <span>South Africa <small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Algeria.jpg"
                                                                                          alt="Algeria Flag"/> <span>Algeria<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Egypt.jpg"
                                                                                          alt="Egypt Flag"/> <span>Egypt<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Jordan.jpg"
                                                                                          alt="Jordan Flag"/> <span>Jordan<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Morocco.jpg"
                                                                                          alt="Morocco Flag"/> <span>Morocco<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Qatar.jpg"
                                                                                          alt="Qatar"/>
                                            <span>Qatar<small> - English</small></span></a></li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Syria.jpg"
                                                                                          alt="Syria Flag"/> <span>Syria<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/Turkey.jpg"
                                                                                          alt="Turkey Flag"/> <span>Turkey<small> - English</small></span></a>
                                    </li>
                                    <li class="col-xs-6"><a href="<?= base_url() ?>"><img class="pull-left"
                                                                                          src="<?= Assets ?>images/flags-list/United-Arab-Emirates.jpg"
                                                                                          alt="United Arab Emirates Flag"/>
                                            <span>United Arab Emirates<small> - English</small></span></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="cv-btns pull-right">
                    <div class="btn-group currencyselctor">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img alt="Currency Selector"
                                                                                src="<?= Assets ?>images/<?= currency ?>.jpg">
                            <?= currency ?>
                            (
                            <?= symbol ?>
                            ) <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <? $currency_options = $this->home_model->get_currecy_options();
                            foreach ($currency_options as $row) {
                                ?>
                                <li class="<?= ($row->currency_code == currency) ? 'active' : '' ?>"><a
                                            data-value="<?= $row->currency_code ?>" data-symbol="<?= $row->symbol ?>"
                                            href="javascript:void(0);"> <img alt="<?= $row->currency_code ?> currency "
                                                                             src="<?= Assets ?>images/<?= $row->currency_code ?>.jpg">
                                        <?= $row->currency_code ?>
                                        (
                                        <?= $row->symbol ?>
                                        ) </a></li>
                            <? } ?>
                        </ul>
                    </div>
                    <?php

                    if (symbol == "€") {
                        $currency_icon = "<i class='fa fa-euro'></i>";
                    } else if (symbol == "$") {
                        $currency_icon = "<i class='fa fa-dollar'></i>";
                    } else {
                        $currency_icon = "<i class='fa fa-gbp'></i>";
                    }
                    ?>
                    <div class="btn-group pr-dd vatselector">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <?= $currency_icon ?>
                            Show Prices
                            <?= vatoption . '.VAT' ?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li class="<?= (vatoption == 'Ex') ? 'active' : '' ?>"><a data-value="Ex"
                                                                                      href="javascript:void(0);">Show
                                    Prices Ex.VAT</a></li>
                            <li class="<?= (vatoption == 'Inc') ? 'active' : '' ?>"><a data-value="Inc"
                                                                                       href="javascript:void(0);">Show
                                    Prices Inc.VAT</a></li>
                        </ul>
                    </div>
                    <div class="lng-btn" style="display:none"><a data-toggle="modal" data-target="#languagemodel"> <img
                                    alt="UK Flag" src="<?= Assets ?>images/flags/uk.jpg"
                                    style="border-radius:2px; border:solid 1px #FFF;"/> </a></div>
                    <div class="btn-group pr-dd userdrop">
                        <?php

                        $usrid = $this->session->userdata('userid');
                        $UserName = ucfirst($this->session->userdata('UserName'));

                        if (isset($usrid) and $usrid != '') {
                            $UserName = ucfirst($this->session->userdata('UserName'));
                            $login_text = "<i class='fa fa-user'></i> Welcome " . $UserName;
                        } else {
                            $login_text = "<i class='fa fa-lock'></i> Login";
                        }
                        ?>
                        <button id="update_header" type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span
                                    class="userName">
            <?= $login_text ?>
            </span> <span class="caret"></span></button>
                        <ul class="dropdown-menu login_dropdown_menu">
                            <?php
                            if (isset($usrid) and $usrid != '') {

                                $recent_lines = $this->user_model->get_user_recent_lines(3);
                                if ($recent_lines) {
                                    $reorder_class = "";
                                } else {
                                    $reorder_class = "hide";
                                }
                                ?>
                                <li class="MyAccount dropdown-submenu"><a class="header_reorder" href="#" tabindex="-1">Easy
                                        Re-Order</a>
                                    <ul class="dropdown-menu recent_orders_top <?= $reorder_class ?>">
                                        <li>
                                            <div class="header_recent_orders">
                                                <p class="browing_history_title_home">Purchase History <span><a
                                                                href="<?= SAURL ?>users/user_orders">View All</a></span>
                                                </p>
                                                <hr>
                                                <? foreach ($recent_lines as $line) {
                                                    $prod = $this->shopping_model->show_product($line->ProductID);                                            //echo"<pre>";print_r($prod);echo"</pre>";
                                                    $orientation = $wound = $isCustom = '';
                                                    $FinishType = "No Finish";
                                                    $orignalQty = $line->Quantity;
                                                    $shape = strtolower($prod[0]['Shape']) . "/";
                                                    $categoryID = $prod[0]['CategoryID'];
                                                    $parameter = "?productid=" . $line->ProductID;
                                                    $details = $this->user_model->get_product_details($line->ProductID);

                                                    $print_type = '';
                                                    $print_type = $plabeltype = $line->Print_Type;
                                                    if (preg_match("/SRA3/i", $prod[0]['ProductBrand'])) {
                                                        $product_type = "SRA3";
                                                        $url_type = "sra3-sheets";
                                                        $path = Assets . "images/categoryimages/SRA3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                                        $min_qty = '100';
                                                        $max_qty = '20000';
                                                    } else if (preg_match("/A5/i", $prod[0]['ProductBrand'])) {

                                                        $product_type = "A5";
                                                        $url_type = "a5-sheets";
                                                        $path = Assets . "images/categoryimages/A5Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                                        $min_qty = '100';
                                                        $max_qty = '50000';
                                                    } else if (preg_match("/A3/i", $prod[0]['ProductBrand'])) {

                                                        $product_type = "A3";
                                                        $url_type = "a3-sheets";
                                                        $path = Assets . "images/categoryimages/A3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                                        $min_qty = '100';
                                                        $max_qty = '50000';
                                                    } else if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {
                                                        $product_type = 'Rolls';
                                                        $path = Assets . "images/categoryimages/RollLabels/outside/" . $prod[0]['ManufactureID'] . ".jpg";
                                                        $url_type = "roll-labels";
                                                        $orientation = 01;
                                                        $wound = "Y";
                                                        $isCustom = 'Yes';

                                                        $min_qty = $this->home_model->min_qty_roll($details['ManufactureID']);
                                                        $max_qty = $this->home_model->max_qty_roll($details['ManufactureID']);
                                                        $min_labels_per_roll = $this->home_model->min_labels_per_roll($min_qty);
                                                        $max_labels_per_roll = $this->home_model->max_total_labels_on_rolls($details['LabelsPerSheet']);

                                                        $query = "Select c.categoryID, c.LabelGapAcross,c.Height from category c join products p on SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID and p.ProductID LIKE '" . $line->ProductID . "'";
                                                        $die_details = $this->db->query($query)->row();
                                                        if ($line->is_custom == 'Yes') {
                                                            $details['LabelsPerSheet'] = $line->LabelsPerRoll;
                                                        }

                                                    } else if (preg_match('/Integrated Labels/is', $prod[0]['ProductBrand'])) {
                                                        $product_type = 'Integrated';
                                                        $image = $this->home_model->get_db_column("category", "CategoryImage", "CategoryID", $prod[0]['CategoryID']);
                                                        $url_type = "integrated-labels";
                                                        $path = Assets . "images/categoryimages/Integrated/" . $image;
                                                        $orignalQty = 1000;
                                                        $shape = '';
                                                        $parameter = '';

                                                        if (preg_match('/250/', $line->ProductName)) {
                                                            $min_qty = 250;
                                                        } else {
                                                            $min_qty = 1000;
                                                        }
                                                        $max_qty = 500000;

                                                        if (preg_match("/Printed/is", $line->Print_Type)) {
                                                            $print_type = '4 Colour Digital Process';
                                                        } else if (preg_match("/Black/is", $line->Print_Type)) {
                                                            $print_type = 'Monochrome – Black Only';
                                                        }
                                                    } else {
                                                        $url_type = "a4-sheets";
                                                        $product_type = 'A4';
                                                        $path = Assets . "images/categoryimages/A4Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";
                                                    }
                                                    if ($line->labeltype == "plain") {
                                                        $printing_option = "N";
                                                        $source_option = "N";
                                                        $printing_type = "N";
                                                    } else {
                                                        $printing_option = "Y";
                                                        $source_option = "printing";
                                                        $printing_type = "Monochrome - Black Only";
                                                    }

                                                    $product_collection = array('is_custom' => $isCustom,
                                                        'ProductCategoryName' => $prod[0]['ProductCategoryName'],
                                                        'LabelsPerRoll' => $row->LabelsPerRoll,
                                                        'LabelsPerSheet' => $prod[0]['LabelsPerSheet'],
                                                        'ReOrderCode' => $prod[0]['ReOrderCode'],
                                                        'ManufactureID' => $prod[0]['ManufactureID'],
                                                        'ProductBrand' => $prod[0]['ProductBrand'],
                                                        'wound' => $wound,
                                                        'Source' => $source_option,
                                                        'Printing' => $printing_option,
                                                        'Orintation' => $orientation,
                                                        'Print_Type' => $printing_type,
                                                        'FinishType' => $FinishType,
                                                        'orignalQty' => $orignalQty,
                                                        'ProductID' => $line->ProductID);
                                                    //echo"<pre>";print_r($product_collection);echo"</pre>";

                                                    $completeName = $this->home_model->customize_product_name($product_collection);

                                                    $sql = $this->user_model->get_sum_of_designed_artworks($line->OrderNumber, $line->ProductID);
                                                    $no_of_labels_original = $sql['labels'];
                                                    if ($no_of_labels_original == 0) {
                                                        $no_of_labels_original = $details['LabelsPerSheet'] * $line->Quantity;
                                                    }

                                                    if (substr($categoryID, -2, 1) == 'R') {
                                                        if (preg_match('/r1|r2|r3|r4|r5/is', $categoryID)) {
                                                            $new_code_exp = explode("R", $categoryID);
                                                            $categoryID = $new_code_exp[0];
                                                        }
                                                        $Roll = $this->home_model->min_qty_roll($prod[0]['ManufactureID']);
                                                        //$price = $this->home_model->calclateprice($prod[0]['ManufactureID'],$Roll,100);
                                                        //$price = $price['final_price'];
                                                        $data['min_labels'] = $Roll * 100;
                                                    } else {
                                                        if (preg_match('/A4/', $prod[0]['ProductBrand'])) {
                                                            $qty_count = 25;
                                                        } else {
                                                            $qty_count = 100;
                                                        }
                                                        //$price = $this->product_model->ajax_price($qty_count,$prod[0]['ManufactureID']);
                                                        //$price = $price['custom_price'];
                                                    }

                                                    $price = $line->Price + $line->Print_Total;
                                                    $price = $this->home_model->currecy_converter($price, 'yes');
                                                    $col_class = "col-md-3";
                                                    $col_class_img = "col-md-4";
                                                    $col_class_text = "col-md-8";
                                                    $div_class = $div_class1 = $div_class2 = "";
                                                    $complete_name_div = "order_complete_name";

                                                    if ($line->Printing == "Y") {
                                                        $col_class = "col-md-6";
                                                        $col_class_img = "col-md-3";
                                                        $col_class_text = "col-md-9";
                                                        $div_class = "row";
                                                        $div_class1 = "col-md-6";
                                                        $div_class2 = "col-md-6 text-right";
                                                        $complete_name_div = "order_complete_name_printed";
                                                    }
                                                    ?>
                                                    <div class="order_line_top clear">
                                                        <div class="row">
                                                            <div class="image_thumbnail col-md-3 col-sm-3"><img
                                                                        src="<?= $path ?>" class="img-responsive"
                                                                        onerror='imgError(this);'/></div>
                                                            <div class="right-section-history col-md-9">
                                                                <div class="top_line_description col-md-12"
                                                                     style="padding:0;">
                                                                    <div class="">
                                                                        <div class="line_order_number">
                                                                            <span>Order #:</span>
                                                                            <?= $line->OrderNumber ?>
                                                                        </div>
                                                                        <div class="line_order_date">
                                                                            <?= date('jS F Y', $line->OrderDate) ?>
                                                                        </div>
                                                                    </div>
                                                                    <hr/>
                                                                </div>
                                                                <div class="line_description_middle clearfix"> <span
                                                                            class="line_complete_name">
                              <?= $completeName ?>
                              </span>
                                                                    <p class="text-right clear"><strong>
                                                                            <?= symbol . number_format($price, 2, '.', ''); ?>
                                                                        </strong></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="browsing_bottom col-md-12 text-center"
                                                             style="padding-left:0;padding-right:0;">
                                                            <div class="col-md-8 text-left"><a
                                                                        href="<?= base_url(); ?>users/user_orders/"
                                                                        class=" btn-link btn-sm continue_place_order">Edit
                                                                    and Place Order</a></div>
                                                            <div class="col-md-4 text-right"><a
                                                                        href="<?= base_url(); ?>users/user_orders/"
                                                                        class="btn btn-xs orangeBg redorderBtn">Re-Order</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end line-->
                                                <? } ?>
                                            </div>
                                            <!-- end header_reorder -->
                                        </li>
                                    </ul>
                                </li>
                                <li class="ReOrder"><a href="<?= SAURL ?>users/">My Account</a></li>
                                <li class="ReOrder"><a href="<?= SAURL ?>users/user_orders/">Order History</a></li>
                                <li class="LogOut"><a href="<?= SAURL ?>users/logout/">Logout</a></li>
                                <?php
                            } else {
                                ?>
                                <!--<li class="Login"><a href="<?= SAURL ?>users/">Login</a></li>-->
                                <li class="Login"><a href="javascript:void(0);" class="login_modal_link">Login</a></li>
                                <li class="Register"><a href="<?= SAURL ?>users/signup/">Register</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="pull-right lre" id="update_header" style="display:none;">
                        <?php
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-logo-nav">
        <div class="container">
            <div class="main-header">
                <div class="">
                    <div class="row m-t-b-11">
                        <!-- Logo Starts -->
                        <div class="col-sm-4 col-md-3 col-lg-3 logoadjustements">
                            <div class="navbar-header">
                                <div>
                                    <?php
                                    $redirect_from = $this->session->userdata('redirect_from');
                                    if (isset($redirect_from) and $redirect_from == "plo"):
                                        ?>
                                        <a href="<?= base_url() ?>trade/"> <img onerror='imgError(this);'
                                                                                alt="AA Labels"
                                                                                src="<?= base_url() ?>trade/theme/images/logo.png"/>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= base_url() ?>"> <img onerror='imgError(this);' width="198"
                                                                          height="76" alt="AA Labels"
                                                                          src="<?= Assets ?>images/logo.png"/> </a>
                                    <?php endif; ?>
                                </div>
                                <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse"
                                        class="navbar-toggle" type="button"><span
                                            class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                                    <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                            </div>
                        </div>
                        <!-- Logo Starts -->
                        <!-- Search Starts -->
                        <style>
                            .input-group-btn:last-child > .btn-group, .input-group-btn > .btn + .btn {
                                margin-top: 2px !important;
                            }

                            .spanbtn-detafult {
                                background: #cccccc;
                                border-radius: 4px;
                                position: inherit;
                                left: -4px;
                                z-index: 1000;
                                color: #333333 !important;
                                border-bottom-left-radius: 4px !important;
                                border-top-left-radius: 4px !important;
                                padding-left: 13px !important;
                                padding-right: 13px !important;
                            }
                        </style>
                        <?php if (SITE_MODE == 'live'){ ?>
                        <form name="search_form" action="/search" method="get" id="search_form">
                            <?php }else{ ?>
                            <form name="search_form" action="<?php echo base_url(); ?>search" method="get">
                                <?php } ?>
                                <div class=" col-sm-3 col-md-3 m-t-100 searchboxadjustment padding-l-t-0 ">
                                    <div class="input-group">
                                        <input type="text" id="search_md"
                                               style="margin-top:4px;border-bottom-left-radius:4px;border-top-left-radius:4px;"
                                               class="display_none_sm form-control ajax_search col-xs-12" name="q"
                                               placeholder="Search...">
                                        <span class="input-group-btn " style="width:auto;z-index:2">
                  <button class="btn btn-default spanbtn-detafult" id="search_btn_md" type="submit"> <i
                              class="glyphicon glyphicon-search"></i> </button>
                  </span></div>
                                </div>


                                <!-- Search Ends -->
                                <!-- Shopping Cart Starts -->
                                <div class="col-sm-8 col-lg-6  col-md-6 m-t-100 pull-right padding-r-t-0    ">


                                    <!--timer-->

                                    <?php
                                    $redirect_from = $this->session->userdata('redirect_from');
                                    if (isset($redirect_from) and $redirect_from == "plo"):
                                        ?>
                                    <?php else: ?>
                                        <?php $method = $this->router->fetch_method();
                                        $class = $this->router->fetch_class();
                                        if (($method == 'printing' || $method == 'customlabels')) {
                                            $phonetapclass = '';
                                        } else {
                                            $phonetapclass = 'rTapNumber327505';
                                        }
                                        ?>
                                        <div style="margin-right: 1%;"
                                             class="pull-left text-center header-first-right-icon"><img
                                                    src="<?= Assets ?>images/headgear.png"
                                                    class="headgear-mobile"/>
                                            <div class="upper_div pull-right text-left"
                                                 style="padding-left: 10px;"> <span
                                                        style="color: #333333;font-size: 18px;font-weight: 600;"
                                                        class="numbermobile-adjustement <?= $phonetapclass ?>">01733 588390</span>
                                                <div class="counter">
                                                    <p style="font-size: 16px;color: #333333;text-align: center;">8:30 -
                                                        5:30</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!--timer-->
                                        <div id="timer_div" style="margin-right:5%;"
                                             class="pull-left text-center header-second-right-icon">

                                            <!-- <i class="fa fa-3x fa-clock-o Blue2 pull-left hidden-xs hidden-sm" style="margin-left: .2em !important;"></i>
                             -->

                                            <img src="<?= base_url() ?>theme/site/images/header-timer-clock.png"
                                                 class="headgear-mobile"
                                                 style="margin-left:.5em;margin-right: .4em !important;"/>
                                            <div class="upper_div pull-right "><span
                                                        style="color: #fd4913;float: left;font-size: 12px;">NEXT DAY DELIVERY</span>
                                                <div class="counter clock_time"
                                                     style="line-height: 1;text-align: left;"></div>
                                                <div class="counter" id="expire_time_del">
                                                    <p><a data-toggle="tooltip"
                                                          title="Time remaining to order plain labels for next working day delivery."
                                                          data-placement="bottom" href="<?= base_url() ?>delivery/">Time
                                                            remaining to order ...</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pull-right text-center" id="cart">
                                        <? include('top_cart.php'); ?>
                                    </div>

                                </div>
                                <!-- Shopping Cart Ends -->


                                <div class=" col-sm-12  m-t-100 searchboxadjustmentsm ">
                                    <div class="input-group">
                                        <input type="text" id="search_sm"
                                               style="margin-top:4px;border-bottom-left-radius:4px;border-top-left-radius:4px;"
                                               class=" display_none form-control ajax_search col-xs-12" name="q"
                                               placeholder="Search...">
                                        <span class="input-group-btn " style="width:auto;z-index:2">
                  <button class="btn btn-default spanbtn-detafult" id="search_btn_sm" type="submit"> <i
                              class="glyphicon glyphicon-search"></i> </button>
                  </span></div>
                                </div>

                    </div>
                    </form>

                </div>
            </div>
        </div>
        <script>

            $(document).on("click", "#search_btn_sm", function (e) {
                if ($('#search_btn_sm').val()) {
                    $('#search_form').submit();

                } else {
                    e.preventDefault();
                }
                $("#search_md").prop("disabled", true); //Disable
                $("#search_sm").prop("disabled", false); //Enable
            });
            $(document).on("click", "#search_btn_md", function (e) {
                if ($('#search_md').val()) {
                    $('#search_form').submit();

                } else {
                    e.preventDefault();
                }
                $("#search_md").prop("disabled", false); //Disable
                $("#search_sm").prop("disabled", true); //Enable
            });


        </script>
        <? $is_mobile = $this->agent->is_mobile();
        $redirect_from = $this->session->userdata('redirect_from');

        if (isset($redirect_from) and $redirect_from == "plo") {
            include('nav_menu_plo.php');
        } else {

            include('nav_menu.php');
        }
        ?>
    </div>
</div>
<script>
    $(document).ready(function () {


        $(".ajax_search").keypress(function (e) {
            var keyCode = e.which;

            if (keyCode == 46) {
                return true;
            } else if (!((keyCode >= 48 && keyCode <= 57)
                || (keyCode >= 65 && keyCode <= 90)
                || (keyCode >= 97 && keyCode <= 122))
                && keyCode != 8 && keyCode != 32) {
                return false;
            }


        });


        var is_holiday = 'no'
        var d = new Date();
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";

        var n = weekday[d.getDay()];


        var now = new Date();
        var closing = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 16);//Set this to 04:00pm on the present day
        var diff = closing - now;//Time difference in milliseconds

        if ((n == "Friday" && diff < 0) || n == "Saturday" || n == "Sunday" || is_holiday == 'yes') {
            var html_msg = '<i class="fa fa-3x  faa-horizontal animated fa-truck Blue2 pull-left" style="margin-right: .3em;margin-left: .2em;"></i><div class="upper_div pull-right text-left"><span style="color: #fd4913;font-size: 12px;">NEXT DAY DELIVERY</span>';
            html_msg = html_msg + '<p class="text-left f-12" style="font-size: 12px;">The next day delivery option is <br/>now closed. <a href="#" data-toggle="tooltip" title="Order before 16:00 (Mon to Fri) to use the next working day delivery service" data-placement="bottom"> Read more.</a></p></div>';

            $('#timer_div').html(html_msg);
            $('.material_clock').html('<b>Order before 16:00 for Next Day Delivery</b>');
        } else if (diff < 0) {

            var html_msg = '<i class="fa fa-3x  faa-horizontal animated fa-truck Blue2 pull-left" style="margin-right: .3em;margin-left: .2em;"></i><div class="upper_div pull-right text-left"><span style="color: #fd4913;font-size: 12px;">NEXT DAY DELIVERY</span>';
            html_msg = html_msg + '<p class="text-left f-12" style="font-size: 12px;">The next day delivery option <br/>is now closed. <a href="#" data-toggle="tooltip" title="Order before 16:00 (Mon to Fri) to use the next working day delivery service" data-placement="bottom"> Read more.</a></p></div>';

            $('#timer_div').html(html_msg);
            $('.material_clock').html('<b>Order before 16:00 for Next Day Delivery</b>');

        } else {

            var hours = Math.floor(diff / (1000 * 60 * 60));
            diff = diff % (1000 * 60 * 60);
            var mins = Math.floor(diff / (1000 * 60));
            var minsInHousrs = parseFloat(diff / (1000 * 60 * 60)).toFixed(2);
            diff = diff % (1000 * 60);
            var secInHousrs = parseFloat(diff / (1000 * 60 * 60)).toFixed(3);
            var secs = Math.floor(diff / (1000));
            var time = (hours + parseFloat(minsInHousrs) + parseFloat(secInHousrs));
            var val = time * 60 * 60 * 1000;
            selectedDate = new Date().valueOf() + val;
            $('.clock_time').countdown(selectedDate.toString(), function (event) {
                $(this).html(event.strftime('%H<span>H</span>: %M<span>M</span>: %S<span>S</span>'));

            });
        }

        $('[data-toggle="tooltip"]').tooltip();
        $(".globe-map").aaZoom();

    });
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
<script type="text/javascript">

    function imgError(image) {
        image.onerror = "";
        image.src = "<?php echo Assets; ?>images/place-holder.jpg";
        width = image.clientWidth;
        height = image.clientHeight;
        if (width == '208') {
            image.clientWidth = 130;
        }

        image.height = height;
        return true;
    }
</script>
<!-- login modal start -->
<div class="modal fade login-modal aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content no-padding">
            <div class="panel no-margin">
                <div class="panel-heading">
                    <h3 class="pull-left no-margin">Account Login</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div class="login_form">
                        <form class="labels-form" id="header_login_form" method="post" action="">
                            <input type="hidden" name="page" value="flash"/>
                            <div class=" ">
                                <div style="display: none;" class="email-address-password-incorrect-alert">
                                    <span>Your user email ID or password is incorrect.</span>
                                </div>
                                <div class=" ">
                                    <label id="server_error" style=" display:none;" class="error"></label>
                                    <div class=" ">
                                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                            <input type="text" placeholder="Enter Email address" name="email"
                                                   id="header_email" required>
                                        </label>
                                    </div>
                                    <div class=" ">
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" placeholder="Enter Password" name="password"
                                                   id="header_password" required>
                                        </label>
                                    </div>

                                    <!--                                  usman testing timer brute force attack-->
                                    <div id="main_throttle">
                                        <div class=" email-address-password-incorrect-alert">
                                            <div class="row">

                                                <div class="_3hYZM">
                                                    <!--                                                    <svg viewBox="0 0 24 24" width="24" height="24" fill="currentcolor" role="img">-->
                                                    <!--                                                        <path d="M12,1 C5.925,1 1,5.925 1,12 C1,18.075 5.925,23 12,23 C18.075,23 23,18.075 23,12 C23,5.925 18.075,1 12,1 Z M12,0 C18.627,0 24,5.373 24,12 C24,18.627 18.627,24 12,24 C5.373,24 0,18.627 0,12 C0,5.373 5.373,0 12,0 Z M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M12.5,13 L11.5,13 L11.5,5 L12.5,5 L12.5,13 Z"></path></svg>-->
                                                    <b><h5 class="line-height-normal" data-test="message-title"> Please
                                                            reset your password</h5></b>
                                                    <div data-test="message-body">
                                                        <p>
                                                            <span class="line-height-normal">This account is locked due to a number of failed attempts to sign in.</span>
                                                            <a href="<?= AURL ?>users/forgotpassword/"
                                                               data-test="forgot-password-link">
                                                                <span>Please reset your password</span>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!--                                                <div class="counter col-sm-9" id="expire_time_del">-->
                                                <!--                                                    <p class="font-12">Too many attempts. Try back after ...</p>-->
                                                <!--                                                </div>-->
                                                <!--                                                <div class="col-sm-3" id="clock_time_login">-->


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--                                    usman-->
                                <div class="" style="margin-top: 15px;">
                                    <label class="checkbox"
                                           style="font-size: 12px;text-align:justify !important;line-height: 15px;">
                                        <input type="checkbox" name="newsletter_val">
                                        <!--class="textOrange validate-required"-->
                                        <i></i> <span>I would like to receive newsletters and information on offers and discount vouchers to the email address provided. In agreeing to receive communication from time-to-time, AA Labels assures you that your contact details will remain confidential and will not be shared with any third-party. </span>
                                    </label>
                                </div>
                                <div class="">
                                    <button style="margin-top:13px;" type="submit" id="submit_login"
                                            class="btn orangeBg text-uppercase btn-block">Sign in
                                    </button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
                <!--end mat-sep-->
            </div>
            <div class="modal-footer">
                <div class="row text-left login_modal_footer padding-15 ">
                    <div class="col-md-6 col-sm-6"><a href="<?= AURL ?>users/forgotpassword/">Forgot Password?</a>
                    </div>
                    <div class="col-md-6 col-sm-6"><a href="<?= AURL ?>users/signup/">Register a new account</a>
                    </div>
                </div>
                <button type="button" class="btn orangeBg login_new btn-xs" style="display:none;">Login To Account
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<?php

$controller = $this->router->fetch_class();
$method = $this->router->fetch_method()

?>
<!-- end login modal-->
<script type="text/javascript">
    $(document).ready(function (e) {
        //usman
        // var count = 1;
        $('#main_throttle').hide();
        //usman
        var form = $("#header_login_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            submitHandler: function (form) {
                if ($('#header_email').val() === "" || $('#header_password').val() === "") {
                    $('.email-address-password-incorrect-alert').show();
                }
                $("#header_login_form .btn").attr("disabled", "disabled").html("Please Wait <i class='fa fa-spin fa-spinner'></i>");
                $.post(base + 'ajax/user_login', $("#header_login_form").serialize(), function (data) {
                    $("#header_login_form .btn").removeAttr("disabled").html("Submit Now <i class='fa fa-arrow-circle-right'></i>");
                    if (data.response == 'error') {

                        if (data.remaining_time !== 0 && data.remaining_time !== null) {
                            timer2 = data.remaining_time;
                            // if (count === 1) {
                            //     setInterval(function () {
                            //         var timer = timer2.split(':');
                            //         //by parsing integer, I avoid all extra string processing
                            //         var minutes = parseInt(timer[0], 10);
                            //         var seconds = parseInt(timer[1], 10);
                            //         --seconds;
                            //         minutes = (seconds < 0) ? --minutes : minutes;
                            //         if (minutes < 0) clearInterval(interval);
                            //         seconds = (seconds < 0) ? 59 : seconds;
                            //         seconds = (seconds < 10) ? '0' + seconds : seconds;
                            //         //minutes = (minutes < 10) ?  minutes : minutes;
                            //         $('#clock_time_login').html('<b>' + minutes + ':' + seconds + '</b>');
                            //         timer2 = minutes + ':' + seconds;
                            //     }, 1000);
                            //
                            //
                            //     count++;
                            // }
                            $('#main_throttle').show();
                        } else {
                            $('#main_throttle').hide();


                        }

                        // $('#server_error').text("Your user email ID or password is incorrect.");
                        $('.email-address-password-incorrect-alert').show();
                        $('#server_error').show();
                    } else {
                        update_header_login(data.username);
                        $('.login-modal').modal('hide');
                        <? if(($controller == "shopping" and $method == "checkout") || ($controller == "home" and $method == "index") || ($controller == "home" and $method == "material") || $controller == "users"):?>
                        location.reload();
                        <? endif;?>
                    }
                    return false;
                }, 'json');
                return false;
            }
        });
    });


    $(document).on("click", ".login_modal_link", function (e) {

        $('.login-modal').modal('show');
    });
    // $(document).on("click", "#submit_login", function (e) {
    //   var email = $('#header_email').val();
    //     // alert("fgfdg");
    //     $.ajax({
    //         url: base + 'ajax/login_throttle_time',
    //         type: "POST",
    //         async: "false",
    //         dataType: "json",
    //         data: {
    //             email: email,
    //
    //         },
    //         success: function (data) {
    //             alert("dfsdfsd");
    //             data = $.parseJSON(data);
    //             alert(data);
    //             if (!data == '') {
    //                 timer2 = data;
    //                 update_printed_quantity_box(data.qty, data.designs, data.rolls);
    //                 $('#ajax_upload_content').html(data.content);
    //
    //                 intialize_progressbar();
    //
    //                 update_price_new_rolls();
    //             }
    //         }
    //     });
    //
    //
    //      $('.login-modal').modal('show');
    // });

    function update_header_login(username) {
        var name = "<i class='fa fa-user'></i> Welcome " + username;
        $('#update_header').find(".userName").html(name);
        var dropdown = "<li class='MyAccount'><a href='<?=SAURL?>users/user_orders/'>Easy Re-Order</a></li>";
        dropdown += "<li class='ReOrder'><a href='<?=SAURL?>users/'>My Account</a></li>";
        dropdown += "<li class='LogOut'><a href='<?=SAURL?>users/logout/'>Logout</a></li>";
        $('.loginRegister').find("ul.dropdown-menu").html(dropdown);

    }

    $(document).ready(function () {
        $('.dropdown-submenu a.header_reorder').on("click", function (e) {
            if ($(this).parents("li").hasClass('active')) {
                $(this).parents("li").removeClass('active');
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            } else {
                $(this).parents("li").addClass('active');
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            }

        });
        $(':not(.header_reorder)').click(function () {
            $('.recent_orders_top').hide();
            $('.MyAccount.dropdown-submenu').removeClass('active');
        });
    });
</script>



