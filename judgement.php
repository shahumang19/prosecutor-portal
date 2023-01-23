<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/search-bar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="script/search_script.js"></script>

<style>
.styled-select {
   background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
   height: 29px;
   overflow: hidden;
   width: 240px;
}

.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 268px;
}

.styled-select.slate {
   background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
   height: 34px;
   width: 240px;
}

.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}

/* -------------------- Rounded Corners */
.rounded {
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
}

.semi-square {
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border-radius: 5px;
}

/* -------------------- Colors: Background */
.slate   { background-color: #ddd; }
.green   { background-color: #779126; }
.blue    { background-color: #3b8ec2; }
.yellow  { background-color: #eec111; }
.black   { background-color: #000; }

/* -------------------- Colors: Text */
.slate select   { color: #000; }
.green select   { color: #fff; }
.blue select    { color: #fff; }
.yellow select  { color: #000; }
.black select   { color: #fff; }


/* -------------------- Select Box Styles: danielneumann.com Method */
/* -------------------- Source: http://danielneumann.com/blog/how-to-style-dropdown-with-css-only/ */
#mainselection select {
   border: 0;
   color: #EEE;
   background: transparent;
   font-size: 20px;
   font-weight: bold;
   padding: 2px 10px;
   width: 378px;
   *width: 350px;
   *background: #58B14C;
   -webkit-appearance: none;
}

#mainselection {
   overflow:hidden;
   width:350px;
   -moz-border-radius: 9px 9px 9px 9px;
   -webkit-border-radius: 9px 9px 9px 9px;
   border-radius: 9px 9px 9px 9px;
   box-shadow: 1px 1px 11px #330033;
   background: #58B14C url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
}


/* -------------------- Select Box Styles: stackoverflow.com Method */
/* -------------------- Source: http://stackoverflow.com/a/5809186 */
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}

select#soflow-color {
   color: #fff;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: #779126;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}
.container {
  width: 100%;
  background: #eee;
  margin: 10px auto;
  position: relative;
  text-align:center;
  
}

.block {
  background: #00303f;
  color : white;
  height: 100px;
  width: 100px;
  display:inline-block;
  margin: 10px;
  vertical-align:middle;
}

.sbox{
	background-color:white;
	width:95%;
	height : auto;
	margin: 10px;
	padding-top : 10px;
	padding-left : 10px;
	padding-right : 20px;
	word-wrap: break-word;
}

.sbox img{
	float : right;
	padding-right:20px;
	height : 20px;
	width : 40px;
	margin-top:10px;
}

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

</head>
<body style="background-color:#efefef!important;">

<?php 
 require_once('sidebar.php');
$selection="select * from judgement";
 
?>

<div class="w3-main" style="margin-left:200px">
<div class="w3-teal" style="background-color:#00303f!Important;">
  <button class="w3-button w3-teal w3-xlarge w3-hide-large clr" style="background-color:#00303f!Important;" onclick="w3_open()">&#9776;</button>
  <div class="w3-container" style="background:white; color:#00303f;">
    <h1>My Page</h1>
  </div>
</div>
   
<div class="w3-container" >
		<br/><br/>
		 <!-- ------- search panel ----- -->


		<br/><br/>
		
	 <div class="w3-container" style="background-color:#00303f;margin:10px;border-radius:10px;">
<table border='0'>
<form action="judgement.php" method="post" enctype="multipart/form-data">
	<tr>
			<td style="color:white;">Appellant: </td>
			<td><input  name="appellant"  type='text' style="margin-top:10px;width:100%;margin-left:-60px;border-radius:10px;"/></td>

	</tr>
	<tr>
			<td style="color:white;"> Respondent: </td>
			<td><input name="respondent" type='text' style="margin-top:10px;width:100%;margin-left:-60px;border-radius:10px;"/></td>

	</tr>
	<tr>
			<td style="color:white;">Mode of Citation:</td>
			<td><input name="citation" type='text' style="margin-top:10px;width:100%;margin-left:-60px;border-radius:10px;"/></td>

	</tr>
	<tr>
			<td style="color:white;">Act: </td>
			<td> 
		 <input type="checkbox" name="act[]" value="IPC"><span style="color: white;">IPC</span>&nbsp&nbsp
         <input type="checkbox" name="act[]" value="CRPC"><span style="color: white;">CRCP</span>&nbsp&nbsp
         <input type="checkbox" name="act[]" value="Criminal" ><span style="color: white;">Criminal</span>&nbsp&nbsp
         <input type="checkbox" name="act[]" value="Evidence Act"><span style="color: white;">Evidence act</span>&nbsp&nbsp
		 <input type="checkbox" name="act[]" value="IT act"><span style="color: white;">IT act</span>&nbsp&nbsp
		 <input type="checkbox" name="act[]" value="Arms Act"><span style="color: white;">Arms Act</span>&nbsp&nbsp
		 <input type="checkbox" name="act[]" value="Others"><span style="color: white;">Others</span>&nbsp&nbsp
      </select></td>

	</tr>
	<tr>
			<td style="color:white;">Section no:</td>
			<td><input  type='text' name="section" style="margin-top:10px;width:100%;margin-left:-60px;border-radius:10px;"/></td>

	</tr>
			
	<tr>
		<td>
		<label  style="width:20px; margin-top:10px;color:white;">Details: </label>
		</td>
		<td>
			<br/><textarea name="details" id="msg" class="textinput" rows="10" cols="100%" style="border-radius:15px;padding-right:40px;margin-top:0px;margin-left:-60px;"></textarea>
		</td>
	<br/>
	</tr>
	<tr>
		<td >
			<button name="add" type="submit"  id="add" style="margin-left:120px;margin-top:10px;width:100%;color:white;background-color:#00303f;border-radius:15px;">Add Judgement</button>
		
		</td>
	</tr>
</form>
<?php
	
	if(isset($_POST['add']))
	{
		require_once('classes\judgementCode.php');
		$j=new Judgement();
		$appelant=$_POST['appellant'];
		$respondent=$_POST['respondent'];
		$citation=$_POST['citation'];
	    $act="";
		$section=$_POST['section'];
		$details=$_POST['details'];
		foreach($_POST['act'] as $name)
		{
			$act.=" ".$name;
		}		
		$j->add($appelant,$respondent,$citation,$act,$section,$details);
		
		
	}
 ?>
</table>
</div>
		<form action="" method='post' enctype='multipart/form-data'>
<div class="container" style="width:100%">
    <div class="row">    
        <div class="col-xs-10 col-xs-offset-1">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                  
					<select style="color:black;background-color:white;" name="searched" class="styled-select blue semi-square" >
					<option disabled selected> Filter </option>
					  <option>Section</option>
					  <option>Acts</option>
					  <option>Appellant</option>
					  <option>Respondent</option>
					  <option>Citation</option>
					  <option>Details</option>
					</select>
                </div>
                     
                <input  type="text" class="form-control smallbar" id="sbar" name="searching" placeholder="Search term...">
                <input style=" width:50% !important;" type="date" class="form-control smallbar" id='from' name="fromd" placeholder="From">
               <span class="input-group-btn">
                    <button class="btn btn-default" style="width:70px; height:35px;" id="sbtn" name='search' type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
</div>
</form>
		
<?php
	if(isset($_POST['search']))
	{
		$selection="select * from judgement where ".$_POST['searched']." like "."'%".$_POST['searching']."%'";
	}
?>
	 <!-- <form action="" method="post" style="margin:auto;max-width:500px"> -->
		<!-- <select name="personal" style="width:200px;display:inline-block;float:right;margin-right:50px;"> -->
		  <!-- <option value="volvo">All</option> -->
		  <!-- <option value="saab">My judgements</option> -->
		<!-- </select> -->
		 <!-- <button type="submit" name="psearch"><img src="search.png" width="25%"/></button> -->
		<!-- </form> -->
<?php
	if(isset($_POST['psearch']))
	{
		if($_POST['personal']=="saab")
		{
			$selection="select * from judgement where pid in (select pid from prosecutor where username='jayjoshi.551@gmail.com')";
		}
	}
	
?>
		<br/><br/>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
		<div class="block"><input type="submit" name="all" value="All"></div>
        <div class="block"><input type="submit" name="crpc" value="CRPC"></div><!--
     --><div class="block"><input type="submit" name="ipc" value="IPC"></div><!--
     --><div class="block"><input type="submit" name="evidence" value="Evidence Act"></div><!--
     --><div class="block"><input type="submit" name="it" value="IT Act"></div><!--
     --><div class="block"><input type="submit" name="arm" value="Arms Act"></div><!--
     --><div class="block"><input type="submit" name="criminal" value="Criminal Trial"></div><!--
    <div class="block"><input type="submit" name="other" value="Other"></div> -->
	 </div>
	 </form>
 <?php 
	if(isset($_POST['crpc']))
	{
		$selection="select * from judgement where acts like '%CRPC%' ";
	}
	if(isset($_POST['ipc']))
	{
		$selection="select * from judgement where acts like '%IPC%' ";
	}
	if(isset($_POST['evidence']))
	{
		$selection="select * from judgement where acts like '%Evidence Act%' ";
	}
	if(isset($_POST['it']))
	{
		$selection="select * from judgement where acts like '%IT Act%' ";
	}
	if(isset($_POST['arm']))
	{
		$selection="select * from judgement where acts like '%Arms Act%' ";
	}
	if(isset($_POST['criminal']))
	{
		$selection="select * from judgement where acts like '%Criminal%' ";
	}
?>
<table id="tab">
  <tr>
    <th>Id</th>
    <th>Appellant</th>
    <th>Respondent</th>
	<th>Mode of Citation</th>
	<th>Acts</th>
	<th>Section</th>
	<th>Details</th>
	<th>Edit</th>
	<th>Remove</th>
  </tr>
  
	<?php
	require_once('classes/Judgementcode.php');
	$j=new Judgement();
	$result=$j->getJudgements($selection);
	$cnt=1;
	foreach($result as $d)
	{
		
			echo "<tr><form action=\"judgement.php\" method=\"post\" enctype=\"multipart/form-data\">
			<td width=\"30px\">
				<label >".$d[0]."</label>
				<input type=\"hidden\" name=\"id\" value=\"".$d[0]."\"/>
			</td>
			<td width=\"100px\">
				<label class=\"lbl".$d[0]."\">".$d[2]."</label>
				<input type=\"hidden\" name=\"appellant\" value=\"".$d[2]."\"/>
				<input type=\"text\" style=\"display:none;\" name=\"app\" class=\"1".$d[0]."\" value=\"".htmlentities($d[2])."\"/>				
			</td>
			<td>
				<label class=\"lbl".$d[0]."\">".$d[3]."</label>
				<input type=\"hidden\" name=\"respondent\" value=\"".$d[3]."\"/>
				<input type=\"text\" style=\"display:none;\" name=\"res\" class=\"1".$d[0]."\" value=\"".htmlentities($d[3])."\"/>				
			</td>
			<td>
				<label class=\"lbl".$d[0]."\" id=\"tl".$cnt."\">".$d[4]."</label>
				<input type=\"hidden\" name=\"Citation\" value=\"".$d[4]."\"/>
				
				<input type=\"text\" style=\"display:none;\" name=\"citation\" class=\"1".$d[0]."\" value=\"".htmlentities($d[4])."\"/>				
			</td>
			<td>
				<label class=\"lbl".$d[0]."\">".htmlentities($d[5])."</label>
				<input type=\"hidden\" name=\"msg\" value=\"".htmlentities($d[5])."\"/>
				
				<input type=\"text\" style=\"display:none;\" name=\"act\" class=\"1".$d[0]."\" value=\"".htmlentities($d[5])."\"/>				
			</td>
			<td>
				<label class=\"lbl".$d[0]."\">".htmlentities($d[6])."</label>
				<input type=\"hidden\" name=\"msg\" value=\"".htmlentities($d[6])."\"/>
				
				<input type=\"text\" style=\"display:none;\" name=\"section\" class=\"1".$d[0]."\" value=\"".htmlentities($d[6])."\"/>				
			</td>
			<td>
				<label class=\"lbl".$d[0]."\">".htmlentities($d[7])."</label>
				<input type=\"hidden\" name=\"msg\" value=\"".htmlentities($d[7])."\"/>
				
				<input type=\"text\" style=\"display:none;\" name=\"details\" class=\"1".$d[0]."\" value=\"".htmlentities($d[7])."\"/>				
			</td>
			<td>
				<button type=\"submit\" name=\"edit\" onClick=\"return edit1(".$d[0].");\" id=\"e".$d[0]."\">
				<img src=\"img/edit.png\" height=\"15px\" width=\"15px\"></button>
				 <button class=\"hiddencss\" type=submit name=\"edit\" id=\"up".$d[0]."\">
				 <img src=\"img/right.png\" height=\"15px\" width=\"15px\"></button>
			</td>
			<td>
				<button name=\"remove\" id=\"del".$d[0]."\" onClick=\"return del(".$d[0].");\"><img src=\"img/remove.png\" height=\"15px\" width=\"15px\"></button>
				<button class=\"hiddencss\" type=submit name=\"edit\" onClick=\"return edit1(".$d[0].");\" id=\"cncl".$d[0]."\"><img src=\"img/cancel.png\" height=\"15px\" width=\"15px\"></button>
			</td>
			</form></tr>";
			$cnt++;
	}

	?>
	<?php
		if(isset($_POST['edit'])){
			$appelant = $_POST['app'];
			$respondent = $_POST['res'];
			$citation = $_POST['citation'];
			$act = $_POST['act'];
			$section = $_POST['section'];
			$details = $_POST['details'];
			$id = $_POST['id'];
			$j->edit($appelant,$respondent,$citation,$act,$section,$details,$id);
		}
		if(isset($_POST['remove'])){
			$id = $_POST['id'];
			$j->del($id);
		}
	?>
	<br/><br/><br/><br/>
<script>
function edit1(c)
{
	$(".1"+c).toggle();
	$(".lbl"+c).toggle();
	$("#e"+c).toggle();
	$("#up"+c).toggle();
	$("#cncl"+c).toggle();
	$("#del"+c).toggle();
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
