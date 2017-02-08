{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
    <!-- Main content -->

<section class="content">
	<div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>Purchase</h3>

            <p>Report</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="reports.php" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
	</div>
    
    <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Sales</h3>

              <p>Report</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="reports.php?job=sales_report" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
	</div>

	<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Occupied</h3>
              <p>Report</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="reports.php?job=occupied_room_report" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
	</div>
	
	<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Booked</h3>

              <p>Report</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="reports.php?job=booked_room_report" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
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
					<h4>Total Rooms <small class="label pull-right bg-aqua">{php} $total_rooms = total_rooms_count(); echo $total_rooms;{/php}</small></h4>
					<h4>Occupied <small class="label pull-right bg-red">{php}$occupied_rooms = occupied_rooms_count(); echo $occupied_rooms;{/php}</small></h4>
					<h4>Booked <small class="label pull-right bg-yellow">{php}$booked_rooms=booked_rooms_count(); echo $booked_rooms;{/php}</small></h4>
					<h4>Under Maintainance <small class="label pull-right bg-navy">{php}$maintainance_rooms=maintainance_rooms_count(); echo $maintainance_rooms;{/php}</small></h4>
                    <h4>Available <small class="label pull-right bg-green">{php}$available_rooms = available_rooms_count(); echo $available_rooms; {/php}</small></h4>
					<!--<h4>Grand Hall <small class="label pull-right bg-navy">1</small></h4>-->
				</div>
       
          </div>
	</div>

	<div class="col-lg-6 col-xs-12">
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


	<div class="col-lg-6 col-xs-12">
		<div class="box box-Warning box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-building"></i>
              		<h3 class="box-title">Booked Rooms</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

			<div class="box-body">
				{php}list_booked_rooms_in_home();{/php}
				<a href="room.php?job=room_grid_view"> <button type="button" class="btn btn-block btn-success" "> View All Rooms</button> </a>
			</div>
 	     
		</div>
	</div>

	<div class="col-lg-6 col-xs-12">
		<div class="box box-Primary box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-building"></i>
              		<h3 class="box-title">Occupied Rooms</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

			<div class="box-body">
				{php}list_occupied_rooms_in_home();{/php}
				<a href="room.php?job=room_grid_view"> <button type="button" class="btn btn-block btn-success" "> View All Rooms</button> </a>
			</div>
 	     
		</div>
	</div>
	
	

  		<div class="control-sidebar-bg"></div>

	</div>
</section>
 
</body>

{include file="footer.tpl"}
{include file="user_footer.tpl"}
{literal}
<script>
  $(function () {
   
    $('.datepicker1').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>
{/literal}
