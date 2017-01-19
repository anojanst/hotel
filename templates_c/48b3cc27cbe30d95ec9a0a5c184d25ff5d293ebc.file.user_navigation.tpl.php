<?php /* Smarty version Smarty-3.0.8, created on 2017-01-06 12:13:38
         compiled from "./templates/user_navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:473137609586f7be2e8e582-85602956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48b3cc27cbe30d95ec9a0a5c184d25ff5d293ebc' => 
    array (
      0 => './templates/user_navigation.tpl',
      1 => 1483701215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '473137609586f7be2e8e582-85602956',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<body class="sidebar-mini skin-purple sidebar-collapse">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>H</b>M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Hotel Management</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
            </ul>
        </div>
    </nav>
</header>
  

<div class="content-wrapper">
	<aside class="main-sidebar">
    	<section class="sidebar">
					 <ul class="sidebar-menu">

									<li class="active treeview">
										 <a href="user_home.php" ><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
									</li>

									<li class="treeview">
											<a href="#"><i class="fa fa-cubes"></i><span>System Management </span><span class="pull-right-container">
												<i class="fa fa-angle-left pull-right"></i></span></a>
														<ul class="treeview-menu">
																 <li><a href='staff_manage.php'><i class="fa fa-cubes"></i> Staff Management </span></a></li>
																	
														 </ul>
									</li>						

									<li class="scroll">
												<a href="room_manage.php?job=room_manage_form"><i class="fa fa-cogs"></i><span>Room Management</span></a>
									</li>
									
									<li class="scroll">
												<a href="modules.php"><i class="fa fa-th"></i><span>Module Management</span></a>
									</li>

									<li class="scroll">
												<a href="rooms_type.php"><i class="fa fa-calendar"></i><span>Rooms Type</span></a>
									</li>

									<li class="scroll">
												<a href="room.php"><i class="fa fa-building"></i><span>Room</span></a>
									</li>

									<li class="scroll">
												<a href="facility.php"><i class="fa fa-bed"></i><span>Facility</span></a>
									</li>

									<li class="scroll">
												<a href="login.php?job=logout"><i class="fa fa-sign-out"></i> <span> Logout</span></a>
									</li>
		 
					 </ul>
					   
            
    </section>
</aside>