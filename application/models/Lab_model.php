<?php 
class Lab_model extends CI_Model {

        public $id;
        public $nama;
        public $nama_pendek;
        public $is_deleted = 0;


        public function get($id = '', $is_deleted = 0) {
                $this->db->trans_start();
                if($id != '') {
                        $this->db->where('id', $id);
                }
                $this->db->where('is_deleted', $is_deleted);
                $this->db->order_by('nama', 'asc');
                $q = $this->db->get('lab'); 

                $this->db->trans_complete();
                return $q->result();                       
        }

        public function add($nama, $nama_pendek) {
                $this->nama = $nama;
                $this->nama_pendek = $nama_pendek;

                $this->db->insert('lab', $this);
        }

        public function update_data($id,$nama, $nama_pendek) {
                $this->db->trans_start();
                $data = array('nama' => $nama, 'nama_pendek' => $nama_pendek);
                $this->db->where('id', $id);
                $this->db->update('lab', $data);

                $this->db->trans_complete();
        }

        public function del($id) {
                $this->db->trans_start();
                $data = array('is_deleted' => 1);
                $this->db->where('id', $id);
                $this->db->update('lab', $data);

                $this->db->trans_complete();

                return true;
        }

}

?>