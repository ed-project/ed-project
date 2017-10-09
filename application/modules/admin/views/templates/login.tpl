<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>CI SimpleCMS</title>
    {include file="generalscript.tpl"}
    {$rescript}
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
                    <div class="login-container{if !$message} zoomIn animated{/if}">
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
                                            {if $message}<div class="alert alert-danger text-center tada animated">{$message}</div>{/if}
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

                                                    <center>{$rewidget}</center>
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

</html>