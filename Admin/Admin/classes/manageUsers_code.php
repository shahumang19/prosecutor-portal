<?php

require_once("prosecutor.php");

$p = new Prosecutor();
$result = null;

if(isset($_POST['search']))
    {
        //echo "<script>alert('".$_POST['id']."');</script>";
        $param = $_POST['search_param'];
        if($param == 'Email')
        {
            $search = $_POST['x'];
            $GLOBALS['result'] = $p->findQuery($search,'email');
        }
        else if($param == 'Name')
        {
            $search = $_POST['x'];
            $GLOBALS['result'] = $p->findQuery($search,'firstname');
        }
        else if($param == 'Address')
        {
            $search = $_POST['x'];
            $GLOBALS['result'] = $p->findQuery($search,'address');
        }
        else if($param == 'City')
        {
            $search = $_POST['x'];
            $GLOBALS['result'] = $p->findQuery($search,'city');
        }
        else
        {
            $search = $_POST['x'];
            $GLOBALS['result'] = $p->findQuery($search,'courtname');
        }
    }
    else
    {
        $GLOBALS['result'] = $p->getProsecutors();
    }

if(isset($_POST['remove']))
{
    //echo "<script>alert('".$_POST['id']."');</script>";
    $id =  $_POST['id'];
    $p->del($id);
}

if(isset($_POST['approve']))
{
    $id =  $_POST['id'];
    $p->approveProsecutors($id);
    echo "<script>alert('Request approved');</script>";
}

if(isset($_POST['reject']))
{
    $id =  $_POST['id'];
    $p->rejectProsecutors($id);
    echo "<script>alert('Request rejected');</script>";
}

if(isset($_POST['reset']))
{
    $id =  $_POST['id'];
    $p->resetPass($id);
    echo "<script>alert('Password changed');</script>";
}

if(isset($_POST['edit']))
{
    //echo "<script>alert('".$_POST['checkImg']."');</script>";
    $p = new Prosecutor();
    if($_POST['checkImg']=='1')
    {
        $r = saveImage($_FILES["img"]);
        if($r == 2)
        {
            echo "<script>alert('File is not an Image');</script>";
            return;
        }
        else
        {
            $p->setPhoto("img/prosecutors/".$_FILES["img"]["name"]);
        }
    }
    else
    {
        $p->setPhoto($_POST['imgg']);
    }
    
    $p->setID($_POST["id"]);
    //echo "<script>alert('".$_POST["fname"].",".$_POST["lname"]."');</script>";
    $p->setName($_POST["fname"],$_POST["lname"]);
    //echo "<script>alert('".$p->getName()."');</script>";
    $p->setEmail($_POST["email"]);
    //echo "<script>alert('".$p->getEmail()."');</script>";
    $p->setMobile($_POST["mobile"]);
    //echo "<script>alert('".$p->getMobile()."');</script>";
    $p->setAddress($_POST["address"],$_POST["city"]);
    //echo "<script>alert('".$p->getAddress()."');</script>";
    $p->setCourtname($_POST["cname"]);
    //echo "<script>alert('".$_POST["cname"]."');</script>";
    //echo "<script>alert('".$p->getCourtname()."');</script>";
    $p->adminEdit();
    
    echo "<script>alert('Data has been updated.');</script>";
}

function saveImage($FILE)
    {
        //Image transfer code
        $check = getimagesize($FILE["tmp_name"]);
        $ss = "<script>";$es="</script>";
        //$check = true;

        if($check !== false) {
            //echo "File is an image - ".$_FILES["img"]["name"] ;//. $check["mime"] . ".";
            if (move_uploaded_file($FILE["tmp_name"],"img/prosecutors/".$FILE["name"])){
                
                return 1;
                
            } else {
                return 0;
            }
            $uploadOk = 1;
        } else {
            return 2;
            //exit(0);
        }
    }

?>