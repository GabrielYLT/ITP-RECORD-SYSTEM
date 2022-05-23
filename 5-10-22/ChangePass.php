<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "" ;
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
if(isset($_GET["cPass"]))
{
	$pass_id=$_GET['id'];
	if(isset($_POST['sbtn']))
{
	if(empty($_POST['current']))
	{
		$error="<br>Old password is empty";
	}
	else
	{
		$pass=$_POST["current"];
		$result=mysqli_query($connect,"SELECT * FROM admin WHERE APassword='$pass' AND AID ='$pass_id'");
		$count=mysqli_num_rows($result);
		if($count == 1)
		{
			$row=mysqli_fetch_assoc($result);	
		if($_POST["new"]=== $_POST["rnew"])
		{
			$rnewPass = $_POST['rnew'];
			
			mysqli_query($connect, "UPDATE admin SET APassword ='$rnewPass'
														WHERE AID='$pass_id'");
			
			?>
		<script type="text/javascript">
		alert("Password Change Successfully!");
		
		</script>
		
		<?php 
		header("Refresh:0; url=editProfile.php?edit&id=$pass_id");
		
		}
		else
		{
			$error="<br>Password Does Not Match!!!";
		}
	}
	else
	{
		$error="<br>Old Password is invalid!!!";
	}
		
	}	
}
}
?>

	
<!DOCTYPE html>
<html lang="en">
<style>
select.selectList { width: 150px; }
</style>
<script type="text/javascript">
{
	 var name;
	 var name_check=0;
	 name=document.signup.name.value;
	 if(name=="")
	 {
		 document.getElementById("errorname").innerHTML="Please enter your name.";
	 }
	 else
	 {
		document.getElementById("errorname").innerHTML="";
		name_check=1;
	 }
}
function validate_email()
{
   var v_email;
   var email_check = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   ///^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(signup.useremail.value);
	v_email= document.signup.email.value;
	if(v_email==""||!v_email.match(email_check))
	{
		document.getElementById("erroremail").innerHTML="Please enter the proper email address";
	}
	else
	{
		document.getElementById("erroremail").innerHTML="";
		email_check=1;
	}
}
</script>
<head>
    <meta charset="UTF-8">
	<title>Change Admin Password</title>
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
	
</head>
<body class="bg01">
    <div class="wrapper"  style="overflow-x: hidden;" >
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
              <h3 class="dropdown-header" style="color:white;">Category</h3>
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
				
			echo "<ul class='nav' style='padding'>";
			echo "<li><a class='dropdown-item' style='width:80%;margin-left:13%;margin-top:-7%;' href='list.php?details&id=". $row3["CID"]."'><i class='now-ui-icons design_palette'></i>". $row3["CName"]. "</a></li></ul> </li>";
			
			}
			} 
			?>
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
                <div class="bg-white tm-block" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title" style="color:black;">Change Password </h1>
                        </div>
                    </div>
                    <div class="row" style="margin: auto;">	
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label for="name">Current Password</label>
                                    <input  placeholder="Enter Your Current Password Here" name="current" id="current"  class="form-control" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!" required >
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
								<label>New Password </label>
                                    <input  placeholder="Please Enter Your New Password"  name="new" id="new" class="form-control validate" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required>
									<span id="erroremail"></span>	
                                </div>
                                <div class="form-group">
                                    <label for="phone">Re-enter New Password </label>
                                    <input  placeholder="Please Re-enter Your New Password"  name="rnew" id="rnew" class="form-control validate" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required>
									<div class="">
										<label >
										<input type="checkbox" class="form-check-input" onclick="myFunction()" style="width:15px;height:15px;margin:auto;margin-top:2px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show All Password
										
										<script type="text/javascript">
										function myFunction() {
										var x = document.getElementById("current");
										var y = document.getElementById("new");
										var z = document.getElementById("rnew");
										if (x.type === "password") {
											x.type = "text";
											y.type = "text";
											z.type = "text";
											
										} else {
											x.type = "password";
											y.type = "password";
											z.type = "password";
										}
										}</script>
										
										</label>
										<span style='color: red;font-weight:bold;'> <?php echo $error; ?> </span>
									</div>
									<hr>
								</div>	
                                <div class="form-group">
                                    <div class="col-12 col-sm-6" style="float:right;">
                                        <button type="submit" style="float:right;" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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


