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
	font-size: 14px;
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
        <li class="active">Labels by application</li>
      </ol>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 "> </div>
  </div>
</div>
<div class="printed-lba-a4 lba-header">
  <div class="container ">
    <div class="col-md-7 col-sm-12">
      <h2>Labels by application</h2>
      <!-- 9/5/2018 Updates Start -->
      <p class="text-justify"> In this section of the website you will find a range of high quality pre-designed product labels just requiring completion by the inclusion of your product/s details in the font styles, colours and logo or image/s chosen by you and applied using the label editor function.
        This easy to use process is intended to provide you with the option to create professionally produced personalised designs, available to create and order online for fast delivery. </p>
      <div class="collapse" id="collapseExample">
        <p>There is a selection of label formats (shape and size) to suit most needs and once your label design is completed and the order placed the labels will be printed and despatched, it's as simple as that.<br />
          <br />
          If you still cannot find what you are looking for from the label designs available here, you also have the option of using our Label Designer free software to create your design, alternatively you can contact us and we will be happy provide a quote to design your label/s. </p>
      </div>
      <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> 
      <!--You can put any valid html inside these!--> 
      
      <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> 
      
      <!-- 9/5/2018 Updates End --> 
    </div>
    <div class="col-md-5 col-sm-12 lba-carousel">
      <div id="carousel-example-generic2" class="carousel slide carousel-fullscreen carousel-fade" data-ride="carousel"> 
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic2" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic2" data-slide-to="2"></li>
        </ol>
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="background-image: url(<?=Assets?>/images/lba/Bottles-1.jpg);"></div>
          <div class="item" style="background-image: url(<?=Assets?>/images/lba/Bottles-2.jpg);"></div>
          <div class="item" style="background-image: url(<?=Assets?>/images/lba/Bottles-3.jpg);"></div>
        </div>
      </div>
    </div>
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
                    $count_cat = $this->db->query("SELECT COUNT(*) as count from lba_design WHERE categoryID LIKE '".$subcat2->CID."'")->row();
					$count_cat = $count_cat->count;
					
						$count_subcat = $this->db->query("SELECT COUNT(*) as count from lba_design des JOIN lba_subcategories sub ON sub.CID = des.categoryID JOIN lba_categories cat on sub.parent_category = cat.ID WHERE parent_category LIKE '".$subcat->ID."'")->row();
					    $count_subcat = $count_subcat->count;
				   ?>
            <li><a href="<?=base_url()?>lba-page/<?=$subcat->link;?>/<?=$subcat2->link;?>">
              <?=$subcat2->sub_name?>
              (
              <?=$count_cat?>
              )</a> </li>
            <? } ?>
            <li>
              <? if($subcat->ID==1){ $showllname = "Bottle Labels"; } else if($subcat->ID==2){ $showllname = "Jar Labels"; } else if($subcat->ID==3){ $showllname = "Dry Packaging Labels"; }    ?>
              <a href="<?=base_url()?>lba-page/<?=$subcat->link;?>">Show All
              <?=$showllname?>
              (
              <?=$count_subcat?>
              )</a></li>
          </ul>
        </nav>
        <? } } } }?>
        
        <!-- Menu Second Section End --> 
        
      </div>
      <div class="bg-n-border-radius lba-left-nav-container bgBlueHeading">
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
				$shapesize = $this->db->query("SELECT COUNT(*) as count from lba_sets WHERE Designid = '".$pro->designID."'")->row();
				$shapesize = $shapesize->count;
			?>
            <div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 i lba-i">
              <div class="c text-center lba-product-wraper">
                <div class="wrap lba-product"><img onerror='imgError(this);' class="img-responsive" alt="Labels by application" src="<?=Assets?>images/lba/<?=$pro->full_image?>">
                <b><?=$shapesize?> Shapes and Sizes</b> <br />
                <a class="lba-cta btn-block btn orange lba-btn-margin" href="<?=base_url()?>lba-editor/<?=$pro->designID?>/">Select Design <i class="fa fa-chevron-right"></i></a> </div>
              </div>
            </div>
            <?
            }
			if(count($products) % 3 == 1):?>
            <div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 i lba-i extra_box">
              <div class="c text-center lba-product-wraper">
                <div class="wrap lba-product">
                  <p style="font-size: 17px;">Our designs are professionally created for commonly used jars and bottles. If you have a specific requirements for shape and size, our designers can help.</p>
                  <hr />
                  <p><strong>Please contact<br />
                    our customer care team<br />
                    <a href="mailto:customercare@aalabels.com">customercare@aalabels.com</a></strong></p>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 i lba-i extra_box">
              <div class="c text-center lba-product-wraper">
                <div class="wrap lba-product">
                  <h3 style="font-size: 20px;">Help us improve our site?</h3>
                  <form class="labels-form">
                    <div class="form-group">
                      <textarea placeholder="Add your comments here" class="form-control" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-block orange">Send</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <? elseif(count($products) % 3 == 2):?>
            <div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 i lba-i extra_box">
              <div class="c text-center lba-product-wraper">
                <div class="wrap lba-product">
                  <p style="font-size: 17px;">Our designs are professionally created for commonly used jars and bottles. If you have a specific requirements for shape and size, our designers can help.</p>
                  <hr />
                  <p><strong>Please contact<br />
                    our customer care team<br />
                    <a href="mailto:customercare@aalabels.com">customercare@aalabels.com</a></strong></p>
                </div>
              </div>
            </div>
            <? endif;?>
            <div class="thumbnail lba-design-service-banner col-md-12"> <a class="services-form"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/LBA-Banner.jpg" alt="How Design Service Work" /> </a> </div>
            
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
            <div class="">
              <h3>No
                <?=(isset($_GET['per_page']) and $_GET['per_page']) !=''?' More ':''?>
                Products Available</h3>
            </div>
          </div>
        </div>
        <?php endif;?>
      </div>
      <?php 
			//include(APPPATH.'/views/labelfinder/label_filters.php')?>
      
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

<!-- Form Modal Start -->
<div class="modal fade artworkModal1 aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Design Services</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <form class="labels-form " id="services_form"  method="post" action="">
              <div class=" m-t-b-10 ">
                <div>
                  <div class="col-sm-12">
                    <div class="col-md-12">
                      <label class="input"><i class="icon-append fa fa-user"></i>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name*" class="required">
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label class="input"><i class="icon-append fa fa-phone"></i>
                        <input type="text" name="contact" id="contact" placeholder="Enter Contact Number" class="">
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                        <input type="email" placeholder="Enter Your Email Address*" name="email_reg" id="email_reg" class="required">
                      </label>
                    </div>
                    <div class="col-md-12">
                      <textarea name="comment" class="lba-text-area" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div class="col-md-12"> *Required Fields </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" id="activate-step-2" class="btn orangeBg text-center">SEND <i class="fa fa-arrow-circle-right"></i> </button>
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
<script>
/************* Label Finder **********/
	 $("a.services-form").click(function(){
		$('.artworkModal1').modal('show');
	 });

   $(document).ready(function(){
	      var form = $("#services_form");
		  form.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
		  submitHandler: function(form) {
			  $("#services_form .btn").attr("disabled","disabled").html("Please Wait <i class='fa fa-spin fa-spinner'></i>");
			  	$.post(base+'ajax/serviceform', $("#services_form").serialize(), function(data) {
					$("#services_form .btn").removeAttr("disabled").html("Submit Now <i class='fa fa-arrow-circle-right'></i>");
						 if(data.response=='error'){
							$('#server_error').text("Email address or password is invalid!");
							$('#server_error').show();
						 }else{
						    document.getElementById("services_form").reset();
							$('.artworkModal1').modal('hide');
							swal("Message sent!", "Thank you for contacting us, our representative will contact you shortly.", "success");  
						 }
						
						return false;   
				},'json');
					   
			return false;
	     }
	  });
   });
</script> 
