

<a href="<?php echo site_url('penerbit/insert');?>" class="btn btn-primary">Tambah Penerbit</a>
<br /><br />
<table class="table table-striped">

    <thead class="thead-dark">
        <tr>
            <th>ID Penerbit</th>
            <th>Nama Penerbit</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_penerbit as $penerbit):?>
        <tr>
            <td><?php echo $penerbit['id_penerbit'];?></td>
            <td><?php echo $penerbit['nama_penerbit'];?></td>
            <td>
                 <a href="<?php echo site_url('penerbit/update/'.$penerbit['id_penerbit']);?>" class="btn btn-warning">
                Ubah
                </a>
                
                <a href="<?php echo site_url('penerbit/delete/'.$penerbit['id_penerbit']);?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">
                Hapus
                </a>
            </td>
        </tr>
        <?php endforeach?>      
    </tbody>
</table>

