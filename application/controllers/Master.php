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

	public function update_roles() {
		$this->Lecturer_model->update_roles();
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
				$this->User_model->resetpass($this->input->post('hid_nrp_edit'), $this->input->post('passwordedit'));
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
    			$("#hid_nrp_edit").val(nrp);
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
			$this->Course_model->update_course($this->input->post('hid_mk_id'),$this->input->post('kode_mk_lama1_edit'), $this->input->post('kode_mk_lama2_edit'),$this->input->post('kode_mk_lama3_edit'), $this->input->post('namaedit'), $this->input->post('sksedit') );
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/course');
		}

		// UPLOAD CSV
		if($this->input->post('btnupload')) {
			$csv = $_FILES['filecsv']['tmp_name'];

			
			//$delimiters = array('|', ';', '^', "\t");
            //$delimiter = ',';

            $str = file_get_contents($csv);
            //$str = str_replace($delimiters, $delimiter, $str);
            //$cek =  file_put_contents($csv, $str);

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

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses update data mata kuliah"
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var kode1 = $(this).attr("targetkode1");
    			var kode2 = $(this).attr("targetkode2");
    			var kode3 = $(this).attr("targetkode3");
    			var kode = $(this).attr("targetkode");
    			var sks = $(this).attr("targetsks");
    			$("#hid_mk_id").val(id);
    			$("#namaedit").val(nama);
    			$("#kode_mk_edit").val(kode);
    			$("#kode_mk_lama1_edit").val(kode1);
    			$("#kode_mk_lama2_edit").val(kode2);
    			$("#kode_mk_lama3_edit").val(kode3);
    			$("#sksedit").val(sks);
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

		$data['lab'] = $this->Lab_model->get();
		

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
			if($this->Lecturer_model->add($this->input->post('npknew'), $this->input->post('namanew'), $this->input->post('lab_id'))) {
				$this->session->set_flashdata('notif', 'success_add');
			} else {
				$this->session->set_flashdata('notif', 'failed_add');
			}
			redirect('master/lecturer');
		}

		// EDIT DOSEN
		if($this->input->post('btnubah')) {
			$this->Lecturer_model->update_data($this->input->post('npkeditlecturer'), $this->input->post('namaeditlecturer'), $this->input->post('edit_lab_id'));
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
    			var lab_id = $(this).attr("targetlab");
    			$("#npkedit").val(npk);
    			$("#namaedit").val(nama);
    			$("#editlab").val(lab_id);
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

	public function admintu($delaction = null, $delusername = null) {
		$data = array();
		
		// LOAD ADMIN TU
		$res = $this->Staff_model->get_admin();
		$data['admintu'] = $res;
		
		// TAMBAH ADMINTU
		if($this->input->post('btntambah')) {
			$hasil = $this->User_model->add($this->input->post('usernamenew'),'password', 'staff');
			if($hasil == "success") {
				$this->Staff_model->add($this->input->post('usernamenew'), $this->input->post('namanew'));
				$this->Roles_model->add($this->input->post('usernamenew'), 'adminst');
				$this->session->set_flashdata('notif', 'success_add');
			}  else {
				$this->session->set_flashdata('notif', 'failed_add');
			}

			redirect('master/admintu');
		}

		// EDIT ADMIN TU
		if($this->input->post('btnubah')) {
			$this->Staff_model->update_data($this->input->post('usernameedit'), $this->input->post('namaedit'));

			if($this->input->post('passwordedit')) {
				$this->User_model->resetpass($this->input->post('usernameedit'), $this->input->post('passwordedit'));
			}
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/admintu');
		}

		// DEL ADMIN TU
		if($delaction != null) {
			$this->Staff_model->del($delusername);
			$this->Roles_model->del_by_username($delusername);
			$this->User_model->del($delusername);
			$this->session->set_flashdata('notif', 'success_del');
			redirect('master/admintu');
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
			        title: "Sukses edit data admin TU"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah admin TU"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'failed_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "Gagal tambah admin TU. Username sudah ada."
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtnadmintu", function() {
    			var username = $(this).attr("targetusername");
    			var nama = $(this).attr("targetnama");
    			$("#usernameedit").val(username);
    			$("#namaedit").val(nama);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_admintu', $data);
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

	public function ruanglab($delaction = null, $dellab = null) {
		$data = array();
		
		// LOAD RUANG LAB
		$res = $this->Ruang_lab_model->get();
		$data['lab'] = $res;
		
		// TAMBAH LAB
		if($this->input->post('btntambah')) {
			$this->Ruang_lab_model->add($this->input->post('namanew'));	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/ruanglab');
		}

		// EDIT LAB
		if($this->input->post('btnubah')) {
			$this->Ruang_lab_model->update_data($this->input->post('idedit'),$this->input->post('namaedit'));
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/ruanglab');
		}

		// DEL LAB
		if($delaction != null) {
			if($this->Ruang_lab_model->del($dellab)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/ruanglab');
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
			        title: "Sukses hapus data ruang lab"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data ruang lab"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah ruang lab"
			      });
    		';
    	}


    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			$("#idedit").val(id);
    			$("#namaedit").val(nama);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_ruang_lab', $data);
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
			$this->Periode_model->add($this->input->post('tahun'), $this->input->post('radio_semester'), $is_active);	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/periode');
		}

		// EDIT PERIODE
		if($this->input->post('btnubah')) {
			$is_active = 0;
			if($this->input->post('is_active_edit')) {
				$is_active = 1;
			}
			$this->Periode_model->update_data($this->input->post('idedit'),$this->input->post('tahunedit'),$this->input->post('radio_edit_semester'),  $is_active);
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
    			var tahun = $(this).attr("targettahun");
    			var semester = $(this).attr("targetsemester");
    			var isactive = $(this).attr("targetactive");
    			$("#idedit").val(id);
    			$("#tahunedit").val(tahun);


    			if(semester == "Genap") {
    				$("#radio_edit_semester_genap").prop( "checked", true ); 
				} else {
					$("#radio_edit_semester_gasal").prop( "checked", true ); 
				}

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

	public function periodesidang($delaction = null, $delperiode = null) {
		$data = array();
		
		// LOAD PERIODE
		$res = $this->Periode_model->get_periode_sidang();
		$data['periode'] = $res;
		
		// TAMBAH PERIODE
		if($this->input->post('btntambah')) {
			$date_start =  date('Y-m-d',strtotime($this->input->post('date_start')));			
			$date_end =  date('Y-m-d',strtotime($this->input->post('date_end')));
			
			if(strtotime($this->input->post('date_start')) > strtotime($this->input->post('date_end'))) {
				$this->session->set_flashdata('notif', 'error_add');
				$this->session->set_flashdata('msg', 'Tanggal mulai lebih besar daripada tanggal akhir');
				redirect('master/periodesidang');
			}

			$is_active = 0;
			if($this->input->post('is_active')) {
				$is_active = 1;
			}
			$this->Periode_model->add_periode_sidang($date_start,$date_end, $is_active);	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/periodesidang');
		}

		// EDIT PERIODE
		if($this->input->post('btnubah')) {
			$date_start =  date('Y-m-d',strtotime($this->input->post('date_start_edit')));			
			$date_end =  date('Y-m-d',strtotime($this->input->post('date_end_edit')));

			if(strtotime($this->input->post('date_start_edit')) > strtotime($this->input->post('date_end_edit'))) {
				$this->session->set_flashdata('notif', 'error_add');
				$this->session->set_flashdata('msg', 'Tanggal mulai lebih besar daripada tanggal akhir');
				redirect('master/periodesidang');
			}
			
			$is_active = 0;
			if($this->input->post('is_active_edit')) {
				$is_active = 1;
			}
			$this->Periode_model->update_data_periode_sidang($this->input->post('hidedit'),$date_start, $date_end, $is_active);
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/periodesidang');
		}

		// DEL PERIODE
		if($delperiode != null) {
			if($this->Periode_model->del_periode_sidang($delperiode)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/periodesidang');
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
			        title: "Sukses hapus data periode sidang"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data periode sidang"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah periode sidang"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'error_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('msg').'"
			      });
    		';
    	}


    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var targetstart = $(this).attr("targetstart");
    			var targetend = $(this).attr("targetend");
    			var isactive = $(this).attr("targetactive");
    			$("#hidedit").val(id);
    			$("#date_start_edit_id").val(targetstart);
    			$("#date_end_edit_id").val(targetend);

    			if(isactive == 1) {
    				$("#is_active_edit").prop( "checked", true ); 
    			} else {
    				$("#is_active_edit").prop( "checked", false ); 
    			}    


			    $("#date_start_edit").datepicker("destroy").datetimepicker({
			        format: "L"
			    });
			    $("#date_end_edit").datepicker("destroy").datetimepicker({
			        format: "L"
			    });			 
    		});
    	';

    	// INIT DATE PICKER
    	$data['js'] .= '
			    	//Date picker
			    $("#date_start").datetimepicker({
			        format: "L"
			    });
			    $("#date_end").datetimepicker({
			        format: "L"
			    });

			    $("#date_start_edit").datetimepicker({
			        format: "L"
			    });
			    $("#date_end_edit").datetimepicker({
			        format: "L"
			    });
			';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_periode_sidang', $data);
		$this->load->view('v_footer', $data);
	}

	public function periodesidangskripsi($delaction = null, $delperiode = null) {
		$data = array();
		
		// LOAD PERIODE
		$res = $this->Periode_model->get_periode_sidang_skripsi();
		$data['periode'] = $res;
		
		// TAMBAH PERIODE
		if($this->input->post('btntambah')) {
			$date_start =  date('Y-m-d',strtotime($this->input->post('date_start')));			
			$date_end =  date('Y-m-d',strtotime($this->input->post('date_end')));
			
			if(strtotime($this->input->post('date_start')) > strtotime($this->input->post('date_end'))) {
				$this->session->set_flashdata('notif', 'error_add');
				$this->session->set_flashdata('msg', 'Tanggal mulai lebih besar daripada tanggal akhir');
				redirect('master/periodesidangskripsi');
			}

			$is_active = 0;
			if($this->input->post('is_active')) {
				$is_active = 1;
			}
			$this->Periode_model->add_periode_sidang_skripsi($date_start,$date_end, $is_active);	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/periodesidangskripsi');
		}

		// EDIT PERIODE
		if($this->input->post('btnubah')) {
			$date_start =  date('Y-m-d',strtotime($this->input->post('date_start_edit')));			
			$date_end =  date('Y-m-d',strtotime($this->input->post('date_end_edit')));

			if(strtotime($this->input->post('date_start_edit')) > strtotime($this->input->post('date_end_edit'))) {
				$this->session->set_flashdata('notif', 'error_add');
				$this->session->set_flashdata('msg', 'Tanggal mulai lebih besar daripada tanggal akhir');
				redirect('master/periodesidangskripsi');
			}
			
			$is_active = 0;
			if($this->input->post('is_active_edit')) {
				$is_active = 1;
			}
			$this->Periode_model->update_data_periode_sidang($this->input->post('hidedit'),$date_start, $date_end, $is_active);
			$this->session->set_flashdata('notif', 'success_edit');
			redirect('master/periodesidangskripsi');
		}

		// DEL PERIODE
		if($delperiode != null) {
			if($this->Periode_model->del_periode_sidang_skripsi($delperiode)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/periodesidangskripsi');
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
			        title: "Sukses hapus data periode sidang skripsi"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data periode sidang skripsi"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah periode sidang skripsi"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'error_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('msg').'"
			      });
    		';
    	}


    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var targetstart = $(this).attr("targetstart");
    			var targetend = $(this).attr("targetend");
    			var isactive = $(this).attr("targetactive");
    			$("#hidedit").val(id);
    			$("#date_start_edit_id").val(targetstart);
    			$("#date_end_edit_id").val(targetend);

    			if(isactive == 1) {
    				$("#is_active_edit").prop( "checked", true ); 
    			} else {
    				$("#is_active_edit").prop( "checked", false ); 
    			}    


			    $("#date_start_edit").datepicker("destroy").datetimepicker({
			        format: "L"
			    });
			    $("#date_end_edit").datepicker("destroy").datetimepicker({
			        format: "L"
			    });			 
    		});
    	';

    	// INIT DATE PICKER
    	$data['js'] .= '
			    	//Date picker
			    $("#date_start").datetimepicker({
			        format: "L"
			    });
			    $("#date_end").datetimepicker({
			        format: "L"
			    });

			    $("#date_start_edit").datetimepicker({
			        format: "L"
			    });
			    $("#date_end_edit").datetimepicker({
			        format: "L"
			    });
			';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_periode_sidang_skripsi', $data);
		$this->load->view('v_footer', $data);
	}

	public function room($delaction = null, $delroom = null) {
		$data = array();
		
		// LOAD ROOM
		$res = $this->Room_model->get();
		$data['room'] = $res;
		
		// TAMBAH ROOM
		if($this->input->post('btntambah')) {			
			$this->Room_model->insert($this->input->post('label'));	
			$this->session->set_flashdata('notif', 'success_add');		
			redirect('master/room');
		}

		// EDIT ROOM
		if($this->input->post('btnubah')) {
			$this->Room_model->update($this->input->post('hidedit'), $this->input->post('labeledit'));	
			$this->session->set_flashdata('notif', 'success_edit');		
			redirect('master/room');
		}

		// DEL RUANG
		if($delaction != null) {
			if($this->Room_model->del($delroom)) {
				$this->session->set_flashdata('notif', 'success_del');
				redirect('master/room');
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
			        title: "Sukses hapus ruang"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_edit') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses edit data ruang"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'success_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "Sukses tambah ruang"
			      });
    		';
    	}

    	if($this->session->flashdata('notif') == 'error_add') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "error",
			        title: "'.$this->session->flashdata('msg').'"
			      });
    		';
    	}


    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var targetlabel = $(this).attr("targetlabel");
    			$("#hidedit").val(id);
    			$("#labeledit").val(targetlabel);
    		});
    	';

    
		$this->load->view('v_header', $data);
		$this->load->view('master/v_room', $data);
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

	public function mklulus($delaction = null, $delroles = null) {
		$data = array();
		

		// LOAD SETTING
		$data['eligibility'] = $this->MK_lulus_model->get();

		if($this->input->post('btntambah')) {
			$this->MK_lulus_model->add($this->input->post('kode_mk'), $this->input->post('nama_mk'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses menambahkan mata kuliah');
			redirect('master/mklulus');
		}

		// EDIT ELIGIBILITY
		if($this->input->post('btnubah')) {
			$this->MK_lulus_model->update($this->input->post('hid_id'),$this->input->post('edit_kode_mk'), $this->input->post('edit_nama_mk'));
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('message', 'Sukses mengubah mata kuliah');
			redirect('master/mklulus');
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

    	if($this->session->flashdata('notif') == 'success') {
    		$data['js'] .= '
    			Toast.fire({
			        icon: "success",
			        title: "'.$this->session->flashdata('message').'"
			      });
    		';
    	}

    	// EDIT BTN
    	$data['js'] .= '
    		$("body").on("click",".editbtn", function() {
    			var id = $(this).attr("targetid");
    			var nama = $(this).attr("targetnama");
    			var kode = $(this).attr("targetkode");
    			$("#hid_id").val(id);
    			$("#edit_nama_mk").val(nama);
    			$("#edit_kode_mk").val(kode);
    		});
    	';

    	$data['js'] .= 'bsCustomFileInput.init(); ';
		$this->load->view('v_header', $data);
		$this->load->view('master/v_mk_lulus', $data);
		$this->load->view('v_footer', $data);
	}
}
