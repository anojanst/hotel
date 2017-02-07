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
                     <h2><strong>Room Charge</strong></h2>
                    </div>		 
                    <div class="row">
                        <div class="col-lg-4" style="margin-top: 10px;">					
                            <div class="panel-body">
                                <form name="tax_type_form" role="form" action="tax.php?job=save" method="post">						
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Tax Type
                                               <input class="form-control" name="tax" value="{$tax}" required placeholder="Tax Type">
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Percentage
                                               <input class="form-control" name="percentage" value="{$percentage}" required placeholder="Percentage">
                                            </div>                                
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">                                              
                                                <button type="submit" name="save" value="save" class="btn btn-block btn-success btn-lg">Save</button>
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
                                            <div class="col-lg-12">
                                                <h4><strong>List Tax</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                    {php} list_tax(); {/php}
                                            </div>
                                        </div>
                                    </div>
                               </div>
                           </section>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
	
{include file="user_footer.tpl"}
