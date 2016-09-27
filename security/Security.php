<?php
include("dbconfig.php");
$type="None";
$user="None";
if (isset($_SESSION['user']))
	{
	$type="student";
	$user=addslashes(htmlspecialchars($_SESSION['id']));
	//echo "\tUser Type: \t\t".$type."\n\tAdmin Name: \t\t".$user."\n";
	}
if (isset($_SESSION['ha']))
	{
	$type="HOSTOL admin";
	$user=addslashes(htmlspecialchars($_SESSION['ha']));
	//echo "\tUser Type: \t\t".$type."\n\tStudent ID: \t\t".$user."\n";
	}
if (isset($_SESSION['cha']))
	{
	$type=" CHIEF HOSTOL admin";
	$user=addslashes(htmlspecialchars($_SESSION['cha']));
	//echo "\tUser Type: \t\t".$type."\n\tStudent ID: \t\t".$user."\n";
	}
if (isset($_SESSION['office']))
	{
	$type="office";
	$user=addslashes(htmlspecialchars($_SESSION['office']));
	//echo "\tUser Type: \t\t".$type."\n\tStudent ID: \t\t".$user."\n";
	}
if (isset($_SESSION['hod']))
	{
	$type="hod";
	$user=addslashes(htmlspecialchars($_SESSION['hod']));
	//echo "\tUser Type: \t\t".$type."\n\tStudent ID: \t\t".$user."\n";
	}
if (isset($_SESSION['sec']))
	{
	$type="security";
	$user=addslashes(htmlspecialchars($_SESSION['sec']));
	//echo "\tUser Type: \t\t".$type."\n\tStudent ID: \t\t".$user."\n";
	}
if (isset($_SESSION['director']))
	{
	$type="Director";
	$user=addslashes(htmlspecialchars($_SESSION['director']));
	//echo "\tUser Type: \t\t".$type."\n\tStudent ID: \t\t".$user."\n";
	}
$location="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//echo "\tLocation: \t\t".$location;
//echo "\n";
$ip=$_SERVER['REMOTE_ADDR'];
//echo "\tIP: \t\t\t".$ip;
//echo "\n";
$time= date("d.m.Y")." - ".date("h:i:s A",mktime(date("h")+3,date("i"),date("s")));
//echo "\tTime: \t\t\t".$time;
//echo 
mysql_select_db('olms') or die("Error is ::".mysql_error());
$result=mysql_query("INSERT INTO history (Type,User,IP,Time,Location)
			 VALUES ('$type','$user','$ip','$time','$location')");
if (!$result)
	{
	echo mysql_error();
	}
?>
