<style>
.carousel-fade .carousel-inner .item {
	-webkit-transition-property: opacity;
	transition-property: opacity;
}
.carousel-fade .carousel-inner .item, .carousel-fade .carousel-inner .active.left, .carousel-fade .carousel-inner .active.right {
	opacity: 0;
}
.carousel-fade .carousel-inner .active, .carousel-fade .carousel-inner .next.left, .carousel-fade .carousel-inner .prev.right {
	opacity: 1;
}
.carousel-fade .carousel-inner .next, .carousel-fade .carousel-inner .prev, .carousel-fade .carousel-inner .active.left, .carousel-fade .carousel-inner .active.right {
	left: 0;
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}
.carousel-fade .carousel-control {
	z-index: 2;
}
/* carousel fullscreen */
.carousel-fullscreen .carousel-inner .item {
	background-position: center center;
	background-repeat: no-repeat;
	background-size: contain;
}
/* carousel fullscreen - vertically centered caption*/
.carousel-fullscreen .carousel-caption {
	top: 50%;
	bottom: auto;
	-webkit-transform: translate(0, -50%);
	-ms-transform: translate(0, -50%);
	transform: translate(0, -50%);
}
.carousel-caption .super-paragraph a, .carousel-caption .super-paragraph a:hover {
	color: #fff;
}
#carousel-example-generic {
	margin: 40px 0;
}
.carousel {
	height: 250px !important;
	margin-bottom: 0px !important;
}
.carousel .item {
	height: 281px !important;
}
.carousel-indicators {
	bottom: -22px !important;
}
.lba-left-nav-container {
	padding: 10px;
	margin-bottom: 15px;
}
.lba-pagination .pagination {
	margin: 0px !important;
}
.lba-pagination {
	text-align: right;
	padding-right: 15px;
}
.lba-total-results {
	text-align: left;
	padding-left: 15px;
}
.lba-size-wrapper {
	width: 90px;
	font-size: 11px;
}
.hover-thumb-wrapper {
	/*padding-left: 15px;*/
	padding-bottom: 5px;
	float: left;
}
.lba-cta {
	padding: 5px 0px 20px 0px;
}
.hover-thumb-wrapper .lba-size {
	font-size: 11px;
	padding: 3px 3px 6px 3px !important;
	text-align: center;
}
.hover-thumb-wrapper img {
	opacity: 50!important;
	margin: 0 auto;
	border: solid 1px #cccccc;
	padding: 1px;
}
.lba-left-nav ul {
	list-style: none;
	padding-left: 15px;
	line-height: 175%;
}
.lba-nav-h5 {
	color: #16b1e6;
	font-size: 13px;
	font-weight: bold;
	border-bottom: solid 1px #CCCCCC;
	line-height: 200%;
}
.lba-ourTeam {
	margin-top: 0px;
}
.lba-i {
	margin-top: 0px!important;
	margin-bottom: 15px;
}
.lba-product-wraper {
	padding-bottom: 0px!important;
}
.lba-product {
	padding: 20px 30px;
}
.lba-header {
	background-image: none;
	border-top: solid 1px #ececec;
	padding: 20px 0px;
}
.lba-header h2 {
	color: #16b1e6;
	text-shadow: none;
}
.printed-lba-a4 h1 {
    font-size: 26px;
    font-weight: bold;
}
.lba-header h1 {
	color: #16b1e6;
	text-shadow: none;
}
.lba-header p {
	color: #333333;
	text-shadow: none;
}
.lba-nav-title {
	background-color: #17b1e3;
	border-radius: 4px;
	color: #fff;
	font-size: 16px;
	margin-bottom: 7.5px;
	padding: 10px;
	font-weight: bold;
	text-transform: uppercase;
}
.bg-n-border-radius {
	border-radius: 5px;
	background-color: white;
	box-shadow: 0 4px 0 #848484;
	display: block;
	transition: border 0.2s ease-in-out;
}
.send-popup-width{
    width:30%;
}
@media (max-width:850px) {
.send-popup-width{
    width:85%;
}

}
@media (max-width:360px) {
.lba-pagination {
	padding-top: 15px;
	text-align: center;
}

.lba-total-results {
	text-align: center;
}
.carousel {
	height: 190px !important;
	margin-bottom: 0px !important;
}
.carousel .item {
	height: 190px !important;
}
.lba-header p {
	font-size: 12px;
}
}
.hover-thumb-wrapper {
	width: 50%;
}
.hover-thumb-wrapper.img_wrap {
	width: 100%;
}
.ourTeam .i .c:hover img {
	opacity: 1 !important;
}
.label-applyapp {
	list-style: none;
	color: #333333;
	margin-top: 30px;
	margin-left: -35px;
	font-size: 14px;
	font-weight: normal;
}
.label-applyapp li {
	display: inline-flex;
}
.label-applyapp-number {
	color: #17b0e9;
	font-weight: bold;
}
.label-adjustment-heading {
	margin: -15px -10px -9px -15px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}
.lba-free-uk-btn {
	background: none !important;
	border-radius: 0px !important;
	box-shadow: none !important;
	padding: 0px !important;
}
.amount-highlight {
	font-size: 20px;
	text-transform: uppercase;
	font-weight: bold;
	color: #fd4913;
}
.free-uk-delivery-text {
	font-size: 26px;
	text-transform: uppercase;
	font-weight: bold;
	color: #fd4913;
}
.label-text-collapse {
	color: #16b1e6 !important;
	text-shadow: none !important;
	font-size: 14px !important;
}
.free-uk-delivery {
	font-size: 37px !important;
	font-weight: bold;
	color: #fd4913;
	margin-top: 0px !important;
}
.lba-text-area {
	background: none repeat scroll 0 0 #fff;
	border-radius: 5px;
	border-style: solid;
	border-width: 1px;
	box-sizing: border-box;
	display: block;
	outline: medium none;
	padding: 0px 10px;
	width: 100%;
	font-weight: normal !important;
	line-height: 32px;
}
.lba-design-service-banner {
	margin: 0px 0px 10px 0px !important;
	padding: 0px !important;
}
.lba-how-design-label-use {
	margin-left: 8px;
}
.lba-free-delivery-img-margin {
	margin-top: 15px;
}
[data-toggle="collapse"].collapsed .if-not-collapsed {
	display: none;
}
[data-toggle="collapse"]:not(.collapsed) .if-collapsed {
	display: none;
}
.lba-menu-icon {
	margin-right: 5px;
}
.lba-btn-margin {
	margin-top: 10px;
}
.lba-delivery-detail-button {
	margin-bottom: 25px;
}
.services-form {
	cursor: pointer;
}
.ourTeam .i .c .wrap img {
	width: auto;
	margin:2px auto;
}
.ourTeam .i .c .wrap img:hover{
	opacity: 0.5 !important;
	transform: scale(1.05);
}

.extra_box .lba-product {
	padding: 35px 22px !important;
}
.extra_box hr {
	margin: 27px 0 28px 0 !important;
}
.extra_box textarea {
	resize: none;
	height: 150px !important;
	/*margin-top: 30px;*/
}
</style>
<link href="<?=Assets?>labelfinder/css/filters.css" rel="stylesheet">
<link href="<?=Assets?>labelfinder/css/blue.css" rel="stylesheet">
<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
<div id="aa_loader" class="white-screen" style="display:none;" >
  <div class="loading-gif text-center" style="top:50%; z-index:150;">
	<img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:43px; ">
  </div>
</div>
<div class="container m-t-b-8 ">
  <div class="row">
    <div class="col-xs-12  col-sm-6 col-md-8 ">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Free Label Design Templates</li>
      </ol>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 "> </div>
  </div>
</div>

<div class="printed-lba-a4 lba-header">
  <div class="container ">
    <? include('header.php');?>
    </div>
</div>


<div class="bgGray">
  <div class="container"> 
    
    <!-- 9/5/2018 Updates Start -->
    <div class="col-md-3 col-sm-12">
      <div class="bg-n-border-radius lba-left-nav-container">
        <div class="lba-nav-title">Categories</div>
        <!-- Menu First Section Starts -->
        
        <?
		$categories = $this->home_model->get_lba_maincategories();
		foreach($categories as $cat)
		{
		?>
        <strong>
        <?=$cat->name?>
        </strong>
        <?
        $subcategories = $this->home_model->get_lba_categories_byid($cat->ID);
        if(!empty($subcategories))
        {
			
          foreach($subcategories as $subcat){ ?>
        <h5 class="lba-nav-h5"><span class="lba-menu-icon"> <img onerror='imgError(this);'  alt="Bottle Label Icon" src="<?=Assets?>images/<?=$subcat->link?>-icon.png"></span>
          <?=$subcat->name?>
        </h5>
        <?
		  
              $subsubcategories = $this->home_model->get_lba_subcategories($subcat->ID);
              if(!empty($subsubcategories)){  ?>
        <nav class="lba-left-nav">
          <ul>
            <? foreach($subsubcategories as $subcat2){ 
                    $count_cat = $this->db->query("SELECT COUNT(*) as count from lba_design WHERE categoryID LIKE '".$subcat2->CID."' and active LIKE 'Y' ")->row();
					$count_cat = $count_cat->count;
					
						$count_subcat = $this->db->query("SELECT COUNT(*) as count from lba_design des JOIN lba_subcategories sub ON sub.CID = des.categoryID JOIN lba_categories cat on sub.parent_category = cat.ID WHERE parent_category LIKE '".$subcat->ID."' and des.active LIKE 'Y'")->row();
					    $count_subcat = $count_subcat->count;
				   ?>
            <li>
                <?php
                
                if($count_cat <=0)
                {
                ?>
                
                 <a  href="#" class="coming_soon_modal" data-toggle="modal" data-target="#comingSoon">
              <?=$subcat2->sub_name?>
              (
              <?=$count_cat?>
              )</a> 
                
                <?php 
                }
                
                else
                {
                ?>
                
                
                <a href="<?=base_url()?>free-label-design-templates/<?=$subcat->link;?>/<?=$subcat2->link;?>">
              <?=$subcat2->sub_name?>
              (
              <?=$count_cat?>
              )</a> 
              
              <?php
                }
                ?>
              
              
              </li>
            <? } ?>
            <li>
              <? if($subcat->ID==1){ $showllname = "Bottle & Dispenser Labels"; } else if($subcat->ID==2){ $showllname = "Jar Labels"; } else if($subcat->ID==3){ $showllname = "Dry Packaging Labels"; }    ?>
              
              <?php
              if($count_subcat <= 0)
              {
                  ?>
                  
                  <a href="#" class="coming_soon_modal" data-toggle="modal" data-target="#comingSoon">Show All
              <?=$showllname?>
              (
              <?=$count_subcat?>
              )</a>
                  
                  
                  <?php
                  
                  
              }
              else
              {
              ?>
              <a href="<?=base_url()?>free-label-design-templates/<?=$subcat->link;?>">Show All
              <?=$showllname?>
              (
              <?=$count_subcat?>
              )</a>
              <?php
              }
              ?>
              
              
              </li>
          </ul>
        </nav>
        <? } } } }?>
        
        <!-- Menu Second Section End --> 
        
      </div>
      <div class="bg-n-border-radius lba-left-nav-container bgBlueHeading hide">
        <div class="bgBlueHeading lba-nav-title label-adjustment-heading">HOW TO USE LABELS BY APPLICATION</div>
        <ul class="label-applyapp">
          <li><span class="label-applyapp-number">1. </span><span class="lba-how-design-label-use">Select your choice of label design from the main and sub-categories in the menu options above.</span></li>
          <hr />
          <li><span class="label-applyapp-number">2. </span><span class="lba-how-design-label-use">View and select your preference/s from the designs, label shapes and sizes available to suit your application.</span></li>
          <hr />
          <li><span class="label-applyapp-number">3. </span><span class="lba-how-design-label-use">Personalise the selected design with your text and choice of icon/logo.</span></li>
          <hr />
          <li><span class="label-applyapp-number">4. </span><span class="lba-how-design-label-use">Save and order online and your labels are already on the way to you.</span></li>
        </ul>
      </div>
      
     <div class="bg-n-border-radius lba-left-nav-container">
        <div class="bgBlueHeading lba-nav-title label-adjustment-heading" style="margin: -15px -10px -9px -10px;">HOW TO USE OUR FREE LABEL DESIGN TEMPLATES</div>
          <div class="inforgraphics-step"><img onerror='imgError(this);' title="DPD Delivery Van" alt="DPD Delivery Van" src="<?=Assets?>images/lba/infographics-step.png" />          </div>
        </div>
         
         
         
         <style>
		 .inforgraphics-step{
			 padding-top: 20px;
		     text-align: center;
		 }
		 </style>
      
      <div class="bg-n-border-radius">
        <div class="col-sm-12 col-md-12 text-center lba-free-delivery-img-margin"> <img onerror='imgError(this);' title="DPD Delivery Van" alt="DPD Delivery Van" src="<?=Assets?>images/free-uk-delivery.png" />
          <h2 class="text-center free-uk-delivery">FREE UK DELIVERY</h2>
        </div>
        <p class="text-center"> On all Label by Application orders <br>
          over <span class="amount-highlight">£25</span> inc. VAT
        <div class=" fd lba-free-uk-btn text-center"> <a href="https://www.aalabels.com/delivery/" class="btn lba-delivery-detail-button">View Detail  &nbsp;<i class="fa fa-arrow-circle-right"></i></a> </div>
        </p>
      </div>
    </div>
    <!-- 9/5/2018 Updates End -->
    
    <div class="col-md-9 col-sm-12">
      <?php if($products):?>
      <div class="ourTeam lba-ourTeam">
        <div class="">
          <div class="row">
            <?
            foreach($products as $pro)
			{
				$shapesize = $this->db->query("SELECT COUNT(*) as count from lba_sets WHERE Designid = '".$pro->designID."' and display = 1 ")->row();
				$shapesize = $shapesize->count;
			?>
            <div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 i lba-i">
              <div class="c text-center lba-product-wraper">
                <div class="wrap lba-product"><img onerror='imgError(this);' class="img-responsive" alt="Labels by application" src="<?=Assets?>images/lba/<?=$pro->full_image?>">
                <b><?=$shapesize?> Shapes and Sizes</b> <br />
                <a class="lba-cta btn-block btn orange lba-btn-margin fldt-btn-template" href="<?=base_url()?>free-label-design-templates/<?=$pro->link1?>/<?=$pro->link2?>/<?=$pro->designID?>/">Select Design <i class="fa fa-chevron-right"></i></a> </div>
              </div>
            </div>
            <? } ?>
           
<style>
.service-banner-custom-background{
background-image:url(https://www.aalabels.com/theme/site/images/lba/servicebannerbg.jpg) !important;
background-repeat:no-repeat !important;
min-height:210px !important;
margin-bottom: 10px;
}
@media (max-width: 768px) {
.service-banner-custom-background {
background-image:none !important;
min-height:auto !important;
margin-bottom:10px;
}
.service-banner-custom-background .row {
margin-left: 5px !important;
margin-right: 5px !important;
}
.ul-mobile-adjust{
padding-left: 15px !important;
}
.need-design-btn{
margin-right: 17px;
}
#parallelogram {
margin-left: 36px !important;
}
}

							
#parallelogram {
width: 90px;
height: 0;
border-top: 20px solid #ffc14f;
border-right: 10px solid transparent;
margin-left: 22px;
border-left: 2px solid transparent
-ms-transform: rotate(20deg);
-webkit-transform: rotate(20deg);
transform: rotate(-2deg);
    font-weight: bold;
    margin-top: 15px;
}

.custom-text-bg-cta{
	width:98% !important;
	margin-left:1% !important;
	padding-right:0% !important
}

</style>          
            <div class="thumbnail lba-design-service-banner col-md-12 service-banner-custom-background custom-text-bg-cta">
                        <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12"></div>
                        <div class="col-md-3 col-sm-12 col-xs-12" style="padding-top: 10px;    padding-left: 7px;"><p style="font-size: 11px;font-weight: 600;text-align: justify;line-height:14px;">If you cannot find what you are looking for in our standard range. Our label design team will work with you to create other label designs that match your requirements and produce:</p>
                        <p style="font-size: 10px;text-align: justify;line-height: 10px;">(Please note: This is for the provision of design services only and does not include the cost of printed labels or new die-line cutters in the case of new label shapes and sizes.)</p>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12" style="padding-top: 10px;padding-right: 26px;">
                        <ul class="ul-mobile-adjust" style="font-size: 11px;font-weight: 600;/* text-align:justify; */padding-inline-start: 20px;"> <li>3 Initial Design Options </li>
                        <li>Up to 3 minor amendments on the chosen design option.</li>
                        <li>Standard &amp; Spot Colour Matching</li>
                        <li>Proof Reading</li>
                        <li>Content Compliance Check</li>
                        </ul>
                        
                        <div id="parallelogram"><span style="    bottom: 4px;
    position: absolute;
    font-size: 10px;
    color: #000000;
    left: 10px;
    transform: rotate(2deg) !important">£95.00 ex VAT</span></div>
                        <a style="width: 81%;padding: 6px !important;font-size: 12.4px;z-index: 100;margin-top: -1px !important;margin-right: 18px !important;" class="btn btn-block orangeBg pull-right product-url col-md-3 need-design-btn services-form lba-design-service-banner">Need Design Services <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        </div>
                        </div>
            
            <!-- total results and pagination start here-->
            <div class="row">
              <div class="col-md-6 lba-total-results"> Results:
                <?=$starting?>
                -
                <?=$ending?>
                (of
                <?=$totalrecord?>
                products)</div>
              <div class="col-md-6 lba-pagination">
                <nav>
                  <ul class="pagination pagination-sm">
                    <?=$links?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <?php else:?>
        <div class="ourTeam lba-ourTeam">
          <div class="thumbnail">
            <div class="" style="text-align:center; padding: 50px; font-size:14px;">
              <p> 
                  <img onerror='imgError(this);' class="img-responsive" style="margin: 0 auto;" src="<?=Assets?>images/lba/coming-soon.jpg"><br>
                  <div style="margin-bottom:10px;">The images for this category are temporarily unavailable and will be uploaded soon.</div>
                  <div>Our designers are continually producing new designs and label categories for customer use and if you have a label application that you think we should consider creating label designs for please let us know.</div>
              </p>
            </div>
          </div>
        </div>
        <?php endif;?>
      </div>
 
      
      <!--<div class="filter-margin"></div>-->
      
      <div id="ajax_model_desc"></div>
      <div id="ajax_material_sorting"> </div>
    </div>
  </div>
</div>
<div class="printed-lba-call" style="border:none;">
  <div class="container " >
    <div class="col-md-8 col-sm-12 col-lg-9">
      <h2>INFORMATION & ADVICE <br /></h2>
      <p class="text-justify">These high quality labels designs have been  produced to be easily adapted and  personalised for your product labels via the choice of text, font, colour and size in the text boxes.  Along with your choice of logo and icons to be used in the label designs. Enabling you to quickly create and receive product labels with a professional image, enhancing the packaging and  promoting the product.
 </p>
  <p class="text-justify">If you need any assistance in choosing a label design and size for your needs or using the label editing features, please refer to our help guide or contact our customer care team using the live-chat facility on the page, our website contact form, email or telephone who will be happy to help you.</p>
    </div>
    <div class="col-md-4 col-sm-12 col-lg-3"> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/call_opr_1.png"> </div>
  </div>
</div>
<style>
    .more_sizes{
        color: #17b1e3 !important;
        margin-right: -25px !important;
        margin-top: -7px;
    }
    
</style>
<!-- Form Modal Start -->
<div class="modal fade artworkModal1 aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md send-popup-width" >
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Design Services</b></h3>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <form class="labels-form " id="services_form"  action="<?=base_url();?>ajax/serviceform"  enctype="multipart/form-data">
              <div class=" m-t-b-10 ">
                <div>
                  <div class="col-sm-12">
                    <div class="col-md-12">
                      <label class="input"><i class="icon-append fa fa-user"></i>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name*" class="required" style="border-color:#cccccc !important">
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label class="input"><i class="icon-append fa fa-phone"></i>
                        <input type="text" name="contact" id="contact" placeholder="Enter Contact Number" class="" style="border-color:#cccccc !important">
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                        <input type="email" placeholder="Enter Your Email Address*" name="email_reg" id="email_reg" class="required" style="border-color:#cccccc !important">
                      </label>
                    </div>
                    
                   <div class="col-md-12">
                    <label class="input"> <i class="icon-append fa fa-upload"></i>
                     <input style="border: 1px solid #cccccc;height: auto !important;" type="file" placeholder="Upload File" name="userfile" id="userfile" aria-required="true">
                        </label>
                    </div>
                                        
                                        
                    <div class="col-md-12">
                      <textarea name="comment" class="lba-text-area required" placeholder="Enter Your Message*" style="border-color:#cccccc !important"></textarea>
                    </div>
                    <div class="col-md-12"> *Required Fields </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" id="activate-step-2" class="btn orangeBg text-center" style="
    padding: 5px 40px !important;">SEND </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="comingSoon" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
<div>
          
          <button type="button" class="close more_sizes" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
    <!-- Modal content-->
   
      <div clas="panel-body">
            <div class="" style="text-align:center; padding: 50px; font-size:14px;">
              <p> 
                  <img onerror="imgError(this);" class="img-responsive" style="margin: 0 auto;" src="https://www.aalabels.com/theme/site/images/lba/coming-soon.jpg"><br>
                  </p><div style="margin-bottom:10px;">The images for this category are temporarily unavailable and will be uploaded soon.</div>
                  <div>Our designers are continually producing new designs and label categories for customer use and if you have a label application that you think we should consider creating label designs for please let us know.</div>
              <p></p>
            </div>
            
            </div>
           

    </div>

  </div>
</div>
                                            
<script>
/************* Label Finder **********/
	 $("a.services-form").click(function(){
		$('.artworkModal1').modal('show');
	 });
	 
	 $("a.coming_soon_modal").click(function(){
		$('.comingSoon').modal('show');
	 });
   
     $(document).ready(function(){
	  $("#services_form").validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
	  submitHandler: function(form) {
	       var formData = new FormData(form);
	       $("#dvLoading").css('display','block');
	       $.ajax({
	           type:'POST',
            url: $(form).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
			dataType: 'json',
			success:function(data){
			 if(data.response=='error'){
				$('#server_error').text("Email address or password is invalid!");
				$('#server_error').show();
			 }else{
				document.getElementById("services_form").reset();
				$('.artworkModal1').modal('hide');
				swal("Message sent!", "Thank you for contacting us, our representative will contact you shortly.", "success");  
			 }
            },
            error: function(data){
              console.log("error");
            }
	       });
	  }
	  });
	  
	  
   });
   
   $(document).on("click",".fldt-btn-template",function(e){
	var _this = $(this);
	change_btn_state(_this,'disable','plain');
	
});
</script> 
