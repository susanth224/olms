<?php
include("security.php");
if(isset($_GET['sno']))
{
$sno=htmlspecialchars(addslashes($_GET['sno']));
if($_FILES['File']['size'] >0 && isset($_POST['submit'])) {
    $filename = $_FILES['File']['name'];
    $tmpname  = $_FILES['File']['tmp_name'];
    $filesize = $_FILES['File']['size'];
    $filetype = $_FILES['File']['type'];
    $fp = fopen($tmpname, 'r');
    $file = fread($fp, filesize($tmpname));
    $file = addslashes($file);
    fclose($fp);
include('dbconfig.php');
$cou=mysql_query("SELECT * FROM leaves WHERE sno='$sno'");
$countch=mysql_fetch_array($cou);
$newcou=$countch['file_count']+1;
    if(!get_magic_quotes_gpc()) {
        $filename = addslashes($filename);
    }
    if($query = "update leaves set file='$file',file_count='$newcou' where sno='$sno';"){
    echo "<script>alert('Proof Successfully Submitted');window.location='index.php';</script>";
   
    }

    mysql_query($query) or die('Error, query failed');
}
}

else
{
echo "<script>alert('Invalid');window.location='index.php';</script>";
}
?>
 
 
