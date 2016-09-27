/********************************************************************************
* This script is brought to you by Vasplus Programming Blog to whom all copyrights are reserved.
* Website: www.vasplus.info
* Email: info@vasplus.info
* Do not remove this information from the top of this code.
*********************************************************************************/

$(document).ready(function()
{
	$('#vpv_tooltip_image').mouseenter(function(){
		$(this).fadeOut('fast');
	});
	$("#vpb_fullname").Watermark("Your Fullname"); 
	$("#vpb_email_address").Watermark("Email Address");
	$("#vpb_mail_subject").Watermark("Email Subject");
	$("#vpb_message_body").Watermark("Email Message");
});

function vpb_leave_a_message_show() {
	$('#vasplus_programming_blog_bottom').slideUp('fast');
	$('#vpv_tooltip_image').fadeOut('fast');
	$('.vasplus_programming_blog_bottom').slideDown('slow');
}

function vpb_leave_a_message_hide() {
	$("#vpb_message_body").val('').animate({
			"height": "80px"
	}, "fast" );
	$("#vpb_fullname").val('');
	$("#vpb_email_address").val('');
	$("#vpb_mail_subject").val('');
	$("#vpb_fullname").Watermark("Your Fullname"); 
	$("#vpb_email_address").Watermark("Email Address");
	$("#vpb_mail_subject").Watermark("Email Subject");
	$("#vpb_message_body").Watermark("Email Message");
	$('#vasplus_programming_blog_mailer_status').html('').hide();
	$('.vasplus_programming_blog_bottom').slideUp('fast');
	$('#vasplus_programming_blog_bottom').slideDown('slow');
	$('#vpv_tooltip_image').fadeIn('fast');
}

//Send Mails
function Contact_Form_Submission_By_Vasplus_Programming_Blog() 
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var vpb_fullname = $("#vpb_fullname").val();
    var vpb_email_address = $("#vpb_email_address").val();
	var vpb_mail_subject = $("#vpb_mail_subject").val();
	var vpb_message_body = $("#vpb_message_body").val();
	
	if(vpb_fullname == "" || vpb_fullname == "Your Fullname")
	{
		$('#vasplus_programming_blog_mailer_status').show().css("background-color","#FFFFB7").html('Please enter your fullname in the specified field to proceed. Thanks.');
		 $("#vpb_fullname").focus();
	}
	else if(vpb_email_address == "" || vpb_email_address == "Email Address")
	{
		$('#vasplus_programming_blog_mailer_status').show().css("background-color","#FFFFB7").html('Please enter your email address in its field to move on. Thanks.');
		$("#vpb_email_address").focus();
	}
	else if(reg.test(vpb_email_address) == false)
	{
		$('#vasplus_programming_blog_mailer_status').show().css("background-color","#FFFFB7").html('Please enter a valid email address to proceed. Thanks.');
		$("#vpb_email_address").focus();
	}
	else if(vpb_mail_subject == "" || vpb_mail_subject == "Email Subject")
	{
		$('#vasplus_programming_blog_mailer_status').show().css("background-color","#FFFFB7").html('Please enter the subject of your message to proceed. Thanks.');
		$("#vpb_mail_subject").focus();
	}
	else if(vpb_message_body == "" || vpb_message_body == "Email Message")
	{
		$('#vasplus_programming_blog_mailer_status').show().css("background-color","#FFFFB7").html('Please enter your message content in the required field to go. Thanks.');
		$("#vpb_message_body").focus();
	}
	else 
	{
		var dataString = 'vpb_fullname=' + vpb_fullname + '&vpb_email_address=' + vpb_email_address + '&vpb_mail_subject=' + vpb_mail_subject + '&vpb_message_body=' + vpb_message_body;
		
		$.ajax({
			type: "POST",
			url: "js/vasplus_programming_blog_mailer.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$('#vasplus_programming_blog_mailer_status').show().css("background-color","white").html('<font style="font-family:Verdana, Geneva, sans-serif; font-size:12px;color:gray;">Please wait</font> <img style="" src="img/loading.gif" align="absmiddle" alt="Loading" />');
			},
			success: function(response) 
			{
				$("#vpb_message_body").val('').animate({
						"height": "80px"
				}, "fast" );
				$("#vpb_fullname").val('');
				$("#vpb_email_address").val('');
				$("#vpb_mail_subject").val('');
				$('#vasplus_programming_blog_mailer_status').show().css("background-color","#FFFFB7").html(response);
			}
		});
		return false;
	}
}