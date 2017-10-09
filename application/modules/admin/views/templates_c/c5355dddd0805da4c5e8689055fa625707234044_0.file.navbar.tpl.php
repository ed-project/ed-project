<?php
/* Smarty version 3.1.30, created on 2017-10-09 00:32:40
  from "/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/navbar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da9978598fc1_59836683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5355dddd0805da4c5e8689055fa625707234044' => 
    array (
      0 => '/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/navbar.tpl',
      1 => 1507485408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da9978598fc1_59836683 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="navbar" class="navbar navbar-default ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		<span class="sr-only">Toggle sidebar</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<div class="navbar-header pull-left">
			<a href="/admin" class="navbar-brand"><small>CI SimpleLandingCMS <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</small></a>
		</div>
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
" target="_blank"><i class="ace-icon fa fa-globe"></i> Перейти на сайт </a></li>
				<li><a href="/admin/logout"><i class="ace-icon fa fa-power-off"></i> Выход </a></li>
			</ul>
		</div>
	</div>
</div><?php }
}
