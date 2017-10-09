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
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">ID материала</label>
							<div class="col-sm-9">
								<input type="number" min="1" class="form-control col-xs-10 col-sm-5" name="siteid" value="{if {$siteid} == ''}0{else}{$siteid}{/if}" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Модуль</label>
							<div class="col-sm-9">
								<select name="module" class="chosen form-control">
									<option value="news">Новости сайта</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">ID Пользователя</label>
							<div class="col-sm-9">
								<input type="number" min="0" class="form-control col-xs-10 col-sm-5" name="userid" value="{if {$userid} == ''}0{else}{$userid}{/if}" /><span class="label label-info">Установите 0, если хотите написать от имени администратора</span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Дата</label>
							<div class="col-sm-9">
								<input type="datetime-local" class="form-control col-xs-10 col-sm-5" name="add_date" value="{if {$add_date} == ''}{$today}{else}{$add_date}{/if}" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Модерирование комментария</label>
							<div class="col-sm-9">
								<input type="checkbox" class="form-control col-xs-10 col-sm-5" name="moderate" value="1"{if {$moderate} == 1} checked{/if} />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Комментарий</label>
							<div class="col-sm-9">
								<textarea class="form-control col-xs-10 col-sm-5 ckeditor" name="comment">{$comment}</textarea>
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