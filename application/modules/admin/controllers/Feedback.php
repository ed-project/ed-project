<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Admin_model", "admin");
		$this->load->model("AdminStarter_model", "starter");

		$this->load->model( "main/Feedback_model", "feedback" );
	}
	
	public function index($page = 1) {
	    $perPage = 30; //количество строк на одну страницу

	    $feedback = $this->feedback->getList($perPage, $page);
	    if( $feedback == false && $page != 1 ) redirect_back();
	    $feedbackListNum = $this->feedback->getTotalMessagesNum();

	    //пагинация
	    $this->load->library('pagination');
	    $config['base_url'] = base_protocol() . base_url() . "/admin/feedback/index/";
	    $config['total_rows'] = $feedbackListNum;
	    $config['per_page'] = $perPage;

	    $this->pagination->initialize( $config ); 

	    $this->smarty->assign( "modulename", "Сообщения обратной связи" );
	    $this->smarty->assign( "feedbacknum", $feedbackListNum );
	    $this->smarty->assign( "pagination", $this->pagination->create_links() );
	    $this->smarty->assign( "feedbacklist", $feedback );
	    $this->smarty->view( "feedback.tpl" );
	}
	
	public function delete($id = "") {
		$ids = explode("-", $id);
		
		if(count($id) == 0 || $id == "undefined") {
			redirect("../../../../../admin/feedback/");
			return false;
		}
		
		foreach($ids as $value) {
			$this->feedback->delete($value);
		}
		redirect("../../../../../admin/feedback/"); 
	}
}
