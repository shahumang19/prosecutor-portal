<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/navigation_bar.css">
	<link rel="stylesheet" href="css/side-nav.css">
	<link rel="stylesheet" href="css/cases.css">
	<link rel="stylesheet" href="temp.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="js/search.js"></script>

	
	<script>
		$(document).ready(function(){
			$("#vote").click(function(){
			
			});
			$(".collapse1").click(function(){
				//$(".content1").slideToggle("slow");
				var coll= $('.collapse1');
				

				var content = this.nextElementSibling;
				if (content.style.display === "block") {
					content.style.display = "none";
				} else {
					content.style.display = "block";
				}
	
			});
			$("#checked").click(function(){
				
				var element = this.nextElementSibling;
				if (document.getElementById('checked').checked) {
					element.style.display = "block";
				} else {
					element.style.display = "none";
				}
			});
			
			$(".add").click(function(){
				$(this).text(function(i,text){
				return text === "Cancel" ? "Add Cases" : "Cancel";
				})
				$("#display").toggle();
			});
		});
		
		function fun1()
		{
			
			var x = document.getElementById("voting");
			var y = document.getElementById("result");
			x.style.display = "block";
			y.style.display = "none";
		}
		
		function fun2()
		{
			
			var x = document.getElementById("voting");
			var y = document.getElementById("result");
			x.style.display = "none";
			y.style.display = "block";
		}
		
		var coll = document.getElementsByClassName("collapse");
			var i;

			for (i = 0; i < coll.length; i++) {
			
				coll[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var content = this.nextElementSibling;
					if (content.style.display === "block") {
						content.style.display = "none";
					} else {
						content.style.display = "block";
					}
				});
}
		
	</script>
	
	
</head>
<body style="background-color:#efefef">



<?php require_once('sidebar.php');
	require_once('classes/connection.php');
	require_once('classes/cases_code.php');
	require_once('classes/cases_post.php');
	session_start();
	if(!isset($_SESSION['username']))
{
    header("location:login/index.php");
}
	$username = $_SESSION['username'];
	$obj = new Cases();
	$pid = $obj->getPid($username);
	$mycase = $obj->viewMycases($pid[0][0]);
	// $viewcase = $obj->viewCases();
	
?>
<div class="w3-main" style="margin-left:200px">
	<?php
		require_once("classes/header.php");
	?>
	
	<div class="bground" > 
	<!-- <br/><br/><br/> -->
	<!-- <table> -->
	<!-- <tr> -->
	<!-- <td> -->
	<div class="row">
		<div class="col-md-2"></div>
			<div class="col-xs-5">
	<div class="circle " style="margin-top:80px;" onclick="scrollwin(0, 500);fun1();" id="vote">
		<img src="user.png" style="width:40%; margin-left:70px; margin-top:50px;"/>
		<h4 style="color:white; text-align:center;"> MY CASES</h4>
	</div>
</div>
	<!-- </td> -->
	<!-- <td> -->
		<div class="col-xs-5">
	<div class="circle " style="  margin-top:80px;" onclick="scrollwin(0, 500);fun2();">
		<img src="view.png" alt="" style="width:40%; margin-left:70px; margin-top:50px;" id="rslt"/>
		<h4 style="color:white; text-align:center;"> VIEW CASES </h4>
	</div>
</div>
	<!-- </td> -->
	<!-- </tr> -->
	<!-- </table> -->
	</div>
	</div>
	<br/><br/>
	
		<div id="voting" style="padding-bottom:500px;">
			
											<!-- add cases  -->
		<div class="bgcolour">
			<button class="add" value="Add case"> Add Case </button>
			<!-- <button class="add" style="display:none;"> Cancel </button> -->
			
		</div>		
				<div class="bgcolour" id="display" style="display:none;">
						
						<div class="card_view-body">
						<form action="cases.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $pid[0][0]?>"/>
							<label> <b>Title:</b></label><input name="title" type="text" placeholder=""><br/><br/>
						<label> Date:&nbsp; </label><input name="date" type="date"> &nbsp;&nbsp;
						<label> Time: &nbsp;</label><input name="time" type="time"><br/><br/>
						<label>Visibility: </label>
							<select name="visible">
							<option value="" disabled selected> visibility to other users </option>
							<option value="1"> visible to all </option>
							<option value="0"> visible to you only </option>
							</select>
						<br/><br/>
							<label> Entre Case details: </label> <div> <textarea name="case" rows="5" cols="80" ></textarea></div><br/>
							<input type="checkbox" id="checked" > Contains judgement? 
							<textarea name="judgement" rows="5" cols="80" placeholder="Enter judgement..." style="display:none;"></textarea>
							<br/><br/>
							<button name="add" >&nbsp;Add&nbsp;</button>
						
						
						</div>
						<!-- <div class="card_view-footer">
						<p> this is the footer part of the content</p>
						</div> -->
						</form>
				</div>
											<!--  view my cases  -->
				<?php 
					foreach($mycase as $case){
						echo "<form action=\"cases.php\" method=\"post\" enctype=\"multipart/form-data\">";
						echo "<div class=\"card_view2\">";
					echo "<div class=\"card_view-header\" >";
					echo"<input type=\"hidden\" name=\"id\" value=\"".$case[0]."\"/>";
					echo "<label class=\"".$case[0]."\" style=\" font-size:20px;text-transform:uppercase; \"> <b>".$case[1]."</b></label>";
					
					echo "<input style=\"display:none;\" name=\"title\" type=\"text\" class=\"1".$case[0]."\" value=\"".$case[1]."\">";
						
					echo"</div>";
					echo"<div class=\"card_view-body\">";
					echo"<label class=\"".$case[0]."\" name=\"date\" style=\"float:right;\"> ".$case[6]."</label> <br/>";
					
						echo"<label name=\"time\" style=\"float:right; margin-left:5px;\">".$case[7]." </label>";
						echo"<br/>";
						echo"<label class=\"".$case[0]."\"><p> ".$case[4]." </p></label>";
						echo"<textarea class=\"1".$case[0]."\" name=\"case\" rows=\"5\" cols=\"8\" type=\"text\" style=\"display:none;\" > ".$case[4]." </textarea>";
						echo"<hr>";
						echo"<label class=\"".$case[0]." \"><p><b>".$case[5]."</b></p></label>";
						echo"<textarea class=\"1".$case[0]."\" rows=\"5\" name=\"judgement\" cols=\"8\" type=\"text\" style=\"display:none;\" >".$case[5]."</textarea>";
					echo"</div>";
					echo"<div class=\"card_view-footer\">";
					
						echo"<button onclick=\"return edit_btn(".$case[0].") \"> Edit </button> 
						<button name=\"update\" id=\"u".$case[0]."\" style=\"display:none;\" onclick=\"btn_update(".$case[0]."); \"> Update </button> 
						<button id=\"c".$case[0]."\" style=\"display:none;\" onclick=\"return btn_cancel(".$case[0].")\"> Cancel </button>";
						echo"<button name=\"delete\" onclick=\"return bnt_del(".$case[0].")\" class=\" d".$case[0]." \"> Delete</button>";
					echo"</div>";
				echo"</div>";
				echo "</form>";
					}
				?>
				
										<!-- - //view my cases - -->
										
										<!-- end of my cases  -->
			</div>
			
			<div id="result" style="display:none;">
			<!-- - search panel - -->
	<div>
	<form action="" method='post' enctype='multipart/form-data'>
<div class="container" style="width:100%">
    <div class="row">    
        <div class="col-xs-10 col-xs-offset-1">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" style="width:70px; height:35px;" data-toggle="dropdown">
                        <span id="search_concept">Title</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#Date">Date</a></li>
                      <li><a id='dft' href="#Title">Title</a></li>
					  <li><a href="#News">cases</a></li>
					  <!-- <li><a href="#all"> All </a></li> -->
                      <!-- <li class="divider"></li> -->
                      <!-- <li><a href="#all">Anything</a></li> -->
                    </ul>
                </div>
                <input  type="hidden" name="search_param" value="all" id="search_param">  <br/><br/>       
                <input  type="text" class="form-control smallbar" id="sbar" name="x" placeholder="Search term...">
                <input style=" width:50% !important;" type="date" class="form-control smallbar" id='from' name="fromd" placeholder="From">
                <input style=" width:50% !important;" type="date" class="form-control smallbar" id='to' name="tod" placeholder="To">
                <span class="input-group-btn">
                    <button class="btn btn-default" style="width:70px; height:35px;" id="sbtn" name='search' type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
</div>
</form>

	</div>
			<!-- - view cases - -->
			<?php

			foreach($result as $cases){

			
				echo"<div class=\"card_view2\">
				<div class=\"card_view-header capitals\" >
					<label style=\"font-size:20px;\" > <b> ".$cases[1]." </b></label>
					
					
				</div>
				<div class=\"card_view-body\">
					<label name=\"date\" style=\"float:right;\"> ".$cases[6]."</label> <br/>
					<label name=\"time\" style=\"float:right; margin-left:5px;\"> ".$cases[7]." </label>
					<br/>
					<label><p>".$cases[4]."</p></label>
					<hr>
					<label><p> ".$cases[5]." </p></label>
				</div>
			
				</div>";
			}
			?>
				
			</div>	
			<?php
				require_once('footer.php');
			?>		
		</div>
		
</div>
	


<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
function edit_btn(id){
	
	$(".1"+id).show();
			$("."+id).hide();
			$("#u" + id).show();
			$("#c" + id).show();
			return false;
}
function btn_cancel(cid){
	if(confirm("discard changes"))
			{
				$(".1"+cid).hide();
				$("."+cid).show();
				$("#u"+cid).hide();
				$("#c"+cid).hide();
			}else{
				return false;
			}
			return false;
}
function btn_update(uid){
	$(".1"+uid).hide();
			$("."+uid).show();
			$("#u"+uid).hide();
			$("#c"+uid).hide();
}
function btn_del(did){
	// $(".1"+uid).hide();
	if(confirm("Delete Case")){
		$("."+uid).show();
			$("#u"+uid).hide();
			$("#c"+uid).hide();
			return true;
	}
	else
	{
		return false;
	}
			
}
function scrollwin(x,y){
window.scrollBy(x,y);
}

	$(document).ready(function(){
		$("#vote").click(function(){
			S("#voting").show();
			$("#result").hide();
		
		});
		$("#rslt").click(function(){
			S("#result").show();
			$("#voting").hide();
		});
		$(".btn_edit").click(function(){
			$(".txt").show();
			$(".lbl").hide();
			$("#update").show();
			$("#cancel").show();
		});
		$("#update").click(function(){
			$(".txt").hide();
			$(".lbl").show();
			$("#update").hide();
			$("#cancel").hide();
		});
		$("#cancel").click(function(){
			if(confirm("discard changes"))
			{
				$(".txt").hide();
				$(".lbl").show();
				$("#update").hide();
				$("#cancel").hide();
			}else{
				return false;
			}
			
			
		});
	});

	/*else{
		x.style.display = "none";
		y.style.display = "block";
	}*/
    /*if (x.style.display =="none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }*/
</script>
</body>
</html>