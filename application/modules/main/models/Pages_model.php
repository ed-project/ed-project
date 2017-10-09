<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {
	
	public function getTotalNum() {
		return $this->db->query("SELECT COUNT(*) as count FROM pages")->row_array()["count"];
	}
	
	public function getList( $num = 30, $page = 1 ) {
		$pageStart = $page * $num - $num;
		if($pageStart < 0) return false;
		
		$data = $this->db->order_by("id", "DESC")->get("pages", $pageStart, $num);
		if( $data->num_rows() <= 0 ) return false;
		
		return $data->result_array();
	}
	
	public function getById($id = 0) {
		$data = $this->db->get_where( "pages", array(
			"id" => $id
		), 1 );
		
		if( $data->num_rows() == 0 ) {
			return false;
		}
		return $data->row_array();
	}
	
	public function getByAlias($alias = "") {
		$data = $this->db->get_where( "pages", array(
			"alias" => $alias
		), 1 );
		
		if( $data->num_rows() == 0 ) {
			return false;
		}
		return $data->row_array();
	}
	
	public function add($title = "", $alias = "", $metadescription = "", $metakeywords = "", $content = "", &$message) {
		$this->db->insert("pages", array(
			"title" => $title,
			"metadescription" => $metadescription,
			"metakeywords" => $metadescription,
			"content" => $content,
			"alias" => $alias
		));
		$message = "Страница успешно добавлена";
		return true;
	}
	
	public function delete($id = 0) {
		$data = self::getById($id);
		if( $data == false ) return false;
		
		$this->db->where("id", $id)->delete("pages");
		return true;
	}
	
	public function edit($id = 0, $title = "", $alias = "", $metadescription = "", $metakeywords = "", $content = "", &$message) {
		$data = self::getById($id);
		if( $data == false ) {
			$message = "Страница не найдена";
			return false;
		}
		
		$this->db->where("id", $id)->update("pages", array(
			"title" => $title,
			"metadescription" => $metadescription,
			"metakeywords" => $metadescription,
			"content" => $content,
			"alias" => $alias
		));
		$message = "Страница успешно отредактирована";
		return true;
	}

}