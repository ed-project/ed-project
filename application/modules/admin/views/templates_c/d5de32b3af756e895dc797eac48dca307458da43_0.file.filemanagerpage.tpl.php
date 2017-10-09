<?php
/* Smarty version 3.1.30, created on 2017-10-09 00:32:51
  from "/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/filemanagerpage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da998300fa37_51116056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5de32b3af756e895dc797eac48dca307458da43' => 
    array (
      0 => '/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/filemanagerpage.tpl',
      1 => 1507485406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:generalscript.tpl' => 1,
    'file:navbar.tpl' => 1,
    'file:sidebar.tpl' => 1,
    'file:breadcrumbs.tpl' => 1,
    'file:settings.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_59da998300fa37_51116056 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
 | Панель управления</title>
		<?php $_smarty_tpl->_subTemplateRender("file:generalscript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<?php echo '<script'; ?>
 src="/public/admin/js/Chart.min.js"><?php echo '</script'; ?>
>
	</head>

	<body class="no-skin">
		<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


		<div class="main-container ace-save-state" id="main-container">

			<?php $_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			<div class="main-content">
				<div class="main-content-inner">
					<?php $_smarty_tpl->_subTemplateRender("file:breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


					<div class="page-content">
						<?php $_smarty_tpl->_subTemplateRender("file:settings.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

						
						 <iframe id="frame" src="/admin/filemanager" width="100%" frameborder="0">
						    Ваш браузер не поддерживает плавающие фреймы!
						 </iframe>

					</div>
				</div>
			</div>

			<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
			
		<?php echo '<script'; ?>
>
			$(document).ready(function() {
			   function resizeFrame() {
			        $("#frame").css({
				    "height": window.innerHeight - $(".footer-content").height() * 2 - 150
				});
			   }
			   resizeFrame();
			   $(window).resize(function() {
				resizeFrame();
			   })
			})
		<?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
