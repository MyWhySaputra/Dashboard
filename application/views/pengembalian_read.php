<a href="<?php echo site_url('pengembalian/insert');?>" class="btn btn-primary">Tambah Pengembalian</a>

<table class="table table-striped">

    <thead class="thead-dark">
        <tr>
            <th>ID Pengembalian</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Batas Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Admin Peminjaman</th>
            <th>Admin Pengembalian</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_pengembalian as $pengembalian):?>
        <tr>
            <td><?php echo $pengembalian['id_pengembalian'];?></td>
            <td><?php echo $pengembalian['nama_peminjam'];?></td>
            <td><?php echo $pengembalian['judul_buku'];?></td>            
            <td><?php echo $pengembalian['batas'];?></td>
            <td><?php echo $pengembalian['tgl_return'];?></td>
            <td><?php echo $pengembalian['denda'];?></td>
            <td><?php echo $pengembalian['ptgs2'];?></td>
            <td><?php echo $pengembalian['ptgs1'];?></td>

            <!-- Actions -->
            <td>
                 <a href="<?php echo site_url('pengembalian/update/'.$pengembalian['id_pengembalian']);?>" class="btn btn-warning">
                Ubah
                </a>
                
                <a href="<?php echo site_url('pengembalian/delete/'.$pengembalian['id_pengembalian']);?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">
                Hapus
                </a>
            </td>
        </tr>
        <?php endforeach?>      
    </tbody>
    <a href="<?php echo site_url('pengembalian/export/'.$pengembalian['id_pengembalian']);?>" class="btn btn-info">Export</a>
    <br />
    <br />
</table>

