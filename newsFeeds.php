<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
	<link rel="stylesheet" href="css/navigation_bar.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/newsFeeds.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

	
</head>
<body style="background-color:#efefef">

<?php require_once('sidebar.php');
	require_once('classes/connection.php');
	require_once('classes/newsFeed.php');
	require_once('classes/new_post.php');
	session_start();
	$username = $_SESSION['username'];
	
	if(!isset($_SESSION['username'])){
	header("location:login/index.php");
	}
	$obj = new NewsFeed();
	$news = $obj->getFeeds2();
	$date = $obj->getDateCount();
	$user = $obj->getPhoto($username);
	$comment = $obj->getComments();
	$name = $obj->getUsername();
?>
<div class="w3-main" style="margin-left:200px">
	<?php
		require_once('classes/header.php');
	?>
	 <form action="newsFeeds.php" method="post" enctype="multipart/form-data">
	<div class="card_view">
		<img  src="<?php echo $user[0][0] ?>" style="width:50px; border-radius:100%; height:50px;float:left;"/>
		<label style="float:left;"> <?php echo $user[0][1]; echo" "; echo $user[0][2]?> </label>
		<input type="hidden" name="pid" value="<?php echo $user[0][3] ?>"/>
		<textarea class="textinput" name="txt" placeholder="Write Your Post..."></textarea><br/><br/>
		<button name="post" style="float:right; width:90px;height:30px;">Post</button><br/>
	</div>
	</form>

	<form action="newsFeeds.php" method="post" enctype="multipart/form-data">
<?php	

	foreach($date as $result){
		echo"	<div style=\"width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center\">
		<span style=\"font-size: 20px; background-color: #efefef; padding: 0 10px ;\"> ".$result[1]."  </span>
		</div>";
		foreach($news as $ans){
			if($result[1] == $ans[2]){
				$pros = $obj->getUserInfo($ans[1]);
				echo"<div class=\"card_view\">
				<div class=\"card_view-header\" >
					<img src=\"".$pros[0][0]."\"style=\"width:50px; border-radius:100%; height:50px;float:left;\">
					<label style=\"float:left; margin-top:15px;\"> &nbsp;&nbsp;&nbsp;".$pros[0][1]." ".$pros[0][2]." </label><br/><br/>
					<label style=\"float:right; margin-top:-25px; font-family:arial\"> ".$ans[2]."</label><br/>
					<label style=\"float:right;margin-top:-25px;font-family:arial\"> ".$ans[3]."</label>
					
				</div>
				<div class=\"card_view-body\" style=\"text-transform:capitalize; padding:15px;\"><p>".$ans[4]." </p></div>
				</form>";
				
				
				foreach($comment as $cmt){
					if($cmt[3] == $ans[0]){
						echo"<div class=\"card_view-body\" style=\"text-transform:capitalize;background-color:#efefef;\">
						<div class=\"col-xs-2\" >
						<label style=\"color:blue\"> ".$cmt[0]." ".$cmt[1]."</label>
						</div>
						<div class=\"col-md-5\">
						<p style=\"background-color:white;\">".$cmt[6]." </p>
						</div><br/>
						</div>";
					}
				}
				
				echo"<form action=\"newsFeeds.php\" method=\"post\" enctype=\"multipart/form-data\">
				<div class=\"card_view-footer\">
				<input type=\"hidden\" name=\"nid\" value=\"".$ans[0]."\"/>
					<input type=\"hidden\" name=\"pid\" value=\"".$user[0][3]."\"/>
				<div class=\"col-md-1\">
				<img src=\"".$user[0][0]."\" style=\"width:25px; border-radius:100%; height:25px;float:right;\">
				</div>
				<div class=\"col-md-6\">
				<textarea name=\"cmt_text\"  placeholder=\"Enter Comment...\" style=\"border-radius:10px;width:100%;border:2px solid #CCD0D5;height:45px; resize:none;\"></textarea>
				</div>
				<div class=\"col-md-1\">
				<button name=\"cmt\" > Post </button>
				</div>
				</div>
				</div>";
			}
		}
	}
?>
</form>

	<?php
		require_once('footer.php');
	?>
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