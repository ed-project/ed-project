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
						{if $list == false}
						<div class="poll">
						    <div class="message">Опросы отсутствуют</div>
						</div>
						{else}
						{foreach from=$list item=row}
						<div class="poll">
							<h3>{$row.title}</h3>
							<dl class="options">
								{foreach from=$row.options item=option}
								<dt>{$option.title}<span class="vote_count">{$option.votes}</span></dt>
								<dd><span class="poll_bg"><span class="poll_bar" style="width:{$option.percentage}%"></span></span></dd>
								{/foreach}
							</dl>
						</div>
						{/foreach}
						{/if}
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