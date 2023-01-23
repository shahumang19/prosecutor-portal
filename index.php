<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  
  <title>Fullscreen drag-slider with parallax</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

      <link rel="stylesheet" href="css/style.css">
	
	  <link rel="stylesheet" href="css/nav_bar.css">
	  <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/card_view.css">
  
</head>

<body style="background-color:#efefef">
<div>
<img src="logo_final.png" alt="disha" class="flag" />
</div>
<div class="navbar">

  <a href="login/index.php">Login </a>
  <a href="newsFeeds.php">News feeds</a>
  <!-- <a href="#contact">Contact us</a> -->
  <a href="About_us.php">About us</a>
    <a class="present" href="#home">Home</a>
</div>
  <div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <!--<ul class="slider-pagi"></ul>-->
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <!-- <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice"> -->
          <!-- <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" /> -->
        </svg>
        <!-- <div class="slide__text"> -->
          <!-- <h2 class="slide__text-heading">Project name 1</h2> -->
          <!-- <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p> -->
          <!-- <a class="slide__text-link">Project link</a> -->
        <!-- </div> -->
      </div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <!-- <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice"> -->
          <!-- <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" /> -->
        </svg>
        <div class="slide__text">
          <!-- <h2 class="slide__text-heading">Project name 2</h2> -->
          <!-- <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p> -->
          <!-- <a class="slide__text-link">Project link</a> -->
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <!-- <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice"> -->
          <!-- <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" /> -->
        </svg>
        <div class="slide__text">
          <!-- <h2 class="slide__text-heading">Project name 3</h2> -->
          <!-- <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p> -->
          <!-- <a class="slide__text-link">Project link</a> -->
        </div>
      </div>
    </div>
    <div class="slide slide-3">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <!-- <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice"> -->
          <!-- <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" /> -->
        </svg>
        <div class="slide__text">
          <!-- <h2 class="slide__text-heading">Project name 4</h2> -->
          <!-- <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p> -->
          <!-- <a class="slide__text-link">Project link</a> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div  style="position:relative;">
<div class="container">

  
<nav>
<img src="classes/president/president.jpg" width="70%" height="50%"/>
</nav>

<article>
<?php
		// echo"<h1>".$data[0]."</h1>";
		if($file = fopen("classes/president/president.txt","r"))
		{
			echo "<h1>".fgets($file)."</h1>";
			echo "<p>".fgets($file)."</p>";
		}
		?>
	    	
</article>

</div>

</div>
<?php
  require_once('footer.php');
?>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
