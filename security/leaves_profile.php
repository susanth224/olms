<div width="120%" height="120%" class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3>Student Profile</h3>
</div>
<div width="120%" height="120%" class="modal-body">
<?php session_start(); ?>
<?php
if(isset($_SESSION['sec']))
{
?>  
	<?php
	if (isset($_GET['sno']))
	{
	include("dbconfig.php");
	$result=mysql_query("SELECT * FROM leaves WHERE sno=".$_GET['sno']);
	while($row=mysql_fetch_array($result))
	{
		$id=$row['id'];
	}
		$resul=mysql_query("SELECT * FROM users WHERE id='$id'");
			while($row=mysql_fetch_array($resul))
			{
				?>
				<div><center>
				<table><tr><td><img style="position:relative;width:200px;height:200px;" src="get.php?id=<?php echo $id;?>">
						</img></td><td><img style="position:relative;width:200px;height:200px;" src="images/stu/<?php echo $id;?>.jpg">
						</img></td></tr></table>
				</center>
						</div>
						<div>
							<center>
							<table style="margin-top:20px;height:200px;font-size:25px;">
						<tr>
						<tr><td>Id</td><td>:</td><td><?php echo $id;?></td></tr>
						<tr><td>Name</td><td>:</td></td><td><?php echo "".$row["name"]."" ?></td></tr>	
						<tr><td>Class</td><td>:</td></td><td><?php echo "".$row["class"]."" ?></td></tr>
						<tr><td>Branch</td><td>:</td></td><td><?php echo "".$row["branch"]."" ?></td></tr>
						<tr><td>Year</td><td>:</td></td><td><?php echo "".$row["year"]."" ?></td></tr>
					</table>
							</center>
						
						
						</div>
	<?php
	}
	}
	?>
<?php
}
?>
<div class="modal-footer">
<button  class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
</div>
</div>
