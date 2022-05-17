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
                    <span class="d-lg-none d-md-block">Account</span>
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
    <!-- row -->
            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
								<h2 class="tm-block-title d-inline-block" style="margin-left:3%;margin-top:2%;color:black;font-weight:bold;">History</h2>

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
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Code</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Image</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Product Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Quantity</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Status</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;">Date</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Remarks</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;">Admin Name</th>
                                        
										<th scope="col">&nbsp;</th>	
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                	<?php
									$conn = $connect;

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT stock.SID,stock.PCode,product.PName,product.PImage,stock.Qty,stock.DateAdded,stock.Remarks,stock.Status,stock.AID,admin.AName FROM ((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN admin ON stock.AID = admin.AID) WHERE stock.AID = '$_SESSION[id]'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PCode"] . "</td>" ;
									echo "<td style='text-align:center;color:black;font-weight:bold;'> <img width='125px' src='images/" . $row["PImage"]. "'></td>" ; 	
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["PName"].  "</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Qty"]."</td>" ; 
									if($row["Status"] == 'Stock In'){
									echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-success'>" . $row["Status"].  "</span></td>" ; 
									}else{
										echo "<td class='align-middle text-center text-sm'> <span class='badge badge-sm bg-gradient-danger'>" . $row["Status"]. "</span></td>" ;
									}
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["DateAdded"]."</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["Remarks"]."</td>" ; 
									echo "<td style='text-align:center;color:black;font-weight:bold;'>" . $row["AName"]."</td>" ; 
                                    ?> 	
                                    <td>
									<div class="btn-group"> 
									<a href="hstoryEdit.php?details&id=<?php echo $row['SID'];?>" class="btn btn-secondary">Details</a>
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
	</div>
<script src="assets/js/core/jquery.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="assets/js/now-ui-dashboard.min.js" type="text/javascript"></script>
	</body>
</html>