<?php
function list_occupied_rooms() {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM room" );
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		if($_SESSION['selected_date']){
			$date=$_SESSION['selected_date'];
		}else{
			$date=date('Y-m-d');
		}
	
		$room_status_info=get_room_occupied_status_info($row['room_no'], $date);
		if($room_status_info[status_id]){
			$status_info=get_status_info($room_status_info[status_id]);
			$color=$status_info['color'];
	
			echo '
				<div class="col-lg-4 col-xs-6">
					<div class="info-box">
	
						<a href="room_info.php?job=room_info&room_no=' . $row [room_no] . '"  >
			            	<span class="info-box-icon bg-'.$color.'">'.$row['room_no'].'</span>
						</a>
	
			            <div class="info-box-content">
						 <a href="room_vacate.php?job=room_vacate&booking_ref='.$room_status_info[booking_ref].'&room_no=' . $row [room_no] . '">	<button  type="button" class="btn btn-block btn-danger"> Vacate </button> </a>		
            			</div>
			            			
            		</div>
              	</div>';
		}
		else{
			$color="green";
	
	
		}
	
	
	}
		
}

function room_vacate_bill($booking_ref, $room_no){
	include 'conf/config.php';
	include 'conf/opendb.php';


	
	$date=date('Y-m-d');
	
	$result=mysqli_query($conn, "SELECT COUNT(*) AS occupied_days FROM room_has_status WHERE booking_ref='$booking_ref' AND room_no='$room_no' AND date<='$date'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

		$occupied_days= $row['occupied_days'];
		
	$room_info=get_room_info_by_room_no($room_no);
	$room_charge_info= get_charge_info_by_room_type($room_info[room_cat]);
	
	$booking_info= get_booking_date_info_by_booking_ref($booking_ref);
	
	$total_room_charge= $occupied_days*$room_charge_info['price'];
	$caller_info= get_caller_info_by_booking_id($booking_ref);

	echo'
	
	<div class="col-xs-8">
	
          <div class="table-responsive">
            <table class="table" style="font-size:20px;">
              <div class="col-lg-12">
                <div class="col-lg-6"> <strong> <font size="5">Room Number <strong> </font> </div>
                <div class="col-lg-6"> <font size="5">'.$room_no.' </font></div>
              </div>
                		
              <div class="col-lg-12">
                <div class="col-lg-6"> <strong> <font size="5">Booking No<strong> </font> </div>
                <div class="col-lg-6"> <font size="5">'.$booking_ref.'</font> </div>
              </div>
                		
              <div class="col-lg-12">
                <th>Caller Name</th>
                <td>'.$caller_info['caller_name'].'</td>
              </div>
                		
              <div class="col-lg-12">
                <th> Date</th>
                <td>'.$booking_info['from_date'].' to '.$date.'</td>
              </div>               		
                		                		
              <div class="col-lg-12">
                <th>Occupied Days </th>
                <td> '.$occupied_days.'</td>
              </div>
                		
              <div class="col-lg-12">
                <th>Room Type </th>
                <td> '.$room_info[room_cat].'</td>
              </div>
                		
              <div class="col-lg-12">
                <th>Total Room Charge </th>
                <td> '.$total_room_charge.'</td>
              </div>

              <div class="col-lg-12">
                <th> </th>
                <td> <a href="room_vacate.php?job=room_vacate&booking_ref='.$room_status_info[booking_ref].'&room_no=' . $row [room_no] . '">	<button  type="button" class="btn btn-block btn-danger"> Pay Now </button> </a></td>
              </div>                		
                			
            </table>
    </div>
	
		';
		
		
	}


	
	include 'conf/closedb.php';


}


function get_charge_info_by_room_type($room_cat) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ($conn, "SELECT * FROM room_type_has_charges WHERE category='$room_cat'" );

	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )

	{
		return $row;
	}


}
