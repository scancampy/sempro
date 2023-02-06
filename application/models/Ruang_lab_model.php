<?php 
class Ruang_lab_model extends CI_Model {

        public $id;
        public $ruang_lab;


        public function get($id = '', $is_deleted = 0) {
                $this->db->trans_start();
                if($id != '') {
                        $this->db->where('id', $id);
                }
                $this->db->where('is_deleted', $is_deleted);
                $this->db->order_by('ruang_lab', 'asc');
                $q = $this->db->get('ruang_lab'); 

                $this->db->trans_complete();
                return $q->result();                       
        }

        public function add($ruang_lab) {
                $this->ruang_lab = $ruang_lab;

                $this->db->insert('ruang_lab', $this);
        }

        public function update_data($id,$ruang_lab) {
                $this->db->trans_start();
                $data = array('ruang_lab' => $ruang_lab);
                $this->db->where('id', $id);
                $this->db->update('ruang_lab', $data);

                $this->db->trans_complete();
        }

        public function del($id) {
                $this->db->trans_start();
                $data = array('is_deleted' => 1);
                $this->db->where('id', $id);
                $this->db->update('ruang_lab', $data);

                $this->db->trans_complete();

                return true;
        }

}

?>