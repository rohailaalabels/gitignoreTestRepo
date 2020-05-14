<?php

$addclass = "";

foreach ($labelpersheet_records['list'] as $rec):
 if($rec->LabelPerDie == 0){
     continue;
 }



if($rec->count > 1)

{

	$products = "Products";

}

else

{

	$products = "Product";

}

if($rec->LabelPerDie == $label_per_sheet_selected)

{

	$addclass = "active";

}

else

{

	$addclass = "";

}

?>

<div class="col-sm-3 col-xs-6">
  <div class="lps_item_box <?=$addclass?>" data-labelperdie="<?=$rec->LabelPerDie?>"> <span class="lps_number">
    <?=$rec->LabelPerDie?>
    </span>
    <p>Labels per sheet <span class="breakthrough">(<span class="lps_products">
      <?=$rec->count?>
      </span>
      <?=$products?>
      )</span></p>
  </div>
</div>
<?php endforeach;?>
<script>
(function($){
	$(".container_of_labels").mCustomScrollbar({
		axis:'y',
		theme:'rounded-dark'
	});
})(jQuery);
</script>