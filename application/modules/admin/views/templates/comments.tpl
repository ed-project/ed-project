<!DOCTYPE html>
<html>

<head>
	<title>{$modulename} | Панель управления</title>
	{include file="generalscript.tpl"}
</head>

<body class="no-skin">
	{include file="navbar.tpl"}

	<div class="main-container ace-save-state" id="main-container">

		{include file="sidebar.tpl"}

		<div class="main-content">
			<div class="main-content-inner">
				{include file="breadcrumbs.tpl"}

				<div class="page-content">
					{include file="settings.tpl"}

					<div class="page-header">
						<h1>{$modulename}</h1>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<a href="/admin/comments/add"><img src="/public/admin/images/icons/plus.png" alt="Добавить комментарий" />Добавить комментарий</a>
							<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
							<a href="javascript:" id="allmoderatelink"><img src="/public/admin/images/icons/eye.png" alt="Промодерировать выделенное" />Промодерировать выделенное</a>
						</div>

						<table class="table table-striped table-bordered">
							<tr>
								<th width="50px">
									<div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div>
								</th>
								<th width="100px">ID</th>
								<th width="200">Модуль</th>
								<th width="150">Пользователь</th>
								<th>Комментарий</th>
								<th width="36">Статус</th>
								<th>Действия</th>
							</tr>
							{if $commentslist !== false} {foreach from=$commentslist item=$comment}
							<tr>
								<td>
									<div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="{$comment.id}" /><label class="lbl"></label></div>
								</td>
								<td>#{$comment.id}</td>
								<td>{$comment.module}</td>
								<td>{if $comment.userid == null}Админ{else}{if $comment.network == ""}{$comment.nickname}{else}{$comment.first_name} {$comment.last_name}{/if}{/if}</td>
								<td>{$comment.comment}</td>
								<td>
									<img src="/public/admin/images/{$comment.moderate}.png" alt="Статус">
								</td>
								<td>
									<a href="/admin/comments/edit/{$comment.id}"><img src="/public/admin/images/icons/edit.png" alt="Редактировать" /></a>
									<a href="javascript:" class="deletelink" data-id="{$comment.id}"><img src="/public/admin/images/icons/remove.png" alt="Удалить заявку" /></a>
									<a href="/admin/comments/moderate/{$comment.id}">{if $comment.moderate == 0}<img src="/public/admin/images/icons/confirm.png" alt="Подтвердить комментарий" />{else}<img src="/public/admin/images/icons/error.png" alt="Отменить подтверждение комментария" />{/if}</a>
								</td>
							</tr>
							{/foreach} {else}
							<tr>
								<td colspan="8">
									Комментарии отсутствуют. <a href="/admin/comments/add">Добавить комментарий</a>
								</td>
							</tr>
							{/if}
						</table>

					</div>
					{$pagination}
				</div>

			</div>
		</div>

		{include file="footer.tpl"}

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div>

	<script>
		$(document).ready(function() {

			var selected;
			$(".rowselect").click(function() {
				selected = "";
				$.each($(".rowselect"), function() {
					if ($(this).prop("checked") == true) selected += $(this).data("id") + "-";
				});
				selected = selected.substring(0, selected.length - 1);
			})

			$(".deletelink").click(function() {
				if (confirm("Удалить данный коментарий?")) {
					location.href = "/admin/comments/delete/" + $(this).data("id");
				}
			})


			$("#alldeletelink").click(function() {
				if (confirm("Удалить выбранные элементы?")) {
					location.href = "/admin/comments/delete/" + selected;
				}
			})
			
			$("#allmoderatelink").click(function() {
				if (confirm("Промодерировать выбранные элементы?")) {
					location.href = "/admin/comments/moderate/" + selected;
				}
			})

			$(".allselect").click(function() {
				$(".rowselect").prop("checked", $(".allselect").prop("checked"));
				selected = "";
				$.each($(".rowselect"), function() {
					if ($(this).prop("checked") == true) selected += $(this).data("id") + "-";
				});
				selected = selected.substring(0, selected.length - 1);
			})

		})
	</script>

</body>

</html>