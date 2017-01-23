<?php /* Smarty version Smarty-3.0.8, created on 2017-01-23 14:53:35
         compiled from "./templates/sales/print.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8421444075885cb974368f1-59203226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '528f5345c4d3c59e6946e0e0f1362c4b702256b3' => 
    array (
      0 => './templates/sales/print.tpl',
      1 => 1485163413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8421444075885cb974368f1-59203226',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include '/var/www/html/hotel/libs/plugins/block.php.php';
?><?php $_template = new Smarty_Internal_Template("print_header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

	<div class="row">
		<div class="col-xs-6">
			<strong>Sales No : </strong><?php echo $_smarty_tpl->getVariable('sales_no')->value;?>

		</div>
		<div class="col-xs-6">
			<strong>Date : </strong><?php echo $_smarty_tpl->getVariable('date')->value;?>
	
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
print_sales_item($_SESSION['print_no']);<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			
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