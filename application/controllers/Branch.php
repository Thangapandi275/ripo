<?php

class Branch extends Ci_Controller{
    public function __construct(){
        parent::__construct();
         $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          } 
    }
    public function index(){

        $data['sessionData'] = $this->session->userdata();
        $data['branchs'] = $this->common->getbranchs();
        
        $this->load->view('branch', $data);
    }
    function SaveBranch(){
        $this->db->insert('cr_branch',$this->input->post());

        $response = array('message'=>"Successfully Added","url"=>"branch");
        echo json_encode($response);
        
    }

    public function Save_des(){
        if($this->session->userdata('user_login_access') != False) { 
        $des = $this->input->post('designation');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('designation','designation','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }else{
            $data = array();
            $data = array('des_name' => $des);
            $success = $this->organization_model->Add_Designation($data);
            echo "Successfully Added";
        }
        }
    else{
        redirect(base_url() , 'refresh');
    }            
    }

    public function updatebranch($branchid){
         $this->db->where("branch_id",$branchid)->update('cr_branch',$this->input->post());
        $response = array('message'=>"Successfully Updated","url"=>"branch");
        echo json_encode($response);
    }

    public function getbranchbyid($branchid){
       $data =  $this->db->where("branch_id",$branchid)->get('cr_branch')->row();
       echo json_encode($data);
    }
}