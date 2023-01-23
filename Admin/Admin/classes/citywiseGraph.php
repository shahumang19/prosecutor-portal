<?php

function getData()
{
                $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare("select city, count(firstname) from prosecutor group by city ");
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
}

function drawGraph()
{
	echo"<div id=\"piechart\" class='chart'></div>";
	echo"<script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>";
	require_once('classes/connection.php');

    
    $result = getData();

	echo "<script>";
	echo "google.charts.load('current', {'packages':['corechart']});";

// Draw the chart and set the chart values
	echo	"function drawChart() { ".
		 " var data = google.visualization.arrayToDataTable([ ";
		 echo  "['Task', 'No of lawyers'], ";
		 foreach($result as $ans){
			echo "['".$ans[0]."',". $ans[1]."],";
		//   "['Eat', 2],".
		//   "['TV', 4],".
		//   "['Gym', 2],".
		//   "['Sleep', 8]".
		 }
	echo	" ]);";
		 
  // Optional; add a title and set the width and height of the chart
  echo "var options = {'title':'', 'width':500, 'height':400};".

  // Display the chart inside the <div> element with id="piechart"
  "var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));".
  "chart.draw(data, options);".
"}";
echo "google.charts.setOnLoadCallback(drawChart);";
echo "</script>";
}

?>
<script>
$(window).resize(function(){
  drawChart();
});
</script>


<!-- <script type="text/javascript"> -->
<!-- // Load google charts -->

<!-- </script> -->

