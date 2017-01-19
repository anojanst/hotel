<?php /* Smarty version Smarty-3.0.8, created on 2017-01-19 15:57:12
         compiled from "./templates/room_charge/room_charge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104984869358809480545cd2-65068246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06feb4c0216ae809a2fb600ec59b4df8ef606051' => 
    array (
      0 => './templates/room_charge/room_charge.tpl',
      1 => 1484821626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104984869358809480545cd2-65068246',
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
                     <h2><strong>Room Charge</strong></h2>
                    </div>		 
                    <div class="row">
                        <div class="col-lg-4" style="margin-top: 10px;">					
                            <div class="panel-body">
                                <form name="room_charge_type_form" role="form" action="room_charge.php?job=save" method="post">						
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Room Category
                                                <select class="form-control"  name="category">
													<?php if ($_smarty_tpl->getVariable('category')->value){?>
													<option value="<?php echo $_smarty_tpl->getVariable('category')->value;?>
" selected><?php echo $_smarty_tpl->getVariable('category')->value;?>
</option>
													<?php }else{ ?>
                                                    <option value="" disabled selected>Room Category</option>
													<?php }?>
                                                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
select_room_cat();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                                </select>
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Season Type
                                                <select class="form-control"  name="season_type">
													<?php if ($_smarty_tpl->getVariable('season_type')->value){?>
													<option value="<?php echo $_smarty_tpl->getVariable('season_type')->value;?>
" selected><?php echo $_smarty_tpl->getVariable('season_type')->value;?>
</option>
													<?php }else{ ?>
                                                    <option value="" disabled selected>Season</option
													<?php }?>
                                                    <option value="Summer">Summer</option>
													<option value="Winter">Winter</option>
													<option value="Chrismas">Chrismas</option>
                                                </select>
                                            </div>                                
                                        </div>
										<div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Meal Type
                                                <select class="form-control"  name="meal_type">
													<?php if ($_smarty_tpl->getVariable('meal_type')->value){?>
													<option value="<?php echo $_smarty_tpl->getVariable('meal_type')->value;?>
" selected><?php echo $_smarty_tpl->getVariable('meal_type')->value;?>
</option>
													<?php }else{ ?>
                                                    <option value="" disabled selected>Meal</option>
                                                    <?php }?>
													<option value="Fried Rice">Fried Rice</option>
													<option value="Briyani">Briyani</option>
													<option value="Chicken devel">Chicken devel</option>
												
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
                        <div class="col-lg-8" style="margin-top: 10px;">	
                            <section class="content">
                               <div class="nav-tabs-custom">
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4><strong>List Room Charges</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 list_room_type_has_charges(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                            </div>
                                        </div>
                                    </div>
                               </div>
                           </section>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
	
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
