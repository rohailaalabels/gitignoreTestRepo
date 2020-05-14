<style>
#ajax_more_sizes{
overflow-x: hidden;
}
.imgBg2{
    min-height: 135px !important;
}
</style>


<? 
$i=1;

foreach ($more_sizes as $size):
	$cat_data = $this->home_model->fetch_category_details($size);
	$label_image = Assets.'images/categoryimages/thumbnail_label/'.$cat_data['CategoryImage'];	
	if (@getimagesize($label_image) == false) {
		$label_image = Assets.'images/categoryimages/labelShapes/180x180.png';	
	}
	if($cat_data['CategoryID'] != '')
	{
	    if($i==1){
?>
<div class="row" style="display:flex;">
    <?php
	    }
	    ?>
<div style="display:flex; width:20% !important; margin: 0px 10px !important;" class="col pr-thumb-cont">
  <div class="thumbnail">
    <div class="imgBg2 text-center"> <img class="lbl_img_size" style="width:80%; height:80%;" src="<?=$label_image?>" alt="Printed Labels"> </div>
    <div class="caption3 m0"> <a href="javascript:void(0);" data-cat="<?=$cat_data['CategoryID'];?>" data-brand="<?=$cat_data['labelCategory'];?>" class="btn-block select_size btn orange fldt-btn-more-sizes" role="button"> <i class="fa fa-arrow-circle-right"></i> Select</a> </div>
  </div>
</div>
<?php
if($i == 5)
{
?>
</div>
<? 
$i=0;
}
$i++;
}

endforeach;?>
<input type="hidden" id="currentdesignid" value="" />
<input type="hidden" id="image_thumbnail_cover_hidden" value="" />
<script>
       $(document).on("click",".fldt-btn-more-sizes",function(e){
	var _this = $(this);
	change_btn_state(_this,'disable','plain');
	
});
</script>
