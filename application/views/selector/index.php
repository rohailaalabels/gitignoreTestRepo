<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
<link href="<?=Assets?>labelfinder/css/labels-by-app.css" rel="stylesheet">
<link href="<?=Assets?>labelfinder/css/filters.css" rel="stylesheet">
<link href="<?=Assets?>labelfinder/css/blue.css" rel="stylesheet">
<script src="<?=Assets?>labelfinder/js/icheck.js"></script>
<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
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
.custom-label-tool_box {
	height: 220px;
	padding: 5px 20px;
}
.ds-intro .inner {
	background: rgba(0, 0, 0, 0.6) none repeat scroll 0 0;
	border-radius: 4px;
	color: #fff;
	font-size: 14px;
	padding: 30px 15px !important;
	text-align: justify;
	text-shadow: 0 0 1px rgb(0, 0, 0);
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
</style>
<link href="" rel="stylesheet">

<div id="aa_loader" class="white-screen" style=" display:none;" >
  <div class="loading-gif text-center" style="top:95%; z-index:150000;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:43px;" alt="AA Labels Loader"> </div>
</div>
<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li  class="active">Search Template</li>
      </ol>
    </div>
  </div>
</div>
<div class="custom-label-tool_Bg">
  <div class="container">
      <div class="col-sm-1 col-md-2 col-lg-1"></div>
    <div class="col-md-10 col-lg-7 col-xs-12 col-sm-10">
      <div > <img onerror='imgError(this);' class="img-responsive m-t-10 " src="<?=Assets?>images/designer_app2s.png" alt="AA Labels Custom Design Tool"/> </div>
    </div>
    <div class="col-md-12 col-lg-4 m-t-30">
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
                      height: 265px !important;
                      overflow: hidden !important;
                  }
                  .custom-label-tool_Bg p {
                      margin-top: 9px;
                  }
                </style>

                <div style="height: 265px; overflow: hidden;" id="actionContainer">
                    <h1 style="font-size: 21px; font-weight: bold; margin: 0;">Download Our Free Label Templates</h1>
                    <p class="hidden-sm hidden-md" style="margin-top: 10px;">
                        <p>Our free label templates are designed to meet all of your labelling needs. Ideal for helping you to correctly position text and images when printing labels at home or in the workplace, our templates are compatible with a range of standard labels and software.</p>
                        <p>Use our Template Selector tool below to quickly find the label shape and dimensions for the template you require. We stock a large range of shapes and sizes on A4, A3 and SRA3 sheets.</p>
                        <p>Browse our range of free label templates to find rectangles, squares, circles and stars, or choose from our selection of more unusual shapes, such as tamper evident label templates or those with perforations.</p>
                        <p>By using the filters to make your selection and clicking on the required label size, you will have the option to download a free template as an MS Word file or PDF. The dimensions featured on each template make it easy to print your own labels at home.</p>
                        <p>You can use the design elements available to upload images and create your label design, before downloading and printing your finished labels.</p>
                        <p>Alternatively, choose from our selection of professional, pre-designed product label templates, which can be easily customised. Our <a href="https://www.aalabels.com/free-label-design-templates/" style="color:#FFF;text-decoration:underline;" >free label design templates</a> are ideal for a range of applications, including jars for jam or honey, cosmetics containers, body care bottles and dispensers, candle vessels and more, and benefit from editable functions that you can personalise with your own logo, images and text.</p>
                        <p>Start your search for free label templates today.</p>
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

  </div>

    <div class="col-md-1 hidden-lg"></div>
      <div class="col-md-10 hidden-lg">

          <div   class="designer-tool-tab-text text-center padding-15  ">
              To access this tool you need to browse this page from your laptop or desktop computer.
          </div>

      </div>


  </div>
</div>
<div class="bgGray hidden-sm hidden-md" >
  <div class="container">
    <div class="clear15"></div>
    <div class="thumbnail orange-bottom no-margin no-padding-bottom" style="min-height: 100px; ">
      <div class=" row fnTop finderNote2">
        <div class="col-md-11 text-center ">
          <p class="no-margin f-14 p-t-10 ">The Label Finder enables you to select and view products that closely match your search criteria through the use of filters and search tools. Click on the "SHOW FILTERS" button below to begin using.</p>
        </div>
        <div class="col-md-1 text-left"> <i class="fa fa-filter bg_filter" aria-hidden="true"></i> </div>
      </div>
      <form class="labels-form m-t-10" id="filter-form">
        <input type="hidden" value="designer"  id="page_type"   />
        <input type="hidden" value="category"  id="view"   />
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <label class="select">
              <select id="newcategory" name="category" autocomplete="off">
                <option value="">Select</option>
                <option <? if($category=='A4'){ echo 'selected="selected"';}?> value="A4" >A4 Templates</option>
                <option <? if($category=='A3'){ echo 'selected="selected"';}?> value="A3">A3 Templates</option>
                <option <? if($category=='SRA3'){ echo 'selected="selected"';}?> value="SRA3">SRA3 Templates</option>
              </select>
              <i></i> </label>
          </div>
          <div class="clear"></div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="shape_text" class="labelF"> Label Shapes </div>
            <input type="hidden" id="shape" value="<?=ucwords($shape);?>" />
            <div id="shapes_box">
              <button type="button" disabled="disabled" class="btn_shape circular"  data-toggle="tooltip" title="Circular"></button>
              <button type="button" disabled="disabled" class="btn_shape rectangle" data-toggle="tooltip" title="Rectangle"></button>
              <button type="button" disabled="disabled" class="btn_shape square"    data-toggle="tooltip" title="Square"></button>
              <button type="button" disabled="disabled" class="btn_shape oval"      data-toggle="tooltip" title="Oval"></button>
              <button type="button" disabled="disabled" class="btn_shape star"      data-toggle="tooltip" title="Star"></button>
              <button type="button" disabled="disabled" class="btn_shape heart"     data-toggle="tooltip" title="Heart"></button>
              <button type="button" disabled="disabled" class="btn_shape triangle"  data-toggle="tooltip" title="Triangle"></button>
              <button type="button" disabled="disabled" class="btn_shape perforated" data-toggle="tooltip" title="Perforated"></button>
              <button type="button" disabled="disabled" class="btn_shape irregular"  data-toggle="tooltip" title="irregular"></button>
              <button type="button" disabled="disabled" class="btn_shape anti-tamper" data-toggle="tooltip" title="anti-tamper"></button>
            </div>
          </div>
          <div class="clear15"></div>
          <div class="col-lg-7 col-md-7 col-sm-12 m-t-15">
            <label class="checkbox p-b-10">
              <input type="checkbox" id="opposite_dimension" checked="checked"  name="opposite_dimension" value="0" class="textOrange ">
              <i></i> Include opposite dimensions in the search criteria e.g. Height for Width </label>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 m-t-15">
            <div class="cBlueF no-margin no-padding">
              <p class="no-padding"> <span id="label_counter1">
                <?=(isset($records['list']) && count($records['list'])>0)?count($records['list']):0?>
                </span>
                <label style=" font-weight:normal;" class="viewtype">Templates</label>
              </p>
            </div>
          </div>
          <div id="cornerradius_box" class="col-lg-12 col-md-12 col-sm-12 m-t-10 no-padding" style="display:none;">
            <div class="col-lg-3 col-md-3 col-sm-12 no-margin-left m-t-15 labelF"> Corner Radius </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
              <label class="select">
                <select name="cornerradius" id="cornerradius" class="nlabelfilter">
                  <option  value="">Select Label Corner</option>
                  <option value="sharp">Sharp corner</option>
                  <option value="rounded">Rounded corner</option>
                </select>
                <i></i> </label>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="input-group">
              <input class="form-control" placeholder="Have a Product Code ?" type="text" id="filter_search_box">
              <span class="input-group-addon">
              <button type="button" style="background: transparent; border: 0px" id="filter_search_handler"> <i class="fa fa-search" aria-hidden="true"></i> </button>
              </span> </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12"> <a href="javascript:void(0);" class="btn btn-block blue2 reset_button" role="button"> <i class="fa fa-refresh"></i> Reset</a>
            <div class="clear10"></div>
          </div>
          <div class="clear25"></div>
          <div id="width_box" class="col-lg-6 col-md-6 col-sm-12">
            <div id="width_box_text" class="labelF"> Label Width </div>
            <div class="">
              <label class="input pull-left" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Min width" id="width_min" name="width_min">
              </label>
              <label class="input pull-right" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Max width" id="width_max" name="width_max">
              </label>
            </div>
            <div class="lablefilterslider" style="clear:left; background-color:#fff;">
              <div id="width_slider" class="slider sliderRange sliderBlue"></div>
            </div>
          </div>
          <div id="height_box" class="col-lg-6 col-md-6 col-sm-12">
            <div class="labelF"> Label height</div>
            <div class="">
              <label class="input pull-left" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Min height" id="height_min" name="height_min">
              </label>
              <label class="input pull-right" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Max height" id="height_max" name="height_max">
              </label>
            </div>
            <div class="lablefilterslider" style="clear:left; background-color:#fff;">
              <div id="height_slider" class="slider sliderRange sliderBlue"></div>
            </div>
          </div>
          <div class="clear p-b-10"></div>
        </div>
        <div class="clear"></div>
        <div class="clear"></div>
        <input type="hidden" value="0" id="product_count" />
        <input type="hidden" value="0" id="start_limit" />
        <div class="clear"></div>
      </form>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
      <button class="show-h"><span><i aria-hidden="true" class="fa fa-bars"></i>
      <div class="clea"></div>
      Hide Filters</span></button>
    </div>
    <div class="clear10"></div>
    
    <!--------------------------------------------------------------> <!-------------------------------------------------------------->
    <div id="content-slider" class="lb-filer-slider" ></div>
    <!--------------------------------------------------------------> <!-------------------------------------------------------------->
    
    <div class="row hide" id="flash_header">
      <div class="col-lg-12 col-md-12 col-sm-12 selected-product">
        <div class="spec">
          <div class="col-lg-1 col-md-6 col-sm-12" id="header-image"> <img onerror='imgError(this);' src="" height="60"> </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
            <p style=""><strong id="H1" style="color:#17b1e3;vertical-align:middle;">2 Oval Labels per A4 sheet </strong> <br>
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
    
    <!--------------------------------------------------------------> <!-------------------------------------------------------------->
    <? $hide = (isset($shape) && $shape!="")?"style='display:none'":"";?>
    <div id="designer_intro" class="row" <?=$hide?>>
      <? include('home.php');?>
    </div>
    <? $show = (isset($shape) && $shape!="")?'':'hide';?>
    <div id="ajax_finder_content" class="<?=$show?>" style="z-index:36;position:relative;">
      <? include('category.php');?>
    </div>
    <div id="ajax_flash_content" style="z-index:36;position:relative;width: 1200px;"></div>
  </div>
  
  <!--------------------------------------------------------------> <!-------------------------------------------------------------->
  
  <input type="hidden" value="" id="scroller"/>
  <div class="clear"></div>
  <div class="clear15"></div>
</div>
</div>
<div class="whiteBg3">
  <div class="container text-center">
    <p style="padding-top:20px; "> <span class="cBlue f-20">
      <?=EMAIL?>
      </span> </p>
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

$(window).load(function() { 
	<? if(empty($category)){?>
	      $(".show-h").trigger( "click" );
		  intialize_width_slider();
		  intialize_height_slider();
		  apply_hover_effect();
		  //filter_data('autoload', '');
	<? }?> 
	
	<? if(isset($category) && $category!=""){?>
	     intialize_width_slider();
		 intialize_height_slider();
	     apply_hover_effect();
	     filter_data('autoload', '');
	<? }?> 
});	
</script> 
<script>


   function filter_data(trigger, color){	
   
	var checker = $( "#ajax_flash_content" ).is( ":empty" );
	if(checker==false){ 
	 var div_open = 'slide';
	}else{  
	 var div_open = 'list';	
	}
	
	
					
	if(trigger=='category'){ 
	 $('#height_min').val(''); 
	 $('#height_max').val('');
	 $('#shape').val('');	
	 
	 $('#width_min').val(''); 
	 $('#width_max').val('');
	 $('#finish').val('');
	 $('#cornerradius').val('');
	 
	 $('#width_box_text').html('Label Width');
	 $('#height_box').css('visibility','');
    }
		
		
		var shape = $('#shape').val();				
		var category = $('#newcategory').val();
		var printer = $('#printer').val();
		var page = $('#page_type').val();
		
		
		
		
		if(shape=='Rectangle' || shape=='Square'){
		 $('#cornerradius_box').show();
		}else{
		 $('#cornerradius_box').hide();
		 $('#cornerradius').val('');
		}
		
		if(shape=='Circular' || shape=='Square'){
		   if(shape=='Circular'){
			$('#width_box_text').html('Label Diameter');
		   }else{
			$('#width_box_text').html('Label Width');
		   }
		 $('#height_box').css('visibility','hidden');
	   }else{
		 $('#height_box').css('visibility','');
		 $('#width_box_text').html('Label Width');
	   }
	  
	 	
		var height_min = $('#height_min').val();
		var height_max = $('#height_max').val();
		var width_min = $('#width_min').val();
		var width_max = $('#width_max').val();
		
		if(trigger=='shape'){ 
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
		
		if(category.length < 1 ){
		  alert_box('Please select label category first ');
				//$('#shape').html('<option value="" >Label Shape</option>');
		}else{
			
			$element = $('.nlabelfilter');
			$element.prop('disabled', true);
			$element.attr('disabled', true); 
			
			$('#aa_loader').show();
			$('#filter-form').css('opacity','0.5');
			$('#home_finder').prop('disabled', true);
		    disable_slider_option('disabled');
		 

	        	var request =  $.ajax({
					url: base+'selector/templateselection',
					type:"POST",
					async:"false",
					dataType: "html",
					data: {
							category: category,
							shape: shape,
							width_min:width_min,
							width_max:width_max,
							height_min:height_min,
							height_max:height_max,
							cornerradius:cornerradius,
							page:page,
							trigger:trigger,
							div_open:div_open,
							opposite:opposite
					},
				success: function(data){
				if(!data==''){	
				
						old_flag = 0;
						$element.prop('disabled', false);
						$element.attr('disabled', false); 
		
		
						data = $.parseJSON(data);  
						if(data.response=='yes'){
						  
						  $('.viewtype').html(' Templates ');
						  
						  if(trigger=='category'){
							$('#shapes_box').html(data.shapes);
						  }
					
						//if(trigger=='autoload' && div_open=='slide'){
//						  $(".show-h").trigger( "click" );
//						}	
							
						if(trigger!='autoload'){		
							$('#start_limit').val(0);
							$('#label_counter').html(data.count_format);
							$('#label_counter1').html(data.count_format);
							$('#product_count').val(data.count);
						}
						
						if(trigger!='autoload'){	
							 if(div_open=='slide'){ 
							  $('#content-slider').html(data.html);
							 }else{
							  $('#ajax_finder_content').removeClass('hide');
							  $('#designer_intro').hide();
							  tutorial_video.pause();	 
							  $('#ajax_finder_content').html(data.html);
							 }
						 }
							if(trigger=='autoload'){
								$('#shapes_box').html(data.shapes);
							}
							
							if(trigger=='shape' || trigger=='category' || trigger=='autoload' ){ 	
								
									if(shape=='Circular' || shape=='Square'){
										if(trigger!='width'){ 
											if(data.min_width && data.max_width){
												update_width_range(parseFloat(data.min_width), parseFloat(data.max_width));
												update_width_values(parseFloat(data.min_width), parseFloat(data.max_width));
											}
										}
									
									}else{
										
										if(trigger!='width'){ 
											if(data.min_width && data.max_width){
												update_width_range(parseFloat(data.min_width), parseFloat(data.max_width));
												update_width_values(parseFloat(data.min_width), parseFloat(data.max_width));
											}
										}
										
										if(trigger!='height'){ 
											if(data.min_height && data.max_height){
												update_height_range(parseFloat(data.min_height), parseFloat(data.max_height));
												update_height_values(parseFloat(data.min_height), parseFloat(data.max_height));
											}
										}
									}
							
								   
							}
							
							
							disable_slider_option('enable');	
							apply_hover_effect();
							$('[data-toggle="tooltip"]').tooltip();
							$('#aa_loader').hide();
							$('#filter-form').css('opacity','1');
							$('#home_finder').prop('disabled', false);
							
					
						}
						
					}
				 }  
			});
		  	 
	 }		
 }
</script> 
<script>


var old_flag = 0;	
var default_min_h = 0;
var default_max_h = 0;
var default_min_w = 0;
var default_max_w = 0;

var request = null;
var tutorial_video = document.getElementById("tutorial_video");

function apply_hover_effect(){
	$('.thumbnail').hover(
		function(){
			$(this).find('.zoom').slideDown(250); //.fadeIn(250)
		},
		function(){
			$(this).find('.zoom').slideUp(250); //.fadeOut(205)
		}
	); 
}


 function flash_is_open(){
  return $( "#ajax_flash_content" ).is( ":empty" );
 }
 
 
 function button_is_display(){
  $('.fnTop').show().slideDown( "slow" ); 
  $( ".labels-form" ).slideUp( "slow" );
  $("#content-slider").addClass('hide');
  $('.show-h > span').html('<i aria-hidden="true" class="fa fa-bars"></i><div class="clea"></div>Show Filters');
  $('#aa_loader').hide();
 }
 
  function button_is_hide(){
   $('.fnTop').hide().slideUp( "slow" );
   $( ".labels-form" ).slideDown( "slow" );
   var checker = flash_is_open();
    if(checker==false){ 
	 var div_open = 'slide';
	 $("#content-slider").removeClass('hide');
	 $('.show-h').hide();
    }
   $('.show-h > span').html('<i aria-hidden="true" class="fa fa-bars"></i><div class="clea"></div>Hide Filters');
  }



    $( document ).ready(function() {
		 $(".show-h").click(function(){
		  var display = $('.labels-form').css('display');
		   if(display=='block'){
			 button_is_display();  
		   }else{
			 button_is_hide();	 
		   }
	     });
	
	 $('[data-toggle="tooltip"]').tooltip();
   });	






   $(document).on("click", ".btn_shape", function(e) {
		$('.btn_shape').removeClass('active');
		var shape = $(this).attr('data-val');
		///shape = shape.replace(/btn_shape /g,''); 
		$(this).addClass('active');
		$('#shape').val(shape);
		filter_data('shape', '');
    });

    $(document).on("change", "#newcategory", function(e) {
        $('.nlabelfilter').val('');
		var category = $('#newcategory').val();
		if(category.length < 1){
			alert_box('Please select label category first ');
		}else{
			filter_data('category', '');
		}
    });
   
   $(document).on("change", ".nlabelfilter", function(e) {
		var trigger = $(this).attr('id');
		filter_data(trigger, '');
    });

  




function disable_slider_option(method){
	if(method=='disabled'){
			$( "#width_slider" ).slider( "option", "disabled", true);
			$( "#height_slider" ).slider( "option", "disabled", true);
	}else{
			$( "#width_slider" ).slider( "option", "disabled", false);
			$( "#height_slider" ).slider( "option", "disabled", false);
	}
}

function update_width_values ( min, max ) {
	$( "#width_slider" ).slider( "option", "values", [ min, max] );
}
function update_height_values ( min, max ) {
	$( "#height_slider" ).slider( "option", "values", [ min, max] );
}

function update_width_range ( min, max ) {
	$( "#width_slider" ).slider( "option", "min", min );
	$( "#width_slider" ).slider( "option", "max", max );
}
function update_height_range ( min, max ) {
	$( "#height_slider" ).slider( "option", "min", min );
	$( "#height_slider" ).slider( "option", "max", max );
}
function intialize_width_slider(){
			var width_min = document.getElementById('width_min');
			var	width_max = document.getElementById('width_max');
			$( "#width_slider" ).slider({
				range: true,
				step: 1,
				slide: function( event, ui ) {
				 	width_max.value = ui.values[1];
					width_min.value = ui.values[0];
				},
				change: function( event, ui ) {
				 	width_max.value = ui.values[1];
					width_min.value = ui.values[0];
					var option = $( "#width_slider" ).slider( "option" );
					if(option.disabled==false){
						filter_data('width', '');
					}
				}
			});
			width_min.addEventListener('change', function(){
				 $( "#width_slider" ).slider( "values", 0 , parseInt(this.value) );
			});
			width_max.addEventListener('change', function(){
				 $( "#width_slider" ).slider( "values", 1 , parseInt(this.value) );
			});
  }
  
  
  function intialize_height_slider(){		
	var height_min = document.getElementById('height_min');
	var	height_max = document.getElementById('height_max');
			
			$( "#height_slider" ).slider({
				range: true,
				step: 1,
				slide: function( event, ui ) {
				 	height_max.value = ui.values[1];
					height_min.value = ui.values[0];
				},
				change: function( event, ui ) {
				 	height_max.value = ui.values[1];
					height_min.value = ui.values[0];
					var option = $( "#height_slider" ).slider( "option" );
					if(option.disabled==false){
						filter_data('height', '');
					}
				}
			});
			height_min.addEventListener('change', function(){
				$( "#height_slider" ).slider( "values", 0 , parseInt(this.value));
			});
			height_max.addEventListener('change', function(){
				$( "#height_slider" ).slider( "values", 1 , parseInt(this.value));
			});
	}

$(document).on("click", ".layout_specs", function(e) {
	var id = $(this).attr('id');
	//console.log(id);
	$('#ajax_layout_spec').html('');
	$('#specs_loader').show();
			$.ajax({
			url: base+'ajax/layout_popup/'+id,
			type:"POST",
			async:"false",
			dataType: "html",
			success: function(data){
					if(!data==''){	
							data = $.parseJSON(data); 
						  // setTimeout(function(){
							  $('#specs_loader').hide();
							  $('#ajax_layout_spec').html(data.html);
						 // },1000);
					}
			}  
		});
	
});

  $(document).on("click", "#btn_search", function(e) {
		var category = $('#newcategory').val();
		var shape = $('#shape').val();
		if(category.length < 1 || shape.length < 1){
				alert_box('Please select label category and shape first ');
		}else{
				$('#aa_loader').show();
				 setTimeout(function(){
					$('#aa_loader').hide();
				},1000);
		}
  });




     $(document).on("click", ".load_flash", function(e) {
		 var temp_id = $(this).attr('data-temp_id');
		 $.ajax({
				url: base+'selector/load_flash_panel',
				type:"POST",
				async:"false",
				dataType: "html",
				data:{temp_id:temp_id},
				success: function(data){
				if(data){	
				  $('#ajax_finder_content').html('');
				  $('#ajax_flash_content').html(data);
				  filter_data('adhesive','');
				  $(".show-h").trigger( "click" );
				}
		     }  
	    });
     });




   function fetch_product_details(temp_id){
	
	    $.ajax({
				url: base+'ajax/fetch_product_details',
				type:"POST",
				async:"false",
				dataType: "html",
				data:{temp_id:temp_id},
				success: function(data){
				if(data){
				data = $.parseJSON(data);		
				$('#itemcode').html(data.diecode);
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

$( document ).ready(function() {
	$(".reset_button").click(function(){
			
			var checker = $( "#ajax_flash_content" ).is( ":empty" );
	          if(checker==true){ 
	           $('#designer_intro').show();
			  }
			  
			 $('#select_msg').remove();
			 $('#newcategory').val('');
			
			 $('#shape').val('');
			 $('#height_min').val(''); 
			 $('#height_max').val('');
			 $('#width_min').val(''); 
			 $('#width_max').val('');
			 $('#cornerradius').html('<option value="">Select Label Corner</option>');
			  
			 $('#ajax_model_desc').html('');
			 $('#ajax_finder_content').html('');
			 $('#label_counter1').html('0');
			 
			
			 $('.sizefound').hide();
			
			 $('#width_box_text').html(' Label Width <small>(mm)</small>');
			 $('#height_box').css('visibility','');
			
			 				
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
			$('#categorybox').switchClass( "col-lg-6", "col-lg-12");
			$('#categorybox').switchClass( "col-md-6", "col-md-12");
			$('#categorybox').switchClass( "col-lg-4", "col-lg-12");
			$('#categorybox').switchClass( "col-md-4", "col-md-12");
			$('#categorybox').find('.labelF').append('<small id="select_msg" style="color:red"> Select label category</small>');
			
            $('#newcategory').val('');
			$('#filter_search_box').val('');
			$(".selected_design").trigger( "click" );
			//filter_data('autoload','');
			
					
	});	

});	
 
 
   
   function filter_reopen(trigger,color){
	/*  filter_data(trigger,color); */
	  $(".show-h").trigger( "click" ); 
  }
  
 
 
 $(document).on("click", ".selected_design", function(e) {
    $('.show-h').show();
	$(".show-h").trigger( "click" ); 
 });	
 
   $(document).on("click", "#filter_search_handler", function(e) {
     var value = $('#filter_search_box').val();
	 if(value.length < 1 ){
		alert_box('Please Enter Text to Search');
		return false;
	 }
	 
	 var checker = $( "#ajax_flash_content" ).is( ":empty" );
	 if(checker==false){ 
	   var view = 'slider';
	   var div  = '#content-slider';
	 }else{ 
	   var view = 'normal'; 
	   var div  = '#ajax_finder_content';	
	 }
	$('#aa_loader').show();
	 $.ajax({
			url: base+'selector/search_diecode',
			type:"POST",
			async:"false",
			dataType: "html",
			data:{diecode:value,view:view},
			success: function(data){
			if(data){	
			data = $.parseJSON(data);  
			  if(data.response=='true'){
			      $('#ajax_finder_content').removeClass('hide');
				  $('#designer_intro').hide();
				  tutorial_video.pause();	
				  $('#newcategory').val('A4'); 
				  $(div).html(data.html);
				  $('#aa_loader').hide();
			  }else{
				 $('#aa_loader').hide(); 
			     alert_box('No Data Found Against Your Search');
		         return false;
			   }
			}
		   }  
		});
  });	
 
 
 
  
	 
		$(document).on("click", ".apply_design", function(e) {
			 $('.show-h').show();$(".show-h").trigger( "click" );
		     var temp_id = $(this).attr('data-temp_id'); 
			 document.getElementById("Source").new_template_selected(temp_id);
			/*$.ajax({
				url: base+'selector/change_selection',
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
		 
	 
	  function get_selected_design(temp_id){
	   $('.show-h').show();
	      $.ajax({
				url: base+'selector/change_selection',
				type:"POST",
				async:"false",
				dataType: "html",
				data:{temp_id:temp_id},
				success: function(data){
				if(data){	
				  $('#selection').html(data);
				}
		       }  
	      });
	  }
	
		 
   function update_header(username){
	
	var html = '<a class="" rel="nofollow"  href="<?=base_url()?>users/user_account"> Welcome &nbsp;'
	+username+'</a><a class="s" rel="nofollow" href="<?=base_url()?>users/user_orders"> <i class="fa fa-cart-arrow-down"></i> Easy Re-order</a><a class="" rel="nofollow"  href="<?=base_url()?>users/logout"><i class="fa fa-sign-out"></i>Logout</a>';
	 
	  $('#update_header').html(html);
   }	 
		
	
	
	function back_from_app(){
	 $('#ajax_flash_content').empty();	
	 filter_data('adhesive','');
	 $(".show-h").trigger( "click" );
	}
		
	function video_modal(){
	  $("#video_modal").trigger( "click" );
	}
	
	   $(document).on("click", "#video_pause", function(e) {
		     console.log('trigger');
		     tutorial_video2.pause();
		 });

    history.pushState(null, null, document.URL);
	window.addEventListener('popstate', function (event) {
		
		var checker = $( "#ajax_flash_content" ).is( ":empty" );
		if(checker==false){ 
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
							function(isConfirm) {
								  if(isConfirm){
											window.history.back();
								  }else{
											history.pushState(null, null, document.URL);
								  }
						});
		  }else{
				window.history.back();
		}
	});
	
	function confirmexitdialouge(url){
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
				function(isConfirm) {
					  if(isConfirm){
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
 
</script>