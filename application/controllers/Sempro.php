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
		$data['periodeaktif'] = $this->Periode_model->get_periode_sidang_aktif(); 

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
				}
				break;
			} else if($role->roles == 'kalab') {
				// cek if kalab
				$idlab =  $info[0]->lab_id;
				$data['roles'] = 'kalab';
				$sempro = $this->Sempro_model->get_student_sempro_by_lab($idlab);

				if($sempro) {
					$data['sempro'] = $sempro;

				}
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


							if($this->input->post('btnSubmit')) {
								if($this->input->post('checkbox_setuju') != true) {
									$this->session->set_flashdata('notif', 'failed_daftar');
									$this->session->set_flashdata('msg', 'Anda harus menyetujui terlebih dahulu');
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
									 	$this->Sempro_model->insert($verified_proposal->id, $periodeaktif->id, $verified_proposal->student_nrp, $this->input->post('skskum'), $this->input->post('ipkkum'), $this->input->post('sksks'));
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
		foreach($roles as $role) {
			if($role->roles == 'student') {
				// cek apakah proposal ini punyanya ybs
				if($data['detail']->nrp != $info[0]->nrp) {
					redirect('dashboard');
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

  	
		
		$this->load->view('v_header', $data);
		$this->load->view('sempro/v_detail_sempro', $data);
		$this->load->view('v_footer', $data);	
	}

	
	public function plot($id, $p1, $p2) {
		$data = array();
		$data['p1'] = $p1;
		$data['p2'] = $p2;

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

		if($this->input->post('btnsubmit')) {
			$ruang = $this->input->post('ruang');
			$sempro_id = $this->input->post('sempro_id');
			$this->Sempro_model->update_ruang_sidang($sempro_id, $ruang);
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
						//alert(data);
						var obj = JSON.parse(data);
						var str = '<option value=\"0\">[Pilih Ruang]</option>';
						for(var i = 0; i < obj['data'].length; i++) { 
							var room = obj['data'][i];
							str += '<option value=\"' + room.id + '\">' + room.label + '</option>';							
						}
						$('#ruang').html(str);
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
			$("#ruang").on("change", function() {
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

	
	
}