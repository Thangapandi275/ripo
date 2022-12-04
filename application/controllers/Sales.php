<?php

class Sales extends Ci_Controller{
    public function __construct(){
        parent::__construct();

            $session_data = $this->session->userdata();
          if(empty($session_data['userId'] )) {
               redirect('login', 'refresh');
          } 
    }
    public function index(){

        $data['sessionData'] = $this->session->userdata();
        $data['sales'] = $this->common->getSales();
        
        $this->load->view('saleslist', $data);
    }
    public function addSales(){

        $data['sessionData'] = $this->session->userdata();
        $data['categorys'] = $this->common->getCategories();
        
        $this->load->view('sales', $data);
    }
    public function editsales($id){

        $sale_id = base64_decode($id);
       // print_r($sales_id);exit();
        $data['sales'] = $this->common->getsalebyid($sale_id);
        $data['salesitem'] = $this->common->salesitembysalesid($sale_id);
        $data['sessionData'] = $this->session->userdata();
        $data['categorys'] = $this->common->getCategories();
        
        $this->load->view('editsales', $data);
    }
     public function salesReturn($sale_id){

        $data['sessionData'] = $this->session->userdata();
        $data['categorys'] = $this->common->getCategories();

        $data['sales'] = $this->common->getsalebyid($sale_id);
        $data['salesitem'] = $this->common->salesitembysalesid($sale_id);
        
        $this->load->view('salesreturn', $data);
    }
    public function viewSales($sale_id){

        $data['sessionData'] = $this->session->userdata();
        $data['sales'] = $this->common->getsalebyid($sale_id);
        $data['salesitem'] = $this->common->salesitembysalesid($sale_id);
        
        $this->load->view('salesview', $data);
    }
    public function ediedSales(){
       
       if(!empty($this->input->post("sale_item_product_id"))){


            $customer = $this->common->getCustomerById($this->input->post("sales_customer_id"));
            $sale = array(
            "sale_branch_id"=>$this->input->post("sale_branch_id"),
            "customer_name"=>$customer->customer_name,
            "customer_mobile"=>$customer->customer_number,
            "customer_address"=>$customer->customer_address,
            "sales_customer_id"=>$this->input->post("sales_customer_id"),
            "rent_start_date"=>$this->input->post("rent_start_date"),
            "no_of_days_rent"=>$this->input->post("no_of_days_rent"),
            "totrent"=>$this->input->post("totrent"),
            "totdis"=>$this->input->post("totdis"),
            "perdayrent"=>$this->input->post("perdayrent"),
            "totamt"=>$this->input->post("totamt"),
            "discount"=>$this->input->post("discount"),
            "finamt"=>$this->input->post("finamt"),
            "IsDelete"=>0,
            "sales_created_on"=>$this->input->post("sales_created_on"),
            "sales_created_by"=>$this->input->post("sales_created_by"),
            "sales_details"=>$this->input->post("sales_details"),
            "sales_box"=>$this->input->post("sales_box"),
            "sale_status"=>$this->input->post("typeofsale"),
            "adv_amt"=>$this->input->post("adv_amt"),
            "depsoit_amt"=>$this->input->post("depsoit_amt"),
            "return_amt"=>0.00,
           );
            $this->db->where('sale_id',$this->input->post("sale_id"))->update('cr_sales',$sale);
            $inser_id = $this->input->post("sale_id");

            $salesItems =  $this->common->salesitembysalesid($inser_id);

        foreach ($salesItems as $key => $value) {
            
            //$salesitembyid = $this->common->salesitembyid($value);

            $getProductById = $this->common->getProductById($value->sale_item_product_id);

            $in = $getProductById->instock + $value->sale_item_qty;
            $out = $getProductById->outstock - $value->sale_item_qty;

            $this->db->where('cr_products.id',$getProductById->id)->update('cr_products',array('instock'=>$in,"outstock"=>$out));

            $this->common->deleteSaleItem($value->sale_item_id);
        }



            foreach ($this->input->post("sale_item_product_id") as $key => $value) {
                $prod = $this->common->getProductById($this->input->post("sale_item_product_id")[$key]);
                $saleitem = array(
                    "sale_ref_id"=>$inser_id,
                    "sale_item_branch_id"=>$this->input->post("sale_branch_id"),
                    "sale_item_product_id"=>$prod->id,
                    "sale_item_product_code"=>$prod->product_id,
                    "sale_item_product_name"=>$prod->product_name,
                    "sale_item_qty"=>$this->input->post("sale_item_qty")[$key],
                    "sale_item_rent"=>$this->input->post("sale_item_rent")[$key],
                    "sale_item_discount"=>$this->input->post("sale_item_discount")[$key],
                    "sale_item_amt"=>$this->input->post("sale_item_amt")[$key],
                    "sale_item_product_image"=>$prod->pro_image,
                );
                $this->db->insert('cr_sales_item',$saleitem);
               $product = $this->db->where('cr_products.id',$this->input->post("sale_item_product_id")[$key])->get('cr_products')->row();

               $instock =  $product->instock - $this->input->post("sale_item_qty")[$key];
               $outstock =  $product->outstock + $this->input->post("sale_item_qty")[$key];

               $this->db->where('cr_products.id',$product->id)->update('cr_products',array("instock"=>$instock,"outstock"=>$outstock));
           }

            $response = array('message'=>"Sales Edited SuccessFully. Proceed Next Sale Here !!","url"=>"sales");
        echo json_encode($response);
          // echo "Sales Edited SuccessFully. Proceed Next Sale Here !!";
       }else{
         $response = array('message'=>"Invalid Sale !! Please Add Some Product","url"=>"");
        echo json_encode($response);
       // echo "Invalid Sale !! Please Add Some Product";
       }
    }
    function SaveSale(){
      // print_r("<pre>");
      // //print_r($this->input->post());

       //exit();

       if(!empty($this->input->post("sale_item_product_id"))){
        //$sessionData = $this->session->userdata();
        $customer = $this->common->getCustomerById($this->input->post("sales_customer_id"));

       
           $sale = array(
            "sale_branch_id"=>$this->input->post("sale_branch_id"),
            "customer_name"=>$customer->customer_name,
            "customer_mobile"=>$customer->customer_number,
            "customer_address"=>$customer->customer_address,
            "sales_customer_id"=>$this->input->post("sales_customer_id"),
            "rent_start_date"=>$this->input->post("rent_start_date"),
            "no_of_days_rent"=>$this->input->post("no_of_days_rent"),
            "totrent"=>$this->input->post("totrent"),
            "totdis"=>$this->input->post("totdis"),
            "perdayrent"=>$this->input->post("perdayrent"),
            "totamt"=>$this->input->post("totamt"),
            "discount"=>$this->input->post("discount"),
            "finamt"=>$this->input->post("finamt"),
            "IsDelete"=>0,
            "sales_created_on"=>$this->input->post("sales_created_on"),
            "sales_created_by"=>$this->input->post("sales_created_by"),
            "sales_details"=>$this->input->post("sales_details"),
            "sales_box"=>$this->input->post("sales_box"),
            "sale_status"=>$this->input->post("typeofsale"),
            "adv_amt"=>$this->input->post("adv_amt"),
            "depsoit_amt"=>$this->input->post("depsoit_amt"),
            "return_amt"=>0.00,
           );
           $this->db->insert('cr_sales',$sale);

           $inser_id = $this->db->insert_id();

           foreach ($this->input->post("sale_item_product_id") as $key => $value) {
                $prod = $this->common->getProductById($this->input->post("sale_item_product_id")[$key]);
                $saleitem = array(
                    "sale_ref_id"=>$inser_id,
                    "sale_item_branch_id"=>$this->input->post("sale_branch_id"),
                    "sale_item_product_id"=>$prod->id,
                    "sale_item_product_code"=>$prod->product_id,
                    "sale_item_product_name"=>$prod->product_name,
                    "sale_item_qty"=>$this->input->post("sale_item_qty")[$key],
                    "sale_item_rent"=>$this->input->post("sale_item_rent")[$key],
                    "sale_item_discount"=>$this->input->post("sale_item_discount")[$key],
                    "sale_item_amt"=>$this->input->post("sale_item_amt")[$key],
                    "sale_item_product_image"=>$prod->pro_image,
                );
                $this->db->insert('cr_sales_item',$saleitem);
               $product = $this->db->where('cr_products.id',$this->input->post("sale_item_product_id")[$key])->get('cr_products')->row();

               $instock =  $product->instock - $this->input->post("sale_item_qty")[$key];
               $outstock =  $product->outstock + $this->input->post("sale_item_qty")[$key];

               $this->db->where('cr_products.id',$product->id)->update('cr_products',array("instock"=>$instock,"outstock"=>$outstock));
           }
           $response = array('message'=>"Sales Added SuccessFully . Proceed Next Sale Here !!","url"=>"sales");
        echo json_encode($response);
          // echo "Sales Added SuccessFully . Proceed Next Sale Here !!";
           //exit();
       }else{
        $response = array('message'=>"Invalid Sale !! Please Add Some Produc","url"=>"");
        echo json_encode($response);
       // echo "Invalid Sale !! Please Add Some Product";
       }

         
       
            
    }
    public function ReturnSales($Sales_id){

        //print_r($this->input->post());exit();

        foreach ($this->input->post('sale_item_id') as $key => $value) {
            
            $salesitembyid = $this->common->salesitembyid($value);

            $getProductById = $this->common->getProductById($salesitembyid->sale_item_product_id);

            $in = $getProductById->instock + $salesitembyid->sale_item_qty - $this->input->post('return_qty')[$key];
            $out = $getProductById->outstock - $salesitembyid->sale_item_qty - $this->input->post('return_qty')[$key];

            $this->db->where('cr_sales_item.sale_item_id',$salesitembyid->sale_item_id)->update('cr_sales_item',array('sale_item_damage'=>$this->input->post('return_qty')[$key],"returnDate"=>date("d-m-Y")));

            $this->db->where('cr_products.id',$getProductById->id)->update('cr_products',array('instock'=>$in,"outstock"=>$out));



        }
        $this->db->where('sale_id',$Sales_id)->update('cr_sales',array('sale_status'=>"Returned","return_amt"=>$this->input->post('return_amt')));
         $response = array('message'=>"Successfully Returned !!","url"=>"sales");
        echo json_encode($response);
     //   echo "Successfully Returned !!";

    }
    public function CancelSales($Sales_id){

       $salesItems =  $this->common->salesitembysalesid($Sales_id);

        foreach ($salesItems as $key => $value) {
            
            //$salesitembyid = $this->common->salesitembyid($value);

            $getProductById = $this->common->getProductById($value->sale_item_product_id);

            $in = $getProductById->instock + $value->sale_item_qty;
            $out = $getProductById->outstock - $value->sale_item_qty;

            $this->db->where('cr_products.id',$getProductById->id)->update('cr_products',array('instock'=>$in,"outstock"=>$out));

        }
        $this->db->where('sale_id',$Sales_id)->update('cr_sales',array('sale_status'=>"Cancelled"));

        echo "Cancelled Successfully!!";
    }

    public function salesConfirm($Sales_id){
        $this->db->where('cr_sales.sale_id',$Sales_id)->update('cr_sales',array('sale_status'=>"Booked"));
        echo "Sales Booked Confirmed !!";
    }

}