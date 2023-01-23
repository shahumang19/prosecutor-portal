<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">

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
?>

<div class="w3-container">
<br/><br/>
<form enctype='multipart/form-data' method="post" action="electionResult.php">
<select name='pos' style="width:200px;display:inline-block;margin-left:5px" required>
<?php
 require_once('classes/connection.php');
 require_once('classes/positions.php');

		$p = new Position();
					$result = $p->getPositions();
					foreach($result as $d)
					{
							echo "<option value='$d[0]'>$d[1]</option>";
                    }
			?>
		</select>
        <button type="submit" name='change' text="change" style="margin-left:10px;padding: 0px 24px;">Go</button>

        <button type="submit" name='postrslt' text="Post Result" style="margin-left:10px;padding: 0px 24px;">Post Result</button>

<br/><br/>
<?php
require_once('classes/graph.php');

if(isset($_POST['change']))
{
    setTemp($_POST['pos']);
    drawGraph();
}
else
{
    drawGraph();
}

if(isset($_POST['postrslt']))
{
    $conn= getConnection();
    $stmt = $conn->prepare("update election set status=1 where status=0");
    $stmt->execute();
    echo "<script>alert('Result Posted')</script>";
}

?>
</div>
</form>
<br/><br/>
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
