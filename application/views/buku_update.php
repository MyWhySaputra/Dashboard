

<!--$data_buku_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('buku/update_submit/'.$data_buku_single['kode_buku']);?>">
	<table class="table table-striped">
		
		<tr>
			<td>Penerbit</td>
			<!--$data_buku_single['nama'] : menampilkan data buku yang dipilih dari database -->
			<td>
				<select name="id_penerbit" class="form-control">
				<?php foreach($data_penerbit as $penerbit):?>
					<?php if($penerbit['id_penerbit'] == $data_penerbit['id_penerbit']):?>
					<option value="<?php echo $penerbit['id_penerbit'];?>" selected><?php echo $penerbit['nama_penerbit'];?></option>
					<?php else:?>
					<option value="<?php echo $penerbit['id_penerbit'];?>"><?php echo $penerbit['nama_penerbit'];?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Judul</td>
			<!--$data_buku_single['nama'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="judul" value="<?php echo $data_buku_single['judul'];?>" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Pengarang</td>
			<!--$data_buku_single['nama'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="pengarang" value="<?php echo $data_buku_single['pengarang'];?>" required="" class="form-control"></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

</body>
</html>