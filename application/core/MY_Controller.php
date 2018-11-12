<?php
class MY_Controller extends CI_Controller {
  public $current_user;
  public $controller;
  public $table_name, $data;
	function __construct()
	{
      parent::__construct();
      $this->load->model('M_User');
      if(is_null($this->session->userdata('user'))) {
        redirect('Login');
      }else{
        $this->current_user = new M_User($this->session->userdata('user'));
        $this->data['current_user'] = $this->current_user;
      }
      $this->load->database();
      $this->load->model($this->table_name);
  }

  function index(){
    $this->data['data'] = $this->{$this->table_name}->Get();
    $this->data['form'] = $this->load->view($this->controller.'/form', NULL, TRUE);
    $this->data['delete'] = $this->load->view($this->controller.'/delete', NULL, TRUE);
    $this->load->view('header', $this->data);
		$this->load->view($this->controller.'/index', $this->data);
		$this->load->view('footer');
  }

  function create(){
    $this->data = $this->input->post();
    $this->{$this->table_name}->Create($this->data);
    redirect($this->controller,'refresh');
  }

  function edit($id){
    $this->data['data'] = $this->{$this->table_name}->GetById($id);
    $this->data['isEdit'] = true;
    $this->data['id'] = $id;
    $this->data['form'] = $this->load->view($this->controller.'/form', $this->data, TRUE);
    $this->load->view('header', $this->data);
		$this->load->view($this->controller.'/edit', $this->data);
		$this->load->view('footer');
  }
  function update($id){
    $this->data = $this->input->post();
    $this->{$this->table_name}->Update($id, $this->data);
    redirect($this->controller.'/index');
  }

  function delete(){
    $id = $this->input->post('Id');
    
    $this->{$this->table_name}->Delete($id);
    redirect($this->controller,'refresh');

  }

  function IsVendor(){
    return $this->current_user->VendorId != null;
  }
}
?>