<?php session_start(); ?>
<?php
if(isset($_SESSION['sec']))
{
header('Location: home.php');
}
?>
<?php include('header.php'); ?>
  <body id="login">
    <div class="container">
	<?php include('navbar_index.php'); ?>
	<div style="width:80%;height:100%;padding-bottom:60px;border:2px solid green;margin:30px 60px 60px 90px;">
	<img src="images/banner.png" >
	  <?php 
if(isset($_GET['status']))
{
if ($_GET['status']=="failed")
{
echo '
	<div class="alert alert-error fade in">
		    <button  type="button" class="close" data-dismiss="alert">&times;</button>
		    <h4 class="alert-heading">Invalid Credentials</h4>
		  
	</div>
';
}
}
?>
	<div style="width:100%;border:1px solid green;"></div>
    <form  class="form-signin" action="home.php" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Security Login</h3>
        <input type="text" class="input-block-level" id="usernmae" name="user" placeholder="Username" required>
        <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
        <button data-placement="top" title="Click to Login" id="login1" name="login" class="btn btn-success" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
		                            <script type="text/javascript">
										$(document).ready(function(){
											$('#login1').tooltip('show');
											$('#login1').tooltip('hide');
										});
									</script>
	</form>
							</div>
<?php include('footer_index.php'); ?>
    </div> <!-- /container -->
<?php include('script.php'); ?>
  </body>
</html>
