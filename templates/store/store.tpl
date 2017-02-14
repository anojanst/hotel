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
                     <h2><strong>Store</strong></h2>
                    </div>		 
                    <div class="row">
                        <div class="col-lg-4" style="margin-top: 10px;">					
                            <div class="panel-body">
                                <form name="store_form" role="form" action="store.php?job=save" method="post">						
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Item
                                               <input class="form-control" name="item" value="{$item}" required placeholder="Item">
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                               Price
                                               <input class="form-control" name="price" value="{$price}" placeholder="Price">
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                               Resale
												<select class="form-control" name="resale" required>
													<option value="No"selected>No</option>
													<option value="Yes">Yes</option>
												</select>
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
                                                <h4><strong>List Stock</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                    {php} list_store(); {/php}
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
