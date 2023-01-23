<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">

<style>

h2 {
   width: 100%; 
   text-align: center; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 20px; 
} 

h2 span { 
    background:#fff; 
    padding:0 10px; 
}

.abt{
    background : #fff;
    padding:20px;
}

</style>

</head>
<body style="background-color:#efefef!important;">

<?php 

// session_start();
// if(!isset($_SESSION['username']))
// {
//     header("location:login/login.php");
// }

require_once('sidebar-Admin.php');?>

<div class="w3-main" style="margin-left:200px">
<?php
require_once('classes/header.php');
?>

<div class="w3-container">
<br/><br/>
<div class='abt'>

<br/><br/>

<h2><span>About Us</span></h2>
<p>this is some content other</p>
<br/><br/><br/><br/>
</div>

<br/><br/>
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
     
</body>
</html> 
