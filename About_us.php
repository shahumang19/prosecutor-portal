<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
	<link rel="stylesheet" href="css/navigation_bar.css">
<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/newsFeeds.css">

<style>
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 230px;
    padding: 2px;
}

.row::after {
    content: "";
    clear: both;
    display: table;
}


@media screen and (max-width: 500px) {
    .column {
        width: 100%;
    }
}
</style>
	
</head>

<body style="background-color:#efefef">
    <?php
    require_once('sidebar.php');
    require_once('classes/connection.php');
    session_start();
//     if(!isset($_SESSION['username']))
// {
//     header("location:login/index.php");
// }
    ?>
<div class="w3-main" style="margin-left:200px">
    <?php
        require_once('classes/header.php');
    ?>
	<!-- <div class="w3-teal">
		<button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
		<div class="w3-container" style="background:white; color:#00303f;">
		<p style="font-size:30px"><img src="logo_final.png" alt="logo" width="10%" height="10%"/> The Gujarat Rajaya Assistant Public Prosecutor Association </p>
		</div>		
	</div> -->
	<div style="background-color:white;margin-top:20px;">
        <h1 style="margin-right:25px;background: linear-gradient(to right,#42a5f5,white);letter-spacing:-2px;padding-left:10px;"><b>About Us</b><h1>
   
       <br/> <p style="font-size:0.6em !important;margin-left:30px!important ;margin-right:30px !important;font-family:Arial;color:rga(0,0,0,0.7);">The public prosecutors association was created on 16-9-1981 presently the association of prosecution is headed by Paresh Nandolia. The main motive of our prosecution is to provide justice to each and every citizen of Gujarat blindly. Our mission is to prosecute and secure punishment to offenders and to help the victims of crime to get justice which is the moto of our association to provide justice to our citizens. </p>
    <br/>
    </div>
    <div style="background-color:white;margin-top:20px;">
    <h1 style="margin-right:25px;background: linear-gradient(to right,#42a5f5 ,white);letter-spacing:-2px;padding-left:10px;"><b>Members of Assosiation</b><h1>
    <div class="row" style="text-align:center;">
        <div class="col-md-4" style="border-right:1px solid grey;border-bottom:1px solid grey;">
            <h3 style="margin-left:2px;color:blue;">   President</h3>
            <p style="font-size:0.6em !important;"> disha shah  </p>
        </div>
        <div class="col-md-4" style="border-right:1px solid grey;border-bottom:1px solid grey;">
            <h3 style="color:blue;"> Vice-President</h3>
            <p style="font-size:0.6em !important;"> disha shah  </p>
        </div>
        <div class="col-md-4" style="border-right:1px solid black;border-bottom:1px solid grey;">
            <h3 style="color:blue;"> General secretary</h3>
            <p style="font-size:0.6em !important;"> disha shah  </p>
        </div>
        <div class="col-md-4" style="border-right:1px solid grey;border-bottom:1px solid grey;">
            <h3 style="margin-left:2px;color:blue;">Co-minister</h3>
            <p style="font-size:0.6em !important;"> disha shah  </p>
        </div>
        <div class="col-md-4" style="border-right:1px solid grey;border-bottom:1px solid grey;">
            <h3 style="color:blue;"> Treasurer</h3>
            <p style="font-size:0.6em !important;"> disha shah  </p>
        </div>
        <div class="col-md-4" style="border-right:1px solid black;border-bottom:1px solid grey;">
            <h3 style="color:blue;"> Women Representative</h3>
            <p style="font-size:0.6em !important;"> disha shah  </p>
        </div>
    </div>

    <div  style="text-align:center;">
        <h3 style="color:blue;"> Executive Members </h3>
        <p style="font-size:0.6em !important;"> disha shah  </p>
        <p style="font-size:0.6em !important;"> disha shah  </p>
        <p style="font-size:0.6em !important;"> disha shah  </p>
    </div>
    </div>
    <!-- <div> -->
        
        <!-- <table style=""> -->
            <div class="row" style="margin-left:1px;">
            <!-- <tr> -->
                <!-- <td> -->
            <div class="column">
                    <img src="1.jpg" height="250px" width="230px" />
                <!-- </td> -->
            </div>
            <div class="column">
                <!-- <td> -->
                    <img src="2.jpg" height="250px" width="230px"/>
            </div>
                <!-- </td> -->
            <div class="column">
                <!-- <td> -->
                    <img src="3.jpg" height="250px" width="230px"/>
            </div>
                <!-- </td> -->
            <div class="column">
                <!-- <td> -->
                    <img src="4.jpg" height="250px" width="230px"/>
            </div>
                <!-- </td> -->
                <!-- <td> -->
                <div class="column">
                    <img src="5.jpg" height="250px" width="230px"/>
                </div>
                <!-- </td> -->
            <!-- </tr> -->
            </div>
        <!-- </table> -->
        
        
    <!-- </div> -->
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