<?php 
class Lecturer_model extends CI_Model {

        public $npk;
        public $nama;
        public $lab_id;

        public function update_roles() {
                $this->db->where('roles', 'lecturer');
                $this->db->delete('user_roles');

                $q = $this->db->get('lecturer');
                $hitung = 0;
                foreach($q->result()  as $row) {
                          $data = array('username' => $row->npk, 'roles' => 'lecturer');
                                $this->db->insert('user_roles',$data);
                                $hitung++;
                        
                }

                echo $hitung;
        }


        public function del($npk) {
                $this->db->trans_start();
                $q = $this->db->get_where('lecturer', array('npk' => $npk));
                $this->db->where('username', $npk);
                $this->db->delete('user_roles');

                $this->db->where('username', $npk);
                $this->db->delete('user');

                $this->db->where('npk', $npk);
                $this->db->delete('lecturer');

                $this->db->trans_complete();

                if($q->num_rows() > 0) {
                        return true;
                } else {
                        return false;
                }
        }

        public function get($npk = '', $nama = '', $lab_id = '') {
                $this->db->trans_start();
                if($npk != '') {
                        $this->db->like('npk', $npk);
                }

                if($nama != '') {
                        $this->db->like('nama', $nama);
                }
                if($lab_id != '') {
                        $this->db->like('lab_id', $lab_id);
                }

                $this->db->join('lab', 'lab.id = lecturer.lab_id', 'left');
                $this->db->select('lecturer.*, lab.nama as "namalab"');
                $this->db->order_by('nama', 'asc');
                $q = $this->db->get('lecturer'); 

                $this->db->trans_complete();

                return $q->result();                       
        }

        public function get_with_beban() {
                $this->db->join('lab', 'lab.id = lecturer.lab_id', 'left');
                $this->db->select('lecturer.*, lab.nama as "namalab", (SELECT COUNT(student_topik.lecturer1_npk) FROM student_topik WHERE student_topik.lecturer1_npk = lecturer.npk) AS "beban1", (SELECT COUNT(student_topik.lecturer2_npk) FROM student_topik WHERE student_topik.lecturer2_npk = lecturer.npk) as "beban2" ');
                $this->db->order_by('nama', 'asc');
                $q = $this->db->get('lecturer'); 
                return $q->result();
        }

        public function get_with_beban_total($idlab = '', $periode_id=null, $npk = null) {
                // ambil periode
                if($periode_id != null) {
                        $query = $this->db->get_where('periode', array('id' => $periode_id));
                        $periode = $query->row();
                }

                $wherenpk = '';
                if($npk != null) {
                        $wherenpk = ' AND lecturer.npk ="'.$npk.'" ';
                }


                $whereidlab = '';
                if($idlab != '') {
                        $whereidlab = ' WHERE lecturer.lab_id = '.$idlab;
                }
                $q = $this->db->query('SELECT lecturer.*, lab.nama as "namalab", 
(SELECT COUNT(student_topik.lecturer1_npk) FROM student_topik WHERE student_topik.lecturer1_npk = lecturer.npk '.$wherenpk.' AND student_topik.is_deleted = 0 AND student_topik.id NOT IN (SELECT kelulusan.student_topik_id FROM kelulusan WHERE kelulusan.student_topik_id = student_topik.id AND kelulusan.sk_created_date IS NOT NULL)) as "beban1",
(SELECT COUNT(student_topik.lecturer2_npk) FROM student_topik WHERE student_topik.lecturer2_npk = lecturer.npk '.$wherenpk.' AND student_topik.is_deleted = 0 AND student_topik.id NOT IN (SELECT kelulusan.student_topik_id FROM kelulusan WHERE kelulusan.student_topik_id = student_topik.id AND kelulusan.sk_created_date IS NOT NULL)) as "beban2",
(SELECT COUNT(sempro.penguji1) FROM sempro WHERE sempro.penguji1 = lecturer.npk '.$wherenpk.' AND sempro.kalab_verified_date >= "'.$periode->date_start.'" AND sempro.kalab_verified_date <= "'.$periode->date_end.'" ) as "sempro1",
(SELECT COUNT(sempro.penguji2) FROM sempro WHERE sempro.penguji2 = lecturer.npk '.$wherenpk.' AND sempro.kalab_verified_date >= "'.$periode->date_start.'" AND sempro.kalab_verified_date <= "'.$periode->date_end.'") as "sempro2",
(SELECT COUNT(skripsi.penguji1) FROM skripsi WHERE skripsi.penguji1 = lecturer.npk '.$wherenpk.' AND skripsi.kalab_verified_date >= "'.$periode->date_start.'" AND skripsi.kalab_verified_date <= "'.$periode->date_end.'") as "skripsi1",
(SELECT COUNT(skripsi.penguji2) FROM skripsi WHERE skripsi.penguji2 = lecturer.npk '.$wherenpk.' AND skripsi.kalab_verified_date >= "'.$periode->date_start.'" AND skripsi.kalab_verified_date <= "'.$periode->date_end.'") as "skripsi2"
FROM lecturer 
LEFT JOIN lab ON lab.id = lecturer.lab_id  '.$whereidlab.'
ORDER BY lecturer.nama DESC;');
                //echo $this->db->last_query();
                //die();
                return $q->result();       
        }

        public function update_data($npk, $nama, $lab_id) {
                $this->db->trans_start();
                $data = array('nama' => $nama, 'lab_id' => $lab_id);
                $this->db->where('npk', $npk);
                $this->db->update('lecturer', $data);

                $this->db->trans_complete();
        }

        public function add($npk, $nama, $lab_id) {
                // cek apakah npk sudah ada

              
                $q = $this->db->get_where('lecturer', array('npk' => $npk));
                if($q->num_rows() > 0) {
                        return false;
                } else {
                        $this->db->trans_start();
                        $this->npk = $npk;
                        $this->nama = $nama;
                        $this->lab_id = $lab_id;

                        $p =  $this->db->get_where('user', array('username' => $this->npk));
                        if($p->num_rows() == 0) {
                                $data = array('username' => $this->npk, 'password' => password_hash("password", PASSWORD_DEFAULT), 'user_type' => 'lecturer');
                                $this->db->insert('user', $data);
                        }

                        $this->db->insert('user_roles', array('username' => $this->npk, 'roles' => 'lecturer'));
                        $this->db->insert('lecturer', $this);

                        $this->db->trans_complete();

                        return true;
                }
        }

        public function update($csv) {
                $i =0;
                $valid = false;
                $numbercreated = 0;
                $this->db->trans_start();
                while (($row = fgetcsv($csv, 10000, ",")) != FALSE) //get row vales
                {  
                    if($i==0 && strtolower($row[0]) =='npk' && strtolower($row[1]) == 'nama') {
                        $valid =  true;
                    }

                    if($valid == false) { return false; }

                    if($i>0) {
                        $this->npk = $row[0];
                        $this->nama = $row[1];

                        // baca data lecturer, cek di db ada atau tidak. 
                        // jika tidak ada maka insert di tabel lecturer, dan buat akun di tabel user dan role
                        // jika sudah ada maka update di tabel lecturer
                        $q = $this->db->get_where('lecturer', array('npk' => $this->npk));

                        if($q->num_rows()==0) {
                                 $data = array('username' => $this->npk, 'password' => password_hash("password", PASSWORD_DEFAULT), 'user_type' => 'lecturer');
                                $this->db->insert('user', $data);
                                $this->db->insert('user_roles', array('username' => $this->npk, 'roles' => 'lecturer'));
                                $this->db->insert('lecturer', $this);
                               
                                $numbercreated++;
                        } else {
                                // update
                                $data = array('nama' => $this->nama);
                                $this->db->where('npk', $this->npk);
                                $this->db->update('lecturer', $data);
                                $numbercreated++;
                        }
                    }

                    $i++;
                }

                $this->db->trans_complete();
                if($valid == false) {
                        return $valid;
                } else {
                        return $numbercreated;
                }
        }

}

?>