{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
    <!-- Main content -->

<section class="content">
    <div class="col-lg-6 col-xs-12">
        <div class="box box-danger box-solid">
            <div class="box-header with-border">
                <i class="fa fa-building"></i>
                    <h3 class="box-title">Pending Orders</h3>
            </div>
            <div class="box-body">
                {php}last_incomplete_bill();{/php}
                <h4><strong>Other Pending Orders</strong></h3>
                {php}all_incomplete_bill();{/php}
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-12">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <i class="fa fa-building"></i>
                <h3 class="box-title">New Order</h3>
            </div>
            <div class="box-body">
                <form name="select_item_form"  action="sales.php?job=order_type" method="post" >
					<div class="row">
                        <div class="col-lg-12">
                            <strong>Order Type</strong>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 8px;">
                            <select class="form-control"  name="order_type" id="order_type" tabindex="1" required >
                                <option value="Dine In">Dine In</option>
                                <option value="Order From Room">Order From Room</option>
                                <option value="Take Away">Take Away</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 5px;">
                            <strong>Table No or Room No</strong>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 8px;">
							<select name="ref_no" id="ref_no" class="form-control" required >
								<option disabled selected>Select Table</option>
								<option value="1">Table 1</option>
								<option value="2">Table 2</option>
								<option value="3">Table 3</option>
								<option value="4">Table 4</option>
								<option value="5">Table 5</option>
								<option value="6">Table 6</option>
								<option value="7">Table 7</option>
								<option value="8">Table 8</option>
								<option value="9">Table 9</option>
								<option value="10">Table 10</option
								<option value="11">Table 11</option>
								<option value="12">Table 12</option>
								<option value="13">Table 13</option>
								<option value="14">Table 14</option>
								<option value="15">Table 15</option>
								<option value="16">Table 16</option>
								<option value="17">Table 17</option>
								<option value="18">Table 18</option>
								<option value="19">Table 19</option>
								<option value="20">Table 20</option>                         
							</select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit"  class="btn btn-danger col-lg-12" name="ok" style="margin-top: 10px;" value="Submit"  tabindex="6">Submit</button>
						</div>					
					</div>
				</form>
            </div>
        </div>
    </div>
    
</section>

{include file="user_footer.tpl"}