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
           
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Room Number </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">'.$room_no.' </font></div>
              </div>
                		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Booking No </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">'.$booking_ref.'</font> </div>
              </div>
                		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Caller Name </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">  '.$caller_info['caller_name'].'</font> </div>
              </div>
                		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> From Date </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">  '.$booking_info['from_date'].' </font> </div>
              </div>

              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> To Date </strong> </font> </div>
                <div class="col-lg-6"> <font size="5"> '.$date.' </font> </div>
              </div>                  		
                		                		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Occupied Days </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">  '.$occupied_days.' </font> </div>
              </div>
                		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Room Type </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">  '.$room_info[room_cat].' </font> </div>
              </div>
                		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Total Room Charge </font> </div>
                <div class="col-lg-6"> <font size="5">  '.$total_room_charge.' </font> </div>
              </div>

              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5">  </th>
                <div class="col-lg-6"> <font size="5">  <button  type="submit" class="btn btn-block btn-danger"> Pay Now </button> </font> </div>
              </div>                		
                			         
    		</div>
       	</form>         		                		
      </div>          		
                		
	
		';

		save_room_bill($room_no, $booking_ref, $caller_info['caller_name'],$booking_info['from_date'],$date, $occupied_days, $total_room_charge );
		
	}
	cancel_booking ( $_REQUEST ['booking_ref'] );
	cancel_booking_has_caller($_REQUEST ['booking_ref']);
	cancel_room_status($_REQUEST ['booking_ref'], $_REQUEST ['room_no']);

}

function save_room_bill($room_no, $booking_ref, $caller_name,$from_date,$date, $occupied_days, $total_room_charge ) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO room_has_bill (id, booking_ref,caller_name,from_date, to_date, occupied_days, room_charge)
	VALUES ('', '$booking_ref', '$caller_name','$from_date','$date', '$occupied_days', '$total_room_charge')";

	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );

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
