{include file="print_header.tpl"}
{include file="user_header.tpl"}

	<div class="row">
		<div class="col-xs-12" style="margin-left: 300px;">
			<h3> <strong> Welcome To Hotel</strong> </h3>
		</div>

	</div>

	<div class="row">
		<div class="col-xs-6">
			<strong>Sales No : </strong>{$sales_no}
		</div>
		<div class="col-xs-6">
			<strong>Date : </strong>{$date}	
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			
			{php}print_room_vacate_bill($sales_no);{/php}
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="margin-left: 300px;">
			<h3>Thank You. Come Again!</h3>
		</div>
	</div>	
<div>
<a href="sales.php"><button class="btn btn-success">New Sales</button></a>
</div>