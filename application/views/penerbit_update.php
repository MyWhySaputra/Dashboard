

<!--$data_penerbit_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('penerbit/update_submit/'.$data_penerbit_single['id_penerbit']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<!--$data_penerbit_single['nama'] : menampilkan data penerbit yang dipilih dari database -->
			<td><input type="text" name="nama_penerbit" value="<?php echo $data_penerbit_single['nama_penerbit'];?>" required="" class="form-control"></td>
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
