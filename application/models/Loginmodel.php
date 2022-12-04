

<?php
class Loginmodel extends Ci_model{
    public function __construct(){
        parent::__construct();
    }
    public function logincheck($email_address="", $password=''){
        $this->db->select('*');
        $this->db->from('cr_users');
        $this->db->where('username', $email_address);
        $this->db->where('password', $password);
        $this->db->where('cr_users.isActive', 1);
        $this->db->join('cr_usertype','cr_usertype.usertype_id = cr_users.usertype_ref_id','left');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }
    }
}