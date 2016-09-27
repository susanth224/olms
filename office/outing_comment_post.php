<?php include('dbconfig.php'); ?>
<?php
if (isset($_POST['submit'])){
$comm=$_POST['comment12'];
$sno=$_GET['sno'];

$result=mysql_query("UPDATE `outing` SET comment='$comm' WHERE sno='$sno'");
if($result){header('Location:pending_outings.php?status=commented');}
}

?>
