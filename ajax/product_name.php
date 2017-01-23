<?php
include '../conf/config.php';
include '../conf/opendb.php';

if (isset($_REQUEST['query'])) {

	$query = $_REQUEST['query'];
	
	$sql = mysqli_query ($conn,"SELECT * FROM inventory WHERE cancel_status='0' AND product_name LIKE '%{$query}%'");
	$array = array();
	
	while ($row = mysqli_fetch_assoc($sql)) {
		$array[] = $row['product_name'];
	}
	
	echo json_encode ($array); //Return the JSON Array
}

?>