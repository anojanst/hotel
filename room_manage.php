<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/room_manage_functions.php';
include 'functions/booking_functions.php';


$module_no = 9;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "room_manage_form") {
		
			$smarty->assign ( 'page', "Room Manage" );
			$smarty->display ( 'room_manage/room_manage.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
						
				
			$smarty->assign ( 'room_category', list_room_type() );
			
			$smarty->assign ( 'page', "Booking" );
			$smarty->display ( 'booking/booking.tpl' );
			
		} 
		elseif ($_REQUEST ['job'] == "view_booking_detail") {

			$_SESSION ['booking_ref'] = $_REQUEST ['booking_ref'];
		

			$smarty->assign ( 'page', "Booking" );
			$smarty->display ( 'booking/booking_detail.tpl' );
				
		}
		 elseif ($_REQUEST ['job'] == "delete") {
		 	
			cancel_booking ( $_REQUEST ['booking_ref'] );
			cancel_booking_has_caller($_REQUEST ['booking_ref']);
			cancel_room_status($_REQUEST ['booking_ref'], $_REQUEST ['room_no']);
				
			$smarty->assign ( 'page', "Room Manage" );
			$smarty->display ( 'room_manage/room_manage.tpl' );
		}
		
		elseif ($_REQUEST ['job'] == "update_occupied") {

			update_room_as_occupied($_REQUEST ['room_no']);
		
			$smarty->assign ( 'page', "Room Manage" );
			$smarty->display ( 'room_manage/room_manage.tpl' );
		}
		
		elseif ($_REQUEST ['job'] == "booking_view_by_date") {
		
			$_SESSION ['booking_ref'] = $_REQUEST ['booking_ref'];
		
			$smarty->assign ( 'page', "Booking by date" );
			$smarty->display ( 'booking/booking_detail_by_date.tpl' );
		}

		elseif ($_REQUEST ['job'] == "delete_by_date") {
			
			cancel_booking_by_date ( $_REQUEST ['booking_ref'], $_REQUEST ['date']);
			
			$book_info = get_booking_table($_REQUEST ['booking_ref']);
			
			if($_REQUEST ['date']==$book_info['from_date']){
				
				$date= $_REQUEST ['date'];
				$newdate = strtotime ( '+1 day' , strtotime ( $date ) ) ;
				$newdate = date ( 'Y-m-j' , $newdate );
				
				update_from_date ( $_REQUEST ['booking_ref'],$newdate );
			}
			
			elseif ($_REQUEST ['date']==$book_info['to_date']){
				$date= $_REQUEST ['date'];
				$newdate = strtotime ( '-1 day' , strtotime ( $date ) ) ;
				$newdate = date ( 'Y-m-j' , $newdate );
				
				update_to_date ( $_REQUEST ['booking_ref'],$newdate);
			}
												
			cancel_room_status($_REQUEST ['room_no'],  $_REQUEST ['date']);
		
			$smarty->assign ( 'page', "Booking by date" );
			$smarty->display ( 'booking/booking_detail_by_date.tpl' );
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