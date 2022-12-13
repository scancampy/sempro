<?php 
class Periode_model extends CI_Model {

        public $id;
        public $nama;
        public $is_active = 0;
        public $is_deleted = 0;


        public function get($id = '', $is_deleted = 0, $where = '', $orderby ='', $ordertype='') {
                $this->db->trans_start();
                if($id != '') {
                        $this->db->where('id', $id);
                }

                if($where != '') {
                        $this->db->where($where);
                }
                $this->db->where('is_deleted', $is_deleted);

                if($orderby != '') { 
                        $this->db->order_by($orderby, $ordertype);
                } else {
                        $this->db->order_by('id', 'desc');        
                }
                $q = $this->db->get('periode'); 

                $this->db->trans_complete();
                return $q->result();                       
        }

        public function get_periode_from_topik($topiks) {
                $data = array();
                foreach($topiks as $value) {
                        $this->db->join('periode', 'periode.id = topik_periode.id_periode', 'left');
                        $this->db->select('topik_periode.*, periode.nama');
                        $q = $this->db->get_where('topik_periode', array('id_topik' => $value->id));
                        $data[] = $q->result();
                }

                return $data;
        }

        public function add($nama, $is_active = 0) {
                if($is_active == 1) {
                        $this->db->update('periode', array('is_active' => 0));
                }

                $this->nama = $nama;
                $this->is_active = $is_active;

                $this->db->insert('periode', $this);
        }
       

        public function update_data($id,$nama, $is_active = 0) {
                $this->db->trans_start();
                if($is_active == 1) {
                        $this->db->update('periode', array('is_active' => 0));
                }

                $data = array('nama' => $nama, 'is_active' => $is_active);
                $this->db->where('id', $id);
                $this->db->update('periode', $data);

                $this->db->trans_complete();
        }

      

        public function del($id) {
                $this->db->trans_start();
                $data = array('is_deleted' => 1);
                $this->db->where('id', $id);
                $this->db->update('periode', $data);

                $this->db->trans_complete();

                return true;
        }



        //PERIODE SIDANG
        public function add_periode_sidang($date_start, $date_end, $is_active = 0) {
                if($is_active == 1) {
                        $this->db->update('periode_sidang', array('is_active' => 0));
                }

                $data = array('date_start' => $date_start, 'date_end' => $date_end, 'is_active' => $is_active);
                $this->db->insert('periode_sidang', $data);
        }

        public function get_periode_sidang($id = '', $is_deleted = 0) {
                if($id !='') {
                        $this->db->where('id', $id);
                }
                $this->db->where('is_deleted',$is_deleted);
                $q = $this->db->get('periode_sidang');
                return $q->result();
        }

        public function get_periode_sidang_aktif() {
                $q = $this->db->get_where('periode_sidang', array('is_active' => 1, 'is_deleted' => 0));
                if($q->num_rows() > 0) {
                        return $q->row();
                } else {
                        return false;
                }
        }

        public function del_periode_sidang($id) {
                $this->db->trans_start();
                $data = array('is_deleted' => 1);
                $this->db->where('id', $id);
                $this->db->update('periode_sidang', $data);

                $this->db->trans_complete();

                return true;
        }

        public function update_data_periode_sidang($id,$date_start, $date_end, $is_active = 0) {
                $this->db->trans_start();
                if($is_active == 1) {
                        $this->db->update('periode_sidang', array('is_active' => 0));
                }

                $data = array('date_start' => $date_start, 'date_end' => $date_end, 'is_active' => $is_active);
                $this->db->where('id', $id);
                $this->db->update('periode_sidang', $data);

                $this->db->trans_complete();
        }

        
}

?>