<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION["site"]=="outpass" && $_SESSION["user"]=="student")
{
$id=htmlspecialchars(addslashes($_SESSION["id"]));
$name=htmlspecialchars(addslashes($_SESSION["name"]));
$reason=htmlspecialchars(addslashes($_GET["reasn"]));
$ldate=htmlspecialchars(addslashes($_GET["lvd"]));
$nfdays=htmlspecialchars(addslashes($_GET["nfdays"]));
$rdate=htmlspecialchars(addslashes($_GET["rtndt"]));
$crdate=date("j m Y",(mktime(date("j"),date("m"),date("Y"))));
$vr;
if($reason==null||$reason=="")
{
	echo "Please Fill Reason";
}
else if($ldate==null||$ldate=="")
{
	echo "Please Fill Leave date";
}
else if($nfdays=="select")
{
	echo "Please Select Number of days";
}
else if($ldate!=null||$ldate!="")
{
	$ld=explode(" ",$ldate);
	if($ld[2]>date("Y",(mktime(date("j"),date("m"),date("Y")))))
	{
		if($ld[0]<10)
			$ldate=$ld[0]." ".$ld[1]." ".$ld[2];
		add($ldate,$id,$crdate,$reason,$rdate);
	}
	else if($ld[2]==date("Y",(mktime(date("j"),date("m"),date("Y")))))
	{
		if($ld[1]>date("m",(mktime(date("j"),date("m"),date("Y")))))
		{
			if($ld[0]<10)
				$ldate=$ld[0]." ".$ld[1]." ".$ld[2];
			add($ldate,$id,$crdate,$reason,$rdate);
		}
		else if($ld[1]==date("m",(mktime(date("j"),date("m"),date("Y")))))
		{
			if($ld[0]>=date("j",(mktime(date("j"),date("m"),date("Y")))))
			{
				if($ld[0]<8)
					$ldate=$ld[0]." ".$ld[1]." ".$ld[2];
				add($ldate,$id,$crdate,$reason,$rdate);				
			}
			else
				echo "Day Already passed !";
		}
		else
				echo "Month Already passed !";
	}
	else
		echo "Year Already passed !";
}
}//end if
else
	header("location:index.php");
function add($ldate,$id,$crdate,$reason,$rdate)
{
				include("dbconfig.php");
				$characters=array_merge(range(0,9),range('A','Z'),range('a','z'));
				shuffle($characters);
				$captcha_text="";
				for($i=0;$i<6;$i++)
				{
				$captcha_text.=$characters[rand(0,count($characters)-1)];
				}
				$key=$id.$ldate.$crdate.$captcha_text;
				$cls=mysql_query("select * from users where id='$id';")or die(mysql_error());
				$clss=mysql_fetch_array($cls);
				$block=$clss['block'];
				$leave_details=mysql_query("select * from leaves where id='$id';")or die(mysql_error());
				$confirm="";
				$out_det=mysql_query("select * from outing where id='$id';")or die(mysql_error());
				for($j=0;$j<mysql_num_rows($out_det);$j++)
				{
					$odet=mysql_fetch_array($out_det);
					if($odet["ictime"]=="--" && $odet["permission"]!="refuse")
						$confirm="not-o";
				}
				for($j=0;$j<mysql_num_rows($leave_details);$j++)
				{
					$ldet=mysql_fetch_array($leave_details);
					if($ldet['permission']=="wait" || $ldet['ogtime']=="--" && $ldet['permission']!="refuse")
					{
						$confirm="not-n";
					}
					else if($ldet["permission"]=="granted" && $ldet["ictime"]=="--")
						$confirm="not-r";
				}
				if($confirm=="not-o")
					echo "Your not suppose to take Leave.<br>Because you had already applied one outing";
				else if($confirm=="not-n")
					echo "Your not suppose to take Leave because your previous  leave is on process";
				else if($confirm=="not-r")
					echo "Your not suppose to take Leave because you had already on leave";
				else
				{
				$confirm="";
				
$ip_sen=$_SERVER['REMOTE_ADDR'];
				$in=mysql_query("insert into leaves(id,reason,odate,idate,adate,class,year,branch,block,ip) values('$id','$reason','$ldate','$rdate','$crdate','$clss[class]','$clss[year]','$clss[branch]','$clss[block]','$ip_sen');")or die(mysql_error());
				echo "Successfully sent your request please wait for response";
				}
}
?>

