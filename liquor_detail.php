<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';
include 'functions/liquor_functions.php';
include 'functions/store_functions.php';

$module_no = 1;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "liquor_detail_form") {
			$smarty->assign('liquor_names', list_liquor());
			$smarty->assign ( 'page', "Liquor" );
			$smarty->display ( 'liquor/liquor_detail.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];			
    			$liquor=$_POST ['liquor'];
                $liquor_name=$_POST ['liquor_name'];
                $price_25=$_POST ['price_25'];
                $price_50=$_POST ['price_50'];
                $price=$_POST ['price'];
				
				update_liquor_details ( $id, $liquor, $liquor_name, $price_25, $price_50, $price );
			
			} else {
				
    			$liquor=$_POST ['liquor'];
                $liquor_name=$_POST ['liquor_name'];
                $price_25=$_POST ['price_25'];
                $price_50=$_POST ['price_50'];
                $price=$_POST ['price'];
				
				save_liquor_details( $liquor, $liquor_name, $price_25, $price_50, $price);
				
								
			}
            $smarty->assign('liquor_names', list_liquor());
			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor_detail.tpl' );
			
		} elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_liquor_details_info($id);
			
			$smarty->assign ( 'liquor', $info ['liquor_type'] );
            $smarty->assign ( 'liquor_name', $info ['liquor'] );
            $smarty->assign ( 'price', $info ['price'] );            
            $smarty->assign ( 'price_25', $info ['price_25'] );            
            $smarty->assign ( 'price_50', $info ['price_50'] );
			$smarty->assign('liquor_names', list_liquor());		
			$smarty->assign ( 'edit', 'on' );			
			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor_detail.tpl' );
			
		} elseif ($_REQUEST ['job'] == "delete") {
			delete_liquor_detail ( $_REQUEST ['id'] );
            $smarty->assign('liquor_names', list_liquor());
			$smarty->assign ( 'page', "Liquors" );
			$smarty->display ( 'liquor/liquor_detail.tpl' );
		} 
		
		
		else {
            $smarty->assign('liquor_names', list_liquor());
			$smarty->assign ( 'page', "Liquor" );
			$smarty->display ( 'liquor/liquor_detail.tpl' );
		}
}
else{
	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Liquor Detail Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}