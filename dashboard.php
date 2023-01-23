<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="css/navigation_bar.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/card_view.css">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" href="css/voter.css"> -->


</head>
<body style="background-color:#efefef; font-family: Georgia;" >

<?php require_once('sidebar.php');?>

<div class="w3-main" style="margin-left:200px">
<?php
require_once('classes/header.php');
session_start();
// if(!isset($_SESSION['username']))
// {
// header("location:login/index.php");
// }
?>
</div>
<!-- <div style="background-color:rgb(55,185,233); width:100%; height:500px;"> -->
	<!-- <img src="icon.png" width="20%" height="300px" style="z-index:2px;"/> -->
<!-- <div style="background-color:white; width:100%; height:100px; float:left; text-align:centre; margin-top:-200px;">	

</div> -->
<!-- </div> -->

	<div class="slider-container" style="margin-left:185px;">
  <div class="slider-control left inactive" style="margin-left:30px;"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider" >
    <div class="slide slide-0 active">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">सत्यं नास्ति परो धर्म सर्वे जनाय हितं वदाम: ||</h2>
          <!-- <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p> -->
          <!-- <a class="slide__text-link">Project link</a> -->
        </div>
      </div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">मा कर्मफल हेतुर्भू मा ते संगोस्त्वकर्मणि ||</h2>
          <!-- <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p> -->
          <!-- <a class="slide__text-link">Project link</a> -->
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">यज्ञदान तप: कर्म पावनानि मनिषिणा ||</h2>
          <!-- <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p> -->
          <!-- <a class="slide__text-link">Project link</a> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="w3-main" style="margin-left:200px">
<div class="w3-container">


<div class="card_view2">
	<div class="row">
		<div class="col-span-0">
		<nav>
		   <img src="classes/president/president.jpg" width="65%" height="40%"/><br/><br/>
		</nav>
		</div>
		<div class="col-span-6">
		<!-- <article> -->
		<?php
		// echo"<h1>".$data[0]."</h1>";
		if($file = fopen("classes/president/president.txt","r"))
		{
			echo "<h1>".fgets($file)."</h1>";
			echo "<p>".fgets($file)."</p>";
		}
		?>
	    	
			
				
			<!-- <a href="#"><p style="text-align:center; color:blue;"> view more </a></p> -->
		<!-- </article> -->
	</div>
	</div>
	</div>
	<!-- <div class="newsfeed">
		<img src="icon.png" width="50%" height="25%"/>
		<h1>London</h1>
		<p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
		<p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
		<hr>
		<a href="#"><p style="text-align:center; color:blue;"> view more </a></p>			
	</div>
	<div class="newsfeed">
		<img src="icon.png" width="50%" height="25%"/>
		<h1>London</h1>
		<p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
		<p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
		<hr>
		<a href="#"><p style="text-align:center; color:blue;"> view more </a></p>			
	</div>
	<div class="newsfeed">
		<h1>London</h1>
		<p>nlkmlm;f;lm;lmb;mfb;fmbg;mbg;hlm;ghmn;lghn;m</p>		
		<hr>
		<img src="right-arrow.png" width="10%" style="float:left;"><a href="#" style="text-decoration:none"><p style="color:gray; text-align:left;"> Read more </a></p>		
	</div> -->
</div>
<footer>
<?php
	require_once('footer.php');
?>
   </footer>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
$(document).ready(function(){
	$(window).unload(function(){
		unset ($_SESSION['username']);
		header('location:../login/index.php');
	})
});
</script>
       <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

<script  src="js/index.js"></script>


</body>
</html> 
