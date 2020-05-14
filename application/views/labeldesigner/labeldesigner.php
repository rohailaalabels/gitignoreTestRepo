<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
<link href="<?= Assets ?>labelfinder/css/labels-by-app.css" rel="stylesheet">
<link href="<?= Assets ?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<!-- new -->
<script type="text/javascript" src="<?= Assets ?>js/password_strengthen_plugin.js"></script>
<!-- new -->
<style>
    .circilar_top {
        left: 63px;
        position: absolute;
        top: 47px;
    }

    .finderNote2 .bg_filter {
        background-color: #17b1e3;
        border-radius: 100px;
        color: #fff;
        font-size: 36px;
        padding: 15px 20px;
    }

    .printer_tooltip .tooltip {
        width: 450px !important;
        background:
    }

    .temp-list .list {
        overflow: visible !important;
    }

    .printer_tooltip .tooltip-inner {
        text-align: justify;
        padding: 7px 7px;
        background: #fff8dc;
        color: #666;
        opacity: 1;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, .3);
    }

    .printer_tooltip .tooltip-arrow {
        border-top-color: #fff8dc !important;
    }

    .caption p {
        white-space: normal !important;
    }

    @media screen and (max-width: 768px) {
        .m-top-0 {
            margin-top: 0px !important;
        }

        #designer_intro {
            margin-top: 0% !important;
        }

        #ajax_finder_content {
            margin-top: 0% !important;
        }
    }

    #designer_intro {
        margin-top: 15%;
    }

    #ajax_finder_content {
        /*margin-top: 15%;*/
    }

    @media screen and (max-width: 1024px) {
        #designer_intro {
            margin-top: 25%;
        }

        #ajax_finder_content {
            margin-top: 25%;
        }
    }

    .loading-gif {
        margin: 30px auto !important;
        position: absolute;
        z-index: 2;
        text-align: center;
        left: 43%;
        top: 40%;
        background: rgba(255, 255, 255, 0.9) none repeat scroll 0 0;
        padding: 10px;
        border-radius: 5px;
        border: solid 1px #CCC;
    }

    .red_fonts_line {
        font-family: 'Pacifico', cursive, serif;
        font-size: 30px;
        color: #fd4913;
    }

    #overlay {
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 35;
        background: #fff;
        opacity: 0.5;
    }

    .lb_applications .modal-lg {
        width: 84%;
    }

    .lb_applications .modal-lg table.table-header-rotated {
        width: 80%;
    }

    .table-header-rotated tr:last-child td, .table-header-rotated tr:last-child th {
        border-bottom: 1px solid #dddddd;
    }

    .table-header-rotated td, .table-header-rotated th {
        padding: 3px !important;
        vertical-align: middle !important;
    }

    .table-header-rotated td.v-al-m, .table-header-rotated th.v-al-m {
        vertical-align: middle !important;
    }

    .table-header-rotated td {
        width: 40px;
        border-top: 1px solid #dddddd;
        border-left: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
        vertical-align: middle;
        text-align: center;
    }

    .table-header-rotated th.rotate-10 {
        min-width: 22px;
        max-width: 22px;
        position: relative;
        vertical-align: bottom;
        padding: 0px !important;
        font-size: 11px;
        line-height: 0.8;
    }

    .table-header-rotated th.rotate-10 > div {
        position: relative;
        top: 0px;
        left: 27px;
        height: 312px;
        -ms-transform: skew(-10deg, 0deg);
        -moz-transform: skew(-10deg, 0deg);
        -webkit-transform: skew(-10deg, 0deg);
        -o-transform: skew(-10deg, 0deg);
        transform: skew(-10deg, 0deg);
        overflow: hidden;
        border-left: 1px solid #dddddd;
        border-right: 0px solid #dddddd;
        border-top: 1px solid #dddddd;
    }

    .table-header-rotated th.rotate-10:nth-last-child(2) > div {
        border-right: 1px solid #dddddd;
    }

    .table-header-rotated th.rotate-10 span {
        -webkit-transform: rotate(-90deg);
        /* Firefox */
        -moz-transform: rotate(-90deg);
        /* IE */
        -ms-transform: rotate(-90deg);
        /* Opera */
        -o-transform: rotate(-90deg);
        /* Internet Explorer */
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=-9);
        position: absolute;
        bottom: 110px; /* 40 cos(45) = 28 with an additional 2px margin*/
        left: -103px; /*Because it looked good, but there is probably a mathematical link here as well*/
        display: inline-block;
    / / width: 100 %;
        width: 225px; /* 80 / cos(45) - 40 cos (45) = 85 where 80 is the height of the cell, 40 the width of the cell and 45 the transform angle*/
        text-align: left;
    / / white-space: nowrap; /*whether to display in one line or not*/
        font-weight: normal;
        letter-spacing: 1px;
        color: #006da4;
    }

    .table-header-rotated th.rotate-10 span small {
        color: #666;
    }

    .no-border {
        border-top: 0 !important;
        border-bottom: 0 !important;
        border-left: 0 !important;
        border-right: 0 !important;
    }

    .no-border-top {
        border-top: 0 !important;
    }

    .no-border-bottom {
        border-bottom: 0 !important;
    }

    .no-border-left {
        border-left: 0 !important;
    }

    .no-border-right {
        border-right: 0 !important;
    }

    .text-left {
        text-align: left !important;
    }

    .mat-lbaTd-left-border {
        border-left: 1px solid #dddddd;
    }

    .mat-lbaTd-nblue-text {
        color: #006da4;
    }

    .mat-lbaTd-sblue-text {
        color: #17b1e3;
    }

    .mat-lbaTd-org-text {
        color: #fd4913;
    }

    .mat-lba-check {
        height: 10px;
    }

    .font-12 {
        font-size: 12px !important;
        line-height: 14px !important;
    }

    .font-10 {
        font-size: 10px !important;
        line-height: 10px !important;
    }

    .scrollable-table table.table-header-rotated tr.even td, .scrollable-table table.table-header-rotated tr td.even, .scrollable-table table.table-header-rotated tr th.even, .scrollable-table table.table-header-rotated tr th .even {
        background: rgba(255, 255, 255, .5);
    }

    .scrollable-table table.table-header-rotated tr.even td:last-child {
        background: none;
    }

    .lb_applications .modal-content {
        /* background: url(../images/lb_applications-bg.jpg) no-repeat center bottom #fff;*/
        background-size: cover;
    }

    .lb_applications .modal-content {
        padding: 0 0 20px 0;
    }

    .lb_applications .scrollable-table {
        margin: 0 10px;
    }

    .lb_applications .modal-header {
        border-bottom: 0;
        padding: 10px !important;
        background: #17b1e3;
        color: #fff;
        border-radius: 6px 6px 0 0;
        margin: 1px 1px 10px 1px;
    }

    .lb_applications .modal-header h4 {
        font-weight: bold;
    }

    .lb_applications .modal-header button span {
        color: #fff;
    }

    .lb_applications .modal-footer {
        display: none;
    }

    .template_search {
        padding-right: 0 !important;
        margin-bottom: 10px !important;
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

    .m-b-10-input {
        margin-bottom: 10px;
    }

    .password-validation-span-text {
        font-size: 11px;
    }

    .password-validation-span-text-alert {
        font-size: 11px;
        color: #8a1f11;
    }
</style>

<link href="" rel="stylesheet">


<!--<div id="aa_loader" class="white-screen" style=" display:none;" >



  <div class="loading-gif text-center" style="top:100%; z-index:150000;">



  		<img onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image" style="width:139px; height:29px; ">



  </div>



</div>-->


<div id="aa_loader" class="white-screen" style=" display:none;">

    <div class="loading-gif text-center" style="top:95%; z-index:150000;"><img onerror='imgError(this);'
                                                                               src="<?= Assets ?>images/loader.gif"
                                                                               class="image"
                                                                               style="width:160px; height:43px;"
                                                                               alt="AA Labels Loader"></div>

</div>

<div class="">

    <div class="container m-t-b-8 ">

        <div class="col-md-8">

            <ol class="breadcrumb  m0">

                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>

                <li class="active">Label Designer</li>

            </ol>

        </div>

    </div>

</div>

<div class="custom-label-tool_Bg">

    <div class="container">
        <div class="col-sm-1 col-md-2 col-lg-1"></div>
        
        
        
            <!-- AA48 STARTS -->
            <style>
                .read_more_less_style {
                    font-size: 16px;
                    font-weight: bold; 
                    cursor: pointer;
                } .showCompleteText {
                    height: auto !important;
                    overflow: none !important;
                } .showLessText {
                    height: 300px !important;
                    overflow: hidden !important;
                }
                .custom-label-tool_Bg p {
                    margin-top: 13px;
                }
            </style>
            <div class="col-md-10 col-lg-6 col-xs-12 col-sm-10">
                <div><img onerror='imgError(this);' class="img-responsive m-t-10 " src="<?= Assets ?>images/designer_app2.png" alt="Label Designer"/></div>
            </div>
            <div class="col-md-12 col-lg-5 m-t-30">
                <div style="height: 300px; overflow: hidden;" id="actionContainer">
                    <h1 style="font-size: 21px; font-weight: bold; margin: 0;">Create Custom Labels With Our Label Designer</h1>
                    <p class="hidden-sm hidden-md" style="margin-top: 10px;">
                        <p>It’s easy to create custom labels with our Label Designer, which will enable you to design your own professional looking labels in three easy steps.</p>
                        <p>Our Label Designer is an easy to use tool that offers a choice of over 31,000 label products, so we’re confident that our software will help you create a label that exceeds your expectations.</p>
                        <p>Select an entire label template sheet or choose individual labels, from standard shapes like square and rectangle to specialist shapes, such as anti-tamper or perforated labels.</p>
                        <p>It’s simple to add AA Labels’ stock assets, including design templates, backgrounds, images, graphics and text styles, plus you can export your designs into multiple sizes and label shapes.</p>
                        <p>Previous users of Label Designer can open a saved design by clicking on My Saved Labels or to open and create a new label design, click on Start Label Design.</p>
                        <p>If starting a new design, select the label shape, dimensions, material and adhesive required using the filters at the top of the page.</p>
                        <p>Alternatively, our video tutorial will show you how to get started or use our Live Chat option for additional help with choosing and designing your custom labels.</p>
                    </p>
                    <h2 style="font-size: 21px; font-weight: bold;margin: 0;">Get your Customised Labels Professionally Printed</h2>
                    <p class="hidden-sm hidden-md" style="margin-top: 10px;">
                        <p>Once you have completed the design process, get your customised labels <a href="<?php echo base_url()."printed-labels/";?>">professionally printed</a> by AA Labels. We stock a vast array of materials for our labels and our printers deliver the highest quality finish for your labels, ensuring a professional looking label for your project.</p> 
                        <p>We will also deliver them right to your door, ensuring your customised labels reach you in a timely manner.</p>
                        <p>Start your search today.</p>
                    </p>    
                </div>
                <p class="read_more_less_style read_more_less">Read More <i class="fa fa-angle-down"></i></p>

                <script>
                    var counterFlag = 0;
                    $( ".read_more_less" ).click(function() {
                        if(counterFlag == 0) {
                            $("#actionContainer").removeClass("showLessText");
                            $("#actionContainer").addClass("showCompleteText");
                            $(this).html('Read Less <i class="fa fa-angle-up"></i>');
                            counterFlag++;
                        } else {   
                            $("#actionContainer").removeClass("showCompleteText");
                            $("#actionContainer").addClass("showLessText");
                            $(this).html('Read More <i class="fa fa-angle-down"></i>');
                            counterFlag = 0;
                        }
                    });
                </script>
            </div>
            <!-- AA48 ENDS -->
            
        <div class="col-md-12 hidden-lg">

            <div class="designer-tool-tab-text text-center padding-15  ">
                To access this tool you need to browse this page from your laptop or desktop computer.
            </div>

        </div>

    </div>

</div>

<div class="bgGray hidden-sm hidden-md">

    <div class="container">

        <div class="clear15"></div>

        <?php $lable_clss = (isset($project_id) && $project_id == "designer") ? 'hide' : ''; ?>

        <?php $shape_url = $shape = $this->uri->segment(2); ?>

        <?php $designer = "yes";
        include_once(APPPATH . '/views/labelfinder/label_filters.php') ?>

        <div class="filter-margin"></div>

        <div class="clear10"></div>


        <!-------------------------------------------------------------->
        <!-------------------------------------------------------------->


        <div id="content-slider" class="lb-filer-slider"></div>


        <!-------------------------------------------------------------->
        <!-------------------------------------------------------------->


        <div class="row hide" id="flash_header">

            <div class="col-lg-12 col-md-12 col-sm-12 selected-product">

                <div class="spec">

                    <div class="col-lg-1 col-md-6 col-sm-12" id="header-image"><img onerror='imgError(this);' src=""
                                                                                    height="60"></div>

                    <div class="col-lg-5 col-md-6 col-sm-12">

                        <p style=""><strong id="H1" style="color:#17b1e3;vertical-align:middle;">2 Oval Labels per A4
                                sheet </strong> <br>

                            <span id="H2">Matt White Polyethylene - Permanent A4 Sheet Labels - 2 Oval - 80 mm x 235 mm</span>


                            <!--<span id="pop-adh">Permanent</span></p>-->


                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 text-center">

                        <p><strong>Label Size</strong> <br>

                            <span id="LabelSize"> 80 mm x 235 mm</span></p>

                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">

                        <p><strong>Item Code</strong> <br>

                            <span id="itemcode">AAG002PETP</span></p>

                    </div>

                </div>

            </div>

        </div>

        <input type="hidden" id="label_p_sheet"/>

        <div class="clear10"></div>

        <?php $add = '';
        if (isset($project_id) && $project_id != "") {
           
            $add = 'hide';
        } ?>


        <!-------------------------------------------------------------->


        <div id="designer_intro" class="row <?= $add ?>">

            <div class="col-md-4">

                <div class="panel text-center custom-label-tool_box">

                    <div class="text-center"><i class="fa fa-search icon_large_search" aria-hidden="true"></i></div>

                    <h2>1. LABEL FINDER</h2>

                    <p class="text-justify">This is where you now are in the design process. Start by using the filters
                        to select the shape and type of label that you require, by using the Label Finder tool
                        above. </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="panel text-center custom-label-tool_box">

                    <div class="text-center"><i class="fa fa-paint-brush icon_large_search" aria-hidden="true"></i>
                    </div>

                    <h2>2. LABEL DESIGNER</h2>

                    <p class="text-justify">After selecting the label required you can use the design tools to create
                        your label by opening a blank design, or a saved file. Design faster with presets, templates and
                        our asset library. </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="panel text-center custom-label-tool_box">

                    <div class="text-center"><i class="fa fa-print icon_large_search" aria-hidden="true"></i></div>

                    <h2>3. PREVIEW & PRINT</h2>

                    <p class="text-justify">Finally once your designed label is complete, you have the option to
                        preview, save and print and it's as simple as that! High quality, professional looking labels in
                        3 easy steps. </p>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 ">

                <div class="col-lg-12 p-t-10 ">

                    <div style="background:#E8F3FF; padding:10px;">

                          <!-- AA48 STARTS -->
                            <h2 class="red_fonts_line m-t-0">Want to learn more?</h2>
                        <!-- AA48 ENDS -->

                        <h2 class="BlueHeading m0"><strong>HOW TO USE LABEL FINDER & DESIGNER </strong></h2>

                        <p>Watch the short video that will take you through the label selection and creative design
                            process. Highlighting key features and tools to help you create professional looking, high
                            quality labels. </p>

                    </div>

                </div>

                <div class="col-lg-12 p-t-10">

                    <div align="center">

                        <video id="tutorial_video" width="100%" controls>

                            <source src="<?= Assets ?>Tutorial.mp4" type="video/mp4">

                            Your browser does not support HTML5 video.
                        </video>

                    </div>

                </div>

                <div class="panel blue-bottom paddin g-15 border-none">

                    <div class="clear"></div>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="panel border-none blue-bottom ds-intro">

                    <div class="col-lg-12 p-t-10 inner height-552"><img onerror='imgError(this);'
                                                                        src="<?= Assets ?>images/ds-intro-thumb.png"
                                                                        alt="Label Designer"/>

                        <p class="margin-t-60">Upon completion you can order your labels printed in high resolution 200
                            dpi. Alternatively purchase plain sheets of labels to print yourself, or just download and
                            save your label design for future use. </p>

                    </div>

                    <div class="clear"></div>

                </div>

            </div>

        </div>


        <!-------------------------------------------------------------->


        <input type="hidden" value="" id="scroller"/>

        <div class="clear"></div>

        <div id="ajax_finder_content" class="m-top-0" style="z-index:36;position:relative;">

            <?php if (isset($project_id) && $project_id != "" && $project_id != "shape") {


            if ($project_id == "designer") {


                $stu['temp_id'] = $temp_id;



                $stu['type'] = $project_id;


                ?>

                <script>$('#loaderdiv').show();</script>

            <?


            echo $this->load->view('labeldesigner/flash_panel', $stu);


            }else{


            $stu['temp_id'] = $project['CategoryID'];


            $stu['user_project_id'] = $project['ID'];


            $stu['is_user_project_selected'] = "true";


            $stu['user_project_name'] = $project['Name'];


            $stu['user_id'] = $project['UserID'];


            echo $this->load->view('labeldesigner/flash_panel', $stu); ?>

                <script type="text/javascript">


                    window.onload = function () {


                        $('#ajax_flash_content').html(' ');


                        filter_data('autoload', '');


                    };


                </script>

            <?php }
            } else if (isset($shape_url) and $shape_url != '')



            {


            if ($shape_url == "Anti-Tamper") {


                $shape_ucurl = 'anti-tamper';


            } else {


                $shape_ucurl = ucfirst($shape_url);


            }


            ?>

                <script type="text/javascript">


                    window.onload = function () {


                        $("#shape").val('<?=$shape_ucurl?>');


                        filter_data('shape', '');


                        $('.<?=$shape_url?>').addClass('active');


                        $('#shapes_box').find('.btn_shape').prop('disabled', false);


                    };


                </script>

            <?php


            }



            else



            {


            ?>

                <script>


                    window.onload = function () {


                        filter_data('autoload', '');


                    };


                </script>

                <?php


            } ?>

        </div>

        <div id="ajax_flash_content" style="z-index:36;position:relative;"></div>

        <div id="loaderdiv"
             style="width:994;height:726;z-index:2147483647;position:fixed;display:none;top:55%;left:43%">

            <div id="aa_loader" class="white-screen">

                <div class="loading-gif text-center" style="z-index:150000;"><img onerror='imgError(this);'
                                                                                  src="<?= Assets ?>images/loader.gif"
                                                                                  class="image"
                                                                                  style="width:160px; height:43px; "
                                                                                  alt="AA Labels Loader"></div>

            </div>

        </div>

        <div class="clear15"></div>


        <!--  <div id="ajax_finder_content"></div>-->


    </div>

</div>

<div class="whiteBg3">

    <div class="container text-center  ">

        <p style="padding-top:20px; "> <span class="cBlue f-20">

      <?= EMAIL ?>

      </span></p>

    </div>

</div>

<div class="center">

    <button id="video_modal" data-toggle="modal" data-target="#squarespaceModal"
            class="btn btn-primary center-block hide">Click Me
    </button>

</div>


<!-- line modal -->


<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <button id="video_pause" type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                <h3 class="modal-title" id="lineModalLabel">Video Tutorial How To Use Label Finder &amp; Designer</h3>

            </div>

            <div class="modal-body">


                <!-- content goes here -->


                <div class="col-lg-12">

                    <div align="center">

                        <video id="tutorial_video2" controls="" width="100%">

                            <source src="<?= Assets ?>Tutorial.mp4" type="video/mp4"></source>


                            <!--<source src="mov_bbb.ogg" type="video/ogg">-->


                            Your browser does not support HTML5 video.
                        </video>

                    </div>

                </div>

            </div>

            <div class="modal-foote ">

                <div class="btn-group btn-group-justified" role="group" aria-label="group button"><br/>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Layout modal -->


<div class="modal fade layout aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content no-padding">

            <div class="panel no-margin">

                <div class="panel-heading">

                    <h3 class="pull-left no-margin"><b>Label Layout</b></h3>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>

                    <div class="clear"></div>

                </div>

                <div class="panel-body">

                    <div id="ajax_layout_spec"></div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Layout modal -->


<div class="modal fade login-modal2 aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-sm">

        <div class="modal-content no-padding">

            <div class="panel no-margin">

                <div class="panel-heading">

                    <h3 class="pull-left no-margin"><b>Login Your Account</b></h3>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>

                    <div class="clear"></div>

                </div>

                <div class="panel-body">

                    <div id="login_register_msg">You must login to your account before proceeding.</div>

                    <div class="login_form">

                        <form class="labels-form" id="login_form" method="post" action="">

                            <input type="hidden" name="page" value="flash"/>

                            <div class="m-t-15">
                                <div style="display: none;" class="email-address-password-incorrect-alert">
                                    <span>Your user email ID or password is incorrect.</span>
                                </div>
                                <div>
                                    <label id="server_error" style=" display:none;" class="error"></label>
                                    <div class=" ">

                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" placeholder="Enter Email address" name="email" required
                                                   id="email">

                                        </label>

                                    </div>

                                    <div class=" ">

                                        <label class="input"> <i class="icon-append fa fa-lock"></i>

                                            <input type="password" placeholder="Enter Password" name="password" required
                                                   id="ajax_login_password">

                                        </label>

                                    </div>


                                    <!--                                  usman testing timer brute force attack-->
<!--                                    <div id="main_throttle_label_designer">-->
<!--                                        <div  class=" email-address-password-incorrect-alert">-->
<!--                                            <div class="row">-->
<!---->
<!--                                                <div class="counter col-sm-9" id="expire_time_del">-->
<!--                                                    <p class="font-12">Too many attempts. Try back after ...</p>-->
<!--                                                </div>-->
<!--                                                <div class="col-sm-3" id="clock_time_login_label_designer">-->
<!---->
<!---->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div id="main_throttle_label_designer">
                                        <div class=" email-address-password-incorrect-alert">
                                            <div class="row">

                                                <div class="_3hYZM">
                                                    <!--                                                    <svg viewBox="0 0 24 24" width="24" height="24" fill="currentcolor" role="img">-->
                                                    <!--                                                        <path d="M12,1 C5.925,1 1,5.925 1,12 C1,18.075 5.925,23 12,23 C18.075,23 23,18.075 23,12 C23,5.925 18.075,1 12,1 Z M12,0 C18.627,0 24,5.373 24,12 C24,18.627 18.627,24 12,24 C5.373,24 0,18.627 0,12 C0,5.373 5.373,0 12,0 Z M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M12.5,13 L11.5,13 L11.5,5 L12.5,5 L12.5,13 Z"></path></svg>-->
                                                    <b><h5 class="line-height-normal" data-test="message-title">  Please reset your password</h5></b>
                                                    <div data-test="message-body">
                                                        <p>
                                                            <span class="line-height-normal">This account is locked due to a number of failed attempts to sign in.</span>
                                                            <a href="<?= AURL ?>users/forgotpassword/" data-test="forgot-password-link">
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

                                    <!--                                    usman-->


                                    <div class="">

                                        <button style="margin:13px 0; " type="submit"
                                                class="btn orange text-uppercase btn-block">Sign in &nbsp; &nbsp; <i
                                                    class="fa fa-arrow-circle-right"></i></button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="register_form" style="display:none;">

                        <form class="labels-form " id="signup_form" method="post" action="">

                            <div class=" m-t-b-10 ">

                                <div>

                                    <div class="col-sm-12">

                                        <div class="col-md-12  ">

                                            <label class="input"><i class="icon-append fa fa-user"></i>

                                                <input type="text" name="firstname" id="firstname"
                                                       placeholder="First Name" class="required">

                                            </label>

                                        </div>

                                        <div class="col-md-12  ">

                                            <label class="input"><i class="icon-append fa fa-user"></i>

                                                <input type="text" id="lastname" name="lastname"
                                                       placeholder="Last  Name" class="required">

                                            </label>

                                        </div>

                                        <div class="col-sm-12  " >

                                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>

                                                <input type="email"
                                                       placeholder="Email Address  (Your email address will be your log in ID)"
                                                       name="email_reg" id="email_reg">

                                            </label>

                                        </div>
                                        <!-- new -->
                                        <div class="col-sm-12  m-b-10-input" id="pwd-container">

                                            <label class="input"><i class="showPassword icon-append fa fa-eye"></i>

                                                <input type="password" placeholder="Password" name="Password"
                                                       id="password">
                                                <input type="hidden" value="bottom" class="pop_position_class">

                                                <div class="pwstrength_viewport_progress" style="height: 20px;"></div>
                                            </label>

<!--                                            <span class="password-validation-span-text">Password must have between 8 and 20 characters, a lowercase letter, an uppercase letter, a number, one symbol i.e. ! &amp; * @ # ?</span>-->

                                        </div>

                                        <div class="col-sm-12  m-b-10-input">

                                            <label class="input"> <i class="showConfirmPassword icon-append fa fa-eye"></i>
                                                <input type="password" placeholder="Confirm Password " name="cpassword"
                                                       id="cpassword">
                                            </label>
<!--                                            <span class="password-validation-span-text-alert">Your password did not match</span>-->
                                        </div>
                                    </div>
                                    <!-- new -->
                                    <div class="col-sm-12">

                                        <div class=" col-sm-12   ">

                                            <button type="submit" id="activate-step-2"
                                                    class="btn orange text-uppercase btn-block"> Submit Now <i
                                                        class="fa fa-arrow-circle-right"></i></button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>


                    <!--end mat-sep-->


                </div>

                <div class="modal-footer">

                    <button type="button" class="btn blueBg forgot_password btn-xs">Forgot Password?</button>

                    <button type="button" class="btn orangeBg register_new btn-xs">Register a new account</button>

                    <button type="button" class="btn orangeBg login_new btn-xs" style="display:none;">Login To Account
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="modal fade material aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>

                <h4 id="myModalLabel" class="modal-title">AA Labels Technical Specification - <span
                            id="mat_code"></span> <a href="#myModalLabel" class="anchorjs-link"><span
                                class="anchorjs-icon"></span></a></h4>

            </div>

            <div class="">

                <div>

                    <div class="col-md-3 text-center"><img onerror='imgError(this);' id="material_popup_img" src=""
                                                           alt="<?= $catname ?>" title="<?= $catname ?>" width="46"
                                                           height="46" class="m-t-b-10 img-Sheet-material"></div>

                    <div class="col-md-9">

                        <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">

                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image"
                                        style="width:139px; height:29px; "></div>

                        </div>

                        <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>

                        <div class="bgGray p-l-r-10"><small> This summary materials specification for this adhesive
                                label is based on information obtained from the original material manufacturer and is
                                offered in good faith in accordance with AA Labels terms and conditions to determine
                                fitness for use as sheet labels (A4, A3 &amp; SRA3) produced by AA Labels. No guarantee
                                is offered or implied. It is the user's responsibility to fully asses and/or test the
                                label's material and determine its suitability for the label application intended.
                                Measurements and test results on this label's material are nominal. In accordance with a
                                policy of continuous improvement for label products the manufacturer and AA Labels
                                reserves the right to amend the specification without notice. A <a
                                        href="<?= base_url() ?>labels-materials/">full material specification</a> can be
                                found in the Label Materials section accessed via the Home Page <br>

                                Copyright&copy; AA labels 2015</small></div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

            </div>

        </div>

    </div>

</div>

<div class="modal fade lb_applications aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>

                <h4 id="myModalLabel1" class="modal-title"><span id="app_group_name"></span> - Label Applications <a
                            href="#myModalLabel1" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>

            </div>

            <div>

                <div id="lb_applications_loader" class="white-screen hidden-xs" style="display:none;">

                    <div class="loading-gif text-center" style="top:26%;left:29%;"><img onerror='imgError(this);'
                                                                                        src="<?= Assets ?>images/loader.gif"
                                                                                        class="image"
                                                                                        style="width:139px; height:29px; ">
                    </div>

                </div>

                <div class="scrollable-table ajax_application_chart table-responsive"></div>

            </div>

            <div class="modal-footer">

                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

            </div>

        </div>

    </div>

</div>

<script>


    var shape_list = [];



    <?php $shapes = $this->filter_model->generate_category_shapes();?>



    shape_list = <?=$shapes?>;


    var old_flag = 0;


    var default_min_h = 0;


    var default_max_h = 0;


    var default_min_w = 0;


    var default_max_w = 0;


    var request = null;


    var tutorial_video = document.getElementById("tutorial_video");


    function apply_hover_effect() {


        $('.thumbnail').hover(
            function () {


                $(this).find('.zoom').slideDown(250); //.fadeIn(250)


            },


            function () {


                $(this).find('.zoom').slideUp(250); //.fadeOut(205)


            }
        );


    }


    $(document).ready(function () {


        generate_shapes_html('A4');


        $(".show-h").click(function () {


            var display = $('.labels-filters-form').css('display');


            if (display == 'block') {


                $('.fnTop').show().slideDown("slow");


                $(".labels-filters-form").slideUp("slow");


                $("#content-slider").slideUp(100);


                change_text('VIEW FILTERS');


            } else {


                $('.fnTop').hide().slideUp("slow");


                $(".labels-filters-form").slideDown("slow");


                change_text('HIDE FILTERS');


                var checker = $("#ajax_flash_content").is(":empty");


                if (checker == false) {


                    var div_open = 'slide';


                    $("#content-slider").show();


                }


            }


        });


        function change_text(text) {


            /************* New Amendments ****************/


            if (text == 'HIDE FILTERS') {


                $('#ajax_material_sorting').animate({'marginTop': '200px'}, 1000);

                if (window.matchMedia('(max-width: 1024px)').matches) {
                    $('#ajax_finder_content').animate({'marginTop': '25%'}, 1000);
                } else {
                    $('#ajax_finder_content').animate({'marginTop': '15%'}, 1000);
                }


                $('#designer_intro').animate({'marginTop': '200px'}, 1000);


                $('#content-slider').animate({'marginTop': '200px'}, 1000);


            } else {


                $('#ajax_material_sorting').animate({'marginTop': '0px'}, 1000);


                $('#ajax_finder_content').animate({'marginTop': '0px'}, 1000);


                $('#designer_intro').animate({'marginTop': '1px'}, 1000);


                $('#content-slider').animate({'marginTop': '1px'}, 1000);


            }


            /**************************************/


            $('.show-h > span').html('<i aria-hidden="true" class="fa fa-bars"></i><div class="clea"></div> ' + text);


        }


        intialize_width_slider();


        intialize_height_slider();


        apply_hover_effect();







        <?php if(isset($category) and $category != ''){



        if (isset($diameter) and $diameter != '') {


            $width = $diameter;


        }?>







        $('#height_min').val(<?=$height?>);


        $('#width_min').val(<?=$width?>);


        $('#height_max').val(<?=$height?>);


        $('#width_max').val(<?=$width?>);


        filter_data('autoload', '<?=$color?>');



        <?php }else{?>



        // $('#newcategory').val('A4');


        // $('#newcategory').val();


        //filter_data('autoload', '');



        <?php }?>







        $('[data-toggle="tooltip"]').tooltip();


        $('[data-toggle="tooltip-product"]').tooltip();


    });


    $(document).on("click", ".btn_shape", function (e) {


        $('.btn_shape').removeClass('active');


        var shape = $(this).attr('data-val');


        ///shape = shape.replace(/btn_shape /g,'');


        $(this).addClass('active');


        $('#shape').val(shape);


        filter_data('shape', '');


    });


    $(document).on("change", "#newcategory", function (e) {


        $('.nlabelfilter').val('');


        var category = $('#newcategory').val();


        if (category.length < 1) {


            alert_box('Please select label category first ');


        } else {


            filter_data('category', '');


        }


    });


    $(document).on("change", ".nlabelfilter", function (e) {


        var trigger = $(this).attr('id');


        filter_data(trigger, '');


    });


    function filter_data(trigger, color) {

        var checker = $("#ajax_flash_content").is(":empty");

        if (trigger == "search") {

            var code = $("#filter_search_box").val();

        } else {

            var code = '';

        }

        if (checker == false) {

            var div_open = 'slide';

        } else {

            var div_open = 'list';

        }

        var material = $('#material').val();

        if (material != '') {
            $('#material').css('border-color', '');
        }

        $('#filter_search_box').css('border-color', '');

        if (trigger == 'category') {

            $('#color').val('');

            $('#height_min').val('');

            $('#height_max').val('');

            $('#shape').val('');

            $('#width_min').val('');

            $('#width_max').val('');

            $('#finish').val('');

            $('#material').val('');

            $('#adhesive').val('');

            $('#printer').val('');

            $('#cornerradius').val('');

            $('#width_box_text').html('Label Width <small>(mm)</small>');

            $('#height_box').css('visibility', '');

        }

        var shape = $('#shape').val();

        var category = $('#newcategory').val();

        if (color == '') {     //if method is not autoload

            var color = $('#color').val();

        }

        //var height = $('#width').val();

        var finish = $('#finish').val();

        var material = $('#material').val();

        var adhesive = $('#adhesive').val();

        var printer = $('#printer').val();

        var page = $('#page_type').val();

        var label_per_sheet_selected = $('#LabelPerDie').val();

        if (shape == 'Rectangle' || shape == 'Square') {

            $('#cornerradius_box').show();

        } else {

            $('#cornerradius_box').hide();

            $('#cornerradius').val('');

        }

        if (shape == 'Circular' || shape == 'Square') {

            if (shape == 'Circular') {

                $('#width_box_text').html('Label Diameter <small>(mm)</small>');

            } else {

                $('#width_box_text').html('Label Width <small>(mm)</small>');

            }

            $('#height_box').css('visibility', 'hidden');

        } else {

            $('#height_box').css('visibility', '');

            $('#width_box_text').html('Label Width <small>(mm)</small>');

        }

        var height_min = $('#height_min').val();

        var height_max = $('#height_max').val();

        var width_min = $('#width_min').val();

        var width_max = $('#width_max').val();

        if (trigger == 'shape') {

            height_min = '';

            height_max = '';

            width_min = '';

            width_max = '';

        }

        var cornerradius = $('#cornerradius').val();

        var opposite = 'false';

        if ($('#opposite_dimension').is(':checked')) {

            var opposite = 'true';

        }

        if (category.length < 1) {

            alert_box('Please select label category first ');

            //$('#shape').html('<option value="" >Label Shape</option>');

        } else {

            $element = $('.nlabelfilter');

            $element.prop('disabled', true);

            $element.attr('disabled', true);

            $('#aa_loader').show();

            $('#filter-form').css('opacity', '0.5');

            $('#home_finder').prop('disabled', true);

            disable_slider_option('disabled');

            if (request != null) {
                request.abort();
            }

            if (trigger != "search") {

                $("#filter_search_box").val('');

            }

            if (trigger != "LabelPerDie") {

                $("#LabelPerDie").val('');

                label_per_sheet_selected = '';

            }


            var request = $.ajax({

                url: base + 'filter/labelsfinderfields',

                type: "POST",

                async: "false",

                dataType: "html",

                cache: true,

                headers: {'Cache-Control': 'max-age=604800, public'},

                data: {

                    category: category,

                    shape: shape,

                    color: color,

                    finish: finish,

                    material: material,

                    adhesive: adhesive,

                    printer: printer,

                    width_min: width_min,

                    width_max: width_max,

                    height_min: height_min,

                    height_max: height_max,

                    cornerradius: cornerradius,

                    page: page,

                    trigger: trigger,

                    div_open: div_open,

                    opposite: opposite,

                    code: code,

                    label_per_sheet_selected: label_per_sheet_selected

                },

                success: function (data) {

                    if (!data == '') {

                        old_flag = 0;

                        $element.prop('disabled', false);

                        $element.attr('disabled', false);

                        data = $.parseJSON(data);

                        if (data.response == 'yes') {

                            $('.sizefound').show();

                            $('#view').val(data.view);

                            if (data.view == 'category') {

                                $('.viewtype').html(' Sizes ');

                            } else {

                                $('.viewtype').html(' Products ');

                            }

                            if (trigger == 'category') {

                                $('#shapes_box').html(data.shapes);

                            }

                            if (trigger == 'autoload' && div_open == 'list') {

                                $('#designer_intro').show();

                            } else {

                                $('#designer_intro').hide();

                                tutorial_video.pause();

                            }


                            if (trigger == 'autoload' && div_open == 'slide') {
                                $(".show-h").trigger("click");
                            }

                            if (trigger != 'autoload') {

                                $('#start_limit').val(0);

                                $('#label_counter').html(data.count_format);

                                $('#product_count').val(data.count);

                            }

                            $('#label_counter1').html(data.count_format);

                            if (trigger != 'autoload' && data.count > 0) {

                                if (div_open == 'slide') {

                                    $('#content-slider').html(data.html);

                                } else {

                                    $('#ajax_finder_content').html(data.html);

                                }

                            }

                            var pageurl = window.location.pathname;

                            if (trigger == 'autoload') {

                                generate_shapes_html('A4');

                            }

                            if (trigger == 'shape' || trigger == 'category' || trigger == 'autoload') {

                                if (shape == 'Circular' || shape == 'Square') {

                                    if (trigger != 'width') {

                                        if (data.min_width && data.max_width) {

                                            update_width_range(parseFloat(data.min_width), parseFloat(data.max_width));

                                            update_width_values(parseFloat(data.min_width), parseFloat(data.max_width));

                                        }

                                    }

                                } else {

                                    if (trigger != 'width') {

                                        if (data.min_width && data.max_width) {

                                            update_width_range(parseFloat(data.min_width), parseFloat(data.max_width));

                                            update_width_values(parseFloat(data.min_width), parseFloat(data.max_width));

                                        }

                                    }

                                    if (trigger != 'height') {

                                        if (data.min_height && data.max_height) {

                                            update_height_range(parseFloat(data.min_height), parseFloat(data.max_height));

                                            update_height_values(parseFloat(data.min_height), parseFloat(data.max_height));

                                        }

                                    }

                                }

                            }

                            disable_slider_option('enable');

                            if (trigger != 'color') {

                                var color_options = make_html_options(data.color_list, 'LabelColor_upd', 'Label Colour', $('#color').val());

                                $('#color').html(color_options);

                                //$('#color').html(data.color);

                            }

                            if (trigger != 'finish') {

                                var finish_options = make_html_options(data.finish_list, 'LabelFinish_upd', 'Label Finish', $('#finish').val());

                                $('#finish').html(finish_options);

                                //$('#finish').html(data.finish);

                            }

                            if (trigger != 'material') {

                                var material_options = make_html_options(data.material_list, 'ColourMaterial_upd', 'Label Material', $('#material').val());

                                $('#material').html(material_options);

                                //$('#material').html(data.material);

                            }

                            if (trigger != 'printer') {

                                $('#printer').html(data.printer);

                            }

                            if (trigger != 'adhesive') {

                                if (data.adhesive != '') {

                                    var adhesive_options = make_html_options(data.adhesive_list, 'Adhesive', 'Label Adhesive', $('#adhesive').val());

                                    $('#adhesive').html(adhesive_options);

                                    //$('#adhesive').html(data.adhesive);

                                }

                            }

                            apply_hover_effect();

                            if (category != "Roll" && category != "Integrated" && trigger != "LabelPerDie" && data.labelpersheet_records != '') {

                                $("#label_per_sheet_triggers").find(".container_of_labels").find('.datadata').html(data.labelpersheet_records);
                                $(".container_of_labels").mCustomScrollbar({theme: "rounded-dark"});
                                $(".container_of_labels").mCustomScrollbar("scrollTo", "0%");

                            }

                            $('[data-toggle="tooltip"]').tooltip();

                            $('#aa_loader').hide();

                            $('#filter-form').css('opacity', '1');

                            $('#home_finder').prop('disabled', false);

                        }

                    }

                }

            });

        }

    }


    function disable_slider_option(method) {


        if (method == 'disabled') {


            $("#width_slider").slider("option", "disabled", true);


            $("#height_slider").slider("option", "disabled", true);


        } else {


            $("#width_slider").slider("option", "disabled", false);


            $("#height_slider").slider("option", "disabled", false);


        }


    }


    function update_width_values(min, max) {


        $("#width_slider").slider("option", "values", [min, max]);


        $(".width_lowerlimit").text(min);


        $(".width_upperlimit").text(max);


    }


    function update_height_values(min, max) {


        $("#height_slider").slider("option", "values", [min, max]);


        $(".height_lowerlimit").text(min);


        $(".height_upperlimit").text(max);


    }


    function update_width_range(min, max) {


        $("#width_slider").slider("option", "min", min);


        $("#width_slider").slider("option", "max", max);


    }


    function update_height_range(min, max) {


        $("#height_slider").slider("option", "min", min);


        $("#height_slider").slider("option", "max", max);


    }


    function intialize_width_slider() {


        var width_min = document.getElementById('width_min');


        var width_max = document.getElementById('width_max');


        $("#width_slider").slider({


            range: true,


            step: 1,


            slide: function (event, ui) {


                width_max.value = ui.values[1];


                width_min.value = ui.values[0];


            },


            change: function (event, ui) {


                width_max.value = ui.values[1];


                width_min.value = ui.values[0];


                var option = $("#width_slider").slider("option");


                if (option.disabled == false) {


                    filter_data('width', '');


                }


            }


        });


        width_min.addEventListener('change', function () {


            $("#width_slider").slider("values", 0, parseInt(this.value));


        });


        width_max.addEventListener('change', function () {


            $("#width_slider").slider("values", 1, parseInt(this.value));


        });


    }


    function intialize_height_slider() {


        var height_min = document.getElementById('height_min');


        var height_max = document.getElementById('height_max');


        $("#height_slider").slider({


            range: true,


            step: 1,


            slide: function (event, ui) {


                height_max.value = ui.values[1];


                height_min.value = ui.values[0];


            },


            change: function (event, ui) {


                height_max.value = ui.values[1];


                height_min.value = ui.values[0];


                var option = $("#height_slider").slider("option");


                if (option.disabled == false) {


                    filter_data('height', '');


                }


            }


        });


        height_min.addEventListener('change', function () {


            $("#height_slider").slider("values", 0, parseInt(this.value));


        });


        height_max.addEventListener('change', function () {


            $("#height_slider").slider("values", 1, parseInt(this.value));


        });


    }


    function apply_radio_effect() {


        //$('#adhesive_box > input').iCheck();


    }


    $(document).on("click", ".layout_specs", function (e) {


        var id = $(this).attr('id');


        //console.log(id);


        $('#ajax_layout_spec').html('');


        $('#specs_loader').show();


        $.ajax({


            url: base + 'ajax/layout_popup/' + id,


            type: "POST",


            async: "false",


            dataType: "html",


            success: function (data) {


                if (!data == '') {


                    data = $.parseJSON(data);


                    // setTimeout(function(){


                    $('#specs_loader').hide();


                    $('#ajax_layout_spec').html(data.html);


                    // },1000);


                }


            }


        });


    });


    $(document).on("click", "#btn_search", function (e) {


        var category = $('#newcategory').val();


        var shape = $('#shape').val();


        if (category.length < 1 || shape.length < 1) {


            alert_box('Please select label category and shape first ');


        } else {


            $('#aa_loader').show();


            setTimeout(function () {


                $('#aa_loader').hide();


            }, 1000);


        }


    });


    function show_paging() {

        var code = '';

        var page = $('#page_type').val();

        var shape = $('#shape').val();

        var category = $('#newcategory').val();

        var color = $('#color').val();

        var finish = $('#finish').val();

        var material = $('#material').val();

        var adhesive = $('#adhesive').val();

        var printer = $('#printer').val();

        var height_min = $('#height_min').val();

        var height_max = $('#height_max').val();

        var width_min = $('#width_min').val();

        var width_max = $('#width_max').val();

        var cornerradius = $('#cornerradius').val();

        var total = parseInt($('#product_count').val());

        var start = parseInt($('#start_limit').val());

        var opposite = 'false';

        if ($('#opposite_dimension').is(':checked')) {

            var opposite = 'true';

        }

        var view = $('#view').val();

        var label_per_sheet_selected = $("#LabelPerDie").val();

        var checker = $("#ajax_flash_content").is(":empty");

        if (checker == false) {

            var div_open = 'slide';

        } else {

            var div_open = 'list';

        }

        var code = $('#filter_search_box').val();

        if (code != '') {

            color = finish = material = adhesive = '';

        }

        start = start + 12;

        if (category.length > 0 && div_open == 'list') {

            if (start < total) {

                $('#start_limit').val(start);

                $('#ajax_finder_content').find(".spinner").show();

                $.ajax({

                    url: base + 'filter/loadmore_finder_products',

                    type: "POST",

                    async: "false",

                    dataType: "html",

                    data: {
                        category: category,

                        shape: shape,

                        color: color,

                        finish: finish,

                        material: material,

                        adhesive: adhesive,

                        printer: printer,

                        width_min: width_min,

                        width_max: width_max,

                        height_min: height_min,

                        height_max: height_max,

                        cornerradius: cornerradius,

                        page: page,

                        start: start,

                        code: code,

                        label_per_sheet_selected: label_per_sheet_selected,

                    },

                    success: function (data) {

                        if (!data == '') {

                            data = $.parseJSON(data);

                            if (data.response == 'yes') {

                                $('#ajax_finder_content').find(".spinner").remove();

                                $('#ajax_finder_content').append(data.html);

                                apply_hover_effect();

                                $('[data-toggle="tooltip"]').tooltip();

                            }

                        }

                    }

                });

            }

        }

    }

    function onScroll() {


        scroll_pos = $(window).scrollTop();


        //win_height = $(window).height();


        doc_height = $(document).height();


        dif = 1200;


        doc_height = doc_height - dif;


        if (scroll_pos > doc_height && old_flag != doc_height) {


            var total = parseInt($('#product_count').val());


            var start = parseInt($('#start_limit').val());


            if (start < total) {


                show_paging();


                console.log(start + ' : total ' + total);


                old_flag = doc_height;


            }


        }


    }


    $(window).scroll(onScroll);


    $(document).on("click", ".load_flash", function (e) {

        var temp_id = $(this).attr('data-temp_id');

        var material = $('#material').val();

        var search_box = $('#filter_search_box').val();


        if (material == "" && search_box == "") {


            swal({


                    title: "Please Select Label Material First",


                    text: '',


                    type: "warning",


                    confirmButtonClass: "btn blueBg",


                    confirmButtonText: "ok",


                    closeOnConfirm: true,


                    html: true


                },


                function (isConfirm) {


                    if (isConfirm) {


                        $('#material').css('border-color', 'red');


                    }


                });


            return false;


        }


        $('#loaderdiv').show();


        $.ajax({


            url: base + 'ajax/load_flash_panel',


            type: "POST",


            async: "false",


            dataType: "html",


            data: {temp_id: temp_id},


            success: function (data) {


                if (data) {

                    var data = $.trim(data);
                    if (data == "login") {
                        $('#loaderdiv').hide();


                        $('.login-modal2').modal('show');


                    } else {


                        $('#ajax_finder_content').html('');


                        $('#ajax_flash_content').html(data);


                        filter_data('adhesive', '');


                        $(".show-h").trigger("click");


                    }


                }


            }


        });


    });


    function hideloadingdiv() {


        $('#loaderdiv').hide();


    }


    function fetch_product_details(temp_id) {


        $.ajax({


            url: base + 'ajax/fetch_product_details',


            type: "POST",


            async: "false",


            dataType: "html",


            data: {temp_id: temp_id},


            success: function (data) {


                if (data) {


                    data = $.parseJSON(data);


                    $('#itemcode').html(data.itemcode);


                    $('#LabelSize').html(data.LabelSize);


                    $('#H1').html(data.H1);


                    $('#H2').html(data.H2);


                    $('#header-image').html(data.image);


                    $('#flash_header').removeClass('hide');


                    get_selected_design(temp_id);


                }


            }


        });


    }


</script>

<script>


    function get_selected_design(temp_id) {


        $('.show-h').show();


        $.ajax({


            url: base + 'ajax/change_selection',


            type: "POST",


            async: "false",


            dataType: "html",


            data: {temp_id: temp_id},


            success: function (data) {


                if (data) {


                    $('#selection').html(data);


                }


            }


        });


    }


    $(document).ready(function () {


        $(".reset_button").click(function () {


            var checker = $("#ajax_flash_content").is(":empty");


            if (checker == true) {


                $('#designer_intro').show();


            }


            $('#select_msg').remove();


            // $('#newcategory').val('');


            $('#shape').val('');


            $('#height_min').val('');


            $('#height_max').val('');


            $('#width_min').val('');


            $('#width_max').val('');


            $('#color').html('<option value=""> Label Colour </option>');


            $('#finish').html('<option value=""> Label Finish </option>');


            $('#material').html('<option value=""> Label Material </option>');


            $('#printer').html('<option value=""> Printer / Copier Type </option>');


            $('#cornerradius').html('<option value="">Select Label Corner</option>');


            $('#filter_search_box').val('');


            $('#adhesive').val('');


            $('#brands').val('');


            $('#printer_width').val('');


            $('#model').val('');


            $('#ajax_model_desc').html('');


            $('#ajax_finder_content').html('');


            $('#label_counter1').html('0');


            $('.sizefound').hide();


            $('#width_box_text').html(' Label Width <small>(mm)</small>');


            $('#height_box').css('visibility', '');


            disable_slider_option('disabled');


            old_flag = '';


            $('#product_count').val(0);


            $('#start_limit').val(0);


            $element = $('.nlabelfilter');


            $element.prop('disabled', true);


            $element.attr('disabled', true);


            $('#home_finder').prop('disabled', true);


            $('#shapes_box').find('.btn_shape').prop('disabled', true);


            $('.thermaloptions').hide();


            $('.integratedbrands').hide();


            $('#categorybox').switchClass("col-lg-6", "col-lg-12");


            $('#categorybox').switchClass("col-md-6", "col-md-12");


            $('#categorybox').switchClass("col-lg-4", "col-lg-12");


            $('#categorybox').switchClass("col-md-4", "col-md-12");


            $('#categorybox').find('.labelF').append('<small id="select_msg" style="color:red"> Select label category</small>');


            $('#newcategory').val('A4');
            $('.show-h').show();


            filter_data('autoload', '');


        });


    });


    /* function change_class(step){



             if(step=="ldSteps2"){



               $('#ldSteps2').addClass('ldSteps-step-active');



               $('#ldSteps3').removeClass('ldSteps-step-active');



             }else if(step=="ldSteps3"){



                $('#ldSteps2').addClass('ldSteps-step-active');



                $('#ldSteps3').addClass('ldSteps-step-active');



              }







      }



      */


    function call_back_cart(response) {


        if (response == "true") {


            $.ajax({


                url: base + 'ajax/add_flash_cart',


                type: "POST",


                async: "false",


                dataType: "html",


                data: {},


                success: function (data) {


                    if (!data == '') {


                        data = $.parseJSON(data);


                        if (data.response == 'yes') {


                            $('#cart').html(data.top_cart);


                            /* overlay = $('<div></div>').prependTo('body').attr('id', 'overlay');*/


                        }


                    }


                }


            });


        }


    }


    function redirect_to_checkout() {


        window.location.href = sbase + 'transactionRegistration.php';


    }


    function check_sheet_qty(qty, type, temp_size) {


        if (temp_size == "a3" || temp_size == "sra3") {


            var min_qty = 100;


        } else {


            var min_qty = 25;


        }


        var max_qty = 50000;


        var text = 'Please Add Quantity between ' + min_qty + ' & 50000';


        if (type == 'printed') {


            var min_qty = 1;


            var text = 'Please Add Quantity between 1 & 50000';


        }


        if (qty < min_qty || qty > max_qty) {


            $('.sweet-alert').css('background', '#f8f8f8');


            swal({


                    title: text,


                    text: '',


                    type: "warning",


                    confirmButtonClass: "btn orangeBg",


                    confirmButtonText: "Ok",


                    closeOnConfirm: true,


                    html: true


                },


                function (isConfirm) {


                    if (isConfirm) {


                        document.getElementById("Source").hide_loader_window();


                    }


                });


            return false;


        } else {


            return true;


        }


    }


    function filter_reopen(trigger, color) {


        /*  filter_data(trigger,color); */


        $(".show-h").trigger("click");


    }


    $(document).on("click", ".selected_design", function (e) {


        $('.show-h').show();


        $(".show-h").trigger("click");


    });


    $(document).on("click", ".apply_design", function (e) {


        $('.show-h').show();
        $(".show-h").trigger("click");


        var temp_id = $(this).attr('data-temp_id');


        var catid = $(this).attr('data-cat');


        document.getElementById("Source").new_template_selected(temp_id, catid);


        /*$.ajax({



          url: base+'ajax/change_selection',



          type:"POST",



          async:"false",



          dataType: "html",



          data:{temp_id:temp_id},



          success: function(data){



          if(data){



            $('#selection').html(data);



            $(".show-h").trigger( "click" );



          }



         }



      });*/


    });


    function update_header_old(username) {


        var html = '<a class="" rel="nofollow"  href="<?=base_url()?>users/user_account"> Welcome &nbsp;'


            + username + '</a><a class="s" rel="nofollow" href="<?=base_url()?>users/user_orders"> <i class="fa fa-cart-arrow-down"></i> Easy Re-order</a><a class="" rel="nofollow"  href="<?=base_url()?>users/logout"><i class="fa fa-sign-out"></i>Logout</a>';


        $('#update_header').html(html);


    }


    function update_header_login(username) {


        var name = "<i class='fa fa-user'></i> Welcome " + username;


        $('#update_header').find(".userName").html(name);


        var dropdown = "<li class='MyAccount'><a href='<?=SAURL?>users/user_orders/'>Easy Re-Order</a></li>";


        dropdown += "<li class='ReOrder'><a href='<?=SAURL?>users/'>My Account</a></li>";


        dropdown += "<li class='LogOut'><a href='<?=SAURL?>users/logout/'>Logout</a></li>";


        // $('.loginRegister').find("ul.dropdown-menu").html(dropdown);
         $('.login_dropdown_menu').html(dropdown);


    }


    function back_from_app() {


        $('#ajax_flash_content').empty();


        filter_data('adhesive', '');


        $(".show-h").trigger("click");


    }


    function video_modal() {


        $("#video_modal").trigger("click");


    }


    $(document).on("click", "#video_pause", function (e) {


        console.log('trigger');


        tutorial_video2.pause();


    });


    history.pushState(null, null, document.URL);


    window.addEventListener('popstate', function (event) {


        var checker = $("#ajax_flash_content").is(":empty");


        if (checker == false) {


            swal({


                    title: 'Are you sure you want to leave this page?',


                    type: "warning",


                    showCancelButton: true,


                    confirmButtonClass: "btn orangeBg",


                    confirmButtonText: "Yes",


                    cancelButtonClass: "btn blueBg",


                    cancelButtonText: "No",


                    closeOnConfirm: true,


                    closeOnCancel: true


                },


                function (isConfirm) {


                    if (isConfirm) {


                        window.history.back();


                    } else {


                        history.pushState(null, null, document.URL);


                    }


                });


        } else {


            window.history.back();


        }


    });


    function confirmexitdialouge(url) {


        swal({


                title: 'Are you sure you want to leave this page?',


                type: "warning",


                showCancelButton: true,


                confirmButtonClass: "btn orangeBg",


                confirmButtonText: "Yes",


                cancelButtonClass: "btn blueBg",


                cancelButtonText: "No",


                closeOnConfirm: true,


                closeOnCancel: true


            },


            function (isConfirm) {


                if (isConfirm) {


                    window.location.href = url;


                }


            });


    }


    /*$(document).on("click", "a", function(event) {



            var href = $(this).attr('href');



            if (href.indexOf("transactionregistration.php") >= -1){







                var checker = $( "#ajax_flash_content" ).is( ":empty" );



                if(checker==false && href!='#carousel123' && href!='' && typeof href!=='undefined' && href!='javascript:void(0);' ){



                    event.preventDefault();



                    confirmexitdialouge(href);



                }



            }



    }); */


    $(document).ready(function () {
        //usman
        // var count = 1;
        $('#main_throttle_label_designer').hide();
        //usman
        var form = $("#login_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            submitHandler: function (form) {
                if ($('#email').val() === "" || $('#ajax_login_password').val() === "") {
                    $('.email-address-password-incorrect-alert').show();
                }
                $("#login_form .btn").attr("disabled", "disabled").html("Please Wait <i class='fa fa-spin fa-spinner'></i>");
                $.post(base + 'ajax/user_login', $("#login_form").serialize(), function (data) {
                $("#login_form .btn").removeAttr("disabled").html("Submit Now <i class='fa fa-arrow-circle-right'></i>");
                    if (data.response == 'error') {

                        //usman
                        if (data.remaining_time !== 0 && data.remaining_time !== null) {
                            timer2 = data.remaining_time;

                            $('#main_throttle_label_designer').show();
                        } else {
                            $('#main_throttle_label_designer').hide();


                        }
                        //usman




                        // $('#server_error').text("Email address or password is invalid!");
                        $('.email-address-password-incorrect-alert').show();
                        $('#server_error').show();
                    } else {
                        update_header_login(data.username);
                        $('.login-modal2').modal('hide');
                        if (data.template != '') {
                            $("[data-temp_id='" + data.template + "']").trigger("click");
                        }
                    }
                    //swal("Alright!", "invalid login details", "success");
                    return false;
                }, 'json');
                // $('.email-address-password-incorrect-alert').show();
                $("#login_form .btn").removeAttr("disabled").html("Submit Now <i class='fa fa-arrow-circle-right'></i>");
                return false;
            }
        });


        var form2 = $("#signup_form");


        form2.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },


            rules: {


                Password: {


                    required: true,


                    minlength: 8,


                    maxlength: 20,


                },


                cpassword: {


                    equalTo: "#password"


                },


                email_reg: {


                    required: true,


                    email: true,


                    onkeyup: false,


                    remote: base + "ajax/is_email_exist"


                }


            },


            messages: {


                email_reg: {


                    remote: $.validator.format("This email address is already taken.")


                }


            },


            submitHandler: function (form2) {


                $("#signup_form .btn").attr("disabled", "disabled").html("Please Wait <i class='fa fa-spin fa-spinner'></i>");


                var reg_data = {


                    'firstname': $("#firstname").val(),


                    'lastname': $("#lastname").val(),


                    'email': $("#email_reg").val(),


                    'password': $("#password").val(),


                    'cpassword': $("#cpassword").val(),


                    'page': 'flash',


                };


                $.post(base + 'users/signup', reg_data, function (data) {


                    data = $.parseJSON(data);


                    if (data.msg == "registered") {


                        update_header_login($("#firstname").val());


                        $('.login-modal2').modal('hide');


                        if (data.template != '') {


                            $("[data-temp_id='" + data.template + "']").trigger("click");


                        }


                    }


                }, 'html');


                return false;


            }


        });


        $("button.register_new").click(function () {


            $(".login_form").hide();


            $(".register_new").hide();


            $(".forgot_password").hide();


            $(".register_form").show();


            $(".login_new").show();


        });


        $("button.login_new").click(function () {


            $(".login_form").show();


            $(".register_new").show();


            $(".forgot_password").show();


            $(".register_form").hide();


            $(".login_new").hide();


        });


        $("button.forgot_password").click(function () {


            window.location = base + "users/forgotpassword";


        });


    });


    $(document).on("click", ".technical_specs", function (e) {


        var id = $(this).attr('id');


        $('#ajax_tecnial_specifiacation').html('');


        $('#mat_code').html('');


        $('#specs_loader').show();


        $.ajax({


            url: base + 'ajax/material_popup/' + id,


            type: "POST",


            async: "false",


            dataType: "html",


            success: function (data) {


                if (!data == '') {


                    data = $.parseJSON(data);


                    $('#material_popup_img').attr('src', data.src);


                    setTimeout(function () {


                        $('#specs_loader').hide();


                        $('#ajax_tecnial_specifiacation').html(data.html);


                        $('#mat_code').html(data.mat_code);


                    }, 500);


                }


            }


        });


    });


    $(document).on("click", ".applications", function (e) {


        var groupname = $(this).attr('id');


        $('.ajax_application_chart').html('');


        $('#app_group_name').html('');


        $('#lb_applications_loader').show();


        $.ajax({


            url: base + 'ajax/application_popup/',


            type: "POST",


            async: "false",


            dataType: "html",


            data: {'groupname': groupname, type: 'sheets'},


            success: function (data) {


                if (!data == '') {


                    data = $.parseJSON(data);


                    setTimeout(function () {


                        $('#lb_applications_loader').hide();


                        $('.ajax_application_chart').html(data.html);


                        $('#app_group_name').html(data.group_name);


                        $("b.popup-title").html(data.group_name);


                    }, 500);


                }


            }


        });


    });


    $('body').bind("mousewheel", function (e) {


        var scrollPosition0 = self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft;


        var scrollPosition1 = self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;


        var q = document.querySelectorAll(":hover");


        var targetLi = q[q.length - 1].parentNode.id;


        if ('ajax_flash_content' == targetLi) {


            var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that


            html.data('scroll-position', scrollPosition);


            html.data('previous-overflow', html.css('overflow'));


            html.css('overflow', 'hidden');


            window.scrollTo(scrollPosition0, scrollPosition1);


        } else {


            var html = jQuery('html');


            var scrollPosition = html.data('scroll-position');


            html.css('overflow', 'auto');


            window.scrollTo(scrollPosition0, scrollPosition1);


        }


    });


    $('body').bind("mousemove", function (e) {


        var q = document.querySelectorAll(":hover");


        var targetLi = q[q.length - 1].parentNode.id;


        if ('ajax_flash_content' != targetLi) {


            var html = jQuery('html');


            html.css('overflow', 'auto');


        }


    });


    function make_html_options(list, field, name, selec) {


        var option = '';


        var seleted = '';


        if (list.length > 0) {
            option = '<option value=""> ' + name + ' </option>';
        }


        $.each(list, function (index, value) {


            seleted = '';


            if (value[field] == selec) {


                seleted = 'selected="selected"';


            }


            option += '<option  ' + seleted + '  value="' + value[field] + '" >' + value[field] + ' </option>';


        });


        option += '<option value="" > Reset Selection </option>';


        return option;


        //return '<option value="" > Clear Selection </option>';


    }


    function generate_shapes_html(cat) {


        var shapes_html = '';


        var selected = $('#shape').val();


        $.each(shape_list[cat], function (index, value) {


            if (value.match(/single/i) || value.match(/full/i)) {


                var class_name = 'single';


            } else if (value.match(/double/i)) {


                var class_name = 'double';


            } else if (value.match(/triple/i)) {


                var class_name = 'triple';


            } else if (value.match(/triple/i)) {


                var class_name = 'triple';


            } else {


                var class_name = value.toLowerCase();


            }


            if (selected.toLowerCase() == value.toLowerCase()) {


                class_name += ' active';


            }


            shapes_html += '<button type="button" class="btn_shape ' + class_name + '" data-val="' + value + '" data-toggle="tooltip" data-placement="top"  title="' + value + '"></button>';


        });


        $('#shapes_box').html(shapes_html);


    }


    $(document).on("click", "#filter_search_handler", function (e) {


        var val = $("#filter_search_box").val();


        if (val == '') {


            swal("Please type the code");


            $("#filter_search_box").css("border", "1px solid red");


            return false;


        } else {


            $("#filter_search_box").css("border", "1px solid #cccccc");


        }


        $('.nlabelfilter:not("#newcategory")').val('');


        $('#shape').val('');


        $('.btn_shape').removeClass('active');


        filter_data('search', '');


    });

    /* LABEL PER SHEET IMPLEMENTATION */


    $(document).on("click", ".lps_item_box ", function (e) {

        var labelperdie = $(this).data('labelperdie');

        if (labelperdie != '' && labelperdie != 'undefined') {

            $(".lps_item_box").removeClass("active");

            $(this).addClass("active");

            $("#LabelPerDie").val(labelperdie);

            $("#LabelPerDie").trigger('change');

        }

    });

    //for changing cursor
    $('.showPassword, .showConfirmPassword').mouseenter(function () {
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

</script> 

