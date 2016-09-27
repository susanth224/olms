<div width="120%" height="120%" class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3>Student Profile</h3>
</div>
<div width="120%" height="120%" class="modal-body">
<?php session_start(); ?>
<?php
if(isset($_SESSION['cha']))
{
?>  
	<?php
	if (isset($_GET['sno']))
	{
	include("dbconfig.php");
	$sno=htmlspecialchars(addslashes($_GET["sno"]));
	$result=mysql_query("SELECT * FROM leaves WHERE sno='$sno'");
	while($row=mysql_fetch_array($result))
	{
		$id=$row['id'];
	}
		$resul=mysql_query("SELECT * FROM users WHERE id='$id'");
			while($row=mysql_fetch_array($resul))
			{
				?>
				<table>
				<tr>
				<Th valign="top">

				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:370;width:400px;overflow:; text-align: left;'>
				<table border='0' style='height:200px;width:330px';>
				<tr><td>ID</td><td><?php echo ":" . $row['id'] . "";?></td></tr>
				<tr><td width="">NAME</td><td><?php echo ":" . $row['name'] . "";?></td></tr>
				<tr><td>BRANCH</td><td><?php echo ":" . $row['branch'] . "";?></td></tr>
				<tr><td>CLASS</td><td><?php echo ":" . $row['class'] . "";?></td></tr>
				<tr><td>YEAR</td><td><?php echo ":" . $row['year'] . "";?></td></tr>
				<tr><td>DORM</td><td><?php echo ":" . $row['dorm'] . "";?></td></tr>
				<tr><td width="40%">Mobile Number</td><td><?php echo ":" . $row['mob'] . "";?></td></tr>
				<tr><td>Parent Number</td><td><?php echo ":" . $row['pmob'] . "";?></td></tr>
				<tr><td>Home Address</td><td><fieldset><?php echo "Door Number:" . $row['door'] . ",<br>village:".$row['vil'] . ",<br>Mandal:". $row['mdl'] . ",<br>District:". $row['dist'] . ",<brPinCode:" . $row['pin'] . ".";?></fieldset></td><br>
				</tr>
				</table>
				</div>
				</th>
				<Td valign="top">

				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:200px;width:175px;overflow:;'>
				<ul class="thumbnails">
					<li class="span3" style="width:170px;height:170px;">
					  <a class="thumbnail">
	
						<img src="get.php?id=<?php echo $id;?>" style="width:99%;height:170px;border-radius:100%;"><br/><font size='3' face='Serif' ></a>

					  </a>
					</li>
					</ul>
					<?php
						$res=mysql_query("SELECT count(*) FROM leaves WHERE `id`='$id' AND `permission`='granted' ");
						while($row=mysql_fetch_array($res)){$leaves=$row[0];}
						?>
					<h4>Total leavess:<?php echo $leaves;?></h4>
					<h4><?php //echo $leavess;?></h4>
				</div>
				</td>
				</tr>
				<tr>
				</tr>
				</table>
			<table>
				<tr>
				<Td valign="top">
				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:px;width:610px;overflow:;'>
				<table>
					<tr style='width="100%"'>Total LEAVES STATUS</tr>
				<tr>
									<th width="3%">Sno</th>
									<th width="10%">Leaves Date</th>
									<th width="10%">Returning Date</th>
									<th width="10%">Incoming Date</th>
									
								</tr>
						</table>
						<table>
						<Td valign="top">

				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:100px;width:600px;overflow:scroll;'>
				<table >
								<?php
							$i=0;
					$res=mysql_query("SELECT * FROM leaves WHERE id='".$id."' AND `permission`='granted'");
							while ($row=mysql_fetch_array($res))
							{
						
							$i++;?>
									<tr align='center'>
									<td width="3%"><?php echo "$i";?></td>
									<td width="10%"><?php echo "".$row['adate']."";?></td>
									<td width="10%"><?php echo "".$row['ogtime']."";?></td>
									<td width="10%"><?php echo "".$row['ictime']."";?></td>
									</tr>
								<?php
							}
							?>
							
				</table></div></div>

				</td>							
				</table>
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
