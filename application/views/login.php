<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pepustakaan - <?php echo $judul;; ?></title>

  <!-- css yang digunakan theme -->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/style.css'); ?>">
</head>

<body class="bg-gradient-dark">

  <!-- container -->
  <div class="container">

    <!-- outer row -->
    <div class="row justify-content-center">

      <!-- outer col-->
      <div class="col-xl-10 col-lg-12 col-md-9">

        <!-- card -->
        <div class="card o-hidden border-0 shadow-lg my-5">

          <!-- card body -->
          <div class="card-body p-0">

            <!-- inner row -->
            <div class="row">

              <!--inner col -->
              <div class="col-lg-12">

                <!-- form -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-dark font-weight-bold mb-2">FORM LOGIN</h1>
                  </div>
                  <?php echo validation_errors('<div class="alert alert-danger text-center">', '</div>'); ?>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                      <form method="post" action="<?php echo site_url('user/login/'); ?>">
                        <p><?php echo $this->session->flashdata('login') ?></p>
                        <div class="form-group">
                          <label>Masukan Username</label>
                          <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Masukan Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                        <input type="submit" name="submit" value="Login" class="btn btn-dark btn-user btn-block">
                      </form>
                    </div>
                  </div>
                  <br><br><br>
                  <h6 class="text-center">Males Ngetik? nih Copas</h6>
                  <h6 class="text-center text-dark font-weight-bold mb-2">Username: admin</h6>
                  <h6 class="text-center text-dark font-weight-bold mb-2">Password: wahyuig</h6>
                  </form>

                </div>
                <!-- form -->

              </div>
              <!--inner col-->

            </div>
            <!-- inner row -->

          </div>
          <!-- card body -->

        </div>
        <!-- card -->

      </div>
      <!-- outer col-->

    </div>
    <!-- outer row -->

  </div>
  <!-- container -->

</body>

</html>