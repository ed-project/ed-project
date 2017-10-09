<!DOCTYPE html>
<html>
	<head>
		<title>{$modulename} | Панель управления</title>
		{include file="generalscript.tpl"}
		<script src="/public/main/js/jQuery.WMAdaptiveInputs.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(function(){
				$('#poll_options').WMAdaptiveInputs({
					minOptions: {$min_options},
					maxOptions: {$max_options},
					inputNameAttr: 'options[]',
					inputClassAttr: 'btn_remove'
				});
				$('form.adpt_inputs_form').each(function(){
					$this = $(this);
					$this.find('button[name="adpt_submit"]').on('click', function(event){
						event.preventDefault();
						var str = $this.serialize();
						$.post('/admin/polls/add', str, function(response){
							var jsonObj = $.parseJSON(response);
							if (jsonObj.fail == false){
								window.location.replace("/admin/polls");
							}else{
								$this.find('.adpt_errors').html(jsonObj.error_messages).hide().slideDown();
							}
						});
					});
				});
			});
		</script>
	</head>
	<body class="no-skin">
		{include file="navbar.tpl"}
		<div class="main-container ace-save-state" id="main-container">
			{include file="sidebar.tpl"}
			<div class="main-content">
				<div class="main-content-inner">
					{include file="breadcrumbs.tpl"}
					<div class="page-content">
					    <form class="adpt_inputs_form" method="post" action="poll/create">
						<dl>
						    <dt>Название опроса:</dt>
						    <dd><input type="text" class="form-control" id="title" name="title" value="{$post.title}" /></dd>
						</dl>
						<div id="poll_options" class="adpt_inputs">
							<p>Варианты ответа:</p>
							<ol class="adpt_inputs_list"></ol>
							<p><a href="#" class="adpt_add_option btn_add">Добавить вариант ответа</a></p>
						</div>
						<button type="submit" name="adpt_submit" class="btn btn-primary">Создать опрос</button>
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