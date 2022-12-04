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
                        <li class="breadcrumb-item text-white"><a href="<?= base_url('performance_management/internal_clinic/visit_record') ?>">CLINIC VISIT RECORD</a></li>
                        <li class="breadcrumb-item text-white">EDIT DATA</li>
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
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Internal_clinic')?>">EMPLOYEE VISIT CLINIC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Internal_clinic/visit_record')?>">CLINIC VISIT RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn " id="custom-content-above-home-tab" href="<?=base_url('performance_management/Internal_clinic/visit_perf')?>">CLINIC VISIT PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->
            <!--TAB CONTENT-->
            <div class="tab-content" id="custom-content-above-tabContent">

                <!-- EMPLOYEE VISIT CLINIC-->
                <div class="tab-pane fade show active" id="employee-visit-clinic" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <!-- form -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'performance_management/internal_clinic/update_data'; ?>" enctype="multipart/form-data">
                    <!--card body-->
                    <div class="card-body" style="background-color: #77a0e6;">

                        <div class="form-group row">
                            <label for="input" class="col-sm-2 col-form-label" style="text-align:right">EMPLOYEE NUMBER :</i> </label>
                            <input type="hidden" name="internalclinic_id" class="form-control" value="<?php echo $clinicedit->internalclinic_id ?>">
                            <div class="col-sm-2">
                                <select class="form-control js-example-basic-single" id="nik" name="nik" placeholder="TEXT" onchange="myFunction()" required>
                                    <?php foreach ($employee as $em) : ?>
                                        <?php if($em['intIdEmployee'] == $clinicedit->intIdEmployee):?>
                                        <option value="<?php echo $em['intIdEmployee'] ?>" selected>
                                            <?php echo $em['txtNikEmployee'] ?>
                                        </option>
                                        <?php else:?>
                                                <option value="<?php echo $em['intIdEmployee'] ?>"><?php echo $em['txtNikEmployee'] ?></option>
                                            <?php endif;?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <input type="hidden" class="form-control" id="employee_number" name="employee_number" placeholder="" readonly> -->
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="text-align:right">NAME :</i> </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="name" name="employee_name" placeholder="" readonly>
                            </div>

                            <label class="col-sm-2 col-form-label" style="text-align:right">DEPARTEMENT :</i> </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="department" name="department" placeholder="" readonly>
                            </div>

                            <label for="input" class="col-sm-2 col-form-label" style="text-align:right">AGE :</i> </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="age" name="age" placeholder="" readonly>
                                <input type="hidden" id="datenow" value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="text-align:right">ADDRESS :</i> </label>
                            <div class="col-sm-2">
                                <textarea rows="3" class="form-control" id="address" name="address" placeholder="" readonly></textarea>
                            </div>

                            <label class="col-sm-2 col-form-label" style="text-align:right">SERVICE PERIOD :</i> </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="serviceperiod" name="service_period" placeholder="" readonly>
                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="text-align:right">DATE :</i> </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="date" placeholder="TEXT" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="text-align:right">PARAMEDIC NAME :</i> </label>
                            <div class="col-sm-2">
                                <select class="form-control" id="paramedic_name" name="paramedic_name" required>
                                    <option value="" selected disabled>SELECT</option>
                                    <?php foreach($paramedic as $pmd):?>
                                        <option value="<?php echo $pmd['idparamedic'] ?>"><?php echo $pmd['paramedic_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="text-align:right">COMPLAINT :</i> </label>
                            <div class="col-sm-2">
                                <select class="form-control js-example-basic-single" id="complaint" multiple="multiple" name="complaint" data-placeholder="Select Disease" required>
                                    <?php foreach($disease as $dis):?>
                                    <option value="<?php echo $dis['intidDisease'] ?>"><?php echo $dis['txtNamaDisease'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="text-align:right">ACTION :</i> </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="action" name="action" placeholder="Treatment to do" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="text-align:right">MEDICINE :</i> </label>
                            <div class="col-sm-2">
                                <select class="form-control js-example-basic-single" id="medicine" multiple="multiple" name="medicine" data-placeholder="Select Medicine" required>
                                    <?php foreach($medicine as $med):?>
                                    <option value="<?php echo $med['idObat'] ?>"><?php echo $med['namaObat'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right" style="margin-left: 20px;">Submit</button>
                            <button type="reset" class="btn btn-warning float-right">Reset</button>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    </form>
                    <!--/.form-->
                </div>
                <!--/.EMPLOYEE VISIT CLINIC-->

            </div>
            <!--/.TAB CONTENT-->
        </div>
    </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page Specific Script -->
<script>
    window.onload = (event) =>{
    y = nik.value;
    z = y.length;
    
    
        $.ajax({

            url: base,
            type: 'POST',
            dataType:'json',
            data: {kode: y},
            success: function(data) {
                if(data == ''){
                    nik.value = '';
                }else{
                    document.getElementById('name').value = data.txtNameEmployee;
                    document.getElementById('address').value = data.txtAlamat1+data.txtAlamat2;
                    document.getElementById('department').value = data.txtNamaDepartement;
                    var date = data.dtmTanggalLahir;
                    var age = document.getElementById('datenow').value;
                    var yearDb = date.substring(0,4);
                    var yearNow = age.substring(0,4);
                    var monthDb = date.substring(5,7);
                    var monthNow = age.substring(5,7);
                    var dayDb = date.substring(8,10);
                    var dayNow = age.substring(8,10);
                    if(monthNow >= monthDb){
                        if(dayNow >= dayDb){
                            var agenow = yearNow - yearDb;
                        }else{
                            var agenow = yearNow - yearDb - 1;
                        }
                    }else{
                        var agenow = yearNow - yearDb - 1;
                    }
                    document.getElementById('age').value = agenow;
                }
            }

        });
};
</script>
<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.js-example-basic-single').select2({
            theme: 'bootstrap4'
        })
    });
</script>

<script type="text/javascript">
    function myFunction() {
        var base = '<?= base_url('performance_management/Internal_clinic/getIdEmployee') ?>';

        y = nik.value;
        z = y.length;


        $.ajax({

            url: base,
            type: 'POST',
            dataType: 'json',
            data: {
                kode: y
            },
            success: function(data) {
                if (data == '') {
                    nik.value = '';
                } else {
                    document.getElementById('name').value = data.txtNameEmployee;
                    document.getElementById('address').value = data.txtAlamat1+data.txtAlamat2;
                    document.getElementById('department').value = data.txtNamaDepartement;
                    var date = data.dtmTanggalLahir;
                    var age = document.getElementById('datenow').value;
                    var yearDb = date.substring(0, 4);
                    var yearNow = age.substring(0, 4);
                    var monthDb = date.substring(5, 7);
                    var monthNow = age.substring(5, 7);
                    var dayDb = date.substring(8, 10);
                    var dayNow = age.substring(8, 10);
                    if (monthNow >= monthDb) {
                        if (dayNow >= dayDb) {
                            var agenow = yearNow - yearDb;
                        } else {
                            var agenow = yearNow - yearDb - 1;
                        }
                    } else {
                        var agenow = yearNow - yearDb - 1;
                    }
                    document.getElementById('age').value = agenow;
                    var servicedate = data.dtmTanggalMasuk;
                    var service = document.getElementById('datenow').value;
                    var yearDb = servicedate.substring(0,4);
                    var yearNow = service.substring(0,4);
                    var monthDb = servicedate.substring(5,7);
                    var monthNow = service.substring(5,7);
                    var dayDb = servicedate.substring(8,10);
                    var dayNow = service.substring(8,10);
                    if(monthNow >= monthDb){
                        if(dayNow >= dayDb){
                            var servicenow = yearNow - yearDb;
                        }else{
                            var servicenow = yearNow - yearDb - 1;
                        }
                    }else{
                        var servicenow = yearNow - yearDb - 1;
                    }
                    document.getElementById('serviceperiod').value = servicenow+" Tahun";
                }
            }

        });

    }
</script>