<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index()
    {
        if(is_null($this->session->userdata('user'))) $this->load->view('login/index');
        else redirect('Welcome');
    }

    public function proses_login(){
        $this->load->database();
        $this->load->model('M_User');
        $user = $this->M_User->check_db();
        if(!empty($user)) {
            $session['user'] = $user[0];
            $this->session->set_userdata($session);
            redirect('Welcome');
        }else{
            $this->session->set_flashdata('pesan','Maaf Username Atau Password Salah .');
            redirect('','refresh');
        }
    }


}