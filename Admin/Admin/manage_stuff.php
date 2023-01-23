<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<link rel="stylesheet" href="css/table.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body style="background-color:#efefef!important;">
<?php require_once('sidebar-Admin.php');
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
		<form action="manage_stuff.php" method="post" enctype="multipart/form-data">
			<label style="color:white;margin-left:10px;"><u>President Details</u></label><br/><br/>
			<span style="color:white;margin-left:10px;width:150px;display:inline-block;">Name</span><input id="pname" name="pname" style="margin-left:10px" type="text" required></input><br/><br/>
			<span style="color:white;margin-left:10px;width:150px;display:inline-block;">Photo</span><input id="img" name="img" style="margin-left:10px;color:white" type="file" required></input><br/><br/>
			
				<span style="color:white;margin-left:10px;width:150px;display:inline-block;float:left" >Description</span>
				<textarea rows="7" id="description" name="description" cols="21" style="margin-left:10px;" required></textarea>

			<br/><br/>
			<button id="submitbtn" onClick="validate()"  name="submit" type="submit" text="Add" style="margin-left:170px;padding: 0px 24px;">Add</button>
			<br/><br/>
			<span style="color:white;">* This information will be displayed on the front page of the website. *</span>
			<br/><br/>
		</form>
</div>
   
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

<!-- Submitbtn script -->
<script>

function validate(){
	alert(222);
}
$(document).ready(function(){
	$('#submitbtn').click(function(){		
		alert(111);
		var image = document.getElementById('img').files[0];
		//alert(image.name.length);

		if(image.name.length <=0)
		{
			alert('Please upload an image');
			return false;
		}
		else
		{
			alert('111');
			var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
			if($.inArray(image["type"], ValidImageTypes) < 0))
			{
				alert('The file should be an image only.');
				return false;
			}
			//alert('Please upload an image');
			//return false;
		}

		
	});
});
</script>
	 
<?php  require_once("classes/president.php"); ?>

</body>
</html> 
