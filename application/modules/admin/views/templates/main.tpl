<!DOCTYPE html>
<html>
	<head>
		<title>{$modulename} | Панель управления</title>
		{include file="generalscript.tpl"}
		<script src="/public/admin/js/Chart.min.js"></script>
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
							<h1>Привет, {$username}!</h1>
						</div>

						<div class="row">
							<div class="col-md-12">
								<ul>
									<li><b>Сайт:</b> {$siteurl}</li>
									<li><b>Серверное время:</b> {$date} / {$time}</li>
									<li><b>Ваш IP:</b> {$ip}</li>
								</ul>
							</div>
						</div>

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
