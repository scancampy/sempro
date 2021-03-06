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

        public function resetpass($username, $newpass) {
                $data = array('password' =>  password_hash($newpass, PASSWORD_DEFAULT));
                $this->db->where('username', $username);
                $this->db->update('user', $data);
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}

?>