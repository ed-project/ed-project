<?php
/* Smarty version 3.1.30, created on 2017-10-08 18:11:29
  from "D:\OpenServer\domains\landing2\application\modules\admin\views\templates\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da4021b5f0b9_20525205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2b79f5716b6d4044ab16df2b10d6781082f9db1' => 
    array (
      0 => 'D:\\OpenServer\\domains\\landing2\\application\\modules\\admin\\views\\templates\\footer.tpl',
      1 => 1503572872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da4021b5f0b9_20525205 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="footer">
   <div class="footer-inner">
      <div class="footer-content">
         <span class="bigger-120">
         <span class="blue bolder">CI SimpleCMS</span> - админ-панель CodeIgniter &copy; <a href="https://neorasoft.com" target="_blank">Neorasoft</a> 2017 - <?php echo $_smarty_tpl->tpl_vars['year']->value;?>

         </span>
      </div>
   </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
   if('ontouchstart' in document.documentElement) document.write("<?php echo '<script'; ?>
 src='/public/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/ace-elements.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/admin/js/ace.min.js"><?php echo '</script'; ?>
>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
   <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a><?php }
}
