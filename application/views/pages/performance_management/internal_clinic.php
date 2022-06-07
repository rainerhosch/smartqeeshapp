    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="z-index: -999 !important;">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 bg-warning py-2">
                        <h1 style="color: white;">RISK MANAGEMENT</h1>
                    </div>
                    <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                        <ol class="breadcrumb  float-sm-left">
                            <li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
                            <li class="breadcrumb-item text-white">INTERNAL CLINIC</li>
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
                        <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" data-toggle="pill" href="#employee-visit-clinic" role="tab" aria-controls="custom-content-above-home" aria-selected="true">EMPLOYEE VISIT CLINIC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" data-toggle="pill" href="#clinic-visit-record" role="tab" aria-controls="custom-content-above-home" aria-selected="true">CLINIC VISIT RECORD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" data-toggle="pill" href="#clinic-visit-performance" role="tab" aria-controls="custom-content-above-home" aria-selected="true">CLINIC VISIT PERFORMANCE</a>
                    </li>
                </ul>
                <!--/.TAB-->
                <!--TAB CONTENT-->
                <div class="tab-content" id="custom-content-above-tabContent">

                    <!-- EMPLOYEE VISIT CLINIC-->
                    <div class="tab-pane fade show active" id="employee-visit-clinic" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                        <!-- form -->
                        <form class="form-horizontal" method="post">
                            <!--card body-->
                            <div class="card-body" style="background-color: #77a0e6;">
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">EMPLOYEE NUMBER :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">NAME :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DEPARTEMENT :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">AGE :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">ADDRESS :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">SERVICE PERIOD :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DATE :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">PARAMEDIC NAME :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">COMPLAINT :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">ACTION :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MEDICINE :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right"></label>
                                    <button class="btn btn-flat btn-danger mt-2 col-sm-2" onClick="dynamicinput()">SAVE</button>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </form>
                        <!--/.form-->
                    </div>
                    <!--/.EMPLOYEE VISIT CLINIC-->

                    <!--CLINIC VISIT RECORD-->
                    <div class="tab-pane fade" id="clinic-visit-record" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                        <div class="card-body" style="background-color: #77a0e6;">
                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NIK :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPARTEMENT :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="form-grup row mb-4 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS NAME :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                </div>

                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS AGE :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
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
                                                <th scope="col">ACTION</th>
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
                    <!--/.CLINIC VISIT RECORD-->

                    <!--CLINIC VISIT PERFOMANCE-->
                    <div class="tab-pane fade" id="clinic-visit-performance" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                        <!-- form -->
                        <form class="form-horizontal" method="post">
                            <!--card body-->
                            <div class="card-body" style="background-color: #77a0e6;">
                                <div class="form-grup row mb-2 col-12">
                                    <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-grup row mb-2 col-12">
                                    <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPARTEMENT :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                    </div>
                                </div>
                                <br>


                                <div class="card col-12" style="background-color: #83A2B4;">
                                    <div class="row">

                                        <div class="card-body col-6" style="background-color: aliceblue;">
                                            <canvas class="p-1" id="bar-chart-horizontal" width="auto" height="auto" style="border-style:solid;">

                                            </canvas>
                                        </div>

                                        <div class="card-body col-6" style="background-color: aliceblue;">
                                            <canvas class="p-1" id="doughnut-chart" width="auto" height="auto" style="border-style:solid;">

                                            </canvas>
                                        </div>

                                    </div>
                                </div>


                                <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button>

                            </div>
                            <!-- /.card-body -->
                        </form>
                        <!--/.form-->
                    </div>
                    <!--/.CLINIC VISIT PERFORMANCE-->

                </div>
                <!--/.TAB CONTENT-->
            </div>




        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->


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