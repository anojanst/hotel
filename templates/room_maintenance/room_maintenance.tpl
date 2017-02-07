{include file="user_header.tpl"}
{include file="user_navigation.tpl"}



	
	<div id="contents">
		{if $error_report=='on'}
		<div class="error_report">
			<strong>{$error_message}</strong>
		</div>
		{/if}
		{if $warning_report=='on'}
		<div class="warning_report" style="margin-bottom: 50px;">
			<strong>{$warning_message}</strong>
		</div>
		{/if}
		
 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12">
                     <h2><strong>Rooms Maintenance </strong></h2>
               		</div>
		 
	<div class="row">
		<div class="col-lg-4" style="margin-top: 10px;">			
			
				<div class="panel-body">
					<form name="room_maintenance_form" role="form" action="room_maintenance.php?job=save" method="post">
			  
						
							<div class="row" style="margin-bottom: 10px; margin-left: 20px;">

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									<strong>Room Number</strong>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									<strong>Room Number</strong>
										<select name="room_no" id="room_no" class="form-control" required >
											<option value="" disabled selected>Room number</option>
												{php}list_maintenance_room_number();{/php}                              
										</select>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>From Date</strong>									
										<input class="form-control" name="from_date"  id="datepicker3" value="{$from_date}" required placeholder="From Date">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>To Date</strong>									
										<input class="form-control" name="to_date"  id="datepicker4" value="{$to_date}" required placeholder="To Date">
								</div>                                
							</div>

				 <div class="row">
					<div class="col-lg-6">
						<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Save</button>
					</div>
					
				</div>
				

				</div>

			 	</form>
		 </div>
	</div>


 <div class="col-lg-8" style="margin-top: 10px;">	
 <section class="content">
    <div class="nav-tabs-custom">
    <div class="tab-content">
    
    <div class="row">
        <div class="col-xs-12">
                {php} list_booking(); {/php}
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
	
{include file="user_footer.tpl"}

{literal}
<script>
  $(function () {
   
    $('#datepicker3').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>

<script>
  $(function () {
   
    $('#datepicker4').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>

	{literal}
		<script>
			 $(function () {
				 $("#example1").DataTable();
			 });
		</script>
	{/literal}
{/literal}
