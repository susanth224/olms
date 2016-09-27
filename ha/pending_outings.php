<?php session_start(); ?>

<?php
if(isset($_SESSION['ha']) && isset($_SESSION['block']))
{
$user=$_SESSION["ha"];
$block=$_SESSION["block"];
include("dbconfig.php");
$res=mysql_query("SELECT * FROM ha WHERE username='".$user."'");
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
						<li><a href="home.php"><i class="icon-chevron-right icon-large"></i><i class="icon-home icon-large"></i> Home </a></li>
						<li class="active"><a href="pending_outings.php"><i class="icon-chevron-right icon-large"></i><i class="icon-question-sign icon-large"></i> Pending Outings</a></li>
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
                <div class="span9" id="">
					
					    
                     <div class="row-fluid">
						 
						 																<?php 
if(isset($_GET['status']))
{
if ($_GET['status']=="approve")
{
echo '
	<div class="alert alert-success fade in">
		    <button  type="button" class="close" data-dismiss="alert">&times;</button>
		    <h4 class="alert-heading">Approved Successfully </h4>
		    <p>Outing successfully Approved.</p>
		    <a href="pending_outings.php" class="btn btn-success" >Close</a>
	</div>
';
}
}
?>
					 																<?php 
if(isset($_GET['status']))
{
if ($_GET['status']=="commented")
{
echo '
	<div class="alert alert-error fade in">
		    <button  type="button" class="close" data-dismiss="alert">&times;</button>
		    <h4 class="alert-heading">Commented Successfully </h4>
		 
		    <a href="pending_outings.php" class="btn btn-success" >Close</a>
	</div>
';
}
}
?>

						 																<?php 
if(isset($_GET['status']))
{
if ($_GET['status']=="refuse")
{
echo '
	<div class="alert alert-error fade in">
		    <button  type="button" class="close" data-dismiss="alert">&times;</button>
		    <h4 class="alert-heading">Refused Successfully </h4>
		    <p>Outing successfully Refused.</p>
		    <a href="pending_outings.php" class="btn btn-success" >Close</a>
	</div>
';
}
}
?>
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> <?php echo $block ?> Pending Outings List</div>
                                <div class="muted pull-right">
									Pending Outings  <span class="badge badge-info"><?php  $todaydate=date("d m Y");$wai='wait';
											$res=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND `permission`='$wai'");
											while($row=mysql_fetch_array($res)){$tdtl=$row[0];} echo $tdtl; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span13" id="studentTableDiv">
								<h2 id="noch"><?php echo $block ?> Pending Outings List</h2>
									<?php include('outings_table.php'); ?>
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
}
?>

