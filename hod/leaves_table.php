	<?php include('dbconfig.php'); ?>
	<div class="modal hide fade" id="myModal" aria-hidden="true"></div>
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "Today's Date :".date("d/m/y"); ?></a>
	</div>

		<thead>
		<tr>
						<th>ID</th>
									<th>Class</th>
									<th width="20%">Reason</th>
									<th>Applying Date</th>
									<th>Outgoing Date</th>
									<th>Returning Date</th>

		</tr>
		</thead>
		<tbody>
		<?php
					$res=mysql_query("SELECT * FROM leaves WHERE ogtime!='--' AND permission='granted' AND ictime='--' ORDER BY sno ASC ");
							while ($row=mysql_fetch_array($res))
							{		echo "<tr>"?>
									<?php echo "<td onclick=\"display(".$row["sno"].")\" class='text-info' title='Posted at ".$row["adate"]."'><a href=\"#myModal\" data-toggle=\"modal\"><font color='#0088cc' size=3px>".$row["id"]."</a>";?>
									<td width="10%"><?php echo "".$row['year']."-".$row['class']."";?></th>
									<th width="25%"><?php echo "".$row['reason']."";?></th>
									<td width="10%"><?php echo "".$row['adate']."";?></td>
									<td width="10%"><?php echo "".$row['ogdate']."";?></td>
									<td width="10%"><?php echo "".$row['idate']."";?></td>
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
