	
<?php
session_start();
include("Connection.php");
$error="";

if(isset($_GET["sendbtn"]))
{
	if(empty($_GET["AName"])|| empty($_GET["APass"]))	
	{
		$error="<br>username or userpassword is empty";	
	}
	else
	{
		$name=$_GET["AName"];
		$pass=$_GET["APass"];
		
		$name=mysqli_real_escape_string($connect,$name);
		$pass=mysqli_real_escape_string($connect,$pass);
		
		$result=mysqli_query($connect,
		"SELECT * FROM admin WHERE AName='$name' AND APassword='$pass'");
		
		$count=mysqli_num_rows($result);
		
		if($count==1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION["id"]=$row["AID"];
			
			if($row["AStatus"]=='Blocked'){	
			$error="<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; THIS ACCOUNT HAVE BEEN BLOCKED !!!";
			unset($_SESSION['id']);

			session_destroy();
			?>	
			<script>
			alert("THIS ACCOUNT HAVE BEEN BLOCKED !!!");
			</script>
			<?php
			//exit();
	
		}elseif($row["AStatus"]=='Suspended'){
			$error="<br> &nbsp;&nbsp;THIS ACCOUNT ARE CURRENTLY SUSPENDED!";	
			unset($_SESSION['id']);

			session_destroy();
			?>
			<script>
			alert("THIS ACCOUNT ARE CURRENTLY SUSPENDED!!!");
			</script>
			<?php
			
			//exit();

		}else{
			if($row["Department"]== 'All Department'){
			
			header("location:dashboard.php");
			}else{
				header("location:generalD.php");
			}
		}
		}
		else	
		{
			$error="<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Your Username or password is Invalid !";
		}
		
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">	
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://res.cloudinary.com/lamboplace/image/upload/f_auto,q_auto/v1591257893/products/yjofydgnvmqfsoi5p2hc.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<div class="login100-form validate-form p-b-33 p-t-5">
				<form>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" autocomplete="off" name="AName" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" autocomplete="off" name="APass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;" ></span>
					</div>

					<span style="color:red;margin-left:1000%;font-weight: bold;"><?php echo $error; ?></span>
					<div>
						<a href="recover_psw.php" style="float:right;margin-right:10px;color:blue">
							Forgot Password？
						</a>
				</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="sendbtn">
							Login
						</button>
					</div>

				</form>
				
				</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>