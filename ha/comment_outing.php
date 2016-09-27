<?php include('header.php'); ?>
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
$sno=$_GET['sno'];
$data=mysql_query("SELECT * FROM outing WHERE sno='$sno';");
$fr=mysql_fetch_array($data);
?>
					<div >
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Send Message to <?php echo $fr['id'];?></h3>
					</div>
	
<center>
<form method="POST"  enctype="multipart/form-data" action="outing_comment_post.php?sno=<?php echo $sno; ?>"><br>
<textarea name="comment" cols="20" rows="3"></textarea><br>
<input type="submit" name="submit"  class="send_btn" value="send">
</center>

					<div class="modal-footer">
					<div style="float:left;">Last Message : <font style="color:black;font-weight:bold;"><?php
					$nev="No Message";
					if($fr['comment']=="no-comment")
					{
					echo $nev;
					}
					else
					{
					 echo $fr['comment'];
					 } ?></font></div>
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
					</div>
<?php
}
?>		
						
    	

