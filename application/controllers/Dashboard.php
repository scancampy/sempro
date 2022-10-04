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
            	//$data['connect'] = $this->Student_model->connect_sim($data['info'][0]->nrp);
            	//print_r($skripsi[0]->nilai);
            	//$data['cekks'] = $this->Student_model->check_mk_in_ks($data['info'][0]->nrp, $skripsi[0]->nilai);
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

            	if($eligbile) {
            		$this->Student_model->set_eligible($data['info'][0]->nrp);
            	}

            	$this->load->view('v_dashboard_student', $data);
            	break;
            } else if($role->roles == "lecturer") {
            	// ambil proposal anak walinya
            	$data['student'] = $this->Student_topik_model->get_guardian_student_topic($data['info'][0]->npk);
            	
            	// ambil proposal yg butuh validasi WD
            	$data['wd'] = $this->Roles_model->is_role_wd($data['info'][0]->npk);
            	if($data['wd']) {
            		$data['wd_topic'] = $this->Student_topik_model->get_wd_topic();
            	} else {
            		// ambil proposal yg butuh validasi kalab
	            	$data['student_kalab'] = $this->Student_topik_model->get_kalab_topic($data['info'][0]->npk);
	            	$data['iskalab'] = $this->Roles_model->is_role_kalab($data['info'][0]->npk);

	            	// get topik yang butuh setting dosbing
	            	$data['needdosbing'] = $this->Student_topik_model->get_kalab_topic_need_dosbing($data['info'][0]->npk);
            	}
            	
            	
            	$this->load->view('v_dashboard_lecturer', $data);
            	break;
            }  else {
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
