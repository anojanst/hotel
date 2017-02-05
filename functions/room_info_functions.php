<?php
function list_room_information($room_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM room WHERE room_no='$room_no'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$room_fac= get_facility_info_by_room_no($row[room_no]);
		$book_info= get_book_info_by_room_no ($row[room_no]);
			
	
		echo'
	
	<div class="col-xs-12">
	
          <div class="table-responsive">
            <table class="table" style="font-size:16px;">
              <tr>
                <th width="200">Room Number</th>
                <td>'.$row[room_no].'</td>
              </tr>
              <tr>
                <th>Facilities</th>
                <td>'.$room_fac.'</td>
              </tr>
              <tr>
                <th>Bookings </th>
                <td> '.$book_info.'</td>
              </tr>
              <tr>
                <th>Room Status </th>
                <td> </td>
              </tr>   
          <div class="col-lg-6">      		             		';
		 get_room_status_by_room_no($row[room_no]);
		
           echo'                		
                </div>		
                         		     
	
            </table>
    </div>
	
		';
	
	}

	include 'conf/closedb.php';
	
}

function get_facility_info_by_room_no($room_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ($conn, "SELECT * FROM room_has_facility WHERE room_no='$room_no'" );
	$i=0;
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )

	{
		if($i==0){
			$facility=$row['facility'];
		}
		else{
			$facility=$facility.'<br> '.$row['facility'];
		}
		$i++;
	}

	return $facility;	

}

function get_book_info_by_room_no($room_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ($conn, "SELECT * FROM room_has_booking WHERE room_no='$room_no'" );
	$i=0;
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )

	{
		if($i==0){
			$booking_ref=$row['booking_ref'];
		}
		else{
			$booking_ref=$booking_ref.'<br> '.$row['booking_ref'];
		}
		$i++;
	}

	return $booking_ref;

}



function get_room_status_by_room_no($room_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	echo' 				
			<div class="box-body">
			<table  id="example1" style="width: 100%;" class="table table-bordered table-striped">
                  <thead>
                       <tr>
                           <th>Date</th>
						   <th>Status</th>
						   <th>Status</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	
	$date= date("Y/m/d");
	
	
	$result = mysqli_query ($conn, "SELECT * FROM room_has_status WHERE room_no='$room_no' AND date>='$date' " );
	$i=0;
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )

	{
		$date=date('Y-m-d');
		$room_status_info=get_room_has_status_info($row['room_no'], $row['date']);
		if($room_status_info[status_id]){
			$status_info=get_status_info($room_status_info[status_id]);
			$color=$status_info['color'];
		}
		else{
			$color="lime";
		}
		echo'
	
                		
					<tr>
					<td>' . $row[date] . '</td>
					<td>' . $row[status] . '</td>
					<td>						<a href="room_info.php?job=room_info&room_no=' . $row [room_no] . '"  >
			            	<span class="info-box-icon bg-'.$color.'" style="height: 20px; width: 20px;"></span>
						</a></td>		
					</tr>';                		
	}
	echo '</tbody>
          </table>
          </div>';

	include 'conf/closedb.php';

}

