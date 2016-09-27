<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION["site"]=="outpass" && $_SESSION["user"]=="faculty")
{
include("dbconfig.php");
$id=htmlspecialchars(addslashes($_GET["id"]));
$od=mysql_query("select * from outing where id='$id' order by odate asc;")or die(mysql_error());
?>
<style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
	</style>
	<script type="text/javascript" src="js/custom.js"></script>
		
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" style="font-size:12;" align="center">
						
							<thead>
								<tr>
									<th>Status</th>
									<th>Date Outing</th>
									<th>Created date</th>
								</tr>
							</thead>
							<tbody align="center">
								
<?php
for($i=0;$i<mysql_num_rows($od);$i++)
{
	$odata=mysql_fetch_array($od);
	$id=$odata['id'];
	echo <<<out2
			<tr>
				<td>outing</td>
				<td>$odata[2]</td>
				<td>$odata[3]</a></td>
			</tr>	
out2;
}
}//end if
else
{
	header("location:index.php");
}
?>
