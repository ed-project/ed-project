<?php

/**
* Модель, которая отвечает за установку начальных настроек при открытии того или иного контроллера
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package models
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminstarter_model extends CI_Model {

	public function __construct() {
		//устанавливаем папку шаблонов
        $this->smarty->template_dir = APPPATH . "/modules/admin/views/templates";
        $this->smarty->compile_dir = APPPATH . "/modules/admin/views/templates_c";

        //куки данные для проверки на вход
        $login = get_cookie("admin_login");
        $password = get_cookie("admin_password");

        //определяем, куда редиректить
		if( $this->router->fetch_method() !==  "login" ) {
			if( empty( $login ) || empty( $password ) ) {
				redirect(base_protocol() . base_url() . "admin/login");
				return false;
			} elseif( !$this->admin->login( $login, $password ) ) {
				redirect(base_protocol() . base_url() . "admin/login");
				return false;
			}
		} else {
			if( empty( $login ) || empty( $password ) ) {
				
			} elseif( $this->admin->login( $login, $password ) ) {
				redirect("../../admin/index");
				return false;
			}
		}

		//прописываем общие переменные, которые могут быть испоьзованы во всех модулях
		$this->smarty->assign( "siteurl", base_protocol() . base_url() );
		$this->smarty->assign( "baseurl", substr( base_url(), 0, -1 ) );
		$this->smarty->assign( "baseprotocol", base_protocol() );
		$this->smarty->assign( "time", date( "H:i:s" ) );
		$this->smarty->assign( "date", date( "Y.m.d" ) );
		$this->smarty->assign( "year", date("Y") );
		$this->smarty->assign( "username", get_cookie("admin_login") );
		$this->smarty->assign( "imgfolder", $this->config->item("imgfolder") );
		$this->smarty->assign( "ip", $this->input->ip_address() );
		$this->smarty->assign( "version", "1.0" );
		$this->smarty->assign("GET", $_GET);
		$this->smarty->assign("POST", $_POST);
		
		return true;

	}
	
	public function getLogs($col = 50) {
	    $file = file("base.log");
	    $logs = array();
	    
	    if($col > sizeof($file)) $col = sizeof($file);
	    
	    for($si = sizeof($file) - 1; $si + 1 > sizeof($file) - $col; $si--) {
		$logs[] = explode( "|", $file[$si] );
	    }
	    
	    return array(
		"count" => sizeof($file),
		"logs" => $logs
	    );
	}

}