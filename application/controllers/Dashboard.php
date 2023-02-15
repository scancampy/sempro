<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$this->load->view('v_header',$data);

        $roles = $this->session->userdata('user')->roles;
        $data['info'] = $this->session->userdata('user')->info;

      
		foreach($roles as $role) {
            if($role->roles == 'student') { 
            	$skripsi = $this->Eligibility_model->get('nama_alias = "skripsi"');
            	$data['connect'] = $this->Student_model->connect_sim($data['info'][0]->nrp);
            	//print_r($skripsi);
            	//die();

            	$data['cekks'] = $this->Student_model->check_mk_in_ks($data['info'][0]->nrp, $skripsi[0]->nilai);
            	$data['eligible'] = $this->Student_model->cek_eligible($data['info'][0]->nrp);
            	$data['setting'] = $this->Eligibility_model->get(' displayed_to_student = 1');

            	$eligbile = true;
            	
            	foreach($data['setting'] as $index => $value) { 
            		if($value->nama_alias == 'skripsi') { 
            			if(!$data['cekks']) {
            				$eligbile = false;
            			}
            		}

            		if($value->nama_alias == 'nilai_metpen_min') { 
            			if(!$data['eligible']['nilai_metpen_min']) {
            				$eligbile = false;
            			}
            		}

            		if($value->nama_alias == 'total_sks_tanpa_e_min') { 
            			if(!$data['eligible']['total_sks_tanpa_e_min']) {
            				$eligbile = false;
            			}
            		}

            		if($value->nama_alias == 'total_sks_nilai_d_max') { 
            			if(!$data['eligible']['total_sks_nilai_d_max']) {
            				$eligbile = false;
            			}
            		}
            	}

            	$data['eligible_check'] = $eligbile;
            	if($eligbile) {
            		$this->Student_model->set_eligible($data['info'][0]->nrp);
            		
            	}

            	// notifikasi kelulusan
            	$data['skterbit'] = $this->Kelulusan_model->get("kelulusan.nrp ='".$data['info'][0]->nrp."' AND kelulusan.sk_filename IS NOT NULL AND kelulusan.is_deleted = 0");


            	$this->load->view('v_dashboard_student', $data);
            	break;
            } else if($role->roles == "lecturer") {
            	// ambil proposal anak walinya
            	$data['student'] = $this->Student_topik_model->get_guardian_student_topic($data['info'][0]->npk);

            	// get notifikasi kelulusan
	            $data['needvalidatelulus'] = $this->Kelulusan_model->get("(student_topik.lecturer1_npk = '".$data['info'][0]->npk."' OR student_topik.lecturer2_npk = '".$data['info'][0]->npk."') AND student_topik.is_deleted = 0 AND dosbing_validate_date IS  NULL");	
            	
            	// ambil proposal yg butuh validasi WD
            	$data['wd'] = $this->Roles_model->is_role_wd($data['info'][0]->npk);
            	if($data['wd']) {
            		$data['wd_topic'] = $this->Student_topik_model->get_wd_topic();
            		$data['need_wd_validation'] = $this->Student_topik_model->get_proposal_need_wd_validation();
            		$data['need_wd_final_validation'] = $this->Student_topik_model->get_proposal_need_final_wd_validation();

            		// notifikasi kelulusan
            		$data['needvalidateluluswd'] = $this->Kelulusan_model->get("kelulusan.dosbing_validate_date IS NOT NULL AND student_topik.is_deleted = 0");

            		// notifikasi ijin lab
            		$data['needvalidateijinlab'] = $this->Ijin_lab_model->get_where("ijin_lab.wd_validated_date IS NULL AND ijin_lab.is_deleted = 0");
            	} else {
            		// ambil topik yang butuh validasi kalab
            		$data['topic_need_validate'] = $this->Topik_model->get_need_validate($data['info'][0]->lab_id);

            		// ambil proposal yg butuh validasi kalab
	            	
	            	$data['iskalab'] = $this->Roles_model->is_role_kalab($data['info'][0]->npk);

	            	if($data['iskalab']) {
	            		$data['student_kalab'] = $this->Student_topik_model->get_kalab_topic($data['info'][0]->npk);
	            		$data['need_kalab_title_validation'] = $this->Student_topik_model->get_proposal_title_need_kalab_validation($data['info'][0]->npk);

	            		// sempro
	            		//print_r($data['info'][0]);
	            		$periodeaktif = $this->Periode_model->get_periode_sidang_aktif(); 
	            		$data['need_kalab_sempro_validation'] = $this->Sempro_model->get_sempro_need_kalab_validation($data['info'][0]->lab_id, $periodeaktif->id);
	            	}

	            	// get topik yang butuh setting dosbing
	            	$data['needdosbing'] = $this->Student_topik_model->get_kalab_topic_need_dosbing($data['info'][0]->npk);

	            	// get topik yang butuh validasi dosbing 1
	            	$data['need_dosbing1_validation'] = $this->Student_topik_model->get_proposal_need_dosbing_validation($data['info'][0]->npk);
	            	
            	}
            	
            	// ambil jadwal sempro
            	$periodeaktif = $this->Periode_model->get_periode_sidang_aktif();            		
            	$data['my_sempro_schedule'] = $this->Sempro_model->get_sempro_schedule($periodeaktif->id, $data['info'][0]->npk);

            	// ambil jadwal skripsi
            	$periodeaktifskripsi = $this->Periode_model->get_periode_sidang_skripsi_aktif();            		
            	if($periodeaktifskripsi) {
	            	$data['my_skripsi_schedule'] = $this->Skripsi_model->get_skripsi_schedule($periodeaktifskripsi->id, $data['info'][0]->npk);
	            }

            	//print_r($data['my_sempro_schedule']);
            	
            	$this->load->view('v_dashboard_lecturer', $data);
            	break;
            }  else {

            	if($role->roles == 'adminst') {
            		$periodeaktif = $this->Periode_model->get_periode_sidang_aktif(); 
	            		
            		$data['need_create_st'] = $this->Student_topik_model->get_proposal_need_st();
            		$data['need_room_plot'] = $this->Sempro_model->get_sempro_need_room_plotting($periodeaktif->id);

            		//skripsi
            		$periodeaktifskripsi = $this->Periode_model->get_periode_sidang_skripsi_aktif(); 
	            	
	            	if($periodeaktifskripsi) {
	            		//$data['need_create_st'] = $this->Student_topik_model->get_proposal_need_st();
	            		$data['need_room_plot_skripsi'] = $this->Skripsi_model->get_skripsi_need_room_plotting($periodeaktifskripsi->id);
	            	}

	            	// notifikasi kelulusan
            		$data['needcreatestkelulusan'] = $this->Kelulusan_model->get("kelulusan.sk_filename IS NULL AND kelulusan.wd_validate_date IS NOT NULL AND student_topik.is_deleted = 0");
            	}
            	$this->load->view('v_dashboard', $data);
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
         
        $data['js'] .= '
			$("#example3").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": true,
		      "responsive": true
		    });';
          
		
		$this->load->view('v_footer', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('');
	}
}
