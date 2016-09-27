	<?php include('dbconfig.php'); ?>
	<div class="modal hide fade" id="myModal" aria-hidden="true"></div>
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "Today's Date :".date("j/m/y"); ?></a>
	</div>
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
					<th>ID</th>
					<th>Class</th>
					<th>Reason</th>
					<th>Appling Date</th>
					<th>Leaving Date</th>
					<th>Reporting Date</th>
					<th class="empty"></th>

		</tr>
		</thead>
		<tbody>
		<?php
					$cdate = date("d m Y");
					$res=mysql_query("SELECT * FROM leaves WHERE  permission='granted' AND adate='$cdate'  ORDER BY sno ASC LIMIT 30");
							while ($row=mysql_fetch_array($res))
							{		echo "<tr>"?>
									<?php echo "<td onclick=\"display(".$row["sno"].")\" class='text-info' title='Posted at ".$row["adate"]."'><a href=\"#myModal\" data-toggle=\"modal\"><font color='#0088cc' size=3px>".$row["id"]."</a>";?>
									<td ="10%"><?php echo "".$row['year']."-".$row['class']."";?></td>
									<th width="20%"><?php echo "".$row['reason']."";?></th>
									<td ="10%"><?php echo "".$row['adate']."";?></td>
									<td ="10%"><?php echo "".$row['odate']."";?></td>
									<td ="10%"><?php echo "".$row['idate']."";?></td>
								<td class="empty" ="160">
		
		<a data-placement="top" title="Click to Refuse" id="reject<?php echo $row['sno']; ?>" href='refuse_san_leaves.php?sno=<?php echo "".$row['sno']."";?>' class="btn btn-warning"><i class="icon-remove icon-large"></i>Refuse</a></a>
				<script type="text/javascript">
			$(document).ready(function(){
				$('#reject<?php echo $row['sno']; ?>').tooltip('show');
				$('#reject<?php echo $row['sno']; ?>').tooltip('hide');
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
	$("#myModal").load("leaves_profile.php?sno="+sno);
	}
	</script>
