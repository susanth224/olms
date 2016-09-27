<?php
if((isset($_POST["idate"])) && (isset($_POST["odate"])))
{

	mysql_connect("localhost","root","rgukt123");
	mysql_select_db("olms");
	$idate=addslashes(htmlspecialchars($_POST["idate"]));
	$odate=addslashes(htmlspecialchars($_POST["odate"]));
	$per="wait";
	$reason="summer halidays";
	$adate=date("j m Y",(mktime(date("j"),date("m"),date("Y"))));
	$ip=$_SERVER["REMOTE_ADDR"];

	$res=mysql_query("SELECT * FROM data");
	while ($row=mysql_fetch_array($res))
	{
			$block="I1";
			$branch=$row['branch'];
			$class=$row['class'];
			$year=$row['year'];
			$id=$row['id'];
	$result=mysql_query("INSERT INTO `leaves`( `id`,`class`, `branch`, `year`, `reason`,`adate`,`odate`,`idate`,`block`,`ip`,`permission`) VALUES ('".$id."','".$class."','".$branch."','".$year."','".$reason."','".$adate."','".$odate."','".$idate."','".$block."','".$ip."','".$per."')");
	if($result){echo $id;}
	}
	if(!$result){echo mysql_error();}
}
else
echo "<h1>sdsd</h1>";
?>

