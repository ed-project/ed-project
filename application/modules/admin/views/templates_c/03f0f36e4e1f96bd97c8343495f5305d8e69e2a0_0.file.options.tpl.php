<?php
/* Smarty version 3.1.30, created on 2017-10-08 20:45:15
  from "D:\OpenServer\domains\landing2\application\modules\admin\views\templates\options.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da642bd870f3_20499975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03f0f36e4e1f96bd97c8343495f5305d8e69e2a0' => 
    array (
      0 => 'D:\\OpenServer\\domains\\landing2\\application\\modules\\admin\\views\\templates\\options.tpl',
      1 => 1505851614,
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
function content_59da642bd870f3_20499975 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
	<title><?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
 | Панель управления</title>
	<?php $_smarty_tpl->_subTemplateRender("file:generalscript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<link rel="stylesheet" href="/public/admin/css/chosen.min.css" />
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

					<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
					<div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
">
						<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

					</div>
					<?php }?>

					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Ключ для CRON</td>
										<td><input type="text" class="form-control" name="cronkey" value="<?php echo $_smarty_tpl->tpl_vars['cronkey']->value;?>
" /></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Ключ для AJAX</td>
										<td><input type="text" class="form-control" name="ajaxkey" value="<?php echo $_smarty_tpl->tpl_vars['ajaxkey']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Хост SMTP</td>
										<td><input type="text" class="form-control" name="smtp_host" value="<?php echo $_smarty_tpl->tpl_vars['smtp_host']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Порт SMTP</td>
										<td><input type="text" class="form-control" name="smtp_port" value="<?php echo $_smarty_tpl->tpl_vars['smtp_port']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Логин SMTP</td>
										<td><input type="text" class="form-control" name="smtp_user" value="<?php echo $_smarty_tpl->tpl_vars['smtp_user']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Пароль SMTP</td>
										<td><input type="password" class="form-control" name="smtp_pass" value="<?php echo $_smarty_tpl->tpl_vars['smtp_pass']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Тип почты SMTP</td>
										<td><input type="text" class="form-control" name="smtp_mailtype" value="<?php echo $_smarty_tpl->tpl_vars['smtp_mailtype']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Кодировка SMTP</td>
										<td><input type="text" class="form-control" name="smtp_charset" value="<?php echo $_smarty_tpl->tpl_vars['smtp_charset']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Имя пользователя SMTP</td>
										<td><input type="text" class="form-control" name="smtp_fromname" value="<?php echo $_smarty_tpl->tpl_vars['smtp_fromname']->value;?>
" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Папка для хранения загружаемых пользователями файлов</td>
										<td><input type="text" class="form-control" name="mainfiles_folder" value="<?php echo $_smarty_tpl->tpl_vars['mainfiles_folder']->value;?>
" /></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Название сайта</td>
										<td><input type="text" class="form-control" name="sitename" value="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
" /></td>
									</tr>
								</table>
							</div>		
						</div>
						<hr>
						<button type="submit" class="btn btn-primary">Сохранить</button>
					</form>

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

</html><?php }
}
