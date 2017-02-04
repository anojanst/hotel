<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/room_manage_functions.php';
include 'functions/booking_functions.php';
include 'functions/room_vacate_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';

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
		
			$_SESSION['booking_ref']=$booking_ref=$_REQUEST['booking_ref'];
				
			$_SESSION['room_no']=$room_no=$_REQUEST['room_no'];
				
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