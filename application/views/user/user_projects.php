<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Order History</li>
      </ol>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="panel">
      <div class="row">
        <div class="col-xs-7  col-sm-8 col-md-7">
          <div class="col-xs-12  col-sm-6 col-md-6 m-l-10 ">
            <h1 > Projects</h1>
          </div>
        </div>
        <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
          <div class="pull-right"> 
          		<a role="button" class="btn orange pull-right" href="<?=base_url()?>shoppingcart.php"><i class="fa fa-shopping-cart faa-horizontal animated"></i>
                &nbsp; View Basket </a> 
          </div>
        </div>
      </div>
    </div>
    
    <!-- Checkout --> 
    
    <!-- Order Form -->
    <div class=" thumbnail">
      <div >
        <div role="tabpanel" class="">
          <? include('user_menu.php')?>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="col-md-12 m-t-10">
               
             
                  <? if($totalrecord > 0){?>
                  
                  <div class="table-responsive col-md-12 p0 border0">
                    <table class="table table-bordered table-hover ">
                      <thead class="">
                        <tr>
                          <th style="width:5%;">Code</th>
                          <th style="width:5%;">Image</th>
                          <th style="width:25%;">Description</th>
                          <th style="width:10%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                
                 <?
					$i=0;
					foreach($orders as $rec){
			        $i++;
			 ?>
                   
                     <? $product = $this->home_model->getManufactureID($rec->CategoryID);?>                    
               <tr id="main<?=$rec->ID?>">
            
            
               <td style="text-align:center;"><?=$product?></td>
               <td style="text-align:center;"><img onerror='imgError(this);' src="<?=base_url()?>designer/media/thumb/<?=$rec->Thumb?>" width="46" height="46"></td>
               <td id="prd_name"><?=$rec->Name?></td>
               <td id="prd_name"> 
                <a class="btn orangeBg" rel="nofollow" href="<?=base_url()?>custom-label-tool/<?=md5($rec->ID)?>"><i class="fa fa-edit-o f-28"></i>Edit</a>
                <a class="btn blueBg del-project" rel="nofollw" data-pro_id="<?=$rec->ID?>"><i class="fa f-28 fa-trash-o "></i> Delete</a> 
                </td>
                
            </tr>
  
                           
                <? } ?>
                </tbody>
                </table>
                </div>
                
                <? } else{?> 
				
				<div class="col-md-12 bg-info p-t-b-12"><h4 style="text-align:center;">No Project found in your account</h4></div>
				
				<? } ?>
                
                
                <div class=" col-md-12 text-center">
                  <nav>
                    <ul class="pagination ">
                      <?=$links?>
                    </ul>
                  </nav>
                </div>
                
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).on("click", ".del-project", function(event) {
			   var id = $(this).attr('data-pro_id');
			   swal({
				  title: "Are you sure you want to Delete.?",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn orangeBg",
				  confirmButtonText: "Cancel",
				  cancelButtonClass: "btn blueBg",
				  cancelButtonText: "OK",
				  closeOnConfirm: true,
				  closeOnCancel: true
				},
				function(isConfirm) {
				  if (isConfirm) {
							console.log('cancel');
				  } else {
					        $('#main'+id).remove();	
						 	$.ajax({
							url: base+'ajax/delete_user_projects',
							type:"POST",
							async:"false",
							data:{serial:id},
							dataType: "json",
							success: function(data){
							
							  }
							});
				  }
		 })
	});

</script>	
	

