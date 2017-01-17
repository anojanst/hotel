<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/room_functions.php';
include 'functions/booking_functions.php';
include 'functions/call_functions.php';


$module_no = 9;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "booking_form") {
			
			$_SESSION['telephone_num']=$telephone_num=$_REQUEST['telephone_num'];
			
			$room_info=get_room_info_by_contact_number($telephone_num);
			
			$smarty->assign ( 'room_cat', $room_info ['room_cat'] );
			
			$smarty->assign ( 'room_category', list_room_type() );
			$smarty->assign ( 'room_no', list_room_number_by_type($room_info ['room_cat']) );
			
			$smarty->assign ( 'page', "Booking" );
			$smarty->display ( 'booking/booking.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			
				$telephone_num=$_SESSION['telephone_num'];
				
				$room_cat=$_POST ['room_cat'];
				$room_no = $_POST ['room_no'];
				
				$info=get_caller_info_by_contact_number($telephone_num);
				
				$caller_name=$info[caller_name];
				$caller_id=$info[id];

				$_SESSION ['booking_ref']= $booking_ref= get_booking_ref();
				
				$from_date=$_POST ['from_date'];
				$to_date = $_POST ['to_date'];
				
				if(check_room_status($from_date, $room_no)==1)
				{
					$smarty->assign('error_report',"on");
					$smarty->assign('error_message',"Sorry. Already booked");
				}
				elseif(check_room_status_to_date($to_date, $room_no)==1)
				{
					$smarty->assign('error_report',"on");
					$smarty->assign('error_message',"Sorry. Already booked");
				}
				else{
					
					save_booking( $from_date, $to_date, $booking_ref);
					
					$status_info= get_room_status_info();
					$status_id = $status_info['id'];
					
					while (strtotime($from_date) <= strtotime($to_date)) {
							
						save_room_status($from_date,$booking_ref,$room_no, $status_id);
							
						$from_date = date ("Y-m-d", strtotime("+1 day", strtotime($from_date)));
					}
					
					
					save_caller_info_to_booking($caller_id,$booking_ref, $caller_name, $room_no);
					save_room_has_booking($room_no,$booking_ref);
											
				}
				
			$smarty->assign ( 'room_category', list_room_type() );
			
			$smarty->assign ( 'page', "Booking" );
			$smarty->display ( 'booking/booking.tpl' );
			
		} 
		elseif ($_REQUEST ['job'] == "view_booking_detail") {

			$_SESSION ['booking_ref'] = $_REQUEST ['booking_ref'];
		
			$smarty->assign ( 'room_category', list_room_type() );
			$smarty->assign ( 'page', "Booking" );
			$smarty->display ( 'booking/booking_detail.tpl' );
				
		}

		else {
			
			$smarty->assign ( 'room_category', list_room_type() );
			$smarty->assign ( 'page', "Booking" );
			$smarty->display ( 'booking/booking.tpl' );
		}
}
else{

	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Booking." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}