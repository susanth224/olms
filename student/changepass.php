<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION["site"]=="outpass" && $_SESSION["user"]=="student")
{
 include('dbconfig.php'); ?>

<?php
if(isset($_GET['id']))
{
$id=htmlspecialchars(addslashes($_GET['id']));
if($_SESSION["id"]==$id)
{
?>
	
<center>
<form method="POST"  enctype="multipart/form-data" action="updatepass.php?id=<?php echo $id; ?>"><br>
	<h3>CHANGE PASSWORD</h3>
            <fieldset class="row2">
           
                <table width="100%"><tr><td>
              
               <tr>  <td><label>Old password</label></td><td>:</td><td><input type="password"  name="oldpass"  required></td></tr>
               <tr><td>  <label>New password</label></td><td>:</td><td><input type="password"  name="newpass" required ></td></tr>
		    <tr>   <td><label>Comfirm Password </label></td><td>:</td><td><input  type="password" name="confirmpass" required ></td></tr>
                
          <tr  ><td></td><td></td><td>  <input type="submit" name="submit" value="Change"></td></tr>
                </table>
                
            </fieldset>
            </form>

</center>
<?php
}
}
}
else
{
header('location:index.php');
}
?>

