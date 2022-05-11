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
<div class="wrapper" >
    <div class="sidebar" data-color="red" style="opacity:85%;" >
	
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
            <a href="#">
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
		   <li class="active">
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
            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="tm-block h-100" style="background-color:#ff280061; border-radius:10px;">
                        <div class="row">
                            <div class="row">
                            <div >
							<hr>
								<h2 class="tm-block-title d-inline-block" style="margin-left:2%;margin-top:2%;">View Admin List</h2>
								<span style="float:right;width:35%;">
                                <a href="accounts.php" class="btn btn-small btn-warning" style="opacity:65%;width:90%;margin-top:6%;">Add Admin</a>
								</span>
							</div>
							<div>
							<hr>

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:auto;height:auto;margin-left:autos%;border-radius:10px;border-style: none;" id="myInput" type="text" name="searchname" placeholder="Search Admin " ></h6>
<hr>
</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" style="text-align:center;font-weight:bold;color:black;">Admin ID</th>
                                        <th scope="col" style="text-align:center;font-weight:bold;color:black;">Admin Name</th>
										<th scope="col" style="text-align:center;font-weight:bold;color:black;">Admin Email</th>
										<th scope="col" style="text-align:center;font-weight:bold;color:black;">Date</th>
                                        <th scope="col" style="text-align:center;font-weight:bold;color:black;">Department</th>
										<th scope="col" style="text-align:center;font-weight:bold;color:black;">Status</th>

                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                	<?php
									$conn = mysqli_connect("localhost", "root", "", "itp");

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT * FROM admin";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<td style='text-align:center;color:black;'>#" . $row["AID"] . "</td>" ;
									echo "<td style='text-align:center;color:black;'>" . $row["AFirst"]. "&nbsp;". $row["ALast"]. "</td>" ; 
									echo "<td style='text-align:center;color:black;'>" . $row["AEmail"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;'>" .  $row["ADate"]. "</td>" ;
									echo "<td style='text-align:center;color:black;'>". $row["Department"]. "</td>" ;
									if( $row["AStatus"] =='Active'){
									echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-success'>" .  $row["AStatus"]. "</span></td>" ;
									} elseif ($row["AStatus"] =='Suspend'){
									echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-warning'>" .  $row["AStatus"]. "</span></td>" ;
									} else { echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-danger'>" .  $row["AStatus"]. "</span></td>" ;
									}
                                    ?> 
                                    <td>
									<div class='btn-group'> 
									<a href="editProfile.php?edit&id=<?php echo $row['AID'];?>" class="btn btn-secondary">Edit</a>
									<a href="Staff.php?del&id=<?php echo $row['AID'];?>" class="btn btn-danger" onclick="return confirmation()" >Delete</a></td>
									</div>
                                    <?php
									echo "</tr>" ;
									}
									echo "</table>";
									} else { echo "0 results"; }
									?>    
                                </tbody>
                            
                        </div>
            </div>
        </div>
    </div>
		
		

  </div>

	</body>
</html>