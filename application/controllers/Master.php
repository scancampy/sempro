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

	public function student($delaction = null, $delnrp = null) {
		$data = array();
		
		// FILTER
		if($this->input->get('btncari')) {
			$res = $this->Student_model->get(trim($this->input->get('nrp')), trim($this->input->get('nama')), trim(substr($this->input->get('angkatan'), -2)));

			if($res) {
				$data['student'] = $res;
			}
		}

		// RESET PASS
		if($this->input->post('btnedit')) {
			if(trim($this->input->post('passwordedit')) != '') {
				$this->User_model->resetpass($this->input->post('nrpedit'), $this->input->post('passwordedit'));
				$this->session->set_flashdata('notif', 'success_reset');
				redirect('master/student');
			}
		}

		// UPLOAD CSV
		if($this->input->post('btnupload')) {
			$csv = $_FILES['filecsv']['tmp_name'];

			$handle = fopen($csv,"r");
			$cek = $this->Student_model->update($handle);
			if($cek == false) {
				$this->session->set_flashdata('notif', 'invalid_csv');
				redirect('master/student');
			} else {
				$this->session->set_flashdata('notif', 'success_csv');
				redirect('master/student');
			}			
		}

		// DEL STUDENT
		if($delaction != null) {
			if($this->Student_model->del($delnrp)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/student');
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

    	if($this->session->flashdata('notif') == 'invalid_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "File CSV tidak sesuai template"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses menambahkan data mahasiswa"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus data mahasiswa"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_reset') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses reset password mahasiswa"
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

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_student', $data);
		$this->load->view('v_footer', $data);
	}

	public function course($delaction = null, $delcourse = null) {
		$data = array();
		
		// GET COURSE
		$data['course'] = $this->Course_model->get();

		// EDIT COURSE
		if($this->input->post('btnedit')) {
			$this->User_model->resetpass($this->input->post('nrpedit'), $this->input->post('passwordedit'));
			$this->session->set_flashdata('notif', 'success_reset');
			redirect('master/student');
		}

		// UPLOAD CSV
		if($this->input->post('btnupload')) {
			$csv = $_FILES['filecsv']['tmp_name'];

			
			$delimiters = array('|', ';', '^', "\t");
            $delimiter = ',';

            $str = file_get_contents($csv);
            $str = str_replace($delimiters, $delimiter, $str);
            $cek =  file_put_contents($csv, $str);

            $handle = fopen($csv,"r");

			$cek = $this->Course_model->update($handle);
			if($cek == false) {
				$this->session->set_flashdata('notif', 'invalid_csv');
				redirect('master/course');
			} else {
				$this->session->set_flashdata('notif', 'success_csv');
				redirect('master/course');
			}			
		}

		// DEL COURSE
		if($delaction != null) {
			$this->Course_model->del($delcourse);
			$this->session->set_flashdata('notif', 'success_del');
			redirect('master/course');
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

    	// NOTIF
		$data['js'] .= '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

    	if($this->session->flashdata('notif') == 'invalid_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "File CSV tidak sesuai template"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses menambahkan data mata kuliah"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus data mata kuliah"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_reset') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses reset password mahasiswa"
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var kode = $(this).attr("targetkode");
    			$("#hid_mk_id").val(id);
    			$("#namaedit").val(nama);
    			$("#kode_mk_edit").val(kode);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_course', $data);
		$this->load->view('v_footer', $data);
	}

	public function guardian($delaction = null, $delnrp = null) {
		$data = array();
		
		$data['doswal'] = $this->Lecturer_model->get();

		// FILTER
		if($this->input->get('btncari')) {
			$res = $this->Guardian_model->get(trim($this->input->get('nrp')), trim($this->input->get('nama')), trim(substr($this->input->get('angkatan'), -2)), $this->input->get('doswal'));

			if($res) {
				$data['guardian'] = $res;
			}
		}

		// EDIT WALI
		if($this->input->post('btnedit')) {
			$this->Guardian_model->updatedata($this->input->post('nrpedit'), $this->input->post('doswaledit'));
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/guardian');
		}

		// UPLOAD CSV
		if($this->input->post('btnupload')) {
			$csv = $_FILES['filecsv']['tmp_name'];

			$handle = fopen($csv,"r");
			$cek = $this->Guardian_model->update($handle);
			if($cek == false) {
				$this->session->set_flashdata('notif', 'invalid_csv');
				redirect('master/guardian');
			} else {
				$this->session->set_flashdata('notif', 'success_csv');
				redirect('master/guardian');
			}			
		}

		// DEL DOSWAL
		if($delaction != null) {
			if($this->Student_model->del($delnrp)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/guardian');
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

    	if($this->session->flashdata('notif') == 'invalid_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "File CSV tidak sesuai template"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses menambahkan data dosen wali dan mahasiswa"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus data dosen wali dan mahasiswa"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses ubah data dosen wali dan mahasiswa"
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
    			var npk = $(this).attr("targetnpk");
    			$("#doswaledit").val(npk);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_guardian', $data);
		$this->load->view('v_footer', $data);
	}

	public function lecturer($delaction = null, $delnpk = null) {
		$data = array();
		
		// LOAD DOSEN
		$res = $this->Lecturer_model->get();
		$data['lecturer'] = $res;
		

		// RESET PASS
		if($this->input->post('btnedit')) {
			if(trim($this->input->post('passwordedit')) != '') {
				$this->User_model->resetpass($this->input->post('npkedit'), $this->input->post('passwordedit'));
				$this->session->set_flashdata('notif', 'success_reset');
				redirect('master/lecturer');
			}
		}

		// TAMBAH DOSEN
		if($this->input->post('btntambah')) {
			if($this->Lecturer_model->add($this->input->post('npknew'), $this->input->post('namanew'))) {
				$this->session->set_flashdata('notif', 'success_add');
			} else {
				$this->session->set_flashdata('notif', 'failed_add');
			}
			redirect('master/lecturer');
		}

		// EDIT DOSEN
		if($this->input->post('btnubah')) {
			$this->Lecturer_model->update_data($this->input->post('npkeditlecturer'), $this->input->post('namaeditlecturer'));
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/lecturer');
		}

		// UPLOAD CSV
		if($this->input->post('btnupload')) {
			$csv = $_FILES['filecsv']['tmp_name'];

			$handle = fopen($csv,"r");

			$cek = $this->Lecturer_model->update($handle);
			if($cek == false) {
				$this->session->set_flashdata('notif', 'invalid_csv');
				redirect('master/lecturer');
			} else {
				$this->session->set_flashdata('notif', 'success_csv');
				redirect('master/lecturer');
			}			
		}

		// DEL LECTURER
		if($delaction != null) {
			if($this->Lecturer_model->del($delnpk)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/lecturer');
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

    	if($this->session->flashdata('notif') == 'invalid_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "File CSV tidak sesuai template"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_csv') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses menambahkan data dosen"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_del') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses hapus data dosen"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_reset') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses reset password dosen"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data dosen"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah dosen"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'failed_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "Gagal tambah dosen. NPK sudah ada."
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var npk = $(this).attr("targetnpk");
    			var nama = $(this).attr("targetnama");
    			$("#npkedit").val(npk);
    			$("#namaedit").val(nama);
    		});
    	';

    	$data['js'] .= '
    		$("body").on("click",".editbtnlecturer", function() {
    			var npk = $(this).attr("targetnpk");
    			var nama = $(this).attr("targetnama");
    			$("#npkeditlecturer").val(npk);
    			$("#namaeditlecturer").val(nama);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_lecturer', $data);
		$this->load->view('v_footer', $data);
	}

	public function lab($delaction = null, $dellab = null) {
		$data = array();
		
		// LOAD LAB
		$res = $this->Lab_model->get();
		$data['lab'] = $res;
		
		// TAMBAH LAB
		if($this->input->post('btntambah')) {
			$this->Lab_model->add($this->input->post('namanew'), $this->input->post('namapendeknew'));	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/lab');
		}

		// EDIT LAB
		if($this->input->post('btnubah')) {
			$this->Lab_model->update_data($this->input->post('idedit'),$this->input->post('namaedit'), $this->input->post('namapendekedit'));
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/lab');
		}

		// DEL LAB
		if($delaction != null) {
			if($this->Lab_model->del($dellab)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/lab');
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
			        title: "Sukses hapus data lab"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data lab"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah lab"
			      });
    		';
    	}


    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var namapendek = $(this).attr("targetnamapendek");
    			$("#idedit").val(id);
    			$("#namaedit").val(nama);
    			$("#namapendekedit").val(namapendek);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_lab', $data);
		$this->load->view('v_footer', $data);
	}

	public function periode($delaction = null, $delperiode = null) {
		$data = array();
		
		// LOAD PERIODE
		$res = $this->Periode_model->get();
		$data['periode'] = $res;
		
		// TAMBAH PERIODE
		if($this->input->post('btntambah')) {

			$is_active = 0;
			if($this->input->post('is_active')) {
				$is_active = 1;
			}
			$this->Periode_model->add($this->input->post('nama'), $is_active);	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/periode');
		}

		// EDIT PERIODE
		if($this->input->post('btnubah')) {
			$is_active = 0;
			if($this->input->post('is_active_edit')) {
				$is_active = 1;
			}
			$this->Periode_model->update_data($this->input->post('idedit'),$this->input->post('namaedit'), $is_active);
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/periode');
		}

		// DEL PERIODE
		if($delperiode != null) {
			if($this->Periode_model->del($delperiode)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/periode');
			}
		}

		

		// DATA TABLE
		$data['js'] = '
			$("#example2").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": false,
		      "info": true,
		      "autoWidth": true,
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
			        title: "Sukses hapus data periode"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data periode"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah periode"
			      });
    		';
    	}


    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var isactive = $(this).attr("targetactive");
    			$("#idedit").val(id);
    			$("#namaedit").val(nama);
    			if(isactive == 1) {
    				$("#is_active_edit").prop( "checked", true ); 
    			} else {
    				$("#is_active_edit").prop( "checked", false ); 
    			}    			 
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_periode', $data);
		$this->load->view('v_footer', $data);
	}

	public function roles($delaction = null, $delroles = null) {
		$data = array();
		

		// LOAD DOSEN
		$data['lecturer'] = $this->Lecturer_model->get();

		// LOAD LAB
		$data['lab'] = $this->Lab_model->get();

		// LOAD DATA ROLES
		$data['roles'] = $this->Roles_model->get('', 'lecturer,student,admin');
		
		// TAMBAH ROLES
		if($this->input->post('btntambah')) {
			$labid = '';
			if($this->input->post('jabatan') == 'kalab') {
				$labid = $this->input->post('lab');
			}
			$this->Roles_model->add($this->input->post('npk'), $this->input->post('jabatan'), $labid);	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/roles');
		}

		// EDIT ROLES
		if($this->input->post('btnubah')) {
			//print_r($_POST);
			//die();
			$labid = '';
			if($this->input->post('jabatanedit') == 'kalab') {
				$labid = $this->input->post('labedit');
			}
			$this->Roles_model->update($this->input->post('hid_roles_id'), $this->input->post('jabatanedit'), $labid);
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/roles');
		}

		// DEL ROLES
		if($delaction != null) {
			if($this->Roles_model->del($delroles)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/roles');
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
			        title: "Sukses hapus data jabatan"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data jabatan"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah jabatan"
			      });
    		';
    	}

    	// RADIO WD
    	$data['js'] .= '
			$("input:radio[id=jabatanwd]").on("change", function() {
				if($(this).attr("checked")) {
					$("#divlab").hide();
				}
			});

			$("input:radio[id=jabatankalab]").on("change", function() {
				if($(this).attr("checked")) {					
					$("#divlab").show();
				}
			});

			$("input:radio[id=jabatanwdedit]").on("change", function() {
				if($(this).attr("checked")) {
					$("#divlabedit").hide();
				}
			});

			$("input:radio[id=jabatankalabedit]").on("change", function() {
				if($(this).attr("checked")) {					
					$("#divlabedit").show();
				}
			});
    	';

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var username = $(this).attr("targetusername");
    			var roles = $(this).attr("targetroles");
    			var idlab = $(this).attr("targetlabid");
    			$("#hid_roles_id").val(id);
    			$("#npkedit").val(username);

    			if(roles == "kalab") {
    				$("#jabatankalabedit").prop("checked", true);
    				$("#labedit").val(idlab);
    				$("#divlabedit").show();
    			} else if(roles=="wd") {    				
    				$("#jabatanwdedit").prop("checked", true);
    				$("#divlabedit").hide();
    			}
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_roles', $data);
		$this->load->view('v_footer', $data);
	}

	public function eligibility($delaction = null, $delroles = null) {
		$data = array();
		

		// LOAD SETTING
		$data['eligibility'] = $this->Eligibility_model->get();

		// EDIT ELIGIBILITY
		if($this->input->post('btnubah')) {
			$this->Eligibility_model->update($this->input->post('hid_id'), $this->input->post('nilaiedit'));
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/eligibility');
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

    	// NOTIF
		$data['js'] .= '
				var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
		';

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit setting eligibility"
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var nilai = $(this).attr("targetnilai");
    			$("#hid_id").val(id);
    			$("#namaedit").val(nama);
    			$("#nilaiedit").val(nilai);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_eligibility', $data);
		$this->load->view('v_footer', $data);
	}
}
