<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
* Контроллер, отвечающий за обратную связь
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class Feedback extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model("Main_starter_model", "starter");
		$this->load->model("Feedback_model", "feedback");
	}
	
	public function ajaxsend() {
	    if (!$this->input->is_ajax_request()) {
			show_404();
	    }
	    
	    $status = "error";
	    $message = "";
	    
	    $name = $this->input->post("name");
	    $email = $this->input->post("email");
	    $phone = $this->input->post("phone");
	    $text = $this->input->post("text");
	    
	    if(empty($name) || empty($email)) {
			$message = "Вы не заполнили все поля!";
	    } else {
		if($this->feedback->sendFeedbackMessage($name, $phone, $email, $text, $message) == true) {
		    $status = "success";
		} else {
		    $status = "error";
		}
	    }
	    
	    echo json_encode(array(
		"message" => $message,
		"status" => $status
	    ), JSON_UNESCAPED_UNICODE);
	}
}