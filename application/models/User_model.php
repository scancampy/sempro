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
                        return true;
                      }
                }
                return false;
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