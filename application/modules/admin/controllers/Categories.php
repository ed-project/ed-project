<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Контроллер, отвечающий за управление категориями в различных модулях
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class Categories extends CI_Controller {

	/**
	* Конструктор
	* @return void
	*/

	public function __construct() {
		parent::__construct();
		$this->load->model("Admin_model", "admin");
		$this->load->model("AdminStarter_model", "starter");

		$this->load->model( "main/Categories_model", "categories" );
	}
	
	public function index($module = "news", $page = 1) {
	    $perPage = 30; //количество строк на одну страницу

	    $categories = $this->categories->getList($module, $perPage, $page);
	    if( $categories == false && $page != 1 ) redirect_back();
	    $categoriesNum = $this->categories->getTotalCategoriesNum($module);

	    //пагинация
	    $this->load->library('pagination');
	    $config['base_url'] = base_protocol() . base_url() . "/admin/categories/index/$module";
	    $config['total_rows'] = $categoriesNum;
	    $config['per_page'] = $perPage;

	    $this->pagination->initialize( $config ); 

	    $this->smarty->assign( "modulename", "Управление категориями" );
	    $this->smarty->assign( "categoriesnum", $categoriesNum );
	    $this->smarty->assign( "pagination", $this->pagination->create_links() );
	    $this->smarty->assign( "categorieslist", $categories );
	    $this->smarty->assign("module", $module);
	    $this->smarty->view( "categories.tpl" );
	}
	
	public function add($module = "news") {
	    $this->smarty->assign("module", $module);
	    
	    //валидация формы
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Название", "required");
		$this->form_validation->set_rules("module", "Модуль", "required");
		
		//сообщение и статус
		$message = "";
		$status = "danger";
		
		if($this->form_validation->run() == true) {
			if($this->categories->add($this->input->post("module"), $this->input->post("title"), $this->input->post("seodescription"), $this->input->post("seokeywords"), $message)) {
				$status = "success";
				redirect("../../../../../admin/categories/");
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
		
		$this->smarty->assign("modulename", "Добавление категории");
		$this->smarty->assign("module", "module");
		$this->smarty->assign("message", $message);
		$this->smarty->assign("status", $status);
		$this->smarty->view("categoriesform.tpl");
	    
	}
	
	public function edit($id = 0) {
	    $data = $this->categories->get($id);
	    if($data == false) redirect_back();
	    
	    //валидация формы
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Название", "required");
		$this->form_validation->set_rules("module", "Модуль", "required");
		
		//сообщение и статус
		$message = "";
		$status = "danger";
		
		if($this->form_validation->run() == true) {
			if($this->categories->edit($id, $this->input->post("module"), $this->input->post("title"), $this->input->post("seodescription"), $this->input->post("seokeywords"), $message)) {
				$status = "success";
				redirect("../../../../../admin/categories/");
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
		
		$this->smarty->assign("modulename", "Редактирование категории");
		$this->smarty->assign("data", $data);
		$this->smarty->assign("message", $message);
		$this->smarty->assign("status", $status);
		$this->smarty->view("categoriesform.tpl");
	}
	
	public function delete($id = "") {
		$ids = explode("-", $id);
		
		if(count($id) == 0 || $id == "undefined") {
			redirect("../../../../../admin/categories/");
			return false;
		}
		
		foreach($ids as $value) {
			$this->categories->delete($value);
		}
		redirect("../../../../../admin/categories/"); 
	}
	
}