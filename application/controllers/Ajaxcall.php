<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxcall extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
       
    }
	
	public function get_available_room() {
		$tglsidang = $this->input->post('tglsidang');
		$jamsidang = $this->input->post('jamsidang');
		
		$ruang_terpakai = $this->Sempro_model->get_uses_room($tglsidang, $jamsidang);
		$ruang_available = $this->Room_model->get_available($ruang_terpakai);

		echo json_encode(array('data' => $ruang_available));
	}
}
