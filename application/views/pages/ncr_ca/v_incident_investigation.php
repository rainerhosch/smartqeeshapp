<style>
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.42;
        border-radius: 15px;
    }

    .separator {
        display: flex;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
    }

    /* .separator::before, */
    .separator::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #000;
    }

    .separator:not(:empty)::before {
        margin-right: .25em;
    }

    .separator:not(:empty)::after {
        margin-left: .25em;
    }

    .short-div {
        margin-left: 1rem;
        text-align: end;
        height: 25px;
        margin-bottom: 10px;
    }

    select:invalid {
        color: gray;
    }

    option:first {
        color: #999;
    }
</style>

<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/fishbone/style.css">
<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/bootstrap-select/css/bootstrap-select.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 bg-warning py-2">
                    <h1 style="color: white;"><?= $menu_header ?></h1>
                </div>
                <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                    <ol class="breadcrumb  float-sm-left">
                        <li class="breadcrumb-item"><a href="#"><?= $page ?></a></li>
                        <li class="breadcrumb-item text-white"><?= $subpage ?></li>
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
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" data-toggle="pill" href="#activity-list" role="tab" aria-controls="custom-content-above-home" aria-selected="true">INVESTIGATION FORM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary" id="custom-content-above-home-tab" data-toggle="pill" href="#tabel-data-activity" role="tab" aria-controls="custom-content-above-home" aria-selected="true">INCIDENT RECORD</a>
                </li>
            </ul>
            <!--/.TAB-->
            <!--TAB CONTENT-->
            <div class="tab-content" id="custom-content-above-tabContent">

                <!--INPUT DATA PERSONAL MCU-->
                <div class="tab-pane fade show active" id="activity-list" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <!-- form -->
                    <form class="form-horizontal" method="post" id="incidentForm">
                        <!--card body-->
                        <div class="card-body" style="background-color: #a5c0d3;">
                            <div class="row">
                                <label for="inputIncidentDate" class="col-sm-2 col-form-label" style="text-align:right">INCIDENT DATE:</i> </label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control form-control-sm" id="inputIncidentDate" name="inputIncidentDate" placeholder="TEXT">
                                </div>

                                <label for="inputIncidentArea" class="col-sm-2 col-form-label" style="text-align:right">INCIDENT AREA :</i> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="inputIncidentArea" name="inputIncidentArea" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputIncidentTime" class=" col-sm-2 col-form-label" style="text-align:right">INCIDENT TIME :</i> </label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control form-control-sm" id="inputIncidentTime" name="inputIncidentTime" placeholder="TEXT">
                                </div>

                                <label for="inputIncidentPlant" class="col-sm-2 col-form-label" style="text-align:right">INCIDENT PLANT :</i> </label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="inputIncidentPlant" name="inputIncidentPlant" placeholder="TEXT">
                                    </select>
                                    <!-- <input type="text" class="form-control form-control-sm" id="inputIncidentPlant" name="inputIncidentPlant" placeholder="TEXT"> -->
                                </div>
                            </div>
                            <!-- victim information -->
                            <div class="separator">Victim Information</div>
                            <div class="row">
                                <label for="inputEmplodeeNumber" class="col-sm-2 col-form-label" style="text-align:right">EMPLOYEE NUMBER :</i> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="inputEmplodeeNumber" name="inputEmplodeeNumber" placeholder="TEXT">
                                </div>
                                <label for="inputVictimDepartment" class="col-sm-2 col-form-label" style="text-align:right">DEPARTEMENT :</i> </label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="inputVictimDepartment" name="inputVictimDepartment" placeholder="TEXT">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputVictimServicePeriod" class="col-sm-2 col-form-label" style="text-align:right">SERVICE PERIOD :</i> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="inputVictimServicePeriod" name="inputVictimServicePeriod" placeholder="TEXT">
                                </div>
                                <label for="inputVictimName" class="col-sm-2 col-form-label" style="text-align:right">NAME :</i> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="inputVictimName" name="inputVictimName" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputVictimLevel" class="col-sm-2 col-form-label" style="text-align:right">LEVEL :</i> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="inputVictimLevel" name="inputVictimLevel" placeholder="TEXT">
                                </div>
                                <label for="inputVictimAge" class="col-sm-2 col-form-label" style="text-align:right">AGE :</i> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="inputVictimAge" name="inputVictimAge" placeholder="TEXT">
                                </div>
                            </div>

                            <!-- Incident Information -->
                            <div class="separator">Incident Information</div>
                            <div class="row">
                                <label for="inputIncidentDesc" class="col-sm-2 col-form-label" style="text-align:right">INCIDENT DESC :</label>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><textarea class="form-control" id="inputIncidentDesc" rows="7" name="inputIncidentDesc"></textarea></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div"><label for="inputInjuriedBodyPart" class="col-form-label" style="text-align:right">INJURED BODY PART :</label></div>
                                    <div class="short-div"><label for="inputConditionOfWound" class="col-form-label" style="text-align:right">CONDITION OF THE WOUND :</label></div>
                                    <div class="short-div"><label for="inputIncidentLevel" class="col-form-label" style="text-align:right">INCIDENT LEVEL :</label></div>
                                    <div class="short-div"><label for="inputSeverityLevel" class="col-form-label" style="text-align:right">SEVERTY LEVEL :</label></div>
                                    <div class="short-div"><label for="inputReccurentProability" class="col-form-label" style="text-align:right">RECURRENCE PROABILITY :</label></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div">
                                        <select multiple class="form-control form-control-sm selectpicker" id="inputInjuriedBodyPart" name="inputInjuriedBodyPart[]" placeholder="TEXT">
                                            <!-- <option value='0'>-- SELECT --</option> -->
                                            <option value='1'>option 1</option>
                                            <option value='2'>option 2</option>
                                            <option value='3'>option 3</option>
                                            <option value='4'>option 4</option>
                                            <option value='5'>option 5</option>
                                        </select>
                                    </div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="inputConditionOfWound" name="inputConditionOfWound" placeholder="TEXT">
                                            <option value='0'>-- SELECT --</option>
                                            <option value='1'>option 1</option>
                                            <option value='2'>option 2</option>
                                            <option value='3'>option 3</option>
                                            <option value='4'>option 4</option>
                                            <option value='5'>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="inputIncidentLevel" name="inputIncidentLevel" placeholder="TEXT">
                                            <option value='0'>-- SELECT --</option>
                                            <option value='1'>LOW</option>
                                            <option value='2'>MEDIUM</option>
                                            <option value='3'>HIGHT</option>
                                            <!-- <option>option 4</option>
                                            <option>option 5</option> -->
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="inputSeverityLevel" name="inputSeverityLevel" placeholder="TEXT">
                                            <option value='0'>-- SELECT --</option>
                                            <option value='1'>option 1</option>
                                            <option value='2'>option 2</option>
                                            <option value='3'>option 3</option>
                                            <option value='4'>option 4</option>
                                            <option value='5'>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="inputReccurentProability" name="inputReccurentProability" placeholder="TEXT">
                                            <option value='0'>-- SELECT --</option>
                                            <option value='1'>option 1</option>
                                            <option value='2'>option 2</option>
                                            <option value='3'>option 3</option>
                                            <option value='4'>option 4</option>
                                            <option value='5'>option 5</option>
                                        </select></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputActionTaken" class="col-sm-2 col-form-label" style="text-align:right">ACTION TAKEN :</label>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><textarea class="form-control" id="inputActionTaken" name="inputActionTaken" rows="2"></textarea></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div"> <label for="inputDateBackToWork" class="col-form-label" style="text-align:right">DATE BACK TO WORK :</label></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div">
                                        <input type="date" class="form-control form-control-sm" id="inputDateBackToWork" name="inputDateBackToWork" placeholder="TEXT">
                                    </div>
                                </div>
                            </div>


                            <div class="separator">ROUTE COUSE ANALYSIS</div>
                            <!-- Fish bone diagram -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="feature-box">
                                            <strong class=""> MANPOWER </strong>
                                        </div>
                                        <div class="row" style="margin-right:-10% !important; margin-left:0px !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="100" y1="0" x2="300" y2="200" style="stroke:rgb(120,120,120);stroke-width:3.5" />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_manpower">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-primary btn-circle btn_add_input" data-target="input_manpower" position="top"><i class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-danger btn-circle btn_remove_input" data-target="input_manpower" position="top"><i class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-8"><input type="text" class="form-control form-control-sm input_manpower" name="input_manpower[]" /></div>
                                                            </div>
                                                        </div>
                                                    </body>
                                                </foreignObject>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="feature-box">
                                            <strong class=""> METHODE </strong>
                                        </div>
                                        <div class="row" style="margin-right:-10% !important; margin-left:0% !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="100" y1="0" x2="300" y2="200" style="stroke:rgb(120,120,120);stroke-width:3.5" />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_methode">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-primary btn-circle btn_add_input" data-target="input_methode" position="top"><i class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-danger btn-circle btn_remove_input" data-target="input_methode" position="top"><i class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-8"><input type="text" class="form-control form-control-sm input_methode" name="input_methode[]" /></div>
                                                            </div>
                                                        </div>
                                                    </body>
                                                </foreignObject>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="arrow_box ">
                                            <h6 class="heading-secondaryRootCauseArrow">line</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row" style="margin-right: 10% !important; margin-left: 17% !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="0 " y1="150 " x2="150 " y2="0 " style="stroke:rgb(120,120,120);stroke-width:3.5 " />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_material">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-primary btn-circle btn_add_input" data-target="input_material" position="bottom"><i class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-danger btn-circle btn_remove_input" data-target="input_material" position="bottom"><i class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-8"><input type="text" class="form-control form-control-sm input_material" name="input_material[]" /></div>
                                                            </div>
                                                        </div>
                                                    </body>
                                                </foreignObject>
                                            </svg>
                                        </div>
                                        <div class="feature-box-bottom">
                                            <strong>MATERIAL </strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" style="margin-right: 10% !important; margin-left: 17% !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="0 " y1="150 " x2="150 " y2="0 " style="stroke:rgb(120,120,120);stroke-width:3.5 " />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_machine">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-primary btn-circle btn_add_input" data-target="input_machine" position="bottom"><i class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a class="btn btn-sm btn-danger btn-circle btn_remove_input" data-target="input_machine" position="bottom"><i class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-8"><input type="text" class="form-control form-control-sm input_machine" name="input_machine[]" /></div>
                                                            </div>
                                                        </div>
                                                    </body>
                                                </foreignObject>
                                            </svg>
                                        </div>
                                        <div class="feature-box-bottom ">
                                            <strong>MACHINE </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Eof Fish bone diagram -->
                            <div class="separator">DOMINOS EFFECT IN ACCIDENT</div>
                            <div class="form-group row row_dominos_effect">
                                <!-- from js -->
                            </div>
                            <div class="separator">PREVENTIVE AND CORECTIVE ACTION</div>
                            <div class="form-group row">
                                <label for="inputPreventiveAction" class="col-sm-2 col-form-label" style="text-align:right">ACTION :</label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><textarea class="form-control" id="inputPreventiveAction" name="inputPreventiveAction" rows="2"></textarea></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div"><label for="inputPersonResponsibility" class="col-form-label" style="text-align:right">PERSON RESPONSIBILITY :</label></div>
                                    <div class="short-div"><label for="inputTimeTarget" class="col-form-label" style="text-align:right">TIME TARGET :</label></div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="text" class="form-control form-control-sm" id="inputPersonResponsibility" name="inputPersonResponsibility" placeholder="TEXT">
                                        <input type="text" class="form-control form-control-sm" id="inputTimeTarget" name="inputTimeTarget" placeholder="TEXT">
                                    </div>
                                </div>
                            </div>
                            <div class="separator">UPLOAD PHOTO</div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="text-align:right">SELECT PHOTO :</label>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="file" name="inputIncidentImg" />
                                    </div>
                                </div>
                            </div>

                            <div class="separator">INVESTIGATION TEAM</div>
                            <div class="div_mem_investig">
                                <div class="form-group row">
                                    <label for="inputLeadInvestigation" class="col-sm-2 col-form-label" style="text-align:right">LEAD INVESTIGATOR :</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" class="form-control form-control-sm" id="inputLeadInvestigation" name="inputLeadInvestigation" placeholder="TEXT"></div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-sm btn-primary btnadd_mem_investig" data-target="mem_investig">Add Member</a>
                                        <a class="btn btn-sm btn-danger btnremove_mem_investig" data-target="mem_investig"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- end form -->
                        </div>
                        <!--Button-->
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary float-right btnSaveIncident" style="margin-left: 20px;">Submit</button>
                            <button type="reset" class="btn btn-warning float-right">Reset</button>
                        </div>
                        <!--/.Button-->
                        <!-- /.card-body -->
                    </form>
                    <!--/.form-->
                </div>
                <!--/.INPUT DATA PERSONAL MCU-->

                <!--PERSONAL MCU RECORD-->
                <div class="tab-pane fade " id="tabel-data-activity" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                    <div class="card-body" style="background-color: #77a0e6;">
                        <div class="form-grup row mb-2 col-12">
                            <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>
                        </div>
                        <div class="form-grup row mb-2 col-12">
                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NIK :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>

                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPARTEMENT :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>
                        </div>
                        <div class="form-grup row mb-4 col-12">
                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NAME :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>

                            <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS AGE :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                            </div>
                        </div>


                        <div class="card" style="background-color: white;">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered-sm ">
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
                                            <th scope="col">TOOLS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-secondary">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a class="btn btn-xs btn-success">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-secondary">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a class="btn btn-xs btn-success">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-secondary">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a class="btn btn-xs btn-success">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>

                        <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button>

                    </div>
                </div>
                <!--/.PERSONAL MCU RECORD-->
            </div>
            <!--/.TAB CONTENT-->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?= base_url('assets/templates') ?>/js/bootstrap-multiselect.js"></script>
<script src="<?= base_url('assets/templates') ?>/js/fishbone/custom_form.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('select#multiple').selectpicker();
        // get data selectbox for departement
        $.ajax({
            url: `<?= base_url() ?>manajemen/Department/getData_v2`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                let html = ``;
                html += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                $.each(response.data, function(key, val) {
                    html += `<option value="${val.intIdDepartement}">${val.txtNamaDepartement}</option>`;
                });
                $('#inputVictimDepartment').html(html);
            }
        });

        // get data selectbox for plant
        $.ajax({
            url: `<?= base_url() ?>manajemen/Plant/getData_v2`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                let html = ``;
                html += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                $.each(response.data, function(key, val) {
                    html += `<option value="${val.intIdPlant}">${val.txtNamaPlant}</option>`;
                });
                $('#inputIncidentPlant').html(html);
            }
        });

        // get

        $.ajax({
            url: `Incident_Investigation/get_data_dominos_effect`,
            type: "POST",
            dataType: "json",
            success: function(response) {
                let html = ``;
                // console.log(response);
                $.each(response.data, function(key, val) {
                    html += `<div class="col-md-3">
                                <div class="feature-box-heading">
                                    <strong>${val.ds_type}</strong>
                                </div>
                                <div class="form-check" id="ckRadio${val.ds_id}">`;
                    $.each(val.ds_child, function(i, value) {
                        html += `<input class="form-check-input" type="checkbox" value="${value.childid}" id="defaultCheck1" name="input${val.ds_label}[]">
                                    <label class="form-check-label" for="ckRadio${val.ds_id}">
                                        <strong>${value.child_name}</strong>
                                    </label></br>`;
                    });
                    html += `
                                </div>
                            </div>`;
                });
                $('.row_dominos_effect').html(html);
            }
        });
    });
</script>