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
	background-size: cover;
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
	height: 281px !important;
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

.ourTeam .i .c:hover img
{
	opacity:1 !important;
}
</style>
<link href="<?=Assets?>labelfinder/css/filters.css" rel="stylesheet">
<link href="<?=Assets?>labelfinder/css/blue.css" rel="stylesheet">
<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
<div id="aa_loader" class="white-screen" style="display:none;" >
  <div class="loading-gif text-center" style="top:50%; z-index:150;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:43px; "> </div>
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
      <p class="text-justify">The labels found in the categories below have application in both home and workplace locations, many of which are editable to include your details, or amended wording and all can be ordered online for fast delivery. Available in small and large formats (A4) as standard and larger formats (SRA3) if required, from as little as one self-adhesive label (A4), or sheet of labels. Representing a value for money and an easily changed or replaced, source of advisory and instructional signage. Helping to comply with HSE guidelines and legislation, keeping the workplace and public areas of buildings and homes, safer places.</p>
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
          <div class="item active" style="background-image: url(<?=Assets?>/images/lba/lba-slider-bg.jpg);"></div>
          <div class="item" style="background-image: url(<?=Assets?>/images/lba/lba-slider-bg-2.jpg);"></div>
          <div class="item" style="background-image: url(<?=Assets?>/images/lba/lba-slider-bg.jpg);"></div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="col-md-3 col-sm-12">
      <div class="bg-n-border-radius lba-left-nav-container">
        <div class="lba-nav-title">Categories</div>
        <?
		$categories = $this->home_model->get_lba_categories();
		foreach($categories as $cat)
		{
		?>
        <h5 class="lba-nav-h5">
          <?=strtoupper($cat->name)?>
          LABELS</h5>
        <?
			$subcategories = $this->home_model->get_lba_subcategories($cat->ID);
			if(!empty($subcategories))
			{
			?>
        <nav class="lba-left-nav">
          <ul>
            <?
				foreach($subcategories as $subcat)
				{
					//$count_subcat = $this->db->query("SELECT COUNT(*) as count from lba_subcategories WHERE sub_name LIKE '".$subcat->sub_name."'")->row();

					$count_subcat = $this->db->query("SELECT COUNT(*) as count from lba_design des JOIN lba_subcategories sub on sub.CID = des.categoryID WHERE sub.sub_name LIKE '".$subcat->sub_name."'")->row();
					$count_subcat = $count_subcat->count;
					
					//$count_cat = $this->db->query("SELECT COUNT(*) as count from lba_subcategories WHERE parent_category LIKE '".$cat->ID."'")->row();
					
					$count_cat = $this->db->query("SELECT COUNT(*) as count from lba_design des JOIN lba_subcategories sub ON sub.CID = des.categoryID JOIN lba_categories cat on sub.parent_category = cat.ID WHERE parent_category LIKE '".$cat->ID."'")->row();
					$count_cat = $count_cat->count;
				?>
            <li><a href="<?=base_url()?>lba-page/<?=strtolower(str_replace(" ","-",$cat->name));?>/<?=strtolower(str_replace(" ","-",$subcat->sub_name));?>"><?=ucwords($subcat->sub_name)?>(<?=$count_subcat?>)</a> </li>
            <? } ?>
            <li><a href="<?=base_url()?>lba-page/<?=strtolower(str_replace(" ","-",$cat->name));?>">Show All <?=$cat->name?> Labels (<?=$count_cat?>)</a></li>
            <? } ?>
          </ul>
        </nav>
        <?
		}
		?>
      </div>
    </div>
    <div class="col-md-9 col-sm-12">
      <?php if($products):?>
      <div class="ourTeam lba-ourTeam">
        <div class="">
          <div class="row">
            <?
            foreach($products as $pro)
			{
			?>
            <div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 i lba-i">
              <div class="c text-center lba-product-wraper">
                <div class="wrap lba-product"><img onerror='imgError(this);' class="img-responsive" alt="Labels by application" src="<?=Assets?>images/lba/<?=$pro->full_image?>"> 
                <a class="lba-cta btn-block btn orangeBg" href="<?=base_url()?>lba-sets/<?=$pro->designID?>/">Use This Template <i class="fa fa-chevron-right"></i></a>
                </div>
                
              </div>
            </div>
            <?
            }
			?>
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
    <div class="col-md-8 col-lg-9 col-sm-12">
      <h2>INFORMATION & ADVICE <br />
        <small>We’re here to help you chose the label that’s right for you.</small></h2>
      <p class="text-justify">If you need assistance or help deciding which label format you require for your application, or the material and adhesive, or size most suited. Please contact our customer care team, via the live-chat facility on the page, our website contact form, telephone, or email and they will be happy to discuss your requirements.</p>
    </div>
    <div class="col-md-4 col-sm-12 col-lg-3"> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/call_opr_1.png"> </div>
  </div>
</div>
<script>
/************* Label Finder **********/
var contentbox = $('#ajax_material_sorting');
$( document ).ready(function() {
});	


	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})

 
	$(document).on("change", "#integrate_filter", function(e) {
		var val = $(this).val();
		window.location.href = base+val;
		
	});
	$(document).on("click", ".pull-left > a", function(e) {
	       var id=$(this).attr('id');
			var curent_class = $(this).attr('class');
			if(curent_class=='btn blueBg'){
				var src = $("#int_"+id).attr('alt');
				$(this).removeClass('btn blueBg');
				$(this).addClass('btn orangeBg');
				$("#int_"+id).attr('src',base+'theme/site/images/categoryimages/Integrated/'+src);
			}else{
				
				var src = $("#int_"+id).attr('title');
				$(this).removeClass('btn orangeBg');
				$(this).addClass('btn blueBg');
				$("#int_"+id).attr('src',base+'theme/site/images/categoryimages/Integrated/'+src);
			}
    });
</script> 