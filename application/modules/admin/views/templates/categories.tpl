<!DOCTYPE html>
<html>
	<head>
		<title>{$modulename} {$module} | Панель управления</title>
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
						    <h1>{$modulename} <span class="badge">{$module}</span></h1>
						</div>

						<div class="panel panel-default">
							<div class="panel-body">
								<a href="/admin/categories/add"><img src="/public/admin/images/icons/plus.png" alt="Добавить категорию" />Добавить категорию</a> 
								<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
							</div>

						<table class="table table-striped table-bordered">
							<tr>
							    <th width="50"><div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div></th>
							    <th width="100">ID</th>
							    <th>Название</th>
							    <th width="250">Краткое описание</th>
							    <th>Дата</th>
							    <th>Действия</th>
						      </tr>
				            {if $categorieslist !== false}
								{foreach from=$categorieslist item=$cat}
								<tr>
									<td><div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="{$cat.id}" /><label class="lbl"></label></div></td>
									<td>#{$cat.id}</td>
									<td>{$cat.title}</td>
									<td>{$cat.seodescription}</td>
									<td>{$cat.seokeywords}</td>
									<td>
										<a href="/admin/categories/edit/{$cat.id}"><img src="/public/admin/images/icons/edit.png" alt="Редактировать категорию" /></a>
										<a href="javascript:" class="deletelink" data-id="{$cat.id}"><img src="/public/admin/images/icons/remove.png" alt="Удалить категорию" /></a>
									</td>
								</tr>
								{/foreach}
							{else}
							<tr>
								<td colspan="8">
									Категории отсутствуют. <a href="/admin/categories/add">Добавить категорию</a>
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
					if( confirm("Удалить данную категорию?") ) {
						location.href = "/admin/categories/delete/" + $(this).data("id");
					}
				})


				$("#alldeletelink").click(function() {
					if( confirm("Удалить выбранные элементы?") ) {
						location.href = "/admin/categories/delete/" + selected;
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
