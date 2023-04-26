<table border="1">
	<tr>
		<th>NPK</th>
    <th>Nama</th>
    <th>Lab</th>    
    <th>Total Membimbing</th>
    <th>Total Menguji</th>
    <th>Total</th>

    <th>Dosbing 1</th>
    <th>Dosbing 2</th>
    <th>Ketua Sempro</th>
    <th>Sek. Sempro</th>
    <th>Ketua Skripsi</th>
    <th>Sek. Skripsi</th>
    
	</tr>
		<?php if(@$beban != '') { 
      $k = 0;
      foreach($beban as $row) { 
      ?>
      <tr>
        <td><?php echo $row->npk; ?></td>
        <td><?php echo $row->nama; ?></td>
        <td><?php echo $row->namalab; ?></td>
        <td><strong><?php echo $row->beban1+$row->beban2; ?></strong></td>
        <td><strong><?php echo $row->sempro1+$row->sempro2+$row->skripsi1+$row->skripsi2; ?></strong></td>
        <td><strong><?php echo $row->beban1+$row->beban2+$row->sempro1+$row->sempro2+$row->skripsi1+$row->skripsi2; ?></strong></td>
        <td><?php echo $row->beban1; ?></td>
        <td><?php echo $row->beban2; ?></td>
        <td><?php echo $row->sempro1; ?></td>
        <td><?php echo $row->sempro2; ?></td>
        <td><?php echo $row->skripsi1; ?></td>
        <td><?php echo $row->skripsi2; ?></td>
       
      </tr>
    <?php  $k++; } }  ?>
</table>