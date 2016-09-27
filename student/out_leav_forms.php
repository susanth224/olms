<?php
session_start();
if(array_key_exists('site',$_SESSION)&& $_SESSION['site']=="outpass" && $_SESSION['user']=="student")
{
include("dbconfig.php");
$id=htmlspecialchars(addslashes($_SESSION["id"]));
$query=mysql_query("select * from users where id='$id';")or die(mysql_error());
$st_det=mysql_fetch_array($query);
$cla=mysql_query("select * from data where id='$id';")or die(mysql_error());
$class=mysql_fetch_array($cla);
$out=mysql_query("select * from outing where id='$id' and permission='granted'")or die(mysql_error());
$leaves=mysql_query("select * from leaves where id='$id' and permission='granted'")or die(mysql_error());
$count=mysql_num_rows($leaves);
?>

<style type="text/css" media="all">
		
 ul.olms4
{
position:relative;
right:25%;
width:100%;
list-style-type:none;
margin:30px;
padding:0px;
color:red;
background:darkgreen;
padding:5px 5px 5px 5px;
}
ul.olms4 li
{

padding:5px;
color:red;
background:red;
padding:5px 5px 5px 5px;
}	
ul.olms4 li a.olms1:link,.olms4 li a.olms1:visited
{
color:white;
font-weight:bold;
font-size:12px;
}
ul.olms4 li.active
{
color:white;
background:red;
font-weight:bold;
font-size:12px;
}
ul.olms4 li
{
color:red;
background:green;
font-weight:bold;
font-size:12px;
}
.olms4 li a.olms1:hover
{
background:white;
color:black;
font-weight:bold;
font-size:12px;
}				
</style>

<div style="position:relative;float:left;right:5%;">
				
				<fieldset style="position:relative;left:75px;width:90px;height:72%;box-shadow:0px 0px 0px;-moz-box-shadow:0px 0px 0px;-webkit-box-shadow:0px 0px 0px;border:thin solid #bbb;border-radius:10px;">&nbsp;
<p style="text-align:center"><a href="#" class="css-tooltip-right color-blue"><img src="get.php?id=<?php echo $id;?>" style="width:87%;height:40%;border:2px solid lightgreen;padding:1px;"><span><?php echo "I, ".$st_det['name']."<br>".$st_det['branch']." Department." ;?></span></a><br/><font size='3' face='Serif' >
</p>
			<ul class="olms4" style="">
                        <li id="home_act" class="active"><a href="index.php" class="olms1">HOME</a></li>
                        <li id="out_act"><a href="#" onclick='outing()'  class="olms1">OUTING FORM</a></li>
                        <li id="leave_act"><a href="#" onclick='leave()'  class="olms1">LEAVE FORM</a></li>
                     <li id="outings_act"><a href="#" class="olms1" id="outingl" onclick="getoutingrs()">
					OUTINGS<?php
					$od=mysql_query("select * from outing where id='$id' order by odate asc;")or die(mysql_error());
					for($i=0;$i<mysql_num_rows($od);$i++)
					{
						$odata=mysql_fetch_array($od);
						if( $odata["permission"]=="granted" && $odata["ogtime"]=="--")
						{
							echo "<img src='images/info1.gif'>";break;
						}
					}
					?></a>
					</li>
                        <li id="leaves_act"><a href="#" class="olms1" id="leavel" onclick="getleaverls()">
					LEAVES<?php
					$od=mysql_query("select * from leaves where id='$id' order by odate asc;")or die(mysql_error());
					for($i=0;$i<mysql_num_rows($od);$i++)
					{
						$odata=mysql_fetch_array($od);
						if( $odata["permission"]=="granted" && $odata["ogtime"]=="--")
						{
							echo "<img src='images/info1.gif'>";break;
						}
					}
					?></a></li>
			<li ><a href="profile.php?id=<?php echo $id;?>" rel='facebox' class="olms1">EDIT PROFILE</a></li>
			<li ><a href="image_display.php?id=<?php echo $id;?>" rel='facebox' class="olms1">CHANGE PICTURE</a></li>
			
			<li ><a href="changepass.php?id=<?php echo $id;?>" rel='facebox' class="olms1">CHANGE PASSWORD</a></li>
			</ul>
				
				</fieldset>
				
				</div>

<div id="message_box" style="visibility:hidden;" class="message errormsg" ><img src="images/loading.gif" width=20 height=20>Checking Please wait....</div>
					<div id="outform" class="block_content1 divs" style="">
					
						<center><fieldset style="width:70%;height:65%;"><legend style="font-size:20px;">Outing form</legend>
							<label style="float:right;">Your Total Outings :<?php echo mysql_num_rows($out);?></label><br>
							<label ><big>Reason:</big></label><br >
							<textarea id="reasn" style="border:2px solid green;text-align:center;font-weight:bold;font-size:17px;" name="reason" rows='3' cols='40'  placeholder="Type Reason here.." required></textarea></p>
							<table style="background:#eee;width:60%;border:0.6px solid green;"><tr><td>
							Outing date</td><td>:</td><td>
						<input id="out_date" name="date" value="<?php echo date("j m Y",(mktime(date("j"),date("m"),date("Y"))));?>" type='text' class="text date_picker" onchange="load()" onclick="load()" ></td></tr>
							<tr><td>Outing Time</td><td>:</td><td>
							<select id="out" name="ot"><?php $min=7;$max=11;for($i=$min;$i<=$max;$i++){echo "<option>";echo $i.":00 AM";echo "</option>";};echo "<option>12:00 PM</option>";$min=1;$max=7;for($i=$min;$i<=$max;$i++){echo "<option>";echo $i.":00 PM";echo "</option>";}?></select></td></tr>
							<tr><td>Return Time</td><td>:</td><td>
							<select id="return" name="retn"><?php $min=10;$max=11;for($i=$min;$i<=$max;$i++){echo "<option>";echo $i.":00 AM";echo "</option>";};echo "<option>12:00 PM</option>";$min=1;$max=7;for($i=$min;$i<=$max;$i++){echo "<option>";echo $i.":00 PM";echo "</option>";}?></select></td></tr>
							</table>
							<input type="submit" id="out_submit" class="submit" value="submit" onclick="this.disabled=true; this.value='Sending…';send_outing()"></center>
					</fieldset></center></div>
					<div id="leavef" class="block_content1 divs" style="display:none;">
						<div id="leave" >
						<center>
							<fieldset style="width:70%;height:63%;">
							<legend style="font-size:20px;">leave form</legend><label style="float:right">Your Total Leaves :<?php echo mysql_num_rows($leaves);?></label><br>
							<label><big>Reason:<big></label><br/>
							<p><textarea id="reason_lv"  style="border:2px solid green;text-align:center;font-weight:bold;font-size:17px;"  name="reason1" cols="40"  placeholder="Type Reason here.." required></textarea>
							<table style="background:#eee;width:60%;border:0.6px solid green;"><tr><td>Outgoing date:</td><td>:</td><td>
							<input id="odate_lv" name="otime1" value="<?php echo date("j m Y",(mktime(date("j"),date("m"),date("Y"))));?>" type='text' class="text date_picker" onchange="load()" onclick="load()" ></td></tr>
		                                        
							<tr><td>Span:</td><td>:</td><td>
		                         <input placeholder="enter no. of days" class="styled" id="nf_days_lv" onchange="return_date()" required="required" type="text"></td></tr>
		                     <tr>
							<td style="text-align:center;" colspan="3" id="return-date"></td></tr>
							</table>
							<input type="submit" id="leave_submit" class="submit" value="submit" onclick="this.disabled=true; this.value='Sending…';send_leave()" /></center>
			</fieldset></div>
					</div>
</div><br></center>

	<!--pic date -->

   <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/jquery.filestyle.mini.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/jquery.date_input.pack.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/jquery.select_skin.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<?php
}//end if
else
	header("location:index.php");
?>
