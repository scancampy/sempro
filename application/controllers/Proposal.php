<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {
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

	public function student($delaction = null, $delid = null) {
		$data = array();
		
		$roles = $this->session->userdata('user')->roles;
        foreach($roles as $role) {
			if($role->roles == 'kalab') {

				$data['namalab'] = $role->namalab;
				$data['id_lab'] = $role->id_lab;

				break;
			}
		}

		// GET TOPIK
		$data['topik'] = $this->Topik_model->get();

		// GET LAB
		$data['lab'] = $this->Lab_model->get();

		// TAMBAH TOPIK
		if($this->input->post('btntambah')) {
			$this->Topik_model->add($this->input->post('nama'), $this->input->post('deskripsi'), $data['id_lab'], $this->input->post('kuota'));
			$this->session->set_flashdata('notif', 'success_add');
			
			redirect('kalab/topic');
		}

		// DEL TOPIK
		if($delaction != null) {
			$this->Topik_model->del($delid);
			$this->session->set_flashdata('notif', 'success_del');
			redirect('kalab/topic');			
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
		    });';

		$data['js'] .= '
			$("#example3").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": false,
		      "responsive": true,
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


    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus topik"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah topik"
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var nrp = $(this).attr("targetnrp");
    			var nama = $(this).attr("targetnama");
    			$("#nrpedit").val(nrp);
    			$("#namaedit").val(nama);
    		});
    	';

    	// UBAH LAB
    	$data['js'] .= '
    		$("#lab").on("change", function() {
    			var id = $(this).val();

    			if(id.trim() != "" ) {
    				$("#example3").DataTable().destroy();

					$.post("'.base_url('proposal/loadtopik').'", { idlab:id }, function(data) {
						var json = JSON.parse(data);
						
						if(json["data"].length > 0) {
							var tableserupa = "";
							var serupa=0;
							for(var i =0; i < json["data"].length; i++) {
								tableserupa += "<tr>";
								tableserupa += "<td>" + json["data"][i].nama + "</td>";
								tableserupa += "<td>" + json["data"][i].kuota + "</td>";
								tableserupa += "<td><button type=\"submit\" name=\"btnpilih\" class=\"btn btn-primary\" value=\"" + json["data"][i].id + "\" >Pilih</button></td>";
								tableserupa += "</tr>";
								serupa++;
							}

							$("#tabletopik").html(tableserupa);				
						} else {
							$("#tabletopik").html("");	
						}				
					
						$("#example3").DataTable({
					      "paging": true,
					      "lengthChange": false,
					      "searching": true,
					      "ordering": true,
					      "info": true,
					      "autoWidth": false,
					      "responsive": true,
					    });
					
					});
				}
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';

		$this->load->view('v_header', $data);
		$this->load->view('proposal/v_proposal', $data);
		$this->load->view('v_footer', $data);
	}

	//AJAX CALL
	public function loadtopik() {
		$hasil = $this->Topik_model->get('',$this->input->post('idlab'));
		echo json_encode(array('data' => $hasil));
	}
	
}
