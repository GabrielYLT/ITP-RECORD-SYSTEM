<?php
include("Connection.php");
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kuala_Lumpur");
$currentDate = date('Y-m-d H:i:s',time());
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
<?php	
if(isset($_POST["sbtn"]))
{
	$productname = $_POST["pcode"];
	$productprice = $_POST["qty"];
	$productstock = $_POST["remark"];
	$exp = $_POST["exp"] ;
	$productStatus = "Stock In";
	
	
	$select = mysqli_query($connect, "SELECT * FROM product WHERE PCode = '".$_POST['pcode']."'");
	if(mysqli_num_rows($select)) {
	
	mysqli_query($connect,"UPDATE product SET PQty = PQty + '$productprice '
                                               WHERE PCode= '$productname'");
	
	
 	$sql=mysqli_query($connect,"INSERT INTO stock(PCode,Qty,AID,DateAdded,Remarks,Status,exp) 
	VALUES('$productname','$productprice','$_SESSION[id]','$currentDate','$productstock','$productStatus','$exp')");
	header("refresh:0.001;url=AaddStock.php");
	


?>
		<script type="text/javascript">
		alert("Stock Added Successfully!");
		
		</script>
		
	<?php 
	}else{
	 header("refresh:0.001;url=AaddStock.php");
	


	?>
		<script type="text/javascript">
		alert("Product Not Found!");
		
		</script>
		
	<?php }
 }
 
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Add Stock</title>
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- CSS Files -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
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
<div class="wrapper"  style="overflow-x:hidden;background:none;" >
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
              <h3 href="#demo" data-bs-toggle="collapse" class="dropdown-header" style="color:white;">Category</h3>
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
				
			echo "<ul id='demo' class='nav collapse' style='padding'>";
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
	  <div style="height:10%;">
      </div>
			<!-- row -->
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin: auto;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;padding-bottom:1%;margin: auto; width: 700px;">
                <div class="tm-block" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title" style="color:black;">Stock In</h1>
                        </div>
                    </div>
                    <div class="row" style="margin: auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data">

								<div >
									<label for="gender" style="color:black;">Product Name &nbsp; </label>
									<input  type="text" class="form-control selectList"  autocomplete="off"  list="code" placeholder="Please Enter Product Code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="pcode1" id="gender" required>
									<datalist id="code">
									<?php
									$conn = $connect;
									if(isset($_GET["details"])){
								
									$ad_id=$_GET['id'];

									
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									
									$sql = "SELECT * FROM product WHERE PCODE = '$ad_id'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["PName"] . "'>". $row["PCode"]."</option>";
									}
									} else { echo "0 results"; } 
									}else{
										
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									
									$sql = "SELECT * FROM product";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["PName"] . "'>". $row["PCode"]."</option>";
									}
									} else { echo "0 results"; } 
										
									}
									?>    
									</datalist>
                                </div>
								
								<div id="txtHint" style="margin-left:1%;margin-top:2%;" style="color:black;">Product Name Will be Displayed Here...</div>
								  <script>
  function showCustomer(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "StockInName.php?q="+str);
    xhttp.send();
  }
  </script>
  <hr>
								<div class="form-group" style="margin-bottom:0%;">
                                    <label for="Qty" style="color:black;">Quantity </label>
                                    <input value="" placeholder="Please Enter Product Quantity" id="number" min="0" name="qty" type="number" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div class="form-group" style="margin-bottom:0%;">
                                    <label for="Date" style="color:black;">Expire </label>
                                    <input value="" placeholder="Please Select Product Expire" id="minDate" name="exp" type="date" class="form-control validate" >
									<span id="erroremail"></span>	
									<script>
									$(document).ready(function () {
										var today = new Date().toISOString().split('T')[0];
										$("#minDate").attr('min', today);
									});
									</script>
                                </div>
								<div class="form-group" style="margin-bottom:0%;">
                                    <label for="email" style="color:black;">Remarks </label>
                                    <textarea style="border-radius:10px;border: 1px solid #00000030;" value="" rows="4" cols="50" placeholder="Remarks" id="email" name="remark" type="text" class="form-control validate"></textarea>
									<span id="erroremail"></span>	
                                </div>
								<hr>
                                <div class="form-group">
                                    <div class="col-12 col-sm-6" style="float:right;">
									
                                        <button style="float:right;" type="submit" name="sbtn" class="btn btn-info" onclick="Profile Updated">Add</button>

                                    </div>
                                </div>
                            </form>
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