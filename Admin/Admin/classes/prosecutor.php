<?php

require_once("connection.php");

class Prosecutor
{
    public $pid,$firstname,$surname,$photo,$email,$mobile;
    public $username,$password,$address,$city,$courtname,$posid,$logged_in,$verified,$tid;

    function setID($id)
    {
        $this->pid = $id;
    }

    function getID()
    {
        return $this->pid;
    }

    function setName($fname,$lname)
    {
        $this->firstname = $fname;
        $this->surname = $lname;
    }

    function getName()
    {
        return $this->firstname." ".$this->surname;
    }

    function setPhoto($pic)
    {
        $this->photo = $pic;
    }

    function getPhoto()
    {
        return $this->photo;
    }

    function setEmail($mail)
    {
        $this->email = $mail;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setMobile($phone)
    {
        $this->mobile = $phone;
    }

    function getMobile()
    {
        return $this->mobile;
    }

    function setAddress($add,$ct)
    {
        $this->address = $add;
        $this->city = $ct;
    }

    function getAddress()
    {
        return $this->address." ".$this->city;
    }

    function setCourtname($cname)
    {
        $this->courtname = $cname;
    }

    function getCourtname()
    {
        return $this->courtname;
    }

    function getProsecutors()
    {
        $conn = getConnection();

        if($conn != null)
        {
            $query = "select pid,firstname,surname,photo,email,mobile,address,city,courtname,position.name from prosecutor".
                     " left join position on position_id = posid where verified=1";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->FetchAll();
            return $result;
        }
    }

    function getUnapprovedProsecutors()
    {
        $conn = getConnection();

        if($conn != null)
        {
            $query = "select pid,firstname,surname,photo,email,mobile,address,city,courtname,position.name from prosecutor".
                     " left join position on position_id = posid where verified=0";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->FetchAll();
            return $result;
        }
    }

    function del($id)
    {
        $conn = getConnection();
        if($conn != null)
        {
            // $stmt = $conn->prepare("delete from pec_ where username=(select email from prosecutor where pid=:id)");
            // $stmt->bindParam(':id',$id);
            // $stmt->execute();
            $stmt = $conn->prepare("delete from pec_users where username=(select email from prosecutor where pid=:id)");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $stmt = $conn->prepare("delete from prosecutor where pid=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            
        }
    }

    function approveProsecutors($id)
    {
        $conn = getConnection();
        if($conn != null)
        {
            $stmt = $conn->prepare("update prosecutor set verified=1 where pid=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        }
    }

    function rejectProsecutors($id)
    {
        $conn = getConnection();
        if($conn != null)
        {
            $stmt = $conn->prepare("delete from prosecutor where pid=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        }
    }

    function resetPass($id)
    {
        $conn = getConnection();

        if($conn != null)
        {
            $pass = crypt("12345",'st');
            $stmt = $conn->prepare("update prosecutor set password=:pass where pid=:id");
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':pass',$pass);
            $stmt->execute();
        }
    }

    function findQuery($search,$field)
    {
        //echo "<script>alert('$search : $field')</script>";
        $conn = getConnection();
                $search = "%$search%";
                if($conn != null)
                {
                    $query = "select * from prosecutor where $field like :src";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':src',$search);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
    }

    function adminEdit()
    {
            $conn = getConnection();
            //echo "<script>alert('0');</script>";
                if($conn != null)
                {
                    //$query = "update prosecutor set firstname=:fname where pid=:prid";
                    $query = "update prosecutor set firstname=:fname,surname=:surname,photo=:photo,email=:email".
                    ",mobile=:mobile,address=:address,city=:city,courtname=:courtname where pid=:prid";            
                    //echo "<script>alert('$this->firstname');</script>";
                    //echo "<script>alert('$this->pid');</script>";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':prid',$this->pid);
                    $stmt->bindParam(':fname',$this->firstname);
                    $stmt->bindParam(':surname',$this->surname);
                    $stmt->bindParam(':photo',$this->photo);
                    $stmt->bindParam(':email',$this->email);
                    $stmt->bindParam(':mobile',$this->mobile);
                    $stmt->bindParam(':address',$this->address);
                    $stmt->bindParam(':city',$this->city);
                    $stmt->bindParam(':courtname',$this->courtname);
                    $stmt->execute();
                }
    }
        
}

?>