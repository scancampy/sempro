<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
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

	public function student($delaction = null, $delnrp = null) {
		$data = array();
		if($this->input->get('btncari')) {
			$res = $this->Student_model->get(trim($this->input->get('nrp')), trim($this->input->get('nama')), trim(substr($this->input->get('angkatan'), -2)));

			$data['student'] = $res;
		}

		if($this->input->post('btnupload')) {
			$csv = $_FILES['filecsv']['tmp_name'];

			$handle = fopen($csv,"r");
			$cek = $this->Student_model->update($handle);
			if($cek == false) {
				$this->session->set_flashdata('notif', 'invalid_csv');
				redirect('master/student');
			} else {
				$this->session->set_flashdata('notif', 'success_csv');
				redirect('master/student');
			}			
		}

		if($delaction != null) {
			if($this->Student_model->del($delnrp)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/student');
			}
		}

		

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
    });';

    	// NOTIF
    	if($this->session->flashdata('notif') == 'invalid_csv') {
    		$data['js'] .= '
    			var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });

    			Toast.fire({
			        icon: "error",
			        title: "File CSV tidak sesuai template"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_csv') {
    		$data['js'] .= '
    			var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });

    			Toast.fire({
			        icon: "success",
			        title: "Sukses menambahkan data mahasiswa"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });

    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus data mahasiswa"
			      });
    		';
    	}

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_student', $data);
		$this->load->view('v_footer', $data);
	}
}
