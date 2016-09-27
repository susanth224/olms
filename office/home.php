<?php session_start(); ?>
<?php
if((isset($_POST["user"])) & (isset($_POST["password"])))
{
	include("dbconfig.php");
	$user=addslashes(htmlspecialchars($_POST["user"]));
	$passwd=addslashes(htmlspecialchars($_POST["password"]));
	$result=mysql_query("SELECT * FROM office WHERE username='".$user."' AND password='".$passwd."'");
	$check=1;
	while($row=mysql_fetch_array($result)){$check=0;$_SESSION["office"]=$user;}
	if($check){header('Location: index.php?status=failed');}
	if(!$result){echo mysql_error();}
}
?>
<?php
if(isset($_SESSION['office']))
{
$user=$_SESSION["office"];
include("dbconfig.php");
$res=mysql_query("SELECT * FROM office WHERE username='".$user."'");
while ($row=mysql_fetch_array($res))
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
						<li><a href="pending_outings.php"><i class="icon-chevron-right icon-large"></i><i class="icon-question-sign icon-large"></i> Pending Outings</a></li>
						<li><a href="pending_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-question-sign icon-large"></i> Pending Leaves</a></li>
                        <li><a href="sanctioned_outings.php"><i class="icon-chevron-right icon-large"></i><i class="icon-ok icon-large"></i> Sanctioned Outings</a></li>
						<li><a href="sanctioned_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-ok icon-large"></i> Sanctioned Leaves</a></li>
                        <li><a href="refused_outings.php"><i class="icon-chevron-right icon-large"></i><i class="icon-remove icon-large"></i> Refused Outings</a></li>
						<li><a href="refused_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-remove icon-large"></i> Refused Leaves</a></li>

					<li><a href="records_outing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-bar-chart icon-large"></i> Outing Records</a></li>

						<li><a href="records_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-bar-chart icon-large"></i> Leave Records</a></li>

	<li><a href="student_details.php"><i class="icon-chevron-right icon-large"></i><i class="icon-user icon-large"></i> Student Details</a></li>
                    </ul>
	</center>
	</div>
				<br>
                <div style="padding-left:5%" class="span4" id="">
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
					    <!-- block -->
                        <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> <?php //echo $branch ?> OLMS</div>
                                <div class="muted pull-right">
									 <?php echo "<span style='color:black;font-weight:bold;'>Total Outing Requests</span>"; ?>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch"><?php ////echo $branch ?> OLMS</h2>
									<?php include('outings_stats.php'); ?>
                                </div>
                                
                            </div>
                        </div>
                        <br>
                        <!-- /block -->
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i><?php //echo $branch ?> OLMS</div>
                                <div class="muted pull-right">
								 <?php echo "<span style='color:black;font-weight:bold;'>On Leave</span>"; ?>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch">OLMS,IIITN</h2>
									<?php include('outings_not reported.php'); ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /block -->
                        
                          <!-- /block -->
                          
                    </div>
                    
                </div>
                 <div class="span4" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> <?php //echo $branch ?> OLMS</div>
                                <div class="muted pull-right">
									 <?php echo "<span style='color:black;font-weight:bold;'>Today Leave Requests</span>"; ?>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch"><?php //echo $branch ?> OLMS</h2>
									<?php include('leaves_stats.php'); ?>
                                </div></div>
                            </div><br>
                             <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> <?php //echo $branch ?> OLMS</div>
                                <div class="muted pull-right">
									 <?php echo "<span style='color:black;font-weight:bold;'>On Outing</span>"; ?>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
								<h2 id="noch"><?php //echo $branch ?> OLMS</h2>
									<?php include('leaves_not reported.php'); ?>
                                </div>
                            </div>
                        </div>
                        </div>
                      
                 
                        
                
          
            
		<?php include('footer.php'); ?>
</body>
 <?php
}
}
?>

