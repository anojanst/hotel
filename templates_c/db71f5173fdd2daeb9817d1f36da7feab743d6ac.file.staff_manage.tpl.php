<?php /* Smarty version Smarty-3.0.8, created on 2017-01-23 09:12:36
         compiled from "./templates/staff_manage/staff_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3697940935885baf47840b9-32141232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db71f5173fdd2daeb9817d1f36da7feab743d6ac' => 
    array (
      0 => './templates/staff_manage/staff_manage.tpl',
      1 => 1483340474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3697940935885baf47840b9-32141232',
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
 					<div class="col-lg-12">
                    	 <h2><strong>Staff Management </strong></h2>
               		</div>
				
                <div class="panel-body">
					<a href='staff_manage.php?job=add_staff'>
            			<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Add New</button>
					</a>				
				</div>

                <div class="panel-body">
            		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_staff();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</div>
            </div>
	    </div>
		 </div>
	</section>
</div>
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	
	
			<script>
			 $(function () {
				 $("#example1").DataTable();
			 });
		</script>
	