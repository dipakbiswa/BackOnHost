<?php  
	session_start();
	include 'dbcon.php';
	if (isset($_POST['login'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];



        $email_query = "select * from user where email = '$email'";
        $email_query_run = mysqli_query($conn, $email_query);

        $email_row = mysqli_num_rows($email_query_run);



        if ($email_row == 0) {
            $_SESSION['login_status'] = "Email address not found!";
            
        }
        else{
        		$result_fetch = mysqli_fetch_assoc($email_query_run);
        		if (password_verify($password, $result_fetch['password'])) {
        			
        				if ($result_fetch['is_verified'] == 0) {
		            		$_SESSION['login_status'] = "Please Verify Your Email!";
			            }
			            else{

				            $_SESSION['username'] = $result_fetch['name'];
				            $_SESSION['email'] = $result_fetch['email'];
				            $_SESSION['phone'] = $result_fetch['phone'];


				            //Cookie Set
				            if (isset($_POST['remember_me'])) {
				            	setcookie('email', $email, time() + (60*60+24) );
				            	setcookie('password', $password, time() + (60*60+24) );
				            }
				            else{  //Cookie Unset when Remember Me unset
				            	setcookie('email', '', time() - (60*60+24) );
				            	setcookie('password', '', time() - (60*60+24) );
				            }


				            
				            
				            //Redirecting to Dashboard Onece Login
				            header('location: dashboard.php');

				            
			        	}
        		}
        		else{
        			$_SESSION['login_status'] = "Password Incorrect!";
        		}
            
        }

        


        //Fetching Payment Method Row number for Payment method page
        $select_row = "select * from payment_method where email = '$email'";
	    $select_row_run = mysqli_query($conn, $select_row);
	    $payment_row = mysqli_num_rows($select_row_run);
	    $_SESSION['payment_row'] = $payment_row;


	    
	    //Fetching Payment Methods
	    if (isset($_SESSION['username'])) {
	    	$fetch_data = mysqli_fetch_assoc($select_row_run);
			$_SESSION['payment_method'] = $fetch_data['payment_method'];
			$_SESSION['payment_id'] = $fetch_data['payment_id'];
	    }
	   	
	    
	    
	    

	    //Fetching Sales Count
	    $select_report = "select * from report where email = '$email'";
	    $select_report_run = mysqli_query($conn, $select_report);
	    $select_report_run_rows = mysqli_num_rows($select_report_run);
	    $_SESSION['sales'] = 0;
	    $_SESSION['sales'] = $select_report_run_rows;



	    //Fetching Sales Amount
	    $_SESSION['amount'] = 0;
	    $_SESSION['commission'] = 0;
	    while ($amount = mysqli_fetch_assoc($select_report_run)) {

	    	//Fetching Sales Amount
	    	$_SESSION['amount'] = $_SESSION['amount'] + $amount['amount'];

	    	//Fetching Sales Commission
	    	$_SESSION['commission'] = $_SESSION['commission'] + $amount['commission'];

	    }


	    //Fetching Paid Amount
	    $select_paid_amount = "select * from report where email = '$email' and payment_status= 'Paid'";
	    $select_paid_amount_run = mysqli_query($conn, $select_paid_amount);
	    
	    $_SESSION['paid_amount'] = 0;
	    while($paid_amount = mysqli_fetch_assoc($select_paid_amount_run)){
	    	$_SESSION['paid_amount'] = $_SESSION['paid_amount'] + $paid_amount['commission'];
	    }

        
    }

    //Cookie Fetch
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
		$cookie_email = $_COOKIE['email'];
		$cookie_password = $_COOKIE['password'];
	}
	else{
		$cookie_email = "";
		$cookie_password = "";
	}

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Login - Back On Host</title>
    
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

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/app-logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
					<?php  

						if (isset($_SESSION['login_status'])) {
							?>
								<h3 class="auth-heading text-center mb-5" style="color:red;"><?php echo $_SESSION['login_status']; ?></h3>
							<?php
						}

					?>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" action="login.php" method="POST">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="email" type="email" class="form-control signin-email" placeholder="Email address" value="<?php echo $cookie_email; ?>" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" value="<?php echo $cookie_password; ?>" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="remember_me" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.php">Forgot password?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" name="login" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.php" >here</a>.</div>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

