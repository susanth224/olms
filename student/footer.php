 <style>
 .olms-bottom{
	line-height: 29px;
		position:absolute;left:0%;right:0%;width:100%;
	font-size: 11px;
	background: darkgreen;
	
	z-index: 9999;
	position: fixed;
        bottom:0px;
        color:white;
        width:100%;
	  margin:0% 0.6% 0% 0%;
	box-shadow:0px 0px 10px;
        
}

.olms-bottom a{
	padding: 0px 15px;
	letter-spacing: 1px;
	color: white;
	display: inline-block;
}
.olms-bottom a:hover{
	background: rgba(255,255,255,0.3);
}
.olms-bottom span.right{
	float: right;
}
.olms-bottom span.right a{
	float: left;
	display: block;
}
 </style>
  <script>
  function copy(){
	$("#webteam").slideToggle();
}
function contact(){
	$("#contact").slideToggle();
}
function problem(){
	$("#problem").slideToggle();
}

  </script>
  
  	<?php
if(isset($_SESSION["id"]))
{
	?><center><div class="fadeIn" style="position:absolute;top:10%;left:30%;font-weight:bold;color:red;"><?php $mess_status="";
  
include("dbconfig.php");
mysql_select_db("olms") or die(mysql_error());
$id=htmlspecialchars(addslashes($_SESSION["id"]));
  if(isset($_POST['submit']))
  {
	  $idnum=htmlspecialchars(addslashes($_SESSION["id"]));
	  $dt_fet=mysql_query("SELECT * FROM users WHERE id='$id'");
	  $d_fet=mysql_fetch_array($dt_fet);
	  $block=$d_fet['block'];
	  $message=htmlspecialchars(addslashes($_POST['message']));
	  $type=htmlspecialchars(addslashes($_POST['type']));
	  $to=htmlspecialchars(addslashes($_POST['to']));
	  $ip_addr=$_SERVER['REMOTE_ADDR'];
	  $res=mysql_query("INSERT INTO message(`id`,`block`,`message`,`type`,`to`,`ip`,`posted`) VALUES ('$idnum','$block','$message','$type','$to','$ip_addr',NOW())");
	  if($res){
	 echo "your"." ".$type." "."to"." ".$to." "."has been successfully sent";
  }
 } 
 ?></div></center>
 <?php }
 else
 { 
	   
include("dbconfig.php");
mysql_select_db("olms") or die(mysql_error());
  if(isset($_POST['submit']))
  {
	  $idnum=htmlspecialchars(addslashes($_POST['id']));
	  if(strlen($idnum)<7)
	  {
		  echo "<script>alert('Please Enter Valid ID Number');</script>";
	  }
	  else
	  {
	  $message=htmlspecialchars(addslashes($_POST['message']));
	  $type=htmlspecialchars(addslashes($_POST['type']));
	  $to=htmlspecialchars(addslashes($_POST['to']));
	  $ip_addr=$_SERVER['REMOTE_ADDR'];
	  $res=mysql_query("INSERT INTO message(`id`,`message`,`type`,`to`,`ip`,`posted`) VALUES ('$idnum','$message','$type','$to','$ip_addr',NOW())");
	  if($res){
	 echo "<center><div class='stretchLeft' style='position:absolute;top:23%;left:37%;font-weight:bold;color:green;'>your"." ".$type." "."to"." ".$to." "."has been successfully sent</div></center>";
  }
}
 }
	 } ?>
  <div class="olms-bottom">
<a  href="#" title="copyright @ "><strong><b>Copyrights &copy; OLMS - RGUKT Nuzvid.</b></strong></a>
<span class="center" style="text-transform:capitalize;padding-left:25%;">
	<?php
if(isset($_SESSION["id"]))
{
	?>
<a  class="css-tooltip-top color-green" onclick='contact();'><strong>Contact Us</strong></a>
<?php
}
else
{?>
<a  class="css-tooltip-top color-green" onclick='problem();'><strong>Contact Us</strong></a>

<?PHP	}?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  class="css-tooltip-top color-blue" onclick='copy();'><span><u>OLMS - WebTeam</u><br><br>N091130 - P Susanth<br>N110888 - M Raja Sekhar<br>N110085 - M Tarakesh <br> N130950 - P Prathap</span><strong>WebTeam</strong></a></span>
 <div>
	 </div>
<div id="webteam"  style="position:fixed;bottom:8%;right:0%;width:30%;height:20%;display:none;background:green;color:white;border-radius:13px;-moz-border-radius:13px;-webkit-border-radius:13px;box-shadow:3px 4px 5px green;-moz-box-shadow:3px 4px 5px green;-webkit-box-shadow:3px 4px 5px green;" onclick="copy();">
	   <center><table style="font-weight:normal;color:white;"> <tr style="text-align:center;"><td><u><h5>OLMS-WebTeam :</h5></u></td></tr><tr><td>N091130</td> <td>P  SUSANTH-E3-CSE3</td></tr><tr><td>N110888</td><td>MALIREDDY RAJA-E2-CSE-1</td></tr><tr><td>N110085</td><td>M  TARAKESH-E2-CSE3</td></tr><tr><td>N130950</td> <td>P  PRATHAP-P2-MUE4</td></tr></table></center>
	</div>
	<?php
if(isset($_SESSION["id"]))
{?>
	<div id="contact"  style="position:fixed;bottom:8%;right:37%;width:22%;height:25%;padding-bottom:10px;display:none;background:green;color:white;border-radius:13px;-moz-border-radius:13px;-webkit-border-radius:13px;box-shadow:3px 4px 5px green;-moz-box-shadow:3px 4px 5px green;-webkit-box-shadow:3px 4px 5px green;">
	   <center><table style="font-weight:normal;color:white;"> <tr style="text-align:center;"><td></td></tr><tr><td>Message</td> <td><form method="post"><textarea name="message" placeholder="Enter Your Message here" rows="4" cols="20" required></textarea></td></tr><tr><td>Type</td><td><select name="type" required><option></option><option>Problem</option><option>Feedback</option><option>Suggestion</option></select></td></tr>
	   <tr><td>To</td><td><select name="to" required><option></option><option>Administrator</option><option>Web Team</option></select></td></tr>
	   <tr><td></td><td><input type="submit" name="submit" value="submit"></form></td></tr></table></center>
	</div>
	<?php
}
if(empty($_SESSION['id']))
{?>
		<div id="problem" class="register" style="position:fixed;bottom:5%;right:37%;width:22%;height:40%;padding-bottom:10px;display:none;background:green;color:white;border-radius:13px;-moz-border-radius:13px;-webkit-border-radius:13px;box-shadow:3px 4px 5px green;-moz-box-shadow:3px 4px 5px green;-webkit-box-shadow:3px 4px 5px green;">
	   <center><form method="post"><table style="font-weight:normal;color:white;"> <tr style="text-align:center;"><td></td></tr><tr><td>ID</td><td><input type="text" name="id" placeholder="University ID" style="text-transform:uppercase;width:91%;" maxlength="7" required></td><tr><td>Message</td> <td><textarea name="message" placeholder="Enter Your Message here" rows="4" cols="22" required></textarea></td></tr><tr><td>Type</td><td><select name="type" required><option></option><option>Problem</option><option>Feedback</option><option>Suggestion</option></select></td></tr>
	   <tr><td>To</td><td><select name="to" required><option></option><option>Administrator</option><option>Web Team</option></select></td></tr>
	   <tr><td></td><td><input type="submit" name="submit" value="submit"></td></tr></table></form></center>
	</div>
<?php
}
?>
