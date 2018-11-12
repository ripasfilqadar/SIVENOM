<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserPegawai extends MY_Controller{
  public $table_name = 'M_User';
  public $controller = 'UserPegawai';
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Vendor');
    if($this->IsVendor()){
      redirect('Welcome');
    }
  }

  function index()
  {
    $this->data['userPegawai'] = $this->M_User->GetBy(array('VendorId ' => NULL));
    parent::index();
  }

  function create(){
    $this->data = $this->input->post();
    $this->data['Password'] = md5($this->input->post('Password'));
    $this->{$this->table_name}->Create($this->data);
    redirect('UserPegawai','refresh');
  }
}
?>