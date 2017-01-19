<?php
function check_login($login, $passcode) {
		$passcode=md5($passcode);

		include 'conf/config.php';
		include 'conf/opendb.php';

		if(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM employees WHERE user_name = '$login' AND password= '$passcode' AND cancel_status='0'"))){
			return 1;
		}
		else{
			return 0;
		}

		include 'conf/closedb.php';
}

function get_user_info($user_name) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM employees WHERE user_name='$user_name'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
	include 'conf/closedb.php';
}

function get_user_info_id($user_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM employees WHERE id='$user_id'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
	include 'conf/closedb.php';
}

function update_detail($org_name, $address, $email, $telephone, $fax, $owner_name, $owner_email, $owner_telephone){
	include 'conf/config.php';
	include 'conf/opendb.php';

	 
	$query = "UPDATE detail SET
	org_name='$org_name',
	telephone='$telephone',
	address='$address',
	fax='$fax',
	owner_name='$owner_name',
	owner_email='$owner_email',
	owner_telephone='$owner_telephone',
	email='$email',
	filled='1'";

	mysqli_query($conn, $query);
	
	include 'conf/closedb.php';
}


function list_not_user_module($user_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ($conn , "SELECT * FROM modules WHERE modules.cancel_status='0' AND modules.module_no NOT IN (SELECT user_has_module.module_no FROM user_has_module WHERE user_has_module.user_id='$user_id' )");

	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		echo '<div class="col-lg-9">' . $row [module_name] . '</div>
              <div class="col-lg-3"><a href="staff_manage.php?job=add_access&module_no=' . $row [module_no] . '"> <i class="fa fa-check fa-2x"></i></a></div>';
	}


}
function list_user_module($user_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ( $conn, "SELECT * FROM user_has_module WHERE user_id='$user_id'" );

	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		$module_info = get_module_info ( $row ['module_no'] );
		$module_name = $module_info ['module_name'];

		echo '<div class="col-lg-9">' . $module_name . '</div>
              <div class="col-lg-3"><a href="staff_manage.php?job=remove_access&module_no=' . $row [module_no] . '"> <i class="fa fa-times fa-2x"></i></a></div>';
	}


}
function get_module_info($module_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ($conn, "SELECT * FROM modules WHERE module_no='$module_no'" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		return $row;
	}


}
function add_user_module($user_id, $module_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "INSERT INTO user_has_module (user_id, module_no)
	VALUES ('$user_id', '$module_no')";
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );


}
function remove_user_module($user_id, $module_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	echo $user_id;
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM user_has_module WHERE user_id='$user_id' AND module_no='$module_no'";
	mysqli_query ($conn, $query );


}

