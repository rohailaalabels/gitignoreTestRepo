<div class="">
<div class="container m-t-b-8 ">
<div class="row">
<div class="col-xs-12  col-sm-6 col-md-4 ">
<ol class="breadcrumb  m0">
  <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
  <li class="active"><?=$word?> Labels</li>
</ol>
</div>
<div class="col-xs-12 col-sm-6 col-md-8  ">
<ol class="breadcrumb breadcrumb2 pull-right m0">
  
 
  
  <li <? if($catid=='T8'){ echo 'class="active"';}?> >
  	<a class="m-r-5" href="<?=base_url(); ?>jam-jar-labels/"><i class="fa fa-arrow-circle-right"></i> Jam Jar Labels</a> 
  </li>
  <li <? if($catid=='T11'){ echo 'class="active"';}?> >
  		<a class="m-r-5" href="<?=base_url()?>honey-jar-labels/"> <i class="fa fa-arrow-circle-right"></i> Honey Jar Labels</a> 
  </li>
  <li  <? if($catid=='T9'){ echo 'class="active"';}?> >
  		<a class="m-r-5" href="<?=base_url(); ?>herb-spice-jar-labels/"><i class="fa fa-arrow-circle-right"></i> Spice Jar Labels</a> 
  </li>
  <li <? if($catid=='T10'){ echo 'class="active"';}?> >
  	<a class="m-r-5" href="<?php echo base_url(); ?>sweet-jar-labels/"> <i class="fa fa-arrow-circle-right"></i> Sweet Jar Labels</a>
  </li>
  
   <li <? if($catid=='T12'){ echo 'class="active"';}?> >
  	<a class="m-r-5" href="<?php echo base_url(); ?>polyester-labels/"> <i class="fa fa-arrow-circle-right"></i> Polyester Labels</a>
  </li>

</ol>
</div>
</div>
</div>
</div>


<div class="bgGray">
<div class="container">
<div class="panel row">
        <div class="col-md-7">
                <div class="col-md-12 p0 col-xs-8">
                        <h1 ><?=$heading?></h1>
                </div>
        </div>
<div class="col-md-5"><div class="col-xs-4 col-md-6 m-t-15 p0 pull-right ">
        <div class="pull-right"><div>
                  <div class=" cBlue">
                    <div> <i class="fa-2x  m-t-10 fa fa-cubes pull-left  "></i><span class="pull-left"> <?=count($records['list']);?></span>
                      <div class="text-uppercase hidden-xs  hidden-sm pull-left cGray50 "> Products <br>Available </div>
                      </div>
                   
                  </div>
                </div></div>
                </div></div>
        </div>

        <div class=" row">
            <div class="thumbnail ">
                <div id="quote-carousel3" class=" carousel carousel3 slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators" >
                            <li data-target="#quote-carousel3" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel3" data-slide-to="1"></li>
                            <li data-target="#quote-carousel3" data-slide-to="2"></li>
                            
                            <? if($catid!='T10' and $catid!='T12'){ ?>
                            		<li data-target="#quote-carousel3" data-slide-to="3"></li>
                            <?  } ?>
                          </ol>
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                                <? include("jarlabels/".$content_page); ?>
                          </div>     
                    </div>
                </div>
        </div>
            <div class="row">
                     <? include('category_list.php')?>
            </div>
    
    

</div>
</div>


            <!-- Layout modal -->
    <div class="modal fade layout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                 <div class="modal-header">
                  <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                  <h4 id="myModalLabel" class="modal-title">Label Layout<a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
                </div>
                
                        
                <div id="ajax_layout_spec" ></div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                 
                </div>
        
              </div>
          </div>
 </div>
	
	 <!-- Layout modal -->   
     
<script>

$( document ).ready(function() {
   apply_hover_effect();
   
});

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
</script>     