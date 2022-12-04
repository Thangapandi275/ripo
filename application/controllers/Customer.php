<?php

class Customer extends Ci_Controller{
    public function __construct(){
        parent::__construct();
         $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          } 
    }
    public function index(){

        $data['sessionData'] = $this->session->userdata();
        $data['customers'] = $this->common->getcustomers();
        
        $this->load->view('customer', $data);
    }
    function SaveCustomer(){
        $this->db->insert('cr_customer',$this->input->post());
        $response = array('message'=>"Successfully Added","url"=>"sales/addSales");
        echo json_encode($response);
        //echo "Successfully Added";
        
    }
    public function updatecustomer($customer_id){
         $this->db->where("customer_id",$customer_id)->update('cr_customer',$this->input->post());
         $response = array('message'=>"Successfully Updated","url"=>"customer");
        echo json_encode($response);
       // echo "Successfully Updated";
    }

    public function getcustomerbyid($customer_id){
       $data =  $this->db->where("customer_id",$customer_id)->get('cr_customer')->row();
       echo json_encode($data);
    }
}