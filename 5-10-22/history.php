<?php
include("Connection.php");
session_start();
error_reporting(0);
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

if(isset($_GET["details"])){
$ad_id=$_GET['id'];	
$result=mysqli_query($connect,"SELECT * FROM category WHERE CID='$ad_id'");
$row=mysqli_fetch_assoc($result);}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title><?php echo $row["CName"]." List" ?></title>
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
  box-shadow: inset 0 0 2px grey; 
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

label {
	color:black;
}
</style>
		</head>
	
	<body>
<div class="wrapper"  style="overflow:hidden;height:100%" >
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
		<div><br><br><br></div>
			<!-- row -->
		<div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin: auto;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;padding-bottom:1%;margin: auto; width:300px;">
                <div class="tm-block" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="get" class="tm-signup-form" enctype="multipart/form-data">
							<div class="form-group" style="display:inline;">
							<label style="font-size:14px;margin-top:10%;">Start: &nbsp;</label>
							<input type="date" name="start" class="datepicker" style="border-radius:10px;width:200px; ">
							</div>
							<br>
							<div class="form-group" style="display:inline;">
							<label style="font-size:14px;margin-top:1%;">End: &nbsp;</label>
							<input type="date" name="end" class="datepicker" style="border-radius:10px;width:207px; ">
							</div>
							<br>
							<div class="form-group" style="display:inline;">
							<label style="font-size:14px;margin-top:1%;">Category: &nbsp; </label>
							<select type="text" autocomplete="off"  list="code" style="border-radius:10px;width:169px;" placeholder="Select Category" name="cat">
							<option value="">Select Category</option>
							<option value="1">New Year Cookies</option>
							<option value="2">Raya Cookies</option>
							<option value="3">Mooncakes</option>
							<option value="4">Raw Material</option>
							<option value="5">Packing Material</option>
							<option value="6">General Use</option>
							</select>
							</div>
							<div class="button-group">
							<button type="submit" name="searchbtn"  class="btn btn-secondary" style="width:240px;height:50px;"> Search </button>
							</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			
            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col" style="padding-top:auto%;margin: auto; margin-bottom:2%;">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
							<?php
							if(isset($_GET["searchbtn"])){
										
										$start = $_GET["start"];
										$end = $_GET["end"];
										$cat = $_GET["cat"];
							}
							?>
							<h2 class="tm-block-title d-inline-block" style="margin-left:3%;margin-top:2%;color:black;font-weight:bold;">History</h2>
							<button class="btn btn-info" style="margin-right:3%;margin-top:3%;width:200px;float:right;">
							<a class="text-white text-capitalize" style="width:20%;margin:auto;"href="exportReport.php?print&start=<?php echo $start;?>&end=<?php echo $end;?>&cat=<?php echo $cat;?>">Download Report</a></button>
                            </div>
							<div>
							<hr>

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:99%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" autocomplete=off id="myInput" type="text" name="searchname" placeholder="Search" ></h6>
<hr>
</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Code</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Image</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Category</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Quantity</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Added On</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Added By</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Remarks</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Status</th>
										
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                	<?php
									$conn = $connect;
									

										
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT stock.PCode,product.PName,product.PImage,product.QType,product.CID,category.CName,SUM(stock.Qty) AS total_qty,Stock.AID,admin.AName,stock.DateAdded,stock.Remarks,stock.Status
									FROM (((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN category ON product.CID = category.CID)INNER JOIN admin ON stock.AID= admin.AID)
									WHERE product.CID = '$cat' AND DATE(DateAdded) BETWEEN '$start' AND '$end' group BY PCode,Status,AID ORDER BY DateAdded";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<tr><td style='text-align:center;color:black;font-weight:bold;'>" . $row["PCode"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'> <img width='125px' src='images/" . $row["PImage"]. "'></td>" ; 	
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["CName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["total_qty"]."&nbsp;&nbsp;". $row["QType"] ."</td>" ; 
									echo "<td style='text-align:center;color:forestgreen;font-weight:bold;'>" . $row["DateAdded"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["AName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Remarks"].  "</td>" ; 
									if($row["Status"] == 'Stock In'){
									echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-success'>" . $row["Status"].  "</span></td>" ; 
									}else{
										echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-danger'>" . $row["Status"]. "</span></td>" ;
									}
									echo "</tr>" ;
									}
									echo "</table>";
									} else { 
									$sql = "SELECT stock.PCode,product.PName,product.PImage,product.QType,product.CID,category.CName,SUM(stock.Qty) AS total_qty,Stock.AID,admin.AName,stock.DateAdded,stock.Remarks,stock.Status
									FROM (((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN category ON product.CID = category.CID)INNER JOIN admin ON stock.AID= admin.AID)
									WHERE DATE(DateAdded) BETWEEN '$start' AND '$end' group BY PCode,Status,AID ORDER BY DateAdded";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<tr><td style='text-align:center;color:black;font-weight:bold;'>" . $row["PCode"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'> <img width='125px' src='images/" . $row["PImage"]. "'></td>" ; 	
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["CName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["total_qty"]."&nbsp;&nbsp;". $row["QType"] ."</td>" ; 
									echo "<td style='text-align:center;color:forestgreen;font-weight:bold;'>" . $row["DateAdded"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["AName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Remarks"].  "</td>" ; 
									if($row["Status"] == 'Stock In'){
									echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-success'>" . $row["Status"].  "</span></td>" ; 
									}else{
										echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-danger'>" . $row["Status"]. "</span></td>" ;
									}
									echo "</tr>" ;
									}
									echo "</table>";
									} else { echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No results Found !"; }
									}
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