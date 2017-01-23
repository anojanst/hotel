<?php /* Smarty version Smarty-3.0.8, created on 2017-01-23 10:51:04
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1812282319588592c01d6c87-27369298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1484808072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1812282319588592c01d6c87-27369298',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	
	<div id="adbox" style="height: 400px;">
		<div style="margin-top: 80px; padding-top: 10px; width: 300px; height: 200px; background: #FBFBF0; border-radius: 1px; box-shadow: 0px 0px 0px 8px rgba(0,0,0,0.3); z-index: 9; font-family: arial;"> 
			<form name="login" action="login.php?job=login" method="post" class="login">
				<br />
				<center><input type="text" name="user_name" value="<?php echo $_smarty_tpl->getVariable('user_name')->value;?>
"required placeholder="Username"/></center>
				<center><input type="password" name="password" value="<?php echo $_smarty_tpl->getVariable('password')->value;?>
" required placeholder="Password"/></center><br />
				<center><input type="submit" name="ok" value="Login" /></center><br />
				<center>
										<a href='forget.php'>Forget Password</a>
					
				</center><br />
			</form>
		</div>
	</div>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("user_footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>