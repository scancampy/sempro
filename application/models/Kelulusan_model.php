<?php 
class Kelulusan_model extends CI_Model {

        public function get($where = null) {
                $this->db->join('student_topik', 'student_topik.id=kelulusan.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=kelulusan.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=kelulusan.dosbing_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=kelulusan.wd_npk', 'left');
                $this->db->select('student_topik.judul, kelulusan.*, student.nama, l1.nama as "dosbing", l2.nama as "wd"');

                if($where != null) {
                        $this->db->where($where);
                }

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

        public function admin_validate($id = '') {
                $data = array(
                        'admin_validate_date' => date('Y-m-d H:i:s')
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

        public function add($nrp, $student_topik_id, $filekartuwali, $filebebaspakai, $filenaskahfinal, $filetoefl) {
                $data = array(
                        'nrp'                   => $nrp,
                        'student_topik_id'      => $student_topik_id,
                        'filekartuwali'         => $filekartuwali,
                        'filebebaspakai'        => $filebebaspakai,
                        'filenaskahfinal'       => $filenaskahfinal,
                        'filetoefl'             => $filetoefl,
                        'submit_date'           => date('Y-m-d H:i:s')
                );

                $this->db->insert('kelulusan', $data);
        }

        public function update_file($id, $filekartuwali, $filebebaspakai, $filenaskahfinal, $filetoefl) {
                $data = array(                        
                        'filekartuwali'         => $filekartuwali,
                        'filebebaspakai'        => $filebebaspakai,
                        'filenaskahfinal'       => $filenaskahfinal,
                        'filetoefl'             => $filetoefl
                );

                $this->db->where('id',$id);
                $this->db->update('kelulusan', $data);

               // $this->db->last_query();
               // die();
        }

        public function update($id, $kode_mk, $nama_mk) {
                $this->db->where('id', $id);
                $this->db->update('setting_nilai_minimal', array('kode_mk' => $kode_mk, 'nama_mk' => $nama_mk));
        }

        // admin 
        public function batal_validasi_admintu($id) {
                $data = array('sk_created_date' => null, 'sk_filename' => null, 'sk_username_created' => null);
                $this->db->where('id', $id);
                $this->db->update('kelulusan', $data);

        }

        public function batal_validasi_admin($id) {
                $data = array('admin_validate_date' => null);
                $this->db->where('id', $id);
                $this->db->update('kelulusan', $data);

        }

        // wd 
        public function batal_validasi_wd($id) {
                $data = array('wd_validate_date' => null, 'wd_npk' => null);
                $this->db->where('id', $id);
                $this->db->update('kelulusan', $data);
                
        }

        // dosbing
        public function batal_validasi_dosbing($id) {
                $data = array('dosbing_npk' => null, 'dosbing_validate_date' => null);
                $this->db->where('id', $id);
                $this->db->update('kelulusan', $data);

        }

        // HAPUS LULUS
        public function hapus_lulus($id) {
                $this->db->where('id', $id);
                $this->db->delete('kelulusan');
        }

}

?>