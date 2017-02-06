{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
{literal}
<script>
 $( function() {
	 $("#supplier_name").autocomplete({
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
                    <h4><strong>Purchase Report</strong></h4>
                </div>
            </div>
            <div class="row">               
                <form action="reports.php?job=purchase" method="post" class="search">
					<div class="col-lg-2"> 
                       <input type="text" name="supplier_name" value="{$supplier_name}" list="exampleList" class="form-control" placeholder="Supllier Name">
                            {php}list_suppliers();{/php}
                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="datepicker1" name="from_date" value="{$from_date}" placeholder="From Date">	
                    </div>      
                    <div class="col-lg-2"> 
                       <input type="text" class="form-control" id="datepicker2" name="to_date" value="{$to_date}" placeholder="To Date">
                    </div>
					<div class="col-lg-2">
                        <button type="submit" name="ok" value="Search" class="btn btn-primary">Search</button>
                    </div>
					<div class="col-lg-4"></div>
				</form>
			</div>
			<div class="row">
				<div class="col-xs-12">
					{if $search=="on"}
					{php}list_purchase($_SESSION[supplier_name],$_SESSION[from_date],$_SESSION[to_date]);{/php}
					{/if}
				</div>
			</div>
		</div>
    </div>
</section>
{include file="user_footer.tpl"}
{literal}
<script>
  $(function () {
   
    $('#datepicker1').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>
<script>
  $(function () {
   
    $('#datepicker2').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>
{/literal}