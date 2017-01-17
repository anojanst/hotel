<?php
include '../conf/config.php';
include '../conf/opendb.php';
//Include The Database Connection File 

	$choice = $_GET['choice'];
		echo 123;
		echo "SELECT * FROM room WHERE room_cat LIKE '$choice%'";
	$query = "SELECT * FROM room WHERE room_cat LIKE '$choice%'";
	echo $query;
	$result = mysqli_query($conn, $query);
		echo "<option disabled selected>Select Room Category</option>";
	while ($row = mysqli_fetch_array($result)) {
   		echo "<option>" . $row{'room_no'} . "</option>";
	}
?>
