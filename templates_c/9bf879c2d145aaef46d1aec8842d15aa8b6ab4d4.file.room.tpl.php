<?php /* Smarty version Smarty-3.0.8, created on 2017-01-20 06:56:01
         compiled from "./templates/room/room.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13117369535881a671915b02-87719995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bf879c2d145aaef46d1aec8842d15aa8b6ab4d4' => 
    array (
      0 => './templates/room/room.tpl',
      1 => 1483510331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13117369535881a671915b02-87719995',
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
                     <h2><strong>Rooms </strong></h2>
               		</div>
		 
	<div class="row">
		<div class="col-lg-6" style="margin-top: 10px;">			
			
				<div class="panel-body">
					<form name="rooms_form" role="form" action="room.php?job=save" method="post">
			  
						
							<div class="row" style="margin-bottom: 10px; margin-left: 20px;">

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Room Number
									<input class="form-control" name="room_no" value="<?php echo $_smarty_tpl->getVariable('room_no')->value;?>
" required placeholder="Room Number">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									
								<select class="form-control"  name="room_cat" required placeholder="Room Category" >
		                    		<?php if ($_smarty_tpl->getVariable('room_type')->value){?>
										<option value="<?php echo $_smarty_tpl->getVariable('room_type')->value;?>
"><?php echo $_smarty_tpl->getVariable('room_type')->value;?>
</option>
									<?php }else{ ?>
										<option value="" disabled selected>Room Types</option>
									<?php }?>

									<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['name'] = 'room_type';
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('room_types')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['room_type']['total']);
?>
									<option  value="<?php echo $_smarty_tpl->getVariable('room_types')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room_type']['index']];?>
"><?php echo $_smarty_tpl->getVariable('room_types')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room_type']['index']];?>
</option>
									<?php endfor; endif; ?>
								</select>
	                  
								</div>                                
							</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								Room Facilities
								<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_facility_in_room();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 
                               
                			</div>
						</div>
					</div>	
						
				 <div class="row">
					<div class="col-lg-6">
			 
						 <?php if ($_smarty_tpl->getVariable('edit')->value=='on'){?>
							<button type="submit" name="ok" value="Update" class="btn btn-block btn-success btn-lg">Update</button>
			
						<?php }else{ ?>
							<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Save</button>
						</div>
						<div class="col-lg-6">
						<?php }?>
	                    	<button type="reset" class="btn btn-block btn-danger btn-lg">Reset</button>
						</div>
				</div>
				

				</div>

			 	</form>
		 </div>
	</div>


 <div class="col-lg-6" style="margin-top: 10px;">	
 <section class="content">
    <div class="nav-tabs-custom">
    <div class="tab-content">
    <div class="row">
        <div class="col-lg-12">
            <h4><strong>List Room</strong></h4>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-xs-12">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 list_rooms(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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
	
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
