<?php
require_once 'conf/smarty-conf.php';
include 'functions/staff_functions.php';
include 'functions/user_functions.php';
include 'functions/modules_functions.php';


$module_no=1;

if ($_SESSION['login']==1){	
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {	
	if($_REQUEST['job']=='add'){
		if($_REQUEST['ok']=='Save'){
				
				unset($_SESSION['id']);
				
			$employee_name=$_POST['employee_name'];	
			$full_name=$_POST['full_name'];			
			$department = $_POST['department'];
			$email = $_POST['email'];
			$telephone=$_POST['telephone'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
			$user_name=$_POST['user_name'];
			$password = md5($_POST ['password']);
			
			save_staff($employee_name, $full_name, $department, $email, $telephone, $mobile, $address,$user_name, $password);
			
			$smarty->assign('employee_name',$employee_name);
			$smarty->assign('full_name',$full_name);
			$smarty->assign('department',$department);
			$smarty->assign('email',$email);
			$smarty->assign('telephone',$telephone);
			$smarty->assign('mobile',$mobile);
			$smarty->assign('address',$address);
			$smarty->assign('user_name',$user_name);
						 
			//$smarty->assign('user_name',"$_SESSION[user_name]");
			$smarty->assign('page',"Inventory");
			$smarty->display('staff_manage/details.tpl');
		}
		
		else{
		
			$id=$_SESSION['id'];
			
			$employee_name=$_POST['employee_name'];
			$full_name= $_POST['full_name'];			
			$department = $_POST['department'];
			$email = $_POST['email'];
			$telephone=$_POST['telephone'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
			$user_name=$_POST['user_name'];
			$password = md5($_POST ['password']);
					
			update_staff($id, $employee_name,$full_name, $department, $email, $telephone, $mobile, $address,$user_name, $password);		

			
			$info=get_staff_info($id);

			
			$smarty->assign('id',$info['id']);
			$smarty->assign('employee_name',$info['employee_name']);
			$smarty->assign('full_name',$info['full_name']);
			$smarty->assign('department',$info['department']);
			$smarty->assign('email',$info['email']);
			$smarty->assign('telephone',$info['telephone']);
			$smarty->assign('mobile',$info['mobile']);
			$smarty->assign('address',$info['address']);
			$smarty->assign('user_name',$info['user_name']);

			unset($_SESSION['id']);
			
			//$smarty->assign('user_name',"$_SESSION[user_name]");
			$smarty->assign('page',"Inventory");
			$smarty->display('staff_manage/details.tpl');
		}
	}
	
	elseif($_REQUEST['job']=='search'){
		$_SESSION['search']=$_POST['search'];

		$smarty->assign ('category_names', list_category_item() );
		$smarty->assign('user_name',"$_SESSION[user_name]");
		$smarty->assign('search',"$_SESSION[search]");
		$smarty->assign('search_mode',"on");
		$smarty->assign('page',"Inventory");
		$smarty->display('staff_manage/staff_manage.tpl');
	}
	
	elseif ($_REQUEST ['job'] == "view") {
		$_SESSION ['product_id'] = $_REQUEST ['product_id'];
			
		$info = get_inventory_info_by_product_id ( $_SESSION ['product_id'] );
			
		$_SESSION ['id'] = $info ['product_id'];
			$smarty->assign ('category_names', list_category_item() );	
		$smarty->assign('page',"Inventory");
			$smarty->display('staff_manage/details.tpl');
	}
	
	
	elseif ($_REQUEST['job']=='edit'){
		$module_no = 5;
		if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		$info=get_staff_info($_REQUEST['id']);
		$_SESSION['id']=$_REQUEST['id'];
		
		
		$smarty->assign('id',$info['id']);
		$smarty->assign('employee_name',$info['employee_name']);
		$smarty->assign('full_name',$info['full_name']);
		$smarty->assign('department',$info['department']);
		$smarty->assign('email',$info['email']);
		$smarty->assign('telephone',$info['telephone']);
		$smarty->assign('mobile',$info['mobile']);
		$smarty->assign('address',$info['address']);
		$smarty->assign('user_name',$info['user_name']);

		//$smarty->assign('user_name',"$_SESSION[user_name]");
		$smarty->assign('edit',"Product");
		$smarty->assign('edit_mode',"on");
		$smarty->assign('page',"Inventory");
		$smarty->display('staff_manage/add_new.tpl');
		} else {
			$user_name = $_SESSION ['user_name'];
			$smarty->assign ( 'error_report', "on" );
			$smarty->assign ( 'error_message', "Dear $user_name, you don't have permission to USER Edit Staff." );
			$smarty->assign ( 'page', "Access Error" );
			$smarty->display ( 'user_home/access_error.tpl' );
		}
	}
	elseif ($_REQUEST['job']=='delete'){
		$module_no = 4;
		if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		delete_staff($_REQUEST['id']);

		$smarty->assign('page',"Inventory");
		$smarty->display('staff_manage/staff_manage.tpl');
		} else {
			$user_name = $_SESSION ['user_name'];
			$smarty->assign ( 'error_report', "on" );
			$smarty->assign ( 'error_message', "Dear $user_name, you don't have permission to USER Delete Staff." );
			$smarty->assign ( 'page', "Access Error" );
			$smarty->display ( 'user_home/access_error.tpl' );
		}
	
		
	}
	

	elseif($_REQUEST['job']=='add_staff'){

		$smarty->assign('page',"Add New");
		$smarty->display('staff_manage/add_new.tpl');
	}
	
	elseif ($_REQUEST ['job'] == 'access') {
		$module_no = 3;
		if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
			$_SESSION ['id'] = $_REQUEST ['id'];
			$info = get_user_info_id ( $_REQUEST ['id'] );
	
			$smarty->assign ( 'full_name', "$info[full_name]" );
			$smarty->assign ( 'page', "User Access Management" );
			$smarty->display ( 'users/access.tpl' );
		} else {
			$user_name = $_SESSION ['user_name'];
			$smarty->assign ( 'error_report', "on" );
			$smarty->assign ( 'error_message', "Dear $user_name, you don't have permission to USER ACCESS MANAGEMENT." );
			$smarty->assign ( 'page', "Access Error" );
			$smarty->display ( 'user_home/access_error.tpl' );
		}
	}

	 elseif ($_REQUEST ['job'] == "remove_access") {
		$id = $_SESSION ['id'];
		$module_no = $_REQUEST ['module_no'];
	
		remove_user_module ( $id, $module_no );
	
		$info = get_user_info_id ( $id );
	
		$smarty->assign ( 'full_name', "$info[full_name]" );
		$smarty->assign ( 'page', "User Access Management" );
		$smarty->display ( 'users/access.tpl' );
	} 
	
	elseif ($_REQUEST ['job'] == "add_access") {
		$id = $_SESSION ['id'];
		$module_no = $_REQUEST ['module_no'];
	
		add_user_module ( $id, $module_no );
	
		$info = get_user_info_id ( $id );
	
		$smarty->assign ( 'full_name', "$info[full_name]" );
		$smarty->assign ( 'page', "User Access Management" );
		$smarty->display ( 'users/access.tpl' );
	}
	
	
	else{
		$smarty->assign('user_name',"$_SESSION[user_name]");

		$smarty->assign('page',"Inventory");
		$smarty->display('staff_manage/staff_manage.tpl');
	}
}
else{
	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Staff Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}

else{
	$smarty->assign('error',"<p>Incorrect Login Details!</p>");
	$smarty->display('login.tpl');
}