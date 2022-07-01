<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "";
$error1 ="";
$error2 ="";
date_default_timezone_set("Asia/Kuala_Lumpur");
$currentDate = date('Y-m-d',time());
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
$Admin_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM admin WHERE AID = $Admin_id");
$row = mysqli_fetch_assoc($result);
?>
<?php
if(isset($_GET["details"])){
								
$ad_id=$_GET['id'];	
$result=mysqli_query($connect,"SELECT stock.SID,stock.PCode,product.PName,product.PImage,product.PQty,product.Stor,stock.Qty,stock.DateAdded,stock.Remarks,stock.exp,stock.Status,stock.AID,admin.AName FROM ((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN admin ON stock.AID = admin.AID) WHERE stock.SID = '$ad_id'");
$row=mysqli_fetch_assoc($result);

$pcode1=$row["PCode"];

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
	header("refresh:0.001;url=details.php?details&id=$pcode1");
	}else{mysqli_query($connect,"UPDATE product SET PQty = (PQty + '$total') - $productprice
                                               WHERE PCode= '$productname'");
	header("refresh:0.001;url=details.php?details&id=$pcode1");
												   
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
                header("refresh:0.001;url=details.php?details&id=$pcode1");
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
	<title>Add Admin</title>
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
<div class="wrapper"  style="overflow-x:hidden;background:none;height:100%" >
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
    <div class="main-panel" id="main-panel" style="height:100%;background-image: url('images/bg.jpg');background-size: cover;background-attachment: fixed;height: 100%;">
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
		<!-- row -->
		<div><br><br><br></div>
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
		
		

  </div>
	<script src="assets/js/core/jquery.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="assets/js/now-ui-dashboard.min.js" type="text/javascript"></script>
	</body>
</html>