<?php
if(isset($_SESSION['admin']))
{
$branch=addslashes(htmlspecialchars($_SESSION['admin']));
$user=addslashes(htmlspecialchars($_SESSION['admin']));
	include("dbconfig.php");
$res=mysql_query("SELECT * FROM admin WHERE username='".$user."'");
while ($row=mysql_fetch_array($res))
{
	?>
<div id="myModal" class="modal hide fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"> </div>

    <div class="navbar navbar-fixed-top navbar-inverse" >
            <div class="navbar-inner" >
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
                    </a>
                    <span class="brand" href="#"> IIIT NUZ Online Leave Management System - <?php echo "".$row['sno']."" ;?> </span>
                    <div id="coll" class="nav-collapse collapse">
                        <ul class="nav pull-right">
	
 <li><a   role="button" style="color:white;" tabindex="-1" href="home.php"><i class="icon-home icon-large"></i>&nbsp;Home</a></li>


                          <li class="dropdown">
                                <a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $branch  ?> <i class="caret"></i></a>
                                <ul class="dropdown-menu">
									<!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
                                    <li class="divider"></li>
                                    <li><?php  echo "<a class=\"jkl\" tabindex=\"-1\" onclick=\"comment(".$row['sno'].")\" href=\"#myModal\" data-toggle=\"modal\" >Changepassword</a>";
			 ?></li>
                                    <li><a  class="jkl" tabindex="-1" href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                     <script>
                     
	function comment(sno)
	{
	$("#myModal").html("");
	$("#myModal").load("changepass.php?sno="+sno);
	}
	</script>
                    <!--/.nav-collapse -->
                </div>
            </div>
    </div>
    
<?php
}
}
?>
