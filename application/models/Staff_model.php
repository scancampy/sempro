<?php 
class Staff_model extends CI_Model {

        public $id;
        public $username;
        public $name;

        public function get($username) {
                $query = $this->db->get_where('staff', array('username' => $username));
                $row = $query->row();

                if (isset($row))
                {
                        return $query->result();   
                }
                return false;
        }

}

?>