    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />

<link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/chosen.min.css" />
<?php
if(isset($_SESSION['office']))
{
include("dbconfig.php");
?>
<script type="text/javascript">
function load()
{
	var id=document.getElementById("id").value;
	$.post("studetails.php?id="+id,function(id)
		{
			$("#tbody").html(id);
		});
}
</script>
<CENTER>
    <div  class="col-lg-8">
        <select style="width:350px;" id="id" name="id" readonly="" data-placeholder="Search by ID or Name or Class" class="form-control chzn-select" onchange='load()' onclick='load()'>
			<option></option>
			<?php
	$sql="SELECT * FROM users";
	$result1=mysql_query($sql);
	while ($col = mysql_fetch_array($result1))
	{
	echo "<option  value='" .$col['id']. "'>" .$col['id']. " " .$col['name']. " </option>";
}
?>
            </optgroup>
        </select>
    </div>
    <br>
    <div id="tbody"></div>

    <br><br><br><br><br><br><br><br><br>

     <!-- GLOBAL SCRIPTS -->
  <script src="assets/js/jquery-2.0.3.min.js"></script>
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/js/jquery.uniform.min.js"></script>
<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/js/chosen.jquery.min.js"></script>
<script src="assets/js/jquery.tagsinput.min.js"></script>
<script src="assets/js/jquery.autosize.min.js"></script>
<script src="assets/js/bootstrap-inputmask.js"></script>
       <script src="assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>
                    
<?php
}
?>
