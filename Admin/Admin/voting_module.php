<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<link rel="stylesheet" href="css/table.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<style>
.hiddencss
{
	/* width : 100%; */
	display : none;
}
</style>

<script>
function edit1()
{
	$("#lbl1").toggle();
	$("#eldate").toggle();
	$("#editdt").toggle();
	$("#up").toggle();
	$("#ccl").toggle();
	$("#delete").toggle();
	//$("#").toggle();
	return false;
}

function del(c)
{
	if (confirm("Are you sure you want to delete candidate "+c+" !")) {
        return true;
    } else {
			return false;
    }
}

</script>

</head>
<body style="background-color:#efefef!important;">

<?php require_once('sidebar-Admin.php');
			require_once('classes/voting_module_code.php');
?>

<div class="w3-main" style="margin-left:200px">
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login/login.php");
}
require_once('classes/header.php');
?>

<div class="w3-container" style="background-color:#00303f;margin:10px;border-radius:10px;">
<br/>
<?php

		getData();

?>
<br/><br/>
</div>
   
<div class="w3-container" style="background-color:#00303f;margin:10px;border-radius:10px;">
		<br/>
		<form action='voting_module.php' method='post' enctype='multipart/form-data'>
		<label style="color:white;margin-left:10px;"><u>Add Candidates</u></label><br/><br/>
		<span style="color:white;margin-left:10px;width:150px;display:inline-block;">Registered Email</span><input name='mail' style="margin-left:10px" type="email" required></input><br/><br/>
		<span style="color:white;margin-left:10px;width:150px;display:inline-block;" >Position</span>
		<select name='pos' style="width:200px;display:inline-block;margin-left:5px" required>
		  <?php
					$p = new Position();
					$result = $p->getPositions();
					foreach($result as $d)
					{
							echo "<option value='$d[0]'>$d[1]</option>";
					}
			?>
		</select>
		<br/><br/>

			<span style="color:white;margin-left:10px;width:150px;display:inline-block;float:left" >Description</span>
			<textarea name='desc' rows="7" cols="21" style="margin-left:10px;" required></textarea>

		<br/><br/>
		<button type="submit" name='addCan' text="Add" style="margin-left:170px;padding: 0px 24px;">Add</button>
		</form>
		<br/><br/>
</div>
   
<div class="w3-container" style="overflow-x:auto;">
<table id="tab">
  <tr>
	<th>ID</th>
    <th>photo</th>
    <th>Name</th>
    <th>Email</th>
	<th>Position</th>
	<th>Remove</th>
  </tr>
  <?php
getCandidateData();

	?>
  
</table>
</div>
   <br/><br/>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
