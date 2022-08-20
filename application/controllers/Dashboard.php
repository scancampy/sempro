<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')) {
        	redirect('');
        }
    }
	
	public function index()
	{
		$data = array();
		$this->load->view('v_header',$data);

        $roles = $this->session->userdata('user')->roles;
		foreach($roles as $role) {
            if($role->roles == 'student') { 
            	$this->load->view('v_dashboard_student', $data);
            	break;
            } else {
            	$this->load->view('v_dashboard', $data);
            	break;
            }
        }
         
		
		$this->load->view('v_footer', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('');
	}
}
