<?php include('dbconfig.php'); ?>
<style>
.send_btn {
    background: none repeat scroll 0 0 #0D92E1;
    border: medium none;
    color: #FFFFFF;
    cursor: pointer;
    font: bold 15px/43px Arial,Helvetica,sans-serif;
    width: 100px !important;
}
</style>
<?php
if(isset($_GET['sno']))
{
$sno=htmlspecialchars(addslashes($_GET['sno']));
$data=mysql_query("SELECT * FROM outing WHERE sno='$sno';");
$fr=mysql_fetch_array($data);
?>
					<div >
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Change Password</h3>
					</div>
	
<center>
<form method="POST"  enctype="multipart/form-data" action="updatepass.php?sno=<?php echo $sno; ?>"><br>
Old Password : <input type="password" name="oldpass" required><br>
New Password : <input type="password" name="newpass" required><br>
Confirm Password : <input type="password" name="confirmpass" required><br>
<input type="submit" name="submit"  class="send_btn" value="Update">
</center>

					<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
					</div>
<?php
}
?>		
						
    	

