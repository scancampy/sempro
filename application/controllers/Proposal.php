<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {
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

	public function detail($id) {
		$data = array();

		$roles = $this->session->userdata('user')->roles;

		foreach($roles as $role) {
            if($role->roles == 'student') { 
            	$data['roles'] = 'student';

            	break;
            } else if($role->roles == "lecturer") {
            	$data['roles'] = 'lecturer';
            	break;
            } 
        }

    if($this->input->post('btnsubmitjudul')) {
    	 $info = $this->session->userdata('user');
    	 if($info->user_type == 'student') {
    	 		$this->Student_topik_model->update_judul($id, $this->input->post('judul'));
    	 		$this->session->set_flashdata('notif', 'success_judul');
					redirect('proposal/detail/'.$id);
    	 }
    }

    if($this->input->post('btnguardiansubmit')) {
    	 $info = $this->session->userdata('user');
        if($info->user_type == 'lecturer') {
          $this->Student_topik_model->guardian_is_verified($info->info[0]->npk, $this->input->post('alasan'), $id);
          $this->session->set_flashdata('notif', 'success_guardian');
					redirect('proposal/detail/'.$id);
        }
    }

    if($this->input->post('btnkalabsubmit')) {
    	 $info = $this->session->userdata('user');
        if($info->user_type == 'lecturer') {
          $this->Student_topik_model->kalab_is_verified($info->info[0]->npk,$id);
          $this->session->set_flashdata('notif', 'success_kalab');
					redirect('proposal/detail/'.$id);
        }
    }

    if($this->input->post('btnwdsubmit')) {
    	 $info = $this->session->userdata('user');
    	 $wd = $this->Roles_model->is_role_wd($info->info[0]->npk);
       if($wd) {
       	$radiovalidasiwd = $this->input->post('radiovalidasiwd');
       	$reason = $this->input->post('alasan_ditolak');

       	if($radiovalidasiwd == "ditolak") {
       		$this->Student_topik_model->wd_is_reject($info->info[0]->npk,$id, $reason);
       		$this->session->set_flashdata('notif', 'success_wd_reject');
					redirect('proposal/detail/'.$id);
       	} else {
       		$this->Student_topik_model->wd_is_verified($info->info[0]->npk,$id);
       		$this->session->set_flashdata('notif', 'success_wd');
					redirect('proposal/detail/'.$id);
       	}
       }
            
       /* if($info->user_type == 'lecturer') {
          $this->Student_topik_model->wd_is_verified($info->info[0]->npk,$id);
          $this->session->set_flashdata('notif', 'success_wd');
					redirect('proposal/detail/'.$id);
        }*/
    }

    if($this->input->post('btnkalabpilihdosbingsubmit')) {
    	$info = $this->session->userdata('user');
      if($info->user_type == 'lecturer') {
      	$this->Student_topik_model->update_dosbing($id, $this->input->post('dosbing1'),$this->input->post('dosbing2'));

          $this->session->set_flashdata('notif', 'success_dosbing');
					redirect('proposal/detail/'.$id);
      }
    }

		$data['detail'] = $this->Student_topik_model->get('', $id);
		if(count($data['detail']) ==0 ) {
			redirect('');
		}
		$data['prasyarat'] = $this->Topik_model->get_prasyarat_by_id($data['detail'][0]->topik_id);
		$data['topik'] = $this->Topik_model->get($data['detail'][0]->topik_id);
		$data['kuota'] = $this->Topik_model->get_kuota($data['detail'][0]->topik_id);
		$data['student'] = $this->Student_model->get($data['detail'][0]->student_nrp);
		$skripsi = $this->Eligibility_model->get('nama_alias = "skripsi"');
            	
	//	$data['cekks'] = $this->Student_model->check_mk_in_ks($data['detail'][0]->student_nrp, $skripsi[0]->nilai);
            	
		$data['transcript_prasyarat'] = $this->Student_model->get_transcript($data['prasyarat'], $data['detail'][0]->student_nrp);

		$data['eligible'] = $this->Student_model->cek_eligible($data['detail'][0]->student_nrp);
        $data['setting'] = $this->Eligibility_model->get(' displayed_to_student = 1');

        if(is_null($data['detail'][0]->guardian_npk_verified)) {
          //cek apakah dirinya adalah guardian dari mahasiswa ini?
          $info = $this->session->userdata('user');
          if($info->user_type == 'lecturer') {
            $data['guardian'] = $this->Guardian_model->get($data['detail'][0]->student_nrp,'','',$info->info[0]->npk);

          }
        }

        if(is_null($data['detail'][0]->kalab_npk_verified)) {
          //cek apakah dirinya adalah kalab pada topik ini?
          $info = $this->session->userdata('user');
          if($info->user_type == 'lecturer') {
            $data['kalab'] = $this->Roles_model->is_kalab($info->info[0]->npk,$data['detail'][0]->topik_id );
          }
        }

        if(!is_null($data['detail'][0]->kalab_npk_verified) && is_null($data['detail'][0]->wd_npk_verified)) {
          $info = $this->session->userdata('user');
          if($info->user_type == 'lecturer') {
	          $data['wd'] = $this->Roles_model->is_role_wd($info->info[0]->npk);
	        }
        }

        if(is_null($data['detail'][0]->lecturer1_npk) && is_null($data['detail'][0]->lecturer2_npk)){
						$info = $this->session->userdata('user');
	          if($info->user_type == 'lecturer') {
		          $data['kalab'] = $this->Roles_model->is_kalab($info->info[0]->npk,$data['detail'][0]->topik_id );
		          $data['dosbing'] = $this->Lecturer_model->get_with_beban();

		        }
        }

        if(!is_null($data['detail'][0]->lecturer1_npk) && !is_null($data['detail'][0]->lecturer2_npk)){
						$info = $this->session->userdata('user');
	          if($info->user_type == 'lecturer') {
		          $data['wd'] = $this->Roles_model->is_role_wd($info->info[0]->npk);
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

		// SELECT2 INIT
		$data['js'] .= '
    $(".select2").select2();
    		$(".select2bs4").select2({
		      theme: "bootstrap4"
		    });
';

		// HANDLE SUBMIT DOSBING
		$data['js'] .= '
				$("#btnkalabpilihdosbingsubmit").on("click", function(e) {
					// cek dosbing harus diisi
					if($("#dosbing1").val() == 0) {
						alert("Dosbing 1 harus dipilih");
						e.preventDefault();
					
					} else if($("#dosbing2").val() == 0) {
						alert("Dosbing 2 harus dipilih");
						e.preventDefault();
					
					} else if($("#dosbing1").val() == $("#dosbing2").val()) {
						alert("Dosbing 1 dan 2 harus berbeda");
						e.preventDefault();
					
					} 
				});
		';

		// HANDLE RADIO DITOLAK
		$data['js'] .= '
			$("#radioditolak").on("click", function() {
				$("#container_alasan").show();
				$("#alasan_ditolak").focus();
			});

			$("#radioditerima").on("click", function() {
				$("#container_alasan").hide();
			});
		';

		// CHECKBOX HANDLE
		$data['js'] .= '
			$("#ceksyaratwd").on("click", function() {
				if($("#ceksyaratwd").is(":checked")) {
						$("#btnwdsubmit").prop("disabled", false); 
				} else {
					
						$("#btnwdsubmit").prop("disabled", true); 
				}
			});

			$("#ceksyaratkalab").on("click", function() {
				if($("#ceksyaratkalab").is(":checked")) {
						$("#btnkalabsubmit").prop("disabled", false); 
				} else {
					
						$("#btnkalabsubmit").prop("disabled", true); 
				}
			});

			$("#ceksyaratguardian").on("click", function() {
				if($("#ceksyaratguardian").is(":checked")) {
						$("#btnguardiansubmit").prop("disabled", false); 
				} else {
					
						$("#btnguardiansubmit").prop("disabled", true); 
				}
			});
		';

		if($this->session->flashdata('notif') == 'success_guardian') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menyimpan pengecekan prasyarat mahasiswa"
		      });
  		';
    }

    if($this->session->flashdata('notif') == 'success_kalab') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses memvalidasi proposal mahasiswa"
		      });
  		';
  	}

    if($this->session->flashdata('notif') == 'success_wd') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menyetujui proposal mahasiswa"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'success_wd_reject') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menolak proposal mahasiswa"
		      });
  		';
  	}

  	 if($this->session->flashdata('notif') == 'success_judul') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menyimpan judul proposal"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'success_dosbing') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menyimpan dosbing 1 dan dosbing 2"
		      });
  		';
  	}


		$this->load->view('v_header', $data);
		$this->load->view('proposal/v_detail', $data);
		$this->load->view('v_footer', $data);
	}

	public function pilihtopik() {
		$data = array();

		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;

		$data['student'] = $this->Student_model->get($info[0]->nrp);
		if(count($data['student']) ==0) {
			redirect('dashboard');
		} else {
			// CEK IS TOPIC ACTIVE
			$data['active_topic'] = $this->Student_topik_model->get($info[0]->nrp,'',0,0,0,true);

			if(count($data['active_topic']) > 0) {
				//sudah ada topik, maka tidak boleh akses halaman ini
				redirect('dashboard');
			}
		}


		// HANDLE pilih topik
		if($this->input->post('btnpilih')) {
			$cek = $this->Topik_model->check_prasyarat_mk($this->input->post('btnpilih'), $info[0]->nrp);
			switch($cek) {
				case 'not_eligible':
					$this->session->set_flashdata('notif', 'failed_pick_topic');
					$this->session->set_flashdata('notif_msg', 'Anda belum memenuhi syarat untuk mengambil topik');
					break;
				case 'active_topic_found':
					$this->session->set_flashdata('notif', 'failed_pick_topic');
					$this->session->set_flashdata('notif_msg', 'Anda sudah memiliki topik');
					break;
				case 'req_not_valid':
					$this->session->set_flashdata('notif', 'failed_pick_topic');
					$this->session->set_flashdata('notif_msg', 'Mata kuliah prasyarat belum terpenuhi');
					break;
				case 'valid':
					$this->Student_topik_model->pick_topic($this->input->post('btnpilih'), $info[0]->nrp);
					$this->session->set_flashdata('notif', 'success_pick_topic');
					redirect('proposal/student');
					break;				
			}
			redirect('proposal/pilihtopik');
		}

			// GET TOPIK
		$filterlab = $this->input->get('filterlab');
		if($filterlab == 'all') { $filterlab = ''; }

		$pilihdosenpembuat = $this->input->get('pilihdosenpembuat');
		if($pilihdosenpembuat == 'all') { $pilihdosenpembuat = ''; }

		$data['topik'] = $this->Topik_model->get('', $filterlab, 0, $pilihdosenpembuat,'all', true);

		// GET KUOTA
		$data['kuota'] = array();
		foreach($data['topik'] as $value) {
			$data['kuota'][] = $this->Topik_model->get_kuota($value->id);
		}

		// GET LAB
		$data['lab'] = $this->Lab_model->get();

		// GET PRASYARAT
		$data['prasyarat'] = $this->Topik_model->get_prasyarat($data['topik']);

		// GET DOSEN
		$data['lecturer'] = $this->Lecturer_model->get();

		// CHECK TRANSCRIPT
		$prasyarat_transcript = array();
		$rangenilai = array('A' => 4, 'AB' => 3.5, 'B' => 3, 'BC' => 2.5, 'C' => 2, 'D' => 1, 'E' => 0,'E*' => 0);
		foreach($data['prasyarat'] as $idx => $value) {
			if(isset($value[0])) {
				// ini untuk checking mk prasyarat 1. Jika transkrip mhs memenuhi maka true
				$cek = $this->Student_model->is_eligible_course($value[0]->kode_mk, $info[0]->nrp);
				if($cek == false) {
					$prasyarat_transcript[$idx][0] = false;
				} else {
					if($rangenilai[$value[0]->minimum_mark] > $cek->nisbi_value) {
						$prasyarat_transcript[$idx][0] = false;
					} else {
						$prasyarat_transcript[$idx][0] = true;
					}
				}
			}

			if(isset($value[1])) {
				// ini untuk checking mk prasyarat 1. Jika transkrip mhs memenuhi maka true
				$cek = $this->Student_model->is_eligible_course($value[1]->kode_mk, $info[0]->nrp);
				if($cek == false) {
					$prasyarat_transcript[$idx][1] = false;
				} else {
					if($rangenilai[$value[1]->minimum_mark] > $cek->nisbi_value) {
						$prasyarat_transcript[$idx][1] = false;
					} else {
						$prasyarat_transcript[$idx][1] = true;
					}
				}
			}			
		}

		$data['prasyarat_transcript'] = $prasyarat_transcript;

		// DATA TABLE
		$data['js'] = '
			$("#example2").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": true,
		      "responsive": true
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

		  if($this->session->flashdata('notif') == 'failed_pick_topic') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('notif_msg').'"
			      });
    		';
    	}



		$this->load->view('v_header', $data);
		$this->load->view('proposal/v_pilih_topik', $data);
		$this->load->view('v_footer', $data);
	}

	public function student($delaction = null, $delid = null) {
		$data = array();
		
		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;

		$data['student'] = $this->Student_model->get($info[0]->nrp);
		if(count($data['student']) ==0) {
			redirect('dashboard');
		}

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

		// GET STUDENT TOPIC
		$data['student_topic'] = $this->Student_topik_model->get($info[0]->nrp);

		// CEK IS TOPIC ACTIVE
		$data['active_topic'] = $this->Student_topik_model->get($info[0]->nrp,'',0,0);

		print_r($data['active_topic']);
		
		// PILIH TOPIK
		if($this->input->post('btnpilih')) {
			$cek = $this->Topik_model->check_prasyarat_mk($this->input->post('btnpilih'), $info[0]->nrp);
			switch($cek) {
				case 'not_eligible':
					$this->session->set_flashdata('notif', 'failed_pick_topic');
					$this->session->set_flashdata('notif_msg', 'Anda belum memenuhi syarat untuk mengambil topik');
					break;
				case 'active_topic_found':
					$this->session->set_flashdata('notif', 'failed_pick_topic');
					$this->session->set_flashdata('notif_msg', 'Anda sudah memiliki topik');
					break;
				case 'req_not_valid':
					$this->session->set_flashdata('notif', 'failed_pick_topic');
					$this->session->set_flashdata('notif_msg', 'Mata kuliah prasyarat belum terpenuhi');
					break;
				case 'valid':
					$this->Student_topik_model->pick_topic($this->input->post('btnpilih'), $info[0]->nrp);
					$this->session->set_flashdata('notif', 'success_pick_topic');
					break;				
			}
			redirect('proposal/student');
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
		      "responsive": true
		    });';

		$data['js'] .= '
			$("#example3").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": false,
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

    	if($this->session->flashdata('notif') == 'success_pick_topic') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses pilih topik"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'failed_pick_topic') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('notif_msg').'"
			      });
    		';
    	}

    	$data['js'] .= 'bsCustomFileInput.init(); ';

		$this->load->view('v_header', $data);
		$this->load->view('proposal/v_proposal', $data);
		$this->load->view('v_footer', $data);
	}

	//AJAX CALL
	public function loadtopik() {
		$hasil = $this->Topik_model->get('',$this->input->post('idlab'));
		$prasyarat = $this->Topik_model->get_prasyarat($hasil);
		echo json_encode(array('data' => $hasil, 'prasyarat' => $prasyarat));
	}
	
}
