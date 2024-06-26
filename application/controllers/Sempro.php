<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sempro extends CI_Controller {
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

		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;
		//print_r($roles); die();
		$data['periodeaktif'] = $this->Periode_model->get_periode_sidang_aktif(); 
		$data['periode'] = $this->Periode_model->get();
		

		foreach($roles as $role) {
			if($role->roles == 'student') {
				$data['roles'] = 'student';

				// cek button daftar sidang
				$semprodata = $this->Sempro_model->get_student_sempro($info[0]->nrp);

				// cek sudah daftar sempro
				if($semprodata == false) {
					// cek apakah saat ini ada periode sidang					
					$periodeaktif = $this->Periode_model->get_periode_sidang_aktif(); 

					if($periodeaktif != false) {
						$data['periode_aktif'] = $periodeaktif;
						// cek apakah ada proposal mhs yg eligible
						$verified_proposal = $this->Student_topik_model->get_proposal_verified_st($info[0]->nrp);
						if($verified_proposal != false) {
							$data['registration_available'] = $verified_proposal;
						} else {
							$data['registration_not_eligible'] = true;
						}
					} 
				} else {
					$data['already_registered'] = true;
					$data['sempro'] = $semprodata;

					// cek apakah sudah lulus sempro
            		$data['lulus_sempro'] = $this->Sempro_model->get_student_sempro_all('sempro.nrp = "'.$info[0]->nrp.'" AND sempro.is_done = 1');
				}
				break;
			} else if($role->roles == 'lecturer') {

				$data['is_lecturer'] = true;
				$data['roles'] = 'lecturer';
				if($data['periodeaktif'] != false) {
					$sempro = $this->Sempro_model->get_student_sempro_by_npk($roles[0]->username, $data['periodeaktif']->id); 
					if($sempro) {
						$data['sempro'] = $sempro;

					}
				}

				
			
			} else if($role->roles == 'kalab') {
				// cek if kalab
				$idlab =  $info[0]->lab_id;
				$data['roles'] = 'kalab';
				$sempro = $this->Sempro_model->get_student_sempro_by_lab($idlab, $roles[0]->username, $data['periodeaktif']->id);

				if($sempro) {
					$data['sempro'] = $sempro;

				}

				break;
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

		// Success Register
		if($this->session->flashdata('notif') == 'success_register') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Sukses daftar Ujian Proposal"
		      });
  		';
    }
		

		$this->load->view('v_header', $data);
		$this->load->view('sempro/v_sempro', $data);
		$this->load->view('v_footer', $data);
	}

	public function daftar() {
		$data = array();

		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;
		foreach($roles as $role) {
			if($role->roles == 'student') {

				// cek button daftar sidang
				$semprodata = $this->Sempro_model->get_student_sempro($info[0]->nrp);

				// cek sudah daftar sempro
				if($semprodata == false) {
					// cek apakah saat ini ada periode sidang					
					$periodeaktif = $this->Periode_model->get_periode_sidang_aktif(); 

					if($periodeaktif != false) {
						$data['periode_aktif'] = $periodeaktif;
						// cek apakah ada proposal mhs yg eligible
						$verified_proposal = $this->Student_topik_model->get_proposal_verified_st($info[0]->nrp);
					//	print_r($verified_proposal);
					//	die();
						if($verified_proposal != false) {
							$data['registration_available'] = $verified_proposal;
							// hitung sks kum, dan ipk kum
							$data['ipkkum'] = $this->Student_model->get_ipk_kum($info[0]->nrp);
							$data['skskum'] = $this->Student_model->get_sks_kum($info[0]->nrp);

							$data['sks_in_ks'] = $this->Student_model->get_jumlah_mk_in_ks($info[0]->nrp);

							$nilaimklulus = $this->MK_lulus_model->get("is_deleted = 0");
							
							


							if($this->input->post('btnSubmit')) {
								if($this->input->post('checkbox_setuju') != true) {
									$this->session->set_flashdata('notif', 'failed_daftar');
									$this->session->set_flashdata('msg', 'Anda harus mencentang terlebih dahulu');
									redirect('sempro/daftar');
								} else {
									// simpan pendaftaran
									 $this->load->library('form_validation');
									 $this->form_validation->set_rules('skskum', 'Sks Kum', 'required|integer');
									 $this->form_validation->set_rules('ipkkum', 'IPk Kum', 'required|decimal');
									 $this->form_validation->set_rules('sksks', 'Sks Kartu Studi', 'required|integer');

									 if ($this->form_validation->run() == FALSE) {
									 	$data['error'] = validation_errors();
									 } else {
									 	$this->load->library('upload');

										$config['upload_path']          = './uploads/naskah';
							            $config['allowed_types']        = 'pdf';
							            $config['max_size']             = 100000;
							            $config['file_name']			= 'naskah_'.date('Ymdhis').'.pdf';
							            $namafile = $config['file_name'];

							          	$this->upload->initialize($config);
							          	$this->load->library('upload', $config);

								        if ( ! $this->upload->do_upload('filekk') && !$this->input->post('linknaskahdrive')) {

								          	$this->session->set_flashdata('notif', 'error_validated');
								          	$this->session->set_flashdata('msg', 'Silahkan upload naskah pdf atau link google drive');
								          	redirect('sempro/daftar');
								        } else if (empty($_FILES['filekk']['name']) && !$this->input->post('linknaskahdrive')) {
											$this->session->set_flashdata('notif', 'error_validated');
								          	$this->session->set_flashdata('msg', 'Silahkan upload naskah pdf atau link google drive');
								          	redirect('sempro/daftar');
										} else if(empty($_FILES['filekk']['name'])) {
											$namafile = null;
										}
										//echo $namafile;
										//die();
					      
									 	$this->Sempro_model->insert($verified_proposal->id, $periodeaktif->id, $verified_proposal->student_nrp, $this->input->post('skskum'), $this->input->post('ipkkum'), $this->input->post('sksks'), $namafile, $this->input->post('linknaskahdrive'));
									 	$this->session->set_flashdata('notif', 'success_register');
									 	redirect('sempro');
									 }
                
								}
								//print_r($_POST);
								//die();
							}
						} else {
							redirect('dashboard');
						}
					} else { redirect('dashboard'); }
				} else {
					redirect('dashboard');
				}
				break;
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

		// Failed
		if($this->session->flashdata('notif') == 'failed_daftar') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "error",
		        title: "'.$this->session->flashdata('msg').'"
		      });
  		';
    }

    	// Errror validated
		if($this->session->flashdata('notif') == 'error_validated') {
	  		$data['js'] .= '
	  			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('msg').'"
			      });
	  		';
	    }

		$this->load->view('v_header', $data);
		$this->load->view('sempro/v_daftar', $data);
		$this->load->view('v_footer', $data);

	}

	public function detail($id) {
		$data = array();

		// load id
		$data['detail'] = $this->Sempro_model->get_student_sempro_by_id($id);
		//print_r($data['detail']);
		//die();
		if(!$data['detail']) {
			redirect('dashboard');
		}

		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;
		$data['info'] = $info;
		foreach($roles as $role) {
			if($role->roles == 'student') {
				// cek apakah proposal ini punyanya ybs
				if($data['detail']->nrp != $info[0]->nrp) {
					redirect('dashboard');
				}

				$data['is_student'] = true;

				if($this->input->post('btnSubmitNaskahSempro')) {
				
					$this->load->library('upload');

					$config['upload_path']          = './uploads/naskah';
		            $config['allowed_types']        = 'pdf';
		            $config['max_size']             = 100000;
		            $config['file_name']			= 'naskah_'.date('Ymdhis').'.pdf';
		            $namafile = $config['file_name'];

		          	$this->upload->initialize($config);
		          	$this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('filekk') && !$this->input->post('linknaskahdrive')) {
			        	$this->session->set_flashdata('notif', 'failed');				 	
				 		$this->session->set_flashdata('msg', 'Silahkan upload naskah pdf atau link google drive');
			          	redirect('sempro/detail/'.$id);
			        } else if (empty($_FILES['filekk']['name']) && !$this->input->post('linknaskahdrive')) {
						$this->session->set_flashdata('notif', 'failed');				 	
				 		$this->session->set_flashdata('msg', 'Silahkan upload naskah pdf atau link google drive');
			          	redirect('sempro/detail/'.$id);
					} else if(empty($_FILES['filekk']['name'])) {

						$namafile = $data['detail']->naskah_filename;
					}

					$this->Sempro_model->update_naskah_filename($id, $namafile, $this->input->post('linknaskahdrive'));
      
				 	$this->session->set_flashdata('notif', 'success');				 	
				 	$this->session->set_flashdata('msg', 'Sukses update naskah sempro');
				 	redirect('sempro/detail/'.$id);
				}

				if($this->input->post('btnmhssimpanjudul')) {
					$newjudul = $this->input->post('revisijudul');

					$this->load->library('upload');

					$config['upload_path']          = './uploads/naskah';
		            $config['allowed_types']        = 'pdf';
		            $config['max_size']             = 100000;
		            $config['file_name']			= 'naskah_'.$id.date('Ymdhis').'.pdf';
		            $namafile = $config['file_name'];

		          	$this->upload->initialize($config);
		          	$this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('file_naskah_revisi') && !$this->input->post('linkrevisinaskahdrive')) {

			          	$this->session->set_flashdata('notif', 'error_validated');
			          	$this->session->set_flashdata('msg', 'Silahkan upload revisi naskah pdf atau link google drive');
			          	redirect('sempro/detail/'.$id);
			        } else if (empty($_FILES['file_naskah_revisi']['name']) && !$this->input->post('linkrevisinaskahdrive')) {
						$this->session->set_flashdata('notif', 'error_validated');
			          	$this->session->set_flashdata('msg', 'Silahkan upload revisi naskah pdf atau link google drive');
			          	redirect('sempro/detail/'.$id);
					} else if(empty($_FILES['file_naskah_revisi']['name'])) {
						$namafile = null;
					}

//					echo $namafile;
//					die();
			        $this->Sempro_model->update_judul($id, $newjudul, $config['file_name'], $this->input->post('linkrevisinaskahdrive'));

					$this->session->set_flashdata('notif', 'success');
		          	$this->session->set_flashdata('msg', 'Sukses merevisi judul');
		          	redirect('sempro/detail/'.$id);
				}

				if($this->input->post('btnuploadnaskah')) {
		    	 	$this->load->library('upload');

					$config['upload_path']          = './uploads/naskah';
		            $config['allowed_types']        = 'pdf';
		            $config['max_size']             = 100000;
		            $config['file_name']			= 'naskah_'.$id.date('Ymdhis').'.pdf';
		            $namafile = $config['file_name'];

		          	$this->upload->initialize($config);
		          	$this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('filekk') && !$this->input->post('linknaskahdrive')) {

			          	$this->session->set_flashdata('notif', 'error_validated');
			          	$this->session->set_flashdata('msg', 'Silahkan upload naskah pdf atau link google drive');
			          	redirect('sempro/detail/'.$id);
			        } else if (empty($_FILES['filekk']['name']) && !$this->input->post('linknaskahdrive')) {
						$this->session->set_flashdata('notif', 'error_validated');
			          	$this->session->set_flashdata('msg', 'Silahkan upload naskah pdf atau link google drive');
			          	redirect('sempro/detail/'.$id);
					} else if(empty($_FILES['filekk']['name'])) {
						$namafile = null;
					}
      
				  	$this->Sempro_model->update_naskah_filename($id, $namafile, $this->input->post('linknaskahdrive'));
		    	  	$this->session->set_flashdata('notif', 'success');
		    	  	$this->session->set_flashdata('msg', 'Sukses upload naskah sempro');
				  	redirect('sempro/detail/'.$id);
			    }
			} else if($role->roles =='lecturer') {
				$data['is_lecturer'] = true;
				if($this->input->post('btndosbingvalidasirevisijudul')) {
					// cek apakah betul dosbignya
					if($info[0]->npk == $data['detail']->pembimbing1 || $info[0]->npk == $data['detail']->pembimbing2) {
						$this->Sempro_model->validate_revisi_judul($id, $info[0]->npk);
						$this->session->set_flashdata('notif', 'success');
			          	$this->session->set_flashdata('msg', 'Sukses validasi revisi judul');
			          	redirect('sempro/detail/'.$id);
					} else {
						// bukan dosbingnya
						$this->session->set_flashdata('notif', 'failed');
			          	$this->session->set_flashdata('msg', 'Anda bukan dosbing mahasiswa ini');
			          	redirect('sempro/detail/'.$id);
					}
				}

				if($this->input->post('btndosbingsubmitnilai')) {
					$saran = $this->input->post('saran');
					$materi = $this->input->post('materi');
					$rumusan = $this->input->post('rumusan');
					$tujuan = $this->input->post('tujuan');
					$metodologi = $this->input->post('metodologi');	
					$analisis = $this->input->post('analisis');
					$kesimpulan = $this->input->post('kesimpulan');
					$notifupload ='';
					if($this->input->post('cekrevisijudul')) {
						$cekrevisijudul = true;
					} else {
						$cekrevisijudul = false;
					}

		          	if($_FILES['file_hasil_sempro']['size'] > 0) {
		          		$this->load->library('upload');

						$config['upload_path']          = './uploads/naskah';
			            $config['allowed_types']        = 'gif|jpg|png|jpeg';
			            $config['max_size']             = 100000;
			            $config['file_name']			= 'hasil_sempro_'.$id.date('Ymdhis').'.jpg';
			            $namafilehasil = $config['file_name'];

			          	$this->upload->initialize($config);
			          	$this->load->library('upload', $config);
				        if ( ! $this->upload->do_upload('file_hasil_sempro')) {
				          	$notifupload .= " namun gagal upload foto hasil sempro";
				          	$namafilehasil = null;
				          	$this->session->set_flashdata('notif', 'failed');
							$this->session->set_flashdata('msg', 'Gagal upload foto hasil sempro');
							redirect('sempro/detail/'.$id);
				        }
				    }
				     

					$this->Sempro_model->submit_hasil_sempro($id, $materi, $rumusan, $tujuan, $metodologi, $analisis, $saran, $kesimpulan, $cekrevisijudul, $namafilehasil);
					$this->session->set_flashdata('notif', 'success');
					$this->session->set_flashdata('msg', 'Sukses submit hasil Sempro'.$notifupload);
					redirect('sempro/detail/'.$id);
				} 
			} else if($role->roles == 'kalab') {
				//print_r($data['detail']); die();
				$topik = $this->Student_topik_model->get($data['detail']->nrp, $data['detail']->student_topik_id );
				//print_r($topik); die();
				$data['kalab'] = $this->Roles_model->is_kalab($info[0]->npk,$topik[0]->topik_id );
			//	print_r($info[0]->npk);
			//	print_r($data['detail']->student_topik_id);

			//	print_r($info);
			//	die();
				// cek apakah saat ini ada periode sidang					
				$periodeaktif = $this->Periode_model->get_periode_sidang_aktif(); 

				if($periodeaktif != false) {
						$data['periode_aktif'] = $periodeaktif;
				}

				// get sidang time
				$data['sidang_time'] = $this->Sempro_model->get_sidang_time();
				// get dosbing
				$data['dosbing'] = $this->Lecturer_model->get_with_beban();

				if($this->input->post('btnkalabsubmit')) {

					// cek tanggal harus dalam periode
					$sidang_date =  date('Y-m-d',strtotime($this->input->post('sidang_date')));

					if(strtotime($sidang_date) < strtotime($periodeaktif->date_start)) {						
						$this->session->set_flashdata('notif', 'failed');
						$this->session->set_flashdata('msg', 'Tanggal sidang harus berada dalam rentang periode sidang');
						redirect('sempro/detail/'.$id);

					} else if(strtotime($sidang_date) > strtotime($periodeaktif->date_end)) {

						$this->session->set_flashdata('notif', 'failed');
						$this->session->set_flashdata('msg', 'Tanggal sidang harus berada dalam rentang periode sidang');
						redirect('sempro/detail/'.$id);
					} else {
						//update validasi kalab
						$this->Sempro_model->kalab_validate($id, $info[0]->npk, $sidang_date, $this->input->post('sidang_time'), $this->input->post('penguji1'), $this->input->post('penguji2'));
					
						$this->session->set_flashdata('notif', 'success');
						$this->session->set_flashdata('msg', 'Berhasil validasi pengajuan daftar sidang');
						redirect('sempro/detail/'.$id);
					}
				}

				if($this->input->post('btnbatalplot')) {
					// cek dulu id dan kode kalab
					if($data['kalab'] && $info[0]->npk == $data['detail']->kalab_npk_verified) {
						$this->Sempro_model->kalab_cancel_plot($id);
						$this->session->set_flashdata('notif', 'success');
						$this->session->set_flashdata('msg', 'Berhasil membatalkan plot sidang sempro');
						redirect('sempro/detail/'.$id);
					}
					
				}
			}
		}

		// INIT DATE PICKER
    	$data['js'] = '
			    	//Date picker
			    $("#sidang_date").datetimepicker({
			        format: "L"
			    });
			';


		// SELECT2 INIT
		$data['js'] .= '
    $(".select2").select2();
    		$(".select2bs4").select2({
		      theme: "bootstrap4"
		    });
';

		// HANDLE BTN KALAB SUBMIT
		$data['js'] .= '
		$("#btnkalabsubmit").on("click",function(e) {
			var adaerror = false;

			if($("#sidang_date_id").val() == "") {
				alert("Tanggal sidang wajib diisi"); adaerror =true;
			} else if($("#penguji1").val() ==0) {
				alert("Penguji 1 wajib dipilih"); adaerror =true;
			} else if($("#penguji2").val() ==0) {
				alert("Penguji 2 wajib dipilih"); adaerror =true;
			} else if($("#penguji1").val() ==$("#penguji2").val()) {
				alert("Penguji 1 dan 2 tidak boleh sama"); adaerror =true;
			}

			if(adaerror) {	e.preventDefault(); } else {
				window.location.replace("'.base_url('sempro/plot/'.$id).'/" + $("#penguji1").val() + "/" + $("#penguji2").val());
			}
		});
		';


		// CHECKBOX HANDLE
		$data['js'] .= '
			$("#cekrevisinaskah").on("click", function() {
				if($("#cekrevisinaskah").is(":checked")) {
					if($("#file_naskah_revisi").get(0).files.length != 0 || $("#linkrevisinaskahdrive").val().trim().length > 0 ) {
						$("#btnmhssimpanjudul").prop("disabled", false); 
					} else {
						$("#btnmhssimpanjudul").prop("disabled", true); 
					}
				} else {
					
						$("#btnmhssimpanjudul").prop("disabled", true); 
				}
			});';

			// CHECKBOX HANDLE
		$data['js'] .= '
			$("#cekjudul").on("click", function() {
				if($("#cekjudul").is(":checked")) {
						$("#btndosbingvalidasirevisijudul").prop("disabled", false); 
				} else {
					
						$("#btndosbingvalidasirevisijudul").prop("disabled", true); 
				}
			});';

		// NOTIF

		 // NOTIF
		$data['js'] .= '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

    if($this->session->flashdata('notif') == 'failed') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "error",
		        title: "'.$this->session->flashdata('msg').'"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'success') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "'.$this->session->flashdata('msg').'"
		      });
  		';
  	}

  	if($this->session->flashdata('notif') == 'plot_success') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "success",
		        title: "Plot jadwal sidang berhasil disimpan"
		      });
  		';
  	}

  	 if($this->session->flashdata('notif') == 'plot_failed') {
  		$data['js'] .= '
  			Toast.fire({
		        icon: "error",
		        title: "'.$this->session->flashdata('message').'"
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
		$this->load->view('sempro/v_detail_sempro', $data);
		$this->load->view('v_footer', $data);	
	}

	
	public function plot($id, $p1, $p2) {
		
		$this->load->helper('text');
		$data = array();
		$data['p1'] = $p1;
		$data['p2'] = $p2;
		$data['room'] = $this->Room_model->get();

		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;
		$is_kalab = false;
		foreach($roles as $role) {
			if($role->roles == 'kalab') {
				$is_kalab = true;
				break;
			}
		}

		if($is_kalab) {
			// load id
			$data['detail'] = $this->Sempro_model->get_student_sempro_by_id($id);
			$topik = $this->Student_topik_model->get($data['detail']->nrp, $data['detail']->student_topik_id );
			$data['kalab'] = $this->Roles_model->is_kalab($info[0]->npk,$topik[0]->topik_id );
			if(!$data['detail']) {
				redirect('dashboard');
			}

			if(!$data['kalab']) {
				redirect('dashboard');
			}

			$data['periodeaktif'] = $this->Periode_model->get_periode_sidang_aktif(); 
			$data['penguji1'] = $this->Lecturer_model->get($p1);
			$data['penguji2'] = $this->Lecturer_model->get($p2);
			// get sidang time
			$data['sidang_time'] = $this->Sempro_model->get_sidang_time();

			$data['sempro'] = $this->Sempro_model->get_student_sempro_by_periode($data['periodeaktif']->id);

			if($this->input->post('btnsubmit')) {
				$hasilplot = $this->Sempro_model->insert_plot($id, $p1, $p2, $this->input->post('tglsidang'), $this->input->post('jamsidang'), $info[0]->npk);
				if($hasilplot == true) {
					$this->session->set_flashdata('notif', 'plot_success');
					redirect('sempro/detail/'.$id);
				} else {
					$this->session->set_flashdata('notif', 'plot_failed');
					$this->session->set_flashdata('message', $hasilplot);
					redirect('sempro/detail/'.$id);
				}
			}


		} else {
			redirect('sempro');
		}

		$data['js'] = "
			$('.btnplot').on('click', function() {
				var tsl = $(this).attr('tanggalsidanglabel');
				var stl = $(this).attr('sidangtimelabel');
				var ts = $(this).attr('tanggalsidang');
				var st = $(this).attr('sidangtimeid');
				$('#txt_tanggal_sidang').val(tsl);
				$('#txt_jam_sidang').val(stl);
				$('#tglsidang').val(ts);
				$('#jamsidang').val(st);
			});

		";

		// SHOW SIDANG BUTTON
		$data['js'] .= "
			$('.btnplotshow').on('click', function() {
				var tsl = $(this).attr('tanggalsidanglabel');
				var stl = $(this).attr('sidangtimelabel');
				var ts = $(this).attr('tanggalsidang');
				var st = $(this).attr('sidangtimeid');
				$('#span_tgl_sidang').html(tsl);
				$('#txt_jam_sidang').val(stl);
				$('#tglsidang').val(ts);
				$('#jamsidang').val(st);

				$.post('".base_url('ajaxcall/load_sidang')."', { 'tglsidang': ts, 'jamsidang': st }, function(data) { 
					var obj = JSON.parse(data);
					var str_table = '';

					for(var i = 0; i < obj['data'].length; i++) {
						str_table += '<tr>';
						var item = obj['data'][i];
						var nama = item['nama'];
						var nrp = item['nrp'];
						var dosbing1 = item['dosbing1'];

						var dosbing2 = item['dosbing2'];
						if(item['dosbing2'] == null) {
							dosbing2 = '-';
						}
						var penguji1 = item['namapenguji1'];
						var penguji2 = item['namapenguji2'];
						var roomlabel = item['roomlabel'];
						var label = item['label'];

						str_table += '<td>' + (i+1) + '</td>';	
						str_table += '<td>' + nama + ' / ' + nrp + '</td>';
						str_table += '<td>(1) ' + dosbing1 + '<br/>(2) ' + dosbing2 + '</td>';
						str_table += '<td>(Ketua) ' + penguji1 + '<br/>(Sekretaris) ' + penguji2 + '</td>';
						str_table += '<td><strong>' + roomlabel + '</strong></td>';
						str_table += '<td><strong>' + label + '</strong></td>';
						str_table += '</tr>';
					}
					$('#tbody-sidang').html(str_table);
					
				});
			});

		";

		// CHECKBOX HANDLE
		$data['js'] .= '
			$("#cekhasilplot").on("click", function() {
				if($("#cekhasilplot").is(":checked")) {
						$("#btnsubmit").prop("disabled", false); 
				} else {
					
						$("#btnsubmit").prop("disabled", true); 
				}
			});';

		


		$this->load->view('v_header', $data);
		$this->load->view('sempro/v_plot', $data);
		$this->load->view('v_footer', $data);
	}

	public function plotruang() {
		$this->load->helper('text');
		$data = array();
		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;
		//print_r($info);
		//die();

		if($this->input->post('btnsubmit')) {
			$ruang = $this->input->post('ruang');
			$sempro_id = $this->input->post('sempro_id');
			$this->Sempro_model->update_ruang_sidang($sempro_id, $ruang, $info[0]->username);
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('msg', 'Sukses plot ruang');
			redirect('sempro/plotruang');
		}

		$data['periodeaktif'] = $this->Periode_model->get_periode_sidang_aktif(); 
		$data['periodeall'] = $this->Periode_model->get_periode_sidang();
		$data['admintu'] = null;
		$data['sidang_time'] = $this->Sempro_model->get_sidang_time();
		$data['ruang'] = $this->Room_model->get();

		foreach($roles as $role) {
			if($role->roles == 'adminst') {
				$data['admintu'] = true;
			}
		}

		if($data['admintu'] == null) { redirect('dashboard'); }

		if($this->input->post('btnbatalplotruang')) {
			$this->Sempro_model->admin_cancel_room_plot($this->input->post('sempro_id'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('msg', 'Sukses membatalkan plot ruang');
			redirect('sempro/plotruang');
		}

		$data['sempro'] = $this->Sempro_model->get_student_sempro_by_periode($data['periodeaktif']->id);

		$data['js'] = "
			$('.btnplot').on('click', function() {
				var tsl = $(this).attr('tanggalsidanglabel');
				var stl = $(this).attr('sidangtimelabel');
				var ts = $(this).attr('tanggalsidang');
				var st = $(this).attr('sidangtimeid');
				var roomlabel = $(this).attr('ruanglabel');

				if(roomlabel == '') {
					$('#btnsubmit').show();
					$.post('".base_url('ajaxcall/get_available_room')."', { 'tglsidang': ts, 'jamsidang': st }, function(data) {
						
						var obj = JSON.parse(data);
						var str = '<select class=\"form-control\" name=\"ruang\" id=\"ruang\"><option value=\"0\">[Pilih Ruang]</option>';
						for(var i = 0; i < obj['data'].length; i++) { 
							var room = obj['data'][i];
							str += '<option value=\"' + room.id + '\">' + room.label + '</option>';							
						}
						str += '</select>';
						$('#ruangsidang').html(str);
					});
				} else {
					$('#btnsubmit').hide();
					$('#ruangsidang').html(roomlabel + ' <button type=\"submit\" name=\"btnbatalplotruang\" onclick=\"return confirm(\'Yakin batalkan plot ruang ini?\');\" value=\"submit\" class=\"btn btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Batalkan Ruang</button>');
				}

				$('#txt_tanggal_sidang').val(tsl);
				$('#txt_jam_sidang').val(stl);
				$('#tglsidang').val(ts);
				$('#jamsidang').val(st);
				$('#judul').val($(this).attr('judul'));
				$('#mahasiswa').val($(this).attr('nama') + ' - ' + $(this).attr('nrp'));
				$('#dosbing1').val($(this).attr('dosbing1'));
				$('#dosbing2').val($(this).attr('dosbing2'));
				$('#namapenguji1').val($(this).attr('namapenguji1'));
				$('#namapenguji2').val($(this).attr('namapenguji2'));
				$('#sempro_id').val($(this).attr('sempro_id'));
				
			});

		";

		 // NOTIF
		$data['js'] .= '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

		// CHECKBOX HANDLE
		$data['js'] .= '
			$("body").on("change", "#ruang", function() {
				if($(this).val() != 0) {
					$("#btnsubmit").prop("disabled", false); 
				} else {					
					$("#btnsubmit").prop("disabled", true); 
				}
			});';

		if($this->session->flashdata('notif') == 'success') {
  		$data['js'] .= '
  			Toast.fire({
			        icon: "success",
			        title: "'.$this->session->flashdata('msg').'"
			      });
	  		';
	  	}

		$this->load->view('v_header', $data);
		$this->load->view('sempro/v_plot_ruang', $data);
		$this->load->view('v_footer', $data);
	}


	//AJAX CALL
	public function loadtopik() {
		$hasil = $this->Topik_model->get('',$this->input->post('idlab'));
		$prasyarat = $this->Topik_model->get_prasyarat($hasil);
		echo json_encode(array('data' => $hasil, 'prasyarat' => $prasyarat));
	}

	public function loadsidang() {

	}
	
	
}
