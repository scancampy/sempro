<?php 
class Student_model extends CI_Model {

        public $nrp;
        public $nama;
        public $status;
        public $ips;
        public $ipk;
        public $ipkm;


        public function set_eligible($nrp) {
                $data = array('eligible' => 1);
                $this->db->where('nrp', $nrp);
                $this->db->update('student', $data);
        }


        public function cek_eligible($nrp) {
                $result = array();

                // Nilai metpen MIN
                $q = $this->db->get_where('setting_eligibility', array('nama_alias' => 'nilai_metpen_min'));
                $row = $q->row();
                $nilaimetpenmin = $row->nilai;

                $rangenilai = array('A' => 4, 'AB' => 3.5, 'B' => 3, 'BC' => 2.5, 'C' => 2, 'D' => 1, 'E' => 0,'E*' => 0);

                $q = $this->db->get_where('setting_eligibility', array('nama_alias' => 'kode_metpen'));
                $row = $q->row();
                $kodemetpen = explode(',',$row->nilai);

                $result['nilai_metpen_min'] = false;

                foreach($kodemetpen as $value) {
                       
                        $cek =  $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => trim($value), 'nisbi_value >=' => $rangenilai[$nilaimetpenmin]));

                     //   echo $this->db->last_query();

                        if($cek->num_rows() >0) {
                                $result['nilai_metpen_min'] = true;
                              
                        }        
                } 

                

                // Total sks tanpa nilai E
                $q = $this->db->get_where('setting_eligibility', array('nama_alias' => 'total_sks_tanpa_e_min'));
                $row = $q->row();
                $totalskstanpae = $row->nilai;

                $this->db->select_sum('sks');
                $query = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'nisbi != '=> 'E'));
                $rowtotalskstanpae = $query->row();


                if($rowtotalskstanpae->sks >= $totalskstanpae) {
                          $result['total_sks_tanpa_e_min'] = true;
                } else {
                        $result['total_sks_tanpa_e_min'] = false;
                }

                // Total SKS <= D
                $q = $this->db->get_where('setting_eligibility', array('nama_alias' => 'total_sks_nilai_d_max'));
                $row = $q->row();
                $totalsksdmax = $row->nilai;

                $this->db->select_sum('sks');
                $query = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'nisbi'=> 'D'));
                $rowtotalsksdmax = $query->row();


                if($rowtotalsksdmax->sks <= $totalsksdmax) {
                          $result['total_sks_nilai_d_max'] = true;
                } else {
                        $result['total_sks_nilai_d_max'] = false;
                }
 

                return $result;
                // connect to sim
/*                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_Farmasi', array('NRP' => $nrp));
                return $q->result();*/
        }

        public function check_mk_in_ks($nrp, $kodemk) {
                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_FarKartuStudi', array('NRP' => $nrp, 'ThnAkademik' => '2022', 'Semester' => 'Gasal'));
               // print_r($q->result());
                $q = $dbsim->get_where('v_FarKartuStudi', array('NRP' => $nrp, 'KodeMK' => $kodemk));
                if($q->num_rows() > 0) {
                        return true;
                } else {
                        return false;
                }
        }

        public function connect_sim($nrp) {
                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_FarTranskrip', array('NRP' => $nrp));
                
                $this->db->delete('student_transcript', array('student_nrp' => $nrp));

                $rangenilai = array('A' => 4, 'AB' => 3.5, 'B' => 3, 'BC' => 2.5, 'C' => 2, 'D' => 1, 'E' => 0,'E*' => 0);

                foreach($q->result() as $value) {
                        $data = array(
                                'student_nrp' => $nrp,
                                'kode_mk' => $value->KodeMK,
                                'academic_year' => $value->ThnAkademik,
                                'semester' => $value->Semester,
                                'nisbi' => $value->KodeNisbi,
                                'nisbi_value' => $rangenilai[$value->KodeNisbi],
                                'sks' => 3
                        );
                        $this->db->insert('student_transcript', $data);
                }
        }

        public function get_transcript_raw($nrp) {
                $this->db->join('course', 'course.kode_mk = student_transcript.kode_mk','left');
                $this->db->select('student_transcript.*, course.nama as "namamk"');
                $q = $this->db->get_where('student_transcript', array('student_nrp' => $nrp));
                return $q->result();
        }

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
                while (($row = fgetcsv($csv, 10000, ";")) != FALSE) //get row vales
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

        public function get_transcript($kode_mk_arr, $nrp) {
                $data = array();
                foreach($kode_mk_arr as $value) {
                        $q =$this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $value->kode_mk));

                        if($q->num_rows() >0) {
                                $data[] = $q->row();
                        } else {
                                $data[] = null;
                        }
                }

                return $data;
        }

        public function is_eligible_course($kode_mk, $nrp) {
                 $q =$this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $kode_mk));

                if($q->num_rows() >0) {
                        return $q->row();
                } else {
                        return false;
                }
        }

}

?>