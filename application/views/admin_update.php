

<!--$data_anggota_single['nim'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda nim yang akan diupdate) -->
<form method="post" action="<?php echo site_url('admin/update_submit/'.$data_admin_single['id_admin']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama admin</td>
			<!--$data_anggota_single['nama'] : menampilkan data anggota yang dipilih dari database -->
			<td><input type="text" name="nama_admin" value="<?php echo $data_admin_single['nama_admin'];?>" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<!--$data_anggota_single['nama'] : menampilkan data anggota yang dipilih dari database -->
			<td><input type="text" name="alamat" value="<?php echo $data_admin_single['alamat'];?>" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Telepon</td>
			<!--$data_anggota_single['nama'] : menampilkan data anggota yang dipilih dari database -->
			<td><input type="text" name="telp" value="<?php echo $data_admin_single['telp'];?>" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Jabatan</td>
			<!--$data_anggota_single['nama'] : menampilkan data anggota yang dipilih dari database -->
			<td><input type="text" name="jabatan" value="<?php echo $data_admin_single['jabatan'];?>" required="" class="form-control"></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

