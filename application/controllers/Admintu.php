<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admintu extends CI_Controller {
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
			$this->Student_topik_model->validate_st($id, $info[0]->username);

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
