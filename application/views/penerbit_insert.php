


<form method="post" action="<?php echo site_url('penerbit/insert_submit/');?>">
	<table class="table table-striped">
		<tr>
			<td>ID Penerbit</td>
			<!--$data_buku_single['nama_buku'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="id_penerbit" value="" required="" class="form-control"></td>
		</tr>
	
		<tr>
			<td>Nama Penerbit</td>
			<td><input type="text" name="nama_penerbit" value="" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

</body>
</html>