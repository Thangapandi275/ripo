<?php

class Common extends Ci_Model{
    public function __construct(){
        parent::__construct();

        
    }
    public function getCategories(){
        $sessionData = $this->session->userdata();
       $this->db->select('*')->from('cr_category')->where('cr_category.IsDelete',0);
       if($sessionData['branch'] != 0){
                $this->db->where('cr_category.category_branch_id',$sessionData['branch']);
        }     
        $this->db->join('cr_branch','cr_branch.branch_id = cr_category.category_branch_id','left');     
       $data = $this->db->get()->result();
        return $data;
    }

    public function getCategoriesByBranchID($branchid){
        
       $this->db->select('*')->from('cr_category')->where('cr_category.IsDelete',0)->where('cr_category.category_branch_id',$branchid);   
        $this->db->join('cr_branch','cr_branch.branch_id = cr_category.category_branch_id','left');     
       $data = $this->db->get()->result();
        return $data;
    }

    public function getproducts(){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_products')->where('cr_products.IsDelete',0);
         if($sessionData['branch'] != 0){
                $this->db->where('cr_products.product_branch_id',$sessionData['branch']);
            } 
            $this->db->join('cr_category','cr_category.category_id = cr_products.products_category_id','left'); 
          $this->db->join('cr_branch','cr_branch.branch_id = cr_products.product_branch_id','left');       
         $data = $this->db->get()->result();
        return $data;
    }

    public function getbranchs(){
        $data = $this->db->select('*')->from('cr_branch')->get()->result();
        return $data;
    }

    public function getusers(){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_users');
         if($sessionData['branch'] != 0){
                $this->db->where('cr_users.branch_ref_id',$sessionData['branch']);
            }  
          $this->db->join('cr_branch','cr_branch.branch_id = cr_users.branch_ref_id','left'); 
          $this->db->join('cr_usertype','cr_usertype.usertype_id = cr_users.usertype_ref_id','left');        
         $data = $this->db->get()->result();
        return $data;
    }
    public function getcustomers(){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_customer')->where('cr_customer.IsDelete',0);
         if($sessionData['branch'] != 0){
                $this->db->where('cr_customer.customer_branch_id',$sessionData['branch']);
            }  
          $this->db->join('cr_branch','cr_branch.branch_id = cr_customer.customer_branch_id','left');     
         $data = $this->db->get()->result();
        return $data;
    }

    public function getSales(){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_sales')->where('cr_sales.IsDelete',0);
         if($sessionData['branch'] != 0){
                $this->db->where('cr_sales.sale_branch_id',$sessionData['branch']);
            }  
          $this->db->join('cr_branch','cr_branch.branch_id = cr_sales.sale_branch_id','left'); 
          $this->db->join('cr_users','cr_users.user_id = cr_sales.sales_created_by','left'); 
          $this->db->order_by('cr_sales.sale_id',"DESC");       
         $data = $this->db->get()->result();
        return $data;
    }

    public function getsalebyid($sale_id){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_sales')->where('cr_sales.sale_id',$sale_id);
         $this->db->join('cr_branch','cr_branch.branch_id = cr_sales.sale_branch_id','left'); 
         $this->db->join('cr_users','cr_users.user_id = cr_sales.sales_created_by','left');        
         $data = $this->db->get()->row();
        return $data;
    }

    public function salesitembysalesid($sale_id){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_sales_item')->where('cr_sales_item.sale_ref_id',$sale_id);  
         $data = $this->db->get()->result();
        return $data;
    }
    public function getCustomerById($customer_id){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_customer')->where('cr_customer.customer_id',$customer_id);
         $data = $this->db->get()->row();
        return $data;
    }
     public function getProductById($id){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_products')->where('cr_products.id',$id);
         $data = $this->db->get()->row();
        return $data;
    }
    public function salesitembyid($sale_item_id){
        $sessionData = $this->session->userdata();
         $this->db->select('*')->from('cr_sales_item')->where('cr_sales_item.sale_item_id',$sale_item_id);
         $data = $this->db->get()->row();
        return $data;
    }
    public function deleteSaleItem($id){
        $this->db->where('sale_item_id',$id)->delete('cr_sales_item');
    }

}