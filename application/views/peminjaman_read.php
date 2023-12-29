<a href="<?php echo site_url('peminjaman/insert');?>" class="btn btn-primary">Tambah Peminjaman</a>

<table class="table table-striped">

    <thead class="thead-dark">
        <tr>
            <th>ID Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Nama Admin</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Batas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_peminjaman as $peminjaman):?>
        <tr>
            <td><?php echo $peminjaman['id_peminjaman'];?></td>
            <td><?php echo $peminjaman['nama_peminjam'];?></td>
            <td><?php echo $peminjaman['nama_admin'];?></td>
            <td><?php echo $peminjaman['judul_buku'];?></td>
            <td><?php echo $peminjaman['tgl'];?></td>
            <td><?php echo $peminjaman['tgl2'];?></td>

            <!-- Actions -->
            <td>
                 <a href="<?php echo site_url('peminjaman/update/'.$peminjaman['id_peminjaman']);?>" class="btn btn-warning">
                Ubah
                </a>
                
                <a href="<?php echo site_url('peminjaman/delete/'.$peminjaman['id_peminjaman']);?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">
                Hapus
                </a>
            </td>
        </tr>
        <?php endforeach?>      
    </tbody>
    <a href="<?php echo site_url('peminjaman/export/'.$peminjaman['id_peminjaman']);?>" class="btn btn-info">Export</a>
    <br />
    <br />
</table>

