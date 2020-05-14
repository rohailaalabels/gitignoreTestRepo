<style>
.die-btn {
	background-color: transparent;
	color: #303030;
	display: block;
	font-size: 12px;
	font-weight: 400;
	padding-bottom: 0;
	padding-top: 0;
	position: relative;
	text-transform: uppercase;
}
</style>
<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Custom Die - Proof</li>
      </ol>
    </div>
  </div>
</div>
<?
  $result = $this->db->query("select * from flexible_dies_info where OID = '".$data['SerialNumber']."' ")->row_array();
	
?>
<div class="bgGray">
<div class="container">
  <div class="thumbnail prMatDC">
    <div class="clear10"></div>
    <div class="col-xs-12 col-sm-12 col-md-7">
      <div class="title"> <b class="col-sm-6 col-xs-6">Die Details</b> </div>
      <div class="captionX m0">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <p><strong>Ref / Title / Die</strong> <br>
            <?=$data['manufactureid']?>
          </p>
          <p><strong>Label Type</strong> <br>
            <?=$result['format']?>
          </p>
          <p><strong>Corner Radius</strong> <br>
            <?=$result['cornerradius']?>
            mm</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-5">
          <p><strong>Order Number</strong> <br>
            <?=$data['OrderNumber']?>
          </p>
          <p><strong>Label Size</strong> <br>
            <? if(preg_match("/circleis", $result['shape'])){
                    echo $result['width'].' Diameter';
    			}else{?>
            Width:
            <?=$result['width']?>
            mm x Height:
            <?=$result['height']?>
            mm
            <? } ?>
          </p>
          <!-- <p><strong>Date/ Time</strong> <br>
              Sun, February 04, 2018 at 11:43 AM            </p>--> 
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
          <p><strong>Shape</strong> <br>
            <?=$result['shape']?>
          </p>
          <!--<p><strong>Finish Substrate</strong> <br>
              </p>--> 
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-5 col-sm-12 "> <img onerror='imgError(this);' src="https://www.aalabels.com/theme/site/images/categoryimages/labelShapes/ws-banner-new.png" alt="Labels Images" width="400" height=""> </div>
  </div>
</div>
<div class="container">
  <div class="panel">
    <iframe style="margin-right:5px;" align="middle" src="<?=AJAXURL?>/theme/custom_dies/<?=$data['file']?>" width="975" height="900"></iframe>
    <div class="clear"></div>
  </div>
</div>
<form id="artwork_approval" method="post">
  <div class="container  thumbnail prMatDC">
    <div class="clear10"></div>
    <div class="col-md-12">
      <div class="titleX"> </div>
      <p>Please add your comments here....</p>
      <div class="table-responsive">
        <table class="table table-striped labels-form">
          <tbody>
            <tr class="checklist" valign="middle">
              <td align="left"><textarea id="feedback" rows="4" class="form-control description"></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
      <p>Thank you for using our services.</p>
      <div class="row">
        <div class="col-md-6 col-xs-7">
          <button class="btn-block btn blue2 approved" role="button" value="0" type="button"> <i class="fa fa-arrow-circle-left"></i> Click To Decline </button>
        </div>
        <div class="col-md-6 col-xs-5">
          <button class="btn-block btn orange approved" value="1" type="button">Click To Approve <i class="fa fa-arrow-circle-right"></i></button>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</form>
</div>
<script>
  $(document).on("click", ".approved", function(e){
		var serial = <?=$data['SerialNumber']?>;
		var bool   = $(this).val();
		var feedback = $('#feedback').val();
		if(bool==0 && feedback==''){
		 swal('warning','Enter Your Feedback','warning');
		 return false;
		}

		swal({
			title: "Are you sure you want to Continue?",
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
					$.ajax({
						type: "post",
						url: "<?=base_url()?>home/die_approved",
						cache: false,               
						data:{serial:serial,bool:bool,feedback:feedback},
						dataType: 'html',
						success: function(data){
							pop_up(bool);
							//location.href = "http://gtserver/aalabels/home";
						}
					});
				}
		 	})
	});
	function pop_up(bool){
		if(bool == 0){
		  var msg = "Amendment requested. We will get back to you with Amended Die proof.";
		}else{
		  var msg = "Approval received. Your Order is now in production.";
		}
		swal({
			title:msg,
			type:"success",
			showCancelButton: false,
			confirmButtonClass: "btn blueBg",
			confirmButtonText: "OK",
			closeOnConfirm: true,
		},
			function(isConfirm) {
				if (isConfirm) {
					location.href = "<?=base_url()?>";
				} 
			
		})
		
	}
</script>