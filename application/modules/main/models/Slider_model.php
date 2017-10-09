<?php
/**
* Модель для управления слайдером
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {
	
	
	public function getTotalNum() {
		return $this->db->query("SELECT COUNT(*) AS count FROM slider")->row_array()["count"];
	}
	
	public function getSlides() {
		$data = $this->db->query("SELECT * FROM slider ORDER BY id DESC");
		if( $data->num_rows() <= 0 ) return false;
		
		return $data->result_array();
	}
	
	public function get($id = 0) {
		$data = $this->db->query("SELECT * FROM slider WHERE id = '$id' LIMIT 1");
		
		if( $data->num_rows() == 0 ) {
			return false;
		}
		
		return $data->row_array();
	}
	
	public function add($image = "", $title = "", $caption = "", $link = "", &$message) {
		if(empty($date)) $date = date("Y-d-m H:i:s");
		
		
		$this->db->insert("slider", array(
			"image" => $image,
			"title" => $title,
			"caption" => $caption,
			"link" => $link
		));
		$message = "Слайд успешно добавлен";
		return true;
	}
	
	public function delete($id = 0) {
		$data = self::get($id);
		if( $data == false ) return false;
		
		$this->db->where("id", $id)->delete("slider");
		return true;
	}
	
	public function edit($id = 0, $image = "", $title = "", $caption = "", $link = "", &$message) {
		$data = self::get($id);
		if( $data == false ) {
			$message = "Слайд не найден";
			return false;
		}
		
		$this->db->where("id", $id)->update("slider", array(
			"image" => $image,
			"title" => $title,
			"caption" => $caption,
			"link" => $link
		));
		
		$message = "Слайд успешно отредактирован";
		return true;
	}
	
}