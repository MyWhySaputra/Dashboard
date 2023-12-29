<form method="post" action="<?php echo site_url('buku/insert_submit/');?>" enctype="multipart/form-data">
	<table class="table table-striped">


		<tr>
			<td>Kode Buku</td>
			<td><input type="text" name="kode_buku" value="" required="" class="form-control"></td>
		</tr>
	
		<tr>
			<td>Penerbit</td>
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
			<!--$data_buku_single['nama_buku'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="judul" value="" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Pengarang</td>
			<td><input type="text" name="pengarang" value="" required="" class="form-control"></td>
		</tr>

		<tr>
			<td>Gambar</td>
			<td><input type="file" name="uploadfile" value="" required="" class="form-control-file"></td>
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

