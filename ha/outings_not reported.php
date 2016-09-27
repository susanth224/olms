<?php
if(isset($_SESSION['ha']) && isset($_SESSION['block']))
{
	
	$block=$_SESSION["block"];?>
	<table cellpadding="0" cellspacing="0" border="0" class="table" >
		<div class="pull-right">

		
		

					
		
	
		<tbody>
		
		
													<?php
													$i=0;
										$res=mysql_query("SELECT DISTINCT year FROM users WHERE `block`='$block'");
										while($row=mysql_fetch_array($res))
										{
											$year=$row['year'];
											$ress=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND `year`='$year' AND ogtime!='--' AND ictime='--' AND permission='granted'");
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
