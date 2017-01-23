<?php /* Smarty version Smarty-3.0.8, created on 2017-01-20 06:50:31
         compiled from "./templates/booking/booking.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5572489325881a5270665c8-49775823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a8b0f91e1ae0fa49f355793c4f610a43238e4e' => 
    array (
      0 => './templates/booking/booking.tpl',
      1 => 1483699318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5572489325881a5270665c8-49775823',
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
		<div class="col-lg-4" style="margin-top: 10px;">			
			
				<div class="panel-body">
					<form name="booking_form" role="form" action="booking.php?job=save" method="post">
			  
						
							<div class="row" style="margin-bottom: 10px; margin-left: 20px;">

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									<strong>Room Type</strong>

								<select class="form-control" id="room_cat" name="room_cat" required placeholder="Room Category" >
		                    		<?php if ($_smarty_tpl->getVariable('room_cat')->value){?>
										<option value="<?php echo $_smarty_tpl->getVariable('room_cat')->value;?>
" selected><?php echo $_smarty_tpl->getVariable('room_cat')->value;?>
</option>
									<?php }else{ ?>
										<option value="" disabled selected>Room Types</option>
									<?php }?>

									<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['name'] = 'room_cat';
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('room_category')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['room_cat']['total']);
?>
									<option  value="<?php echo $_smarty_tpl->getVariable('room_category')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room_cat']['index']];?>
"><?php echo $_smarty_tpl->getVariable('room_category')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room_cat']['index']];?>
</option>
									<?php endfor; endif; ?>
								</select>

								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									<strong>Room Number</strong>
										<select name="room_no" id="room_no" class="form-control">											

									<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['name'] = 'room_no';
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('room_no')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['room_no']['total']);
?>
									<option  value="<?php echo $_smarty_tpl->getVariable('room_no')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room_no']['index']];?>
"><?php echo $_smarty_tpl->getVariable('room_no')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room_no']['index']];?>
</option>
									<?php endfor; endif; ?>
										</select>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>From Date</strong>									
										<input class="form-control" name="from_date"  id="datepicker3" value="<?php echo $_smarty_tpl->getVariable('from_date')->value;?>
" required placeholder="From Date">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>To Date</strong>									
										<input class="form-control" name="to_date"  id="datepicker4" value="<?php echo $_smarty_tpl->getVariable('to_date')->value;?>
" required placeholder="To Date">
								</div>                                
							</div>
			
							
				 <div class="row">
					<div class="col-lg-6">
						<button type="submit" name="ok" value="Save" class="btn btn-block btn-success btn-lg">Save</button>
					</div>
					<div class="col-lg-6">
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
        <div class="col-xs-12">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 list_booking(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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


<script>
  $(function () {
   
    $('#datepicker3').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>

<script>
  $(function () {
   
    $('#datepicker4').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>

	
		<script>
			 $(function () {
				 $("#example1").DataTable();
			 });
		</script>
	

