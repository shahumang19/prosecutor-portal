<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<link rel="stylesheet" href="css/table.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="script/search_script.js"></script>

<style>
.hiddencss
{
	width : 100%;
	display : none;
}
</style>

<script>
$(document).ready(function(){
  //alert(1);
  $(".hiddencss").hide();
});
function edit1(c)
{
	//$name= $(this).parent().parent().parent().css("background-color", "red");
	//alert('add : '+c);
	//alert($msg+" : "+$lbl);
  $("#check"+c).val('0');
	$("#1"+c).toggle();
	$("#2"+c).toggle();
	$("#up"+c).toggle();
	$("#ccl"+c).toggle();
  for($i=2;$i<=8;$i++)
  {
    $lbl = "#lbl"+$i+(c);
    $($lbl).toggle();
  }
  $("#img"+c).toggle();
  for($i=1;$i<=8;$i++)
  {
    $inp = "#inp"+$i+(c);
    $($inp).toggle();
  }
	return false;
}

function resetpas(c)
{
  if(confirm("Are you sure you want to reset password?")) {
        return true;
    } else {
			return false;
    }
}

function checkFile(c)
{
    //alert(c);
    $("#check"+c).val('1');
}

function del(c)
{
  var v = document.getElementById("pid"+c).value;
	if (confirm("Are you sure you want to delete prosecutor : "+v+" !")) {
        return true;
    } else {
			return false;
    }
}
</script>

</head>
<body style="background-color:#efefef!important;">

<?php require_once('sidebar-Admin.php');
      require_once('classes/manageUsers_code.php');
?>

<div class="w3-main" style="margin-left:200px">
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login/login.php");
}
require_once('classes/header.php');
?>

<!-- <div class="w3-container" >
<a href="#"><div class="floating-box"><img src="img/lawyer.png"><br/> Prosecutors<br/>1000</div></a>
<a href="#"><div class="floating-box"><img src="img/intern.png"><br/> Interns<br/>1000</div></a>
<a href="#"><div class="floating-box"><img src="img/guest.png"><br/> Guests<br/>1000</div></a>
</div> -->
<br/>

<div class="w3-container">
<div class="after-box" style="overflow-x:auto; width:100%;height:100%;padding-right:10px;color:black"><span style="color:white">Approve Prosecutors</span>
<br/><br/>
<table id="tab">
  <tr>
  <th>ID</th>
    <th>photo</th>
    <th>Name</th>
    <th>Email</th>
	<th>MobileNo.</th>
	<th>Address</th>
	<th>Court Name</th>
	<!-- <th>Position</th> -->
	<th>Approve</th>
	<th>Disapprove</th>
  </tr>
  <?php
  
  $rslt = $p-> getUnapprovedProsecutors();
  $cnt =1;
  foreach($rslt as $d)
  {
    echo "<tr><form action=\"manageUsers.php\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<td width=\"30px\"><label>".$d[0]."</label><input type=\"hidden\" name=\"id\" value=\"".$d[0]."\"/></td>";
    echo "<td width=\"30px\"><img src='$d[3]' height='70px' width='70px'></td>";
    echo "<td width=\"30px\"><label >".$d[1]." ".$d[2]."</label></td>";
    echo "<td width=\"30px\"><label >".$d[4]."</label><input type=\"hidden\" name=\"email\" value=\"".$d[4]."\"/></td>";
    echo "<td width=\"30px\"><label >".$d[5]."</label><input type=\"hidden\" name=\"mobile\" value=\"".$d[5]."\"/></td>";
    echo "<td width=\"30px\"><label >".$d[6]."<br/>$d[7]"."</label></td>";
    echo "<td width=\"30px\"><label >$d[8]</label></td>";
    // echo "<td width=\"30px\"><label >$d[9]</label></td>";
    echo "<td width=\"30px\"><button name=\"approve\" id=\"1\"><img src=\"img/right.png\" height=\"15px\" width=\"15px\"></button></td>";
    echo "<td width=\"30px\"><button name=\"reject\" id=\"2\"><img src=\"img/cancel.png\" height=\"15px\" width=\"15px\"></button></td>";
		echo "</form></tr>";
		$cnt++;
  }
?>
</table>
<br/><br/>
</div>
</div>
<br/>

<div class="w3-container" style="overflow-x:auto;">

<form action="" method='post' enctype='multipart/form-data'>
<div class="container" style="width:100%">
    <div class="row">    
        <div class="col-xs-10 col-xs-offset-1">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Email</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a id='dft' href="#Email">Email</a></li>
                      <li><a href="#Name">Name</a></li>
                      <li><a href="#Address">Address</a></li>
                      <li><a href="#City">City</a></li>
                      <li><a href="#Courtname">Courtname</a></li>
                      <!-- <li class="divider"></li> -->
                      <!-- <li><a href="#all">Anything</a></li> -->
                    </ul>
                </div>
                <input  type="hidden" name="search_param" value="all" id="search_param">         
				<input  type="text" class="form-control smallbar" id="sbar" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" id="sbtn" name='search' type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
	</div>
</div>
</form>
<br/>
<table id="tab">
  <tr>
  <th>ID</th>
    <th>photo</th>
    <th>Name</th>
    <th>Email</th>
	<th>MobileNo.</th>
	<th>Address</th>
	<th>Court Name</th>
	<th>Edit</th>
	<th>Remove</th>
  <th>Reset Password</th>
  </tr>
  <?php

  $cnt =1;
  foreach($result as $d)
  {
    echo "<tr><form action=\"manageUsers.php\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<input type=\"hidden\" id='check$cnt' name=\"checkImg\" value='0'/>";
    echo "<input type=\"hidden\" name=\"imgg\" value='$d[3]'/>";
    echo "<td width=\"30px\"><label id='lbl1$cnt'>".$d[0]."</label><input type=\"hidden\" name=\"id\" value=\"".$d[0]."\"/></td>";
    echo "<td width=\"30px\"><img id='img$cnt' name='img' src='$d[3]' height='70px' width='70px'><input onChange='checkFile($cnt);' type='file' id='inp1$cnt' class='hiddencss' name='img' value='".htmlentities($d[3])."'/></td>";
    echo "<td width=\"30px\"><label id='lbl3$cnt'>".$d[1]." ".$d[2]."</label><input id='inp2$cnt' type='text' class='hiddencss' name='fname' value='".htmlentities($d[1])."'/><input id='inp3$cnt' type='text' class='hiddencss' name='lname' value='".htmlentities($d[2])."'/></td>";
    echo "<td width=\"30px\"><label id='lbl4$cnt'>".$d[4]."</label><input id='inp4$cnt' type='text' class='hiddencss' name='email' value='".htmlentities($d[4])."'/></td>";
    echo "<td width=\"30px\"><label id='lbl5$cnt'>".$d[5]."</label><input id='inp5$cnt' class='hiddencss' type=\"text\" name=\"mobile\" value=\"".htmlentities($d[5])."\"/></td>";
    echo "<td width=\"30px\"><label id='lbl6$cnt'>".$d[6]."<br/>$d[7]"."</label><input type='text' id='inp6$cnt' class='hiddencss' name='address' value='".htmlentities($d[6])."'/><input type='text' id='inp7$cnt' class='hiddencss' name='city' value='".htmlentities($d[7])."'/></td>";
    echo "<td width=\"30px\"><label id='lbl7$cnt'>$d[8]</label><input type='text' id='inp8$cnt' class='hiddencss' name='cname' value='".htmlentities($d[8])."'/></td>";
    echo "<td width=\"30px\"><button type=submit name=\"edit\" onClick=\"return edit1(".$cnt.");\" id=\"1".$cnt."\"><img src=\"img/edit.png\" height=\"15px\" width=\"15px\"></button>".
			    "<button class=\"hiddencss\" type=submit name=\"edit\" id=\"up".$cnt."\"><img src=\"img/right.png\" height=\"15px\" width=\"15px\"></button></td>";
		echo "<td width=\"30px\"><button name=\"remove\" id=\"2".$cnt."\" onClick=\"return del(".$cnt.");\"><img src=\"img/remove.png\" height=\"15px\" width=\"15px\"></button>".
          "<button class=\"hiddencss\" type=submit name=\"edit\" onClick=\"return edit1(".$cnt.");\" id=\"ccl".$cnt."\"><img src=\"img/cancel.png\" height=\"15px\" width=\"15px\"></button></td>";
    echo "<td width=\"30px\"><button name=\"reset\" id=\"2".$cnt."\" onClick=\"return resetpas(".$cnt.");\"><img src=\"img/reset.png\" height=\"15px\" width=\"15px\"></button></td>";
		echo "</form></tr>";
			$cnt++;
  }
?>
  
</table>
</div>
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
<script src="script/manage_users.js"></script>
</html>