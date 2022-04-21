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
                <li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
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
              <a class="nav-link active" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">ACTIVITY LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/table_activity")?>"  role="tab" aria-controls="custom-content-above-home" aria-selected="true">TABEL DATA ACTIVITY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/form_filled")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">FORM FILLED RISK REGISTER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/table_data")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">TABEL DATA RISK REGISTER</a>
            </li>
          </ul>
          <!--/.TAB-->

          <div class="row">
              <div class="col-md-12">
              <form class="form-horizontal" method="post">
                <!--card body-->
                <div class="card-body" style="background-color: #F8ECC2;">
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">ACTIVITY / PRODUCT / SERVICES<br><i>(BASE ON PROCESS)</i> </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                      <button onClick="dynamicinput()" class="btn btn-default mt-2">Save</button>
                      <p id="addinput"></p>
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
              </div>
          </div>
        </div>
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->