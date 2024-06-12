<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user')) {
        	redirect('dashboard');
        }
    }
	
	public function index()
	{
		$data = array();
		if($this->input->post('btnlogin')) {
			//$this->session->sess_destroy();
				
			$this->form_validation->set_rules('userid', 'NRP / NPK', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');

			if ($this->form_validation->run() == FALSE) {
                $data['error'] = validation_errors(); 
            } else { 
            	$login = $this->User_model->do_login();
				if($login) {

					// create session & redirect
					if($login->user_type == 'staff') {
						$login->info = $this->Staff_model->get($login->username);
					}

					if($login->user_type == 'lecturer') {
						$login->info = $this->Lecturer_model->get($login->username);
					}

					if($login->user_type == 'student') {
						$login->info = $this->Student_model->get($login->username);
					}

					// get roles
					$login->roles = $this->Roles_model->get($login->username);

					// get user data
					$this->session->set_userdata('user', $login);
					redirect('dashboard');
				} else {
					// display error
					$data['error'] = '<li>NRP/NPK atau password salah.</li>';
				}
			}

		}
		$this->load->view('v_login', $data);
	}
}
