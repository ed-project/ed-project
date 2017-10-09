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
								<a href="/admin/news/add"><img src="/public/admin/images/icons/plus.png" alt="Добавить новость" />Добавить новость</a> 
								<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
								<a href="/admin/categories/index/news"><img src="/public/admin/images/icons/window.png" alt="Категории" />Категории</a>
							</div>

						<table class="table table-striped table-bordered">
							<tr>
								<th width="50"><div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div></th>
				                <th width="100">ID</th>
				                <th>Название</th>
						<th>Категория</th>
				                <th width="250">Краткое описание</th>
				                <th>Дата</th>
				                <th>Действия</th>
				              </tr>
				            {if $newslist !== false}
								{foreach from=$newslist item=$news}
								<tr>
									<td><div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="{$news.id}" /><label class="lbl"></label></div></td>
									<td>#{$news.id}</td>
									<td>{$news.title}</td>
									<td>{$news.category_title}</td>
									<td>{$news.description|strip_tags:false}</td>
									<td>{$news.add_date}</td>
									<td>
										<a href="/admin/news/edit/{$news.id}"><img src="/public/admin/images/icons/edit.png" alt="Редактировать" /></a>
										<a href="javascript:" class="deletelink" data-id="{$news.id}"><img src="/public/admin/images/icons/remove.png" alt="Удалить новость" /></a>
									</td>
								</tr>
								{/foreach}
							{else}
							<tr>
								<td colspan="8">
									Новости отсутствуют. <a href="/admin/news/add">Добавить новость</a>
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
					if( confirm("Удалить данную новость?") ) {
						location.href = "/admin/news/delete/" + $(this).data("id");
					}
				})


				$("#alldeletelink").click(function() {
					if( confirm("Удалить выбранные элементы?") ) {
						location.href = "/admin/news/delete/" + selected;
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
