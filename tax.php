<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/tax_functions.php';


$module_no = 13;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "save") {
			$tax = $_POST ['tax'];
			$percentage = $_POST ['percentage'];								
			save_tax($tax, $percentage);
			
			$smarty->assign ('page', "Tax");
			$smarty->display ('tax/tax.tpl');
			
		}
			
		elseif ($_REQUEST ['job'] == "delete") {
			delete_tax ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'page', "Tax" );
			$smarty->display ( 'tax/tax.tpl' );
		} 

		else {
			$smarty->assign ( 'page', "Room Charge" );
			$smarty->display ( 'tax/tax.tpl' );
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