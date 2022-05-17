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
<div class="wrapper"  style="overflow-x:hidden;background:none;" >
    <!-- Navbar -->
      <div><nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" >
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
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
                <a class="nav-link" href="generalD.php">
                  <i class="now-ui-icons business_bank"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Home</span>
                  </p>
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="hstory.php">
                  <i class="now-ui-icons files_paper"></i>
                  <p>
                    <span class="d-lg-none d-md-block">History</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
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
      </nav></div>
      <!-- End Navbar -->
	  <div style="height:10%;">
      </div>
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
                            <small>
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
                        <a href="DeditProfile.php?edit&id=<?php echo $row['AID'];?>"><button class="btn btn-outline-dark shadow">Edit Details</button></a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-3">dfds</div> -->
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