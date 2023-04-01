<?php 
class User_model extends CI_Model {

        public $username;
        public $password;
        public $last_login;

        public function do_login() {
                $query = $this->db->get_where('user', array('username' => $this->input->post('userid', TRUE)));
                $row = $query->row();

                if (isset($row))
                {
                      $this->password = $row->password;
                      if(password_verify($this->input->post('password', TRUE), $this->password)) {
                        //update last login
                        $this->db->where('username', $this->input->post('userid', TRUE));
                        $this->db->update('user', array('last_login' => date('Y-m-d H:i:s')));
                        return $row;
                      }
                }
                return false;
        }

        public function add($username, $password, $user_type) {
                // cek dulu username exist atau ga
                $q = $this->db->get_where('user', array('username' => $username));

                if($q->num_rows() == 0) {
                        $data = array('username' => $username, 'password' => password_hash($newpass, PASSWORD_DEFAULT), 'user_type' => $user_type );
                        $this->db->insert('user', $data);
                        return "success";
                } else {
                        return "user_exist";
                }
        }

        public function resetpass($username, $newpass) {
               // echo $username; die();
                $data = array('password' =>  password_hash($newpass, PASSWORD_DEFAULT));
                $this->db->where('username', $username);
                $this->db->update('user', $data);
        }

        public function change_password($username, $oldpass, $newpass) {
                $query = $this->db->get_where('user', array('username' => $username));
                $row = $query->row();

                if (isset($row))
                {
                      $this->password = $row->password;
                      if(password_verify($oldpass, $this->password)) {
                        //ubah password
                        $data = array('password' =>  password_hash($newpass, PASSWORD_DEFAULT));
                        $this->db->where('username', $username);
                        $this->db->update('user', $data);
                        return true;
                      } else {
                        return false;
                      }
                }
                return false;
        }

        public function del($username) {
                $this->db->where('username', $username);
                $this->db->delete('user');
        }

}

?>