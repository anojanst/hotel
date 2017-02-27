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
                $meal_no= $_SESSION ['meal_no']; 
                $meal_name=$_POST ['meal_name'];
                $size=$_POST['size'];
                $item=$_POST['item'];
                $qty=$_POST['qty'];
                $price=$_POST['price'];
				update_bill_of_material ( $id,$meal_no,$meal_name,$size,$item,$qty,$price);
			} else {
				
                $meal_name=$_POST ['meal_name'];
                $meal_info=get_meal_info_by_name($meal_name);
                $meal_no=$meal_info['meal_no'];
                $size=$_POST['size'];
                $item=$_POST['item'];
                $qty=$_POST['qty'];
                $price=$_POST['price'];
				save_bill_of_material($meal_no,$meal_name,$size,$item,$qty,$price);
			}
            
			$smarty->assign ( 'meal_name', "$meal_name" );
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
            $_SESSION ['meal_no'] = $meal_no = $_REQUEST ['meal_no'];
			$info = get_bill_of_material_info($id);
			
			$smarty->assign ( 'meal_name', $info ['meal_name'] );
			$smarty->assign ( 'size', $info ['size'] );
            $smarty->assign ( 'item', $info ['item'] );
            $smarty->assign ( 'qty', $info ['qty'] );
            $smarty->assign ( 'price', $info ['price'] );
			$smarty->assign ( 'edit', 'on' );			
			$smarty->assign ( 'page', "Meals" );
			$smarty->display ( 'meal/meal.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			 delete_bill_of_material( $_REQUEST ['id'] );
			
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