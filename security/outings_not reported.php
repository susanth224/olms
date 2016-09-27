<?php
if(isset($_SESSION['sec']))
{
?>
	<table cellpadding="0" cellspacing="0" border="0" class="table" >
		<div class="pull-right">

		
		

					
		
	
		<tbody>
		
		
													<?php
													$i=0;
										$res=mysql_query("SELECT DISTINCT year FROM users ");
										while($row=mysql_fetch_array($res))
										{
											$year=$row['year'];
											$ress=mysql_query("SELECT count(*) FROM outing WHERE  `year`='$year' AND ogtime!='--' AND ictime='--' AND permission='granted'");
											while($row=mysql_fetch_array($ress)){$yea=$row[0];}
											$script="<tr><td>$year</td><td>$yea</td></tr>\n";
											echo $script;											
											$i++;
										}
										?>
	
		</tbody>
	</table>
	</form>
	<?php
} ?>
