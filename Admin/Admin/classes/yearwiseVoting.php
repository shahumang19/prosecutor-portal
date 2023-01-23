<?php

function getData1()
{
                $conn = getConnection();

                if($conn != null)
                {
                    $query = 'select year,sum(total) as votes from (select year(e.edate) as year,count(v.cid) as total from election as e inner join candidate as c on c.eid = e.eid inner join vote as v on c.cid = v.cid group by year,v.cid) as temp group by year';
                    $stmt = $conn->prepare($query);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
}

function drawGraph1()
{
	echo"<div id=\"piechart1\" class='chart'></div>";
	echo"<script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>";
	require_once('classes/connection.php');

    
    $result = getData1();

	echo "<script>";
	echo "google.charts.load('current', {'packages':['corechart']});";

// Draw the chart and set the chart values
	echo	"function drawChart() { ".
		 " var data = google.visualization.arrayToDataTable([ ";
		 echo  "['Task', 'No of Votes'], ";
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
  "var chart = new google.visualization.ColumnChart(document.getElementById('piechart1'));".
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

