<!--$data_penerbit_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('peminjaman/update_submit/'.$data_peminjaman_single['id_peminjaman']);?>">
	<table class="table table-striped">
		<tr>
            <td>Nama Peminjam</td>
            <!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
            <td>
                <select name="nama_mhs" class="form-control">
                <?php foreach($data_kap as $kap):?>
	                <option value="<?php echo $kap['nim'];?>">
	                    <?php echo $kap['nama'];?>
	                </option>
                <?php endforeach;?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Nama Petugas</td>
            <!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
            <td>
                <select name="nama_ptgs" class="form-control">
                <?php foreach($data_petugas as $petugas):?>
                <option value="<?php echo $petugas['id_admin'];?>">
                    <?php echo $petugas['nama_admin'];?>
                </option>
                <?php endforeach;?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Judul Buku</td>
            <!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
            <td>
                <select name="judul" class="form-control">
                <?php foreach($data_buku as $buku):?>
                <option value="<?php echo $buku['kode_buku'];?>">
                    <?php echo $buku['judul'];?>
                </option>
                <?php endforeach;?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Tanggal Peminjaman</td>
            <td><input type="date" name="tgl_peminjaman" value="" required="" class="form-control"></td>
        </tr>

		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>