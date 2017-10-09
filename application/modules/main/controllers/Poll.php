<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poll extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('poll_lib');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		
		$this->load->model( "Main_starter_model", "starter" );
	}
	
	public function index() {
		$this->smarty->assign("modulename", "Опросы");
		
		$list = $this->poll_lib->all_polls(100, 1);
		$this->smarty->assign("list", $list);
		$this->smarty->view("polls.tpl");
	}
	
}