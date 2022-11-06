<?php 
class Roles_model extends CI_Model {

        public $id;
        public $username;
        public $roles;

        public function del_by_username($username) {
                $this->db->where('username', $username);
                $this->db->delete('user_roles');
        }

        public function del($id) {
                $q = $this->db->get_where('user_roles', array('id' => $id));

                if($q->num_rows() >0) {
                        $row = $q->row();
                        $this->db->trans_start();
                        if($row->roles == 'kalab') {
                                // delete juga dari user_lab
                                $this->db->where('npk',$row->username);
                                $this->db->delete('user_lab');
                        }

                        $this->db->where('id', $id);
                        $this->db->delete('user_roles');

                        $this->db->trans_complete();

                        return true;
                } else {
                        return false;
                }
        }

        public function add($username, $roles, $lab_id = '') {
                // cek dulu sudah ada roles nya ga dengan username tsb
                $q = $this->db->get_where('user_roles', array('username' => $username, 'roles' => $roles));
                if($q->num_rows() > 0) {
                        return false;
                } else {
                        // insert rolenya
                        $this->db->trans_start();
                        $data = array('username' => $username, 'roles' => $roles);
                        $this->db->insert('user_roles', $data);

                        if($roles== 'kalab' && $lab_id != '') {
                                $p = $this->db->get_where('user_lab', array('npk' => $username, 'id_lab' => $lab_id));
                                if($p->num_rows() ==0) {
                                        $data = array('npk' => $username, 'id_lab' => $lab_id);
                                        $this->db->insert('user_lab', $data);
                                }
                        }


                        $this->db->trans_complete();

                        return true;
                }
        }

        public function update($roles_id, $roles, $lab_id = '') {
                $q = $this->db->get_where('user_roles', array('id' => $roles_id, 'roles' => $roles));

                if($q->num_rows() > 0) {                        
                        // cek jika kalab
                        if($roles=='kalab') {                               
                                $row = $q->row();
                                $p = $this->db->get_where('user_lab', array('npk' => $row->username, 'id_lab' => $lab_id));
                                if($p->num_rows() > 0) {
                                        return false;
                                } else {
                                        // berarti kalab sama tapi ganti lab

                                        $this->db->trans_start();
                                        $data = array('id_lab' => $lab_id);
                                        $this->db->where('npk', $row->username);
                                        $this->db->update('user_lab', $data);

                                        $this->db->trans_complete();
                                        return true;
                                }
                        } else {
                                return false;
                        }
                } else {
                        // kasus ubah dari kalab jadi wd dan sebaliknya
                        // update

                        $this->db->trans_start();

                        $q = $this->db->get_where('user_roles', array('id' => $roles_id));
                        $row = $q->row();

                        $data = array('roles' => $roles);
                        $this->db->where('id', $roles_id);
                        $this->db->update('user_roles', $data);

                        $this->db->trans_complete();

                        if($roles=='kalab') {
                                $p = $this->db->get_where('user_lab', array('npk' => $row->username, 'id_lab' => $lab_id));
                                if($p->num_rows() > 0) {
                                        return false;
                                } else {
                                        // insert
                                        $data = array('npk' => $row->username, 'id_lab' => $lab_id);
                                        $this->db->insert('user_lab', $data);
                                        return true;
                                }
                        }
                       
                        return true;
                }
        }

        public function get($username = '', $exclude_roles = '') {
                if($username != '') {
                        $this->db->where('user_roles.username', $username);
                }

                if($exclude_roles != '') {
                        $exclude_role = explode(',', $exclude_roles);
                        foreach($exclude_role as $role) {
                                $this->db->where('user_roles.roles !=', $role);
                        }
                }
                $this->db->select('lecturer.nama, user_roles.roles, user_roles.id, user_roles.username, lab.nama as "namalab", user_lab.id_lab');
                $this->db->join('lecturer', 'lecturer.npk = user_roles.username', 'left');
                $this->db->join('user_lab', 'user_lab.npk = user_roles.username', 'left');
                $this->db->join('lab', 'lab.id = user_lab.id_lab', 'left');
                $this->db->order_by('user_roles.roles', 'asc');
                $q = $this->db->get('user_roles');       

                return $q->result();
        }

        public function is_kalab($npk, $topikid) {
                // cek apakah kalab
                $cek = $this->db->get_where('topik', array('id' => $topikid));
                if($cek->num_rows() > 0) {
                        $rcek = $cek->row();
                        $q = $this->db->get_where('user_lab', array('npk' => $npk, 'id_lab' => $rcek->id_lab));

                        if($q->num_rows() > 0) {
                                return true;
                        } else {
                                return false;
                        }
                } else {
                        return false;
                }
                
        }

        public function is_role_kalab($npk) {
                $q = $this->db->get_where('user_lab', array('npk' => $npk));
               // echo $this->db->last_query();
                if($q->num_rows() > 0) {
                        return true;
                } else {
                        return false;
                }
        }

        public function is_role_wd($npk) {
               $q = $this->db->get_where('user_roles', array('username' => $npk, 'roles' => 'wd'));
                if($q->num_rows() > 0) {
                        return true;
                } else {
                        return false;
                }
        }
}

?>