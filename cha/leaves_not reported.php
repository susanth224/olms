<?php
if(isset($_SESSION['cha']))
{
?>
	<table cellpadding="0" cellspacing="0" border="0" class="table" >
		<div class="pull-right">

		
		

					
		
	
		<tbody>
		
					
		<?php
		$i=0;
										$res=mysql_query("SELECT DISTINCT branch FROM users");
										while($row=mysql_fetch_array($res))
										{
											$branch=$row['branch'];
											$ress=mysql_query("SELECT count(*) FROM leaves WHERE  `branch`='$branch' AND ogtime!='--' AND ictime='--' AND permission='granted'");
											while($row=mysql_fetch_array($ress)){$yea=$row[0];}
											$script="<tr><td>$branch</td><td>$yea</td></tr>\n";
											echo $script;											
											$i++;
										}
		
	
	 } ?>    
	
		</tbody>
	</table>
	</form>

