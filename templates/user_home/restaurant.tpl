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
                            <select class="form-control"  name="order_type" tabindex="1" required >
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
                            <input type="text" class="form-control" name="ref_no" />
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