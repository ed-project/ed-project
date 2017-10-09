<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Контроллер, отвечающий за управление слайдером
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class Slider extends CI_Controller {

	/**
	* Конструктор
	* @return void
	*/

	public function __construct() {
		parent::__construct();
		$this->load->model("Admin_model", "admin");
		$this->load->model("AdminStarter_model", "starter");

		$this->load->model( "main/Slider_model", "slider" );
	}
	
	public function index() {
	    $sliderlist = $this->slider->getSlides();

	    $this->smarty->assign( "modulename", "Управление слайдером" );
	    $this->smarty->assign( "slidesnum", count($sliderlist) );
	    $this->smarty->assign( "sliderlist", $sliderlist );
	    $this->smarty->view( "slider.tpl" );
	}
	
	public function add() {	    
	    //валидация формы
		$this->load->library("form_validation");
		$this->form_validation->set_rules("image", "Изображение слайда", "required");
		
		//сообщение и статус
		$message = "";
		$status = "danger";
		
		if($this->form_validation->run() == true) {
			if($this->slider->add($this->input->post("image"), $this->input->post("title"), $this->input->post("caption"), $this->input->post("link"), $message)) {
				$status = "success";
				redirect("../../../../../admin/slider/");
			}
		} else {
			$message = validation_errors();
		}
		
		//заполняем сохраненные поля, если произошло неудачное добавление
		if(!empty($_POST)) {
			foreach($_POST as $key => $value) {
				$this->smarty->assign($key, $value);
			}
		}
		
		$this->smarty->assign("modulename", "Добавление слайда в слайдер");
		$this->smarty->assign("module", "module");
		$this->smarty->assign("message", $message);
		$this->smarty->assign("status", $status);
		$this->smarty->view("sliderform.tpl");
	    
	}
	
	public function edit($id = 0) {
	    $data = $this->slider->get($id);
	    if($data == false) redirect_back();
	    
	    //валидация формы
		$this->load->library("form_validation");
		$this->form_validation->set_rules("image", "Изображение слайда", "required");
		
		//сообщение и статус
		$message = "";
		$status = "danger";
		
		if($this->form_validation->run() == true) {
			if($this->slider->edit($id, $this->input->post("image"), $this->input->post("title"), $this->input->post("caption"), $this->input->post("link"), $message)) {
				$status = "success";
				redirect("../../../../../admin/slider/");
			}
		} else {
			$message = validation_errors();
		}
		
		//заполняем сохраненные поля, если произошло неудачное добавление
		if(!empty($_POST)) {
			foreach($_POST as $key => $value) {
				$this->smarty->assign($key, $value);
			}
		}
		
		$this->smarty->assign("modulename", "Редактирование слайда");
		$this->smarty->assign("data", $data);
		$this->smarty->assign("message", $message);
		$this->smarty->assign("status", $status);
		$this->smarty->view("sliderform.tpl");
	}
	
	public function delete($id = "") {
		$ids = explode("-", $id);
		
		if(count($id) == 0 || $id == "undefined") {
			redirect("../../../../../admin/slider/");
			return false;
		}
		
		foreach($ids as $value) {
			$this->slider->delete($value);
		}
		redirect("../../../../../admin/slider/"); 
	}
	
}