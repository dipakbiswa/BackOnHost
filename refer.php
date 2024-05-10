<?php 

	$brand = $_GET['brand'];
	$aff_id = $_GET['aff_id'];

	if ( $brand == 'hostinger') {
		header("location: https://www.hostg.xyz/aff_c?offer_id=6&aff_id=48785&source=$aff_id");
	}
	if ( $brand == 'bluehost') {
		header("location: https://www.bluehost.com/track/dipakbiswa/$aff_id");
	}
	if ( $brand == 'greengeeks') {
		header("location: https://www.greengeeks.com/affiliates/track.php?affiliate=dipakbiswa&campaign=$aff_id");
	}
	if ( $brand == 'dreamhost') {
		header("location: http://click.dreamhost.com/aff_c?offer_id=8&aff_id=7874&source=$aff_id");
	}
	if ( $brand == 'hostmonster') {
		header("location: https://www.hostmonster.com/track/dipakbiswa/$aff_id");
	}
	if ( $brand == 'justhost') {
		header("location: https://www.justhost.com/track/dipakbiswa/$aff_id");
	}
	if ( $brand == 'hostpapa') {
		header("location: https://tracking.opienetwork.com/aff_c?offer_id=437&aff_id=21604&source=$aff_id");
	}



?>