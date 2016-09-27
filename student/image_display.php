<?php

session_start();
$id=htmlspecialchars(addslashes($_SESSION['id']));
include("dbconfig.php");
?>
<style type="text/css" media="all">
		@import url("css/default.css");
		
</style>
<center>
				<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="register" >
				<h1>Upload your Photo</h1><br>
				<H3>Size : less than 1MB</H3>
				<p class="fileupload">
					<div class="infobox">
				<input type="text" name="data" value="<?php echo $data;?>" style="display:none;">
				<label>Upload Your Image:</label><br>
				
				<input name="userfile" type="file" accept="image/gif, image/jpeg,image/jpg,image/png, image/x-ms-bmp, image/x-png" id="" onchange="getElementById('FileField').value = getElementById('BrowserHidden').value;"/>
				<div style="float:right;"><button type="submit" class="button">Submit &raquo;</button></div></div></p>
				</form>
				</center>		
<?php

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
    include("dbconfig.php");
    $maxsize =10000000000000000; //set to approx 10 MB
    $photo1=$_FILES['userfile']['tmp_name'];

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($photo1)) {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($photo1));
                    // insert the image?>
  <?php
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$id=htmlspecialchars(addslashes($_SESSION['id']));
mysql_select_db($db, $con);
                    mysql_query("UPDATE users SET photo='$imgData'  WHERE id='$id'" ) or die("Error in Query: " . mysql_error());
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

