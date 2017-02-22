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
                     <h2><strong>Liquors</strong></h2>
               		</div>
		 
	<div class="row">
		<div class="col-lg-6" style="margin-top: 10px;">			
			
				<div class="panel-body">
					<form name="liquor_detail_form" role="form" action="liquor_detail.php?job=save" method="post">
			  
						
							<div class="row" style="margin-bottom: 10px; margin-left: 20px;">

                            <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Liquor Type
									<select class="form-control"  name="liquor" required placeholder="Liquor Type" >
		                    		{if $liquor}
										<option value="{$liquor}">{$liquor}</option>
									{else}
										<option value="" disabled selected>Liquor</option>
									{/if}
									{section name=liquor_type loop=$liquor_names}
									<option  value="{$liquor_names[liquor_type]}">{$liquor_names[liquor_type]}</option>
									
									{/section}
								</select>
                                </div>                                
							</div>
							
                            <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Liquor Name
									<select class="form-control" name="liquor_name" required>
										{if $liquor_name}
											<option value="{$liquor_name}">{$liquor_name}</option>
										{else}
											<option value="" disabled selected>Liquor</option>
										{/if}
										{php}list_store_for_bar();{/php}
									</select>
								</div>                                
							</div>
                            
                             <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									25ml Price
									<input class="form-control" name="price_25" value="{$price_25}" placeholder="25ml Price">
								</div>                                
							</div>
                             
                              <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									50ml Price
									<input class="form-control" name="price_50" value="{$price_50}"  placeholder="50ml Price">
								</div>                                
							</div>
                            
                            <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Full Bottle Price
									<input class="form-control" name="price" value="{$price}" required placeholder="Full Bottle Price">
								</div>                                
							</div>
                            
							
						
				 <div class="row">
					<div class="col-lg-6">
			 
						 {if $edit=='on'}
							<button type="submit" name="ok" value="Update" class="btn btn-block btn-success btn-lg">Update</button>
			
						{else}
							<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Save</button>
						</div>
						<div class="col-lg-6">
						{/if}
	                    	<button type="reset" class="btn btn-block btn-danger btn-lg">Reset</button>
						</div>
				</div>
				

				</div>

			 	</form>
		 </div>
	</div>


 <div class="col-lg-6" style="margin-top: 10px;">	
 <section class="content">
    <div class="nav-tabs-custom">
    <div class="tab-content">
    <div class="row">
        <div class="col-lg-12">
            <h4><strong>List liquor</strong></h4>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-xs-12">
                {php} list_liquor_details(); {/php}
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