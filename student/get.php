<?php
session_start();
if($_SESSION["site"]=="outpass"&& $_SESSION["id"]!="" && $_SESSION["user"]=="student")
{
 // just so we know it is broken
 $id=htmlspecialchars(addslashes($_GET["id"]));
 $idd=htmlspecialchars(addslashes($_SESSION["id"]));
 // some basic sanity checks
 if($id==$idd)
 {
 if(isset($_GET['id'])) {
     //connect to the db

     // select our database
     include "dbconfig.php";

     // get the image from the db
     $sql = "SELECT photo FROM users WHERE id='$id';";

     // the result of the query
     $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());

     // set the header for the image
     header("Content-type: image/jpeg");
     echo mysql_result($result, 0);

     // close the db link
	}
	}
 else {
     echo 'Please use a real id number';
 }
}
?>
