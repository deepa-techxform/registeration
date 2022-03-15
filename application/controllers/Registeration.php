<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registeration extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Register_model');
  $this->load->library('form_validation');
//   $this->load->library('encryption');

 }
	
 public function index()
 {
  
 
 
     $this->load->view('register_form');
    
 }


 public function create_form()
 {
  $this->load->library(array('form_validation'));
  $this->form_validation->set_rules('username', 'Name', 'trim');
  $this->form_validation->set_rules('email', 'Email', 'trim|required');
  $this->form_validation->set_rules('psw', 'Designation', 'trim|required');
  $this->form_validation->set_rules('phone', 'Designation', 'trim|required');

  if ($this->form_validation->run() === TRUE) {

  
    $post_data = array(
      
                
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('psw'),
      'phone' => $this->input->post('phone'),

  );
  // print_r($post_data);
  // exit();

$id = $this->Register_model->create($post_data);

// *****************Mailing****************** 

  }
  
     $this->load->view('user_list');
   
 }
 
}
