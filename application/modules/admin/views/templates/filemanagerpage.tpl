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
						
						 <iframe id="frame" src="/admin/filemanager" width="100%" frameborder="0">
						    Ваш браузер не поддерживает плавающие фреймы!
						 </iframe>

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
			   function resizeFrame() {
			        $("#frame").css({
				    "height": window.innerHeight - $(".footer-content").height() * 2 - 150
				});
			   }
			   resizeFrame();
			   $(window).resize(function() {
				resizeFrame();
			   })
			})
		</script>

	</body>
</html>
