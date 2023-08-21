<table border="1">
	<tr>
		<th>No.</th>
		<th>Tanggal Daftar</th>
		<th>NRP</th>
		<th>Nama Mahasiswa</th>
		<th>Status</th>

	</tr>
	<?php if(isset($lulus)) { 

                      setlocale (LC_TIME, 'id_ID');
                      foreach($lulus as $key => $row) { ?>
	<tr>
		<td><?php echo $key+1; ?></td>
		<td><?php if($row->submit_date != null) {  echo strftime("%d/%m/%Y", strtotime($row->submit_date)); } ?></td>
		<td><?php  echo $row->nrp;  ?></td>
		<td><?php  echo $row->nama;  ?></td>
		<td>
			<?php 
             if($row->dosbing_validate_date == null) {
              echo 'Menunggu Validasi Dosbing';
             } else if($row->admin_validate_date == null) {
              echo 'Menunggu Validasi Admin';
             } else if($row->wd_validate_date == null) {
              echo 'Menunggu Validasi WD';
             } else if($row->sk_filename == null) {
              echo 'Menunggu SK';
             } else {
              echo 'SK Lulus Terbit';
             }
              ?>			
		</td>
	</tr>
	<?php } } ?>
</table>