<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "";
$error1 ="";
date_default_timezone_set("Asia/Kuala_Lumpur");
$currentDate = date('Y-m-d',time());
?>
<?php
if(!isset($_SESSION['id']))
{
?>
    <script>
    alert("Please login. Thank you!!!");
    </script>
    <?php
    header("refresh:0.001;url=login.php");
    //exit();
	
	
}else{
	$Admin_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM admin WHERE AID = $Admin_id");
$row = mysqli_fetch_assoc($result);
	if(($row['Department'])!='All Department')
{	
?>
    <script>
    alert("You Are Not Authorize To Access This Page!!!");
    </script>
    <?php
    header("refresh:0.001;url=generalD.php");
    //exit();
	
}
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<!-- CSS Files -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/now-ui-dashboard.css" rel="stylesheet" />
		<!-- CSS Files -->
		<link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
		<!-- https://fontawesome.com/ -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<!-- https://getbootstrap.com/ -->
		<link rel="stylesheet" href="css/tooplate.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 2px white; 
  border-radius: 5px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: grey; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #fff; 
}

canvas{

  width:98% !important;
  height:100% !important;

}

</style>
		</head>
	
	<body>
<div class="wrapper" style="overflow-x:hidden;height:100%">
    <div class="sidebar" data-color="pink">
	
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          JMM
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          RECORD SYSTEM
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper" >
        <ul class="nav">
          <li>
            <a href="dashboard.php">
              <i class="now-ui-icons education_paper"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a>
              <i class="now-ui-icons design_bullet-list-67"></i>
              <h3 class="dropdown-header" style="color:white;">Category</h3>
			</a>
			
			
			<?php 
			
			$conn = $connect;
			
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			$sql3 = "SELECT * FROM category ";
			$result3 = $conn->query($sql3);
			if ($result3->num_rows > 0) {
			while($row3 = $result3->fetch_assoc()) {
				
			echo "<ul class='nav' style='padding'>";
			echo "<li><a class='dropdown-item' style='width:80%;margin-left:13%;margin-top:-7%;' href='list.php?details&id=". $row3["CID"]."'><i class='now-ui-icons design_palette'></i>". $row3["CName"]. "</a></li></ul> </li>";
			
			}
			} 
			?>
				
			
			<li>
				<a href="history.php">
				  <i class="now-ui-icons files_paper"></i>
				  <p>History</p>
				</a>
			</li>
		   <li>
            <a href="admin_list.php">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Admin List</p>
            </a>
          </li>
          <li>
            <a href="manage.php">
              <i class="now-ui-icons loader_gear"></i>
              <p>Manage</p>
            </a>
          </li>
        </ul>
	  </div>
    </div>
    <div class="main-panel" id="main-panel" style="height:100%;background-image: url('images/bg.jpg');background-size: cover;background-attachment: fixed;">
		<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" style="opacity:1;">
			<div class="container-fluid">
			    <div class="navbar-wrapper">
					<div class="navbar-toggle">
					    <button type="button" class="navbar-toggler">
							<span class="navbar-toggler-bar bar1"></span>
							<span class="navbar-toggler-bar bar2"></span>
							<span class="navbar-toggler-bar bar3"></span>
					    </button>
					</div>
			    </div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar navbar-kebab"></span>
					<span class="navbar-toggler-bar navbar-kebab"></span>
					<span class="navbar-toggler-bar navbar-kebab"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navigation">
					<ul class="navbar-nav">
					    <li class="nav-item">
						  <Tooltip title="Profile">
							<a class="nav-link" href="viewProfile.php">
							    <i class="now-ui-icons users_single-02"></i>
							    <p>
									<span class="d-lg-none d-md-block">Profile</span>
							    </p>
							</a>
						  </Tooltip>
					    </li>
						<li class="nav-item">
						  <Tooltip title="Logout">
							<a class="nav-link" href="logout.php">
							    <i class="now-ui-icons media-1_button-power"></i>
							    <p>
									<span class="d-lg-none d-md-block">Logout</span>
							    </p>
							</a>
						  </Tooltip>
					    </li>
					</ul>
			    </div>
			</div>
        </nav>
		<!-- row -->
		<div class="panel-header panel-header-lg">
			<canvas id="chart" style="width:100%;height:100%;"></canvas>
		 </div>
		 <?php
									$conn = $connect;
								
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT stock.PCode, product.PName,product.CID, SUM(stock.Qty) AS calc_sub, stock.DateAdded
									FROM ((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN admin ON stock.AID = admin.AID)
									WHERE Status = 'Stock In' AND DATE(DateAdded) = '$currentDate' AND product.CID =1 
									OR Status = 'Stock In' AND DATE(DateAdded) = '$currentDate' AND product.CID= 2 
									OR Status = 'Stock In' AND DATE(DateAdded) = '$currentDate' AND product.CID = 3 group BY PCode";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									$NewYearQTY = [];
									$NewYearArray = [];
									while($row = $result->fetch_assoc()) {
										$NewYearArray[] = $row['PName'];
										$NewYearQTY[] = $row['calc_sub'];
										
			
									}
									
									} else { echo "<div style='color: white;text-align:center;font-size:30px;'><b>Currently No Stock</b><br><br></div>"; }
									?>
									
									<!-- <?= print_r($NewYearArray);?>
									<br>
									<?= print_r($NewYearQTY);?> -->
		<script>
		
			console.log(<?php echo json_encode($NewYearArray);?>);
			const NewYear = <?php echo json_encode($NewYearArray);?>;
			
			console.log(<?php echo json_encode($NewYearQTY);?>);
			const NewYearQty = <?php echo json_encode($NewYearQTY);?>;
			
			
			let ctx = document.getElementById("chart").getContext('2d');
			

			var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
			gradientStroke.addColorStop(0, "#fff");
			gradientStroke.addColorStop(1, "#fff");

			var gradientBkgrd = ctx.createLinearGradient(0, 100, 0, 400);
			gradientBkgrd.addColorStop(0, "rgba(255,255,255,0.3)");
			gradientBkgrd.addColorStop(1, "rgba(255,255,255,0)");

			let draw = Chart.controllers.line.prototype.draw;
			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function() {
					draw.apply(this, arguments);
					let ctx = this.chart.chart.ctx;
					let _stroke = ctx.stroke;
					ctx.stroke = function() {
						ctx.save();
						//ctx.shadowColor = 'rgba(244,94,132,0.8)';
						ctx.shadowBlur = 8;
						ctx.shadowOffsetX = 0;
						ctx.shadowOffsetY = 6;
						_stroke.apply(this, arguments)
						ctx.restore();
					}
				}
			});

			var xValues = ['Mon','Tue','Wed','Thus','Fri','Sat','Sun'];
			var yValues = [20,57,180,80,20,79,44];


			var chart = new Chart(ctx, {
				// The type of chart we want to create
				type: 'line',

				// The data for our dataset
				data: {
					labels: NewYear,
					datasets: [{
						label: "Stock",
						backgroundColor: gradientBkgrd,
						borderColor: gradientStroke,
						data: NewYearQty,
						pointBorderColor: "rgba(240,240,240,0.8)",
						pointBackgroundColor: "rgba(240,240,240,0.6)",
						pointBorderWidth: 8,
						pointHoverRadius: 8,
						pointHoverBackgroundColor: gradientStroke,
						pointHoverBorderColor: "rgba(220,220,220,1)",
						pointHoverBorderWidth: 4,
						pointRadius: 1,
						borderWidth: 2,
						pointHitRadius: 16,
						fontColor: '#fff'
					}]
				},

				// Configuration options go here
				options: {
				  tooltips: {
					backgroundColor:'#fff',
					displayColors:false,
					   titleFontColor: '#000',
					bodyFontColor: '#000',
					},      
				  legend: {
						display: false
				  },
				  title: {
						display: true,
						text: 'Daily Stock',
						fontColor: 'white',
						fontSize : 20
						
						
					  },
					scales: {
						xAxes: [{
							gridLines: {
								display:false
							},
							ticks: {fontColor: 'white'}
						}],
						yAxes: [{
							ticks: {fontColor: 'white',stepSize: 10}
						}],
					}
				}
			});
		</script>
			<div class="content" style="min-height:10%">
			<div class="row">
			  <div class="col-lg-4 col-md-6" >
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
				  <div class="card-header">
					<h5 class="card-category">Category</h5>
					<h4 class="card-title">New Year Cookies</h4>
					<br>
					<div style="width: auto%; height: 400px; overflow-x:hidden;">
									<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM product WHERE CID = '1'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h5>";
									echo $row["PName"] ."</h5><span class='badge badge-info' style='float:right;'>";
									echo $row["PQty"]."</span>" ;" </li>" ;
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
				  <div class="card-header">
					<h5 class="card-category">Category</h5>
					<h4 class="card-title">Raya Cookies</h4>
					<br>
					<div style="width: auto%; height: 400px; overflow-x:hidden;">
									<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM product WHERE CID = '2'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h5>";
									echo $row["PName"] ."</h5><span class='badge badge-info' style='float:right;'>";
									echo $row["PQty"]."</span>" ;" </li>" ;
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
				  <div class="card-header">
					<h5 class="card-category">Category</h5>
					<h4 class="card-title">Mooncakes </h4>
					<br>
					<div style="width: auto%; height: 400px; overflow-x:hidden;">
									<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM product WHERE CID = '3'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h5>";
									echo $row["PName"] ."</h5><span class='badge badge-info' style='float:right;'>";
									echo $row["PQty"]."</span>" ;" </li>" ;
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
				  <div class="card-header">
					<h5 class="card-category">Category</h5>
					<h4 class="card-title">Raw Material</h4>
					<br>
					<div style="width: auto%; height: 400px; overflow-x:hidden;">
									<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM product WHERE CID = '4'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h5>";
									echo $row["PName"] ."</h5><span class='badge badge-info' style='float:right;'>";
									echo $row["PQty"]."</span>" ;" </li>" ;
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
				  <div class="card-header">
					<h5 class="card-category">Category</h5>
					<h4 class="card-title">Packing Material</h4>
					<br>
					<div style="width: auto%; height: 400px; overflow-x:hidden;">
									<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM product WHERE CID = '5'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h5>";
									echo $row["PName"] ."</h5><span class='badge badge-info' style='float:right;'>";
									echo $row["PQty"]."</span>" ;" </li>" ;
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
				  <div class="card-header">
					<h5 class="card-category">Category</h5>
					<h4 class="card-title">General Use</h4>
					<br>
					<div style="width: auto%; height: 400px; overflow-x:hidden;">
									<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM product WHERE CID = '6'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h5>";
									echo $row["PName"] ."</h5><span class='badge badge-info' style='float:right;'>";
									echo $row["PQty"]."</span>" ;" </li>" ;
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
		<div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:auto%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col" style="padding-top:1%;margin: auto; margin-bottom:2%;">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
						<h2 class="tm-block-title d-inline-block" style="margin-left:3%;margin-top:2%;color:black;font-weight:bold;display:inline;">Activity Log<h2><h2 style="margin-left:3%;margin-top:2%;color:maroon;font-weight:bold;display:inline;" id="current_date"></h2>			
<script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("current_date").innerHTML = month + "-" + day + "-" + year;
</script>
							
                            </div>
							<div>
							<hr>

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:99%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" id="myInput" type="text" autocomplete="off" name="searchname" placeholder="Search" ></h6>
<hr>
</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Code</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Image</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Quantity</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Admin Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Date</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;width:15%">Remarks</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Status</th>
										<th scope="col">&nbsp;</th>	
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                	<?php
									$conn = $connect;
									
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT stock.PCode, product.PName,product.PImage, stock.Qty , stock.AID, admin.AName,stock.DateAdded, stock.Remarks, stock.Status
									FROM ((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN admin ON stock.AID = admin.AID) 
									WHERE DATE(DateAdded) = '$currentDate' ORDER BY DateAdded DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PCode"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'><img width='125px' src='images/" . $row["PImage"]. "'></td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PName"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Qty"]. "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["AName"].  "</td>" ; 
									echo "<td style='text-align:center;color:forestgreen;font-weight:bold;'>" . $row["DateAdded"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Remarks"].  "</td>" ; 
									if($row["Status"] == 'Stock In'){
									echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-success'>" . $row["Status"].  "</span></td>" ; 
									}else{
										echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-danger'>" . $row["Status"]. "</span></td>" ;
									}
                                    ?>  
                                    <td>

                                    <?php
									echo "</tr>" ;
									}
									echo "</table>";
									} else { echo "0 results"; }
									
									?>    
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
	
	            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:auto%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col" style="padding-top:auto%;margin: auto; margin-top:auto%;margin-bottom:2%;">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
						<h2 class="tm-block-title d-inline-block" style="margin-left:3%;margin-top:2%;color:black;font-weight:bold;display:inline;">Low on Stock </h2>
                            </div>
							<div>
							<hr>
<script>
$(document).ready(function(){
  $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:99%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" id="myInput1" type="text" autocomplete=off name="searchname" placeholder="Search" ></h6>
<hr>
</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Code</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Image</th>
									    <th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Quantity</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;width:20%;">Category</th>
										<th scope="col">&nbsp;</th>	
                                    </tr>
                                </thead>
                                <tbody id="myTable1">
                                	<?php
									$conn = $connect;
									
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT product.PCode,product.PName,product.PImage,product.PQty,product.QType,product.CID,category.CName FROM product INNER JOIN category ON product.CID = category.CID WHERE PQty <= 5";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PCode"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'><img width='125px' src='images/" . $row["PImage"]. "'></td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PName"] . "</td>" ;
									echo "<td class='align-middle text-center text-sm' style='text-align:center;color:black;font-weight:bold;'> <span class='badge badge-sm bg-gradient-danger'>" . $row["PQty"]."</span> &nbsp;" . $row["QType"] ."</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["CName"].  "</td>" ; 
                                    ?>  
									<td>
									<div class='btn-group'> 
									<a href="AaddStock.php?details&id=<?php echo $row['PCode'];?>" class="btn btn-info">AddStock</a>	
									</td>
									</div>
                                    <?php
									echo "</tr>" ;
									}
									echo "</table>";
									} else { echo "0 results"; }
									
									?>    
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
</div>
	<script src="assets/js/core/jquery.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="assets/js/now-ui-dashboard.min.js" type="text/javascript"></script>
	</body>
</html>