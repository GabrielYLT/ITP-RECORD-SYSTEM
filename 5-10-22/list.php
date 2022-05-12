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
<div class="wrapper"  style="overflow:hidden;" >
    <div class="sidebar" style="opacity:85%;" >
	
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
			  <a class="dropdown-item" style="width:80%;margin-left:13%;" href="list.php?view&cid=1"><i class="now-ui-icons design_palette"></i>New Year Cookies</a>
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
    <div class="main-panel" id="main-panel" style="height:100%">
			<!-- row -->
            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
								<h2 class="tm-block-title d-inline-block" style="margin-left:3%;margin-top:2%;">List</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right"style="margin-left:-1%;margin-top:auto;">
                                <div class="select">
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="SupCategory" id="SupCategory" required>
									<option value="Group">Group</option>
									<optgroup label="Group">
									<option value="p">P</option>
									<option value="s">S</option>
									<option value="a">A</option>
									</select>
                                </div>
                            </div>
							<div>
							<hr>

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:30%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" id="myInput" type="text" name="searchname" placeholder="Search" ></h6>
<hr>
</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">Code</th>
                                        <th scope="col" >Name</th>
										<th scope="col" >Quantity</th>
                                        
										<th scope="col">&nbsp;</th>	
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
									echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#" . $row["AID"] . "</td>" ;
									echo "<td>" . $row["AName"]. "</td>" ; 
									echo "<td>" . $row["AEmail"].  "</td>" ; 
                                    ?> 
                                    <td>
									<div class='btn-group'> 
									<a href="details.php?details&id=<?php echo $row['AID'];?>" class="btn btn-secondary">Details</a>
									</div>
                                    <?php
									echo "</tr>" ;
									}
									echo "</table>";
									} else { echo "0 results"; }
									?>    
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
		
		

  </div>

	</body>
</html>