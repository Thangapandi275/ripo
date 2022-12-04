<?php

class Products extends Ci_Controller{
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
       
        $this->load->view('products', $data);
    }
    public function getcategory($product_branch_id){
      $data =  $this->common->getCategoriesByBranchID($product_branch_id);
     // echo $product_branch_id;
      echo json_encode($data);
    }
    function SaveProducts(){
        $this->db->insert('cr_products',$this->input->post());
        $inser_id = $this->db->insert_id();
        $this->db->where('id',$inser_id)->update('cr_products',array('product_id' => "ARA".str_pad($inser_id, 6, '0', STR_PAD_LEFT)));
        echo "Successfully Added";
        
    }
    public function getproductbyid($id){
        $sessionData = $this->session->userdata();
        $this->db->select('*')->from('cr_products')->where('id',$id)->where('isActive',1)->where('IsDelete',0);
        if($sessionData['branch'] != 0){
                $this->db->where('cr_products.product_branch_id',$sessionData['branch']);
            }  
        $data = $this->db->get()->row();
        echo json_encode($data);
    }
}