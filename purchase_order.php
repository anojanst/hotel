<?php
require_once 'conf/smarty-conf.php';
include'functions/purchase_order_functions.php';
include'functions/modules_functions.php';
include'functions/employees_functions.php';


$module_no= 14;
if ($_SESSION['login'] == 1) {
    if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
        if ($_REQUEST['job'] == 'purchase_item') {
    
            if (!isset ($_SESSION['purchase_order_no'])) {
                $_SESSION['purchase_order_no'] = get_purchase_no();
            }
            else {
            }
        
            $purchase_order_no = $_SESSION['purchase_order_no'];
            $purchase_item = $_POST['purchase_item'];
            $quantity = $_POST['qty'];
                            $measure_type = $_POST['measure_type'];
            $buying_price = $_POST['buying_price'];
            $user_name=$_SESSION['user_name'];
    
            save_purchase_item($purchase_order_no,$purchase_item,$quantity,$buying_price,$user_name,$measure_type);
            
            $smarty->assign('purchase_order_no', "$_SESSION[purchase_order_no]");
            $smarty->assign('prepared_by', "$_SESSION[user_name]");
            $smarty->assign('total', "$total");
            $smarty->assign('page', "Purchase Order");
            $smarty->display('purchase_order/purchase_order.tpl');
        }
        elseif ($_REQUEST['job'] == 'delete_item') {
            $id = $_REQUEST['id'];
            $purchase_order_no = $_SESSION['purchase_order_no'];
            delete_purchase_item($id);
            $smarty->assign('page', "Purchase Order");
            $smarty->display('purchase_order/purchase_order.tpl');
        }
                
        elseif ($_REQUEST['job'] == 'purchase') {
            $purchase_order_no = $_SESSION['purchase_order_no'];
                if ($_REQUEST['ok'] == 'Save') {
                           
                    $supplier_name = $_POST['supplier_name'];
                    $prepared_by = $_POST['prepared_by'];
                    $purchase_order_no = $_POST['purchase_order_no'];
                    $total = get_total($_SESSION['purchase_order_no']);
                    save_purchase_order($purchase_order_no, $supplier_name, $prepared_by, $total);
                            //add_purchase_order_ledger($purchase_order_no);
                }
                else {
    
                    $id = $_SESSION['id'];
                    $supplier_name = $_POST['supplier_name'];
                    $prepared_by = $_POST['prepared_by'];
                    $updated_by = $_POST['updated_by'];
                    $purchase_order_no = $_POST['purchase_order_no'];
                    $total = get_total($_SESSION['purchase_order_no']);
                    update_purchase_order($id, $purchase_order_no, $supplier_name, $prepared_by, $total, $updated_by);
                    unset ($_SESSION['edit']);
                }
    
            update_saved($_SESSION['purchase_order_no']);
            unset ($_SESSION['purchase_order_no']);
    
    
    
           
            $smarty->assign('org_name', "$_SESSION[org_name]");
            $smarty->assign('purchase_order_no', "$_SESSION[purchase_order_no]");
            $smarty->assign('total', get_total($_SESSION['purchase_order_no']));
            $smarty->assign('page', "Purchase Order");
            $smarty->display('purchase_order/purchase_order.tpl');
        }
        else{
                $smarty->assign('total', "$total");
                $smarty->assign('page', "Purchase Order");
                $smarty->display('purchase_order/purchase_order.tpl');
    
            }
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