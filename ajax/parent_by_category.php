<?php
include '../conf/config.php';
include '../conf/opendb.php';
//Include The Database Connection File 

	$choice = $_GET['choice'];
	$query = "SELECT * FROM category WHERE cancel_status='0' AND parent_category LIKE '$choice%'";
	echo $query;
	$result = mysqli_query($conn, $query);
		echo "<option disabled selected> Select Category </option>";
	while ($row = mysqli_fetch_array($result)) {
   		echo "<option>" . $row{'category'} . "</option>";
	}
?>
