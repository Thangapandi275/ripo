<?php

class Home extends Ci_Controller{
    public function __construct(){
        parent::__construct();
         $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          } 
        $this->load->model('loginmodel');
    }
    public function index(){

        $homedata['sessionData'] = $this->session->userdata();
        if(!empty($this->session->userdata('userId'))){
            $homedata['title'] = "Home";
            $this->load->view('home', $homedata);
        }else{
            redirect('login', 'refresh');
        }
        
    }

    public function funIsdelete(){
        //print_r($this->input->post());exit();

        $this->db->where($this->input->post('table_col'),$this->input->post('table_id'))->update($this->input->post('table'),array('IsDelete'=>1));
        
        echo "Deleted Successfully";
    }
}