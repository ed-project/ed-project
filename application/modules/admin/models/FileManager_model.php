<?php

/**
* Модель файлового менеджера
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class FileManager_model extends CI_Model {
    const rootFolder = "public/filemanager";
    const formatsImagesFolder = "public/admin/images/formats/";
    
    private function is_image($path) {
	$a = @getimagesize($path);
	$image_type = $a[2];

	if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP))) {
	    return true;
	}
	return false;
    }
    
    //хелпер для управления изображениями из материалов
    public function loadFile( $foldername = "", $filename = "", $fileContent = "", &$message ) {
	    $path = "$foldername/$filename";
	    $path = str_replace("//", "/", $path);
	    if(file_exists($path)) {
		$message = "Файл $path уже существует";
		return false;
	    }
		if( !empty( $filename ) ) {
		    //проверяем папку на существование
		    if( !is_dir( $foldername ) ) {
			    $message = "Директории $foldername не существует";
			    return false;
		    }

		    $file = @file_get_contents( $fileContent );
		    file_put_contents( $path, $file );
		    $message = "Файл $filename успешно загружен";
		    return true;
		}
	}

	public function deletefile( $filePath = "", &$message ) {
		if( !file_exists( $filePath ) ) {
		    $message = "Файла $filePath не существует";
		    return false;
		}
		unlink( $filePath );
		$message = "Успешно удалено";
		return true;
	}
    
    public function getUpDir($path = "") {
	if(empty($path)) return false;
	$newPath = array();
	$path = explode("\\", $path);
	for($i = 0; $i <= count($path) - 3; $i++) {
	    $newPath[] = $path[$i];
	}
	
	return implode("/", $newPath);
    }
    
    public function createFolder($path = "", $name = "", &$message) {
	$fullPath = $path . "/" . $name;
	$fullPath = str_replace("//", "/", $fullPath);
	if(file_exists($fullPath)) {
	    $message = "Папка $fullPath уже существует";
	    return false;
	}
	
	mkdir($fullPath);
	$message = "Папка $fullPath успешно создана";
	return true;
    }
    
    public function deleteFolder( $folderPath = "", &$message ) {
		$this->load->helper("file"); //загружаем хелпер
		
		$folderPath = str_replace("\\", "", self::rootFolder . "/" . $folderPath);
		if( !file_exists( $folderPath ) ) {
		    $message = "Папки $folderPath не существует";
		    return false;
		}
		
		delete_files($folderPath, true);
		rmdir($folderPath);
		$message = "Успешно удалено";
		return true;
    }
    
    /**
     * Получение списка файлов
     * @param integer $page Текущая страница
     * @param integer $filesNum Количество выводимых файлов
     * @return array
     */
    public function getFiles($directory = "", $page = 1, $filesNum = 30, $format = "") {
	$this->load->helper("directory");
	$dir = self::rootFolder . "/" . $directory;
	$dirList = directory_map($dir); //список файлов в папке
	//получаем полную информацию о каждом файле в папке
	$filesList = array();
	foreach($dirList as $key => $value) {
	    $fileInfo = array();
	    if(is_array($value)) {
		$fileInfo["type"] = "folder";
		$fileInfo["name"] = stripslashes($key);
		$fileInfo["fullname"] = stripslashes($key);
		$fileInfo["path"] = $directory . $key;
		$fileInfo["abstractType"] = "folder";
		$fileInfo["typeimage"] = "/" . self::formatsImagesFolder . $fileInfo["type"] . ".png";
	    } else {
		$filePath = str_replace("//", "/", self::rootFolder . "/" . str_replace("\\", "", $directory) . "/" . $value);
		$subInfo = pathinfo($filePath);
		$fileInfo["path"] = $filePath;
		$fileInfo["name"] = $subInfo["filename"];
		$fileInfo["extension"] = $subInfo["extension"];
		$fileInfo["fullname"] = $value;
		$fileInfo["size"] = filesize($filePath);
		$fileInfo["mime"] = mime_content_type($filePath);
		$fileInfo["type"] = explode("/", $fileInfo["mime"])[0];
		$fileInfo["abstractType"] = "file";
		$fileInfo["typeimage"] = "/" . self::formatsImagesFolder . "/" . $fileInfo["type"] . ".png";
		
		if(self::is_image($filePath)) $fileInfo["type"] = "image";
	    }
	    if(empty($format)) {
		$filesList[] = $fileInfo;
	    } elseif($format == $fileInfo["type"] || $fileInfo["type"] == "folder") {
		$filesList[] = $fileInfo;
	    }
	}
	
	return $filesList;
    }
    
    public function getRootFolder() {
	return self::rootFolder;
    }
}