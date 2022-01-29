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
    <?php $this->load->view('layouts/script'); ?>
</head>
<?php if ($page != 'Auth') : ?>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <?php $this->load->view('layouts/header'); ?>
            <?php $this->load->view('layouts/sidebar'); ?>
            <?php $this->load->view($content); ?>
            <?php $this->load->view('layouts/footer'); ?>
        </div>
    </body>
<?php else : ?>
    <?php $this->load->view($content); ?>
<?php endif; ?>

</html>