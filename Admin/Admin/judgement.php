<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/box.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/search-bar.css">
<style>

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

</style>

</head>
<body style="background-color:#efefef!important;">

<?php require_once('sidebar-Admin.php');
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

				<div>
                <form class="example" action="/action_page.php" style="margin:auto;max-width:500px">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><img src="search.png" width="25%"></img></button>
                </form>
                </div>
		<br/><br/>
		
		<select style="width:200px;display:inline-block;float:right;margin-right:50px;">
		  <option value="saab" selected disabled>Uploaded by</option>
		  <option value="volvo">All</option>
		  <option value="saab">My judgements</option>
		</select>
		
		<br/><br/>
		<div class="container">
		<div class="block">All</div>
        <div class="block">CRPC</div><!--
     --><div class="block">IPC</div><!--
     --><div class="block">Evidence Act</div><!--
     --><div class="block">IT Act</div><!--
     --><div class="block">Arms Act</div><!--
     --><div class="block">Criminal Trial</div><!--
     --><div class="block">Other</div>
</div>
		<br/><br/>
		<div class="sbox"><h6 style="color:grey;">Date : 2-2-2018   Views : 23    Downloads : 50 Uploaded by : Raman Category : CRPC</h6><h4>
			<p><a href="#">CRPC Judgement</a><img src="img/down.png"></p></h4><br/>
		</div>
		<div class="sbox"><h6 style="color:grey;">Date : 2-2-2018   Views : 23    Downloads : 50 Uploaded by : Umang Category : IPC</h6><h4>
			<p><a href="#">IPC Judgement</a><img src="img/remove.png"><img src="img/edit.png"><img src="img/down.png"></p></h4><br/>
		</div>
</div>
   
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
