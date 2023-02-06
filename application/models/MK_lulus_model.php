<?php 
class MK_lulus_model extends CI_Model {

        public $id;
        public $kode_mk;
        public $nama_mk;

        public function get($where = '') {
                if($where != '') {
                         $this->db->where($where);
                }
                $this->db->order_by('id','asc');
                $q = $this->db->get('setting_nilai_minimal');
                return $q->result();                       
        }

        public function add($kode_mk, $nama_mk) {
                $this->kode_mk = $kode_mk;
                $this->nama_mk = $nama_mk;

                $this->db->insert('setting_nilai_minimal', $this);
        }

        public function update($id, $kode_mk, $nama_mk) {
                $this->db->where('id', $id);
                $this->db->update('setting_nilai_minimal', array('kode_mk' => $kode_mk, 'nama_mk' => $nama_mk));
        }
}

?>