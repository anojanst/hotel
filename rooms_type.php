<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';


$module_no = 6;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "rooms_type_form") {
			
			$smarty->assign ( 'page', "Rooms_Type" );
			$smarty->display ( 'rooms_type/rooms_type.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];
				$room_type = $_POST ['room_type'];
				$price = $_POST ['price'];
				
				update_room_cat ( $id, $room_type, $price );
			} else {
				
				$room_type = $_POST ['room_type'];
				$price = $_POST ['price'];
				
				save_room_cat ( $room_type, $price );
			}
			
			$smarty->assign ( 'page', "Rooms_Type" );
			$smarty->display ( 'rooms_type/rooms_type.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_rooms_info_by_id ( $id );
			
			$smarty->assign ( 'room_type', $info ['category'] );
			$smarty->assign ( 'price', $info ['price'] );
			$smarty->assign ( 'edit', 'on' );
			
			$smarty->assign ( 'page', "Rooms_Type" );
			$smarty->display ( 'rooms_type/rooms_type.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			cancel_rooms_type ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'page', "Rooms_Type" );
			$smarty->display ( 'rooms_type/rooms_type.tpl' );
		} 

		else {
			$smarty->assign ( 'page', "Rooms_Type" );
			$smarty->display ( 'rooms_type/rooms_type.tpl' );
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