<?php session_start(); ?>

<?php 
	include 'dbcon.php';
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }

    $select_query = "select * from notification order by id desc";
    $select_query_run = mysqli_query($conn, $select_query);



?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Notification - Back On Host</title>
    
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
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Notifications</h1>
					    </div>
					    
				    </div>
			    </div>
			    
			    <?php  

			    	while($fetch_data = mysqli_fetch_assoc($select_query_run)){
			    		?>
			    			<div class="app-card app-card-notification shadow-sm mb-4">
							    <div class="app-card-header px-4 py-3">
							        <div class="row g-3 align-items-center">
								        <div class="col-12 col-lg-auto text-center text-lg-start">
									        <h4 class="notification-title mb-1"><?php echo $fetch_data['subject']; ?></h4>
								        </div><!--//col-->
							        </div><!--//row-->
							    </div><!--//app-card-header-->
							    <div class="app-card-body p-4">
								    <div class="notification-content">
								    	<?php echo $fetch_data['message']; ?>
								    </div>
							    </div><!--//app-card-body-->
							</div><!--//app-card-->
			    		<?php 
			    	}
				
				?>
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

