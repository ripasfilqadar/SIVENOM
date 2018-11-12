<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kontrak extends MY_Controller{
  public $table_name = 'M_Kontrak';
  public $controller = 'kontrak';

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Kontrak');
    $this->load->model('M_Vendor');
    $this->load->model('M_User');
    $this->load->model('M_Laporan');
    $this->load->model('M_RefMaster');
    $this->load->helper('laporan_helper');
  }

  function index(){
    $this->GetData();
    parent::index();
  }

  function edit($id){
    $this->GetData();
    parent::edit($id);
  }

  function create(){
    if($this->IsVendor()){
      redirect('Welcome');
    }
    parent::create();
  }

  function GetData(Type $var = null)
  {
    $this->GetKontrak();
    $this->data['pegawais'] = $this->M_User->GetBy(array('VendorId' => NULL));
    $this->data['vendors'] = $this->M_User->GetVendor();
  }

  function detail($id){
    $this->data['id'] = $id;
    $this->data['kontrak'] = $this->M_Kontrak->GetKontrakById($id);
    $this->data['reports'] = $this->M_Laporan->GetLaporan($id);
    $this->data['refMaster'] = $this->M_RefMaster->GetBy(array('Type' => 'Laporan' ));

    $this->data['form'] = $this->load->view('laporan/form', $this->data, TRUE);
    $this->data['delete'] = $this->load->view('laporan/delete', $this->data, TRUE);
    $this->data['updateStatus'] = $this->load->view('kontrak/form-update-status', $this->data, TRUE);

    $this->load->view('header', $this->data);
		$this->load->view($this->controller.'/detail', $this->data);
		$this->load->view('footer');
  }

  function delete(){
    $id = $this->input->post('KontrakId');
    $this->M_Kontrak->Delete($id);
    redirect($this->controller,'refresh');
  }

  function GetKontrak(){
    if($this->current_user->IsVendor){
      $this->data['kontraks'] = $this->M_Kontrak->GetKontrakVendor($this->current_user->VendorId);
    } else {
      $this->data['kontraks'] = $this->M_Kontrak->GetKontrak();
    }

  }

}
?>