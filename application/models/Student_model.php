<?php 
class Student_model extends CI_Model {

        public $nrp;
        public $nama;
        public $status;
        public $ips;
        public $ipk;
        public $ipkm;

        // MK prasyarat kelulusan
        public function generate_table_prasyarat($mkprasyarat, $nrp) { 
                $this->load->helper('text');
                $html = '';

                foreach ($mkprasyarat as $key => $value) {
                        $kodemk = explode(',', $value->kode_mk);
                        $where = '';
                        $newwhere ='';

                        //print_r($kodemk);
                        foreach($kodemk as $kode) {
                                if($where != '') { $where .= ' OR '; }
                                $where .= ' kode_mk = "'.trim($kode).'" ';
                                //$this->db->or_where('kode_mk = ',trim($kode));
                        }

                        if($where != '') { $newwhere .= '('.$where.') AND '; }
                        $newwhere .= ' student_nrp = "'.$nrp.'" ';
                        $this->db->where($newwhere);
                        $q = $this->db->get('student_transcript');

                        //echo $this->db->last_query();
                        $hq = $q->result();
                       // print_r($hq);

                        if($q->num_rows() > 0) {
                                $qrow = $q->row();
                                $html .= '<tr><td>'.$qrow->kode_mk.'</td>';
                                $html .= '<td>'.$value->nama_mk.'</td>';
                                $html .= '<td>'.$qrow->nisbi.'</td></tr>';
                        } else {
                                $html .= '<tr><td>'.character_limiter($value->kode_mk, 10).'</td>';
                                $html .= '<td>'.$value->nama_mk.'</td>';
                                $html .= '<td>-</td></tr>';       
                        }
                }

                return $html;

        }

        public function check_eligible_mk_prasyarat_lulus($mkprasyarat, $nrp) { 
                $this->load->helper('text');
                $html = '';

                foreach ($mkprasyarat as $key => $value) {
                        $kodemk = explode(',', $value->kode_mk);
                        $where = '';
                        foreach($kodemk as $kode) {
                                $this->db->or_where('kode_mk = ',trim($kode));
                        }
                        $this->db->where('student_nrp = ', $nrp);
                        $q = $this->db->get('student_transcript');

                        if($q->num_rows() > 0) {
                                $qrow = $q->row();
                                if($qrow->nisbi == "D") {
                                        return false;
                                } else if($qrow->nisbi == "E") {
                                        return false;
                                }
                        } else {
                                return false;
                        }
                }

                return true;

        }

        // Hitung IPKKum
        public function get_ipk_kum($nrp) {
                $q = $this->db->get_where('student_transcript', array('student_nrp' => $nrp));
                if($q->num_rows() > 0) {
                        $totalsks = 0;
                        $total = 0;
                        foreach ($q->result() as $key => $value) {
                                if($value->nisbi != 'E') {
                                        $total += $value->nisbi_value * $value->sks;
                                        $totalsks += $value->sks;
                                }
                        }

                        return $total / $totalsks;
                } else {
                        return 0.0;
                }
        }

        // SKS nilai D
        public function get_sks_d($nrp) {
                $this->db->select_sum('sks');
                $query = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'nisbi'=> 'D'));
                $rowtotalsksdmax = $query->row();

                if($rowtotalsksdmax->sks == 0) {
                        return 0;
                } else {
                        return $rowtotalsksdmax->sks;
                }
                
        }

        public function get_sks_kum($nrp) {
                $q = $this->db->get_where('student_transcript', array('student_nrp' => $nrp));
                if($q->num_rows() > 0) {
                        $totalsks = 0;
                        foreach ($q->result() as $key => $value) {
                                if($value->nisbi != 'E') {                                        
                                        $totalsks += $value->sks;
                                }
                        }

                        return $totalsks;
                } else {
                        return 0;
                }
        }


        public function set_eligible($nrp) {
                $data = array('eligible' => 1);
                $this->db->where('nrp', $nrp);
                $this->db->update('student', $data);
        }

         public function set_not_eligible($nrp) {
                $data = array('eligible' => 0);
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
                        // cek sesuai algoritma yg baru
                        $selisih = $rowtotalskstanpae->sks -$totalskstanpae;
                       // echo $rowtotalskstanpae->sks.'<br/>';
                       // echo 'selisih = '.$selisih;
                       // echo '<br/>total nilai d = '.$totalsksdmax;
                        $nilaiDbaru = $rowtotalsksdmax->sks - $selisih;

                        if($nilaiDbaru<= $totalsksdmax) {
                                $result['total_sks_nilai_d_max'] = true;
                        } else {
                                $result['total_sks_nilai_d_max'] = false;
                        }                        
                }
 

                return $result;
                // connect to sim
/*                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_Farmasi', array('NRP' => $nrp));
                return $q->result();*/
        }

        public function check_ks() {
                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_FarKartuStudi', array('NRP' => $nrp, 'ThnAkademik' => '2022', 'Semester' => 'Gasal'));
                
                $kodeskripsi = explode(',',$kodemk);

                $hasileligible = false;

                foreach($kodeskripsi as $value) {
                        $q = $dbsim->get_where('v_FarKartuStudi', array('NRP' => $nrp, 'KodeMK' => $value));

                        if($q->num_rows() > 0) {
                                $hasileligible = true;
                                break;
                        } 
                
                }

                return $hasileligible;
        }

        public function get_jumlah_mk_in_ks($nrp) {
                 // ambil periode aktif
                $q = $this->db->get_where('periode', array('is_active' => 1));

                if($q->num_rows() == 0) {
                        return 0;
                }
                $qr = $q->row();

                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_FarKartuStudi', array('NRP' => $nrp, 'ThnAkademik' => $qr->tahun, 'Semester' => $qr->semester));

                $totalsks = 0;
                foreach($q->result() as $key => $value) {
                        $q = $this->db->query("SELECT sks FROM course WHERE kode_mk = '".$value->KodeMK."' OR old_kode_mk1 = '".$value->KodeMK."' OR old_kode_mk2 = '".$value->KodeMK."' OR old_kode_mk3 = '".$value->KodeMK."' OR old_kode_mk4 = '".$value->KodeMK."';");

                        if($q->num_rows() > 0) {
                                $qr = $q->row();
                                $totalsks += $qr->sks;
                        }
                }
                
                return $totalsks;
        }

        public function check_mk_in_ks($nrp, $kodemk) {
                // ambil periode aktif
                $q = $this->db->get_where('periode', array('is_active' => 1));
                $qr = $q->row();

                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_FarKartuStudi', array('NRP' => $nrp, 'ThnAkademik' => $qr->tahun, 'Semester' => $qr->semester));
                
                $kodeskripsi = explode(',',$kodemk);


                $hasileligible = false;

                foreach($kodeskripsi as $value) {

                        $q = $dbsim->get_where('v_FarKartuStudi', array('NRP' => $nrp,'ThnAkademik' => $qr->tahun, 'Semester' => $qr->semester, 'KodeMK' => $value));

                        if($q->num_rows() > 0) {
                                $hasileligible = true;
                                break;
                        } 
                
                }

                return $hasileligible;
        }

        public function connect_sim_raw($nrp){
                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_FarTranskrip', array('NRP' => $nrp));
                print_r($q->result());
        }

        public function connect_sim($nrp) {
                $dbsim = $this->load->database('sim',TRUE);
                $q = $dbsim->get_where('v_FarTranskrip', array('NRP' => $nrp));
                
                //print_r($q->result());

                $this->db->delete('student_transcript', array('student_nrp' => $nrp));

                $rangenilai = array('A' => 4, 'AB' => 3.5, 'B' => 3, 'BC' => 2.5, 'C' => 2, 'D' => 1, 'E' => 0,'E*' => 0);

                foreach($q->result() as $value) {
                        if($value->FlagHide == 'T') {
                                $data = array(
                                        'student_nrp' => $nrp,
                                        'kode_mk' => $value->KodeMK,
                                        'nama_mk' => $value->Nama, 
                                        'academic_year' => $value->ThnAkademik,
                                        'semester' => $value->Semester,
                                        'nisbi' => $value->KodeNisbi,
                                        'nisbi_value' => $rangenilai[$value->KodeNisbi],
                                        'sks' => $value->sks
                                );
                                $this->db->insert('student_transcript', $data);
                        }
                }
        }

        public function get_transcript_raw($nrp) {

                $q = $this->db->query("SELECT student_transcript.* FROM `student_transcript` WHERE `student_nrp` = '".$nrp."';");
              /*  $this->db->join('course', 'course.kode_mk = student_transcript.kode_mk','left');
                $this->db->select('student_transcript.*, course.nama as "namamk"');
                $this->db->where(' course.kode_mk ')
                $q = $this->db->get_where('student_transcript', array('student_nrp' => $nrp));*/
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

        public function get_transcript_from_array($kode_mk_arr, $nrp) {
                $where = ' (';
                foreach($kode_mk_arr  as $key => $value) {
                        if($where != ' (') {
                                $where .= ' OR ';
                        }
                        $where .= 'kode_mk = '.trim($value);
                }
                $where .= ') AND student_nrp = "'.$nrp.'" ';
                        
                $this->db->where($where);
                $q = $this->db->get('student_transcript');

                if($q->num_rows() > 0) {
                        return $q->row();
                } else {
                        return false;                    
                }
                
        }

        public function get_transcript($kode_mk_arr, $nrp) {
                $data = array();
                foreach($kode_mk_arr as $value) {
                        $this->db->where('kode_mk = "'.$value->kode_mk.'" OR old_kode_mk1 = "'.$value->kode_mk.'" OR old_kode_mk2 = "'.$value->kode_mk.'" OR old_kode_mk3 = "'.$value->kode_mk.'" ');
                        $a = $this->db->get('course');
                        $hasil = $a->row();
                        $cek = false;


                        // cari mknya di student_transcript
                        if($hasil->kode_mk != '') {
                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->kode_mk));
                                if($l->num_rows() > 0) {
                                        $cek = true;
                                        $data[] = $l->row();                                        
                                } 
                        }

                        // cari mknya di student_transcript
                        if($hasil->old_kode_mk1 != '') {
                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk1));
                                if($l->num_rows() > 0) {
                                        $cek = true;
                                        $data[] = $l->row();                                        
                                } 
                        }

                        // cari mknya di student_transcript
                        if($hasil->old_kode_mk2 != '') {
                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk2));
                                if($l->num_rows() > 0) {
                                        $cek = true;
                                        $data[] = $l->row();                                        
                                } 
                        }

                        // cari mknya di student_transcript
                        if($hasil->old_kode_mk3 != '') {
                                $l = $this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk3));
                                if($l->num_rows() > 0) {
                                        $cek = true;
                                        $data[] = $l->row();                                        
                                } 
                        }
                        
                        if($cek == false) {
                                $data[] = null;
                        
                        }
                }

                return $data;
        }

        public function is_eligible_course($kode_mk, $nrp) {
                $this->db->where('kode_mk = "'.$kode_mk.'" OR old_kode_mk1 = "'.$kode_mk.'" OR old_kode_mk2 = "'.$kode_mk.'" OR old_kode_mk3 = "'.$kode_mk.'" OR old_kode_mk4 = "'.$kode_mk.'" AND is_deleted = 0');
                $a = $this->db->get('course');
               // echo $this->db->last_query();
               // die();

                $hasil = $a->row();
                $eligbile = false;

                if($hasil->kode_mk != '') {
                        $q =$this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->kode_mk));
                        if($q->num_rows() >0) {
                                $eligbile = true;
                                return $q->row();
                        }
                }

                if($hasil->old_kode_mk1 != '') {
                        $q =$this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk1));
                        if($q->num_rows() >0) {
                                $eligbile = true;
                                return $q->row();
                        }
                }

                if($hasil->old_kode_mk2 != '') {
                        $q =$this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk2));
                        if($q->num_rows() >0) {
                                $eligbile = true;
                                return $q->row();
                        }
                }

                if($hasil->old_kode_mk3 != '') {
                        $q =$this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk3));
                        if($q->num_rows() >0) {
                                $eligbile = true;
                                return $q->row();
                        }
                }

                if($hasil->old_kode_mk4 != '') {
                        $q =$this->db->get_where('student_transcript', array('student_nrp' => $nrp, 'kode_mk' => $hasil->old_kode_mk4));
                        if($q->num_rows() >0) {
                                $eligbile = true;
                                return $q->row();
                        }
                }

                return false;              

                
        }

}

?>