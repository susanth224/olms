<?php
include('dbconfig.php'); ?>
<?php
if (isset($_POST['submit'])){
$oldpass=htmlspecialchars(addslashes($_POST['oldpass']));
$newpass=htmlspecialchars(addslashes($_POST['newpass']));
$confirmpass=htmlspecialchars(addslashes($_POST['confirmpass']));
if(isset($_GET['sno']))
{
$sno=htmlspecialchars(addslashes($_GET['sno']));
$dat=mysql_query("SELECT password FROM `cha` WHERE `sno`='$sno'");
$dat1=mysql_fetch_array($dat);
$olpass=$dat1[0];
if($newpass!=$confirmpass)
{
echo "<script>alert('New password & Confirm password do not match');window.location='index.php';</script>";
}
else if($oldpass!=$olpass)
{
echo "<script>alert('Old Password and Current password do not match');window.location='index.php';</script>";
}
else
{
mysql_query("UPDATE `cha` SET password='$newpass' WHERE sno='$sno'");

header('Location: home.php?status=changed');
}
}

}

?>

