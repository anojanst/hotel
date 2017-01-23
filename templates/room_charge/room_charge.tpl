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
                                <form name="room_charge_type_form" role="form" action="room_charge.php?job=save" method="post">						
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Room Category
                                                <select class="form-control"  name="category">
													{if $category}
													<option value="{$category}" selected>{$category}</option>
													{else}
                                                    <option value="" disabled selected>Room Category</option>
													{/if}
                                                    {php}select_room_cat();{/php}
                                                </select>
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Season Type
                                                <select class="form-control"  name="season_type">
													{if $season_type}
													<option value="{$season_type}" selected>{$season_type}</option>
													{else}
                                                    <option value="" disabled selected>Season</option
													{/if}
                                                    <option value="Summer">Summer</option>
													<option value="Winter">Winter</option>
													<option value="Chrismas">Chrismas</option>
                                                </select>
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Meal Type
                                                <select class="form-control"  name="meal_type">
													{if $meal_type}
													<option value="{$meal_type}" selected>{$meal_type}</option>
													{else}
                                                    <option value="" disabled selected>Meal</option>
                                                    {/if}
													<option value="Fried Rice">Fried Rice</option>
													<option value="Briyani">Briyani</option>
													<option value="Chicken devel">Chicken devel</option>
												
                                                </select>
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Price
                                               <input class="form-control" name="price" value="{$price}" required placeholder="Price">
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
                        <div class="col-lg-8" style="margin-top: 10px;">	
                            <section class="content">
                               <div class="nav-tabs-custom">
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4><strong>List Room Charges</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                    {php} list_room_type_has_charges(); {/php}
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
