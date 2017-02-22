{include file="print_header.tpl"}
{include file="user_header.tpl"}

<div style="width: 120mm; padding: 3mm;">
	<div class="row">
		<div class="col-xs-12" style="text-align: center; font-size: 38px;">
			<strong>ASVIKA HOTEL (PVT) LTD. </strong>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="text-align: center; font-size: 19px; color: #fff; background-color: #000;">
			<strong>We Serve Indian, Chinese, Western & Eastern food</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="text-align: center; font-size: 17px;">
			No. 09, Sawmiyapuram (Commercial), Kotagala - Sri Lanka.
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="text-align: center; font-size: 17px;">
			<strong>Tel : 051-3526912, 051-2244566, 051-4924626</strong>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px;">
		<div class="col-xs-6">
			<strong>Sales No : </strong>
		</div>
		<div class="col-xs-6">
			<strong>Date : </strong>{$date}	
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			
			{php}print_room_vacate_bill($_SESSION['booking_ref']);{/php}
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="text-align: center;">
			<h3>Thank You. Come Again!</h3>
		</div>
	</div>
</div>
<div>
