<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';


$module_no = 7;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "rooms_type_form") {
			
			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];
				$info = get_module_info ( $id );
				
				$room_no=$_POST ['room_no'];
				$room_cat = $_POST ['room_cat'];
				
				update_rooms ( $id, $room_no,$room_cat );
				
			} else {
				
				$room_no=$_POST ['room_no'];
				$room_cat = $_POST ['room_cat'];
				$facility= $_POST['facility'];
				
				save_room( $room_no, $room_cat);
				
				$info=get_room_info_by_room_no($room_no);
				$nfacility = count($facility);
				
				foreach ($facility AS $value){	
					$facility_info=get_facility_info($value);
					$room_id=$info['id'];
					$facility_id=$value;
					$facility=$facility_info[facility];
									
					add_facility($room_id, $room_no, $facility_id, $facility);
				}

				$smarty->assign ( 'room_types', list_room_type() );
				
			}
			$smarty->assign ( 'room_types', list_room_type() );
			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_room_info($id);
			
			$smarty->assign ( 'room_no', $info ['room_no'] );
			$smarty->assign ( 'room_type', $info ['room_type'] );
			
			
			$smarty->assign ( 'edit', 'on' );
			
			$smarty->assign ( 'room_types', list_room_type() );
			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			cancel_rooms ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'room_types', list_room_type() );
			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room.tpl' );
		} 
		
		elseif ($_REQUEST ['job'] == "view_room_info") {

			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room_detail.tpl' );
		}
		
		elseif ($_REQUEST ['job'] == "room_grid_view") {
		
			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room_grid_view.tpl' );
		}
		
		
		elseif ($_REQUEST ['job'] == "room_view_by_status") {
		
			$smarty->assign ( 'page', "Rooms" );
			$smarty->display ( 'room/room_view_by_status.tpl' );
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