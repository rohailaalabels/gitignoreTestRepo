<h4 class="m-l-10">Search by software:</h4>

<div class="m-t-10 image-t-15">
    <div class="row">
  <? foreach($compatible_list as $row){?>
  <div class="col-xs-6 col-sm-2 col-md-2 ">
    <div style="height:50px;" class=""> <a href="<?=base_url()?>integrated-labels/<?=str_replace(" ","-",strtolower($row->name))?>/"> <img onerror='imgError(this);' width="auto" height="auto" src="<?=Assets?>images/icons/<?=$row->image?>" alt="<?=$row->name?>"> </a> </div>
  </div>
  <? } ?>
</div>
  <div class=" col-sm-12 col-xs-12">
      <a role="button"class="btn blueBg m-t-20 col-sm-3 width-24-p m-r-5" href="<?=base_url()?>single-integrated-labels/">Single Integrated Labels</a>
      <a role="button" class="btn blueBg  m-t-20 col-sm-3 width-25-p m-r-5" href="<?=base_url()?>double-integrated-labels/">Double Integrated Labels</a>
    <div class="clear hidden-lg hidden-md hidden-sm"></div>
    <a role="button"class="btn blueBg  m-t-20 col-sm-3 width-24-p m-r-4" href="<?=base_url()?>triple-integrated-labels/">Triple Integrated Labels</a>
      <a role="button"class="btn blueBg  m-t-20 col-sm-3 width-25-p" href="<?=base_url()?>full-sheet-integrated-labels/">Full Sheet Delivery Labels</a> </div>
</div>
