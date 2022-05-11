<?php
include("Connection.php");
session_start();
error_reporting(0);

?>



<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
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
		
	
	<body style="overflow-x: hidden;">
	<div class="wrapper"  >
	  <div class="main-panel" id="main-panel">
	       <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin:center;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;margin: auto; width:auto;">
                <div class="tm-block" style="background-color:#ff280061; border-radius:10px;width:auto;margin-top:5%">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title">Update Admin Account </h1>
                        </div>
                    </div>
                    <div class="row" style="margin:auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" >
                                <div class="form-group">
								<?php
								if(isset($_GET["edit"]))
								{
								$ad_id=$_GET['id'];
								$result=mysqli_query($connect,"SELECT * FROM admin WHERE AID='$ad_id'");
								$row=mysqli_fetch_assoc($result);
								}?>
								<?php
if(isset($_POST["sbtn"]))
{
	$admin_name = $_POST["name"];
    $admin_email = $_POST["email"];
    $admin_phone = $_POST["phone"];
    $admin_gender = $_POST["gender"];
	
	mysqli_query($connect,"UPDATE admin SET AName='$admin_name',
                                               AEmail='$admin_email',
                                               Department = '$admin_phone',
                                               AStatus = '$admin_gender'	
                                               WHERE AID = '$ad_id'");
		 ?>
		<script type="text/javascript">
		alert("Update Successfully!");
		
		</script>
		
		<?php 
	header("Refresh:0; url=admin_list.php");

}
mysqli_close($connect);
?>
                                    <label for="name">Username </label>
                                    <input value="<?php echo $row['AName']?>" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"  required >
									 
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email </label>
                                    <input value="<?php echo $row['AEmail']?>" placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" readonly>
									<span id="erroremail"></span>	
                                </div>
								<div class="select">
                                    <br>
									<label for="gender">Department &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="phone" id="gender" required>
									<option value="<?php echo $row['Department']?>"><?php echo $row['Department']?></option>
									<optgroup label="Department">
									<option value="Product">Product</option>
									<option value="General Use">General Use</option>
									<option value="Raw Material">Raw Material</option>
									<option value="All Department">All Department</option>
									</select>
                                </div>
								<div class="select">
                                    <br>
									<label for="gender">Status &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="gender" id="gender" required>
									<option value="<?php echo $row['AStatus']?>"><?php echo $row['AStatus']?></option>
									<optgroup label="Status">
									<option value="Active">Active</option>
									<option value="Suspended">Suspended</option>
									<option value="Blocked">Blocked</option>
									</select>
                                </div>
								<hr>
                                <div class="form-group">
                                    <div class="col-12 col-sm-6">
									
                                        <button type="submit" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Update 
                                        </button>
										<a href="nChangPass.php?cPass&id=<?php echo $row['AID'];?>" class="btn btn-info" style="width:150px;height:auto;margin-left:70%;margin-top:-85px;">Change Password</a>
										
										<a href="admin_list.php" class="btn btn-danger" style="height:suto;margin-left:175%;margin-top:-66%;">Return</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			</div>
    <div class="sidebar" data-color="red" style="opacity:85%;" >
	
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          JMM
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          DASHBOARD
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper" >
        <ul class="nav">
          <li class="active">
            <a href="./dashboard.html">
              <i class="now-ui-icons education_paper"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a>
              <i class="now-ui-icons design_bullet-list-67"></i>
              <h3 class="dropdown-header" style="color:white;">Category</h3>
			  <a class="dropdown-item" style="width:80%;margin-left:13%;" href="#"><i class="now-ui-icons design_palette"></i>New Year Cookies</a>
			  <a class="dropdown-item" style="width:80%;margin-left:13%;" href="#"><i class="now-ui-icons design_palette"></i>Raya Cookies</a>
			  <a class="dropdown-item" style="width:80%;margin-left:13%;" href="#"><i class="now-ui-icons design_palette"></i>Mooncakes</a>
			  <a class="dropdown-item" style="width:80%;margin-left:13%;" href="#"><i class="now-ui-icons design_palette"></i>Packing Material</a>
			  <a class="dropdown-item" style="width:80%;margin-left:13%;" href="#"><i class="now-ui-icons design_palette"></i>Raw Material</a>
			  <a class="dropdown-item" style="width:80%;height:10%;margin-left:13%;" href="#"><i class="now-ui-icons design_palette"></i>General Use</a>
			  
			</a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
		   <li>
            <a href="./map.html">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Admin List</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="now-ui-icons loader_gear"></i>
              <p>Manage</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="now-ui-icons media-1_button-power"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
	  </div>
    </div>

  
		<!-- row -->
 
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
	</body>
</html>