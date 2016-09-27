<?php session_start(); ?>
<?php
if((isset($_POST["user"])) & (isset($_POST["password"])))
{
	include("dbconfig.php");
	$user=addslashes(htmlspecialchars($_POST["user"]));
	$passwd=md5(addslashes(htmlspecialchars($_POST["password"])));
	$result=mysql_query("SELECT * FROM security WHERE username='".$user."' AND password='".$passwd."' ");
	$check=1;
	while($row=mysql_fetch_array($result)){$check=0;$_SESSION["sec"]=$user;}
	if($check){header('Location: index.php?status=failed');}
	if(!$result){echo mysql_error();}
}
?>
<?php
if(isset($_SESSION['sec']))
{
include('header.php');?>
<?php include('script.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
            <div class="row-fluid">
				<div class="span3" id="sidebar">
			
	<center>
		<img src="images/logo.png" id="logo">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
						<li ><a href="home.php"><i class="icon-chevron-right icon-large"></i><i class="icon-home icon-large"></i> Home </a></li>
						<li><a href="leave_outgoing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-question-sign icon-large"></i>LEAVES OUTGOING</a></li>
						<li  class="active"><a href="outing_outgoing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-question-sign icon-large"></i>OUTING OUTGOING</a></li>
                        <li><a href="leave_incoming.php"><i class="icon-chevron-right icon-large"></i><i class="icon-ok icon-large"></i>LEAVES INCOMING</a></li>
						<li><a href="outing_incoming.php"><i class="icon-chevron-right icon-large"></i><i class="icon-ok icon-large"></i>OUTING INCOMING</a></li>
                        <li><a href="records_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-remove icon-large"></i>LEAVES RECORD</a></li>
						<li><a href="records_outing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-remove icon-large"></i>OUTING RECORD</a></li>
						</ul>
	</center>
	</div>
				
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> IIIT NUZ Students List</div>
                                <div class="muted pull-right">
									Today Sanctioned  <span class="badge badge-info"><?php  $todaydate=date("d m Y");$wai='wait';
											$res=mysql_query("SELECT count(*) FROM outing WHERE `adate`='$todaydate' AND `permission`='granted'");
											while($row=mysql_fetch_array($res)){$tdtl=$row[0];} echo $tdtl; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span13" id="studentTableDiv">
								<h2 id="noch">IIIT NUZ Students List</h2>
									<?php include('outing_table_outgoing.php'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            
		<?php include('footer.php'); ?>
</body>
 <?php
}
?>

