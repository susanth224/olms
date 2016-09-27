<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nice Pop-up Box with scroll-bar using JavaScript and CSS</title>






<!-- Required header files -->
<script type="text/javascript" src="js/vpb_javascript_pop_up.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">





</head>
<body>
<br clear="all">
<center>
<div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;width:1000px;">Nice Pop-up Box with scroll-bar using JavaScript and CSS</div><br clear="all" /><br clear="all" />
<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black; width:650px; line-height:20px;" align="left">To demo the system, please click on the button provided below to see the pop-up box in action.</div><br clear="all"><br clear="all">











<!-- Pop-up Code Begins -->
<div id="vpb_pop_up_contents" style="display:none;">

<div id="vpb_main_header">
<div id="vpb_header_wrapper" align="left">Popup Title</div>
<div id="vpb_exit_popup_wrapper" align="right"><a class="vpb_button" title="Exit" href="javascript:void(0);" onclick="vpb_exit_pop_up_box();">x</a></div>
</div>

<div id="main_vpb_pop_up_contents">
This is where the content of the pop-up box will be<br /><br />
</div>

</div>
<!-- Pop-up Code Ends -->





<!-- This is the link for the Pop-up Button -->
<a href="javascript:void(0);" class="vpb_button" style="padding:10px; padding-left:13px; padding-right:13px;" onclick="vpb_pop_up_box();">Open Popup Box</a>











</center>
</body>
</html>