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
		
		// FILTER
		if($this->input->get('btncari')) {
			$res = $this->Student_model->get(trim($this->input->get('nrp')), trim($this->input->get('nama')), trim(substr($this->input->get('angkatan'), -2)));

			$data['student'] = $res;
		}

		// RESET PASS
		if($this->input->post('btnedit')) {
			if(trim($this->input->post('passwordedit')) != '') {
				$this->User_model->resetpass($this->input->post('nrpedit'), $this->input->post('passwordedit'));
				$this->session->set_flashdata('notif', 'success_reset');
				redirect('master/student');
			}
		}

		// UPLOAD CSV
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

		// DEL STUDENT
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
		$data['js'] .= '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

    	if($this->session->flashdata('notif') == 'invalid_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "File CSV tidak sesuai template"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses menambahkan data mahasiswa"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus data mahasiswa"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_reset') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses reset password mahasiswa"
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var nrp = $(this).attr("targetnrp");
    			var nama = $(this).attr("targetnama");
    			$("#nrpedit").val(nrp);
    			$("#namaedit").val(nama);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_student', $data);
		$this->load->view('v_footer', $data);
	}

	public function lecturer($delaction = null, $delnpk = null) {
		$data = array();
		
		// LOAD DOSEN
		$res = $this->Lecturer_model->get();
		$data['lecturer'] = $res;
		

		// RESET PASS
		if($this->input->post('btnedit')) {
			if(trim($this->input->post('passwordedit')) != '') {
				$this->User_model->resetpass($this->input->post('npkedit'), $this->input->post('passwordedit'));
				$this->session->set_flashdata('notif', 'success_reset');
				redirect('master/lecturer');
			}
		}

		// UPLOAD CSV
		if($this->input->post('btnupload')) {
			$csv = $_FILES['filecsv']['tmp_name'];

			$handle = fopen($csv,"r");

			$cek = $this->Lecturer_model->update($handle);
			if($cek == false) {
				$this->session->set_flashdata('notif', 'invalid_csv');
				redirect('master/lecturer');
			} else {
				$this->session->set_flashdata('notif', 'success_csv');
				redirect('master/lecturer');
			}			
		}

		// DEL LECTURER
		if($delaction != null) {
			if($this->Lecturer_model->del($delnpk)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/lecturer');
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
		$data['js'] .= '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

    	if($this->session->flashdata('notif') == 'invalid_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "File CSV tidak sesuai template"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses menambahkan data dosen"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus data dosen"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_reset') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses reset password dosen"
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var npk = $(this).attr("targetnpk");
    			var nama = $(this).attr("targetnama");
    			$("#npkedit").val(npk);
    			$("#namaedit").val(nama);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_lecturer', $data);
		$this->load->view('v_footer', $data);
	}
}
