<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Контроллер файлового менеджера
* 
* @author Mihairu <mis507@yandex.ru>
* @version 1.0
* @package controllers
*/
class Filemanager extends CI_Controller {
    
    public function __construct() {
	parent::__construct();
	$this->load->model("Admin_model", "admin");
	$this->load->model("AdminStarter_model", "starter");
	$this->load->model("FileManager_model", "filemanager");
	
	if(!empty($_POST)) {
	    switch($this->input->post("action")) {
		case "loadfile":
			if($this->filemanager->loadFile("public/filemanager/" . $this->input->get("dir"), $_FILES["loadfile"]["name"], $_FILES["loadfile"]["tmp_name"], $message)) {
			    $this->smarty->assign("status", "success");
			} else {
			    $this->smarty->assign("status", "danger");
			}
			$this->smarty->assign("message", $message);
			break;
		case "deletefile":
			if($this->filemanager->deleteFile($this->input->post("deletepath"), $message)) {
			    $this->smarty->assign("status", "success");
			} else {
			    $this->smarty->assign("status", "danger");
			}
			$this->smarty->assign("message", $message);
		    break;
		case "deletefolder":
			if($this->filemanager->deleteFolder($this->input->post("deletepath"), $message)) {
			    $this->smarty->assign("status", "success");
			} else {
			    $this->smarty->assign("status", "danger");
			}
			$this->smarty->assign("message", $message);
		    break;
		case "createfolder":
			if($this->filemanager->createFolder("public/filemanager/" . $this->input->get("dir"), $this->input->post("foldername"), $message)) {
			    $this->smarty->assign("status", "success");
			} else {
			    $this->smarty->assign("status", "danger");
			}
			$this->smarty->assign("message", $message);
		    break;
	    }
	}
	
	$this->smarty->assign("modulename", "Файловый менеджер");
	$this->smarty->assign("rootfolder", $this->filemanager->getRootFolder());
	$this->smarty->assign("dir", $this->input->get("dir"));
	$this->smarty->assign("updir", $this->filemanager->getUpDir($this->input->get("dir")));
    }

    public function index($format = "") {
	$this->smarty->assign("mode", "index");
	$this->smarty->assign("format", $format);
	
	$filesList = $this->filemanager->getFiles($this->input->get("dir"), 1, 1000, $format);
	$this->smarty->assign("fileslist", $filesList);
	$this->smarty->assign("itemscount", count($filesList));
	
	$this->smarty->view("filemanager.tpl");
    }
    
    public function window($format = "") {
	$this->smarty->assign("mode", "window");
	$this->smarty->assign("format", $format);
	
	$filesList = $this->filemanager->getFiles($this->input->get("dir"), 1, 1000, $format);
	$this->smarty->assign("fileslist", $filesList);
	$this->smarty->assign("itemscount", count($filesList));
	
	$this->smarty->view("filemanager.tpl");
    }
    
    public function ckeditor($format = "") {
	$this->smarty->assign("mode", "ckeditor");
	$this->smarty->assign("format", $format);
	
	$filesList = $this->filemanager->getFiles($this->input->get("dir"), 1, 1000, $format);
	$this->smarty->assign("fileslist", $filesList);
	$this->smarty->assign("itemscount", count($filesList));
	
	$this->smarty->view("filemanager.tpl");
    }
    
    public function upload() {
	
    }
    
    public function page() {
	$this->smarty->assign("modulename", "Файловый менеджер");
	$this->smarty->view("filemanagerpage.tpl");
    }
}