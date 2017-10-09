<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Контроллер, отвечающий за базовые возможности админ-панели: вход, выход, главная страница, настройки, логи и прочее
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class Admin extends CI_Controller {

	/**
	* Конструктор
	* @return void
	*/

	public function __construct() {
		parent::__construct();
		$this->load->model("Admin_model", "admin");
		$this->load->model("AdminStarter_model", "starter");
	}

	/**
	* Страница авторизации
	* @return void
	*/

	public function login() {

		$this->load->library('recaptcha');
		$this->smarty->assign( "rewidget", $this->recaptcha->getWidget() );
		$this->smarty->assign( "rescript", $this->recaptcha->getScriptTag() );

		$recaptcha = $this->input->post('g-recaptcha-response');

		$message = "";
        if ( !empty( $recaptcha ) ) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {

            	//если каптча прошла нормально, то пробуем зайти
            	$login = $this->input->post("login");
				$password = $this->input->post("password");

				//валидация форм
				$this->load->library('form_validation');
				$this->form_validation->set_rules('login', 'Логин', 'required');
				$this->form_validation->set_rules('password', 'Пароль', 'required');

				if ($this->form_validation->run() == true ) {
	                $mlogin = $this->admin->login( $login, $password );
					//если вход прошел успешно, то записываем данные в куки и редиректим в админку
					if( $mlogin == true ) {
						set_cookie( "admin_login", $login, 7200 );
						set_cookie( "admin_password", $password, 7200 );
						redirect("../../index");
					} else {
						$message = "Неправильно введен логин или пароль";
					}
				} else {
					$message = validation_errors();
				}

            }
        } elseif( !empty( $_POST ) ) {
        	$message = "Каптча введена неверно";
        }
		
		$this->smarty->assign( "message", $message );
		$this->smarty->view("login.tpl");

	}

	/**
	* Главная страница админки
	* @return void
	*/

	public function index() {
		$this->smarty->assign( "modulename", "Главная страница" );
		$this->smarty->assign("systeminfo", $this->admin->getSystemInfo());
		$this->smarty->view("main.tpl");
	}

	/**
	* Страница выхода из админки
	* @return void
	*/

	public function logout() {
		delete_cookie("admin_login");
		delete_cookie("admin_password");
		redirect("../../login");
	}
	
	public function options() {
		
		$this->smarty->assign( "modulename", "Настройки сайта" );
		
		$message = "";
		$status = "";
		
		if( !empty( $_POST ) ) {
			//загружаем модель для работы с конфигом
			$this->load->model( "Options_model", "options" );
			if( $this->options->save( $this->input->post(), "mainconfig", $message ) ) {
				$status = "success";
			} else {
				$status = "danger";
			}
			
			$this->smarty->assign( "status", $status );
			$this->smarty->assign( "message", $message );
		}
		
		//задаем данные по настройкам
		foreach( $this->config->config as $key => $value ) {
			$this->smarty->assign( $key, $value );
		}
		
		$this->smarty->view("options.tpl");
	}
	
	public function logs($count = 50) {
	    $logs = $this->starter->getLogs($count);
	    
	    $this->smarty->assign("modulename", "Логи посещений");
	    $this->smarty->assign("logs", $logs["logs"]);
	    $this->smarty->assign("logcount", $count);
	    $this->smarty->assign("all_logscount", $logs["count"]);
	    $this->smarty->view("logs.tpl");
	}

}