<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';
include 'functions/house_keeping_functions.php';


$module_no = 7;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "house_keeping") {
			
			$smarty->assign ( 'page', "House Keeping" );
			$smarty->display ( 'house_keeping/house_keeping_home.tpl' );
			
		} 
		elseif ($_REQUEST ['job'] == "room_request") {
			
			$smarty->assign ( 'occupied_rooms', list_occupied_rooms_for_request() );
			$smarty->assign ( 'request_types', list_request_type() );
			$smarty->assign ( 'page', "House Keeping" );
			$smarty->display ( 'house_keeping/house_keeping_request_form.tpl' );						
		}
		
		elseif ($_REQUEST ['job'] == "room_request_list") {
			
			$smarty->assign ( 'request_types', list_request_type() );
			$smarty->assign ( 'page', "House Keeping" );
			$smarty->display ( 'house_keeping/room_requests.tpl' );
		}
		
		elseif ($_REQUEST ['job'] == "complete_request") {
			
			//$id=$_REQUEST['id'];
			
			//complete_cus_req($id);
			$_SESSION ['request_ref']=$request_ref=$_REQUEST['request_ref'];
			
			$smarty->assign ( 'page', "House Keeping" );
			$smarty->display ( 'house_keeping/house_keeping_bill.tpl' );
		}
		
		elseif ($_REQUEST ['job'] == "request_billing") {
			
			$request_ref=$_REQUEST['request_ref'];	
			$request_charge=$_POST['request_charge'];
			
			update_room_request_price($request_ref,$request_charge);
						
			$smarty->assign ( 'page', "House Keeping" );
			$smarty->display ( 'house_keeping/house_keeping_bill.tpl' );
		}
		
		
		elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];
				
				$room_no=$_POST ['room_no'];
				$request = $_POST ['request'];
				$detail = $_POST ['detail'];
				
				
				$smarty->assign ( 'request_types', list_request_type() );
				update_room_request ($id, $room_no ,$request, $detail);
				
			}
	 
			 else {
				
				$room_no=$_POST ['room_no'];
				$request = $_POST ['request'];
				$detail = $_POST ['detail'];
				
				$date=date('Y-m-d');
				$booking_ref=get_booking_ref_by_date_and_room_no($room_no,$date);
				
				$_SESSION ['request_ref']= $request_ref= get_request_ref();
				save_room_request($id, $room_no ,$request, $request_ref,$detail, $booking_ref);
				
				
				$smarty->assign ( 'occupied_rooms', list_occupied_rooms_for_request() );
				$smarty->assign ( 'request_types', list_request_type() );
				$smarty->display ( 'house_keeping/house_keeping_request_form.tpl' );	
				
			}
			$smarty->assign ( 'room_types', list_room_type() );

			
		} elseif ($_REQUEST ['job'] == "edit") {
			
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_room_info($id);
			
			$smarty->assign ( 'room_no', $info ['room_no'] );
			$smarty->assign ( 'request', $info ['request'] );
			$smarty->assign ( 'detail', $info ['detail'] );
		
			$smarty->assign ( 'edit', 'on' );
			
			$smarty->assign ( 'page', "Room Request" );
			$smarty->display ( 'house_keeping/house_keeping_request_form.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
	
			delete_room_request($_REQUEST ['id']);
			
			$smarty->assign ( 'page', "Room Request" );
			$smarty->display ( 'house_keeping/house_keeping_request_form.tpl' );
		} 
		

		else {
			$smarty->assign ( 'room_types', list_room_type() );
			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room.tpl' );
		}
}
else{
	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Rooms Type Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}