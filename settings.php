<?php session_start(); ?>

<?php 
	
	include 'dbcon.php';

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }

    if (isset($_POST['submit'])) {
    	$payment_method = $_POST['payment_method'];
    	$email = $_POST['email'];
    	$payment_id = $_POST['payment_id'];

    	$insert_query = "INSERT INTO `payment_method`(email, payment_method, payment_id) VALUES ('$email','$payment_method','$payment_id')";
    	$insert_query_run = mysqli_query($conn, $insert_query);

    	
    	
    	if ($insert_query_run) {
    		$_SESSION['payment_status'] = "Payment method updated";
    	}
    }

    
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Settings - Back On Host</title>
    
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

<body class="app">   	
    <?php include 'header.php'; ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Settings</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Setup Your Payment Method</h3>
		                
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">

						 		<?php

						 			if ( $_SESSION['payment_row'] == 0) {
						 				
						 			?>

							    <form class="settings-form" action="settings.php" method="POST">
								    
									<div class="mb-3">
										<?php 
											if (isset($_SESSION['payment_status'])) {
												?>

													<h4 for="setting-input-2" class="form-label" style="color: red;"><?php echo $_SESSION['payment_status']. " please <a href='logout.php'>logout</a> and login again!"; ?></h4>
													
												<?php 
											}
										?>
										
									    <label for="setting-input-2" class="form-label">Select Pyment Method</label><br>
									    <input type="radio" id="html" name="payment_method" value="upi" required>
										<label for="html">UPI (India 0% Fee)</label>  <br>  
										<input type="radio" id="css" name="payment_method" value="paypal" required>
										<label for="css">PayPal (World Wild 5% Fee)</label><br>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Enter Payment ID</label>
									    <input type="email" name="email" class="form-control" id="setting-input-3" value="<?php echo $_SESSION['email']; ?>" hidden>
									    <input type="text" name="payment_id" class="form-control" id="setting-input-3" placeholder="hello@companywebsite.com" required>

									    


									</div>
									<button type="submit" name="submit" class="btn app-btn-primary" >Save Changes</button>
							    </form>
							    	<?php
							    	}
							    	else{
							    		if (isset($_SESSION['payment_method'])) {
							    	
							    		
							    		?>

							    			<div class="mb-3">
											    <label for="setting-input-2" class="form-label">Your Current Payment Method</label><br>
											    <label for="setting-input-2" class="form-label"><?php echo $_SESSION['payment_method'].  " : " . $_SESSION['payment_id']; ?></label><br>
											    <label for="setting-input-2" class="form-label">If you want to change the payment method then please contact us: <br><b> Email: </b>contact@backtohost.com</label><br>
											    
											</div>

							    		<?php
							    		}
							    	}
							    ?>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                <hr class="my-4">
                
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

