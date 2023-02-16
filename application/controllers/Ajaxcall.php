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

	public function get_available_room() {
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');
		
		$ruang_terpakai = $this->Sempro_model->get_uses_room($tglsidang, $jamsidang);
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
