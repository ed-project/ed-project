<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Модель для управлениями админ-аккаунтами
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package models
*/

class AdminAccounts_model extends CI_model {

    /**
    * Проверка на существование админ-аккаунта
    * @param int $case id админ-аккаунта
    * @return bool
    */
     
    public function exists( $case = 1 ) {
        if ($this->db->get_where('admin_users', array(
            'id' => $case
        ))->num_rows() == 0)
            return false;
        return true;
    }
	
	/**
	* Получение информации об админ-пользователе
	* @param int $id Идентификатор в базе пользователей
	* @return bool
	*/

	public function get( $id = 1 ) {

		$res = $this->db->get_where( "admin_users", array(
			"id" => $id
		) )->row_array();
		if( count( $res ) == 0 ) {
			return false;
		} else {
			return $res;
		}

	}
	
		
	/**
	* Получение информации об админ-пользователе через логин
	* @param string $login Логин пользователя
	* @return bool
	*/

	public function getByLogin( $login = "" ) {

		if( empty( $login ) ) return false;

		$res = $this->db->get_where( "admin_users", array(
			"login" => $login
		) )->row_array();
		if( count( $res ) == 0 ) {
			return false;
		} else {
			return $res;
		}

	}


    public function getAdminAccounts( $num = 50, $page = 1 ) {
        $pagenum = $num * $page - $num;
		if($pagenum < 0) return false;
        $query = $this->db->query("SELECT * FROM admin_users ORDER BY id DESC LIMIT $pagenum, $num")->result_array();
        if( count( $query ) == 0 ) return false;
        return $query;
    }

    public function getTotalAdminAcCountsNum() {
        return $this->db->query("SELECT COUNT(*) as count FROM admin_users")->row_array()["count"];
    }

    /**
    * Удаление админ-аккаунта
    * @param int $id Идентификатор админ-аккаунта
    * @param bool $status Статус админ-аккаунта
    * @return bool
    */
    public function delete( $id = 0 ) {
        if( $info = self::exists( $id ) ) {
            $this->db->delete( "admin_users", array(
                "id" => $id
            ) );
            return true;
        } else {
            return false;
        }
    }
	
	/**
	* Добавление админ-пользователя
	* @param string $login Логин администратора
	* @param string $password Пароль
	* @return bool
	*/

	public function add( $login = "", $password = "" ) {

		if( empty( $login ) || empty( $password ) ) return false;

		//обрабатываем входные данные
		$login = ltrim( str_replace( " ", "", $login ) );
		$salt = md5( mt_rand( 0, 99999999 ) );
		$password = md5( sha1( md5( $password . $salt ) ) );

		if( self::getByLogin( $login ) !== false ) return false;

		$this->db->insert("admin_users", array(
			"login" => $login,
			"salt" => $salt,
			"password" => $password
		) );

		return true;
	}
	
	/**
	* Редактирование админ-пользователя
	* @param string $login Логин администратора
	* @param string $password Пароль
	* @return bool
	*/

	public function edit( $id, $login = "", $password = "" ) {

		if( empty( $login ) || empty( $password ) ) return false;

		//обрабатываем входные данные
		$login = ltrim( str_replace( " ", "", $login ) );
		$salt = md5( mt_rand( 0, 99999999 ) );
		$password = md5( sha1( md5( $password . $salt ) ) );

		if( self::getByLogin( $login ) !== false ) return false;

		$this->db->where( "id", $id )->set( array(
			"login" => $login,
			"salt" => $salt,
			"password" => $password
		) )->update("admin_users");

		return true;
	}


}