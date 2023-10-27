<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxcall extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
       
    }
	
	public function load_sidang() {
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');
		
		$jadwal_sidang = $this->Sempro_model->get_student_sempro_all("sempro.sidang_time = '".$jamsidang."' AND sempro.sidang_date = '".$tglsidang."' ");
		

		echo json_encode(array('data' => $jadwal_sidang, 'submit' => $tglsidang, 'submit2' => $jamsidang));
	}

	public function load_sidang_by_id() {
		$id = $this->input->post('id');
		$sempro = $this->Sempro_model->get_student_sempro_by_id($id);
		

		echo json_encode(array('data' => $sempro));
	}

	public function load_lulus_by_id() {
		$id = $this->input->post('id');
		$lulus = $this->Kelulusan_model->get("kelulusan.id = $id");
		

		echo json_encode(array('data' => $lulus));
	}

	public function load_sidang_skripsi_by_id() {
		$id = $this->input->post('id');
		$sempro = $this->Skripsi_model->get_student_skripsi_by_id($id);
		

		echo json_encode(array('data' => $sempro));
	}

	public function load_sidang_skripsi() {
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');
		
		$jadwal_sidang = $this->Skripsi_model->get_student_skripsi_all("skripsi.sidang_time = '".$jamsidang."' AND skripsi.sidang_date = '".$tglsidang."' ");
		

		echo json_encode(array('data' => $jadwal_sidang, 'submit' => $tglsidang, 'submit2' => $jamsidang));
	}

	public function load_ijin_detail() {
		$id = $this->input->post('id');
		$ijinlab = $this->Ijin_lab_model->get_by_id($id);
		$detailijin = $this->Ijin_lab_model->get_detail($ijinlab[0]->id);

		echo json_encode(array('data' => $ijinlab, 'detail' => $detailijin));
	}

	public function load_eligible_dosen() {
		$exclude_sempro_id = $this->input->post('exclude_sempro_id');
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');

		$dosenavailable = $this->Sempro_model->get_available_dosen($exclude_sempro_id,$tglsidang,$jamsidang);

		echo json_encode(array('data' => $dosenavailable, 'exclude_sempro_id' => $exclude_sempro_id, 'tglsidang' => $tglsidang, 'jamsidang' => $jamsidang));
	}

	public function load_eligible_dosen_skripsi() {
		$exclude_sempro_id = $this->input->post('exclude_sempro_id');
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');

		$dosenavailable = $this->Skripsi_model->get_available_dosen($exclude_sempro_id,$tglsidang,$jamsidang);

		echo json_encode(array('data' => $dosenavailable));
	}

	public function get_available_room() {
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');
		
		$ruang_terpakai = $this->Sempro_model->get_uses_room($tglsidang, $jamsidang);
		//print_r($ruang_terpakai);
		$ruang_available = $this->Room_model->get_available($ruang_terpakai);

		echo json_encode(array('data' => $ruang_available));
	}

	public function get_available_room_for_skripsi() {
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');
		
		$ruang_terpakai = $this->Skripsi_model->get_uses_room($tglsidang, $jamsidang);
		$ruang_available = $this->Room_model->get_available($ruang_terpakai);

		echo json_encode(array('data' => $ruang_available));
	}
}
