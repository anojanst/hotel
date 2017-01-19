<?php
require_once 'conf/smarty-conf.php';
include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/facility_functions.php';


$module_no = 2;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "facility_form") {
			
			$smarty->assign ( 'page', "Facility" );
			$smarty->display ( 'facility/facility.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];
				
				$facility = $_POST ['facility'];
				
				update_facility ( $id, $facility );
			} else {
				
				$facility = $_POST ['facility'];
				
				
				save_facility ( $facility);
			}
			
			$smarty->assign ( 'page', "Facility" );
			$smarty->display ( 'facility/facility.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			
			$info = get_facility_info ( $id );
			
			$smarty->assign ( 'facility', $info ['facility'] );

			$smarty->assign ( 'edit', 'on' );
			
			$smarty->assign ( 'page', "Facility" );
			$smarty->display ( 'facility/facility.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			delete_facility ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'page', "Facility" );
			$smarty->display ( 'facility/facility.tpl' );
		} 

		else {
			$smarty->assign ( 'page', "Facility" );
			$smarty->display ( 'facility/facility.tpl' );
		}
}
else{
	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Facility Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}