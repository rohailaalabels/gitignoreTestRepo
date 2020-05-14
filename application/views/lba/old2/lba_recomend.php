

<?  $userdesign = $this->home_model->fetch_all_user_designs();
    
    if(count($userdesign)>0){ 
	 $max_index = max(array_keys($userdesign));
	 $recomnd = $this->home_model->fetch_recommended_labels($userdesign[$max_index]->label_id);  ?>

<div class="row lba-space set_box" id="lba_cart">
  <div class="bgGray LBABG-Grey" style="padding:10px 0;">
    <div class="container">
      <div class="row">
        <div class="ourTeam lba-ourTeam col-md-9">
          <div class="thumbnail set_box" style="padding-bottom:0px !important;">
            <div class="set_head">
              <h3 class="pr-title" style="color: #17b1e3;">Associated Shapes and sizes</h3>
              <p>Please select front jar label size that best fits your product</p>
            </div>
            <div class="set_body">
              <div class="row">
                <div class="col-md-12">
                  <? foreach($recomnd as $list){ 
					   if($list->available_in == "both"){
						 $tcode = explode(",",$list->association);
						 $t_code = $tcode[0];
						}else{
						 $t_code = $list->association;
						}
				
			    $productname = $this->home_model->get_db_column('category','CategoryName','CategoryID',$t_code);
				$temp = explode("-",$productname);
				$list->size = trim(end($temp));
				$list->size = str_replace('Roll Labels','',$list->size);
		        $imgsrc = LABELER."thumb/".$list->image;
				$gotoid = $list->ID;
				$is_selected = 'false';
		    ?>
                   <div class="col-md-3">
                    <div class="Thumbnails">
                      <h4>
                        <?=ucfirst($list->type)?>
                        Label </h4>
                      <img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive" />
                      <p>
                        <?=$list->size?>
                      </p>
                      <div class="middle"> <a class="edit_design" data-label-id="<?=$gotoid?>" data-selected="<?=$is_selected?>">Open in Label Editor</a> </div>
                    </div>
                  </div>
                  <? } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ourTeam lba-ourTeam col-md-3">
          <div class="thumbnail set_box" style="padding-bottom:0px !important;">
            <div class="set_body" style="padding:37px 0">
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="desktop_icon"><img onerror='imgError(this);' src="<?=Assets?>/images/lba/saved-design-icon.png" /></div>
                  <h3 class="pr-title" style="color: #17b1e3;">My Saved Designs</h3>
                  <p style="padding:25px 0px 0px 0px">You can view, edit, save your <br /> design and purchase your <br />labels</p>
                  <p>You have <span class="lba_items_cart">
                    <?=count($userdesign)?>
                    </span> designs saved</p>
                  <button type="button" id="" data-toggle="modal" data-target="#saved_designs" class="btn orangeBg" style="width: 80%;">View Designs</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade lb_applications" id="saved_designs" tabindex="-1" role="dialog" aria-labelledby="saved_designsLabel">
<div class="modal-dialog modal-lg " role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="saved_designsLabel"><strong>My Saved Designs</strong></h4>
    </div>
    <div class="modal-body" style="padding: 15px !important;">
      <div class="table-responsive">
        <table class="table table-hover">
          <tr>
            <th style="width:60%;">Name</th>
            <th>Last Modified</th>
            <th>Action</th>
          </tr>
          
      <?
	    foreach($userdesign as $uderdesign){?> 
           <tr id="user_des_<?=$uderdesign->ID?>">
           <td><a href="javascript:void(0);" class="design_thumbnail">
             <img onerror='imgError(this);' src="<?=LABELER?>users/<?=$uderdesign->Thumb?>" class="img-responsive"/> </a> 
             <span class="design_name"><?=$uderdesign->Name?></span></td>
          <td><?=date("d-M-y",$uderdesign->lastmodified)?></td>
          <td><div class="row row_actions"> 
           <a href="javascript:void(0);" data-label-id="<?=$uderdesign->ID?>" data-selected="true" class="btn blue2 col-xs-6 edit_design">Edit</a>
           <a href="javascript:void(0)" class="col-xs-6 text-center delete_user_design" data-id="<?=$uderdesign->ID?>"><i class="fa fa-trash"></i></a> </div></td>
          </tr>
          
      <? } ?>
       
        </table>
      </div>
    </div>
  </div>
</div>
</div>


<? } ?>