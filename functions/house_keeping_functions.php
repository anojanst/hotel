<?php

function list_room_requests() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           
						   <th>Room No</th>
						   <th>Room Request</th>
						   <th>Details</th>
						   <th>view</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM room_requests" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '	
		<td>' . $row [room_no] . '</td>	
		<td>' . $row [request] . '</td>
		<td>' . $row [detail] . '</td>						
		<td><a > <i claEditss="fa fa-eye"></i></td>			
					
		<td><a href="house_keeping.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}

function save_room_request($id, $room_no ,$request,$request_ref ,$detail, $booking_ref) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO room_requests (id, room_no ,request, request_ref,detail, booking_ref)
	VALUES ('','$room_no' ,'$request', '$request_ref','$detail', '$booking_ref')";

	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );

}

function update_room_request ($id, $room_no ,$request, $detail) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE room_requests SET
	room_no='$room_no',
	request='$request',
	detail='$detail'

	WHERE id='$id'";

	mysqli_query ($conn, $query );


}

function get_room_request_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ($conn, "SELECT * FROM room_requests WHERE id='$id'" );

	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )

	{
		return $row;
	}


}

function delete_room_request($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM room_requests WHERE id='$id'";

	mysqli_query ($conn, $query );

}

function list_room_request_grid() {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM room_requests WHERE status!='billed'" );
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		

			echo '
				<div class="col-lg-3 col-xs-6">
					<div class="info-box">

						<a href="#"  >
			            	<span class="info-box-icon bg-lime">'.$row['room_no'].'</span>
						</a>

			            <div class="info-box-content">
			            	<span class="info-box-text">'.$row[request].'</span>
              				<span class="info-box-number">'.$row[detail].'</span>
              						
						 	<a href="house_keeping.php?job=complete_request&request_ref='.$row[request_ref].'">	<button  type="button" class="btn btn-block btn-danger"> Completed Request </button> </a>
            			</div>

            		</div>
              	</div>';


	}

}

function get_booking_ref_by_date_and_room_no($room_no,$date) {
	include 'conf/main_config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM room_has_status WHERE room_no='$room_no' AND date='$date' AND status='Occupied'" );

	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )

	{
		return $row['booking_ref'];
	}

}

function complete_cus_req($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE room_requests SET
	status='billed'
	WHERE id='$id'";

	mysqli_query ($conn, $query );

}

function list_request_type() {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ( $conn, "SELECT * FROM room_request_types" );
	$i = 0;
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		$request_types [$i] = $row ['request_type'];

		$i ++;
	}

	return $request_types;

}

function list_occupied_rooms_for_request() {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$date=date('Y-m-d');
	$result = mysqli_query ( $conn, "SELECT DISTINCT room_no FROM room_has_status WHERE date='$date' AND status='Occupied'" );
	$i = 0;
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		$occupied_rooms [$i] = $row ['room_no'];

		$i ++;
	}

	return $occupied_rooms;

}

function room_request_bill($request_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$date=date('Y-m-d');

	$result=mysqli_query($conn, "SELECT * FROM room_requests WHERE request_ref='$request_ref'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

		echo'

	<div class="col-xs-8">
		
          <div class="row">
      		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Room Number </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">'.$row[room_no].' </font></div>
              </div>

              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Request No </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">'.$row['request_ref'].'</font> </div>
              </div>

              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Request </strong> </font> </div>
                <div class="col-lg-6"> <font size="5"> '.$row['request'].'</font> </div>
              </div>

              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Detail </strong> </font> </div>
                <div class="col-lg-6"> <font size="5">  '.$row['detail'].' </font> </div>
              </div> 
              		
                		
           <form name="rooms_type_form" role="form" action="house_keeping.php?job=request_billing&request_ref='.$row['request_ref'].'" method="post">     		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5"> <strong> Charge </strong> </font> </div>';
		if($row[price]>0){
		 echo'<div class="col-lg-6"> <font size="5">  '.$row['price'].' </font> </div>';
			}else{
           	echo'
                <div class="col-lg-6"> <input class="form-control" name="request_charge"  required placeholder="Rs"> </div>
              </div>

            <div class="row">   		
              <div class="col-lg-12">
                <div class="col-lg-6"> <font size="5">  </div>
                <div class="col-lg-6" style="padding-top: 10px;"> <font size="5">  <button type="submit" class="btn btn-block btn-danger"> Update </button> </font> </div>
              </div>';
			}	
			echo'   		
           </div>     		
         </form>  
                		
    		</div>
       	</form>
      </div>


		';
	
	}

}

function get_request_ref(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT MAX(id) AS id FROM room_requests");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$max_id=$row['id']+1;
		$max_id = str_pad($max_id, 5, "0", STR_PAD_LEFT);
		$request_ref="REQUEST-".$max_id;
		return $request_ref;
	}
}

function update_room_request_price($request_ref,$request_charge) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE room_requests SET
	price='$request_charge',
	status='billed'
	WHERE request_ref='$request_ref'";

	mysqli_query ($conn, $query );

}