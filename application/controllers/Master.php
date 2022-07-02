<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')) {
        	redirect('');
        }
    }
	
	public function index()
	{
		redirect('dashboard');
	}

	public function student() {
		if($this->input->post('btnupload')) {
			print_r('upload');
			$csv = $_FILES['filecsv']['tmp_name'];

			$handle = fopen($csv,"r");
			while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
			{
			    print_r($row); //rows in array

			   //here you can manipulate the values by accessing the array


			}
		}

		$data = array();
		// data table
		$data['js'] = '
	$("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_student', $data);
		$this->load->view('v_footer', $data);
	}
}
