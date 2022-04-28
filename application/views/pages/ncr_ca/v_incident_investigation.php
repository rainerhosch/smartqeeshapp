<style>
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
        height: 25px;
        margin-bottom: 10px;
    }
</style>

<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/fishbone/style.css">
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
                    <form class="form-horizontal" method="post">
                        <!--card body-->
                        <div class="card-body" style="background-color: #a5c0d3;">
                            <div class="row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DATE :</i> </label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">AREA :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">TIME :</i> </label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">PLANT :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <!-- victim information -->
                            <div class="separator">Victim Information</div>
                            <div class="row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">EMPLOYEE NUMBER :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">NAME :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DEPARTEMENT :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">AGE :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">LEVEL :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">SERVICE PERIOD :</i> </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>

                            <!-- Incident Information -->
                            <div class="separator">Incident Information</div>
                            <div class="row">
                                <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"> -->
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">INCIDENT DESC :</label>
                                <!-- </div> -->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea></div>
                                <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="background-color:red;">Span 2</div> -->
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">INJURED BODY PART :</label></div>
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">CONDITION OF THE WOUND :</label></div>
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">INCIDENT LEVEL :</label></div>
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">SEVERTY LEVEL :</label></div>
                                    <div class="short-div"><label for="input" class="col-form-label" style="text-align:right">RECURRENCE PROABILITY :</label></div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="incidenLevel" name="incidenLevel" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>LOW</option>
                                            <option>MEDIUM</option>
                                            <option>HIGHT</option>
                                            <!-- <option>option 4</option>
                                            <option>option 5</option> -->
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                    <div class="short-div"><select class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                            <option>-- SELECT --</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label" style="text-align:right">ACTION TAKEN :</label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div"> <label for="input" class="col-form-label" style="text-align:right">DATE BACK TO WORK :</label></div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px">
                                    <div class="short-div">
                                        <input type="date" class="form-control form-control-sm" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                            </div>


                            <div class="separator">ROUTE COUSE ANALYSIS</div>
                            <div class="container">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="feature-box">
                                            <h6 class="heading-secondary"> Method</h6>
                                            <p class="feature-box__text ">
                                                1) slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                        </div>
                                        <div class="feature-box">
                                            <h6 class="heading-secondary "> Method</h6>
                                            <p class="feature-box__text">
                                            </p>
                                        </div>

                                        <div class="feature-box">
                                            <h6 class="heading-secondary "> Method</h6>
                                            <p class="feature-box__text ">
                                                slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                            <p class="feature-box__text ">
                                                slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row" style="margin-right:-10% !important; margin-left:17% !important;">
                                            <svg>
                                                <g writing-mode="tb" fill="tomato" font-size="12" transform="translate(5)">
                                                    <text y="15px" letter-spacing=".5px" text-anchor="bottom">Man</text>
                                                </g>
                                                <line x1="0" y1="0" x2="200" y2="200" style="stroke:rgb(255,0,0);stroke-width:2" />
                                            </svg>
                                        </div>

                                        <div class="arrow_box ">
                                            <h6 class="heading-secondaryRootCauseArrow">&#82;&#67;&raquo;Slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </h6>
                                        </div>

                                        <div class="row" style="margin-right: 24px !important; margin-left: 16% !important;">
                                            <svg>
                                                <g writing-mode="tb " fill="tomato" font-size="12" transform="translate(10) ">
                                                    <text y="15px " letter-spacing=".5px " text-anchor="bottom ">Material</text>
                                                </g>
                                                <line x1="0 " y1="150 " x2="150 " y2="0 " style="stroke:rgb(255,0,0);stroke-width:2 " />
                                            </svg>
                                        </div>




                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="feature-box-bottom">
                                            <h6 class="heading-secondary">Material</h6>
                                            <p class="feature-box__text">
                                                slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                            <p class="feature-box__text ">
                                                slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                            <p class="feature-box__text">
                                                slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                        </div>
                                        <div class="feature-box-bottom ">
                                            <h6 class="heading-secondary ">Measurment</h6>
                                            <p class="feature-box__text ">
                                                slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                            <p class="feature-box__text ">
                                                slots in the edge strip vary in opening. slots too narrow causes damage to inner strip
                                            </p>
                                        </div>
                                        <div class="feature-box-bottom ">
                                            <h6 class="heading-secondary ">Environment</h6>
                                            <p class="feature-box__text "></p>
                                        </div>
                                    </div>




                                </div>
                            </div>


                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="input" class="col-sm-2 col-form-label" style="text-align:right">UPLOAD MCU REPORT :</label>
                            <button class="btn btn-flat btn-secondary mt-2 col-sm-1" onClick="dynamicinput()">BROWSE</button>
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
<script>
    $(document).ready(function() {
        $("#linesTop").fadeIn(1000);
        $("#arrow").fadeIn(1500);
        $("#linesBottom").fadeIn(2000);

        $(function() {
            $(".diradd").click(function(event) {
                event.preventDefault();
                $(this)
                    .next(".diraddform")
                    .slideToggle(500);
            });
        });
    });
</script>
<script>
    //Doughnut Chart
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [2478, 5267, 734, 784, 433]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true,
                position: 'right'
            },
            title: {
                display: true,
                text: 'Predicted world population (millions) in 2050'
            }
        }
    });

    //Horizontan Chart
    new Chart(document.getElementById("bar-chart-horizontal"), {
        type: 'horizontalBar',
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [2478, 5267, 734, 784, 433]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Predicted world population (millions) in 2050'
            }
        }
    });
</script>