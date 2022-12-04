

<?php
class Loginmodel extends Ci_model{
    public function __construct(){
        parent::__construct();
    }
    public function logincheck($email_address=""){
        $this->db->select('*');
        $this->db->from('cr_users');
        $this->db->where('username', $email_address);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }
    }
}