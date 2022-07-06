<?php 
class Lecturer_model extends CI_Model {

        public $npk;
        public $nama;


        public function del($npk) {
                $q = $this->db->get_where('lecturer', array('npk' => $npk));
                $this->db->where('username', $npk);
                $this->db->delete('user_roles');

                $this->db->where('username', $npk);
                $this->db->delete('user');

                $this->db->where('npk', $npk);
                $this->db->delete('lecturer');

                if($q->num_rows() > 0) {
                        return true;
                } else {
                        return false;
                }
        }

        public function get($npk = '', $nama = '') {
                if($npk != '') {
                        $this->db->like('npk', $npk);
                }

                if($nama != '') {
                        $this->db->like('nama', $nama);
                }

                $this->db->order_by('nama', 'asc');
                $q = $this->db->get('lecturer'); 
                return $q->result();                       
        }

        public function update($csv) {
                $i =0;
                $valid = false;
                $numbercreated = 0;
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

                if($valid == false) {
                        return $valid;
                } else {
                        return $numbercreated;
                }
        }

}

?>