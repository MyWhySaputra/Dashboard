

<form method="post" action="<?php echo site_url('admin/insert_submit/');?>">
	<table class="table table-striped">
	
		<tr>
			<td>ID admin</td>
			<!--$data_anggota_single['nama'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="id_admin" value="" required="" class="form-control"></td>
		</tr>
	
		<tr>
			<td>Nama admin</td>
			<td><input type="text" name="nama_admin" value="" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" value="" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Telepon</td>
			<td><input type="text" name="telp" value="" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Jabatan</td>
			<td><input type="text" name="jabatan" value="" required="" class="form-control"></td>
		</tr>


		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

</body>
</html>