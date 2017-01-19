<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/room_manage_functions.php';
include 'functions/room_functions.php';
include 'functions/room_info_functions.php';



$module_no = 9;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "room_info") {
		
			$_SESSION['room_no']=$_REQUEST['room_no'];
			
			$smarty->assign ( 'page', "Room Info" );
			$smarty->display ( 'room_info/room_info.tpl' );
			
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