<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION["site"]=="outpass" && $_SESSION["user"]=="student")
{
$id=htmlspecialchars(addslashes($_GET['id']));
include("dbconfig.php");
include("security.php");
$res=mysql_query("select * from users where id='$id'");
while($row=mysql_fetch_array($res)){
$sid=$row['id'];
$sfname=$row['name'];
$sclass=$row['class'];
$syear=$row['year'];
$sbranch=$row['branch'];
$mobile=$row['mob'];
$parent=$row['pmob'];
$dorm=$row['dorm'];
$door=$row['door'];
$mandal=$row['mdl'];
$dist=$row['dist'];
$pin=$row['pin'];
$vill=$row['vil'];
$blo=$row['block'];
}
?>
<style type="text/css" media="all">
		@import url("css/default.css");
		
</style>
				<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="register">
				<h3>EDIT YOUR PROFILE</h3>
            <fieldset class="row2">
                <legend>Your Details
                </legend>
                  <p><label>Full name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label><input type="text" readonly="" name="name" size="62.4%" value="<?php echo $sfname;?>"></p>
                <table width="100%"><tr><td>
                
                 <label>ID Number</label></td><td>:</td><td><input type="text" readonly="" name="id" value="<?php echo $sid;?>"></td><td>
		<label>Branch </label></td><td>:</td><td><input readonly="" type="text" name="branch" value="<?php echo $sbranch?>"></td></tr>
                
                <tr><td>
                   <label>Year </label></td><td>:</td><td><input readonly="" type="text" name="year" value="<?php echo $syear?>"></td>
                   <td> <label>Class:</label></td><td>:</td><td><input type="text" name="clss" required="required" placeholder="Example:- SS-09" value="<?php echo $sclass;?>" autofocus></td></tr>
                </table>
                
            </fieldset>
            <fieldset class="row1" width="100%">
                <legend>Personal Details</legend>
                <table width="100%"><tr><td>
                    <label>Mobile Number *</label></td><td>:</td><td>
                    <input type="text" name="mob" maxlength="10" required="required" value="<?php echo $mobile;?>" placeholder="Mobile Number"/>
                </td></tr>
                <tr><td>
                    <label>Parent Mobile Number *
                    </label></td><td>:</td><td>
                    <input type="text" name="parent" maxlength="10" value="<?php echo $parent;?>" size="20px" required="required" placeholder="Parent's number" />
                </td></tr>
                <tr><td>
                    <label>Block *
                    </label></td><td>:</td><td>
                   <select name="block">
                   <option><?php echo $blo;?></option>
                   <option>I1</option>
                    <option>I2</option>
                    <option>K2</option>
                    <option>K3</option>
                    <option>K4</option>
                    <option>PUC</option>
                </td></tr>
                <tr><td>
                    <label>Dorm *
                    </label></td><td>:</td><td>
                    <input type="text" name="dorm"  required="required" value="<?php echo $dorm;?>" placeholder="Ex: BT-03" />
                </td></tr>
               </table>
            </fieldset>
            <fieldset class="row1" width="100%">
                <legend>Home Address
                </legend>
                <table width="100%">
                <tr><td>
                    <label>Door Number *</label></td><td>:</td><td>
                    <input type="text" name="door"required="required" value="<?php echo $door;?>" placeholder="Door No"/>
                </td></tr>
                 <tr><td>
                    <label>Village *
                    </label></td><td>:</td><td><input type="text" name="village" value="<?php echo $vill;?>" required="required" placeholder="Village."/>
                    </td></tr>
                 <tr><td>
                    <label>Mandal *
                    </label></td><td>:</td><td><input type="text" value="<?php echo $mandal;?>" name="mandal" required="required" placeholder="Mandal"/>
                    </td></tr>
                 <tr><td>
                    <label>District *
                    </label></td><td>:</td><td><input type="text" value="<?php echo $dist;?>" name="dist" required="required" placeholder="District"/>
                </td></tr>
                 <tr><td>
                    <label>Pincode *
                    </label></td><td>:</td><td><input type="text" value="<?php echo $pin;?>" name="pin" required="required" placeholder="PinCode"/>
                </td></tr></table>
            </fieldset>
				<p class="fileupload">
				<input type="text" name="data" value="<?php echo $data;?>" style="display:none;">
				<div  style="display:none;"><input name="userfile" type="file"/></div>
				<div style="position:relative;background: #FDFEFA url(images/bg_infobox.gif) repeat-x top left;height:2%;"><div style="float:right;"><button type="submit" class="button">UPDATE &raquo;</button></div>
				</div></p>
				</form>					
<?php

if(isset($_FILES['userfile']))
{
	$idata=explode(",",$urid);
	$sid=htmlspecialchars(addslashes($_POST['id']));
	$sfname=htmlspecialchars(addslashes($_POST['name']));
	$sclass=htmlspecialchars(addslashes($_POST['clss']));
	$syear=htmlspecialchars(addslashes($_POST['year']));
	$sbranch=htmlspecialchars(addslashes($_POST['branch']));
	$mobile=htmlspecialchars(addslashes($_POST['mob']));
	$parent=htmlspecialchars(addslashes($_POST['parent']));
	$dorm=htmlspecialchars(addslashes($_POST['dorm']));
	$door=htmlspecialchars(addslashes($_POST['door']));
	$vil=htmlspecialchars(addslashes($_POST['village']));
	$mandal=htmlspecialchars(addslashes($_POST['mandal']));
	$dist=htmlspecialchars(addslashes($_POST['dist']));
	$pin=htmlspecialchars(addslashes($_POST['pin']));
	$block=htmlspecialchars(addslashes($_POST['block']));
    include("dbconfig.php");
                    // insert the image?>
  <?php
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db, $con);
                    mysql_query("UPDATE users SET class='$sclass',year='$syear',branch='$sbranch',mob='$mobile',pmob='$parent',dorm='$dorm',door='$door',vil='$vil',mdl='$mandal',dist='$dist',pin='$pin',block='$block' WHERE id='$sid'") or die("Error in Query: " . mysql_error());
?>
                    <script type="text/javascript">
                    window.location.href="index.php";
                    </script>
                    <?php
}
}
//comment is the most userfriendly consumer of the show in the morning...
//comeout please save the most useful things like one of the most useful things like one of the most usefu
else
{
header('location:index.php');
//communication-warfare enterprise();
//the most useful things like comments...
//please save the content...
//complements that your the big problem...
//computer systems and the most useful things like one of the most {computer science and engineering}
//please save the content (System.config.utils.*;);
//ifconfig most-useful things like one{%d,%s,%sudo nautillus if(config...);}
}
//if conf091_SHA2_effect = raw_value:
	// return main value;
?>
