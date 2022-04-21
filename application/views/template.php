<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/templates/img/favicon/smart_qeesh.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/templates.css">
    <?php if ($page != 'Auth') : ?>
        <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
        <!-- <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/summernote/summernote-bs4.min.css"> -->
    <?php endif; ?>
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/main-bg-photo.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/main.css">
    
</head>
<?php if ($page != 'Auth') : ?>

    <body class="hold-transition layout-navbar-fixed layout-footer-fixed" style="height: auto;" id="mydiv">
        <div class="wrapper">

            <?php $this->load->view('layouts/script'); ?>
            <?php $this->load->view('layouts/navbar'); ?>
            <?php $this->load->view('layouts/sidebar'); ?>
            <?php $this->load->view($content); ?>
            <?php $this->load->view('layouts/footer'); ?>
        </div>
        <script>
            setTimeout(function() {
                $(".alert_content").html("");
            }, 2000);
        </script>
    </body>
<?php else : ?>
    <?php $this->load->view('layouts/script'); ?>
    <?php $this->load->view($content); ?>
<?php endif; ?>

</html>