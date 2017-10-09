<?php
/* Smarty version 3.1.30, created on 2017-10-09 00:32:56
  from "/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/adminaccounts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da99889a3049_04522813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2709eb59ff08e048ec4054b8a27abec8df78f4e1' => 
    array (
      0 => '/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/adminaccounts.tpl',
      1 => 1507485404,
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
function content_59da99889a3049_04522813 (Smarty_Internal_Template $_smarty_tpl) {
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
								<a href="/admin/adminaccounts/add"><img src="/public/admin/images/icons/plus.png" alt="Добавить админ-аккаунт" />Добавить админ-аккаунт</a> 
								<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
							</div>

						<table class="table table-striped table-bordered">
							<tr>
								<th width="50px"><div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div></th>
				                <th width="100px">ID</th>
				                <th>Логин</th>
				                <th>Действия</th>
				              </tr>
				            <?php if ($_smarty_tpl->tpl_vars['adminaccountslist']->value !== false) {?>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['adminaccountslist']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
								<tr>
									<td><div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" /><label class="lbl"></label></div></td>
									<td>#<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['password'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['salt'];?>
</td>
									<td>
										<a href="/admin/adminaccounts/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><img src="/public/admin/images/icons/edit.png" alt="Редактировать" /></a>
										<a href="javascript:" class="deletelink" data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><img src="/public/admin/images/icons/remove.png" alt="Удалить админ-аккаунт" /></a>
									</td>
								</tr>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							<?php } else { ?>
							<tr>
								<td colspan="8">
									Пользователи отсутствуют
								</td>
							</tr>
							<?php }?>
						</table>

					</div>
					<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

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

				var selected;
				$(".rowselect").click(function() {
					selected = "";
					$.each( $(".rowselect"), function() {
						if( $(this).prop("checked") == true ) selected += $(this).data("id") + "-";
					});
					selected = selected.substring( 0, selected.length - 1 );
				})

				$(".deletelink").click(function() {
					if( confirm("Удалить данную игру?") ) {
						location.href = "/admin/adminaccounts/delete/" + $(this).data("id");
					}
				})


				$("#alldeletelink").click(function() {
					if( confirm("Удалить выбранные элементы?") ) {
						location.href = "/admin/adminaccounts/delete/" + selected;
					}
				})

				$(".allselect").click(function() {
					$(".rowselect").prop("checked", $(".allselect").prop( "checked" ) );
				})

			})
		<?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
