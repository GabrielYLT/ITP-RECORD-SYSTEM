<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "";
$error1 ="";
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
	<link rel="icon" type="image/x-icon" href="images/icons/d.ico">
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

</style>
		</head>
	
	<body>
<div class="wrapper"  style="background:none;" >
    <div class="sidebar" data-color="pink">
	
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          JMM
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          DASHBOARD
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
			<ul class="nav" style="padding">
				<li ><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=1"><i class="now-ui-icons design_palette"></i>New Year Cookies</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=2"><i class="now-ui-icons design_palette"></i>Raya Cookies</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=3"><i class="now-ui-icons design_palette"></i>Mooncakes</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=4"><i class="now-ui-icons design_palette"></i>Raw Material</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=5"><i class="now-ui-icons design_palette"></i>Packing Material</a></li>
				<li><a class="dropdown-item" style="width:80%;height:10%;margin-left:13%;" href="list.php?details&id=6"><i class="now-ui-icons design_palette"></i>General Use</a></li>
			</ul>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
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
    <div class="main-panel" id="main-panel" style="background-image: url('');">
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
							<a class="nav-link" href="viewProfile.php">
							    <i class="now-ui-icons users_single-02"></i>
							    <p>
									<span class="d-lg-none d-md-block">Profile</span>
							    </p>
							</a>
					    </li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">
							    <i class="now-ui-icons media-1_button-power"></i>
							    <p>
									<span class="d-lg-none d-md-block">Logout</span>
							    </p>
							</a>
					    </li>
					</ul>
			    </div>
			</div>
        </nav>
		<!-- row -->
		<div class="panel-header panel-header-lg">
			<canvas id="chart" style="width:100%;height:100%;"></canvas>
		 </div>
		<script>
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
					labels: xValues,
					datasets: [{
						label: "Stock",
						backgroundColor: gradientBkgrd,
						borderColor: gradientStroke,
						data: yValues,
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
					scales: {
						xAxes: [{
							gridLines: {
								display:false
							},
							ticks: {fontColor: 'white'}
						}],
						yAxes: [{
							ticks: {fontColor: 'white',stepSize: 40}
						}],
					}
				}
			});
		</script>
		<div class="content">
			<div class="row">
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart">
				  <div class="card-header">
					<h5 class="card-category">Email Statistics</h5>
					<h4 class="card-title">24 Hours Performance</h4>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart">
				  <div class="card-header">
					<h5 class="card-category">Email Statistics</h5>
					<h4 class="card-title">24 Hours Performance</h4>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart">
				  <div class="card-header">
					<h5 class="card-category">Email Statistics</h5>
					<h4 class="card-title">24 Hours Performance</h4>
				  </div>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart">
				  <div class="card-header">
					<h5 class="card-category">Email Statistics</h5>
					<h4 class="card-title">24 Hours Performance</h4>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart">
				  <div class="card-header">
					<h5 class="card-category">Email Statistics</h5>
					<h4 class="card-title">24 Hours Performance</h4>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="card card-chart">
				  <div class="card-header">
					<h5 class="card-category">Email Statistics</h5>
					<h4 class="card-title">24 Hours Performance</h4>
				  </div>
				</div>
			  </div>
			</div>
		</div>
		<div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col" style="padding-top:1%;margin: auto; margin-bottom:2%;">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
						<h2 class="tm-block-title d-inline-block" style="margin-left:3%;margin-top:2%;color:black;font-weight:bold;display:inline;">Activity Log<h2><h2 style="margin-left:3%;margin-top:2%;color:black;font-weight:bold;display:inline;" id="current_date"></h2>			
<script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("current_date").innerHTML = month + "/" + day + "/" + year;
</script>
							
                            </div>
							<div>
							<hr>

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:30%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" id="myInput" type="text" name="searchname" placeholder="Search" ></h6>
<hr>
</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Code</th>
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
									FROM ((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN admin ON stock.AID = admin.AID) WHERE DATE(DateAdded) = CURDATE()";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PCode"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'><img width='125px' src='images/" . $row["PImage"]. "'></td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PName"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Qty"]. "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["AName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["DateAdded"].  "</td>" ; 
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

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:30%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" id="myInput" type="text" name="searchname" placeholder="Search" ></h6>
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
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Category</th>
										<th scope="col">&nbsp;</th>	
                                    </tr>
                                </thead>
                                <tbody id="myTable">
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