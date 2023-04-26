<table border="1">
	<tr>
		<th>No.</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Topik</th>
		<th>Judul</th>
		<th>Tgl. Pengajuan</th>
		<th>Semester</th>
		<th>Lab</th>
		<th>Pembuat Topik</th>
		<th>NPK Dosbing 1</th>
		<th>Dosbing 1</th>
		<th>NPK Dosbing 2</th>
		<th>Dosbing 2</th>
		<th>Status</th>

	</tr>
	<?php if(isset($student_topic)) { 
                      foreach($student_topic as $key => $row) { ?>
	<tr>
		<td><?php echo $key+1; ?></td>
		<td><?php echo $row->student_nrp; ?></td>
		<td><?php echo $row->studentname; ?></td>
		<td><?php echo strtoupper($row->nama); ?></td>
		<td><?php echo strtoupper($row->judul); ?></td>
		<td><?php if($row->created_date != null) { echo strftime("%d/%m/%Y", strtotime($row->created_date)); } else { echo '-'; } ?></td>
		<td><?php //print_r($selsemester); 
		 echo $selsemester[0]->nama.'/'.($selsemester[0]->tahun+1);  ?></td>
		<td><?php echo $row->namalab; ?></td>
		<td><?php echo $row->pembuat; ?></td>
		<td><?php echo $row->lecturer1_npk; ?></td>
		<td><?php if($row->dosbing1nama != '') { echo $row->dosbing1nama; }  ?></td>
		<td><?php echo $row->lecturer2_npk; ?></td>
		<td><?php if($row->dosbing2nama != '') { echo $row->dosbing2nama; }  ?></td>
		<td><?php
                        if($row->is_rejected == 1) {
                          echo 'Proposal Ditolak';
                        } else if($row->lecturer1_npk_verified_date == null) {
                          echo 'Menunggu Validasi Dosbing';
                        } else if($row->kalab_verified_date == null) {
                          echo 'Menunggu Validasi Kalab';
                        } else if($row->wd_verified_date == null) {
                          echo 'Menunggu Validasi WD';
                        } else if($row->lecturer1_npk == null) {
                          echo 'Menunggu Kalab Pilih Dosbing';
                        }  else if($row->judul == '') {
                          echo 'Menunggu Mahasiswa Input Judul';
                        } else if($row->judul != '' && $row->kalab_npk_verified_judul_date == null) {
                          echo 'Menunggu Kalab Validasi Judul';
                        } else if($row->is_verified == 0) {
                          echo 'Menunggu Validasi Final WD';
                        }  else if($row->is_verified ==1 && $row->is_st_created==0) {
                          echo 'Menunggu Pembuatan ST';
                        } else if($row->is_st_created) { echo 'ST Telah Terbit'; }
                      ?></td>
	</tr>
	<?php } } ?>
</table>