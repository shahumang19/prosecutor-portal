<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/navigation_bar.css">
	<link rel="stylesheet" href="css/side-nav.css">
	<link rel="stylesheet" href="css/voter.css">
	<link rel="stylesheet" href="temp.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/box.css">
	<style>
		.hidecss{
			display:none;
		}
	</style>
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

<?php require_once('sidebar.php');
require_once('classes/result.php');
require_once('classes/connection.php');
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login/index.php");
}
$obj = new Result();
$position = $obj->getPosition();
?>

<div class="w3-main" style="margin-left:200px">
	<?php
		require_once('classes/header.php');
	?>
	<!-- <div class="w3-teal" style="position:sticky;">
		<button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
		<div class="w3-container" style="background:white; color:#00303f;">
		<p style="font-size:30px"><img src="logo_final.png" alt="logo" width="13%" height="13%" style="margin-top:-20px; margin-bottom:-10px;"/> The Gujarat Rajaya Assistant Public Prosecutor Association </p>
		</div>		
	</div> -->
	<div class="bground" > 
	<br/><br/><br/>
	<table align="center" style="padding-top:50px; ">
	<tr>
	<td >
	<div class="circle"  onclick="scrollwin(0, 500);fun1();" id="vote">
		<img src="elections.png" style="width:40%; margin-left:70px; margin-top:50px;"/>
		<h4 style="color:white; text-align:center;"> VOTING</h4>
	</div>
	</td>
	<td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
	<td >
	<div class="circle"  onclick="scrollwin(0, 500);fun2();">
		<img src="results.png" alt="" style="width:40%; margin-left:70px; margin-top:50px;" id="rslt"/>
		<h4 style="color:white; text-align:center;"> RESULT </h4>
	</div>
	</td>
	</tr>
	</table>
	</div>
	<br/><br/>
	
	<div id="voting">
		<!--  candidates view  -->
		 <?php
			

			//$conTbl= getConnection();
			//$stmt1= $con->query('select ');

					$candidate= array();
					$i=0;
					$check=false;
					
					//require_once('login/connection.php');
					$con= getConnection();
					$conn=getConnection();
					$c=getConnection();
					$stmt = $con->query('select firstname, surname, photo, description, cid, candidate.position_id from candidate,prosecutor where candidate.pid=prosecutor.pid and candidate.eid=(select eid from election where status=0)');
					
					
			        foreach ($stmt as $row)
					{
						$result= $conn->query("select cid from vote where pid in (select pid from prosecutor where username='".$_SESSION['username']."')");
						$v="Vote";

						$data= array();
						$data[0]=$row['firstname'];
						$data[1]=$row['surname'];
						$data[2]=$row['photo'];
						$data[3]=$row['description'];
						$data[4]=$row['cid'];
						$data[5]=$row['position_id'];
						$res=$c->query("select name from position where posid=".$data[5]);
						$re=$res->fetch();
				// 		echo"<div style=\" background-color: #37B9E9; border-radius:10px;overflow:auto;\">
				
				// <label for=\"position\" style=\"width:300px; height:200px; margin-top:-50px;\">".  $re['name] ." </label>";
				// 	//	echo "<script> alert('$re[name]');</script>";
						foreach($result as $r)
						{
							if($r[0]==$data[4])
							{
								$v="voted";
							}
						}
						
						
						
					?> 
					<?php
						foreach($candidate as $can)
						{
							if($can==$data[5])
							{
								$check=true;
								//echo "<script> alert('Repeat');</script>";
							}
						}
						if($check==false)
						{
							//echo "<script> alert('new');</script>";
							$candidate[$i]=$data[5];
							$i++;
				?>	<div style=" background-color: #37B9E9; border-radius:10px;overflow:auto;">
				
				<label for="position" style="width:300px; height:200px; margin-top:-50px;"><?php echo $re['name']; ?> </label>
				
				<br/><?php
						}
					?>
				
				
				<!-- individual candidates view -->
			 
					<form method="post" action="">
				   <div class="card_view2"> 
				 <div class="card_view-header">
					<h3><?php echo $data[0] . " " .$data[1]?> </h3>
				</div>
				<div class="card_view-body">
					<img src="<?php echo $data[2]?> " style="float:left;border-radius:100%; width:100px;"></img>
					<p> <?php echo $data[3]?> </p>
				</div>
				<div class="card_view-footer">
					<button type="submit" class="<?php if($v=="voted"){echo 'hidecss';}?>" name="voter" width="100%"><?php echo $v; ?> </button>
					</div>
				</div>
					
					<input type="hidden"  name="cid" value='<?php echo $data[4]?>'>
					<input type="hidden"  name="position_id" value='<?php echo $data[5]?>'>
					</form>
					<?php
					if($check==true)
						{
						//	echo"<script> alert('e');</script>";
							$check=false;
				?>
					</div>
						<?php }?>
					<?php }?>
				<!--   end individual candidates view  -->
<?php
	if(isset ($_POST['voter']))
	{
		//try
		{
	  $query = $con->prepare("insert into vote values((select pid from prosecutor where username='".$_SESSION['username']."'),:cid,:position_id)");
	  $query->bindParam(":cid", $_POST['cid'], PDO::PARAM_STR);
	  $query->bindParam(":position_id", $_POST['position_id'], PDO::PARAM_STR);
	  if($query->execute())
	  {
	   echo "<script> alert('Successfully voted for the voter');document.location='voting.php';</script>";
	  }
	  else
	  {
       echo "<script> alert('Either you have voted before or you are not eligible to vote thank you');</script>";
		}}
	//	catch(PDOException $e)
		{
			  echo "<script> alert('Either you have voted before or you are not eligible to vote thank you');</script>";
		}
	
	}
?>
			
			<div id="result" style="display:none;">
			<form method="post" action="voting.php#result">
			<div style="background:white;">
				<div style="margin-left:10px;">
					<select name="result">
					<option value="" disabled selected> select position</option>
					<?php
					
					foreach($position as $ans){
					echo"<option value=\"".$ans[0]."\"> ".$ans[1]." </option>";
					}
					?>
					</select>	
					<button name="apply" onclick="fun()"> display </button>				
					</div>
					</form>
				<!--    end table for result    -->
				<div style="">
				<?php
					require_once('graph_2.php');
					if(isset($_POST['apply']))
					{
						setTemp($_POST['result']);
						drawGraph();
					}
					else
					{
						drawGraph();
					}
					?>
				</div>
				
				</div>
			</div>		
			
		</div>
		<?php
				require_once('footer.php');
			?>	
</div>
	


<script>
function fun(){
	
}
function scrollwin(x,y){
window.scrollBy(x,y);
}

	$(document).ready(function(){
		// var x = screen.width-(screen.width/2) - 500;
		// var y = 100;
		// $(window).resize(function(){
		// 	var x = screen.width-(screen.width/2) - 500 - y;
		// 	$(".circle").css({"margin-left" : x});
		// 	y = y+100;
		// });
		// $(".circle").css({"margin-left" : x});
		$("#vote").click(function(){
			S("#voting").show();
			$("#result").hide();
		
		});
		$("#rslt").click(function(){
			
			$("#result").show();
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