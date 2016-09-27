<?php session_start(); ?>
<?php
if((isset($_POST["user"])) & (isset($_POST["password"])))
{
	include("dbconfig.php");
	$user=addslashes(htmlspecialchars($_POST["user"]));
	$passwd=addslashes(htmlspecialchars($_POST["password"]));
	$result=mysql_query("SELECT * FROM admin WHERE username='".$user."' AND password='".$passwd."' ");
	$check=1;
	while($row=mysql_fetch_array($result)){$check=0;$_SESSION["admin"]=$user;$_SESSION["name"]=$row['name'];}
	if($check){header('Location: index.php?status=failed');}
	if(!$result){echo mysql_error();}
}
?>
<?php
if(isset($_SESSION['admin']))
{
$user=htmlspecialchars(addslashes($_SESSION["admin"]));
include("dbconfig.php");
include('header.php');?>
<?php include('script.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
	 <div  id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
			
								<div class="span13" id="studentTableDiv">
								<h2 id="noch"><?php //echo $branch ?> Pending Leaves List</h2>
									<?php include('messages.php'); ?>
                                </div>
                            </div>
                        </div>
                      
                 </div>

                        
                
          
            
		<?php include('footer.php'); ?>
</body>
 <?php
}
?>

