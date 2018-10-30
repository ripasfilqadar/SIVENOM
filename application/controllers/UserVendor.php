<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserVendor extends MY_Controller{
  public $table_name = 'M_User';
  public $controller = 'user_vendor';
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Vendor');
  }

  function index()
  {
    $this->data['userVendor'] = $this->M_User->GetVendor();
    $this->data['vendors'] = $this->M_Vendor->Get();
    parent::index();
  }

  function create(){
    $this->data = $this->input->post();
    $this->data['Password'] = md5($this->input->post('Password'));
    $this->{$this->table_name}->Create($this->data);
    redirect($this->controller,'refresh');
  }
}
?>