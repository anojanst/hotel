{include file="print_header.tpl"}
{include file="user_header.tpl"}
	<div style="width: 64mm; padding: 3mm;">
		<div class="row">
			<div class="col-lg-12">
				<h3 style="font-size: 20px; margin-left: 50px;"><strong>ASVIKA</strong></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" style="margin-top: -10px;">
				<strong style="font-size: 20px;margin-left: 60px; ">KOT</strong>
			</div>
		</div>
		<div class="row" style="margin-top: 25px;">
			<div class="col-xs-4">
				<strong>Sales No : </strong>{$sales_no}
			</div>
			<div class="col-xs-4">
				{php}get_ref_by_sales_no($_SESSION['sales_no']);{/php}
			</div>
			<div class="col-xs-4" style="text-align: right;">
				<strong>Date : </strong>{$date}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">

				{php}kot_print($_SESSION['sales_no']);{/php}

			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-2">
		<a href="sales.php?job=back" style="width: 100px;height: 50px;" class="no-print btn btn-danger"><font size="4">Back</font></a>
	</div>
	<div class="col-xs-10"></div>
</div>