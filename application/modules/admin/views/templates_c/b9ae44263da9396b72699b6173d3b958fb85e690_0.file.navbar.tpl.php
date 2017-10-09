<?php
/* Smarty version 3.1.30, created on 2017-10-08 18:12:57
  from "D:\OpenServer\domains\landing2\application\modules\admin\views\templates\navbar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da4079329394_87804682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9ae44263da9396b72699b6173d3b958fb85e690' => 
    array (
      0 => 'D:\\OpenServer\\domains\\landing2\\application\\modules\\admin\\views\\templates\\navbar.tpl',
      1 => 1507475561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da4079329394_87804682 (Smarty_Internal_Template $_smarty_tpl) {
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
