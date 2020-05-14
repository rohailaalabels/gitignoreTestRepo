<div id="aa_loader" class="white-screen" style=" display:none;" >
  <div class="loading-gif text-center" style="top:52%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:43px; " alt="AA Labels Loader"> </div>
</div>
<div class="">
  <div class="container m-t-b-8 ">
    <div class="row">
      <div class="col-xs-12  col-sm-6 col-md-8 ">
        <ol class="breadcrumb  m0">
          <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
          <li class="active">Templates </li>
        </ol>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 ">
        <div class="pull-right"> <a role="button" class="btn orangeBg" href="<?=base_url()?>virtual-catalogue/"><i class="fa fa-desktop"></i> Virtual Catalogue</a> <a role="button" class="btn blueBg" href="<?=base_url()?>advancesearch/"><i class="fa fa-search"></i> Label Finder</a> </div>
      </div>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="panel row">
      <div class="col-md-7">
        <div class="col-md-6 p0 col-xs-6">
          <h1 >A4, A3 and SRA3 Templates</h1>
        </div>
        <div class="col-xs-6 col-md-6 m-t-15 p0 ">
          <div class="pull-right">
            <div>
              <div class=" cBlue">
                <div> <i class="fa-2x  m-t-10 fa fa-cubes pull-left  "></i><span class="pull-left" id="product_counter">
                  <?=$records['num_row']?>
                  </span>
                  <div class="text-uppercase hidden-xs  hidden-sm pull-left cGray50 "> Products <br>
                    Available </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 m-t-15">
        <div class="pull-right ">
          <div class="pull-right "> <a class="btn btn-default m-r-5 " id="order_filter" onclick="change_sort();"><span class="fa fa-sort-numeric-asc"></span></a> 
            <!--<a class="btn btn-default " id="grid" href="#"><span class="fa fa-th"></span></a>--> 
          </div>
          <input type="hidden" name="orderby" id="orderby" value="ASC"  />
          <input type="hidden" name="page" id="page" value="template"  />
          <div class="labels-form pull-right m-r-5">
            <label class="select">
              <select onchange="sort_category();" name="Labels" id="Labels">
                <option value="">Sort by Labels</option>
                <? foreach($records['labels'] as $persheet ){?>
                <option value="<?=$persheet->LabelsPerSheet?>" >
                <?=$persheet->LabelsPerSheet?>
                </option>
                <? } ?>
              </select>
              <i></i> </label>
          </div>
          <div class="labels-form pull-right m-r-5">
            <label class="select">
              <select id="category" name="category">
                <option <? if(isset($type) and $type=='a4'){ echo 'selected="selected"';}?>  value="a4">A4 Templates</option>
                <option <? if(isset($type) and $type=='a3'){ echo 'selected="selected"';}?> value="a3" >A3 Templates</option>
                <option <? if(isset($type) and $type=='sra3'){ echo 'selected="selected"';}?> value="sra3">SRA3 Templates</option>
              </select>
              <i></i> </label>
          </div>
        </div>
      </div>
    </div>
    <div id="ajax_material_sorting">
      <? include_once('template_list.php');?>
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

$(document).on("change", "#category", function(e) {
		var cate = $(this).val();
		if(cate.length > 0){
			window.location.href='<?=base_url()?>free-templates/'+cate;
		}
});

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

function change_sort(){
	var orderby = $('#orderby').val();
	if(orderby=='ASC'){
		$('#orderby').val('DESC');
		$('#order_filter').html('<span class="fa fa-sort-numeric-desc"></span>');
	}else{
		$('#orderby').val('ASC');
		$('#order_filter').html('<span class="fa fa-sort-numeric-asc"></span>');
	}
	sort_category();
	apply_hover_effect();
	
}
function sort_category(){
		var shape = $('#shape').val();
		var labels = $('#Labels').val();
		var orderby = $('#orderby').val();
		var type   = '<?=$type?>';
			
			$('#aa_loader').show();
			$.ajax({
					url: base+'ajax/get_filter_category/',
					type:"POST",
					async:"false",
					dataType: "html",
					data: {  type: type,shape: shape,labels: labels,orderby:orderby,page:'template'},
					success: function(data){
							if(!data==''){	
									data = $.parseJSON(data); 
									$('#product_counter').html(data.count);
									$('#shape').html(data.shapes);
									$('#Labels').html(data.labels);
									$('#ajax_material_sorting').html(data.html);
									apply_hover_effect();
									$('#aa_loader').hide();
							}
					  }  
			});
}
</script> 
  </div>
</div>
<div class="whiteBg" >
  <div class="container text-center">
    <h2> About Templates </h2>
    <p><small>We provide a template for each and every sheet label size we offer, in either PDF or Word format. Click here for guidance on how best to use the templates to print your labels. If you need any assistance please call our customer care team on the number below. Remember that we can print your labels for you, just ask for a quote and see how easy it can be . </small></p>
  </div>
</div>
