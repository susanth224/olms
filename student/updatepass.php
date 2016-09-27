<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION["site"]=="outpass" && $_SESSION["user"]=="student")
{
include('dbconfig.php'); ?>
<?php
if (isset($_POST['submit'])){
$oldpass=md5(htmlspecialchars(addslashes($_POST['oldpass'])));
$newpass=htmlspecialchars(addslashes($_POST['newpass']));
$confirmpass=htmlspecialchars(addslashes($_POST['confirmpass']));
$pass=md5($newpass);
if(isset($_GET['id']))
{

$id=htmlspecialchars(addslashes($_GET['id']));
$dat=mysql_query("SELECT 	* FROM `users` WHERE `id`='$id'");
$dat1=mysql_fetch_array($dat);
$olpass=$dat1['password'];
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
mysql_query("UPDATE `users` SET password='$pass' WHERE id='$id'");

echo "<script>alert('Password Successfully Changed');window.location='logout.php';</script>";
}
}

}
}
else
{
header('location:index.php');
}
?>

