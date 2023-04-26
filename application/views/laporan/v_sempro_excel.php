<table border="1">
	<tr>
		<th>No.</th>
		<th>Tanggal Sidang</th>
		<th>Ruang</th>
		<th>Jam</th>
		<th>NRP</th>
		<th>Mahasiswa</th>
		<th>NPK Dosbing 1</th>
		<th>Dosbing 1</th>
		<th>NPK Dosbing 2</th>
		<th>Dosbing 2</th>
		<th>NPK Ketua</th>
		<th>Ketua</th>
		<th>NPK Sekretaris</th>
		<th>Sekretaris</th>

	</tr>
	<?php if(isset($sempro)) { 

                      setlocale (LC_TIME, 'id_ID');
                      foreach($sempro as $key => $row) { ?>
	<tr>
		<td><?php echo $key+1; ?></td>
		<td><?php if($row->sidang_date != null) {  echo strftime("%d/%m/%Y", strtotime($row->sidang_date)); } ?></td>
		<td><?php  echo $row->roomlabel;  ?></td>
		<td><?php  echo $row->label;  ?></td>
		<td><?php echo $row->nrp; ?></td>
		<td><?php echo $row->nama; ?></td>
		<td><?php echo $row->pembimbing1; ?></td>
		<td><?php if($row->dosbing1 != '') { echo $row->dosbing1; }  ?></td>
		<td><?php echo $row->pembimbing2; ?></td>
		<td><?php if($row->dosbing2 != '') { echo $row->dosbing2; }  ?></td>
		<td><?php echo $row->penguji1; ?></td>
		<td><?php if($row->namapenguji1 != '') { echo $row->namapenguji1; }  ?></td>
		<td><?php echo $row->penguji2; ?></td>
		<td><?php if($row->namapenguji2 != '') { echo $row->namapenguji2; }  ?></td>
	</tr>
	<?php } } ?>
</table>