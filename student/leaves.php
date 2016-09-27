<?php
session_start();
if($_SESSION["id"]!="" && $_SESSION['site']=="outpass" && $_SESSION['user']=="student")
{
include("dbconfig.php");
$id=htmlspecialchars(addslashes($_SESSION["id"]));
$name=htmlspecialchars(addslashes($_SESSION["name"]));
$query=mysql_query("select * from users where id='$id';")or die(mysql_error());
$st_det=mysql_fetch_array($query);
$cla=mysql_query("select * from data where id='$id';")or die(mysql_error());
$class=mysql_fetch_array($cla);
$out=mysql_query("select * from outing where id='$id' and permission='granted'")or die(mysql_error());
$leaves=mysql_query("select * from leaves where id='$id' and permission='granted'")or die(mysql_error());
$count=mysql_num_rows($leaves);
$od=mysql_query("select * from leaves where id='$id' order by sno desc;")or die(mysql_error());
?>
	<style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
	</style>
   <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/jquery.filestyle.mini.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/jquery.date_input.pack.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/jquery.select_skin.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
	<style type="text/css">
	.message.info {
		border: 1px solid #bbdbe0;
		position:absolute;
		top:150px;
		width:200px;
		left:500px;
		height:100px;
		background: #ecf9ff url(images/info.gif) 12px 12px no-repeat;
		color: #0888c3;
		}
		.message .close {
		display: block;
		float: right;
		width: 16px;
		height: 16px;
		background: url(images/close.png) 0 0 no-repeat;
		margin-top: 2px;
		cursor: pointer;
		-moz-opacity: 0.7;
		opacity: 0.7;
		}
		.message .close.hover {
		-moz-opacity: 1;
		opacity: 1;
		}
		.message {
		padding: 10px 15px 10px 40px;
		margin: 8px 0;
		font-weight: bold;
		overflow: hidden;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		}
		.message.success {
		position:absolute;
		top:150px;
		width:200px;
		left:500px;
		height:20px;
		border: 1px solid #bfde84;
		background: #edfbd8 url(images/success.gif) 12px 12px no-repeat;
		color: #508600;
		}
		table tr.even td {
                background: #bbbb;
                }
   ul.olms4
{
position:relative;
right:25%;
width:100%;
list-style-type:none;
margin:30px;
padding:0px;
color:red;
background:darkgreen;
padding:5px 5px 5px 5px;
}
ul.olms4 li
{

padding:5px;
color:red;
background:red;
padding:5px 5px 5px 5px;
}	
ul.olms4 li a.olms1:link,.olms4 li a.olms1:visited
{
color:white;
font-weight:bold;
font-size:12px;
}
ul.olms4 li.active
{
color:white;
background:red;
font-weight:bold;
font-size:12px;
}
ul.olms4 li
{
color:red;
background:green;
font-weight:bold;
font-size:12px;
}
.olms4 li a.olms1:hover
{
background:white;
color:black;
font-weight:bold;
font-size:12px;
}
	</style>
<div style="position:relative;float:left;right:5%;top:-5px;">
				
				<fieldset style="position:relative;left:75px;width:90px;height:72%;box-shadow:0px 0px 0px;-moz-box-shadow:0px 0px 0px;-webkit-box-shadow:0px 0px 0px;border:thin solid #bbb;border-radius:10px;">&nbsp;
<p style="text-align:center"><a href="#" class="css-tooltip-right color-blue"><img src="get.php?id=<?php echo $id;?>" style="width:87%;height:40%;border:2px solid green;padding:1px;"><span><?php echo "Me, ".$st_det['name']."<br>".$st_det['branch']." Department." ;?></span></a><br/><font size='3' face='Serif' >
</p>
			<ul class="olms4" style="">
                        <li id="home_act"><a href="index.php" class="olms1">HOME</a></li>
                        <li id="out_act"><a href="index.php"   class="olms1">OUTING FORM</a></li>
                        <li id="leave_act"><a href="index.php"  class="olms1">LEAVE FORM</a></li>
                     <li id="outings_act"><a href="#" class="olms1" id="outingl" onclick="getoutingrs()">
					OUTINGS<?php
					$od1=mysql_query("select * from outing where id='$id' order by odate asc;")or die(mysql_error());
					for($i=0;$i<mysql_num_rows($od1);$i++)
					{
						$odata=mysql_fetch_array($od1);
						if( $odata["permission"]=="granted" && $odata["ogtime"]=="--")
						{
							echo "<img src='images/info1.gif'>";break;
						}
					}
					?></a>
					</li>
                        <li id="leaves_act"  class="active"><a href="#" class="olms1" id="leavel" onclick="getleaverls()">
					LEAVES<?php
					$od2=mysql_query("select * from leaves where id='$id' order by odate asc;")or die(mysql_error());
					$odata_che=mysql_fetch_array($od2);
					for($i=0;$i<mysql_num_rows($od2);$i++)
					{
						$odata=mysql_fetch_array($od2);
						if( $odata["permission"]=="granted" && $odata["ogtime"]=="--")
						{
							echo "<img src='images/info1.gif'>";break;
						}
					}
					?></a></li>
			<li ><a href="profile.php?id=<?php echo $id?>" rel='facebox' class="olms1">EDIT PROFILE</a></li>
			<li ><a href="image_display.php?id=?php echo $id?>" rel='facebox' class="olms1">CHANGE PICTURE</a></li>
			
			<li ><a href="changepass.php?id=<?php echo $id;?>" rel='facebox' class="olms1">CHANGE PASSWORD</a></li>
			</ul>
				
				</fieldset>
				
				</div>
						<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="85%" class="sortable" style="padding-left:10%;font-size:12;">
						
							<thead><tr style="color:white;background-image:url('images/stats.jpg');"><th colspan="7" style="text-align:center;"><?php echo $id ?> - LEAVES</th></tr>
								<tr style="background-color:#CCCCCC;" class="stretchLeft">
									
									<th>Permission</th>
									<th>Date Outing</th> 	
									<th>date Incomming</th>
									<th>Gone_Date</th>
									<th>Arrival_Date</th>
									<th>Proof</th>
									<th width="20%">Comment</th>

								</tr>
							</thead>
							<tbody>
								
<?php								
for($i=0;$i<mysql_num_rows($od);$i++)
{
	$odata=mysql_fetch_array($od);
	?>
			<tr class="stretchRight">
				<td><?php 
				$permiss=$odata['permission'];
				$ictime=$odata['ictime'];
				$ic="--";
				 $appro="granted";
				 if($permiss==$appro && $ictime==$ic)
				 {
					 echo $appro?>&nbsp;&nbsp; <a href="cancel-leave.php?sno=<?php echo $odata['sno'];?>">Cancel</a><?php
				 }
					 else
					 {
						echo $permiss;
					}?>
						 </td>
				<td><?php echo $odata['odate'] ?></td>
				<td><?php echo $odata['idate'] ?></td>
				<td><?php echo $odata['ogdate'] ?></td>
				<td><?php echo $odata['icdate']?></td>
				<?php 
				$prm=$odata['permission'];
				$prm_check="wait";
				if($prm==$prm_check || $prm=="granted")
				{
				$file_var=$odata['file'];
				$file_check="";
				if($file_var==$file_check)
				{
				?>
				<td><a  rel="facebox"  title="Upload Supported Documents" href="leave_proof.php?sno=<?php echo $odata['sno'];?> ">Upload</a></td>
				<?php
				}
				else
				{
				?>
				<td>Already Uploaded<br><a  rel="facebox" href="leave_proof.php?sno=<?php echo $odata['sno'];?> ">Re-Upload</a>&nbsp;<?php 
			  echo  "<blink><a  style='color:green;' onclick=\"file(".$odata["sno"].")\" '>Open</a></blink>"; ?>
			<?php	}
					}
					else
					{
						echo "<td>--</td>";
					}
				?>
				<td  style='color:red;'><?php 
				$com_check="no-comment";
				$com_var=$odata['comment'];
				if($com_var==$com_check)
				{
				echo "--";
				}
				else
				{
				echo $odata['comment'];
				}?></td>
				
			</tr>	
			<script>
					function file(sno)
	{
	window.open("file_open_leaves.php?sno="+sno," ","left=400,width=650,height=650");
	}
	</script>
			
<?php			
}
}//end if
else
{
header("location:index.php");
}
?>
