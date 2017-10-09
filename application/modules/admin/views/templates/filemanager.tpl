<!DOCTYPE html>
<html>
	<head>
		<title>{$modulename} | Панель управления</title>
		{include file="generalscript.tpl"}
		<script src="/public/admin/js/filemanager.js"></script>
	</head>
	<body>
		<div class="container" style="margin-top: 10px">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="well well-sm">
						<div class="pull-left">Элементов на странице: {$itemscount}</div>
						<div class="pull-right">{$dir}</div>
						<div class="clearfix"></div>
					</div>
					<div class="pull-left">
						<a href="/admin/filemanager/{$mode}/{$format}/?dir={$updir}{if $mode == "ckeditor"}&CKEditor={$GET.CKEditor}&CKEditorFuncNum={$GET.CKEditorFuncNum}&langCode={$GET.langCode}" class="btn btn-primary"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
						<a href="javascript:" id="loadfolderbtn" class="btn btn-primary"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
					</div>
					<div class="pull-right">
						<form method="post" enctype="multipart/form-data">
							<input type="file" class="form-control loadfile" name="loadfile" />
							<button type="submit" class="btn btn-primary btn-block btn-sm">Загрузить</button>
							<input type="hidden" name="action" value="loadfile" />
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			{if $message}
			<div class="alert alert-{$status}">{$message}</div>
			{/if}
			<div class="row">
				{foreach from=$fileslist item=file} {if {$file.type} == "folder"}
				<div class="col-md-2">
					<button class="btn-danger deletebtn" data-type="{$file.abstractType}" data-path="{$file.path}" data-name="{$file.fullname}"><i class="fa fa-times" aria-hidden="true"></i></button>
					<a href="/admin/filemanager/{$mode}/{$format}/?dir={$file.path}{if $mode == "ckeditor"}&CKEditor={$GET.CKEditor}&CKEditorFuncNum={$GET.CKEditorFuncNum}&langCode={$GET.langCode}{/if}">
						<div class="panel panel-default text-center fileblock">
							<div class="panel-body">
								<img src="{$file.typeimage}" />
								<div class="filename">{$file.fullname}</div>
							</div>
						</div>
					</a>
				</div>
				{else if {$file.type} == "image"}
				<div class="col-md-2">
					<button class="btn-danger deletebtn" data-type="{$file.abstractType}" data-path="{$file.path}" data-name="{$file.fullname}"><i class="fa fa-times" aria-hidden="true"></i></button>
					<a href="javascript:" data-name="{$file.name}" data-path="{$file.path}" data-size="{$file.size}" data-extension="{$file.extension}" data-path="{$file.path}" data-type="{$file.type}" class="filelink">
						<div class="panel panel-default text-center fileblock">
							<div class="panel-body">
								<div class="imgpreview" style="background-image:url('/{$file.path}');"></div>
								<div class="filename">{$file.fullname}</div>
							</div>
						</div>
					</a>
				</div>
				{else}
				<div class="col-md-2">
					<button class="btn-danger deletebtn" data-type="{$file.abstractType}" data-path="{$file.path}" data-name="{$file.fullname}"><i class="fa fa-times" aria-hidden="true"></i></button>
					<a href="javascript:" data-name="{$file.name}" data-path="{$file.path}" data-size="{$file.size}" data-extension="{$file.extension}" data-path="{$file.path}" data-type="{$file.type}" class="filelink">
						<div class="panel panel-default text-center fileblock">
							<div class="panel-body">
								<img src="{$file.typeimage}" alt="{$file.extension}" />
								<div class="filename">{$file.fullname}</div>
							</div>
						</div>
					</a>
				</div>
				{/if} {/foreach}
			</div>
			<div id="infodialog" class="dialog" title="Информация">
				<ul>
					<li>Название: <span id="file-name"></span>
					<li>Формат: <span id="file-ext"></span>
					<li>Тип: <span id="file-type"></span>
					<li>Расположение: <span id="file-path"></span>
					<li>Размер: <span id="file-size"></span> байт
				</ul>
			</div>
			<div id="addfolderdialog" class="dialog" title="Создать папку">
				<form method="post">
					<label for="foldername">Название папки:</label>
					<input class="form-control" name="foldername" />
					<input type="hidden" name="action" value="createfolder" />
					<hr>
					<button type="submit" class="pull-right btn btn-primary">Создать</button>
				</form>
			</div>
			<div id="deletedialog" class="dialog text-center" title="Подтвердите удаление">
				<form method="post">
					<span id="delete-message"></span>
					<input type="hidden" name="deletepath" value="" />
					<input type="hidden" name="action" value="" />
					<hr>
					<div class="pull-right">
						<button type="button" class="btn btn-primary modalclose" data-modalobj="#deletedialog">Отмена</button>
						<button type="submit" class="btn btn-danger">Удалить</button>
					</div>
				</form>
			</div>
		</div>
		{if $mode == "window"}
		<script>
			$(document).ready(function() {
				$(".filelink").on("click", function() {
					window.opener.$("#fmlink").val("/" + $(this).data("path"));
					window.close();
				});
			});
		</script>
		{elseif $mode == "ckeditor"}
		<script>
		    $(document).ready(function() {
			    function getUrlParam( paramName ) {
			     var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
			     var match = window.location.search.match( reParam );

			     return ( match && match.length > 1 ) ? match[1] : null;
			    }

			    $(".filelink").on("click", function() {
				var funcNum = getUrlParam( "CKEditorFuncNum" );
				var fileUrl = "/" + $(this).data("path");
				window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
				window.close();
			    })
		    });
		</script>
		{else}
		<script>
			$(".filelink").on("click", function() {
				$("#infodialog").dialog("open");
				$("#file-name").html($(this).data("name"));
				$("#file-ext").html($(this).data("extension"));
				$("#file-type").html($(this).data("type"));
				$("#file-path").html($(this).data("path"));
				$("#file-size").html($(this).data("size"));
			});
		</script>
		{/if}
	</body>
</html>