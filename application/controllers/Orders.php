<?php

class Orders extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        // $this->load->model('loginmodel');
        $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          }
    }
    public function index(){
        $this->load->view('orders');
    }
}