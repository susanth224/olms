	<?php include('dbconfig.php'); ?>
	<div id="hi"></div>
	<div class="modal hide fade" id="myModal" aria-hidden="true"></div>
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
			
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "Today's Date :".date("d/m/y"); ?></a>
	</div>
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
					<th>ID No</th>
					<th>CLASS</th>
					<th>REASON</th>
					<th>OUTING DATE</th>
					<th>LEAVING TIME</th>
					<th>REPORTING TIME</th>
					<th class="empty"></th>
		</tr>
		</thead>
		<tbody>
		<?php
							$cdate = date("d m Y");
					$res=mysql_query("SELECT * FROM outing WHERE block='".$block."' AND permission='refuse' AND adate='$cdate' ORDER BY sno ASC LIMIT 30");
							while ($row=mysql_fetch_array($res))
							{		echo "<tr>"?>
									<?php echo "<td onclick=\"display(".$row["sno"].")\" class='text-info' title='Posted at ".$row["adate"]."'><a href=\"#myModal\" data-toggle=\"modal\"><font color='#0088cc' size=3px>".$row["id"]."</a>";?>
									<td ="10%"><?php echo "".$row['year']."-".$row['class']."";?></td>
									<th width="20%"><?php echo "".$row['reason']."";?></th>
									<td ="10%"><?php echo "".$row['odate']."";?></td>
									<td ="10%"><?php echo "".$row['otime']."";?></td>
									<td ="10%"><?php echo "".$row['itime']."";?></td>
								<td class="empty" ="160">
		
		<a data-placement="top" title="Click to Approve" id="approve<?php echo $row['sno']; ?>" href='approve_ref_outing.php?sno=<?php echo "".$row['sno']."";?>' class="btn btn-success"><i class="icon-ok icon-large"></i>Approve</a></a>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#approve<?php echo $row['sno']; ?>').tooltip('show');
				$('#approve<?php echo $row['sno']; ?>').tooltip('hide');
			});
			</script>
		</td> 
		</tr>
						<?php
							}
							?>
 
	
		</tbody>
	</table>
<script>
	function display(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("outing_profile.php?sno="+sno);
	}
	</script>
