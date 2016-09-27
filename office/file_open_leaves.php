<?php
session_start();
if(array_key_exists('site',$_SESSION)&& $_SESSION['site']=="outpass" && $_SESSION['user']=="student")
{
 // some basic sanity checks
 if(isset($_GET['sno'])) {
 $sno=$_GET['sno'];
     //connect to the db

     // select our database
     include "dbconfig.php";

     // get the image from the db
     $sql = "SELECT file FROM leaves WHERE sno='$sno'";

     // the result of the query
     $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());

     // set the header for the image
     header("Content-type: application");
     echo mysql_result($result, 0);

     // close the db link
 }
 else {
     echo 'Unsupported file';
 }
 }
 else
 {
 echo " ";
 }
?>
