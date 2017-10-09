<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model("Main_starter_model", "starter");
		$this->load->model("Pages_model", "pages");
	}
	
	public function index($alias = "") {
		//загружаем и обрабатываем данные
		$data = $this->pages->getByAlias($alias);
		if($data == false) redirect_back();
		
		
		$this->smarty->assign("modulename", "Страницы сайта");
		$this->smarty->assign("data", $data);
		$this->smarty->view("page.tpl");
	}
	
}