<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_provinsi.xls" );
?>

<table border="1">
	<thead>
		<tr>
			<th>ID Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Nama Petugas</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Batas</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data provinsi-->
		<?php foreach($data_peminjaman as $peminjaman):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $peminjaman['id_peminjaman'];?></td>
            <td><?php echo $peminjaman['nama_peminjam'];?></td>
            <td><?php echo $peminjaman['nama_petugas'];?></td>
            <td><?php echo $peminjaman['judul_buku'];?></td>
            <td><?php echo $peminjaman['tgl'];?></td>
            <td><?php echo $peminjaman['tgl2'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>