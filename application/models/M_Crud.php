<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Crud extends CI_Model {
 //SELECT
  public function selectAll($where=0,$group=0,$order=0,$limit=0,$start=0)
  {
    if($group !=0){
      $this->db->group_by($group);
    }
    if($order !=0){
      $this->db->order_by($order['param'],$order['value']);
    }
    if($limit !=0){
                $this->db->limit($limit);
        }
        if($limit != 0 && $start != 0 ){
            $this->db->limit($limit,$start);
        }
  }

  public function selectCustom($select,$where=0,$group=0,$order=0,$limit=0,$start=0)
  {
    $this->db->select($select);
    if($group !=0){
      $this->db->group_by($group);
    }
    if($order !=0){
      $this->db->order_by($order['param'],$order['value']);
    }
    if($limit !=0){
                $this->db->limit($limit);
        }
        if($limit != 0 && $start != 0 ){
            $this->db->limit($limit,$start);
        }
  }

  //$mode = left,right,join,leftouter,rightouter
  public function tableJoin($table1,$table2,$param,$mode=0){
    if($mode!==0) $this->db->join($table2, $table2.".".$param['param2']."=".$table1.".".$param['param1'],$mode);
    else $this->db->join($table2, $table2.".".$param['param2']."=".$table1.".".$param['param1']);
  }

  public function exec($table){
    $query = $this->db->get($table);
    return $query->result_array();
  }

  public function exec_where($table,$where){
    $query = $this->db->get_where($table, $where);
    return $query->result_array();
  }

  //INSERT
    function insert($table,$data) {

        $ins = $this->db->insert($table, $data);
        //jika butuh id terakhir
        // echo $this->db->insert_id();
        return ($ins ? TRUE : FALSE);
    }
    function insert_pengguna($table,$data) {

        $ins = $this->db->insert($table, $data);
        if(!empty($_FILES)){
            $tmp_name = $_FILES['files']["tmp_name"][0];
            $filename = basename($_FILES['files']["name"][0]);
            $filetype = $_FILES['files']['type'][0];
            $ext = pathinfo($_FILES['files']["name"][0], PATHINFO_EXTENSION);
            $data2['FOTO']=$this->db->insert_id().'.'.$ext;
            $upt = $this->db->update($table, $data2, ['ID'=>$this->db->insert_id()]);
            $directori=FCPATH.'uploads\\'.$data2['FOTO'];

            $uploaded  = move_uploaded_file($tmp_name, $directori);

        }

        return ($ins ? TRUE : FALSE);
    }

    //UPDATE
    //cth penggunaan
    // $data=array('NAME' => 'WILLY','ALAMAT' => 'IDAWASAR')
    // $parameter=array('ID' => '1')
    function update($table,$parameter, $data) {
        $upd = $this->db->update($table, $data, $parameter);
        return ($upd ? TRUE : FALSE);
    }
    function update_pengguna($table,$parameter, $data) {

        $upd = $this->db->update($table, $data, $parameter);
        if(!empty($_FILES['files']["name"][0]) && $upd){
            $tmp_name = $_FILES['files']["tmp_name"][0];
            $filename = basename($_FILES['files']["name"][0]);
            $filetype = $_FILES['files']['type'][0];
            $ext = pathinfo($_FILES['files']["name"][0], PATHINFO_EXTENSION);
            $data2['FOTO']=$data['ID'].'.'.$ext;
            $upt = $this->db->update($table, $data2, $parameter);
            $directori=FCPATH.'uploads\\'.$data2['FOTO'];
            $uploaded  = move_uploaded_file($tmp_name, $directori);
        }
        return ($upd ? TRUE : FALSE);
    }

    //DELETE
    function delete($table,$param) {
        $del = $this->db->delete($table, $param);
        return ($del ? TRUE : FALSE);
    }
    private function upload_image()
    {
        $error=0;
        $uploads_dir = base_url().'uploads/';
       print_r($_FILES);
       die();
        if(isset($_FILES)){
            foreach ($_FILES as $key => $value) {
                $tmp_name = $_FILES[$key]["tmp_name"];
                $filename = basename($_FILES[$key]["name"]);
                $filetype = $_FILES[$key]['type'];
                $ext = pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION);
                echo $filename;die();
                $uploaded  = move_uploaded_file($tmp_name, "$uploads_dir/$insert_id");

                if(!$uploaded) {
                    $error++;
                }
                $data[$key]['ID']=$insert_id;
                $data[$key]['FILENAME']=$filename;
            }
        }
        if($error==0){
            return $data;
        }

        return null;
    }


}