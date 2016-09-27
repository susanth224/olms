<?php
session_start();
$fg_id=$_SESSION["fg_un"];
?>
<style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
		
</style>
<title>Change Password</title>
<div id="hld">
	
		<div id="div2" class="wrapper">		<!-- wrapper begins -->
		
				<center><h1>Online Outpass System</h1></center>
			<div id="div3" class="block small center login">
			
				<div id="div4" class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					<h2 id="lg">Change your password</h2>
					
				</div>
				<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="padding:25px;">
				<p>
						<label>Username:</label><h3><?php echo "&emsp;&emsp;&emsp;".$fg_id;?></h3>
					</p>
					<p>
						<label>New Password:</label><br />
						<input type="password">
					</p>
				<p>
						<label>Confirm Password:</label><br />
							<input type="password">
				</p>
				<p>
				<input type="submit" class="submit" value="Submit" />
				</p>
				</form>
			</div>
		</div>
</div>
