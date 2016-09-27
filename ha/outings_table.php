	<?php include('dbconfig.php'); ?>
<div id="myModal" class="modal hide fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"> … </div>	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "Today's Date :".date("d/m/y"); ?></a>
	</div>
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
					<th>ID</th>
					<th>Class</th>
					<th>Reason</th>
					<th>Outing Date</th>
					<th>Leaving Date</th>
					<th>Reporting Time</th>
					<th class="empty"></th>

		</tr>
		</thead>
		<tbody>
		<?php
					$res=mysql_query("SELECT * FROM outing WHERE block='".$block."' AND permission='wait' ORDER BY sno ASC ");
							while ($row=mysql_fetch_array($res))
							{		echo "<tr>"?>
									<?php echo "<td onclick=\"display(".$row["sno"].")\" class='text-info' title='Posted at ".$row["adate"]."'><a href=\"#myModal\" data-toggle=\"modal\"><font color='#0088cc' size=3px>".$row["id"]."</a>";?>
									<td ="10%"><?php echo "".$row['year']."-".$row['class']."";?></td>
									<th width="20%"><?php echo "".$row['reason']."";?></th>
									<td ="10%"><?php echo "".$row['odate']."";?></td>
									<td ="10%"><?php echo "".$row['otime']."";?></td>
									<td ="10%"><?php echo "".$row['itime']."";?></td>
								<td class="empty" ="160">
		<a data-placement="top" title="Click to Approve" id="approve<?php echo $row['sno']; ?>" href='approve_outing.php?sno=<?php echo "".$row['sno']."";?>' class="btn btn-success"><i class="icon-ok icon-large"></i>Approve</a></a>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#approve<?php echo  $row['sno']; ?>').tooltip('show');
				$('#approve<?php echo  $row['sno']; ?>').tooltip('hide');
			});
			</script>
		<a data-placement="top" title="Click to Refuse" id="reject<?php echo $row['sno']; ?>" href='refuse_outing.php?sno=<?php echo "".$row['sno']."";?>' class="btn btn-warning"><i class="icon-remove icon-large"></i>Refuse</a></a>
			<script type="text/javascript">
			$(document).ready(function(){	
				$('#reject<?php echo $row['sno']; ?>').tooltip('show');
				$('#reject<?php echo $row['sno']; ?>').tooltip('hide');
			});
			</script>
			<br>
			<?php
			 $comment_var=$row['comment'];
			 $comment_check="no-comment";
			 if($comment_var==$comment_check)
			 { echo "<a style='color:black;text-decoration:underline;'  onclick=\"comment(".$row["sno"].")\" href=\"#myModal\" data-toggle=\"modal\" title='".$row["comment"]."'>Comment</a>";
			 }
			 else
			  { echo "<a  style='color:black;text-decoration:underline;'  onclick=\"comment(".$row["sno"].")\" href=\"#myModal\" data-toggle=\"modal\" title=' ".$row["comment"]."'>Re-Comment</a>";
			  }
			 ?>
			 &nbsp;&nbsp;&nbsp;&nbsp;
				<?php
			 $file_var=$row['file'];
			 $file_check="";
			 $file_count=$row['file_count'];
			 $file_num=2;
			 if($file_var==$file_check)
			 { echo "No file found";
			 }
			 else if($file_count==1)
			  { echo "<a style=color:black;text-decoration:underline;' onclick=\"file(".$row["sno"].")\"  title='".$row["comment"]."'>View file</a>";
			  }
			  else if($file_count>1)
			  {
			  echo  "<a style='font-size:15px;color:black;text-decoration:underline;' onclick=\"file(".$row["sno"].")\"  title='".$row["comment"]."'>View New file</a>";
			  }
			  else
			  {
			  echo "No file Found";
			  }
			 ?>
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
	
	function comment(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("comment_outing.php?sno="+sno);
	}
		function file(sno)
	{
	window.open("file_open_outing.php?sno="+sno," ","left=400,width=500,height=500");
	}
	
	</script>
