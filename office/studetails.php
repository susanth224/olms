
<?php session_start(); ?>
<?php
if(isset($_SESSION['office']))
{			
if (isset($_GET['id']))
{?>
<?php
$user=htmlspecialchars(addslashes($_GET['id']));
$tbl_name="users";
include("dbconfig.php");
$result=mysql_query("SELECT * FROM users WHERE id='$user'");
while($row=mysql_fetch_array($result))
   {

			?>
				<table  align="center">
				<tr>
				<Th  valign="top">
				<div style='border:0px solid #ddd;border:1px solid #ddd;padding:0px;height:auto;width:700px;overflow:; text-align: left;'>
				<table class="table">
				<tr><TD colspan="3">
					  <a class="thumbnail">
						<img src="get.php?id=<?php echo $user;?>" style="width:350px;height:400px;"><font size='3' face='Serif' ></a>
					  </a>
				</td><td>
<table>
				<tr class="success"><td>ID</td><td><?php echo ":" . $row['id'] . "";?></td></tr>
				<tr class="info"><td width="">NAME</td><td><?php echo ":" . $row['name'] . "";?></td></tr>
				<tr class="warning"><td>BRANCH</td><td><?php echo ":" . $row['branch'] . "";?></td></tr>
				<tr class="danger"><td>CLASS</td><td><?php echo ":" . $row['class'] . "";?></td></tr>
				<tr class="success"><td>YEAR</td><td><?php echo ":" . $row['year'] . "";?></td></tr>
				<tr class="info"><td>DORM</td><td><?php echo ":" . $row['dorm'] . "";?></td></tr>
				<tr class="warning"><td width="40%">Mobile Number</td><td><?php echo ":" . $row['mob'] . "";?></td></tr>
				<tr class="danger"><td>Parent Number</td><td><?php echo ":" . $row['pmob'] . "";?></td></tr>
				<tr class="success"><td>Home Address</td><td><?php echo "<p>Door Number:" . $row['door'] . ",</p><p>village:".$row['vil'] . ",</p><p>Mandal:". $row['mdl'] . ",</p><p>District:". $row['dist'] . ",</p><p>PinCode:" . $row['pin'] . ".</p>";?></table></td>
				</tr >
				</table>
				
				</div>
				</th>
				<?php
				$res=mysql_query("SELECT count(*) FROM outing WHERE  `id`='$user' AND permission='granted'");
											while($row=mysql_fetch_array($res)){$tout=$row[0];}
											$res=mysql_query("SELECT count(*) FROM leaves WHERE  `id`='$user' AND permission='granted'");
											while($row=mysql_fetch_array($res)){$tlv=$row[0];}?>
				
				
				</div>
				</th>							
				</table>
				</div>
<table>
				<tr>
				<Td valign="top">
				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:px;width:680px;overflow:;'>
				<table>
					<tr class="success" style='width="100%"'>Total LEAVES STATUS--<?php echo $tlv;?></tr>
				<tr>
									<th width="3%">Sno</th>
									<th width="10%">Leaves Date</th>
									<th width="10%">Returning Date</th>
									<th width="10%">Incoming Date</th>
									
								</tr>
						</table>
						<table>
						<Td valign="top">

				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:150px;width:660px;overflow:scroll;'>
				<table >
								<?php
							$i=0;
					$res=mysql_query("SELECT * FROM leaves WHERE id='".$user."' AND `permission`='granted'");
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
				</div>

				</td>
				<tr>
				<Td valign="top">
				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:px;width:680px;overflow:;'>
				<table>
					<tr style="font-color:red;"  >Total Outing STATUS--<?php echo $tout;?></h5></tr>
				<tr>
									<th width="3%">Sno</th>
									<th width="10%">Outing Date</th>
									<th width="10%">Leaveing Time</th>
									<th width="10%">Returning Time</th>
									
									
								</tr>
						</table>
						<table>
						<Td valign="top">

				<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:150px;width:660px;overflow:scroll;'>
				<table >
								<?php
							$i=0;
					$res=mysql_query("SELECT * FROM outing WHERE id='".$user."' AND `permission`='granted'");
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
							
				</table></div>
    
				<script>
	function lsanction(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("lvsncn.php?sno="+sno);
	}
	function lunsanction(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("lvusncn.php?sno="+sno);
	}
	function osanction(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("outsncn.php?sno="+sno);
	}
	function ounsanction(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("outusncn.php?sno="+sno);
	}
	function load()
{
	var id=document.getElementById("id").value;
	$.post("studetails.php?id="+id,function(id)
		{
			$("#tbody").html(id);
		});
}
	</script>
			<?php

		?>
		
		<?php
   }
   exit();
   break;
}
else
{
	echo "";
}
?>

<?php
}
?>
</div>
