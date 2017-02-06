{include file="print_header.tpl"}
<h3>Purchase Details</h3>
<h3>Purchase Order No:{$purchase_order_no}</h3>

			<div style="min-height: 300px; weight: 1000px; margin-top: 5px;">
			{php}list_purchased_items($_SESSION[purchase_order_no]);{/php}
			</div>


