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
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Изображение записи</label>
							<div class="col-sm-9">
								<div class="input-group">
									<input class="form-control input-mask-date" name="image" type="text" id="fmlink" value="{$data.image}" />
									<span class="input-group-btn"><button class="btn btn-sm btn-default" type="button" id="fmimagebutton">Обзор</button></span>
								</div>

							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Заголовок</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="title" value="{$data.title}" />
							</div>
						</div>
							
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Надпись</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="caption" value="{$data.caption}" />
							</div>
						</div>
							
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ссылка</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="link" value="{$data.link}" />
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