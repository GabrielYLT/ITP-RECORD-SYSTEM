<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "";
$error1 ="";
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
$select = mysqli_query($connect, "SELECT * FROM admin WHERE AEmail = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
    $error="This email address is already registered";
	?>
		<script type="text/javascript">
		alert("Email Already in Use!");
		
		</script>
		
	<?php 
}else{
	 
	mysqli_query($connect,"INSERT INTO admin(AFirst,ALast,AName,AEmail,APassword,AStatus,Department)VALUES('$FName','$LName','$Admin_Name','$Admin_Email','$Admin_Password','$AStat','$Admin_PhoneNo')");
 
	?>
		<script type="text/javascript">
		alert("Added Successfully!");
		
		</script>
		
	<?php 
 }
 }else{
	 $error1="Password Entered Does not Match";
 }
 
}
?>
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
<div class="wrapper"  style="overflow-x:hidden;background:none;" >
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
    <div class="main-panel" id="main-panel">
			<!-- row -->
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin: auto;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;margin: auto; width: 700px;">
                <div class="tm-block" style="background-color:#ff280061; border-radius:10px;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title">Add New Admin</h1>
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
                                    <input value="" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" title="Please Enter Your NRIC Name , no letter or symbols accepted !"  required >
									 
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email </label>
                                    <input value="" placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" required>
									<span style="color: red;"><br><?php echo $error ?> </span>	
							
                                </div>
								<div class="form-group">
                                    <label for="name">Password </label>
                                    <input value="" placeholder="Enter Your Username Here" name="pass" id="pass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required onkeyup='check();' class="form-control validate" required>
									 
									<span id="errorname"></span>
                                </div>
								<div class="form-group">
                                    <label for="name">Confirm Password </label>
                                    <input value="" placeholder="Enter Your Username Here" name="pass1" id="pass1" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required onkeyup='check();' class="form-control validate" required >
									 
									<div >
										<label class="form-check-label" style="margin-left:22px;">
										<br>
										<input type="checkbox" class="form-check-input" onclick="myFunction()" style="width:15px;height:15px;" >Show Password
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
									<option value="">Select Department</option>
									<optgroup label="Department">
									<option value="Product">Product</option>
									<option value="General Use">General Use</option>
									<option value="Raw Material">Raw Material</option>
									<option value="Packing Material">Packing Material</option>
									<option value="All Department">All Department</option>
									
									</select>
									<br>
                                </div>
								<hr>
                                <div class="form-group">
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

	</body>
</html>