<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="css/navigation_bar.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/card_view.css">
<link rel="stylesheet" href="css/FAQs.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="js/search.js"></script>


<script>

function showbox(c)
{
	//alert(c);
	$(".abc"+c).toggle();
	$(".btnad"+c).toggle();
}

</script>

</head>
<body style="background-color:#efefef">

<?php require_once('sidebar.php');
	session_start();
	if(!isset($_SESSION['username']))
{
    header("location:login/index.php");
}
	require_once('classes/connection.php');
require_once('classes/FAQs_code.php');
require_once('classes/FAQs_post.php');
$username = $_SESSION['username'];
$obj = new FAQs();
$picture = $obj->getPhoto($username);
// $result = $obj->displayQuestion();
$pid = $picture[0][3];
?>

<div class="w3-main" style="margin-left:200px">
	<?php
	require_once('classes/header.php');
	?>
  <!-- header of page -->
	
	<!--  search panel  -->
	<div class="bground" style="padding-bottom:500px;">
	<form action="" method='post' enctype='multipart/form-data'>
<div class="container" style="width:100%; ">
    <div class="row" style="margin-top:200px;">    
        <div class="col-xs-10 col-xs-offset-1">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span id="search_concept">Question</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#Date">Date</a></li>
                      <li><a id='dft' href="#Title">Question</a></li>
                      <!-- <li><a href="#News">News</a></li> -->
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

	</div>
 <!-- add questions overlay  -->
 
 
	<div class="card_view"> 
	
	<div >
	<br/><img src="<?php echo $picture[0][0] ?>" style="border-radius:50%;" width="30px" height="30px"/> 
	<label style="text-transform:uppercase; font-size:10px;"><b><?php echo $picture[0][1]; echo" ";  echo $picture[0][2]?></b></label><br/>
		
		<h3 id="clk">What is your question?</h3>
		<div id="ques" class="card_view2" style="display:none;"> 
		<?php
		
			echo"<form action=\"FAQs.php\" method=\"post\" enctype=\"multipart/form-data\">
			<div >
				
				<div class=\"card_view-header\">
				<input type=\"hidden\" name=\"id\" value=\"".$pid."\"/>
			
	</div>
	<div class=\"content_body\">
	<br/>
		<div class=\"comment-box\" >
		<div> <br/><textarea name=\"question\" rows=\"5\" cols=\"80\" placeholder=\"Ask Your Question...\" ></textarea></div><br/>
		<button type=submit name=\"add\" id=\"question\" >&nbsp;Add Question&nbsp;</button>
	</div>
	<br/>
	</div>
	
	</div>
	</form>";
	?>
	<!-- 
		// if(isset($_POST['add']))
		// {
		// 	try
		// 	{
		// 	date_default_timezone_set('Asia/Kolkata');
		// 	$con=getConnection();
		// 	$query=$con->prepare("insert into question values(0,(select pid from prosecutor where username=:username),1,:question,'".date("Y-m-d")."','".date("H:i:s")."')");
		// 	$query->bindParam(':username',$_SESSION['username']);
		// 	$query->bindParam(':question',$_POST['question']);
		// 	$query->execute();
		// 	echo "<script> alert('question submitted');document.location='FAQs.php';</script>";
		// 	}
		// 	catch(PDOException $e)
		// 	{
		// 		echo "<script> alert('sorry the question was not submitted');</script>";
		// 	}
		// }
	 -->
	</div>
	</div>
	
<!-- view questions card view  -->
<?php
	$c = 1;
	foreach($result as $value){

		echo"<div class=\"card_view2\">
		<div class=\"card_view-header\">
		   <img style=\"float:left; border-radius:100%;width:70px;height:70px;\" src=\"".$value[0]."\" /><p style=\"text-transform:capitalize;\"><b>".$value[1]." ".$value[2]."</b></p>
		   <label style=\"float:right;\">".$value[5]." </label> <br/> <label style=\"float:right;\"> ".$value[6]."</label><br/>
	   
		   <hr>
		   <h4 style=\"text-align:center;\"><b> ".$value[3]." </b></h4>
		</div>";
		
		$ans = $obj->displayAnswer($value[7]);
		foreach($ans as $vl){
		echo"<div class=\"card_view-body\">
		   <p> ".$vl[0]." </p>
		   </div>";
		}
		  echo" <div class=\"card_view-footer\">
		   <div class=\"comment-box\" >
			   <img style=\"border-radius:50%;\" width=\"30px\" height=\"30px\" src=\"". $picture[0][0] ."\"/>
			   <label style=\"text-transform:uppercase; font-size:10px;\"><b>". $picture[0][1]." ". $picture[0][2]."</b></label><br/><br/>
			   <button class=\"ans\" onClick='return showbox($c)'> <img src=\"edit_white.png\" width=\"15%\"/> Answer </button>
			   <form method=\"post\" action=\"\">
			   <input type=\"hidden\" name='qid' value=\"".$value[7]."\">
			   <br/><div> <textarea class='abc$c' name=\"answer\" id=\"txt\" rows=\"5\" cols=\"80\" placeholder=\"Write your answer...\" style=\"display:none;\"></textarea></div><br/>
			   <button type=\"submit\" name=\"adans\" class='btnad$c' id=\"btn_add\" style=\"display:none;\">&nbsp;Add&nbsp;</button>
			   </form>
		   </div>
		   </div>
	   </div>";
	   $c++;
	}
?>
	
<?php
if(isset($_POST['adans']))
{
	$connn=getConnection();
	 $query = $connn->prepare("INSERT INTO answer(qid,uid,type,answer) values(:qid,(select pid from prosecutor where username=:username),1,:answer)");
	 $query->bindParam(":qid", $_POST['qid']);
	 $query->bindParam(":username", $_SESSION['username']);
	 $query->bindParam(":answer", $_POST['answer']);
	 $query->execute();
}

?>
<?php
require_once('footer.php');
?>
  
</div>

<script>
var modal = document.getElementById('overlay');
function w3_open() {
    alert(4);
	document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
	alert(3);
    document.getElementById("mySidebar").style.display = "none";
}
function on() {
	alert(2);
    document.getElementById("overlay").style.display = "block";
}

function off() {
	alert(1);
	var modal = document.getElementById('overlay');
    document.getElementById("overlay").style.display = "none";
	return true;
}

window.onclick = function(event) {
    if (event.target == overlay) {
        modal.style.display = "none";
    }
}
$(document).ready(function(){
	// $(".ans").click(function(){
		// $("#txt").show();
		// $("#btn_add").show();
	// });
	$("#clk").click(function(){
		$("#ques").slideToggle();
	});
});
</script>
     
</body>
</html> 
