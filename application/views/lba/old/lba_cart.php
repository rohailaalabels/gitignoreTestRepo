<? $cart_detail = $this->shopping_model->show_lba_cart(); ?>
<? if(count($cart_detail) > 0):?>

<div class="col-md-12">
  <div class="set_head">Summary of Selected Products</div>
  <div class="set_body">
    <div class="row">
      <? foreach($cart_detail as $item):
	  $prod_info = $this->shopping_model->show_product($item->ProductID);
	  $prod_info = $prod_info[0];
	  $product_size = explode("-",$prod_info['ProductCategoryName']);
	  $product_size = trim(end($product_size));
	  $product_size = preg_replace("/label size/","",$product_size);
	  $brand = $this->shopping_model->GetProductBrand($item->ProductID);
	  $designs = $this->home_model->get_printed_files($item->ID,$item->ProductID);
	  if(preg_match("/Roll Labels/i",$brand['ProductBrand']))
	  {
		  $quantity = $item->LabelsPerRoll*$item->Quantity;
	  }
	  else
	  {
		  $labelspersheet = $this->home_model->get_db_column('products','LabelsPerSheet','ProductID',$item->ProductID);
		  $quantity = $item->Quantity*$labelspersheet;
	  }
	  ?>
      <div class="col-md-3 summmary-block">
        <div class="row">
          <div class="col-md-5"> <img onerror='imgError(this);' src="<?=AJAXURL?>theme/integrated_attach/<?=$designs[0]->file?>" class="img-responsive"/> </div>
          <div class="col-md-7"> <span class="summary-label">Size:
            <?=$product_size?>
            </span> <span class="summary-label">Labels:
            <?=$quantity?>
            </span> </div>
        </div>
      </div>
      <? endforeach;?>
    </div>
  </div>
</div>
<? endif;?>

