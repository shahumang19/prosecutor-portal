<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/navigation_bar.css">
	<link rel="stylesheet" href="css/side-nav.css">
	<link rel="stylesheet" href="css/voter.css">
	<link rel="stylesheet" href="temp.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/box.css">
	
	<script>
		$(document).ready(function(){
			$("#vote").click(function(){
			
			});
			$(".collapse1").click(function(){
				//$(".content1").slideToggle("slow");
				var coll= $('.collapse1');
				//alert(coll.length);

				var content = this.nextElementSibling;
				if (content.style.display === "block") {
					content.style.display = "none";
				} else {
					content.style.display = "block";
				}
	
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
			alert(coll.length);
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

<?php require_once('sidebar.php');?>

<div class="w3-main" style="margin-left:200px">
	<div class="w3-teal" style="position:sticky;">
		<button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
		<div class="w3-container" style="background:white; color:#00303f;">
		<p style="font-size:30px"><img src="logo_final.png" alt="logo" width="13%" height="13%" style="margin-top:-20px; margin-bottom:-10px;"/> The Gujarat Rajaya Assistant Public Prosecutor Association </p>
		</div>		
	</div>
	<div class="bground" > 
	<br/><br/><br/>
	<table>
	<tr>
	<td>
	<div class="circle" style="margin-top:80px; margin-left:250px;" onclick="scrollwin(0, 500);fun1();" id="vote">
		<img src="elections.png" style="width:40%; margin-left:70px; margin-top:50px;"/>
		<h4 style="color:white; text-align:center;"> VOTING</h4>
	</div>
	</td>
	<td>
	<div class="circle" style=" margin-left:200px; margin-top:80px;" onclick="scrollwin(0, 500);fun2();">
		<img src="results.png" alt="" style="width:40%; margin-left:70px; margin-top:50px;" id="rslt"/>
		<h4 style="color:white; text-align:center;"> RESULT </h4>
	</div>
	</td>
	</tr>
	</table>
	</div>
	<br/><br/>
	
		<div id="voting" style="padding-bottom:500px;">
											
													<div style=" background-color: #37B9E9; border-radius:10px;overflow:auto;">
				<img src="ribbon.png" style="width:300px; height:200px; margin-top:-50px;">

				<br/>
				<!-- individual candidates view -->
			  <?php
					require_once('classes/connection.php');
					$con= getConnection();
					$stmt = $con->query('select firstname, surname, photo, description, cid, candidate.position_id from candidate,prosecutor where candidate.pid=prosecutor.pid');
			        foreach ($stmt as $row)
					{
						
						$data= array();
						$data[0]=$row['firstname'];
						$data[1]=$row['surname'];
						$data[2]=$row['photo'];
						$data[3]=$row['description'];
						$data[4]=$row['cid'];
						$data[5]=$row['position_id'];
					
					?> 
					<form method="post" action="">
				   <div class="card_view2"> 
				 <div class="card_view-header">
					<h3><?php echo $data[0] . " " .$data[1]?> </h3>
				</div>
				<div class="card_view-body">
					<img src="<?php echo $data[2]?> " style="float:left;border-radius:100%; width:100px;"/>
					<p> <?php echo $data[3]?> </p>
				</div>
				<div class="card_view-footer">
					<input type="submit" name="voter" value="vote" width="100%">
					</div>
				</div>
					
					<input type="hidden"  name="cid" value='<?php echo $data[4]?>'>
					<input type="hidden"  name="position_id" value='<?php echo $data[4]?>'>
					</form>
					<?php }?>
				<!--   end individual candidates view - -->
<?php
	if(isset ($_POST['voter']))
	{
	  $query = $con->prepare("insert into vote values((select pid from prosecutor where email='jayjoshi.551@gmail.com'),:cid,:position_id)");
	  $query->bindParam(":cid", $_POST['cid'], PDO::PARAM_STR);
	  $query->bindParam(":position_id", $_POST['position_id'], PDO::PARAM_STR);
	  if($query->execute())
	  {
	   echo "<script> alert('Successfully voted for the voter');</script>";
	  }
	  else
	  {
       echo "<script> alert('Either you have voted before or you are not eligible to vote thank you');</script>";
	  }
	
	}
?>
				<!-- end candidates view -->
				
			</div>
		
			</div>
			
			<div id="result" style="display:none;">
				<div >
					 <table border="1px solid black" width="400px" style="float:left;" >
						<tr>
						<td>
							<button name="btn_result" value="1"> disha shah </button>
						</td>
						</tr>
						<tr>
						<td>
							disha shah 
						</td>
						</tr>
						<tr>
						<td>
							disha shah 
						</td>
						</tr>
						<tr>
						<td>
							disha shah 
						</td>
						</tr>
					</table> 
					
				</div>
				<!--end table for result -->
				<div style="float:right;">
				<?php
					require_once('graph_2.php');
					?>
				</div>
				
			</div>			
		</div>
		
</div>
	


<script>
function scrollwin(x,y){
window.scrollBy(x,y);
}

	$(document).ready(function(){
		$("#vote").click(function(){
			S("#voting").show();
			$(".result").hide();
		alert('1');
		});
		$("#rslt").click(function(){
			alert(1);
			$(".result").show();
			$("#voting").hide();
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