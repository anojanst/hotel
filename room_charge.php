<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/room_charge_functions.php';


$module_no = 12;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "room_charge_type_form") {
			
			$smarty->assign ( 'page', "Room Charge" );
			$smarty->display ( 'room_charge/room_charge.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];
				$category = $_POST ['category'];
				$season_type = $_POST ['season_type'];
				$meal_type = $_POST ['meal_type'];
				$price = $_POST ['price'];
				
				update_room_type_has_charges( $id, $category, $season_type,$meal_type,$price);
			} else {
			
				$category = $_POST ['category'];
				$season_type = $_POST ['season_type'];
				$meal_type = $_POST ['meal_type'];
				$price = $_POST ['price'];
				
				save_room_type_has_charges($category, $season_type,$meal_type,$price);
			}
			
			$smarty->assign ('page', "Room Charge");
			$smarty->display ('room_charge/room_charge.tpl');
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_room_charge_info_by_id ( $id );
			
			$smarty->assign ( 'category', $info ['category'] );
			$smarty->assign ( 'season_type', $info ['season_type'] );
			$smarty->assign ( 'meal_type', $info ['meal_type'] );
			$smarty->assign ( 'price', $info ['price'] );
			$smarty->assign ( 'edit', 'on' );
			
			$smarty->assign ( 'page', "Room Charge" );
			$smarty->display ( 'room_charge/room_charge.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			delete_room_type_has_charges ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'page', "Room Charge" );
			$smarty->display ( 'room_charge/room_charge.tpl' );
		} 

		else {
			$smarty->assign ( 'page', "Room Charge" );
			$smarty->display ( 'room_charge/room_charge.tpl' );
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