{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
{literal}
	
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "ajax/query_inventory.php",
		minLength: 1
	});				

});
</script>

<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto1").autocomplete({
		source: "ajax/query_suppliers.php",
		minLength: 1
	});				

});
</script>

{/literal}



	
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
     			   <div class="col-lg-12" align="center">
                    
					</div>

					<section class="invoice">
						<div class="row">
        					<div class="col-xs-6">
          						<h2 class="page-header">
            					<i class="fa fa-globe"></i> House Keeping
          						</h2>
        					</div>
                            <div class="col-xs-6">
                                 <a href="house_keeping.php?job=back"  style="width:60px; margin-left: 15cm;" class="btn btn-block btn-danger">Back</a>
                            </div>
      					</div>
  
      					<div class="row invoice-info">
         					<div class="col-sm-12 invoice-col">
								{php}room_request_bill($_SESSION['request_ref']);{/php}
        					</div>   
      					</div>

    				</section>

							
            	</div>   
        	</div>
		</div>	
	</div>
</section>
{include file="user_footer.tpl"}

	{literal}
	
			<script>
			 $(function () {
				 $("#example1").DataTable();
			 });
		</script>
	{/literal}