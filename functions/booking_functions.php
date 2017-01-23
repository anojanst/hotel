<?php
function save_booking( $from_date, $to_date, $booking_ref) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname);

	$query = "INSERT INTO booking (id, from_date, to_date, booking_ref)
	VALUES ('', '$from_date','$to_date','$booking_ref')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
		
}

function save_caller_info_to_booking($caller_id,$booking_ref, $caller_name, $room_no) {

	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ( $conn, $dbname );
	
	$query = "INSERT INTO booking_has_caller (id, caller_id,booking_ref, caller_name,room_no)
	VALUES ('', '$caller_id', '$booking_ref', '$caller_name','$room_no')";

	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );

}

function save_room_has_booking($room_no,$booking_ref) {

	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ( $conn, $dbname );

	$query = "INSERT INTO room_has_booking (id, room_no,booking_ref)
	VALUES ('', '$room_no', '$booking_ref')";

	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );

}

function list_booking() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  id="example1" style="width: 100%;" class="table table-bordered table-striped">
                  <thead>
                       <tr>
                           <th>Caller Name</th>
						   <th>Contact No</th>
						   <th>Room No</th>
						   <th>view</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	
	$result = mysqli_query ( $conn, "SELECT * FROM booking_has_caller" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		$caller_info=get_caller_info_by_caller_id($row[caller_id]);
		
		echo '	
		<td>'.$row[caller_name].' </td>	
		<td> '.$caller_info[phone].'</td>
		<td> '.$row[room_no].'</td>	
		<td><a href="booking.php?job=view_booking_detail&booking_ref='.$row[booking_ref].'"> <i class="fa fa-eye"></i></a></td>									
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}

function list_booking_full_detail($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM booking WHERE booking_ref='$booking_ref'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$caller_info=get_booking_info_by_booking_ref($row[booking_ref]);
		
		echo'

	<div class="col-xs-8">

          <div class="table-responsive">
            <table class="table" style="font-size:20px;">
              <tr>
                <th style="width:50%">Booking Number:</th>
                <td>'.$row[booking_ref].'</td>
              </tr>
              <tr>
                <th>From Date </th>
                <td>'.$row[from_date].'</td>
              </tr>
              <tr>
                <th>To Date </th>
                <td>'.$row[to_date].'</td>
              </tr>                		
                		
              <tr>
                <th style="width:50%">Name :</th>
                <td>'.$caller_info[caller_name].'</td>
              </tr>
              <tr>
                <th>Room Number </th>
                <td>'.$caller_info[room_no].'</td>
              </tr>
                         		                		                		

            </table>
    </div>          					
				
		';

	}

	include 'conf/closedb.php';
}

function get_booking_info_by_booking_ref($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM booking_has_caller WHERE booking_ref='$booking_ref'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
}

function get_booking_ref(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT MAX(id) AS id FROM booking");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$max_id=$row['id']+1;
		$max_id = str_pad($max_id, 5, "0", STR_PAD_LEFT);
		$booking_ref="BOOKING-".$max_id;
		return $booking_ref;
	}
}




function save_daterange($from_date, $to_date) {
	include 'conf/config.php';
	include 'conf/opendb.php';


	$result = mysqli_query ( $conn, "SELECT * FROM room_has_status WHERE  " );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		$caller_info=get_caller_info_by_caller_id($row[caller_id]);

		echo '
		<td>'.$row[caller_name].' </td>
		<td> '.$caller_info[phone].'</td>
		<td> '.$row[room_no].'</td>
		<td><a href="booking.php?job=view_booking_detail&booking_ref='.$row[booking_ref].'"> <i class="fa fa-eye"></i></a></td>
		</tr>';

		$i ++;
	}


}

function save_room_status( $from_date, $booking_ref,$room_no, $status_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ( $conn, $dbname);

	$query = "INSERT INTO room_has_status (id, date, booking_ref,room_no, status_id, status)
	VALUES ('', '$from_date','$booking_ref','$room_no','$status_id', 'Booked')";

	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );

}

function get_room_status_info(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM room_status WHERE status='Booked'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
}


function list_booking_by_date($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	echo '<div class="box-body">
			<table style="width: 100%;" class="table table-bordered table-striped">
                  <thead>
                       <tr>
                           <th>Booking Number</th>
						   <th>From Date</th>
						   <th>To Date</th>
							<th>Caller</th>
							<th>Room Number</th>
							<th> </th>
							
                       </tr>
                  </thead>
                  <tbody valign="top">';


	$result = mysqli_query ( $conn, "SELECT * FROM room_has_status WHERE booking_ref='$booking_ref'" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {

		$caller_info=get_caller_info_by_booking_id($row[booking_ref]);
		$booking_info=get_booking_date_info_by_booking_ref($row[booking_ref]);

		echo '
		<td>'.$row[booking_ref].' </td>
		<td>'.$row[date].'</td>
		<td> '.$row['room_no'].'</td>
		<td>'.$caller_info[caller_name].'</td>
		<td> '.$caller_info[room_no].'</td>';
		
		if($row['date']==$booking_info['from_date']||$row['date']==$booking_info['to_date']){		
		echo '<td><a href="room_manage.php?job=delete_by_date&booking_ref=' . $row [booking_ref] . '&room_no='.$caller_info[room_no].'&date='.$row[date].'" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"> <button type="button" class="btn btn-block btn-danger"> Cancel booking </button></a></td>';
		}
		else{
		
		}
		echo' 
		</tr>';

		$i ++;
	}

	echo '</tbody>
          </table>
          </div>';


}

function get_booking_date_info_by_booking_ref($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM booking WHERE booking_ref='$booking_ref'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
}

function check_room_status($from_date, $room_no) {

	$password=md5($password);
	include 'conf/config.php';
	include 'conf/opendb.php';

	if(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM room_has_status WHERE date ='$from_date' AND room_no='$room_no'"))){
		return 1;
	}
	else{
		return 0;
	}

	include 'conf/closedb.php';
}



function check_room_status_to_date($to_date, $room_no) {

	$password=md5($password);
	include 'conf/config.php';
	include 'conf/opendb.php';

	if(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM room_has_status WHERE date ='$to_date' AND room_no='$room_no'"))){
		return 1;
	}
	else{
		return 0;
	}

	include 'conf/closedb.php';
}

