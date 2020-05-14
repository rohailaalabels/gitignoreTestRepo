<h4 class="m-l-10">Search by software:</h4>
<div class="m-t-10 image-t-15">

		   <? foreach($compatible_list as $row){?>
                  <div class="col-xs-6 col-md-2 ">
                  <div style="height:50px;" class="">
                            <a href="<?=base_url()?>integrated-labels/<?=str_replace(" ","-",strtolower($row->name))?>/">
                                 <img onerror='imgError(this);' width="auto" height="auto" src="<?=Assets?>images/icons/<?=$row->image?>" alt="<?=$row->name?>">
                           </a>
                           </div>
                  </div>
             <? } ?>   

  <a role="button"class="btn blueBg m-t-20" href="<?=base_url()?>single-integrated-labels/">Single Integrated Labels</a>
       		<a role="button" class="btn blueBg  m-t-20" href="<?=base_url()?>double-integrated-labels/">Double Integrated Labels</a>
        	<a role="button"class="btn blueBg  m-t-20" href="<?=base_url()?>triple-integrated-labels/">Triple Integrated Labels</a>
            <a role="button"class="btn blueBg  m-t-20" href="<?=base_url()?>full-sheet-integrated-labels/">Full Sheet Delivery Labels</a>      
                  
</div>