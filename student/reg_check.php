<?php
session_start();
$sid=ucfirst($_POST["rsid"]);
$spass=htmlspecialchars(addslashes($_POST["rpass"]));
$scpass=htmlspecialchars(addslashes($_POST["rcpass"]));
$sec_ques=htmlspecialchars(addslashes($_POST["sec_ques"]));
$sec_ans=htmlspecialchars(addslashes($_POST["sec_ans"]));
$substr=substr($sid,1);
$allowed_types=array("image/png","image/jpeg","image/gif","image/vnd.microsoft.icon","image/bmp","image/x-tga");
if($sid=="")
	echo "please fill username";
else if($spass=="")
	echo "please fill password";
else if($scpass=="")
	echo "please fill confirm password";
else if($spass!=$scpass)
	echo "password and confirm password must match";
else if($sec_ques=="Select a Security Question")
	echo "please Select a Security Question";
else if($sec_ans=="")
	echo "please fill answer to your security question";	
else if(strlen($sid)!=7)
	echo "username must contain 7 letters";

else {
	include("dbconfig.php");
	$c=mysql_query("select name from users where id='$sid'")or die(mysql_error());
	if(mysql_num_rows($c)!=0)
		echo "username already exist";
	else
	{
	$year="tarak";
	if($year!="")
		{
		$spass=md5($spass);
                $ab=mysql_query("select * from data")or die(mysql_error());
		$a=mysql_query("select class from data where id='$sid'")or die(mysql_error());
		$fname=mysql_query("select name,branch,year from data where id='$sid';")or die(mysql_error());
                $b=mysql_fetch_array($a);
		$sname=mysql_fetch_array($fname);
$count=0;
while($abcd=mysql_fetch_array($ab)){
if($abcd['id']==$sid){
        $sfname=$sname['name'];
		$class=$b['class'];
		$branch=$sname['branch'];
		$year=$sname['year'];
		$values="";
		$values =$sid.",".$sfname.",".$spass.",".$class.",".$year.",".$branch.",".$sec_ques.",".$sec_ans;
		$_SESSION["values"]=$values;
		echo <<<q2
		<script type="text/javascript">
		$('#tcontent').load("image.php");
		</script>
q2;
	
	
}
else{
$count++;  
if($count==1)
	echo "You are not a IIIT'an";
    	
		}
	}
?>
<?php
}}

}
?>
