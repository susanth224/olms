<?php session_start(); ?>

<?php
if(isset($_SESSION['office']))
{
include("dbconfig.php");

if (isset($_GET['date']))
	{
	include("dbconfig.php");
	$date=$_GET['date'];
	//$result=mysql_query("SELECT * FROM outing WHERE sno=".$_GET['sno']);
	//while($row=mysql_fetch_array($result))
	//{
	//	$id=$row['id'];
	//}
	//	$resul=mysql_query("SELECT * FROM data WHERE id='$id'");
		//	while($row=mysql_fetch_array($resul))
		//	{?>
						<table >
				
						<tr>
						<Td valign="top">

						<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:px;width:460px;overflow:;'>
								<table style="font-size: 12px;" class='table'>
								<?php  $todaydate=date("d m Y");$wai='wait';
								$res=mysql_query("SELECT count(*) FROM outing WHERE permission='granted' and ogdate='".$date."'");
								while($row=mysql_fetch_array($res)){$tog=$row[0];}  ?>
								<tr class="info"><td colspan="4"> <b >Outgoing STATUS ON <?php echo $date;?>&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;TOTAL-<?php echo $tog;?>  </b></td></tr>
								<tr>
									<th width="5%">Sno</th>
									<th width="10%">ID</th>
									<th width="8%">Outgoing Time</th>
									<th width="10%">Returning Time</th>
								</tr>
						<?php
							$i=0;
					$res=mysql_query("SELECT * FROM outing WHERE  permission='granted' and ogdate='".$date."'");
							while ($row=mysql_fetch_array($res))
							{
						
							$i++;?>
									<tr align='center'>
									<td width="3%"><?php echo "$i";?></td>
									<td width="10%"><?php echo "".$row['id']."";?></td>
									<td width="10%"><?php echo "".$row['ogtime']."";?></td>
									<td width="10%"><?php echo "".$row['itime']."";?></td>
									</tr>
								<?php
							}
							?>
						</table>
						</td>
						</div>



						<Td valign="top">
						<div style='border:1px solid #ddd;border:1px solid #ddd;padding:10px;height:px;width:455px;overflow:;'>
									<table style="font-size: 12px;" class='table'>
								<?php  $todaydate=date("d m Y");$wai='wait';
								$res=mysql_query("SELECT count(*) FROM outing WHERE permission='granted' and icdate='".$date."'");
								while($row=mysql_fetch_array($res)){$tic=$row[0];}  ?>
									<tr class="info"><td colspan="4"><b >Incoming STATUS ON <?php echo $date;?>&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;TOTAL-<?php echo $tic;?>  </b></td></tr>
								<tr>
									<th width="5%">Sno</th>
									<th width="10%">ID</th>
									<th width="8%">Leaveing Time</th>
									<th width="10%">Incoming Time</th>
								</tr>
							<?php
							$i=0;
					$res=mysql_query("SELECT * FROM outing WHERE  permission='granted' and icdate='".$date."'");
							while ($row=mysql_fetch_array($res))
							{
						
							$i++;?>
									<tr align='center'>
									<td width="3%"><?php echo "$i";?></td>
									<td width="10%"><?php echo "".$row['id']."";?></td>
									<td width="10%"><?php echo "".$row['ogtime']."";?></td>
									<td width="10%"><?php echo "".$row['ictime']."";?></td>
									</tr>
								<?php
							}
							?>
						</table>
						</td>
						</tr>
						</table>

<?php
}
}

?>
