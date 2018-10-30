<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(is_null($this->session->userdata('user'))) redirect('Login');
  }
	public function index()
	{
		$this->session->unset_userdata('user');
		session_destroy();
		redirect('Login','refresh');
	}

}