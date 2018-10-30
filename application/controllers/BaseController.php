<?php
class BaseController extends CI_Controller
{
  public $logged_user;

  public function __construct()
  {
    parent::__construct();
    $this->logged_user = $_SESSION['user'];
  }
}
?>