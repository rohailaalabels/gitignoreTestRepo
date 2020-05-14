<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Source</title>
		<style type="text/css" media="screen">
		html, body { height:100%; background-color: #e0e0e0;}
		body { margin:100; padding:0; }
		#flashContent { width:994; height:726; }
		</style>
	</head>
	<body>
    <?php 
		//$temp_id  = "6484";  //// For 6 Circles
		//$temp_id  = "918";  //// For 48 Circles
		$temp_id  = "724";  //// For 2 Circles
		//$temp_id  = "5805";  //// For 12 Circles
		//$temp_id  = "14835";  //// For 216 Circles
		$is_admin = false;
		$config_xml_path = "http://gtserver/newlabels/flash_api/config";	
		$is_server_running = "true";
		$is_design_selected = "false";
		$create_new_design = "false";
		$design_category_id = "0";
		$design_sub_cate_id = "0";
		$design_id = "0";
	 ?>
		<div id="flashContent" align="center">
			<object type="application/x-shockwave-flash" data="http://gtserver/newlabels/theme/site/flash/Source.swf<?='?'.time()?>" width="994" height="726" id="Source" style="float: none; vertical-align:middle">
				<param name="movie" value="http://gtserver/newlabels/theme/site/flash/Source.swf<?='?'.time()?>" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#e0e0e0" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
                <param name="FlashVars" value="<?='&is_admin='.$is_admin.'&temp_id='.$temp_id.'&config_xml_path='.$config_xml_path.'&is_server_running='.$is_server_running.'&is_design_selected='.$is_design_selected.'&create_new_design='.$create_new_design.'&design_category_id='.$design_category_id.'&design_sub_cate_id='.$design_sub_cate_id.'&design_id='.$design_id?>" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<a href="http://www.adobe.com/go/getflash">
					<img onerror='imgError(this);' src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
				</a>
			</object>
		</div>
	</body>
</html>
