<?php
session_start();
include("security.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Leaves Management System - IIITN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1;">
<meta name="description" content="Online Leaves Management System">
<meta name="owner" content="OLMS WebTeam">
<meta name="developers" content="">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/facebox.js">
<link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" type="text/css" href="css/tooltips.css">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="student.js"></script>
	
<div class="clr"></div>
</div>


<div id="tcontent" >
<img src="images/site_loader.gif" style="position:absolute;top:40%;left:45%;">
<p style="position:absolute;top:50%;left:45%;">
Please wait while loading...
</p>
</div>
<?php
if(array_key_exists('site',$_SESSION)&& $_SESSION['site']=="outpass" && $_SESSION['user']=="student")
{

echo <<<st
	<script type="text/javascript">
		$("#tcontent").load('student.php',function(){
    
});
		</script>
st;
}
else
{
	echo <<<stu
	<script type="text/javascript">
		$('#tcontent').load("stu_lg_reg.php");
		</script>
stu;

}
?>
<?php include('footer.php'); ?>
</body>


