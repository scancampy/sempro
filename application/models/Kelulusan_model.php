<?php 
class Kelulusan_model extends CI_Model {

        public function get($where = '') {
                $this->db->join('student_topik', 'student_topik.id=kelulusan.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=kelulusan.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=kelulusan.dosbing_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=kelulusan.wd_npk', 'left');
                $this->db->select('student_topik.judul, kelulusan.*, student.nama, l1.nama as "dosbing", l2.nama as "wd"');

                $this->db->where($where);

                $q = $this->db->get('kelulusan');
                //echo $this->db->last_query(); die();
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }                      
        }

        public function dosbing_validate($id = '', $npk = '') {
                $data = array(
                        'dosbing_npk'           => $npk,
                        'dosbing_validate_date' => date('Y-m-d H:i:s')
                );                   

                $this->db->where('id', $id);
                $this->db->update('kelulusan', $data);
        }

        public function wd_validate($id = '', $npk = '') {
                $data = array(
                        'wd_npk'           => $npk,
                        'wd_validate_date' => date('Y-m-d H:i:s')
                );                   

                $this->db->where('id', $id);
                $this->db->update('kelulusan', $data);
        }

        public function update_sk($id = '', $username = '', $sk_filename) {
                $data = array(
                        'sk_filename'           => $sk_filename,
                        'sk_created_date'       => date('Y-m-d H:i:s'),
                        'sk_username_created'   => $username
                );                   

                $this->db->where('id', $id);
                $this->db->update('kelulusan', $data);
        }

        public function add($nrp, $student_topik_id, $filekartuwali, $filebebaspakai, $filenaskahfinal) {
                $data = array(
                        'nrp'                   => $nrp,
                        'student_topik_id'      => $student_topik_id,
                        'filekartuwali'         => $filekartuwali,
                        'filebebaspakai'        => $filebebaspakai,
                        'filenaskahfinal'       => $filenaskahfinal,
                        'submit_date'           => date('Y-m-d H:i:s')
                );

                $this->db->insert('kelulusan', $data);
        }

        public function update($id, $kode_mk, $nama_mk) {
                $this->db->where('id', $id);
                $this->db->update('setting_nilai_minimal', array('kode_mk' => $kode_mk, 'nama_mk' => $nama_mk));
        }
}

?>