<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body style="background-color:#efefef!important;">

<?php 

// session_start();
// if(!isset($_session['username']))
// {
//     echo $_session['username'];
//     //header("location:login/login.php");
// }

require_once('sidebar-Admin.php');?>

<div class="w3-main" style="margin-left:200px">
<?php

require_once('classes/header.php');
?>

<br/><br/>
<div class="w3-container">

<form action="userinfo.php" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="exampleInputEmail1">Firstname</label>
    <input type="text" name='fname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Surname</label>
    <input type="text" name='sname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name='mail' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Change Password</label>
    <input type="password" name='pass' class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Retype Changed Password</label>
    <input type="password" name='pass' class="form-control" id="exampleInputPassword1" placeholder="">
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="text" name='mobile' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleTextarea">Address</label>
    <textarea name='address' class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" name='city' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">Courtname</label>
    <input type="text" name='cname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name='img' class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
  </div>
  <br/>
  <button type="submit" name='change' class="btn btn-primary">Submit Changes</button>
</form>

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
