<div class="lbApp-sidebar">
  <div class="title">Categories</div>
  <ul class="nav navbar-nav">
    <?  $uri = explode("/",uri_string());
		   	   $results =  $this->home_model->fetch_labelsby_category(0);
				foreach($results as $key => $row){
				  // $subcat = $this->home_model->fetch_child_category($row->sub_category);
			$urlname = str_replace(" ","-",strtolower($row->name)); ?>
    	<li class="dropdown <?=(isset($uri[2]) and $uri[2]==$urlname)?'lbApp-sidebar_active':''?>">
    		<a href="<?=base_url()?>labels-by-application/<?=$urlname.'/'?>" > <?=$row->name?>
            <i aria-hidden="true" class="fa fa-arrow-circle-right pull-right"></i></a> 
      <!--<ul class="dropdown-menu">
               <? foreach($subcat as $pro){ 
				  $finalurl = str_replace(" ","-",strtolower($pro->CategoryName));
				  $finalurl = $urlname.'/'.$finalurl.'/';  ?> 
              		 <li><a href="<?=base_url()?>labels-by-application/<?=$finalurl?>"><?=$pro->CategoryName?></a></li>
              <? } ?>
              </ul>--> 
    </li>
    <? } ?>
  </ul>
  <div class="clear"></div>
</div>
