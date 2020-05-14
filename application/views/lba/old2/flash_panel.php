
<div class="row">
 <div class="col-sm-12">

   
   
    <?php 
	   // $link_bind ='https://gtserver/';
		$link_bind ='https://www.aalabels.com/beta/';
        $temp_id    = $temp_id;  
        $is_admin = "false";
		$is_server_running = "true";
		$is_user_design_selected = $is_user_design_selected;
		$user_id = $this->session->userdata('userid');
		$session_id = $this->session->userdata('session_id');
		$config_xml_path = $link_bind."flashadmin/Lba_api/config";	
		

	 ?>
		<!--<div align="center">-->
	<object type="application/x-shockwave-flash" data="<?=$link_bind?>Labeler/Editor.swf?v=<?=time()?>" width="100%" height="726" id="Source" style="float: none; vertical-align:middle">
				<param name="movie" value="<?=$link_bind?>Labeler/Editor.swf?v=<?=time()?>" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#e0e0e0" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="opaque" />
				<param name="scale" value="showall" />
				<param name="menu" value="false" />
                <param name="FlashVars" value="<?='&is_admin='.$is_admin.'&temp_id='.$temp_id.'&config_xml_path='.$config_xml_path.'&is_server_running='.$is_server_running.'&is_user_design_selected='.$is_user_design_selected.'&user_id='.$user_id.'&session_id='.$session_id?>" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="always" />
				<a href="http://www.adobe.com/go/getflash">
					<img onerror='imgError(this);' src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
				</a>
			</object>
	</div>
    </div>
    
    
 <script>
    function close_lba_panel(){
	 
	   swal({
				  title: "Are you sure you want to close Editor ?",
				  text: "",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn orangeBg",
				  confirmButtonText: "OK",
				  closeOnConfirm: true,
				},
				function(isConfirm) {
				  if (isConfirm) {
					  $('#upper_panel').html('');	
				  } 
		 	});
	
	}
   </script> 