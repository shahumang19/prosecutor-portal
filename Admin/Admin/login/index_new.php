<!DOCTYPE html>
<html lang="en">
<?php
require_once('user.php');
?>
<head>
	<title>Lawyer's Portal</title>
	<meta charset="UTF-8">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/utill.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>


<body>
	
	<center>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login1001">
				<!-- <div class="login100-pic js-tilt" data-tilt>
					<img src="images/law-firm-logo.jpg" alt="IMG">
				</div> -->

				<form method="post" action="" enctype="multipart/form-data">
				<div class="login100-form validate-form">
					<span class="login100-form-title1">
						Registration  
					</span>

					
					
					<div class="wrap-input103 validate-input" data-validate1 = "Enter Name" style="margin-left:-50px;">
						<input class="input100" type="text" name="name" placeholder="Your Name" style="width:80%;">
						<span class="focus-input1001"></span>
						<span class="symbol-input1001">
						<i class="fa fa-user"></i>
						</span>
												
					</div>
					
					<div class="wrap-input1001 validate-input" data-validate1 = "Enter Surname" style="margin-left:230px;">
						<input class="input100" type="text" name="surname" placeholder="Your Surname" style="width:80%;">
						<span class="focus-input1001"></span>
						<span class="symbol-input1001">
						<i class="fa fa-user-md" ></i>
						</span>
												
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter Mobile Number">
						<input class="input100" type="tel" name="mobile" placeholder="Mobile Number">
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-mobile-phone"></i>
						</span>
						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Select Birthdate">
						<input class="input100" type="date" name="date" placeholder="Birthdate">
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-birthday-cake"></i>
						</span>
						
					</div>
					<div class="wrap-input100 validate-input"  data-validate = "Input Your Photo">
						<input class="input100" type="file" id="pics" name="pics" placeholder="Photo">
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-file-photo-o"></i>
						</span>
						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter Address">
						<!-- <input class="input100" type="text" name="address" placeholder="Address"> -->
						 <textarea class="input100" name="address" cols="30" rows="5" placeholder="Address"></textarea>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-address-book"></i>
						</span>
						
						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter Court name">
						<input class="input100" type="pincode" name="court" placeholder="courtname">
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-codepen"></i>
						</span>
						
					</div>
					<div class="wrap-input100 validate-input" data-valxidate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="reg" value="Register">
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</center>
<?php
function saveImage()
    {
        //Image transfer code
		
        $check = getimagesize($_FILES["pics"]["tmp_name"]);
        $ss = "<script>";$es="</script>";
		 echo $ss.$_FILES["pics"]["name"].$es;
        //$check = true;

        if($check !== false) {
            if (move_uploaded_file($_FILES["pics"]["tmp_name"], "/".$_FILES["pics"]["name"])){
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
if(isset($_POST['reg']))
	{
		 echo "<script> alert('1');</script>";
		 echo $_FILES["pics"]["name"];
		 ;
		saveImage();
	
		$r= new user();
			echo "<script> alert('2');</script>";
		$r->Register('0',$_POST['name'], $_POST['surname'],$_FILES['pics']['name'], $_POST['email'], $_POST['mobile'], $_POST['email'], $_POST['pass'], $_POST['address'], "NO_Field", $_POST['court'], '0', '0', '0', '0');
		echo "<script> alert('messege');</script>";
		

	}

?>	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>