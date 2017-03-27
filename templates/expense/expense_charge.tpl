{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
{literal}
<script>
  $(function () {
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>
 <script>
  $( function() {
    $("#product_name").autocomplete({
      source: 'ajax/query_purchase_order.php',
			minLength: 1
    });
  } );
  </script>

{/literal}
<section class="content">
	<div class="nav-tabs-custom">
		<div class="tab-content">
			<div class="row">
				<div class="col-lg-12">
					<h3><strong>Expense Charge</strong></h3>
				</div>
			</div>
			<div class="row">				
				{if $error_report=='on'}
					<div class="error_report">
						<strong>{$error_message}</strong>
					</div>
				{/if}			
			</div><br/>
			<div class="row">
				<form name="purchase_item_form" action="expense_charge.php?job=save" method="post" class="product">
					<div class="col-lg-3">
						<select class="form-control" name="expense_type" value="{$expense_type}" required>
                        {if $expense_type}
                        <option value="{$expense_type}" >{$expense_type}</option>
                        {else}
                            <option value="" disabled selected>Select Expense</option>
						{/if}	
                            {php}select_expense_type();{/php}
						</select>
					</div>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="description" value="{$description}" placeholder="Description"/>
					</div>
					
					<div class="col-lg-3">
						<input  type="text" class="form-control" name="price" value="{$price}" placeholder="Price" required/>										
					</div>
					<div class="col-lg-2">
                        {if $edit=='on'}
                            <button type="submit" name="ok" value="Update" class="btn btn-block btn-success">Update</button>                              
                        {else}
                            <button type="submit" name="ok" value="Save" class="btn btn-block btn-success">Add</button>
                         </div>
                        {/if}
					</div>
				</form>
			</div>
			<div class="row">
                <div class="col-lg-12">
                  {php}list_expense_charge($_SESSION['expense_no']);{/php}						
                </div>			
			</div><br>
            <div class="row">
				<form name="purchase_form" action="expense_charge.php?job=expense" method="post" class="product">
                    <div class="col-lg-12">	
                        <input style="width: 400px;" type="text" class="form-control" name="expense_no" value="{$expense_no}" placeholder="Expense No" required readonly="readonly"/>
                        <input style="width: 400px;" type="text" class="form-control" name="supplier_name" placeholder="Supplier" value="{$supplier_name}" required />
                        <input style="width: 400px;" type="text" class="form-control"name="prepared_by" placeholder="Prepared By" value="{$prepared_by}"  required readonly="readonly"/>					
                        {if $edit_mode=='on'}
                        <input type="text" name="updated_by" value="{$updated_by}" placeholder="Updated By" required readonly="readonly"/>
                        {/if}
                        <input class="pull-left" type="submit" name="ok" value="Save"/>
                    </div>
				</form>					
			</div>
		</div>
	</div>
</section>
{include file="user_footer.tpl"}