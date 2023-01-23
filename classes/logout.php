<?php
    session_start();
    require_once('connection.php');
    $db=getConnection();
    $query = $db->prepare("update prosecutor set logged_in=0 where email=:email");
    $query->bindParam(":email", $_SESSION['username'], PDO::PARAM_STR);
                $query->execute();
     unset ($_SESSION['username']);
  //  print_r($_SESSION);
    echo"<script>alert('logout')</script>";
     header('location:../login/index.php');
?>