<?php
if(isset($_GET['sno']))
{
$sno=htmlspecialchars(addslashes($_GET['sno']));
?>
<form enctype="multipart/form-data" method="post" action="outing_proof_post.php?sno=<?php echo $sno?>">
<input type="hidden" name = "MAX_FILE_SIZE" value="100000000000">    
<table><th>Submit Proof:</th>
   <tr><td>
	
    <input type="file" name="File" ></td>
    <p>
       <td> <input type="submit" name="submit" value="submit"></td></tr>
       <tr><td></td></tr>
       <tr><td>Formats : Images,Pdf only</td></tr>
       <tr><td>Size : less than 1MB</td></tr>
       </table>
</form>
<?php
}
else
{
echo "<script>alert('Invalid');window.location='index.php';</script>";
}
?>
