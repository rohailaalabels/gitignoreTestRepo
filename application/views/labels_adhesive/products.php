<link href="<?=Assets?>css/mat-sep-2017.css" rel="stylesheet">
<link href="<?=Assets?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
<script src="<?=Assets?>labelfinder/js/newlabelfinder.js?ver=<?=time()?>"></script>
<style>
select option:disabled {background: #dedede;}
.dm-box .dm-selector .btn {font-size: 13px;border: 1px solid #e5e5e5;color: #666;text-align: left;}
.dm-box .dm-selector .fa {position: absolute;right: 10px;top: 11px;}
.dm-box .dm-selector .dropdown-menu a {color: #666;cursor: pointer;}
.dm-selector .tooltip {font-size: 13px !important;width: 290px !important;}
.dm-selector .tooltip.left .tooltip-arrow {border-left-color: #FEF7D8 !important;}
.dm-selector .tooltip.right .tooltip-arrow {border-right-color: #FEF7D8 !important;}
.dm-selector .tooltip.top .tooltip-arrow {border-top-color: #FEF7D8 !important;}
.dm-selector .tooltip.bottom .tooltip-arrow {border-bottom-color: #FEF7D8 !important;}
.dropdown-menu li .tooltip .tooltip-inner {background-color: #FEF7D8;border-radius: 4px;color: #454545;max-width: 381px;padding: 8px 15px;text-align: justify;text-decoration: none;}
.dm-selector.tooltip.in {opacity: 1;}
.tooltip.right .tooltip-arrow {border-right-color: #fff8dc !important;}
.productdetails .input-group .form-control {height: 38px !important;}
.sweet-alert {box-shadow: 0 0 20px;}
.selected_material_box .mat-sep-2017 .selected-product .selected-mat
{
	display:flex;
}
.selected_material_box .mat-sep-2017 .selected-product .edit_material_option
{
	bottom:7px;
	right:10px;
}
</style>
<div id="aa_loader" class="white-screen" style=" display:none;" >
<div class="loading-gif text-center" style="top:45%; z-index:150;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px;"> 
</div>
</div>
<div class="container m-t-b-8 ">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-8">
        <ol class="breadcrumb m0">
          	<li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
          	<li class="active">Adhesives</li>
          	<li class="active"><?=$info['material_name']?></li>
        </ol>
      </div>
    </div>
</div>
<?php
//echo"<pre>";print_r($info);echo"</pre>";
?>
<div class="bgGray">
<div class="container">
		<input type="hidden" id="material_code" value="<?=$material_code?>"  />
  	    <?php  $category = $type;$shape='';include_once('label_filters.php');?>
        <div class="filter-margin"></div>
        <div id="ajax_model_desc"></div>
</div>
	<div id="ajax_labelfilter" style="min-height:400px;" class="container"></div>
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
           <div id="ajax_layout_spec" class="">
                 <? include_once('layout_popup.php')?>
          </div>
      </div>
    </div>
   </div>
  </div>
</div>

<script> 


var contentbox = $('#ajax_labelfilter');
var loadproducts = true;
$(document).ready(function() {
	$('[data-toggle="tooltip-digital"]').tooltip();
	$("[data-toggle=tooltip-product]").tooltip();
	//$('.fnTop').show().slideDown( "fast" );
	//$( ".labels-filters-form" ).slideUp( "fast" );
	<? if(isset($category) and $category!=''){?>
			//filter_data('category', '');
		 	filter_data('autoload', '');
	<? }?> 
});	

$(document).on("click", ".edit_material_option", function(e) {
		//$('.selected_material_box').hide();
		//$('.material_filter_box').show();
		var url = $(this).data("url");
		window.location = url;
			
});
$(document).on("click", ".technical_specs_header", function(e) {
	var id =  $(this).attr('id');
	$('#ajax_tecnial_specifiacation').html('');
	$('#mat_code').html('');
	$('#specs_loader').show();
			$.ajax({
				url: base+'ajax/material_popup/'+id,
				type:"POST",
				async:"false",
				dataType: "html",
				success: function(data){
					  if(!data==''){	
						   data = $.parseJSON(data); 
						   $('#material_popup_img').attr('src',data.src);
						   setTimeout(function(){
							  		$('#specs_loader').hide();
							  		$('#ajax_tecnial_specifiacation').html(data.html);
							  		$('#mat_code').html(data.mat_code);
						  },500);
					 }
				  }  
			});
});

function fireRemarketingTag(page){
	<? if(SITE_MODE=='live'){?>
			dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype' : page});
	<? } ?>
}


</script> 
