<?php /* Smarty version Smarty-3.0.8, created on 2017-01-23 10:21:14
         compiled from "./templates/users/access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9618515455885cb0a7b73c0-53771995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b96ee48363d371e92ae9fcba3227c1315e96766c' => 
    array (
      0 => './templates/users/access.tpl',
      1 => 1483344840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9618515455885cb0a7b73c0-53771995',
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

 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12">
                     <h2><strong>Add or Remove Permissions | User Name : </strong><?php echo $_smarty_tpl->getVariable('full_name')->value;?>
</h2>
               		</div>
  			
    <div class="row">
         		
 		<section class="content">
  		  <div class="nav-tabs-custom">

			<div class="col-lg-6"> 
  			 	<div class="tab-content">
   					 <strong>Permissions User already have</strong>
			 	  </div>
				   <div class="panel-body">
			     	  <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_user_module($_SESSION['id']);<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
					
					</div>
			</div>
	
			 <div class="col-lg-6">
					 <div class="tab-content">
			                 <strong>Permissions User Dont have</strong>
			          </div>
			           <div class="panel-body">
			            		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_not_user_module($_SESSION['id']);<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
			
						</div>
			  </div>

			 </div>
			</section>
		</div>
	
      
 			</div>
	    </div>
	</section>
  </div> 
   	
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>