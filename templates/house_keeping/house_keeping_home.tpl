{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
    <!-- Main content -->

<section class="content">

		<div class="row">	
 			<div class="col-lg-12" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    
    						<div class="row">
        						<div class="col-xs-12">
                					{php} list_room_request_grid(); {/php}
            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	 	</div>

	<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Open Request</h3>

              <p>Request</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="house_keeping.php?job=room_request" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
    </div>

	<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Close Request</h3>

              <p>Room</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="house_keeping.php?job=room_request_list" class="small-box-footer">
              View Request <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
    </div>

  		<div class="control-sidebar-bg"></div>

	</div>
</section>
 
</body>

{include file="footer.tpl"}
{include file="user_footer.tpl"}

