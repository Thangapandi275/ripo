<?php

class Createorder extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        // $this->load->model('loginmodel');
    }
    public function index(){
        // if(!empty($this->session->userdata('userId'))){
        //     $homedata['title'] = "Home";
            $this->load->view('createorder');
        // }else{
            // redirect('login', 'refresh');
        // }
        
    }

    public function createneworder(){
        $myrespdata = $this->input->post();

        echo count($myrespdata);
        echo "<br />";
        print_r($myrespdata);
        die;
        // foreach()
        print_r($myrespdata);die;
    }
}