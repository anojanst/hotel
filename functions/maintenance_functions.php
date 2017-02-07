<?php


function list_meal_type_for_sale(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM room WHERE room.room_no NOT IN (SELECT room_no FROM room_has_status WHERE status='Occupied') ORDER BY room_no ASC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo'   <option value="'.$row[room_no].'">'.$row[room_no].'</option>';
	}
	include 'conf/closedb.php';

}
