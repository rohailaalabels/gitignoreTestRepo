<style>
/*    .miniCartProduct span {
        font-size: 12px !important;
    }

    .miniCartProduct span:first-child {
        font-size: 14px !important;
        color: #00b6f0;
    }

    .miniCartProduct span:nth-child(2) {
        font-size: 13px !important;
    }

    .miniCartProduct td {
        vertical-align: top !important;
    }

    .miniCartProduct span.print_span {
        font-weight: 600;
        font-size: 13px !important;
    }

    #cart .btn {
        padding-right: inherit !important;
        border-radius: 4px;
    }

    #cart .miniCartProduct .btn i {
        margin: 0 !important;
        color: #fff !important;
    }*/


.counter-rounded-text {
	width: 20px;
	height: 20px;
	border-radius: 50%;
	color: #ffffff !important;
	line-height: 20px;
	text-align: center;
	background: #fd4913;
	position: relative;
	left: -11px;
	top: -5px;
	margin-right: 0px !important;
}
.cGray {
	color: #333333 !important;
	font-size: 14px !important;
	padding: 23px 0 0 0px;
	font-weight: 500;
	position: relative;
	left: -15px;
}
.btn_s {
	border-radius: 0px !important;
	border: none !important;
	color: #333 !important;
	padding: 26px 0px 0px 0px;
	margin-left: 0px !important;
	position: relative;
	left: -11px;
}
</style>
<?   $controller = $this->router->fetch_class();
		if($controller =='wholesale')
		{
			$cart_detail = $this->shopping_model->show_quotation_basket();
		}
		else
		{
			$cart_detail = $this->shopping_model->show_cart();
		}						
	 ?>

<button class="btn  " data-toggle="dropdown" type="button" style="padding: 0px !important;">
<div>
  <div class=" cBlue">
    <div> <img src="<?= Assets ?>images/header-cart-icon.png" class="pull-left"/> <span class="pull-left counter-rounded-text"
                      style="font-size: 12px !important;font-weight: bold">
      <?= count($cart_detail) ?>
      </span>
      <div class="hidden-xs  hidden-sm pull-left cGray ">Basket</div>
      <i class="fa fa-angle-down btn_s"></i></div>
  </div>
</div>
</button>
<ul class="dropdown-menu pull-right ">
  <? if(count($cart_detail) > 0){?>
  <li class="top_cart_header p-t-b-10"><i class="fa fa-shopping-cart"></i> YOUR CART</li>
  <li style="height:243px; overflow-y:scroll;">
    <?php /*?><div class="top_cart_content">
      <div class="top_cart_item_line clearfix">
        <div class="col-sm-9 top_cart_left_section">
          <div class="col-sm-2 p0"> <img src="https://www.aalabels.com/theme/site/images/categoryimages/A4Sheets/colours/AAS008FRDP.png" class="img-responsive"/> </div>
          <div class="col-sm-10"> <span class="top_cart_item top_cart_item_manufacture"><strong>AAS008WTP</strong></span> <span class="top_cart_item top_cart_item_title">Matt White - Permanent</span> <span class="top_cart_item top_cart_item_size">99.18 mm x 94.20 mm</span> <span class="top_cart_item top_cart_item_printing"><strong>Printing: 6 Colours Digital Process</strong></span> </div>
        </div>
        <div class="col-sm-3 top_cart_right_section"> <a id="ID" href="javascript:void(0);" class="delete_item"><i class="fa fa-trash"></i></a> <span class="top_cart_item top_cart_item_price">
          <?=symbol?>
          13.24</span> <span class="top_cart_item top_cart_item_quantity">x100</span> </div>
      </div>
      <!--end line--> 
    </div><?php */?>
    <!-- end cart content-->
    
    <div class="top_cart_content">
      <?	$total = 0.00; $sub_inclvat = 0.00;
                foreach($cart_detail as $row) {
                    $prod = $this->shopping_model->show_product($row->ProductID);
					$sub_inclvat = round($row->TotalPrice,2);
                    if($controller !='wholesale')
                    {
                        if($row->Printing == "Y")
                        {
                            $sub_inclvat += $row->Print_Total;
                        }
                    }
                    $sub_inclvat = $this->home_model->currecy_converter($sub_inclvat, 'yes');
                    $prod[0]['Image1'] = str_replace(".gif",".png",$prod[0]['Image1']);		
                    $Product_Name=explode("-",$prod[0]['ProductName']);
                    $x=explode("-",$prod[0]['ProductCategoryName']);
					
					
					
					if(preg_match("/SRA3/i",$prod[0]['ProductBrand'])){
						$path = Assets."images/categoryimages/SRA3Sheets/colours/".$prod[0]['ManufactureID'].".png";
						 
					} else if (preg_match("/A5/i", $prod[0]['ProductBrand'])) {
                        $path = Assets . "images/categoryimages/A5Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";

                    } else if (preg_match("/A3/i", $prod[0]['ProductBrand'])) {
                        $path = Assets . "images/categoryimages/A3Sheets/colours/" . $prod[0]['ManufactureID'] . ".png";

                    }
					else if(preg_match("/Roll Labels/i",$prod[0]['ProductBrand'])){
							$new_code_exp=explode("R",$prod[0]['CategoryID']);
							$catid=$new_code_exp[0];
							$image = $this->home_model->get_db_column("category","CategoryImage","CategoryID",$catid);
							$path = Assets."images/categoryimages/rollimages/".$image;
							$image = str_replace(".png",".jpg",$image);
							$path = Assets."images/categoryimages/RollLabels/".$image;
							
					}
					else if(preg_match('/Integrated Labels/is',$prod[0]['ProductBrand'])){

//usman
                        $new_code_exp=explode("W",$prod[0]['ManufactureID']);

							$path = Assets."images/categoryimages/Integrated/".$new_code_exp[0] .".png";
//							usman
 					}
					else{
						$path = Assets."images/categoryimages/A4Sheets/colours/".$prod[0]['ManufactureID'].".png";
					}
		?>
      <div class="top_cart_item_line clearfix">
        <div class="col-sm-9 top_cart_left_section p0">
          <div class="col-sm-2 p0"> <img onerror="imgError(this);" src="<?=$path?>" class="img-responsive"/> </div>
          <div class="col-sm-10">
            <? if($row->ProductID == 0 and $row->source == "LBA"):
                
                $productnameline = explode("-",$row->p_name);
                $prodd_name = trim($productnameline[0]);
                $prodd_size = trim($productnameline[2]);
                
              ?>
            <span class="top_cart_item top_cart_item_manufacture">Label Size:
            <?=$prodd_size?>
            </span> <span class="top_cart_item top_cart_item_title"><strong>Design:
            <?=$prodd_name?>
            </strong></span>
            <? else:?>
            <span class="top_cart_item top_cart_item_manufacture"><strong>
            <?=$prod[0]['ManufactureID']?>
            </strong></span> <span class="top_cart_item top_cart_item_title">
            <?=$Product_Name[0]?>
            -
            <?=$Product_Name[1]?>
            </span> <span class="top_cart_item top_cart_item_size">
            <? if(isset($x[3]) and $x[3]!=''){ echo $x[3];}?>
            </span>
            <?php endif;?>
            <?php if($controller !='wholesale'){
				if($row->Printing == "Y")
				{
					$print_type = $row->Print_Type;
					if($print_type == "Mono")
					{
					  $print_type = "Monochrome - Black Only";
					}
					else if($print_type == "Fullcolour")
					{
					  $print_type = "4 Colour Digital Process";
					}
					?>
            <span class="top_cart_item top_cart_item_printing"><strong>Printing:
            <?=$print_type?>
            </strong></span>
            <? 
			  	if($row->ProductID == 0 and $row->source == "LBA"):?>
            <strong>Design: </strong>
            <? endif;
			  	}
			  } ?>
          </div>
        </div>
        <div class="col-sm-3 top_cart_right_section"> <a id="<?=$row->ID?>" href="javascript:void(0);" class="delete_item"><i class="fa fa-trash"></i></a> <span class="top_cart_item top_cart_item_price">
          <? if($controller !='wholesale'){?>
          <?=symbol. number_format(($sub_inclvat), 2, '.', ''); ?>
          <? } ?>
          </span> <span class="top_cart_item top_cart_item_quantity">x
          <?=$row->Quantity?>
          </span> </div>
      </div>
      
      <!--------------->
      
      <?  $total = $total+$sub_inclvat; } ?>
    </div>
  </li>
  <div class="top_cart_footer">
    <? if($controller !='wholesale'){?>
    <div class="sub_total_div clearfix">
      <div class="col-sm-8"> <strong>Subtotal</strong> </div>
      <div class="col-sm-4 text-right"> <span class="top_cart_item_final_price">
        <?=symbol.sprintf('%.2f', round($total,2));?>
        </span></div>
    </div>
    <p class="text-center small">Shipping and taxes are calculated at checkout</p>
    <a rel="nofollow" href="<?=SAURL?>shopping/checkout/" class="btn btn-block btn-md orangeBg"> CHECKOUT <i class="fa fa-chevron-circle-right"></i> </a>
    <? }else{?>
    <a rel="nofollow" href="<?=base_url()?>wholesale/view-quotation/" class="btn btn-block btn-md orangeBg"> REVIEW QUOTATION <i class="fa fa-chevron-circle-right"></i> </a>
    <? } ?>
  </div>
  <? }else{?>
  <li class="top_cart_header p-t-b-10"><span> <i class="fa fa-shopping-cart"></i> BASKET IS EMPTY</span> </li>
  <? } ?>
</ul>
