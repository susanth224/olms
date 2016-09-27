<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_dashboard.php'); ?>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right">
										<a href="members.php"><i class="icon-arrow-left icon-large"></i> Back</a>
								</div>
                            </div>
                            <div class="block-content collapse in">
												<?php
						$query = $conn->query("select * from signup_and_login_table where id = '$get_id'")or die(mysql_error());
  						
						$row = $query->fetch();
						   $idnu=$row['firstname'];?>
						<div class="alert alert-success">ID Number: <strong><?php echo $row['firstname'] ?></strong></div>
						<div class="span6">
						Gender: <strong><?php echo $row['gender']; ?></strong><hr>
			                        Email: <strong><?php echo $row['email']; ?></strong><hr>
						Contact No: <strong><?php echo $row['contact']; ?></strong><hr>
						Registered from: <strong><?php echo $row['ip']; ?></strong><hr>
						
						This Month Outings: <strong><?php echo $row['numout']; ?></strong><hr>
						
						</div>
						
												<div class="span5">
						Class: <strong><?php echo $row['lastname']." ".$row['lastnamenum']; ?></strong><hr>
						Password: <strong><?php echo $row['password']; ?></strong><hr>
						Registered on: <strong><?php echo $row['date']; ?></strong><hr>
						Overall Outings: <strong><?php echo $row['overal']; ?></strong><hr>
                                                 Dorm: <strong><?php echo $row['dorm']; ?></strong><hr>
						
						
					
						</div>
<div class="span12">
	<hr>
						<div class="alert alert-success">Outing History</div>
							<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
		<thead>
		<tr>
					<th>Outings on</th>
					<th>Left Time</th>
					<th>Reported Time</th>
					<th>Reason</th>
					<th>Place</th>
					<th class="empty"></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$query = $conn->query("select * from outing where idnum = '$idnu'") or die(mysql_error());
		while ($row = $query->fetch()) {
		$id = $row['id'];
		?>
		<tr>
		<td><?php echo $row['day']." ".$row['date1']." ".$row['month']; ?></td> 
		<td><?php echo $row['lefttime']; ?></td>
                <td><?php echo $row['reportedtime']; ?></td> 
		<td><?php echo $row['reason']; ?></td> 
		<td><?php echo $row['place']; ?></td> 
		</tr>
	<?php } ?>    
	
		</tbody>
	</table>

</div>
							

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
