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
		
		<div class="row" style="margin-left: 40px;">
		<div class="col-lg-11" style="margin-top: 10px;">
			<div class="panel panel-danger" style="margin-top: 10px;">
                <div class="panel-heading">
                    Edit your Staff
                </div>
	
				<div class="panel-body">
					<form role="form" action="admin_manage.php?job=add" method="post" class="product" enctype="multipart/form-data">

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Employee Name
									<input class="form-control" name="employee_name"  value="{$employee_name}" placeholder="Employee Name">
								</div>                                
							</div>
								
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Full Name
									<input class="form-control" name="full_name" value="{$full_name}"  placeholder="Full name">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Department
									<input class="form-control" name="department" value="{$department}"  placeholder="Department">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Email
									<input class="form-control" name="email" value="{$email}"  placeholder="Email">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Telephone
									<input class="form-control" name="telephone" value="{$telephone}"  placeholder="Telephone">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Mobile
									<input class="form-control" name="mobile" value="{$mobile}"  placeholder="mobile">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Address
									<textarea class="form-control" name="address" value=""  placeholder="address"> {$address}</textarea>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-6">
									Username
									<input class="form-control" name="user_name" value="{$user_name}"  placeholder="User Name">
								</div>                                
							</div>


			 
			 <div class="row" style="margin-left: 20px;">
					<div class="col-lg-2">
			 
						 {if $edit_mode=='on'}
							<button type="submit" name="ok" value="Update" class="btn btn-block btn-success btn-lg">Update</button>
			
						{else}
							<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Save</button>
						</div>
						<div class="col-lg-2">
						{/if}
	                    	<button type="reset" class="btn btn-block btn-danger btn-lg">Reset</button>
						</div>
					</div>
			 	</form>
			  	</div>
			</div>
              </div>
	</div>
	
	</div>
	
{include file="user_footer.tpl"}
{literal}
   
			 <script>
					$(document).on('ready', function() {
						$("#gallery").fileinput({
							showUpload: false,
								maxFileCount: 10,
								mainClass: "input-group-lg"
							});
						});
			</script>
			 
			 <script>
					$(document).on('ready', function() {
						$("#input-1").fileinput({
							showUpload: false,
								maxFileCount: 1,
								mainClass: "input-group-lg"
							});
						});
			</script>
   

	 <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
	
  });
</script>
	<script>
  $(function () {
    
    $('#datepicker').datepicker({
	  format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>
	{/literal}