

<form method="post" action="<?php echo site_url('anggota/insert_submit/');?>">
	<table class="table table-striped">
	
		<tr>
			<td>NIM</td>
			<!--$data_anggota_single['nama'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="nim" value="" required="" class="form-control"></td>
		</tr>
	
		<tr>
			<td>Nama Anggota</td>
			<td><input type="text" name="nama" value="" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Prodi</td>
			<td><input type="text" name="prodi" value="" required="" class="form-control"></td>
		</tr>


		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

</body>
</html>