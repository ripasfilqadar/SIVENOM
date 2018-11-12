<?php
class M_Kontrak extends MY_Model
{
  public $table = 'kontrak';
  public $idName = 'KontrakId';
  function __construct()
	{
      parent::__construct();
  }

  function GetKontrak()
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->join('vendor', 'kontrak.VendorId = vendor.VendorId');
    $this->db->join('user', 'kontrak.UserId = user.UserId');
    $query = $this->db->get();
    return $query->result_array();
  }

  function GetKontrakVendor($vendorId)
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->where(array('kontrak.VendorId' => $vendorId));
    $this->db->join('vendor', 'kontrak.VendorId = vendor.VendorId');
    $this->db->join('user', 'kontrak.UserId = user.UserId');
    $query = $this->db->get();
    return $query->result_array();
  }

  function GetKontrakById($id)
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->where(array('KontrakId' => $id));
    $this->db->join('vendor', 'kontrak.VendorId = vendor.VendorId');
    $this->db->join('user', 'kontrak.UserId = user.UserId');
    $query = $this->db->get();
    return $query->row_array();
  }

  function Delete($id) {
		$this->db->delete($this->table, array('KontrakId' => $id));
  }

	function GetById($id){
		$query = $this->db->get_where($this->table, array('KontrakId' => $id));
		return $query->row_array();
  }

  function Update($id,$data) {
		$this->db->where(array('KontrakId' => $id));
	  	$this->db->update($this->table, $data);
	}
}

?>