<?php 
class Student_model extends CI_Model {

        public $nrp;
        public $nama;
        public $status;
        public $ips;
        public $ipk;
        public $ipkm;


        public function del($nrp) {
                $this->db->trans_start();
                $q = $this->db->get_where('student', array('nrp' => $nrp));
                $this->db->where('username', $nrp);
                $this->db->delete('user_roles');

                $this->db->where('username', $nrp);
                $this->db->delete('user');

                $this->db->where('nrp', $nrp);
                $this->db->delete('student');
                $this->db->trans_complete();

                if($q->num_rows() > 0) {
                        return true;
                } else {
                        return false;
                }
        }

        public function get($nrp = '', $nama = '', $angkatan = '') {
                if($angkatan != '') {
                        $this->db->like('nrp', $angkatan);
                }

                if($nrp != '') {
                        $this->db->like('nrp', $nrp);
                }

                if($nama != '') {
                        $this->db->like('nama', $nama);
                }

                if($nrp != '' || $nama != '' || $angkatan != '') {
                        $q = $this->db->get('student'); 
                        return $q->result(); 
                } else {
                        return false;
                }                       
        }

        public function update($csv) {
                $i =0;
                $valid = false;
                $numbercreated = 0;
                $this->db->trans_start();
                while (($row = fgetcsv($csv, 10000, ",")) != FALSE) //get row vales
                {                    
                    if($i==0 && strtolower($row[0]) =='nrp' && strtolower($row[1]) == 'nama'  && strtolower($row[2]) == 'status' && strtolower($row[3]) == 'ips' && strtolower($row[4]) == 'ipk' && strtolower($row[5]) == 'ipkm') {
                        $valid =  true;
                    }

                    if($valid == false) { return false; }

                    if($i>0) {
                        $this->nrp = $row[0];
                        $this->nama = $row[1];
                        $this->status = $row[2];
                        $this->ips = $row[3];
                        $this->ipk = $row[4];
                        $this->ipkm = $row[5];

                        // baca data student, cek di db ada atau tidak. 
                        // jika tidak ada maka insert di tabel student, dan buat akun di tabel user dan role
                        // jika sudah ada maka update di tabel student
                        $q = $this->db->get_where('student', array('nrp' => $this->nrp));

                        if($q->num_rows()==0) {
                                 $data = array('username' => $this->nrp, 'password' => password_hash("password", PASSWORD_DEFAULT), 'user_type' => 'student');
                                $this->db->insert('user', $data);
                                $this->db->insert('user_roles', array('username' => $this->nrp, 'roles' => 'student'));
                                $this->db->insert('student', $this);
                               
                                $numbercreated++;
                        } else {
                                // update
                                $data = array('nama' => $this->nama, 'status' => $this->status, 'ips' => $this->ips, 'ipk' => $this->ipk, 'ipkm' => $this->ipkm);
                                $this->db->where('nrp', $this->nrp);
                                $this->db->update('student', $data);
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