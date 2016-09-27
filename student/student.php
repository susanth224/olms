<?php
session_start();
if($_SESSION["site"]=="outpass"&& $_SESSION["id"]!="" && $_SESSION["user"]=="student")
{
include("dbconfig.php");
mysql_select_db("$db") or die(mysql_error());
$id=htmlspecialchars(addslashes($_SESSION["id"]));
$pass=htmlspecialchars(addslashes($_SESSION["pass"]));
$name=htmlspecialchars(addslashes($_SESSION["name"]));
$site=htmlspecialchars(addslashes($_SESSION["site"]));
$det=mysql_query("select * from users where id='$id';")or die(mysql_error());
$detls=mysql_fetch_array($det);
$o=mysql_query("select * from outing where id='$id';")or die(mysql_error());
$os=mysql_num_rows($o);
$l=mysql_query("select * from leaves where id='$id';")or die(mysql_error());
$ls=mysql_num_rows($l);

?>
<title>Outpass...</title>
<style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/tooltips.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");		
</style>
<body onload="enrollment()">
		<div class="wrapper">	
			<div id="header" >
				<h1 ><a href="#" >&nbsp;&nbsp;<img src="rgu.png" width="40px" height="40px"><font style="float:right;text-transform:capitalize;">&nbsp;IIIT NUZ Online Leaves Management System</font></a></h1>
				
				<ul id="nav">
					<li><a href="index.php">HOME</a></li>
					<li class=""><a href="#" id="leavel" onclick="getleaverls()">
					<?php
					$od=mysql_query("select * from leaves where id='$id' order by odate asc;")or die(mysql_error());
					for($i=0;$i<mysql_num_rows($od);$i++)
					{
						$odata=mysql_fetch_array($od);
						if( $odata["permission"]=="granted" && $odata["ogtime"]=="--")
						{
							echo "<img src='images/info1.gif'>";break;
						}
					}
					?>LEAVES</a>
					</li>
					<li><a href="#" id="outingl" onclick="getoutingrs()">
					OUTINGS<?php 	$od=mysql_query("select * from outing where id='$id' order by odate asc;")or die(mysql_error());
					for($i=0;$i<mysql_num_rows($od);$i++)
					{
						$odata=mysql_fetch_array($od);
						if( $odata["permission"]=="granted" && $odata["ogtime"]=="--")
						{
							echo "<img src='images/info1.gif'>";break;
						}
					}
					?></a>
					</li>
				</ul>
				
				<p class="user">
		
                              <a href='#' class="css-tooltip-bottom color-blue" style='text-decoration:none;font-size:13px;'><span>That's You...</span> Welcome <?php echo $name;?></a> | <a class="css-tooltip-left color-red" href="logout.php" style="font-size:13px;"><span><?php echo $name; ?>!,You want to Logout?</span>Logout</a>&nbsp;&nbsp;</p>
			</div>
			<div id="tcontent" class="block" style="width:100%">
			
				<div id="ctnt" style="border-radius:5px;">
					<center><h2 id="blc_h2" >Home<h2></center>
				</div>
				<div id="bl_ctnt" class="block_content">
					<div id="bl_ctnt1" class="block_content2" >
					</div>
				</div>
				

			</div>
				<!-- .block_content ends -->
			<div id="outingbox"  class="outingbox" style="width:100%">
			</div>
			<div id="leavebox" style="margin-top:-10%;width:100%">
			</div>

			
					</fieldset>
</div>
	<script type="text/javascript" src="student.js"></script>
		
<?php

}
else
{
echo <<<w
	<script type="text/javascript">
	window.location.href = 'index.php';
	</script>
w;
}
?>
