<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model( "Main_starter_model", "starter" );
	}
	
	public function index() {
		$this->smarty->view( "index.tpl" );
	}
	
}