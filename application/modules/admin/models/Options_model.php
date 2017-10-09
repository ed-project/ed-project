<?php

/**
* Модель для управления настройками
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package models
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Options_model extends CI_Model {

	public function save( $post = array(), $configname = "", &$message ) {
		
		$file = ""; //содержимое файла конфига
		$file .= "<?php\n";
		$file .= "\tdefined('BASEPATH') OR exit('No direct script access allowed');\n";
		
		foreach( $post as $key => $value ) {
			$file .= "\t\$config['$key'] = '$value';\n";
			$this->config->set_item( $key, $value );
		}
		
		file_put_contents( APPPATH . "config/$configname.php", $file );
		$message = "Настройки успешно сохранены";
		return true;
	}
	

}