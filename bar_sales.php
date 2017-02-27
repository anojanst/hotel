<?php
require_once 'conf/smarty-conf.php';
include 'functions/liquor_functions.php';
include 'functions/bar_sales_functions.php';
include 'functions/modules_functions.php';
include 'functions/user_functions.php';
include 'functions/ledger_functions.php';

include 'functions/store_functions.php';
$module_no = 14;

if ($_SESSION['login'] == 1) {
	if (check_access($module_no, $_SESSION['user_id']) == 1) {

		if ($_REQUEST['job']=='order_type'){
			unset($_SESSION['bar_sales_no']);
			
			$_SESSION['order_type']=$order_type=$_POST['order_type'];
			$_SESSION['ref_no']=$ref_no=$_POST['ref_no'];
			
			$smarty->assign('prepared_by',"$_SESSION[user_name]");

			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
		
		elseif($_REQUEST['job']=='complete_bar_sales'){
	
			if($_REQUEST['bar_sales_no']){
				$bar_sales_no=$_SESSION['bar_sales_no']=$_REQUEST['bar_sales_no'];
			}
			else{
				$bar_sales_no=$_SESSION['bar_sales_no'];
			}
			$bar_sales_info=get_bar_sales_info_by_bar_sales_no($bar_sales_no);
			$item_info=get_liquor_info_from_bar_sales_has_items($id, $bar_sales_no);
			
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");			
			$smarty->assign('prepared_by',"$_SESSION[user_name]");
			$smarty->assign('total',get_total_bar_sales($_SESSION['bar_sales_no']));
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
		
		elseif ($_REQUEST['job']=='select'){
			$selected_item=$_POST['liquor_no'];
			
					
			if (!isset($_SESSION['bar_sales_no'])) {
				$_SESSION['bar_sales_no']=$bar_sales_no=get_bar_sales_no();
				$order_type=$_SESSION['order_type'];
				$ref_no=$_SESSION['ref_no'];
			}
			else{
				$order_type_info=get_order_type_info($_SESSION['bar_sales_no']);
				$order_type=$order_type_info['order_type'];
				$ref_no=$order_type_info['ref_no'];
			}
			
			$bar_sales_no=$_SESSION['bar_sales_no'];	
			$bar_sales_info=get_bar_sales_info_by_bar_sales_no($bar_sales_no);
			$info=get_liquor_info_by_id($selected_item);
			$selected_item=$info['id'];
			$size=$_POST['size'];
			$stock=$info['liquor'].' ('. $size .')';
           
			
			if($size=="25ml"){
				$price=$info['price_25'];
			}
			elseif($size=="50ml"){
				$price=$info['price_50'];
			}
			else{
				$price=$info['price'];
			}
            
			$item_total=(1*$price);
			
			if($order_type=="Order From Room"){
				$booking_ref=get_booking_ref_for_restaurant_order($ref_no);
			}
				
			add_bar_sales_item($selected_item, $size, $stock, $price, $_SESSION['bar_sales_no'],$item_total, $order_type, $ref_no, $booking_ref);
			$total_to_ledger=($price)-($discount);
            add_bar_sales_items_ledger($_SESSION['bar_sales_no'],$selected_item , $total_to_ledger);
            
			$smarty->assign('customer_name',"$bar_sales_info[customer_name]");
			$smarty->assign('date',"$bar_sales_info[date]");
			$smarty->assign('remarks',"$bar_sales_info[remarks]");
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");
			if($_SESSION['edit']==1){
				$smarty->assign('edit_mode',"on");
				$smarty->assign('prepared_by',"$bar_sales_info[prepared_by]");
				$smarty->assign('updated_by',"$_SESSION[user_name]");
			}
			else{
				$smarty->assign('prepared_by',"$_SESSION[user_name]");
			}
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('total',get_total_bar_sales($_SESSION['bar_sales_no']));
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
	
		elseif($_REQUEST['job']=='update_item'){
	
			$id=$_REQUEST['liquor_id'];
			$quantity=$_POST['quantity'];
			$price=$_POST['price'];
			$user_name=$_SESSION['user_name'];
			$item_total=($quantity*$price);
			//$stock=get_total_stock($_REQUEST['liquor_id']);
			if($_REQUEST['bar_sales_no']){
				$bar_sales_no=$_SESSION['bar_sales_no']=$_REQUEST['bar_sales_no'];
			}
			else{
				$bar_sales_no=$_SESSION['bar_sales_no'];
			}
			$bar_sales_info=get_bar_sales_info_by_bar_sales_no($bar_sales_no);
			$item_info=get_liquor_info_from_bar_sales_has_items($id, $bar_sales_no);
				
			update_bar_sales_item($id, $quantity, $item_total, $price, $bar_sales_no);
			update_bar_sales_item_ledger($id ,$bar_sales_no);
			
	
			$smarty->assign('customer_name',"$bar_sales_info[customer_name]");
			$smarty->assign('date',"$bar_sales_info[date]");
			$smarty->assign('remarks',"$bar_sales_info[remarks]");
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");
			if($_SESSION['edit']==1){
				$smarty->assign('edit_mode',"on");
				$smarty->assign('prepared_by',"$bar_sales_info[prepared_by]");
				$smarty->assign('updated_by',"$_SESSION[user_name]");
	
			}
			else{
				$smarty->assign('prepared_by',"$_SESSION[user_name]");
			}
	
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");
			$smarty->assign('prepared_by',"$_SESSION[user_name]");
			$smarty->assign('total',get_total_bar_sales($_SESSION['bar_sales_no']));
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
	
		elseif ($_REQUEST['job']=='search'){
			$_SESSION['bar_sales_no_search']=$_POST['bar_sales_no_search'];
			$_SESSION['customer_search']=$_POST['customer_search'];
	
			$smarty->assign('search_mode',"on");
			unset($_SESSION['bar_sales_no']);
			$smarty->assign('bar_sales_no_search',"$_SESSION[bar_sales_no_search]");
			$smarty->assign('customer_search',"$_SESSION[customer_search]");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('total',"$total");
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
		elseif ($_REQUEST['job']=='edit'){
			$_SESSION['edit']=1;
	
	
			$_SESSION['id']=$id=$_REQUEST['id'];
			$info=get_bar_sales_info($id);
			$_SESSION['bar_sales_no']=$info['bar_sales_no'];
			$supplier_name=$info['supplier_name'];
			$remarks=$info['remarks'];
			$prepared_by=$info['prepared_by'];
			$date=$info['date'];
	
			$smarty->assign('edit_mode',"on");
			$smarty->assign('updated_by',"$_SESSION[user_name]");
			$smarty->assign('total',get_total_bar_sales($_SESSION['bar_sales_no']));
			$smarty->assign('parent_catagorys',list_parent_catagory());
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");
			$smarty->assign('customer_name',"$info[customer_name]");
			$smarty->assign('date',"$info[date]");
			$smarty->assign('remarks',"$info[remarks]");
			$smarty->assign('supplier_search',"$_SESSION[supplier_search]");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");
			$smarty->assign('prepared_by',"$info[prepared_by]");
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
		elseif ($_REQUEST['job']=='delete_item'){
			$id=$_REQUEST['id'];
			//$info=get_liquor_info_from_bar_sales_has_items_by_id($id);
			//$item_info=get_liquor_info_from_bar_sales_has_items($info['liquor_id'], $_SESSION['bar_sales_no']);
	
			cancel_item($id);
			delete_bar_sales_items_ledger($id);
	
			$bar_sales_no=$_SESSION['bar_sales_no'];
			$bar_sales_info=get_bar_sales_info_by_bar_sales_no($bar_sales_no);
	
			$smarty->assign('customer_name',"$bar_sales_info[customer_name]");
			$smarty->assign('date',"$bar_sales_info[date]");
			$smarty->assign('remarks',"$bar_sales_info[remarks]");
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");
	
			if($_SESSION['edit']==1){
				$smarty->assign('edit_mode',"on");
				$smarty->assign('prepared_by',"$bar_sales_info[prepared_by]");
				$smarty->assign('updated_by',"$_SESSION[user_name]");
			}
			else{
				$smarty->assign('prepared_by',"$_SESSION[user_name]");
			}
	
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");
			$smarty->assign('total',get_total_bar_sales($_SESSION['bar_sales_no']));
			$smarty->assign('prepared_by',"$_SESSION[user_name]");
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
	
	
		elseif($_REQUEST['job']=='bar_sales'){
	
			if($_REQUEST['ok']=='Save'){
				$remarks=$_POST['remarks'];
				$customer_name=$_POST['customer_name'];
				$discount_type=$_POST['discount_type'];
				$discount=$_POST['discount'];
                $payment=$_POST['payment'];
				$prepared_by=$_POST['prepared_by'];
				$bar_sales_no=$_POST['bar_sales_no'];				
				$service_charge=$_POST['service_charge'];
				$total=get_total_bar_sales($_SESSION['bar_sales_no']);
				
				
				$order_type_info=get_order_type_info($_SESSION['bar_sales_no']);
				$order_type=$order_type_info['order_type'];
				$ref_no=$order_type_info['ref_no'];
				
				if($order_type=="Order From Room"){
					$booking_ref=get_booking_ref_for_restaurant_order($ref_no);
				}
			
				save_bar_sales($bar_sales_no, $date, $customer_name,$discount_type, $discount,$payment, $prepared_by, $remarks, $total, $order_type, $ref_no, $booking_ref, $service_charge);
				add_bar_sales_ledger($bar_sales_no);
				//update_stock_bar_sales($bar_sales_no);
			}
			else {
	
				$id=$_SESSION['id'];
				$remarks=$_POST['remarks'];
				$customer_name=$_POST['customer_name'];
				$prepared_by=$_POST['prepared_by'];
				$updated_by=$_POST['updated_by'];
				$bar_sales_no=$_POST['bar_sales_no'];
				$total=get_total_bar_sales($_SESSION['bar_sales_no']);
				update_bar_sales($id, $bar_sales_no, $customer_name, $prepared_by, $remarks, $total, $updated_by);
				//update_bar_sales_ledger($bar_sales_no);
				unset($_SESSION['edit']);
			}
	
		//	update_inventory_after_bar_sales($_SESSION['bar_sales_no']);
			update_saved_bar_sales($_SESSION['bar_sales_no']);
			$_SESSION['print_no']=$_SESSION['bar_sales_no'];
			unset($_SESSION['bar_sales_no']);
			$date = date("Y-m-d");
		//	$smarty->assign('parent_catagorys',list_parent_catagory());
			$smarty->assign('date',"$date");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('bar_sales_no',"$_SESSION[print_no]");
			$smarty->assign('total',get_total_bar_sales($_SESSION['print_no']));
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/print.tpl');
		}
	
		elseif ($_REQUEST['job']=='must_new'){
			unset($_SESSION['edit']);
			unset($_SESSION['bar_sales_no']);
			unset($_SESSION['remarks']);
			unset($_SESSION['prepared_by']);
			unset($_SESSION['updated_by']);
			unset($_SESSION['supplier_name']);
			unset($_SESSION['updated_by']);
	
	
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('parent_catagorys',list_parent_catagory());
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
	
		elseif ($_REQUEST['job']=='delete'){
			$module_no = 103;
			if (check_access($module_no, $_SESSION['user_id']) == 1) {
			$id=$_REQUEST['id'];
	
			$info=get_bar_sales_info($id);
			$bar_sales_no_for_delete=$info['bar_sales_no'];
	
			calncel_items_for_bar_sales_no($bar_sales_no_for_delete);
			cancel_bar_sales($id);
			//delete_bar_sales_ledger($bar_sales_no_for_delete);
			//delete_all_bar_sales_items_ledger($bar_sales_no_for_delete);
	
			$smarty->assign('search_mode',"on");
			unset($_SESSION['bar_sales_no']);
			$smarty->assign('bar_sales_no_search',"$_SESSION[bar_sales_no_search]");
			$smarty->assign('customer_search',"$_SESSION[customer_search]");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('page',"bar_sales");
			$smarty->display('bar_sales/bar_sales.tpl');
		}
	else {
				$user_name = $_SESSION['user_name'];
				$smarty->assign('org_name', "$_SESSION[org_name]");
				$smarty->assign('error_report', "on");
				$smarty->assign('error_message', "Dear $user_name, you don't have permission to DELETE a bar_sales.");
				$smarty->assign('page', "Access Error");
				$smarty->display('user_home/access_error.tpl');
			}
		}


	else {
		unset($_SESSION['edit']);
		unset($_SESSION['bar_sales_no']);
		unset($_SESSION['remarks']);
		unset($_SESSION['prepared_by']);
		unset($_SESSION['updated_by']);
		unset($_SESSION['supplier_name']);
		unset($_SESSION['updated_by']);
		if(check_non_saved_bar_sales_order($_SESSION['user_name'])==1){
			$_SESSION['bar_sales_no']=non_save_bar_sales_info($_SESSION['user_name']);

			$info=get_bar_sales_info_by_bar_sales_no($_SESSION['bar_sales_no']);
			$customer_name=$info['customer_name'];
			$remarks=$info['remarks'];
			$prepared_by=$info['prepared_by'];
			$date=$info['date'];
			$_SESSION['edit']=1;
			if ($customer_name){
				$smarty->assign('new',"Skip Editing and <a href='bar_sales.php?job=must_new' style='color: orange; font-size: 20px;'> Create New Perchase Order.</a>");
				$smarty->assign('edit_mode',"on");
				$smarty->assign('updated_by',"$_SESSION[user_name]");
				$smarty->assign('customer_name',"$info[customer_name]");
				$smarty->assign('date',"$info[date]");
				$smarty->assign('remarks',"$info[remarks]");
				$smarty->assign('prepared_by',"$info[prepared_by]");
			}
			else {
				$smarty->assign('prepared_by',"$_SESSION[user_name]");
			}
		}
		else{

		}
		$total=get_total_bar_sales($_SESSION['bar_sales_no']);

		$smarty->assign('org_name',"$_SESSION[org_name]");
		//$smarty->assign('parent_catagorys',list_parent_catagory());
		$smarty->assign('bar_sales_no',"$_SESSION[bar_sales_no]");

		$smarty->assign('total',"$total");
		$smarty->assign('page',"bar_sales");
		$smarty->display('bar_sales/bar_sales.tpl');
	}
}

else {
		$user_name = $_SESSION['user_name'];
		$smarty->assign('org_name', "$_SESSION[org_name]");
		$smarty->assign('error_report', "on");
		$smarty->assign('error_message', "Dear $user_name, you don't have permission to access BAR_SALES.");
		$smarty->assign('page', "Access Error");
		$smarty->display('user_home/access_error.tpl');
	}
}
else{
	$smarty->assign('page',"Home");
	$smarty->display('index.tpl');
}