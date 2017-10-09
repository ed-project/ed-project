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
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Название</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="title" value="{$data.title}" />
							</div>
						</div>
							
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Модуль</label>
							<div class="col-sm-9">
							    <select name="module" class="chosen form-control">
								<option value="news" selected=""{if $data.category_title == "news"} selected{/if}>Новости сайта</option>
							    </select>
							</div>
						</div>
							
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">SEO ключевые слова (через запятую)</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="seokeywords" value="{$data.seokeywords}" />
							</div>
						</div>
							
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">SEO Описание</label>
							<div class="col-sm-9">
								<textarea class="form-control col-xs-10 col-sm-5 ckeditor" name="seodescription">{$data.seodescription}</textarea>
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