<?php 
class Topik_model extends CI_Model {

        public $id;
        public $nama;
        public $judul = '';
        public $id_lab;
        public $kuota;
        public $is_deleted= 0;
        public $is_active = 1;
        public $lecturer_npk;

        public function validasi_kalab($id, $kalab_npk_verified) {
                $data = array('kalab_verified_date' => date('Y-m-d H:i:s'), 'kalab_npk_verified' => $kalab_npk_verified);
                $this->db->where('id', $id);
                $this->db->update('topik', $data);
        }

        public function update($id, $nama, $kuota, $courseid1, $minimummark1, $courseid2, $minimummark2, $is_active) {
                $data = array('nama' => $nama, 'kuota' => $kuota, 'is_active' => $is_active);

                $this->db->where('id', $id);
                $this->db->update('topik', $data);

                $this->db->delete('topik_course', array('id_topik' => $id));

                if($courseid1 != ''){
                        $data = array('id_topik' => $id, 'course_id' => $courseid1, 'minimum_mark' => $minimummark1);
                        $this->db->insert('topik_course', $data);
                }

                if($courseid2 != ''){
                        $data = array('id_topik' => $id, 'course_id' => $courseid2, 'minimum_mark' => $minimummark2);
                        $this->db->insert('topik_course', $data);
                }
        }

        public function update_periode($id, $periodecheck) {
                $this->db->delete('topik_periode', array('id_topik' => $id));

                foreach($periodecheck as $value) {
                        $data = array('id_topik' => $id, 'id_periode' => $value);
                        $this->db->insert('topik_periode', $data);
                }
        }

        public function add($nama, $id_lab, $kuota, $judul ='',$lecturer_npk, $is_active = 1) {
                //$this->db->trans_start();
                $this->nama = $nama;
                $this->id_lab = $id_lab;
                $this->kuota = $kuota;
                $this->judul = $judul;
                $this->lecturer_npk = $lecturer_npk;
                $this->is_active = $is_active;

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

        public function get_need_validate($idlab) {
                $this->db->where('kalab_verified_date', NULL);
                $this->db->where('is_deleted', 0);
                $this->db->where('id_lab', $idlab);

                $q = $this->db->get('topik');
                return $q->num_rows();
        }

        public function get($id = '', $id_lab = '', $is_deleted = 0, $lecturer_npk = '', $periode = 1, $kalab_npk_verified = null) {
                $this->db->trans_start();
                if($id != '') {
                        $this->db->where('topik.id', $id);
                }

                if($id_lab != '' && $id_lab != 'all') {
                        $this->db->where('topik.id_lab', $id_lab);
                } else {
                        $this->db->order_by('topik.id_lab','asc');
                }


                if($lecturer_npk != '' && $lecturer_npk != 'all') {
                        $this->db->where('topik.lecturer_npk', $lecturer_npk);
                }

                if($kalab_npk_verified == 'belum') {
                        $this->db->where('topik.kalab_verified_date IS NULL');
                } else if($kalab_npk_verified === 'sudah') {
                        $this->db->where('topik.kalab_verified_date IS NOT NULL');
                }

              /*  if($periode != 'all') {
                        $this->db->where(' topik.is_active = '.$periode);
                }*/
                

                $this->db->where('topik.is_deleted', $is_deleted);
                $this->db->join('lab','lab.id = topik.id_lab');
                $this->db->join('lecturer k2','k2.npk = topik.lecturer_npk','left');
                $this->db->join('lecturer k1', 'k1.npk = topik.kalab_npk_verified', 'left');
                $this->db->join('lecturer k3', 'k3.npk = topik.lecturer_npk', 'left');
                $this->db->select('topik.*, lab.nama as "namalab", k2.nama as "namalecturer", k1.nama as "namakalab", k3.nama as "pembuat"');
                $this->db->order_by('topik.id', 'desc');
                $q = $this->db->get('topik'); 

              //  echo $this->db->last_query();
                $this->db->trans_complete();
                return $q->result();                       
        }

        public function get_prasyarat_by_id($id) {
                $this->db->join('course', 'course.id = topik_course.course_id', 'left');
                $this->db->select('topik_course.*, course.kode_mk, course.nama');
                $q = $this->db->get_where('topik_course', array('id_topik' => $id));
                return $q->result();
        }

         public function get_prasyarat($hasil) {
                $this->db->trans_start();
                $result = array();
                
                foreach($hasil as $index => $value) {
                        $this->db->join('course','course.id = topik_course.course_id','left');
                        $this->db->select('topik_course.*, course.nama, course.kode_mk');
                        $q = $this->db->get_where('topik_course', array('id_topik' => $value->id));
                        $result[$index] = $q->result();
                }

                $this->db->trans_complete();

                return $result;                       
        }
        
        public function check_prasyarat_mk($topikid, $nrp) {
                $rangenilai = array('A' => 4, 'AB' => 3.5, 'B' => 3, 'BC' => 2.5, 'C' => 2, 'D' => 1, 'E' => 0);
                $chekvalid = true;

                // cek apakah tidak eligible
                $q = $this->db->get_where('student', array('nrp' => $nrp, 'eligible' => 1));

                if($q->num_rows() > 0) {
                        // cek apakah sudah ada topik sebelumnya
                        $p = $this->db->get_where('student_topik', array('student_nrp' => $nrp, 'is_verified' => 1));
                        if($p->num_rows() == 0) {
                                // cek mk prasyarat
                                $this->db->join('course', 'course.id = topik_course.course_id');
                                $this->db->select('topik_course.*, course.kode_mk, course.nama');
                                $r = $this->db->get_where('topik_course', array('id_topik' => $topikid));

                                foreach($r->result()  as $value) {
                                        $this->db->where('kode_mk = "'.$value->kode_mk.'" OR old_kode_mk1 = "'.$value->kode_mk.'" OR old_kode_mk2 = "'.$value->kode_mk.'" OR old_kode_mk3 = "'.$value->kode_mk.'" ');
                                        $a = $this->db->get('course');
                                        $hasil = $a->row();

                                        // cari mknya di student_transcript
                                        if($hasil->kode_mk != '') {
                                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->kode_mk));
                                                if($l->num_rows() > 0) {
                                                        $resl = $l->row();
                                                        if($resl->nisbi_value < $rangenilai[$value->minimum_mark]) {

                                                                return 'req_not_valid';
                                                        }
                                                        return 'valid';                                                        
                                                } 
                                        }

                                        if($hasil->old_kode_mk1 != '') {
                                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk1));
                                                if($l->num_rows() > 0) {
                                                        $resl = $l->row();
                                                        if($resl->nisbi_value < $rangenilai[$value->minimum_mark]) {
                                                                 //echo $hasil->old_kode_mk1.'<br/>';
                                                                 //echo $resl->nisbi_value;

                                                                 //die();
                                                                return 'req_not_valid';
                                                        }
                                                        return 'valid';
                                                } 
                                        }

                                        if($hasil->old_kode_mk2 != '') {
                                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk2));
                                                if($l->num_rows() > 0) {
                                                        $resl = $l->row();
                                                        if($resl->nisbi_value < $rangenilai[$value->minimum_mark]) {
                                                                return 'req_not_valid';
                                                        }
                                                        return 'valid';
                                                } 
                                        }

                                        if($hasil->old_kode_mk3 != '') {
                                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk3));
                                                if($l->num_rows() > 0) {
                                                        $resl = $l->row();
                                                        if($resl->nisbi_value < $rangenilai[$value->minimum_mark]) {
                                                                return 'req_not_valid';
                                                        }
                                                        return 'valid';
                                                } 
                                        }

                                        /*$l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $value->kode_mk));
                                        if($l->num_rows() > 0) {
                                                $resl = $l->row();
                                                if($resl->nisbi_value < $rangenilai[$value->minimum_mark]) {
                                                        return 'req_not_valid';
                                                }
                                                
                                        } else {
                                                return 'req_not_valid';
                                        }*/
                                }

                                if($chekvalid) {
                                        return 'valid';
                                } else {
                                        return 'req_not_valid';
                                }
                        } else {
                                return 'active_topic_found';
                        }
                } else {
                        return 'not_eligible';
                }
        }

        public function del($id) {
                $this->db->trans_start();
                $data = array('is_deleted' => 1);
                $this->db->where('id', $id); 
                $this->db->update('topik',$data);
                $this->db->trans_complete();
        }

        public function get_kuota($id) {
                $q = $this->db->get_where('student_topik', array('topik_id' => $id, 'is_deleted' => 0, 'is_rejected' => 0));
                return $q->num_rows();
        }

        public function get_npk($id){
                $q = $this->db->get_where('topik', array('id' =>$id));

                if($q->num_rows() > 0) {
                        return $q->row();
                } else {
                        return false;
                }
        }

}

?>