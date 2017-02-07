<?php
require_once 'conf/smarty-conf.php';

include 'functions/modules_functions.php';
include 'functions/guest_functions.php';
include 'functions/call_functions.php';


$module_no = 10;

if ($_SESSION ['login'] == 1) {
	if (check_access ( $module_no, $_SESSION ['user_id'] ) == 1) {
		if ($_REQUEST ['job'] == "guest_form") {
			
			$smarty->assign ( 'room_names', list_available_room() );
			$smarty->assign ( 'page', "Guest" );
			$smarty->display ( 'guest/guest.tpl' );
			
		} elseif ($_REQUEST ['job'] == "save") {
					
				$telephone_num=$_POST ['telephone_num'];
				$asked_date = $_POST ['asked_date'];
				$remarks= $_POST['remarks'];
				
				$guest_name=$_POST['guest_name'];
				$address = $_POST['address'];
				$district = $_POST['district'];
				$country = $_POST['country'];
				$email = $_POST['email'];
				$referel = $_POST['referel'];
				$dob = $_POST['dob'];
				$nic = $_POST['nic'];
				$passport = $_POST['passport'];
				
				$room_cat = $_POST['room_cat'];
				
				save_guest_request($telephone_num, $asked_date, $remarks, $room_cat);
				save_guest( $guest_name, $address, $district, $country, $telephone_num,$email, $referel, $dob,$nic, $passport );

			$smarty->assign ( 'room_names', list_room_types() );
			$smarty->assign ( 'page', "Guest" );
			$smarty->display ( 'guest/guest.tpl' );
			
		} 
		elseif ($_REQUEST ['job'] == "view_guest_detail") {
			
			$_SESSION ['id'] = $_REQUEST ['id'];
			$smarty->assign ( 'room_names', list_room_types() );
			$smarty->assign ( 'page', "caller" );
			$smarty->display ( 'guest/guest_deatail.tpl' );
				
		}

		else {
			$smarty->assign ( 'room_names', list_room_types() );
			$smarty->assign ( 'page', "Guest" );
			$smarty->display ( 'guest/guest.tpl' );
		}
}
else{

	$smarty->assign ( 'error_report', "on" );
	$smarty->assign ( 'error_message', "Dear $_SESSION[user_name], you don't have permission to Guest Management." );
	$smarty->assign ( 'page', "Access Error" );
	$smarty->display ( 'user_home/access_error.tpl' );
}
}
	

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}