<?php /* Smarty version Smarty-3.0.8, created on 2017-01-19 12:37:24
         compiled from "./templates/user_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1476742452588065ac65d615-11417980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cf5e8d39d476e8b3632ca0d905a0b2608a76976' => 
    array (
      0 => './templates/user_footer.tpl',
      1 => 1484653726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1476742452588065ac65d615-11417980',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/app.min.js"></script>
<script src="js/demo.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.inputmask.js"></script>
<script src="js/jquery.inputmask.date.extensions.js"></script>
<script src="js/jquery.inputmask.extensions.js"></script>
<script src="js/select2.full.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/fileinput.min.js"></script>

<script>
	$(function() {
	
		$("#room_cat").change(function() {
		  $("#room_no").load("ajax/room_by_category.php?choice=" + encodeURIComponent($("#room_cat").val()));
					
		});
	});
</script>
