<a href="<?php echo site_url('pengembalian/insert');?>" class="btn btn-primary">Tambah Data pengembalian</a>
<a href="<?php echo site_url('pengembalian/export/');?>" class="btn btn-info">Export Daftar pengembalian</a>
<table id="table" class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>ID </th>
            <th>Nama Peminjam</th>
            <th>Judul </th>
            <th>Batas Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Admin Peminjaman</th>
            <th>Admin Pengembalian</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>

<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

<link href="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

<script type="text/javascript">
    var table;
    jQuery(document).ready(function() {
        table = $('#table').DataTable({ 
 
            "processing": true, 
            "serverSide": true,
            "lengthChange": false,
            "pageLength": 5,
            "order": [], 
            "ajax": {
                "url": "<?php echo site_url('Pengembalian_ajax/datatables')?>",
                "type": "POST"
            },
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });
    });
</script>