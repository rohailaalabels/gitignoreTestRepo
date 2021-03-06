<?php

if (preg_match("/blog/is", $_SERVER['REQUEST_URI'])) {
    $conn = new mysqli(ASERVER, ADBUSER, ADBPASS, ADBNAME);
    if (!$conn->connect_error) {
        $compatible_sql = $conn->query("select CategoryName as name,CategoryImage as image from category where CategoryActive LIKE 'Y' AND `specification3` = 'Integrated'");

        while ($row = $compatible_sql->fetch_assoc()) {
            $compatible_list[] = (object)array('name' => $row['name'], 'image' => $row['image']);
        }
    }
} else {
    $compatible_list = $this->home_model->integrated_comaptible_list();
}
?>
<style>
    .navbar-nav > li {
        font-size: 11.45px !important;
    }

    .tooltip.bottom .tooltip-arrow {
        border-bottom-color: #fff8dc;
    }

    .navbar-default .navbar-nav > li.promotion_menu > a {
        color: #fff !important;
        background: #fd4913 !important;
    }

    .triangle-topleft {
        width: 0;
        height: 0;
        border-top: 75px solid red;
        border-right: 75px solid transparent;
        position: absolute;
        color: #ffffff;

    }

    .triangle-topleft-text {
        position: absolute;
        color: #ffffff;
        transform: rotate(-45deg);
        text-align: center;
        margin-left: 2px;
        margin-top: 11px;
        text-decoration: none !important;
        font-size: 12px !important;
    }

    .navbar-nav > li .dropdown-menu a:hover span.triangle-topleft-text {
        color: #fff !important;
    }

    /*.navbar-nav>li>a
    {
        padding: 14px 8.5px!important;
    }
    @media screen and (min-width: 1200px)
    {
        .navbar-default .navbar-nav>li:last-child>a {
            padding-right: 10px!important;
        }
    }*/

    .navbar-default {
        max-width: 995px;
    }

    .navbar-default .navbar-nav > li > a {
        padding: 15px 10px;
        /*padding:14px 27.8px  !important;*/
    }


    @media (min-width: 1200px) {
        .navbar-default .navbar-nav > li > a {
            padding: 14px 10.8px !important;
            /*padding: 14px 18.5px!important;*/
        }

        .navbar-default {
            /*max-width: 1200px;*/
        }

        .navbar-nav > li {
            /*font-size: 13px !important;*/
        }
    }

    .navbar-default .navbar-nav > li:last-child > a {
        padding: 14px 14px !important;
    }

    .navbar-nav > li > a {
        padding: 14px 10.8px !important;
    }

    /*AA41 START*/
    .lastChildActive {
        text-decoration: underline;
        color: #17b1e3 !important;
    }

    /*AA41 ENDS*/


</style>
<div class="nav_container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse navbar-main-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                                      data-toggle="dropdown" data-url="#">Labels on sheets &amp;
                        Rolls</a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <ul class="col-sm-12 nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tc-2" aria-controls="tc-2" role="tab"
                                                                      data-toggle="tab">Labels by Shapes &amp; Size</a>
                            </li>
                            <li role="presentation" class=""><a href="#tc-1" aria-controls="tc-1" role="tab"
                                                                data-toggle="tab">Labels by Material</a></li>
                            <li role="presentation" class=""><a href="#tc-3" aria-controls="tc-3" role="tab"
                                                                data-toggle="tab">Labels by Adhesive</a></li>
                            <li role="presentation" class=""><a href="#tc-4" aria-controls="tc-4" role="tab"
                                                                data-toggle="tab">Labels by Printer Compatibility</a>
                            </li>
                        </ul>
                        <div class="tab-content clearfix">

                            <!-- Labels by Shapes & Size -->
                            <div role="tabpanel" class="tab-pane active" id="tc-2">
                                <!-- Labels on A5 Sheet -->
                                <div class="col-lg-20-p col-md-20-p col-sm-20-p col-xs-6" nav-item-pos="ni-1-2-2">
                                    <img alt="Sheets"
                                         src="<?= Assets ?>images/icon-sheet.png"
                                         class="img-responsive roll-icon-nav"/>
                                    <h5>Labels on A5 Sheet</h5>
                                    <!-- Paper -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav">
                                                <li><a href="<?= base_url() ?>a5-sheets/circular/">Circular Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>a5-sheets/rectangle/">Rectangular
                                                        Labels</a></li>

                                                <!-- AA41 STARTS -->
                                                <li><a href="<?= base_url() ?>a5-sheets/" class="lastChildActive">View
                                                        All</a></li>
                                                <!-- AA41 ENDS -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Labels on A4 Sheet -->
                                <div class="col-lg-20-p  col-md-20-p col-sm-20-p col-xs-6" nav-item-pos="ni-1-2-2"><img
                                            alt="Sheets"
                                            src="<?= Assets ?>images/icon-sheet.png"
                                            class="img-responsive roll-icon-nav"/>
                                    <h5 class="font-sm-13">Labels on A4 Sheet</h5>
                                    <!-- Paper -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav">
                                                <li><a href="<?= base_url() ?>a4-sheets/circular/">Circular Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>a4-sheets/oval/">Oval Labels</a></li>
                                                <li><a href="<?= base_url() ?>a4-sheets/rectangle/">Rectangular
                                                        Labels</a></li>
                                                <li><a href="<?= base_url() ?>a4-sheets/square/">Square Labels</a></li>
                                                <li><a href="<?= base_url() ?>a4-sheets/triangle/">Triangle Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>a4-sheets/star/">Star Labels</a></li>
                                                <li><a href="<?= base_url() ?>a4-sheets/heart/">Heart Labels</a></li>
                                                <li><a href="<?= base_url() ?>a4-sheets/irregular/">Irregular Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>a4-sheets/anti-tamper/">Tamper Evident
                                                        Labels</a></li>
                                                <li><a href="<?= base_url() ?>avery-sized-labels/">Avery® Sized
                                                        Labels</a></li>
                                                <li><a href="<?= base_url() ?>piggy-back-labels/">Piggyback Labels</a>
                                                </li>

                                                <!-- AA41 STARTS -->
                                                <li><a href="<?= base_url() ?>a4-sheets/" class="lastChildActive">View
                                                        All</a></li>
                                                <!-- AA41 ENDS -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Labels on A3 Sheet -->
                                <div class="col-lg-20-p  col-md-20-p col-sm-20-p col-xs-6" nav-item-pos="ni-1-2-2"><img
                                            alt="Sheets"
                                            src="<?= Assets ?>images/icon-sheet.png"
                                            class="img-responsive roll-icon-nav"/>
                                    <h5 class="font-sm-13">Labels on A3 Sheet</h5>
                                    <!-- Paper -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav">
                                                <li><a href="<?= base_url() ?>a3-sheets/circular/">Circular Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>a3-sheets/oval/">Oval Labels</a></li>
                                                <li><a href="<?= base_url() ?>a3-sheets/rectangle/">Rectangular
                                                        Labels</a></li>
                                                <li><a href="<?= base_url() ?>a3-sheets/square/">Square Labels</a></li>

                                                <!-- AA41 STARTS -->
                                                <li><a href="<?= base_url() ?>a3-sheets/" class="lastChildActive">View
                                                        All</a></li>
                                                <!-- AA41 ENDS -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Labels on SRA3 Sheet -->
                                <div class="col-lg-20-p  col-md-20-p col-sm-20-p col-xs-6" nav-item-pos="ni-1-2-2"><img
                                            alt="Sheets"
                                            src="<?= Assets ?>images/icon-sheet.png"
                                            class="img-responsive roll-icon-nav"/>
                                    <h5 class="font-sm-13">Labels on SRA3 Sheet</h5>
                                    <!-- Paper -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav">
                                                <li><a href="<?= base_url() ?>sra3-sheets/circular/">Circular Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>sra3-sheets/oval/">Oval Labels</a></li>
                                                <li><a href="<?= base_url() ?>sra3-sheets/rectangle/">Rectangular
                                                        Labels</a></li>
                                                <li><a href="<?= base_url() ?>sra3-sheets/square/">Square Labels</a>
                                                </li>

                                                <!-- AA41 STARTS -->
                                                <li><a href="<?= base_url() ?>sra3-sheets/" class="lastChildActive">View
                                                        All</a></li>
                                                <!-- AA41 ENDS -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-20-p  col-md-20-p col-sm-20-p col-xs-6" nav-item-pos="ni-1-2-1"><img
                                            alt="Rolls"
                                            src="<?= Assets ?>images/icon-roll.png"
                                            class="img-responsive roll-icon-nav"/>
                                    <h5 class="font-sm-13">Labels on Rolls</h5>
                                    <!-- Paper -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav">
                                                <li><a href="<?= base_url() ?>roll-labels/circular/">Circular Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>roll-labels/oval/">Oval Labels</a></li>
                                                <li><a href="<?= base_url() ?>roll-labels/rectangle/">Rectangular
                                                        Labels</a></li>
                                                <li><a href="<?= base_url() ?>roll-labels/square/">Square Labels</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>roll-labels/star/">Star Labels</a></li>
                                                <li><a href="<?= base_url() ?>roll-labels/heart/">Heart Labels</a></li>
                                                <li><a href="<?= base_url() ?>roll-labels/irregular/">Irregular
                                                        Labels</a></li>
                                                <li><a href="<?= base_url() ?>thermal-printer-roll-labels/">Search by
                                                        Thermal Printer Model</a></li>

                                                <!-- AA41 STARTS -->
                                                <li><a href="<?= base_url() ?>roll-labels/" class="lastChildActive">View
                                                        All</a></li>
                                                <!-- AA41 ENDS -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 thin-pad hidden-xs text-center hide"
                                     style="margin-top:-10px;margin-bottom:20px;">
                                    <a href="<?= base_url() ?>special-offer-materials/" class="btn orangeBg">View
                                        Special Promotions <i class="fa fa-gift"></i></a>
                                </div>
                                <div class="col-sm-12 thin-pad hidden-xs">
                                    <!--<div class="row">
                    <div class="col-sm-4"> <img src="<?= Assets ?>images/dry-edge-banner-dropdown-menu.png" class="img-responsive border0" alt="Dry Edge Labels"/> </div>
                    <div class="col-sm-4"> <a href="<?= base_url() ?>sample-request/sheets/"> <img src="<?= Assets ?>images/material-sample-banner-dropdown-menu.png" class="img-responsive border0" alt="Label Sample Request"/> </a> </div>
                    <div class="col-sm-4"> <a href="<?= base_url() ?>customlabels.php/"> <img src="<?= Assets ?>images/custom-size-banner-dropdown-menu.png" class="img-responsive border0" class="Custom Labels Sizes"/> </a> </div>
                  </div>-->
                                    <div class="row">
                                        <div class="col-sm-3"><img src="<?= Assets ?>images/menu-banner-1.jpg"
                                                                   class="img-responsive border0"
                                                                   alt="Dry Edge Labels"/></div>
                                        <div class="col-sm-3"><a href="<?= base_url() ?>sample-request/sheets/"> <img
                                                        src="<?= Assets ?>images/menu-banner-2.jpg"
                                                        class="img-responsive border0" alt="Label Sample Request"/> </a>
                                        </div>
                                        <div class="col-sm-3"><a href="<?= base_url() ?>customlabels.php/"> <img
                                                        src="<?= Assets ?>images/menu-banner-3.jpg"
                                                        class="img-responsive border0" alt="Custom Labels Sizes"/> </a>
                                        </div>
                                        <div class="col-sm-3"><a href="<?= base_url() ?>roll-labels/"> <img
                                                        src="<?= Assets ?>images/menu-banner-4.jpg"
                                                        class="img-responsive border0" alt="Custom Labels Sizes"/> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Labels by Material -->

                            <div role="tabpanel" class="tab-pane" id="tc-1">
                                <div class="plain_labels_section">
                                    <!-- Labels on Rolls -->

                                    <!-- Labels on Sheets -->
                                    <div class="col-sm-6 col-md-6" nav-item-pos="ni-1-1-2"><img alt="Sheets"
                                                                                                src="<?= Assets ?>images/icon-sheet.png"
                                                                                                class="img-responsive roll-icon-nav"/>
                                        <h5>Labels on Sheets</h5>
                                        <!-- Paper -->
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <label><a href="<?= base_url() ?>material-on-sheets/matt-white-paper/all/">Paper</a></label>
                                                <ul class="nav">
                                                    <li><a href="<?= base_url() ?>material-on-sheets/matt-white-paper/">Matt
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/semi-gloss-white-paper/">Semi
                                                            Gloss White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/gloss-yellow-paper/">Gloss
                                                            Yellow</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/gloss-white-inkjet-paper/">Gloss
                                                            White - Inkjet</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/high-gloss-white-paper/">High
                                                            Gloss White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/fluorescent-green-paper/">Flourescent
                                                            Colours</a>
                                                    <li><a href="<?= base_url() ?>material-on-sheets/matt-blue-paper/">Matt
                                                            Colours</a></li>
                                                    <li><a href="<?= base_url() ?>material-on-sheets/matt-gold-paper/">Metallic
                                                            Colours</a></li>
                                                    <!-- <li><a href="<?= base_url() ?>material-on-sheets/matt-white-aluminium-back-coated-paper/">Aluminium Back Coated</a></li>-->
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/frozen-quartz-paper/">Pearlescent
                                                            Finish</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-white-opaque-paper/">Blockout/Cover-Up</a>
                                                    </li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-sheets/brown-parcel-paper/all/">Brown
                                                        Parcel Paper</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/brown-parcel-paper/">Brown
                                                            Parcel Paper</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-sheets/luxury-cream-paper/all/">Luxury
                                                        Paper</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/luxury-cream-paper/">Matt
                                                            Colours</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-sheets/matt-black-vinyl/all/">Vinyl</a></label>
                                                <ul class="nav">
                                                    <li><a href="<?= base_url() ?>material-on-sheets/matt-black-vinyl/">Matt
                                                            Colours</a></li>
                                                </ul>

                                                <!-- <label><a href="<?= base_url() ?>material-on-sheets/matt-white-pvc/all/">PVC</a></label>
                        <ul class="nav">
                          <li><a href="<?= base_url() ?>material-on-sheets/matt-white-pvc/">Security Materials</a></li>
                        </ul>-->

                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label><a href="<?= base_url() ?>material-on-sheets/gloss-white-inkjet-polypropylene/all/">Polypropylene</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/gloss-white-inkjet-polypropylene/">Gloss
                                                            White Inkjet</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/gloss-clear-inkjet-polypropylene?code=PCIP">Gloss
                                                            Clear Inkjet</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-sheets/matt-white-polyester/all/">Polyester</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-white-polyester/">Matt
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/gloss-white-polyester/">Gloss
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-clear-polyester/"/>Clear</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-yellow-polyester/">Matt
                                                            Colours</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/bright-silver-polyester/">Metallic
                                                            Colours</a></li>
                                                </ul>

                                                <!--  <label><a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene/all/?code=PETH">Polyethylene <small style="font-size:8px;">(Temperature Resistant) </small> </a></label>
                        <ul class="nav">
                          <li><a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene?code=PETC">Cryogenic (-196°C)</a></li>
                          <li><a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene?code=PETH">Heat Resistant (121°C) </a></li>
                        </ul>-->

                                                <label><a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene/all/">Polyethylene
                                                        <small>(Standard)</small> </a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene/">Matt
                                                            White</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>specialist-label-material/">Specialist
                                                        Materials</small> </a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene?code=PETC">Cryogenic
                                                            (-196°C)</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene?code=PETH">Heat
                                                            Resistant (121°C) </a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-sheets/matt-white-aluminium-back-coated-paper/">Aluminium
                                                            Back Coated</a></li>
                                                    <li><a href="<?= base_url() ?>material-on-sheets/matt-white-pvc/">Security
                                                            Materials</a></li>
                                                    <!--   <li><a href="<?= base_url() ?>material-on-sheets/matt-white-dissolving-paper/">Matt White Dissolving - Paper</a></li>-->

                                                    <li><a href="<?= base_url() ?>specialist-label-material/">View
                                                            All</a></li>
                                                </ul>
                                                <label>Samples</label>
                                                <ul class="nav">
                                                    <li><a href="<?= base_url() ?>sample-request/sheets/">Request Free
                                                            Material Samples</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6" nav-item-pos="ni-1-1-1"><img alt="Rolls"
                                                                                                src="<?= Assets ?>images/icon-roll.png"
                                                                                                class="img-responsive roll-icon-nav"/>
                                        <h5>Labels on Rolls</h5>
                                        <!-- Paper -->
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <label><a href="<?= base_url() ?>material-on-rolls/matt-white-paper/all/">Paper</a></label>
                                                <ul class="nav">
                                                    <li><a href="<?= base_url() ?>material-on-rolls/matt-white-paper/">Matt
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/semi-gloss-white-paper/">Semi
                                                            Gloss White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/high-gloss-white-paper/">High
                                                            Gloss White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/fluorescent-green-paper/">Flourescent
                                                            Colours</a></li>
                                                    <li><a href="<?= base_url() ?>material-on-rolls/matt-yellow-paper/">Matt
                                                            Colours</a></li>
                                                    <li><a href="<?= base_url() ?>material-on-rolls/matt-gold-paper/">Metallic
                                                            Colours</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/frozen-quartz-paper/">Pearlescent
                                                            Finish</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-opaque-paper/">Blockout/Cover-Up</a>
                                                    </li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-rolls/brown-parcel-paper/all/">Brown
                                                        Parcel Paper</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/brown-parcel-paper/">Brown
                                                            Parcel Paper</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-rolls/luxury-cream-paper/all/">Luxury
                                                        Paper</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/luxury-cream-paper/">Matt
                                                            Colours</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-rolls/direct-thermal-matt-white-polypropylene/all/">Direct
                                                        Thermal Polypropylene</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/direct-thermal-matt-white-polypropylene?code=TWPR">Matt
                                                            White</a></li>
                                                </ul>
                                                <!--<label>PVC</label>
                        <ul class="nav">
                          <li><a href="<?= base_url() ?>material-on-rolls/matt-white-pvc/">Security Materials</a></li>
                        </ul>-->
                                                <label><a href="<?= base_url() ?>material-on-rolls/matt-black-vinyl/all/">Vinyl</a></label>
                                                <ul class="nav">
                                                    <li><a href="<?= base_url() ?>material-on-rolls/matt-black-vinyl/">Matt
                                                            Colours</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label><a href="<?= base_url() ?>material-on-rolls/matt-white-polypropylene/all/">Polypropylene</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-polypropylene/">Matt
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/gloss-white-polypropylene/">Gloss
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/gloss-white-inkjet-polypropylene/">Gloss
                                                            White Inkjet</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/gloss-clear-polypropylene/">Gloss
                                                            Clear</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/coated-bright-silver-polypropylene/">Metallic
                                                            Colours</a></li>
                                                </ul>

                                                <!--  <label><a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene/all/?code=PETH">Polyethylene <small style="font-size:8px;">(Temperature Resistant) </small> </a></label>
                        <ul class="nav">
                          <li><a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene?code=PETC">Cryogenic (-196°C)</a></li>
                          <li><a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene?code=PETH">Heat Resistant (121°C) </a></li>
                        </ul>-->

                                                <label><a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene/all/">Polyethylene
                                                        <small>(Standard)</small> </a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene/">Matt
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene?code=PEOP">Matt
                                                            White – Block out/Cover-Up</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>material-on-rolls/economy-white-direct-thermal-paper/all/">Direct
                                                        Thermal Paper</a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/economy-white-direct-thermal-paper/">Matt
                                                            White</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/economy-direct-thermal-yellow-paper/">Matt
                                                            Colours</a></li>
                                                </ul>
                                                <label><a href="<?= base_url() ?>specialist-label-material/">Specialist
                                                        Materials</small> </a></label>
                                                <ul class="nav">
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene?code=PETC">Cryogenic
                                                            (-196°C)</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene?code=PETH">Heat
                                                            Resistant (121°C) </a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-aluminium-back-coated-paper/">Aluminium
                                                            Back Coated</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/gloss-white-inkjet-paper/">Gloss
                                                            White Inkjet</a></li>
                                                    <li>
                                                        <a href="<?= base_url() ?>material-on-rolls/matt-white-dissolving-paper/">Matt
                                                            White Dissolving - Paper</a></li>
                                                    <li><a href="<?= base_url() ?>specialist-label-material/">View
                                                            All</a></li>
                                                </ul>
                                                <label>Samples</label>
                                                <ul class="nav">
                                                    <li><a href="<?= base_url() ?>sample-request/rolls/">Request Free
                                                            Material Samples</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Adhesive Labels -->
                            <div role="tabpanel" class="tab-pane adhesive_tab" id="tc-3">
                                <div class="col-sm-12" nav-item-pos="ni-1-3-1">
                                    <!-- Permanent -->
                                    <div class="row">
                                        <div class="plain_labels_section">
                                            <div class="col-md-6 col-sm-6 col-xs-12"><img alt="Sheets"
                                                                                          src="<?= Assets ?>images/icon-sheet.png"
                                                                                          class="img-responsive roll-icon-nav"/>
                                                <h5>Labels on Sheet</h5>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-sheets/permanent/">Permanent </a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip" data-title="A description of a general purpose permanent adhesive group and although not all exactly the same are all basically an acrylic based  pressure sensitive adhesive. Characterised by high initial tack and excellent adhesion (dependant upon substrate) and good low temperature performance on a wide variety of flat and curved surfaces e.g. card, cardboard, glass, paper, plastic, textiles (close woven) and wood (not rough sawn).
"></i></label>
                                                    <ul class="nav">
                                                        <li><span>Uncoated Paper e.g. Matt</span></li>
                                                        <li><span>Coated Paper e.g. Semi-gloss, Gloss</span></li>
                                                        <li><span>Recycled Paper</span></li>
                                                        <li><span>Polyester</span></li>
                                                        <li><span>Polyethylene</span></li>
                                                        <li><span>Polypropylene</span></li>
                                                        <li><span>Vinyl</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-sheets/freezer/">Freezer </a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="A general purpose acrylic based  pressure sensitive permanent adhesive. With a usage temperature of down to -40°C. The commercial uses for this type of label are for cold storage and frozen/chilled distribution. Also used in other temperature controlled environments and excellent for domestic use in home freezing."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Uncoated Paper e.g. Matt</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-sheets/cryogenic/">Cryogenic </a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="A specialist purpose permanent, acrylic based, pressure sensitive, waterborne adhesive (RP Cryo). This adhesive is designed to perform in cryopreservation storage conditions down to -196°C. The adhesive is recommended for identification labelling on Polypropylene (PP) cryogenic vials, tubes and storage boxes (cardboard and PP). Label materials based on RP Cryo retain their adhesion on PP vials, tubes and storage boxes over long periods of time, in both vapour and liquid phase in liquid Nitrogen storage tanks. This adhesive withstands multiple freeze-thaw cycles (reconstitution can be done, for example in ice water, or a warm water bath; samples can later be returned to the liquid Nitrogen storage tank)."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Polyethylene</span></li>
                                                    </ul>
                                                    <label>Samples <i class="fa fa-info-circle" data-toggle="tooltip"
                                                                      data-title="Material samples are available should you wish to test the suitability of a label for your interned application and can be ordered FOC from the displayed material options."></i></label>
                                                    <ul class="nav">
                                                        <li><a href="<?= base_url() ?>sample-request/sheets/">Request
                                                                Free Material Samples</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-sheets/super-permanent/">Super
                                                            Permanent</a> <i class="fa fa-info-circle"
                                                                             data-toggle="tooltip"
                                                                             data-title="A stronger general purpose acrylic based  pressure sensitive adhesive. With a higher initial tack, excellent adhesion for difficult surfaces such as wood, some cardboards and plastics such as HDPE, PP, PET and PVC and good low temperature performance on a wide variety of substrates, including smooth and slightly rough, or very curved and angled surfaces."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Uncoated Paper e.g. Matt</span></li>
                                                        <li><span>Aluminium Backed Paper</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-sheets/peelable/">Peelable</a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="A specially formulated removable acrylic based pressure sensitive adhesive. Featuring good tack and adhesion performance in combination with clean removability. The adhesive has good UV resistance and relatively long term removability, it allows application at a wide temperature range and retains its removability properties at fairly low temperatures. The adhesive has been primarily designed for the purpose of labelling high value products, removable after purchase, but has numerous other applications."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Uncoated Paper e.g. Matt</span></li>
                                                        <li><span>Coated Paper e.g. Semi-gloss, Gloss</span></li>
                                                        <li><span>Polyester</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-sheets/heat-resistant/">Heat
                                                            Resistant</a> <i class="fa fa-info-circle"
                                                                             data-toggle="tooltip"
                                                                             data-title="A specialist purpose permanent, acrylic based, pressure sensitive, waterborne adhesive. This adhesive is designed to provide good performance in high temperature applications, withstanding temperatures of up to 121°C for intermittent periods of time."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Polyethylene</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-sheets/high-tack/">High
                                                            Tack</a> <i class="fa fa-info-circle" data-toggle="tooltip"
                                                                        data-title="A permanent modified aqueous dispersion with a high initial "
                                                                        grab" and excellent resistance to UV-light and
                                                        ageing. Because this material is so durable and strong it is
                                                        ideal as a block-out material for information on external
                                                        signage that is no longer applicable and covering holes on
                                                        reusable gun targets etc. It also has internal usage
                                                        applications in distribution and fulfilment centres. Because of
                                                        the nature of the face stock material it is not possible to over
                                                        print using digital printers."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Vinyl</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12"><img alt="Rolls"
                                                                                          src="<?= Assets ?>images/icon-roll.png"
                                                                                          class="img-responsive roll-icon-nav"/>
                                                <h5>Labels on Rolls</h5>
                                                <div class="col-sm-6 col-sm-6 col-xs-6">
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/permanent/">Permanent</a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="A description of a general purpose permanent adhesive group and although not all exactly the same are all basically an acrylic based  pressure sensitive adhesive. Characterised by high initial tack and excellent adhesion (dependant upon substrate) and good low temperature performance on a wide variety of flat and curved surfaces e.g. card, cardboard, glass, paper, plastic, textiles (close woven) and wood (not rough sawn)."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Direct Thermal Paper</span></li>
                                                        <li><span>Thermal Transfer Paper</span></li>
                                                        <li><span>Uncoated Paper e.g. Matt</span></li>
                                                        <li><span>Coated Paper e.g. Semi-gloss, Gloss</span></li>
                                                        <li><span>Polyester</span></li>
                                                        <li><span>Polyethylene</span></li>
                                                        <li><span>Polypropylene</span></li>
                                                        <li><span>Vinyl</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/heat-resistant/">Heat
                                                            Resistant</a> <i class="fa fa-info-circle"
                                                                             data-toggle="tooltip"
                                                                             data-title="A specialist purpose permanent, acrylic based, pressure sensitive, waterborne adhesive. This adhesive is designed to provide good performance in high temperature applications, withstanding temperatures of up to 121°C for intermittent periods of time."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Polyethylene</span></li>
                                                    </ul>
                                                    <label>Samples <i class="fa fa-info-circle" data-toggle="tooltip"
                                                                      data-title="Material samples are available should you wish to test the suitability of a label for your interned application and can be ordered FOC from the displayed material options."></i></label>
                                                    <ul class="nav">
                                                        <li><a href="<?= base_url() ?>sample-request/rolls/">Request
                                                                Free Material Samples</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 col-sm-6 col-xs-6">
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/super-permanent/">Super
                                                            Permanent</a> <i class="fa fa-info-circle"
                                                                             data-toggle="tooltip"
                                                                             data-title="A stronger general purpose acrylic based  pressure sensitive adhesive. With a higher initial tack, excellent adhesion for difficult surfaces such as wood, some cardboards and plastics such as HDPE, PP, PET and PVC and good low temperature performance on a wide variety of substrates, including smooth and slightly rough, or very curved and angled surfaces."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Uncoated Paper e.g. Matt</span></li>
                                                        <li><span>Aluminium Backed Paper</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/freezer/">Freezer </a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="A general purpose acrylic based  pressure sensitive permanent adhesive. With a usage temperature of down to -40°C. The commercial uses for this type of label are for cold storage and frozen/chilled distribution. Also used in other temperature controlled environments and excellent for domestic use in home freezing."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Semi Gloss Paper</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/peelable/">Peelable</a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="A specially formulated removable acrylic based pressure sensitive adhesive. Featuring good tack and adhesion performance in combination with clean removability. The adhesive has good UV resistance and relatively long term removability, it allows application at a wide temperature range and retains its removability properties at fairly low temperatures. The adhesive has been primarily designed for the purpose of labelling high value products, removable after purchase, but has numerous other applications."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Direct Thermal Paper</span></li>
                                                        <li><span>Polypropylene</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/resealable/">Re-sealable</a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="This is a clear removable, pressure sensitive acrylic based adhesive exhibiting durability, weatherability and UV resistance. The adhesive displays good moisture and solvent resistance, clean removability and a smooth, quite peel from Polyester (PET) and Polypropylene (PP) substrates. This adhesive is suitable for use across a broad range of "
                                                           wet wipe" applications and is also suitable for many dry pack
                                                        re-closure applications."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Polypropylene</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/cryogenic/">Cryogenic</a>
                                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                                           data-title="A specialist purpose permanent, acrylic based, pressure sensitive, waterborne adhesive (RP Cryo). This adhesive is designed to perform in cryopreservation storage conditions down to -196°C. The adhesive is recommended for identification labelling on Polypropylene (PP) cryogenic vials, tubes and storage boxes (cardboard and PP). Label materials based on RP Cryo retain their adhesion on PP vials, tubes and storage boxes over long periods of time, in both vapour and liquid phase in liquid Nitrogen storage tanks. This adhesive withstands multiple freeze-thaw cycles (reconstitution can be done, for example in ice water, or a warm water bath; samples can later be returned to the liquid Nitrogen storage tank)."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Polyethylene</span></li>
                                                    </ul>
                                                    <label><a href="<?= base_url() ?>labels-by-adhesive-rolls/high-tack/">High
                                                            Tack</a> <i class="fa fa-info-circle" data-toggle="tooltip"
                                                                        data-title="A permanent modified aqueous dispersion with a high initial "
                                                                        grab" and excellent resistance to UV-light and
                                                        ageing. Because this material is so durable and strong it is
                                                        ideal as a block-out material for information on external
                                                        signage that is no longer applicable and covering holes on
                                                        reusable gun targets etc. It also has internal usage
                                                        applications in distribution and fulfilment centres. Because of
                                                        the nature of the face stock material it is not possible to over
                                                        print using digital printers."></i></label>
                                                    <ul class="nav">
                                                        <li><span>Vinyl</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  Printer Compatibility Labels OLD -->
                            <div role="tabpanel" class="tab-pane printer_tab" id="tc-4">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="tabs-left">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#b" data-toggle="tab">Laser Printers -
                                                        Sheets</a></li>
                                                <li><a href="#a" data-toggle="tab">Inkjet Printers - Sheets</a></li>
                                                <li><a href="#g" data-toggle="tab">Laser Printers - Rolls</a></li>
                                                <li><a href="#d" data-toggle="tab">Inkjet Printers - Rolls</a></li>
                                                <li><a href="#c" data-toggle="tab">Direct Thermal Printers - Rolls</a>
                                                </li>
                                                <li><a href="#e" data-toggle="tab">Thermal Transfer Printers - Rolls</a>
                                                </li>
                                                <li><a href="#f" data-toggle="tab">Search by Thermal Printer Model</a>
                                                </li>
                                            </ul>
                                            <!-- /tab-content -->
                                        </div>
                                        <!-- /tabbable -->
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="tab-content">
                                            <div class="tab-pane Inkjet_Printers_Sheets" id="a">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-12">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-paper/">Matt
                                                                    White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene/">Matt
                                                                    White - Polyethylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene/?code=PETH">Temperature
                                                                    Resistant - Polyethylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-pvc/">Security
                                                                    Materials - PVC</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/gloss-white-inkjet-paper/">Gloss
                                                                    White - Inkjet Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/gloss-white-inkjet-polypropylene/">Gloss
                                                                    White - Inkjet Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-opaque-paper/">Blockout/Cover-Up
                                                                    - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/gloss-clear-inkjet-polypropylene/?code=PCIP">Clear
                                                                    - Inkjet Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/luxury-cream-paper/">Matt
                                                                    Colours - Luxury Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-blue-paper/">Matt
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/fluorescent-green-paper/">Fluorescent
                                                                    Colours - Paper</a></li>
                                                            <!-- <li><a href="<?= base_url() ?>material-on-sheets/matt-white-dissolving-paper/">Matt White Dissolving - Paper</a></li>-->

                                                            <li class="request-free-sample"><a
                                                                        href="<?= base_url() ?>sample-request/sheets/">Request
                                                                    Free Material Samples</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane active Laser_Printers_Sheets" id="b">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-paper/">Matt
                                                                    White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-aluminium-back-coated-paper/">Aluminium
                                                                    Back-Coated - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene/?code=PETH">Temperature
                                                                    Resistant - Polyethylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-pvc/">Security
                                                                    Materials - PVC</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-polyester/">Matt
                                                                    White - Polyester</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-polyethylene/">Matt
                                                                    White - Polyethylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/semi-gloss-white-paper/">Semi
                                                                    Gloss White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/gloss-yellow-paper/">Gloss
                                                                    Yellow - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/gloss-white-inkjet-paper/">Gloss
                                                                    White - Inkjet Paper</a></li>
                                                            <!--<li><a href="<?= base_url() ?>material-on-sheets/gloss-white-inkjet-polypropylene/">Gloss White - Inkjet Polypropylene</a></li>-->
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/gloss-white-polyester/">Gloss
                                                                    White - Polyester</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/high-gloss-white-paper/">High
                                                                    Gloss White - Paper</a></li>
                                                            <!-- <li><a href="<?= base_url() ?>material-on-sheets/matt-white-dissolving-paper/">Matt White Dissolving - Paper</a></li>-->

                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/frozen-quartz-paper/">Pearlescent
                                                                    Finish - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-white-opaque-paper/">Blockout/Cover-Up
                                                                    - Paper</a></li>
                                                            <!--<li><a href="<?= base_url() ?>material-on-sheets/gloss-clear-inkjet-polypropylene/?code=PCIP">Clear - Inkjet Polypropylene</a></li>-->
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/gloss-clear-polyester/">Clear
                                                                    - Polyester</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-gold-paper/">Metallic
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/bright-silver-polyester/">Metallic
                                                                    Colours - Polyester</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/brown-parcel-paper/">Matt
                                                                    Colours - Luxury Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-blue-paper/">Matt
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/matt-orange-polyester/">Matt
                                                                    Colours - Polyester</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-sheets/fluorescent-green-paper/">Fluorescent
                                                                    Colours - Paper</a></li>
                                                            <li class="request-free-sample"><a
                                                                        href="<?= base_url() ?>sample-request/sheets/">Request
                                                                    Free Material Samples</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane Direct_Thermal_Printers_Rolls" id="c">
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-12 col-sm-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/economy-white-direct-thermal-paper/">Matt
                                                                    White - Direct Thermal Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/direct-thermal-matt-white-polypropylene/">Matt
                                                                    White - Direct Thermal Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/economy-direct-thermal-yellow-paper/">Matt
                                                                    Colours - Direct Thermal Paper</a></li>
                                                            <li class="request-free-sample"><a
                                                                        href="<?= base_url() ?>sample-request/rolls/">Request
                                                                    Free Material Samples</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-xs-6 col-sm-6 hidden-xs"><img
                                                                alt="Barcode Printer"
                                                                src="<?= Assets ?>images/header/barcode-printer.jpg"
                                                                class="img-responsive"/></div>
                                                </div>
                                            </div>
                                            <div class="tab-pane Inkjet_Printers_Rolls" id="d">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-12 col-sm-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-paper/">Matt
                                                                    White - Paper</a></li>
                                                            <!--<li><a href="<?= base_url() ?>material-on-rolls/matt-white-aluminium-back-coated-paper/">Aluminium Back-Coated - Paper</a></li><li><a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene/?code=PETC">Temperature Resistant - Polyethylene</a></li>-->
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-white-inkjet-paper/">Gloss
                                                                    White - Inkjet Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-white-inkjet-polypropylene/">Gloss
                                                                    White Inkjet - Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-opaque-paper/">Blockout/Cover-Up
                                                                    - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-yellow-paper/">Matt
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/luxury-sand-paper/">Matt
                                                                    Colours - Luxury Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/fluorescent-green-paper/">Fluorescent
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-dissolving-paper/">Matt
                                                                    White Dissolving - Paper</a></li>
                                                            <li class="request-free-sample"><a
                                                                        href="<?= base_url() ?>sample-request/rolls/">Request
                                                                    Free Material Samples</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12 col-sm-6">
                                                        <a href="<?= base_url() ?>roll-labels/"><img
                                                                    src="<?= Assets ?>images/Menu-Big-Banner.jpg"
                                                                    style="float:right;"/></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane Thermal_Transfer_Printers_Rolls" id="e">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-paper/">Matt
                                                                    White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-aluminium-back-coated-paper/">Aluminium
                                                                    Back-Coated - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene/?code=PETH">Temperature
                                                                    Resistant - Polyethylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene/?code=PEOP">Matt
                                                                    White - Polyethylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/economy-white-direct-thermal-paper/">Matt
                                                                    White - Direct Thermal Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-polypropylene/">Matt
                                                                    White - Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/direct-thermal-matt-white-polypropylene/">Matt
                                                                    White - Direct Thermal Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/semi-gloss-white-paper/">Semi
                                                                    Gloss White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-white-polypropylene/">Gloss
                                                                    White - Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/high-gloss-white-paper/">High
                                                                    Gloss White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/frozen-quartz-paper/">Pearlescent
                                                                    Finish - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-opaque-paper/">Blockout/Cover-Up
                                                                    - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-clear-polypropylene/">Clear
                                                                    - Polypropylene</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-gold-paper/">Metallic
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/coated-bright-silver-polypropylene/">Metallic
                                                                    Colours - Polypropylene</a></li>
                                                            <!-- <li><a href="<?= base_url() ?>material-on-rolls/matt-yellow-paper/">Matt Colours - Paper</a></li>-->
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/economy-direct-thermal-yellow-paper/">Matt
                                                                    Colours - Direct Thermal Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/brown-parcel-paper/">Matt
                                                                    Colours - Luxury Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/fluorescent-green-paper/">Fluorescent
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-dissolving-paper/">Matt
                                                                    White Dissolving - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-fabric-friendly-paper/">Fabric
                                                                    Friendly - Paper</a></li>
                                                            <li class="request-free-sample"><a
                                                                        href="<?= base_url() ?>sample-request/rolls/">Request
                                                                    Free Material Samples</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane Laser_Printers_Rolls" id="g">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-paper/">Matt
                                                                    White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-aluminium-back-coated-paper/">Aluminium
                                                                    Back-Coated - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-polyethylene/?code=PETC">Temperature
                                                                    Resistant - Polyethylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-pvc/">Security
                                                                    Materials - PVC</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-polypropylene/">Matt
                                                                    White - Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/semi-gloss-white-paper/">Semi
                                                                    Gloss White - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-white-inkjet-paper/?code=GWIP">Gloss
                                                                    White - Inkjet Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-white-polypropylene/?code=PGWP">Gloss
                                                                    White - Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-white-inkjet-polypropylene/">Gloss
                                                                    White - Inkjet Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/high-gloss-white-paper/">High
                                                                    Gloss White - Paper</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/frozen-quartz-paper/">Pearlescent
                                                                    Finish - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-white-opaque-paper/?code=MOP">Blockout/Cover-Up
                                                                    - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/gloss-clear-polypropylene/">Clear
                                                                    - Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-gold-paper/">Metallic
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/coated-bright-silver-polypropylene/">Metallic
                                                                    Colours - Polypropylene</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/matt-yellow-paper/">Matt
                                                                    Colours - Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/brown-parcel-paper/">Matt
                                                                    Colours - Luxury Paper</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>material-on-rolls/fluorescent-green-paper/">Fluorescent
                                                                    Colours - Paper</a></li>
                                                            <li class="request-free-sample"><a
                                                                        href="<?= base_url() ?>sample-request/rolls/">Request
                                                                    Free Material Samples</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane Search_By_Printer_Model" id="f">
                                                <div class="row">
                                                    <div class="col-md-3 col-xs-4">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a6">AMT
                                                                    Datasouth</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a1">Argox</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a7">Avery
                                                                    Dennison</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a2">Axiohm</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a3">Bixolon</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a4">Brady</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a8">Brother</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a5">Cab</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a9">Citizen</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a10">Cognitive</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a11">Custom</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a12">Datamax
                                                                    - O'Neil</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a14">Epson</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a15">Fujitsu</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a16">GoDEX</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a17">IBM</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a18">Intermec</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a19">Ithaca</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a21">Logic-Controls</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a22">LogiJet</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a26">Postek</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a28">Primera</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a30">Printronix</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a33">SATO</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-5 col-xs-4">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a34">Source
                                                                    Technologies</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a35">Star
                                                                    Micronics</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a36">Tally
                                                                    Dascom</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a37">THARO</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a38">Toshiba
                                                                    TEC</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a39">TSC</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a40">Unitech</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a41">VIP
                                                                    Colour</a></li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a42">Wasp</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url() ?>thermal-printer-roll-labels/?make=a43">Zebra</a>
                                                            </li>
                                                            <li><a href="<?= base_url() ?>thermal-printer-roll-labels/">See
                                                                    all Thermal Printer Models</a></li>
                                                            <li class="request-free-sample"><a
                                                                        href="<?= base_url() ?>sample-request/rolls/">Request
                                                                    Free Material Samples</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Printed Labels -->
                <li class="dropdown mega-dropdown"><a href="<?= base_url() ?>printed-labels/" class="dropdown-toggle"
                                                      data-toggle="dropdown"
                                                      data-url="<?= base_url() ?>printed-labels/">Printed Labels</a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5>Printed Labels</h5>
                                <ul class="nav">
                                    <li><a href="<?= base_url() ?>printed-labels/rectangle/">Rectangle <img
                                                    alt="Printed Rectangle Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/rect.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/square/">Square <img
                                                    alt="Printed Square Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/squre.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/circular/">Circle <img
                                                    alt="Printed Circle Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/circle.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/star/">Star <img
                                                    alt="Printed Star Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/star.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/heart/">Heart <img
                                                    alt="Printed Heart Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/heart.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/oval/">Oval <img
                                                    alt="Printed Oval Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/oval.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/irregular/">Irregular <img
                                                    alt="Printed Irregular Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/irr.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/triangle/">Triangle <img
                                                    alt="Printed Triangle Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/triangle.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/anti-tamper/">Tamper Evident<img
                                                    alt="Printed Tamper Evident Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/anti_temper.png"></a></li>
                                    <li><a href="<?= base_url() ?>printed-labels/perforated/">Perforated <img
                                                    alt="Printed Perforated Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/triple.png" width="22"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8">
                                <h6></h6>
                                <div class="ad-box">
                                    <div class="ad-bg ad-h310 label-printed">
                                        <div class="ad-content">
                                            <hgroup>
                                                <h4 class="blue">Printed Labels</h4>
                                                <h5 style="padding:0px; margin:0px;" class="d-blue">Search Options</h5>
                                            </hgroup>
                                            <p style=" margin:margin: 0 0 7px;"> To begin a search for printed label
                                                options simply select the label shape and enter to follow the easily
                                                navigable process. </p>
                                            <p style=" margin:margin: 0 0 7px;"> If you need assistance there is the
                                                Live Chat option on the screen, or you can call and speak with one of
                                                our customer care team. </p>
                                            <p style=" margin:margin: 0 0 7px;"><a
                                                        href="<?= base_url() ?>printed-labels/" class="btn orangeBg">SEARCH
                                                    SHAPE & SIZE <i class="fa fa-arrow-circle-right"></i> <br/>
                                                    <small style="font-size:9px;">Buy online to take advantage of the
                                                        half-price print offer. </small> </a></p>
                                        </div>
                                        <div class="ad-content" style="left: 288px;background: none;">
                                            <hgroup>
                                                <h4 class="blue" style="font-size:22px; color:#fd4913;">LOWEST ONLINE
                                                    <br>
                                                    PRICE GUARANTEE</h4>
                                            </hgroup>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--FREE LABEL DESIGN TEMPLATES-->

                <li class="dropdown mega-dropdown"><a href="<?= base_url() ?>free-label-design-templates/"
                                                      class="dropdown-toggle" data-toggle="dropdown"
                                                      data-url="<?= base_url() ?>free-label-design-templates/">Free
                        Label Design Templates</a>

                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="row thumb-nav">
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/jar-labels/jam">
                                    <div class=""><img alt="Construction Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/jam.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;">Jam <span>Jar Labels</span>
                                        </p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/jar-labels/honey">
                                    <div class=""><img alt="Educational Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/honey.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Honey
                                            <span>Jar Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/jar-labels/condiments-chutney">
                                    <div class=""><img alt="Electrical Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/condiments.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;">Condiment
                                            <span>Jar Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/jar-labels/pickles-sauces">
                                    <div class=""><img alt="Fire Safety Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/pickle.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Pickle &
                                            Sauces<span>Jar Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/jar-labels/candles">
                                    <div class=""><img alt="First Aid Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/candle.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Candle &
                                            Diffuser <span>Jar Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/bottle-labels/bathing-and-body-products-bottles">
                                    <div class=""><img alt="Food hygiene Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/bathing.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Bathing
                                            Products <span> Labels</span></p></div>
                                </a></div>

                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/bottle-labels/edible-oils">
                                    <div class=""><img alt="Construction Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/oil.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;">Edible
                                            Oils <span> Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/bottle-labels/sauces">
                                    <div class=""><img alt="Educational Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/sauces.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Sauces
                                            <span> Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a
                                        href="<?= base_url(); ?>free-label-design-templates/bottle-labels/vinegars">
                                    <div class=""><img alt="Electrical Labels" class="img-responsive"
                                                       src="<?= Assets ?>images/lba_new/Viengar.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Vinegars
                                            <span> Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/coffee-tea-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/coffee-tea">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="Fire Safety Labels" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/dired-item.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Coffee &
                                            Tea <span> Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-food-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-food">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="First Aid Labels" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/dried-food.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Dried
                                            Food <span> Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-herbs-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-herbs">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="Food hygiene Labels" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/dried-herbs.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;">Dried
                                            Herbs <span>Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-herbs-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/bakery-chocolates-confectionary">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="Bakery chocolates confectionary" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/bakery.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Bakery ,
                                            Chocolates & Confectionary <span>Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-herbs-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/bottle-labels/bottle-cosmetics">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="Bottle Cosmetics" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/cosmetics.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;">Cosmetics
                                            <span>Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-herbs-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/jar-labels/jar-cosmetics">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="Food hygiene Labels" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/cosmetics-ja.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Cosmetics
                                            <span> Jar Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-herbs-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/jar-labels/jar-sweets">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="Food hygiene Labels" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/sweets.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> Sweet
                                            <span> Jar Labels</span></p></div>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <!--<?= base_url(); ?>free-label-design-templates/bags-sachets-boxes/dried-herbs-->
                                <a
                                        href="<?= base_url(); ?>free-label-design-templates/secondary-promotional-labels">
                                    <div class="">
                                        <!--<span class="triangle-topleft"></span>
                                        <span class="triangle-topleft-text">Coming<br>Soon</span>-->
                                        <img alt="Food hygiene Labels" class="img-responsive"
                                             src="<?= Assets ?>images/lba_new/brief-6-nav2.png"></div>
                                    <div class="parent" style="display: table;height: 64px;width: 100%;">
                                        <p style="display: table-cell;vertical-align: middle;padding-top: 0;"> SECONDARY
                                            PROMOTIONAL<span> Labels</span></p></div>
                                </a></div>
                        </div>
                    </div>
                </li>

                <!-- Printed Labels -->
                <li class="dropdown mega-dropdown hidden-xs hidden-sm"><a href="<?= base_url() ?>custom-label-tool/"
                                                                          class="dropdown-toggle" data-toggle="dropdown"
                                                                          data-url="<?= base_url() ?>custom-label-tool/">Label
                        Designer</a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5>Label Designer</h5>
                                <ul class="nav">
                                    <li><a href="<?= base_url() ?>custom-label-tool/rectangle/">Rectangle <img
                                                    alt="Design Rectangle Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/rect.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/square/">Square <img
                                                    alt="Design Square Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/squre.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/circular/">Circle <img
                                                    alt="Design Circle Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/circle.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/star/">Star <img
                                                    alt="Design Star Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/star.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/heart/">Heart <img
                                                    alt="Design Heart Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/heart.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/oval/">Oval <img
                                                    alt="Design Oval Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/oval.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/irregular/">Irregular <img
                                                    alt="Design Irregular Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/irr.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/triangle/">Triangle <img
                                                    alt="Design Triangle Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/triangle.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/anti-tamper/">Tamper Evident <img
                                                    alt="Design Tamper Evident Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/anti_temper.png"></a></li>
                                    <li><a href="<?= base_url() ?>custom-label-tool/perforated/">Perforated <img
                                                    alt="Design Perforated Labels" class="pull-right"
                                                    src="<?= Assets ?>images/search_template/triple.png" width="22"></a>
                                    </li>
                                    <li class="blue"><a href="<?= base_url() ?>custom-label-tool/"><span>Start Label Design</span></a>
                                    </li>
                                    <li class="blue"><a href="<?= base_url() ?>users/user_projects/"><span>My Saved Designs</span></a>
                                    </li>
                                    <li class="blue"><a href="<?= base_url() ?>custom-label-tool-help/"><span><i
                                                        class="fa fa-question-circle "></i> Need Help</span></a></li>
                                </ul>
                            </div>
                            <div class="col-sm-8">
                                <h6></h6>
                                <div class="ad-box">
                                    <div class="ad-bg ad-h400 label-designer">
                                        <div class="ad-content">
                                            <p> If you have already used Label Designer and want to open a saved design,
                                                just click on My Saved Labels or to open and create a new label design
                                                click on Start Label Design. </p>
                                            <p> If starting a new design, select the label shape, dimensions, material
                                                and adhesive required using the Label Filter at the top of the
                                                page. </p>
                                            <p> There is a video tutorial and "Help" feature should you require
                                                assistance, or you can also use the Live Chat option on the screen. If
                                                you still have any unanswered questions you can also call and speak with
                                                one of our customer care team. </p>
                                            <p><a href="<?= base_url() ?>custom-label-tool/" class="btn  orangeBg">Start
                                                    Label Design <i class="fa fa-paint-brush"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Labels by Application-->
                <!--<li class="dropdown mega-dropdown"> <a href="<?= base_url() ?>labels-by-application/" class="dropdown-toggle" data-toggle="dropdown" data-url="<?= base_url() ?>labels-by-application/">Labels by Application</a>
          <div class="dropdown-menu mega-dropdown-menu">
            <div class="row thumb-nav">
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/construction-site-labels/">
                <div class="thumb-box"> <img alt="Construction Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-01.jpg" > </div>
                <p> Construction <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/educational-labels/">
                <div class="thumb-box"> <img alt="Educational Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-02.jpg" > </div>
                <p> Educational <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/electrical-labels/">
                <div class="thumb-box"> <img alt="Electrical Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-03.jpg" > </div>
                <p> Electrical <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/fire-safety-labels/">
                <div class="thumb-box"> <img alt="Fire Safety Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-04.jpg" > </div>
                <p> Fire Safety <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/first-aid-labels/">
                <div class="thumb-box"> <img alt="First Aid Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-05.jpg" > </div>
                <p> First Aid <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/food-hygiene-labels-and-signs/">
                <div class="thumb-box"> <img alt="Food hygiene Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-06.jpg" > </div>
                <p> Food hygiene <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/gas-labels/">
                <div class="thumb-box"> <img alt="Gas Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-07.jpg" > </div>
                <p> Gas <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/haz-chem-labels/">
                <div class="thumb-box"> <img alt="Haz Chem Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-08.jpg" > </div>
                <p> Haz Chem <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/hazard-and-warning-labels/">
                <div class="thumb-box"> <img alt="Hazard &amp; Warning Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-09.jpg" > </div>
                <p> Hazard &amp; Warning <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/home-moving-packs/">
                <div class="thumb-box"> <img alt="Home Moving Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-10.jpg" > </div>
                <p> Home Moving <span>Packs</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/hospital-and-nursing-labels/">
                <div class="thumb-box"> <img alt="ospital &amp; nursing Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-11.jpg" > </div>
                <p> Hospital &amp; nursing <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/mandatory-labels-and-signs/">
                <div class="thumb-box"> <img alt="Mandatory Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-12.jpg" > </div>
                <p> Mandatory <span>Labels</span> </p>
                </a> </div>
              <div class="visble-md">
                <div class="col-md-2"> <span class="sr-only">Visible Trick</span> </div>
              </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/packaging-labels/">
                <div class="thumb-box"> <img alt="Packaging Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-13.jpg" > </div>
                <p> Packaging <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/prohibition-labels/">
                <div class="thumb-box"> <img alt="Prohibition Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-14.jpg" > </div>
                <p> Prohibition <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/recycling-labels/">
                <div class="thumb-box"> <img alt="Recycling Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-15.jpg" > </div>
                <p> Recycling <span>Labels</span> </p>
                </a> </div>
              <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?= base_url() ?>labels-by-application/service-and-inspection-labels/">
                <div class="thumb-box"> <img alt="Service &amp; inspection Labels" class="img-responsive" src="<?= Assets ?>images/icon_aply-16.jpg" > </div>
                <p> Service &amp; inspection <span>Labels</span> </p>
                </a> </div>
            </div>
          </div>
        </li>-->
                <li class="dropdown mega-dropdown"><a href="<?= base_url() ?>templates/" class="dropdown-toggle"
                                                      data-toggle="dropdown" data-url="<?= base_url() ?>templates/">Search
                        Templates</a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="row thumb-nav">
                            <!-- Labels by Templates-->
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/rectangle/">
                                    <div class="thumb-box"><img alt="Rectangle Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-01.png"></div>
                                    <p> Rectangle <span><small>(
                  392
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/circular/">
                                    <div class="thumb-box"><img alt="Circle Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-02.png"></div>
                                    <p> Circle <span><small>(
                  47
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/square/">
                                    <div class="thumb-box"><img alt="Square Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-03.png"></div>
                                    <p> Square <span><small>(
                  25
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/oval/">
                                    <div class="thumb-box"><img alt="Oval Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-04.png"></div>
                                    <p> Oval <span><small>(
                 14
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/star/">
                                    <div class="thumb-box"><img alt="Star Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-05.png"></div>
                                    <p> Star <span><small>(
                 1
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/heart/">
                                    <div class="thumb-box"><img alt="Heart Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-06.png"></div>
                                    <p> Heart <span><small>(
                  8
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/irregular/">
                                    <div class="thumb-box"><img alt="Irregular Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-07.png"></div>
                                    <p> Irregular <span><small>(
                  25
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/triangle/">
                                    <div class="thumb-box"><img alt="Triangle Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-08.png"></div>
                                    <p> Triangle <span><small>(
                  3
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/anti-tamper/">
                                    <div class="thumb-box"><img alt="Tamper Evident Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-09.png"></div>
                                    <p> Tamper Evident <span><small>(
                  8
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>templates/perforated/">
                                    <div class="thumb-box"><img alt="Perforated Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-10.png"></div>
                                    <p> Perforated <span><small>(
                  4
                  Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>avery-sized-labels/">
                                    <div class="thumb-box"><img alt="Avery® Sized Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-11.png"></div>
                                    <p> Avery® Sized <span><small>(17 Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-2"><a href="<?= base_url() ?>customlabels.php/">
                                    <div class="thumb-box"><img alt="Custom Sized Templates" class="img-responsive"
                                                                src="<?= Assets ?>images/icon_shape-12.png"></div>
                                    <p> Custom Sized? <span><small>Design your own Label</small></span></p>
                                </a></div>
                        </div>
                    </div>
                </li>
                <!-- integrated labels nav-->
                <li class="dropdown mega-dropdown"><a href="<?= base_url() ?>integrated-labels/" class="dropdown-toggle"
                                                      data-toggle="dropdown"
                                                      data-url="<?= base_url() ?>integrated-labels/">Integrated
                        Labels</a>
                    <div class="dropdown-menu mega-dropdown-menu integrated_menu_dropdown">
                        <div class="row thumb-nav integrated-thumb-nav">
                            <!-- Labels by Templates-->
                            <div class="col-xs-6 col-sm-3 col-md-3"><a
                                        href="<?= base_url() ?>single-integrated-labels/">
                                    <div class="thumb-box"><img alt="Single Integrated Labels" class="img-responsive"
                                                                src="<?= Assets ?>images/single_integrated.png"></div>
                                    <p> Single Integrated Labels <span><small>(8 Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-3"><a
                                        href="<?= base_url() ?>double-integrated-labels/">
                                    <div class="thumb-box"><img alt="Double Integrated Labels" class="img-responsive"
                                                                src="<?= Assets ?>images/double_integrated.png"></div>
                                    <p> Double Integrated Labels <span><small>(4 Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-3"><a
                                        href="<?= base_url() ?>triple-integrated-labels/">
                                    <div class="thumb-box"><img alt="Triple Integrated Labels" class="img-responsive"
                                                                src="<?= Assets ?>images/tripple_integrated.png"></div>
                                    <p> Triple Integrated Labels <span><small>(2 Templates)</small></span></p>
                                </a></div>
                            <div class="col-xs-6 col-sm-3 col-md-3"><a data-toggle="tooltip-integrated"
                                                                       data-placement="bottom" class="laser_printer_div"
                                                                       title=""
                                                                       data-original-title="(A range of full A4 sheet labels with a removable section in the position indicated)"
                                                                       href="<?= base_url() ?>full-sheet-integrated-labels/">
                                    <div class="thumb-box"><img alt="Full Sheet Delivery Labels" class="img-responsive"
                                                                src="<?= Assets ?>images/full_integrated.png"></div>
                                    <p> Full Sheet Delivery Labels <i class="fa fa-question-circle"></i><span><small>(9 Templates)</small></span>
                                    </p>
                                </a><small></small></div>
                        </div>
                        <div class="m-t-b-10 row">
                            <div class="col-md-12 text-center"><a href="<?= base_url() ?>integrated-labels/"
                                                                  class="btn orange">See All Integrated Labels <i
                                            class="fa fa-arrow-circle-right"></i></a></div>
                        </div>
                        <div class="row compatible_list">
                            <div class="col-md-12">
                                <h4>Search By Software:</h4>
                            </div>
                            <div class="m-t-10 image-t-15">
                                <? foreach ($compatible_list as $row) { ?>
                                    <div class="col-xs-2 col-md-2 ">
                                        <div style="height:50px;" class=""><a rel="noindex"
                                                                              href="<?= base_url() ?>integrated-labels/<?= str_replace(" ", "-", strtolower($row->name)) ?>/">
                                                <img alt="Compatible with <?= $row->name ?>" width="auto" height="auto"
                                                     src="<?= Assets ?>images/icons/<?= $row->image ?>"
                                                     class="img-responsive"> </a></div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="promotion_menu"><a href="<?= base_url() ?>promotions/" class=""
                                              data-url="<?= base_url() ?>promotions/">Promotions</a></li>
                <!--<li class="dropdown mega-dropdown"> <a href="<?= base_url() ?>promotions/" class="dropdown-toggle" data-toggle="dropdown" data-url="<?= base_url() ?>promotions/">Promotions</a>
          <div class="dropdown-menu mega-dropdown-menu">
            <div class="row">
              <div class="col-sm-4">
                <div class="print-ads text-center"> <a href="<?= base_url() ?>promotions/" target="_blank"> <img class="img-responsive" src="<?= Assets ?>images/promotion_banner_01.png" ></a> </div>
              </div>
              <div class="col-sm-8">
                <div class="print-ads text-center"> <a href="<?= base_url() ?>promotions/" target="_blank"> <img class="img-responsive" src="<?= Assets ?>images/mkt_offer_ad_02en.jpg" > </a> </div>
              </div>
              <div class="col-sm-8">
                <div class="print-ads text-center"> <a href="<?= base_url() ?>printed-labels/" target="_blank"> <img class="img-responsive" src="<?= Assets ?>images/mkt_offer_ad_03en.jpg" > </a> </div>
              </div>
            </div>
          </div>
        </li>-->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
<div id="nav-overlay"></div>
<script>
    $(document).ready(function (e) {
        // $("[data-toggle=tooltip-integrated]").tooltip();
        var width = $(window).width();
        if (width >= 1200) {
            var myTimeout = counter = 0;
            $('nav.navbar').mouseenter(function (evt) {
                $('.popover').popover('destroy');
                myTimeout = setTimeout(function () {
                    counter = 1;
                    $("#nav-overlay").show();
                    $('nav.navbar').addClass("hover");
                    //var targetLi = evt.target.parentNode;
                    var q = document.querySelectorAll(":hover");
                    var targetLi = q[q.length - 1].parentNode;

                    $('.dropdown-menu', targetLi).not('.in .dropdown-menu').slideDown(300);
                    targetLi.classList.add("open");

                    $('li.dropdown').mouseenter(function (evt) {
                        if (counter == 1) {
                            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown(300);
                            $(this).addClass("open");
                            $(this).siblings("li").removeClass("open");
                        }
                    }).mouseleave(function () {
                        $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp(300);
                        $(this).removeClass("open");
                        $('.dropdown-menu', targetLi).not('.in .dropdown-menu').slideUp(300);
                    });
                }, 500);
            }).mouseleave(function () {
                counter = 0;
                $("#nav-overlay").hide();
                $('nav.navbar').removeClass("hover");
                $('.dropdown-menu', this).not('.in .dropdown-menu').slideUp(300);
                $("nav.navbar li.dropdown").removeClass("open");
                clearTimeout(myTimeout);
            });

            $(".dropdown-menu").hover(function (e) {
                    $(this).parents("li").addClass("hover");
                },
                function (e) {
                    $(this).parents("li").removeClass("hover");
                });

            $(document).on("click", ".nav > li > a.dropdown-toggle", function (e) {
                var url = $(this).attr("data-url");
                if (url != '') {
                    window.location = url;
                }
            });
        } else {
            $(document).on("click", ".nav_container .open a", function () {
                //return false;
                e.preventDefault();
            });
        }
    });
</script>