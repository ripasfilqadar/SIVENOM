<?php

class M_User extends MY_Model
{
  public $table = 'user';
  public $idName = 'UserId';
  public $NIP, $VendorId, $Id, $Nama, $Email, $IsVendor, $Role;
  function __construct($argument = []) {
		parent::__construct();
		if (count($argument) > 0) {
			$this->NIP = $argument['NIP'];
			$this->Nama = $argument['Nama'];
			$this->Id = $argument['UserId'];
			$this->Email = $argument['Email'];
      $this->VendorId = $argument['VendorId'];
      $this->Role = isset($argument['VendorId']) ? 'Vendor' : 'Pegawai';
		}
	}

  public function check_db(){
		$email=$this->input->post('Email');
    $password=md5($this->input->post('Password'));
    $user = $this->GetBy(array('Email' => $email, 'Password' => $password));
		return $user;
	}

  public function GetVendor($vendorId = null)
  {
    $this->db->select('*');
    $this->db->from('user');
    if($vendorId != null){
      $this->db->where(array('user.VendorId' => $vendorId));
    }
    $this->db->join('vendor', 'user.VendorId = vendor.VendorId');
    $query = $this->db->get();
    return $query->result_array();
  }

  function IsVendor()
  {
    return $this->Role == 'Vendor';
  }


}

?>