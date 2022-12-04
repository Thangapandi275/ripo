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

        $login_response = $this->loginmodel->logincheck($username, $password);


        if(!empty($login_response)){
            if($login_response['isActive']){
                $newdata = array(
                    'userId'    => $login_response['user_id'],
                    'userEmail' => $login_response['username'],
                    'username' => $login_response['fullname'],
                    'userType_id' => $login_response['usertype_ref_id'],
                    'userType' => $login_response['usertype'],
                    'branch' => $login_response['branch_ref_id'],
                    'userIsActive' => TRUE,
                );
                $this->session->set_userdata($newdata);
                redirect('user-home', 'refresh');
            }
        } else {
            echo "<script>alert('Enter valid credentials');</script>";
            redirect('login', 'refresh');
        }
    }

    function userlogout(){
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}