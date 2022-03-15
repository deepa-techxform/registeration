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
  $this->data['users'] = $this->Register_model->users();
     $this->load->view('user_list',$this->data);
   
 }
 public function delete($id)
 {
   

     $uId = $id;

      $this->Register_model->delete_user($uId);
      $this->data['users'] = $this->Register_model->users();
      $this->load->view('user_list',$this->data);

 
 }
 public function edit($id)
 {
   

     $uId = $id;
     $this->data['uId']=$uId ;
      
      $this->data['user'] = $this->Register_model->single_user($uId);
      $this->load->view('edit_form',$this->data);

 
 }
 public function update_form($uId)
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

  $this->Register_model->update($post_data, $uId);

  $this->data['users'] = $this->Register_model->users();
  $this->load->view('user_list',$this->data);

  }
  
   
 }
 
}
