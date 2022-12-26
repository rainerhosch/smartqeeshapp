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
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <section class="content">
            <div class="card">
                <!--TAB-->
                <ul class="nav nav-tabs bg-secondary " id="custom-content-above-tab" role="tablist" style="margin-bottom: 1px;">
                    <li class="nav-item">
                        <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/input_mcu')?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">INPUT DATA PERSONAL MCU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/mcu_record')?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">PERSONAL MCU RECORD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="#mcu-performance" role="tab" aria-controls="custom-content-above-home" aria-selected="true">MCU PERFORMANCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="#unfit-followup" role="tab" aria-controls="custom-content-above-home" aria-selected="true">UNFIT FOLLOWUP</a>
                    </li>
                </ul>
                <!--/.TAB-->
                <!--TAB CONTENT-->
                <div class="tab-content" id="custom-content-above-tabContent">

                    <!--INPUT DATA PERSONAL MCU-->
                    <div class="tab-pane fade show active" id="input-data-personal-mcu" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                        <!-- form -->
                        <form class="form-horizontal" method="post">
                            <!--card body-->
                            <div class="card-body" style="background-color: #77a0e6;">
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">EMPLOYEE NUMBER :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="employee_number" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">NAME :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="employee_name" placeholder="TEXT">
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DEPARTEMENT :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="department" placeholder="TEXT">
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">AGE :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="age" placeholder="TEXT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">ADDRESS :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="address" placeholder="TEXT">
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">SERVICE PERIOD :</i> </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="input" name="service_period" placeholder="TEXT">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MCU PERIOD :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="input" name="mcu_period" placeholder="TEXT">
                                            <option>SELECT</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">MCU TYPE :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="input" name="mcu_type" placeholder="TEXT">
                                            <option>SELECT</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">HOSPITAL :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="input" name="hospital" placeholder="TEXT">
                                            <option>SELECT</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>

                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">DATE OF MCU :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="input" name="mcu_date" placeholder="TEXT">
                                            <option>SELECT</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">HEALTH STATUS :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="input" name="health_status" placeholder="TEXT">
                                            <option>SELECT</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">IDENTIFIED DISEASE :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="input" name="identified_disease" placeholder="TEXT">
                                            <option>SELECT</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">TREATMENT RECOMMENDATION :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="input" name="treatment" placeholder="TEXT">
                                            <option>SELECT</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <!-- <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label" style="text-align:right">UPLOAD MCU REPORT :</label>
                                    <button class="btn btn-flat btn-secondary mt-2 col-sm-1" onClick="dynamicinput()">BROWSE</button>
                                </div> -->

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
</section>