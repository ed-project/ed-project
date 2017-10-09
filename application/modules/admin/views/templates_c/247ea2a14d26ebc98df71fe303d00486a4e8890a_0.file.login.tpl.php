<?php
/* Smarty version 3.1.30, created on 2017-10-09 00:31:56
  from "/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da994ce892b7_47685348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '247ea2a14d26ebc98df71fe303d00486a4e8890a' => 
    array (
      0 => '/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/admin/views/templates/login.tpl',
      1 => 1507485407,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:generalscript.tpl' => 1,
  ),
),false)) {
function content_59da994ce892b7_47685348 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>CI SimpleCMS</title>
    <?php $_smarty_tpl->_subTemplateRender("file:generalscript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php echo $_smarty_tpl->tpl_vars['rescript']->value;?>

    <style type="text/css">
        body {
            background: url("/public/admin/images/bg.png") !important;
			background-size: cover;
        }
    </style>
</head>

<body class="login-layout light-login">
   
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container<?php if (!$_smarty_tpl->tpl_vars['message']->value) {?> zoomIn animated<?php }?>">
                        <div class="center">
                            <h1>
                                <span class="red">CI SimpleLandingCMS</span>
                                <span class="grey" id="id-text2">Admin</span>
                            </h1>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i> Вход в панель управления
                                        </h4>

                                        <div class="space-6"></div>

                                        <form method="post">
                                            <?php if ($_smarty_tpl->tpl_vars['message']->value) {?><div class="alert alert-danger text-center tada animated"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
                                            <div class="clearfix"></div>
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" name="login" placeholder="Логин" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" name="password" placeholder="Пароль" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">

                                                    <center><?php echo $_smarty_tpl->tpl_vars['rewidget']->value;?>
</center>
                                                    <button type="submit" class="btn-block btn btn-sm btn-primary" style="margin-top:10px">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">Войти</span>
                                                    </button>
                                                </div>

                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html><?php }
}
