<!-- Content Wrapper. Contains page content -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
<div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
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
                        <li class="breadcrumb-item"><a href="<?=base_url('performance_management/dashboard')?>">PERFORMANCE MANAGEMENT</a></li>
                        <li class="breadcrumb-item text-white">MEDICAL CHECKUP</li>
                        <li class="breadcrumb-item text-white">MCU RECORD</li>
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
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup')?>">INPUT DATA PERSONAL MCU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>">PERSONAL MCU RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_perf')?>">MCU PERFORMANCE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/unfit_followup')?>">UNFIT FOLLOWUP</a>
                </li>
            </ul>
            <!--/.TAB-->

            <!--TAB CONTENT-->
            <div class="tab-content">
                <div >
                    <div class="card-body" style="background-color: #77a0e6;" id="tablerecord">
                        <form action="<?=base_url('performance_management/Medical_checkup/search')?>" method="post">

                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterperiod" name="filterperiod" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($mcuperiod as $prd):?>
                                            <option value="<?php echo $prd->mcu_period ?>"><?php echo $prd->mcu_period ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPT :</label>
                                <div class="col-sm-4">
                                        <input type="text" name="keyword_dept" class="form-control"
                                        placeholder="INPUT DEPARTMENT">
                                </div>
                            </div>

                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NIK :</label>
                                <div class="col-sm-4">
                                        <input type="INPUT NIK" name="keyword_nik" class="form-control"
                                        placeholder="Search">
                                </div>

                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS H. STATUS :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterstatus" name="filterstatus" placeholder="TEXT" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="Fit with Note">Fit with Note</option>
                                        <option value="Unfit">Unfit</option>
                                        <option value="Fit for Work">Fit for Work</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-grup row mb-4 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DISEASE :</label>
                                <div class="col-sm-4">
                                <select class="form-control" id="filterdisease" name="filterdisease" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($disease as $dis):?>
                                            <option value="<?php echo $dis['txtNamaDisease'] ?>"><?php echo $dis['txtNamaDisease'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <button class="btn btn-warning col-sm-4 float-right">SEARCH</button>
                                </div>
                            </div>
                        </form>

                        <div class="card" style="background-color: white;">
                            <div class="card-body">
                                <table id="mcudata" class="table table-striped table-bordered table-hover">
                                    <thead class="align-middle">
                                        <tr class="table-primary align-middle" style="text-align: center;">
                                            <th scope="col">NO.</th>
                                            <th scope="col">NAME</th>
                                            <th scope="col">DEPARTEMENT</th>
                                            <th scope="col">AGE</th>
                                            <th scope="col">ADDRESS</th>
                                            <th scope="col">HEALTH STATUS</th>
                                            <th scope="col">IDENTIFIED DISEASE</th>
                                            <!-- <th scope="col">DOCTOR NOTE</th> -->
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach($listmcu as $lm) : ?>
                                        <tr>
                                            <th class="text-center" style="width: 2%;"><?php echo $no++ ?></th>
                                            <th class="text-center"><?php echo $lm->txtNameEmployee ?></th>
                                            <td class="text-center"><?php echo $lm->txtNamaDepartement ?></td>  
                                            <td class="text-center"><?php echo $lm->age ?></td> 
                                            <td class="text-center"><?php echo $lm->txtAlamat1 ?> <?php echo $lm->txtAlamat2 ?></td> 
                                            <td class="text-center"><?php echo $lm->health_status ?></td>
                                            <td class="text-center">
                                            <?php 
                                                
                                                $data_array = explode(",",$lm->identified_disease);
                                                foreach ($data_array as $i=>$value){
                                                    
                                                    if($i > 0){
                                                        echo ", ";
                                                    }
                                                    echo $penyakit[$value];
                                                }

                                            ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                <a class="btn btn-xs btn-danger btnDelete mx-1" data-id="<?= $lm->id?>"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-xs btn-warning btnEdit mx-1" href="<?= base_url('performance_management/medical_checkup/edit/'.$lm->id)?>"><i class="fas fa-pen"></i></a>
                                                <a href="<?= base_url('upload_file/mcuReport/').$lm->mcu_report ?>" target="_blank()" class="btn btn-xs btn-success mx-1"><i class="fa fa-download"></i></a>
                                                </div>
                                            </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button class="btn btn-danger mr-2 col-2" onclick="pdf()">DOWNLOAD TO PDF</button>

                    </div>
                <!--PERSONAL MCU RECORD-->
                
                </div>
                <!--/.PERSONAL MCU RECORD-->
            </div>
        </div>
    </section>
</div>

<!-- Page specific script -->
<script src="<?= base_url('assets/templates') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/pdfmake/vfs_fonts.js"></script>

<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/jszip/jszip.min.js"></script>

<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $('#mcudata').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["pdf", "print"]
    }).buttons().container().appendTo('#mcudata_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
$('.js-example-basic-single').select2({
    theme: 'bootstrap4'
})
    });
</script>

<script>
// event klik delete
$('body').on('click', '.btnDelete', function () {
    var id = $(this).data('id');
    var name = $(this).data('name');
    Swal.fire({
        title: 'Are you sure?',
        text: `The Type ${name}, will delete!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>performance_management/medical_checkup/destroy",
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    if (response.code == 200) {
                        var icon = 'success';
                        var title = 'Deleted';
                        var text = response.msg;
                    } else if (response.code == 400) {
                        var icon = 'error';
                        var title = 'Error';
                        var text = response.msg;
                    }
                    Swal.fire({
                        icon: icon,
                        title: title,
                        text: text
                    }).then(function (isConfirm) {
                        location.reload();
                    })
                }
            })
        }
    })
})
</script>
