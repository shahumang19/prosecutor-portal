<?php

require_once('connection.php');
require_once('positions.php');
require_once('candidates.php');

$c = new Candidate();

if(isset($_POST['addDate']))
{
    //echo "<script>alert('".$_POST['edate']."');</script>";
    $conn = getConnection();
    if($conn != null)
    {
        $stmt = $conn->prepare("insert into election(edate,status) values(:edate,0);");
        $stmt->bindParam(":edate",$_POST['edate']);
        $stmt->execute();
    }
}

if(isset($_POST['EditDate']))
{
    //echo "<script>alert('".$_POST['edate']." ".$_POST['eid']."');</script>";
    $conn = getConnection();
    if($conn != null)
    {
        $stmt = $conn->prepare("update election set edate=:edate where eid=:eid;");
        $stmt->bindParam(":edate",$_POST['edate']);
        $stmt->bindParam(":eid",$_POST['eid']);
        $stmt->execute();
    }
}

if(isset($_POST['del']))
{
    echo "<script>alert('".$_POST['edate']." ".$_POST['eid']."');</script>";
    $conn = getConnection();
    if($conn != null)
    {
        $stmt = $conn->prepare("delete from election where eid=:eid;");
        //$stmt->bindParam(":edate",$_POST['edate']);
        $stmt->bindParam(":eid",$_POST['eid']);
        $stmt->execute();
    }
}

function getData()
{
    $conn = getConnection();
    if($conn != null)
    {
        $stmt = $conn->prepare("select * from election where status=0;");
        //$stmt->bindParam(":edate",$_POST['edate']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($stmt->rowCount() > 0)
        {
            foreach($result as $d)
            {
                //echo "<label style='color:white;margin-left:10px;'>The Election is scheduled on $d[1] </label>";
                echo "<form action='voting_module.php' method='post' enctype='multipart/form-data'>
                        <input type='hidden' id='edate' name='eid' value='$d[0]'/>
                        <label id='lbl1' style='color:white;margin-left:10px;'>The Election is scheduled on $d[1] </label>
                        <input type='date' id='eldate' class='hiddencss' name='edate' style='margin-left:10px' required></input>
                        <button type='submit' id='editdt' onClick='return edit1()' text='Add' style='margin-left:10px;padding: 0px 24px;'>Edit</button>
                        <button type='submit' class='hiddencss' id='up' onClick='edit1()' name='EditDate' text='Add' style='margin-left:10px;padding: 0px 24px;'>Upload</button>
                        <button type='button' class='hiddencss' id='ccl' onClick='edit1()' text='Add' style='margin-left:10px;padding: 0px 24px;'>Cancel</button>
                        <button type='submit' id='delete' name='del' onClick='del()' text='Add' style='margin-left:10px;padding: 0px 24px;'>Delete</button>
                        </form>";
            }
        }
        else
        {
            echo "<form action='voting_module.php' method='post' enctype='multipart/form-data'>
            <label style='color:white;margin-left:10px;'>Add schedule : </label>
            <input type='date' name='edate' style='margin-left:10px' required></input>
            <button type='submit' name='addDate' text='Add' style='margin-left:10px;padding: 0px 24px;'>Add</button>
            </form>";
        }
    }
}

function getCandidateData()
{
    $c = new Candidate();
    $result = $c->getCandidates();
    foreach($result as $d)
    {
        echo    "<tr><form action='voting_module.php' method='post' enctype='multipart/form-data'>
		        <td>$d[0]<input type='hidden' name='cid' value='$d[0]'></td>
                <td><img src='$d[1]' height='70px' width='70px'></td>
                <td>$d[2] $d[3]</td>
                <td>$d[4]</td>
	            <td>".$d[5]."</td>
	            <td><button name=\"remove\" id=\"2\" onClick=\"return del('".$d[2]." ".$d[3]."');\"><img src=\"img/remove.png\" height=\"15px\" width=\"15px\"></button></td>
                </form></tr>";
    }
}

if(isset($_POST['addCan']))
{
    //echo "<script>alert('".$_POST['pos']."');</script>";
    $c->addCandidates($_POST['mail'],$_POST['pos'],$_POST['desc']);
    //echo "<script>alert('".$_POST['pos']."');</script>";
}

if(isset($_POST['remove']))
{
    //echo "<script>alert('".$_POST['pos']."');</script>";
    $c->deleteCandidates($_POST['cid']);
    //echo "<script>alert('".$_POST['pos']."');</script>";
}


?>