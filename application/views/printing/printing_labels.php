<?php $method = $this->router->fetch_method();
$class = $this->router->fetch_class();
if (($method == 'printing' || $method == 'customlabels')) {
    $phonetapclass = '';
} else {
    $phonetapclass = 'rTapNumber327505';
}
?>
<script src="<?= Assets ?>js/labelfinder.js?ver=<?= time() ?>"></script>

<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Printed Labels</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="printingBg text-center">
    <div class="container">
        <h1>Label printing service</h1>
        <p>customercare@aalabels.com</p>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-12 col-md-7 ">
                <div class="thumbnail p-l-r-10">
                    <!-- Advertising Banners for free delivery start-->

                    <? $this->load->view('advertising/pantone_v'); ?>
                    <!-- Advertising Banners for free delivery end-->

                    <div class="">
                        <h2 class="BlueHeading ">The importance of professionally printed labels</h2>
                        <p class="text-justify">Your labels can be just as important as the product itself to gain and
                            retain customers. At AA Labels we understand that the quality of both design and finish are
                            critical elements in the labels finished appearance and &ldquo;shelf appeal&rdquo; or an
                            organisations image.</p>
                        <p class="text-justify">Delivering the highest standard of service at all stages of label
                            production is a shared objective of the team at AA Labels, ensuring that you receive a high
                            quality label for your application.</p>
                    </div>
                    <div>
                        <div class="m-t-20 ">
                            <div>
                                <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
                                    <div class="panel panel-default" style="box-shadow: none !important;">
                                        <div id="headingOne" role="tab" class="panel-title_gray">
                                            <div class=""><a aria-controls="collapseOne" aria-expanded="true"
                                                             href="#collapseOne" data-parent="#accordion"
                                                             data-toggle="collapse" role="button" class="">Bottle
                                                    labels</a></div>
                                        </div>
                                        <div aria-labelledby="headingOne" role="tabpanel"
                                             class="panel-collapse collapse in" id="collapseOne" aria-expanded="true"
                                             style="">
                                            <div class="panel-body text-justify">
                                                <div>
                                                    <div class="pull-right"><img onerror='imgError(this);'
                                                                                 src="<?= Assets ?>images/cold_drinks.jpg"
                                                                                 alt="Cold Drinks" width="160"
                                                                                 height="151"></div>
                                                </div>
                                                <p> Labels define the brand and increasingly high quality drinks
                                                    manufacturers are using elaborate labels, typically printed using
                                                    the maximum number of colours on cast coated, textured or metallised
                                                    papers and often using foils to create an appealing label.</p>
                                                <p> We use carefully selected label face materials that meet the
                                                    aesthetic and functional requirements and although the focus still
                                                    remains on coated and textured paper materials, filmic labels are
                                                    being more widely adopted to create attractive and distinctive
                                                    labels.</p>
                                                <p> To find out more, contact a member of our team to see how we can
                                                    help. </p>
                                                <p>Email:
                                                    <?= EMAIL ?>
                                                    &amp; Tel: <span class="<?= $phonetapclass ?>">
                          <?= PHONE ?>
                          </span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default" style="box-shadow: none !important;">
                                        <div id="headingTwo" role="tab" class="panel-title_gray">
                                            <div><a aria-controls="collapseTwo" aria-expanded="false"
                                                    href="#collapseTwo" data-parent="#accordion" data-toggle="collapse"
                                                    role="button" class="collapsed">Packaging labels</a></div>
                                        </div>
                                        <div aria-labelledby="headingTwo" role="tabpanel"
                                             class="panel-collapse collapse" id="collapseTwo" aria-expanded="false"
                                             style="height: 0px;">
                                            <div class="panel-body text-justify">
                                                <div>
                                                    <div class="pull-right"><img onerror='imgError(this);'
                                                                                 src="<?= Assets ?>images/packing.jpg"
                                                                                 alt="Labels on Jars" width="160"
                                                                                 height="151"></div>
                                                </div>
                                                <p class="text-justify">Whether your requirements are for glass and
                                                    plastic containers e.g. Beer & Beverages, Fragrances, Oils and
                                                    Preserves, cellophane, cardboard, paper and plastic e.g. Chemicals,
                                                    Consumables, Food, Pharmaceutical Products, Soaps etc, we work with
                                                    you to produce high quality product labels, from concept to
                                                    delivery. So whatever your product, size, shape  and packaging
                                                    material, we are confident that we  can provide a label to match the
                                                    requirement. </p>
                                                <p><br>
                                                </p>
                                                <span class="label"><a href="<?= base_url() ?>herb-spice-jar-labels/">Herb Jar Labels</a> </span>
                                                <span class="label"><a href="<?= base_url() ?>honey-jar-labels/">Honey Jar Labels</a></span>
                                                <span class="label"><a href="<?= base_url() ?>jam-jar-labels/">Jam Jar Labels</a></span>
                                                <span class="label"><a href="<?= base_url() ?>sweet-jar-labels/">Sweet Jar Labels</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default" style="box-shadow: none !important;">
                                        <div id="headingThree" role="tab" class="panel-title_gray">
                                            <div><a aria-controls="collapseThree" aria-expanded="false"
                                                    href="#collapseThree" data-parent="#accordion"
                                                    data-toggle="collapse" role="button"
                                                    class="collapsed">Designers </a></div>
                                        </div>
                                        <div aria-labelledby="headingThree" role="tabpanel"
                                             class="panel-collapse collapse" id="collapseThree" aria-expanded="false">
                                            <div class="panel-body text-justify">
                                                <div class="pull-right"><img onerror='imgError(this);'
                                                                             src="<?= Assets ?>images/designer.jpg"
                                                                             alt="Label Designer" width="160"
                                                                             height="151"></div>
                                                <p>Do you need professional graphic design, illustration, merchandising
                                                    design or photography? Search for the right partner for your next
                                                    project. </p>
                                                <p><strong class="textBlue">Our partners</strong><br>
                                                    Looking for assistance to take your ideas in label design to the
                                                    next level? Browse the design services listed to find one with an
                                                    artistic style that matches your vision. Many of the partners listed
                                                    are users of AA Labels themselves.</p>
                                                <p><strong class="textBlue">Add your company</strong><br>
                                                    Interested in having your company featured on this page? Simply
                                                    email us your company logo to
                                                    <?= EMAIL ?>
                                                    and we'll get it on the website.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default" style="box-shadow: none !important;">
                                        <div id="heading4" role="tab" class="panel-title_gray">
                                            <div><a aria-controls="collapse4" aria-expanded="false" href="#collapse4"
                                                    data-parent="#accordion" data-toggle="collapse" role="button"
                                                    class="collapsed">Need help </a></div>
                                        </div>
                                        <div aria-labelledby="heading4" role="tabpanel" class="panel-collapse collapse"
                                             id="collapse4" aria-expanded="false">
                                            <div class="panel-body text-justify">
                                                <div class="pull-right"><img onerror='imgError(this);'
                                                                             src="<?= Assets ?>images/help.jpg"
                                                                             alt="Help" width="160" height="151"></div>
                                                <p>To achieve the best result for your printed label, design is crucial
                                                    and it is worth spending some time and effort to get this right. If
                                                    you are new to buying printed labels then you may find our page on
                                                    tips for first-time buyers useful. </p>
                                                <p><strong class="textBlue">Help for first time custom printed label
                                                        buyers</strong><br>
                                                    At AA Labels our SME (small and medium-sized enterprises) customer
                                                    list grows daily for labels printed on rolls and sheets. We enjoy
                                                    helping customers create the labels they need and are pleased to be
                                                    able to provide assistance and help on anything to do with label
                                                    design, production and application. </p>
                                                <p> So if you are looking for a specialist label supplier who is as
                                                    interested in short-run label production as the high volume
                                                    requirements of established customers and to create a satisfied
                                                    customer with no reason to look elsewhere then you have come to the
                                                    right place.</p>
                                                <p><strong class="textBlue">What should you do next?</strong></p>
                                                <p class="text-justify"> The first step is to complete and submit the
                                                    online form on this page to which we will respond with a quotation,
                                                    or a request for additional information. You can also email or  call
                                                    to discuss your requirements and request material samples.</p>
                                                <p><strong class="textBlue">Artwork Requirements & Printing</strong></p>
                                                <p class="text-justify">You will need a professional standard of artwork
                                                    to achieve the best quality with your finished labels. We require
                                                    scaled, print-ready studio artwork, supplied in editable pdf or eps
                                                    format, with a minimum resolution of 300dpi. For full bleed printing
                                                    please allow a 3 – 5mm bleed area and include cutting guides. Any
                                                    artwork modifications you ask us to make may be charged as extra,
                                                    dependant upon the number of labels being ordered.</p>
                                                <p class="text-justify">If you cannot provide print-ready studio
                                                    artwork, we can prepare it for you from a logo file and text details
                                                    supplied by you. We will supply a draft layout and pdf proof for
                                                    your approval. We charge £25 + VAT for this service. Artwork
                                                    modifications (following our pdf proof) will be charged as
                                                    extra.</p>
                                                <p class="text-justify">We cannot guarantee exact pantone colour matches
                                                    but in the event that your chosen print method will not achieve a
                                                    close pantone match we will advise you of more suitable
                                                    alternatives.</p>
                                                <p class="text-justify">If you need a complete branding and packaging
                                                    design service, then we can recommend third-party agencies, many of
                                                    whom are also customers of AA Labels and are listed in our Designers
                                                    section.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default" style="box-shadow: none !important;">
                                        <div id="heading5" role="tab" class="panel-title_gray">
                                            <div><a aria-controls="collapse5" aria-expanded="false" href="#collapse5"
                                                    data-parent="#accordion" data-toggle="collapse" role="button"
                                                    class="collapsed">No Hidden Costs </a></div>
                                        </div>
                                        <div aria-labelledby="heading5" role="tabpanel" class="panel-collapse collapse"
                                             id="collapse5" aria-expanded="false">
                                            <div class="panel-body text-justify">
                                                <div class="pull-right"><img onerror='imgError(this);'
                                                                             src="<?= Assets ?>images/hidden_cost.jpg"
                                                                             alt="AA Labels" width="160" height="151">
                                                </div>
                                                <p>Often when you are first starting to use printed labels for branding,
                                                    product promotion and service information you may not be fully aware
                                                    of some of the potential hidden costs involved in the process, as
                                                    you may decide to alter your label designs as your usage increases
                                                    and requirements change. </p>
                                                <h4>There are some primary elements of the manufacturing process that
                                                    can influence the production cost.</h4>
                                                <p><strong class="textBlue">Artwork</strong><br>
                                                    Every design change will incur time and cost and be charged by the
                                                    design service organisation chosen, so it is important to have a
                                                    very clear idea of what you want to create from the outset and work
                                                    with someone to finalise this. </p>
                                                <p>At AA Labels in addition to supplying production ready artwork proofs
                                                    we can also provide the design of new artwork based on existing
                                                    brand logo's and packaging at a nominal cost. </p>
                                                <p><strong class="textBlue">Printing plates </strong><br>
                                                    The majority of print production is digital and does not require the
                                                    manufacture of plates but for some specialist processes, such as the
                                                    application of hot foil onto the label and longer production runs it
                                                    is sometimes more cost effective and faster to have labels produced
                                                    by the flexographic print process. </p>
                                                <p class=""><strong class="textBlue">Die-line cutters</strong><br>
                                                    Labels are cut out of the paper, polyester, polyethylene,
                                                    polypropylene or vinyl face-stock and we currently have over 1,200
                                                    standard label shapes and sizes from which to choose an appropriate
                                                    label for your requirement, without incurring any additional cost.
                                                    However if it is essential that your label is an exact shape and
                                                    size you will need to spend money on a die-line design and cutting
                                                    plate. </p>
                                                <p><strong class="textBlue">Material</strong><br>
                                                    Not only the choice of label material, adhesive and performance e.g.
                                                    climatic and temperature resistance, but the materials used on the
                                                    label will all be cost variables to consider in the design of your
                                                    labels. </p>
                                                <p><strong class="textBlue">Production</strong><br>
                                                    The costs of printing, varnishing, laminating and die cutting your
                                                    labels. </p>
                                                <p> The majority of printed label orders are despatched for delivery in
                                                    less than 5 working days from artwork approval and placement of
                                                    order, however some jobs can take a little longer. </p>
                                                <p> Because of the set-up and preparation involved in producing printed
                                                    labels there is an inherent cost whatever the volume of labels
                                                    ordered and for this reason there is a minimum order quantity of 25
                                                    sheets for printed labels on flat sheets and for printed labels on
                                                    roles a minimum order value of
                                                    <?= symbol . $this->home_model->currecy_converter(165, 'yes'); ?>
                                                    <?= vatoption ?>
                                                    VAT. However there are an extensive range of label options within
                                                    this entry level price. </p>
                                                <p><strong class="textBlue">Can We Help You?</strong><br>
                                                    Can we be or further assistance? If so please contact our customer
                                                    care team on the telephone number shown at the bottom of the screen,
                                                    or write to us at <span class="textBlue">
                          <?= EMAIL ?>
                          </span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default" style="box-shadow: none !important;">
                                        <div id="heading6" role="tab" class="panel-title_gray">
                                            <div><a aria-controls="collapse6" aria-expanded="false" href="#collapse6"
                                                    data-parent="#accordion" data-toggle="collapse" role="button"
                                                    class="collapsed">Enquiry Form</a></div>
                                        </div>
                                        <div aria-labelledby="heading6" role="tabpanel" class="panel-collapse collapse"
                                             id="collapse6" aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="pull-right"><img onerror='imgError(this);'
                                                                             src="<?= Assets ?>images/enquiry.jpg"
                                                                             alt="AA Labels Support" width="160"
                                                                             height="151"></div>
                                                <p>To obtain a quotation, or to ascertain the cost associated with a
                                                    non-standard label shape and/or size and to receive print prices,
                                                    please complete and submit the enquiry form on this page and a
                                                    member of our team will contact you.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default" style="box-shadow: none !important;">
                                        <div id="heading7" role="tab" class="panel-title_gray">
                                            <div><a aria-controls="collapse7" aria-expanded="false" href="#collapse7"
                                                    data-parent="#accordion" data-toggle="collapse" role="button"
                                                    class="collapsed">Label Design</a></div>
                                        </div>
                                        <div aria-labelledby="heading7" role="tabpanel" class="panel-collapse collapse"
                                             id="collapse7" aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="pull-right"><img onerror='imgError(this);'
                                                                             src="<?= Assets ?>images/label_des.jpg"
                                                                             alt="AA Labels Designer" width="160"
                                                                             height="151"></div>
                                                <p>If you already have finished artwork, or you require minor changes to
                                                    artwork then please upload your artwork using the enquiry form on
                                                    this page. </p>
                                                <p> If you do not have finished artwork but have a brand logo and a
                                                    label shape and size in mind, then please upload your logo and
                                                    provide a description of your label design in the enquiry form on
                                                    this page. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <div class="col-xs-12  col-sm-12 col-md-5 ">
                <div class="thumbnail p-l-r-10">
                    <? if (isset($msg) and $msg != '') { ?>
                        <div role="alert" class="alert alert-<?= $class ?> alert-dismissible fade in">
                            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span
                                        aria-hidden="true">×</span></button>
                            <?= $msg ?>
                        </div>
                    <? } ?>
                    <div class="">
                        <div>
                            <div class="col-md-12">
                                <h2 class="BlueHeading">Print Labels</h2>
                            </div>
                            <form class="labels-form" id="printing-form" method="post" action=""
                                  enctype="multipart/form-data">
                                <input type="hidden" value="printing" id="page_type"/>
                                <div class="col-md-6 ">
                                    <label class="select">
                                        <select id="category" name="category" autocomplete="off"
                                                class="disabled required">
                                            <option selected="selected" value="">Label Category</option>
                                            <option value="A5">Labels on A5 Sheet</option>
                                            <option value="A4">Labels on A4 Sheet</option>
                                            <option value="A3">Labels on A3 Sheet</option>
                                            <option value="SRA3">Labels on SRA3 Sheet</option>
                                            <option value="Roll">Labels on Roll</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="select">
                                        <select id="shape" name="shape" class="labelfilter required">
                                            <option value="">Label Shape</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class=" col-md-12">
                                    <label class="select">
                                        <select name="material" id="custom_material_list" class="required">
                                            <option value="" selected="selected" disabled="">Select Material</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class="col-sm-8" id="circular_div" style="display:none;">
                                    <label class="select">
                                        <select name="diameter" id="diameter" class="width-group">
                                            <option value="">Label Diamter</option>
                                        </select>
                                        <i></i> </label>
                                </div>
                                <div class="" id="other_div">
                                    <div class="col-sm-4">
                                        <label class="select">
                                            <select name="width" id="width" class="width-group">
                                                <option value="">Width mm</option>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="select">
                                            <select name="height" id="height" class="height-group">
                                                <option value="">Height mm</option>
                                            </select>
                                            <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="input">
                                        <input type="text" name="quantity" id="quantity" maxlength="5" placeholder="25+"
                                               class="required">
                                        <b class="tooltip tooltip-bottom-right">Number of Labels</b> </label>
                                </div>
                                <div id="custom_size_block">
                                    <div class="input col-sm-12">
                                        <p class="textOrange"><small>Alternatively enter the dimensions of the size you
                                                require in the boxes below</small></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input">
                                            <input type="text" class="width-group" name="custom_width" id="custom_width"
                                                   maxlength="5" placeholder="Width in mm">
                                            <b class="tooltip tooltip-bottom-right">Width</b> </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input">
                                            <input type="text" class="height-group" name="custom_height"
                                                   id="custom_height" maxlength="5" placeholder="Height in mm">
                                            <b class="tooltip tooltip-bottom-right">Height</b> </label>
                                    </div>
                                </div>
                                <!--<div class="col-md-12 ">
                                                    <label class="select">
                                                        <select name="gender">
                                                            <option value="0" selected="" disabled="">Select from our range of standard sizes</option>
                                                            <option value="1">Enter your own size</option>

                                                        </select>
                                                        <i></i>
                                                    </label>
                                             </div>-->
                                <div class="col-sm-12  ">
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Full Name" name="name" id="name"
                                               class="required">
                                    </label>
                                </div>
                                <div class="col-sm-12  ">
                                    <label class="input"> <i class="icon-append fa fa fa-envelope"></i>
                                        <input type="text" placeholder="Email" name="email" id="email" class="required">
                                    </label>
                                </div>
                                <div class="col-sm-12  ">
                                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Phone" name="phoneNumber" class="required"
                                               id="phoneNumber">
                                    </label>
                                </div>
                                <div class="col-sm-12  ">
                                    <label class="input">
                                        <input type="text" placeholder="Post Code" name="b_pcode" id="b_pcode"
                                               class="required">
                                        <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b> </label>
                                </div>
                                <!--<div class="col-xs-6 col-sm-3  col-md-4 ">
                                                    <button id="BillingsearchButton"  class="btn btn-block btn-primary" type="button">Find Address</button>
                                                    </div>
                                     <div class="col-sm-12" id="selectBillingDiv" style="display:none">
                                                       <label class="select">
                                                            <select onchange="$('#selectBillingDiv').hide();" id="billingaddressListSelect"></select>
                                                            <i></i>
                                                        </label>
                                                 </div>-->

                                <!-- <div class="clear"></div> -->
                                <div class="col-sm-12  ">
                                    <label class="input"> <i class="icon-append fa fa-briefcase"></i>
                                        <input type="text" placeholder="Company" name="company" id="b_organization"
                                               class="required">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_add1" name="add1" value="" placeholder="Address1"
                                               class="required">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_add2" name="add2" value="" placeholder="Address2">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_city" name="city" value="" placeholder="City"
                                               class="required">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="input"> <i class="icon-append fa fa-map"></i>
                                        <input type="text" id="b_county" name="county" value="" placeholder="County"
                                               class="required">
                                    </label>
                                </div>
                                <div class="col-sm-12  ">
                                    <label class="input">
                                        <textarea placeholder="Enter Other Instructions ....." rows="3"
                                                  class="form-control" name="subject" id="subject"></textarea>
                                    </label>
                                </div>
                                <div class="input col-sm-12">
                                    <p class="clear_b"><strong>Upload your File Artwork</strong></p>
                                    <p><small>Please note uploaded files must be no larger than 2Mb and to achieve the
                                            best results for your finished labels you will need a professional standard
                                            of artwork. We require scaled, print-ready studio artwork, supplied in
                                            editable PDF or EPS format, with a minimum resolution of 300dpi. No original
                                            artwork or image files can be uploaded. </small></p>
                                </div>
                                <div class="col-xs-8 col-sm-9">
                                    <input class="m-t-15" type="file" style="display:none;" name="file_up" id="file_up">
                                </div>
                                <div class="clear10"></div>
                                <div class="col-xs-4 col-sm-3  ">
                                    <button class="btn btn-primary" type="button"
                                            onclick="$('#file_up').trigger('click');"><i class="fa fa-cloud-upload"></i>
                                        Upload
                                    </button>
                                </div>
                                <div class="clear10"></div>
                                <hr class="col-sm-11 m-t-b-10">
                                <div class="input col-sm-12">
                                    <p class="clear_b"><strong>Captcha</strong><br>
                                    </p>
                                    <div id="catcha_img" style="width:230px; height:auto; float:left;"><img
                                                onerror='imgError(this);' style=""
                                                src="<?= SAURL ?>captcha/simplecaptcha.php" id="captcha_img" width="225"
                                                height"70" alt="Capthca Image"/>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-10   col-md-8  ">
                                    <label class="input">
                                        <input type="text" name="captcha" id="captcha"
                                               placeholder="Write the following word." class="required btn-block">
                                        <b class="tooltip tooltip-bottom-right">Write the following word.</b> </label>
                                </div>
                                <div class="col-xs-6 col-sm-2   col-md-4  ">
                                    <button class="btn btn-primary " type="button"
                                            onclick="$('#captcha').val('');document.getElementById('captcha_img').src='<?= SAURL ?>captcha/simplecaptcha.php?'+Math.random(); document.getElementById('captcha').focus();"
                                            id="change-image">Change Word
                                    </button>
                                </div>
                                <div class="col-xs-12 col-sm-12  ">
                                    <button class="btn   orange text-uppercase" type="submit" style="">Submit Now &nbsp;
                                        &nbsp; <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).on("change", "#category", function (e) {
        $('#custom_material_list').html('<option value="" selectd="selected">Select Material</option>');
    });

    $(document).on("click", "#change-image", function (e) {
        $('#captcha').val('');
        $('#captcha_img').attr('src', '<?=SAURL?>captcha/simplecaptcha.php?' + Math.random());
        $('#captcha').focus();

    });


    $(document).on("change", "#shape", function (e) {

        var cat = $('#category').val();
        val = $(this).val();
        if (val == 'Circular' || val == 'Square') {
            $('#custom_height').hide();
            $('#custom_width').val('');
            $('#custom_height').val('');


        } else {
            $('#custom_width').val('');
            $('#custom_height').val('');
            $('#custom_height').show();
        }
        $('#custom_size_block').show();

        if (val != '' && cat != '') {
            $.ajax({
                url: base + 'ajax/materail_for_custom/',
                type: "POST",
                async: "false",
                datatype: "html",
                data: {category: cat, shape: val},
                success: function (data) {
                    $('#custom_material_list').html(data);

                }
            });


        } else {

            swal("", "please select category first !", "warning");
        }


    });
    $(document).on("change", "#width,#height,#diameter", function (e) {
        $('#custom_size_block').hide();
        return false;
    });


    var form = $("#printing-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
        },
        rules: {
            email: {
                required: true,
                email: true,
            },
            captcha: {
                required: true,
                onkeyup: false,
                remote: base + "ajax/is_valid_captcha"
            },
            width: {
                require_from_group: [1, ".width-group"]
            },
            diameter: {
                require_from_group: [1, ".width-group"]
            },
            custom_width: {
                require_from_group: [1, ".width-group"]
            },
            height: {
                require_from_group: [1, ".height-group"]
            },
            custom_height: {
                require_from_group: [1, ".height-group"]
            },
            file_up: {
                extension: "jpg|gif|png|pdf|tiffs|jpeg",
            }
        },
        submitHandler: function (form) {
            form.submit();
        }

    });

</script> 
