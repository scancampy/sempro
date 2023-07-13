<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lulus extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')) {
        	redirect('');
        }
    }

    public function index() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;

		$data['roles'] = '';
		$data['is_kalab'] = false;
		$data['is_admin_st'] = false;

		//print_r($roles);

		foreach($roles as $role) {
			if($role->roles == 'student') {
				$data['roles'] = 'student';
				$data['skripsi'] = $this->Skripsi_model->get_student_skripsi($info[0]->nrp);
				$data['lulus'] = $this->Kelulusan_model->get("kelulusan.nrp = '".$info[0]->nrp."' AND kelulusan.is_deleted = 0");
			} else if($role->roles == 'lecturer') {
				$data['roles'] = 'lecturer';
				$data['lulus'] = $this->Kelulusan_model->get("(student_topik.lecturer1_npk = '".$info[0]->npk."' OR student_topik.lecturer2_npk = '".$info[0]->npk."') AND student_topik.is_deleted = 0");					
			} else if($role->roles == 'wd') {
				$data['roles'] = 'lecturer';
				$data['lulus'] = $this->Kelulusan_model->get("(student_topik.lecturer1_npk = '".$info[0]->npk."' OR student_topik.lecturer2_npk = '".$info[0]->npk."' OR kelulusan.dosbing_validate_date IS NOT NULL) AND student_topik.is_deleted = 0");	
				//print_r($data['lulus']);
				//die();				
			} else if($role->roles == 'adminst') {
				$data['roles'] = 'adminst';
				$data['is_admin_st'] = true;
				$data['lulus'] = $this->Kelulusan_model->get("kelulusan.sk_filename IS NULL AND kelulusan.dosbing_validate_date IS NOT NULL AND student_topik.is_deleted = 0");

				//print_r($data['lulus']); die();
			}
		}

		if($data['roles'] == '') { redirect('dashboard'); }

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
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
		    });';

		// Success Register
		if($this->session->flashdata('notif') == 'success') {
	  		$data['js'] .= '
	  			Toast.fire({
			        icon: "success",
			        title: "'.$this->session->flashdata('msg').'"
			      });
	  		';
	    }

		$this->load->view('v_header', $data);
		$this->load->view('lulus/v_lulus', $data);
		$this->load->view('v_footer', $data);
    }

    public function detail($id) {
		$data = array();
		$data['detail'] = $this->Kelulusan_model->get("kelulusan.id= '".$id."'");

		$roles = $this->session->userdata('user')->roles;
		$info = $this->session->userdata('user')->info;
		
		if(!$data['detail']) {
			redirect('dashboard');
		} else {
			$data['stopik'] = $this->Student_topik_model->get('',$data['detail'][0]->student_topik_id);
			$data['connect'] = $this->Student_model->connect_sim($data['stopik'][0]->student_nrp);
			
			// ambil mk prasyarat
			$mkprasyarat = $this->MK_lulus_model->get("is_deleted = 0");
			$data['table_prasyarat'] = $this->Student_model->generate_table_prasyarat($mkprasyarat, $data['stopik'][0]->student_nrp);
			$skripsi = $this->Eligibility_model->get('nama_alias = "skripsi"');
		
			$data['dataskripsi'] = $this->Student_model->get_transcript_from_array(explode(',',$skripsi[0]->nilai), $data['stopik'][0]->student_nrp);
			
		}


		$data['is_dosbing'] = false;
		$data['is_wd'] = false;
		$data['id'] = $id;
		$data['is_admin_st'] = false;
		$data['is_admin'] = false;
		$data['is_student'] = false;


		foreach($roles as $role) {
			if($role->roles =='student') {
				$data['is_student'] = true;
				if($this->input->post('btnsimpanjudul')) {
					$this->Student_topik_model->update($data['detail'][0]->student_topik_id, array("judul" => $this->input->post("txtjudul")));
					$this->session->set_flashdata('notif', 'success');
					$this->session->set_flashdata('msg', 'Sukses menyimpan judul');
					redirect('lulus/detail/'.$id);
				}
			} else if($role->roles =='lecturer') {
				// cek apakah betul dosbignya
				$data['stopik'] = $this->Student_topik_model->get('',$data['detail'][0]->student_topik_id);

				if($info[0]->npk == $data['stopik'][0]->lecturer1_npk || $info[0]->npk == $data['stopik'][0]->lecturer2_npk)
				{
					$data['is_dosbing'] = true;

					if($this->input->post('btnvalidasidosbing')) {
						$this->Kelulusan_model->dosbing_validate($this->input->post('hid_lulus_id'),$info[0]->npk);
						$this->session->set_flashdata('notif', 'success');
						$this->session->set_flashdata('msg', 'Sukses memvalidasi pengajuan daftar kelulusan');
						redirect('lulus/detail/'.$id);
					}
				}
			} else if($role->roles == 'admin') {
				$data['is_admin'] = true;
				if($this->input->post('btnvalidasiadmin')) {
					$this->Kelulusan_model->admin_validate($this->input->post('hid_lulus_id'));
					$this->session->set_flashdata('notif', 'success');
					$this->session->set_flashdata('msg', 'Sukses memvalidasi pengajuan daftar kelulusan');
					redirect('lulus/detail/'.$id);
				}
			} else if($role->roles == 'adminst') {
				$data['is_admin_st'] = true;

				$data['is_admin'] = true;
				if($this->input->post('btnvalidasiadmin')) {
					$this->Kelulusan_model->admin_validate($this->input->post('hid_lulus_id'));
					$this->session->set_flashdata('notif', 'success');
					$this->session->set_flashdata('msg', 'Sukses memvalidasi pengajuan daftar kelulusan');
					redirect('lulus/detail/'.$id);
				}

				if($this->input->post('btnuploadsklulus')) {
					$this->load->library('upload');

					$config['upload_path']          = './uploads/lulus';
		            $config['allowed_types']        = 'pdf';
		            $config['max_size']             = 100000;
		            $config['file_name']			= 'sklulus_'.$id.date('Ymdhis').'.pdf';

		          	$this->upload->initialize($config);
		          	$this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('filesklulus')) {
			          	$this->session->set_flashdata('notif', 'error_validated');
			          	$this->session->set_flashdata('msg', $this->upload->display_errors());
			          	redirect('lulus/detail/'.$id);
			        }

			        $this->Kelulusan_model->update_sk($id, $info[0]->username, $config['file_name']);
					$this->session->set_flashdata('notif', 'success');
		          	$this->session->set_flashdata('msg', 'Sukses upload SK lulus');
		          	redirect('lulus/detail/'.$id);
				}
			} else if($role->roles == 'wd') {
				$data['stopik'] = $this->Student_topik_model->get('',$data['detail'][0]->student_topik_id);

				if($info[0]->npk == $data['stopik'][0]->lecturer1_npk || $info[0]->npk == $data['stopik'][0]->lecturer2_npk)
				{
					$data['is_dosbing'] = true;
				}

				if($data['detail'][0]->dosbing_validate_date != null) {
					$data['is_wd'] = true;
				}

				if($this->input->post('btnvalidasidosbing')) {
					$this->Kelulusan_model->dosbing_validate($this->input->post('hid_lulus_id'),$info[0]->npk);
					$this->session->set_flashdata('notif', 'success');
					$this->session->set_flashdata('msg', 'Sukses memvalidasi pengajuan daftar kelulusan');
					redirect('lulus/detail/'.$id);
				}

				if($this->input->post('btnvalidasiwd')) {
					$this->Kelulusan_model->wd_validate($this->input->post('hid_lulus_id'),$info[0]->npk);
					$this->session->set_flashdata('notif', 'success');
					$this->session->set_flashdata('msg', 'Sukses memvalidasi pengajuan daftar kelulusan');
					redirect('lulus/detail/'.$id);
				}				
			}
		}

		// hitung sks kum, dan ipk kum
		$data['ipkkum'] = $this->Student_model->get_ipk_kum($data['detail'][0]->nrp);
		$data['skskum'] = $this->Student_model->get_sks_d($data['detail'][0]->nrp);

		// NOTIF
		$data['js'] = '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

		// FILE HANDLE
		$data['js'] .= '
			$("#filesklulus").on("change", function() {
				if($("#filesklulus").get(0).files.length ===0) {
					$("#btnuploadsklulus").prop("disabled", true); 
				} else {
					$("#btnuploadsklulus").prop("disabled", false); 
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
		$this->load->view('lulus/v_detail', $data);
		$this->load->view('v_footer', $data);
	}
	
	public function baru()
	{
		$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;
		$data['roles'] = '';

		foreach($roles as $role) {
			if($role->roles == 'student') {
				$data['roles'] = 'student';
				$data['info'] = $info;
				//$data['connect'] = $this->Student_model->connect_sim($info[0]->nrp);
			}
		}

		if($data['roles'] == '') { redirect('dashboard'); }


		$mkprasyarat = $this->MK_lulus_model->get("is_deleted = 0");
			
		$data['table_prasyarat'] = $this->Student_model->generate_table_prasyarat($mkprasyarat, $info[0]->nrp);
		$data['eligible_prasyarat'] = $this->Student_model->check_eligible_mk_prasyarat_lulus($mkprasyarat, $info[0]->nrp);

		$skripsi = $this->Eligibility_model->get('nama_alias = "skripsi"');
		
		$data['dataskripsi'] = $this->Student_model->get_transcript_from_array(explode(',',$skripsi[0]->nilai), $info[0]->nrp);

		// cek apakah mhs sudah lulus skripsi
		$data['sempro'] = $this->Skripsi_model->get_student_skripsi($info[0]->nrp);
		//print_r($data['sempro']);
		//die();
		if($data['sempro'][0]->naskah_upload_date == null) {
			redirect('dashboard');
		}

		if($this->input->post('btnajukan')) {
			// filekartuwali
			$this->load->library('upload');

			$config['upload_path']          = './uploads/lulus';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 100000;
            $config['file_name']			= 'kartuwali_'.date('Ymdhis').'.pdf';

            $filekartuwali = $config['file_name'];

          	$this->upload->initialize($config);
          	$this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('filekartuwali')) {
	          	$this->session->set_flashdata('notif', 'error_validated');
	          	$this->session->set_flashdata('msg', $this->upload->display_errors());
	          	redirect('lulus/baru');
	        }

	        // filebebaspakai
			$this->load->library('upload');

			$config['upload_path']          = './uploads/lulus';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 100000;
            $config['file_name']			= 'bebaspakai_'.date('Ymdhis').'.pdf';

            $filebebaspakai = $config['file_name'];

          	$this->upload->initialize($config);
          	$this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('filebebaspakai')) {
	          	$this->session->set_flashdata('notif', 'error_validated');
	          	$this->session->set_flashdata('msg', $this->upload->display_errors());
	          	redirect('lulus/baru');
	        }

	        // filebebaspakai
			$this->load->library('upload');

			$config['upload_path']          = './uploads/lulus';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 100000;
            $config['file_name']			= 'naskahfinal_'.date('Ymdhis').'.pdf';

            $filenaskahfinal = $config['file_name'];

          	$this->upload->initialize($config);
          	$this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('filenaskahfinal')) {
	          	$this->session->set_flashdata('notif', 'error_validated');
	          	$this->session->set_flashdata('msg', $this->upload->display_errors());
	          	redirect('lulus/baru');
	        }

	         // file toefl
			$this->load->library('upload');

			$config['upload_path']          = './uploads/lulus';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 100000;
            $config['file_name']			= 'toefl_'.date('Ymdhis').'.pdf';

            $filetoefl = $config['file_name'];

          	$this->upload->initialize($config);
          	$this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('filetoefl')) {
	          	$this->session->set_flashdata('notif', 'error_validated');
	          	$this->session->set_flashdata('msg', $this->upload->display_errors());
	          	redirect('lulus/baru');
	        }

	        // update judul
	        $this->Skripsi_model->update_judul_in_student_topic($data['sempro'][0]->student_topik_id, $this->input->post('judul'));

	        $this->Kelulusan_model->add($info[0]->nrp, $this->input->post('hid_sempro_id'), $filekartuwali, $filebebaspakai, $filenaskahfinal, $filetoefl);

			$this->session->set_flashdata('notif', 'success');
          	$this->session->set_flashdata('msg', 'Suskes mendaftar kelulusan');
          	redirect('lulus');
		}

		
		//print_r($data['sempro']);

		// hitung sks kum, dan ipk kum
		$data['ipkkum'] = $this->Student_model->get_ipk_kum($info[0]->nrp);
		$data['skskum'] = $this->Student_model->get_sks_d($info[0]->nrp);

		

		// INIT ARRAY
		$data['js'] = '
			var arrLab = [];			
		';

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
			$("#btnajukan").on("click", function(e) {
				var jumfile = 0;
				if($("#filekartuwali").get(0).files.length != 0) { jumfile++; }
				if($("#filebebaspakai").get(0).files.length != 0) { jumfile++; }
				if($("#filenaskahfinal").get(0).files.length != 0) { jumfile++; }

				if(jumfile < 3) {
					Toast.fire({
				        icon: "error",
				        title: "Lengkapi file yang akan diupload"
				      });
					e.preventDefault();
				}
			});

			$("#cekrevisinaskah").on("click", function() {
				if($("#cekrevisinaskah").is(":checked")) {
					if($("#file_naskah_revisi").get(0).files.length ===0) {
						$("#btnmhssimpanjudul").prop("disabled", true); 
					} else {
						$("#btnmhssimpanjudul").prop("disabled", false); 
					}
				} else {
					
						$("#btnmhssimpanjudul").prop("disabled", true); 
				}
			});';
		

		// MODAL
		$data['js'] .= '
			$("#tambahijinlab").on("click", function() {
				$("#divnamalab").hide();
				$("#divalamatlab").hide();
				$("#radio_lingkup_internal").prop("checked", true);
				$("#ruang_lab").val("-");
				$("#divlab").show();
			});
		';

		// RADIO internal dan Eksternal
		$data['js'] .= '
			$("#radio_lingkup_internal").on("click", function() {
				$("#divnamalab").hide();
				$("#divalamatlab").hide();
				$("#divlab").show();
			});

			$("#radio_lingkup_eksternal").on("click", function() {
				$("#divnamalab").show();
				$("#divalamatlab").show();
				$("#txt_namalab").val("");
				$("#txt_alamatlab").val("");
				$("#divlab").hide();
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
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
		    });';

		// Btn Submit Enable
		$data['js'] .= '
			$("#ruang_lab").on("change", function() {
				if($(this).val() != "-") {
					$("#btnsubmit").prop("disabled", false);
				} else {
					$("#btnsubmit").prop("disabled", true);
				}
			});
		';

		// Btn Submit
		$data['js'] .= '
			$("#btnsubmit").on("click", function() {
				var lingkupstr = "internal";
				var checkok = true;
				var alamatstr = "";
				var ruanglabstr = "";
				var namalabstr = "";

				if($("#radio_lingkup_internal").is(":checked")) {
					lingkupstr = "internal";
					ruanglabstr = $("#ruang_lab").val();
					namalabstr = $("#ruang_lab option:selected").text();

					// cek jangan kembar
					$.each(arrLab, function( index, value ) {
					  if(value.ruang_lab_id == $("#ruang_lab").val()) {
					  	alert("Lab sudah terpilih sebelumnya");
					  	checkok = false;
					  }
					});
				} else {
					lingkupstr = "eksternal";
					alamatstr = $("#txt_alamatlab").val();
					namalabstr = $("#txt_namalab").val();
				}

				if(checkok == true) {
					arrLab.push({
				        lingkup: lingkupstr,
				        ruang_lab_id: ruanglabstr,
				        alamat: alamatstr,
				        nama_lab: namalabstr
				    });

				    $.each(arrLab, function( index, value ) {
					  console.log( value );
					});

					$("#modal-tampil").modal("toggle");
					render_lab();
				}
			});
		';

		// render table
		$data['js'] .= '
			function render_lab() {
				$("#body_table_ijin").html("");

				 $.each(arrLab, function( index, value ) {
				  if(value.lingkup == "internal") {
					  $("#body_table_ijin").append("<tr><td>" + value.nama_lab + "</td><td><button class=\"btn btn-flat btn-sm btn-danger btndelijin\" idxijin=\"" + index + "\"><span class=\"fa fa-times\"></span></button><input type=\"hidden\" name=\"ruang_lab_id[]\" value=\"" + value.ruang_lab_id + "\" /><input type=\"hidden\" name=\"alamat[]\" value=\"" + value.alamat + "\" /><input type=\"hidden\" name=\"nama_lab[]\" value=\"" + value.nama_lab + "\" /></td></tr>");
				  } else {
				  	 $("#body_table_ijin").append("<tr><td>" + value.nama_lab + "<br/>Alamat: " + value.alamat + "</td><td><button class=\"btn btn-flat btn-sm btn-danger btndelijin\" idxijin=\"" + index + "\"><span class=\"fa fa-times\"></span></button><input type=\"hidden\" name=\"ruang_lab_id[]\" value=\"" + value.ruang_lab_id + "\" /><input type=\"hidden\" name=\"alamat[]\" value=\"" + value.alamat + "\" /><input type=\"hidden\" name=\"nama_lab[]\" value=\"" + value.nama_lab + "\" /></td></tr>");
				  }
				});

				if(arrLab.length == 0) {
					$("#body_table_ijin").html("<tr><td colspan=\"2\">Belum ada Lab</td></tr>");
					$("#btnajukan").attr("disabled", true);
				} else {
					$("#btnajukan").attr("disabled", false);
				}
			}
		';

		// handle remove ijin
		$data['js'] .= '
			$("body").on("click", ".btndelijin", function() {
				var index = $(this).attr("idxijin");
				arrLab.splice(index, 1);
				render_lab();
			});
		';

		if($this->session->flashdata('notif') == 'error_validated') {
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

		$this->load->view('v_header', $data);
		$this->load->view('lulus/v_daftar_lulus', $data);
		$this->load->view('v_footer', $data);
	}

	
}