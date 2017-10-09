<?php
/**
* Модель для управления категориями
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {
	
	public function getAllCategories($module = "news") {
	    return $this->db->get_where("categories", array(
		"module" => $module
	    ))->result_array();
	}
	
	public function getTotalCategoriesNum($module = "news") {
	    return $this->db->query("SELECT COUNT(*) AS count FROM categories WHERE module = '$module'")->row_array()["count"];
	}
	
	public function get($id = 0, $module = "news") {
	    $info = $this->db->get_where("categories", array(
		"id" => $id,
		"module" => $module
	    ), 1);
	    
	    if($info->num_rows() == 0) return false;
	    return $info->row_array();
	}
	
	public function getList($module = "news", $num = 30, $page = 1) {
	    $pageStart = $page * $num - $num;
	    $result = $this->db->query("SELECT * FROM categories WHERE module = '$module' ORDER BY id DESC LIMIT $pageStart, $num");
	    if($result->num_rows() == 0) return false;
	    return $result->result_array();
	}
	
	public function add($module = "news", $title = "", $seodescription = "", $seokeywords = "", &$message) {
	    $this->db->insert("categories", array(
		"title" => $title,
		"seodescription" => $seodescription,
		"seokeywords" => $seokeywords,
		"module" => $module
	    ));
	    
	    $message = "Категория успешно добавлена";
	    return true;
	}
	
	public function edit($id = 0, $module = "news",  $title = "", $seodescription = "", $seokeywords = "", &$message) {
	    $info = self::get($id);
	    if($info == false) return false;
	    $this->db->where(array(
		"id" => $id,
		"module" => $module
	    ))->update("categories", array(
		"module" => $module,
		"title" => $title,
		"seodescription" => $seodescription,
		"seokeywords" => $seokeywords
	    ));
	    $message = "Категория успешно отредактирована";
	    return true;
	}
	
	public function delete($id = 0) {
	    $info = self::get($id);
	    if($info == false) return false;
	    $this->db->where("id", $id)->delete("categories");
	    return true;
	}
	
}