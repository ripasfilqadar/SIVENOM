<?php
class M_Laporan extends MY_Model
{
  public $table = 'laporan';
  function __construct()
	{
      parent::__construct();
  }

  function GetLaporan($id)
  {
    $this->db->select('*');
    $this->db->from('laporan');
    $this->db->where(array('KontrakId' => $id));
    $this->db->join('refmaster', 'laporan.status = refmaster.id');
    $query = $this->db->get();
    return $query->result_array();
  }

  function GetById($id){
		$query = $this->db->get_where($this->table, array('LaporanId' => $id));
		return $query->row_array();
	}

	function Update($id,$data) {
		$this->db->where(array('LaporanId' => $id));
	  	$this->db->update($this->table, $data);
	}
}

?>