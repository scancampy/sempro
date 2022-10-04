<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transkrip extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')) {
        	redirect('');
        }
    }
	
	public function index()
	{
		redirect('dashboard');
	}

	public function student($nrp = '') {
		$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;

		$lecturer = false;
		foreach($roles as $value) {
			if($value->roles =='lecturer') {
				$lecturer = true;
			}
		}

		if($lecturer == false) {
			$data['transkrip'] = $this->Student_model->get_transcript_raw($info[0]->nrp);
		} else {
			$data['transkrip'] = $this->Student_model->get_transcript_raw($nrp);
		}

		$data['nilai_d'] = 0;
		$data['nilai_e'] = 0;
		$data['totalsks'] = 0;
		foreach($data['transkrip'] as $value) {
			if($value->nisbi == 'D') {
				$data['nilai_d'] += $value->sks;
			} else if($value->nisbi =='E' || $value->nisbi == 'E*') {
				$data['nilai_e'] += $value->sks;
			}

			$data['totalsks'] += $value->sks;
		}

		$data['tanpa_e'] = $data['totalsks']-$data['nilai_e'];

		$data['js'] = '';

		// DATA TABLE
		$data['js'] = '
			$("#example2").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": true,
		      "responsive": true,
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
		    });';


		$this->load->view('v_header', $data);
		$this->load->view('transkrip/v_transkrip', $data);
		$this->load->view('v_footer', $data);
	}
}