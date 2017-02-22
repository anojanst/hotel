<?php
require_once 'conf/smarty-conf.php';
include 'functions/user_functions.php';
include 'functions/room_functions.php';
include 'functions/facility_functions.php';

if ($_SESSION ['login'] == 1){
    
    $smarty->assign ( 'page', "Management" );
	$smarty->display ( 'user_home/management.tpl' );

}

else {
	
	$smarty->assign ( 'error', "Incorrect Login Details!" );
	$smarty->display('login.tpl');
}