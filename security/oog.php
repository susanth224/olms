
<?php include('header.php'); ?>
<?php include('dbconfig.php'); ?>
<?php
if(isset($_GET['sno']))
{
$cdate = date("j m Y",(mktime(date("j"),date("m"),date("Y"))));
$ctime = date("h:iA",(mktime(date("H")+4,date("i")+30,date("s")+1,0,0,0)));
include("dbconfig.php");
$sno=addslashes(htmlspecialchars($_GET['sno']));
$result=mysql_query("UPDATE `outing` SET permission='granted',ogtime='$ctime',ogdate='$cdate' WHERE sno='$sno'");


if($result){header('Location: outing_outgoing.php?status=approve');}
}
?>		
