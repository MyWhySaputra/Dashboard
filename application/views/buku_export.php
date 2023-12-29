<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_provinsi.xls" );
?>

<table border="1">
	<thead>
		<tr>
			<th>Kode Buku</th>
            <th>ID Penerbit</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Gambar</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data provinsi-->
		<?php foreach($data_buku as $buku):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $buku['kode_buku'];?></td>
            <td><?php echo $buku['id_penerbit'];?></td>
            <td><?php echo $buku['judul'];?></td>
            <td><?php echo $buku['pengarang'];?></td>
            <td>
                <?php if(!empty($buku['gambar'])):?>
                <img src="<?php echo base_url('upload_folder/'.$buku['gambar']);?>" style="width:50px;">
                <?php endif;?>
            </td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>