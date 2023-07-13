<?php 
class Sempro_model extends CI_Model {

        public function get_student_sempro($nrp) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel", sidang_time.label,  student.nama, l1.nama as "dosbing1", l2.nama as "dosbing2"');


                // TODO: check jika statusnya cancelled
                $q = $this->db->get_where('sempro', array('sempro.nrp' => $nrp, 'sempro.is_failed' =>0, 'sempro.is_deleted' => 0));
                //echo $this->db->last_query(); die();
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }



        public function get_student_sempro_lulus($nrp) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel", sidang_time.label,  student.nama, l1.nama as "dosbing1", l2.nama as "dosbing2"');


                // TODO: check jika statusnya cancelled
                $q = $this->db->get_where('sempro', array('sempro.nrp' => $nrp, 'sempro.is_failed' =>0, 'sempro.is_done' =>1, 'sempro.is_deleted' => 0));
                //echo $this->db->last_query(); die();
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_all($where = '') {
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer l4', 'l4.npk=sempro.penguji1', 'left');
                $this->db->join('lecturer l5', 'l5.npk=sempro.penguji2', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel", sidang_time.label, student.nama, l1.nama as "dosbing1", l2.nama as "dosbing2", l4.nama as "namapenguji1", l5.nama as "namapenguji2"');
                if($where != '') { $this->db->where($where); }

                // TODO: check jika statusnya cancelled
                $this->db->order_by('sempro.registered_date', 'desc');
                $q = $this->db->get_where('sempro', array('sempro.is_failed' =>0, 'sempro.is_deleted' => 0));
                //return $this->db->last_query();
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_by_id($id) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer l4', 'l4.npk=sempro.penguji1', 'left');
                $this->db->join('lecturer l5', 'l5.npk=sempro.penguji2', 'left');
                $this->db->join('lecturer l6', 'l6.npk=sempro.dosbing_validate_npk', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('lecturer l3', 'l3.npk = sempro.kalab_npk_verified', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel",  student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2", l3.nama as "kalabnama", sidang_time.label, l4.nama as "namapenguji1", l5.nama as "namapenguji2", l6.nama as "namadosbingvalidaterevisi"');


                // TODO: check jika statusnya cancelled
                $q = $this->db->get_where('sempro', array('sempro.id' => $id));
                if($q->num_rows() > 0) {
                        return $q->row();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_with_where($where) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer l4', 'l4.npk=sempro.penguji1', 'left');
                $this->db->join('lecturer l5', 'l5.npk=sempro.penguji2', 'left');
                $this->db->join('lecturer l6', 'l6.npk=sempro.dosbing_validate_npk', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('lecturer l3', 'l3.npk = sempro.kalab_npk_verified', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->where($where);
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel",  student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2", l3.nama as "kalabnama", sidang_time.label, l4.nama as "namapenguji1", l5.nama as "namapenguji2", l6.nama as "namadosbingvalidaterevisi"');


                // TODO: check jika statusnya cancelled
                $q = $this->db->get('sempro');
                //echo $this->db->last_query();
                //die();
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_by_periode($periode_id) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer l4', 'l4.npk=sempro.penguji1', 'left');
                $this->db->join('lecturer l5', 'l5.npk=sempro.penguji2', 'left');
                $this->db->join('lecturer l3', 'l3.npk = sempro.kalab_npk_verified', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel", student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2", l3.nama as "kalabnama", sidang_time.label, l4.nama as "namapenguji1", l5.nama as "namapenguji2"');

                $q = $this->db->get_where('sempro', array('sempro.periode_sidang_id' => $periode_id));
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_by_npk($npk, $periode_id) { 
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer l4', 'l4.npk=sempro.penguji1', 'left');
                $this->db->join('lecturer l5', 'l5.npk=sempro.penguji2', 'left');
                $this->db->join('lecturer l3', 'l3.npk = sempro.kalab_npk_verified', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel", student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2", l3.nama as "kalabnama", sidang_time.label, l4.nama as "namapenguji1", l5.nama as "namapenguji2"');

                $this->db->where('sempro.periode_sidang_id='.$periode_id.' AND (sempro.penguji1 = "'.$npk.'" OR sempro.penguji2 = "'.$npk.'" OR sempro.pembimbing1 = "'.$npk.'" OR sempro.pembimbing2 = "'.$npk.'") ');
                $q = $this->db->get('sempro');
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function get_sempro_need_kalab_validation($idlab, $periode_id) {
                $hitung = 0;
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('topik', 'topik.id=student_topik.topik_id','left'); 
                
                
                $this->db->select('sempro.*');

                $this->db->where('sempro.periode_sidang_id='.$periode_id.' AND sempro.is_deleted = 0 AND topik.id_lab = "'.$idlab.'" AND sempro.kalab_npk_verified IS null');
                $q = $this->db->get('sempro');
                $hitung = $q->num_rows();
                return $hitung;
        }

        public function get_sempro_need_room_plotting($periode_id) {
                $q = $this->db->get_where('sempro', array('periode_sidang_id' => $periode_id, 'ruang_id' => null, 'is_deleted' => 0));
                return $q->num_rows();
        }

        public function get_sempro_schedule($periode_id, $npk = null) {
                if($npk != null) {
                        $this->db->where(" (sempro.penguji1 = '$npk' OR sempro.penguji2 = '$npk' OR sempro.pembimbing1 = '$npk' OR sempro.pembimbing2 = '$npk')");
                }

                $this->db->where('sempro.periode_sidang_id='.$periode_id.' ');

                $this->db->join('student_topik', 'student_topik.id = sempro.student_topik_id','left');
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('lecturer l4', 'l4.npk=sempro.penguji1', 'left');
                $this->db->join('lecturer l5', 'l5.npk=sempro.penguji2', 'left');
                $this->db->join('lecturer l3', 'l3.npk = sempro.kalab_npk_verified', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');

                 $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel", student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2", l3.nama as "kalabnama", sidang_time.label, l4.nama as "namapenguji1", l5.nama as "namapenguji2"');
                 $this->db->order_by('sempro.sidang_date', 'desc');
                 $this->db->order_by('sempro.sidang_time', 'asc');
                 $q = $this->db->get('sempro');

                 //echo $this->db->last_query();
                if($q->num_rows() > 0) {
                        return $q->result();        
                } else {
                        return false;
                }
        }

        public function get_student_sempro_by_lab($idlab, $npk, $periode_id) {
                $this->db->join('student_topik', 'student_topik.id=sempro.student_topik_id', 'left');
                $this->db->join('topik', 'topik.id=student_topik.topik_id','left'); 
                
                $this->db->join('student', 'student.nrp=sempro.nrp','left');
                $this->db->join('lecturer l1', 'l1.npk=student_topik.lecturer1_npk', 'left');
                $this->db->join('lecturer l2', 'l2.npk=student_topik.lecturer2_npk', 'left');
                $this->db->join('room', 'room.id=sempro.ruang_id', 'left');
                $this->db->join('sidang_time', 'sidang_time.id = sempro.sidang_time', 'left');
                $this->db->select('student_topik.judul, sempro.*, room.label as "roomlabel", sidang_time.label, student.nama, l1.npk as "lecturer1_npk", l2.npk as "lecturer2_npk", l1.nama as "dosbing1", l2.nama as "dosbing2"');

                $this->db->where('sempro.periode_sidang_id='.$periode_id.' AND ((sempro.penguji1 = "$npk" OR sempro.penguji2 = "$npk" OR sempro.pembimbing1 = "$npk" OR sempro.pembimbing2 = "$npk") OR topik.id_lab = "'.$idlab.'" ) ');
             //   $this->db->where('topik.id_lab', $idlab);
                

                // TODO: check jika statusnya cancelled
                $q = $this->db->get('sempro');
                if($q->num_rows() > 0) {

                        return $q->result();        
                } else {
                      
                        return false;
                }
        }

        public function get_uses_room($tanggal_sidang, $jam_sidang) {
               $q =  $this->db->get_where('sempro', array('ruang_id !=' => null, 'sidang_date' => $tanggal_sidang, 'sidang_time' => $jam_sidang));
       
               $array = array();
               if($q->num_rows() > 0) {
                foreach ($q->result() as $key => $value) {
                        $array[] = $value->ruang_id;
                }
               }

               return $array;
        }

        public function insert($student_topik_id, $periode_sidang_id, $nrp, $sks_kum, $ipk_kum, $sks_ks, $file_naskah, $naskah_drive) {
                $data = array(
                        'student_topik_id'      => $student_topik_id,
                        'periode_sidang_id'     => $periode_sidang_id,
                        'registered_date'       => date('Y-m-d H:i:s'),
                        'nrp'                   => $nrp,
                        'sks_kum'               => $sks_kum,
                        'ipk_kum'               => $ipk_kum,
                        'sks_ks'                => $sks_ks,
                        'naskah_filename'       => $file_naskah, 
                        'naskah_upload_date'    => date('Y-m-d H:i:s'),
                        'naskah_drive'          => $naskah_drive

                );

                $this->db->insert('sempro', $data);
        }

        public function kalab_validate($sempro_id, $kalab_npk, $sidang_date, $sidang_time, $penguji1_npk, $penguji2_npk ) {
                $data = array(
                        'kalab_verified_date'   => date('Y-m-d H:i:s'),
                        'kalab_npk_verified'    => $kalab_npk,
                        'sidang_date'           => $sidang_date,
                        'sidang_time'           => $sidang_time,
                        'penguji1'              => $penguji1_npk,
                        'penguji2'              => $penguji2_npk
                );

                $this->db->where('id', $sempro_id);
                $this->db->update('sempro',$data);
        }

        public function kalab_cancel_plot($sempro_id) {
                $data = array(
                        'kalab_verified_date'   => null,
                        'kalab_npk_verified'    => null,
                        'sidang_date'           => null,
                        'sidang_time'           => null,
                        'penguji1'              => null,
                        'penguji2'              => null,
                        'ruang_id'              => null
                );
                $this->db->where('id', $sempro_id);
                $this->db->update('sempro',$data);

        }

        public function admin_cancel_room_plot($sempro_id){
                $data = array('ruang_id' => null);
                $this->db->where('id', $sempro_id);
                $this->db->update('sempro',$data);
        }

        public function get_sidang_time() {
               $q =  $this->db->get('sidang_time');
               return $q->result();
        }

        public function insert_plot($sempro_id, $npk_penguji1, $npk_penguji2, $tglsidang, $jamsidangid, $npkkalab) {
                // TODO: cek dulu apakah semua penguji dan pembimbing available pada jam tersebut
                // cek kesediaan penguji1
                $q = $this->db->get_where('sempro', array('penguji1' => $npk_penguji1, 'sidang_date' => $tglsidang, 'sidang_time' => $jamsidangid));
                if($q->num_rows > 0) { return 'Jadwal sempro penguji 1 bentrok'; }

                // cek kesediaan penguji2
                $q = $this->db->get_where('sempro', array('penguji2' => $npk_penguji2, 'sidang_date' => $tglsidang, 'sidang_time' => $jamsidangid));
                if($q->num_rows > 0) { return 'Jadwal sempro penguji 2 bentrok'; }



                // cek kesediaan pembimbing1
                // TODO: ini belum selesai
                $this->db->join('sempro', 'sempro.student_topik_id = student_topik.id');
                $this->db->select('student_topik.*');
                $q = $this->db->get_where('student_topik', array('sempro.id' => $sempro_id));
                if($q->num_rows() >0) {
                        $hq = $q->row();
                        $pembimbing1 = $hq->lecturer1_npk;
                        $pembimbing2 = $hq->lecturer2_npk;

                        // cek kesediaan pembimbing 1
                        $q = $this->db->get_where('sempro', array('pembimbing1' => $pembimbing1, 'sidang_date' => $tglsidang, 'sidang_time' => $jamsidangid));
                        if($q->num_rows > 0) { return 'Jadwal sempro pembimbing 1 bentrok'; }

                         // cek kesediaan pembimbing 2
                        $q = $this->db->get_where('sempro', array('pembimbing2' => $pembimbing2, 'sidang_date' => $tglsidang, 'sidang_time' => $jamsidangid));
                        if($q->num_rows > 0) { return 'Jadwal sempro pembimbing 2 bentrok'; }
                } else {
                        return 'Data sempro tidak valid';
                }

                // update jadwal dengan plot
                $data = array(
                        'sidang_time'           => $jamsidangid,
                        'sidang_date'           => $tglsidang,
                        'penguji1'              => $npk_penguji1,
                        'penguji2'              => $npk_penguji2,
                        'pembimbing1'           => $pembimbing1,
                        'pembimbing2'           => $pembimbing2,
                        'kalab_verified_date'   => date('Y-m-d H:i:s'),
                        'kalab_npk_verified'    => $npkkalab
                );

                $this->db->where('id', $sempro_id);
                $this->db->update('sempro',$data);

                return true;

        }

        public function update_ruang_sidang($id, $ruang_id, $username) {
                $data = array('ruang_id' => $ruang_id, 'admin_plotting_date' => date('Y-m-d H:i:s'), 'admin_plotting_username' => $username);
                $this->db->where('id', $id);
                $this->db->update('sempro', $data);
        }

        public function update_naskah_filename($id, $naskah_filename, $naskah_drive) {
                $data = array('naskah_filename' => $naskah_filename, 'naskah_upload_date' => date('Y-m-d H:i:s'), 'naskah_drive' => $naskah_drive);
                $this->db->where('id', $id);
                $this->db->update('sempro', $data);
        }

        public function submit_hasil_sempro($id, $materi, $rumusan, $tujuan, $metodologi, $analisis, $saran, $kesimpulan, $cekrevisijudul, $hasil_sempro_filename) {
                if($cekrevisijudul == false) {
                        $is_done = true;
                } else {
                        $is_done = false;
                }

                $data = array(
                        'materi'                => $materi,
                        'rumusan'               => $rumusan,
                        'tujuan'                => $tujuan,
                        'metodologi'            => $metodologi,
                        'analisis'              => $analisis,
                        'saran'                 => $saran,
                        'kesimpulan'            => $kesimpulan,
                        'revision_required'     => $cekrevisijudul,
                        'is_done'               => $is_done,
                        'hasil_sempro_filename' => $hasil_sempro_filename,
                        'hasil_submited_date'   => date('Y-m-d H:i:s')
                );

                $this->db->where('id', $id);
                $this->db->update('sempro', $data);

        }

        public function update_judul($id, $newjudul, $file_naskah, $naskah_drive) {
                $q = $this->db->get_where('sempro', array('id' => $id));
                if($q->num_rows() > 0) {
                        $hq = $q->row();
                        $this->db->trans_start();
                        
                        $data = array(
                                'judul' => $newjudul
                        );
                        $this->db->where('id', $hq->student_topik_id);
                        $this->db->update('student_topik', $data);

                        $data = array(
                                'revision_judul_date' => date('Y-m-d H:i:s'),  
                                'naskah_filename' => $file_naskah, 
                                'naskah_upload_date' => date('Y-m-d H:i:s'),
                                'naskah_drive' => $naskah_drive
                        );
                        $this->db->where('id', $id);
                        $this->db->update('sempro', $data);
                        $this->db->trans_complete();

                        return true;
                } else {
                        return false;
                }
        }

        public function validate_revisi_judul($id, $npk) {
                $data = array('is_done' => true, 'dosbing_validate_date' => date('Y-m-d H:i:s'), 'dosbing_validate_npk' => $npk);
                $this->db->where('id', $id);
                $this->db->update('sempro', $data);
        }

        // GET AVAILABLE DOSEN YG BISA SIDANG SEMPRO
        // UNTUK AJAX CALL
        public function get_available_dosen($exclude_sempro_id,$tglsidang,$jamsidang) {
            $q = $this->db->query(
                "SELECT lecturer.npk, lecturer.nama FROM lecturer WHERE lecturer.npk NOT IN 
                (SELECT sempro.penguji1 FROM sempro WHERE sempro.id != ".$exclude_sempro_id." 
                        AND sempro.sidang_time = ".$tglsidang." 
                        AND sempro.sidang_time= ".$jamsidang.") AND 
                lecturer.npk NOT IN 
                (SELECT sempro.penguji2 FROM sempro WHERE sempro.id != ".$exclude_sempro_id."  AND sempro.sidang_time = ".$tglsidang." AND sempro.sidang_time= ".$jamsidang.") AND lecturer.npk NOT IN 
                (SELECT sempro.pembimbing1 FROM sempro WHERE sempro.id = ".$exclude_sempro_id.") AND lecturer.npk NOT IN (SELECT sempro.pembimbing2 FROM sempro WHERE sempro.id = ".$exclude_sempro_id.")
                ;");

            return $q->result();
        }


        // HAPUS SEMPRO
        public function hapus_sempro($id) {
                $this->db->where('id', $id);
                $this->db->delete('sempro');
        }

        // BATAL STATUS        
        // kalab 
        public function batal_validasi($idsempro) {
                $data = array( 'sidang_time'    => null,
                        'sidang_date'           => null,
                        'penguji1'              => null,
                        'penguji2'              => null,
                        'pembimbing1'           => null,
                        'pembimbing2'           => null,
                        'kalab_verified_date'   => null,
                        'kalab_npk_verified'    => null);
                $this->db->where('id', $idsempro);
                $this->db->update('sempro', $data);


                $this->batal_plot_ruang($idsempro);
                $this->batal_input_hasil_ujian($idsempro);
                $this->batal_revisi_naskah($idsempro);
                $this->batal_validasi_revisi_naskah($idsempro);
        }

        // admin
        public function batal_plot_ruang($idsempro) {
                $data = array('ruang_id' => null, 'admin_plotting_date' => null, 'admin_plotting_username' => null);
                $this->db->where('id', $idsempro);
                $this->db->update('sempro', $data);

                $this->batal_input_hasil_ujian($idsempro);
                $this->batal_revisi_naskah($idsempro);
                $this->batal_validasi_revisi_naskah($idsempro);
        }

        // dosbing
        public function batal_input_hasil_ujian($idsempro) {
                $data = array('materi'          => null,
                        'rumusan'               => null,
                        'tujuan'                => null,
                        'metodologi'            => null,
                        'analisis'              => null,
                        'saran'                 => null,
                        'kesimpulan'            => null,
                        'revision_required'     => null,
                        'is_done'               => null,
                        'hasil_sempro_filename' => null,
                        'hasil_submited_date'   => null);
                $this->db->where('id', $idsempro);
                $this->db->update('sempro', $data);
                

                $this->batal_revisi_naskah($idsempro);
                $this->batal_validasi_revisi_naskah($idsempro);
        }

        // mhs
        public function batal_revisi_naskah($idsempro) {
                $data = array('revision_judul_date' => null);
                $this->db->where('id', $idsempro);
                $this->db->update('sempro', $data);

                $this->batal_validasi_revisi_naskah($idsempro);
        }

        // dosbing
        public function batal_validasi_revisi_naskah($idsempro) {
                $data = array('is_done' => null, 'dosbing_validate_date' => null, 'dosbing_validate_npk' => null);
                $this->db->where('id', $idsempro);
                $this->db->update('sempro', $data);
        }

        // ubah dosbing
        public function update_dosbing($semproid, $penguji1 = null, $penguji2 = null) {
                $data = array();
                if(!empty($penguji1)) { 
                        $data['penguji1'] = $penguji1;
                }
                if(!empty($penguji2)) { 
                        $data['penguji2'] = $penguji2;
                }

                $this->db->where('id', $semproid);
                $this->db->update('sempro', $data);
        }
}

?>