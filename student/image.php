<?php
session_start();
if( array_key_exists("values",$_SESSION))
{
$data=htmlspecialchars(addslashes($_SESSION["values"]));
$idata=explode(",",$data);
	$sid=$idata[0];
	$sfname=$idata[1];
	$spass=$idata[2];
	$sclass=$idata[3];
	$syear=$idata[4];
	$sbranch=$idata[5];
	$ssec_ques=$idata[6];
	$ssec_ans=$idata[7];
	$msg="";
?>
<style type="text/css" media="all">
		@import url("css/style.css");
		
		@import url("css/default.css");
		
</style>
<title>REGISTRATION - Step 2</title>

		
				<div class="olms-top">
<center><div style="text-align:left;padding-left:2%;" >IIIT NUZ Online Leaves Management System</div></center>
</div><br><br><br>

			<div id="div3" class="block small center login" style="background-image:url('images/bg.png');border:0.0px solid;border-radius:3px;-webkit-border-radius: 3px;-moz-border-radius:3px;box-shadow:0px 0px 5px ; ">
				<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="register" style="padding:25px;">
				<center><h1>REGISTRATION</h1></center><br>
            <fieldset class="row2" width="100%">
                <legend>Your Details
                </legend>
                <?php echo $msg;?>
                
		&nbsp;&nbsp;<p><label>Full name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label><input type="text" readonly="" name="name" size="62.4%" value="<?php echo $sfname;?>"></p>
                <table width="100%"><tr><td>
                
                 <label>ID Number</label></td><td>:</td><td><input type="text" readonly="" name="id" value="<?php echo $sid;?>"></td><td>
		<label>Branch </label></td><td>:</td><td><input readonly="" type="text" name="branch" value="<?php echo $sbranch?>"></td></tr>
                
                <tr><td>
                   <label>Year </label></td><td>:</td><td><input readonly="" type="text" name="year" value="<?php echo $syear?>"></td>
                   <td> <label>Class:</label></td><td>:</td><td><input type="text" name="clss" required="required" placeholder="Example:- SS-09" value="<?php echo $sclass;?>" autofocus></td></tr>
                </table>
                
            </fieldset>
            <fieldset class="row1" width="100%">
                <legend>Personal Details</legend>
                <table width="100%"><tr><td>
                    <label>Mobile Number *</label></td><td>:</td><td>
                    <input type="text" name="mob" maxlength="10" required="required" placeholder="Mobile Number"/>
                </td></tr>
                <tr><td>
                    <label>Parent Mobile Number *
                    </label></td><td>:</td><td>
                    <input type="text" name="parent" maxlength="10" size="20px" required="required" placeholder="Parent's number" />
                </td></tr>
                <tr><td>
                    <label>Block & Dorm *
                    </label></td><td>:</td><td>
                    <select style="width:50px;height:30px;" name="block" required>
                    <option></option>
                    <option>I1</option>
                    <option>I2</option>
                    <option>K2</option>
                    <option>K3</option>
                    <option>K4</option>
                    <option>PUC</option>
                    
                    <input type="text" name="dorm"  required="required" placeholder="Ex: BT-03" />
                </td></tr>
                <tr><td>
<p class="fileupload">
					
				<input type="text" name="data" value="<?php echo $data;?>" style="display:none;">
				<label>Profile Picture:</label></td><td>:</td><td>
				<input name="userfile" type="file" accept="image/gif, image/jpeg,image/jpg,image/png, image/x-ms-bmp, image/x-png" id="" onchange="getElementById('FileField').value = getElementById('BrowserHidden').value;" required/></td><td><H4 style="color:green;">Size : less than 1MB</H4></td></tr></table>
				
            </fieldset>
            <fieldset class="row1" width="100%">
                <legend>Home Address
                </legend>
                <table width="100%">
                <tr><td>
                    <label>Door Number *</label></td><td>:</td><td>
                    <input type="text" name="door"required="required" placeholder="Door No"/>
                </td></tr>
                 <tr><td>
                    <label>Village *
                    </label></td><td>:</td><td><input type="text" name="village" required="required" placeholder="Village."/>
                    </td></tr>
                 <tr><td>
                    <label>Mandal *
                    </label></td><td>:</td><td><input type="text" name="mandal" required="required" placeholder="Mandal"/>
                    </td></tr>
                 <tr><td>
                    <label>District *
                    </label></td><td>:</td><td><input type="text" name="dist" required="required" placeholder="District"/>
                </td></tr>
                 <tr><td>
                    <label>Pincode *
                    </label></td><td>:</td><td><input type="text" name="pin" required="required" placeholder="PinCode"/>
                </td></tr></table>
            </fieldset>
				<p class="fileupload">
					
				</p>
				<div style="float:right;"><button type="submit" class="button">Finish &raquo;</button></div>
				</form>
			</div>
			
<br><br><br><br><br><br>
<?php
}//end if
else
	header("location:index.php");
// check if a file was submitted
if(isset($_FILES['userfile']))
{
	
    try {
    $urid=htmlspecialchars(addslashes($_POST["data"]));
    $msg= upload($urid);  //this will upload your image
    echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}

// the upload function
$msg="tarak";
function upload($urid) {
	$idata=explode(",",$urid);
	$sid=htmlspecialchars(addslashes($_POST['id']));
	$sfname=htmlspecialchars(addslashes($_POST['name']));
	$spass=$idata[2];
	$sclass=htmlspecialchars(addslashes($_POST['clss']));
	$syear=htmlspecialchars(addslashes($_POST['year']));
	$sbranch=htmlspecialchars(addslashes($_POST['branch']));
	$ssec_ques=$idata[6];
	$ssec_ans=md5($idata[7]);
	$mobile=htmlspecialchars(addslashes($_POST['mob']));
	$parent=htmlspecialchars(addslashes($_POST['parent']));
	$dorm=htmlspecialchars(addslashes($_POST['dorm']));
	$door=htmlspecialchars(addslashes($_POST['door']));
	$vil=htmlspecialchars(addslashes($_POST['village']));
	$mandal=htmlspecialchars(addslashes($_POST['mandal']));
	$dist=htmlspecialchars(addslashes($_POST['dist']));
	$pin=htmlspecialchars(addslashes($_POST['pin']));
	$block=htmlspecialchars(addslashes($_POST['block']));
    include("dbconfig.php");
    $maxsize =10000000000000000; //set to approx 10 MB
    $photo1=$_FILES['userfile']['tmp_name'];

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($photo1)) {   

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
            
$allowed_types=array("image/png","image/jpeg","image/gif","image/vnd.microsoft.icon","image/bmp","image/x-tga");
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($photo1));
                    // insert the image
                    mysql_query("insert into users(id,name,password,class,year,branch,sec_ques,sec_ans,photo,mob,pmob,dorm,door,vil,mdl,dist,pin,block) values('$sid','$sfname','$spass','$sclass','$syear','$sbranch','$ssec_ques','$ssec_ans','$imgData','$mobile','$parent','$dorm','$door','$vil','$mandal','$dist','$pin','$block')") or die("Error in Query: " . mysql_error());
                    $_SESSION["reg_result"]="success";
                    ?>
                    <script type="text/javascript">
                    window.location.href="index.php";
                    </script>
                    <?php
                }
                else
                {
                    $msg="Uploaded file is not an image.";
                    ?>
                    <script>
						var msg="<?php echo $msg; ?>";
						alert(msg);
                    </script>
                    <?php
            }
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='File exceeds the Maximum File limit
                Maximum File limit is '.$maxsize.' bytes
                File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes.';
                ?>
                    <script>
						var msg="<?php echo $msg; ?>";
						alert(msg);
                    </script>
                    <?php
                }
        }
        else
        {
            $msg="File not uploaded successfully.";
            ?>
                    <script>
						var msg="<?php echo $msg; ?>";
						alert(msg);
                    </script>
                    <?php
            }}
    return $msg;

// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>
<?php 
include_once('footer.php');
?>
