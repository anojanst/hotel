<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/room_manage_functions.php';
include 'functions/booking_functions.php';
include 'functions/room_vacate_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';
include 'functions/sales_functions.php';

$module_no = 10;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "room_vacate_form") {
		
			$smarty->assign ( 'page', "Room Manage" );
			$smarty->display ( 'room_vacate/room_vacate.tpl' );
			
		} 

		elseif($_REQUEST['job']=='room_vacate'){
						
			$_SESSION['booking_ref']=$booking_ref=$_REQUEST['booking_ref'];
			
			$_SESSION['room_no']=$room_no=$_REQUEST['room_no'];
			
			$smarty->assign ( 'page', "Bill" );
			$smarty->display ( 'room_vacate/room_vacate_bill.tpl' );
			
		}
			
		elseif($_REQUEST['job']=='room_pay'){
		
			$booking_ref=$_SESSION['booking_ref'];
				
			$room_no=$_SESSION['room_no'];
			
			$room_charge= $_REQUEST['room_charge'];
			
			$request_charges= $_REQUEST['request_charges'];
			
			$sales_bills= $_REQUEST['sales_bills'];
			
			$occupied_days= $_REQUEST['occupied_days'];
			
			$date=date('Y-m-d');
			
			$caller_info= get_caller_info_by_booking_id($booking_ref);
			$booking_info= get_booking_date_info_by_booking_ref($booking_ref);
			
			save_room_bill($room_no, $booking_ref, $caller_info['caller_name'],$booking_info['from_date'],$date, $occupied_days, $room_charge, $request_charges, $sales_bills);
			cancel_booking ($booking_ref);
			//cancel_booking_has_caller($_REQUEST ['booking_ref']);
			cancel_room_status($booking_ref, $room_no);
				
			$smarty->assign ( 'page', "Bill" );
			$smarty->display ( 'room_vacate/room_vacate_print.tpl' );
				
		}	
		
				
		else {
			
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