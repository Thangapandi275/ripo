<?php

class Products extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('common');
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
  $this->load->model('common');
       $savedata =  $this->input->post();

       if (!empty($_FILES['pro_image']['name'])) {
                 $val = $this->common->uploadImage('pro_image');
                 $savedata['pro_image'] = $val['path'];
            }else{
                $savedata['pro_image'] = "uploads/noimage.png";
            }
        $this->db->insert('cr_products',$savedata);
        $inser_id = $this->db->insert_id();
        $this->db->where('id',$inser_id)->update('cr_products',array('product_id' => "ARA".str_pad($inser_id, 6, '0', STR_PAD_LEFT)));


         $response = array('message'=>"Successfully Added","url"=>"products");
        echo json_encode($response);
        //echo "Successfully Added";
        
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

    public function updateproducts($id){

        $savedata =  $this->input->post();
         if (!empty($_FILES['pro_image']['name'])) {
                 $val = $this->common->uploadImage('pro_image');
                 $savedata['pro_image'] = $val['path'];
            }

         $this->db->where("id",$id)->update('cr_products',$savedata);
          $response = array('message'=>"Successfully Updated","url"=>"products");
        echo json_encode($response);
       // echo "Successfully Updated";
    }

    public function getproductsbyid($id){
       $data =  $this->db->select('categoryname,branch_name,cr_products.*')->from('cr_products')->where("id",$id)->join('cr_branch','cr_branch.branch_id = cr_products.product_branch_id','left')->join('cr_category','cr_category.category_id = cr_products.products_category_id','left')->get()->row();
       echo json_encode($data);
    }
}