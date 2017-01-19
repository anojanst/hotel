<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';
include 'functions/meal_functions.php';


$module_no = 10;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "meal_type_form") {
			
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];			
    			$meal=$_POST ['meal'];
				
				update_meals ( $id, $meal );
				
			} else {
				
    			$meal=$_POST ['meal'];
				
				save_meals( $meal);
				
								
			}
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_meals_info($id);
			
			$smarty->assign ( 'meal', $info ['meal'] );
						
			$smarty->assign ( 'edit', 'on' );			
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			delete_meal ( $_REQUEST ['id'] );
			
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal.tpl' );
		} 
		
		
		else {

			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal.tpl' );
		}
}
else{
	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Meal Type Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}