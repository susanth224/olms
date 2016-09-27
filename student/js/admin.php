<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION["site"]=="outpass" && $_SESSION["user"]=="admin")
{
include("dbconfig.php");
?>
<title>Outpass...</title>
<style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");		
</style>
<script type="text/javascript">
function last_yr()
	{
		var lstyr=document.getElementById("lstyr").value;
		document.getElementById("message_box").style.visibility="visible";
		$.post("send_lastyr.php?lstyr="+lstyr,function(data)
		{
			$("#message_box").html(data);
		});
		
	}
function prmt_yr()
	{
		document.getElementById("message_box").style.visibility="visible";
		$.post("prmt_yr.php",function(data)
		{
			$("#message_box").html(data);
		});
		
	}
</script>
<body >
<div id="hld" >
	
		<div class="wrapper">	
			<div id="header" >
				<div class="hdrl"></div>
				<div class="hdrr"></div>
				<h1><a href="#" >OIS</a></h1>
				
				
				
				<p class="user">Hello, Admin | <a href="logout.php">Logout</a></p>
			</div>
			<div id="tcontent" class="block" style="width:100%">
			
				<div id="ctnt" class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					<h2 id="blc_h2">Settings<h2>
				</div>
				<div id="bl_ctnt" class="block_content divs">
					<div id="message_box" class="message info" style="visibility:hidden"></div>
					<div id="bl_ctnt1" class="block_content2 " >
					<p>
					<label>Last Year(E4) Id's starts with:</label>
					<input type="text" id="lstyr">length should be 3. ex:N09
					</p>
					<input type="submit" value="submit" class="submit" id="lyrsb" onclick="last_yr()">
					<p>
					<label>Promote Year</label>
					<input type="submit" value="PROMOTE" class="submit" id="prmsb" onclick="prmt_yr()">
					</p>
					</div>
					
				</div>
				

			</div>
				<!-- .block_content ends -->
			
		</div>
			
</div>

<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
	<script type="text/javascript" src="js/jquery.img.preload.js"></script>
	<script type="text/javascript" src="js/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="js/jquery.date_input.pack.js"></script>
	<script type="text/javascript" src="js/facebox.js"></script>
	<script type="text/javascript" src="js/jquery.visualize.js"></script>
	<script type="text/javascript" src="js/jquery.visualize.tooltip.js"></script>
	<script type="text/javascript" src="js/jquery.select_skin.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="js/ajaxupload.js"></script>
	<script type="text/javascript" src="js/jquery.pngfix.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
<?php
}
else
{
header("location:index.php");
}
?>
