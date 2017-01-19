<?php /* Smarty version Smarty-3.0.8, created on 2017-01-19 14:20:23
         compiled from "./templates/season/season.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127652170058807dcfd36f92-97916284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14e310b189f89a140fcf910e4c47640ac49c298b' => 
    array (
      0 => './templates/season/season.tpl',
      1 => 1484815515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127652170058807dcfd36f92-97916284',
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
                     <h2><strong>Season Types </strong></h2>
                    </div>		 
                    <div class="row">
                        <div class="col-lg-6" style="margin-top: 10px;">					
                            <div class="panel-body">
                                <form name="season_type_form" role="form" action="season.php?job=save" method="post">						
                                    <div class="row" style="margin-bottom: 10px; margin-left: 20px;">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                Season Type
                                                <input class="form-control" name="season_type" value="<?php echo $_smarty_tpl->getVariable('season_type')->value;?>
" required placeholder="Season Type">
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
                                                <h4><strong>List Season Types</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 list_season_type(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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
