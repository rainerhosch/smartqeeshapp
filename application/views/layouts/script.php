<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/fontawesome-free/css/all.min.css">
<?php if ($page != 'Auth') : ?>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/summernote/summernote-bs4.min.css">
<?php endif; ?>
<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/adminlte.min.css">


<!-- jQuery -->
<script src="<?= base_url('assets/templates') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/js/adminlte.js"></script>
<?php if ($page != 'Auth') : ?>
    <script src="<?= base_url('assets/templates') ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?= base_url('assets/templates') ?>/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/sparklines/sparkline.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/js/demo.js"></script>
    <script src="<?= base_url('assets/templates') ?>/js/pages/dashboard.js"></script>
<?php endif; ?>