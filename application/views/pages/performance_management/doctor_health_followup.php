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
.truncate {
    max-width:150px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    }
</style>
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
                        <li class="breadcrumb-item"><a href="<?=base_url('performance_management/dashboard')?>">PERFORMANCE MANAGEMENT</a></li>
                        <li class="breadcrumb-item text-white">DOCTOR HEALTH FOLLOWUP</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="card">
            <!--TAB-->
            <ul class="nav nav-tabs bg-secondary" id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Doctor_health_followup')?>">LIST OF EMPLOYEES UNDER CONTROL BY DOCTOR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Doctor_health_followup/followup_perf')?>">DOCTOR CONTROL PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->
            <!--TAB CONTENT-->
            <div class="tab-content">

                <!--LIST OF EMPLOYEES UNDER CONTROL BY DOCTOR-->
                <div>
                    <div class="card-body" style="background-color: #77a0e6;">
                        <form action="<?=base_url('performance_management/Doctor_health_followup')?>" method="post">
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

                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DISEASE :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterdisease" name="filterdisease">
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($disease as $dis):?>
                                            <option value="<?php echo $dis['intidDisease'] ?>"><?php echo $dis['txtNamaDisease'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4 col-12">
                                <div class="col-6">
                                </div>

                                <div class="col-6">
                                    <button class="btn btn-warning col-sm-4 float-right" name="searchVal" value="1">SEARCH</button>
                                    <button type="reset" class="btn btn-secondary col-sm-3 float-right mr-2" name="resetVal" value="reset">CLEAR</button>
                                </div>
                            </div>
                            <?php if($search != NULL):?>
                                <?php 
                                $GET_FIND = getNumberToName($employee, $disease, $deptlist, $search[1], $search[2], $search[3]);
                                if(empty($search[0])){
                                    $period = '-';
                                }else{
                                    $period = $search[0];
                                }
                                ?>
                                <div class="form-grup row mb-2 col-12">
                                    <div class="col-9">
                                        <div class="card ml-3" style="background-color: white;">
                                            <h6 class="m-2"><b>Filtered by: &nbsp; MCU Period: <span class="text-success"><?=$period?></span> &nbsp;NIK: <span class="text-success"><?= $GET_FIND[0]?></span> &nbsp;Dept: <span class="text-success"><?= $GET_FIND[2]?></span> &nbsp;Disease: <span class="text-success"><?= $GET_FIND[1]?></span> &nbsp;</b></h6>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <a href="<?=base_url('performance_management/Doctor_health_followup')?>" class="btn btn-danger float-right">Reset to Default</a>
                                    </div>
                                </div>
                            <?php endif;?>
                        </form>


                        <div class="card" style="background-color: white;">
                            <div class="card-body">
                                <table id="follupdata" class="table table-striped table-bordered table-hover">
                                    <thead class="align-middle">
                                        <tr class="table-primary align-middle" style="text-align: center;">
                                            <th scope="col">NO.</th>
                                            <th scope="col">NAME</th>
                                            <th scope="col">DEPARTEMENT</th>
                                            <th scope="col">AGE</th>
                                            <th scope="col">ADDRESS</th>
                                            <th scope="col">HEALTH STATUS</th>
                                            <th scope="col">IDENTIFIED DISEASE</th>
                                            <th scope="col">DOCTOR NOTE</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php $no = 1; foreach($unfit_followup as $lm) : ?>
                                        <?php if($struk == NULL):?>
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

                                                    ?>
                                                </td>
                                                <td class="text-center"><?php echo $lm->doctor_note ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                    <a class="btn btn-xs btn-danger btnDelete mx-1" data-id="<?= $lm->id?>"><i class="fas fa-trash-alt"></i></a>
                                                    <a class="btn btn-xs btn-warning btnEdit mx-1" title="Update" data-toggle="modal" data-target="#modaledit<?php echo $lm->id ?>"><i class="fas fa-pen"></i></a>
                                                    <a href="<?= base_url('upload_file/mcuReport/').$lm->mcu_report ?>" target="_blank()" class="btn btn-xs btn-success mx-1"><i class="fa fa-download"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php else:?>
                                            <?php $data_array = explode(",",$lm->identified_disease);?>
                                            <?php $x = in_array($struk['intidDisease'], $data_array);?>
                                            <?php if($x):?>
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
                                                    <td class="text-center"><?php echo $lm->doctor_note ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                        <a class="btn btn-xs btn-danger btnDelete mx-1" data-id="<?= $lm->id?>"><i class="fas fa-trash-alt"></i></a>
                                                        <a class="btn btn-xs btn-warning btnEdit mx-1" title="Update" data-toggle="modal" data-target="#modaledit<?php echo $lm->id ?>"><i class="fas fa-pen"></i></a>
                                                        <a href="<?= base_url('upload_file/mcuReport/').$lm->mcu_report ?>" target="_blank()" class="btn btn-xs btn-success mx-1"><i class="fa fa-download"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button> -->

                    </div>
                </div>
                <!--/.CLINIC VISIT PERFORMANCE-->

                <!-- DOCTOR CONTROL PERFORMANCE-->
                <div class="tab-pane fade" id="doctor-control-performance" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <!-- form -->
                    <form class="form-horizontal" method="post">
                        <!--card body-->

                        <!-- /.card-body -->
                    </form>
                    <!--/.form-->
                </div>
                <!--/.DOCTOR CONTROL PERFORMANCE-->

            </div>
            <!--/.TAB CONTENT-->
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<?php $no = 1; foreach($unfit_followup as $lm) : $no++;?>
<div class="modal fade" id="modaledit<?php echo $lm->id ?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Action for Unfit Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <br>
                <table>
                    <thead class="align-middle">
                        <tr class="table-primary table-bordered align-middle" style="text-align: center;">
                            <th scope="col" style="width: 15%">NAME</th>
                            <th scope="col" style="width: 20%">DEPARTEMENT</th>
                            <th scope="col">AGE</th>
                            <th scope="col" style="width: 30%">ADDRESS</th>
                            <th scope="col">HEALTH STATUS</th>
                            <th scope="col">IDENTIFIED DISEASE</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <tr>
                            <th class="text-center"><?php echo $lm->txtNameEmployee ?></th>
                            <td class="text-center"><?php echo $lm->txtNamaDepartement ?></td>  
                            <td class="text-center"><?php echo $lm->age ?></td> 
                            <td class="text-center"><?php echo $lm->txtAlamat1 ?> <?php echo $lm->txtAlamat2 ?></td> 
                            <td class="text-center"><?php echo $lm->health_status ?></td>
                            <td class="text-center"><?php echo $lm->txtNamaDisease ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>    
                <h5><b>DOCTOR NOTE:</b></h5>
                <form class="form-horizontal" method="post" action="<?php echo base_url().'performance_management/doctor_health_followup/action_followup'; ?>">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $lm->id ?>">
                    <textarea class="col-12 form-control" type="text" name="doctor_note" id="doctor_note" placeholder="Add Action/Treatment to do.."><?= $lm->doctor_note ?></textarea>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="savenote" class="btn btn-primary" onclick="funcClick()">Save changes</button>
                    </div>
                </form> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- /.modal -->

<!-- Page specific script -->
<!-- <script src="https://cdn.datatables.net/plug-ins/1.12.1/dataRender/ellipsis.js"></script>
<script>
    $('#follupdata').DataTable( {
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    columnDefs: [ {
    targets: [1,4],
    render: $.fn.dataTable.render.ellipsis( 10 )
    } ]
} );
</script> -->
<!-- <script>
$(document).ready( function () {
  var table = $('#follupdata').DataTable({
        paging: true,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true
        // columnDefs:[{targets:[1,4],className:"truncate"}],
        // createdRow: function(row){
        // var td = $(row).find(".truncate");
        // td.attr("title", td.html());
        // }
    });
});
</script> -->

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
$(document).ready( function () {
  var table = $('#follupdata').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "buttons": [{extend: 'pdf', text: 'Download to PDF', className:'btn-danger', title:'Doctor Health Followup'},{extend: 'print', text: 'Print', className:'btn-secondary'}]
}).buttons().container().appendTo('#follupdata_wrapper .col-md-6:eq(0)');
});
</script>

<script>
    function funcClick(){
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data has been updated',
        showConfirmButton: false,
        timer: 1500
    })
}
</script>
<!-- <script type="text/javascript">
    function getdata()
</script> -->