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
						 	<button type="button" class="btn btn-block btn-danger"> Vacate </button>		
            			</div>
			            			
            		</div>
              	</div>';
		}
		else{
			$color="green";
	
	
		}
	
	
	}
		
}



