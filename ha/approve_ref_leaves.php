<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('dbconfig.php'); ?>
<?php
if(isset($_GET['sno']))
{
if (isset($_SESSION['ha']))
	{
	$by=$_SESSION['ha'];
	}
$cdate = date("j m Y");
$ctime = date("h:iA");
include("dbconfig.php");
$sno=addslashes(htmlspecialchars($_GET['sno']));
$result=mysql_query("UPDATE `leaves` SET permission='granted',viewed_by='$by' WHERE sno='$sno'");

if($result){header('Location: refused_leaves.php?status=approve');}
}
?>		
						
    	

