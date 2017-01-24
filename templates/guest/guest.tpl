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
                     <h2><strong>Rooms </strong></h2>
               		</div>
		 
	<div class="row">
		<div class="col-lg-4" style="margin-top: 10px;">			
			
				<div class="panel-body">
					<form name="guest_form" role="form" action="call.php?job=save" method="post">
			  
						
							<div class="row" style="margin-bottom: 10px; margin-left: 20px;">

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Telephone Number</strong>									
										<input class="form-control" type="text" name="telephone_num" value="{$telephone_num}" required placeholder="Telephone Number">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Asked Date</strong>									
										<input class="form-control" name="asked_date"  id="datepicker1" value="{$asked_date}" required placeholder="Asked Date">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Remarks</strong>									
										<textarea class="form-control" name="remarks" value="{$remarks}"  placeholder="Remarks"> {$remarks}</textarea>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Caller Name</strong>									
										<input class="form-control" name="caller_name" value="{$caller_name}" required placeholder="Caller Name">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Address</strong>									
										<textarea class="form-control" name="address" value="{$address}" required placeholder="Address"> {$address}</textarea>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>District</strong>									
										<input class="form-control" name="district" value="{$district}"  placeholder="District">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Country</strong>									
										<input class="form-control" name="country" value="{$country}"  placeholder="Country">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Email</strong>									
										<input class="form-control" name="email" value="{$email}" required placeholder="Email">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Referel</strong>									
										<input class="form-control" name="referel" value="{$referel}"  placeholder="Referel ">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Date of Birth</strong>									
										<input class="form-control" id="datepicker2" name="dob" value="{$dob}" required placeholder="Date of Birth ">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>NIC</strong>									
										<input class="form-control" name="nic" value="{$nic}" required placeholder="NIC">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Passport</strong>									
										<input class="form-control" name="passport" value="{$passport}"  placeholder="Passport">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									<strong>Room Type</strong>

									<select class="form-control"  name="room_cat"  placeholder="room" >
										{if $room}
											<option value="{$room}">{$room}</option>
										{else}
											<option value="" disabled selected> Room </option>
										{/if}
										{section name=room loop=$room_names}
											<option  value="{$room_names[room]}" >{$room_names[room]}</option>
										{/section}
									</select>
								</div>                                
							</div>

							
				 <div class="row">
					<div class="col-lg-6">
						<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Save</button>
					</div>
					<div class="col-lg-6">
	                   	<button type="reset" class="btn btn-block btn-danger btn-lg">Reset</button>
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
                {php} list_call(); {/php}
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
   
    $('#datepicker1').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>

<script>
  $(function () {
   
    $('#datepicker2').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>
	
<script>
	$(function () {
	$("#example2").DataTable();
	});
</script>


{/literal}
