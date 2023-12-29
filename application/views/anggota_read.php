

<a href="<?php echo site_url('anggota/insert');?>" class="btn btn-primary">Tambah Anggota</a>
<br /><br />
<table class="table table-striped">

    <thead class="thead-dark">
        <tr>
            <th>NIM</th>
            <th>Nama Anggota</th>
            <th>Prodi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_anggota as $anggota):?>
        <tr>
            <td><?php echo $anggota['nim'];?></td>
            <td><?php echo $anggota['nama'];?></td>
            <td><?php echo $anggota['prodi'];?></td>
            <td>
                 <a href="<?php echo site_url('anggota/update/'.$anggota['nim']);?>" class="btn btn-warning">
                Ubah
                </a>
                
                <a href="<?php echo site_url('anggota/delete/'.$anggota['nim']);?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">
                Hapus
                </a>
            </td>
        </tr>
        <?php endforeach?>      
    </tbody>
</table>

