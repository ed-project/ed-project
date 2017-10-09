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
								<input type="text" class="form-control col-xs-10 col-sm-5" id="translit" name="title" value="{$title}" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Алиас</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" id="alias" name="alias" value="{$alias}" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">meta-keywords</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="metakeywords" value="{$metakeywords}" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">meta-description</label>
							<div class="col-sm-9">
								<input type="text" class="form-control col-xs-10 col-sm-5" name="metadescription" value="{$metadescription}" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Полный текст</label>
							<div class="col-sm-9">
								<textarea class="form-control col-xs-10 col-sm-5 ckeditor" name="content">{$content}</textarea>
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
	<script src="/public/admin/js/adminform.js"></script>
	<script src="/public/admin/js/ckeditor/ckeditor.js"></script>
	<script src="/public/admin/js/jquery.liTranslit.js"></script>
	<script>
		$(document).ready(function() {
			$(function(){
			  $('#translit').liTranslit({
				  elAlias: $("#alias")
			  });
			})
		})
	</script>

</body>

</html>