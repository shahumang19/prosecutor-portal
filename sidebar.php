<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left addOn" style="width:200px; background-color:#00303f !important;" id="mySidebar">
<button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <a href="dashboard.php" class="w3-bar-item w3-button <?php if(in_array('dashboard.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Home</a>
  <a href="cases.php" class="w3-bar-item w3-button <?php if(in_array('cases.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Cases</a>
  <a href="calendar/index.php" class="w3-bar-item w3-button <?php if(in_array('calendar.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Calendar</a>
  <!-- <a href="manage_news.php" class="w3-bar-item w3-button <?php if(in_array('manage_news.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">interns</a> -->
   <a href="voting.php" class="w3-bar-item w3-button <?php if(in_array('voting.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Voting</a>
    <a href="newsFeeds.php" class="w3-bar-item w3-button <?php if(in_array('newsFeeds.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">News Feeds</a>
	 <a href="FAQs.php" class="w3-bar-item w3-button <?php if(in_array('FAQs.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">FAQs</a>
	 <a href="userinfo.php" class="w3-bar-item w3-button <?php if(in_array('userinfo.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">User Info</a>
	  <a href="About_us.php" class="w3-bar-item w3-button <?php if(in_array('About_us.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">About Us</a>
	   <!-- <a href="manage_news.php" class="w3-bar-item w3-button <?php if(in_array('manage_news.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Map</a> -->
	    <a href="classes/logout.php" class="w3-bar-item w3-button <?php if(in_array('classes/logout.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">LogOut</a>
</div>