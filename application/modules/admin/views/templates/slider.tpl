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
							<a href="/admin/slider/add"><img src="/public/admin/images/icons/plus.png" alt="Добавить слайд" />Добавить слайд</a>
							<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
						</div>

						<table class="table table-striped table-bordered">
							<tr>
								<th width="50">
									<div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div>
								</th>
								<th width="100">ID</th>
								<th width="200">Изображение</th>
								<th>Содержимое</th>
								<th width="150">Действия</th>
							</tr>
							{if $sliderlist !== false} {foreach from=$sliderlist item=$slider}
							<tr>
								<td>
									<div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="{$slider.id}" /><label class="lbl"></label></div>
								</td>
								<td>#{$slider.id}</td>
								<td><img src="{$slider.image}" width="200px" alt ="" /></td>
								<td>
									<a href="{if $slider.link !== ""}{$slider.link}{else}#{/if}" target="#blank">{if $slider.title !== ""}<b>{$slider.title}</b>{else}<b>Без заголовка</b>{/if}</a>
									{if $slider.caption !== ""}<br>{$slider.caption}{/if}
								</td>
								<td>
									<a href="/admin/slider/edit/{$slider.id}"><img src="/public/admin/images/icons/edit.png" alt="Редактировать" /></a>
									<a href="javascript:" class="deletelink" data-id="{$slider.id}"><img src="/public/admin/images/icons/remove.png" alt="Удалить слайд" /></a>
								</td>
							</tr>
							{/foreach} {else}
							<tr>
								<td colspan="8">
									Слайды отсутствуют. <a href="/admin/slider/add">Добавить слайд</a>
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
				if (confirm("Удалить данный слайд?")) {
					location.href = "/admin/slider/delete/" + $(this).data("id");
				}
			})


			$("#alldeletelink").click(function() {
				if (confirm("Удалить выбранные элементы?")) {
					location.href = "/admin/slider/delete/" + selected;
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