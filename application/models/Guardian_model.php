<?php 
class Guardian_model extends CI_Model {

        public $nrp;
        public $npk;


        public function del($nrp) {
                $this->db->where('nrp', $nrp);
                $this->db->delete('guardian');
        }

        public function get($nrp = '', $nama = '', $angkatan = '', $doswal ='') {
                if($angkatan != '') {
                        $this->db->like('guardian.nrp', $angkatan);
                }

                if($nrp != '') {
                        $this->db->like('guardian.nrp', $nrp);
                }

                if($nama != '') {
                        $this->db->like('guardian.nama', $nama);
                }

                if($doswal != '') {
                        $this->db->where('guardian.npk', $doswal);
                }

                $this->db->select('guardian.*, student.nama as "namastudent", lecturer.nama as "namalecturer"');

                if($nrp != '' || $nama != '' || $angkatan != '' || $doswal != '') {
                        $this->db->join('student', 'student.nrp = guardian.nrp', 'left');
                        $this->db->join('lecturer', 'lecturer.npk = guardian.npk', 'left');
                        $q = $this->db->get('guardian'); 

                        return $q->result(); 
                } else {
                        return false;
                }                       
        }

        public function updatedata($nrp, $npk) {
                $data = array('npk' => $npk);
                $this->db->where('nrp', $nrp);
                $this->db->update('guardian', $data);
        }

        public function update($csv) {
                $i =0;
                $valid = false;
                $numbercreated = 0;
                $this->db->trans_start();
                while (($row = fgetcsv($csv, 10000, ",")) != FALSE) //get row vales
                {                    
                    if($i==0 && strtolower($row[0]) =='nrp' && strtolower($row[1]) == 'npk') {
                        $valid =  true;
                    }

                    if($valid == false) { return false; }

                    if($i>0) {
                        $this->nrp = $row[0];
                        $this->npk = $row[1];

                        $q = $this->db->get_where('guardian', array('nrp' => $this->nrp));

                        if($q->num_rows()==0) {
                                $this->db->insert('guardian', $this);                               
                                $numbercreated++;
                        } else {
                                // update
                                $data = array('npk' => $this->npk);
                                $this->db->where('nrp', $this->nrp);
                                $this->db->update('guardian', $data);
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