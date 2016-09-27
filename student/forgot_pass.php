<?php
session_start();
$fg_un=htmlspecialchars(addslashes($_POST["fg_un"]));
$fg_sec_ques=htmlspecialchars(addslashes($_POST["fg_sec_que"]));
$fg_sec_ans=md5(htmlspecialchars(addslashes($_POST["fg_sec_ans"])));
$fg_new_pass=htmlspecialchars(addslashes($_POST["fg_new_pass"]));
$fg_cfnew_pass=htmlspecialchars(addslashes($_POST["fg_cfnew_pass"]));
if($fg_un=="")
	echo "pleasse fill username";
else if($fg_sec_ques=="Select a Security Question")
	echo "please fill security question";
else if($fg_sec_ans=="")
	echo "please fill answer";
else if($fg_new_pass=="")
	echo "please fill password";
else if($fg_cfnew_pass=="")
	echo "please fill cofirm password";
else if($fg_new_pass!=$fg_cfnew_pass)
	echo "both passwords should be same";
else
{
	include("dbconfig.php");
	$query=mysql_query("select * from users where id='$fg_un';")or die(mysql_error());
	if(mysql_num_rows($query)!=0)
	{
		$query_det=mysql_fetch_array($query);
		$fg_new_pass=md5($fg_new_pass);
		if($fg_sec_ques==$query_det["sec_ques"] && $fg_sec_ans==$query_det["sec_ans"])
		{
			$query=mysql_query("update users set password='$fg_new_pass' where id='$fg_un';")or die(mysql_error());
			echo "Password successfully changed";
			?>
<script>

</script>
<?php
		}
		else{
			echo "please check your question and answer";
		}
	}
	else
		echo "please check your details";
}

?>
