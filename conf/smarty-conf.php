<?php

session_start();
ini_set("session.gc_maxlifetime", "18000"); 

require('libs/Smarty.class.php');
$smarty = new Smarty;

ini_set ('displayerrors', true);
error_reporting (E_ALL + E_NOTICE);

$real_name=$_SESSION['real_name'];
$smarty->assign('real_name', $real_name);

if($_SESSION['login']==1){
	$smarty->assign('login', 1);
	echo'<input type="hidden" id="login_check" value="1" />';
}
else{
	echo'<input type="hidden" id="login_check" value="0" />';
}

$_SERVER['link_before']=$_SESSION['link'];
$_SESSION['link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

