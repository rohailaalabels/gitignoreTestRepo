<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Source</title>
     -->


<!--</head>
<body>-->
<?php
//$temp_id  = "6484";  //// For 6 Circles
//$temp_id  = "918";  //// For 48 Circles
$temp_id = $temp_id;  //// For 2 Circles
//$temp_id  = "5805";  //// For 12 Circles
//$temp_id  = "14835";  //// For 216 Circles
$is_admin = "false";
 $config_xml_path = AJAXURL . "flash_api/config";
$is_server_running = "true";
$is_design_selected = "false"; // if edit  a design then true
$create_new_design = "false";
$design_category_id = "0";
$design_sub_cate_id = "0";
$design_id = "0";

$user_id = (isset($user_id) && $user_id != "") ? $user_id : '';
$is_user_project_selected = (isset($is_user_project_selected) && $is_user_project_selected != "") ? $is_user_project_selected : '';
$user_project_id = (isset($user_project_id) && $user_project_id != "") ? $user_project_id : '';
$user_project_name = (isset($user_project_name) && $user_project_name != "") ? $user_project_name : '';

$is_template_selected = (isset($type) && $type == "designer") ? 'true' : 'false';
//$create_new_design           = (isset($is_template_selected) && $is_template_selected =="true")?'true':'false';


$user_id = $user_id;
$is_user_project_selected = $is_user_project_selected;
$user_project_id = $user_project_id;
$user_project_name = $user_project_name;

$apply_design_id = $this->session->userdata('temp_design');
$is_design_apply = (isset($apply_design_id) && $apply_design_id != '') ? 'true' : 'false';
$this->session->set_userdata('temp_design', '');
?>
<!--<div align="center">-->
<!--<div id="flashContent" align="center">-->
<object type="application/x-shockwave-flash" data="<?= Assets ?>flash/Source.swf?v=3.5" width="1200" height="726"
        id="Source" style="float: none; vertical-align:middle">
    <param name="movi" value="<?= Assets ?>flash/Source.swf?v=3.5"/>
    <param name="quality" value="high"/>
    <param name="bgcolor" value="#e0e0e0"/>
    <param name="play" value="true"/>
    <param name="loop" value="true"/>
    <param name="wmode" value="opaque"/>
    <param name="scale" value="showall"/>
    <param name="menu" value="false"/>
    <param name="FlashVars"
           value="<?= '&is_admin=' . $is_admin . '&temp_id=' . $temp_id . '&config_xml_path=' . $config_xml_path . '&is_server_running=' . $is_server_running . '&is_design_selected=' . $is_design_selected . '&create_new_design=' . $create_new_design . '&design_category_id=' . $design_category_id . '&design_sub_cate_id=' . $design_sub_cate_id . '&design_id=' . $design_id . '&user_id=' . $user_id . '&is_user_project_selected=' . $is_user_project_selected . '&user_project_id=' . $user_project_id . '&user_project_name=' . $user_project_name . '&is_design_apply=' . $is_design_apply . '&apply_design_id=' . $apply_design_id . '&is_template_selected=' . $is_template_selected ?>"/>
    <param name="devicefont" value="false"/>
    <param name="salign" value=""/>
    <param name="allowScriptAccess" value="always"/>
    <a href="https://www.adobe.com/go/getflash">
        <img onerror='imgError(this);' src="https://www.adobe.com/images/shared/download_buttons/get_flash_player.gif"
             alt="Get Adobe Flash player"/>
    </a>
</object>
<!--</div>-->
<!--</div>-->
<!--	</body>
</html>-->


    