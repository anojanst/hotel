<?php
include '../conf/config.php';
include '../conf/opendb.php';
//Include The Database Connection File 

	$choice = $_GET['choice'];

	$query = "SELECT * FROM liquor WHERE liquor_type LIKE '$choice%'";
	echo $query;
	$result = mysqli_query($conn, $query);
		echo "<option disabled selected>Select liquor</option>";
	while ($row = mysqli_fetch_array($result)) {
   		echo '<option value="'.$row[id].'">' . $row[liquor] . '</option>';
	}
?>
