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


<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
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

</style>
		</head>
	
	<body>
<div class="wrapper"  style="overflow-x:hidden;background:none;" >
    <div class="sidebar">
	
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          JMM
        </a>
        <a href="#" class="simple-text logo-normal">
          DASHBOARD
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper" >
        <ul class="nav">
          <li>
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
            <a href="#">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
		   <li class="active">
            <a href="#">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Admin List</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons loader_gear"></i>
              <p>Manage</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons media-1_button-power"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
	  </div>
    </div>
    <div class="main-panel" id="main-panel" style="background-image: url('https://res.cloudinary.com/lamboplace/image/upload/f_auto,q_auto/v1591257893/products/yjofydgnvmqfsoi5p2hc.jpg');">
		<!-- row -->
		<div class="content" style="margin-left:15%;margin-right:15%">
			<br><br><br><br>
				<a href="addAdmin.php"><button type="button" class="btn btn-primary btn-lg" style="width: 350px;height: 200px;background-color:#ffc4b961"><h1 style="color:white;"><b>Add Admin</b></h3></button></a>
				<a href="#"><button type="button" class="btn btn-primary btn-lg" style="width: 350px;height: 200px;float:right;background-color:#ffc4b961"><h1 style="color:white;"><b>Add Product</b></h3></button></a>
				<a href="#"><button type="button" class="btn btn-primary btn-lg" style="width: 350px;height: 200px;background-color:#ffc4b961"><h1 style="color:white;"><b>Stock In</b></h3></button></a>
				<a href="#"><button type="button" class="btn btn-primary btn-lg" style="width: 350px;height: 200px;float:right;background-color:#ffc4b961"><h1 style="color:white;"><b>Stock Out</b></h3></button></a>
			<br><br><br><br><br><br><br><br><br>
		</div>
		
		

  </div>

	</body>
</html>