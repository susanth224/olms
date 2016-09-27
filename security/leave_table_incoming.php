	<?php include('dbconfig.php'); ?>
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
					<th>S.No</th>
					<th>A.id</th>
					<th>ID</th>
					<th>Outgoing-Date</th>
					<th>Incoming-Date</th>
					<th>Security-Sign</th>
					</tr>
		</tr>
		</thead>
		<tbody>
		<?php
					$res=mysql_query("select * from leaves where permission='granted' and ictime='--' and ogdate!='--';");
							while ($row=mysql_fetch_array($res))
							{		echo "<tr>"?>
									<td><?php echo  $row['sno']; ?></td>
									<td><?php echo  $row['sno']; ?></td>
									<?php echo "<td onclick=\"display(".$row["sno"].")\" class='text-info' title='Posted at ".$row["adate"]."'><a href=\"#myModal\" data-toggle=\"modal\"><font color='#0088cc' size=3px>".$row["id"]."</a>";?>
									<td><?php echo  $row['odate']; ?></td>
									<td><?php echo  $row['idate']; ?></td>
								<td class="empty" ="160">
		<a data-placement="top" title="Click to Approve" id="approve<?php echo $row['sno']; ?>" href='lic.php?sno=<?php echo "".$row['sno']."";?>' class="btn btn-success"><i class="icon-ok icon-large"></i>Report</a></a>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#approve<?php echo  $row['sno']; ?>').tooltip('show');
				$('#approve<?php echo  $row['sno']; ?>').tooltip('hide');
			});
			</script>
		</td> 
		</tr>
						<?php
							}
							?>
 
	
		</tbody>
	</table>
	</form>
<script>
	
	function display(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("leaves_profile.php?sno="+sno);
	}
	</script>
