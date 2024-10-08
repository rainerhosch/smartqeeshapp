<style type="text/css">
    .select2 {
    width:100%!important;
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
                        <li class="breadcrumb-item text-white">MEDICAL CHECKUP</li>
                        <li class="breadcrumb-item text-white">INPUT DATA MCU</li>
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
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup')?>">INPUT DATA PERSONAL MCU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>">PERSONAL MCU RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn " id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_perf')?>">MCU PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->
            <!--TAB CONTENT-->
            <div class="tab-content" id="custom-content-above-tabContent">

                <!--INPUT DATA PERSONAL MCU-->
                <div class="tab-pane fade show active" id="input-data-personal-mcu" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <!-- form -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'performance_management/medical_checkup/input_data'; ?>" enctype="multipart/form-data">
                        <!--card body-->
                        <div class="card-body" style="background-color: #77a0e6;">
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">EMPLOYEE NUMBER :</i> </label>
                                <div class="col-sm-2">
                                    <select class="form-control js-example-basic-single" id="nik" name="nik" placeholder="" onchange="myFunction()" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($employee as $em):?>
                                        <option value="<?php echo $em['intIdEmployee'] ?>"><?php echo $em['txtNikEmployee'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">NAME :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="name" name="employee_name" placeholder="" readonly>
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DEPARTEMENT :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="department" name="department" placeholder="" readonly>
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">AGE :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="age" name="age" placeholder="" readonly>
                                    <input type="hidden" id="datenow" value="<?php echo date('Y-m-d')?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">ADDRESS :</i> </label>
                                <div class="col-sm-2">
                                    <textarea rows="3" class="form-control" id="address" name="address" placeholder="" readonly></textarea>
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">SERVICE PERIOD :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="serviceperiod" name="service_period" placeholder="" readonly>
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DATE OF MCU :</label>
                                <div class="col-sm-2">
                                    <input type="date" name="mcu_date" class="form-control" id="datemcu"    onchange="yearperiod()" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MCU PERIOD :</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="mcuperiod" name="mcu_period" placeholder="Select Date of Mcu first" readonly required>
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MCU TYPE :</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="mcutype" name="mcu_type" placeholder="TEXT" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($type as $type):?>
                                        <option value="<?php echo $type['idMcuType'] ?>"><?php echo $type['type'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">HOSPITAL :</label>
                                <div class="col-sm-2">
                                    <select class="form-control js-example-basic-single" id="hospital" name="hospital" required>
                                    <option value="" selected disabled>Select</option>
                                    <?php foreach($hospital as $hpt):?>
                                        <option value="<?php echo $hpt['IdHospital'] ?>"><?php echo $hpt['HospitalName'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">HEALTH STATUS :</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="healthstatus" name="health_status" placeholder="TEXT" required>
                                    <option value="" selected disabled>Select</option>
                                        <option value="Fit with Note">Fit with Note</option>
                                        <option value="Unfit">Unfit</option>
                                        <option value="Fit for Work">Fit for Work</option>
                                    </select>
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">HEIGHT :</label>
                                <div class="col-sm-1">
                                    <input type="number" class="form-control" id="height" name="height"  value="" onkeyup="validateInput(this)" required>
                                </div>
                                <div class="col-sm-1 my-auto">cm</div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">IDENTIFIED DISEASE :</label>
                                <div class="col-sm-2">
                                    <select class="form-control js-example-basic-single" id="identified_disease" multiple="multiple" name="identified_disease[]" data-placeholder="Select Disease" required>
                                        <?php foreach($disease as $dis):?>
                                        <option value="<?php echo $dis['intidDisease'] ?>"><?php echo $dis['txtNamaDisease'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-sm-1">
                                    <a class="btn btn-md btn-warning btnAdd" title="Add Disease" data-toggle="modal"><i class="fa fa-plus"></i></a> 
                                </div> 

                                <label for="input" class="col-sm-1 col-form-label" style="text-align:right">WEIGHT :</label>
                                <div class="col-sm-1">
                                    <input type="number" class="form-control" id="weight" name="weight"  value="" onkeyup="validateInput(this)" required>
                                </div>
                                <div class="col-sm-2 my-auto">kg</div>

                                <label for="input" class="col-sm-1 col-form-label" style="text-align:right">BMI :</label>
                                <div class="col-sm-1">
                                    <input type="number" class="form-control" id="bmi" name="bmi"  required readonly>
                                </div>
                                <div class="col-sm-1 my-auto">kg/m<sup>2</sup></div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">CHOLESTEROL :</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="cholesterol" name="cholesterol" required>
                                </div>
                                <div class="col-sm-1 my-auto">mg/dL</div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">GOUT:</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="gout" name="gout"  required>
                                </div>
                                <div class="col-sm-1 my-auto">mg/dL</div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">BLOOD SUGAR :</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="bloodsugar" name="bloodsugar"  required>
                                </div>
                                <div class="col-sm-1 my-auto">mg/dL</div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">BLOOD PRESSURE :</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="bloodpressure" name="bloodpressure"  required>
                                </div>
                                <div class="col-sm-1 my-auto">mmHg</div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">TREATMENT:</label>
                                <div class="col-sm-2">
                                    <textarea rows="3" class="form-control" id="treatment" name="treatment" placeholder="Input Treatment Recomendation" required></textarea>
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">UPLOAD MCU REPORT :</label>
                                <div class="custom-file col-sm-2">
                                    <input type="hidden" name="uniqId" value="<?= rand() ?>">
                                    <input type="file" class="custom-file-input" id="customFile" name="uploadReport" accept="application/pdf">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            
                            <!--Button-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right" style="margin-left: 20px;">Submit</button>
                                <button type="reset" class="btn btn-warning float-right">Reset</button>
                            </div>
                            <!--/.Button-->
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <!--/.form-->
                </div>
                <!--/.INPUT DATA PERSONAL MCU-->

                <!--UNFIT FOLLOWUP-->
                <div class="tab-pane fade" id="unfit-followup" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <!-- form -->
                    <form class="form-horizontal" method="post">
                        <!--card body-->

                        <!-- /.card-body -->
                    </form>
                    <!--/.form-->
                </div>
                <!--/.UNFIT FOLLOWUP-->

            </div>
            <!--/.TAB CONTENT-->
        </div>

    </section>
    <!-- /.content -->

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalAddMenuTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="myForm">
					<input type="number" name="intidDisease" id="intidDisease" hidden>
					<div class="form-group row">
						<label for="txtNamaDisease" class="col-sm-3 col-form-label">Nama Penyakit</label>
						<div class="col-sm-9">
							<?= form_error('txtNamaDisease', '<small class="text-danger pl-3">', '</small>');?>
							<input type="text" class="form-control" id="txtNamaDisease" name="txtNamaDisease"
								placeholder="Nama Penyakit" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtMedicalTerm" class="col-sm-3 col-form-label">Istilah Medis</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="txtMedicalTerm" name="txtMedicalTerm"
								placeholder="Istilah Medis">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10"></div>
						<div class="col-sm-2 float-right">
							<button type="submit" class="btn btn-sm btn-primary btnSave">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- /.content-wrapper -->

<!-- script -->

<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
$('.js-example-basic-single').select2({
    theme: 'bootstrap4'
})
    });
</script>

<script type="text/javascript">

    var base = '<?php echo base_url('performance_management/Medical_checkup/getIdEmployee') ?>';

    function myFunction() {
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

<script type="text/javascript">
    function yearperiod(){
        var getyear = document.getElementById('datemcu').value;
        const datearray = getyear.split("-");

        document.getElementById("mcuperiod").value = datearray[0];
    }

</script>

<script>
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "<?= base_url() ?>manajemen/disease/get_json",
        dataType: "json",
        success: function (response) {
            
            // event Klik tombol add
            $('.btnAdd').on('click', function () {
                $('.modal-title').text('Tambah Penyakit');
                $('#intidDisease').val('');
                $('#txtNamaDisease').val('');
                $('#txtMedicalTerm').val('');
                $('#myModal').modal('show');
            })

            // event submit
            $('#myForm').on('submit', function (e) {
                e.preventDefault();
                var id = $('#intidDisease').val();
                var form = $('#myForm');
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>manajemen/disease/store",
                    data: form.serializeArray(),
                    dataType: "json",
                    success: function (response) {
                        if (response.code == 200) {
                            var icon = 'success';
                            var title = 'Success';
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

            })
        }
    });
});

</script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
    // var height = $('#height').val();
    // var weight = $('#weight').val();
    // var regex = /^\d+$/;
    // if (!regex.test(height)) {
    //     alert("Input harus berupa angka positif");
    //     return false;
    // }
    // if (!isNaN(height) || !isNaN(height)) {
    //     return false;
    // }else{

    // }
    function validateInput(inputAngka) {
        var input = inputAngka.value;
        var idinput = inputAngka.getAttribute( 'id' );
        
        if(input == "" || input == null){
            input = 0;
        }

        if(idinput == "weight"){
            var input2 = $('#height').val();
            input2 = Number(input2) / 100;
            if(input2 == "" || input2 == null){
                input2 = 0;
            }
            var bmi = Number(input) / (input2 * input2);
        }else{
            input = Number(input) / 100;
            var input2 = $('#weight').val();
            if(input2 == "" || input2 == null){
                input2 = 0;
            }
            
            var bmi = Number(input2) / (input * input);
        }
        $('#bmi').val(bmi.toFixed(2));
    }
</script>