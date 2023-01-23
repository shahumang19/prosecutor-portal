<?php

class Admin
{
    function getData($id)
    {
        $conn = getConnection();

        if($conn != null)
        {
            $stmt = $conn->prepare("select * from tbl_admin where email not in(:id)");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result = $stmt->FetchAll();
            return $result;
        }
    }

    function getUser($id)
    {
        $conn = getConnection();

        if($conn != null)
        {
            $stmt = $conn->prepare("select * from tbl_admin where email=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result = $stmt->FetchAll();
            return $result;
        }
    }

    function addUser($id,$pass)
    {
        $conn = getConnection();

        if($conn != null)
        {
            try{
                $stmt = $conn->prepare("insert into tbl_admin values(:id,:pass,0,0)");
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':pass',$pass);
            $stmt->execute();
            echo "<script>alert('Admin Added')</script>";
            }catch(Exception $e)
            {
                echo "<script>alert('User already exists.')</script>";
            }
            //$result = $stmt->FetchAll();
            //return $result;
        }
    }

    function changePassword($id,$pass)
    {
        $conn = getConnection();

        if($conn != null)
        {
            $stmt = $conn->prepare("update tbl_admin set password=:pass where email=:id");
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':pass',$pass);
            $stmt->execute();
            //$result = $stmt->FetchAll();
            //return $result;
        }
    }

    function deleteUser($id)
    {
        $conn = getConnection();

        if($conn != null)
        {
            $stmt = $conn->prepare("delete from tbl_admin where email=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        }
    }
}

?>