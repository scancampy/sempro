<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer extends CI_Controller {
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
        // USER INFO
		$data['info'] = $this->session->userdata('user')->info;


		// HANDLE SUBMIT
		if($this->input->post('btnsubmit')) {

			$topiks = $this->input->post('topik');
			$kuota = $this->input->post('kuota');
			$courseid1 = $this->input->post('course_id1');
			$courseid2 = $this->input->post('course_id2');
			$minimummark1 = $this->input->post('minimum_mark1');
			$minimummark2 = $this->input->post('minimum_mark2');
			$idlab = $data['info'][0]->lab_id;
			$npk = $data['info'][0]->npk;

			foreach($topiks as $i => $topik) {
				if($topik != '') {
					$lastid = $this->Topik_model->add($topik, $idlab, $kuota[$i],'', $npk); 

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
			
			redirect('lecturer/add_topic');
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
		$this->load->view('lecturer/v_add_topic', $data);
		$this->load->view('v_footer', $data);
	}

	public function topic($delaction = null, $delid = null) {
		$data = array();
		$roles = $this->session->userdata('user')->roles;

		// USER INFO
		$data['info'] = $this->session->userdata('user')->info;

		// cek kalab
		$data['is_kalab'] = false;
		foreach($roles as $value) {
			if($value->roles =='kalab') {
				$data['is_kalab'] = true;
			}
		}

		// HANDLE FILTER
		$data['course'] =$this->Course_model->get();
		$data['periode_edit'] = $this->Periode_model->get('',0, ' id >= (SELECT id FROM `periode` WHERE is_active = 1)', 'id','desc');
		$data['periode'] = $this->Periode_model->get('',0, ' id = (SELECT id FROM `periode` WHERE is_active = 1)', 'id','desc');
		$dosenpembuat = $this->input->get('pilihdosenpembuat');
		$filterlab = $this->input->get('filterlab');
		$semestersedia = $this->input->get('pilihsemestersedia');

		if($filterlab == '') { $filterlab = $data['info'][0]->lab_id; }
		if($dosenpembuat == 'self' ) { 
			$dosenpembuat = $data['info'][0]->npk;
		}

		$data['topik'] = $this->Topik_model->get('', $filterlab, 0, $dosenpembuat, $semestersedia);
		$data['kuota'] = array();
		foreach($data['topik'] as $value) {
			$data['kuota'][] = $this->Topik_model->get_kuota($value->id);
		}

		$data['prasyarat'] = $this->Topik_model->get_prasyarat($data['topik']);
		$data['periode_topik'] = $this->Periode_model->get_periode_from_topik($data['topik']);

		// GET LAB
		$data['lab'] = $this->Lab_model->get();

		// TAMBAH TOPIK
		if($this->input->post('btnsimpan')) {		
		    // cek jika mk prasyarat sama
		    if($this->input->post('course_id1') != '') {
		    	if($this->input->post('course_id1') == $this->input->post('course_id2')) {
		    		$this->session->set_flashdata('notif', 'failed_edit');	
		    		$this->session->set_flashdata('notif_msg', 'Mata kuliah prasyarat tidak boleh sama');		
					redirect('lecturer/topic');
		    	}

		    	// cek nilai minimum 
		    	if($this->input->post('minimum_mark1') == '') {
		    		$this->session->set_flashdata('notif', 'failed_edit');
		    		$this->session->set_flashdata('notif_msg', 'Nilai minimal MK prasyarat 1 belum diset');			
					redirect('lecturer/topic');
		    	}
		    }	

		    if($this->input->post('course_id2') != '') {
		    	// cek nilai minimum 
		    	if($this->input->post('minimum_mark2') == '') {
		    		$this->session->set_flashdata('notif', 'failed_edit');
		    		$this->session->set_flashdata('notif_msg', 'Nilai minimal MK prasyarat 2 belum diset');			
					redirect('lecturer/topic');
		    	}
		    }

			if($this->input->post('hidubahperiode')) {
				$this->Topik_model->update_periode($this->input->post('hidid'), $this->input->post('periodecheck'));
			}

			$this->Topik_model->update($this->input->post('hidid'), $this->input->post('namaedit'),$this->input->post('kuotaedit'), $this->input->post('course_id1'),$this->input->post('minimum_mark1'), $this->input->post('course_id2'),$this->input->post('minimum_mark2'));

			$this->session->set_flashdata('notif', 'success_edit');
			
			redirect('lecturer/topic');
		}

		// VALIDASI TOPIK
		if($this->input->post('btnvalidasi') && $data['is_kalab'] == true) {
			$this->Topik_model->validasi_kalab($this->input->post('hididvalidasi'), $data['info'][0]->npk);
			$this->session->set_flashdata('notif', 'success_validate');

			$query = '';
			if($_SERVER['QUERY_STRING'] != '') {
				$query = '?'.$_SERVER['QUERY_STRING'];
			}

			redirect('lecturer/topic'.$query);			
		}

		// DEL TOPIK
		if($delaction != null) {
			$this->Topik_model->del($delid);
			$this->session->set_flashdata('notif', 'success_del');
			redirect('lecturer/topic');			
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

    	if($this->session->flashdata('notif') == 'failed_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('notif_msg').'"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses simpan topik"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_validate') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses validasi topik"
			      });
    		';
    	}

    	// VALIDASI BTN
    	$data['js'] .= '
    		$("body").on("click",".validatebtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var kuota = $(this).attr("targetkuota");
    			var prasyarat1 = $(this).attr("targetprasyarat1");
    			var prasyarat2 = $(this).attr("targetprasyarat2");
    			var min1 = $(this).attr("targetmin1");
    			var min2 = $(this).attr("targetmin2");
    			var periodebuka = $(this).attr("periodebuka");
    			$("#hididvalidasi").val(id);
    			$("#namavalidasi").val(nama);
    			$("#kuotavalidasi").val(kuota);
    			
    			var min1str = "";
    			if(prasyarat1 != "") { min1str = " (minimum " + min1 + ")"; }

    			$("#course_id1_validasi").val(prasyarat1 + min1str);

    			$("#angkatanvalidasi").val(periodebuka);


    			var min2str = "";
    			if(prasyarat2 != "") { min2str = " (minimum " + min2 + ")"; }
    			$("#course_id2_validasi").val(prasyarat2 + min2str);
    		});
    	';

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var kuota = $(this).attr("targetkuota");
    			var prasyarat1 = $(this).attr("targetprasyarat1");
    			var prasyarat2 = $(this).attr("targetprasyarat2");
    			var min1 = $(this).attr("targetmin1");
    			var min2 = $(this).attr("targetmin2");
    			var periodebuka = $(this).attr("periodebuka");
    			$("#hidid").val(id);
    			$("#namaedit").val(nama);
    			$("#kuotaedit").val(kuota);
    			$("#course_id1").val(prasyarat1);
    			$("#minimum_mark1").val(min1);
    			$("#currentperiode").html(periodebuka);

    			$("#course_id2").val(prasyarat2);
    			$("#minimum_mark2").val(min2);
    		});
    	';

    	// HANDLE UBAH PERIODE BTN
    	$data['js'] .= '
    		$("#ubahperiode").on("click", function() {
    			$("#containerperiode").show();
    			$("#currentperiode").hide();	
    			$(this).hide();
    			$("#hidubahperiode").val(true);
    		});
    	';

    	// HANDLE MODAL EDIT OPEN UNTUK INIT
    	$data['js'] .= '
	    	$( "#modal-edit" ).on("shown.bs.modal", function(){
			    $("#containerperiode").hide();
    			$("#currentperiode").show();
    			$("#ubahperiode").show();
    			$("#hidubahperiode").val(false);
			});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';

		$this->load->view('v_header', $data);
		$this->load->view('lecturer/v_topic', $data);
		$this->load->view('v_footer', $data);
	}

	public function proposal() {
		$data = array();
		$roles = $this->session->userdata('user')->roles;
		
		// USER INFO
		$data['info'] = $this->session->userdata('user')->info;
		$data['topik'] = $this->Topik_model->get('', '', 0, $data['info'][0]->npk);
	
		// GET STUDENT TOPIC
		$pilihtopik = $this->input->get('pilihtopik');
		$data['student_topic'] = $this->Student_topik_model->get('', '', 0, 0, $pilihtopik);
		

		$this->load->view('v_header', $data);
		$this->load->view('lecturer/v_proposal', $data);
		$this->load->view('v_footer', $data);
	}

	
}
