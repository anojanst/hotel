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
                    	 <h2><strong>Staff Management </strong></h2>
               		</div>
				
                <div class="panel-body">
					<a href='staff_manage.php?job=add_staff'>
            			<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Add New</button>
					</a>				
				</div>

                <div class="panel-body">
            		{php}list_staff();{/php}
				</div>
            </div>
	    </div>
		 </div>
	</section>
</div>
{include file="footer.tpl"}
{include file="user_footer.tpl"}
	{literal}
	
			<script>
			 $(function () {
				 $("#example1").DataTable();
			 });
		</script>
	{/literal}