<?php

$temp = 1;

function setTemp($pos)
{
	$GLOBALS['temp'] = $pos;
}

function drawGraph()
{
	echo"<div id=\"piechart\"></div>";
	echo"<script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>";
	require_once('classes/result.php');

	$obj = new Result();
	$result = $obj->count_vote();
	echo "<script>";
	echo "google.charts.load('current', {'packages':['corechart']});";

// Draw the chart and set the chart values
	echo	"function drawChart() { ".
		 " var data = google.visualization.arrayToDataTable([ ";
		 echo  "['Task', 'Hours per Day'], ";
		 foreach($result as $ans){
			if($ans[1] == $GLOBALS['temp'])
			{
				echo "['".$ans[2]."',". $ans[3]."],";
			}
		//   "['Eat', 2],".
		//   "['TV', 4],".
		//   "['Gym', 2],".
		//   "['Sleep', 8]".
		 }
	echo	" ]);";
		 
  // Optional; add a title and set the width and height of the chart
  echo "var options = {'title':'', 'width':550, 'height':400};".

  // Display the chart inside the <div> element with id="piechart"
  "var chart = new google.visualization.PieChart(document.getElementById('piechart'));".
  "chart.draw(data, options);".
"}";
echo "google.charts.setOnLoadCallback(drawChart);";
echo "</script>";
}

?>


<!-- <script type="text/javascript"> -->
<!-- // Load google charts -->

<!-- </script> -->

