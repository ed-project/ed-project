<!DOCTYPE html>
<html>
	<head>
		<title>{$modulename} {$module} | Панель управления</title>
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
								<a href="javascript:" id="alldeletelink"><img src="/public/admin/images/icons/remove.png" alt="Удалить выделенное" />Удалить выделенное</a>
							</div>

						<table class="table table-striped table-bordered">
							<tr>
							    <th width="50"><div class="ace-settings-item pull-left"><input type="checkbox" class="allselect ace ace-checkbox-2" /><label class="lbl"></label></div></th>
							    <th width="100">ID</th>
							    <th>Имя</th>
							    <th width="250">Телефон</th>
							    <th>E-Mail</th>
							    <th>Действия</th>
						      </tr>
				            {if $feedbacklist !== false}
								{foreach from=$feedbacklist item=$feed}
								<tr>
									<td><div class="ace-settings-item pull-left"><input type="checkbox" class="rowselect ace ace-checkbox-2" data-id="{$feed.id}" /><label class="lbl"></label></div></td>
									<td>#{$feed.id}</td>
									<td>{$feed.name}</td>
									<td>{$feed.phone}</td>
									<td>{$feed.email}</td>
									<td>
										<div class="hidden" id="message-{$feed.id}">{$feed.message}</div>
										<button class="btn btn-primary btn-sm readbtn" data-object="#message-{$feed.id}">Читать</button>
										<a href="javascript:" class="deletelink" data-id="{$feed.id}"><img src="/public/admin/images/icons/remove.png" alt="Удалить сообщение" /></a>
									</td>
								</tr>
								{/foreach}
							{else}
							<tr>
								<td colspan="8">
									Сообщения отсутствуют.
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
			
			<div id="readdialog" class="dialog" title="Сообщение"><span id="text"></span></div>

		<script>
			$(document).ready(function() {

				var selected;
				$(".rowselect").click(function() {
					selected = "";
					$.each( $(".rowselect"), function() {
						if( $(this).prop("checked") == true ) selected += $(this).data("id") + "-";
					});
					selected = selected.substring( 0, selected.length - 1 );
				})

				$(".deletelink").click(function() {
					if( confirm("Удалить данное сообщение?") ) {
						location.href = "/admin/feedback/delete/" + $(this).data("id");
					}
				})


				$("#alldeletelink").click(function() {
					if( confirm("Удалить выбранные элементы?") ) {
						location.href = "/admin/feedback/delete/" + selected;
					}
				})

				$(".allselect").click(function() {
					selected = "";
					$(".rowselect").prop("checked", $(".allselect").prop( "checked" ) );
					$.each($(".rowselect"), function() {
						if ($(this).prop("checked") == true) selected += $(this).data("id") + "-";
					});
					selected = selected.substring(0, selected.length - 1);
				})
				
				$("#readdialog").dialog({
				    autoOpen: false,
				    show: {
					effect: "fade",
					duration: 300
				    },
				    hide: {
					effect: "fade",
					duration: 300
				    }
				});
				
				$(".readbtn").click(function() {
				    $("#readdialog #text").html($($(this).data("object")).html());
				    $("#readdialog").dialog("open");
				});

			})
		</script>

	</body>
</html>
