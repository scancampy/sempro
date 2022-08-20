<?php 
class Eligibility_model extends CI_Model {

        public $id;
        public $nama;
        public $nama_alias;
        public $nilai;

        public function get() {
                $this->db->order_by('id','asc');
                $q = $this->db->get('setting_eligibility');
                return $q->result();                       
        }

        public function update($id, $nilai) {
                $this->db->where('id', $id);
                $this->db->update('setting_eligibility', array('nilai' => $nilai));
        }
}

?>