<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION["site"]=="outpass" && $_SESSION["user"]=="student")
{
$ot=htmlspecialchars(addslashes($_GET["ot"]));
$retn=htmlspecialchars(addslashes($_GET["rt"]));
$reason=htmlspecialchars(addslashes($_GET["rsn"]));
$odate=htmlspecialchars(addslashes($_GET["od"]));
$id=htmlspecialchars(addslashes($_SESSION["id"]));

if($reason==null||$reason=="")
{
	echo "Please Fill Reason";
}
else if($odate==null||$odate=="")
{
	echo "Please Fill Outing date";
}
else if($ot==null||$ot=="")
{
	echo "Please Fill Outing time";
}
else if($retn==null||$retn=="")
{
	echo "Please Fill Return time";
}
else if($odate!=null||$odate!="")
{
	$od=explode(" ",$odate);
	if($od[2]>date("Y",(mktime(date("j"),date("m"),date("Y")))))
	{
		if($od[0]<10)
			$odate=$od[0]." ".$od[1]." ".$od[2];
		add($odate,$id,$reason,$ot,$retn);
	}
	else if($od[2]==date("Y",(mktime(date("j"),date("m"),date("Y")))))
	{
		if($od[1]==date("m",(mktime(date("j"),date("m"),date("Y")))))
		{
			if($od[0]>date("j",(mktime(date("j"),date("m"),date("Y")))))
			{
				if($od[0]<=10)
					$odate=$od[0]." ".$od[1]." ".$od[2];
				add($odate,$id,$reason,$ot,$retn);
			}
			else
				echo "Please fill Details Correctly !";
		}
		else if($od[1]>date("m",(mktime(date("j"),date("m"),date("Y")))))
		{
			
				if($od[0]<10)
					$odate=$od[0]." ".$od[1]." ".$od[2];
				add($odate,$id,$reason,$ot,$retn);
			
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
function add($odate,$id,$reason,$ot,$retn)
{
				include("dbconfig.php");
				$branch=mysql_query("select branch,class from users where id='$id';")or die(mysql_error());
				$brch=mysql_fetch_array($branch);
				$crdate=date("j m Y",(mktime(date("j"),date("m"),date("Y"))));
				$cls12=mysql_query("select * from users where id='$id';")or die(mysql_error());
				$clss12=mysql_fetch_array($cls12);
				$block=$clss12['block'];
				$cls=mysql_query("select year from users where id='$id';")or die(mysql_error());
				$clss=mysql_fetch_array($cls);
				$out_details=mysql_query("select * from outing where id='$id';")or die(mysql_error());
				$confirm="";
				$lv_det=mysql_query("select * from leaves where id='$id';")or die(mysql_error());
				for($j=0;$j<mysql_num_rows($lv_det);$j++)
				{
					$ldata=mysql_fetch_array($lv_det);
					if($ldata['permission']=="granted" && $ldata["ictime"]=="--" || $ldata['permission']=="wait" )
					{
						$confirm="not-l";break;
					}
				}
				for($j=0;$j<mysql_num_rows($out_details);$j++)
				{
					$odet=mysql_fetch_array($out_details);
					if($odet['permission']=="wait" || $odet['ogtime']=="--" && $odet['permission']!="refuse")
					{
						$confirm="not-n";break;
					}
					else if($odet["permission"]=="granted" && $odet["ictime"]=="--" && $odet["ogtime"]!="--")
					{
						$confirm="not-r";break;
					}
				}
				if($confirm=="not-l")
					echo "Your not suppose to take outing because you had already applied a leave";
				else if($confirm=="not-n")
					echo "Your not suppose to take outing because your previous outing is in process";
				else if($confirm=="not-r")
					echo "You  not suppose to take outing because your already on outing";
				else
				{
					
$ip_sen=$_SERVER['REMOTE_ADDR'];
					$in=mysql_query("insert into outing(id,reason,odate,adate,class,year,branch,otime,itime,block,ip) values('$id','$reason','$odate','$crdate','$brch[1]','$clss[0]','$brch[0]','$ot','$retn','$block','$ip_sen');")or die(mysql_error());
				echo "Successfully sent your request please wait for response";
				}
}

?>

