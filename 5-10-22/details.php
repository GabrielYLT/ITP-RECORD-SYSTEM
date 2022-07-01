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

if(isset($_GET["details"])){
								
							$ad_id=$_GET['id'];	
							$result=mysqli_query($connect,"SELECT * FROM product WHERE PCode='$ad_id'");
							$row=mysqli_fetch_assoc($result);}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title><?php echo $row["PName"]. " Record" ?></title>
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
#myBtn {
  display: none;
  position: fixed;
  bottom: 10px;
  right: 10px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color:#FF280061;
  color: white;
  cursor: pointer;
  padding: 10px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #FF280090;
}
</style>
		</head>
	
	<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>	
	<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<div class="wrapper"  style="overflow:hidden;height:100%" >
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
		<div><br><br><br></div>
			<!-- row -->
            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col" style="padding-top:1%;margin: auto; margin-bottom:2%;">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
							<?php
								if(isset($_GET["details"])){
								
							$ad_id=$_GET['id'];	
							$result=mysqli_query($connect,"SELECT * FROM product WHERE PCode='$ad_id'");
							$row=mysqli_fetch_assoc($result);}
									
									
							echo "<h2 class='tm-block-title d-inline-block' style='margin-left:3%;margin-top:2%;color:black;font-weight:bold;'>Record for ". $row["PName"] . "</h2>";
							?>
                            </div>
							<div>
							<hr>

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:99%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;" autocomplete=off id="myInput" type="text" name="searchname" placeholder="Search" ></h6>
<hr>
</div>
                        </div>
                        <div class="table-responsive"  style="width: auto%; height:700px; ">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Code</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Quantity</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Expire</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Stor</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Admin Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Date</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;width:15%">Remarks</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Status</th>
										<th scope="col" style="width:20%">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                	<?php
									$conn = $connect;
									if(isset($_GET["details"])){
								
									$ad_id=$_GET['id'];	
							
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT stock.PCode, product.PName,product.Stor,product.QType, stock.Qty , stock.AID, admin.AName,stock.DateAdded, stock.Remarks, stock.Status,stock.exp
									FROM ((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN admin ON stock.AID = admin.AID) 
									WHERE stock.PCode ='$ad_id' ORDER BY DateAdded DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PCode"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PName"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Qty"]." ".$row["QType"] . "</td>" ;
									echo "<td style='text-align:center;color:maroon;font-weight:bold;'>" . $row["exp"]. "</td>" ;									
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Stor"]. "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["AName"].  "</td>" ; 
									echo "<td style='text-align:center;color:forestgreen;font-weight:bold;'>" . $row["DateAdded"].  "</td>" ; 
									echo "<td style='text-align:center;color:red;font-weight:bold;'>" . $row["Remarks"].  "</td>" ; 
									if($row["Status"] == 'Stock In'){
									echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-success'>" . $row["Status"].  "</span></td>" ; 
									}else{
										echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-danger'>" . $row["Status"]. "</span></td>" ;
									}
                                    ?>  
                                    <td>
									<div class='btn-group'> 
									<a href="edith.php?details&id=<?php echo $row['PCode'];?>" class="btn btn-secondary" >Edit</a></td>
									</div>
                                    <?php
									echo "</tr>" ;
									}
									echo "</table>";
									} else { echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No results"; }
									}
									?>    
                                </tbody>
                            </table>
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