<?php
function list_all_booking() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  id="example1" style="width: 100%;" class="table table-bordered table-striped">
                  <thead>
                       <tr>
                           <th>Booking Number</th>
						   <th>From Date</th>
						   <th>To Date</th>
							<th>Name</th>
							<th>Room Number</th>
						   	<th> </th>
							<th> </th>
							<th> </th>
							<th>view</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	
	$result = mysqli_query ( $conn, "SELECT * FROM booking" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		$caller_info=get_caller_info_by_booking_id($row[booking_ref]);
		$guest_name=get_guest_info_by_booking_id($row[booking_ref]);
				
		echo '	
		<td>'.$row[booking_ref].' </td>	
		<td>'.$row[from_date].'</td>
		<td> '.$row[to_date].'</td>';
		
		if($caller_info[caller_name]){
			echo'<td>'.$caller_info[caller_name].'</td>';
		}
		else{
			echo'<td>'.$guest_name[guest_name].'</td>';			
		}
		
		echo'<td> '.$row[room_no].'</td> 
		<td> ';

				$staus_info=get_room_status_info_by_room_no($row['room_no']);
					if ($staus_info [status_id] == '2'){
					echo' 
							<a href="room_manage.php?job=update_occupied&room_no='.$row[room_no].'"> <button type="button" class="btn btn-block btn-warning"> Occupied </button></a>';
					}
					else{
	
						}
					
		echo'	</td>	
		<td><a href="room_manage.php?job=delete&booking_ref=' . $row [booking_ref] . '&room_no='.$row[room_no].'" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"> <button type="button" class="btn btn-block btn-danger"> Cancel whole booking </button></a></td>

		<td><a href="room_manage.php?job=booking_view_by_date&booking_ref=' . $row [booking_ref] . '&room_no='.$row[room_no].'"> <button type="button" class="btn btn-block btn-danger"> Cancel booking </button></a></td>			
				
		<td><a href="booking.php?job=view_booking_detail&booking_ref='.$row[booking_ref].'"> <i class="fa fa-eye"></i></a></td>

			
				
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}

function get_caller_info_by_booking_id($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM booking_has_caller WHERE booking_ref='$booking_ref'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
}

function get_guest_info_by_booking_id($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM room_has_guest WHERE booking_ref='$booking_ref'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
}

function cancel_booking_has_caller($booking_ref) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM booking_has_caller WHERE booking_ref='$booking_ref'";
	
	mysqli_query ($conn, $query );

}

function cancel_booking($booking_ref) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE booking SET
	from_date='$newdate'
	WHERE booking_ref='$booking_ref'";


	mysqli_query ($conn, $query );

}

function cancel_booking_by_date($booking_ref, $date) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM room_has_status WHERE booking_ref='$booking_ref' AND date='$date'";

	mysqli_query ($conn, $query );

}

function cancel_room_status($booking_ref, $room_no) {
	
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM room_has_status WHERE booking_ref='$booking_ref' AND room_no='$room_no'";

	mysqli_query ($conn, $query );

}


function update_from_date($booking_ref, $newdate) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE booking SET
	from_date='$newdate'
	WHERE booking_ref='$booking_ref'";

	mysqli_query ($conn, $query );

}

function update_to_date($booking_ref, $newdate) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE booking SET
	to_date='$newdate'
	WHERE booking_ref='$booking_ref'";

	mysqli_query ($conn, $query );

}

function update_room_as_occupied($room_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE room_has_status SET
	status='Occupied',
	status_id='3'
	WHERE room_no='$room_no'";

	mysqli_query ($conn, $query );


}

function get_room_status_info_by_room_no($room_no){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM room_has_status WHERE room_no='$room_no'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
}

function get_booking_table($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM booking WHERE booking_ref='$booking_ref'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
}


