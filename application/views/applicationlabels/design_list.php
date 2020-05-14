<? 
	  		foreach($records as $row){
					  $row->CategoryImage = str_replace(".png","-",$row->CategoryImage);
					  $img_src = Assets."images/application/design/".$row->designcode.'.png'; ?>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 dm-box">
  <div class="thumbnail">
    <div class="zoom">
      <p> <a href="#" data-toggle="modal" data-target=".layout"  class="layout_specs" id="<?=$row->CategoryID?>" > <i class="fa fa-search-plus zoomIcon"></i> </a> </p>
    </div>
    <div class="imgBg text-center"> <img onerror='imgError(this);'  height="" src="<?=$img_src?>" alt="<?=$row->designcode?> Specification"> </div>
    <div class="caption5">
      <div class="row">
        <p class="col-md-12"> <strong>Design Code</strong>:
          <?=$row->designcode?>
          <br />
          <strong>Products Available</strong>:
          <?=$row->total?>
        </p>
      </div>
      <a data-cat-id="<?=$row->CategoryID?>" data-prd-id="" id="<?=$row->CategoryID?>"  role="button" class="btn-block btn orange" 
                                    href="<?=$url.'/'.strtolower($row->CategoryID)?>/"> <i class="fa fa-arrow-circle-right"></i> Select Material </a> </div>
  </div>
</div>
<? } ?>
