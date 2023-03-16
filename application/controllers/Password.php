<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
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
		$info = $this->session->userdata('user')->info;
		$roles = $this->session->userdata('user')->roles;
		
		if($this->input->post('btnSubmit')) {
			$this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
            );
            $this->form_validation->set_rules('new_password', 'New Password', 'required');
            $this->form_validation->set_rules('reenter_new_password', 'Re-enter New Password', 'required|matches[new_password]');

            if ($this->form_validation->run() == FALSE)
            {
            	$data['error'] = validation_errors('<li>','</li>');
			} else {
				if($this->User_model->change_password($this->session->userdata('user')->username, $this->input->post('password'), $this->input->post('new_password'))) {
					$this->session->set_flashdata('notif', 'success');
					$this->session->set_flashdata('msg', 'Sukses mengubah password');
					redirect('password');
				} else {
					$this->session->set_flashdata('notif', 'failed');
					$this->session->set_flashdata('msg', 'Gagal mengubah password. Password sekarang tidak tepat.');
					redirect('password');
				}
			}
		}

		// NOTIF
		$data['js'] = '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

		if($this->session->flashdata('notif') == 'success') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "'.$this->session->flashdata('msg').'"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'failed') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('msg').'"
			      });
    		';
    	}


		$this->load->view('v_header', $data);
		$this->load->view('v_change_password', $data);
		$this->load->view('v_footer', $data);
	}

	public function stskripsi() {
		$data = array();
		$info = $this->session->userdata('user')->info;
		$roles = $this->session->userdata('user')->roles;
		$is_admin_st = false;
        foreach($roles as $role) {
			if($role->roles == 'adminst') {
				$is_admin_st = true;
				break;
			}
		}

		if(!$is_admin_st) redirect("dashboard");

		// HANDLE SUBMIT
		if($this->input->post('btnvalidasi')) {
			$id = $this->input->post('hidden_id');

			$this->load->library('upload');

			$config['upload_path']          = './uploads/st';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 100000;
            $config['file_name']			= 'st_'.$id.date('Ymdhis').'.pdf';

            $this->upload->initialize($config);

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('filest'))
            {
            	$this->session->set_flashdata('notif', 'error_validated');
            	$this->session->set_flashdata('msg', $this->upload->display_errors());
            	redirect('admintu/stskripsi');
            }
            
			$this->Student_topik_model->validate_st($id, $info[0]->username, $config['file_name']);

			$this->session->set_flashdata('notif', 'success_validated');
			redirect('admintu/stskripsi');
		}

		// verified, st_created false, is_deleted false
		$data['proposal'] = $this->Student_topik_model->get_verified(1,0,0);

		// NOTIF
		$data['js'] = '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

		// DATA TABLE
		$data['js'] .= '
			$("#example2").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": true,
		      "responsive": true,
		    });';

		// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var lab = $(this).attr("targetlab");
    			var nrp = $(this).attr("targetnrp");
    			var studentname = $(this).attr("targetstudentname");
    			var p1 = $(this).attr("targetp1");
    			var p2 = $(this).attr("targetp2");
    			$("#hidden_id").val(id);
    			$("#nama").val(nama);
    			$("#lab").val(lab);
    			$("#nrp").val(nrp);
    			$("#studentname").val(studentname);
    			$("#targetp1").val(p1);
    			$("#targetp2").val(p2);
    		});
    	';

    	// CHECK VALIDASI BTN
    	$data['js'] .= '
    		$("#checkvalidasist").on("click", function() {
    			if(this.checked) {
    				$("#btnvalidasi").prop("disabled", false);
    			} else {
    				$("#btnvalidasi").prop("disabled", true);
    			}
    		});
    	';

    	if($this->session->flashdata('notif') == 'success_validated') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses memvalidasi ST Skripsi"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'error_validated') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('msg').'"
			      });
    		';
    	}

		// SELECT 2
		$data['js'] .= '
			//Initialize Select2 Elements
    		$(".select2").select2();
    		$(".select2bs4").select2({
		      theme: "bootstrap4"
		    });
		';

		$this->load->view('v_header', $data);
		$this->load->view('admintu/v_st_skripsi', $data);
		$this->load->view('v_footer', $data);
	}

	
}
