<?php /* Smarty version Smarty-3.0.8, created on 2017-01-20 11:18:18
         compiled from "./templates/user_home/user_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13018375675881a4a27803d2-46255789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bcad81bef12e712af583b7b24b1d62d9faf7ae6' => 
    array (
      0 => './templates/user_home/user_home.tpl',
      1 => 1484808072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13018375675881a4a27803d2-46255789',
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
    <!-- Main content -->
<section class="content">

<div class="col-lg-6 col-xs-12">

		<div class="box box-danger box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-building"></i>
              		<h3 class="box-title">Available Rooms</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

			<div class="box-body">
				<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
list_available_rooms_in_home();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				<a href="room.php?job=room_grid_view"> <button type="button" class="btn btn-block btn-success" "> View All Rooms</button> </a>
			</div>
 	     
       </div>
	</div>

<div class="col-lg-3 col-xs-12"> 
		<div class="box box-muted box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-phone"></i>
              		<h3 class="box-title">Calls</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

		<div class="box-body">
			<h5>Total Calls <small class="label pull-right bg-aqua">10</small></h5>
			<h4>Room Inquiry<small class="label pull-right bg-red">6</small></h4>
			<h4>Booking Confirmation<small class="label pull-right bg-yellow">2</small></h4>
			<h4><small class="label pull-right bg-green">1</small></h4>
			<h4>Under Maintainance <small class="label pull-right bg-navy">1</small></h4>
			<a href="call.php"> <button type="button" class="btn btn-block btn-success" "> New call</button> </a>
		</div>
       
          </div>
	</div>

	<div class="col-lg-3 col-xs-12">
		<div class="box box-info box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-bar-chart"></i>
              		<h3 class="box-title">Quick Stats</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

		<div class="box-body">
			<h4>Total Rooms <small class="label pull-right bg-aqua">10</small></h4>
			<h4>Occupied <small class="label pull-right bg-red">6</small></h4>
			<h4>Booked <small class="label pull-right bg-yellow">2</small></h4>
			<h4>Vacant <small class="label pull-right bg-green">1</small></h4>
			<h4>Under Maintainance <small class="label pull-right bg-navy">1</small></h4>
		</div>
       
          </div>
	</div>
	
 
		
  		<div class="control-sidebar-bg"></div>
	</div>
</section>
 
</body>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

