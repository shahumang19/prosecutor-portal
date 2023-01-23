<?php
// require_once('classes/conection.php');
// require_once('classes/FAQs_code.php');
$obj = new FAQs();

    if(isset($_POST['add'])){
        echo"<script>alert('Question added sucessfully!');</script>";
        $id = $_POST['id'];
        $question = $_POST['question'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('m/d/y',time());
        $time = date('h:i:s',time());
        // echo"<script>alert('".$date."')</script>";
        $obj->addQuestion($id,$question,$date,$time);
       
        // echo"<script>alert(2)</script>";
    }

    if(isset($_POST['search']))
{
//echo "<script>alert('".$_POST['id']."');</script>";
$param = $_POST['search_param'];
if($param == 'Question')
{
    
$search = $_POST['x'];
$result = $obj->findRecordByTitle($search);
}
else if($param == 'News')
{
$search = $_POST['x'];
$result = $obj->findRecordByNews($search);
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
$result = $obj->displayQuestion();
}

?>