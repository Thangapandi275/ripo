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
    public function updateuser($user_id){
         $this->db->where("user_id",$user_id)->update('cr_users',$this->input->post());
        echo "Successfully Updated";
    }

    public function getusersbyid($user_id){
       $data =  $this->db->where("user_id",$user_id)->get('cr_users')->row();
       echo json_encode($data);
    }
    public function checkusernameavil(){

      $username = $this->input->post('username');
     $data =  $this->db->where("username",$username)->get('cr_users')->num_rows();
       echo json_encode($data);
    }

}