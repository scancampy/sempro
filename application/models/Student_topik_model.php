<?php 
class Student_topik_model extends CI_Model {

        public $id;
        public $topik_id;
        public $student_nrp;
        public $created_date;
        public $judul;
        public $judul_created;
        public $guardian_npk_verified;
        public $guardian_verified_date;
        public $guardian_reason;
        public $kalab_verified_date;
        public $kalab_npk_verified;
        public $wd_npk_verified;
        public $wd_verified_date;
        public $lecturer1_npk;
        public $lecturer2_npk;
        public $is_deleted;
        public $is_verified;
        public $is_rejected;

        public function validate_st($id, $username, $filename) {
                $data = array(
                        'is_st_created'         => 1,
                        'st_created_date'       => date('Y-m-d H:i:s'),
                        'st_username_created'   => $username,
                        'st_filename'           => $filename 
                );

                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);
        }

        public function pick_topic($topikid, $nrp) {
                $this->topik_id = $topikid;
                $this->student_nrp = $nrp;
                $this->created_date = date('Y-m-d H:i:s');
                $this->is_deleted = 0;
                $this->is_verified = 0;
                $this->is_rejected = 0;

                $this->db->insert('student_topik', $this);
        }

        public function get_verified($is_verified = 1, $is_st_created =0, $is_deleted = 0) {
                $this->db->where('student_topik.is_deleted', $is_deleted);
                $this->db->where('student_topik.is_verified', $is_verified);
                $this->db->where('student_topik.is_st_created', $is_st_created);
                
                $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                $this->db->join('student', 'student.nrp = student_topik.student_nrp', 'left');
                $this->db->join('lab', 'lab.id = topik.id_lab', 'left');
                $this->db->join('lecturer as l1', 'l1.npk = student_topik.lecturer1_npk_verified', 'left');
                $this->db->join('lecturer as l1r', 'l1r.npk = student_topik.lecturer1_npk_rejected', 'left');
                $this->db->join('lecturer as l2', 'l2.npk = student_topik.kalab_npk_verified', 'left');
                $this->db->join('lecturer as l3', 'l3.npk = student_topik.wd_npk_verified', 'left');
                $this->db->join('lecturer as l4', 'l4.npk = student_topik.wd_npk_rejected', 'left');
                $this->db->join('lecturer as l5', 'l5.npk = student_topik.wd_final_npk_rejected', 'left');
                $this->db->join('lecturer as l6', 'l6.npk = student_topik.kalab_npk_verified_judul', 'left');
                $this->db->join('lecturer as l7', 'l7.npk = student_topik.kalab_npk_rejected_judul', 'left');
                $this->db->join('lecturer as dosbing1', 'dosbing1.npk = student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer as dosbing2', 'dosbing2.npk = student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer as pembuat', 'pembuat.npk = topik.lecturer_npk', 'left');
                $this->db->join('staff', 'staff.username = student_topik.st_username_created', 'left');
                $this->db->select('student_topik.*, student.nama as "studentname", topik.nama, lab.nama as "namalab", l1.nama as "l1nama", l1r.nama as "l1rnama", l2.nama as "kalabnama", l3.nama as "wdnama", l4.nama as "wdnamareject", l5.nama as "wdfinalnamareject", dosbing1.nama as "dosbing1nama", l6.nama as "l6nama", l7.nama as "l7nama", dosbing2.nama as "dosbing2nama", pembuat.nama as "pembuat", staff.nama as "adminstnama"');
                $this->db->order_by('is_verified', 'desc');
                $q = $this->db->get_where('student_topik');

               // echo $this->db->last_query();
                return $q->result();
        }

        // ambil data proposal tahap akhir
        public function get_proposal_verified_st($nrp) {
                  $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                $this->db->join('student', 'student.nrp = student_topik.student_nrp', 'left');
                $this->db->join('lab', 'lab.id = topik.id_lab', 'left');
                 $this->db->join('lecturer as l1', 'l1.npk = student_topik.lecturer1_npk_verified', 'left');
                $this->db->join('lecturer as l1r', 'l1r.npk = student_topik.lecturer1_npk_rejected', 'left');
                $this->db->join('lecturer as l2', 'l2.npk = student_topik.kalab_npk_verified', 'left');
                $this->db->join('lecturer as l3', 'l3.npk = student_topik.wd_npk_verified', 'left');
                $this->db->join('lecturer as l4', 'l4.npk = student_topik.wd_npk_rejected', 'left');
                $this->db->join('lecturer as l5', 'l5.npk = student_topik.wd_final_npk_rejected', 'left');
                $this->db->join('lecturer as l6', 'l6.npk = student_topik.kalab_npk_verified_judul', 'left');
                $this->db->join('lecturer as l7', 'l7.npk = student_topik.kalab_npk_rejected_judul', 'left');
                $this->db->join('lecturer as dosbing1', 'dosbing1.npk = student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer as dosbing2', 'dosbing2.npk = student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer as pembuat', 'pembuat.npk = topik.lecturer_npk', 'left');
                $this->db->join('staff', 'staff.username = student_topik.st_username_created', 'left');

                 $this->db->select('student_topik.*, student.nama as "studentname", topik.nama, lab.nama as "namalab", l1.nama as "l1nama", l1r.nama as "l1rnama", l2.nama as "kalabnama", l3.nama as "wdnama", l4.nama as "wdnamareject", l5.nama as "wdfinalnamareject", dosbing1.nama as "dosbing1nama", l6.nama as "l6nama", l7.nama as "l7nama", dosbing2.nama as "dosbing2nama", pembuat.nama as "pembuat", staff.nama as "adminstnama"');

                $q = $this->db->get_where('student_topik', array('student_topik.student_nrp' => $nrp, 'student_topik.is_deleted' => 0, 'student_topik.is_verified' => 1, 'student_topik.is_st_created' => 1));
                if($q->num_rows() > 0) {
                        return $q->row();   
                } else  {
                        return false;
                }            
        }

        public function get($nrp='',$id='', $is_deleted = 0, $is_rejected ='', $topik_id = '', $kalab_npk_verified = null, $where = '') {
                if($nrp != '') {
                        $this->db->where('student_nrp', $nrp);
                }
                if($id != '') {
                        $this->db->where('student_topik.id', $id);
                }
                if($is_deleted != 0) {
                        $this->db->where('student_topik.is_deleted', $is_deleted);
                }
                
                if($is_rejected == 'filterreject') {
                        $this->db->where('student_topik.is_rejected', $is_rejected);        
                }
                

                if($kalab_npk_verified != null) {
                        $this->db->where('student_topik.kalab_npk_verified IS NOT NULL');
                }

                if($topik_id != '') {
                        $this->db->where('student_topik.topik_id', $topik_id);
                }

                if($where != '') {
                        $this->db->where($where);
                }
                $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                $this->db->join('student', 'student.nrp = student_topik.student_nrp', 'left');
                $this->db->join('lab', 'lab.id = topik.id_lab', 'left');
                 $this->db->join('lecturer as l1', 'l1.npk = student_topik.lecturer1_npk_verified', 'left');
                $this->db->join('lecturer as l1r', 'l1r.npk = student_topik.lecturer1_npk_rejected', 'left');
                $this->db->join('lecturer as l2', 'l2.npk = student_topik.kalab_npk_verified', 'left');
                $this->db->join('lecturer as l3', 'l3.npk = student_topik.wd_npk_verified', 'left');
                $this->db->join('lecturer as l4', 'l4.npk = student_topik.wd_npk_rejected', 'left');
                $this->db->join('lecturer as l5', 'l5.npk = student_topik.wd_final_npk_rejected', 'left');
                $this->db->join('lecturer as l7', 'l7.npk = student_topik.kalab_npk_rejected_judul', 'left');
                $this->db->join('lecturer as l6', 'l6.npk = student_topik.kalab_npk_verified_judul', 'left');
                $this->db->join('lecturer as dosbing1', 'dosbing1.npk = student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer as dosbing2', 'dosbing2.npk = student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer as pembuat', 'pembuat.npk = topik.lecturer_npk', 'left');
                 $this->db->join('staff', 'staff.username = student_topik.st_username_created', 'left');
                $this->db->select('student_topik.*, student.nama as "studentname", topik.nama, lab.nama as "namalab", l1.nama as "l1nama", l1r.nama as "l1rnama", l2.nama as "kalabnama", l3.nama as "wdnama", l4.nama as "wdnamareject", l5.nama as "wdfinalnamareject",  l7.nama as "l7nama", l6.nama as "l6nama", dosbing1.nama as "dosbing1nama", dosbing2.nama as "dosbing2nama", pembuat.nama as "pembuat",staff.nama as "adminstnama"');
                $this->db->order_by('is_verified', 'desc');
                $q = $this->db->get_where('student_topik', array('student_topik.is_deleted' => $is_deleted));

//                print_r($this->db->last_query());
               // echo $this->db->last_query();
                return $q->result();
        }

        public function get_guardian_student_topic($npk) {
                $data = array();
                $q = $this->db->get_where('guardian', array('npk' => $npk));
                foreach($q->result() as $value) {
                        $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                        $this->db->join('student', 'student.nrp = student_topik.student_nrp', 'left');
                        $this->db->select('student_topik.*, topik.nama, student.nama as "namamhs"');
                       $p = $this->db->get_where('student_topik', array('student_nrp' => $value->nrp,'guardian_npk_verified' => null));

                       if($p->num_rows() >0){
                        $data[] = $p->row();
                       }
                }
                return $data;
        }

        public function get_wd_topic() {
                $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                $this->db->join('student', 'student.nrp = student_topik.student_nrp', 'left');
                $this->db->select('student_topik.*, topik.nama, student.nama as "namamhs"');
               $p = $this->db->get_where('student_topik', array('student_topik.judul !=' => null, 'student_topik.lecturer1_validate_title !=' => null, 'student_topik.is_verified' => 0, 'student_topik.is_deleted' => 0));
               return $p->result();
        }

        public function get_kalab_topic($npk) {
                $data = array();

                // cek apakah kalab
                $q = $this->db->get_where('user_lab', array('npk' => $npk));
                if($q->num_rows() > 0) {
                        $rq = $q->row();
                        $idlab = $rq->id_lab;

                        $p = $this->db->get_where('topik', array('id_lab' => $idlab, 'is_deleted' => 0));
                        foreach($p->result() as $value) {
                                $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                                $this->db->join('student', 'student.nrp = student_topik.student_nrp', 'left');
                                $this->db->select('student_topik.*, topik.nama, student.nama as "namamhs"');
                                $r = $this->db->get_where('student_topik', array('topik_id' => $value->id,'student_topik.kalab_npk_verified' => null));

                                if($r->num_rows() >0){

                                        $data[] = $r->row();
                                }
                        }
                } else {
                        return false;
                }
                return $data;
        }

        public function get_kalab_topic_need_dosbing($npk) {
                $data = array();

                // cek apakah kalab
                $q = $this->db->get_where('user_lab', array('npk' => $npk));
                if($q->num_rows() > 0) {
                        $rq = $q->row();
                        $idlab = $rq->id_lab;

                        $p = $this->db->get_where('topik', array('id_lab' => $idlab, 'is_deleted' => 0));
                        foreach($p->result() as $value) {
                                $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                                $this->db->join('student', 'student.nrp = student_topik.student_nrp', 'left');
                                $this->db->select('student_topik.*, topik.nama, student.nama as "namamhs"');
                                $r = $this->db->get_where('student_topik', array('topik_id' => $value->id,'wd_npk_verified !=' => null, 'lecturer1_npk' => null, 'lecturer2_npk' => null));

                                if($r->num_rows() >0){
                                        $data[] = $r->row();
                                }
                        }
                } else {
                        return false;
                }
                return $data;
        }

        public function get_proposal_need_dosbing_validation($npk) {
                // query the lecturer topic
                $q = $this->db->get_where('topik', array('lecturer_npk' => $npk, 'is_deleted' => 0));
                $hitung = 0;

                foreach ($q->result() as $key => $value) {
                        // query the student proposal of selected topic
                        $qd = $this->db->get_where('student_topik', array('topik_id' => $value->id, 'lecturer1_npk_verified' => null));

                        if($qd->num_rows() >0) {
                                $hitung++;
                        }
                }
                return $hitung;
        }

        public function get_proposal_need_wd_validation() {
                $q = $this->db->get_where('student_topik', array('wd_npk_verified' => null, 'is_deleted' => 0));
                return $q->num_rows();
        }

        public function get_proposal_need_final_wd_validation() {
                $q = $this->db->get_where('student_topik', array('wd_npk_final_verified' => null, 'is_deleted' => 0));
                return $q->num_rows();
        }

         public function get_proposal_need_st() {
                $q = $this->db->get_where('student_topik', array('is_st_created' => 0, 'is_deleted' => 0));
                return $q->num_rows();
        }

        public function get_proposal_title_need_kalab_validation($npk) {
                $data = array();
                $hitung = 0;

                // cek apakah kalab
                $q = $this->db->get_where('user_lab', array('npk' => $npk));
                if($q->num_rows() > 0) {
                        $rq = $q->row();
                        $idlab = $rq->id_lab;


                        $p = $this->db->get_where('topik', array('id_lab' => $idlab, 'is_deleted' => 0));
                        foreach($p->result() as $value) {
                                $this->db->join('topik', 'topik.id = student_topik.topik_id', 'left');
                                
                                $this->db->select('student_topik.*');
                                $r = $this->db->get_where('student_topik', array('topik_id' => $value->id,'student_topik.kalab_npk_verified_judul' => null));

                                if($r->num_rows() >0){

                                       $hitung++;
                                }
                        }
                } 
                return $hitung;
        }

        public function guardian_is_verified($npk, $reason, $id) {
                $data = array(
                                'guardian_npk_verified' => $npk,
                                'guardian_reason' => $reason,
                                'guardian_verified_date' => date('Y-m-d H:i:s')
                        );
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);
        }

        public function kalab_is_verified($npk, $id) {
                $data = array(
                                'kalab_npk_verified' => $npk,
                                'kalab_verified_date' => date('Y-m-d H:i:s')
                        );
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);
        }

        public function wd_is_verified($npk, $id) {
                $data = array(
                                'wd_npk_verified' => $npk,
                                'wd_verified_date' => date('Y-m-d H:i:s'),
                                'is_rejected' => 0,
                                'wd_npk_rejected' => null,
                                'wd_rejected_date' => null,
                                'wd_reason_reject' => null
                        );
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);
        }

        public function wd_is_reject($npk, $id, $reason) {
                $data = array('is_rejected' => 1, 'wd_rejected_date' => date('Y-m-d H:i:s'),'wd_npk_rejected' => $npk, 'wd_reason_reject' => $reason, 'wd_npk_verified' => null, 'wd_verified_date' => null);
                $this->db->where('id', $id);
                
                $this->db->update('student_topik', $data);
        }

        // KALAB
        public function kalab_is_reject_judul($npk, $id, $reason) {
                $data = array('is_rejected' => 1, 'kalab_rejected_judul_date' => date('Y-m-d H:i:s'),'kalab_npk_rejected_judul' => $npk, 'kalab_reason_reject_judul' => $reason, 'kalab_npk_verified_judul' => null, 'kalab_npk_verified_judul_date' => null);
                $this->db->where('id', $id);
                
                $this->db->update('student_topik', $data);
        }

        public function kalab_is_verified_judul($npk, $id) {
                $data = array(
                                'kalab_npk_verified_judul' => $npk,
                                'kalab_npk_verified_judul_date' => date('Y-m-d H:i:s'),
                                'is_rejected' => 0,
                                'kalab_npk_rejected_judul' => null,
                                'kalab_rejected_judul_date' => null,
                                'kalab_reason_reject_judul' => null
                        );
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);
        }

        public function dosbing_is_verified($npk, $id) {
                $data = array(
                                'lecturer1_npk_verified' => $npk,
                                'lecturer1_npk_verified_date' => date('Y-m-d H:i:s'),
                                'is_rejected' => 0,
                                'lecturer1_npk_rejected' => null,
                                'lecturer1_rejected_date' => null,
                                'lecturer1_reason_reject' => null
                        );
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);
        }

        public function dosbing_is_reject($npk, $id, $reason) {
                $data = array('is_rejected' => 1, 'lecturer1_rejected_date' => date('Y-m-d H:i:s'),'lecturer1_npk_rejected' => $npk, 'lecturer1_reason_reject' => $reason, 'lecturer1_npk_verified' => null, 'lecturer1_npk_verified_date' => null);
                $this->db->where('id', $id);
                
                $this->db->update('student_topik', $data);
        }

        public function wd_final_is_reject($npk, $id, $reason) {
                $data = array('is_rejected' => 1, 'wd_final_rejected_date' => date('Y-m-d H:i:s'),'wd_final_npk_rejected' => $npk, 'wd_final_reason_reject' => $reason, 'wd_npk_final_verified' => null, 'wd_final_verified_date' => null);
                $this->db->where('id', $id);
                
                $this->db->update('student_topik', $data);
        }

        public function wd_final_is_verified($npk, $id) {
                $data = array(
                                'wd_npk_final_verified' => $npk,
                                'wd_final_verified_date' => date('Y-m-d H:i:s'),
                                'is_rejected' => 0,
                                'is_verified' => 1,
                                'wd_final_npk_rejected' => null,
                                'wd_final_rejected_date' => null,
                                'wd_final_reason_reject' => null
                        );
                $this->db->where('id', $id);
                
                $this->db->update('student_topik', $data);
        }

        public function dosbing_validate_juduL($npk, $id) {
                $data = array('lecturer1_validate_title' => $npk, 'lecturer1_validate_date' => date('Y-m-d H:i:s'));
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);       
        }

        public function update_judul($id, $judul, $filename) {
                $data = array('judul_created' => date('Y-m-d H:i:s'), 'judul' => $judul, 'kk_filename' => $filename);
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);
        }

         public function update($id, $update) {
                $this->db->where('id', $id);
                $this->db->update('student_topik', $update);
        }

        public function update_dosbing($id, $lecturer1_npk,$lecturer2_npk) {
                $data = array(
                                'lecturer_created' => date('Y-m-d H:i:s'), 
                                'lecturer1_npk' => $lecturer1_npk, 
                                'lecturer2_npk' => $lecturer2_npk, 
                                'is_rejected' => 0,
                                 'wd_final_npk_rejected' => null,
                                'wd_final_rejected_date' => null,
                                'wd_final_reason_reject' => null
                        );
                $this->db->where('id', $id);
                $this->db->update('student_topik', $data);       
        }

}

?>