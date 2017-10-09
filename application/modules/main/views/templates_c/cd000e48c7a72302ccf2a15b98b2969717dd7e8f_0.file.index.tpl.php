<?php
/* Smarty version 3.1.30, created on 2017-10-09 00:05:24
  from "/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/main/views/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59da9314e2df54_36065205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd000e48c7a72302ccf2a15b98b2969717dd7e8f' => 
    array (
      0 => '/home/m/mis507nz2/bigtest.mihairu35.ru/public_html/application/modules/main/views/templates/index.tpl',
      1 => 1507496716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da9314e2df54_36065205 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" />

	<link href="/public/main/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/public/main/css/jBox.css" rel="stylesheet" type="text/css" />
	<link href="/public/main/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<header>
		<div class="container clearfix">
			<h1 id="logo">
				<a href="#"><img src="/public/main/img/logo.png" alt="Electronic Documents" /></a>
			</h1>
			<nav>
				<a class="scrollto" href="#section3">Что это такое?</a>
				<a class="scrollto" href="#section2">Как это работает?</a>
				<a class="scrollto" href="#section5">Контакты</a>
			</nav>
		</div>
	</header>
	<div class="container main">
		<section id="section1">
			<h2>Теперь все документы в одном месте</h2>
		</section>

		<section id="section3">
			<h2><span class="color">Что такое</span><br>Electronic Documents?</h2>
			<div class="row">
				<div class="col-md-12 text-center">
					<h3>Технология</h3>
					<p>Хранение зашифрованных данных на удаленном сервере. Для доступа в личный кабинет необходимо наличие карты ED.</p>
					<img src="/public/main/img/tech2.png" id="scheme" alt="" />
				</div>
			</div>
		</section>

		<section id="section2">
			<h2>Как это работает?</h2>
			<div class="row">
				<div class="col-md-4">
					<div id="benefit">
						<div id="benefit-circle">1</div>
						<div id="benefit-title">
							Доступно
						</div>
						<div id="benefit-caption">
							<p>Доступ к документам в любом месте, где есть интернет</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div id="benefit">
						<div id="benefit-circle">2</div>
						<div id="benefit-title">
							Безопасно
						</div>
						<div id="benefit-caption">
							<p>Шифрование данных. Многоуровневая защита от взлома (карта + телефон + отпечаток пальца)</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div id="benefit">
						<div id="benefit-circle">3</div>
						<div id="benefit-title">
							Просто
						</div>
						<div id="benefit-caption">
							<p>Достаточно лишь наличие электронного паспорта</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--<section id="section4">
			<div class="row">
				<div class="col-md-6">
					<h2><span class="color">Закажите карту</span><br>ELECTRONIC<br>DOCUMENTS</h2>
					<button type="button" class="btn btn-lg btn-primary btn-block btn-buy">Заказать!</button>
				</div>
				<div class="col-md-6">
					<img src="/public/main/img/card.png" class="pull-right creditcard" alt="" />
					<div class="clearfix"></div>
				</div>
			</div>
		</section>-->

		<section id="section5">
			<h2>Связаться с нами</h2>
			<div class="row">
				<div class="col-md-4">
					<ul class="contacts">
						<li><span class="glyphicon glyphicon-envelope"></span>E-Mail: <a href="mailto:test@yandex.ru">test@yandex.ru</a>
						</li>
						<li><span class="glyphicon glyphicon-earphone"></span>Телефон: +7(999)-999-99-99</li>
					</ul>
					<div class="social">
						<a href="#"><img src="/public/main/img/vk.svg" alt="" />
						</a>
						<a href="#"><img src="/public/main/img/facebook.svg" alt="" />
						</a>
						<a href="#"><img src="/public/main/img/twitter.svg" alt="" />
						</a>
						<a href="#"><img src="/public/main/img/googleplus.svg" alt="" />
						</a>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-8">
					<form method="post" id="feedbackform">
						<div class="row">
							<div class="col-md-5">
								<input type="text" placeholder="Имя" id="feedback-name" class="form-control feedback-input" required />
								<br>
								<input type="email" placeholder="E-Mail" id="feedback-email" class="form-control feedback-input" required />
								<br>
								<input type="text" placeholder="Тема" id="feedback-theme" class="form-control feedback-input" required />
								<br>
							</div>
							<div class="col-md-7">
								<textarea class="form-control feedback-input" placeholder="Сообщение" name="message"></textarea>
								<button type="submit" class="btn btn-primary pull-right">Отправить</button>
								<div class="clearfix"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>

	<a href="#" class="scrollup">Наверх</a>


	<div class="hidden">
		<div id="buyform-modal">
			<form method="post" id="buyform">
				<input type="text" placeholder="Имя" id="buy-feedback-name" class="form-control feedback-input" required />
				<br>
				<input type="tel" placeholder="Телефон" id="buy-feedback-phone" class="form-control feedback-input" required />
				<br>
				<input type="email" placeholder="E-Mail" id="buy-feedback-email" class="form-control feedback-input" required />
				<br>
				<button type="submit" class="btn btn-primary btn-block feedback-input">Заказать</button>
			</form>
		</div>
	</div>

	<?php echo '<script'; ?>
 src="/public/main/js/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/public/main/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/public/main/js/jbox.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/public/main/js/jquery.mask.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/public/main/js/common.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
