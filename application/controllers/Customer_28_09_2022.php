<?php

class Customer extends Ci_Controller{
    public function __construct(){
        parent::__construct();
         $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          } 
    }
    public function index(){

        $data['sessionData'] = $this->session->userdata();
        $data['customers'] = $this->common->getcustomers();
        
        $this->load->view('customer', $data);
    }
    function SaveCustomer(){
        $this->db->insert('cr_customer',$this->input->post());
        echo "Successfully Added";
        
    }

}