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
	    	
	    	$wherestr .= ' AND (student_topik.created_date BETWEEN "'.$startdate.'" AND "'.$enddate.'") ';
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
	    	
	    	$wherestr .= ' AND (student_topik.created_date BETWEEN "'.$startdate.'" AND "'.$enddate.'") ';
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
			$where = 'sempro.periode_sidang_id = '.$this->input->get('filtersemester').' AND sempro.sidang_date IS NOT NULL AND sempro.sidang_time IS NOT NULL AND sempro.ruang_id IS NOT NULL';

			$filtertampilkan = '';
			if($this->input->get('filtertampilkan') == 'self') {
				$where .= " AND (sempro.pembimbing1 = '".$info[0]->npk."' OR sempro.pembimbing2 = '".$info[0]->npk."' OR sempro.penguji1 = '".$info[0]->npk."' OR sempro.penguji2 = '".$info[0]->npk."') ";
			}


			$data['sempro'] = $this->Sempro_model->get_student_sempro_with_where($where);
			//print_r($data['sempro']);
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