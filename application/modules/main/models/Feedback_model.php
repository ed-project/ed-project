<?php

/**
* Модель для формы обратной связи
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model {
    
    public function __construct() {
	$config = array(
	    "protocol" => "smtp",
	    "smtp_host" => $this->config->item("smtp_host"),
	    "smtp_port" => $this->config->item("smtp_port"),
	    "smtp_user" => $this->config->item("smtp_user"),
	    "smtp_pass" => $this->config->item("smtp_pass"),
	    "mailtype"  => $this->config->item("smtp_mailtype"), 
	    "charset"   => $this->config->item("smtp_charset")
	);
	$this->load->library("email", $config);
    }
    
    public function getList( $num = 50, $page = 1 ) {
		$pageStart = $page * $num - $num;
		if($pageStart < 0) return false;
		
		$data = $this->db->order_by("id", "DESC")->get("feedback", $num, $pageStart);
		if( $data->num_rows() <= 0 ) return false;
		
		return $data->result_array();
    }
    
    public function sendMessage($emailTo = "", $title = "", $text = "", &$message) {
	    $this->email->from($this->config->item("smtp_user"), $this->config->item("smtp_fromname"));
	    $this->email->to($this->config->item("smtp_user")); 
	    $this->email->subject($title);
	    $this->email->message($text);  
	    $this->email->send();

	    $message = "Сообщение успешно отправлено";
	    return true;
    }
    
    private function validateMobilePhone($phone = "") {
	if($phone == "") return false;
	$pattern = '/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/';
	if(preg_match($pattern, $phone)) {
	    return true;
	} else {
	    return false;
	}
    }
    
    public function sendFeedbackMessage($name = "", $phone = "", $email = "", $text = "", &$message) {
	if((!empty($phone)) && (self::validateMobilePhone($phone) == false)) {
	    $message = "Некорректный номер телефона";
	    return false;
	}
	
	//добавляем сообщение в базу данных
	$this->db->insert("feedback", array(
	    "name" => $name,
	    "phone" => $phone,
	    "email" => $email,
	    "message" => $text
	));
	
	$text = htmlspecialchars($text);
	
	//отправляем сообщение
	$fullmessage = "<div style='border: #444 3px solid; width:100%;padding:10px;'>"
		. "<h3>Новое сообщение</h3>"
		. "<ul>"
		. "<li><b>Имя:</b> $name"
		. "<li><b>Телефон:</b> $phone"
		. "<li><b>Почта:</b> $email"
		. "</ul>"
		. "$text"
		. "</div>";
	
        $this->email->from($this->config->item("smtp_user"), $this->config->item("smtp_fromname"));
        $this->email->to($this->config->item("smtp_user")); 
        $this->email->subject("Новое сообщение.");
        $this->email->message($fullmessage);  
        $this->email->send();

	$message = "Сообщение успешно отправлено";
	return true;
    }
    
    public function getTotalMessagesNum() {
	    return $this->db->query("SELECT COUNT(*) AS count FROM feedback")->row_array()["count"];
    }
    
    public function get($id = 0) {
	    $info = $this->db->get_where("feedback", array(
		"id" => $id
	    ), 1);
	    
	    if($info->num_rows() == 0) return false;
	    return $info->row_array();
    }
    
    public function delete($id = 0) {
	    $info = self::get($id);
	    if($info == false) return false;
	    $this->db->where("id", $id)->delete("feedback");
	    return true;
    }
}
