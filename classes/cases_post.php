<?php
require_once('classes/cases_code.php');
$obj = new Cases();
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $judgement = $_POST['judgement'];
    $detail = $_POST['case'];
    $visible = "1";
    $obj->updateMyCases($title,$visible,$judgement,$detail,$id);
    echo "<script>alert('case updated Successfully!');</script>";
}

if(isset($_POST['delete']))
{
    
    $id = $_POST['id'];
    $obj->deleteMyCases($id);
    echo"<script>alert('case deleted Successfully!');</script>";
}
if(isset($_POST['add']))
{
    $pid = $_POST['id'];
    $title = $_POST['title'];
    $judgement = $_POST['judgement'];
    $detail = $_POST['case'];
    $visible = $_POST['visible'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $obj->addcases($title,$pid,$detail,$visible,$date,$time,$judgement);
    echo"<script>alert('new case added successfully');</script>";
}
if(isset($_POST['search'])){

        //echo "<script>alert('".$_POST['id']."');</script>";
        $param = $_POST['search_param'];
        if($param == 'Title')
        {
            $search = $_POST['x'];
            $result = $obj->findRecordByTitle($search);
        }
        else if($param == 'News')
        {
            $search = $_POST['x'];
            $result = $obj->findRecordByCases($search);
        }
        else
        {
            $from = $_POST['fromd'];
            $to = $_POST['tod'];
            $result = $obj->findRecordByDate($from,$to);
        }
}
else
{
        $result = $obj->viewCases();
}

?>