<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model("Main_starter_model", "starter");
		$this->load->model("Users_model", "users");
	}
	
	public function sociallogin() {
		$this->users->loginBySocial($this->starter->ulogin->userdata());
		redirect_back();
	}
	
	public function login() {
		if($this->starter->userinfo == true) redirect_main();
		
		$message = "";
		$status = "danger";
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nickname", "Логин", "required");
		$this->form_validation->set_rules("password", "Пароль", "required");
		
		if($this->form_validation->run() == true) {
			if($this->users->loginByNickname($this->input->post("nickname"), $this->input->post("password"))) {
				//сообщение и статус (на всякий случай)
				$status = "success";
				$message = "Успешный вход";
				
				redirect_back();
				return true;
			} else {
				$message = "Неправильный логин или пароль";
			}
		} else {
			$message = validation_errors();
		}
		
		$this->smarty->assign("message", $message);
		$this->smarty->assign("status", $status);
		$this->smarty->assign("modulename", "Вход");
		$this->smarty->view("login.tpl");
	}
	
	public function register() {
		if($this->starter->userinfo == true) redirect_main();
		
		$message = "";
		$status = "danger";
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nickname", "Логин", "required");
		$this->form_validation->set_rules("password", "Пароль", "required");
		$this->form_validation->set_rules("reppassword", "Повторный пароль", "required");
		$this->form_validation->set_rules("email", "Почта", "required|valid_email");
		
		if($this->form_validation->run() == true) {
			//проверяем на совпадение пароли
			if($this->input->post("password") == $this->input->post("reppassword")) {
				if($this->users->registerByNickname($this->input->post("nickname"), $this->input->post("password"), $this->input->post("email"), null, $message)) {
					//сообщение и статус (на всякий случай)
					$status = "success";
					$message = "Успешная регистрация";
					
					redirect("../../../../../main/users/login");
					return true;
				}
			} else {
				$message = "Пароли не совпадают";
			}
		} else {
			$message = validation_errors();
		}
		
		if(!empty($_POST)) {
			foreach($_POST as $key => $value) {
				$this->smarty->assign($key, $value);
			}
		}
		
		$this->smarty->assign("message", $message);
		$this->smarty->assign("status", $status);
		$this->smarty->assign("modulename", "Регистрация");
		$this->smarty->view("register.tpl");
	}
	
	public function logout() {
		if($this->starter->userinfo == false) redirect_back();
		$this->users->logout();
		redirect_back();
	}
	
	public function profile($id = 0) {
		if($id == 0) redirect_back();
		
		//получаем информацию о пользователе
		$data = $this->users->getById($id);
		if($data == false) redirect_main();
		
		$this->smarty->assign("modulename", "Информация о пользователе");
		$this->smarty->assign("data", $data);
		$this->smarty->view("profile.tpl");
	}
}