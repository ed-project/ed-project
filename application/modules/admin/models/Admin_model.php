<?php

/**
* Модель для управления админ-пользователями
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


	/**
	* Авторизация пользователя
	* @param string $login Логин администратора
	* @param string $password Пароль
	* @return bool
	*/

	public function login( $login = "", $password = "" ) {

		if( empty( $login ) || empty( $password ) ) return false;

		$login = ltrim( str_replace( " ", "", $login ) );
		$info = $this->db->get_where("admin_users", array(
			"login" => $login
		))->row_array(); //получаем инфу о пользователе для проверки на пароль

		if( count( $info ) == 0 ) return false;

		if( md5( sha1( md5( $password . $info["salt"] ) ) ) == $info["password"] ) {
			return true;
		} else {
			return false;
		}

	}
	
	public function getSystemInfo() {
	    
	}

}