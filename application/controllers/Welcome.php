<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data = array();
		if($this->input->post('btnlogin')) {
			$this->form_validation->set_rules('userid', 'NRP / NPK', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');

			if ($this->form_validation->run() == FALSE) {
                $data['error'] = validation_errors(); 
            } else { 
				if($this->User_model->do_login()) {
					// create session & redirect
				} else {
					// display error
					$data['error'] = '<li>NRP/NPK atau password salah.</li>';
				}
			}

		}
		$this->load->view('v_login', $data);
	}
}
