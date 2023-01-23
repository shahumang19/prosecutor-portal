<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<link rel="stylesheet" href="css/graph.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
.txtStyle{
    float:right;
    margin-right:10px;
    margin-top:10px;
    text-align:right;
}
.chart {
  width: 100%; 
  min-height: 450px;
}
.row {
  margin:0 !important;
}
</style>

</head>
<body style="background-color:#efefef!important;">

<?php 

session_start();
if(!isset($_SESSION['username']))
{
    header("location:login/login.php");
}

require_once('sidebar-Admin.php');?>

<div class="w3-main" style="margin-left:200px">
<?php
require_once('classes/header.php');
require_once('classes/connection.php');

function getTotalUsers()
{
    $conn = getConnection();

        if($conn != null)
        {
            $query = "select count(pid) from prosecutor";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->FetchAll();
            return $result;
        }
}

function getOnlineUsers()
{
    $conn = getConnection();

        if($conn != null)
        {
            $query = "select count(pid) from prosecutor where logged_in=1";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->FetchAll();
            return $result;
        }
}

?>

<div class="w3-container">
<div class="floating-box"><img src='img/user.png' height='50px' width='50px'><span class='txtStyle'><?php echo getTotalUsers()[0][0] ?><br/>Total Users</span></div>
<div class="floating-box"><img src='img/user-online.png' height='50px' width='50px'><span class='txtStyle'><?php echo getOnlineUsers()[0][0] ?><br/>Online Users</span></div>
<!-- <div class="floating-box">10000 MBit<br/> Storage</div>
<div class="floating-box">10000 MBit<br/> Daily Visitors</div> -->
</div>

<div class="row">
<div class="col-md-6">
<?php
require_once('classes/citywiseGraph.php');
drawGraph();
?>
</div>
<div class="col-md-6" >
<?php
require_once('classes/yearwiseVoting.php');
drawGraph1();
?>
</div>
</div>
<br/>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
  
</body>
</html> 