<?php include('dbconfig.php'); ?>
<?php
if (isset($_POST['submit'])){
$comm=$_POST['comment'];
$sno=$_GET['sno'];

$result=mysql_query("UPDATE `leaves` SET comment='$comm' WHERE sno='$sno'");
if($result){header('Location:pending_leaves.php?status=commented');}
}

?>
