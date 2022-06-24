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
	
	
}

$Admin_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM admin WHERE AID = $Admin_id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<style>
.dropbtn {
  background-color: gray;
  color: white;
  font-size: 14px;
  border: none;
  cursor: pointer;
  width:105%;
  opacity:50%;

  
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
  width:100%;
  margin-top:15.5%;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
	<head>
	<meta charset="UTF-8">
	<title>Home</title>
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
		</head>
	
	<body>
<div class="wrapper"  style="overflow-x:hidden;background-image: url('images/dbg.jpg');background-size: cover;" >
    <!-- Navbar -->
      <div><nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" >
        <div class="container-fluid">
          <div class="navbar-wrapper">
            
            <a class="navbar-brand" href="generalD.php">JMM Record System</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
			  <li class="nav-item">
			   <Tooltip title="Add New Product">
                <a class="nav-link" href="DaddNewProduct.php">
                  <i class="now-ui-icons ui-1_simple-add"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Add New Product</span>
                  </p>
                </a>
			  </Tooltip>
              </li>
			  <li class="nav-item">
			   <Tooltip title="Home">
                <a class="nav-link" href="generalD.php">
                  <i class="now-ui-icons business_bank"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Home</span>
                  </p>
                </a>
              </li>
			  <li class="nav-item">
			   <Tooltip title="History">
                <a class="nav-link" href="hstory.php">
                  <i class="now-ui-icons files_paper"></i>
                  <p>
                    <span class="d-lg-none d-md-block">History</span>
                  </p>
                </a>
			   </Tooltip>
              </li>
              <li class="nav-item">
			   <Tooltip title="Profile">
                <a class="nav-link" href="Dprofile.php">
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
      </nav></div>
      <!-- End Navbar -->
	  <div style="height:10%;">
      </div>
    <div class="content" style="margin-left:11%;margin-top:11%;margin-right:11%;">
			<!-- row -->
        <a href="addStock.php"><button type="button" class="btn btn-primary btn-lg" style="width: 400px;height: 250px;background-color:#ff280061;display:inline;"><h1 style="color:white;"><b>Stock In</b></h3></button></a>
		<a href="stockOut.php"><button type="button" class="btn btn-primary btn-lg" style="width: 400px;height: 250px;float:right;background-color:#ff280061;display:inline;"><h1 style="color:white;"><b>Stock Out</b></h3></button></a>
	</div><br><br><br><br><br><br><br><br><br><br><br>
	<div class="row" style="height:100%">
			  <div style="padding:2%;">
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;height:100%;">
				  <div class="card-header">
					<h5 class="card-category">Category</h5>
					<h4 class="card-title">New Year Cookies</h4>
					<br>
					<div style="width: auto%; height: 100%; overflow-x:hidden;">
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
									echo $row["PName"] ."</h5>";
									if($row["PQty"] == '0'){
									echo "<span class='badge badge-danger' style='float:right'>";
									echo $row["PQty"]."</span>" ;" </li>" ;}elseif($row["PQty"] <= '5'){
									echo "<span class='badge badge-warning' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;
									}else{
									echo "<span class='badge badge-info' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;										
									}
									?> <br><br><hr><div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div><?php
									echo " </ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
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