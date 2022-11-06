<?php 
class Course_model extends CI_Model {

        public $id;
        public $kode_mk;
        public $old_kode_mk1;
        public $old_kode_mk2;
        public $old_kode_mk3;
        public $old_kode_mk4;
        public $nama;
        public $is_deleted = 0;


        public function del($id) {
                $this->db->where('id', $id);
                $this->db->update('course', array('is_deleted' => 1));
        }

        public function get($kode_mk = '', $nama = '', $is_deleted = 0) {
                if($kode_mk != '') {
                        $this->db->where('kode_mk', $kode_mk);
                }

                if($nama != '') {
                        $this->db->like('nama', $nama);
                }

                $this->db->where('is_deleted', $is_deleted);

                $q = $this->db->get('course'); 
                return $q->result();                       
        }

        public function update_course($id,$old_kode_mk1, $old_kode_mk2,$old_kode_mk3, $nama ) {
                $data = array(
                        "old_kode_mk1" => $old_kode_mk1,
                        "old_kode_mk2" => $old_kode_mk2,
                        "old_kode_mk3" => $old_kode_mk3,
                        "nama" => $nama
                );

                $this->db->where('id', $id);
                $this->db->update('course', $data);
        }

        public function update($csv) {
                $i =0;
                $valid = false;
                $numbercreated = 0;
                
                $this->db->trans_start();
                while (($row = fgetcsv($csv, 10000, ";")) != FALSE) //get row vales
                {  
                    if($i==0 && strtolower($row[0]) =='kodebaru' && strtolower($row[1]) == 'kodelama1'  && strtolower($row[2]) == 'kodelama2' && strtolower($row[3]) == 'kodelama3' && strtolower($row[4]) == 'nama') {
                        $valid =  true;
                    }

                    if($valid == false) { return false; }

                    if($i>0) {
                        $this->kode_mk = $row[0];
                        $this->old_kode_mk1 = $row[1];
                        $this->old_kode_mk2 = $row[2];
                        $this->old_kode_mk3 = $row[3];
                        $this->nama = $row[4];

                        $q = $this->db->get_where('course', array('kode_mk' => $this->kode_mk,'is_deleted' => 0));

                        if($q->num_rows()==0) {                            
                                $this->db->insert('course', $this);                               
                                $numbercreated++;
                        } else {
                                // update
                                $data = array('nama' => $this->nama, 'old_kode_mk1' => $this->old_kode_mk1,'old_kode_mk2' => $this->old_kode_mk2,'old_kode_mk3' => $this->old_kode_mk3);
                                $this->db->where('kode_mk', $this->kode_mk);
                                $this->db->update('course', $data);
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