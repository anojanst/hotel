<?php
require_once 'conf/smarty-conf.php';
include 'functions/purchase_order_functions.php';
include 'functions/modules_functions.php';
include 'functions/employees_functions.php';
include 'functions/reports_functions.php';
include 'functions/sales_functions.php';

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
        elseif ($_REQUEST['job']== 'sales'){
            
            $_SESSION['customer_name']=$customer_name=$_POST['customer_name'];
            $_SESSION['from_date']=$from_date=$_POST['from_date'];
            $_SESSION['to_date']=$to_date=$_POST['to_date'];
            
            $smarty->assign('search', "on");
            $smarty->assign('page', "Sales");
            $smarty->display('reports/sales_report.tpl');
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
        elseif ($_REQUEST['job']== 'occupied_room_report'){
            $module_no= 17;
            if (check_access ($module_no, $_SESSION ['user_id'] ) == 1) {
                $smarty->assign('page', "Report");
                $smarty->display('reports/occupied_room_report.tpl');
            }
            else {
                $user_name = $_SESSION['user_name'];
                $smarty->assign('org_name', "$_SESSION[org_name]");
                $smarty->assign('error_report', "on");
                $smarty->assign('error_message', "Dear $user_name, you don't have permission to access OCCUPIED ROOM REPORT.");
                $smarty->assign('page', "Access Error");
                $smarty->display('user_home/access_error.tpl');
            }
        }
        elseif ($_REQUEST['job']== 'occupied_days_report'){
            $module_no= 18;
            if (check_access ($module_no, $_SESSION ['user_id'] ) == 1) {
                $smarty->assign('page', "Report");
                $smarty->display('reports/occupied_days_report.tpl');
            }
            else {
                $user_name = $_SESSION['user_name'];
                $smarty->assign('org_name', "$_SESSION[org_name]");
                $smarty->assign('error_report', "on");
                $smarty->assign('error_message', "Dear $user_name, you don't have permission to access OCCUPIED DAYS REPORT.");
                $smarty->assign('page', "Access Error");
                $smarty->display('user_home/access_error.tpl');
            }
        }
        elseif ($_REQUEST['job']== 'booked_room_report'){
            $module_no= 19;
            if (check_access ($module_no, $_SESSION ['user_id'] ) == 1) {
                $smarty->assign('page', "Report");
                $smarty->display('reports/booked_room_report.tpl');
            }
            else {
                $user_name = $_SESSION['user_name'];
                $smarty->assign('org_name', "$_SESSION[org_name]");
                $smarty->assign('error_report', "on");
                $smarty->assign('error_message', "Dear $user_name, you don't have permission to access BOOKED DAYS REPORT.");
                $smarty->assign('page', "Access Error");
                $smarty->display('user_home/access_error.tpl');
            }
        }
        elseif ($_REQUEST['job']== 'booked_days_report'){
            $module_no= 20;
            if (check_access ($module_no, $_SESSION ['user_id'] ) == 1) {
                $smarty->assign('page', "Report");
                $smarty->display('reports/booked_days_report.tpl');
            }
            else {
                $user_name = $_SESSION['user_name'];
                $smarty->assign('org_name', "$_SESSION[org_name]");
                $smarty->assign('error_report', "on");
                $smarty->assign('error_message', "Dear $user_name, you don't have permission to access BOOKED DAYS REPORT.");
                $smarty->assign('page', "Access Error");
                $smarty->display('user_home/access_error.tpl');
            }
        }
        elseif ($_REQUEST['job']== 'sales_report'){
            $module_no= 21;
            if (check_access ($module_no, $_SESSION ['user_id'] ) == 1) {
                $smarty->assign('page', "Report");
                $smarty->display('reports/sales_report.tpl');
            }
            else {
                $user_name = $_SESSION['user_name'];
                $smarty->assign('org_name', "$_SESSION[org_name]");
                $smarty->assign('error_report', "on");
                $smarty->assign('error_message', "Dear $user_name, you don't have permission to access BOOKED DAYS REPORT.");
                $smarty->assign('page', "Access Error");
                $smarty->display('user_home/access_error.tpl');
            }
        }
        elseif ($_REQUEST['job']== 'purchased_items'){
            $_SESSION['purchase_order_no']=$purchase_order_no=$_REQUEST['purchase_order_no'];
            
            $smarty->assign('purchase_order_no', "$purchase_order_no");
            $smarty->assign('search_mode', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/purchased_items.tpl');
        }
         elseif ($_REQUEST['job']== 'purchased_item_vice'){
            $_SESSION['purchased_item']=$purchased_item=$_POST['purchased_item'];
            $_SESSION['from_date']=$from_date=$_POST['from_date'];
            $_SESSION['to_date']=$to_date=$_POST['to_date'];
            
            $smarty->assign('search_mode', "on");
            $smarty->assign('page', "Purchase");
            $smarty->display('reports/purchased_item_report.tpl');
        }
        elseif ($_REQUEST['job']== 'sales_items'){
            $_SESSION['sales_no']=$sales_no=$_REQUEST['sales_no'];
            $_SESSION['print_no']=$_SESSION['sales_no'];
            unset ($_SESSION['sales_no']);
            
            
            $smarty->assign('print_no', $_SESSION['print_no']);
            $smarty->assign('search_mode', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/sales_items.tpl');
        }
        elseif ($_REQUEST['job']== 'occupied_room'){
            $_SESSION['from_date']=$from_date=$_REQUEST['from_date'];
            $_SESSION['to_date']=$to_datem=$_REQUEST['to_date'];
           
            
            $smarty->assign('search', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/occupied_room_report.tpl');
        }
        elseif ($_REQUEST['job']== 'occupied_days'){
            $_SESSION['date']=$date=$_REQUEST['date'];
            
            $smarty->assign('date', "$date");
            $smarty->assign('search', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/occupied_days_report.tpl');
        }
        elseif ($_REQUEST['job']== 'booked_room'){
            $_SESSION['from_date']=$from_date=$_REQUEST['from_date'];
            $_SESSION['to_date']=$to_datem=$_REQUEST['to_date'];
            
            $smarty->assign('room_no', "$room_no");
            $smarty->assign('search', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/booked_room_report.tpl');
        }
        elseif ($_REQUEST['job']== 'booked_days'){
            $_SESSION['date']=$date=$_REQUEST['date'];
            
            $smarty->assign('date', "$date");
            $smarty->assign('search', "on");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('reports/booked_days_report.tpl');
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
