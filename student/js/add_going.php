<?php
session_start();
include("dbconfig.php");
$id=$_SESSION["id"];
$name=$_SESSION["name"];
$a=mysql_query("select * from security where username='$id';") or die(mysql_error());
if(mysql_num_rows($a)>0)
{
    	$okey=$_GET["okey"];
    	$class=$_GET["cls"];
    	$type=$_GET["type"];
    	$pmkeys=explode(",",$okey);
	$upmkeys=array_unique($pmkeys);
	$npmks=count($upmkeys);
	for($i=0;$i<$npmks;$i++)
	{
		if($upmkeys[$i]!="")
		{
			$kkey=$upmkeys[$i];
			?>
			<style type="text/css" media="all">
			@import url("css/style.css");
			@import url("css/jquery.wysiwyg.css");
			@import url("css/facebox.css");
			@import url("css/visualize.css");
			@import url("css/date_input.css");
		
		   	</style>
			<script type="text/javascript">
			function going()
			{
				var going_id_key="<?php echo $kkey;?>";
				var type="<?php echo $type;?>"
				$.post("going_time.php",{okey:going_id_key,type:type},function(data)
				{
					$("#san_popup").html(data);
				});
			}
			</script>

			<?php
			if($type=="outing")
				$out_det=mysql_query("select * from outing where okey='$kkey';")or die(mysql_error());
			else 
				$out_det=mysql_query("select * from leaves where okey='$kkey';")or die(mysql_error());
			$id_out_det=mysql_fetch_array($out_det);
			
?>
			
			
			<div id="san_popup" class="block block_content">
			<table>
			<tr>
			<td>
				<div class=".divs" style="padding:10px;">
					<div style=";border:1px solid #bbb;padding:10px;width:130px;-moz-border-radius:5px;border-radius:5px;-webkit-border-radius:5px;">
					<img src="get.php?id=<?php echo $id_out_det['id'];?>" style="width:130px;height:150px;">
					</div>
				</div>
			</td>
			<td>
				<div class=".divs" style="padding:10px;">
				<div  class="divs" style="padding:10px;width:130px;">
					<h3><?php echo $id_out_det['id']?></h3>
					<ul>
						<li><?php echo $id_out_det['year']."  ".$id_out_det['class']?></li>
						<?php
						if($type=="leaves")
								echo '<li>'.$id_out_det['idate'].'</li>'
						?>
					</ul>
					<p>
				<input type="submit" class="submit" value="going" onclick="going()">
				</p>
				</div>
				
				
				</div>
			</td>
			</tr>
			</table>
			</div>
<!--
			<table colspace=5 rowspace=5>
			<tr>
			<td rowspan=9>
			<img src="get.php?id=<?php echo $id_out_det['id'];?>" style="width:130px;height:150px;">
			</td>
			<td>
				<table font-size=10>
				<tr><td><h4><?php echo $id_out_det['id']?></h4></td></tr>
				<tr></tr>
				<tr><td><h4><?php echo $id_out_det['reason']?></h4></td></tr>
				<tr></tr>
				<tr><td><h4><?php echo $id_out_det['odate']?></h4></td></tr>
				<tr></tr>
				<tr><td><b><?php echo $id_out_det['year']."  ".$id_out_det['class']?></b></td></tr>
				<tr></tr>
				<tr><td><h4><a >Sanction</a></h4></td></tr>
				</table>
			</td>
			</tr>
			</table>
-->
			<script type="text/javascript" src="js/jquery.js"></script>
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
	}	
echo <<<ss
ss;
}

?>
