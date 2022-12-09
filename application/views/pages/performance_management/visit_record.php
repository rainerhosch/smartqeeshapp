<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 bg-warning py-2">
                    <h1 style="color: white;">PERFORMANCE MANAGEMENT</h1>
                </div>
                <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                    <ol class="breadcrumb  float-sm-left">
                        <li class="breadcrumb-item"><a href="<?= base_url('performance_management/dashboard') ?>">PERFORMANCE MANAGEMENT</a></li>
                        <li class="breadcrumb-item text-white">INTERNAL CLINIC</li>
                        <li class="breadcrumb-item text-white">CLINIC VISIT RECORD</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="card">
            <!--TAB-->
            <ul class="nav nav-tabs bg-secondary " id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Internal_clinic')?>">EMPLOYEE VISIT CLINIC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Internal_clinic/visit_record')?>">CLINIC VISIT RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn " id="custom-content-above-home-tab" href="<?=base_url('performance_management/Internal_clinic/visit_perf')?>">CLINIC VISIT PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->
            <!--TAB CONTENT-->
            <div class="tab-content">
                
                <!--CLINIC VISIT RECORD-->
                <div>
                    <div class="card-body" style="background-color: #77a0e6;">
                        <form action="<?=base_url('performance_management/Medical_checkup/search')?>" method="post">

                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DATE :</label>
                                <div class="col-sm-4">
                                    <input class="form-control
                                    " type="date" id="filterdate" name="filterdate">
                                </div>
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPT :</label>
                                <div class="col-sm-4">
                                    <select class="form-control js-example-basic-single" id="dept" name="dept" placeholder="">
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($deptlist as $dept):?>
                                        <option value="<?php echo $dept['intIdDepartement'] ?>"><?php echo $dept['txtNamaDepartement'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NIK :</label>
                                <div class="col-sm-4">
                                        <input type="INPUT NIK" name="keyword_nik" class="form-control"
                                        placeholder="Search">
                                </div>

                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS COMPLAINT :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterdisease" name="filterdisease">
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($disease as $dis):?>
                                            <option value="<?php echo $dis['intidDisease'] ?>"><?php echo $dis['txtNamaDisease'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-grup row mb-4 col-12">
                                <div class="col-6">
                                    
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-warning col-sm-4 float-right">SEARCH</button>
                                </div>
                            </div>
                        </form>

                        <div class="card" style="background-color: white;">
                            <div class="card-body">
                                <table id="visitdata" class="table table-striped table-bordered table-hover">
                                    <thead class="align-middle">
                                        <tr class="table-primary align-middle" style="text-align: center;">
                                            <th scope="col">NO.</th>
                                            <th scope="col">NAME</th>
                                            <th scope="col">DEPARTEMENT</th>
                                            <th scope="col">AGE</th>
                                            <th scope="col">ADDRESS</th>
                                            <th scope="col">COMPLAINT</th>
                                            <th scope="col">TREATMENT</th>
                                            <th scope="col">MEDICINE</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($listintclinic as $licl) :
                                        ?>
                                            <tr>
                                                <th class="text-center" style="width: 2%;"><?= $no++ ?></th>
                                                <th class="text-center"><?= $licl->txtNameEmployee ?></th>
                                                <td class="text-center"><?= $licl->txtNamaDepartement ?></td>
                                                <td class="text-center"><?= $licl->age ?></td>
                                                <td class="text-center"><?= $licl->txtAlamat1 ?> <?= $licl->txtAlamat2 ?></td>
                                                <td class="text-center"><?= $licl->txtNamaDisease ?></td>
                                                <td class="text-center"><?= $licl->action ?></td>
                                                <td class="text-center"><?= $licl->namaObat ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                    <a class="btn btn-xs btn-danger btnDelete mx-1" data-id="<?= $licl->internalclinic_id?>"><i class="fas fa-trash-alt"></i></a>
                                                    <a class="btn btn-xs btn-warning btnEdit mx-1" href="<?= base_url('performance_management/internal_clinic/edit/'.$licl->internalclinic_id)?>"><i class="fas fa-pen"></i></a>
                                                    <a href="#" target="_blank()" class="btn btn-xs btn-success mx-1"><i class="fa fa-download"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button>

                    </div>
                </div>
                <!--/.CLINIC VISIT RECORD-->

            </div>
            <!--/.TAB CONTENT-->
        </div>
    </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page specific script -->
<script>
$(function () {
$('#visitdata').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true
});
});
</script>