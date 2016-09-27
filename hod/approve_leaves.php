<?php include('header.php'); ?>
<?php include('dbconfig.php'); ?>
<?php
if(isset($_GET['sno']))
{
		$cdate = date("j m Y");
$ctime = date("h:iA");
include("dbconfig.php");
$sno=addslashes(htmlspecialchars($_GET['sno']));
$result=mysql_query("UPDATE `leaves` SET permission='granted' WHERE sno='$sno'");

if($result){header('Location: pending_leaves.php?status=approve');}
}
?>		
						
    	

