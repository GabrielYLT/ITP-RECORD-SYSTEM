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
<div class="wrapper"  style="overflow:hidden;background:none;" >
    <div class="sidebar" data-color="blue"  >
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
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="./dashboard.html">
              <i class="now-ui-icons education_paper"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a >
              <i class="now-ui-icons design_bullet-list-67"></i>
              <h3 class="dropdown-header" style="color:white;">Category</h6>
			<?php
									$conn = mysqli_connect("localhost", "root", "", "itp");

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM category";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<a class='dropdown-item' style='width:70%;margin-left:13%;' href='#'><i class='now-ui-icons design_palette'></i>". $row["CName"] ."</a>";
									}
									}
                                    ?> 
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
    <div class="main-panel" id="main-panel">
			<!-- row -->
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin: auto;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;margin: auto; width: 700px;">
                <div class="tm-block" style="background-color:#00b4ff; border-radius:10px;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title">Add New Admin</h1>
                        </div>
                    </div>
                    <div class="row" style="margin: auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Username </label>
                                    <input value="" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"  required >
									 
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email </label>
                                    <input value="" placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div class="form-group">
                                    <label for="name">Password </label>
                                    <input value="" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"  required >
									 
									<span id="errorname"></span>
                                </div>
								<div class="form-group">
                                    <label for="name">Confirm Password </label>
                                    <input value="" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"  required >
									 
									<span id="errorname"></span>
                                </div>
								<div class="select">
									<label for="gender">Department &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="gender" id="gender" required>
									<option value="">Select Department</option>
									<optgroup label="Department">
									<option value="p">P</option>
									<option value="s">S</option>
									<option value="a">A</option>
									</select>
                                </div>
								<div class="select">
                                    <br>
									<label for="gender">Status &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="gender" id="gender" required>
									<option value="">Select Status</option>
									<optgroup label="Status">
									<option value="Active">Active</option>
									<option value="Suspended">Suspended</option>
									<option value="Blocked">Blocked</option>
									</select>
                                </div>
								<hr>
                                <div class="form-group">
                                    <div class="col-12 col-sm-6">
									
                                        <button type="submit" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Add</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>
		
		

  </div>

	</body>
</html>