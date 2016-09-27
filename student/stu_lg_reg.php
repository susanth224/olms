<?php
session_start();
?>
<style type="text/css">
    legend {
        color:#0481b1;
        font-size:13px;
        background:#fff;
        -moz-border-radius:4px;
        box-shadow: 0 1px 5px rgba(4, 129, 177, 0.5);
        padding:0px 10px;
        text-transform:uppercase;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
    }
    input,
    textarea {
        color: #373737;
        background: #fff;
        border: 1px solid #CCCCCC;
        color: #aaa;
        font-size: 14px;
        line-height: 1.2em;
        margin-bottom:15px;

        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    input[type="text"],
    input[type="password"]{
        padding: 8px 6px;
        height: 34px;
        
        width:275px;
        text-align:center;
        border:0.3px solid green;
        
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
        background:white;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
        border:1px solid green;
        text-align:center;
    }
    input[type="submit"]{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 1px 1px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }
    .small {
        line-height:14px;
        font-size:12px;
        color:#999898;
        margin-bottom:3px;
    }
</style>

			<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<style type="text/css" media="all">
		@import url("css/style.css");
                @import url("css/font-awesome.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
		
		@import url("css/tooltips.css");
</style>
<body><div>
				<div class="olms-top">
<center><div style="text-align:left;padding-left:2%;" >&nbsp;<font> IIIT NUZ Online Leaves Management System</font></div></center>
</div>
<div style="border-left:0px solid green;height:100%;border-right:0px solid green;;margin:0px 0px 0px 0px;"><br><br>
<center><img src="img/banner.png"></center>

<div class="olms-bottom">
<a  href="#"  class="css-tooltip-top color-blue" title="copyright @ "><strong><b>copyright &copy; OLMS-IIITN</b></strong></a>
<span class="right"><a onclick="copy();" class="css-tooltip-top color-blue" title="webteam"><strong><span>afsdf</span> WEBTEAM</strong></a></span>
<div class="clr"></div>

</div>

			<div id="div3" class="block small center log" style="background-image:url('images/pgb.jpg');border:2px solid green;border-radius:3px;-webkit-border-radius: 3px;-moz-border-radius:3px;box-shadow:0px 0px 5px ; ">
				<section class="main"  >
<div class="block_head">
					<h2 id="reg" style="visibility:hidden;color:white;">REGISTER</h2>
					<h2 id="lg" style="color:WHITE;float:left;">STUDENT LOGIN</h2>
					<h2 id="fg" style="visibility:hidden;color:white;">FORGOT PASSWORD</h2>
</div>
				<div id="div5"  style="height:230px;">
					<div id="login_message" class="message errormsg" ><img src="images/loading.gif" width=20 height=20>Checking Please wait....
					</div>
					<div class="divs" id="lgf"   style="position:relative;top:50px;" >
					
					<div>
							<input type="text" id="luser" name="lgusername"   placeholder="University ID"   maxlength="7"/>
					</div>
					
					<div>
						<input type="password" id="lpass" name="lgpassword" placeholder="Password" />
					</div>
					<input type='submit' class="submit" name='sublog' style="float:right;" value='Login' onclick="logincheck()"></input>
					<div id="div4" ><br><br><br><br>
						<a id="regs" href="#"  class="css-tooltip-left color-red" style="margin-right:-32px;" onclick="rgff()"><span>Click to Register</span>Register</a>
						<a id="lgnn" href="#" style="visibility:hidden;" onclick="lff()">Login</a>
					<a id="regs" href="#" class="css-tooltip-right color-orange" style="float:right;" onclick="fg_pass()"><span>Click to reset password</span>Forgot Password</a>
					</div>
					</div>
					<div id="rgf" style="position:relative;top:50px;display:none;" >
					<div>
							<input type="text" class="text" id="slusername"   placeholder="University ID" maxlength="7"/>
					</div>
					<div>
							<input type="password" class="text" id="slpass" placeholder="Password" />
					</div>
					<div>
							<input type="password" class="text" id="slcpass" placeholder="Confirm Password" />
					</div>
					<div>
						
							<select id="sec_ques" style="height:30px;">
									<option>Select a Security Question</option>
									<option>What is your tenth Hallticket number?</option>
									<option>Who is your first teacher?</option>
									<option>What is your pet name?</option>
									<option>Who is your best friend in childhood?</option>
									<option>What primary school did you attend?</option>
							</select></div><br>
						
					<div>
						<input type="text" id="sec_ans" class="text" placeholder="Answer">
					</div>
					<div>
					<input type='submit' class="submit" name='subreg' style="float:right;"  value='Next Step' onclick="regcheck()"></input>
                                        <a id="lgnn" class="css-tooltip-left color-blue" href="#" style="float:left;" onclick="lff()"><span>Click here to login</span>Login</a>
</div>
                        </div>
					<!--Forgot Password -->
					<div id="fg_pass"  style="position:relative;top:50px;display:none;">
					<p>
						
						<input type="text" id="fg_username" style="text-transform:uppercase;" class="text" placeholder="University ID">
					</p>
					<p>
						
						
							<select id="fg_sec_ques" style="height:30px">
									<option>Select a Security Question</option>
									<option>What is your tenth Hallticket number?</option>
									<option>Who is your first teacher?</option>
									<option>What is your pet name?</option>
									<option>Who is your best friend in childhood?</option>
									<option>What primary school did you attend?</option>
							</select>
					</p><br>
					<p>
						
						<input type="text" id="fg_sec_ans" class="text" placeholder="Answer">
					</p>
					<p>
						
						<input type="password" id="fg_new_pass" class="text" placeholder="New Password">
					</p>
										<p>
						
						<input type="password" id="fg_cfnew_pass" class="text" placeholder="Confirm Password">
					</p>
					<p>
					<input type='submit' class="submit" name='subfg' value="Verify" style="float:right;" onclick="chng_pass()" /><br>
<a id="lgnn" class="css-tooltip-left color-blue"  href="#" style="float:left;" onclick="lff()"><span>Click here to login</span>Login</a>
					</p>
					</div>
				</div></section>

											
			</div>		<!-- .login ends -->
			</div>
		</div>						<!-- wrapper ends -->
		
<script type="text/javascript">

</script>
<?php
	if(isset($_SESSION["reg_result"])&& $_SESSION["reg_result"]=="success")
	{
		?>
		<script>
		document.getElementById("login_message").style.display="block";
		document.getElementById("login_message").innerHTML="Registered successfully You Can Login";
		</script>
		<?php
		unset($_SESSION["reg_result"]);
		session_destroy();
	}
?>

