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
								<a href="/admin/users/add"><img src="/public/admin/images/icons/plus.png" alt="Добавить админ-аккаунт" />Добавить пользователя</a> 
								<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
							</div>

						<table class="table table-striped table-bordered">
							<tr>
								<th width="50"><div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div></th>
				                <th width="100">ID</th>
				                <th>Имя (никнейм)</th>
				                <th>E-Mail</th>
				                <th>Соц. сеть</th>
				                <th>Страна</th>
				                <th>Действия</th>
				              </tr>
				            {if $userslist !== false}
								{foreach from=$userslist item=$user}
								<tr>
									<td><div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="{$user.id}" /><label class="lbl"></label></div></td>
									<td>#{$user.id}</td>
									<td>
										{if $user.network == ""}{$user.nickname}{else}{$user.first_name} {$user.last_name}{/if}
									</td>
									<td>{$user.email}</td>
									<td>{$user.network}</td>
									<td>{$user.country}</td>
									<td>
										<a href="/admin/users/edit/{$user.id}"><img src="/public/admin/images/icons/edit.png" alt="Редактировать" /></a>
										<a href="javascript:" class="deletelink" data-id="{$user.id}"><img src="/public/admin/images/icons/remove.png" alt="Удалить пользователя" /></a>
									</td>
								</tr>
								{/foreach}
							{else}
							<tr>
								<td colspan="8">
									Пользователи отсутствуют. <a href="/admin/users/add">Добавить пользователя</a>
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
					$.each( $(".rowselect"), function() {
						if( $(this).prop("checked") == true ) selected += $(this).data("id") + "-";
					});
					selected = selected.substring( 0, selected.length - 1 );
				})

				$(".deletelink").click(function() {
					if( confirm("Удалить данного пользователя?") ) {
						location.href = "/admin/users/delete/" + $(this).data("id");
					}
				})


				$("#alldeletelink").click(function() {
					if( confirm("Удалить выбранные элементы?") ) {
						location.href = "/admin/users/delete/" + selected;
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

			})
		</script>

	</body>
</html>
