<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';
include 'functions/meal_functions.php';
include 'functions/store_functions.php';

$module_no = 11;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "meal_type_form") {
			$smarty->assign('meal_names', list_meal());
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal_detail.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];			
    			$meal=$_POST ['meal'];
                $meal_name=$_POST ['meal_name'];
                $size=$_POST ['size'];
                $price=$_POST ['price'];
				
				update_meal_details ( $id, $meal, $meal_name, $size, $price );
				$smarty->assign('meal_names', list_meal());
			} else {
				
    			$meal=$_POST ['meal'];
                $meal_name=$_POST ['meal_name'];
                $size=$_POST ['size'];
                $price=$_POST ['price'];
				
				save_meal_details( $meal, $meal_name, $size, $price);
				
								
			}
            $smarty->assign('meal_names', list_meal());
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal_detail.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_meal_details_info($id);
			
			$smarty->assign ( 'meal', $info ['meal'] );
            $smarty->assign ( 'meal_name', $info ['meal_name'] );
            $smarty->assign ( 'size', $info ['size'] );
            $smarty->assign ( 'price', $info ['price'] );
			$smarty->assign('meal_names', list_meal());			
			$smarty->assign ( 'edit', 'on' );			
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal_detail.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			delete_meal_detail ( $_REQUEST ['id'] );
			$smarty->assign('meal_names', list_meal());
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal_detail.tpl' );
		} 
		
		
		else {
			$smarty->assign('meal_names', list_meal());
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal_detail.tpl' );
		}
}
else{
	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Meal Detail Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}