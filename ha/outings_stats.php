<?php
if(isset($_SESSION['ha']) && isset($_SESSION['block']))
{
	
	$block=$_SESSION["block"];?>
	<table cellpadding="0" cellspacing="0" border="0" class="table" >
		<div class="pull-right">

		
		

					
		
	
		<tbody>
		
					<th style="text-align:center;opacity:0.8;">Total Today</th>
					<th style="text-align:center;opacity:0.8;">New</th>
					<th style="text-align:center;opacity:0.8;">Approved</th>
					<th style="text-align:center;opacity:0.8;">Refused</th>
		<?php
		$todaydate=date("j m Y",(mktime(date("j"),date("m"),date("Y"))));
											$res=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND `adate`='$todaydate'");
											while($row=mysql_fetch_array($res)){$tdtl=$row[0];}
											$res=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND `adate`='$todaydate' AND permission='wait' ");
											while($row=mysql_fetch_array($res)){$tdrqst=$row[0];}
											$res=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND `adate`='$todaydate' AND permission='granted'");
											while($row=mysql_fetch_array($res)){$tdsncn=$row[0];}
											$res=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND `adate`='$todaydate' AND permission='refuse'");
											while($row=mysql_fetch_array($res)){$tdunsncn=$row[0];}
											$res1=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND ogtime!='--' AND ictime='--' AND permission='granted'");
											while($row=mysql_fetch_array($res1)){$lvout=$row[0];}
											?>
		
		<tr>
		<td  style="text-align:center;"><?php echo $tdtl; ?></td> 
		<td  style="text-align:center;"><?php echo $tdrqst; ?></td> 
		<td  style="text-align:center;"><?php echo $tdsncn; ?></td> 
		<td  style="text-align:center;"><?php echo $tdunsncn; ?></td> 
		
	
		</tr>
	<?php } ?>    
	
		</tbody>
	</table>
	</form>

