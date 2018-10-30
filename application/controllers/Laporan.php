<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends MY_Controller{
  public $table_name = 'M_Laporan';
  public $controller = 'laporan';

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Kontrak');
    $this->load->model('M_Vendor');
    $this->load->model('M_User');
    $this->load->model('M_Laporan');
  }

  function CreateLaporan($id){
    $data = $this->input->post();
    $data['Status'] = 1;
    $data['KontrakId'] = $id;
    $this->M_Laporan->Create($data);

    redirect('Kontrak/detail/'.$id, 'refresh');

  }

  function Update($id){
    $data = $this->input->post();
    $dataKontrak = $this->M_Laporan->GetBy(array('LaporanId' => $id))[0];
    $data['KontrakId'] = $dataKontrak['KontrakId'];
    $this->db->where(array('LaporanId' => $id));
    $this->db->update('laporan', $data);
    redirect('Kontrak/detail/'.$dataKontrak['KontrakId']);
  }


  function edit($id){
    $this->data['data'] = $this->{$this->table_name}->GetBy(array('LaporanId'=>$id))[0];
    $this->data['isEdit'] = true;
    $this->data['id'] = $id;
    $this->data['form'] = $this->load->view($this->controller.'/form', $this->data, TRUE);
    $this->load->view('header', $this->data);
		$this->load->view($this->controller.'/edit', $this->data);
		$this->load->view('footer');
  }

  function delete(){
    $id = $this->input->post('LaporanId');
    $data = $this->M_Laporan->GetBy(array('LaporanId' => $id))[0];

    $this->db->delete('laporan', array('LaporanId' => $id));

    redirect('kontrak/detail/'.$data['KontrakId'],'refresh');
  }

  function updateStatus(){
    $params = $this->input->post();
    $laporan = $this->M_Laporan->GetById($params['LaporanId']);
    $laporan['Status'] = $params['Status'];
    $this->M_Laporan->Update($params['LaporanId'], $laporan);

    redirect('kontrak/detail/'.$laporan['KontrakId'],'refresh');

  }
}
?>