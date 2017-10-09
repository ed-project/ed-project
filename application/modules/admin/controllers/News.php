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
		$this->load->model("Admin_model", "admin");
		$this->load->model("AdminStarter_model", "starter");

		$this->load->model("main/News_model", "news");
		$this->load->model("main/Categories_model", "categories");
		
		$this->load->helper("date");
		$this->smarty->assign("today", date("Y-m-d") . "T" . date("H:i")); //для поля с датой и временем
	}

	public function index( $page = 1 ) {

		$perPage = 30; //количество строк на одну страницу

		$news = $this->news->getList( $perPage, $page );
		if( $news == false && $page != 1 ) redirect_back();
		$newslistnum = $this->news->getTotalNum();

		//пагинация
		$this->load->library('pagination');
		$config['base_url'] = base_protocol() . base_url() . "/admin/news/index";
		$config['total_rows'] = $newslistnum;
		$config['per_page'] = $perPage;

		$this->pagination->initialize( $config ); 

		$this->smarty->assign( "modulename", "Управление новостями сайта" );
		$this->smarty->assign( "newsnum", $newslistnum );
		$this->smarty->assign( "pagination", $this->pagination->create_links() );
		$this->smarty->assign( "newslist", $news );
		$this->smarty->view( "news.tpl" );

	}


	/**
	 * Удаление сайтов
	 * @param  string $id Индентификаторы сайтов через "-" без пробелов
	 * @return void
	 */
	public function delete($id = "") {
		$ids = explode("-", $id);
		
		if(count($id) == 0 || $id == "undefined") {
			redirect("../../../../../admin/news/");
			return false;
		}
		
		foreach($ids as $value) {
			$this->news->delete($value);
		}
		redirect("../../../../../admin/news/");
	}

	public function add() {
		//валидация форм
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Заголовок', 'required');
		$this->form_validation->set_rules('description', 'Краткое описание', 'required');
		$this->form_validation->set_rules('content', 'Полное описание', 'required');
		$this->form_validation->set_rules("category", "Категория", "required");

		$message = ""; //сообщение
		$status = "danger"; //статус
		
		$date = $this->input->post("add_date");
		$date = nice_date( $date, "Y-m-d H:i:s" );
		
		//проверяем на корректность входных данных
		if ( $this->form_validation->run() == true ) {
			$status = "success";
			$this->news->add( $this->input->post("title"), $this->input->post("description"), $this->input->post("content"), $date, $this->input->post("image"), $this->input->post("category"), $message );
			redirect("../../../../../admin/news/");

		} else {
			$message = validation_errors();
		}
		
		//заполняем сохраненные поля, если произошло неудачное добавление
		if(!empty($_POST)) {
			foreach($_POST as $key => $value) {
				$this->smarty->assign($key, $value);
			}
		}

		$this->smarty->assign( "modulename", "Добавить новость" );
		$this->smarty->assign( "message", $message );
		$this->smarty->assign( "status", $status );
		$this->smarty->assign("categories", $this->categories->getAllCategories("news"));
		$this->smarty->view("newsform.tpl");
	}

	public function edit( $id = 0 ) {

		//получаем информацию о админ-аккаунте
		if($id == 0) redirect("../../../../../admin/news/");
		
		$data = $this->news->get($id);
		if($data == false) redirect("../../../../../admin/news/");
		
		$data["add_date"] = str_replace(" ", "T", $data["add_date"]); //обрабатываем дату для поля

		//валидация форм
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Заголовок', 'required');
		$this->form_validation->set_rules('description', 'Краткое описание', 'required');
		$this->form_validation->set_rules('content', 'Полное описание', 'required');
		$this->form_validation->set_rules("category", "Категория", "required");
		
		$message = ""; //сообщение
		
		$date = $this->input->post("add_date");
		$date = nice_date( $date, "Y-m-d H:i:s" );
		
		//проверяем на корректность входных данных
		if ( $this->form_validation->run() == true ) {
			if( $this->news->edit( $id, $this->input->post("title"), $this->input->post("description"), $this->input->post("content"), $date, $this->input->post("image"), $this->input->post("category"), $message ) ) {
				$status = "success";
				redirect("../../../../../admin/news/");
			} else {
				$status = "danger";	
			}
		} else {
			$status = "danger";
			$message = validation_errors();
		}
		
		//заполняем сохраненные поля, если произошло неудачное добавление
		if(!empty($_POST)) {
			foreach($_POST as $key => $value) {
				$this->smarty->assign($key, $value);
			}
		}

		$this->smarty->assign( "modulename", "Редактирование новости" );
		$this->smarty->assign( "status", $status );
		$this->smarty->assign( "message", $message );
		$this->smarty->assign("categories", $this->categories->getAllCategories("news"));
		$this->smarty->assign("data", $data);
		$this->smarty->view( "newsform.tpl" );

	}

}