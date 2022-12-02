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

    $data['detail'] = $this->Student_topik_model->get('', $id);

    if($this->input->post('btnsimpanjudul')) {
    	 $info = $this->session->userdata('user');
    	 if($info->user_type == 'student') {
    	 		if(trim($this->input->post('juduledit')) =="") {
    	 			$this->session->set_flashdata('notif', 'failed_judul');
						redirect('proposal/detail/'.$id);
    	 		}

    	 		$this->load->library('upload');

					$config['upload_path']          = './uploads/kk';
		            $config['allowed_types']        = 'pdf';
		            $config['max_size']             = 100000;
		            $config['file_name']			= 'kk_'.$id.date('Ymdhis').'.pdf';

          $this->upload->initialize($config);

          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('filekk'))
          {
          	$this->session->set_flashdata('notif', 'error_validated');
          	$this->session->set_flashdata('msg', $this->upload->display_errors());
          	redirect('proposal/detail/'.$id);
          }
		            
					$this->Student_topik_model->update_judul($id, $this->input->post('juduledit'), $config['file_name']);
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

    if($this->input->post('btnwdfinalsubmit')) {
    	$info = $this->session->userdata('user');
    	 $wd = $this->Roles_model->is_role_wd($info->info[0]->npk);
       if($wd) {
       	$radiovalidasiwd = $this->input->post('radiovalidasifinalwd');
       	$reason = $this->input->post('final_alasan_ditolak');

       	if($radiovalidasiwd == "ditolak") {
       		$this->Student_topik_model->wd_final_is_reject($info->info[0]->npk,$id, $reason);
       		$this->session->set_flashdata('notif', 'success_wd_reject_final');
					redirect('proposal/detail/'.$id);
       	} else {
       		$this->Student_topik_model->wd_final_is_verified($info->info[0]->npk,$id);
       		$this->session->set_flashdata('notif', 'success_wd_final');
					redirect('proposal/detail/'.$id);
       	}
       }
    }

    if($this->input->post('btndosbingsubmit')) {
    	 $info = $this->session->userdata('user');
    	if($info->user_type == 'lecturer') {
        $cekdosbing= $this->Topik_model->get_npk($data['detail'][0]->topik_id);

        if($cekdosbing) {
        	if($cekdosbing->lecturer_npk == $info->info[0]->npk) {
        		$radiovalidasiwd = $this->input->post('radiovalidasidosbing');
		       	$reason = $this->input->post('alasan_ditolak_dosbing');

		       	if($radiovalidasiwd == "ditolak") {
		       		$this->Student_topik_model->dosbing_is_reject($info->info[0]->npk,$id, $reason);
		       		$this->session->set_flashdata('notif', 'success_dosbing_reject');
							redirect('proposal/detail/'.$id);
		       	} else {
		       		$this->Student_topik_model->dosbing_is_verified($info->info[0]->npk,$id);
		       		$this->session->set_flashdata('notif', 'success_lecturer1');
							redirect('proposal/detail/'.$id);
		       	}
        	}
        }
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

    if($this->input->post('btnkalabvalidasijudul')) {
    	$info = $this->session->userdata('user');
      if($info->user_type == 'lecturer') {
      	$data['kalab'] = $this->Roles_model->is_kalab($info->info[0]->npk,$data['detail'][0]->topik_id );
        if($data['kalab']) {
        	$radiovalidasikalab = $this->input->post('radiovalidasijudulkalab');
	       	$reason = $this->input->post('kalab_alasan_ditolak_judul');

	       	if($radiovalidasikalab == "ditolak") {
	       		$this->Student_topik_model->kalab_is_reject_judul($info->info[0]->npk,$id, $reason);
	       		$this->session->set_flashdata('notif', 'success_kalab_reject_judul');
						redirect('proposal/detail/'.$id);
	       	} else {
	       		$this->Student_topik_model->kalab_is_verified_judul($info->info[0]->npk,$id);
	       		$this->session->set_flashdata('notif', 'success_kalab_verified_judul');
						redirect('proposal/detail/'.$id);
	       	}
        }
      }      
    }

		
		if(count($data['detail']) ==0 ) {
			redirect('');
		}
		$data['prasyarat'] = $this->Topik_model->get_prasyarat_by_id($data['detail'][0]->topik_id);
		$data['topik'] = $this->Topik_model->get($data['detail'][0]->topik_id);
		$data['kuota'] = $this->Topik_model->get_kuota($data['detail'][0]->topik_id);
		$data['student'] = $this->Student_model->get($data['detail'][0]->student_nrp);
		$skripsi = $this->Eligibility_model->get('nama_alias = "skripsi"');
            	
	 $data['cekks'] = $this->Student_model->check_mk_in_ks($data['detail'][0]->student_nrp, $skripsi[0]->nilai);
            	
		$data['transcript_prasyarat'] = $this->Student_model->get_transcript($data['prasyarat'], $data['detail'][0]->student_nrp);

		$data['eligible'] = $this->Student_model->cek_eligible($data['detail'][0]->student_nrp);
        $data['setting'] = $this->Eligibility_model->get(' displayed_to_student = 1');

        if(is_null($data['detail'][0]->lecturer1_npk_verified_date)) {
          //cek apakah dirinya adalah dosbing dari mahasiswa ini?
          $info = $this->session->userdata('user');
          if($info->user_type == 'lecturer') {

            $cekdosbing= $this->Topik_model->get_npk($data['detail'][0]->topik_id);

            if($cekdosbing) {
            //	print_r($info);
            //	echo $cekdosbing->lecturer_npk;
           // 	die();
            	if($cekdosbing->lecturer_npk == $info->info[0]->npk) {
            		$data['lecturer1'] = true;
            	}
            }

          }
        }

        if(is_null($data['detail'][0]->kalab_npk_verified_judul_date)) {

          $info = $this->session->userdata('user');
          if($info->user_type == 'lecturer') {
            $data['kalab'] = $this->Roles_model->is_kalab($info->info[0]->npk,$data['detail'][0]->topik_id );
            if($data['kalab']) {
            	$data['is_kalab'] = true;
            	 $data['dosbing'] = $this->Lecturer_model->get_with_beban();
            }
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

		          if(!is_null($data['detail'][0]->wd_final_npk_rejected)) {
								$data['kalab'] = $this->Roles_model->is_kalab($info->info[0]->npk,$data['detail'][0]->topik_id );
		          	$data['dosbing'] = $this->Lecturer_model->get_with_beban();

		          }
		        }
        }

        // Cek Role Isi Judul by Maasiswa
        if(!is_null($data['detail'][0]->lecturer1_npk) && is_null($data['detail'][0]->lecturer1_validate_title)) {
        	$info = $this->session->userdata('user');
        	if($info->user_type == 'student') {
        		if($data['detail'][0]->student_nrp == $info->roles[0]->username) {
        			$data['is_student'] = true;	
        		}        		
        	}
        }

        // Cek Role Validasi Judul by Dosbing 1
        if(!is_null($data['detail'][0]->lecturer1_npk) && !is_null($data['detail'][0]->judul) && is_null($data['detail'][0]->lecturer1_validate_date)) {
        	$info = $this->session->userdata('user');
        	if($info->user_type == 'lecturer') {
        		if($data['detail'][0]->lecturer1_npk == $info->info[0]->npk) {
        			$data['is_dosbing'] = true;
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

			$("#radioditolakdosbing").on("click", function() {
				$("#container_alasan_dosbing").show();
				$("#alasan_ditolak_dosbing").focus();
			});

			$("#radioditerimadosbing").on("click", function() {
				$("#container_alasan_dosbing").hide();
			});

			$("#radioditolakjudulkalab").on("click", function() {
				$("#container_alasan_kalab").show();
				$("#kalab_alasan_ditolak_judul").focus();
			});

			$("#radioditerimajudulkalab").on("click", function() {
				$("#container_alasan_kalab").hide();
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

			$("#cekjudul").on("click", function() {
				if($("#cekjudul").is(":checked")) {
						$("#btnkalabvalidasijudul").prop("disabled", false); 
				} else {
					
						$("#btnkalabvalidasijudul").prop("disabled", true); 
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

  	if($this->session->flashdata('notif') == 'success_kalab_verified_judul') {
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

  	 if($this->session->flashdata('notif') == 'success_dosbing') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menyetujui proposal mahasiswa"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'success_dosbing_reject') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menolak proposal mahasiswa"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'success_kalab_reject_judul') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menolak proposal mahasiswa"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'success_wd_reject_final') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menolak proposal mahasiswa"
		      });
  		';
  	}

  	 if($this->session->flashdata('notif') == 'success_wd_final') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses menyetujui proposal mahasiswa"
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

  	if($this->session->flashdata('notif') == 'failed_judul') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "error",
		        title: "Gagal menyimpan judul proposal"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'success_dosbing_validasi_judul') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses memvalidasi judul proposal"
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

  	if($this->session->flashdata('notif') == 'success_lecturer1') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses memvalidasi proposal"
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

		$data['topik'] = $this->Topik_model->get('', $filterlab, 0, $pilihdosenpembuat,1, true);

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
		$data['student_topic'] = $this->Student_topik_model->get($info[0]->nrp,'',0);

		// CEK IS TOPIC ACTIVE
		$data['active_topic'] = $this->Student_topik_model->get($info[0]->nrp,'',0,0);

		//print_r($data['active_topic']);
		
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
