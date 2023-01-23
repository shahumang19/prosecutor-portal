<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/navigation_bar.css">
	<link rel="stylesheet" href="css/side-nav.css">
	<link rel="stylesheet" href="css/voter.css">
	<link rel="stylesheet" href="temp.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/box.css">
	

</head>


<body style="background-color:#efefef !important;">
<?php 
require_once('sidebar.php');
require_once('classes/connection.php');
session_start();
if(!isset($_SESSION['username']))
{
  header("location:login/index.php");
}
$username = $_SESSION['username'];

echo "<script> alert('username'+ $username); </script>" ;
?>
<div class="w3-main" style="margin-left:200px">
	<?php
		require_once('classes/header.php');
	?>
	<!-- <div class="w3-teal" style="position:sticky;">
		<button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
		<div class="w3-container" style="background:white; color:#00303f;">
		<p style="font-size:30px"><img src="logo_final.png" alt="logo" width="13%" height="13%" style="margin-top:-20px; margin-bottom:-10px;"/> The Gujarat Rajaya Assistant Public Prosecutor Association </p>
		</div>		
	</div> -->

<?php 


// if(!isset($_session['username']))
// {
//     echo $_session['username'];
//     header("location:login/index.php");
// }


?>

<?php

//xrequire_once('header.php');
?>

<br/><br/>
<div class="w3-container">

<form action="userinfo.php" method="post" enctype="multipart/form-data">
<?php 
		$db=getConnection();
		$res=$db->prepare("select * from prosecutor where email =:username");
		$res->bindParam(":username",$username);
		$res->execute();
		$r=$res->fetch();
		?>
<div class="form-group">

    <label for="exampleInputEmail1">Firstname</label>
    <input type="text" name='fname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value='<?php echo htmlentities($r[1])?>'>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Surname</label>
    <input type="text" name='sname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value='<?php echo htmlentities($r[2])?>'>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name='mail' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value='<?php echo htmlentities($r[4])?>'>
  </div>
  <label for="exampleInputEmail1">Do u want to change password?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   Yes : <input class="yes" type="radio" name="passwordc" value="Change"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   No : <input class="no" type="radio" name="passwordc" value="DontChange" checked> 
	 <div class="pass" style="display:none;">
  <div class="form-group">
    <label  for="exampleInputPassword1">Change Password</label>
    <input  type="password" name='pass' class="form-control" id="exampleInputPassword1"  >
  </div>
  <div class="form-group">
    <label  for="exampleInputPassword1">Retype Changed Password</label>
    <input  type="password" name='rpass' class="form-control" id="exampleInputPassword1" >
  </div>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="text" name='mobile' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value='<?php echo htmlentities($r[5])?>'>
  </div>

  <div class="form-group">
    <label for="exampleTextarea">Address</label>
    <textarea name='address' class="form-control" id="exampleTextarea" rows="3"  value='<?php echo $r[8]?>'><?php echo $r[8]?></textarea>
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" name='city' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value='<?php echo htmlentities($r[9])?>'>
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">Courtname</label>
    <input type="text" name='cname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value='<?php echo htmlentities($r[10])?>'>
  </div>

  <div class="form-group">

		<!-- <label for="exampleInputFile">File input</label> -->
		
   <br/> <input type="file" name='img' class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"  src='<?php echo htmlentities(($r[3]))?>'>
	 <img style="border:1px solid black" height="100px" src="<?php echo htmlentities(($r[3]))?>" />
	</div>
  <br/>
  <button type="submit" name='change' class="btn btn-primary">Submit Changes</button>
</form>

<br/><br/>

</div>
	 <?php
	 			require_once('footer.php');
	 ?>
</div>

<?php
function saveImage()
{
		//Image transfer code

		$check = getimagesize($_FILES["img"]["tmp_name"]);
		$ss = "<script>";$es="</script>";
 echo $ss.$_FILES["img"]["name"].$es;
		

		if($check !== false) {
				if (move_uploaded_file($_FILES["img"]["tmp_name"], "/".$_FILES["img"]["name"])){
						echo $ss."alert('Data has been updated.')".$es;
		return true;
				} else {
						echo $ss."alert('Sorry, An error ocurred while updating the info.')".$es;
		return false;
				}
				$uploadOk = 1;
	
		} else {
				echo $ss."alert('File is not an image.')".$es;
				$uploadOk = 0;
	return false;
				//exit(0);
		}
}
if(isset($_POST['change']))
{
	try{
	$name=$_POST['fname'];
	$sirname=$_POST['sname'];
	$email=$_POST['mail'];
	if($_POST['pass'] == $_POST['rpass'])
	{
		$password=$_POST['pass'];
	}
	if($_POST['radio']="DontChange")
	{
		$password=$_SESSION['password'];
	}
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$courtname=$_POST['cname'];
	$photo=$_FILES['img']['name'];
	saveImage();
	$db=getConnection();

		$res=$db->prepare("select pid from prosecutor where username='".$_SESSION['username']."'");
		$res->execute();
		$r=$res->fetch();
		$id=$r[0];
			
			$query = $db->prepare("Update prosecutor set firstname=:name, surname=:sirname,photo=:photo, email=:email, mobile=:mobile, username=:username, password=:password, address=:address, city=:city, courtname=:courtname where pid=:id");
            $query->bindParam(":name", $name, PDO::PARAM_STR);
			$query->bindParam(":sirname", $sirname, PDO::PARAM_STR);
			$query->bindParam(":photo", $photo, PDO::PARAM_STR);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
			$query->bindParam(":mobile", $mobile, PDO::PARAM_INT);
            $query->bindParam(":username", $email, PDO::PARAM_STR);
		    $enc_password = crypt($password,'st');
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
			$query->bindParam(":address", $address, PDO::PARAM_STR);
			$query->bindParam(":city", $city, PDO::PARAM_STR);
			$query->bindParam(":courtname", $courtname, PDO::PARAM_STR);
	    	$query->bindParam("id", $id, PDO::PARAM_INT);
		echo "<script> alert('5');</script>";
						$query->execute();		echo "<script> alert('5');</script>";

						$query = $db->prepare("update pec_users set username=:username where email=:email");
            $query->bindParam(":email", $_SESSION['username'], PDO::PARAM_STR);
						$query->bindParam(":username", $email, PDO::PARAM_STR);
						$query->execute();
						$query = $db->prepare("update pec_users set email=:username where username=:email");
            $query->bindParam(":email", $email, PDO::PARAM_STR);
						$query->bindParam(":username",$email, PDO::PARAM_STR);
						$query->execute();	echo "<script> alert('5');</script>";

}
catch(PDOException $e)
{
	echo "<script> alert('Sorry, an error occured');</script>";
}

}
?>
<script>
$(document).ready(function(){
	
	$(".yes").click(function(){
		$(".pass").slideDown("slow");
	});
	$(".no").click(function(){
		$(".pass").slideUp("slow");
	});
});
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
