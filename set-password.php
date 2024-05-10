<?php

	session_start();

	$true = false;

	include 'dbcon.php';

	
	if (isset($_GET['email']) && isset($_GET['token'])) {

		$email = $_GET['email'];
		$token = $_GET['token'];

		date_default_timezone_get();
		$date = date("Y-m-d");

		$query = "select * from user where email='$email' and reset_token='$token' and token_expire='$date'";
		$query_run = mysqli_query($conn, $query);

		if ($query_run) {
			if (mysqli_num_rows($query_run)==1) {
				$true = true;
			}
		}
		else{
			$_SESSION['set_password_status'] = "Link Expired!";
		}
	}

	if (isset($_POST['set_password'])) {
		
		$password = $_POST['new_password'];
		$cpassword = $_POST['new_cpassword'];
		$email = $_POST['email'];

		//Password Encripting
        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        if ($password === $cpassword) {
        	
        	$update_password = "update user SET password='$hash_password', reset_token='NULL',token_expire='NULL' WHERE email= '$email'";
        	$update_password_run = mysqli_query($conn, $update_password);

        	if ($update_password_run) {
        		$_SESSION['set_password_status'] = "Password Updated! <a href='http://backonhost.com/login.php'> Login Now</a>";
        	}
        }
        else{
        	$_SESSION['set_password_status'] = "Passwords not matched!";
        }
	}
	

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Set Password - Back On Host</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="app-logo.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-reset-password p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/app-logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Set Your New Password</h2>

					<div class="auth-intro mb-4 text-center">Enter your password below.</div>
					

					<?php  

						if (isset($_SESSION['set_password_status'])) {
							?>
								<h3 class="auth-heading text-center mb-5" style="color:red;"><?php echo $_SESSION['set_password_status']; ?></h3>
							<?php
						}

					?>


				<?php 


					if ($true) {
					?>
						<div class="auth-form-container text-left">
							
							<form class="auth-form resetpass-form" action="set-password.php" method="POST">                
								<div class="email mb-3">
									<label class="sr-only" for="reg-email">Password</label>
									<input id="reg-email" name="new_password" type="password" class="form-control login-email" placeholder="New Password" required="required">
								</div><!--//form-group-->
								<div class="email mb-3">
									<label class="sr-only" for="reg-email">Confirm Password</label>
									<input id="reg-email" name="new_cpassword" type="password" class="form-control login-email" placeholder="Confirm Password" required="required">
								</div>
								<div class="text-center">
									<button type="submit" name="set_password" class="btn app-btn-primary btn-block theme-btn mx-auto">Reset Password</button>
								</div>


								<input id="reg-email" name="email" type="hidden" class="form-control login-email" value="<?php echo $_GET['email']; ?>" required="required">

							</form>
							
							<div class="auth-option text-center pt-5"><a class="app-link" href="login.php" >Log in</a> <span class="px-2">|</span> <a class="app-link" href="signup.php" >Sign up</a></div>
						</div><!--//auth-form-container-->
					<?php	
					}
				?>

			    </div><!--//auth-body-->
		    	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 
