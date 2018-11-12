<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller{
  public $table_name = 'M_User';
  public $controller = 'user';
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_User');
  }

  function ChangePasswordView(){
    $this->load->view('header', $this->data);
		$this->load->view('user/change-password', $this->data);
		$this->load->view('footer');
  }

  function ChangePassword(){
    $data = $this->input->post();
    $user = $this->M_User->GetById($this->current_user->Id);

    if(strtoupper(MD5($data['OldPassword']) ) == strtoupper($user['Password']) && $data['NewPassword'] != ''){
      $this->M_User->Update($user['UserId'], array('Password' => MD5($data['NewPassword'])));
      $this->session->set_flashdata('success','Ubah Password Berhasil .');
      redirect('','refresh');
    } else{
      $this->session->set_flashdata('error','Ubah Password Gagal.');
      redirect('user/ChangePasswordView','refresh');
    }
  }
}
?>