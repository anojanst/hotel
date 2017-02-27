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
			            	<span class="info-box-icon bg-'.$color.'">'.$row[room_no].'</span>
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

echo'
	 <div class="box-body no-padding">
              <table class="table table-striped">
					<tr>
			
						<th>Room Number</th>
						<th>Booking No</th>
						<th>Caller Name</th>
						<th>From Date </th>
						<th>To Date </th>
						<th>Occupied Days</th>
						<th>Room Type</th>
						<th>Total Room Charge</th>
					</tr>
                ';
	$date=date('Y-m-d');
	
	$result=mysqli_query($conn, "SELECT COUNT(*) AS occupied_days FROM room_has_status WHERE booking_ref='$booking_ref' AND room_no='$room_no' AND date<='$date'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

		$occupied_days= $row['occupied_days'];
		
	$room_info=get_room_info_by_room_no($room_no);
	$room_charge_info= get_charge_info_by_room_type($room_info[room_cat]);
	
	$booking_info= get_booking_date_info_by_booking_ref($booking_ref);
	
	$sales_info= get_sales_info_booking_ref($booking_ref);
	
	$total_room_charge= $occupied_days*$room_charge_info['price'];

	$caller_info= get_caller_info_by_booking_id($booking_ref);

	echo'
					<tr>
						<td>  '.$room_no.' </td>
						<td>  '.$booking_ref.' </td>
						<td>  '.$caller_info['caller_name'].' </td>
						<td>  '.$booking_info['from_date'].' </td>
						<td>  '.$date.' </td>
						<td>  '.$occupied_days.' </td>
						<td>  '.$room_info[room_cat].' </td>
						<td>'.number_format($total_room_charge,2).'</td>
					</tr>
								
              		</table>
            	</div>
	
	<div class="row">
	 <div class="col-lg-6">
		<div class="box" >
            <div class="box-header">
              <font size="5"> <strong> Request Charges </font>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
					<tr>
						
						<th>Request Type</th>
						<th>Price</th>
					</tr>
                ';
	
			$i = 1;
			$result = mysqli_query ( $conn, "SELECT * FROM room_requests WHERE booking_ref='$booking_ref'" );
			while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )
			{
				echo'
					<tr>
						
						<td>'.$row[request].'</td>
						<td>  '.number_format($row[price],2).' </td>
					</tr>';
				$request_total+=$row[price];
			}
			echo'
					<tr>
						<td> <strong>Total</strong> </td>
						<td>  '.number_format($request_total,2).' </td>
					</tr>
								
              		</table>
            	</div>
          	</div>
			</div>
			
		';


			echo '
			
	 <div class="col-lg-6">
		<div class="box">
            <div class="box-header">
              <font size="5"> <strong> Sales bills  </font>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
					<tr>
			
						<th>Sales No</th>
						<th>Price</th>
					</tr>
                ';
			
			$i = 1;
			$result = mysqli_query ( $conn, "SELECT * FROM sales WHERE booking_ref='$booking_ref'" );
			while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) )
			{
				echo'
					<tr>
			
						<td>'.$row[sales_no].'</td>
						<td style="margin-left: 50px;" >  '.number_format($row[total],2).' </td>
					</tr>';
				$sales_total+=$row[total];
			}
			echo'
					<tr>
						<td><strong>Total</strong></td>
						<td>  '.number_format($sales_total,2).' </td>
					</tr>
			
              		</table>
            	</div>
          	</div>
		</div>
		</div>
		';

			$total=$request_total+$sales_total+$total_room_charge;
             echo'	<div class="row">
				    	<div class="col-lg-12">
					    	<div class="col-lg-3"> <font size="5"> <strong> Total Amount </font> </div>
					    	<div class="col-lg-3"> <font size="5">  '.number_format($total,2).' </font> </div>
				    	</div>
			    	</div><br/>
				<form role="form" action="room_vacate.php?job=room_pay&total='.$total.'&booking_ref='.$booking_ref.'&occupied_days='.$occupied_days.'&room_charge='.$total_room_charge.'&request_charges='.$request_total.'&sales_bills='.$sales_total.'" method="post" class="product" enctype="multipart/form-data">
										
					<div class="row">
				    	<div class="col-lg-12">
					    	<div class="col-lg-3"> <font size="5"> <strong> Discount </font> </div>
					    	<div class="col-lg-3"> <font size="5"> <input class="form-control" name="discount"  placeholder="Discount Amount">
							 </font> </div>
				    	</div>
			    	</div><br/>
					<div class="row">
				    	<div class="col-lg-12">
					    	<div class="col-lg-3"> <font size="5"> <strong> Damage </font> </div>
					    	<div class="col-lg-3"> <font size="5"> <input class="form-control" name="damage"  placeholder="Damage Amount">
							 </font> </div>
				    	</div>
			    	</div><br/>
             	<div class="row">
             		 <div class="col-lg-12">
							<div class="col-lg-3">  </div>
							<div class="col-lg-3"> <button  type="submit" class=" btn btn-block btn-danger"> Checkout </button></div>
					</div>  
            </div>
       	</form>         		                		
      </div>
     </div>';  
     }        		
             		

		
		
	
	//cancel_booking ( $_REQUEST ['booking_ref'] );
	//cancel_booking_has_caller($_REQUEST ['booking_ref']);
	//cancel_room_status($_REQUEST ['booking_ref'], $_REQUEST ['room_no']);
     include 'conf/closedb.php';
	
}

function save_room_bill($room_no, $booking_ref, $caller_name,$from_date,$date, $occupied_days, $room_charge, $request_charges, $sales_bills , $discount, $damage ) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$full_total =( $room_charge + $request_charges + $sales_bills +$damage ) - $discount;
	mysqli_select_db ( $conn, $dbname );
	
	$query = "INSERT INTO room_has_bill (id, booking_ref,caller_name,from_date, to_date, occupied_days, room_charge,request_charges, sales_bills, full_total, discount , damage)
	VALUES ('', '$booking_ref', '$caller_name','$from_date','$date', '$occupied_days', '$room_charge','$request_charges', '$sales_bills','$full_total', '$discount', '$damage')";

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

function print_room_vacate_bill($booking_ref){
	include 'conf/config.php';
	include 'conf/opendb.php';


	$date=date('Y-m-d');
	$result=mysqli_query($conn, "SELECT * FROM room_has_bill WHERE booking_ref='$booking_ref'" );
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		
		echo'<table style="width: 65%; margin-left: 50px;" class="table-responsive table-bordered table-striped dt-responsive">
		<tr>
			<th> </th>
			<th> </th>
			<th> </th>
		</tr>';
		
		echo'<tr style="line-height: 30px;">
            <td> </td>
            <td>Room Charge</td>
            <td align="right"> '.$row[room_charge].'</td>
        </tr>
		<tr style="line-height: 30px;">
            <td> </td>
            <td>Sales</td>
            <td align="right"> '.$row[sales_bills].'</td>
        </tr>
		<tr style="line-height: 30px;">
            <td> </td>
            <td>Room Request Charges</td>
            <td align="right"> '.$row[request_charges].'</td>
        </tr>
		<tr style="line-height: 30px;">
            <td> </td>
            <td>Discount</td>
            <td align="right"> - '.$row[discount].'</td>
        </tr>
		<tr style="line-height: 30px;">
            <td> </td>
            <td>Damage</td>
            <td align="right"> + '.$row[damage].'</td>
        </tr>';
		
		$net_total=($row[room_charge]+$row[sales_bills]+$row[request_charges]+$row[damage])-$row[discount];
		
		echo '<tr  style="line-height: 30px;">
            <td></td>
            <td><strong><h3>Net Amount </h3></strong></td>
            <td align="right"><strong><h3>'.number_format($net_total,2).'</h3></strong> </td>
        </tr>';		
	
	
	}
	
	echo'</table>';
	include 'conf/closedb.php';

}



