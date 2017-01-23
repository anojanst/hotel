<?php /* Smarty version Smarty-3.0.8, created on 2017-01-23 13:36:37
         compiled from "./templates/sales/sales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15581354225885b98ded4bb6-89262516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd29dd8b15664187692f51ee9fb6c2095914d503c' => 
    array (
      0 => './templates/sales/sales.tpl',
      1 => 1485158703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15581354225885b98ded4bb6-89262516',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include '/var/www/html/hotel/libs/plugins/block.php.php';
?><?php $_template = new Smarty_Internal_Template("user_header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_navigation.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>


<script>
	$(document).ready(function() {
		$('input.product').typeahead({
			name: 'product',
			remote: 'ajax/query_inventory.php?query=%QUERY'
		});
	})
</script>

<section class="content">
	<div class="nav-tabs-custom">
		<div class="tab-content">
			<div class="row">
				<div class="col-lg-12">
					<h3><strong>Sales</strong></h3>
				</div>
			</div>
			<div class="row">
				<?php if ($_smarty_tpl->getVariable('error_report')->value=='on'){?>
					<div class="error_report" style="margin-bottom: 50px;">
						<strong><?php echo $_smarty_tpl->getVariable('error_message')->value;?>
</strong>
					</div>
				<?php }?>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-4">
							<form name="select_item_form"  action="sales.php?job=select" method="post" >
								<select class="form-control"  name="id" tabindex="1" required >
									<option value="" disabled selected>Meal Name</option>
									<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_meal_for_sale();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
                              
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
							<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_item_by_sales($_SESSION['sales_no']);<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 
							</tbody>
						</table>
					</div>
				</div>
			</div>
				<div class="col-lg-3">
					<form class="product" name="sales_form" action="sales.php?job=sales" method="post" >
						<input type="text" name="sales_no" value="<?php echo $_smarty_tpl->getVariable('sales_no')->value;?>
" size="25" required readonly="readonly" placeholder="Sales No" tabindex="3"/>
						<input type="text" class="auto1" name="customer_name" size="25" placeholder="Customer" tabindex="4"/>
						<select class="auto1"  name="discount_type" value = "<?php echo $_smarty_tpl->getVariable('dicount_type')->value;?>
" style="width: 203px;" tabindex="1" required >
							<option value="" disabled selected>Discount Type</option>
							<option value="%" >Percentage(%)</option>
							<option value=".00" >Amount(.00)</option>
						</select>
						<input type="text" class="auto1" name="discount" size="25" placeholder="Discount" tabindex="5"/>
						<input type="text" name="prepared_by" value="<?php echo $_smarty_tpl->getVariable('prepared_by')->value;?>
" size="25" placeholder="Prepared by" required readonly="readonly"/>
						<?php if ($_smarty_tpl->getVariable('edit_mode')->value=='on'){?>
						<input type="text" name="updated_by" value="<?php echo $_smarty_tpl->getVariable('updated_by')->value;?>
" size="25" placeholder=" Updated by" required readonly="readonly"/>
						<?php }?>
						<?php echo $_smarty_tpl->getVariable('total')->value;?>

						<div id="cus_amount"></div>
						<div id="balance"></div>
						<button  type="submit"  class="btn btn-success" name="ok" style="margin-right: 11px;" value="Save"  tabindex="6">Finish the Bill & Print</button>					
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>