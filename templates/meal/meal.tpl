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
                        <h2><strong>Bill Of Material </strong></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" style="margin-top: 10px;">
                            <div class="panel-body">
                                <form name="rooms_form" role="form" action="meal.php?job=save" method="post">
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Meal Name
                                                <select class="form-control" name="meal_name" value="{$meal_name}">
                                                    {if $meal_name}
                                                        <option value="{$meal_name}">{$meal_name}</option>
                                                    {else}
                                                        <option value="" disabled selected> Meal</option>
                                                    {/if}
                                                    {php}list_meal_menu();{/php}
                                                </select>
                                                
                                            </div>                                
                                        </div>
                                        
                                         <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Size
                                                <select class="form-control" name="size" value="{$size}">
                                                    {if $size}
                                                        <option value="{$size}">{$size}</option>
                                                    {else}
                                                        <option value="" disabled selected> Size</option>
                                                    {/if}
                                                        <option value="--"> -- </option>
                                                        <option value="S"> S </option>
                                                        <option value="M"> M</option>
                                                        <option value="L"> L </option>
                                                        
                                                </select>
                                            </div>                                
                                        </div>
                                         
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Item
                                                <input class="form-control" name="item" value="{$item}" required placeholder="Item">
                                            </div>                                
                                        </div>
                                        
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Qty
                                                <input class="form-control" name="qty" value="{$qty}" required placeholder="Qty">
                                            </div>                                
                                        </div>
                                        
                                         <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Price
                                                <input class="form-control" name="price" value="{$price}" required placeholder="price">
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
                                                <h4><strong>List Bill Of Material</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                    {php}list_bill_of_material(); {/php}
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