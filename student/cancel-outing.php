<?php

session_start();
	
if($_SESSION['site']=="outpass" && $_SESSION['user']=="student")
{
if(isset($_GET['sno']))
{

include("dbconfig.php");
$id=htmlspecialchars(addslashes($_SESSION["id"]));
$sno=htmlspecialchars(addslashes($_GET['sno']));

$result=mysql_query("DELETE FROM outing WHERE sno='$sno' AND id='$id'");

echo "<script>alert('Outing Cancelled');window.location='index.php';</script>";


}
else
{
echo "<script>alert('Invalid');window.location='index.php';</script>";
}
}
else
{
	echo "You are not authorised to do this action";
}
?>
