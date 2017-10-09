<?php
/* Smarty version 3.1.30, created on 2017-10-09 00:32:40
  from "/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/breadcrumbs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da99785a80c4_29210806',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a9b0554d4e4012fd08951472e606013612a75f1' => 
    array (
      0 => '/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/breadcrumbs.tpl',
      1 => 1507485405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da99785a80c4_29210806 (Smarty_Internal_Template $_smarty_tpl) {
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
