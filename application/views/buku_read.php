<!--link tambah data-->
<a href="<?php echo site_url('buku/insert');?>" class="btn btn-primary">Tambah</a>
  

<table class="table table-striped">
    <thead class="thead-dark">

        <tr>
            <th>Kode Buku</th>
            <th>ID Penerbit</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Cover</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_buku as $buku):?>
        <tr>
            <td><?php echo $buku['kode_buku'];?></td>
            <td><?php echo $buku['id_penerbit'];?></td>
            <td><?php echo $buku['judul'];?></td>
            <td><?php echo $buku['pengarang'];?></td>
            <td>
                <?php if(!empty($buku['gambar'])):?>
                <img src="<?php echo base_url('upload_folder/'.$buku['gambar']);?>" style="width:50px;">
                <?php endif;?>
            </td>
            <td>
                <!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
                <a href="<?php echo site_url('buku/update/'.$buku['kode_buku']);?>" class="btn btn-warning">
                Ubah
                </a>

                <!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
                <a href="<?php echo site_url('buku/delete/'.$buku['kode_buku']);?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">
                Hapus
                </a>
                
            </td>
        </tr>
        <?php endforeach?>      
    </tbody>
    <a href="<?php echo site_url('buku/export/'.$buku['kode_buku']);?>" class="btn btn-info">Export</a>
    <br />
    <br />
</table>

