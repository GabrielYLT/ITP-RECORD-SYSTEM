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
?>
<?php
								if(isset($_GET["details"]))
								{
								$ad_id=$_GET['id'];
								$result=mysqli_query($connect,"SELECT product.PCode,product.PName, product.PImage, product.PQty ,product.QType, product.CID,product.Stor, category.CName
								FROM product INNER JOIN category ON product.CID= category.CID WHERE PCode='$ad_id'");
								$row=mysqli_fetch_assoc($result);
								$CID = $row['CID'];
								}?>
<?php
if(isset($_POST["sbtn"]))
{
	$productname = $_POST["pname"];
	$product_image = $_FILES['profileImage']['name'];
	$productcode = $_POST["pcode"];
	$type = $_POST["type"];
	$productstock = $_POST["category"];
	
	$Image= $row['PImage'];
	
	if(empty($product_image)){
		
		$sql=mysqli_query($connect,"Update product SET PName = '$productname',
												   QType = '$type',
												   CID = '$productstock'
												   WHERE PCode = '$ad_id'");
		header("refresh:0.001;url=list.php?details&id=$CID");
	}else{


	$sql=mysqli_query($connect,"Update product SET PName = '$productname',
												   QType = '$type',
												   CID = '$productstock',
												   PImage = '$product_image'
												   WHERE PCode = '$ad_id'");

	header("refresh:0.001;url=list.php?details&id=$CID");
	$target = 'images/' . $product_image;
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target))
        {
          $msg = "upload successfully";
		  $css_class = "alert-sucess";
        }
        else{
          $msg = "problem occur.";
		  $css_class = "alert-danger";
        }

?>
		<script type="text/javascript">
		alert("Updated Successfully!");
		
		</script>
		
	<?php 

}
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- CSS Files -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"/>
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

	


</style>
		</head>
	
	<body>
<div class="wrapper"  style="background:none;height:100%" >
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
		<div><br><br><br></div>
			<!-- row -->
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin: auto;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;padding-bottom:1%;margin: auto;width: 700px;">
                <div class="tm-block" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title" style="color:black;">Edit Product</h1>
                        </div>
                    </div>
                    <div class="row" style="margin: auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data">
							<div >
							<div class="form-group" style="text-align:center;">
								
								<hr>
									<label for="gender"><h4>Product Image &nbsp;</h4> </label>
									<div class="d-flex flex-column align-items-center text-center p-2 py-3">
									<img class="" style="margin:auto;width:150px;height:auto%;border-radius:30px;" img src="images/<?php echo $row['PImage'] ?>" type="image" class="form-control selectList"  autocomplete="off"  list="code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="" id="gender" readonly>
									</div>
									</div>				
								<input type="file" value="" name="profileImage" id="profileImage" class="form-control">
							</div>
							<hr>
                                <div class="form-group">
                                    <label for="name">Product Code </label>
                                    <input value="<?php echo $row['PCode']?>" placeholder="Please Enter Product Code Here" name="pcode" type="text" class="form-control"  autocomplete="off" readonly >
									 
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Product Name </label>
                                    <input value="<?php echo $row['PName'] ?>" placeholder="Please Enter Product Name" id="email" name="pname" type="text" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div class="form-group">
                                    <label for="stor">Stor </label>
                                    <input value="<?php echo $row['Stor'] ?>" placeholder="Please Enter Product Stor"  name="stor" type="text" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div class="select">
									<label for="gender"> Quantity Type &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="type" id="gender" required>
									<option value="<?php echo $row['QType']?>"><?php echo $row['QType']?></option>
									<optgroup label="Group">
									<option value="bag">bag</option>
									<option value="bottle">bottle</option>
									<option value="ctn">ctn</option>
									<option value="drum">drum</option>
									<option value="jar">jar</option>
									<option value="kg">kg</option>
									<option value="pack">pack</option>
									<option value="pieces">pieces</option>
									<option value="ream">ream</option>
									<option value="roll">roll</option>
									<option value="tong">tong</option>
									<option value="tube">tube</option>
									<option value="unit">unit</option>
									</select>
                                </div>
								<div class="select">
									<label for="gender">Category &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="category" id="gender" required>
									<option value="<?php echo $row['CID']?>"><?php echo $row['CName']?></option>
									<optgroup label="Group">
									<option value="1">New Year Cookies</option>
									<option value="2">Raya Cookies</option>
									<option value="3">Mooncakes</option>
									<option value="4">Raw Material </option>
									<option value="5">Packing Material</option>
									<option value="6">General Use</option>
									</select>
                                </div>
								<hr>
                                <div class="form-group">
                                    <div class="col-12 col-sm-6" style="float:right;">
									
                                        <button style="float:right;" type="submit" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Update</button>

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