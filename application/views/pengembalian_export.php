<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_provinsi.xls" );
?>

<table border="1">
	<thead>
		<tr>
			<th>ID Pengembalian</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Batas Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Admin Peminjaman</th>
            <th>Admin Pengembalian</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data provinsi-->
		<?php foreach($data_pengembalian as $pengembalian):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $pengembalian['id_pengembalian'];?></td>
            <td><?php echo $pengembalian['nama_peminjam'];?></td>
            <td><?php echo $pengembalian['judul_buku'];?></td>            
            <td><?php echo $pengembalian['batas'];?></td>
            <td><?php echo $pengembalian['tgl_return'];?></td>
            <td><?php echo $pengembalian['denda'];?></td>
            <td><?php echo $pengembalian['ptgs2'];?></td>
            <td><?php echo $pengembalian['ptgs1'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>