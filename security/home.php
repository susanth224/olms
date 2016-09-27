<?php session_start(); ?>
<?php
if((isset($_POST["user"])) & (isset($_POST["password"])))
{
	include("dbconfig.php");
	$user=addslashes(htmlspecialchars($_POST["user"]));
	$passwd=addslashes(htmlspecialchars($_POST["password"]));
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
<div class="span3" id="sidebar" style="width:20%;height:auto;border:2px solid black;padding: 3px 3px 15px 3px;">
			
	<center>
		<img src="images/logo.png" id="logo">
                   
						<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
						<li class="active"><a href="home.php"><i class="icon-chevron-right icon-large"></i><i class="icon-home icon-large"></i> Home </a></li>
						<li style="background:yellow;font-weight:bold;font-size:20px;">LEAVES</li>
						<li><a href="leave_outgoing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-circle-arrow-up icon-large"></i>OUTGOING</a></li>
						<li><a href="leave_incoming.php"><i class="icon-chevron-right icon-large"></i><i class="icon-circle-arrow-down icon-large"></i>INCOMING</a></li>
						<li style="background:yellow;font-weight:bold;font-size:20px;">OUTINGS</li>
						<li><a href="outing_outgoing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-circle-arrow-up icon-large"></i>OUTGOING</a></li>
                        <li><a href="outing_incoming.php"><i class="icon-chevron-right icon-large"></i><i class="icon-circle-arrow-down icon-large"></i>INCOMING</a></li>
                        <li style="background:yellow;font-weight:bold;font-size:20px;">RECORDS</li>
                        <li><a href="records_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-bar-chart icon-large"></i>LEAVES RECORD</a></li>
						<li><a href="records_outing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-bar-chart icon-large"></i>OUTING RECORD</a></li>
						</ul>
	</center>
	</div>
				
                 <div class="span8" id="">
					 												    											 																<?php 
if(isset($_GET['status']))
{
if ($_GET['status']=="changed")
{
echo '
	<div class="alert alert-success fade in">
		    <button  type="button" class="close" data-dismiss="alert">&times;</button>
		    <h4 class="alert-heading">Password Successfully Changed</h4>
		 
		    <a href="home.php" class="btn btn-success" >Close</a>
	</div>
';
}
}
?>
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> OLMS,IIITN</div>
                                <div class="muted pull-right">
									<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "On Outing"; ?></a>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch">OLMS,IIITN</h2>
									<?php include('outings_not reported.php'); ?>
                                </div></div>
                            </div><br>
                             <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> OLMS,IIITN</div>
                                <div class="muted pull-right">
									<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "On Leave"; ?></a>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch">OLMS,IIITN</h2>
									<?php include('leaves_not reported.php'); ?>
                                </div>
                            </div>
                        </div>
                        
                      
                 
                        
                
            </div>
            
		
</body>
<?php include('footer.php'); ?>
 <?php
}
?>

