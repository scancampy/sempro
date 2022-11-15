<?php 
class Sempro_model extends CI_Model {

        public function get_student_sempro($nrp) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->select('student_topik.judul, sempro.*, student.nama, l1.nama as "dosbing1", l2.nama as "dosbing2"');


                // TODO: check jika statusnya cancelled
                $q = $this->db->get_where('sempro', array('sempro.nrp' => $nrp, 'sempro.is_failed' =>0, 'sempro.is_deleted' => 0));
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_by_id($id) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer l4', 'l4.npk=sempro.penguji1', 'left');
                $this->db->join('lecturer l5', 'l5.npk=sempro.penguji2', 'left');
                $this->db->join('lecturer l3', 'l3.npk = sempro.kalab_npk_verified', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2", l3.nama as "kalabnama", sidang_time.label, l4.nama as "namapenguji1", l5.nama as "namapenguji2"');


                // TODO: check jika statusnya cancelled
                $q = $this->db->get_where('sempro', array('sempro.id' => $id));
                if($q->num_rows() > 0) {
                        return $q->row();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_by_lab($idlab) {
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('topik', 'topik.id=student_topik.topik_id','left'); 
                
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->select('student_topik.judul, sempro.*, student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2"');

                $this->db->where('topik.id_lab', $idlab);
                

                // TODO: check jika statusnya cancelled
                $q = $this->db->get('sempro');
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function insert($student_topik_id, $periode_sidang_id, $nrp, $sks_kum, $ipk_kum, $sks_ks) {
                $data = array(
                        'student_topik_id'      => $student_topik_id,
                        'periode_sidang_id'     => $periode_sidang_id,
                        'registered_date'       => date('Y-m-d H:i:s'),
                        'nrp'                   => $nrp,
                        'sks_kum'               => $sks_kum,
                        'ipk_kum'               => $ipk_kum,
                        'sks_ks'                => $sks_ks
                );

                $this->db->insert('sempro', $data);
        }

        public function kalab_validate($sempro_id, $kalab_npk, $sidang_date, $sidang_time, $penguji1_npk, $penguji2_npk ) {
                $data = array(
                        'kalab_verified_date'   => date('Y-m-d H:i:s'),
                        'kalab_npk_verified'    => $kalab_npk,
                        'sidang_date'           => $sidang_date,
                        'sidang_time'           => $sidang_time,
                        'penguji1'              => $penguji1_npk,
                        'penguji2'              => $penguji2_npk
                );

                $this->db->where('id', $sempro_id);
                $this->db->update('sempro',$data);
        }

        public function get_sidang_time() {
               $q =  $this->db->get('sidang_time');
               return $q->result();
        }
}

?>