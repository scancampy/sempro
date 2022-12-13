<?php 
class Room_model extends CI_Model {

        public function get() {
                $q = $this->db->get_where('room', array('is_deleted' => 0));
                return $q->result();
        }

        public function insert($label) {
                $data = array('label' => $label);
                $this->db->insert('room', $data);
        }

        public function update($id, $label) {
                $data = array('label' => $label);
                $this->db->where('id', $id);
                $this->db->update('room', $data);
        }

        public function del($id) {
                $data = array('is_deleted' => 1);
                $this->db->where('id', $id);
                $this->db->update('room', $data);
                return true;
        }

        public function get_available($used_room) {
                if(empty($used_room) != '') {
                        $q =  $this->db->query("SELECT * FROM room WHERE is_deleted = 0 AND id NOT IN (".implode(", ", $used_room).")");
                } else {
                        $q = $this->db->get_where('room', array('is_deleted' => 0));
                }               

               return $q->result();
        }
}

?>