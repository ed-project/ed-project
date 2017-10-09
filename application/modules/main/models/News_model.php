<?php
/**
* Модель для управления новостями
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	public function getTotalNum() {
		return $this->db->query("SELECT COUNT(*) AS count FROM news")->row_array()["count"];
	}
	
	public function getList( $num = 30, $page = 1 ) {
		$pageStart = $page * $num - $num;
		if($pageStart < 0) return false;
		
		$data = $this->db->query("SELECT COALESCE( 
                    ( 
                    SELECT Count(id) 
                    FROM   comments 
                    WHERE  matid = news.id), 0) AS commentsnum, 
		    news.id                               AS id, 
		    news.title                            AS title, 
		    news.description                      AS description, 
		    news.content                          AS content, 
		    news.add_date                         AS add_date, 
		    news.image                            AS image, 
		    news.category_id                      AS category_id, 
		    news.views                            AS views, 
		    categories.title                      AS category_title, 
		    categories.seodescription             AS category_seodescription, 
		    categories.seokeywords                AS category_seokeywords, 
		    users.first_name                      AS author_first_name, 
		    users.last_name                       AS author_last_name, 
		    users.id                              AS author_id, 
		    users.nickname                        AS author_nickname 
		    FROM      news 
		    LEFT JOIN categories 
		    ON        categories.id = news.category_id 
		    LEFT JOIN users 
		    ON        news.authorid = users.id 
		    ORDER BY  id DESC limit $pageStart, $num");
		if( $data->num_rows() <= 0 ) return false;
		
		return $data->result_array();
	}
	
	public function get($id = 0) {
		$data = $this->db->query("SELECT Coalesce((SELECT Count(id) 
		    FROM   comments 
		    WHERE  matid = news.id), 0) AS commentsnum, 
		    news.id                               AS id, 
		    news.title                            AS title, 
		    news.description                      AS description, 
		    news.content                          AS content, 
		    news.add_date                         AS add_date, 
		    news.image                            AS image, 
		    news.category_id                      AS category_id, 
		    news.views                            AS views, 
		    categories.title                      AS category_title, 
		    categories.seodescription             AS category_seodescription, 
		    categories.seokeywords                AS category_seokeywords, 
		    users.first_name                      AS author_first_name, 
		    users.last_name                       AS author_last_name, 
		    users.id                              AS author_id, 
		    users.nickname                        AS author_nickname 
		    FROM   news 
		    LEFT JOIN categories 
			   ON categories.id = news.category_id 
		    LEFT JOIN users 
			   ON news.authorid = users.id 
		    WHERE  news.id = $id 
		    LIMIT  1 ");
		
		if( $data->num_rows() == 0 ) {
			return false;
		}
		
		return $data->row_array();
	}
	
	public function add($title = "", $description = "", $content = "", $date = "", $image = "", $categoryid = NULL, &$message) {
		if(empty($date)) $date = date("Y-d-m H:i:s");
		
		if($categoryid == "NULL") $categoryid = null;
		
		$this->db->insert("news", array(
			"title" => $title,
			"description" => $description,
			"content" => $content,
			"add_date" => $date,
			"image" => $image,
			"category_id" => $categoryid
		));
		$message = "Новость успешно добавлена";
		return true;
	}
	
	public function delete($id = 0) {
		$data = self::get($id);
		if( $data == false ) return false;
		
		$this->db->where("id", $id)->delete("news");
		return true;
	}
	
	public function edit($id = 0, $title = "", $description = "", $content = "", $date = "", $image = "", $categoryid = NULL, &$message) {
		$data = self::get($id);
		if( $data == false ) {
			$message = "Новость не найдена";
			return false;
		}
		
		if(empty($date)) $date = date("Y-d-m H:i:s");
		
		if($categoryid == "NULL") $categoryid = null;
		
		$this->db->where("id", $id)->update("news", array(
			"title" => $title,
			"description" => $description,
			"content" => $content,
			"add_date" => $date,
			"image" => $image,
			"category_id" => $categoryid
		));
		
		$message = "Новость успешно отредактирована";
		return true;
	}

	public function searchNews($query = "", $num = 30, $page = 1) {
		if(empty($query)) return false;
		$pageStart = $page * $num - $num;
		if($pageStart < 0) return false;
		return $this->db->query("SELECT * FROM news WHERE title LIKE '%$query%' LIMIT $pageStart, $num")->result_array();
	}
	
	public function getTotalSearchNewsNum($query = "") {
		if(empty($query)) return false;
		return $this->db->query("SELECT COUNT(*) AS count FROM news WHERE title LIKE '%$query%'")->row_array()["count"];	
	}
	
	public function incView($id = 0) {
	    if(self::get($id) == false) return false;
	    $this->db->query("UPDATE news SET views = views + 1 WHERE id = '$id'");
	    return true;
	}
	
}