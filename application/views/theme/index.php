<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Perpustakaan - <?php echo $judul;;?></title>

  <!-- css yang digunakan datatables -->
  <link href="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
  <!-- css yang digunakan theme -->
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.ico" /> 
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css"> 
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
  <!-- google font -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
  <!-- icons -->
  <link href="<?=base_url()?>assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!--bootstrap -->
  <link rel="stylesheet" href="htp://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
  <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- sweet alert -->
  <link rel="stylesheet" href="<?=base_url()?>assets/sweet-alert/sweetalert.min.css">
  <!-- data tables -->
  <link href="<?=base_url()?>assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
  <!-- Material Design Lite CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/material/material.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/material_style.css">
  <!-- Theme Styles -->
  <link href="<?=base_url()?>assets/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
  <link href="<?=base_url()?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
  <!-- dropzone -->
  <link href="<?=base_url()?>assets/dropzone/dropzone.css" rel="stylesheet" media="screen">
    <!--tagsinput-->
  <link href="<?=base_url()?>assets/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
    <!--select2-->
  <link href="<?=base_url()?>assets/select2/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>assets/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- load sidebar -->
    <?php $this->load->view('theme/sidebar');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- load header -->
        <?php $this->load->view('theme/header');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- load halaman sesuai controller yang dipilih dari sidebar -->
          <?php $this->load->view($theme_page);?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- load footer -->
      <?php $this->load->view('theme/footer');?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- js yang digunakan theme -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>
  <!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/sweet-alert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>assets/sweet-alert/sweet-alert-data.js"></script>
<!-- start js include path -->
<script src="<?= base_url() ?>assets/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/popper/popper.js"></script>
<script src="<?= base_url() ?>assets/jquery.blockui.min.js"></script>
<script src="<?= base_url() ?>assets/jquery.slimscroll.js"></script>
<!-- data tables -->
<script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/table_data.js"></script>
<!-- bootstrap -->
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- counterup -->
<script src="<?= base_url() ?>assets/counterup/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/counterup/jquery.counterup.min.js"></script>
<!-- Common js-->
<script src="<?= base_url() ?>assets/app.js"></script>
<script src="<?= base_url() ?>assets/layout.js"></script>
<script src="<?= base_url() ?>assets/theme-color.js"></script>
<!-- material -->
<script src="<?= base_url() ?>assets/material/material.min.js"></script>
<!-- chart js -->
<script src="<?= base_url() ?>assets/chart-js/Chart.bundle.js"></script>
<script src="<?= base_url() ?>assets/chart-js/utils.js"></script>
<script src="<?= base_url() ?>assets/chart-js/home-data.js"></script>
<!--select2-->
<script src="<?= base_url() ?>assets/select2/js/select2.js"></script>
<script src="<?= base_url() ?>assets/select2/js/select2-init.js"></script>
<!-- end js include path -->
<!-- js yang digunakan datatables -->
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#datatables').DataTable({
        "pageLength": 5,
        "lengthChange": false,
      });
    });
  </script>
</body>

</html>