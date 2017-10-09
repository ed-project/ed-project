<?php
/* Smarty version 3.1.30, created on 2017-10-08 18:14:59
  from "D:\OpenServer\domains\landing2\application\modules\admin\views\templates\feedback.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da40f3eef8b0_54987147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc2dabaf8bbeedd84f6d836d9dcab537489f9bb9' => 
    array (
      0 => 'D:\\OpenServer\\domains\\landing2\\application\\modules\\admin\\views\\templates\\feedback.tpl',
      1 => 1505564129,
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
function content_59da40f3eef8b0_54987147 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['module']->value;?>
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
								<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
							</div>

						<table class="table table-striped table-bordered">
							<tr>
							    <th width="50"><div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div></th>
							    <th width="100">ID</th>
							    <th>Имя</th>
							    <th width="250">Телефон</th>
							    <th>E-Mail</th>
							    <th>Действия</th>
						      </tr>
				            <?php if ($_smarty_tpl->tpl_vars['feedbacklist']->value !== false) {?>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['feedbacklist']->value, 'feed');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feed']->value) {
?>
								<tr>
									<td><div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="<?php echo $_smarty_tpl->tpl_vars['feed']->value['id'];?>
" /><label class="lbl"></label></div></td>
									<td>#<?php echo $_smarty_tpl->tpl_vars['feed']->value['id'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['feed']->value['name'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['feed']->value['phone'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['feed']->value['email'];?>
</td>
									<td>
										<div class="hidden" id="message-<?php echo $_smarty_tpl->tpl_vars['feed']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['feed']->value['message'];?>
</div>
										<button class="btn btn-primary btn-sm readbtn" data-object="#message-<?php echo $_smarty_tpl->tpl_vars['feed']->value['id'];?>
">Читать</button>
										<a href="javascript:" class="deletelink" data-id="<?php echo $_smarty_tpl->tpl_vars['feed']->value['id'];?>
"><img src="/public/admin/images/icons/remove.png" alt="Удалить сообщение" /></a>
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
									Сообщения отсутствуют.
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
			
			<div id="readdialog" class="dialog" title="Сообщение"><span id="text"></span></div>

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
					if( confirm("Удалить данное сообщение?") ) {
						location.href = "/admin/feedback/delete/" + $(this).data("id");
					}
				})


				$("#alldeletelink").click(function() {
					if( confirm("Удалить выбранные элементы?") ) {
						location.href = "/admin/feedback/delete/" + selected;
					}
				})

				$(".allselect").click(function() {
					selected = "";
					$(".rowselect").prop("checked", $(".allselect").prop( "checked" ) );
					$.each($(".rowselect"), function() {
						if ($(this).prop("checked") == true) selected += $(this).data("id") + "-";
					});
					selected = selected.substring(0, selected.length - 1);
				})
				
				$("#readdialog").dialog({
				    autoOpen: false,
				    show: {
					effect: "fade",
					duration: 300
				    },
				    hide: {
					effect: "fade",
					duration: 300
				    }
				});
				
				$(".readbtn").click(function() {
				    $("#readdialog #text").html($($(this).data("object")).html());
				    $("#readdialog").dialog("open");
				});

			})
		<?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
