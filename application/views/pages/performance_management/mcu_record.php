<?php

function getNumberToName($employee, $disease, $deptlist, $employ, $dises, $depart){
    $DimNik  = '-';
    $DimDises = '-';
    $DimDept  = '-';
    
    foreach($disease as $row){
        if($row['intidDisease'] == $dises){
            $DimDises = $row["txtNamaDisease"];
        }
    }
    foreach($deptlist as $row){
        if($row['intIdDepartement'] == $depart){
            $DimDept = $row["txtNamaDepartement"];
        }
    }
    foreach($employee as $row){
        if($row['intIdEmployee'] == $employ){
            $DimNik = $row["txtNikEmployee"];
        }
    }
    

    return [$DimNik, $DimDises, $DimDept];
}
?>
<style type="text/css">
    .select2 {
    width:100%!important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
<div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
<div class="content-wrapper" style="z-index: -999 !important;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div> -->
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
                <?php if ($this->session->flashdata('flash')) : ?>
                <div class="col-sm-12 py-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil <?= $this->session->flashdata('flash');?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <!--TAB-->
            <ul class="nav nav-tabs bg-secondary " id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup')?>">INPUT DATA PERSONAL MCU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>">PERSONAL MCU RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_perf')?>">MCU PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->

            <!--TAB CONTENT-->
            <div class="tab-content">
                <div>
                    <div class="card-body" style="background-color: #77a0e6;" id="tablerecord">
                        <form action="<?=base_url('performance_management/Medical_checkup/mcu_record')?>" method="post">

                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterperiod" name="filterperiod" >
                                        <option value="" selected disabled>Select</option>
                                        <?php

                                        use function PHPSTORM_META\type;

                                        foreach($mcuperiod as $prd):?>
                                            <option value="<?php echo $prd->mcu_period ?>"><?php echo $prd->mcu_period ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
                                    <select class="form-control js-example-basic-single" id="nik" name="nik" placeholder="INPUT NIK">
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($employee as $em):?>
                                        <option value="<?php echo $em['intIdEmployee'] ?>"><?php echo $em['txtNikEmployee'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS H. STATUS :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterstatus" name="filterstatus" placeholder="TEXT">
                                        <option value="" selected disabled>Select</option>
                                        <option value="Fit with Note">Fit with Note</option>
                                        <option value="Unfit">Unfit</option>
                                        <option value="Fit for Work">Fit for Work</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DISEASE :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterdisease" name="filterdisease">
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($disease as $dis):?>
                                            <option value="<?php echo $dis['intidDisease'] ?>"><?php echo $dis['txtNamaDisease'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <button class="btn btn-warning col-sm-4 float-right" name="searchVal" value="1">SEARCH</button>
                                    <button type="reset" class="btn btn-secondary col-sm-3 float-right mr-2" name="resetVal" value="reset">CLEAR</button>
                                </div>
                            </div>
                            <?php if($search != NULL):?>
                                <?php 
                                $GET_FIND = getNumberToName($employee, $disease, $deptlist, $search[2], $search[3], $search[4]);
                                if(empty($search[0])){
                                    $period = '-';
                                }else{
                                    $period = $search[0];
                                }
                                if(empty($search[1])){
                                    $status = '-';
                                }else{
                                    $status = $search[1];
                                }
                                ?>
                                <div class="form-grup row mb-2 col-12">
                                    <div class="col-9">
                                        <div class="card ml-3" style="background-color: white;">
                                            <h6 class="m-2"><b>Filtered by: &nbsp; MCU Period: <span class="text-success"><?=$period?></span> &nbsp;NIK: <span class="text-success"><?= $GET_FIND[0]?></span> &nbsp;Dept: <span class="text-success"><?= $GET_FIND[2]?></span> &nbsp;Disease: <span class="text-success"><?= $GET_FIND[1]?></span> &nbsp;Status: <span class="text-success"><?=$status?></span></b></h6>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <a href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>" class="btn btn-danger float-right">Reset to Default</a>
                                    </div>
                                </div>
                            <?php endif;?>
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
                                    <tbody class="align-middle">
                                    <?php $alertX = 0;?>
                                    <?php $no = 1; foreach($listmcu as $lm) : ?>
                                        <?php if($struk == NULL):?>
                                            <?php $alertX = 1;?>
                                            <tr>
                                                <th class="text-center align-middle" style="width: 2%;"><?php echo $no++ ?></th>
                                                <th class="text-center align-middle"><?php echo $lm->txtNameEmployee ?></th>
                                                <td class="text-center align-middle"><?php echo $lm->txtNamaDepartement ?></td>  
                                                <td class="text-center align-middle"><?php echo $lm->age ?></td> 
                                                <td class="text-center align-middle"><?php echo $lm->txtAlamat1 ?> <?php echo $lm->txtAlamat2 ?></td> 
                                                <td class="text-center align-middle"><?php echo $lm->health_status ?></td>
                                                <td class="text-center align-middle">
                                                        <?php 
                                                            
                                                            $data_array = explode(",",$lm->identified_disease);
                                                            foreach ($data_array as $i=>$value){
                                                                if($i > 0){
                                                                    echo ", ";
                                                                }
                                                                echo $penyakit[$value];
                                                            }

                                                        ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                    <a class="btn btn-xs btn-danger btnDelete mx-1" data-id="<?= $lm->id?>"><i class="fas fa-trash-alt"></i></a>
                                                    <a class="btn btn-xs btn-warning btnEdit mx-1" href="<?= base_url('performance_management/medical_checkup/edit/'.$lm->id)?>"><i class="fas fa-pen"></i></a>
                                                    <button class="btn dropdown-toggle btn-xs btn-success mx-1" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="fa fa-download"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="<?php echo base_url('performance_management/medical_checkup/detailpdf/').$lm->id?>">Detail Employee</a>
                                                        <a class="dropdown-item" href="<?php echo base_url('upload_file/mcuReport/').$lm->mcu_report?>">MCU Report</a>
                                                        </div>
                                                    <!-- <a href="<?= base_url('upload_file/mcuReport/').$lm->mcu_report ?>" target="_blank()" class="btn btn-xs btn-success mx-1"><i class="fa fa-download"></i></a> -->
                                                    <!-- <a href="<?= base_url('performance_management/medical_checkup/detailpdf/').$lm->id ?>" target="_blank()" class="btn btn-xs btn-success mx-1"><i class="fa fa-download"></i></a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php else:?>
                                            <?php $data_array = explode(",",$lm->identified_disease);?>
                                            <?php $x = in_array($struk['intidDisease'], $data_array);?>
                                            <?php if($x):?>
                                                <?php $alertX = 1;?>
                                                <tr>
                                                    <th class="text-center" style="width: 2%;"><?php echo $no++ ?></th>
                                                    <th class="text-center"><?php echo $lm->txtNameEmployee ?></th>
                                                    <td class="text-center"><?php echo $lm->txtNamaDepartement ?></td>  
                                                    <td class="text-center"><?php echo $lm->age ?></td> 
                                                    <td class="text-center"><?php echo $lm->txtAlamat1 ?> <?php echo $lm->txtAlamat2 ?></td> 
                                                    <td class="text-center"><?php echo $lm->health_status ?></td>
                                                    <td class="text-center">
                                                            <?php 
                                                                
                                                                
                                                                foreach ($data_array as $i=>$value){
                                                                    
                                                                            if($i > 0){
                                                                                echo ", ";
                                                                            }
                                                                            echo $penyakit[$value];
                                                                }

                                                            ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                        <a class="btn btn-xs btn-danger btnDelete mx-1" data-id="<?= $lm->id?>"><i class="fas fa-trash-alt"></i></a>
                                                        <a class="btn btn-xs btn-warning btnEdit mx-1" href="<?= base_url('performance_management/medical_checkup/edit/'.$lm->id)?>"><i class="fas fa-pen"></i></a>
                                                        <a href="<?= base_url('upload_file/mcuReport/').$lm->mcu_report ?>" target="_blank()" class="btn btn-xs btn-success mx-1"><i class="fa fa-download"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- <button class="btn btn-danger mr-2 col-2" onclick="pdf()">DOWNLOAD TO PDF</button> -->

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
    "buttons": [{extend: 'pdf', text: 'Download to PDF', className:'btn-danger'},{extend: 'print', text: 'Print', className:'btn-secondary'}]
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

<script>
    $(document).ready(function(){
        var search = "<?php echo json_encode($alertX)?>";
        if(search < 1){
            Swal.fire({
            icon: 'error',
            title: 'Sorry',
            text: 'Data not found!',
            })
        }
        
    })
</script>
