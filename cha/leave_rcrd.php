<?php
if(isset($_SESSION['cha']))
{
include("dbconfig.php");
?>
<style type="text/css" media="all">

		@import url("assets/date_input.css");
		
    </style>
<script type="text/javascript">
function load()
{
	var date=document.getElementById("date").value;
	$.post("leave_record_table.php?date="+date,function(data)
		{
			$("#tbody").html(data);
		});
}
</script>		
            <br>
				<div class="pull-right">
					<a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
				<a href="" class="btn btn-inverse"><i class=""></i> <?php echo "Today's Date :".date("d/m/y"); ?></a>
				</div>
            <div width="1000px" height="1000px">
				<?php $date=date("j m Y",(mktime(date("j"),date("m"),date("Y"))));?>
				<div id="lvsots" class="block_content divs">
				DATE::<input id="date" name="date" value="<?php echo $date;?>" type='text' class="text date_picker" onchange="load()" onclick="load()" >
				</div>				
				<div id="tbody"></div>				
						</div>
			</div>
</div>
	
<?php include("../files/includes1.php");?>
<?php
}
else
{
header("location:index.php");
}
?>
