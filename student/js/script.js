function chng_pass()
	{
		var fg_un=document.getElementById("fg_username").value;
		var fg_sec_que=document.getElementById("fg_sec_ques").value;
		var fg_sec_ans=document.getElementById("fg_sec_ans").value;
		var fg_new_pass=document.getElementById("fg_new_pass").value;
		var fg_cfnew_pass=document.getElementById("fg_cfnew_pass").value;
		$("#login_message").fadeOut();
		$("#login_message").fadeIn("slow");
		$.post("forgot_pass.php",{fg_un:fg_un,fg_sec_que:fg_sec_que,fg_sec_ans:fg_sec_ans,fg_new_pass:fg_new_pass,fg_cfnew_pass:fg_cfnew_pass},function(data)
		{
			$("#login_message").html(data);
		});
	}
	function logincheck()
	{
		var id=document.getElementById("luser").value;
		var pass=document.getElementById("lpass").value;
		$("#login_message").fadeOut();
		$("#login_message").fadeIn("slow");
		$.post("login_check.php",{id:id,pass:pass},function(data)
		{
			$("#login_message").html(data);
		});
		
	}
	function regcheck()
	{
		var slun=document.getElementById("slusername").value;
		//var slfn=document.getElementById("slfname").value;
		var slpass=document.getElementById("slpass").value;
		var slcpass=document.getElementById("slcpass").value;
		var ssec_ques=document.getElementById("sec_ques").value;
		var ssec_ans=document.getElementById("sec_ans").value;
		$("#login_message").fadeOut();
		$("#login_message").fadeIn("slow");		
		$.post("reg_check.php",{rsid:slun,rpass:slpass,rcpass:slcpass,sec_ques:ssec_ques,sec_ans:ssec_ans},function(data)
		{
			$("#login_message").html(data);
		});
		
	}
	
	function rgff()
	{	
		document.getElementById("lgf").style.display="none";
		document.getElementById("rgf").style.display="block";
		document.getElementById("fg_pass").style.display="none";
		document.getElementById("regs").style.visibility='hidden';
		document.getElementById("lgnn").style.visibility='visible';
		document.getElementById("div5").style.height="340px";
		document.getElementById("lg").style.visibility='hidden';
		document.getElementById("lg").style.fontSize="0px";
		document.getElementById("fg").style.visibility='hidden';
		document.getElementById("fg").style.fontSize="0px";
		document.getElementById("reg").style.visibility='visible';
		document.getElementById("reg").style.fontSize='18px';
		$("#login_message").fadeOut("slow");
	}
	function lff()
	{
		document.getElementById("lgf").style.display="block";
		document.getElementById("rgf").style.display="none";
		document.getElementById("fg_pass").style.display="none";
		document.getElementById("div5").style.height="230px";
		document.getElementById("reg").style.visibility='hidden';
		document.getElementById("reg").style.fontSize="0px";
		document.getElementById("fg").style.visibility='hidden';
		document.getElementById("fg").style.fontSize="0px";
		document.getElementById("lg").style.visibility='visible';
		document.getElementById("lg").style.fontSize='18px';
		document.getElementById("lgnn").style.visibility='hidden';
		document.getElementById("regs").style.visibility='visible';
		$("#login_message").fadeOut("slow");
	}
	function fg_pass()
	{
		document.getElementById("lgf").style.display="none";
		document.getElementById("rgf").style.display="none";
		document.getElementById("fg_pass").style.display="block";
		document.getElementById("div5").style.height="340px";
		document.getElementById("reg").style.visibility='hidden';
		document.getElementById("reg").style.fontSize="0px";
		document.getElementById("lg").style.visibility='hidden';
		document.getElementById("lg").style.fontSize='0px';
		document.getElementById("fg").style.visibility='visible';
		document.getElementById("fg").style.fontSize='18px';
		document.getElementById("regs").style.visibility='hidden';
		document.getElementById("lgnn").style.visibility='visible';
		$("#login_message").fadeOut("slow");
	}
