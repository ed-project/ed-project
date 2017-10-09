<?php
/* Smarty version 3.1.30, created on 2017-10-09 00:32:40
  from "/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da997858dde5_58219519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e69a949104547ef2330b3488df517ca09ee68a86' => 
    array (
      0 => '/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/main.tpl',
      1 => 1507485407,
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
function content_59da997858dde5_58219519 (Smarty_Internal_Template $_smarty_tpl) {
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

						
						<div class="page-header">
							<h1>Привет, <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
!</h1>
						</div>

						<div class="row">
							<div class="col-md-12">
								<ul>
									<li><b>Сайт:</b> <?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
</li>
									<li><b>Серверное время:</b> <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</li>
									<li><b>Ваш IP:</b> <?php echo $_smarty_tpl->tpl_vars['ip']->value;?>
</li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>

			<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>

	</body>
</html>
<?php }
}
