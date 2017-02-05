<?php
require_once 'conf/smarty-conf.php';
include 'functions/purchase_order_functions.php';
include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/reports_functions.php';


$module_no= 15;
if ($_SESSION['login'] == 1) {
    if (check_access ($module_no, $_SESSION ['user_id'] ) == 1) {
        if ($_REQUEST['job']== 'purchase'){
            
            $_SESSION['supplier_name']=$supplier_name=$_POST['supplier_name'];
            $_SESSION['from_date']=$from_date=$_POST['from_date'];
            $_SESSION['to_date']=$to_date=$_POST['to_date'];
            
            $smarty->assign('search', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/purchase_report.tpl');
        }
        elseif ($_REQUEST['job']== 'purchased_item_report'){
            $module_no= 16;
            if (check_access ($module_no, $_SESSION ['user_id'] ) == 1) {
                $smarty->assign('page', "Purchase Order");
                $smarty->display('reports/purchased_item_report.tpl');
            }
            else {
                $user_name = $_SESSION['user_name'];
                $smarty->assign('org_name', "$_SESSION[org_name]");
                $smarty->assign('error_report', "on");
                $smarty->assign('error_message', "Dear $user_name, you don't have permission to access PURCHASE ITEM REPORT.");
                $smarty->assign('page', "Access Error");
                $smarty->display('user_home/access_error.tpl');
	}
        }
        elseif ($_REQUEST['job']== 'purchased_items'){
            $_SESSION['purchased_item']=$purchased_item=$_REQUEST['purchased_item'];
            $_SESSION['from_date']=$from_date=$_REQUEST['from_date'];
            $_SESSION['to_date']=$to_datem=$_REQUEST['to_date'];
            
            $smarty->assign('search_mode', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/purchased_item_report.tpl');
        }
        else {
            unset($_SESSION['supplier_name']);
            unset($_SESSION['from_date']);
            unset($_SESSION['to_date']);
            
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/purchase_report.tpl');
        }
    }
   else {
		$user_name = $_SESSION['user_name'];
		$smarty->assign('org_name', "$_SESSION[org_name]");
		$smarty->assign('error_report', "on");
		$smarty->assign('error_message', "Dear $user_name, you don't have permission to access PURCHASE REPORT.");
		$smarty->assign('page', "Access Error");
		$smarty->display('user_home/access_error.tpl');
	}
} 
else{
	$smarty->assign('page',"Home");
	$smarty->display('index.tpl');
}
