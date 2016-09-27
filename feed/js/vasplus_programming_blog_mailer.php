<?php
/********************************************************************************
* This script is brought to you by Vasplus Programming Blog to whom all copyrights are reserved.
* Website: www.vasplus.info
* Email: info@vasplus.info
* Do not remove this information from the top of this code.
*********************************************************************************/

ini_set('error_reporting', E_NONE);

function format_fullnames($name=NULL) //Put fullnames in the appropriate format
{
	/* Formats a first or last name, and returns the formatted version */
	if (empty($name))
		return false;
		
	// Initially set the string to lower, to work on it
	$name = strtolower($name);
	// Run through and uppercase any multi-barrelled name
	$names_array = explode('-',$name);
	for ($i = 0; $i < count($names_array); $i++) 
	{	
		// "McDonald", "O'Conner"..
		if (strncmp($names_array[$i],'mc',2) == 0 || ereg('^[oO]\'[a-zA-Z]',$names_array[$i])) 
		{
			$names_array[$i][2] = strtoupper($names_array[$i][2]);
		}
		// Always set the first letter to uppercase, no matter what
		$names_array[$i] = ucfirst($names_array[$i]);
	}
	// Piece the names back together
	$name = implode('-',$names_array);
	// Return upper-casing on all missed (but required) elements of the $name var
	return ucwords($name);
}

//Sender's information and message
$vpb_fullname = format_fullnames(strip_tags($_POST["vpb_fullname"]));
$vpb_email_address = strip_tags($_POST["vpb_email_address"]);
$vpb_mail_subject = strip_tags($_POST["vpb_mail_subject"]);
$vpb_message_body = strip_tags($_POST["vpb_message_body"]);
$formatMessage = nl2br($vpb_message_body);


//Year and Server
$daYed = date("Y");
$host = $_SERVER['HTTP_HOST'];



//Change this field and put in your email address as the receiver's email address
$receivers_email_addresses = array('YOUR_EMAIL_HERE@YOUR_SERVERNAME.com'); //'firstemail@server.com','secondemail@server.com' and so on



// BEGINNING OF MESSAGE 
for($i = 0; $i < count($receivers_email_addresses); $i++)
{
$message = <<<EOF

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   <title>Contact Form Mailer</title>
   </head>
      <body>
	 <table bgcolor="#F9F9F9" align="left" cellpadding="6" cellspacing="6" width="100%" border="0">
     <tr>
    <td valign="top" colspan="2">
            <p><font style='font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;'>
			<br>Dear Administrator,<br><br><br />
			
			The client whose detail is shown below has sent you this message using the contact form at $host:<br><br><br>
			
			Clients Fullname: $vpb_fullname<br><br>
			Email Address: $vpb_email_address<br><br>
			Mail Message: $formatMessage<br><br><br>
            
            
			Thank You!<br><br>
        
		</font></p>	
			
          </td>
  </tr>
  <tr>
  <td colspan="2" align="center">
  <table height="40" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F6F6F6" style="height:30;padding:0px;border:1px solid #EAEAEA;">
  <tr>
    <td><p align='center'><font style="font-family:Verdana, Geneva, sans-serif; font-size:10px;color:black;">Copyright &copy; $daYed | All Rights Reserved.</font></p></td>
  </tr>
</table>
</td>
</tr>
</table>

      </body>
   </html>
EOF;
// END OF MESSAGE 


    //    THIS EMAIL IS THE SENDERS EMAIL ADDRESS
    $from = $vpb_email_address;
   
    //    SET A SUBJECT OF YOUR CHOICE
    $subject = $vpb_mail_subject;
            
    //    SET UP THE EMAIL HEADERS
    $headers = "From: $vpb_fullname <$from>\r\n";
    $headers   .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers   .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n";   
   
   
   //   LETS SEND THE EMAIL
   if(mail($receivers_email_addresses[$i], $subject, $message, $headers))
   {
	   echo '<div class="vasplus_blog_success_status_message">Hello '.$vpb_fullname.',<br><br>Your message has been sent successfully. We will get back to you as soon as possible.<br><br>Thanks.</div>';
   }
   else
   {
	   echo '<div class="vasplus_blog_success_status_message">Hey '.$vpb_fullname.',<br>Your message could not be sent at the moment due to connection problem. <br>Please try again or contact the site admin to report this error if the problem persist. Thanks.</div>';
   }
}
?>