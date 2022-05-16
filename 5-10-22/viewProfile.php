<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "";
$error1 ="";
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
$result=mysqli_query($connect,"SELECT *FROM admin WHERE AID='$Admin_id'");
$row = mysqli_fetch_assoc($result);
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
  box-shadow: inset 0 0 2px white; 
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
    <div class="main-panel" id="main-panel" style="background-image: url('');">
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
							<a class="nav-link" href="#">
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
		<div style="height:5%"></div>
		<div style="margin-bottom:2%;">

    <div class="container rounded-3 my-5 bgcontainer  shadow  box" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;padding-top:1%;margin: auto; width: 95%;">
        <div class="row" >
            <div class="col-md-4">
                <div class="d-flex align-items-stretch flex-column h-75 justify-content-center">
                    <div class="row mt-md-5">
                        <div class="col text-center">
                            <img class="rounded-circle mb-3" id="imgload" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTlJgcPWvijPP8j4Kjn4J3gdoR4ReO6lYugg&usqp=CAU" width="175px"
                                height="175px" alt="" />
                            <h5 class="myname"><?php echo $row['AFirst'] . "&nbsp;" .$row['ALast'] ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <small style="color:grey">
                                <p class="idinfo fs-6" aria-placeholder="Idinfo"><?php echo $row['AEmail']?></p>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 px-0 mt-md-3">
                <h2 class="fw-semi-bold my-3 pb-1" id="profileh3">Profile Details</h2>
                <div class="container border mt-4 ">
					<div class="row mb-4">
                        <div class="col-12">
                            <label for="homeworld">Admin Name</label>
                            <input class=" w-100 form-control shadow" type="text" value="<?php echo $row['AName']?>" name="homeworld" id="homeworld"
                                placeholder="Homeworld" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="name">First</label>
                            <input class=" w-100 form-control shadow" type="text" value="<?php echo $row['AFirst']?>" name="name" id="name"
                                placeholder="UserName" readonly />
                        </div>
                        <div class="col-6">
                            <label for="id">Last</label>
                            <input class=" w-70 form-control shadow" type="text" value="<?php echo $row['ALast']?>" name="id" id="id" placeholder="UserID" readonly />
                        </div>
                    </div>
					<div class="row mb-4">
                        <div class="col-12">
                            <label for="homeworld">Department</label>
                            <input class=" w-100 form-control shadow" value="<?php echo $row['Department']?>" type="text" name="homeworld" id="homeworld"
                                placeholder="Homeworld"readonly />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="homeworld">Status</label>
                            <input class=" w-100 form-control shadow" value="<?php echo $row['AStatus']?>" type="text" name="homeworld" id="homeworld"
                                placeholder="Homeworld" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="flex text-center mt-4">
                        <a href="editProfile.php?edit&id=<?php echo $row['AID'];?>"><button class="btn btn-outline-dark shadow">Edit Details</button></a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-3">dfds</div> -->
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