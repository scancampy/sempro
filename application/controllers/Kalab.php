<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalab extends CI_Controller {
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

	public function add_topic() {
		$data = array();

		$roles = $this->session->userdata('user')->roles;
        foreach($roles as $role) {
			if($role->roles == 'kalab') {

				$data['namalab'] = $role->namalab;
				$data['id_lab'] = $role->id_lab;

				break;
			}
		}

		// HANDLE SUBMIT
		if($this->input->post('btnsubmit')) {
			$topiks = $this->input->post('topik');
			$kuota = $this->input->post('kuota');
			$courseid1 = $this->input->post('course_id1');
			$courseid2 = $this->input->post('course_id2');
			$minimummark1 = $this->input->post('minimum_mark1');
			$minimummark2 = $this->input->post('minimum_mark2');

			foreach($topiks as $i => $topik) {
				if($topik != '') {
					$lastid = $this->Topik_model->add($topik, $data['id_lab'] , $kuota[$i]); 

					if($lastid) {

						// periode check
						if($this->input->post('periodecheck'.($i+1))) {
							$periode = $this->input->post('periodecheck'.($i+1));

							foreach($periode as $p) {
								$this->Topik_model->add_avail_periode($lastid, $p);
							}
						}

						// requirement course check					
						if($courseid1[$i] != '') {
							$this->Topik_model->add_req_course($courseid1[$i], $minimummark1[$i], $lastid);
						}
						if($courseid2[$i] != '') {
							$this->Topik_model->add_req_course($courseid2[$i], $minimummark2[$i], $lastid);
						}
					}
				}
			}

			$this->session->set_flashdata('notif', 'success_add');
			
			redirect('kalab/add_topic');
		}

		$data['periode'] = $this->Periode_model->get('',0, ' id >= (SELECT id FROM `periode` WHERE is_active = 1)', 'id','desc');
		$data['course'] =$this->Course_model->get();

		// NOTIF
		$data['js'] = '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah topik"
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
		$this->load->view('kalab/v_add_topic', $data);
		$this->load->view('v_footer', $data);
	}

	public function topic($delaction = null, $delid = null) {
		$data = array();
		
		$roles = $this->session->userdata('user')->roles;
        foreach($roles as $role) {
			if($role->roles == 'kalab') {

				$data['namalab'] = $role->namalab;
				$data['id_lab'] = $role->id_lab;

				break;
			}
		}

		// GET TOPIK
		$data['topik'] = $this->Topik_model->get();

		// GET LAB
		$data['lab'] = $this->Lab_model->get();

		// TAMBAH TOPIK
		if($this->input->post('btntambah')) {
			$this->Topik_model->add($this->input->post('nama'), $this->input->post('deskripsi'), $data['id_lab'], $this->input->post('kuota'));
			$this->session->set_flashdata('notif', 'success_add');
			
			redirect('kalab/topic');
		}

		// DEL TOPIK
		if($delaction != null) {
			$this->Topik_model->del($delid);
			$this->session->set_flashdata('notif', 'success_del');
			redirect('kalab/topic');			
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


    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus topik"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah topik"
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
		$this->load->view('kalab/v_topik', $data);
		$this->load->view('v_footer', $data);
	}

	
}
