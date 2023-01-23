<?php

    //require_once("TableRow.php");

    $servername = "db4free.net:3307";
    $db = "lawyerdb";
    $username = "lawyers";
    $password = "love4india";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$db",$username,$password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected Successfully";
        //$conn = null;//closes the connection 
        $query = "select * from tbl_admin";
        $fetch_data = $conn->prepare($query);
        $fetch_data->execute();
        //$result = $fetch_data->setFetchMode(PDO::FETCH_ASSOC);
        $data = $fetch_data->fetchAll();
        echo "<table border=2>";

        // foreach(new TableRow(new RecursiveArrayIterator($fetch_data->fetchAll())) as $k=>$v)
        // {
        //     echo $v;
        // }


        foreach($data as $d)
        {
            echo "<tr>";
                echo "<td>".$d[0]."</td>";
                echo "<td>".$d[1]."</td>";
                echo "<td>".$d[2]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        //$conn->exec($query);
        //echo "<br/>Record inserted.";
        $conn = null;
    }catch(PDOException $e)
    {
    echo "<br/>Connection failed: " . $e->getMessage();
    }
?>