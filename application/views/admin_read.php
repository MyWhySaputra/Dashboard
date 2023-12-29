

<a href="<?php echo site_url('admin/insert');?>" class="btn btn-primary">Tambah admin</a>
<br /><br />

<table class="table table-striped">

    <thead class="thead-dark">
        <tr>
            <th>ID Admin</th>
            <th>Nama Admin</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_admin as $admin):?>
        <tr>
            <td><?php echo $admin['id_admin'];?></td>
            <td><?php echo $admin['nama_admin'];?></td>
            <td><?php echo $admin['alamat'];?></td>
            <td><?php echo $admin['telp'];?></td>
            <td><?php echo $admin['jabatan'];?></td>
            <td>
                 <a href="<?php echo site_url('admin/update/'.$admin['id_admin']);?>" class="btn btn-warning">
                Ubah
                </a>
                
                <a href="<?php echo site_url('admin/delete/'.$admin['id_admin']);?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">
                Hapus
                </a>
            </td>
        </tr>
        <?php endforeach?>      
    </tbody>
</table>

