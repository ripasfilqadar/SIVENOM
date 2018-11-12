<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendor extends MY_Controller{
  public $table_name = 'M_Vendor';
  public $controller = 'vendor';
  public function __construct()
  {
    parent::__construct();
    if($this->IsVendor()){
      redirect('Welcome');
    }
  }
}
?>