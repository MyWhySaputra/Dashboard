

<!--$data_anggota_single['nim'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda nim yang akan diupdate) -->
<form method="post" action="<?php echo site_url('anggota/update_submit/'.$data_anggota_single['nim']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama Anggota</td>
			<!--$data_anggota_single['nama'] : menampilkan data anggota yang dipilih dari database -->
			<td><input type="text" name="nama" value="<?php echo $data_anggota_single['nama'];?>" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Prodi</td>
			<!--$data_anggota_single['nama'] : menampilkan data anggota yang dipilih dari database -->
			<td><input type="text" name="prodi" value="<?php echo $data_anggota_single['prodi'];?>" required="" class="form-control"></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

<?php if(!empty($response)):?>
	<?php echo $response;?>
<?php endif;?>
