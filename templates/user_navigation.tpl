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

								<li>
									<a href="room_manage.php?job=room_manage_form"><i class="fa fa-cogs"></i><span>Room Management</span></a>
								</li>	

								<li class="scroll">
									<a href="modules.php"><i class="fa fa-th"></i><span>Module Management</span></a>
								</li>	
										
							 </ul>

				</li>						

				<li class="treeview">
					<a href="#"><i class="fa fa-cubes"></i><span>Billings </span><span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i></span></a>
							<ul class="treeview-menu">
								<li class="scroll">
									<a href="sales.php"><i class="fa fa-balance-scale"></i><span> Sales</span></a>
								</li>										
							</ul>
				</li>	
				
				<li class="treeview">
					<a href="#"><i class="fa fa-building"></i><span>Room Management </span><span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i></span></a>
							<ul class="treeview-menu">
								<li class="scroll">
									<a href="rooms_type.php"><i class="fa fa-calendar"></i><span>Rooms Type</span></a>
								</li>

								<li class="scroll">
									<a href="room_charge.php"><i class="fa fa-calendar"></i><span>Room Charge</span></a>
								</li>								

								<li class="scroll">
									<a href="room.php"><i class="fa fa-building"></i><span>Room</span></a>
								</li>								


								<li class="scroll">
									<a href="room.php?job=room_view_by_status"><i class="fa fa-building"></i><span>Rooms by Status</span></a>
								</li>								

								<li class="scroll">
									<a href="room_vacate.php?job=room_vacate_form"><i class="fa fa-book"></i><span>Rooms Vacate</span></a>
								</li> 								
	
								<li class="scroll">
									<a href="facility.php"><i class="fa fa-bed"></i><span>Facility</span></a
								</li>										
							</ul>	
				</li>

				
				<li class="treeview">
					<a href="#"><i class="fa fa-cutlery"></i><span> Restaurant Menu</span><span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i></span></a>
							<ul class="treeview-menu">
								<li class="scroll">
									   <a href="meal.php"><i class="fa fa-cutlery"></i><span> Meal Type</span></a>
								</li>
								<li class="scroll">
										<a href="meal_detail.php"><i class="fa fa-cutlery"></i><span> Meal Detail</span></a>
								</li>	
							</ul>
															
				</li>
                
                <li class="treeview">
					<a href="#"><i class="fa fa-glass"></i><span> Bar Menu</span><span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i></span></a>
							<ul class="treeview-menu">
								<li class="scroll">
									   <a href="liquor.php"><i class="fa fa-glass"></i><span> Liquor Type</span></a>
								</li>
								<li class="scroll">
										<a href="liquor_detail.php"><i class="fa fa-glass"></i><span> Liquor Detail</span></a>
								</li>	
							</ul>
															
				</li>	
				
				<li class="scroll">
					<a href="tax.php"><i class="fa fa-bed"></i><span>Tax</span></a>
				</li>
				<li class="scroll">
					<a href="purchase_order.php"><i class="fa fa-shopping-cart"></i><span>Purchase</span></a>
				</li>
                <li class="treeview">
					<a href="#"><i class="fa fa-file-text"></i><span>Reports</span><span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i></span></a>
							<ul class="treeview-menu">
								<li class="scroll">
									   <a href="reports.php"><i class="fa fa-file-text"></i><span>Purchase Report</span></a>
								</li>
                                <li class="scroll">
								   <a href="reports.php?job=purchased_item_report"><i class="fa fa-file-text"></i><span>Purchase Item Report</span></a>
								</li>
                                <li class="scroll">
									<a href="reports.php?job=occupied_room_report"><i class="fa fa-file-text"></i><span>Occupied Room Report</span></a>
								</li>
                                <li class="scroll">
                                    <a href="reports.php?job=occupied_days_report"><i class="fa fa-file-text"></i><span>Occupied Days Report</span></a>
								</li>
                                <li class="scroll">
                                    <a href="reports.php?job=booked_room_report"><i class="fa fa-file-text"></i><span>Booked Room Report</span></a>
								</li>
                                <li class="scroll">
                                    <a href="reports.php?job=booked_days_report"><i class="fa fa-file-text"></i><span>Booked Days Report</span></a>
								</li>
                                <li class="scroll">
                                    <a href="reports.php?job=sales_report"><i class="fa fa-file-text"></i><span>Sales Report</span></a>
								</li>
                            </ul>
                 </li>
				<li class="scroll">
					<a href="login.php?job=logout"><i class="fa fa-sign-out"></i> <span> Logout</span></a>

				</li>
			</ul>           
		</section>
	</aside>

