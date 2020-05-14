

<?  $userdesign = $this->home_model->fetch_all_user_designs();
    
    if(count($userdesign)>0){ 
	 $max_index = max(array_keys($userdesign));
	// $recomnd = $this->home_model->fetch_recommended_labels($userdesign[$max_index]->label_id);  ?>




<div class="row lba-space set_box" id="lba_cart">
<div class="bgGray LBABG-Grey" style="padding-top:10px;">
<div class="container">
    <div class="row">
        <div class="ourTeam lba-ourTeam col-md-12">
            <div class="thumbnail set_box" style="padding-bottom:0px !important;">
                <div class="set_body" style="padding:17px 0">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="col-md-2 col-xs-12">
                                <div class="desktop_icon"><img onerror='imgError(this);'
                                        src="https://www.aalabels.com/theme/site//images/lba/saved-design-icon.png"/>
                                </div>
                            </div>
                            <div class="col-md-7 col-xs-12">
                                <h3 class="pr-title pr-title-mobile" style="color: #17b1e3;text-align: left;">My
                                    Saved Designs</h3>
                                <p style="text-align: left;" class="pr-title-mobile-p">You can view, edit, save your design
                                    and purchase your labels.</p>
                            </div>

                            <div class="col-md-3 col-xs-12">
                                <p>You have <span class="lba_items_cart"><?=count($userdesign)?></span> designs saved</p>
                                <button type="button" id="" data-toggle="modal"
                                        data-target="#saved_designs" class="btn orangeBg"
                                        style="width: 80%;">View Designs
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
            
  <style>
                .border-thh {
                    border-bottom: 2px solid #999999 !important;
                }

            </style>           

<div class="modal fade lb_applications" id="saved_designs" tabindex="-1" role="dialog" aria-labelledby="saved_designsLabel">
<div class="modal-dialog modal-md " role="document"  style="display: block; padding-right: 17px;">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="saved_designsLabel"><strong>My Saved Designs</strong></h4>
    </div>
    <div class="modal-body" style="padding: 15px !important;">
      <div class="table-responsive">
        <table class="table" style="border-spacing: 19px 0px;border-collapse: inherit;">
          <tr>
            <th style="width: 46%;padding: 0 15px 0 15px;" class="border-thh">Name</th>
            <th style="width: 27%;padding: 0 15px 0 15px;" class="border-thh">Last Modified </th>
            <th style="padding: 0 15px 0 15px;" class="border-thh">Action</th>
        </tr>
          
      <?
	    foreach($userdesign as $uderdesign){?> 
           <tr id="user_des_<?=$uderdesign->ID?>">
           <td><a href="javascript:void(0);" class="design_thumbnail">
             <img onerror='imgError(this);' src="<?=LABELER?>users/<?=$uderdesign->Thumb?>" style="height:50px !important; width:auto !important;" class="img-responsive"/>
             <!--<div style="width:50px; height:50px; background:url('<?=LABELER?>users/<?=$uderdesign->Thumb?>'); background-repeat: no-repeat; background-position: center center; background-size: cover; float:left; margin-right:5px;"></div>-->
             </a> 
             <span class="design_name"><?=$uderdesign->Name?></span></td>
          <td><?=date("d-M-y",$uderdesign->lastmodified)?></td>
          <td><div class="row row_actions"> 
           <a href="javascript:void(0);" data-label-id="<?=$uderdesign->ID?>" data-selected="true" class="btn blue2 col-xs-6 edit_design edit-adjst-design">Edit</a>
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