<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/user_functions.php';
include 'functions/room_type_functions.php';
include 'functions/expense_functions.php';
include 'functions/ledger_functions.php';

$module_no = 25;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
        if ($_REQUEST['job']=='save'){
          if ($_REQUEST ['ok'] == 'Update'){
           
           $id = $_SESSION ['id'];
           $expense_no=$_SESSION['expense_no'];
           $expense_type=$_POST['expense_type'];
           $description=$_POST['description'];
           $price=$_POST['price'];
           
           update_expense_charge($id,$expense_no,$expense_type,$description,$price);
           update_expense_charge_ledger($id,$_SESSION['expense_no']);
          }
          else{
            if (!isset ($_SESSION['expense_no'])) {
                $_SESSION['expense_no'] = get_expense_no();
            }
            else {
            }
        
           $expense_no=$_SESSION['expense_no'];
           $expense_type=$_POST['expense_type'];
           $description=$_POST['description'];
           $price=$_POST['price'];
           
           save_expense_charge($expense_no,$expense_type,$description,$price);
           add_expense_charge_ledger($_SESSION['expense_no'],$expense_type , $price);
        }
            $smarty->assign('expense_no', "$_SESSION[expense_no]");
            $smarty->assign('prepared_by', "$_SESSION[user_name]");
    }
        elseif($_REQUEST['job']=='edit'){
            
            $_SESSION['id']=$id=$_REQUEST['id'];
            $info=get_expense_charge_by_id($id);
            
            $smarty->assign ( 'edit', "on" );
            $smarty->assign ( 'expense_type', $info['expense_type'] );
            $smarty->assign ( 'description', $info['description'] );
            $smarty->assign ( 'price', $info['price'] );
            
            $smarty->assign('expense_no', "$_SESSION[expense_no]");
            $smarty->assign('prepared_by', "$_SESSION[user_name]");
        }
        elseif($_REQUEST['job']=='delete'){
            
            delete_expense_charge($_REQUEST['id']);
            delete_expense_charge_ledger($_REQUEST['id']);
            $smarty->assign('expense_no', "$_SESSION[expense_no]");
            $smarty->assign('prepared_by', "$_SESSION[user_name]");
        }
        elseif ($_REQUEST['job'] == 'expense') {
                           
            $supplier_name = $_POST['supplier_name'];
            $prepared_by = $_POST['prepared_by'];
            $expense_no = $_POST['expense_no'];
            $total = get_expense_total($expense_no);
            save_expense($expense_no, $supplier_name, $prepared_by, $total);
            add_total_expense_ledger($expense_no);
                
            update_expense_saved($_SESSION['expense_no']);
            unset ($_SESSION['expense_no']);
            $smarty->assign('org_name', "$_SESSION[org_name]");
            $smarty->assign('expense_no', "$_SESSION[expense_no]");
        }
        $smarty->assign ( 'page', "Expense" );
        $smarty->display ('expense/expense_charge.tpl');

    }
    else{
        $smarty->assign ( 'error_report', "on" );
        $smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to access purchase." );
        $smarty->assign ( 'page', "Access Error" );
        $smarty->display ( 'user_home/access_error.tpl' );
    }
}
else {
	$smarty->assign('page', "Home");
	$smarty->display('index.tpl');
}
