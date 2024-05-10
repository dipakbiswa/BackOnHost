<?php session_start(); ?>

<?php 
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }


    


?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Offers - Back On Host</title>
    
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
			            <h1 class="app-page-title mb-0">Offers</h1>
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
												<th class="cell">Id</th>
												<th class="cell">Logo</th>
												<th class="cell">Brand Name</th>
												
												<th class="cell">Hold Period</th>
												<th class="cell">Cashback</th>
												<th class="cell">Buying Link</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="cell">1</td>
												<td class="cell"><img src="assets/images/hostinger.png" alt="user profile" style="height: 50px; width: 50px; border-radius: 50%;"></td>
												<td class="cell">Hostinger</td>
												
												<td class="cell"><span class="badge bg-danger">60 Days</span></td>
												<td class="cell">30% Max $25</td>
												<td class="cell">
													<input type="text" value="https://backonhost.com/refer.php?brand=hostinger&aff_id=<?php echo $_SESSION['email']; ?>" id="inputHostinger"  hidden>
													<a href="https://backonhost.com/refer.php?brand=hostinger&aff_id=<?php echo $_SESSION['email']; ?>"  target=”_blank”><button class="badge bg-success">Buy Now</button></a><br>
													<button class="badge bg-warning" onclick="myHostinger()">Copy Link</button>
												</td>
											</tr>
											<tr>
												<td class="cell">2</td>
												<td class="cell"><img src="assets/images/bluehost.jpg" alt="user profile" style="height: 50px; width: 50px; border-radius: 50%;"></td>
												<td class="cell">Bluehost</td>
												
												<td class="cell"><span class="badge bg-danger">60 Days</span></td>
												<td class="cell">$25</td>
												<td class="cell">
													<input type="text" value="https://backonhost.com/refer.php?brand=bluehost&aff_id=<?php echo $_SESSION['email']; ?>" id="inputBluehost"  hidden>
													<a href="https://backonhost.com/refer.php?brand=bluehost&aff_id=<?php echo $_SESSION['email']; ?>"  target=”_blank”><button class="badge bg-success">Buy Now</button></a><br>
													<button class="badge bg-warning" onclick="myBluehost()">Copy Link</button>
												</td>
											</tr>
											<tr>
												<td class="cell">3</td>
												<td class="cell"><img src="assets/images/greengeeks.png" alt="user profile" style="height: 50px; width: 50px; border-radius: 50%;"></td>
												<td class="cell">Green Geeks</td>
												
												<td class="cell"><span class="badge bg-danger">30 Days</span></td>
												<td class="cell">$25</td>
												<td class="cell">
													<input type="text" value="https://backonhost.com/refer.php?brand=greengeeks&aff_id=<?php echo $_SESSION['email']; ?>" id="inputGreengeeks"  hidden>
													<a href="https://backonhost.com/refer.php?brand=greengeeks&aff_id=<?php echo $_SESSION['email']; ?>"  target=”_blank”><button class="badge bg-success">Buy Now</button></a><br>
													<button class="badge bg-warning" onclick="myGreengeeks()">Copy Link</button>
												</td>
											</tr>
											
											<tr>
												<td class="cell">4</td>
												<td class="cell"><img src="assets/images/dreamhost.png" alt="user profile" style="height: 50px; width: 50px; border-radius: 50%;"></td>
												<td class="cell">Dream Host</td>
												
												<td class="cell"><span class="badge bg-danger">60 Days</span></td>
												<td class="cell">20%</td>
												<td class="cell">
													<input type="text" value="https://backonhost.com/refer.php?brand=dreamhost&aff_id=<?php echo $_SESSION['email']; ?>" id="inputDreamhost"  hidden>
													<a href="https://backonhost.com/refer.php?brand=dreamhost&aff_id=<?php echo $_SESSION['email']; ?>"  target=”_blank”><button class="badge bg-success">Buy Now</button></a><br>
													<button class="badge bg-warning" onclick="myDreamhost()">Copy Link</button>
												</td>
											</tr>
											
											<tr>
												<td class="cell">5</td>
												<td class="cell"><img src="assets/images/hostmonster.webp" alt="user profile" style="height: 50px; width: 50px; border-radius: 50%;"></td>
												<td class="cell">Host Monster</td>
												
												<td class="cell"><span class="badge bg-danger">60 Days</span></td>
												<td class="cell">$25</td>
												<td class="cell">
													<input type="text" value="https://backonhost.com/refer.php?brand=hostmonster&aff_id=<?php echo $_SESSION['email']; ?>" id="inputHostmonster"  hidden>
													<a href="https://backonhost.com/refer.php?brand=hostmonster&aff_id=<?php echo $_SESSION['email']; ?>"  target=”_blank”><button class="badge bg-success">Buy Now</button></a><br>
													<button class="badge bg-warning" onclick="myHostmonster()">Copy Link</button>
												</td>
											</tr>
											
											<tr>
												<td class="cell">6</td>
												<td class="cell"><img src="assets/images/justhost.png" alt="user profile" style="height: 50px; width: 50px; border-radius: 50%;"></td>
												<td class="cell">Just Host</td>
												
												<td class="cell"><span class="badge bg-danger">60 Days</span></td>
												<td class="cell">$25</td>
												<td class="cell">
													<input type="text" value="https://backonhost.com/refer.php?brand=justhost&aff_id=<?php echo $_SESSION['email']; ?>" id="inputJusthost"  hidden>
													<a href="https://backonhost.com/refer.php?brand=justhost&aff_id=<?php echo $_SESSION['email']; ?>"  target=”_blank”><button class="badge bg-success">Buy Now</button></a><br>
													<button class="badge bg-warning" onclick="myJusthost()">Copy Link</button>
												</td>
											</tr>

											<tr>
												<td class="cell">7</td>
												<td class="cell"><img src="assets/images/hostpapa.jpg" alt="user profile" style="height: 50px; width: 50px; border-radius: 50%;"></td>
												<td class="cell">Host Papa</td>
												
												<td class="cell"><span class="badge bg-danger">60 Days</span></td>
												<td class="cell">$20</td>
												<td class="cell">
													<input type="text" value="https://backonhost.com/refer.php?brand=hostpapa&aff_id=<?php echo $_SESSION['email']; ?>" id="inputHostpapa"  hidden>
													<a href="https://backonhost.com/refer.php?brand=hostpapa&aff_id=<?php echo $_SESSION['email']; ?>"  target=”_blank”><button class="badge bg-success">Buy Now</button></a><br>
													<button class="badge bg-warning" onclick="myHostpapa()">Copy Link</button>
												</td>
											</tr>
		
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
						
			        </div><!--//tab-pane-->
			        
			  
				
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	   
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          


    <script>
      function myHostinger() {
		  // Get the text field
		  var copyText = document.getElementById("inputHostinger");

		  // Select the text field
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); // For mobile devices

		   // Copy the text inside the text field
		  navigator.clipboard.writeText(copyText.value);

		  // Alert the copied text
		  alert("Link Copied!");
	}
	function myBluehost() {
		  // Get the text field
		  var copyText = document.getElementById("inputBluehost");

		  // Select the text field
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); // For mobile devices

		   // Copy the text inside the text field
		  navigator.clipboard.writeText(copyText.value);

		  // Alert the copied text
		  alert("Link Copied!");
	}
	function myGreengeeks() {
		  // Get the text field
		  var copyText = document.getElementById("inputGreengeeks");

		  // Select the text field
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); // For mobile devices

		   // Copy the text inside the text field
		  navigator.clipboard.writeText(copyText.value);

		  // Alert the copied text
		  alert("Link Copied!");
	}
	function myDreamhost() {
		  // Get the text field
		  var copyText = document.getElementById("inputDreamhost");

		  // Select the text field
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); // For mobile devices

		   // Copy the text inside the text field
		  navigator.clipboard.writeText(copyText.value);

		  // Alert the copied text
		  alert("Link Copied!");
	}
	function myHostmonster() {
		  // Get the text field
		  var copyText = document.getElementById("inputHostmonster");

		  // Select the text field
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); // For mobile devices

		   // Copy the text inside the text field
		  navigator.clipboard.writeText(copyText.value);

		  // Alert the copied text
		  alert("Link Copied!");
	}
	function myJusthost() {
		  // Get the text field
		  var copyText = document.getElementById("inputJusthost");

		  // Select the text field
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); // For mobile devices

		   // Copy the text inside the text field
		  navigator.clipboard.writeText(copyText.value);

		  // Alert the copied text
		  alert("Link Copied!");
	}
	function myHostpapa() {
		  // Get the text field
		  var copyText = document.getElementById("inputHostpapa");

		  // Select the text field
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); // For mobile devices

		   // Copy the text inside the text field
		  navigator.clipboard.writeText(copyText.value);

		  // Alert the copied text
		  alert("Link Copied!");
	}
    </script>

    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

