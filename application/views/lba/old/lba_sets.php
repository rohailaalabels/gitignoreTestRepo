<style>
.set_box {
	padding: 0;
}
.set_box .set_head {
	padding: 5px;
	border-bottom: 1px solid #ececec;
}
.set_box .set_body {
	padding: 5px;
}
.well {
	margin: 0;
	border-radius: 0;
	padding: 10px;
}
.ourTeam h2 {
    color: inherit;
    margin: auto;
}
</style>
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
<div class="bgGray">
  <div class="container">
    <div id="ajax_model_desc"></div>
    <div id="ajax_material_sorting"> </div>
    <?
	if($sets):
	foreach($sets as $set): 
	 $imgsrc = LABELER."thumb/".$set->image;?>
    <div class="ourTeam lba-ourTeam">
      <div class="thumbnail set_box">
        <div class="set_head">Please select front jar label size that best fits your product</div>
        <div class="set_body">
          <div class="row">
            <?
				$product_data = $this->home_model->get_product_data($set->category,$set->setid,$set->Designid);
				if($product_data):?>
            <div class="col-md-3">
              <div class="big_image"><img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive" /></div>
            </div>
            <div class="col-md-9">
              <div class="row">
                <? foreach($product_data as $product):
					$product->size = $this->home_model->get_db_column('category','CategoryName','categoryID',$product->association);
					$temp = explode("-",$product->size);
					$product->size = trim(end($temp));
					$imgsrc = LABELER."thumb/".$product->image;
					?>
                <div class="col-md-2 text-center">
                  <div class="well"> <img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive"/> </div>
                  <p>
                    <?=$product->size?>
                  </p>
                </div>
                <? endforeach;?>
                <div class="col-md-5 pull-right clear"> <a class="btn btn-block orangeBg" href="<?=base_url()?>lba-editor/<?=$product->Designid?>/<?=$product->setid?>">Add to Editor <i class="fa fa-edit"></i></a> </div>
              </div>
            </div>
            <? endif;?>
          </div>
        </div>
      </div>
    </div>
    <?
    endforeach;
	else:?>
    <div class="ourTeam lba-ourTeam">
      <div class="thumbnail set_box">
        <div class="set_body">
          <h2>No Set Available</h2>
        </div>
      </div>
    </div>
    <? endif;?>
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