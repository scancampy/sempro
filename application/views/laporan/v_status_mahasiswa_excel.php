<table border="1">
	<tr>
		<th>NRP</th>
    <th>Status Proposal</th>
    <th>Status Sempro</th>
    <th>Status Skripsi</th>
    <th>Status Kelulusan</th>
    <th>Dosbing</th>

	</tr>
	<?php if(isset($student)) {                       
                      foreach($student as $key => $row) {

                        
                      ?>
                  <tr>
                   
                    <td><?php echo $row->nrp; ?></td>
                    <td><?php
                        if(!isset($status_proposal[$key][0])) {
                          echo 'N/A';
                        }
                        else if($status_proposal[$key][0]->is_rejected == 1) {
                          echo 'Proposal Ditolak';
                        } else if($status_proposal[$key][0]->lecturer1_npk_verified_date == null) {
                          echo 'Menunggu Validasi Dosbing';
                        } else if($status_proposal[$key][0]->kalab_verified_date == null) {
                          echo 'Menunggu Validasi Kalab';
                        } else if($status_proposal[$key][0]->wd_verified_date == null) {
                          echo 'Menunggu Validasi WD';
                        } else if($status_proposal[$key][0]->lecturer1_npk == null) {
                          echo 'Menunggu Kalab Pilih Dosbing';
                        }  else if($status_proposal[$key][0]->judul == '') {
                          echo 'Menunggu Mahasiswa Input Judul';
                        } else if($status_proposal[$key][0]->judul != '' && $status_proposal[$key][0]->kalab_npk_verified_judul_date == null) {
                          echo 'Menunggu Kalab Validasi Judul';
                        } else if($status_proposal[$key][0]->is_verified == 0) {
                          echo 'Menunggu Validasi Final WD';
                        }  else if($status_proposal[$key][0]->is_verified == 1 && $status_proposal[$key][0]->is_st_created==0) {
                          echo 'Menunggu Pembuatan ST';
                        } else if($status_proposal[$key][0]->is_st_created) { echo 'ST Telah Terbit'; }
                      ?></td>
                    <td><?php

                   // print_r($status_sempro[$key]);
                        if(!isset($status_sempro[$key][0])) {
                          echo 'N/A';
                        }
                        else if($status_sempro[$key][0]->is_done == 1) {
                          echo 'Lulus Sidang Sempro';
                        } else if($status_sempro[$key][0]->is_failed == 1) {
                          echo 'Tidak Lulus';
                        } else if($status_sempro[$key][0]->kalab_verified_date == null) {
                          echo 'Menunggu Validasi Kalab';
                        } else if($status_sempro[$key][0]->admin_plotting_date == null) {
                          echo 'Menunggu Admin TU Ploting Ruang';
                        }  else if( $status_sempro[$key][0]->hasil_submited_date == null) {
                          echo 'Menunggu Hasil Sidang';
                        } else if($status_sempro[$key][0]->revision_required == true && $status_sempro[$key][0]->revision_judul_date == null) {
                          echo 'Menunggu Mahasiswa Revisi Judul';
                        }  else if($status_sempro[$key][0]->dosbing_validate_date == null) {
                          echo 'Menunggu Dosbing Validasi Revisi Judul';
                        } 
                      ?></td>
                    <td><?php
                        if(!isset($status_skripsi[$key][0])) {
                          echo 'N/A';
                        }
                        else if($status_skripsi[$key][0]->is_done == true) {
                          echo 'Lulus Sidang Skripsi';
                        } else if($status_skripsi[$key][0]->is_failed == 1) {
                          echo 'Tidak Lulus';
                        } else if($status_skripsi[$key][0]->kalab_verified_date == null) {
                          echo 'Menunggu Validasi Kalab';
                        } else if($status_skripsi[$key][0]->admin_plotting_date == null) {
                          echo 'Menunggu Admin TU Ploting Ruang';
                        }  else if(empty($status_skripsi[$key][0]->naskah_filename)) {
                          echo 'Menunggu Mahasiswa Upload Naskah';
                        } else {
                          echo 'Naskah telah diupload';
                        } 
                      ?></td>
                    <td><?php 
                        if(!isset($status_lulus[$key][0])) {
                          echo 'N/A';
                        }
                        else if($status_lulus[$key][0]->dosbing_validate_date == null) {
                          echo 'Menunggu Validasi Dosbing';
                         } else if($status_lulus[$key][0]->admin_validate_date == null) {
                          echo 'Menunggu Validasi Admin';
                         } else if($status_lulus[$key][0]->wd_validate_date == null) {
                          echo 'Menunggu Validasi WD';
                         } else if($status_lulus[$key][0]->sk_filename == null) {
                          echo 'Menunggu SK';
                         } else {
                          echo 'SK Lulus Terbit';
                         }
                          ?></td>
                    <td>
                      <small>
                        <?php //print_r($status_proposal[$key][0]); ?>
                        <?php if(!isset($status_proposal[$key][0])) {
                          echo 'N/A';
                        } else { 
                          if($status_proposal[$key][0]->dosbing1nama != '')  { echo '- '.$status_proposal[$key][0]->dosbing1nama;  
                          }
                          if($status_proposal[$key][0]->dosbing2nama != '')  { echo '<br/>- '.$status_proposal[$key][0]->dosbing2nama;  
                          }
                        }?>
                      </small>
                    </td>
                  </tr>
                   <?php } }  ?>
</table>