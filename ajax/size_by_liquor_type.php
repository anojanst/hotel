<?php
include '../conf/config.php';
include '../conf/opendb.php';
//Include The Database Connection File 

	$choice = $_GET['choice'];

	
	if($choice=="Beer" OR $choice=="Soda"){
		echo '<option value="full" selected>Full Bottle</option>';
	}
	
		
	else{
   		echo '<option disabled selected>Select Size</option>
			  <option value="25 ml">25 ml</option>
			  <option value="50 ml">50 ml</option>
			  <option value="full">Full Bottle</option>';
	}
?>
