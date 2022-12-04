<?php

class Login extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('loginmodel');
    }
    public function index(){
        $this->load->view('login');
    }

    function logincheck(){
        $data = $this->input->post();
        $username = $data['email_address'];
        $password = $data['password'];

        $login_response = $this->loginmodel->logincheck($username);

        if($login_response['isActive'])
        {
            $newdata = array(
                'userId'    => $login_response['id'],
                'userEmail' => $login_response['username'],
                'userIsActive' => TRUE,
            );
        } else {
            $newdata = array(
                'userId'    => $login_response['id'],
                'userEmail' => $login_response['username'],
                'userIsActive' => False
            );
        }
    
        $this->session->set_userdata($newdata);

        redirect('user-home', 'refresh');

    }

    function userlogout(){
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}