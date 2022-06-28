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
  width:100%;
  opacity:100%;
  border-radius:10px;



  
}

.dropbtn:hover, .dropbtn:focus {
  background-color: 	#282828;
}

.dropdown1 {
  position: relative;
  display: inline-block;
  width:100%;

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #181818;
  min-width: 100%;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius:10px;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color:#282828; color: white;}

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
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>
	<div class="row" style="height:100%">
			  <div style="padding:2%;">
				<div class="card card-chart" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;height:100%;">
				  <div class="card-header">
					<h5 class="card-category">Product Quantity</h5>
					<h4 class="card-title"><?php 
					if(($row['Department'] === "Product")){
						
						echo "Cookies";
						
					}elseif(($row['Department'] === "General Use")){
						
						echo "General Use";
						
					}elseif(($row['Department'] === "Raw Material")){
						
						echo "Raw Material";
						
					}elseif(($row['Department'] === "Packing Material")){
						
						echo "Packing Material";
						
					}	
					?></h4>
					

					<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue, txtValue1;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a =  li[i].getElementsByTagName("h5")[0];
    txtValue = a.textContent || a.innerText ;
	
	span =  li[i].getElementsByTagName("span")[0];
    txtValue1 = span.textContent || span.innerText ;
	
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else if (txtValue1.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
  
}
</script>
					<hr>
					<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:99%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" id="myInput" type="text" autocomplete="off" name="searchname" placeholder="Search" onkeyup="myFunction()"></h6>
					<hr>
					<div style="width: auto%; height:550px; overflow-x:hidden;" >
					<ul class="list-group" id="myUL">

									<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									if(($row['Department'] === "Product")){
									$sql = "SELECT * FROM product WHERE CID = '1' OR CID ='2' OR CID = '3' ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<li class='list-group-item' ><h5>";
									echo $row["PName"] ."</h5>";
									echo "<span> Stor : ".$row["Stor"]."</span>";
									echo "<span class='badge ' style='float:right'><a href='DeditProduct.php?edit&id=".$row["PCode"]."' style='color:SteelBlue;opacity:100%;'>Edit</a></span>";
									if($row["PQty"] == '0'){
									echo "<span class='badge badge-danger' style='float:right'>";
									echo $row["PQty"]."</span>" ;" </li>" ;}elseif($row["PQty"] <= '5'){
									echo "<span class='badge badge-warning' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;
									}else{
									echo "<span class='badge badge-info' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;										
									}
									$pname = $row["PName"] ; 
									$pcode = $row["PCode"] ;	
								
									?><br><hr><select class="dropdown1" style="background-color:#282828;color:white;opacity:100%;">
									
									<option selected disabled><h1>Specific Expire Quantity <h1></option>
<?php
									$sql1 = "SELECT stock.Pcode,product.PName,product.QType,Qty,exp, DateAdded FROM stock INNER JOIN product ON stock.PCode = product.PCode WHERE product.PCode = '$pcode' AND Qty >='1'  group BY exp,'$pname' ORDER BY exp DESC";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
					
									while($row1 = $result1->fetch_assoc() ) {
									$exp = $row1["exp"];
									 
									 

									$RexpIn=mysqli_query($connect,"SELECT SUM(Qty) AS inStock FROM stock WHERE Status = 'Stock In' AND PCode = '$pcode' AND exp = '$exp' group BY exp,'$pname'");
									$expIn = mysqli_fetch_assoc($RexpIn);
									
									$RexpOut=mysqli_query($connect,"SELECT SUM(Qty) AS outStock FROM stock WHERE Status = 'Stock Out' AND PCode = '$pcode' AND exp = '$exp' group By exp,'$pname'");
									$expOut = mysqli_fetch_assoc($RexpOut);
									
									$in = $expIn["inStock"] ;
									$out = $expOut["outStock"];
									
									$subtotal = $in - $out ;
								
									if($subtotal != '0'){
									echo "<option ><a>" .$row1["exp"]."&nbsp; = &nbsp;".$subtotal. $row1["QType"] ."</a></option>";
									}
									
									}
									} else { echo "0 results"; }
									?>

</select>

<?php
							
									}
									} else { echo "0 results"; }
									}elseif(($row['Department'] === "General Use")){
									$sql = "SELECT * FROM product WHERE CID = '6'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo " <li class='list-group-item' ><h5>";
									echo $row["PName"] ."</h5>";
									echo "<span> Stor : ".$row["Stor"]."</span>";
									echo "<span class='badge ' style='float:right'><a href='DeditProduct.php?edit&id=".$row["PCode"]."' style='color:SteelBlue;opacity:100%;'>Edit</a></span>";
									if($row["PQty"] == '0'){
									echo "<span class='badge badge-danger' style='float:right'>";
									echo $row["PQty"]."</span>" ;" </li>" ;}elseif($row["PQty"] <= '5'){
									echo "<span class='badge badge-warning' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;
									}else{
									echo "<span class='badge badge-info' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;										
									}
									$pname = $row["PName"] ; 
									$pcode = $row["PCode"] ;	
									?><br><hr><select class="dropdown1" style="background-color:#282828;color:white;opacity:100%;">
									
									<option selected disabled><h1>Specific Expire Quantity <h1></option>
<?php
									$sql1 = "SELECT stock.Pcode,product.PName,produtc.QType,Qty,exp, DateAdded FROM stock INNER JOIN product ON stock.PCode = product.PCode WHERE product.PCode = '$pcode' AND Qty >='1'  group BY exp,'$pname' ORDER BY exp DESC";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
					
									while($row1 = $result1->fetch_assoc() ) {
									$exp = $row1["exp"];
									 
									 

									$RexpIn=mysqli_query($connect,"SELECT SUM(Qty) AS inStock FROM stock WHERE Status = 'Stock In' AND PCode = '$pcode' AND exp = '$exp' group BY exp,'$pname'");
									$expIn = mysqli_fetch_assoc($RexpIn);
									
									$RexpOut=mysqli_query($connect,"SELECT SUM(Qty) AS outStock FROM stock WHERE Status = 'Stock Out' AND PCode = '$pcode' AND exp = '$exp' group By exp,'$pname'");
									$expOut = mysqli_fetch_assoc($RexpOut);
									
									$in = $expIn["inStock"] ;
									$out = $expOut["outStock"];
									
									$subtotal = $in - $out ;
								
									 
									if($subtotal != '0'){
									echo "<option ><a>" .$row1["exp"]."&nbsp; = &nbsp;".$subtotal. $row1["QType"] ."</a></option>";
									}
									
									}
									} else { echo "0 results"; }
									?>

</select>
<?php
								
									}
									} else { echo "0 results"; }
									}elseif(($row['Department'] === "Packing Material")){
									$sql = "SELECT * FROM product WHERE CID = '5'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<li class='list-group-item' ><h5>";
									echo $row["PName"] ."</h5>";
									echo "<span> Stor : ".$row["Stor"]."</span>";
									echo "<span class='badge ' style='float:right'><a href='DeditProduct.php?edit&id=".$row["PCode"]."' style='color:SteelBlue;opacity:100%;'>Edit</a></span>";
									if($row["PQty"] == '0'){
									echo "<span class='badge badge-danger' style='float:right'>";
									echo $row["PQty"]."</span>" ;" </li>" ;}elseif($row["PQty"] <= '5'){
									echo "<span class='badge badge-warning' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;
									}else{
									echo "<span class='badge badge-info' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;										
									}
									$pname = $row["PName"] ; 
									$pcode = $row["PCode"] ;	 
									?><br><hr><select class="dropdown1" style="background-color:#282828;color:white;opacity:100%;">
									
									<option selected disabled><h1>Specific Expire Quantity <h1></option>
<?php
									$sql1 = "SELECT stock.Pcode,product.PName,product.QType,Qty,exp, DateAdded FROM stock INNER JOIN product ON stock.PCode = product.PCode WHERE product.PCode = '$pcode' AND Qty >='1'  group BY exp,'$pname' ORDER BY exp DESC";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
					
									while($row1 = $result1->fetch_assoc() ) {
									$exp = $row1["exp"];
									 
									 

									$RexpIn=mysqli_query($connect,"SELECT SUM(Qty) AS inStock FROM stock WHERE Status = 'Stock In' AND PCode = '$pcode' AND exp = '$exp' group BY exp,'$pname'");
									$expIn = mysqli_fetch_assoc($RexpIn);
									
									$RexpOut=mysqli_query($connect,"SELECT SUM(Qty) AS outStock FROM stock WHERE Status = 'Stock Out' AND PCode = '$pcode' AND exp = '$exp' group By exp,'$pname'");
									$expOut = mysqli_fetch_assoc($RexpOut);
									
									$in = $expIn["inStock"] ;
									$out = $expOut["outStock"];
									
									$subtotal = $in - $out ;
								
									if($subtotal != '0'){
									echo "<option ><a>" .$row1["exp"]."&nbsp; = &nbsp;".$subtotal. $row1["QType"] ."</a></option>";
									}
									
									}
									} else { echo "0 results"; }
									?>

</select>
<?php
									
									}
									} else { echo "0 results"; }
									}elseif(($row['Department'] === "Raw Material")){
									$sql = "SELECT * FROM product WHERE CID = '4'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<li class='list-group-item'><h5>";
									echo $row["PName"] ."</h5>";
									echo "<span> Stor : ".$row["Stor"]."</span>";
									echo "<span class='badge ' style='float:right'><a href='DeditProduct.php?edit&id=".$row["PCode"]."' style='color:SteelBlue;opacity:100%;'>Edit</a></span>";
									if($row["PQty"] == '0'){
									echo "<span class='badge badge-danger' style='float:right'>";
									echo $row["PQty"]."</span>" ;" </li>" ;}elseif($row["PQty"] <= '5'){
									echo "<span class='badge badge-warning' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;
									}else{
									echo "<span class='badge badge-info' style='float:right'>";
									echo $row["PQty"]."</span>" ;"</li>" ;										
									}
									
									$pname = $row["PName"] ; 
									$pcode = $row["PCode"] ;	
									?><br><hr><select class="dropdown1" style="background-color:#282828;color:white;opacity:100%;">
									
									<option selected disabled><h1>Specific Expire Quantity <h1></option>
<?php
									$sql1 = "SELECT stock.Pcode,product.PName,product.QType,Qty,exp, DateAdded FROM stock INNER JOIN product ON stock.PCode = product.PCode WHERE product.PCode = '$pcode' AND Qty >='1'  group BY exp,'$pname' ORDER BY exp DESC";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
					
									while($row1 = $result1->fetch_assoc() ) {
									$exp = $row1["exp"];
									 
									 

									$RexpIn=mysqli_query($connect,"SELECT SUM(Qty) AS inStock FROM stock WHERE Status = 'Stock In' AND PCode = '$pcode' AND exp = '$exp' group BY exp,'$pname'");
									$expIn = mysqli_fetch_assoc($RexpIn);
									
									$RexpOut=mysqli_query($connect,"SELECT SUM(Qty) AS outStock FROM stock WHERE Status = 'Stock Out' AND PCode = '$pcode' AND exp = '$exp' group By exp,'$pname'");
									$expOut = mysqli_fetch_assoc($RexpOut);
									
									$in = $expIn["inStock"] ;
									$out = $expOut["outStock"];
									
									$subtotal = $in - $out ;
								
									if($subtotal != '0'){
									echo "<option ><a>" .$row1["exp"]."&nbsp; = &nbsp;".$subtotal. $row1["QType"] ."</a></option>";
									}
									
									}
									} else { echo "0 results"; }
									?>

</select>

<?php
					
									}
									} else { echo "0 results"; }
									}
									?>		
						</ul>
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