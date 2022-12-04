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
        $response = array('message'=>"Successfully Added","url"=>"category");
        echo json_encode($response);
       // echo "Successfully Added";
        
    }
    public function updatecategory($categoryid){
         $this->db->where("category_id",$categoryid)->update('cr_category',$this->input->post());
         $response = array('message'=>"Successfully Updated","url"=>"category");
        echo json_encode($response);
       // echo "Successfully Updated";
    }

    public function getcategorybyid($categoryid){
       $data =  $this->db->where("category_id",$categoryid)->get('cr_category')->row();
       echo json_encode($data);
    }

}