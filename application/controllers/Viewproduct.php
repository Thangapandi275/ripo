<?php

class Product extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          }
    }
    public function index(){
        $data['sessionData'] = $this->session->userdata();
        $data["products"] = $this->common->getproducts();
        // print_r($data);die;
        $this->load->view('viewproduct', $data);
    }
}