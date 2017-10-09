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

					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Ключ для CRON</td>
										<td><input type="text" class="form-control" name="cronkey" value="{$cronkey}" /></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Ключ для AJAX</td>
										<td><input type="text" class="form-control" name="ajaxkey" value="{$ajaxkey}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Хост SMTP</td>
										<td><input type="text" class="form-control" name="smtp_host" value="{$smtp_host}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Порт SMTP</td>
										<td><input type="text" class="form-control" name="smtp_port" value="{$smtp_port}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Логин SMTP</td>
										<td><input type="text" class="form-control" name="smtp_user" value="{$smtp_user}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Пароль SMTP</td>
										<td><input type="password" class="form-control" name="smtp_pass" value="{$smtp_pass}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Тип почты SMTP</td>
										<td><input type="text" class="form-control" name="smtp_mailtype" value="{$smtp_mailtype}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Кодировка SMTP</td>
										<td><input type="text" class="form-control" name="smtp_charset" value="{$smtp_charset}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Имя пользователя SMTP</td>
										<td><input type="text" class="form-control" name="smtp_fromname" value="{$smtp_fromname}" /></td>
									</tr>
								</table>
							</div>
									
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Папка для хранения загружаемых пользователями файлов</td>
										<td><input type="text" class="form-control" name="mainfiles_folder" value="{$mainfiles_folder}" /></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table">
									<tr>
										<td width="150">Название сайта</td>
										<td><input type="text" class="form-control" name="sitename" value="{$sitename}" /></td>
									</tr>
								</table>
							</div>		
						</div>
						<hr>
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

</body>

</html>