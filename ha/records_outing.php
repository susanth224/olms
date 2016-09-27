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
						<li><a href="pending_outings.php"><i class="icon-chevron-right icon-large"></i><i class="icon-question-sign icon-large"></i> Pending Outings</a></li>
						<li><a href="pending_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-question-sign icon-large"></i> Pending Leaves</a></li>
                        <li ><a href="sanctioned_outings.php"><i class="icon-chevron-right icon-large"></i><i class="icon-ok icon-large"></i> Sanctioned Outings</a></li>
						<li><a href="sanctioned_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-ok icon-large"></i> Sanctioned Leaves</a></li>
                        <li ><a href="refused_outings.php"><i class="icon-chevron-right icon-large"></i><i class="icon-remove icon-large"></i> Refused Outings</a></li>
						<li><a href="refused_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-remove icon-large"></i> Refused Leaves</a></li>

						<li class="active"><a href="records_outing.php"><i class="icon-chevron-right icon-large"></i><i class="icon-bar-chart icon-large"></i> Outing Records</a></li>

						<li><a href="records_leaves.php"><i class="icon-chevron-right icon-large"></i><i class="icon-bar-chart icon-large"></i> Leave Records</a></li>

	<li><a href="student_details.php"><i class="icon-chevron-right icon-large"></i><i class="icon-user icon-large"></i> Student Details</a></li>
                    </ul>
	</center>
	</div>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i><?php echo $block ?> Outing Records</div>
                                <div class="muted pull-right">
									Outings Sanctioned till now  <span class="badge badge-info"><?php  $todaydate=date("d m Y");$wai='wait';
											$res=mysql_query("SELECT count(*) FROM outing WHERE `block`='$block' AND `permission`='granted'");
											while($row=mysql_fetch_array($res)){$tdtl=$row[0];} echo $tdtl; ?></span>
								</div>
                            </div>
                            	<?php include('outing_rcrd.php'); ?>
                            <div class="block-content collapse in">
								<div class="span13" id="studentTableDiv">
								<h2 id="noch"><?php echo $block ?> Outing Records</h2>
								
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

