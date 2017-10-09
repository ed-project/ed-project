<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Контроллер, отвечающий за управление админ-аккаунтами
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class Adminaccounts extends CI_Controller {

	/**
	* Конструктор
	* @return void
	*/

	public function __construct() {
		parent::__construct();
		$this->load->model("Admin_model", "admin");
		$this->load->model("AdminStarter_model", "starter");

		$this->load->model( "AdminAccounts_model", "adminaccounts" );
	}

	public function index( $page = 1 ) {

		$pernum = 50; //количество строк на одну страницу

		//получаем админ-аккаунты
		$adminaccounts = $this->adminaccounts->getadminaccounts( $pernum, $page );
		if( $adminaccounts == false && $page != 1 ) redirect_back();
		$adminaccountslistnum = $this->adminaccounts->getTotalAdminAcCountsNum();

		//пагинация
		$this->load->library('pagination');
		$config['base_url'] = base_protocol() . base_url() . "/admin/adminaccounts/index";
		$config['total_rows'] = $adminaccountslistnum;
		$config['per_page'] = $pernum;

		$this->pagination->initialize( $config ); 

		$this->smarty->assign( "modulename", "Управление админ-аккаунтами" );
        $this->smarty->assign( "adminaccountsnum", $adminaccountslistnum );
		$this->smarty->assign( "pagination", $this->pagination->create_links() );
		$this->smarty->assign( "adminaccountslist", $adminaccounts );
		$this->smarty->view( "adminaccounts.tpl" );

	}


	/**
	 * Удаление админ-аккаунтов
	 * @param  string $id Индентификаторы аккаунтов через "-" без пробелов
	 * @return void
	 */
	public function delete( $id = "" ) {
		$accnum = $this->adminaccounts->getTotalAdminAcCountsNum();
		
		$ids = explode( "-", $id );
		if( ( $accnum > 1 ) && count( $ids ) !== $accnum ) {
			foreach( $ids as $value ) {
				$this->adminaccounts->delete( $value );
			}
		}
		redirect("../../../../../admin/adminaccounts/");
	}

	public function add() {

		//валидация форм
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login', 'Логин', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');

		$message = ""; //сообщение
		//проверяем на корректность входных данных
		if ( $this->form_validation->run() == true ) {

			$this->adminaccounts->add( $this->input->post("login"), $this->input->post("password") );
			redirect("../../../../../admin/adminaccounts/");

		} else {
			$message = validation_errors();
		}

		$this->smarty->assign( "modulename", "Добавить админ-аккаунт" );
		$this->smarty->assign( "message", $message );
		$this->smarty->view("adminaccountsform.tpl");
	}

	public function edit( $id = 0 ) {

		//получаем информацию о админ-аккаунте
		$data = $this->adminaccounts->get( $id );
		if( $data == false ) redirect("../../../../admin/adminaccounts/");

		//записываем данные для представления
		$this->smarty->assign( "login", $data["login"] );
		$this->smarty->assign( "password", $data["password"] );

		//валидация форм
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login', 'Логин', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');

		$message = ""; //сообщение
		//проверяем на корректность входных данных
		if ( $this->form_validation->run() == true ) {

			$this->adminaccounts->edit( $id, $this->input->post("login"), $this->input->post("password") );
			redirect("../../../../../admin/adminaccounts/");

		} else {
			$message = validation_errors();
		}

		$this->smarty->assign( "modulename", "Редактирование админ-аккаунта #" . $id );
        $this->smarty->assign( "message", $message );
		$this->smarty->assign( "adminaccounts", $this->adminaccounts->getTotalAdminAcCountsNum() );
		$this->smarty->view( "adminaccountsform.tpl" );

	}

}