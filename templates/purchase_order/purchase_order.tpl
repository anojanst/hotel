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
					<h3><strong>Purchase Order</strong></h3>
				</div>
			</div>
			<div class="row">				
				{if $error_report=='on'}
					<div class="error_report">
						<strong>{$error_message}</strong>
					</div>
				{/if}			
			</div><br>
			<div class="row">
				{if $search_mode=='on'}
					{php}list_purchase_order_search($_SESSION[purchase_order_no_search], $_SESSION[supplier_search]);{/php}
				{/if}
			
				<div class="col-lg-12">
						<h4 style="margin-left: 15px;">Add New Purchase order</h4>
					{if $new}
						<p style="margin-left: 530px; margin-top: -50px;">{$new}</p>				
					{/if}
				</div>
			</div>
			<div class="row">
				<form name="purchase_item_form" action="purchase_order.php?job=purchase_item" method="post" class="product">
					<div class="col-lg-3">		 
						<input type="text" class="form-control" name="purchase_item" id="purchase_item" value="{$purchase_item}" placeholder="Item" required/>									
					</div>
					<div class="col-lg-1">
						<input type="text" class="form-control" name="qty" value="{$qty}" placeholder="Qty" required/>
					</div>
					<div class="col-lg-1">
						<select class="form-control" name="measure_type" required>
							<option value="" disable selected>Measure Type</option>
							<option value="P">Piece</option>
							<option value="B">Box</option>
							<option value="D">Dozen</option>
							<option value="m">M</option>
							<option value="g">g</option>
							<option value="kg" >Kg</option>
							<option value="l">Liters</option>
						</select>
					</div>
					<div class="col-lg-2">
						<input  type="text" class="form-control" name="buying_price" value="{$buying_price}" placeholder="buying Price" required/>										
					</div>
					<div class="col-lg-1">
						<input class="form-control btn btn-success" type="submit" name="ok" value="Add"/>
					</div>
					<div class="col-lg-4">
						
					</div>
				</form>
			</div>
			<div class="row">
        <div class="col-lg-12">
          {php}list_item_by_purchase_order($_SESSION['purchase_order_no']);{/php}						
        </div>			
			</div><br><br>	
			<div class="row">
				<form name="purchase_form" action="purchase_order.php?job=purchase" method="post" class="product">
				<div class="col-lg-12">	
					<input style="width: 400px;" type="text" class="form-control" name="purchase_order_no" value="{$purchase_order_no}" placeholder="Purchase Order No" required readonly="readonly"/>
					<input style="width: 400px;" type="text" class="form-control" name="supplier_name" placeholder="Supplier" value="{$supplier_name}" required />
					<input style="width: 400px;" type="text" class="form-control"name="prepared_by" placeholder="Prepared By" value="{$prepared_by}"  required readonly="readonly"/>					
					{if $edit_mode=='on'}
					<input type="text" name="updated_by" value="{$updated_by}" placeholder="Updated By" required readonly="readonly"/>
					{/if}
					{if $edit_mode=='on'}
					<input class="pull-left" type="submit" name="ok" value="Update"/>
					{else}
					<input class="pull-left" type="submit" name="ok" value="Save"/>
					{/if}
					</div>
				</form>					
			</div>
		</div>
	</div>
</section>
{include file="user_footer.tpl"}