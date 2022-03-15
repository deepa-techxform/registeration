<?php

class Register_model extends MY_Model {

  public function __construct() {
    parent::__construct();
    $this->table_name = "register";
   
  }
  public function users()
  {
  $this->db->select('register.*');

  return $this->db->get('register')->result();
  }
  public function delete_user($uId)
{

     $this->db->delete('register', array('register.id' =>  $uId));
}
public function single_user($uId)
{
$this->db->select('register.*');
$this->db->where('register.id', $uId);
return $this->db->get('register')->result();
}
}