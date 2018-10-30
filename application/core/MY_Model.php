<?php
class MY_Model extends CI_Model {
	public $table;
	function __construct()
	{
	    parent::__construct();
	}
	function Create($data) {
	    $this->db->insert($this->table,$data);
	    return  $this->db->insert_id();
	}
	function Get() {
	    $query=$this->db->get($this->table);
	    return $query->result_array();
	}
	function GetById($id){
		$query = $this->db->get_where($this->table, array('Id' => $id));
		return $query->row_array();
	}
	function GetBy($data){
		$query=$this->db->get_where($this->table,$data);
		return $query->result_array();
	}
	function Update($id,$data) {
		$this->db->where(array('Id' => $id));
	  	$this->db->update($this->table, $data);
	}
	function Delete($id) {
		$this->db->delete($this->table, array('Id' => $id));
	}

}
?>