<?php /* Smarty version Smarty-3.0.8, created on 2017-01-20 11:24:57
         compiled from "./templates/meal/meal_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3629906985881a6318f8224-70887393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29e65a00e5bfa0b4f9e764f595ee483811a63a00' => 
    array (
      0 => './templates/meal/meal_detail.tpl',
      1 => 1484890586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3629906985881a6318f8224-70887393',
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
                     <h2><strong>Meals </strong></h2>
               		</div>
		 
	<div class="row">
		<div class="col-lg-6" style="margin-top: 10px;">			
			
				<div class="panel-body">
					<form name="rooms_form" role="form" action="meal_detail.php?job=save" method="post">
			  
						
							<div class="row" style="margin-bottom: 10px; margin-left: 20px;">

                            <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Meal Type
									<select class="form-control"  name="meal" required placeholder="Meal Type" >
		                    		<?php if ($_smarty_tpl->getVariable('meal')->value){?>
										<option value="<?php echo $_smarty_tpl->getVariable('meal')->value;?>
"><?php echo $_smarty_tpl->getVariable('meal')->value;?>
</option>
									<?php }else{ ?>
										<option value="" disabled selected>Meal</option>
									<?php }?>
									<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['meal']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['name'] = 'meal';
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('meal_names')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['meal']['total']);
?>
									<option  value="<?php echo $_smarty_tpl->getVariable('meal_names')->value[$_smarty_tpl->getVariable('smarty')->value['section']['meal']['index']];?>
"><?php echo $_smarty_tpl->getVariable('meal_names')->value[$_smarty_tpl->getVariable('smarty')->value['section']['meal']['index']];?>
</option>
									<?php endfor; endif; ?>
								</select>
                                </div>                                
							</div>
							
                            <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Meal Name
									<input class="form-control" name="meal_name" value="<?php echo $_smarty_tpl->getVariable('meal_name')->value;?>
" required placeholder="Meal Name">
								</div>                                
							</div>
                            
                             <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Size
									<select class="form-control" name="size" value="<?php echo $_smarty_tpl->getVariable('size')->value;?>
">
										<?php if ($_smarty_tpl->getVariable('size')->value){?>
											<option value="<?php echo $_smarty_tpl->getVariable('size')->value;?>
"><?php echo $_smarty_tpl->getVariable('size')->value;?>
</option>
                                        <?php }else{ ?>
											<option value="" disabled selected> Size</option>
										<?php }?>
                                            <option value="--"> -- </option>
											<option value="S"> S </option>
											<option value="M"> M</option>
                                            <option value="L"> L </option>
											
									</select>
								</div>                                
							</div>
                            
                            <div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									Price
									<input class="form-control" name="price" value="<?php echo $_smarty_tpl->getVariable('price')->value;?>
" required placeholder="Price">
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
            <h4><strong>List Meal</strong></h4>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-xs-12">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 list_meal_details(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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