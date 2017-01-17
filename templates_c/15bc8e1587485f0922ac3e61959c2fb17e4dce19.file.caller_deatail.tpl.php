<?php /* Smarty version Smarty-3.0.8, created on 2017-01-16 06:32:47
         compiled from "./templates/call/caller_deatail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118589016587c5aff39b596-82209466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15bc8e1587485f0922ac3e61959c2fb17e4dce19' => 
    array (
      0 => './templates/call/caller_deatail.tpl',
      1 => 1483601593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118589016587c5aff39b596-82209466',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include '/opt/lampp/htdocs/xampp/hotel_management/libs/plugins/block.php.php';
?><?php $_template = new Smarty_Internal_Template("user_header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_navigation.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

	
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "ajax/query_inventory.php",
		minLength: 1
	});				

});
</script>

<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto1").autocomplete({
		source: "ajax/query_suppliers.php",
		minLength: 1
	});				

});
</script>





	
	<div id="contents">
	
		<?php if ($_smarty_tpl->getVariable('error_report')->value=='on'){?>
		<div class="error_report">
			<strong><?php echo $_smarty_tpl->getVariable('error_message')->value;?>
</strong>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('warning_report')->value=='on'){?>
		<div class="warning_report" style="margin-bottom: 50px;">
			<strong><?php echo $_smarty_tpl->getVariable('warning_message')->value;?>
</strong>
		</div>
		<?php }?>
		
		
 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12" align="center">
                    
					</div>

					<section class="invoice">
						<div class="row">
        					<div class="col-xs-12">
          						<h2 class="page-header">
            					<i class="fa fa-globe"></i> Caller detail
            					
          						</h2>
        					</div>
      					</div>
  
      					<div class="row invoice-info">
        					<div class="col-sm-12 invoice-col">
								<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_call_full_detail($_SESSION['id']);<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        					</div>
   
      					</div>

    				</section>

							
            	</div>   
        	</div>
		</div>	
	</div>
</section>
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>