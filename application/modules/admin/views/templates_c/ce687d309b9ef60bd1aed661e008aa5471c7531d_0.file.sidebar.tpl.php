<?php
/* Smarty version 3.1.30, created on 2017-10-08 18:16:00
  from "D:\OpenServer\domains\landing2\application\modules\admin\views\templates\sidebar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da41309ddbb2_56540228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce687d309b9ef60bd1aed661e008aa5471c7531d' => 
    array (
      0 => 'D:\\OpenServer\\domains\\landing2\\application\\modules\\admin\\views\\templates\\sidebar.tpl',
      1 => 1507475759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da41309ddbb2_56540228 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="sidebar" class="sidebar responsive ace-save-state">
   <ul class="nav nav-list">
      <li>
         <a href="/admin/feedback"><i class="menu-icon fa fa-envelope"></i> Обратная связь</a>
         <b class="arrow"></b>
       </li>
       <li>
         <a href="#" class="dropdown-toggle">
         <i class="menu-icon fa fa-gamepad"></i>
         <span class="menu-text">
         Управление
         <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
	        <li>
               <a href="/admin/news"><i class="menu-icon fa fa-caret-right"></i> Новости сайта</a>
               <b class="arrow"></b>
            </li>
	        <li>
               <a href="/admin/pages"><i class="menu-icon fa fa-caret-right"></i> Страницы сайта</a>
               <b class="arrow"></b>
            </li>
	        <li>
               <a href="/admin/slider"><i class="menu-icon fa fa-caret-right"></i> Слайдер</a>
               <b class="arrow"></b>
            </li>
         </ul>
      </li>
      <li>
         <a href="#" class="dropdown-toggle">
         <i class="menu-icon fa fa-wrench"></i>
         <span class="menu-text">
         Инструменты
         <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
            <li>
               <a href="/admin/filemanager/page">
               <i class="menu-icon fa fa-caret-right"></i> Файловый менеджер
               </a>
               <b class="arrow"></b>
            </li>
            <li>
               <a href="/admin/logs">
               <i class="menu-icon fa fa-caret-right"></i> Логи посещений
               </a>
               <b class="arrow"></b>
            </li>
         </ul>
      </li>
      <li>
         <a href="#" class="dropdown-toggle">
         <i class="menu-icon fa fa-wrench"></i>
         <span class="menu-text">
         Настройки
         <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
            <li>
               <a href="/admin/options">
               <i class="menu-icon fa fa-caret-right"></i> Настройки сайта
               </a>
               <b class="arrow"></b>
            </li>
            <li>
               <a href="/admin/adminaccounts">
               <i class="menu-icon fa fa-caret-right"></i> Админ-аккаунты
               </a>
               <b class="arrow"></b>
            </li>
         </ul>
      </li>
   </ul>
   <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
      <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
   </div>
</div><?php }
}
