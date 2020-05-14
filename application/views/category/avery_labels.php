<link href="<?=Assets?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
<script src="<?=Assets?>labelfinder/js/newlabelfinder.js?ver=<?=time()?>"></script>
<style type="text/css">
.printed-lba-a4 h1 {
	color: #fff;
	font-size: 26px;
	font-weight: bold;
}
</style>

<div id="aa_loader" class="white-screen" style=" display:none;" >
  <div class="loading-gif text-center" style="top:50%; z-index:150;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:43px; " alt="AA Labels Loader"> </div>
</div>
<div class="">
  <div class="container m-t-b-8 ">
    <div class="row">
      <div class="col-xs-12  col-sm-6 col-md-8 ">
        <ol class="breadcrumb  m0">
          <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
          <li class="active">Avery&reg; Sized Labels</li>
        </ol>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 ">
        <div class="pull-right"> <a role="button" target="_blank" class="btn orangeBg" href="<?=base_url()?>virtual-catalogue/"> <i class="fa fa-desktop"></i> Virtual Catalogue </a> </div>
      </div>
    </div>
  </div>
</div>
<div class="printed-lba-a4 ">
  <div class="container ">
    <div class="col-md-8 col-sm-12  ">
        <!-- AA48 STARTS -->
      <h1>Buy Avery® Labels Online</h1>
      <style>
          .read_more_less_style {
              font-size: 16px;
              font-weight: bold; 
              cursor: pointer;
          } .showCompleteText {
              height: auto !important;
              overflow: none !important;
          } .showLessText {
              height: 120px !important;
              overflow: hidden !important;
          }
      </style>

      <div style="height: 120px; overflow: hidden;" id="actionContainer">

        <p class="text-justify">
            <p>Avery® labels refers to a series of design templates and products produced by the Avery Dennison Corporation that are widely used in labelling and printing. A number of software programmes feature in-built Avery® templates, so we offer a choice of well over 500 shapes and sizes that are compatible with these design templates to make ordering and printing your labels easy.</p>

            <p>For quick and easy compatibility with Avery® labels templates, search our label size options at the bottom of the page. Use your usual Avery® code reference number to get started.</p>

            <p>AA Labels produces a broad range of A4 sheets that are compatible with Avery® formats, which we can supply plain or printed. Our industrial printers ensure a professional finish of the highest quality – perfect for products and packaging.</p>

            <p>Ideal for users of Avery® design templates who are looking for a wide range of choice of size, shape, colour and material, our selection offers a solution for every application. Whether you require labels for parcels, envelopes, boxes, or other purposes, we have just what you need. With matt paper, pearlescent finishes, metallic finishes, brown parcel paper and more, as well as materials compatible with inkjet and lase printers, we’re confident we have the exact labels you’re looking for.</p>

            <p>We also offer next day delivery to ensure you receive your Avery® labels when you need them.</p>

            <p>Start your search for Avery® labels below.</p>

            <p><small><strong>Disclaimer:</strong> AA Labels products are not made or endorsed by Avery®. Avery® is a trademark of CCL Industries Inc., registered in the UK and other countries. References to Avery® are solely used to indicate compatibility for label sizes and templates.</small></p>
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
        <!-- AA48 ENDS -->
        
        
        
    </div>



    <div class="col-md-4 col-sm-12 "> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/lba-a4-img.png" alt="Labels on Sheets"> </div>



  </div>
<!--    <div class="col-md-12 hidden-lg">-->
<!---->
<!--        <div   class="designer-tool-tab-text text-center padding-15  ">-->
<!--            To access this tool you need to browse this page from your laptop or desktop computer.-->
<!--        </div>-->
<!---->
<!--    </div>-->
</div>
<div class="bgGray">
  <div class="container">
    <?php  $category = 'A4';  $shape = '';
               include_once(APPPATH.'/views/labelfinder/label_filters.php')?>
    <div class="filter-margin"></div>
    <div id="ajax_model_desc"></div>
    <div id="ajax_material_sorting">
      <div class="row">
        <div class="row">
          <? foreach($records as $pro){
                    $url = '';
                    $compitable = $this->home_model->avery_equilent($pro->CategoryID);
                    $x=explode("-",$pro->CategoryName);
                    $catname = $x[0];
                    $LabelSize = $x[1];
                    $code = explode('.',$pro->CategoryImage);
                    $url = base_url().'a4-sheets/'.strtolower($pro->Shape).'/'.strtolower($pro->CategoryID).'/';   ?>
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-20-p ">
            <div class="thumbnail">
              <div class="zoom">
                <p><a href="#" data-toggle="modal" data-target=".layout"  class="layout_specs" id="<?=$pro->CategoryID?>" > <i class="fa fa-search-plus zoomIcon"></i></a> </p>
              </div>
              <div class="imgBg text-center"> <img onerror='imgError(this);'   src="<?=Assets."images/categoryimages/A4Sheets/".$pro->CategoryImage;?>" alt="labels Image " width="125" height="176" > </div>
              <div class="caption">
                <h2>Compatible with Avery&reg; <span>Templates:
                  <?=str_replace(",",", " ,$compitable)?>
                  </span> </h2>
                <p>
                  <?=$catname?>
                </p>
                <div class="row">
                  <p class="col-md-8"><strong>Label Size</strong><br>
                    <?=$LabelSize?>
                  </p>
                  <p  class="col-md-4" ><strong>Code</strong><br>
                    <?=$code[0]?>
                  </p>
                </div>
                <a role="button" class="btn-block btn orange" href="<?=$url?>"> <i class="fa fa-arrow-circle-right"></i> Select </a> </div>
            </div>
          </div>
          <? } ?>
        </div>
      </div>
    </div>
    <div class="thumbnail row ">
      <p class="text-center "><strong>Disclaimer: </strong>AALabels products are not made or endorsed by Avery&reg;. Avery&reg; is a trademark of CCL Industries Inc., registered in the UK and other countries. 
        References to Avery&reg; are solely used to indicate compatibility for label sizes and templates.</p>
      <hr class="m0 ">
      <p class="text-center m-t-10"> <strong>If you know the code for the Avery&reg; label size you need, click on the appropriate code below to go to our same size equivalent: </strong></p>
      <div class=" p-l-r-10">
        <div class="col-md-12">
          <ul class="list-unstyled">
            <? 	foreach($tempcatarray as  $row) {  $url = '';
                                            $url = base_url().'a4-sheets/'.strtolower($row[3]).'/'.strtolower($row[2]).'/'; ?>
            <li class="col-xs-3 col-sm-2 col-md-2"><i class="fa fa-arrow-circle-right"></i> <a href="<?=$url?>">
              <?=$row[0]?>
              </a> </li>
            <? }  ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="printed-lba-call ">
  <div class="container " >
    <div class="col-md-8 col-lg-9 col-sm-12">
      <h2>INFORMATION & ADVICE <br />
        <small>We’re here to help you chose the label that’s right for you.</small></h2>
      <p class="text-justify">If you need assistance or help deciding which label material, colour, finish, or adhesive is suitable for the label application and the Avery&reg; size equivalent. Please contact our customer care team, via the live-chat facility on the page, our website contact form, telephone, or email and they will be happy to discuss your requirements.<br />
        <br />
        <small><strong>Disclaimer</strong>: AALabels products are not made or endorsed by Avery&reg;. Avery&reg; is a trademark of CCL Industries Inc., registered in the UK and other countries. References to Avery&reg; are solely used to indicate compatibility for label sizes and templates.</small> </p>
    </div>
    <div class="col-md-4 col-sm-12 col-lg-3 "> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/call_opr_1.png" alt="Customer Support"> </div>
  </div>
</div>

<!-- Layout modal -->
<div class="modal fade layout aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Label Layout</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div id="ajax_layout_spec" ></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Layout modal --> 

<script>

	/************* Label Finder **********/
	var contentbox = $('#ajax_material_sorting');
	
	$( document ).ready(function() {
		$('.fnTop').show().slideDown( "fast" );
		$( ".labels-filters-form" ).slideUp( "fast" );
		change_text('VIEW FILTERS');
		<? if(isset($category) and $category!=''){?>
				filter_data('autoload', '');
		<? }?> 
	});	


</script> 