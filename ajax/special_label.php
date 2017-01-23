<?php
include '../conf/config.php';
include '../conf/opendb.php';
//Include The Database Connection File 

	$choice = $_GET['choice'];
	$query = "SELECT * FROM special_label WHERE parent_category LIKE '$choice%'";
	echo $query;
	$result = mysqli_query($conn, $query);
		echo "<option disabled> Select Label </option>";
	while ($row = mysqli_fetch_array($result)) {
   		echo "<option>" . $row['label'] . "</option>";
	}
?>
