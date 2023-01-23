<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/settings.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('#change').click(function(){
        //alert(1);
        if($('#newp').val()!= $('#renewp').val())
        {
            alert('Password should be same.');
        }
    });
});
</script>

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

require_once('classes/settings_code.php');
?>
   
<div class="w3-container" style="background-color:#00303f;margin:10px;border-radius:10px;">
		<br/>
		<form action="settings.php" method="post" enctype="multipart/form-data">
			<label style="color:white;margin-left:10px;"><u>Change Password</u></label><br/><br/>
                <div id="newpas">
                <span style="color:white;margin-left:10px;width:150px;display:inline-block;float:left" >new password</span>
                <input id="newp" name="newp" style="margin-left:10px" type="password" required></input><br/><br/>
                <span style="color:white;margin-left:10px;width:150px;display:inline-block;float:left" > re-enter new password</span>
				<input id="renewp" name="renewp" style="margin-left:10px" type="password" required></input>
                </div>
                <br/>
                <div style="margin-left:170px;">
                <button id="change" name='change'>Submit Changes</button>
                </div>
			
			<br/>
		</form>
</div>
<br/><br/>

<?php
$user = new Admin();
$result = $user->getUser($_SESSION['username']);

if($result[0][3] == '1' )
{

    echo '<div class="w3-container" style="background-color:#00303f;margin:10px;border-radius:10px;">
		<br/>
		<form action="settings.php" method="post" enctype="multipart/form-data">
			<label style="color:white;margin-left:10px;"><u>Add Admin</u></label><br/><br/>
                <div id="newpas">
                <span style="color:white;margin-left:10px;width:150px;display:inline-block;float:left" >Username</span>
                <input type=\'email\' id="newp" name="user" style="margin-left:10px" required></input><br/><br/>
                <span style="color:white;margin-left:10px;width:150px;display:inline-block;float:left" >Password</span>
                <input id="newp" name="newp" style="margin-left:10px" type="password" required></input><br/><br/>
                <span style="color:white;margin-left:10px;width:150px;display:inline-block;float:left" > re-enter new password</span>
				<input id="renewp" name="renewp" style="margin-left:10px" type="password" required></input>
                </div>
                <br/>
                <div style="margin-left:170px;">
                <button id="change" name=\'add\'>Add User</button>
                </div>
			
			<br/>
		</form>
</div>

<br/><br/>
<div class="w3-container">';

    printdata();
}

?>
</div>
<br/>

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

    $('#ya').click(function(){
        $('#newpass').show();
        //$('#newusername').hide();
    });
    $('#na').click(function(){
        $('#newpass').hide();
        //$('#newusername').hide();
    });
});
</script>
	 
<?php  require_once("classes/president.php"); ?>

</body>
</html> 
