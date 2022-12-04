<?php

class Users extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          }
    }
    public function index(){

        $data['sessionData'] = $this->session->userdata();
        $data['users'] = $this->common->getusers();
        
        $this->load->view('users', $data);
    }
    function SaveUsers(){
        $this->db->insert('cr_users',$this->input->post());
        echo "Successfully Added";
        
    }

}