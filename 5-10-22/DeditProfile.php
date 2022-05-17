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
	
	
}

$Admin_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM admin WHERE AID = $Admin_id");
$row = mysqli_fetch_assoc($result);
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
                                               AEmail='$admin_email'
                                               WHERE AID = '$ad_id'");
		 ?>
		<script type="text/javascript">
		alert("Update Successfully!");
		
		</script>
		
		<?php 
	header("Refresh:0;  url=Dprofile.php");

}		
mysqli_close($connect);
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
                <a class="nav-link" href="Dprofile.php">
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
								<hr>
                                <div class="form-group">
                                    <div class="form-group">
                                    <div>
									
                                        <button type="submit" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Update 
                                        </button>

										<a href="DchangePass.php?cPass&id=<?php echo $row['AID'];?>" class="btn btn-info" style="width:150px;height:auto;float:right;">Change Password</a>
										
										
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
	</div>
<script src="assets/js/core/jquery.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="assets/js/now-ui-dashboard.min.js" type="text/javascript"></script>
	</body>
</html>