<link href="<?=Assets?>labelfinder/css/filters.css" rel="stylesheet">
<link href="<?=Assets?>labelfinder/css/blue.css" rel="stylesheet">
<script src="<?=Assets?>labelfinder/js/icheck.js"></script>
<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
<script src="<?=Assets?>labelfinder/js/labelfinder.js?ver=<?=time()?>"></script>


<script src="<?=Assets?>dropzone/dropzone.js"></script>
<link rel="stylesheet" href="<?=Assets?>dropzone/dropzone.css">
<div class="container m-t-b-8 ">
  <div class="row">
    <div class="col-xs-12  col-sm-6 col-md-8 ">
      <ol class="breadcrumb  m0">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="<?=base_url()?>integrated-labels/">Integrated Labels</a></li>
        <li class="active"><?=$integrate[0]->Shape?> Labels</li>
      </ol>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 ">
          <div class="pull-right">
            <a role="button" rel="nofollow" class="btn orangeBg" href="<?=base_url()."download/catalog/catalog.pdf";?>"><i class="fa fa-desktop"></i> Virtual Catalogue</a>
          </div>
    </div>
  </div>
</div>



<div class="bgGray">

  <div  class="container">
            <?php  
				$category = 'Integrated'; $shape = '';
				if(preg_match('/single/i',$integrate[0]->Shape)){ $shape = 'Single Integrated';}
		   		else if(preg_match('/double/i',$integrate[0]->Shape)){ $shape = 'Double Integrated';}
		    	else if(preg_match('/triple/i',$integrate[0]->Shape)){ $shape = 'Triple Integrated';}
			
                   include_once(APPPATH.'/views/labelfinder/label_filters.php')?>
       		<div class="filter-margin"></div>
   			<div id="ajax_model_desc"></div>
   </div>
        
        
   <div class="container" id="ajax_material_sorting">
   <div class="panel row">
      <div class="row">
        <div class="col-xs-12  col-sm-8 col-md-6 m-l-10">
            <h1> <?=$integrate[0]->Shape?> Labels  (On A4 Sheets)</h1>
        </div>
      </div>
    </div>
   <!-- Checkout -->
    
    <div class="row">
    
      <? foreach($integrate as $pro){
		  
		  
		 	$labelSize = preg_replace('/Label Size: /','',$pro->specification3);
			$labelSize = preg_replace('/width /i','',$labelSize);
			$labelSize = preg_replace('/height/i','',$labelSize);
			
			$sizearay = explode(',',$labelSize);
			
			$labelSize = implode('<br />',$sizearay);
			/*if(count($sizearay) > 2 ){
			  	$labelSize = $sizearay[0].' , '.$sizearay[1]."<br />";
				$labelSize .=$sizearay[2];
			}*/
			
			 $batchqty = $this->home_model->integrated_batch_qty($pro->ManufactureID);
			 $image = explode(".",$pro->CategoryImage);
			 $imagename = $image[0]."_1.png";
			 
	 ?>
      <div class="col-xs-12  col-sm-8 col-md-8 ">
      
      
        <div class="thumbnail p-l-r-10 row">
          <div class="col-sm-6 col-md-5  m-t-10">
            <div class="imgBg text-center">
            	<img onerror='imgError(this);' src="<?=Assets."images/categoryimages/Integrated/".$pro->CategoryImage;?>" id="int_<?=$pro->CategoryID?>" alt="<?=$imagename?>"  title="<?=$pro->CategoryImage;?>" />
              <div style="position:absolute; left:3px; top:100px;" class="pull-left"> 
              <a id="<?=$pro->CategoryID?>" class="btn blueBg" href="javascript:void(0);" data-original-title="Rotate Image" data-toggle="tooltip"><i class="fa fa-retweet" ></i></a> </div>
            </div>
          </div>
          
          
          
          
          <div class="col-sm-6  col-md-7 ">
            <div class="m-l-5">
              <h3 class="cBlue">
                <?=$pro->Shape?>
                Labels</h3>
              <p><strong>
                <?=$pro->ProductName?>
                </strong></p>
              <p>
                <?=$pro->Appearance?>
              </p>
              <div class="row">
                <p class="col-md-7"><strong>Label Size</strong><br>
                  <?=$labelSize?>
                </p>
                <p class="col-md-5"><strong>Item Code</strong><br>
                  <?=$pro->ManufactureID?>
                </p>
              </div>
              <div >
                <p><strong>&nbsp;</strong><br>
                  &nbsp;</p>
              </div>
             
            </div>
          </div>
          
          
         
          <hr>
              <div class="col-xs-6  col-sm-6 col-md-9  p0">
            		<? if($comaptible){ echo " <b>Compatible with</b> ";}?>
                     <?=$comaptible?>
              </div>
              <div class="col-xs-6  col-sm-6 col-md-3  text-right ">
              	   <a role="button" class="btn orangeBg" href="<?=Assets."images/categoryimages/Integrated/pdf/".$pro->PDF;?>"> 
               			<i class="fa fa-file-pdf-o f-20"></i>
                   	 </a> <a role="button" class="btn blueBg" href="<?=Assets."images/categoryimages/Integrated/word/".$pro->WordDoc;?>"> 
                        <i class="fa f-20 fa-file-word-o "></i> 
                   </a> 
               </div>
         
         
          
        </div>
        
    <div class="labels-form row">
      <div class="">
        <div class="thumbnail  p-l-r-10 ">
          <div class=" p-t-10">
            <div class="col-sm-4  ">
              
              <label class="select">
                <select name="" id="box_size">
                    <option value="">Select Pack of sheets </option>
				  <? if(count($batchqty)){ 
						 foreach($batchqty as $btch){ ?>
							  <option value="<?=$btch->BatchQty?>">Pack of  <?=$btch->BatchQty?> sheets  </option>
					  <? }}?>
                </select>
                <i></i> </label>
                
                
             <p><strong>Printing options</strong></p>
             <label class="select">
                <select name="" id="print_option">
                 	<option value="plain">Select Plain or Printed</option>
				 	<option value="plain">Plain </option>
                    <option value="black">Monochrome </option>	
                 	<option value="printed">Colour </option>
				</select>
                <i></i>
              </label>
                
             <button id="calulate_price"  class="btn btn-block m-t-30   orangeBg" type="button">Calculate Price </button> 
             <button id="add_integrate" style="display:none;"  class="btn btn-block m-t-30   orangeBg" type="button">Add to Basket </button>
                
            </div>
            <div class="col-sm-8" >
              <table class="table plain">
                <tbody>
                  <tr>
                    <td><label class="m0"><!--<i class="fa fa-check-circle text-success p-t-b"></i>--> Plain </label> </td>
                    <td style="text-align:right; width:12%;"><h4 id="plain_price" class="textOrange"></h4> </td>
                 </tr>
                 <tr>
                    <td><label class="state-success m0"> Text & logo - <small>Monochrome</small><br /><small>Black Only/No Full Edge Bleed  </small></label>
 					</td>
                    <td style="text-align:right;"><h4 id="black_price" class="textOrange"></h4>
                    </td>
                  </tr>
                  <tr>
                    <td><label class="state-success m0">Text & logo - <small>Colour</small><br /><small>Spot colour/No full edge bleed</small></label></td>
                    <td style="text-align:right;"><h4 id="print_price" class="textOrange"></h4></td>
                  </tr>
                    <tr>
                    <td colspan="2">
                     <div class="col-md-6" >
                   	 	 <label class="state-success m0 text-left">Total Price : </label>
                     </div>
                     <div class="col-md-6" >
                   	 	 <div class="text-right" id="final_price"></div>
                     </div>
                     </td>
                  </tr>
                </tbody>
              </table>
              
             
            </div>
            
            
            <div id="uploader" class="col-sm-12" style="display:none;">
              <div class="m-t-15" >
               <form action="/upload-target" class="dropzone">
               <input type="hidden" id="filecounter" value="0"  />
                  <div class="dz-message">Drop files here or click to upload.<span class="note">(You can upload 4 artwork maximum)</span> </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div> 
        
      </div>
      
     <!-- Advertising Banners for free delivery start-->
     		<div class="row">
      	 <? $this->load->view('advertising/free_shipping');?>
     	</div>
		<!-- Advertising Banners for free delivery end-->  
      
      
      <? }?>
      
     

    </div>
    
    <div >





 </div>
  </div>
  
  
  <div class="container">
      <div class="thumbnail row">
        <? include('integrated_comapatible.php'); ?>
     </div>
 </div>


  
</div>









<div class="whiteBg" >
	<div class="container text-center">
      <div data-ride="carousel" class=" carousel carousel344 slide" id="quote-carousel344">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li class="" data-slide-to="0" data-target="#quote-carousel344"></li>
                            <li data-slide-to="1" data-target="#quote-carousel344" class=""></li>
                       	</ol>
                          <!-- Wrapper for slides -->
                           <h2>INTEGRATED LABELS </h2>
  <p>Integrated labels are a staple element for most catalogue, e-commerce and e-retailers picking, packing and shipping process. The use of integrated label forms saves order-processing time, improves order shipment accuracy and increases labour efficiency.
</p>
                          <div role="listbox" class="carousel-inner">
<div class="item active">
 
					<p> <strong>CUSTOM SIZES</strong> <br>
With the continuing rise in growth of participants within the e-Commerce sector there is an increased need to stand out from the crowd. Why not let us help you to design your own Integrated Label Form which can increase the awareness of your brand from the moment the package arrives at your customer's door. 
</p>
<p>

A well designed form that shows your customer's order details clearly along with all other important information including how to return goods improves your customer's experience with your company. If you add a returns label to the document it can also add trust and loyalty to your brand as the whole shopping experience is simple and transparent. 

  </p>
<p>
  We have considerable experience in assisting customers to get the most of out of their integrated label forms and if you are new to using this concept then we can help save you both time and money and improve the efficiency and accuracy of packing. AN integrated label form is a multi-functional document that can reduce the amount of pieces of paper required to ship goods to your customers. </p>
</div>
<div class="item">

					<p> <strong>
GETTING THE BEST FROM YOUR INTEGRATED LABELS</strong><br>

When purchasing in volume ensure that you stack the boxes no more than 5 high
 
Always leave the boxes sealed until ready to use as this will avoid dust settling on the pages which will eventually accumulate within your printer and adversely affect performance and print quality.
 
Try to store your labels in a consistent temperature range between 20° C – 25° C and 40% - 50% RH and not in direct sunlight e.g. on a windowsill, or anywhere that the labels may become damp, either from humidity or cold.
 
Fanning the sheets before placing into the paper tray reduces static and the risk of paper jams from more than one sheet being transported through the printer at the same time.
 
For the best results always place the labels in the paper tray with the paper only leading edge e.g. label end at the back of the paper tray, facing the front. This may require you to make firmware changes on your printer, but will improve the printer performance on long runs.
</p>
					<p>

Always check the duty-cycle of your printer and follow the manufacturers recommendations for batching and printed sheets per minute.
 
CUSTOMER SUPPORT
If you are unsure of what you need or have questions that you would like to ask then our experienced, knowledgeable and friendly customer service staff will provide you with any advice you need and are here to help you.
 
If you already use integrated label forms then you will know what benefits you can get from them and at AA Labels we can offer you the highest quality of product and customer service, along with competitive pricing, making AA Labels your natural choice for all of your integrated label requirements. </p>
</div>

                          </div>     
                    </div>
     </div>              
 </div>
 <hr />
 
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
	change_text('View Filters');
	<? if(isset($category) and $category!=''){?>
		 	filter_data('autoload', '');
	<? }?> 
});	






$(document).on("change", "#box_size,#print_option", function(e) {
	$('#print_price').html('');$('#black_price').html('');$('#plain_price').html('');$('#final_price').html('');
	$('#add_integrate').hide();
	$('#calulate_price').show();
});

$(document).on("click", "#calulate_price", function(e) {
		
		var print_option = $('#print_option').val();
		var box = parseInt($('#box_size').val());
		var manufacture = '<?=$integrate[0]->ManufactureID?>';
	 	if(box!=='' && box > 99){
				$.ajax({
						url: base+'ajax/get_box_price',
						type:"post",
						async:"false",
						dataType: "json",
						data:{manufature:manufacture,box:box,print_option:print_option},
						success: function(data){
							if(print_option=="black"){
								$('#print_price').html('');
								$('#plain_price').html(' '+data.symbol+''+data.plain_price);
								$('#black_price').html(' '+data.symbol+''+data.black_price);
							}
							else if(print_option=="printed"){
								$('#black_price').html('');
								$('#plain_price').html(' '+data.symbol+''+data.plain_price);
								$('#print_price').html(' '+data.symbol+''+data.print_price);
							}else{
								$('#print_price').html('');
								$('#black_price').html('');
								$('#plain_price').html(' '+data.symbol+''+data.plain_price);
							}
							$('#final_price').html('<h2 class="priceTextOrange"> '+data.symbol+''+data.total+'</h2><span>'+data.vatoption+' VAT</span>');
							$('#calulate_price').hide();
							$('#add_integrate').show();
						}  
					});
		}
		else{
				swal("","Please select pack of sheets first","warning");
		}
	
});	

$(document).on("click", "#add_integrate", function(e) {
   		
		var box = parseInt($('#box_size').val());
	    counter = $('#filecounter').val();
		var type = $('#print_option').val();
		
		if(box!=='' && box > 0){
				 var type = $('#print_option').val();
				 var manufacture = '<?=$integrate[0]->ManufactureID?>';
				 var productid = '<?=$integrate[0]->ProductID?>';
				 var ProductName = '<?=$integrate[0]->ProductName?>';
				 
				 $.ajax({
						url: base+'ajax/add_integrate_incart',
						type:"post",
						async:"false",
						dataType: "html",
						data:{manufature:manufacture,box:box,type:type,prdid:productid,counter:counter},
						success: function(data){
							data = $.parseJSON(data); 
							if(data){
                                	 fireRemarketingTag('Add to cart');
									 popup_messages(manufacture+' - '+ProductName);
									 $('#cart').html(data.top_cart);
							}
						}  
				    });
					 
					
			}else{
				swal("","Please select pack of sheets first","warning");
			}
		
   });



$(document).ready(function(){
	
	  $(".dropzone").dropzone({
                         url: "<?=base_url()?>ajax/upload_integrated_files/<?=$pro->ProductID?>",
                         maxFiles: 4,
						 init: function() {
							 this.on("maxfilesexceeded", function(file){
										swal("","You can upload maximum 4 artworks!","warning");
										this.removeFile(file);
							 });
							 this.on("addedfile", function(file) {
									var removeButton = Dropzone.createElement("<button class='btn btn-danger'>Remove</button>");
									//var removeButton = Dropzone.createElement('<div class="dz-error-mark delete_icon" ><span>✘</span></div>');
									var _this = this;
									removeButton.addEventListener("click", function(e) {
										  e.preventDefault();
										  e.stopPropagation();
										  delete_from_folder(file);
										  _this.removeFile(file);
										});
									file.previewElement.appendChild(removeButton);
									
							 });
							 this.on("success", function(file, responseText) {
								if(responseText=='error'){
										this.removeFile(file);
								}else{
										var counter = $('#filecounter').val();
										$('#filecounter').val(parseInt(counter)+1);
										
										var aa = file.previewElement.querySelector("[data-dz-name]");
										aa.innerHTML=responseText;
										console.log($('#filecounter').val());
									}
							}); 
					},
            });
	 
});	
function delete_from_folder(file){
						var aa = file.previewElement.querySelector("[data-dz-name]");		
						var image = aa.innerHTML;
						$.ajax({
								url: base+'ajax/delete_from_folder',
								type:"post",
								async:"false",
								dataType: "html",
								data:{file:image,productid:'<?=$pro->ProductID?>'},
								success: function(data){
										if(data){
											var counter = $('#filecounter').val();
											$('#filecounter').val(parseInt(counter)-1);
											console.log($('#filecounter').val());
										}
								}  
							});
} 
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$('#print_option').change(function() {
		if($(this).val() == "plain"){
			$('#uploader').hide();
		}else{
			$('#uploader').show();
		}
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

function fireRemarketingTag(page){
	<? if(SITE_MODE=='live'){?>
			dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype' : page});
	<? } ?>
}
</script> 
