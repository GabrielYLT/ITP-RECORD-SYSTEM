<?php
include("Connection.php");
session_start();
error_reporting(0);
?><?php
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
								if(isset($_GET["edit"]))
								{
								$ad_id=$_GET['id'];
								$result=mysqli_query($connect,"SELECT * FROM admin WHERE AID='$ad_id'");
								$row=mysqli_fetch_assoc($result);
								}?>

	
								<?php
if(isset($_POST["sbtn"]))
{
	$first_name = $_POST["fname"];
	$last_name = $_POST["lname"];
	$admin_name = $_POST["name"];
    $admin_email = $_POST["email"];
    $admin_phone = $_POST["phone"];
    $admin_gender = $_POST["gender"];
	
	mysqli_query($connect,"UPDATE admin SET AName='$admin_name',
											AFirst='$first_name',
											ALast='$last_name',
                                               AEmail='$admin_email',
                                               Department = '$admin_phone',
                                               AStatus = '$admin_gender'	
                                               WHERE AID = '$ad_id'");
		 ?>
		<script type="text/javascript">
		alert("Update Successfully!");
		
		</script>
		
		<?php 
	header("Refresh:0;");

}		
mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Edit Admin Account</title>
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
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
		
	
	<body>
	
	<div class="wrapper" >
		<div class="sidebar" data-color="pink">
	
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          JMM
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          DASHBOARD
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
			<ul class="nav" style="padding">
				<li ><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=1"><i class="now-ui-icons design_palette"></i>New Year Cookies</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=2"><i class="now-ui-icons design_palette"></i>Raya Cookies</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=3"><i class="now-ui-icons design_palette"></i>Mooncakes</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=4"><i class="now-ui-icons design_palette"></i>Raw Material</a></li>
				<li><a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?details&id=5"><i class="now-ui-icons design_palette"></i>Packing Material</a></li>
				<li><a class="dropdown-item" style="width:80%;height:10%;margin-left:13%;" href="list.php?details&id=6"><i class="now-ui-icons design_palette"></i>General Use</a></li>
			</ul>
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
							<a class="nav-link" href="viewProfile.php">
							    <i class="now-ui-icons users_single-02"></i>
							    <p>
									<span class="d-lg-none d-md-block">Profile</span>
							    </p>
							</a>
					    </li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">
							    <i class="now-ui-icons media-1_button-power"></i>
							    <p>
									<span class="d-lg-none d-md-block">Logout</span>
							    </p>
							</a>
					    </li>
					</ul>
			    </div>
			</div>
        </nav>
					  <div style="height:5%;">
      </div>
	       <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;margin: auto; margin-top:auto%;margin-bottom:2%;">
                <div class="tm-block" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                    <div class="row">
                        <div class="col-12" >
                            <h1 class="tm-title"><?php echo $row['AFirst'] . "&nbsp;" .$row['ALast'] . "&nbsp;" ."Account"?></h1>
                        </div>
                    </div>
					<hr>
                    <div class="row" style="margin:auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" >
                                
							
								<div class="form-group">
                                    <label for="name">First Name</label>
                                    <input value="<?php echo $row['AFirst']?>" placeholder="Enter Your Firstname Here" name="fname" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"   required>
									 <label for="name">Last Name</label>
                                    <input value="<?php echo $row['ALast']?>" placeholder="Enter Your Lastname Here" name="lname" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"  required>
									<span id="errorname"></span>
                                </div>
								<div class="form-group">
                                    <label for="name">Username </label>
                                    <input value="<?php echo $row['AName']?>" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" pattern="[a-zA-Z'-'\s]*" title="Please Enter Your NRIC Name , no letter or symbols accepted !"   readonly>
									 
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email </label>
                                    <input value="<?php echo $row['AEmail']?>" placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" required >
									<span id="erroremail"></span>	
                                </div>
								<div class="select">
									<label for="gender">Department &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="phone" id="gender" required>
									<option value="<?php echo $row['Department']?>"><?php echo $row['Department']?></option>
									<optgroup label="Department">
									<option value="Product">Product</option>
									<option value="General Use">General Use</option>
									<option value="Raw Material">Raw Material</option>
									<option value="Packing Material">Packing Material</option>
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
                                    <div class="form-group">
                                    <div>
									
                                        <button type="submit" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Update 
                                        </button>
										<a href="ChangePass.php?cPass&id=<?php echo $row['AID'];?>" class="btn btn-info" style="width:150px;height:auto;float:right;">Change Password</a>
										
										
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			</div> 
		<!-- row -->
 
  </div>
  <script src="assets/js/core/jquery.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="assets/js/now-ui-dashboard.min.js" type="text/javascript"></script>
	</body>
</html>