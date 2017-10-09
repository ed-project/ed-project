<?php
/* Smarty version 3.1.30, created on 2017-10-08 18:11:29
  from "D:\OpenServer\domains\landing2\application\modules\admin\views\templates\breadcrumbs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da4021aafe34_05217082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f77b94754fc8cf0f71c4fab5ec9d5af29429d94' => 
    array (
      0 => 'D:\\OpenServer\\domains\\landing2\\application\\modules\\admin\\views\\templates\\breadcrumbs.tpl',
      1 => 1499882310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da4021aafe34_05217082 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
   <ul class="breadcrumb">
      <li>
         <i class="ace-icon fa fa-home home-icon"></i>
         <a href="/admin">Админ-панель</a>
      </li>
      <li>
        <?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>

      </li>
   </ul>
</div><?php }
}
