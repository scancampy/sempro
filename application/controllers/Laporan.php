<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')) {
        	redirect('');
        }
    }

    public function excelproposal() {
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

		$idlab = '';
		if($this->input->get('filterlab') != 'all') {
			$idlab = $this->input->get('filterlab');
		}
		$data['lab'] = $this->Lab_model->get();

		$data['semester'] = $this->Periode_model->get();
		$data['active_semester'] = $this->Periode_model->get_active_periode();
		
		if($this->input->get('filtersemester')) {
		    $selectedsemester = $this->input->get('filtersemester');
	    } else {
	        $selectedsemester = $data['active_semester'];
	    }

	    $wherestr = 'student_topik.is_deleted = 0';
	    if($selectedsemester != null) {
	    	$selsemester = $this->Periode_model->get($selectedsemester);
	    	$data['selsemester'] = $selsemester;
	    	if($selsemester[0]->semester == 'Genap') {
	    		$startdate = ($selsemester[0]->tahun+1).'-02-01'; // februari
	    	} else {
	    		$startdate = $selsemester[0]->tahun.'-08-01'; // Agustus
	    	}

	    	if($selsemester[0]->semester == 'Genap') {
	    		$enddate = ($selsemester[0]->tahun+1).'-07-31'; // Juli
	    	} else {
	    		$enddate = $selsemester[0]->tahun.'-01-31'; // Januari
	    	}
	    	
	    	$wherestr .= ' AND (student_topik.created_date BETWEEN "'.$selsemester[0]->date_start.'" AND "'.$selsemester[0]->date_end.'") ';
	    } else {
	    	$data['selsemester'] = $this->Periode_model->get($data['active_semester']);
	    }

		// GET STUDENT TOPIC
		$data['student_topic'] = $this->Student_topik_model->get_where($wherestr);


		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-Disposition: attachment; filename=Laporan Proposal ".date('Y-m-d his').".xls");

		$this->load->view('laporan/v_proposal_excel', $data);

    }

    public function excelstatusmahasiswa() {
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

		if($this->input->get('angkatan')) {
			$angkatan = trim(substr($this->input->get('angkatan'), -2));
			// GET STUDENT
			$data['student'] = $this->Student_model->get_where("nrp LIKE '%".$angkatan."%'");

			$nrps = array();
			foreach ($data['student'] as $key => $value) {
				$nrps[] = $value->nrp;
			}

			$data['status_proposal'] = $this->_getstatusproposal($nrps);
			$data['status_sempro'] = $this->_getstatussempro($nrps);
			$data['status_skripsi'] = $this->_getstatusskripsi($nrps);
			$data['status_lulus'] = $this->_getstatuskelulusan($nrps);
		}



		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-Disposition: attachment; filename=Laporan Status Mahasiswa ".date('Y-m-d his').".xls");

		$this->load->view('laporan/v_status_mahasiswa_excel', $data);

    }

    private function _getstatusproposal($nrps) {

    	foreach ($nrps as $key => $value) {
    		$wherestr = 'student_topik.is_deleted = 0 AND student_topik.student_nrp = "'.$value.'"';
	    
    		$student_topik[$key] = $this->Student_topik_model->get_where($wherestr);	
    	}

    	return $student_topik;
    }

    private function _getstatussempro($nrps) {
    	foreach ($nrps as $key => $value) {
    		$where = 'sempro.is_deleted = 0 AND sempro.nrp = "'.$value.'"';
	    	$sempro[$key] = $this->Sempro_model->get_student_sempro_with_where($where);
	    }

	    return $sempro;
    }

    private function _getstatusskripsi($nrps) {
    	foreach ($nrps as $key => $value) {
    		$where = 'skripsi.is_deleted = 0 AND skripsi.nrp = "'.$value.'"';
	    	
	    	$skripsi[$key] = $this->Skripsi_model->get_student_skripsi_with_where($where);
	    }

	    return $skripsi;
    }

    private function _getstatuskelulusan($nrps) {
    	foreach ($nrps as $key => $value) {
    		$where = 'kelulusan.is_deleted = 0 AND kelulusan.nrp = "'.$value.'"';
	    	$lulus[$key] = $this->Kelulusan_model->get($where);
	    }

	    return $lulus;
    }


    public function statusmahasiswa() {
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

		if($this->input->get('angkatan')) {
			$angkatan = trim(substr($this->input->get('angkatan'), -2));
			// GET STUDENT
			$data['student'] = $this->Student_model->get_where("nrp LIKE '%".$angkatan."%'");

			$nrps = array();
			foreach ($data['student'] as $key => $value) {
				$nrps[] = $value->nrp;
			}

			$data['status_proposal'] = $this->_getstatusproposal($nrps);
			$data['status_sempro'] = $this->_getstatussempro($nrps);
			$data['status_skripsi'] = $this->_getstatusskripsi($nrps);
			$data['status_lulus'] = $this->_getstatuskelulusan($nrps);
		}

		
		

		//print_r($data['status_proposal']);
		

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
		$this->load->view('laporan/v_status_mahasiswa', $data);
		$this->load->view('v_footer', $data);
    }

    public function proposal() {
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

		$idlab = '';
		if($this->input->get('filterlab') != 'all') {
			$idlab = $this->input->get('filterlab');
		}
		$data['lab'] = $this->Lab_model->get();

		$data['semester'] = $this->Periode_model->get();
		$data['active_semester'] = $this->Periode_model->get_active_periode();
		
		if($this->input->get('filtersemester')) {
		    $selectedsemester = $this->input->get('filtersemester');
	    } else {
	        $selectedsemester = $data['active_semester'];
	    }

	    $wherestr = 'student_topik.is_deleted = 0';
	    if($selectedsemester != null) {
	    	$selsemester = $this->Periode_model->get($selectedsemester);
	    	if($selsemester[0]->semester == 'Genap') {
	    		$startdate = ($selsemester[0]->tahun+1).'-02-01'; // februari
	    	} else {
	    		$startdate = $selsemester[0]->tahun.'-08-01'; // Agustus
	    	}

	    	if($selsemester[0]->semester == 'Genap') {
	    		$enddate = ($selsemester[0]->tahun+1).'-07-31'; // Juli
	    	} else {
	    		$enddate = $selsemester[0]->tahun.'-01-31'; // Januari
	    	}
	    	
	    	$wherestr .= ' AND (student_topik.created_date BETWEEN "'.$selsemester[0]->date_start.'" AND "'.$selsemester[0]->date_end.'") ';
	    }

		// GET STUDENT TOPIC
		$data['student_topic'] = $this->Student_topik_model->get_where($wherestr);
		

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
		$this->load->view('laporan/v_proposal', $data);
		$this->load->view('v_footer', $data);
    }

    public function excelbeban() {

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

		$idlab = '';
		if($this->input->get('filterlab') != 'all') {
			$idlab = $this->input->get('filterlab');
		}
		
		$data['lab'] = $this->Lab_model->get();

		// GET BEBAN DOSEN
		$periodeaktif = $this->Periode_model->get_active_periode();
		$data['semester'] = $this->Periode_model->get();
		
		if($this->input->get('filtersemester')) {
		    $selectedsemester = $this->input->get('filtersemester');
	    } else {
	        $selectedsemester = $periodeaktif;
	    } 


		$data['beban'] = $this->Lecturer_model->get_with_beban_total($idlab, $selectedsemester);
		$data['periode'] = $this->Periode_model->get($selectedsemester);
		$data['active_semester'] = $selectedsemester;

		
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-Disposition: attachment; filename=Laporan Beban Dosen ".date('Y-m-d his').".xls");

		$this->load->view('laporan/v_beban_excel', $data);

    }

    public function bebandosen() {
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

		$idlab = '';
		if($this->input->get('filterlab') != 'all') {
			$idlab = $this->input->get('filterlab');
		}


		
		$data['lab'] = $this->Lab_model->get();

		// GET BEBAN DOSEN
		$periodeaktif = $this->Periode_model->get_active_periode();
		$data['semester'] = $this->Periode_model->get();
		
		if($this->input->get('filtersemester')) {
		    $selectedsemester = $this->input->get('filtersemester');
	    } else {
	        $selectedsemester = $periodeaktif;
	    } 


		$data['beban'] = $this->Lecturer_model->get_with_beban_total($idlab, $selectedsemester);
		$data['periode'] = $this->Periode_model->get($selectedsemester);
		$data['active_semester'] = $selectedsemester;

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
		            [20, 50, 100, -1],
		            [20, 50, 100, "All"],
		        ],
		    });';

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_beban_dosen', $data);
		$this->load->view('v_footer', $data);		
    }

    public function topik() {
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

		$idlab = '';
		$npkpemilik = '';
		$validasikalab = null;
		$statusaktif = 'all';
		if($this->input->get('filterlab') != 'all') {
			$idlab = $this->input->get('filterlab');
		}

		if($this->input->get('filterpemilik') != 'all') {
			$npkpemilik = $this->input->get('filterpemilik');
		}

		if($this->input->get('filtervalidasikalab') != 'all') {
			if($this->input->get('filtervalidasikalab') == 'validasi') {
				$validasikalab = 'sudah';
			} else {
				$validasikalab = 'belum';
			}			
		}
		
		if($this->input->get('filterstatusaktif') != 'all') {
			$statusaktif = $this->input->get('filterstatusaktif');			
		}

		$data['lab'] = $this->Lab_model->get();

		$data['lecturer'] = $this->Lecturer_model->get();

		$data['topik'] = $this->Topik_model->get('', $idlab,0,$npkpemilik, $statusaktif, $validasikalab);
		$data['prasyarat'] = $this->Topik_model->get_prasyarat($data['topik']);
		$data['kuota'] = array();
		foreach($data['topik'] as $value) {
			$data['kuota'][] = $this->Topik_model->get_kuota($value->id);
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
		$this->load->view('laporan/v_topik', $data);
		$this->load->view('v_footer', $data);
    }

    public function excelsempro() {
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
			
			$where = 'sempro.periode_sidang_id = '.$activeid->id.' ';

			$data['sempro'] = $this->Sempro_model->get_student_sempro_with_where($where);
		}


		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-Disposition: attachment; filename=Laporan Sempro ".date('Y-m-d his').".xls");

		$this->load->view('laporan/v_sempro_excel', $data);

    }

    public function sempro() {
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
			
			$where = 'sempro.periode_sidang_id = '.$activeid->id.' ';

			$data['sempro'] = $this->Sempro_model->get_student_sempro_with_where($where);
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
		$this->load->view('laporan/v_sidang_sempro', $data);
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

    public function excelkelulusan() {
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

		if($this->input->get('btncari')) {
			$status = $this->input->get('filterstatus');
			$rangetanggal = explode(' - ',$this->input->get('rangetanggal'));
			$data['rangetanggal'] = $this->input->get('rangetanggal');
			
			$startdate = substr($rangetanggal[0],-4).'-'.substr($rangetanggal[0],0,2).'-'.substr($rangetanggal[0],3,2);

			$enddate = substr($rangetanggal[1],-4).'-'.substr($rangetanggal[1],0,2).'-'.substr($rangetanggal[1],3,2);

			if(strtotime($enddate) >= strtotime($startdate)) {
				$where = ' kelulusan.submit_date >= "'.$startdate.'" AND kelulusan.submit_date <= "'.date('Y-m-d', strtotime($enddate )+86400).'" ';

				if($status == 'waitdosbing') {
					$where .= ' AND kelulusan.dosbing_validate_date IS NULL ';
				} else if($status == 'waitadmin') {
					$where .= ' AND kelulusan.admin_validate_date IS NULL ';
				} else if($status == 'waitwd') {
					$where .= ' AND kelulusan.wd_validate_date IS NULL ';
				} else if($status == 'waitsk') {
					$where .= ' AND kelulusan.sk_created_date IS NULL ';
				} else if($status == 'skterbit') {
					$where .= ' AND kelulusan.sk_created_date IS NOT NULL ';
				}

				$data['lulus'] = $this->Kelulusan_model->get($where);

			} else {
				$this->session->set_flashdata('notif', 'invalid_date');
				redirect('laporan/kelulusan');
			}
		} else {
			$startdate= date('Y-m-d', strtotime('-30 days'));
			$enddate= date('Y-m-d', strtotime('+1 days'));
			$where = ' kelulusan.submit_date BETWEEN "'.$startdate.'" AND "'.$enddate.'" ';
			$data['lulus'] = $this->Kelulusan_model->get($where);

		}


		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-Disposition: attachment; filename=Laporan Kelulusan ".date('Y-m-d his').".xls");

		$this->load->view('laporan/v_kelulusan_excel', $data);

    }

    public function kelulusan() {
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

		if($this->input->get('btncari')) {
			$status = $this->input->get('filterstatus');
			$rangetanggal = explode(' - ',$this->input->get('rangetanggal'));
			$data['rangetanggal'] = $this->input->get('rangetanggal');
			
			$startdate = substr($rangetanggal[0],-4).'-'.substr($rangetanggal[0],0,2).'-'.substr($rangetanggal[0],3,2);

			$enddate = substr($rangetanggal[1],-4).'-'.substr($rangetanggal[1],0,2).'-'.substr($rangetanggal[1],3,2);

			if(strtotime($enddate) >= strtotime($startdate)) {
				$where = ' kelulusan.submit_date >= "'.$startdate.'" AND kelulusan.submit_date <= "'.date('Y-m-d', strtotime($enddate )+86400).'" ';

				if($status == 'waitdosbing') {
					$where .= ' AND kelulusan.dosbing_validate_date IS NULL ';
				} else if($status == 'waitadmin') {
					$where .= ' AND kelulusan.admin_validate_date IS NULL ';
				} else if($status == 'waitwd') {
					$where .= ' AND kelulusan.wd_validate_date IS NULL ';
				} else if($status == 'waitsk') {
					$where .= ' AND kelulusan.sk_created_date IS NULL ';
				} else if($status == 'skterbit') {
					$where .= ' AND kelulusan.sk_created_date IS NOT NULL ';
				}

				$data['lulus'] = $this->Kelulusan_model->get($where);

			} else {
				$this->session->set_flashdata('notif', 'invalid_date');
				redirect('laporan/kelulusan');
			}
		} else {
			$startdate= date('Y-m-d', strtotime('-30 days'));
			$enddate= date('Y-m-d', strtotime('+1 days'));
			$where = ' kelulusan.submit_date BETWEEN "'.$startdate.'" AND "'.$enddate.'" ';
			$data['lulus'] = $this->Kelulusan_model->get($where);

		}

		// DATE RANGE
		$data['js'] = '
			$("#rangetanggal").daterangepicker();
		';

		if($this->session->flashdata('notif') == 'invalid_date') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "Range tanggal yang dipilih salah"
			      });
    		';
    	}
		
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

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_kelulusan', $data);
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