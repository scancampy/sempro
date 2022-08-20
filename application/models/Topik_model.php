<?php 
class Topik_model extends CI_Model {

        public $id;
        public $nama;
        public $judul = '';
        public $id_lab;
        public $kuota;
        public $is_deleted= 0;


        public function add($nama, $id_lab, $kuota, $judul ='') {
                //$this->db->trans_start();
                $this->nama = $nama;
                $this->id_lab = $id_lab;
                $this->kuota = $kuota;
                $this->judul = $judul;

                $this->db->insert('topik', $this);

                //$this->db->trans_complete();
                return $this->db->insert_id();
        }

        public function add_req_course($course_id, $minimum_mark, $topik_id) {
                $q = $this->db->get_where('topik_course', array('id_topik' => $topik_id, 'course_id'=> $course_id));

                if($q->num_rows() ==0) {
                        $data = array('id_topik' => $topik_id, 'course_id' => $course_id, 'minimum_mark' => $minimum_mark);
                        $this->db->insert('topik_course', $data);

                        return $this->db->insert_id();
                } else {
                        return false;
                }
        }

        public function add_avail_periode($topik_id, $periode_id ) {
                $q = $this->db->get_where('topik_periode', array('id_topik' => $topik_id, 'id_periode' => $periode_id));
                if($q->num_rows() == 0) {
                        $data = array('id_topik' => $topik_id, 'id_periode' => $periode_id);
                        $this->db->insert('topik_periode', $data);
                        return true;
                } else {
                        return false;
                }
        }

        public function get($id = '', $id_lab = '', $is_deleted = 0) {
                $this->db->trans_start();
                if($id != '') {
                        $this->db->where('topik.id', $id);
                }

                if($id_lab != '') {
                        $this->db->where('topik.id_lab', $id_lab);
                }

                $this->db->where('topik.is_deleted', $is_deleted);
                $this->db->join('lab','lab.id = topik.id_lab');
                $this->db->select('topik.*, lab.nama as "namalab"');
                $this->db->order_by('topik.id', 'desc');
                $q = $this->db->get('topik'); 

                $this->db->trans_complete();
                return $q->result();                       
        }

        public function del($id) {
                $this->db->trans_start();
                $data = array('is_deleted' => 1);
                $this->db->where('id', $id); 
                $this->db->update('topik',$data);
                $this->db->trans_complete();
        }

}

?>