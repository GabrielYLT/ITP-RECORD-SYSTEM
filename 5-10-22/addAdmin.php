<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "";
$error1 ="";
$error2 ="";
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
<?php
if(isset($_POST["sbtn"]))
{
 $FName = $_POST["fname"];
 $LName = $_POST["lname"];
 $Admin_Name = $_POST["name"];
 $Admin_Email = $_POST["email"];
 $Admin_Password = $_POST["pass1"];
 $Admin_PhoneNo = $_POST["dept"];
 $AStat = "Active";
 

if($_POST['pass'] === $_POST["pass1"]){
	$select= mysqli_query($connect, "SELECT * FROM admin WHERE AName = '".$_POST['name']."'");
	$select1 = mysqli_query($connect, "SELECT * FROM admin WHERE AEmail = '".$_POST['email']."'");
	if(mysqli_num_rows($select)) {
		 $error2="Username already in use !";

	?>
		<script type="text/javascript">
		alert("Username Already in Use!");
		
		</script>
		
	<?php 
	

}elseif(mysqli_num_rows($select1)) {
    $error="This email address is already registered";

	?>
		<script type="text/javascript">
		alert("Email Already in Use!");
		
		</script>
		
	<?php 
}else{
	 
	mysqli_query($connect,"INSERT INTO admin(AFirst,ALast,AName,AEmail,APassword,AStatus,ADate,Department)VALUES('$FName','$LName','$Admin_Name','$Admin_Email','$Admin_Password','$AStat','$currentDate','$Admin_PhoneNo')");
 
	?>
		<script type="text/javascript">
		alert("Added Successfully!");
		
		</script>
		
	<?php 
	 header("refresh:0.001;url=manage.php");
 }
 }else{
	 $error1="Password Entered Does not Match";
 }
 
}
?>


<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Add Admin</title>
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
<div class="wrapper"  style="overflow-x:hidden;background:none;height:100%" >
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
    <div class="main-panel" id="main-panel" style="height:100%;background-image: url('images/bg.jpg');background-size: cover;background-attachment: fixed;height: 100%;">
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
		<div><br><br><br></div>
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin: auto;margin-bottom:2%" >
            <div class="tm-col tm-col-big" style="padding-top:1%;margin: auto;width: 700px;">
                <div class="tm-block" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title" style="color:black;">Add New Admin</h1>
                        </div>
                    </div>
                    <div class="row" style="margin: auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data">
							<div class="form-group">
							<label for="name">First Name</label>
                                    <input value="" placeholder="Enter Your Firstname Here" name="fname" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"   required>
									 <label for="name">Last Name</label>
                                    <input value="" placeholder="Enter Your Lastname Here" name="lname" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"  required>
                            </div>
								<div class="form-group">
                                    <label for="name">Username </label>
                                    <input value="" placeholder="Enter Your Username Here" name="name" type="text" class="form-control"   required >
									 <span style="color: red;"><br><?php echo $error2 ?> </span>	
									
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email </label>
                                    <input value="" placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" required>
									<span style="color: red;"><br><?php echo $error ?> </span>	
							
                                </div>
								<div class="form-group">
                                    <label for="name">Password </label>
                                    <input value="" placeholder="Enter Your Password Here" name="pass" id="pass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required onkeyup='check();' class="form-control validate" required>
									 
									<span id="errorname"></span>
                                </div>
								<div class="form-group">
                                    <label for="name">Confirm Password </label>
                                    <input value="" placeholder="Confirm Your Password Here" name="pass1" id="pass1" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required onkeyup='check();' class="form-control validate" required >
									 
									<div >
										<label class="form-check-label" style="margin-left:22px;">
										<br>
										<input type="checkbox" class="form-check-input " onclick="myFunction()" style="width:15px;height:15px;box-shadow:1px 1px 2px 2px #00000050;" >Show Password
										<script type="text/javascript">
										function myFunction() {
										var x = document.getElementById("pass");
										var y = document.getElementById("pass1");
										if (x.type === "password") {
											x.type = "text";
											y.type = "text";
											
										} else {
											x.type = "password";
											y.type = "password";
										}
										}</script>
										</label>
									</div>
									<script>
									var check = function() {
									if(document.getElementById('pass').value == "" && document.getElementById('pass1').value == "" ){
										document.getElementById('message').style.color = 'red';
										document.getElementById('message').innerHTML = 'Please Enter a Password';
									}else{
										
										
									if (document.getElementById('pass').value ==
									document.getElementById('pass1').value) {
									document.getElementById('message').style.color = 'green';
									document.getElementById('message').innerHTML = 'Password Match';
									} else {
									document.getElementById('message').style.color = 'red';
									document.getElementById('message').innerHTML = 'Password Does Not Match';
										}	
									}
									}
									</script>
									<br>
									<span id="message" style="margin-left:3px"></span><span style="color: red;"><br> <?php echo $error1 ?> </span>	
								</div>
									<hr>
                        </div>
								<div class="select">
									<label for="gender">Department &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="dept" id="dept" required>
									<option value="" disabled selected>Select Department</option>
									<optgroup label="Department">
									<option value="Product">Product</option>
									<option value="General Use">General Use</option>
									<option value="Raw Material">Raw Material</option>
									<option value="Packing Material">Packing Material</option>
									<option value="All Department">All Department</option>
									
									</select>
									<br>
                                </div>
								
                                <div class="form-group">
								<hr>
                                    <div class="col-12 col-sm-6" style="float:right;">
									
                                        <button type="submit" style="float:right;" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Add</button>

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