<?php

class Createnewproduct extends Ci_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data["products"] = $this->common->getproducts();
        $this->load->view('createnewproduct', $data);
    }
    public function addproduct(){

        

        $product_id = $this->input->post("product_id");
        $product_name = $this->input->post("product_name");
        $category = $this->input->post("category");
        $product_size = $this->input->post("product_size");
        $product_purchase_date = $this->input->post("product_purchase_date");
        $product_created_date_time = $this->input->post("product_created_date_time");
        $product_color = $this->input->post("product_color");
        $product_purchase_amount = $this->input->post("product_purchase_amount");
        $product_rent_amount = $this->input->post("product_rent_amount");
        $stock_type = $this->input->post("stock_type");
        $product_description = $this->input->post("product_description");

        $product_array = array(
            "product_id" => $product_id,
            "product_name" => $product_name,
            "product_description" => $product_description,
            "category" => $category,
            "product_size" => $product_size,
            "purchase_date" => $product_purchase_date,
            "product_color" => $product_color,
            "purchase_amount" => $product_purchase_amount,
            "rent_amount" => $product_rent_amount,
            "stock_type" => $stock_type,
            "isActive" => 1,
        );

        $data = $this->common->insert("cr_products", $product_array);
        if($data){
            // $this->session->set_flashdata('failed','Something went wrong. Please try again later..!');
            $this->session->set_flashdata('success','New product added success..!');
            redirect('products', 'refresh');
        }else{
            $this->session->set_flashdata('failed','Oops Something went wrong. Please try again later..!');
            redirect('products', 'refresh');
        }

    }
}