{include file="user_header.tpl"}
{include file="user_navigation.tpl"}

 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12">
                     <h2><strong>Available Rooms</strong></h2>
               		</div>


		<div class="col-lg-12">
			<form name="room_status_by_date" role="form" action="room.php?job=room_view_by_status_back" method="post">	
     		<div class="row" style="margin-bottom: 10px;">
				<div class="col-lg-2" style="margin-left: 25px;">
					<h4><strong>Select Date</strong></h4>															
				</div>
				<div class="col-lg-3">
					<input class="form-control datepicker1" name="from_date" value="{$from_date}" required placeholder="From Date">
				</div> 
				<div class="col-lg-3">
					<input class="form-control datepicker1" name="to_date" value="{$to_date}" required placeholder="To Date">
				</div>  
				<div class="col-lg-3">
					<button type="submit" class="btn btn-block btn-primary"> Select</button>
				</div>
			</div>
			</form>
        </div>
		<div class="row">	
 			<div class="col-lg-12" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    
    						<div class="row">
        						<div class="col-xs-12">
                					{php}list_available_rooms($_SESSION['from_date'], $_SESSION['to_date'] );{/php}
            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	 	</div>

		<div class="row">	
 			<div class="col-lg-6" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    					<h2><strong> Booked Rooms </strong></h2>
    						<div class="row">
        						<div class="col-xs-12">
                					{php}list_booked_rooms($_SESSION['from_date'] );{/php}
            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	
 			<div class="col-lg-6" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    					<h2><strong> Occupied Rooms </strong></h2>
    						<div class="row">
        						<div class="col-xs-12">
                					{php}list_occupied_room($_SESSION['from_date'] );{/php}
            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	 	</div>

	

	 </div>
	</div>
	</section>
</div>
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
