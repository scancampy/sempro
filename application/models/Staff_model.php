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

        public function get_admin($username ='') {
                if($username != '') {
                        $this->db->where('staff.username = "'.$username."'");
                }

                $this->db->where("staff.username IN (SELECT user_roles.username FROM user_roles WHERE user_roles.username = staff.username AND user_roles.roles = 'adminst') ");
                $q = $this->db->get('staff');
                return $q->result();
        }

        public function add($username, $nama) {
                $data = array('username' => $username, 'nama' => $nama);
                $this->db->insert('staff', $data);
        }

        public function update_data($username, $nama) {
                $array = array("nama" => $nama);
                $this->db->where("username", $username);
                $this->db->update("staff", $array);
        }

        public function del($username) {
                $this->db->where('username', $username);
                $this->db->delete('staff');
        }

}

?>