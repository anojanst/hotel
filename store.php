<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/store_functions.php';


$module_no = 1;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "save") {
			$item = $_POST ['item'];
			$price = $_POST ['price'];			
			$resale = $_POST ['resale'];
			save_store($item, $price, $resale);
			
			$smarty->assign ('page', "Store");
			$smarty->display ('store/store.tpl');
			
		}
			
		elseif ($_REQUEST ['job'] == "delete") {
			delete_store ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'page', "Store" );
			$smarty->display ( 'store/store.tpl' );
		} 

		else {
			$smarty->assign ( 'page', "Room Charge" );
			$smarty->display ( 'store/store.tpl' );
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