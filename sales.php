<?php
require_once 'conf/smarty-conf.php';
include 'functions/meal_functions.php';
include 'functions/sales_functions.php';
include 'functions/modules_functions.php';
include 'functions/user_functions.php';
include 'functions/store_functions.php';
include 'functions/ledger_functions.php';


$module_no = 14;

if ($_SESSION['login'] == 1) {
	if (check_access($module_no, $_SESSION['user_id']) == 1) {

		if ($_REQUEST['job']=='order_type'){
			unset($_SESSION['sales_no']);
			
			$_SESSION['order_type']=$order_type=$_POST['order_type'];
			$_SESSION['ref_no']=$ref_no=$_POST['ref_no'];
			
			$smarty->assign('prepared_by',"$_SESSION[user_name]");

			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
		
		elseif($_REQUEST['job']=='complete_sales'){
	
			if($_REQUEST['sales_no']){
				$sales_no=$_SESSION['sales_no']=$_REQUEST['sales_no'];
			}
			else{
				$sales_no=$_SESSION['sales_no'];
			}
			$sales_info=get_sales_info_by_sales_no($sales_no);
			$item_info=get_meal_info_from_sales_has_items($id, $sales_no);
			echo 1;
			echo  $id;
			$smarty->assign('sales_no',"$_SESSION[sales_no]");			
			$smarty->assign('prepared_by',"$_SESSION[user_name]");
			$smarty->assign('total',get_total_sales($_SESSION['sales_no']));
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
		
		elseif ($_REQUEST['job']=='select'){
			$selected_item=$_POST['meal_no'];
            

			if (!isset($_SESSION['sales_no'])) {
				$_SESSION['sales_no']=$sales_no=get_sales_no();
				$order_type=$_SESSION['order_type'];
				$ref_no=$_SESSION['ref_no'];
			}
			else{
				$order_type_info=get_order_type_info($_SESSION['sales_no']);
				$order_type=$order_type_info['order_type'];
				$ref_no=$order_type_info['ref_no'];
			}
			
			$sales_no=$_SESSION['sales_no'];	
			$sales_info=get_sales_info_by_sales_no($sales_no);
			$info=get_meal_info_by_id($selected_item);
			$selected_item=$info['meal_no'];
            $size=$info['size'];
            
            $stock=$info['meal_name'];
            $price=$info['price'];
			$item_total=(1*$price);
			
			if($order_type=="Order From Room"){
				$booking_ref=get_booking_ref_for_restaurant_order($ref_no);
			}
				
			add_sales_item($selected_item, $stock, $size, $price, $_SESSION['sales_no'],$item_total, $order_type, $ref_no, $booking_ref);
			$total_to_ledger=($price)-($discount);
            add_sales_items_ledger($_SESSION['sales_no'],$selected_item , $total_to_ledger);

			$smarty->assign('customer_name',"$sales_info[customer_name]");
			$smarty->assign('date',"$sales_info[date]");
			$smarty->assign('remarks',"$sales_info[remarks]");
			$smarty->assign('sales_no',"$_SESSION[sales_no]");
			if($_SESSION['edit']==1){
				$smarty->assign('edit_mode',"on");
				$smarty->assign('prepared_by',"$sales_info[prepared_by]");
				$smarty->assign('updated_by',"$_SESSION[user_name]");
			}
			else{
				$smarty->assign('prepared_by',"$_SESSION[user_name]");
			}
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('total',get_total_sales($_SESSION['sales_no']));
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
	
		elseif($_REQUEST['job']=='update_item'){
	
			$id=$_REQUEST['meal_id'];
			$quantity=$_POST['quantity'];
			$price=$_POST['price'];
			$user_name=$_SESSION['user_name'];
			$item_total=($quantity*$price);
			//$stock=get_total_stock($_REQUEST['meal_id']);
			if($_REQUEST['sales_no']){
				$sales_no=$_SESSION['sales_no']=$_REQUEST['sales_no'];
			}
			else{
				$sales_no=$_SESSION['sales_no'];
			}
			$sales_info=get_sales_info_by_sales_no($sales_no);
			$item_info=get_meal_info_from_sales_has_items($id, $sales_no);
				
			update_sales_item($id, $quantity, $item_total, $price, $sales_no);
			update_sales_item_ledger($id ,$sales_no);
			
	
			$smarty->assign('customer_name',"$sales_info[customer_name]");
			$smarty->assign('date',"$sales_info[date]");
			$smarty->assign('remarks',"$sales_info[remarks]");
			$smarty->assign('sales_no',"$_SESSION[sales_no]");
			if($_SESSION['edit']==1){
				$smarty->assign('edit_mode',"on");
				$smarty->assign('prepared_by',"$sales_info[prepared_by]");
				$smarty->assign('updated_by',"$_SESSION[user_name]");
	
			}
			else{
				$smarty->assign('prepared_by',"$_SESSION[user_name]");
			}
	
			$smarty->assign('sales_no',"$_SESSION[sales_no]");
			$smarty->assign('prepared_by',"$_SESSION[user_name]");
			$smarty->assign('total',get_total_sales($_SESSION['sales_no']));
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
	
		elseif ($_REQUEST['job']=='search'){
			$_SESSION['sales_no_search']=$_POST['sales_no_search'];
			$_SESSION['customer_search']=$_POST['customer_search'];
	
			$smarty->assign('search_mode',"on");
			unset($_SESSION['sales_no']);
			$smarty->assign('sales_no_search',"$_SESSION[sales_no_search]");
			$smarty->assign('customer_search',"$_SESSION[customer_search]");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('total',"$total");
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
		elseif ($_REQUEST['job']=='edit'){
			$_SESSION['edit']=1;
	
	
			$_SESSION['id']=$id=$_REQUEST['id'];
			$info=get_sales_info($id);
			$_SESSION['sales_no']=$info['sales_no'];
			$supplier_name=$info['supplier_name'];
			$remarks=$info['remarks'];
			$prepared_by=$info['prepared_by'];
			$date=$info['date'];
	
			$smarty->assign('edit_mode',"on");
			$smarty->assign('updated_by',"$_SESSION[user_name]");
			$smarty->assign('total',get_total_sales($_SESSION['sales_no']));
			$smarty->assign('parent_catagorys',list_parent_catagory());
			$smarty->assign('sales_no',"$_SESSION[sales_no]");
			$smarty->assign('customer_name',"$info[customer_name]");
			$smarty->assign('date',"$info[date]");
			$smarty->assign('remarks',"$info[remarks]");
			$smarty->assign('supplier_search',"$_SESSION[supplier_search]");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('sales_no',"$_SESSION[sales_no]");
			$smarty->assign('prepared_by',"$info[prepared_by]");
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
		elseif ($_REQUEST['job']=='delete_item'){
			$id=$_REQUEST['id'];
			//$info=get_meal_info_from_sales_has_items_by_id($id);
			//$item_info=get_meal_info_from_sales_has_items($info['meal_id'], $_SESSION['sales_no']);
	
			cancel_item($id);
			delete_sales_items_ledger($id);
	
			$sales_no=$_SESSION['sales_no'];
			$sales_info=get_sales_info_by_sales_no($sales_no);
	
			$smarty->assign('customer_name',"$sales_info[customer_name]");
			$smarty->assign('date',"$sales_info[date]");
			$smarty->assign('remarks',"$sales_info[remarks]");
			$smarty->assign('sales_no',"$_SESSION[sales_no]");
	
			if($_SESSION['edit']==1){
				$smarty->assign('edit_mode',"on");
				$smarty->assign('prepared_by',"$sales_info[prepared_by]");
				$smarty->assign('updated_by',"$_SESSION[user_name]");
			}
			else{
				$smarty->assign('prepared_by',"$_SESSION[user_name]");
			}
	
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('sales_no',"$_SESSION[sales_no]");
			$smarty->assign('total',get_total_sales($_SESSION['sales_no']));
			$smarty->assign('prepared_by',"$_SESSION[user_name]");
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
	
	
		elseif($_REQUEST['job']=='sales'){
	
			if($_REQUEST['ok']=='Save'){
				$remarks=$_POST['remarks'];
				$customer_name=$_POST['customer_name'];
				$discount_type=$_POST['discount_type'];
				$discount=$_POST['discount'];
                $payment=$_POST['payment'];
				$prepared_by=$_POST['prepared_by'];
				$sales_no=$_POST['sales_no'];			
				$service_charge=$_POST['service_charge'];
				$total=get_total_sales($_SESSION['sales_no']);
				
				
				$order_type_info=get_order_type_info($_SESSION['sales_no']);
				$order_type=$order_type_info['order_type'];
				$ref_no=$order_type_info['ref_no'];
				
				if($order_type=="Order From Room"){
					$booking_ref=get_booking_ref_for_restaurant_order($ref_no);
				}
	
				save_sales($sales_no, $date, $customer_name,$discount_type, $discount,$payment, $prepared_by, $remarks, $total, $order_type, $ref_no, $booking_ref, $service_charge);
				add_sales_ledger($sales_no);
				//update_stock_sales($sales_no);
               
			}
			else {
	
				$id=$_SESSION['id'];
				$remarks=$_POST['remarks'];
				$customer_name=$_POST['customer_name'];
				$prepared_by=$_POST['prepared_by'];
				$updated_by=$_POST['updated_by'];
				$sales_no=$_POST['sales_no'];
				$total=get_total_sales($_SESSION['sales_no']);
				update_sales($id, $sales_no, $customer_name, $prepared_by, $remarks, $total, $updated_by);
				update_sales_ledger($sales_no);
				unset($_SESSION['edit']);
			}
	
			//update_inventory_after_sales($_SESSION['sales_no']);
			update_saved_sales($_SESSION['sales_no']);
			$_SESSION['print_no']=$_SESSION['sales_no'];
			unset($_SESSION['sales_no']);
			$date = date("Y-m-d");
		//	$smarty->assign('parent_catagorys',list_parent_catagory());
			$smarty->assign('date',"$date");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('sales_no',"$_SESSION[print_no]");
			$smarty->assign('total',get_total_sales($_SESSION['print_no']));
			$smarty->assign('page',"sales");
			$smarty->display('sales/print.tpl');
		}
        elseif ($_REQUEST['job']=='kot'){
		    $sales_no=$_SESSION['sales_no'];
            $date = date("Y-m-d");

            $smarty->assign('date',"$date");
            $smarty->assign('org_name',"$_SESSION[org_name]");
            $smarty->assign('sales_no',"$_SESSION[sales_no]");
            $smarty->assign('page',"sales");
            $smarty->display('sales/kot_print.tpl');
        }
        elseif ($_REQUEST['job']=='back'){
            $sales_no=$_SESSION['sales_no'];
            kot_status($sales_no);

            $smarty->assign('page',"sales");
            $smarty->display('sales/sales.tpl');
        }
		elseif ($_REQUEST['job']=='must_new'){
			unset($_SESSION['edit']);
			unset($_SESSION['sales_no']);
			unset($_SESSION['remarks']);
			unset($_SESSION['prepared_by']);
			unset($_SESSION['updated_by']);
			unset($_SESSION['supplier_name']);
			unset($_SESSION['updated_by']);
	
	
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('parent_catagorys',list_parent_catagory());
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
	
		elseif ($_REQUEST['job']=='delete'){
			$module_no = 103;
			if (check_access($module_no, $_SESSION['user_id']) == 1) {
			$id=$_REQUEST['id'];
	
			$info=get_sales_info($id);
			$sales_no_for_delete=$info['sales_no'];
	
			calncel_items_for_sales_no($sales_no_for_delete);
			cancel_sales($id);
            delete_sales_ledger($sales_no_for_delete);
			delete_all_sales_items_ledger($sales_no_for_delete);
	
			$smarty->assign('search_mode',"on");
			unset($_SESSION['sales_no']);
			$smarty->assign('sales_no_search',"$_SESSION[sales_no_search]");
			$smarty->assign('customer_search',"$_SESSION[customer_search]");
			$smarty->assign('org_name',"$_SESSION[org_name]");
			$smarty->assign('page',"sales");
			$smarty->display('sales/sales.tpl');
		}
	else {
				$user_name = $_SESSION['user_name'];
				$smarty->assign('org_name', "$_SESSION[org_name]");
				$smarty->assign('error_report', "on");
				$smarty->assign('error_message', "Dear $user_name, you don't have permission to DELETE a sales.");
				$smarty->assign('page', "Access Error");
				$smarty->display('user_home/access_error.tpl');
			}
		}


	else {
		unset($_SESSION['edit']);
		unset($_SESSION['sales_no']);
		unset($_SESSION['remarks']);
		unset($_SESSION['prepared_by']);
		unset($_SESSION['updated_by']);
		unset($_SESSION['supplier_name']);
		unset($_SESSION['updated_by']);
		if(check_non_saved_sales_order($_SESSION['user_name'])==1){
			$_SESSION['sales_no']=non_save_sales_info($_SESSION['user_name']);

			$info=get_sales_info_by_sales_no($_SESSION['sales_no']);
			$customer_name=$info['customer_name'];
			$remarks=$info['remarks'];
			$prepared_by=$info['prepared_by'];
			$date=$info['date'];
			$_SESSION['edit']=1;
			if ($customer_name){
				$smarty->assign('new',"Skip Editing and <a href='sales.php?job=must_new' style='color: orange; font-size: 20px;'> Create New Perchase Order.</a>");
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
		$total=get_total_sales($_SESSION['sales_no']);

		$smarty->assign('org_name',"$_SESSION[org_name]");
		//$smarty->assign('parent_catagorys',list_parent_catagory());
		$smarty->assign('sales_no',"$_SESSION[sales_no]");

		$smarty->assign('total',"$total");
		$smarty->assign('page',"sales");
		$smarty->display('sales/sales.tpl');
	}
}

else {
		$user_name = $_SESSION['user_name'];
		$smarty->assign('org_name', "$_SESSION[org_name]");
		$smarty->assign('error_report', "on");
		$smarty->assign('error_message', "Dear $user_name, you don't have permission to access SALES.");
		$smarty->assign('page', "Access Error");
		$smarty->display('user_home/access_error.tpl');
	}
}
else{
	$smarty->assign('page',"Home");
	$smarty->display('index.tpl');
}