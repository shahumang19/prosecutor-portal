<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left addOn" style="width:200px;" id="mySidebar">
<button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <a href="dashboard.php" class="w3-bar-item w3-button <?php if(in_array('dashboard.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Dashboard</a>
  <a href="manageUsers.php" class="w3-bar-item w3-button <?php if(in_array('manageUsers.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Manage Users</a>
  <a href="voting_module.php" class="w3-bar-item w3-button <?php if(in_array('voting_module.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Election Management</a>
  <a href="electionResult.php" class="w3-bar-item w3-button <?php if(in_array('electionResult.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Election Result</a>
  <a href="manage_news.php" class="w3-bar-item w3-button <?php if(in_array('manage_news.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Manage NewsFeed</a>
  <a href="manage_stuff.php" class="w3-bar-item w3-button <?php if(in_array('manage_stuff.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Other</a>
  <a href="settings.php" class="w3-bar-item w3-button <?php if(in_array('settings.php',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Settings</a>
  <a href="logout.php" class="w3-bar-item w3-button <?php if(in_array('ss',explode("/",$_SERVER['PHP_SELF']))){echo 'active';}?>">Log Out</a>
</div>