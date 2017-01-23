{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
    <!-- Main content -->
<<<<<<< HEAD


<section class="content">

	<div class="col-lg-6 col-xs-12">
=======
<section class="content">

<div class="col-lg-6 col-xs-12">
>>>>>>> 5a8317de531d70a269bf6a5406de7d70202e5d45

		<div class="box box-danger box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-building"></i>
              		<h3 class="box-title">Available Rooms</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

			<div class="box-body">
				{php}list_available_rooms_in_home();{/php}
				<a href="room.php?job=room_grid_view"> <button type="button" class="btn btn-block btn-success" "> View All Rooms</button> </a>
			</div>
 	     
       </div>
	</div>

<<<<<<< HEAD
	<div class="col-lg-3 col-xs-12"> 
=======
<div class="col-lg-3 col-xs-12"> 
>>>>>>> 5a8317de531d70a269bf6a5406de7d70202e5d45
		<div class="box box-muted box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-phone"></i>
              		<h3 class="box-title">Calls</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

		<div class="box-body">
			<h5>Total Calls <small class="label pull-right bg-aqua">10</small></h5>
			<h4>Room Inquiry<small class="label pull-right bg-red">6</small></h4>
			<h4>Booking Confirmation<small class="label pull-right bg-yellow">2</small></h4>
			<h4><small class="label pull-right bg-green">1</small></h4>
			<h4>Under Maintainance <small class="label pull-right bg-navy">1</small></h4>
<<<<<<< HEAD
			<h4>Calls <small class="label pull-right bg-navy">1</small></h4>
=======
>>>>>>> 5a8317de531d70a269bf6a5406de7d70202e5d45
			<a href="call.php"> <button type="button" class="btn btn-block btn-success" "> New call</button> </a>
		</div>
       
          </div>
	</div>

	<div class="col-lg-3 col-xs-12">
		<div class="box box-info box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-bar-chart"></i>
              		<h3 class="box-title">Quick Stats</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

		<div class="box-body">
			<h4>Total Rooms <small class="label pull-right bg-aqua">10</small></h4>
			<h4>Occupied <small class="label pull-right bg-red">6</small></h4>
			<h4>Booked <small class="label pull-right bg-yellow">2</small></h4>
			<h4>Vacant <small class="label pull-right bg-green">1</small></h4>
			<h4>Under Maintainance <small class="label pull-right bg-navy">1</small></h4>
<<<<<<< HEAD
			<h4>Grand Hall <small class="label pull-right bg-navy">1</small></h4>
=======
>>>>>>> 5a8317de531d70a269bf6a5406de7d70202e5d45
		</div>
       
          </div>
	</div>
<<<<<<< HEAD

	<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>House</h3>

              <p>Management</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
    </div>

	<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Restaurant</h3>

              <p>Interface</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
    </div>

=======
	
 
		
  		<div class="control-sidebar-bg"></div>
>>>>>>> 5a8317de531d70a269bf6a5406de7d70202e5d45
	</div>
</section>
 
</body>

{include file="footer.tpl"}
{include file="user_footer.tpl"}

