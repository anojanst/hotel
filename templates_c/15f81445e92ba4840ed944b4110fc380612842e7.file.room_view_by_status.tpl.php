<?php /* Smarty version Smarty-3.0.8, created on 2017-01-20 05:12:29
         compiled from "./templates/room/room_view_by_status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8019751958818e2d9eebb1-10133415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15f81445e92ba4840ed944b4110fc380612842e7' => 
    array (
      0 => './templates/room/room_view_by_status.tpl',
      1 => 1484885498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8019751958818e2d9eebb1-10133415',
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
                     <h2><strong>Available Rooms</strong></h2>
               		</div>
		 
		<div class="row">	
 			<div class="col-lg-12" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    
    						<div class="row">
        						<div class="col-xs-12">
                					<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_available_rooms();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	 	</div>

		<div class="row">	
 			<div class="col-lg-6" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    					<h2><strong> Booked Rooms </strong></h2>
    						<div class="row">
        						<div class="col-xs-12">
                					<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_booked_rooms();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	
 			<div class="col-lg-6" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    					<h2><strong> Occupied Rooms </strong></h2>
    						<div class="row">
        						<div class="col-xs-12">
                					<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_occupied_room();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	 	</div>


	 </div>
	</div>
	</section>
</div>
</body>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

