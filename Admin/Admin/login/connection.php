<?php
    function getConnection()
    {
        $servername = "db4free.net:3307";
        $db = "lawyerdb";
        $username = "lawyers";
        $password = "love4india";

        try        
        {
                $conn = new PDO("mysql:host=$servername;dbname=$db",$username,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }   
        catch(PDOException $e)
        {
            echo "<br/>Database Connection failed : $e";
            $conn = null;
        }
        return $conn;
    }
?>