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
							Последние {$logcount} посещений сайта
						    </div>
						</div>
						
						<table class="table table-striped">
						    <tr>
						     <td width="100"><b>Время, дата</b></td>
						     <td width="200"><b>Кто посещал</b></td>
						     <td width="100"><b>IP, прокси</b></td>
						     <td width="280"><b>Посещенный URL</b></td>
						    </tr>
						    {foreach from=$logs item=log}
							<tr>
							    <td>{$log[0]}</td>
							    <td>{$log[1]}</td>
							    <td>{$log[2]}</td>
							    <td>{$log[3]}</td>
							</tr>
						    {/foreach}
						</table>
						
						<br>Просмотреть последние <a href="/admin/logs/100">100</a> <a href="/admin/logs/500">500</a> <a href="/admin/logs/1000">1000</a> посещений.<br>
						Посмотреть <a href="/admin/logs/{$all_logscount}">Все посещения</a>
						
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
