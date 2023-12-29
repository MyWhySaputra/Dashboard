<!--$data_penerbit_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('pengembalian/update_submit/'.$data_pengembalian_single['id_pengembalian']);?>">
	<table class="table table-striped">

        <tr>
            <td>Pilih ID Peminjaman</td>
            <!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
            <td>
                <select name="id_peminjaman" class="form-control" required="">
                <option value=""> --- Select --- </option>    
                <?php foreach($data_peminjaman as $peminjaman):?>
                <option value="<?php echo $peminjaman['id_peminjaman'];?>">
                    <?php echo $peminjaman['id_peminjaman'];?> -- nama: <?php echo $peminjaman['nama_peminjam'];?> -- judul buku: <?php echo $peminjaman['judul_buku'];?> -- tgl pinjam: <?php echo $peminjaman['tgl'];?> -- Batas: <?php echo $peminjaman['tgl2'];?>
                </option>
                <?php endforeach;?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Tanggal pengembalian</td>
            <td><input type="date" name="tgl_pengembalian" value="" required="" class="form-control"></td>
        </tr>

        <tr>
            <td>Keterlambatan (hari)</td>
            <td><input type="number" name="telat" value="" class="form-control"></td>
        </tr>

        <tr>
            <td>Rusak?</td>
            <!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
            <td>
                <select name="rusak" class="form-control">
                    <option value="0">
                        Tidak
                    </option>
                    <option value="1">
                        Ya
                    </option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Hilang?</td>
            <!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
            <td>
                <select name="hilang" class="form-control">
                    <option value="0">
                        Tidak
                    </option>
                    <option value="1">
                        Ya
                    </option>
                </select>
            </td>
        </tr>

		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>