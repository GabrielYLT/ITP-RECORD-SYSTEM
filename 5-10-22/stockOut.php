<?php
include("Connection.php");
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kuala_Lumpur");
$currentDate = date('Y-m-d H:i:s',time());
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
if(isset($_POST["sbtn"]))
{
	
	
	$productname = $_POST["pcode"];
	$productprice = $_POST["qty"];
	$productstock = $_POST["remark"];
	$productStatus = "Stock Out";
	
	$select = mysqli_query($connect, "SELECT * FROM product WHERE PCode = '".$_POST['pcode']."'");
	if(mysqli_num_rows($select)) {
	
	$result1=mysqli_query($connect,"SELECT * FROM product WHERE PCode='$_POST[pcode]'");
	$row1 = mysqli_fetch_assoc($result1);
	
	if($row1["PQty"] < $_POST["qty"])
	{
		$name = $row1["PName"];
		$qty =$row1["PQty"];
		header("refresh:0.001;url=stockOut.php");
		
		echo "<script type='text/javascript'>
		alert('Total Number of Stock for ".$name ." is " . $qty." . The Amount You Entered is ". $_POST["qty"] ." Which is Greater/Larger Than the Stock You Currently Have in Store');
		
		</script>" ;
	
	}else{
	mysqli_query($connect,"UPDATE product SET PQty = PQty - '$productprice '
                                               WHERE PCode= '$productname'");
	
	
 	$sql=mysqli_query($connect,"INSERT INTO stock(PCode,Qty,AID,DateAdded,Remarks,Status) 
	VALUES('$productname','$productprice','$_SESSION[id]','$currentDate','$productstock','$productStatus')");
	header("refresh:0.001;url=stockOut.php");
	
	$resultx=mysqli_query($connect,"SELECT * FROM product WHERE PCode='$_POST[pcode]'");
	$rowx = mysqli_fetch_assoc($resultx);
	
	if($rowx["PQty"] <= '6'){
		
	$conn=$connect;

	$result2=mysqli_query($connect,"SELECT * FROM product WHERE PCode='$_POST[pcode]'");
	$row2 = mysqli_fetch_assoc($result2);
	$name = $row2["PName"];
		$qty =$row2["PQty"];
		
			
		            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer; 

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='tes15895@gmail.com';
            $mail->Password='Qwer@1234';

            // send by h-hotel email
            $mail->setFrom('email', 'Password Reset');
            // get email from input
            $sql = "SELECT * FROM admin WHERE Department = 'All Department'";
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res) > 0) {
    while($x = mysqli_fetch_assoc($res)) {
        $mail->addAddress($x['AEmail']);
    }
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Product Low on Stock";
            $mail->Body="<b>Dear Admin</b>
            <h3>Your Product : <span style='color:crimson;font-weight:bold;font-size:50px;'>". $name."</span> is Currently Low on Stock.</h3>
			<p>Total stock : <span style='color:crimson;font-weight:bold;font-size:30px;'>".$qty."</span></p>
            <br><br>
            <p>With regrads,</p>
            <b>JMM RECORD SYSTEM</b>";
		
			            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                header("refresh:0.001;url=stockOut.php");
            }
	}
	
	
	}



?>
		<script type="text/javascript">
		alert("Stock Removed Successfully!");
		
		</script>
		
	<?php 
 }
 }else{
	 header("refresh:0.001;url=stockOut.php");
	


	?>
		<script type="text/javascript">
		alert("Product Not Found!");
		
		</script>
		
	<?php }
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Stock Out</title>
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
<div class="wrapper"  style="overflow-x:hidden;background-image: url('images/dbg.jpg');background-size: cover;"" >
    
	<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
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
			   <Tooltip title="Add New Product">
                <a class="nav-link" href="DaddNewProduct.php">
                  <i class="now-ui-icons ui-1_simple-add"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Add New Product</span>
                  </p>
                </a>
			  </Tooltip>
              </li>
			  <li class="nav-item">
			   <Tooltip title="Home">
                <a class="nav-link" href="generalD.php">
                  <i class="now-ui-icons business_bank"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Home</span>
                  </p>
                </a>
              </li>
			  <li class="nav-item">
			   <Tooltip title="History">
                <a class="nav-link" href="hstory.php">
                  <i class="now-ui-icons files_paper"></i>
                  <p>
                    <span class="d-lg-none d-md-block">History</span>
                  </p>
                </a>
			   </Tooltip>
              </li>
              <li class="nav-item">
			   <Tooltip title="Profile">
                <a class="nav-link" href="Dprofile.php">
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
      <!-- End Navbar -->
	  <div style="height:10%;">
      </div>
    <div class="content">
			<!-- row -->
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;margin: auto;" >
            <div class="tm-col tm-col-big" style="padding-top:1%;padding-bottom:1%;margin: auto; width: 700px;">
                <div class="tm-block" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                    <div class="row" style="margin: auto;">
                        <div class="col-12" >
                            <h1 class="tm-block-title">Stock Out</h1>
                        </div>
                    </div>
                    <div class="row" style="margin: auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data">

								<div >
									<label for="gender">Product Code &nbsp; </label>
									<input  type="text" class="form-control selectList" autocomplete="off" list="code" placeholder="Please Enter Product Code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="pcode" id="gender" required>
									<datalist id="code">
									<?php
									$conn = $connect;
									$Admin_id=$_SESSION['id'];
									$result=mysqli_query($connect,"SELECT *FROM admin WHERE AID='$Admin_id'");
									$row = mysqli_fetch_assoc($result);

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									if($row["Department"]=='Product'){
									$sql = "SELECT * FROM product WHERE CID = 1 OR CID = 2 OR CID = 3";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["PCode"] . "'>". $row["PName"]."</option>";
									}
									} else { echo "0 results"; }}
									elseif($row["Department"]=='Raw Material'){
									$sql = "SELECT * FROM product WHERE CID = 4";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["PCode"] . "'>". $row["PName"]."</option>";
									}
									} else { echo "0 results"; }}
									elseif($row["Department"]=='Packing Material'){
									$sql = "SELECT * FROM product WHERE CID = 5";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["PCode"] . "'>". $row["PName"]."</option>";
									}
									} else { echo "0 results"; }}
									elseif($row["Department"]=='General Use'){
									$sql = "SELECT * FROM product WHERE CID = 6";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["PCode"] . "'>". $row["PName"]."</option>";
									}
									} else { echo "0 results"; }}
									?>    
									</datalist>
                                </div>
								
								<div id="txtHint" style="margin-left:1%;margin-top:2%;">Product Name Will be Displayed Here...</div>
								  <script>
  function showCustomer(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "productName.php?q="+str);
    xhttp.send();
  }
  </script>
  <hr>
								<div class="form-group" style="margin-bottom:0%;">
                                    <label for="Qty">Quantity </label>
                                    <input value="" placeholder="Please Enter Product Name" min="0" id="number" name="qty" type="number" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div class="form-group" style="margin-bottom:0%;">
                                    <label for="Date" style="color:black;">Expire </label>
                                    <input value="" placeholder="Please Select Product Expire" id="date" name="exp" type="date" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div class="form-group" style="margin-bottom:0%;">
                                    <label for="email">Remarks </label>
                                    <textarea style="border-radius:10px;" value="" rows="4" cols="50"  placeholder="Remarks" id="email" name="remark" type="text" class="form-control validate"></textarea>
									<span id="erroremail"></span>	
                                </div>
								<hr>
                                <div class="form-group">
                                    <div class="col-12 col-sm-6" style="float:right;">
									
                                        <button style="float:right;" type="submit" name="sbtn" class="btn btn-danger" onclick="Profile Updated">Out</button>

                                    </div>
                                </div>
                            </form>
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