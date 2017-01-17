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
		
		
		<div class="row" style="margin-left: 40px;">
		<div class="col-lg-11" style="margin-top: 10px;">
			<div class="panel panel-danger" style="margin-top: 10px;">
                <div class="panel-heading">
                    Staff Details
				</div>
                
                <div class="panel-body">

							<div class="row">
							<div class="col-lg-3"><b>
							Employee Name      :</b> </div><div class="col-lg-9">{$employee_name}
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Full Name	:</b></div><div class="col-lg-9">{$full_name}
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Department	:</b></div><div class="col-lg-9">{$department}
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Email	:</b></div><div class="col-lg-9">{$email}
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Telephone	:</b></div><div class="col-lg-9">{$telephone}
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Mobile	:</b></div><div class="col-lg-9">{$mobile}
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Address       :</b></div><div class="col-lg-9">{$address}
							</div></div>

							<div class="row">
							<div class="col-lg-3"><b>
							User Name       :</b></div><div class="col-lg-9">{$user_name}
							</div></div>
                </div>
            </div>   
        </div>
	</div>
	
	</div>
{include file="user_footer.tpl"}