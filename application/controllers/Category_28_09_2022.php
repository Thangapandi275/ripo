<?php

class Category extends Ci_Controller{
    public function __construct(){
        parent::__construct();
         $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          } 
    }
    public function index(){

        $data['sessionData'] = $this->session->userdata();
        $data['categorys'] = $this->common->getCategories();
        
        $this->load->view('category', $data);
    }
    function SaveCategory(){
        $this->db->insert('cr_category',$this->input->post());
        echo "Successfully Added";
        
    }

}