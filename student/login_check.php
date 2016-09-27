<?php
	session_start();
	$id=ucfirst(htmlspecialchars(addslashes($_POST["id"])));
	$password=md5(htmlentities($_POST["pass"]));
	include("dbconfig.php");
	mysql_select_db("olms") or die(mysql_error());
	$q=mysql_query("select * from users where id='$id';")or die(mysql_error());
	$ad=mysql_query("select username,password from admin;")or die(mysql_error());
	$adr=mysql_fetch_array($ad);
	$a=mysql_fetch_array($q);
	if($id=="")
	{
		echo "please fill username";
	}
	else if($password=="")
	{
		echo "please fill password";
	}
	else if($id==$a[0] && $password==$a[2])
	{
	$_SESSION['id']=$id;
	$_SESSION['pass']=$password;
	$_SESSION['name']=$a[1];
	$_SESSION["user"]="student";
	$_SESSION['site']="outpass";
	echo <<<q2
		Authenticated successfully please wait......
		<script type="text/javascript">
		$('#tcontent').load("student.php");
		</script>
q2;
	}
	else if($adr['username']==$id && $adr["password"]==$password)
	{
		$_SESSION['id']=$id;
		$_SESSION['pass']=$password;
		$_SESSION["user"]="admin";
		$_SESSION['site']="olms";
		echo <<<q2
		<script type="text/javascript">
		$('#tcontent').load("admin.php");
		</script>
q2;
	}
        else
        {
           echo <<<war
		Invalid credentials
war;
        }
?>
