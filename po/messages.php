	<?php include('dbconfig.php'); ?>
	<div class="modal hide fade" id="myModal" aria-hidden="true"></div>
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "Today's Date :".date("d/m/y"); ?></a>
	</div>
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
	
		<thead>
		<tr>
								<th>Sno</th>
								<th>send BY </th>
									<th>SEND TO</th>
									<th >TYPE</th>
									<th>Message</th>
							
									<th>TIME</th>
					

		</tr>
		</thead>
		<tbody>
		<?php
					$res=mysql_query("SELECT * FROM message ORDER BY id ASC");
							while ($row=mysql_fetch_array($res))
							{		echo "<tr>"?>

									<th width="5%"><?php echo "".$row['sno']."";?></th>
									<th width="5%"><?php echo "".$row['id']."";?></th>
									<th width="5%"><?php echo "".$row['to']."";?></th>
									<td width="5%"><?php echo "".$row['type']."";?></td>
									<td width="10%"><?php echo "".$row['message']."";?></td>
									<td width="7%" <?php echo "title='Posted at ".$row["ip"]."'"?>><?php echo "".$row['posted']."";?></td>
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
	function comment(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("comment_leaves.php?sno="+sno);
	}
		function file(sno)
	{
	window.open("file_open_leaves.php?sno="+sno," ","left=400,width=650,height=650");
	}
	
	</script>
