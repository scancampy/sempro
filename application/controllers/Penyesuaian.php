<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyesuaian extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')) {
        	redirect('');
        }

        $roles = $this->session->userdata('user')->roles;
		$data['is_lecturer'] = false;
		$allowed_entry = false;
		foreach($roles as $role) {
			if($role->roles == 'admin') {
				$allowed_entry = true;
			}
		}

		if(!$allowed_entry) {
			redirect('dashboard');
		}
    }

 
    public function statussempro() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;
		
		$data['periode'] = $this->Periode_model->get_periode_sidang();

		$filtersemester = '';
		if($this->input->get('filtersemester') != 'all' && $this->input->get('filtersemester')) {
			$where = 'sempro.periode_sidang_id = '.$this->input->get('filtersemester').' ';

			$filtertampilkan = '';
			if($this->input->get('filtertampilkan') == 'self') {
				$where .= " AND (sempro.pembimbing1 = '".$info[0]->npk."' OR sempro.pembimbing2 = '".$info[0]->npk."' OR sempro.penguji1 = '".$info[0]->npk."' OR sempro.penguji2 = '".$info[0]->npk."') ";
			}


			$data['sempro'] = $this->Sempro_model->get_student_sempro_with_where($where);
			//print_r($data['sempro']);
		}

		if(empty($this->input->get('filtersemester'))) {
			$activeid = $this->Periode_model->get_periode_sidang_aktif();

			if(!empty($activeid)) {
			
				$where = 'sempro.periode_sidang_id = '.$activeid->id.' ';

				$data['sempro'] = $this->Sempro_model->get_student_sempro_with_where($where);
			}
		}

		// UBAH PENGUJI SEMPRO
		if($this->input->post('btn_submit_ubah_penguji')) {
			$this->Sempro_model->update_dosbing($this->input->post('hid_sempro_ubah_penguji_id'), $this->input->post('cbo_penguji1_ubah_penguji'), $this->input->post('cbo_penguji2_ubah_penguji'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses mengubah dosbing');
			redirect('penyesuaian/statussempro');
		}

		// HAPUS SEMPRO
		if($this->input->post('btn_hapus_sempro')) {
			$this->Sempro_model->hapus_sempro($this->input->post('hid_sempro_id'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses menghapus pendaftaran sempro');
			redirect('penyesuaian/statussempro');
		}

		// BATAL STATUS
		if($this->input->post('btn_batal_validasi_kalab')) {

			$this->Sempro_model->batal_validasi($this->input->post('hid_sempro_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan validasi kalab');
			redirect('penyesuaian/statussempro');
		}

		if($this->input->post('btn_batal_admin_plot_ruang')) {
			$this->Sempro_model->batal_plot_ruang($this->input->post('hid_sempro_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan admin plot ruang');
			redirect('penyesuaian/statussempro');
		}

		if($this->input->post('btn_batal_dosbing_input_hasil')) {
			$this->Sempro_model->batal_input_hasil_ujian($this->input->post('hid_sempro_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan dosbing input hasil ujian');
			redirect('penyesuaian/statussempro');
		}

		if($this->input->post('btn_batal_revisi_naskah')) {
			$this->Sempro_model->batal_revisi_naskah($this->input->post('hid_sempro_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan mahasiswa revisi naskah');
			redirect('penyesuaian/statussempro');
		}

		if($this->input->post('btn_batal_validasi_revisi_naskah')) {
			$this->Sempro_model->batal_validasi_revisi_naskah($this->input->post('hid_sempro_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan validasi dosbing revisi naskah');
			redirect('penyesuaian/statussempro');
		}

		

		//$data['ijinlab'] = $this->Ijin_lab_model->get_detail_where("ijin_lab.wd_validated_date IS NOT NULL AND ijin_lab.is_deleted = 0".$filtersemester.$filterlokasi, "ijin_lab_detail.ruang_lab_id ASC");

		
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
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
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

    	if($this->session->flashdata('notif') == 'success') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "'.$this->session->flashdata('message').'"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'error') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('message').'"
			      });
    		';
    	}

		// TOMBOL PENYESUAIAN
		$data['js'] .= "
			function dateformat( d) {
				return ( ((d.getDate() > 9) ? d.getDate() : ('0' + d.getDate())) + '/' + ((d.getMonth() > 8) ? (d.getMonth() + 1) : ('0' + (d.getMonth() + 1)))  + '/' + d.getFullYear());
			}

			$('body').on('click', '.btnubahpenguji', function() {
				$('#judul_ubah_penguji').html('');
				$('#nrp_ubah_penguji').html('');
				$('#namamhs_ubah_penguji').html('');
				$('#ruang_ubah_penguji').html('');
				$('#sidangdate_ubah_penguji').html('');
				$('#dosbing2_ubah_penguji').html('');
				$('#dosbing1_ubah_penguji').html('');

				var semproid = $(this).attr('semproid');
				$.post('".base_url('ajaxcall/load_sidang_by_id')."', {id:semproid}, function(data) {
					var json = JSON.parse(data);
					console.log(json);
					$('#judul_ubah_penguji').html(json['data'].judul);
					$('#nrp_ubah_penguji').html(json['data'].nrp);
					$('#namamhs_ubah_penguji').html(json['data'].nama);
					$('#hid_sempro_ubah_penguji_id').val(semproid);

					if(json['data'].sidang_date != null) {
						$('#sidangdate_ubah_penguji').html(dateformat(new Date(json['data'].sidang_date)));
					} else { $('#sidangdate_ubah_penguji').html('-'); }
					
					
					if(json['data'].roomlabel != null) {
						$('#ruang_ubah_penguji').html(json['data'].roomlabel);
					} else { $('#ruang_ubah_penguji').html('-'); }

					if(json['data'].dosbing1 != null) {
						$('#dosbing1_ubah_penguji').html(json['data'].dosbing1);
					} else { $('#dosbing1_ubah_penguji').html('-'); }
					
					if(json['data'].dosbing2 != null) {
						$('#dosbing2_ubah_penguji').html(json['data'].dosbing2);
					} else { $('#dosbing2_ubah_penguji').html('-'); }

					var penguji1 = json['data'].penguji1;
					var penguji2 = json['data'].penguji2;

					// load available dosen
					$.post('".base_url('ajaxcall/load_eligible_dosen')."', {exclude_sempro_id:semproid, tglsidang: json['data'].sidang_date, jamsidang: json['data'].sidang_time}, function(data) {

						
						var json = JSON.parse(data);
						
						var cbostr = '';
						for(var i=0; i<json['data'].length;i++) {
							var selected = '';
							if(json['data'][i].npk == penguji1) { selected=' selected=\"selected\" '; }
							cbostr += '<option '+ selected +' value=\"' + json['data'][i].npk + '\">'+ json['data'][i].nama + '</option>';
						}

						$('#cbo_penguji1_ubah_penguji').html(cbostr);

						var cbostr = '';
						for(var i=0; i<json['data'].length;i++) {
							var selected = '';
							if(json['data'][i].npk == penguji2) { selected=' selected=\"selected\" '; }
							cbostr += '<option '+ selected +' value=\"' + json['data'][i].npk + '\">'+ json['data'][i].nama + '</option>';
						}

						$('#cbo_penguji2_ubah_penguji').html(cbostr);
					});
				});
			});

			$('body').on('click', '.btnpenyesuaian', function() {
				$('#judul').html('');
				$('#nrp').html('');
				$('#namamhs').html('');

				var semproid = $(this).attr('semproid');
				$.post('".base_url('ajaxcall/load_sidang_by_id')."', {id:semproid}, function(data) {
					var json = JSON.parse(data);
					console.log(json);
					$('#judul').html(json['data'].judul);
					$('#nrp').html(json['data'].nrp);
					$('#namamhs').html(json['data'].nama);
					$('#hid_sempro_id').val(semproid);
					
					if(json['data'].sidang_date != null) {
						$('#sidangdate').html(dateformat(new Date(json['data'].sidang_date)));
					} else { $('#sidangdate').html('-'); }
					
					
					if(json['data'].roomlabel != null) {
						$('#ruang').html(json['data'].roomlabel);
					} else { $('#ruang').html('-'); }

					if(json['data'].dosbing1 != null) {
						$('#dosbing1').html(json['data'].dosbing1);
					} else { $('#dosbing1').html('-'); }
					
					if(json['data'].dosbing2 != null) {
						$('#dosbing2').html(json['data'].dosbing2);
					} else { $('#dosbing2').html('-'); }
					$('#penguji1').html(json['data'].namapenguji1);
					$('#penguji2').html(json['data'].namapenguji2);

					$('#tgldaftarsidang').html(dateformat(new Date(json['data'].registered_date)));

					$('#validasikalabclock').removeAttr('class');

					if(json['data'].kalab_npk_verified == null) {
						$('#validasikalabclock').addClass('fas fa-clock bg-gray');
						$('#div_validasi_kalab_content').hide();
						$('#btn_batal_validasi_kalab').hide();
						$('#tglvalidasikalab').html('');
					} else {
						$('#validasikalabclock').addClass('fas fa-check bg-green');
						$('#div_validasi_kalab_content').show();
						$('#tglvalidasikalab').html(dateformat(new Date(json['data'].kalab_verified_date)));
						$('#btn_batal_validasi_kalab').show();
					}


					$('#adminplotruangclock').removeAttr('class');
					if(json['data'].ruang_id == null) {
						$('#adminplotruangclock').addClass('fas fa-clock bg-gray');
						$('#div_admin_plot_ruang_content').hide();
						$('#btn_batal_admin_plot_ruang').hide();
						$('#tgladminplotruang').html('');
					} else {
						$('#adminplotruangclock').addClass('fas fa-check bg-green');
						$('#div_admin_plot_ruang_content').show();
						$('#tgladminplotruang').html(dateformat(new Date(json['data'].admin_plotting_date)));
						$('#btn_batal_admin_plot_ruang').show();
					}

					$('#dosbinginputhasilclock').removeAttr('class');
					if(json['data'].hasil_submited_date == null) {
						$('#dosbinginputhasilclock').addClass('fas fa-clock bg-gray');
						$('#div_dosbing_input_hasil_content').hide();
						$('#btn_batal_dosbing_input_hasil').hide();
						$('#tglinputhasil').html('');
					} else {
						$('#dosbinginputhasilclock').addClass('fas fa-check bg-green');
						$('#div_dosbing_input_hasil_content').show();
						$('#tglinputhasil').html(dateformat(new Date(json['data'].hasil_submited_date)));
						$('#btn_batal_dosbing_input_hasil').show();
					}

					if(json['data'].revision_required == true) {						$('#top_div_mhs_revisi_naskah').show();
						$('#top_div_dosen_validasi_revisi_naskah').show();
						$('#mhsrevisinaskahclock').removeAttr('class');
						if(json['data'].revision_judul_date == null) {
							$('#mhsrevisinaskahclock').addClass('fas fa-clock bg-gray');
							$('#div_mhs_revisi_naskah_content').hide();
							$('#btn_batal_revisi_naskah').hide();
							$('#tglrevisinaskah').html('');
						} else {
							$('#mhsrevisinaskahclock').addClass('fas fa-check bg-green');
							$('#div_mhs_revisi_naskah_content').show();
							$('#tglrevisinaskah').html(dateformat(new Date(json['data'].revision_judul_date)));
							$('#btn_batal_revisi_naskah').show();
						}

						$('#dosenvalidasirevisinaskahclock').removeAttr('class');
						if(json['data'].dosbing_validate_date == null) {
							console.log('here');
							$('#dosenvalidasirevisinaskahclock').addClass('fas fa-clock bg-gray');
							$('#div_dosen_validasi_revisi_naskah_content').hide();
							$('#btn_batal_validasi_revisi_naskah').hide();
							$('#tglvalidasirevisinaskah').html('');
						} else {
							$('#dosenvalidasirevisinaskahclock').addClass('fas fa-check bg-green');
							$('#div_dosen_validasi_revisi_naskah_content').show();
							$('#tglvalidasirevisinaskah').html(dateformat(new Date(json['data'].dosbing_validate_date)));
							$('#btn_batal_validasi_revisi_naskah').show();
						}
					} else {
						$('#top_div_mhs_revisi_naskah').hide();
						$('#top_div_dosen_validasi_revisi_naskah').hide();
					}
				});
			});
		";
		

		$this->load->view('v_header', $data);
		$this->load->view('penyesuaian/v_penyesuaian_sempro', $data);
		$this->load->view('v_footer', $data);
    }

    public function statuslulus() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;
		
		$data['periode'] = $this->Periode_model->get();

		$filtersemester = '';
		if($this->input->get('filtersemester') != 'all' && $this->input->get('filtersemester')) {
			$where = 'sempro.periode_sidang_id = '.$this->input->get('filtersemester').' ';

			$filtertampilkan = '';
			if($this->input->get('filtertampilkan') == 'self') {
				$where .= " AND (sempro.pembimbing1 = '".$info[0]->npk."' OR sempro.pembimbing2 = '".$info[0]->npk."' OR sempro.penguji1 = '".$info[0]->npk."' OR sempro.penguji2 = '".$info[0]->npk."') ";
			}


			$data['sempro'] = $this->Sempro_model->get_student_sempro_with_where($where);
			//print_r($data['sempro']);
		}

		if(empty($this->input->get('filtersemester'))) {
			$activeid = $this->Periode_model->get_active_periode();

			if(!empty($activeid)) {
				$activeperiode = $this->Periode_model->get($activeid);
			
				$where = 'kelulusan.submit_date >= "'.$activeperiode[0]->date_start.'" AND kelulusan.submit_date <= "'.$activeperiode[0]->date_end.'" ';

				$data['sempro'] = $this->Kelulusan_model->get($where);
			}
		}

		

		// HAPUS SEMPRO
		if($this->input->post('btn_hapus_lulus')) {
			$this->Kelulusan_model->hapus_lulus($this->input->post('hid_lulus_id'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses menghapus pendaftaran kelulusan');
			redirect('penyesuaian/statuslulus');
		}

		// BATAL STATUS
		if($this->input->post('btn_batal_validasi_admintu')) {

			$this->Kelulusan_model->batal_validasi_admintu($this->input->post('hid_lulus_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan validasi admin');
			redirect('penyesuaian/statuslulus');
		}

		if($this->input->post('btn_batal_validasi_wd')) {
			$this->Kelulusan_model->batal_validasi_wd($this->input->post('hid_lulus_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan validasi WD');
			redirect('penyesuaian/statuslulus');
		}

		
		if($this->input->post('btn_batal_admin_validasi')) {

			$this->Kelulusan_model->batal_validasi_admin($this->input->post('hid_lulus_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan validasi admin');
			redirect('penyesuaian/statuslulus');
		}

		if($this->input->post('btn_batal_validasi_dosbing')) {

			$this->Kelulusan_model->batal_validasi_dosbing($this->input->post('hid_lulus_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan validasi dosbing');
			redirect('penyesuaian/statuslulus');
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
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
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

    	if($this->session->flashdata('notif') == 'success') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "'.$this->session->flashdata('message').'"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'error') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('message').'"
			      });
    		';
    	}

		// TOMBOL PENYESUAIAN
		$data['js'] .= "
			function dateformat( d) {
				return ( ((d.getDate() > 9) ? d.getDate() : ('0' + d.getDate())) + '/' + ((d.getMonth() > 8) ? (d.getMonth() + 1) : ('0' + (d.getMonth() + 1)))  + '/' + d.getFullYear());
			}

			$('body').on('click', '.btnpenyesuaian', function() {
				$('#judul').html('');
				$('#nrp').html('');
				$('#namamhs').html('');

				var lulusid = $(this).attr('lulusid');
				$.post('".base_url('ajaxcall/load_lulus_by_id')."', {id:lulusid}, function(data) {
					var json = JSON.parse(data);
					console.log(json);
					$('#judul').html(json['data'][0].judul);
					$('#nrp').html(json['data'][0].nrp);
					$('#namamhs').html(json['data'][0].nama);
					$('#hid_lulus_id').val(lulusid);

					
					if(json['data'][0].submit_date != null) {
						$('#sidangdate').html(dateformat(new Date(json['data'][0].submit_date)));
						$('#tgldaftarsidang').html(dateformat(new Date(json['data'][0].submit_date)));
					} else { $('#sidangdate').html('-'); }
					
					
					$('#validasidosbingclock').removeAttr('class');

					if(json['data'][0].dosbing_validate_date == null) {
						$('#validasidosbingclock').addClass('fas fa-clock bg-gray');
						$('#div_validasi_dosbing_content').hide();
						$('#btn_batal_validasi_dosbing').hide();
						$('#tglvalidasidosbing').html('');
					} else {
						$('#validasidosbingclock').addClass('fas fa-check bg-green');
						$('#div_validasi_dosbing_content').show();
						$('#tglvalidasidosbing').html(dateformat(new Date(json['data'][0].dosbing_validate_date)));
						$('#btn_batal_validasi_dosbing').show();
					}


					$('#adminvalidasiclock').removeAttr('class');
					if(json['data'][0].admin_validate_date == null) {
						$('#adminvalidasiclock').addClass('fas fa-clock bg-gray');
						$('#div_admin_validasi_content').hide();
						$('#btn_batal_admin_validasi').hide();
						$('#tgladminvalidasi').html('');
					} else {
						$('#adminvalidasiclock').addClass('fas fa-check bg-green');
						$('#div_admin_validasi_content').show();
						$('#tgladminvalidasi').html(dateformat(new Date(json['data'][0].admin_validate_date)));
						$('#btn_batal_admin_validasi').show();
					}

					$('#validasiwdclock').removeAttr('class');

					if(json['data'][0].wd_validate_date == null) {
						$('#validasiwdclock').addClass('fas fa-clock bg-gray');
						$('#div_validasi_wd_content').hide();
						$('#btn_batal_validasi_wd').hide();
						$('#tglvalidasiwd').html('');
					} else {
						$('#validasiwdclock').addClass('fas fa-check bg-green');
						$('#div_validasi_wd_content').show();
						$('#tglvalidasiwd').html(dateformat(new Date(json['data'][0].wd_validate_date)));
						$('#btn_batal_validasi_wd').show();
					}

					$('#validasiadmintuclock').removeAttr('class');

					if(json['data'][0].sk_created_date == null) {
						$('#validasiadmintuclock').addClass('fas fa-clock bg-gray');
						$('#div_validasi_admintu_content').hide();
						$('#btn_batal_validasi_admintu').hide();
						$('#tglvalidasiadmintu').html('');
					} else {
						$('#validasiadmintuclock').addClass('fas fa-check bg-green');
						$('#div_validasi_admintu_content').show();
						$('#tglvalidasiadmintu').html(dateformat(new Date(json['data'][0].sk_created_date)));
						$('#btn_batal_validasi_admintu').show();
					}
				});
			});
		";
		

		$this->load->view('v_header', $data);
		$this->load->view('penyesuaian/v_penyesuaian_lulus', $data);
		$this->load->view('v_footer', $data);
    }

    public function statusskripsi() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;
		
		$data['periode'] = $this->Periode_model->get_periode_sidang_skripsi();

		$filtersemester = '';
		if($this->input->get('filtersemester') != 'all' && $this->input->get('filtersemester')) {
			$where = 'skripsi.periode_sidang_id = '.$this->input->get('filtersemester').' ';

			$filtertampilkan = '';
			if($this->input->get('filtertampilkan') == 'self') {
				$where .= " AND (skripsi.pembimbing1 = '".$info[0]->npk."' OR skripsi.pembimbing2 = '".$info[0]->npk."' OR skripsi.penguji1 = '".$info[0]->npk."' OR skripsi.penguji2 = '".$info[0]->npk."') ";
			}


			$data['skripsi'] = $this->Skripsi_model->get_student_skripsi_with_where($where);
			//print_r($data['sempro']);
		}

		if(empty($this->input->get('filtersemester'))) {
			$activeid = $this->Periode_model->get_periode_sidang_skripsi_aktif();

			if(!empty($activeid)) {
			
				$where = 'skripsi.periode_sidang_id = '.$activeid->id.' ';

				$data['skripsi'] = $this->Skripsi_model->get_student_skripsi_with_where($where);
			}
		}

		// UBAH PENGUJI SKRIPSI
		if($this->input->post('btn_submit_ubah_penguji')) {
			$this->Skripsi_model->update_dosbing($this->input->post('hid_skripsi_ubah_penguji_id'), $this->input->post('cbo_penguji1_ubah_penguji'), $this->input->post('cbo_penguji2_ubah_penguji'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses mengubah dosbing');
			redirect('penyesuaian/statusskripsi');
		}

		// HAPUS SEMPRO
		if($this->input->post('btn_hapus_skripsi')) {
			$this->Skripsi_model->hapus_skripsi($this->input->post('hid_skripsi_id'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses menghapus pendaftaran skripsi');
			redirect('penyesuaian/statusskripsi');
		}

		// BATAL STATUS
		if($this->input->post('btn_batal_validasi_kalab')) {

			$this->Skripsi_model->batal_validasi($this->input->post('hid_skripsi_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan validasi kalab');
			redirect('penyesuaian/statusskripsi');
		}

		if($this->input->post('btn_batal_admin_plot_ruang')) {
			$this->Skripsi_model->batal_plot_ruang($this->input->post('hid_skripsi_id'));

			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses membatalkan admin plot ruang');
			redirect('penyesuaian/statusskripsi');
		}

		

		//$data['ijinlab'] = $this->Ijin_lab_model->get_detail_where("ijin_lab.wd_validated_date IS NOT NULL AND ijin_lab.is_deleted = 0".$filtersemester.$filterlokasi, "ijin_lab_detail.ruang_lab_id ASC");

		
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
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
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

    	if($this->session->flashdata('notif') == 'success') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "'.$this->session->flashdata('message').'"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'error') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('message').'"
			      });
    		';
    	}

		// TOMBOL PENYESUAIAN
		$data['js'] .= "
			function dateformat( d) {
				return ( ((d.getDate() > 9) ? d.getDate() : ('0' + d.getDate())) + '/' + ((d.getMonth() > 8) ? (d.getMonth() + 1) : ('0' + (d.getMonth() + 1)))  + '/' + d.getFullYear());
			}

			$('body').on('click', '.btnubahpenguji', function() {
				$('#judul_ubah_penguji').html('');
				$('#nrp_ubah_penguji').html('');
				$('#namamhs_ubah_penguji').html('');
				$('#ruang_ubah_penguji').html('');
				$('#sidangdate_ubah_penguji').html('');
				$('#dosbing2_ubah_penguji').html('');
				$('#dosbing1_ubah_penguji').html('');

				var semproid = $(this).attr('semproid');
				$.post('".base_url('ajaxcall/load_sidang_skripsi_by_id')."', {id:semproid}, function(data) {
					var json = JSON.parse(data);
					console.log(json);
					$('#judul_ubah_penguji').html(json['data'].judul);
					$('#nrp_ubah_penguji').html(json['data'].nrp);
					$('#namamhs_ubah_penguji').html(json['data'].nama);
					$('#hid_skripsi_ubah_penguji_id').val(semproid);

					if(json['data'].sidang_date != null) {
						$('#sidangdate_ubah_penguji').html(dateformat(new Date(json['data'].sidang_date)));
					} else { $('#sidangdate_ubah_penguji').html('-'); }
					
					
					if(json['data'].roomlabel != null) {
						$('#ruang_ubah_penguji').html(json['data'].roomlabel);
					} else { $('#ruang_ubah_penguji').html('-'); }

					if(json['data'].dosbing1 != null) {
						$('#dosbing1_ubah_penguji').html(json['data'].dosbing1);
					} else { $('#dosbing1_ubah_penguji').html('-'); }
					
					if(json['data'].dosbing2 != null) {
						$('#dosbing2_ubah_penguji').html(json['data'].dosbing2);
					} else { $('#dosbing2_ubah_penguji').html('-'); }

					var penguji1 = json['data'].penguji1;
					var penguji2 = json['data'].penguji2;

					// load available dosen
					$.post('".base_url('ajaxcall/load_eligible_dosen')."', {exclude_sempro_id:semproid, tglsidang: json['data'].sidang_date, jamsidang: json['data'].sidang_time}, function(data) {

						
						var json = JSON.parse(data);
						
						var cbostr = '';
						for(var i=0; i<json['data'].length;i++) {
							var selected = '';
							if(json['data'][i].npk == penguji1) { selected=' selected=\"selected\" '; }
							cbostr += '<option '+ selected +' value=\"' + json['data'][i].npk + '\">'+ json['data'][i].nama + '</option>';
						}

						$('#cbo_penguji1_ubah_penguji').html(cbostr);

						var cbostr = '';
						for(var i=0; i<json['data'].length;i++) {
							var selected = '';
							if(json['data'][i].npk == penguji2) { selected=' selected=\"selected\" '; }
							cbostr += '<option '+ selected +' value=\"' + json['data'][i].npk + '\">'+ json['data'][i].nama + '</option>';
						}

						$('#cbo_penguji2_ubah_penguji').html(cbostr);
					});
				});
			});

			$('body').on('click', '.btnpenyesuaian', function() {
				$('#judul').html('');
				$('#nrp').html('');
				$('#namamhs').html('');

				var semproid = $(this).attr('semproid');
				$.post('".base_url('ajaxcall/load_sidang_skripsi_by_id')."', {id:semproid}, function(data) {
					var json = JSON.parse(data);
					console.log(json);
					$('#judul').html(json['data'].judul);
					$('#nrp').html(json['data'].nrp);
					$('#namamhs').html(json['data'].nama);
					$('#hid_skripsi_id').val(semproid);
					
					if(json['data'].sidang_date != null) {
						$('#sidangdate').html(dateformat(new Date(json['data'].sidang_date)));
					} else { $('#sidangdate').html('-'); }
					
					
					if(json['data'].roomlabel != null) {
						$('#ruang').html(json['data'].roomlabel);
					} else { $('#ruang').html('-'); }

					if(json['data'].dosbing1 != null) {
						$('#dosbing1').html(json['data'].dosbing1);
					} else { $('#dosbing1').html('-'); }
					
					if(json['data'].dosbing2 != null) {
						$('#dosbing2').html(json['data'].dosbing2);
					} else { $('#dosbing2').html('-'); }
					$('#penguji1').html(json['data'].namapenguji1);
					$('#penguji2').html(json['data'].namapenguji2);

					$('#tgldaftarsidang').html(dateformat(new Date(json['data'].registered_date)));

					$('#validasikalabclock').removeAttr('class');

					if(json['data'].kalab_npk_verified == null) {
						$('#validasikalabclock').addClass('fas fa-clock bg-gray');
						$('#div_validasi_kalab_content').hide();
						$('#btn_batal_validasi_kalab').hide();
						$('#tglvalidasikalab').html('');
					} else {
						$('#validasikalabclock').addClass('fas fa-check bg-green');
						$('#div_validasi_kalab_content').show();
						$('#tglvalidasikalab').html(dateformat(new Date(json['data'].kalab_verified_date)));
						$('#btn_batal_validasi_kalab').show();
					}


					$('#adminplotruangclock').removeAttr('class');
					if(json['data'].ruang_id == null) {
						$('#adminplotruangclock').addClass('fas fa-clock bg-gray');
						$('#div_admin_plot_ruang_content').hide();
						$('#btn_batal_admin_plot_ruang').hide();
						$('#tgladminplotruang').html('');
					} else {
						$('#adminplotruangclock').addClass('fas fa-check bg-green');
						$('#div_admin_plot_ruang_content').show();
						$('#tgladminplotruang').html(dateformat(new Date(json['data'].admin_plotting_date)));
						$('#btn_batal_admin_plot_ruang').show();
					}
				});
			});
		";
		

		$this->load->view('v_header', $data);
		$this->load->view('penyesuaian/v_penyesuaian_skripsi', $data);
		$this->load->view('v_footer', $data);
    }

    public function excelskripsi() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;
		$data['is_lecturer'] = false;

		foreach($roles as $role) {
			if($role->roles == 'student') {
				redirect('dashboard');
			} else if($role->roles == 'lecturer') {
				$data['is_lecturer'] = true;
			}
		}

		$data['periode'] = $this->Periode_model->get_periode_sidang_skripsi();

		$filtersemester = '';
		if($this->input->get('filtersemester') != 'all' && $this->input->get('filtersemester')) {
			$where = 'skripsi.periode_sidang_id = '.$this->input->get('filtersemester').' AND skripsi.sidang_date IS NOT NULL AND skripsi.sidang_time IS NOT NULL AND skripsi.ruang_id IS NOT NULL';

			$filtertampilkan = '';
			if($this->input->get('filtertampilkan') == 'self') {
				$where .= " AND (skripsi.pembimbing1 = '".$info[0]->npk."' OR skripsi.pembimbing2 = '".$info[0]->npk."' OR skripsi.penguji1 = '".$info[0]->npk."' OR skripsi.penguji2 = '".$info[0]->npk."') ";
			}


			$data['sempro'] = $this->Skripsi_model->get_student_skripsi_with_where($where);
			
		}

		if(empty($this->input->get('filtersemester'))) {
			$activeid = $this->Periode_model->get_periode_sidang_skripsi_aktif();
			
			$where = 'skripsi.periode_sidang_id = '.$activeid->id.' AND skripsi.sidang_date IS NOT NULL AND skripsi.sidang_time IS NOT NULL AND skripsi.ruang_id IS NOT NULL';

			$data['sempro'] = $this->Skripsi_model->get_student_skripsi_with_where($where);
		}


		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-Disposition: attachment; filename=Laporan Sempro ".date('Y-m-d his').".xls");

		$this->load->view('laporan/v_sempro_excel', $data);

    }

    public function skripsi() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;
		$data['is_lecturer'] = false;
		//print_r($info); die();

		foreach($roles as $role) {
			if($role->roles == 'student') {
				redirect('dashboard');
			} else if($role->roles == 'lecturer') {
				$data['is_lecturer'] = true;
			}
		}

		$data['periode'] = $this->Periode_model->get_periode_sidang_skripsi();

		$filtersemester = '';
		if($this->input->get('filtersemester') != 'all' && $this->input->get('filtersemester')) {
			$where = 'skripsi.periode_sidang_id = '.$this->input->get('filtersemester').' AND skripsi.sidang_date IS NOT NULL AND skripsi.sidang_time IS NOT NULL AND skripsi.ruang_id IS NOT NULL';

			$filtertampilkan = '';
			if($this->input->get('filtertampilkan') == 'self') {
				$where .= " AND (skripsi.pembimbing1 = '".$info[0]->npk."' OR skripsi.pembimbing2 = '".$info[0]->npk."' OR skripsi.penguji1 = '".$info[0]->npk."' OR skripsi.penguji2 = '".$info[0]->npk."') ";
			}


			$data['sempro'] = $this->Skripsi_model->get_student_skripsi_with_where($where);
			
		}

		if(empty($this->input->get('filtersemester'))) {
			$activeid = $this->Periode_model->get_periode_sidang_skripsi_aktif();
			
			$where = 'skripsi.periode_sidang_id = '.$activeid->id.' AND skripsi.sidang_date IS NOT NULL AND skripsi.sidang_time IS NOT NULL AND skripsi.ruang_id IS NOT NULL';

			$data['sempro'] = $this->Skripsi_model->get_student_skripsi_with_where($where);
		}

		

		//$data['ijinlab'] = $this->Ijin_lab_model->get_detail_where("ijin_lab.wd_validated_date IS NOT NULL AND ijin_lab.is_deleted = 0".$filtersemester.$filterlokasi, "ijin_lab_detail.ruang_lab_id ASC");

		
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
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
		    });';

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_sidang_skripsi', $data);
		$this->load->view('v_footer', $data);
    }

    public function ijinlab() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;

		foreach($roles as $role) {
			if($role->roles == 'student') {
				redirect('dashboard');
			} 
		}

		$data['lab'] = $this->Ruang_lab_model->get();
		$data['periode'] = $this->Periode_model->get();

		$filtersemester = '';
		if($this->input->get('filtersemester') != '-' && $this->input->get('filtersemester')) {
			$filtersemester = ' AND ijin_lab.periode_id = '.$this->input->get('filtersemester').' ';

			$filterlab = '';
			if($this->input->get('filterlab') != 'all' && $this->input->get('filterlab')) {
				$filterlab = " AND ijin_lab_detail.ruang_lab_id = '".$this->input->get('filterlab')."' ";
			}

			$filterlokasi = '';
			if($this->input->get('filterlokasi') != 'all' && $this->input->get('filterlokasi')) {
				if($this->input->get('filterlokasi') == 'internal') {
					$filterlokasi = " AND ijin_lab_detail.alamat_lab = '' ";
				} else {
					$filterlokasi = " AND ijin_lab_detail.alamat_lab != '' ";
				}
				
			}

			$data['ijinlab'] = $this->Ijin_lab_model->get_detail_where("ijin_lab.wd_validated_date IS NOT NULL AND ijin_lab.is_deleted = 0".$filterlab.$filterlokasi.$filtersemester, "ijin_lab_detail.ruang_lab_id ASC");
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
		       lengthMenu: [
		            [50, 100, -1],
		            [50, 100, "All"],
		        ],
		    });';

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_ijin_lab', $data);
		$this->load->view('v_footer', $data);
    }

    public function index() {
    	$data = array();
		$info = $this->session->userdata('user')->info;		
		$roles = $this->session->userdata('user')->roles;
		
		foreach($roles as $role) {
			if($role->roles == 'student') {
				redirect('dashboard');
			} 
		}

		//if($data['roles'] == '') { redirect('dashboard'); }

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
			        title: "'.$this->session->flashdata('message').'"
			      });
	  		';
	    }

	    if($data['is_kalab'] != false) {
	    	$data['js'] .= '
	    		function check_if_kalab( lab_id) {
		    		if(lab_id == "'.$info[0]->lab_id.'") {
		    			$("#btnvalidasikalab").show();
		    		}
		    	}
	    	';
	    } else {
	    	$data['js'] .= '
	    		function check_if_kalab( lab_id) {  	}
	    	';

	    	if($data['is_wd'] != false) {
	    		$data['js'] .= '
		    		function check_if_wd() {
			    		$("#btnvalidasiwd").show();			    		
			    	}
		    	';
	    	}
	    }

	    // LOAD Ijin
	    $data['js'] .= '
	    	function check_if_dosbing( lecturer1_npk) {
	    		if(lecturer1_npk == "'.$roles[0]->username.'") {
	    			$("#btnvalidasidosbing").show();
	    		}
	    	}	    	

	    	$("body").on("click", ".btndetailijin", function() {
	    		$("#btnvalidasidosbing").hide();
	    		$("#btnvalidasikalab").hide();
	    		$("#btnvalidasiwd").hide();
	    		$("#hid_ijin_id").val($(this).attr("loadid"));

	    		$.post("'.base_url('ajaxcall/load_ijin_detail').'", { "id": $(this).attr("loadid") }, function(data) { 
    					var obj = JSON.parse(data);
    					$("#namamhs").html(obj.data[0].nama);
    					$("#nrp").html(obj.data[0].nrp);
    					$("#judul").html(obj.data[0].judul);
    					$("#submitdate").html(obj.data[0].submit_date.substring(8,10) +"-" +obj.data[0].submit_date.substring(5,7) +"-" + obj.data[0].submit_date.substring(0,4));

    					$("#tbody").html("");
    					var tbodystr = "";
    					for(var i =0; i < obj.detail.length; i++) {
    						tbodystr += "<tr><td>" + obj.detail[i].nama_lab + "</td>";
    						
    						if(obj.detail[i].ruang_lab_id != null) {
    							tbodystr += "<td>Internal</td>";
    						} else {    							
    							tbodystr += "<td>" + obj.detail[i].alamat_lab + "</td>";
    						}
    						tbodystr += "</tr>";

    					}

    					$("#tbody").html(tbodystr);

    					if(obj.data[0].pembimbing_validated_npk == null) {
    						check_if_dosbing(obj.data[0].lecturer1_npk);
    					}

    					if(obj.data[0].pembimbing_validated_npk != null && obj.data[0].kalab_validated_npk == null) {
    						//alert("butuh validasi kalab");
    						check_if_kalab(obj.data[0].id_lab);
    					}

    					if(obj.data[0].kalab_validated_npk != null && obj.data[0].wd_validated_npk == null) {
    						//alert("butuh validasi kalab");
    						check_if_wd();
    					}

    				});
    		});
	    ';

		$this->load->view('v_header', $data);
		$this->load->view('ijinlab/v_ijin_lab', $data);
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
			}
		}

		if($data['roles'] == '') { redirect('dashboard'); }

		if($this->input->post('btnajukan')) {
			//print_r($_POST);
			$this->Ijin_lab_model->add($info[0]->nrp, $this->input->post('hid_sempro_id'),  $this->input->post('ruang_lab_id'), $this->input->post('nama_lab'), $this->input->post('alamat'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses mengajukan ijin lab');
			redirect('ijinlab');
		}

		// cek apakah mhs sudah lulus sempro
		$data['sempro'] = $this->Sempro_model->get_student_sempro($info[0]->nrp);
		//print_r($data['sempro']);
		if($data['sempro'][0]->is_done == true) {
			$data['lab'] = $this->Ruang_lab_model->get();
		}

		// INIT ARRAY
		$data['js'] = '
			var arrLab = [];
		';

		

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
 


		$this->load->view('v_header', $data);
		$this->load->view('ijinlab/v_detail_ijin_lab', $data);
		$this->load->view('v_footer', $data);
	}

	
}