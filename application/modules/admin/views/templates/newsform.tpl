<!DOCTYPE html>
<html>

<head>
	<title>{$modulename} | Панель управления</title>
	{include file="generalscript.tpl"}
	<link rel="stylesheet" href="/public/admin/css/chosen.min.css" />
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

					{if $message}
					<div class="alert alert-{$status}">
						{$message}
					</div>
					{/if}

					<form class="form-horizontal" method="post">

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Заголовок</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="title" value="{$data.title}" />
							</div>
						</div>
							
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Категория</label>
							<div class="col-sm-9">
							    <select class="chosen form-control" name="category">
								<option value="NULL"{if $data.category_id == null} selected{/if}>Без категории</option>
								{foreach from=$categories item=cat}
								<option value="{$cat.id}"{if $data.category_id == $cat.id} selected{/if}>{$cat.title}</option>
								{/foreach}
							    </select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Краткое описание</label>
							<div class="col-sm-9">
								<textarea class="form-control col-xs-10 col-sm-5 ckeditor" name="description">{$data.description}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Полный текст</label>
							<div class="col-sm-9">
								<textarea class="form-control col-xs-10 col-sm-5 ckeditor" name="content">{$data.content}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Дата</label>
							<div class="col-sm-9">
								<input type="datetime-local" class="form-control col-xs-10 col-sm-5" name="add_date" value="{if {$data.add_date} == ''}{$today}{else}{$data.add_date}{/if}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Изображение записи</label>
							<div class="col-sm-9">
								<div class="input-group">
									<input class="form-control input-mask-date" name="image" type="text" id="fmlink" value="{$data.image}" />
									<span class="input-group-btn"><button class="btn btn-sm btn-default" type="button" id="fmimagebutton">Обзор</button></span>
								</div>

							</div>
						</div>

						<button type="submit" class="btn btn-primary">Сохранить</button>
					</form>

				</div>
			</div>
		</div>

		{include file="footer.tpl"}

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div>

	<script src="/public/admin/js/chosen.jquery.min.js"></script>
	<script src="/public/admin/js/ckeditor/ckeditor.js"></script>
	<script src="/public/admin/js/adminform.js"></script>

</body>

</html>