<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';
include 'functions/meal_functions.php';
include 'functions/liquor_functions.php';


$module_no =22;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "liquor_type_form") {
			
			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor_type.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];			
    			$liquor=$_POST ['liquor'];
				update_liquors ( $id, $liquor );
			} else {
				
    			$liquor=$_POST ['liquor'];
				save_liquors($liquor);
			}
			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_liquors_info($id);
			
			$smarty->assign ( 'liquor', $info ['liquor_type'] );
						
			$smarty->assign ( 'edit', 'on' );			
			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			delete_liquor ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor.tpl' );
		} 
		else {

			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor.tpl' );
		}
}
else{
	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Liquor Type Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}