<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Контроллер, отвечающий за управление новостями сайта
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class News extends CI_Controller {

	/**
	* Конструктор
	* @return void
	*/

	public function __construct() {
		parent::__construct();
		$this->load->model("Main_starter_model", "starter");
		$this->load->model("News_model", "news");
	}

	public function index($page = 1) {
		$perPage = 10; //количество строк на одну страницу
		
		$news = $this->news->getList( $perPage, $page );
		if( $news == false && $page != 1 ) redirect_back();
		$newslistnum = $this->news->getTotalNum();

		$this->pagination->initialize( $config ); 
		$this->load->view("news.tpl");
	}
	
	public function view($id = "") {
		if(empty($id)) redirect_back();
		
		//загружаем и обрабатываем данные
		$data = $this->news->get($id);
		if($data == false) redirect_back();
		
		$this->news->incView($id); //увеличиваем просмотр на единицу
		
		//комментарии
		$this->load->model("Comments_model", "comments");
		
		//отправка комментариев
		$message = "";
		$status = "danger";
		
		if(!empty($_POST)) {
			if( $this->comments->add($this->starter->userinfo["id"], $id, 0, $this->input->post("comment"), "", "news", $message) ) {
				$status = "success";
			}
		}
		
		//список комментариев
		$comments = $this->comments->getCommentsOfModule("news", $id, true);
		
		//smarty
		$this->smarty->assign("comments", $comments);
		$this->smarty->assign("message", $message);
		$this->smarty->assign("status", $status);
		$this->smarty->assign("modulename", "Новости сайта");
		$this->smarty->assign("data", $data);
		$this->smarty->view("newsview.tpl");
	}

}