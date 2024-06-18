<?php
function main_header($menubar = [])
{
  defined('BASEPATH') or exit('No direct script access allowed');
  $ci = &get_instance();
  @$session = (object)get_userdata(USER);
  // var_dump($session);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= SYSTEM_MODULE ?></title>

    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/toastr/toastr.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/Logo/logo.jpg">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  </head>

  <body class="hold-transition layout-top-nav">
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand-md navbar-dark navbar-green" style="background-color: #026E09;">
        <div class="container">
          <a href="#" class="navbar-brand">
            <img src="<?= base_url() ?>assets/images/logo-no-background.png" height="65" alt="mindcare logo">
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" hidden>
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse" style="font-weight: 400;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="<?= base_url() ?>dashboard" class="nav-link <?= (sidebar($menubar, ['dashboard'])) ? 'active font-weight-bolder' : '' ?> " <?= $session->usertype == 0 ? 'hidden' : '' ?>>Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>appointment" class="nav-link <?= (sidebar($menubar, ['appointments'])) ? 'active font-weight-bolder' : '' ?>" <?= $session->usertype == 2 || $session->usertype == 0 ? 'hidden' : '' ?>>Appointments</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>user" class="nav-link <?= (sidebar($menubar, ['user_mgmt'])) ? 'active font-weight-bolder' : '' ?>" <?= $session->usertype == 0 || $session->usertype == 3 ? 'hidden' : '' ?>>Manage Users</a>
              </li>
              <li>
                <a href="<?= base_url() ?>admin" class="nav-link <?= (sidebar($menubar, ['admin_prof'])) ? 'active font-weight-bolder' : '' ?>" <?= $session->usertype == 1 || $session->usertype == 0 || $session->usertype == 3 ? 'hidden' : '' ?>>Admin Profile</a>
              </li>
            </ul>

          </div>
          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item" <?=@$session->usertype==1 && @$session->notif>0 ? '' : 'hidden' ?>>
              <marquee>
                You have <?= $session->notif?> pending appointment(s)
              </marquee>
            </li>
            <li class="nav-item" <?=@$session->usertype!=0? '' : 'hidden' ?>>
              <p style="font-size: 0.8rem; padding-top: 10px;">Hello, Mr/Ms <?= ucfirst(@$session->lname)?> </p>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="signout" role="button" style="font-weight:600;">
                Logout</i>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <?php
    }

    function main_footer()
    {
      $ci = &get_instance();
      ?>
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <!-- <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="">Mindcare</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer> -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/toastr/toastr.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- load global js -->
    <script src="<?= base_url() ?>assets/js/global.js"></script>
    <!-- added js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/js/noPostBack.js"></script>
    <script>
      var base_url = '<?= base_url() ?>';
      var baseUrl = '<?= base_url() ?>';

      var base_url = <?php echo json_encode(base_url()) ?>;

      $('#signout').on('click', function() {
        window.location = base_url + "login/authentication";
      })

      $(function() {
        bsCustomFileInput.init();
      });
    </script>
  </body>

  </html>
<?php
    }
?>