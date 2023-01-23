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

.textinput {
  float:left;
  width: 100%;
  min-height: 35px;
  outline: none;
  resize: none;
  border: 1px solid #f0f0f0;
}

.hiddencss
{
	width : 100%;
	display : none;
}

@media  screen and (max-width:600px){
	input[type = text]{
		width:100px;
	}
}

</style>
<script>



function edit1(c)
{
	//$name= $(this).parent().parent().parent().css("background-color", "red");
	//alert('add : '+c);
	$msg = "#msg"+c;
	$lbl = "#lbl"+c;
	//alert($msg+" : "+$lbl);
	$("#1"+c).toggle();
	$("#2"+c).toggle();
	$("#ttl1"+c).toggle();
	$("#tl1"+c).toggle();
	$(".tit"+c).toggle();
	$($msg).toggle();
	$($lbl).toggle();
	$("#up"+c).toggle();
	$("#ccl"+c).toggle();
	return false;
}

function del(c)
{
	if (confirm("Are you sure you want to delete message id : "+c+" !")) {
        return true;
    } else {
			return false;
    }
}

		// $(document).ready(function(){
		// 	$("#add").click(function(){
		// 			//alert('add');
		// 			// $msg = $("#msg").val();
		// 			// //alert($msg);
		// 			// var data = {'action' : 'add','msg' : $msg};
		// 			// $.post('classes/manage_news_code.php',data);
		// 	});
		// 	$("#1").click(function(){
		// 		//$name= $(this).parent().prev().attr("id");
		// 		alert('add');
		// 		//$("#msg1").show();
		// 		//$("#lbl").hide();
		// 		//return false;
		// 	});
		// 	$("#2").click(function(){
		// 		alert('add');
		// 	});
		// });
</script>


</head>
<body style="background-color:#efefef!important;">

<?php require_once('sidebar-Admin.php');?>

<div class="w3-main" style="margin-left:200px">

<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login/login.php");
}
require_once('classes/header.php');
?>

<br/>
<div class="w3-container" style="background-color:#00303f;margin:10px;border-radius:10px;">
<table border='0'>
<form action="manage_news.php" method="post" enctype="multipart/form-data">
	<tr>
			<td style="color:white;">Title: </td>
			<td><input name='ttl' type='text' style="margin-top:10px;width:100%;margin-left:-60px;border-radius:10px;"/></td>
	</tr>
	<tr>
		<td>
		<label  style="width:20px; margin-top:10px;color:white;">News: </label>
		</td>
		<td>
			<br/><textarea name="msg" id="msg" class="textinput" rows="10" cols="100%" style="border-radius:15px;padding-right:40px;margin-top:0px;margin-left:-60px;"></textarea>
		</td>
	<br/>
	</tr>
	<tr>
		<td >
			<button name="add" type="submit" id="add" style="margin-left:120px;margin-top:10px;width:100%;color:white;background-color:#00303f;border-radius:15px;">Add News</button>
		
		</td>
	</tr>
</form>
</table>
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
                    	<span id="search_concept">Title</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#Date">Date</a></li>
                      <li><a id='dft' href="#Title">Title</a></li>
                      <li><a href="#News">News</a></li>
                      <!-- <li class="divider"></li> -->
                      <!-- <li><a href="#all">Anything</a></li> -->
                    </ul>
                </div>
                <input  type="hidden" name="search_param" value="all" id="search_param">         
				<input  type="text" class="form-control smallbar" id="sbar" name="x" placeholder="Search term...">
				<input style=" width:50% !important;" type="date" class="form-control smallbar" id='from' name="fromd" placeholder="From">
				<input style=" width:50% !important;" type="date" class="form-control smallbar" id='to' name="tod" placeholder="To">
                <span class="input-group-btn">
                    <button class="btn btn-default" id="sbtn" name='search' type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
	</div>
</div>
</form>

<br/><br/>

<table id="tab">
  <tr>
    <th>Id</th>
    <th>Date</th>
    <th>Time</th>
	<th>Title</th>
	<th>News</th>
	<th>Edit</th>
	<th>Remove</th>
  </tr>
  
	<?php
	require_once('classes/manage_news_code.php');
	 
	$cnt =1;
	foreach($result as $d)
	{
		
			echo "<tr><form action=\"manage_news.php\" method=\"post\" enctype=\"multipart/form-data\">";
			echo "<td width=\"30px\"><label>".$d[0]."</label><input type=\"hidden\" name=\"id\" value=\"".$d[0]."\"/></td>";
			echo "<td width=\"100px\"><label>".$d[1]."</label><input type=\"hidden\" name=\"date\" value=\"".$d[1]."\"/></td>";
			echo "<td><label>".$d[2]."</label><input type=\"hidden\" name=\"time\" value=\"".$d[2]."\"/></td>";
			echo "<td><label class='tit$cnt' id=\"tl".$cnt."\">".$d[4]."</label><input type=\"hidden\" name=\"ttl\" value=\"".$d[4]."\"/>".
						"<input class=\"hiddencss\" type=\"text\" id=\"ttl1".$cnt."\" name=\"ttl1\" value=\"".htmlentities($d[4])."\"/></td>";
			echo "<td><label id=\"lbl".$cnt."\">".htmlentities($d[3])."</label><input type=\"hidden\" name=\"msg\" value=\"".htmlentities($d[3])."\"/>".
						"<input class=\"hiddencss\" type=\"text\" id=\"msg".$cnt."\" name=\"msg1\" value=\"".htmlentities($d[3])."\"/></td>";
			echo "<td><button type=submit name=\"edit\" onClick=\"return edit1(".$cnt.");\" id=\"1".$cnt."\"><img src=\"img/edit.png\" height=\"15px\" width=\"15px\"></button>".
			     "<button class=\"hiddencss\" type=submit name=\"edit\" id=\"up".$cnt."\"><img src=\"img/right.png\" height=\"15px\" width=\"15px\"></button></td>";
			echo "<td><button name=\"remove\" id=\"2".$cnt."\" onClick=\"return del(".$cnt.");\"><img src=\"img/remove.png\" height=\"15px\" width=\"15px\"></button>".
					 "<button class=\"hiddencss\" type=submit name=\"edit\" onClick=\"return edit1(".$cnt.");\" id=\"ccl".$cnt."\"><img src=\"img/cancel.png\" height=\"15px\" width=\"15px\"></button></td>";
			echo "</form></tr>";
			$cnt++;
	}
	?>
</table>
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