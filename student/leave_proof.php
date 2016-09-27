<?php
if(isset($_GET['sno']))
{
$sno=htmlspecialchars(addslashes($_GET['sno']));
?><form method="post" action="leave_proof_post.php?sno=<?php echo $sno?>" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" >
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
