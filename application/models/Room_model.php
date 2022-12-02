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
}

?>