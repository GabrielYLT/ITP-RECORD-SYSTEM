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
if(isset($_GET["details"])){
								
$ad_id=$_GET['id'];	
$result=mysqli_query($connect,"SELECT stock.SID,stock.PCode,product.PName,product.PImage,product.PQty,product.Stor,stock.Qty,stock.DateAdded,stock.Remarks,stock.exp,stock.Status,stock.AID,admin.AName FROM ((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN admin ON stock.AID = admin.AID) WHERE stock.SID = '$ad_id'");
$row=mysqli_fetch_assoc($result);

}

if(isset($_POST["sbtn"]))
{
	$productname = $_POST["pcode"];
	$productprice = $_POST["qty"];
	$productstock = $_POST["remark"];	
	$stor = $_POST["stor"];
	$exp= $_POST["exp"];
	$productStatus = "Stock In";
	
	$total = $row['Qty'];
	
	mysqli_query($connect,"UPDATE stock SET Qty = '$productprice',
											exp = '$exp',
											Remarks = '$productstock'
                                               WHERE SID= '$ad_id'");
										
	mysqli_query($connect,"UPDATE product SET Stor = '$stor'
                                               WHERE PCode = '$productname'");

	if($row['Status'] == 'Stock In'){
	mysqli_query($connect,"UPDATE product SET PQty = (PQty - '$total') + $productprice
                                               WHERE PCode= '$productname'");
	?>
	<script type="text/javascript">
		alert("Stock Updated Successfully!");
		
		</script>

	<?php
	header("refresh:0.001;url=hstory.php");
	}else{mysqli_query($connect,"UPDATE product SET PQty = (PQty + '$total') - $productprice
                                               WHERE PCode= '$productname'");
	header("refresh:0.001;url=hstory.php");
												   
	$result1=mysqli_query($connect,"SELECT * FROM product WHERE PCode='$_POST[pcode]'");
	$row1 = mysqli_fetch_assoc($result1);
											   
if($row1["PQty"] <= '6'){
		
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
            $mail->Username='jmmrecordsystem@gmail.com';
            $mail->Password='teofcrdkmofzypjw';

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
                header("refresh:0.001;url=hstory.php");
            }
	}
	
	
	}

?>
		<script type="text/javascript">
		alert("Stock Updated Successfully!");
		
		</script>
		
	<?php 

	
}
}

?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Edit History</title>
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
<div class="wrapper"  style="overflow-x:hidden;background-image: url('images/dbg.jpg');background-size: cover;" >
    
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
                            <h1 class="tm-block-title">Edit History Record</h1>
                        </div>
                    </div>
                    <div class="row" style="margin: auto;">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data">
								<div class="form-group" >
									<label for="gender">Product Code &nbsp; </label>
									
									<input value="<?php echo $row['PCode']?>" type="text" class="form-control selectList"  autocomplete="off"  list="code" placeholder="Please Enter Product Code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="pcode"id="gender" readonly>
                                </div>
								<div class="form-group" style="text-align:center;">
								<hr>
									<label for="gender"><h4>Product Image &nbsp;</h4> </label>
									<div class="d-flex flex-column align-items-center text-center p-2 py-3">
									<img style="margin:auto;width:150px;height:auto;border-radius:30px;" img src="images/<?php echo $row['PImage'] ?>" type="image" style="width:100%;Height:50%;" name="" id="image" readonly>
									</div>
								</div>
								<div class="form-group" >
								<hr>
									<label for="gender">Product Name &nbsp; </label>
									<input value="<?php echo $row['PName']?>" type="text" class="form-control selectList"  autocomplete="off"  list="code" placeholder="Please Enter Product Code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="" id="gender" readonly>
                                </div>
								<div class="form-group" >
									<label for="gender">Status &nbsp; </label>
									<input value="<?php echo $row['Status']?>" type="text" class="form-control selectList"  autocomplete="off"  list="code" placeholder="Please Enter Product Code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="" id="gender" readonly>
                                </div>
								<div class="form-group" style="margin-bottom:0%;">
                                    <label for="Qty">Quantity </label>
                                    <input value="<?php echo $row['Qty']?>" placeholder="Please Enter Product Name" id="number" min="0" name="qty" type="number" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div style="margin-bottom:0%;">
                                    <label>Expire </label>
									<input  type="text" class="form-control selectList" autocomplete="off" list="code" value="<?php echo $row['exp'] ?>" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="exp" id="exp" required>
									<datalist id="code">
									<?php 
									$conn = $connect;
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}

									$sqlexp = "SELECT * FROM stock WHERE PCode = '$row[PCode]' AND Qty >='1' group BY exp ORDER BY exp DESC";
									$resultexp = $conn->query($sqlexp);
									if ($resultexp->num_rows > 0) {

									while($rowexp = $resultexp->fetch_assoc()) {
									$exp = $rowexp["exp"];
									
									$RexpIn=mysqli_query($connect,"SELECT SUM(Qty) AS inStock FROM stock WHERE Status = 'Stock In' AND PCode = '$row[PCode]' AND exp = '$exp' group BY exp,'$row[PCode]'");
									$expIn = mysqli_fetch_assoc($RexpIn);
									
									$RexpOut=mysqli_query($connect,"SELECT SUM(Qty) AS outStock FROM stock WHERE Status = 'Stock Out' AND PCode = '$row[PCode]' AND exp = '$exp' group By exp,'$row[PCode]'");
									$expOut = mysqli_fetch_assoc($RexpOut);
									
									$in = $expIn["inStock"] ;
									$out = $expOut["outStock"];
									
									
									$subtotal = $in - $out ;

									
									if($subtotal != '0'){
									echo "<option value='" . $rowexp["exp"]. "'>Current Qty : ".$subtotal ."</option> ";
									}
									
									}
									}else {echo "0 results found " ;}
								
								?>
								</datalist>
								</div>
								<div class="form-group">
                                    <label for="stor">Stor </label>
                                    <input value="<?php echo $row['Stor'] ?>" placeholder="Please Enter Product Stor"  name="stor" type="text" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>
								<div class="form-group">
								<br>
									<label for="gender">Date Added &nbsp; </label>
									<input value="<?php echo $row['DateAdded']?>" type="text" class="form-control selectList"  autocomplete="off"  list="code" placeholder="Please Enter Product Code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="" id="gender" readonly>
                                </div>
								<div class="form-group">
                                    <label for="email">Remarks </label>
                                    <textarea value="<?php echo $row['Remarks']?>" style="border-radius:10px;"  rows="4" cols="50" id="email" name="remark" type="text"   class="form-control validate"><?php echo $row['Remarks']?></textarea>
									<span id="erroremail"></span>	
                                </div>
								<div class="form-group" >
									<label for="gender">Admin Name &nbsp; </label>
									<input value="<?php echo $row['AName']?>" type="text" class="form-control selectList"  autocomplete="off"  list="code" placeholder="Please Enter Product Code" onchange="showCustomer(this.value)" style="width:100%;Height:50%;" name="" id="gender" readonly>
                                </div>
								<hr>
                                <div class="form-group">
                                    <div class="col-12 col-sm-6" style="float:right;">
									
                                        <button style="float:right;" type="submit" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Update</button>
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