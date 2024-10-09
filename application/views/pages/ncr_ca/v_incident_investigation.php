<script src="<?= base_url('assets/templates'); ?>/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/templates'); ?>/libs/jquery-ui/jquery.ui.autocomplete.scroll.min.js"></script>
<script src="<?= base_url('assets/templates'); ?>/js/autocomplete.js"></script>
<style>
    .dataTables_filter {
        float: right !important;
    }

    .dataTables_paginate {
        float: right !important;
    }

    .ui-autocomplete {
        z-index: 2147483647;
    }

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

    .preloader2 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #3e3e3b66;
    }

    .preloader2 .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
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
                    <h1 style="color: white;">
                        <?= $menu_header ?>
                    </h1>
                </div>
                <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                    <ol class="breadcrumb  float-sm-left">
                        <li class="breadcrumb-item"><a href="#">
                                <?= $page ?>
                            </a></li>
                        <li class="breadcrumb-item text-white">
                            <?= $subpage ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="preloader2" hidden>
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row" id="alert_msg">
            <div class="col-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="card">
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a class="nav-link btn" id="custom-content-above-home-tab" data-toggle="pill"
                        href="#form_investigation" role="tab" aria-controls="custom-content-above-home"
                        aria-selected="true">INVESTIGATION FORM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill"
                        href="#tabel-data-activity" role="tab" aria-controls="custom-content-above-home"
                        aria-selected="true">INCIDENT RECORD</a>
                </li>
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">
                <div class="tab-pane  fade " id="form_investigation" role="tabpanel"
                    aria-labelledby="custom-content-above-home-tab">
                    <!-- form -->
                    <form class="form-horizontal" method="post"
                        action="<?= base_url() ?>ncr_ca/Incident_Investigation/save_data" id="incidentForm"
                        enctype="multipart/form-data">
                        <!--card body-->
                        <div class="card-body" style="background-color: #a5c0d3;">
                            <div class="row">
                                <label for="inputIncidentDate" class="col-sm-2 col-form-label"
                                    style="text-align:right">INCIDENT DATE:</i> </label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control form-control-sm" id="inputIncidentDate"
                                        name="inputIncidentDate" required>
                                </div>

                                <label for="inputIncidentArea" class="col-sm-2 col-form-label"
                                    style="text-align:right">INCIDENT AREA :</i> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="inputIncidentArea"
                                        name="inputIncidentArea" placeholder="Insert area of incident" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputIncidentTime" class=" col-sm-2 col-form-label"
                                    style="text-align:right">INCIDENT TIME :</i> </label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control form-control-sm" id="inputIncidentTime"
                                        name="inputIncidentTime" required>
                                </div>

                                <label for="inputIncidentPlant" class="col-sm-2 col-form-label"
                                    style="text-align:right">INCIDENT PLANT :</i> </label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="inputIncidentPlant"
                                        name="inputIncidentPlant" required>
                                    </select>
                                    <!-- <input type="text" class="form-control form-control-sm" id="inputIncidentPlant" name="inputIncidentPlant" placeholder="TEXT"> -->
                                </div>
                            </div>
                            <!-- victim information -->
                            <div class="separator">Victim Information</div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="inputVictimFunction" class="col-form-label"
                                        style="text-align:right">FUNCTION:</i> </label>
                                    <select class="form-control form-control-sm" id="inputVictimFunction"
                                        name="inputVictimFunction" placeholder="TEXT" required disabled>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputVictimDepartment" class="col-form-label"
                                        style="text-align:right">DEPARTEMENT :</i> </label>
                                    <select class="form-control form-control-sm" id="inputVictimDepartment"
                                        name="inputVictimDepartment" placeholder="TEXT" required disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputVictimName" class="col-form-label" style="text-align:right">NAME
                                        :</i> </label>
                                    <input type="hidden" class="form-control form-control-sm" id="inputVictimId"
                                        name="inputVictimId">
                                    <input type="text" class="form-control form-control-sm" id="inputVictimName"
                                        name="inputVictimName" placeholder="Search Name" required disabled>
                                </div>
                                <div class="col-sm-4">
                                    <label for="inputEmplodeeNumber" class="col-form-label"
                                        style="text-align:right">EMPLOYEE NUMBER :</i> </label>
                                    <input type="text" class="form-control form-control-sm" id="inputEmplodeeNumber"
                                        name="inputEmplodeeNumber" placeholder="Employee number" required>
                                </div>
                                <div class="col-sm-2">
                                    <label for="inputVictimAge" class="col-form-label" style="text-align:right">AGE
                                        :</i> </label>
                                    <input type="number" class="form-control form-control-sm" id="inputVictimAge"
                                        name="inputVictimAge" placeholder="Age of victim" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputEmployeeLevel" class="col-form-label"
                                        style="text-align:right">EMPLOYEE LEVEL :</i> </label>
                                    <input type="text" class="form-control form-control-sm" id="inputEmployeeLevel"
                                        name="inputEmployeeLevel" placeholder="Employee level" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputVictimServicePeriod" class="col-form-label"
                                        style="text-align:right">SERVICE PERIOD :</i> </label>
                                    <input type="text" class="form-control form-control-sm"
                                        id="inputVictimServicePeriod" name="inputVictimServicePeriod"
                                        placeholder="Service period" required>
                                </div>
                            </div>

                            <!-- Incident Information -->
                            <div class="separator">Incident Information</div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div"><label for="inputInjuriedBodyPart" class="col-form-label"
                                            style="text-align:right">INJURED BODY PART :</label></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div">
                                        <select multiple class="form-control form-control-sm selectpicker"
                                            id="inputInjuriedBodyPart" name="inputInjuriedBodyPart[]" required>
                                        </select>
                                    </div>
                                </div>
                                <label for="inputConditionOfWound" class="col-sm-2 col-form-label"
                                    style="text-align:right">CONDITION OF THE WOUND </label>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><textarea class="form-control"
                                        id="inputConditionOfWound" rows="1" name="inputConditionOfWound"
                                        placeholder="Describe the condition of the wound" required></textarea></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div">
                                        <label for="inputIncidentLevel" class="col-form-label"
                                            style="text-align:right">INCIDENT LEVEL :</label>
                                    </div>
                                    <div class="short-div">
                                        <label for="inputSeverityLevel" class="col-form-label"
                                            style="text-align:right">SEVERTY LEVEL :</label>
                                    </div>
                                    <div class="short-div">
                                        <label for="inputReccurentProability" class="col-form-label"
                                            style="text-align:right">RECURRENCE PROABILITY :</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div">
                                        <select class="form-control form-control-sm" id="inputIncidentLevel"
                                            name="inputIncidentLevel" required>
                                            <!-- <option value="" disabled selected hidden style="font-size: inherit;">
                                                Nothing selected</option>
                                            <option value='MINOR'>MINOR</option>
                                            <option value='MAYOR'>MAYOR</option> -->
                                        </select>
                                    </div>
                                    <div class="short-div">
                                        <select class="form-control form-control-sm" id="inputSeverityLevel"
                                            name="inputSeverityLevel" required>
                                            <!-- <option value="" disabled selected hidden style="font-size: inherit;">
                                                Nothing selected</option>
                                            <option value='LOW'>LOW</option>
                                            <option value='MEDIUM'>MEDIUM</option>
                                            <option value='HIGHT'>HIGHT</option> -->
                                        </select>
                                    </div>
                                    <div class="short-div">
                                        <select class="form-control form-control-sm" id="inputReccurentProability"
                                            name="inputReccurentProability" required>
                                            <!-- <option value="" disabled selected hidden style="font-size: inherit;">
                                                Nothing selected</option>
                                            <option value='POSSIBLE'>POSSIBLE</option>
                                            <option value='IMPOSSIBLE'>IMPOSSIBLE</option> -->
                                        </select>
                                    </div>
                                </div>
                                <label for="inputIncidentDesc" class="col-sm-2 col-form-label"
                                    style="text-align:right">INCIDENT DESC :</label>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><textarea class="form-control"
                                        id="inputIncidentDesc" rows="4" name="inputIncidentDesc"
                                        placeholder="Use (/) to separate, more than one input." required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div"> <label for="inputDateBackToWork" class="col-form-label"
                                            style="text-align:right">DATE BACK TO WORK :</label></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">
                                    <div class="short-div">
                                        <input type="date" class="form-control form-control-sm" id="inputDateBackToWork"
                                            name="inputDateBackToWork">
                                    </div>
                                </div>
                                <label for="inputActionTaken" class="col-sm-2 col-form-label"
                                    style="text-align:right">ACTION TAKEN :</label>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><textarea class="form-control"
                                        id="inputActionTaken" name="inputActionTaken" rows="1"
                                        placeholder="Use (/) to separate, more than one input." required></textarea>
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
                                        <div class="row"
                                            style="margin-right:-10% !important; margin-left:0px !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="100" y1="0" x2="300" y2="200"
                                                    style="stroke:rgb(120,120,120);stroke-width:3.5" />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_manpower">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-primary btn-circle btn_add_input"
                                                                        data-target="input_manpower" position="top"><i
                                                                            class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-danger btn-circle btn_remove_input"
                                                                        data-target="input_manpower" position="top"><i
                                                                            class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <!-- <input type="text"
                                                                        class="form-control form-control-sm input_manpower"
                                                                        name="input_manpower[]" /> -->
                                                                    <textarea
                                                                        class="form-control form-control-sm input_manpower"
                                                                        name="input_manpower[]" rows="1"></textarea>
                                                                </div>
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
                                        <div class="row"
                                            style="margin-right:-10% !important; margin-left:0% !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="100" y1="0" x2="300" y2="200"
                                                    style="stroke:rgb(120,120,120);stroke-width:3.5" />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_methode">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-primary btn-circle btn_add_input"
                                                                        data-target="input_methode" position="top"><i
                                                                            class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-danger btn-circle btn_remove_input"
                                                                        data-target="input_methode" position="top"><i
                                                                            class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <!-- <input type="text"
                                                                        class="form-control form-control-sm input_methode"
                                                                        name="input_methode[]" /> -->
                                                                    <textarea
                                                                        class="form-control form-control-sm input_manpower"
                                                                        name="input_methode[]" rows="1"></textarea>
                                                                </div>
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
                                        <div class="row"
                                            style="margin-right: 10% !important; margin-left: 17% !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="0 " y1="150 " x2="150 " y2="0 "
                                                    style="stroke:rgb(120,120,120);stroke-width:3.5 " />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_material">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-primary btn-circle btn_add_input"
                                                                        data-target="input_material"
                                                                        position="bottom"><i class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-danger btn-circle btn_remove_input"
                                                                        data-target="input_material"
                                                                        position="bottom"><i
                                                                            class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <!-- <input type="text"
                                                                        class="form-control form-control-sm input_material"
                                                                        name="input_material[]" /> -->
                                                                    <textarea
                                                                        class="form-control form-control-sm input_manpower"
                                                                        name="input_material[]" rows="1"></textarea>
                                                                </div>
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
                                        <div class="row"
                                            style="margin-right: 10% !important; margin-left: 17% !important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <line x1="0 " y1="150 " x2="150 " y2="0 "
                                                    style="stroke:rgb(120,120,120);stroke-width:3.5 " />
                                                <foreignObject x="50" y="2" width="200" height="150">

                                                    <body xmlns="http://www.w3.org/1999/xhtml">
                                                        <div class="div_input_machine">
                                                            <div class="row">
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-primary btn-circle btn_add_input"
                                                                        data-target="input_machine" position="bottom"><i
                                                                            class="fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="col-sm-2"><a
                                                                        class="btn btn-sm btn-danger btn-circle btn_remove_input"
                                                                        data-target="input_machine" position="bottom"><i
                                                                            class="fa fa-minus"></i></a>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <!-- <input type="text"
                                                                        class="form-control form-control-sm input_machine"
                                                                        name="input_machine[]" /> -->
                                                                    <textarea
                                                                        class="form-control form-control-sm input_manpower"
                                                                        name="input_machine[]" rows="1"></textarea>
                                                                </div>
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
                            </div>
                            <div class="separator">PREVENTIVE AND CORECTIVE ACTION</div>
                            <div class="row">
                                <a class="btn btn-sm btn-primary btnadd_preventive" data-target="prev_n_corective">Add</a>
                                <a class="btn btn-sm btn-danger btnremove_preventive" data-target="prev_n_corective"><i class="fa fa-minus"></i></a>
                            </div>
                            <div class="div_prev_n_corective">
                                <div class="form-group row">
                                    <label for="inputPreventiveAction" class="col-sm-2 col-form-label"
                                        style="text-align:right">ACTION :</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><textarea class="form-control"
                                            id="inputPreventiveAction" name="inputPreventiveAction[]" rows="2"></textarea>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                        <div class="short-div"><label for="inputPersonResponsibility" class="col-form-label"
                                                style="text-align:right">PERSON RESPONSIBILITY :</label></div>
                                        <div class="short-div"><label for="inputTimeTarget" class="col-form-label"
                                                style="text-align:right">TIME TARGET :</label></div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                        <div class="short-div">
                                            <input type="text" class="form-control form-control-sm"
                                                id="inputPersonResponsibility" name="inputPersonResponsibility[]"
                                                placeholder="TEXT">
                                            <input type="date" class="form-control form-control-sm" id="inputTimeTarget"
                                                name="inputTimeTarget[]" placeholder="TEXT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator">UPLOAD PHOTO</div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="text-align:right; font-size:14px;">Working
                                    Area - PHOTO:</label>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="file" name="inputIncidentImg[]" multiple />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="text-align:right; font-size:14px;">Body
                                    Injury Part - PHOTO:</label>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="file" name="inputIncidentImg[]" multiple />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="text-align:right; font-size:14px;">Victim
                                    Photo - PHOTO:</label>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="file" name="inputIncidentImg[]" multiple />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="text-align:right; font-size:14px;">Other
                                    supporting 1 - PHOTO:</label>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="file" name="inputIncidentImg[]" multiple />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="text-align:right; font-size:14px;">Other
                                    supporting 2 - PHOTO:</label>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="file" name="inputIncidentImg[]" multiple />
                                    </div>
                                </div>
                            </div>

                            <div class="separator">INVESTIGATION TEAM</div>
                            <div class="div_mem_investig">
                                <div class="form-group row">
                                    <label for="inputLeadInvestigation" class="col-sm-2 col-form-label"
                                        style="text-align:right">LEAD INVESTIGATOR :</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text"
                                            class="form-control form-control-sm" id="inputLeadInvestigation"
                                            name="inputLeadInvestigation" placeholder="TEXT"></div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-sm btn-primary btnadd_mem_investig"
                                            data-target="mem_investig">Add Member</a>
                                        <a class="btn btn-sm btn-danger btnremove_mem_investig"
                                            data-target="mem_investig"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm float-right btnSaveIncident"
                                style="margin-left: 20px;">Submit</button>
                            <button type="reset" class="btn btn-warning float-right">Reset</button>
                        </div>
                    </form>
                </div>
                <!--/.INPUT DATA PERSONAL MCU-->

                <!--PERSONAL MCU RECORD-->
                <div class="tab-pane fade show active" id="tabel-data-activity" role="tabpanel"
                    aria-labelledby="custom-content-above-profile-tab">
                    <div class="card-body" style="background-color: #77a0e6;">
                        <!-- <div class="form-grup row mb-2 col-12">
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
                        </div> -->
                        <h2>Tabel Data</h2>
                        <div class="card" style="background-color: white;">
                            <div class="table-responsive p-3">
                                <table class="table table-striped table-bordered-sm" id="table_incident_record">
                                    <thead class="align-middle">
                                        <tr class="table-primary align-middle" style="text-align: center;">
                                            <th scope="col">NO.</th>
                                            <th scope="col">INCIDEN TIME</th>
                                            <th scope="col">INCIDENT AREA</th>
                                            <th scope="col">NAME</th>
                                            <th scope="col">DEPARTEMENT</th>
                                            <th scope="col">JABATAN</th>
                                            <th scope="col">AGE</th>
                                            <th scope="col">TOOLS</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_incident_record">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<script src="<?= base_url('assets/templates') ?>/js/bootstrap-multiselect.js"></script>
<script src="<?= base_url('assets/templates') ?>/js/fishbone/custom_form.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#alert_msg").html("");
            <?php $this->session->unset_userdata('message '); ?>
        }, 2000);
        $('select#multiple').selectpicker();
        $.ajax({
            url: `<?= base_url() ?>ncr_ca/Incident_Investigation/getDataRecord`,
            type: `POST`,
            data: {
                type: 1
            },
            dataType: 'json',
            success: function (response) {
                // console.log(response)
                let html = ``;
                let no = 1;
                if (response.data.length > 0) {
                    $.each(response.data, function (key, val) {
                        html += `<tr>`;
                        html += `<td class="text-center">${no}</td>`;
                        html += `<td class="text-center">${val.dtm_date_incident}<br>${val.dtm_time_incident}</td>`;
                        html += `<td class="text-center">${val.txt_incident_area}</td>`;
                        html += `<td class="text-center">${val.txt_vi_victim_name}</td>`;
                        html += `<td class="text-center">${val.victim_department_name}</td>`;
                        html += `<td class="text-center">${val.txt_vi_employee_level}</td>`;
                        html += `<td class="text-center">${val.int_vi_victim_age}</td>`;
                        // html += `<td class="text-center">${val.txt_vi_victim_name}</td>`;
                        // html += `<td class="text-center">${val.txt_vi_victim_name}</td>`;
                        html += `<td class="text-center">`;
                        // html += `<a class="btn btn-xs btn-warning btnEdit" data-id="${val.int_id_investigation}"><i class="fas fa-pen"></i></a>`;
                        html += `<a class="btn btn-xs btn-danger btnDelete" data-id="${val.int_id_investigation}"><i class="fas fa-trash-alt"></i></a>`;
                        html += `<a class="btn btn-xs btn-primary btnDownloadsDoc ml-1" data-id="${val.int_id_investigation}">Docs <i class="fa fa-download"></i></a>`;
                        html += `</td>`;
                        html += `</tr>`;
                        no++;

                    });

                } else {
                    html += `<tr>`;
                    html += `<td colspan="12" class="text-center"><br>`;
                    html += `<div class='col-md-12'>`;
                    html += `<div class='alert alert-warning alert-dismissible'>`;
                    html += `<h4><i class='icon fa fa-warning'></i>Tidak ada data!</h4>`;
                    html += `</div>`;
                    html += `</div>`;
                    html += `</td>`;
                    html += `</tr>`;
                }
                $('#tbody_incident_record').html(html);
                $('.btnDownloadsDoc').on('click', function () {
                    let id = $(this).data('id');
                    let url = `<?= base_url() ?>ncr_ca/Incident_Investigation/DownloadsToWord?id=` + id;
                    window.open(url).focus();
                });
                $('.btnDelete').on('click', function () {
                    let id = $(this).data('id');
                    console.log('Delete-' + id)
                    Swal.fire({
                        icon: 'warning',
                        title: 'Delete Data?',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url() ?>ncr_ca/Incident_Investigation/delete_data",
                                data: {
                                    id: id,
                                },
                                dataType: "json",
                                success: function (response) {
                                    if (response.status === true) {
                                        Swal.fire({
                                            icon: response.icon,
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 5000
                                        });
                                        setTimeout(function () {
                                            location.reload();
                                        }, 1000);
                                    }
                                }
                            });
                        }
                    });
                });
                $('.btnEdit').on('click', function () {
                    let id = $(this).data('id');
                    console.log('Edit-' + id)
                    // $.ajax({
                    //     url: `<?= base_url() ?>ncr_ca/Incident_Investigation/DownloadsToWord`,
                    //     type: "GET",
                    //     data: {
                    //         id: id
                    //     },
                    //     dataType: "json",
                    //     success: function(response) {
                    //         // console.log(response);
                    //     }
                    // });
                });
                $('#table_incident_record').DataTable({
                    lengthMenu: [
                        [5, 10, 20, -1],
                        [5, 10, 20, 'All'],
                    ],
                });
                $('select[name="table_incident_record_length"').addClass('form-control form-control-sm');
                $('select[name="table_incident_record_length"').removeClass('form-select form-select-sm');
                // $('#table_incident_record_length label').remove();
            }
        });
        // get data selectbox for plant
        $.ajax({
            url: `<?= base_url() ?>manajemen/Plant/getData_v2`,
            type: "GET",
            dataType: "json",
            success: function (response) {
                // console.log(response);
                let html = ``;
                html += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                $.each(response.data, function (key, val) {
                    html += `<option value="${val.intIdPlant}">${val.txtNamaPlant}</option>`;
                });
                $('#inputIncidentPlant').html(html);
            }
        });
        // get data selectbox for departement
        $('select[name="inputIncidentPlant"]').on('change', function () {
            let id_plant = $(this).val();
            $.ajax({
                url: `<?= base_url() ?>manajemen/Section/getDataByIdPlant`,
                type: "GET",
                data: {
                    id: id_plant
                },
                dataType: "json",
                beforeSend: function () {
                    $('.preloader2').prop('hidden', false);
                },
                success: function (response) {
                    $('.preloader2').prop('hidden', true);
                    // console.log(response)
                    if (response.code === 200) {
                        let html = response.data;
                        $('#inputVictimFunction').prop('disabled', false);
                        $('#inputVictimFunction').html(html);
                    } else {
                        $('#inputVictimFunction').prop('disabled', true);
                    }
                }
            });
        });
        $('select[name="inputVictimFunction"]').on('change', function () {
            let id_section = $(this).val();
            $.ajax({
                url: `<?= base_url() ?>manajemen/Department/getData_v2`,
                type: "POST",
                data: {
                    id_section: id_section
                },
                dataType: "json",
                beforeSend: function () {
                    $('.preloader2').prop('hidden', false);
                },
                success: function (response) {
                    $('.preloader2').prop('hidden', true);
                    // console.log(response)
                    if (response.code === 200) {
                        let html = ``;
                        html += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                        $.each(response.data, function (key, val) {
                            html += `<option value="${val.intIdDepartement}">${val.txtNamaDepartement}</option>`;
                        });
                        $('#inputVictimDepartment').prop('disabled', false);
                        $('#inputVictimDepartment').html(html);
                    }
                }
            });
        });

        $('select[name="inputVictimDepartment"]').on('change', function () {
            let id_dept = $(this).val();
            $('#inputVictimName').prop('disabled', false);
            // console.log(id_dept)
            // inputVictimName
            $('#inputVictimName').autocomplete({
                maxShowItems: 5,
                source: function (request, response) {
                    // Fetch data
                    $.ajax({
                        url: '<?= base_url(); ?>manajemen/Employee/getDataForAutoComplete',
                        type: 'post',
                        dataType: "json",
                        serverSide: true,
                        data: {
                            filterby: 'Department',
                            id: id_dept,
                            search: request.term
                        },
                        beforeSend: function () {
                            $('.preloader2').prop('hidden', false);
                        },
                        success: function (res) {
                            $('.preloader2').prop('hidden', true);
                            // console.log(res)
                            response(res.data);
                        }
                    });
                },
                select: function (event, ui) {
                    // console.log(ui)
                    // Set selection
                    $('#inputVictimAge').val(ui.item.umur); // save selected id to input
                    $('#inputVictimId').val(ui.item.intIdEmployee); // save selected id to input
                    $('#inputVictimName').val(ui.item.txtNameEmployee); // save selected id to input
                    $('#inputEmplodeeNumber').val(ui.item.txtNikEmployee); // save selected id to input
                    $('#inputEmployeeLevel').val(ui.item.jabatan.txtNamaJabatan); // save selected id to input
                    $('#inputVictimServicePeriod').val(ui.item.lama_bekerja); // save selected id to input
                    return false;
                },
                focus: function (event, ui) {
                    $('#inputVictimAge').val(ui.item.umur); // save selected id to input
                    $('#inputVictimId').val(ui.item.intIdEmployee); // save selected id to input
                    $('#inputVictimName').val(ui.item.txtNameEmployee); // save selected id to input
                    $('#inputEmplodeeNumber').val(ui.item.txtNikEmployee); // save selected id to input
                    $('#inputEmployeeLevel').val(ui.item.jabatan.txtNamaJabatan); // save selected id to input
                    $('#inputVictimServicePeriod').val(ui.item.lama_bekerja); // save selected id to input
                    return false;
                },
            });
        });
        $.ajax({
            url: '<?= base_url(); ?>manajemen/Masterdata/get_body_part',
            type: 'post',
            dataType: "json",
            serverSide: true,
            success: function (response) {
                let html = ``;
                html += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                $.each(response.data, function (key, item) {
                    html += `<option value="${item.intIdBodyPart}">${item.txtNameBodyPart}</option>`;
                });
                $('select#inputInjuriedBodyPart').append(html);
                $("select#inputInjuriedBodyPart").selectpicker("refresh");
            }
        });

        $.ajax({
            url: '<?= base_url(); ?>manajemen/Masterdata/get_incident_level',
            type: 'post',
            dataType: "json",
            serverSide: true,
            success: function (response) {
                // console.log(response)
                let html_1 = ``;
                html_1 += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                $.each(response.data, function (key, item) {
                    html_1 += `<option value="${item.id}">${item.level_name}</option>`;
                });
                $('select#inputIncidentLevel').append(html_1);
                $("select#inputIncidentLevel").selectpicker("refresh");
            }
        });

        $.ajax({
            url: '<?= base_url(); ?>manajemen/Masterdata/get_severity_level',
            type: 'post',
            dataType: "json",
            serverSide: true,
            success: function (response) {
                // console.log(response)
                let html_2 = ``;
                html_2 += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                $.each(response.data, function (key, item) {
                    html_2 += `<option value="${item.id}">${item.level_name}</option>`;
                });
                $('select#inputSeverityLevel').append(html_2);
                $("select#inputSeverityLevel").selectpicker("refresh");
            }
        });

        $.ajax({
            url: '<?= base_url(); ?>manajemen/Masterdata/get_mreccurent_proability',
            type: 'post',
            dataType: "json",
            serverSide: true,
            success: function (response) {
                // console.log(response)
                let html_3 = ``;
                html_3 += `<option value="" disabled selected hidden style="font-size: inherit;">Nothing selected</option>`;
                $.each(response.data, function (key, item) {
                    html_3 += `<option value="${item.id}">${item.recc_name}</option>`;
                });
                $('select#inputReccurentProability').append(html_3);
                $("select#inputReccurentProability").selectpicker("refresh");
            }
        });

        // get

        $.ajax({
            url: `Incident_Investigation/get_data_dominos_effect`,
            type: "POST",
            dataType: "json",
            success: function (response) {
                let html = ``;
                // console.log(response);
                $.each(response.data, function (key, val) {
                    html += `<div class="col-md-3">
                                <div class="feature-box-heading">
                                    <strong>${val.ds_type}</strong>
                                </div>
                                <div class="form-check" id="ckRadio${val.ds_id}">`;
                    $.each(val.ds_child, function (i, value) {
                        html += `<input class="form-check-input" type="checkbox" value="${value.child_name}" id="defaultCheck1" name="input${val.ds_label}[]">
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