<?php
require_once('connection.php');
session_start();
class user {

	   
    public function Register($pid,$name, $sirname,$photo, $email, $mobile, $username, $password, $address, $city, $courtname, $position_Id, $loggedin, $varified, $type_id, $dob, $doj)
    {
        try{
        //echo "<script> alert('3');</script>";
            $db = getConnection();
			//echo "<script> alert('4');</script>";
            $query = $db->prepare("INSERT INTO prosecutor(pid,firstname, surname,photo, email, mobile, username, password, address, city, father_name, position_Id, logged_in, verified, type_id, dob, doj, dor) VALUES (0,:name, :sirname,:photo, :email, :mobile, :username, :password, :address, :city, :courtname, :position_Id, :loggedin, :varified, :type_id, :dob, :doj, ADDDATE(:dob, INTERVAL 58 YEAR) )");
            $query->bindParam(":name", $name, PDO::PARAM_STR);
			$query->bindParam(":sirname", $sirname, PDO::PARAM_STR);
			$query->bindParam(":photo", $photo, PDO::PARAM_STR);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
			$query->bindParam(":mobile", $mobile, PDO::PARAM_INT);
            $query->bindParam(":username", $username, PDO::PARAM_STR);
		    $enc_password = crypt($password,'st');
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
			$query->bindParam(":address", $address, PDO::PARAM_STR);
			$query->bindParam(":city", $city, PDO::PARAM_STR);
			$query->bindParam(":courtname", $courtname, PDO::PARAM_STR);
			$query->bindParam(":position_Id", $position_Id, PDO::PARAM_INT);
			$query->bindParam(":loggedin", $loggedin, PDO::PARAM_INT);
			$query->bindParam("varified", $varified, PDO::PARAM_INT);
			$query->bindParam("type_id", $type_id, PDO::PARAM_INT);
			$query->bindParam("dob", $dob);
			$query->bindParam("doj", $doj);
		//    echo "<script> alert('5');</script>";
            $query->execute();
		//	echo "<script> alert('5.5');</script>";
			$query = $db->prepare("INSERT INTO pec_users(username,password,email) VALUES (:username,'e10adc3949ba59abbe56e057f20f883e',:email)");
		//	echo "<script> alert('6');</script>";
            $query->bindParam(":email", $email, PDO::PARAM_STR);
			$query->bindParam(":username", $username, PDO::PARAM_STR);
		    $query->execute();
       //     echo "<script> alert('7');</script>";
        }
		catch(PDOException $e)
		{
        
           echo "<script> alert('Sorry error while registering try different email else contact the admin');</script>";
        }
			   
    }
}	
    /*
     * Check Username
     *
     * @param $username
     * @return boolean
     * */
    function isUsername($username)
    {
        try {
            $db =  getConnection();
            $query = $db->prepare("SELECT user_id FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */
    function isEmail($email)
    {
        try {
            $db =  getConnection();
            $query = $db->prepare("SELECT user_id FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
			
            exit($e->getMessage());
        }
    }

    /*
     * Login
     *
     * @param $username, $password
     * @return $mixed
     * */
    function Login($username, $password)
    {
        try {
            $db =  getConnection();
            $query = $db->prepare("SELECT PID FROM prosecutor  WHERE email=:username AND password=:password AND verified=1");
            $query->bindParam(":username", $username, PDO::PARAM_STR);
            $enc_password = crypt($password,'st');
			$query->bindParam(":password", $enc_password, PDO::PARAM_STR);
		
            $query->execute();
           
            if ($query->rowCount() > 0) {
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
              //  echo "<script> alert(".$_SESSION['password'].");</script>";
                $result = $query->fetch(PDO::FETCH_OBJ);
                $q=$db->prepare("update prosecutor set logged_in=1 where username=:username");
                $q->bindParam(":username", $username, PDO::PARAM_STR);
                $q->execute();
                echo "<script> alert('Logged in');</script>";
                header('location:../dashboard.php');
			//	echo "<script> alert('loggedin');document.location='../dashboard.php'</script>";
                
                return $result->user_id;
            } else {
				echo "<script> alert('Wrong Credentials or Your Request is not approved yet');</script>";
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * get User Details
     *
     * @param $user_id
     * @return $mixed
     * */
    function UserDetails($user_id)
    {
        try {
            $db =  getConnection();
            $query = $db->prepare("SELECT user_id, name, username, email FROM users WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }



?>