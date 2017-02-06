{include file="print_header.tpl"}
<h3>Sales Details</h3>
<h3>Sales No:{$print_no}</h3>

			<div style="min-height: 300px; weight: 1000px; margin-top: 5px;">
			{php}print_sales_item($_SESSION[print_no]);{/php}
			</div>


