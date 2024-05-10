<?php session_start(); ?>

<?php 

	include 'dbcon.php';
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }


    //pagination Code
	$limit = 8;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	else{
		$page = 1;
	}
	$offset = ($page -1) * $limit;



	//selection code
    $email = $_SESSION['email'];
    $select_report = "select * from report where email = '$email' order by id desc limit {$offset},{$limit}";
    $select_report_run = mysqli_query($conn, $select_report);

   

    /*
    //Payment Status Color
    $fetch_data_report = mysqli_fetch_assoc($select_report_run);
    $fetch_value = $fetch_data_report['payment_status'];

    if ($fetch_value == "On Hold") {
    	$_SESSION['class'] = "bg-warning";
    }
    if ($fetch_value == "paid") {
    	$_SESSION['bg-success'] = "bg-success";
    }
	*/




?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Sales Report - Back On Host</title>
    
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
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Reports</h1>
				    </div>

				    <div class="col-auto">
			            <h3 class="truncate" style="color: red; font-size: 15px;">It takes about 24 Hours to Track a Conversion.</h3>
				    </div>
			    </div><!--//row-->
			   
			    
			    
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<!--<th class="cell">Sl</th>-->
												<th class="cell">Brand</th>
												<th class="cell">Date & Time</th>
												<th class="cell">Amount ($)</th>
												<th class="cell">Commission ($)</th>
												<th class="cell">Payment Date</th>
												<th class="cell">Payment Status</th>
											</tr>
										</thead>
										<tbody>
											
												<?php  

													

													while ($row = mysqli_fetch_assoc($select_report_run )) {

														//Class for payment status
														if ($row['payment_status'] == "On Hold") {
															$class = "warning";
														}
														if ($row['payment_status'] == "Paid") {
															$class = "success";
														}
														if ($row['payment_status'] == "Refund") {
															$class = "danger";
														}

														?>
															<tr>
																<!--<td class="cell"><?php echo $row['id']; ?></td>-->
																<td class="cell"><span class="truncate"><?php echo $row['brand']; ?></span></td>
																<td class="cell"><?php echo $row['time']; ?></td>
																<td class="cell"><span>$ <?php echo $row['amount']; ?></span></td>
																<td class="cell"><span>$ <?php echo $row['commission']; ?></span></td>
																<td class="cell"><span><?php echo $row['payment_date']; ?></span></td>
																<td class="cell"><span class="badge bg-<?php echo $class; ?>"><?php echo $row['payment_status']; ?></span></td>
															</tr>
														<?php 
													}
												?>
												
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
						
			        </div><!--//tab-pane-->

				</div><!--//tab-content-->


				
				<nav class="app-pagination mt-5">

					<?php 


						$pageination = "select * from report";
						$pageination_run = mysqli_query($conn, $pageination);



						if (mysqli_num_rows($pageination_run) > 0) {
							$total_records = mysqli_num_rows($pageination_run);
							
							$total_pages = ceil($total_records / $limit);


							echo '<ul class="pagination justify-content-center">';
							if ($page > 1) {
								echo '<li class="page-item">
										<a class="page-link" href="report.php?page='.($page - 1).'" tabindex="-1" aria-disabled="true">Previous</a>
					    			</li>';
							}
							
							for ($i=1; $i <= $total_pages ; $i++) { 
								if ($i == $page) {
									$active = "active";
								}
								else{
									$active = "";
								}
								echo '<li class="page-item '.$active.'"><a class="page-link" href="report.php?page='.$i.'">'.$i.'</a></li>';
							}
							if ($total_pages > $page) {
								echo '<li class="page-item">
						    			<a class="page-link" href="report.php?page='.($page + 1).'">Next</a>
									</li>';
							}
							
							echo '</ul>';
						}
					?>
					
						<!--
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						-->
					
				</nav><!--//app-pagination-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	   
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

