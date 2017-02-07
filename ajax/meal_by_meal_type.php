<?php
include '../conf/config.php';
include '../conf/opendb.php';
//Include The Database Connection File 

	$choice = $_GET['choice'];

	$query = "SELECT * FROM meal WHERE meal LIKE '$choice%'";
	echo $query;
	$result = mysqli_query($conn, $query);
		echo "<option disabled selected>Select Room Category</option>";
	while ($row = mysqli_fetch_array($result)) {
   		echo "<option>" . $row{'meal_name'} . "</option>";
	}
?>
