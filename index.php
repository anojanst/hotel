<?php
require_once 'conf/smarty-conf.php';
include 'functions/room_type_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';



if ($_SESSION['login']==1){
	$smarty->assign('user_name',"$_SESSION[user_name]");
	$smarty->assign('page',"User Home");
	$smarty->display('user_home/user_home.tpl');
}
else{
	$smarty->assign('page',"Home");
	$smarty->display ( 'login.tpl' );
}