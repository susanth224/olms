<?php
include("security.php");
session_start();
if(array_key_exists('site',$_SESSION)&& $_SESSION['site']=="outpass" && $_SESSION['user']=="student")
{

 // some basic sanity checks
if(isset($_GET['sno'])) {
 $sno=htmlspecialchars(addslashes($_GET['sno']));
     //connect to the db

     // select our database
     include "dbconfig.php";

     // get the image from the db
     $id=htmlspecialchars(addslashes($_SESSION['id']));
     $sql = "SELECT file FROM leaves WHERE sno='$sno' && id='$id'";

     // the result of the query
     $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
	// php is also the most useful things like one of them cometome
	//please save the most useful things one of the most of the things like one of the most useful things like coming 
	//put the contingency...restricted one of the most useful things....
     // set the header for the image
     header("Content-type: application");
     echo mysql_result($result, 0);

     // close the db link
 }
 else {
     echo 'Invalid';
 }
 }
 else
 {
 echo "sorry ";
 }
?>
