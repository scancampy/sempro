<?php 
class Ijin_lab_model extends CI_Model {

        public function get($nrp = '', $is_deleted = 0) {
                $this->db->join('lecturer l1', 'l1.npk=ijin_lab.pembimbing_validated_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=ijin_lab.kalab_validated_npk', 'left');
                $this->db->join('lecturer l3', 'l3.npk=ijin_lab.wd_validated_npk', 'left');
                $this->db->join('student_topik', 'student_topik.id=ijin_lab.student_topik_id',' left');
                $this->db->join('student', 'student.nrp=ijin_lab.nrp','left');

                $this->db->select('ijin_lab.*, student.nama, student_topik.judul, l1.nama as "dosbing1", l2.nama as "kalab", l3.nama as "wd"');

                $q = $this->db->get_where('ijin_lab', array('ijin_lab.nrp' => $nrp, 'ijin_lab.is_deleted' => $is_deleted));
                
                return $q->result();                       
        }

        public function get_where($where) {
                $this->db->join('lecturer l1', 'l1.npk=ijin_lab.pembimbing_validated_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=ijin_lab.kalab_validated_npk', 'left');
                $this->db->join('lecturer l3', 'l3.npk=ijin_lab.wd_validated_npk', 'left');
                $this->db->join('student_topik', 'student_topik.id=ijin_lab.student_topik_id',' left');
                $this->db->join('student', 'student.nrp=ijin_lab.nrp','left');

                $this->db->select('ijin_lab.*, student.nama, student_topik.judul, l1.nama as "dosbing1", l2.nama as "kalab", l3.nama as "wd"');

                $this->db->where($where);

                $q = $this->db->get('ijin_lab');
                
                return $q->result();                       
        }

        public function get_detail_where($where, $order='') {
                $this->db->join("ijin_lab", "ijin_lab.id=ijin_lab_detail.ijin_lab_id");
                $this->db->join("student", "student.nrp=ijin_lab.nrp");
                $this->db->select("ijin_lab_detail.*, student.nama, ijin_lab.nrp, ijin_lab.submit_date");
                $this->db->where($where);
                if($order != '') {
                        $this->db->order_by($order);
                }
                $q = $this->db->get('ijin_lab_detail');
                
                return $q->result();  
        }

        public function get_by_id($id = '', $is_deleted = 0) {
                $this->db->join('lecturer l1', 'l1.npk=ijin_lab.pembimbing_validated_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=ijin_lab.kalab_validated_npk', 'left');
                $this->db->join('lecturer l3', 'l3.npk=ijin_lab.wd_validated_npk', 'left');
                $this->db->join('student_topik', 'student_topik.id=ijin_lab.student_topik_id',' left');
                $this->db->join('topik', 'topik.id=student_topik.topik_id','left');
                $this->db->join('student', 'student.nrp=ijin_lab.nrp','left');

                $this->db->select('ijin_lab.*, topik.id_lab, student.nama, student_topik.judul, student_topik.lecturer1_npk, student_topik.lecturer2_npk, l1.nama as "dosbing1", l2.nama as "kalab", l3.nama as "wd"');

                $q = $this->db->get_where('ijin_lab', array('ijin_lab.id' => $id, 'ijin_lab.is_deleted' => $is_deleted));
                
                return $q->result();                       
        }

        public function get_by_npk($npk = '', $is_deleted = 0) {
                $this->db->join('lecturer l1', 'l1.npk=ijin_lab.pembimbing_validated_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=ijin_lab.kalab_validated_npk', 'left');
                $this->db->join('lecturer l3', 'l3.npk=ijin_lab.wd_validated_npk', 'left');
                $this->db->join('student_topik', 'student_topik.id=ijin_lab.student_topik_id',' left');
                $this->db->join('topik', 'topik.id=student_topik.topik_id','left');
                $this->db->join('student', 'student.nrp=ijin_lab.nrp','left');

                $this->db->select('ijin_lab.*, student.nama, student_topik.judul, student_topik.lecturer1_npk, student_topik.lecturer2_npk, l1.nama as "dosbing1", l2.nama as "kalab", l3.nama as "wd"');
                $this->db->where("(student_topik.lecturer1_npk = '".$npk."' OR student_topik.lecturer2_npk = '".$npk."') ");

                $q = $this->db->get('ijin_lab');

               // echo $this->db->last_query();
                
                return $q->result();                       
        }

        public function get_by_npk_kalab($npk = '', $labid='', $is_deleted = 0) {
                $this->db->join('lecturer l1', 'l1.npk=ijin_lab.pembimbing_validated_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=ijin_lab.kalab_validated_npk', 'left');
                $this->db->join('lecturer l3', 'l3.npk=ijin_lab.wd_validated_npk', 'left');
                $this->db->join('student_topik', 'student_topik.id=ijin_lab.student_topik_id',' left');

                $this->db->join('topik', 'topik.id=student_topik.topik_id','left');
                $this->db->join('student', 'student.nrp=ijin_lab.nrp','left');

                $this->db->select('ijin_lab.*, student.nama, student_topik.judul, student_topik.lecturer1_npk, student_topik.lecturer2_npk, l1.nama as "dosbing1", l2.nama as "kalab", l3.nama as "wd"');
                $this->db->where("(student_topik.lecturer1_npk = '".$npk."' OR student_topik.lecturer2_npk = '".$npk."' OR topik.id_lab = '".$labid."') AND ijin_lab.is_deleted = ".$is_deleted);

                $q = $this->db->get('ijin_lab');

               // echo $this->db->last_query();
                
                return $q->result();                       
        }


        public function get_detail($ijinid) {
                $q = $this->db->get_where('ijin_lab_detail', array('ijin_lab_id' => $ijinid));
                return $q->result();
        }

        public function add($nrp, $student_topik_id, $ruang_lab_id, $nama_lab, $alamat_lab) {
                $qactiveperiode= $this->db->get_where('periode', array('is_active' => 1));
                $row = $qactiveperiode->row();
                $data = array(
                                'nrp'                           => $nrp,
                                'periode_id'                    => $row->id,
                                'student_topik_id'              => $student_topik_id,
                                'submit_date'                   => date('Y-m-d H:i:s'),
                                'pembimbing_validated_npk'       => NULL,
                                'pembimbing_validated_date'     => NULL,
                                'kalab_validated_npk'            => NULL,
                                'kalab_validated_date'          => NULL
                        );

                $this->db->insert('ijin_lab', $data);
                $lastid = $this->db->insert_id();

                foreach($ruang_lab_id as $key => $value) {
                        $ruang = NULL;
                        if($value != '') { $ruang = $value; }
                        $data = array(
                                'ijin_lab_id'           => $lastid,
                                'ruang_lab_id'          => $ruang,
                                'nama_lab'              => $nama_lab[$key],
                                'alamat_lab'            => $alamat_lab[$key]
                        );

                        $this->db->insert('ijin_lab_detail', $data);
                }
        }

        public function dosbing_validate($id,$npk) {
                $this->db->trans_start();
                $data = array('pembimbing_validated_npk' => $npk, 'pembimbing_validated_date' => date('Y-m-d H:i:s'));
                $this->db->where('id', $id);
                $this->db->update('ijin_lab', $data);

                $this->db->trans_complete();
        }

        public function kalab_validate($id,$npk) {
                $this->db->trans_start();
                $data = array('kalab_validated_npk' => $npk, 'kalab_validated_date' => date('Y-m-d H:i:s'));
                $this->db->where('id', $id);
                $this->db->update('ijin_lab', $data);

                $this->db->trans_complete();
        }

        public function wd_validate($id,$npk) {
                $this->db->trans_start();
                $data = array('wd_validated_npk' => $npk, 'wd_validated_date' => date('Y-m-d H:i:s'));
                $this->db->where('id', $id);
                $this->db->update('ijin_lab', $data);

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