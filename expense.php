<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/expense_functions.php';

$module_no = 24;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "save") {
			if ($_REQUEST ['ok'] == 'Update') {
				
				$id = $_SESSION ['id'];
				$expense_type = $_POST ['expense_type'];
				
				update_expense_type ($id, $expense_type);
			}
            else {
				
				$expense_type = $_POST ['expense_type'];
				
				save_expense_type ($expense_type);
			}
            $smarty->assign ( 'page', "Expense" );
			$smarty->display ( 'expense/expense.tpl' );
        }
        elseif ($_REQUEST ['job'] == "expense_charge") {
			
			
			$smarty->assign ('page', "Expense");
			$smarty->display ('expense/expense_charge.tpl');
        }
        elseif ($_REQUEST ['job'] == "edit") {
			$_SESSION ['id'] = $id = $_REQUEST ['id'];
			$info = get_expense_type_by_id ( $id );
			
			$smarty->assign ( 'expense_type', $info ['expense_type'] );
			$smarty->assign ( 'edit', 'on' );
			
			$smarty->assign ( 'page', "Expense" );
			$smarty->display ( 'expense/expense.tpl' );
        }
        elseif ($_REQUEST ['job'] == "delete") {
			delete_expense_type($_REQUEST ['id']);
			
			$smarty->assign ('page', "Expense");
			$smarty->display ('expense/expense.tpl');
        }
        else{
			$smarty->assign ( 'page', "Expense" );
			$smarty->display ( 'expense/expense.tpl' );
			
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