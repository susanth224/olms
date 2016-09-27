<?php include('header.php'); ?>
<?php include('session.php'); ?>

    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_dashboard6.php'); ?>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
<?php
               $dt1=date("d");
               $mt1=date("M");
               $dt2=date("d/m/y",strtotime("tomorrow"));
                $dt3=date("d",strtotime("tomorrow"));
						 	$query = $conn->query("select * from signup_and_login_table") or die(mysql_error());
							$count = $query->rowcount();
                                                        $query1 = $conn->query("select * from signup_and_login_table where gender='male'") or die(mysql_error());
							$count1 = $query1->rowcount();
                                                         
$query2 = $conn->query("select * from signup_and_login_table where gender='female'") or die(mysql_error());
							$count2 = $query2->rowcount();

$query3 = $conn->query("select * from outing ") or die(mysql_error());
							$count3 = $query3->rowcount();
$query4 = $conn->query("select * from outing where approval='approved' || approval='approved and left' || approval='approved and reported'  && month='$mt1'") or die(mysql_error());
							$count4 = $query4->rowcount();

$query5 = $conn->query("select * from outing where approval='rejected' && month='$mt1'") or die(mysql_error());
							$count5 = $query5->rowcount();

$query6 = $conn->query("select * from outing where approval='pending' && month='$mt1'") or die(mysql_error());
							$count6 = $query6->rowcount();
$query7 = $conn->query("select * from outing where approval='cancelld by security' && month='$mt1'") or die(mysql_error());
							$count7 = $query7->rowcount();

$query8 = $conn->query("select * from outing where lefttime!='dont left' && reportedtime!='dont returned' && month='$mt1'") or die(mysql_error());
							$count8 = $query8->rowcount();
$query9 = $conn->query("select * from  outing where date1='$dt1' && month='$mt1'") or die(mysql_error());
							$count9 = $query9->rowcount();
$query10 = $conn->query("select * from  outing where approval='approved' || approval='approved and left' || approval='approved and reported' &&  date1='$dt1' && month='$mt1'") or die(mysql_error());
							$count10 = $query10->rowcount();
$query11 = $conn->query("select * from  outing where approval='rejected' &&  date1='$dt1' && month='$mt1'") or die(mysql_error());
							$count11 = $query11->rowcount();

$query12 = $conn->query("select * from  outing where approval='pending' &&  date1='$dt1' && month='$mt1'") or die(mysql_error());
							$count12 = $query12->rowcount();
$query13 = $conn->query("select * from  outing where approval='cancelld by security' &&  date1='$dt1' && month='$mt1'") or die(mysql_error());
							$count13 = $query13->rowcount();
$query14 = $conn->query("select * from  outing where lefttime!='dont left' && reportedtime!='dont returned' &&  date1='$dt1' && month='$mt1'") or die(mysql_error());
							$count14 = $query14->rowcount();
$query15 = $conn->query("select * from  outing where lefttime!='dont left' && reportedtime='dont returned' &&  date1='$dt1' && month='$mt1'") or die(mysql_error());
							$count15 = $query15->rowcount();
$query16 = $conn->query("select * from  outing where date1='$dt3' && month='$mt1'") or die(mysql_error());
							$count16 = $query16->rowcount();
$query17 = $conn->query("select * from  outing where approval='approved' || approval='approved and left' || approval='approved and reported' && date1='$dt3' && month='$mt1'") or die(mysql_error());
           $count17 = $query17->rowcount();

$query18 = $conn->query("select * from  outing where approval='rejected' &&  date1='$dt3' && month='$mt1'") or die(mysql_error());
							$count18 = $query18->rowcount();
$query19 = $conn->query("select * from  outing where approval='pending' &&  date1='$dt3' && month='$mt1'") or die(mysql_error());
							$count19 = $query19->rowcount();

							$count12 = $query12->rowcount();
$query20 = $conn->query("select * from  outing where approval='cancelld by security' &&  date1='$dt3' && month='$mt1'") or die(mysql_error());
							$count20 = $query20->rowcount();

						?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right">
										<a href="outings.php"><i class="icon-arrow icon-large"></i> IIIT NUZ STATISTICS </a>
								</div>
                            </div>
                            <div class="block-content collapse in">
												<?php
						
  						?>
						<div class="alert alert-success">IIIT NUZ STATISTICS</strong></div>
						<div class="span6">
						Total Students: <br><strong><?php echo $count; ?></strong><hr>
                                                
			                        Female Students: <br><strong><?php echo $count2; ?></strong><hr><br>
                                               <h4>Month</h4>
						Requests in this month:<br> <strong><?php echo $count3; ?></strong><hr>
						Rejected in this month: <br><strong><?php echo $count5; ?></strong><hr>
                                                Cancelled in this month: <br><strong><?php echo $count7; ?></strong><hr><br>
                                               <h4>Today</h4>
                                                Today Requests: <br><strong><?php echo $count9; ?></strong><hr>
						Rejected Today: <br><strong><?php echo $count11; ?></strong><hr>
						Cancelled Today: <br><strong><?php echo $count13; ?></strong><hr>
                                                Not Reported Today: <br><strong><?php echo $count15; ?></strong><hr><br>
                                               <h4>Tomorrow</h4>
                                                Approved  Tomorrow:<br> <strong><?php echo $count17; ?></strong><hr>
						 Pending Tomorrow: <br><strong><?php echo $count19; ?></strong><hr>
						</div>
						
												<div class="span5">
						
						Male Students: <br><strong><?php echo $count1; ?></strong><hr>
						<br><br><hr><br><br><br>
						Approved  in this month:<br> <strong><?php echo $count4; ?></strong><hr>
                                                 Pending in this month: <br><strong><?php echo $count6; ?></strong><hr>
						Used in this month: <br><strong><?php echo $count8; ?></strong><hr><br><br><br>
						Approved  Today:<br> <strong><?php echo $count10; ?></strong><hr>
					        Pending Today: <br><strong><?php echo $count12; ?></strong><hr>
                                                Used Today: <br><strong><?php echo $count14; ?></strong><hr><br><br><br><br><br><br><br>
                                                Tomorrow Requests: <br><strong><?php echo $count16; ?></strong><hr>
                                                Rejected Tomorrow: <br><strong><?php echo $count18; ?></strong><hr>
                                               

							

                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>	
</html>
