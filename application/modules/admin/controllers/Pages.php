<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Контроллер, отвечающий за управление страницами сайта
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class Pages extends CI_Controller {

	/**
	* Конструктор
	* @return void
	*/

	public function __construct() {
		parent::__construct();
		$this->load->model("Admin_model", "admin");
		$this->load->model("AdminStarter_model", "starter");

		$this->load->model( "main/pages_model", "pages" );
	}

	public function index( $page = 1 ) {

		$perPage = 30; //количество строк на одну страницу

		//получаем админ-аккаунты
		$pages = $this->pages->getList( $perPage, $page );
		if( $pages == false && $page != 1 ) redirect_back();
		$pageslistnum = $this->pages->getTotalNum();

		//пагинация
		$this->load->library('pagination');
		$config['base_url'] = base_protocol() . base_url() . "/admin/pages/index";
		$config['total_rows'] = $pageslistnum;
		$config['per_page'] = $perPage;

		$this->pagination->initialize( $config ); 

		$this->smarty->assign( "modulename", "Управление страницами сайта" );
        $this->smarty->assign( "pagesnum", $pageslistnum );
		$this->smarty->assign( "pagination", $this->pagination->create_links() );
		$this->smarty->assign( "pageslist", $pages );
		$this->smarty->view( "pages.tpl" );

	}


	/**
	 * Удаление страниц
	 * @param  string $id Индентификаторы страниц через "-" без пробелов
	 * @return void
	 */
	public function delete($id = 1) {
		$ids = explode("-", $id);
		
		if(count($id) == 0 || $id == "undefined") {
			redirect("../../../../../admin/pages/");
			return false;
		}
		
		foreach($ids as $value) {
			$this->pages->delete($value);
		}
		redirect("../../../../../admin/pages/");
	}

	public function add() {

		//валидация форм
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Заголовок', 'required');
		$this->form_validation->set_rules('content', 'Содержимое страницы', 'required');
		$this->form_validation->set_rules('alias', 'Алиас', 'required');

		$message = ""; //сообщение
		$status = "danger"; //статус
		
		//проверяем на корректность входных данных
		if ( $this->form_validation->run() == true ) {
			if( $this->pages->add( $this->input->post("title"), $this->input->post("alias"), $this->input->post("metadescription"), $this->input->post("metakeywords"), $this->input->post("content"), $message ) ) {
				$status = "success";
				redirect("../../../../../admin/pages/");
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

		$this->smarty->assign( "modulename", "Добавить страницу" );
		$this->smarty->assign( "message", $message );
		$this->smarty->assign( "status", $status );
		$this->smarty->view("pagesform.tpl");
	}

	public function edit( $id = 0 ) {

		//получаем информацию о админ-аккаунте
		if($id == 0) redirect("../../../../../admin/pages/");
		
		$data = $this->pages->getById($id);
		if($data == false) redirect("../../../../../admin/pages/");
		
		foreach( $data as $key => $value ) {
			$this->smarty->assign( $key, $value );
		}

		//валидация форм
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Заголовок', 'required');
		$this->form_validation->set_rules('content', 'Содержимое страницы', 'required');
		$this->form_validation->set_rules('alias', 'Алиас', 'required');
		
		$message = ""; //сообщение
		//проверяем на корректность входных данных
		if ( $this->form_validation->run() == true ) {
			if( $this->pages->edit( $id, $this->input->post("title"), $this->input->post("alias"), $this->input->post("metadescription"), $this->input->post("metakeywords"), $this->input->post("content"), $message ) ) {
				$status = "success";
				redirect("../../../../../admin/pages/");
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

		$this->smarty->assign( "modulename", "Редактирование страницы");
		$this->smarty->assign( "status", $status );
        $this->smarty->assign( "message", $message );
		$this->smarty->assign( "pages", $this->pages->getTotalNum() );
		$this->smarty->view( "pagesform.tpl" );

	}

}