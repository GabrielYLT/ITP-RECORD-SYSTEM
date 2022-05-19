<?php session_start() ;
include('Connection.php');
?>
<?php
if(!isset($_SESSION['email']))
{
?>
    <script>
    alert("You're Not Authorize !");
    </script>
    <?php
    header("refresh:0.001;url=login.php");
    //exit();
	
	
}

?>
<?php
    if(isset($_POST["reset"])){
        include('Connection.php');
        $psw = $_POST["password"];

        $Email = $_SESSION['email'];

        $sql = mysqli_query($connect, "SELECT * FROM admin WHERE AEmail='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            mysqli_query($connect, "UPDATE admin SET APassword='$psw' WHERE AEmail='$Email'");
            ?>
            <script>
                window.location.replace("login.php");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
			
			unset($_SESSION['email']);

			session_destroy();
			
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
	<title>Reset Password</title>
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
					Reset Password
				</span>
				<span class="login100-form-title p-b-41" style="font-size:20px;">
					Please Enter Your New Password
				</span>
				<form action="#" method="POST" name="login"class="login100-form validate-form p-b-33 p-t-5">

                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" id="password" class="form-control" name="password" placeholder=" Enter New Password" required autofocus>
                                <span class="focus-input100" data-placeholder="&#xe80f;" ></span>
                            </div>

                            <div class="container-login100-form-btn m-t-32">
								<button class="login100-form-btn" name="reset">
									Reset
								</button>
                            </div>
                    </div>
                    </form>
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

</main>
</body>
</html>
