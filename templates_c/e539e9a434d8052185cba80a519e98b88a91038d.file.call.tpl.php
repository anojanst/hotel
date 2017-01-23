<?php /* Smarty version Smarty-3.0.8, created on 2017-01-20 06:50:28
         compiled from "./templates/call/call.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18128594535881a524a5ce16-87367303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e539e9a434d8052185cba80a519e98b88a91038d' => 
    array (
      0 => './templates/call/call.tpl',
      1 => 1483610787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18128594535881a524a5ce16-87367303',
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
					<form name="call_form" role="form" action="call.php?job=save" method="post">
			  
						
							<div class="row" style="margin-bottom: 10px; margin-left: 20px;">

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Telephone Number</strong>									
										<input class="form-control" type="text" name="telephone_num" value="<?php echo $_smarty_tpl->getVariable('telephone_num')->value;?>
" required placeholder="Telephone Number">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Asked Date</strong>									
										<input class="form-control" name="asked_date"  id="datepicker1" value="<?php echo $_smarty_tpl->getVariable('asked_date')->value;?>
" required placeholder="Asked Date">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Remarks</strong>									
										<textarea class="form-control" name="remarks" value="<?php echo $_smarty_tpl->getVariable('remarks')->value;?>
"  placeholder="Remarks"> <?php echo $_smarty_tpl->getVariable('remarks')->value;?>
</textarea>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Caller Name</strong>									
										<input class="form-control" name="caller_name" value="<?php echo $_smarty_tpl->getVariable('caller_name')->value;?>
" required placeholder="Caller Name">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Address</strong>									
										<textarea class="form-control" name="address" value="<?php echo $_smarty_tpl->getVariable('address')->value;?>
" required placeholder="Address"> <?php echo $_smarty_tpl->getVariable('address')->value;?>
</textarea>
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>District</strong>									
										<input class="form-control" name="district" value="<?php echo $_smarty_tpl->getVariable('district')->value;?>
"  placeholder="District">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Country</strong>									
										<input class="form-control" name="country" value="<?php echo $_smarty_tpl->getVariable('country')->value;?>
"  placeholder="Country">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Email</strong>									
										<input class="form-control" name="email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" required placeholder="Email">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Referel</strong>									
										<input class="form-control" name="referel" value="<?php echo $_smarty_tpl->getVariable('referel')->value;?>
"  placeholder="Referel ">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Date of Birth</strong>									
										<input class="form-control" id="datepicker2" name="dob" value="<?php echo $_smarty_tpl->getVariable('dob')->value;?>
" required placeholder="Date of Birth ">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>NIC</strong>									
										<input class="form-control" name="nic" value="<?php echo $_smarty_tpl->getVariable('nic')->value;?>
" required placeholder="NIC">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
										<strong>Passport</strong>									
										<input class="form-control" name="passport" value="<?php echo $_smarty_tpl->getVariable('passport')->value;?>
"  placeholder="Passport">
								</div>                                
							</div>

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-12">
									<strong>Room Type</strong>

									<select class="form-control"  name="room_cat"  placeholder="room" >
										<?php if ($_smarty_tpl->getVariable('room')->value){?>
											<option value="<?php echo $_smarty_tpl->getVariable('room')->value;?>
"><?php echo $_smarty_tpl->getVariable('room')->value;?>
</option>
										<?php }else{ ?>
											<option value="" disabled selected> Room </option>
										<?php }?>
										<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['room']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['name'] = 'room';
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('room_names')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['room']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['room']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['room']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['room']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['room']['total']);
?>
											<option  value="<?php echo $_smarty_tpl->getVariable('room_names')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room']['index']];?>
" ><?php echo $_smarty_tpl->getVariable('room_names')->value[$_smarty_tpl->getVariable('smarty')->value['section']['room']['index']];?>
</option>
										<?php endfor; endif; ?>
									</select>
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
 list_call(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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
   
    $('#datepicker1').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>

<script>
  $(function () {
   
    $('#datepicker2').datepicker({
     format: 'yyyy-mm-dd',
      autoclose: true
    });
 });
</script>
	
<script>
	$(function () {
	$("#example2").DataTable();
	});
</script>



