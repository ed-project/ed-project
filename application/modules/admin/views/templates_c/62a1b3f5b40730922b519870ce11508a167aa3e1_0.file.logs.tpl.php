<?php
/* Smarty version 3.1.30, created on 2017-10-08 18:16:08
  from "D:\OpenServer\domains\landing2\application\modules\admin\views\templates\logs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da413881a4b2_23578678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62a1b3f5b40730922b519870ce11508a167aa3e1' => 
    array (
      0 => 'D:\\OpenServer\\domains\\landing2\\application\\modules\\admin\\views\\templates\\logs.tpl',
      1 => 1505909098,
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
function content_59da413881a4b2_23578678 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
 | Панель управления</title>
		<?php $_smarty_tpl->_subTemplateRender("file:generalscript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
							<h1><?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
</h1>
						</div>

						<div class="panel panel-default">
						    <div class="panel-body">
							Последние <?php echo $_smarty_tpl->tpl_vars['logcount']->value;?>
 посещений сайта
						    </div>
						</div>
						
						<table class="table table-striped">
						    <tr>
						     <td width="100"><b>Время, дата</b></td>
						     <td width="200"><b>Кто посещал</b></td>
						     <td width="100"><b>IP, прокси</b></td>
						     <td width="280"><b>Посещенный URL</b></td>
						    </tr>
						    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logs']->value, 'log');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['log']->value) {
?>
							<tr>
							    <td><?php echo $_smarty_tpl->tpl_vars['log']->value[0];?>
</td>
							    <td><?php echo $_smarty_tpl->tpl_vars['log']->value[1];?>
</td>
							    <td><?php echo $_smarty_tpl->tpl_vars['log']->value[2];?>
</td>
							    <td><?php echo $_smarty_tpl->tpl_vars['log']->value[3];?>
</td>
							</tr>
						    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</table>
						
						<br>Просмотреть последние <a href="/admin/logs/100">100</a> <a href="/admin/logs/500">500</a> <a href="/admin/logs/1000">1000</a> посещений.<br>
						Посмотреть <a href="/admin/logs/<?php echo $_smarty_tpl->tpl_vars['all_logscount']->value;?>
">Все посещения</a>
						
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
