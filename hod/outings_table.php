	<?php include('dbconfig.php'); ?>
<div id="myModal" class="modal hide fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"> … </div>	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "Today's Date :".date("d/m/y"); ?></a>
	</div>
	
		<thead>
		<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Year</th>
					<th>Branch</th>
					
		</tr>
		</thead>
		<tbody>
		<?php
					$res=mysql_query("SELECT * FROM outing WHERE ogtime!='--' AND permission='granted' AND ictime='--' ORDER BY sno ASC ");
							while ($row=mysql_fetch_array($res))
							{		echo "<tr>"?>
									<?php echo "<td onclick=\"display(".$row["sno"].")\" class='text-info' title='Posted at ".$row["adate"]."'><a href=\"#myModal\" data-toggle=\"modal\"><font color='#0088cc' size=3px>".$row["id"]."</a>";?>
									<td ="10%"><?php echo "".$row['name']."";?></td>
									<th width="20%"><?php echo "".$row['year']."";?></th>
									<td ="10%"><?php echo "".$row['branch']."";?></td>
									
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
