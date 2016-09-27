
function enrollment()
{
	document.getElementById("blc_h2").innerHTML="";
	$("#bl_ctnt").show();
	$.post("out_leav_forms.php",function(data)
	{
		$("#bl_ctnt").html(data);
	});
	$("#bl_ctnt").show();

}
function outing()
{
$("#message_box").show();
$("#out_act").addClass("active");
$("#leave_act").removeClass("active");
$("#home_act").removeClass("active");
$("#leaves_act").removeClass("active");
$("#outings_act").removeClass("active");
document.getElementById("outform").style.display="block";
document.getElementById("leavef").style.display="none";
}
function leave()
{
$("#message_box").show();
$("#out_act").removeClass("active");
$("#leave_act").addClass("active");
$("#home_act").removeClass("active");
$("#leaves_act").removeClass("active");
$("#outings_act").removeClass("active");
document.getElementById("outform").style.display="none";
document.getElementById("leavef").style.display="block";

}
function send_outing()
	{
		var ot=document.getElementById("out").value;
		var rt=document.getElementById("return").value;
		var rsn=document.getElementById("reasn").value;
		var odate=document.getElementById("out_date").value;
		document.getElementById("message_box").style.visibility="visible";
		$("#message_box").fadeOut();
		$("#message_box").fadeIn("slow");
		$.post("send_outing.php?rsn="+rsn+"&od="+odate+"&ot="+ot+"&rt="+rt,function(data)
		{
			$("#message_box").html(data);
		});
		document.getElementById("out_submit").value="Submit";
		outing();
		document.getElementById("out_submit").disabled=false;
	}
function send_leave()
	{
		var reasn=document.getElementById("reason_lv").value;
		var otdate=document.getElementById("odate_lv").value;
		var nfdys=document.getElementById("nf_days_lv").value;
		var od=otdate.split(" ");
		var newDate = new Date(od[2], od[1]-1, od[0]); // create new increased date
		newDate.setDate(newDate.getDate() + parseInt(nfdys));
		var d=newDate.getDate();
		if(d<10)
			d=d;
		var m=newDate.getMonth()+1;
		if(m<10)
			m=m;		
		var y=newDate.getFullYear();
		var frtndate=d+' '+m+' '+y;
		//alert(frtndate);
		document.getElementById("message_box").style.visibility="visible";
		$("#message_box").fadeOut();
		$("#message_box").fadeIn("slow");
		$.post("send_leave.php?reasn="+reasn+"&lvd="+otdate+"&rtndt="+frtndate+"&nfdays="+nfdys,function(data)
		{
			$("#message_box").html(data);
		});
		document.getElementById("leave_submit").value="Submit";
		document.getElementById("leave_submit").disabled=false;
	}
enrollment();outing();
function return_date()
{
	var nfdys=document.getElementById("nf_days_lv").value;
	var out_date=document.getElementById("odate_lv").value;
	if(out_date=="" || out_date==null)
		document.getElementById("return-date").innerHTML="please enter outgoing date";
	else if(nfdys=="select")
		document.getElementById("return-date").innerHTML="";
	else
		{
			var od=out_date.split(" ");
			var newDate = new Date(od[2], od[1]-1, od[0]); // create new increased date
			newDate.setDate(newDate.getDate() + parseInt(nfdys));
			var d=newDate.getDate();
			if(d<10)
				d=d;
			var m=newDate.getMonth()+1;
			if(m<10)
				m=m;		
			var y=newDate.getFullYear();
			var frtndate=d+' '+m+' '+y;
			document.getElementById("return-date").innerHTML="Return Date:- "+frtndate;
		}
}
var x=10;
function nn(i)
{
    var i1=i;
    if(x>0)
		{
			var l=[0,0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9,1.0];
			document.getElementById(i1).style.opacity=l[x];x--;
			setTimeout("nn('"+i1+"')",100);
		}
		else
			{
			document.getElementById(i1).style.visibility="hidden";
                        x=10;
			}
}
function getoutingrs()
{
	document.getElementById("blc_h2").innerHTML="";
	$("#bl_ctnt").show();
	$.post("outing.php",function(data)
	{
		$("#bl_ctnt").html(data);
	});
	$("#bl_ctnt").show();
}

function getleaverls()
{
	document.getElementById("blc_h2").innerHTML="";
	$("#bl_ctnt").show();
	$.post("leaves.php",function(data)
	{
		$("#bl_ctnt").html(data);
	});
	$("#bl_ctnt").show();
}

