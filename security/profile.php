<?php
session_start();
if(isset($_SESSION['sec']))
{
include("dbconfig.php");

$sesn_id=$_SESSION["id"];
$id=$_GET["id"];
$name=$_SESSION["name"];
$d=mysql_query("select * from users where id='$id';");
$da=mysql_fetch_array($d);
$no=mysql_num_rows(mysql_query("select * from outing where id='$id';"));
$nl=mysql_num_rows(mysql_query("select * from leaves where id='$id';"));
?>
							<div>
						<table><tr><td><img style="position:relative;width:250px;height:300px;" src="get.php?id=<?php echo $id;?>">
						</img></td><td><img style="position:relative;width:250px;height:300px;" src="get.php?id=<?php echo $id;?>">
						</img></td></tr></table></div>
</div>
						<table style="margin-top:20px;height:200px;">
						<tr>
						<tr><td>Id</td><td>:</td><td><?php echo $id;?></td></tr>
						<tr><td>Name</td><td>:</td></td><td><?php echo $da['name']; ?></td></tr>	
						<tr><td>Class</td><td>:</td></td><td><?php echo $da['class']; ?></td></tr>
						<tr><td>Branch</td><td>:</td></td><td><?php echo $da['branch']; ?></td></tr>
						<tr><td>Year</td><td>:</td></td><td><?php echo $da['year']; ?></td></tr>
					</table>
						</div>
<?php
}
else
	header("location:index.php");
?>						
