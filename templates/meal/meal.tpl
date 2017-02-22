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
                     <h2><strong>Meals </strong></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" style="margin-top: 10px;">	
                            <div class="panel-body">
                                <form name="meal_type_form" role="form" action="meal.php?job=save" method="post">
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
                                        <div class="col-lg-12">
                                            Meal Type
                                            <input class="form-control" name="meal" value="{$meal}" required placeholder="Meal Type">
                                        </div>                                
                                    </div>
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
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
                        <div class="col-lg-6" style="margin-top: 10px;">	
                            <section class="content">
                                <div class="nav-tabs-custom">
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4><strong>List Meal</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                    {php} list_meals(); {/php}
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