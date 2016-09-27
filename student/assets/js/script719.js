function update()
{
	$("#loading_page").css("display","block"); 
	document.getElementById("loading").innerHTML=0;
	list=new Array("data","feedback","login","register","deskview","listview");
	index=0;
	while(index<7)
	{
		$("#"+list[index]+"_page").load(list[index]+".php?update");
		$("#"+list[index]+"_page").css("display","none");
		index++;
	}
}
update();
function load(url)
{
	$("#content").fadeOut(0);
	reset();
	list=new Array("data","deskview","feedback","login","home","listview","register");
	index=0;
	while(index<8)
	{
		if (list[index]==(url))
			{
			$("#"+list[index]).addClass("active");
			$("#"+list[index]+"_page").css("display","block"); ;
			}
		else
			{
			$("#"+list[index]).removeClass("active");
			$("#"+list[index]+"_page").css("display","none"); ;
			}
		index+=1;
	}
	$("#content").fadeIn(500);
}
function data()
{
	stu=pick("stuid");
	if (stu.length==7)
	{
	$("#data_page").html($("#loading_page").html());
	$("#data_page").load("data.php?studentid="+stu);
	}
}
function checklogin()
{
	username=pick("sid").toUpperCase();
	password=pick("passwd");
	if (username!=undefined && password!=undefined && username!="" && password!="" && username!=NaN && password!=NaN)
	{
		$("#login_page").html($("#loading_page").html());
		$("#login_page").load("login.php?sid="+username+"&passwd="+password);
	}
	else
	{
		alert("* All Fields are Mandatory");
	}
	return false;
}
function pick(data){
return document.getElementById(data).value.replace(RegExp(" ",'g'),"\+");
}
function register()
{	
	load("login");
	$("#login_page").css("display","none");
	$("#register_page").css("display","block");
}
function recaptcha()
{
	$("#register_page").html($("#loading_page").html());
	$("#register_page").load("register.php");
}
function login()
{
	load("login");
	$("#login_page").css("display","block");
	$("#register_page").css("display","none");
}
function notify(msg)
{
	$("#notify_page").fadeIn(1000);
	$("#notify_page").html(msg);
	$("#notify_page").fadeOut(8000);
}
function regist()
{
	oldpassword=pick("oldpasswd");
	password=pick("passwd");
	repassword=pick("repasswd");
	code=pick("code");
	if (code!=undefined &&  password!=undefined && oldpassword!=undefined && repassword!=undefined && code!="" && oldpassword!="" && password!="" && repassword!=""&& code!=NaN && password!=NaN && oldpassword!=NaN && repassword!=NaN)
	{
		if (password==repassword)
		{
		$("#register_page").html($("#loading_page").html());
		$("#register_page").load("register.php?old="+oldpassword+"&passwd="+password+"&code="+code);
		}
		else
		alert("Both passwords must same");
	}
	else
		alert("* All fields are mandatory");
	return false;
}
function logout()
{
	if (confirm("Are you sure to logout?")==true){$("#login_page").html($("#loading_page").html());$("#login_page").load("login.php?logout");}
}
function details()
{
	desk=pick("deskrow")+pick("deskno");
	condition=pick("condition");
	lpsrl=pick("lpsrl").toUpperCase();
	backup=pick("hours")+":"+pick("min");
	mdl=model();
	if (condition=='N'){problem=pick("probl");}else{problem='';}
	if (desk!="" && desk!=undefined && desk!=NaN && condition!="" && condition!=undefined && condition!=NaN && lpsrl!="" && lpsrl!=undefined && lpsrl!=NaN)
	{
		if (condition=='N' && problem==''){alert("Choose Your Laptop Problem\nOtherwise set condtion to good");}
		else if(mdl=="Unknown"){alert("Invalid Serail Number");}
		else if((pick("hours")=="Hours") || (pick("min")=="Minutes")){alert("Choose Battery Backup Time");}
		else{$("#data_page").html($("#loading_page").html());$("#data_page").load("data.php?desk="+desk+"&condition="+condition+"&lpsrl="+lpsrl+"&problem="+problem+"&model="+mdl+"&backup="+backup);}
	}
	else
	{
		alert("* All Fields are Mandatory");
	}
}
function feedback()
{
	alert("Sorry this feature disabled !!");
}
function condi(value)
{
	if(value=='Y')
	{$("#problem").fadeOut(500);}
	else
	{$("#problem").fadeIn(500);}
}
function pro(value)
{
	if (value=="Other"){alert("Any Other problem specify Here in text field");document.getElementById('probl').focus();}
	else{document.getElementById('probl').value=(pick('probl')+value+","); }
}
function model()
{
	data=pick("lpsrl");

	//----------2009----------------

	if (data.substr(0,10)=="LXPBE0C048" && data.length==22)
	{mdl="Aspire-4535-2009";}

	else if (data.substr(0,10)=="LXPBX0C004" && data.length==22)
	{mdl="Aspire-4736-2009";}

	//----------2010----------------
	else if (data.substr(0,10)=="LXTVQ01008" && data.length==22)
	{mdl="TravelMate-4740-2010";}


	//----------2011----------------
	else if (data.substr(0,6)=="CNF116" && data.length==10)
	{mdl="HP-2011";}

	//----------2012----------------

	else if (data.substr(0,10)=="NXTVQ01008" && data.length==22)
	{mdl="TravelMate-4740-2012";}

	else if (data.substr(0,10)=="LXTZ90C020" && data.length==22)
	{mdl="TravelMate-5742-2012";}


	//----------2013----------------
	else if (data.substr(0,10)=="NXV7BSI033" && data.length==22)
	{mdl="TravelMate-P243-2012";}

	else if (data.substr(0,10)=="NXV7BSI127" && data.length==22)
	{mdl="TravelMate-P243-2013";}

	// More Condtitions
	else{mdl="Unknown";}
	$("#model").html(mdl);
	return mdl;
}
function loading(x)
{
	document.getElementById("loading").innerHTML=parseInt(document.getElementById("loading").innerHTML)+x;
	if (document.getElementById("loading").innerHTML==100)
	{
		$("#loading_page").css("display","none"); 
		load("home");
	}
}
function copy(){
	$("#developer").slideToggle(2000);
}
function student(stu)
{
	$("#loading_page").css("display","block"); 
	$("#student_page").load("student.php?studentid="+stu);
}
function reset(){
	$("#student_page").html("");
}
function minidata()
{
	stu=pick("stuid");
	if (stu!="")
	{
		$("#loading_page").css("display","block"); 
		$("#student_page").load("student.php?studentid="+stu);
	}
}
notify("Site content is loading !! Please wait...");
