{include file="user_header.tpl"}
{include file="user_navigation.tpl"}

{literal}
<script>
	$(document).ready(function() {
		$('input.product').typeahead({
			name: 'product',
			remote: 'ajax/query_inventory.php?query=%QUERY'
		});
	})
</script>
{/literal}
<section class="content">
	<div class="nav-tabs-custom">
		<div class="tab-content">
			<div class="row">
				<div class="col-lg-12">
					<h3><strong>Sales</strong></h3>
				</div>
			</div>
			<div class="row">
				{if $error_report=='on'}
					<div class="error_report" style="margin-bottom: 50px;">
						<strong>{$error_message}</strong>
					</div>
				{/if}
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-4">
							<form name="select_item_form"  action="sales.php?job=select" method="post" >
								<select class="form-control"  name="id" tabindex="1" required >
									<option value="" disabled selected>Meal Name</option>
									{php}list_meal_for_sale();{/php}                              
								</select>
						</div>
						<div class="col-lg-4">
							<button type="submit"  class="btn btn-danger" name="ok" style="margin-right: 11px;" value="Submit"  tabindex="6">Submit</button>
											
						</div>
							</form>
					</div><br>
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Delete</th>
									<th>Meal Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>Update</th>
								</tr>
							</thead>
							<tbody>
							{php}list_item_by_sales($_SESSION['sales_no']);{/php} 
							</tbody>
						</table>
					</div>
				</div>
			</div>
				<div class="col-lg-3">
					<form class="product" name="sales_form" action="sales.php?job=sales" method="post" >
						<input type="text" name="sales_no" value="{$sales_no}" size="25" required readonly="readonly" placeholder="Sales No" tabindex="3"/>
						<input type="text" class="auto1" name="customer_name" size="25" placeholder="Customer" tabindex="4"/>
						<select class="auto1"  name="discount_type" value = "{$dicount_type}" style="width: 203px;" tabindex="1" required >
							<option value="" disabled selected>Discount Type</option>
							<option value="%" >Percentage(%)</option>
							<option value=".00" >Amount(.00)</option>
						</select>
						<input type="text" class="auto1" name="discount" size="25" placeholder="Discount" tabindex="5"/>
						<input type="text" name="prepared_by" value="{$prepared_by}" size="25" placeholder="Prepared by" required readonly="readonly"/>
						{if $edit_mode=='on'}
						<input type="text" name="updated_by" value="{$updated_by}" size="25" placeholder=" Updated by" required readonly="readonly"/>
						{/if}
						{$total}
						<div id="cus_amount"></div>
						<div id="balance"></div>
						<button  type="submit"  class="btn btn-success" name="ok" style="margin-right: 11px;" value="Save"  tabindex="6">Finish the Bill & Print</button>					
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

{include file="user_footer.tpl"}